<?php

require_once '../../API/config.php';
include $path . '/templates/email/PHPMailerAutoload.php';

if ($api_email_address == '') {
	$api_email_address = $address;
}

$secret = check_type_api('secret');
$get_rows = $db->prepare('select secret from idevaff_config where secret = ? limit 1');
$get_rows->execute(array($secret));
if (is_numeric($secret) && $get_rows->rowCount()) {
	$db->query('update idevaff_affiliates set level = \'1\' where level != 9');

	if ($email_html_delivery == true) {
		$content = 'Payout levels for all affiliates but internal ones have been reset to level 1.<br /><br />--------<br />Message Auto-Sent By SublimeRevenue ' . $version;
	}
	else {
		$content = 'Payout levels for all affiliates but internal ones have been reset to level 1.' . "\n\n" . '--------' . "\n" . 'Message Auto-Sent By SublimeRevenue ' . $version;
	}
}
else {
	if (!$secret) {
		$secret = 'None';
	}

	if ($email_html_delivery == true) {
		$content = 'Invalid or missing secret key. Payout levels have not been reset.<br /><br />Key Used: ' . $secret . '<br /><br />--------<br />Message Auto-Sent By SublimeRevenue ' . $version;
	}
	else {
		$content = 'Invalid or missing secret key. Payout levels have not been reset.' . "\n\n" . 'Key Used: ' . $secret . "\n\n" . '--------' . "\n" . 'Message Auto-Sent By SublimeRevenue ' . $version;
	}
}

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->SMTPAutoTLS = false;

if ($email_smtp_delivery == true) {
	$mail->IsSMTP();
	$mail->SMTPAuth = $smtp_auth;
	$mail->SMTPSecure = $smtp_security;
	$mail->Host = $smtp_host;
	$mail->Port = $smtp_port;
	$mail->Username = $smtp_user;
	$mail->Password = $smtp_pass;
}

$mail->CharSet = $smtp_char_set;

if ($email_html_delivery == true) {
	$mail->isHTML(true);
}
else {
	$mail->isHTML(false);
}

$mail->Subject = 'SublimeRevenue API - Payout Level Reset';
$mail->From = $api_email_address;
$mail->FromName = 'SublimeRevenue System';
$mail->AddAddress($api_email_address, 'SublimeRevenue System');

if ($cc_email == true) {
	$mail->AddCC($cc_email_address, 'SublimeRevenue System');
}

$mail->Body = $content;
$mail->Send();
$mail->ClearAddresses();

?>
