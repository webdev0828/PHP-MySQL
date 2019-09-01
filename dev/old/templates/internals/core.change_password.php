<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'signup_security_info,password_warning_old_missing,password_warning_new_missing,password_warning_mismatch,password_warning_invalid,password_notice';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$password_warning_old_missing=html_language_output($getlanguage['password_warning_old_missing']);
$password_warning_new_missing=html_language_output($getlanguage['password_warning_new_missing']);
$password_warning_mismatch=html_language_output($getlanguage['password_warning_mismatch']);
$password_warning_invalid=html_language_output($getlanguage['password_warning_invalid']);
$password_notice=html_language_output($getlanguage['password_notice']);

if(!defined('SITE_KEY')) {
    require_once 'API/keys.php';
}
$nogood = null;

if ($_POST['change_password'] == 1) {

if ((!$_POST['pass2']) || (!$_POST['pass3'])) {
$smarty->assign('password_warning', $password_warning_new_missing);
$nogood = 1;
}

if (!isset($nogood)) {
if ($_POST['pass2'] != $_POST['pass3']) {
$smarty->assign('password_warning', $password_warning_mismatch);
$nogood = 1;
} }

if (!isset($nogood)) {

function valid_input($credential) {
global $db;
$pass_char_lengths = $db->query("select pass_min from idevaff_config");
$pass_char_lengths = $pass_char_lengths->fetch();
$pass_min = $pass_char_lengths['pass_min'];
$rtn_value = false;
if (get_magic_quotes_gpc()) { $credential = stripslashes($credential); }

//if(strlen($credential) >= $pass_min) {
//$rtn_value=true; }

if (strlen($credential) >= $pass_min) {
if (!(preg_match("/[^a-z0-9\!@#\$%\^&\*\(\)\-_ \[\]\{\}<>\+=]/i", $credential))) {
$rtn_value=true; }
}

return $rtn_value; }



$passcheck = $_POST['pass3'];
if(valid_input($passcheck)) {
$valid_input_credentials = true;
} else {
$smarty->assign('password_warning', $password_warning_invalid); }
if (isset($valid_input_credentials)) {
if($valid_input_credentials == true) {

$passcheck = $_POST['pass3'];

$user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22); //store this to database as user_key 
$passcheck = password_hash($user_key . $passcheck, PASSWORD_DEFAULT) ;

$sql = "UPDATE `idevaff_affiliates` set `user_key`=?, `password`=? WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($user_key,$passcheck,$linkid));

$smarty->assign('password_notice', $password_notice); 


} }

}
}

?>

