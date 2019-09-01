<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

if ($declined_reason == 1) { $declined_content = "The profile ID number was not passed to the sale.php file."; }
if ($declined_reason == 2) { $declined_content = "The profile ID passed to the sale.php file is not valid."; }
if ($declined_reason == 3) { $declined_content = "The profile ID passed to the sale.php file is not enabled."; }
if ($declined_reason == 4) { $declined_content = "The secret key was not passed to the sale.php file."; }
if ($declined_reason == 5) { $declined_content = "The secret key passed to the sale.php file is invalid."; }

if (isset($ip_addr)) { $ip_info = "IP Address: " . $ip_addr; } else { $ip_info = null; }

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
$sendBody = "Dear Admin,<br /><br />Your commission processing file protection has been activated.<br /><br />Reason: " . $declined_content . "<br /><br />" . $ip_info . "<br /><br />--------<br />Message Auto-Sent By Sublime Revenue " . $version;
} else {
$mail->isHTML(false);
$sendBody = "Dear Admin,\n\nYour commission processing file protection has been activated.\n\nReason: " . $declined_content . "\n\n" . $ip_info . "\n\n--------\nMessage Auto-Sent By Sublime Revenue " . $version;
}

$mail->Subject = "Sublime Revenue Processing Protection Activated";
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

$mail->Send();
$mail->ClearAddresses();

?>