<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

$sub = stripslashes($_POST['subject']);
$sub = preg_replace("/{company_name}/", "$sitename", $sub);

$get_user=$db->prepare("select id, username, password, email, f_name, l_name from idevaff_affiliates where id = ?");
$get_user->execute(array($_POST['id']));
$get_details = $get_user->fetch();

$swi = $get_details['id'];
$swu = $get_details['username'];
$swf = $get_details['f_name'];
$swl = $get_details['l_name'];

$e = $get_details['email'];
$to = "$swu <$e>";
$message = stripslashes($_POST['message']);
$message = preg_replace("/{id}/", "$swi", $message);
$message = preg_replace("/{company_name}/", "$sitename", $message);
$message = preg_replace("/{username}/", "$swu", $message);
$message = preg_replace("/{password}/", "N/A", $message);
$message = preg_replace("/{first_name}/", "$swf", $message);
$message = preg_replace("/{last_name}/", "$swl", $message);
$message = preg_replace("/{email}/", "$e", $message);
$message = preg_replace("/{website_home}/", "$siteurl", $message);
$message = preg_replace("/{affiliate_home}/", "$base_url/index.php", $message);
$message = preg_replace("/{login_page}/", "$base_url/login.php", $message);
$message = preg_replace("/{aff_testimonials}/", "$base_url/testimonials.php", $message);
if ($link_style == 1) {
$message = preg_replace("/{aff_link}/", "$base_url/$filename.php?id=$swi", $message);
} elseif ($link_style == 2) {
$message = preg_replace("/{aff_link}/", "$seo_url{$swi}.html", $message); }

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
$content = nl2br($message) . "<br /><br />" . nl2br($signature);
} else {
$mail->isHTML(false);
$content = $message . "\n\n" . $signature;
}

$mail->Subject = "$sub";
$mail->From = "$address";
$mail->FromName = "$from_name";
$mail->AddAddress("$e","$swu");
$mail->Body = $content;

$mail->Send();
$mail->ClearAddresses();


?>