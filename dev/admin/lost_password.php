<?PHP

if (file_exists('../install/')) { header("Location: error.php"); }
include ("../API/config.php");


if (isset($_SESSION[$install_directory_name.'_idev_LoggedAdmin'])) { header("Location: dashboard.php"); exit(); }

// ------------------------------------------------
// PROCESS LOST PASSWORD REQUEST
// ------------------------------------------------

if ((isset($_POST['lost_email'])) && ($_POST['lost_email'] != '')) {
$token = null;
if ((isset($_POST['token'])) && (!empty($_POST['token']))) { $token = $_POST['token']; }
//if ($token === $_SESSION['token_lost_password']) {

$lost_email_db = $_POST['lost_email'];

	$get_email = $db->prepare("select * from idevaff_admin where email = ?");
	$get_email->execute(array($lost_email_db));
	if ($get_email->rowCount()) {

	$get_email_details = $get_email->fetch();
	$username = $get_email_details['adminid'];
	$email = $get_email_details['email'];

	include("../includes/random.php");
	$new_password = iDevRandomAlphaNum();

        $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), '+', '.'), 0, 22); //store this to database as user_key 
        $newpass = password_hash($user_key . $new_password, PASSWORD_DEFAULT) ;
        
	$st=$db->prepare ("update idevaff_admin set adminpass = ?, user_key = ? where adminid = ?");
	$st->execute(array($newpass,$user_key,$username));

	$_SESSION[$install_directory_name.'_new_password_request'] = $new_password;

	include ($path . "/templates/email/admin.login.php");

	$reset_message_1 = "New login details have been emailed to you.";
	$reset_message_2 = "If you don't find the email, be sure to check your SPAM box.<br /><br /><font size=\"3\" color=\"#CC0000\">IMPORTANT!</font><br />You will only receive this email if your email settings are properly configured in your admin center. If they are not, you will need to manually reset the password directly in your database.<br /><br />You can manually reset the password if needed, click the button below for instructions.<br /><br /><form action=\"https://help.idevaffiliate.com/admin-center-password-reset/\" target=\"_blank\" method=\"post\"><button class=\"btn btn-default\">Manual Password Reset</button></form>";

	} else {
	$reset_message_1 = "Login Retrieval Error";
	$reset_message_2 = "Email address not found."; }
	
//} else {
//	$reset_message_1 = "Login Retrieval Error";
//	$reset_message_2 = "Token doesn't match.";
//}
	
	}

$_SESSION['token_lost_password'] = substr(md5(rand()), 0, 20);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Sublime Revenue Administrative Center</title>

	<link href="templates/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="templates/css/main.css" rel="stylesheet" type="text/css" />
	<link href="templates/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="templates/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="templates/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="templates/css/login.css" rel="stylesheet" type="text/css" />
	<link href="templates/css/custom.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="templates/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]><link rel="stylesheet" href="templates/css/fontawesome/font-awesome-ie7.min.css"><![endif]-->
	<!--[if IE 8]><link href="templates/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="templates/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/js/libs/underscore.min.js"></script>
	<!--[if lt IE 9]><script src="templates/js/libs/html5shiv.js"></script><![endif]-->
	<script type="text/javascript" src="templates/plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="templates/js/login.js"></script>
	<script>
	$(document).ready(function(){
		"use strict";
		Login.init(); // Init login JavaScript
	});
	</script>

</head>

<body class="login">


<div class="box">
<div class="content">

	<div style="margin-bottom:25px;"><span><img src="images/idevaffiliate_logo.png" alt="logo" style="margin-top:6px;" /></span><span class="pull-right"><h3 class="form-title">Admin Center Login</h3></span></div>

	<h3 class="form-title">Lost Login Credentials?<br /><small>Retrieve your login information and reset your password below.</small></h3>
	
	<?PHP if (isset($reset_message_1)) { ?>
	<div class="alert alert-info">
	<strong><font style="font-size:16px;"><?PHP echo $reset_message_1; ?></font></strong>
	</div>
	<?PHP } ?>
	
	
<form class="form-vertical login-form" action="lost_password.php" method="post">

<div class="form-group">
<label for="username">Enter Your Email Address</label>
<div class="input-icon"><i class="icon-envelope"></i><input type="text" name="lost_email" class="form-control" placeholder="Email Address" /></div>
</div>
<div class="form-actions">
<a href="index.php" class="btn btn-warning">Return To Login</a>
<button type="submit" class="submit btn btn-blue-login pull-right">Send Login Credentials</button>
</div>
<input name="token" value="<?PHP echo html_output($_SESSION['token_lost_password']); ?>" type="hidden" />
</form>

<br />


</div>



</div>

</body>
</html>