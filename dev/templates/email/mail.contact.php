<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$ip = $_SERVER["REMOTE_ADDR"];
$country = file_get_contents ( 'http://api.hostip.info/country.php?ip=' . $ip ); 
$e = $email;
$u = $name;
$m = stripslashes($message);
if ($alternate_email_address == '') { $alternate_email_address = $address; }

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
$content = nl2br($m) . "<br /><br />Sent From: " . $u . "<br />Senders Email: " . $e . "<br />IP: " .$ip . "<br />Country: " .$country;
} else {
$mail->isHTML(false);
$content = $m . "\n\nSent From: " . $u . "\nSenders Email: " . $e . "\nIP: " . $ip . "\nCountry: " .$country;
}

// TODO get request department

$mail->Subject = "Affiliate Contact";
$mail->From = "$address";
$mail->FromName = "$from_name";
$mail->AddAddress("$alternate_email_address","$from_name");
$mail->AddReplyTo("$e", "$u");
$mail->Body = $content;

$mail->Send();
$mail->ClearAddresses();


?>