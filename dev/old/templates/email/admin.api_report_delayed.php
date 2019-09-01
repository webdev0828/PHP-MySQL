<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

if ($api_email_address == '') { $api_email_address = $address; }

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

if (isset($email_success)) {
if ($email_html_delivery == true) {
$mail->isHTML(true);
$content = "Sublime Revenue Daily Delayed Commissions Report<br />----------------------------------------------------------------<br />Total Delayed Commissions In Queue: " . $total_delayed . "<br />Delayed Commissions Processed Today: " . $processing . "<br /><br />--------<br />Message Auto-Sent By Sublime Revenue " . $version;
} else {
$mail->isHTML(false);
$content = "Sublime Revenue Daily Delayed Commissions Report\n----------------------------------------------------------------\nTotal Delayed Commissions In Queue: " . $total_delayed . "\nDelayed Commissions Processed Today: " . $processing . "\n\n--------\nMessage Auto-Sent By Sublime Revenue " . $version;
}

} else {

if (!$secret) { $secret = "None"; }
if ($email_html_delivery == true) {
$mail->isHTML(true);
$content = "Invalid or missing secret key. No delayed commissions were processed.<br/><br />Key Used: ". $secret . "<br /><br />--------<br />Message Auto-Sent By Sublime Revenue " . $version;
} else {
$mail->isHTML(false);
$content = "Invalid or missing secret key. No delayed commissions were processed.\n\nKey Used: ". $secret . "\n\n--------\nMessage Auto-Sent By Sublime Revenue " . $version;
}
}

$mail->Subject = "Sublime Revenue Delayed Commissions Report";
$mail->From = "$api_email_address";
$mail->FromName = "Sublime Revenue System";
$mail->AddAddress("$api_email_address","Sublime Revenue System");

// Added for multiple CC's, semi-colon separated.
if($cc_email == true) {
	$cc_emails = explode(";", $cc_email_address);
	foreach($cc_emails as $added_cc_emails)
	{
		$added_cc_emails_stripped = str_replace(' ', '', $added_cc_emails);
		$mail->AddCC($added_cc_emails_stripped,"Sublime Revenue Admin");
	}
}

$mail->Body = $content;

$mail->Send();
$mail->ClearAddresses();

?>