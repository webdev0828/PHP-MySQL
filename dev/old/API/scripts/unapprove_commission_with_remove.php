<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
// TODO: make it send affiliate.unapprove.php email to the affiliate in question
require_once '../../API/config.php';
include $path . '/templates/email/PHPMailerAutoload.php';

if ($api_email_address == '') {
	$api_email_address = $address;
}

$secret = check_type_api('secret');
$get_rows = $db->prepare('select secret from idevaff_config where secret = ? limit 1');
$get_rows->execute(array($secret));
if (is_numeric($secret) && $get_rows->rowCount()) {
	$order_number = check_type_api('order_number');

	if ($order_number) {
		$check_order_number = $db->prepare('select record from idevaff_sales where tracking = ?');
		$check_order_number->execute(array($order_number));


		$src1 = $db->prepare('select src1 from idevaff_sales where tracking = ?');
		$src1->execute(array($order_number));

		$src2 = $db->prepare('select src2 from idevaff_sales where tracking = ?');
		$src2->execute(array($order_number));

		$idev = $db->prepare('select id from idevaff_sales where tracking = ?');
		$idev->execute(array($order_number));

		$avar = $db->prepare('select amount from idevaff_sales where tracking = ?');
		$avar->execute(array($order_number));

		$payout = $db->prepare('select payment from idevaff_sales where tracking = ?');
		$payout->execute(array($order_number));

		if ($check_order_number->rowCount()) {
			$st = $db->prepare("update idevaff_sales set approved = '0' where tracking = ?"); // TODO check for referral commission!? Does it remove it?
			$st->execute(array($order_number));

        if ($src1 == 1) {
            $table = 'banners'; // direct offers
            $col = 'number';
        }

        if ($src1 == 2) {
            $table = 'ads';
            $col = 'id';
        }

        if ($src1 == 3) {
            $table = 'links'; // smart links
            $col = 'id';
        }

        if ($src1 == 4) {
            $table = 'htmlads'; // popunders
            $col = 'id';
        }

        if ($src1 == 5) {
            $table = 'email_templates'; // backoffers
            $col = 'id';
        }

        if ($src1 == 6) {
            $table = 'peels';
            $col = 'number';
        }

        if ($src1 == 7) {
            $table = 'lightboxes';
            $col = 'number';
        }

        $data2 = array($src2);
        $statement2 = $db->prepare('update idevaff_' . $table . ' set conv = conv-1, earnings = earnings-' . $avar . ' where ' . $col . ' = ?');
        $statement2->execute($data2);

        $data = array($idev);
        $statement = $db->prepare('update idevaff_affiliates set conv = conv-1, earnings = earnings-' . $payout . ' where id = ?');
        $statement->execute($data);
// update conversions per aff and promo tool end	
			if ($email_html_delivery == true) {
				//include $path . "/templates/email/affiliate.unapprove.php";
				$content = 'The API file (unapprove_commission.php) successfully unapproved a commission.<br/><br />Order Number: ' . $order_number . '<br /><br />--------<br />Message Auto-Sent ' . $version;
			}
			else {
				//include $path . "/templates/email/affiliate.unapprove.php";
				$content = 'The API file (unapprove_commission.php) successfully unapproved a commission.' . "\n\n" . 'Order Number: ' . $order_number . "\n\n" . '--------' . "\n" . 'Message Auto-Sent ' . $version;
			}
		}
		else if ($email_html_delivery == true) {
			$content = 'The API file (unapprove_commission.php) tried to unapprove a commission and couldn\'t.<br/><br />Reason:<br />- No commission was found with the provided order number.<br /><br />Order Number Received: ' . $order_number . '<br /><br />--------<br />Message Auto-Sent ' . $version;
		}
		else {
			$content = 'The API file (unapprove_commission.php) tried to unapprove a commission and couldn\'t.' . "\n\n" . 'Reason:' . "\n" . '- No commission was found with the provided order number.' . "\n\n" . 'Order Number Received: ' . $order_number . "\n\n" . '--------' . "\n" . 'Message Auto-Sent ' . $version;
		}
	}
	else if ($email_html_delivery == true) {
		$content = 'The API file (unapprove_commission.php) tried to unapprove a commission and couldn\'t.<br/><br />Reason:<br />- No order number was received.<br /><br />--------<br />Message Auto-Sent ' . $version;
	}
	else {
		$content = 'The API file (unapprove_commission.php) tried to unapprove a commission and couldn\'t.' . "\n\n" . 'Reason:' . "\n" . '- No order number was received.' . "\n\n" . '--------' . "\n" . 'Message Auto-Sent ' . $version;
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

	$mail->Subject = 'Sublime Revenue API - Commission UnApproval Notification';
	$mail->From = $api_email_address;
	$mail->FromName = 'Sublime Revenue System';
	$mail->AddAddress($api_email_address, 'Sublime Revenue System');

	if ($cc_email == true) {
		$mail->AddCC($cc_email_address, 'Sublime Revenue System');
	}

	$mail->Body = $content;
	$mail->Send();
	$mail->ClearAddresses();
}
else {
	if (!$secret) {
		$secret = 'None';
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
		$content = 'Invalid or missing secret key.  No commission was unapproved.<br /><br />Key Used: ' . $secret;
	}
	else {
		$mail->isHTML(false);
		$content = 'Invalid or missing secret key.  No commission was unapproved.' . "\n\n" . 'Key Used: ' . $secret;
	}

	$mail->Subject = 'Sublime Revenue API - Commission UnApproval Failure';
	$mail->From = $api_email_address;
	$mail->FromName = 'Sublime Revenue';
	$mail->AddAddress($api_email_address, 'Sublime Revenue');

	if ($cc_email == true) {
		$mail->AddCC($cc_email_address, 'Sublime Revenue');
	}

	$mail->Body = $content;
	$mail->Send();
	$mail->ClearAddresses();
}
} catch (Exception $e) {
	echo $e->getMessage();
}
?>
