<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

include_once($path . "/templates/email/PHPMailerAutoload.php");
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer();

$mail->SMTPAutoTLS = false;
//$mail->Timeout = 600;
//$mail->SMTPDebug = 2;

if ($email_smtp_delivery == true) {
$mail->IsSMTP();
	if ( $smtp_auth == 'true' ) {
		$mail->SMTPAuth = true;
	} else {
		$mail->SMTPAuth = false;
	}
	$mail->SMTPSecure = "$smtp_security";
	$mail->Host = "$smtp_host";
	$mail->Port = $smtp_port;
	$mail->Username = "$smtp_user";
	$mail->Password = "$smtp_pass";
}
$mail->CharSet = "$smtp_char_set";

if ($email_html_delivery == true) {
$mail->isHTML(true);
$sendBody = "Dear Admin,<br /><br />If you're reading this email, your email settings are correct.<br /><br />" . nl2br($signature);
} else {
$mail->isHTML(false);
$sendBody = "Dear Admin,\n\nIf you're reading this email, your email settings are correct.\n\n$signature";
}

$mail->Subject = "Sublime Revenue Test Email";
$mail->From = "$address";
$mail->FromName = $from_name;
$mail->AddAddress("$address","Sublime Revenue Admin");

// Added for multiple CC's, semi-colon separated.
if($cc_email == true) {
	$cc_emails = explode(";", $cc_email_address);
	foreach($cc_emails as $added_cc_emails)
	{
		$added_cc_emails_stripped = str_replace(' ', '', $added_cc_emails);
		$mail->AddCC($added_cc_emails_stripped,"Sublime Revenue Admin");
	}
}

$mail->Body = $sendBody;

// $mail->Send();

if(!$mail->Send()) {
  echo "<br /><div class='alert alert-danger'>Mailer Error: " . $mail->ErrorInfo . " Please check your email settings. <a href='setup.php?action=31&tab=5' class='btn btn-danger btn-sm'>Watch Video Tutorial</a></div>";
} else {
//  echo "Message sent!";
}

$mail->ClearAddresses();



?>