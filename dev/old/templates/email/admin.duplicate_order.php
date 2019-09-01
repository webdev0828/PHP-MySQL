<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

include_once($path . "/templates/email/PHPMailerAutoload.php");
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer();
$mail->SMTPAutoTLS = false;

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
$mail->Password = "$smtp_pass"; }
$mail->CharSet = "$smtp_char_set";

if ($email_html_delivery == true) {
$mail->isHTML(true);
$sendBody = "Sublime Revenue tried to write a new commission to the system and couldn't.  This is because a commission already exists in the database with this order number.<br /><br />--------<br />Duplicate Order Number: " . $idev_ordernum . "<br />--------<br /><br />To change these settings and allow duplicate order numbers into the system, login to your admin center and navigate to the following area.<br /><br />General Settings > Fraud Control - Pick a setting other than \"Order Number\".<br /><br />--------<br />Message Auto-Sent By Sublime Revenue " . $version;
} else {
$mail->isHTML(false);
$sendBody = "Sublime Revenue tried to write a new commission to the system and couldn't.  This is because a commission already exists in the database with this order number.\n\n--------\nDuplicate Order Number: " . $idev_ordernum . "\n--------\n\nTo change these settings and allow duplicate order numbers into the system, login to your admin center and navigate to the following area.\n\nGeneral Settings > Fraud Control - Pick a setting other than \"Order Number\".\n\n--------\nMessage Auto-Sent By Sublime Revenue " . $version;
}

$mail->Subject = "Sublime Revenue Duplicate Commission Error";
$mail->From = "$address";
$mail->FromName = "Sublime Revenue System";
$mail->AddAddress("$address","Sublime Revenue System");

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

$mail->Send();
$mail->ClearAddresses();

?>