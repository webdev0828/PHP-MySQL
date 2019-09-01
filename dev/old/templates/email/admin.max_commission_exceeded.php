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

$edata=$db->query("select admin_max_comm_exceeded_sub, admin_max_comm_exceeded_body from idevaff_email_english");
$indv_data=$edata->fetch();
$sub=$indv_data['admin_max_comm_exceeded_sub'];
$sub = preg_replace("/{company_name}/", "$sitename", $sub);
$con=$indv_data['admin_max_comm_exceeded_body'];
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

$avar_email=number_format($avar,$decimal_symbols);
if($cur_sym_location == 1) { $avar_email = $cur_sym . $avar_email; }
if($cur_sym_location == 2) { $avar_email = $avar_email . " " . $cur_sym; }
$avar_email = $avar_email . " " . $currency;

$payout_email=number_format($payout,$decimal_symbols);
if($cur_sym_location == 1) { $payout_email = $cur_sym . $payout_email; }
if($cur_sym_location == 2) { $payout_email = $payout_email . " " . $cur_sym; }
$payout_email = $payout_email . " " . $currency;

$max_comm_amt_email=number_format($max_comm_amt,$decimal_symbols);
if($cur_sym_location == 1) { $max_comm_amt_email = $cur_sym . $max_comm_amt_email; }
if($cur_sym_location == 2) { $max_comm_amt_email = $max_comm_amt_email . " " . $cur_sym; }
$max_comm_amt_email = $max_comm_amt_email . " " . $currency;

$exceeded_amt = $payout - $max_comm_amt;
$exceeded_amt=number_format($exceeded_amt,$decimal_symbols);
if($cur_sym_location == 1) { $exceeded_amt = $cur_sym . $exceeded_amt; }
if($cur_sym_location == 2) { $exceeded_amt = $exceeded_amt . " " . $cur_sym; }
$exceeded_amt = $exceeded_amt . " " . $currency;

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
$content = nl2br($con) . "<br />------------------------------------------------<br />Affiliate: " . $name . "<br />Affiliate Email: " . $e . "<br />Order Number: " . $idev_ordernum . "<br />Customer IP: " . $ip_addr . "<br />Sale Amount: " . $avar_email . "<br />Commission Amount: " . $payout_email . "<br />------------------------------------------------<br />Max Commission Amount Allowed: " . $max_comm_amt_email . "<br />Commission Amount Exceeded By: " . $exceeded_amt . "<br /><br />--------<br />Message Auto-Sent By Sublime Revenue " . $version;
} else {
$mail->isHTML(false);
$content = $con . "\n------------------------------------------------\nAffiliate: " . $name . "\nAffiliate Email: " . $e . "\nOrder Number: " . $idev_ordernum . "\nCustomer IP: " . $ip_addr . "\nSale Amount: " . $avar_email . "\nCommission Amount: " . $payout_email . "\n------------------------------------------------\nMax Commission Amount Allowed: " . $max_comm_amt_email . "\n\nCommission Amount Exceeded By: " . $exceeded_amt . "\n\n--------\nMessage Auto-Sent By Sublime Revenue " . $version;
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