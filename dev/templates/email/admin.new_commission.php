<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_EMAIL')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$adata=$db->prepare("select id, username, password, f_name, l_name, email from idevaff_affiliates where id = ?");
$adata->execute(array($idev));
$indv_data=$adata->fetch();
$id=$indv_data['id'];
$name=$indv_data['username'];
$pass=$indv_data['password'];
$fname=$indv_data['f_name'];
$lname=$indv_data['l_name'];
$e=$indv_data['email'];

$edata=$db->query("select admin_sale_subject, admin_sale_body from idevaff_email_english");
$indv_data=$edata->fetch();
$sub=$indv_data['admin_sale_subject'];
$sub = preg_replace("/{company_name}/", "$sitename", $sub);
$con=$indv_data['admin_sale_body'];
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

$getname=$db->prepare("select username from idevaff_affiliates where id = ?");
$getname->execute(array($idev));
$name=$getname->fetch();
$uname=$name['username'];

// ADD TIER DATA
function GetTierUsername($value) {
	global $db;
$tier_username = $db->prepare("select username from idevaff_affiliates where id = ?");
$tier_username->execute(array($value));
$tier_username = $tier_username->fetch();
return $tier_username['username']; }

if ($email_html_delivery == true) { $new_line = "<br />"; }
if ($email_html_delivery == false) { $new_line = "\n"; }

$tier_add = null;
if (isset($t1_account)) { $tier_add .= "Tier Affiliate 1: " . GetTierUsername($texist) . $new_line; }
if (isset($t2_account)) { $tier_add .= "Tier Affiliate 2: " . GetTierUsername($idev_tier_2) . $new_line; }
if (isset($t3_account)) { $tier_add .= "Tier Affiliate 3: " . GetTierUsername($idev_tier_3) . $new_line; }
if (isset($t4_account)) { $tier_add .= "Tier Affiliate 4: " . GetTierUsername($idev_tier_4) . $new_line; }
if (isset($t5_account)) { $tier_add .= "Tier Affiliate 5: " . GetTierUsername($idev_tier_5) . $new_line; }
if (isset($t6_account)) { $tier_add .= "Tier Affiliate 6: " . GetTierUsername($idev_tier_6) . $new_line; }
if (isset($t7_account)) { $tier_add .= "Tier Affiliate 7: " . GetTierUsername($idev_tier_7) . $new_line; }
if (isset($t8_account)) { $tier_add .= "Tier Affiliate 8: " . GetTierUsername($idev_tier_8) . $new_line; }
if (isset($t9_account)) { $tier_add .= "Tier Affiliate 9: " . GetTierUsername($idev_tier_9) . $new_line; }
if (isset($t10_account)) { $tier_add .= "Tier Affiliate 10: " . GetTierUsername($idev_tier_10) . $new_line; }

// ADD COMMISSION DATA

$commission_amount = number_format($commission_amount,$decimal_symbols);
if($cur_sym_location == 1) { $commission_amount = $cur_sym . $commission_amount; }
if($cur_sym_location == 2) { $commission_amount = $commission_amount . " " . $cur_sym; }
$commission_amount = $commission_amount . " " . $currency;

$amt = "Commission Amount: " . $commission_amount;

if (!isset($note_added)) { $note_added = null; } else {
$note_added = "This affiliate has been informed of this commission via email notification."; }

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
}
$mail->CharSet = "$smtp_char_set";

if ($email_html_delivery == true) {
$mail->isHTML(true);
$content = nl2br($con) . "<br /><br />Affiliate: " . $uname . "<br />" . $tier_add . "Order Number: " . $order_number . "<br />Commission Amount: " . $commission_amount . "<br />Commission Status: " . $commission_status . "<br /><br />" . $note_added . "<br /><br />--------<br />Message Auto-Sent By Sublime Revenue " . $version;
} else {
$mail->isHTML(false);
$content = $con . "\n\nAffiliate: " . $uname . "\n" . $tier_add . "Order Number: " . $order_number . "\nCommission Amount: " . $commission_amount . "\nCommission Status: " . $commission_status . "\n\n" . $note_added . "\n\n--------\nMessage Auto-Sent By Sublime Revenue " . $version;
}

$mail->Subject = "$sub";
$mail->From = "$address";
$mail->FromName = "Sublime Revenue Mailbox";
$mail->AddAddress("$address","Sublime Revenue Mailbox");

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