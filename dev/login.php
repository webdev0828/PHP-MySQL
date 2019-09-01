<?php

$control_panel_session = true;
include 'includes/control_panel.php';
$lockout_engaged = null;
if (!defined('SITE_KEY')) {
    require_once 'API/keys.php';
}

$idev_language = $_SESSION['idev_language'];
unset($_SESSION[$install_directory_name.'_idev_LoggedID']);
if (isset($_SESSION[$install_directory_name.'_idev_aff_lockout'])) {
    $lockout_engaged = true;
}

session_destroy();
$session = new session();
$session->start_session('_s', false);
$_SESSION['csrf_token'] = substr(md5(rand()), 0, 20);
$_SESSION['idev_language'] = $idev_language;
if (true === $lockout_engaged) {
    $_SESSION[$install_directory_name.'_idev_aff_lockout'] = true;
}

if (is_object($helper)) {
    $fb_login_url = $helper->getLoginUrl(['scope' => 'public_profile, email, publish_actions']);
} else {
    $fb_login_url = '#';
}

$smarty->clearAssign('affiliateUsername');
$override_login = check_type('override_login');
$override_id = check_type('override_id');
$override_secret = check_type('secret_key');
if (1 === $override_login && $override_secret === $secret) {
    $check_uservalid = $db->prepare('select id from idevaff_affiliates where id = ?');
    $check_uservalid->execute([$override_id]);
    if (0 < $check_uservalid->rowCount()) {
        $_SESSION[$install_directory_name.'_idev_LoggedID'] = $override_id;
        header('Location: /dashboard');
        exit();
    }
}

$temp_fields = "login_invalid,login_send_info,login_left_column_title,login_left_column_text,login_username,login_password,login_now,\r\nlogin_send_title,fb_login,login_return,login_lost_details,login_send_username,login_send_pass,login_title,login_send_bad";

try {
    $query = $db->query('select '.$temp_fields.' from `idevaff_language_'.$pack_table_selected.'` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: '.$ex->getFile().'<br><strong>Line:</strong> '.$ex->getLine().'<br><strong>Message:</strong> '.$ex->getMessage();
    exit();
}
$login_invalid = html_language_output($getlanguage['login_invalid']);
$login_send_info = html_language_output($getlanguage['login_send_info']);
$login_left_column_title = html_language_output($getlanguage['login_left_column_title']);
$login_left_column_text = html_language_output($getlanguage['login_left_column_text']);
$login_username = html_language_output($getlanguage['login_username']);
$login_password = html_language_output($getlanguage['login_password']);
$login_now = html_language_output($getlanguage['login_now']);
$login_send_title = html_language_output($getlanguage['login_send_title']);
$login_send_username = html_language_output($getlanguage['login_send_username']);
$login_send_pass = html_language_output($getlanguage['login_send_pass']);
$login_title = html_language_output($getlanguage['login_title']);
$login_send_bad = html_language_output($getlanguage['login_send_bad']);
if (isset($_POST['userid'])) {
    if ('' !== $_POST['userid']) {
        $username = strip_tags(trim($_POST['userid']));
    }
} else {
    $username = null;
}

if (isset($_POST['password'])) {
    if ('' !== $_POST['password']) {
        $password = strip_tags(trim($_POST['password']));
    }
} else {
    $password = null;
}

if (isset($username, $password) && !isset($_SESSION[$install_directory_name.'_idev_aff_lockout'])) {
    $token_affiliate_login = '';
    if (isset($_POST['token_affiliate_login']) && '' !== $_POST['token_affiliate_login']) {
        $token_affiliate_login = strip_tags(trim($_POST['token_affiliate_login']));
    }

    $token_db = '';
    $token_db = $db->query('select affiliate_login from idevaff_tokens');
    $token_db_results = $token_db->fetch();
    $token_db = $token_db_results['affiliate_login'];
    $login_ok = false;
    $passcheck = $password;
    $query = 'select * from idevaff_affiliates where username = ? LIMIT 1';
    $result = $db->prepare($query);
    $result->execute([$username]);
    if ($result->rowCount()) {
        $row = $result->fetch();
        if (array_key_exists('user_key', $row) && '' !== $row['user_key']) {
            $hash = $row['password'];
            $user_key = $row['user_key'];
            $password_to_check = $user_key.$passcheck;
            if (password_verify($password_to_check, $hash)) {
                $login_ok = true;
                if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
                    $newHash = password_hash($user_key.$passcheck, PASSWORD_DEFAULT);
                    $sql = 'UPDATE `idevaff_affiliates` set `password`= ? WHERE id = ?';
                    $q = $db->prepare($sql);
                    $q->execute([$newHash, $row['id']]);
                }
            } else {
                $password_to_check = SITE_KEY.$passcheck.$row['user_key'];
                if (password_verify($password_to_check, $hash)) {
                    $login_ok = true;
                    $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22);
                    $password_enc = password_hash($user_key.$passcheck, PASSWORD_DEFAULT);
                    $sql = 'UPDATE `idevaff_affiliates` set `user_key`=?, `password`=? WHERE id = ?';
                    $q = $db->prepare($sql);
                    $q->execute([$user_key, $password_enc, $row['id']]);
                } else {
                    $login_ok = false;
                }
            }
        } else {
            $passcheck = sha1('idev_secret'.$password);
            if ($row['password'] === $passcheck) {
                $login_ok = true;
                $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22);
                $password_enc = password_hash($user_key.$password, PASSWORD_DEFAULT);
                $sql = 'UPDATE `idevaff_affiliates` set `user_key`=?, `password`=? WHERE id = ?';
                $q = $db->prepare($sql);
                $q->execute([$user_key, $password_enc, $row['id']]);
            } else {
                $login_ok = false;
            }
        }
    }

    if (true === $login_ok) {
        $logged_id = $row['id'];
        $_SESSION[$install_directory_name.'_idev_LoggedID'] = $logged_id;
        if (1 === $testimonials_security) {
            $prereqs_cp = null;
            if (extension_loaded('gd') && function_exists('gd_info')) {
                $arr_gd_info = gd_info();
                if (true === $arr_gd_info['FreeType Support']) {
                    $prereqs_cp = true;
                }
            }

            if (!isset($prereqs_cp)) {
                $db->query("update idevaff_config set testimonials_security = '0'");
            }
        }

        $log_time = time();
        $sql = 'UPDATE idevaff_affiliates set last_logged = ? where id = ?';
        $q = $db->prepare($sql);
        $q->execute([$log_time, $row['id']]);
        AffiliatelogEntry($username.'|'.$ip_addr.'|'.'Affiliate Login Success');
        $st = $db->prepare('delete from idevaff_aff_lockout where ip = ?');
        $st->execute([$ip_addr]);
        unset($_SESSION[$install_directory_name.'_idev_aff_lockout']);
        header('Location: /dashboard');
        // TODO: also log in to wordpress
        // TODO; signup should also create wordpress user in validate.php
        // require_once '/var/www/sublimerevenue.com/blog/wp-load.php';
        // wp_set_auth_cookie($logged_id);
        exit();
    }

    AffiliatelogEntry($username.'|'.$ip_addr.'|'.'Affiliate Login Failure');
    $time_now = time();
    $query = $db->prepare('SELECT ip, attempts, code FROM idevaff_aff_lockout WHERE ip = ?');
    $query->execute([$ip_addr]);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $attempts_left_result = $query->fetch();
    $attempts_left_number = $attempts_left_result['attempts'];
    $attempts_left_code = $attempts_left_result['code'];
    if (0 < $query->rowCount()) {
        if (0 < $attempts_left_number) {
            $st = $db->prepare('update idevaff_aff_lockout set attempts=attempts-1, code = ? where ip = ?');
            $st->execute([$time_now, $ip_addr]);
        }
    } else {
        $st = $db->prepare('insert into idevaff_aff_lockout (ip, attempts, code) VALUES (?, ?, ?)');
        $st->execute([$ip_addr, '4', $time_now]);
    }

    $query = $db->prepare('select ip, attempts, code from idevaff_aff_lockout where ip = ?');
    $query->execute([$ip_addr]);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $attempts_left_result = $query->fetch();
    $attempts_left_number = $attempts_left_result['attempts'];
    $attempts_left_code = $attempts_left_result['code'];
    if (0 < (int) $attempts_left_number) {
        $fail_message = '<strong>Error!</strong> Invalid login credentials. You have '.$attempts_left_number.' more attempts before timed lockout.';
    }

    $noauth = 1;
}

$time_now = time();
$expire_time = 60 * 5;
$query = $db->prepare('select attempts, code from idevaff_aff_lockout where ip = ?');
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
    $st = $db->prepare('delete from idevaff_aff_lockout where ip = ?');
    $st->execute([$ip_addr]);
    unset($_SESSION[$install_directory_name.'_idev_aff_lockout']);
} else {
    if (0 === (int) $attempts_left_number) {
        $_SESSION[$install_directory_name.'_idev_aff_lockout'] = true;
        $fail_message = '<strong>Error!</strong> You are currently locked out for excessive login attempts.<br /><br />You can try again in '.$sentence;
        $lockout_engaged = true;
    }
}

if (isset($_POST['sendpass'])) {
    $token_affiliate_creds = '';
    if (isset($_POST['token_affiliate_creds']) && '' !== $_POST['token_affiliate_creds']) {
        $token_affiliate_creds = html_output($_POST['token_affiliate_creds'], ENT_QUOTES, 'UTF-8');
    }

    $token_db = $db->query('select affiliate_creds from idevaff_tokens');
    $token_db_results = $token_db->fetch();
    $token_db = $token_db_results['affiliate_creds'];
    $adata = $db->prepare('select id from idevaff_affiliates where username = ?');
    $adata->execute([$_POST['sendpass']]);
    if ($adata->rowCount()) {
        $user_id = $adata->fetch();
        $user_id = $user_id['id'];
        include 'includes/random.php';
        $new_password = iDevRandomAlphaNum();
        $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22);
        $newpass = password_hash(SITE_KEY.$new_password.$user_key, PASSWORD_BCRYPT);
        $sql = 'UPDATE `idevaff_affiliates` set `user_key`=?, `password`=? WHERE id=?';
        $q = $db->prepare($sql);
        $q->execute([$user_key, $newpass, $user_id]);
        include $path.'/templates/email/affiliate.send_login.php';
        $logindetails = 1;
    } else {
        $logindetails = 2;
    }
}

if (isset($_REQUEST['lost_password'])) {
    $smarty->assign('lost_password_request', 1);
}

if (isset($noauth)) {
    $smarty->assign('login_invalid', $login_invalid);
}

if (isset($lockout_engaged)) {
    $smarty->assign('lockout_engaged', $lockout_engaged);
}

if (isset($fail_message)) {
    $smarty->assign('fail_message', $fail_message);
}

if (isset($logindetails) && 1 === $logindetails) {
    $smarty->assign('login_details', $login_send_info);
}

if (isset($logindetails) && 2 === $logindetails) {
    $smarty->assign('login_details', $login_send_bad);
}

$smarty->assign('login_left_column_title', $login_left_column_title);
$smarty->assign('login_left_column_text', $login_left_column_text);
$smarty->assign('login_title', $login_title);
$smarty->assign('login_username', $login_username);
$smarty->assign('login_password', $login_password);
$smarty->assign('login_now', $login_now);
$smarty->assign('login_send_title', $login_send_title);
$smarty->assign('login_send_username', $login_send_username);
$smarty->assign('login_send_pass', $login_send_pass);
include_once 'includes/tokens.php';
$smarty->assign('fb_login_url', $fb_login_url);
$smarty->display('login.tpl');

?>
