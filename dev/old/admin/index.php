<?php

define('TRAFFIC_EXCEEDED_EXEMPT', true);
$errors = null;
include '../includes/package.php';
if (file_exists('../install/')) {
    header('Location: error.php');
}

$lockout_engaged = null;
include '../API/config.php';
if (!defined('SITE_KEY')) {
    require_once '../API/keys.php';
}

if (isset($_REQUEST['logout'])) {
    unset($_SESSION[$install_directory_name.'_admin_edit_language'], $_SESSION[$install_directory_name.'_admin_edit_table'], $_SESSION[$install_directory_name.'_idev_LoggedAdmin'], $_SESSION[$install_directory_name.'_idev_AdminAccount']);

    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_SESSION[$install_directory_name.'_idev_LoggedAdmin'])) {
    header('Location: dashboard.php');
    exit();
}

$setup_file_version = '9.1';
if (isset($_REQUEST['aduser']) && $_REQUEST['adpass']) {
    $token = null;
    $username = strip_tags(trim($_REQUEST['aduser']));
    $passcheck = strip_tags(trim($_REQUEST['adpass']));
    $login_ok = false;
    $query = 'select * from idevaff_admin where adminid = ? LIMIT 1';
    $result = $db->prepare($query);
    $result->execute([$username]);
    if ($result->rowCount()) {
        $row = $result->fetch();
        if (array_key_exists('user_key', $row) && '' !== $row['user_key']) {
            $hash = $row['adminpass'];
            $user_key = $row['user_key'];
            $password_to_check = $user_key.$passcheck;
            if (password_verify($password_to_check, $hash)) {
                $login_ok = true;
                if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                    $newHash = password_hash($user_key.$passcheck, PASSWORD_DEFAULT);
                    $sql = 'UPDATE `idevaff_admin` set `adminpass`= ? WHERE record = ?';
                    $q = $db->prepare($sql);
                    $q->execute([$newHash, $row['record']]);
                }
            } else {
                $password_to_check = SITE_KEY.$passcheck.$user_key;
                if (password_verify($password_to_check, $hash)) {
                    $login_ok = true;
                    $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22);
                    $password_enc = password_hash($user_key.$passcheck, PASSWORD_DEFAULT);
                    $sql = 'UPDATE `idevaff_admin` set `user_key`= ?, `adminpass`=? WHERE record = ?';
                    $q = $db->prepare($sql);
                    $q->execute([$user_key, $password_enc, $row['record']]);
                } else {
                    $login_ok = false;
                }
            }
        } else {
            $old_pass = $_REQUEST['adpass'];
            $passcheck = sha1('idev_secret'.$old_pass);
            if ($row['adminpass'] === $passcheck) {
                $login_ok = true;
                $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22);
                $password_enc = password_hash($user_key.$old_pass, PASSWORD_DEFAULT);
                $sql = 'UPDATE `idevaff_admin` set `user_key`=?, `adminpass`=? WHERE record = ?';
                $q = $db->prepare($sql);
                $q->execute([$user_key, $password_enc, $row['record']]);
            } else {
                $login_ok = false;
            }
        }
    }

    if (true === $login_ok) {
        $_SESSION[$install_directory_name.'_idev_LoggedAdmin'] = $username;
        $_SESSION[$install_directory_name.'_expire'] = time() + $expire_time;
        $timenow = time();
        $st = $db->prepare('update idevaff_admin set code = ? where adminid = ?');
        $st->execute([$timenow, $username]);
        AdminlogEntry($username.'|'.$ip_addr.'|'.'Admin Login Success');
        $st = $db->prepare('delete from idevaff_admin_lockout where ip = ?');
        $st->execute([$ip_addr]);
        $db->query('update idevaff_config set login_count = login_count+1');
        $query = $db->prepare('select super from idevaff_admin where adminid = ?');
        $query->execute([$_SESSION[$install_directory_name.'_idev_LoggedAdmin']]);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetch();
        $super = $data['super'];
        if ('1' === $super) {
            $_SESSION[$install_directory_name.'_idev_AdminAccount'] = 1;
        }

        header('Location: dashboard.php');
    } else {
        AdminlogEntry($username.'|'.$ip_addr.'|'.'Admin Login Failure');
        $time_now = time();
        $query = $db->prepare('select ip, attempts, code from idevaff_admin_lockout where ip = ?');
        $query->execute([$ip_addr]);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $attempts_left_result = $query->fetch();
        $attempts_left_number = $attempts_left_result['attempts'];
        $attempts_left_code = $attempts_left_result['code'];
        if (0 < $query->rowCount()) {
            if (0 < $attempts_left_number) {
                $st = $db->prepare('update idevaff_admin_lockout set attempts=attempts-1, code = ? where ip = ?');
                $st->execute([$time_now, $ip_addr]);
            }
        } else {
            $st = $db->prepare('insert into idevaff_admin_lockout (ip, attempts, code) VALUES (?, ?, ?)');
            $st->execute([$ip_addr, '4', $time_now]);
        }

        $query = $db->prepare('select ip, attempts, code from idevaff_admin_lockout where ip = ?');
        $query->execute([$ip_addr]);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $attempts_left_result = $query->fetch();
        $attempts_left_number = $attempts_left_result['attempts'];
        $attempts_left_code = $attempts_left_result['code'];
        if ('0' < $attempts_left_number) {
            $fail_message = '<strong>Error!</strong> Invalid login credentials. You have '.$attempts_left_number.' more attempts before timed lockout.';
        }
    }
}

$time_now = time();
$expire_time = 60 * 5;
$query = $db->prepare('select attempts, code from idevaff_admin_lockout where ip = ?');
$query->execute([$ip_addr]);
$query->setFetchMode(PDO::FETCH_ASSOC);
$attempts_left_result = $query->fetch();
$attempts_left_number = $attempts_left_result['attempts'];
$attempts_left_code = $attempts_left_result['code'];
$difference = $time_now - $attempts_left_code;
$time_to_go = $expire_time - $difference;
if ('60' <= $time_to_go) {
    $time_to_go_minutes = (int) (gmdate('i', $time_to_go));
    $time_to_go_seconds = (int) (gmdate('s', $time_to_go));
    if ('1' < $time_to_go_minutes) {
        $minute_ext = 's';
    } else {
        $minute_ext = null;
    }

    $sentence = $time_to_go_minutes.' minute'.$minute_ext.' and '.$time_to_go_seconds.' seconds.';
} else {
    $time_to_go_seconds = (int) (gmdate('s', $time_to_go));
    $sentence = $time_to_go_seconds.' seconds.';
}

if ($expire_time < $difference) {
    $st = $db->prepare('delete from idevaff_admin_lockout where ip = ?');
    $st->execute([$ip_addr]);
} else {
    if ('0' === $attempts_left_number) {
        $fail_message = '<strong>Error!</strong> You are currently locked out for excessive login attempts.<br /><br />You can try again in '.$sentence;
        $lockout_engaged = true;
    }
}

echo "<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n<title>Sublime Revenue Administrative Center</title>\r\n\r\n<link href=\"templates/bootstrap/css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\r\n\t<link href=\"templates/css/main.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link href=\"templates/css/plugins.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link href=\"templates/css/responsive.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link href=\"templates/css/icons.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link href=\"templates/css/login.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link href=\"templates/css/custom.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\t<link rel=\"stylesheet\" href=\"templates/css/fontawesome/font-awesome.min.css\">\r\n\t<!--[if IE 7]><link rel=\"stylesheet\" href=\"templates/css/fontawesome/font-awesome-ie7.min.css\"><![endif]-->\r\n\t<!--[if IE 8]><link href=\"templates/css/ie8.css\" rel=\"stylesheet\" type=\"text/css\" /><![endif]-->\r\n\t<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>\r\n\t<script type=\"text/javascript\" src=\"templates/js/libs/jquery-1.10.2.min.js\"></script>\r\n\t<script type=\"text/javascript\" src=\"templates/bootstrap/js/bootstrap.min.js\"></script>\r\n\t<script type=\"text/javascript\" src=\"templates/js/libs/underscore.min.js\"></script>\r\n\t<!--[if lt IE 9]><script src=\"templates/js/libs/html5shiv.js\"></script><![endif]-->\r\n\t<script type=\"text/javascript\" src=\"templates/plugins/uniform/jquery.uniform.min.js\"></script>\r\n\t<script type=\"text/javascript\" src=\"templates/js/login.js\"></script>\r\n\t<script>\r\n\t\$(document).ready(function(){\r\n\t\t\"use strict\";\r\n\t\tLogin.init(); // Init login JavaScript\r\n\t});\r\n\t</script>\r\n\r\n</head>\r\n\r\n<body class=\"login\">\r\n\r\n<!--\r\n<div class=\"navbar navbar-fixed-top\" role=\"navigation\">\r\n<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><h4>Warning - Sublime Revenue Cannot Run</h4>Mcrypt is not enabled on your web hosting account. Login will not work until it is. Please take a moment to have your web hosting provider and/or server admin enable Mcrypt now.</div>\r\n</div>\r\n-->\r\n\r\n";
if (isset($errors)) {
    exit("\r\n<div style=\"padding:50px; width:800px; margin-left:auto; margin-right:auto;\">\r\n<div class=\"panel panel-danger\">\r\n<div class=\"panel-heading\">\r\n<h3 class=\"panel-title\"><strong>Licensing Error</strong><span class=\"pull-right\">Sublime Revenue Cannot Run</span></h3>\r\n</div>\r\n<div class=\"panel-body\" align=\"center\">\r\n<h2><font color=\"#CC0000\">".$errors."</font></h2>\r\n</div>\r\n</div>\r\n</div>\r\n");
}

echo "<div class=\"box\">\r\n<div class=\"content\">\r\n";
if (isset($_REQUEST['timeout'])) {
    echo "<div class=\"alert fade in alert-info\" align=\"center\">\r\n<h4>Your Session Has Timed Out</h4><span>Please login again below.</span>\r\n</div>\r\n";
}

echo "<div style=\"margin-bottom:25px;\"><span><img src=\"images/idevaffiliate_logo.png\" alt=\"logo\" style=\"margin-top:6px;\" /></span><span class=\"pull-right\"><h3 class=\"form-title\">Admin Center Login</h3></span></div>\r\n";
if (isset($fail_message)) {
    echo "<div class=\"alert fade in alert-danger\">\r\n";
    echo $fail_message;
    if (isset($lockout_engaged)) {
        echo "<br /><br />\r\n<a href=\"index.php\" class=\"btn btn-danger\">Try Again Now</a>\r\n";
    }

    echo "</div>\r\n";
}

if (!isset($lockout_engaged)) {
    echo "<form class=\"form-vertical login-form\" action=\"\" method=\"post\">\r\n<div class=\"form-group\">\r\n<label for=\"username\">Enter Your Username</label>\r\n<div class=\"input-icon\"><i class=\"icon-user\" style=\"margin-top:23px;\"></i><input type=\"text\" name=\"aduser\" class=\"form-control\" placeholder=\"Username\" autofocus=\"autofocus\" /></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label for=\"password\">Enter Your Password</label>\r\n<div class=\"input-icon\"><i class=\"icon-lock\"></i><input type=\"password\" name=\"adpass\" class=\"form-control\" placeholder=\"Password\" autocomplete=\"off\" /></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<a href=\"lost_password.php\" class=\"btn\">Forgot Password?</a>\r\n<button type=\"submit\" class=\"submit btn btn-blue-login pull-right\">Log Me In!</button>\r\n</div>\r\n</form>\r\n";
}

echo "<br />\r\n<p class=\"pull-right\">Sublime Revenue Version ";
echo "1.$version";
echo "</p><br />\r\n</div>\r\n</div>\r\n</body>";
function get_key()
{
    $data = $GLOBALS['config']['license_local_key'];
    if (!$data) {
        return false;
    }

    $buffer = @str_replace('<', '', $data);
    $buffer = @str_replace('>', '', $buffer);
    $buffer = @str_replace('?PHP', '', $buffer);
    $buffer = @str_replace('?', '', $buffer);
    $buffer = @str_replace('/*--', '', $buffer);
    $buffer = @str_replace('--*/', '', $buffer);

    return @str_replace("\n", '', $buffer);
}

function parse_local_key()
{
    if (!$GLOBALS['config']['license_local_key']) {
        return false;
    }

    $raw_data = @base64_decode(@get_key(), true);
    $raw_array = @explode('|', $raw_data);
    if (@is_array($raw_array) && @count($raw_array) < 8) {
        return false;
    }

    return $raw_array;
}

function validate_local_key()
{
    $raw_array = parse_local_key();
    if (!@is_array($raw_array) || false === $raw_array) {
        return "<verify status='grab_new_key' message='The local license key was empty.' />";
    }

    if ($raw_array[9] && 0 !== @strcmp(@md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$raw_array[9]), $raw_array[10])) {
        return "<verify status='invalid' message='The custom variables were tampered with.' />";
    }

    if (0 !== @strcmp(@md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$raw_array[1]), $raw_array[2])) {
        return "<verify status='invalid' message='The local license key checksum failed.' ".$raw_array[9].' />';
    }

    if ($raw_array[1] < time() && 'never' !== $raw_array[1]) {
        return "<verify status='expired' message='Fetching a new local key.' ".$raw_array[9].' />';
    }

    $directory_array = @explode(',', $raw_array[3]);
    $valid_dir = path_translated();
    $valid_dir = @md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$valid_dir);
    if (!@in_array($valid_dir, $directory_array, true)) {
        return "<verify status='invalid' message='The file path did not match what was expected.' ".$raw_array[9].' />';
    }

    $host_array = @explode(',', $raw_array[4]);
    if (!@in_array(@md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$_SERVER['HTTP_HOST']), $host_array, true)) {
        return "<verify status='invalid' message='The hostname did not match was was expected.' ".$raw_array[9].' />';
    }

    $ip_array = @explode(',', $raw_array[5]);
    $server_addr = server_addr();
    $ip_check = @in_array(@md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$server_addr), $ip_array, true);
    if (!$ip_check) {
        $server_addr = substr($server_addr, 0, strrpos($server_addr, '.'));
        $ip_check = @in_array(@md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$server_addr), $ip_array, true);
    }

    if (!$ip_check) {
        $server_addr = substr($server_addr, 0, strrpos($server_addr, '.'));
        $ip_check = @in_array(@md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.$server_addr), $ip_array, true);
    }

    if (!$ip_check) {
        return "<verify status='invalid_key' message='The IP address did not match what was expected.' ".$raw_array[9].' />';
    }

    return "<verify status='active' message='The license key is valid.' ".$raw_array[9].' />';
}

function make_token()
{
    return md5('1b1ddcb4ed069d9565cc6a5a9ecf553e'.time());
}

function phpaudit_exec_curl($array)
{
    $array = @explode('?', $array);
    $link = curl_init();
    curl_setopt($link, CURLOPT_URL, $array[0]);
    curl_setopt($link, CURLOPT_POSTFIELDS, $array[1]);
    curl_setopt($link, CURLOPT_VERBOSE, 0);
    curl_setopt($link, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($link, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($link, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($link, CURLOPT_MAXREDIRS, 6);
    curl_setopt($link, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($link, CURLOPT_TIMEOUT, 15);
    $results = curl_exec($link);
    if (0 < curl_errno($link)) {
        curl_close($link);

        return false;
    }

    curl_close($link);
    if (false === @strpos($results, 'verify')) {
        return false;
    }

    return $results;
}

function phpaudit_exec_socket($http_host, $http_dir, $http_file, $querystring)
{
    $fp = @fsockopen($http_host, 80, $errno, $errstr, 10);
    if (!$fp) {
        return false;
    }

    $header = 'POST '.$http_dir.$http_file." HTTP/1.0\r\n";
    $header .= 'Host: '.$http_host."\r\n";
    $header .= "Content-type: application/x-www-form-urlencoded\r\n";
    $header .= "User-Agent: PHPAudit v2 (http://www.phpaudit.com)\r\n";
    $header .= 'Content-length: '.@strlen($querystring)."\r\n";
    $header .= "Connection: close\r\n\r\n";
    $header .= $querystring;
    $data = false;
    if (@function_exists('stream_set_timeout')) {
        stream_set_timeout($fp, 20);
    }

    @fwrite($fp, $header);
    if (@function_exists('socket_get_status')) {
        $status = @socket_get_status($fp);
    } else {
        $status = true;
    }

    while (!@feof($fp) && $status) {
        $data .= @fgets($fp, 1024);
        if (@function_exists('socket_get_status')) {
            $status = @socket_get_status($fp);
        } else {
            if (true === @feof($fp)) {
                $status = false;
            } else {
                $status = true;
            }
        }
    }
    @fclose($fp);
    if (!strpos($data, '200')) {
        return false;
    }

    if (!$data) {
        return false;
    }

    $data = @explode("\r\n\r\n", $data, 2);
    if (!$data[1]) {
        return false;
    }

    if (false === @strpos($data[1], 'verify')) {
        return false;
    }

    return $data[1];
}

function path_translated()
{
    $option = ['PATH_TRANSLATED', 'ORIG_PATH_TRANSLATED', 'SCRIPT_FILENAME', 'DOCUMENT_ROOT', 'APPL_PHYSICAL_PATH'];
    foreach ($option as $key) {
        if (!isset($_SERVER[$key])) {
            continue;
        }

        if (strlen(trim($_SERVER[$key])) <= 0) {
            continue;
        }

        if ('Windows' === @substr(@php_uname(), 0, 7) && strpos($_SERVER[$key], '\\')) {
            return @substr($_SERVER[$key], 0, @strrpos($_SERVER[$key], '\\'));
        }

        return @substr($_SERVER[$key], 0, @strrpos($_SERVER[$key], '/'));
    }

    return false;
}

function server_addr()
{
    if (isset($_SERVER['SERVER_ADDR'])) {
        $ip = ($_SERVER['SERVER_ADDR'] ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR']);

        return $ip;
    }

    return '192.0.0.1';
}

?>