<?php

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

		if ($check_order_number->rowCount()) {
			$st = $db->prepare("update idevaff_sales set approved = '0' where tracking = ?"); // TODO check for referral commission!? Does it remove it?
			$st->execute(array($order_number));

//  postback start
// GET DATA START
$check_aff_id = $db->prepare('select record, id, payment, amount, clickid from idevaff_sales where tracking = ?');
$check_aff_id->execute([$order_number]);
$q_aff = $check_aff_id->fetch();
	$record 		 = $q_aff['record']; // commission id
	$idev 			 = $q_aff['id']; // aff id
	$payout 		 = $q_aff['payment']; // aff percent refund amount
	$avar 		 	 = $q_aff['amount']; // actual refund amount
	$setme 			 = 0; // !!postback is only for reject!!
	$commission_time = time();
	$clickid    	 = $q_aff['clickid'];
$qtrackers  = $db->prepare('SELECT src1, src2, sub_id, tid1, tid2, tid3, tid4, geo FROM idevaff_iptracking WHERE clickid = ? LIMIT 1');
$qtrackers->execute([$clickid]);
$tquery     = $qtrackers->fetch();
$src1       = $tquery['src1'];
	$sub_id          = $tquery['sub_id'];
	$tid1            = $tquery['tid1'];
	$tid2            = $tquery['tid2'];
	$tid3            = $tquery['tid3'];
	$tid4            = $tquery['tid4'];
	$country_code    = $tquery['geo'];
	$src2            = $tquery['src2'];

// update conversions per aff and promo tool start
    if ($payout != 0 && $src1 && $src2) {
        if ($src1 == 1) {
            $table = 'banners'; // direct offers banners
            $col = "number";
        }
        if ($src1 == 2) {
            $table = "ads";
            $col = "id";
        }
        if ($src1 == 3) {
            $table = 'links'; // smart links / direct offer links
            $col = "id";
        }
        if ($src1 == 4) {
            $table = 'htmlads'; // popunders
            $col = "id";
        }
        if ($src1 == 5) {
            $table = 'email_templates'; // backoffers
            $col = "id";
        }
        if ($src1 == 6) {
            $table = "peels";
            $col = "number";
        }
        if ($src1 == 7) {
            $table = "lightboxes";
            $col = "number";
        }
        $data = array((string) $src2);
        $statement = $db->prepare('update idevaff_' . $table . ' set conv = conv-1, earnings = earnings-' . $avar . ' where ' . $col . ' = ?');
        $statement->execute($data);
// get offer ID start
        $qoid  = $db->prepare('SELECT grp FROM idevaff_' . $table . ' WHERE ' . $col . ' = ? LIMIT 1');
        $qoid->execute([$src2]);
        $oquery= $qoid->fetch();
        $oid   = $oquery['grp'];
        if ($oid >= 3) {
        $offer_id = $oquery['grp'];
        } else {
        $offer_id = 0;
        }
// get offer ID end
    }
    if ($payout != 0) {
        $data = array((string) $idev);
        $statement = $db->prepare('update idevaff_affiliates set conv = conv-1, earnings = earnings-' . $payout . ' where id = ?');
        $statement->execute($data);
    }
// update conversions per aff and promo tool end

$q_db_get_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and grp = ? and postback_url IS NOT NULL and state = 1 and method = 0');
$q_db_get_postback->execute(array($idev, $offer_id));
$db_get_postback_url = $q_db_get_postback->fetchAll(PDO::FETCH_COLUMN); // returns array of enabled per offer GET urls
// get enabled GET global postback start
$q_db_get_global_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and grp = ? and postback_url IS NOT NULL and state = 1 and method = 0');
$q_db_get_global_postback->execute(array($idev, 0));
$db_get_global_postback_url = $q_db_get_global_postback->fetchAll(PDO::FETCH_COLUMN); // returns global GET postback, if enabled, in array
// get enabled GET global postback end
$db_get_postback_url = array_merge($db_get_postback_url, $db_get_global_postback_url); // merge with global


$q_db_post_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and grp = ? and postback_url IS NOT NULL and state = 1 and method = 1');
$q_db_post_postback->execute(array($idev, $offer_id));
$db_post_postback_url = $q_db_post_postback->fetchAll(PDO::FETCH_COLUMN); // returns array of enabled per offer POST urls
// get enabled POST global postback start
$q_db_post_global_postback = $db->prepare('select postback_url from idevaff_postbacks where acct_id = ? and grp = ? and postback_url IS NOT NULL and state = 1 and method = 1');
$q_db_post_global_postback->execute(array($idev, 0));
$db_post_global_postback_url = $q_db_post_global_postback->fetchAll(PDO::FETCH_COLUMN); // returns global POST postback, if enabled, in array
// get enabled POST global postback end
$db_post_postback_url = array_merge($db_post_postback_url, $db_post_global_postback_url); // merge with global
// GET DATA END

// rewrite postback url with actual data start
$notify_get_postback_urls = str_replace(
  array('[commission_id]', '[payout]', '[status]', '[timestamp]', '[sub_id]', '[tid1]', '[tid2]', '[tid3]', '[tid4]', '[geo]', '[offer_id]', '[click_id]', '[creative_id]', '&amp;'),
  array($record, $payout, $setme, $commission_time, $sub_id, $tid1, $tid2, $tid3, $tid4, $country_code, $offer_id, $clickid, $src2, '&'), 
  $db_get_postback_url
);
$notify_post_postback_urls = str_replace(
  array('[commission_id]', '[payout]', '[status]', '[timestamp]', '[sub_id]', '[tid1]', '[tid2]', '[tid3]', '[tid4]', '[geo]', '[offer_id]', '[click_id]', '[creative_id]', '&amp;'),
  array($record, $payout, $setme, $commission_time, $sub_id, $tid1, $tid2, $tid3, $tid4, $country_code, $offer_id, $clickid, $src2, '&'), 
  $db_post_postback_url
);
$postback_post_bases = preg_replace('/\\?.*/', '', $notify_post_postback_urls);
$postback_post_query_strings = str_replace($postback_post_bases, '', $notify_post_postback_urls);
// rewrite postback url with actual data end

// curl notify $_GET start
foreach ($notify_get_postback_urls as $postback_get_url) {
$chcek_get_duplicate = $db->prepare('select record from idevaff_postbacks_logs where record = ? and result = 1 and grp = ? and postback_url = ? and method = 0 and status = 0');
$chcek_get_duplicate->execute(array($record, $offer_id, $postback_get_url));
$number_of_all_get_rows = $chcek_get_duplicate->fetchALL();
$number_of_get_rows     = count($number_of_all_get_rows);
    if (count($notify_get_postback_urls) > 0 && $number_of_get_rows == 0) { // if _get urls exist and no records for this commission exist do foreach
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $postback_get_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        $http_status = $info["http_code"];
        if ($http_status === 200){$result = 1;}else{$result = 0;}
        curl_close($ch);
// postback log entry start
$postback_log_entry = $db->prepare('insert into idevaff_postbacks_logs (record, acct_id, grp, postback_url, status, method, result, http_status, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$postback_log_entry->execute(array($record, $idev, $offer_id, $postback_get_url, $setme, 0, $result, $http_status, $commission_time)); // Note: 0 = global, number = offer id, NULL = no offer id (impossible)
// postback log entry end
    } 
}
// curl notify $_GET end
// curl notify $_POST start
$i = 0;
foreach ($notify_post_postback_urls as $postback_post_url) {
$chcek_post_duplicate = $db->prepare('select record from idevaff_postbacks_logs where record = ? and result = 1 and grp = ? and postback_url = ? and method = 1 and status = 0');
$chcek_post_duplicate->execute(array($record, $offer_id, $postback_post_url));
$number_of_all_post_rows = $chcek_post_duplicate->fetchALL();
$number_of_post_rows     = count($number_of_all_post_rows);
    if (count($notify_post_postback_urls) > 0 && $number_of_post_rows == 0) { // if _post urls exist and no records for this commission exist do foreach
        $ch = curl_init($postback_post_bases[$i]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postback_post_query_string[$i]);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        $http_status = $info["http_code"];
        if ($http_status === 200){$result = 1;}else{$result = 0;}
        curl_close($ch);
// postback log entry start
$postback_log_entry = $db->prepare('insert into idevaff_postbacks_logs (record, acct_id, grp, postback_url, status, method, result, http_status, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$postback_log_entry->execute(array($record, $idev, $offer_id, $postback_post_url, $setme, 1, $result, $http_status, $commission_time)); // Note: 0 = global, number = offer id, NULL = no offer id (impossible)
// postback log entry end
    }
    $i++;
}
// curl notify $_POST end
//  postback end

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

?>
