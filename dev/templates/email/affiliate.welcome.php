<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

// ----------------------------------------------------------
// SANITIZE AND ASSIGN THE VARIABLE
// ----------------------------------------------------------
   $username = check_type('username');
// ----------------------------------------------------------

$adata=$db->prepare("select id, username, password, f_name, l_name, email, email_override from idevaff_affiliates where username = ?");
$adata->execute(array($username));
$indv_data=$adata->fetch();
$id=$indv_data['id'];
$name=$indv_data['username'];
$pass=$indv_data['password'];
$fname=$indv_data['f_name'];
$lname=$indv_data['l_name'];
$e=$indv_data['email'];
$email_override=$indv_data['email_override'];

// Not used for welcome email.
//if ($email_override) { $email_table_extension = $email_override; }

// Override to currently selected browser language.
$language_override_query = $db->query("SHOW TABLES LIKE 'idevaff_email_" . $pack_table_selected . "'");
if ( $language_override_query->rowCount() == 1 ) {
$email_table_extension = $pack_table_selected;
}

// ------------------------------------------------
$edata=$db->query("select welcome_subject, welcome_body from idevaff_email_$email_table_extension");
$indv_data=$edata->fetch();
$sub=$indv_data['welcome_subject'];
$sub = preg_replace("/{company_name}/", "$sitename", $sub);
$con=$indv_data['welcome_body'];
// ------------------------------------------------
include_once($path . "/templates/email/deprecated_tokens.php");
$con = preg_replace("/{id}/", "$id", $con);
$con = preg_replace("/{company_name}/", "$sitename", $con);
$con = preg_replace("/{username}/", "$name", $con);
$con = preg_replace("/{password}/", "N/A", $con);
$con = preg_replace("/{first_name}/", "$fname", $con);
$con = preg_replace("/{last_name}/", "$lname", $con);
$con = preg_replace("/{email}/", "$e", $con);
$con = preg_replace("/{website_home}/", "$siteurl", $con);
$con = preg_replace("/{affiliate_home}/", "$base_url/index.php", $con);
$con = preg_replace("/{login_page}/", "$base_url/login.php", $con);
$con = preg_replace("/{aff_testimonials}/", "$base_url/testimonials.php", $con);

if ($link_style == 1) {
$con = preg_replace("/{aff_link}/", "$base_url/$filename.php?id=$id", $con);
} elseif ($link_style == 2) {
$con = preg_replace("/{aff_link}/", "$seo_url{$id}.html", $con); }

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
$mail->Password = "$smtp_pass";

// ----------------------------------------------------------
// CHECK FOR EMAIL ATTACHMENT
// ----------------------------------------------------------
$get_attachment = $db->query("select template_id, filename from idevaff_email_attachments where template_id = '1' and enabled = '1'");
if ($get_attachment->rowCount()) {
$attachment_data = $get_attachment->fetch();
$attachment_filename = $attachment_data['filename'];
if (file_exists($path . "/media/email_attachments/" . $attachment_filename)) {
$mail->AddAttachment($path . "/media/email_attachments/" . $attachment_filename, $attachment_filename); } }
// ----------------------------------------------------------

}
$mail->CharSet = "$smtp_char_set";

if ($email_html_delivery == true) {
$mail->isHTML(true);
$content = nl2br($con) . "<br /><br />" . nl2br($signature);
} else {
$mail->isHTML(false);
$content = $con . "\n\n" . $signature;
}

$mail->Subject = "$sub";
$mail->From = "$address";
$mail->FromName = "$from_name";
$mail->AddAddress("$e","$name");
$mail->Body = $content;

$mail->Send();
$mail->ClearAddresses();

?>