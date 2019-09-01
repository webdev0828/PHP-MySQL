<?php
/*
processes fictive data, so we can have examples
*/
header("HTTP/1.1 200 OK");
include_once "API/config.php";
include "includes/variable_conversions.php";
$coupon_affiliate = 0;
$idev = 0;
$sliding_scale = 0;
$per_product_used = 0;
if ($protection_profile == 1) {
    if (!isset($profile)) {
        $declined_reason = 1;
        include $path . "/templates/email/admin.sale_protection.php";
        exit;
    }
    $get_profile_valid = $db->prepare("select name from idevaff_carts where id = ?");
    $get_profile_valid->execute(array($profile));
    if (!$get_profile_valid->rowCount()) {
        $declined_reason = 2;
        include $path . "/templates/email/admin.sale_protection.php";
        exit;
    }
    $get_profile_id = $db->prepare("select type from idevaff_integration where type = ?");
    $get_profile_id->execute(array($profile));
    if (!$get_profile_id->rowCount()) {
        echo "valid profile id but not enabled";
        $declined_reason = 3;
        include $path . "/templates/email/admin.sale_protection.php";
        exit;
    }
}
if ($protection_secret_key == 1) {
    $idev_secret = check_type("idev_secret");
    if (!isset($idev_secret)) {
        $declined_reason = 4;
        include $path . "/templates/email/admin.sale_protection.php";
        exit;
    }
    $check_secret = $db->prepare("select COUNT(*) from idevaff_config where secret = ?");
    $check_secret->execute(array($idev_secret));
    if (!$check_secret->fetchColumn()) {
        $declined_reason = 5;
        include $path . "/templates/email/admin.sale_protection.php";
        exit;
    }
}
$check_ip = check_type("ip_address");
if (isset($check_ip)) {
    $ip_addr = $check_ip;
}
if ($commission_blocking == 1) {
    $check_ip = $db->prepare("select blocked_ip from idevaff_ipblock where blocked_ip = ?");
    $check_ip->execute(array($ip_addr));
    if ($check_ip->rowCount()) {
        exit;
    }
}
if ($fraud_type == 2) {
    include "includes/check_order_number.php";
    if ($order_exists == 1) {
        if ($duplicate_notify == 1) {
            include $path . "/templates/email/admin.duplicate_order.php";
        }
        exit;
    }
}
include "includes/tracking.php";
if ($fraud_type == 1) {
    include "includes/check_time_delay.php";
    if ($write_ok != 1) {
        exit;
    }
}
$coupon_override = check_type("coupon_code");
if (isset($coupon_override)) {
    $idevcc = $db->prepare("select coupon_affiliate from idevaff_coupons where coupon_code = ?");
    $idevcc->execute(array($coupon_override));
    if ($idevcc->rowCount()) {
        $ccdat = $idevcc->fetch();
        $coupon_affiliate = $ccdat["coupon_affiliate"];
        $tracking_method_used = "Coupon Code: " . $coupon_override;
    }
}
if (0 < $idev || 0 < $coupon_affiliate) {
    if (0 < $coupon_affiliate) {
        if (0 < $idev && $coupon_priority == 2 || $idev == 0) {
            $id_check_suspension = $coupon_affiliate;
        } else {
            $id_check_suspension = $idev;
        }
    } else {
        $id_check_suspension = $idev;
    }
    $check_susp = $db->prepare("select id from idevaff_suspensions where affid = ? and susp_allow_comm = '1'");
    $check_susp->execute(array($id_check_suspension));
    if ($check_susp->rowCount()) {
        exit;
    }
    include_once "includes/geo.php";
    $alternate_amount = 0;
    $sliding_alternate = 0;
    $pay_cycle = 1;
    $ck_cycle = $db->prepare("select COUNT(*) from idevaff_sales where id = ? and ip = ?");
    $ck_cycle->execute(array($idev, $ip_addr));
    $ck_cycle = $ck_cycle->fetchColumn();
    if (0 < $ck_cycle) {
        $pay_cycle = 2;
    }
    if ($pay_cycle == 1) {
        $ck_cycle = $db->prepare("select COUNT(*) from idevaff_archive where id = ? and ip = ?");
        $ck_cycle->execute(array($idev, $ip_addr));
        $ck_cycle = $ck_cycle->fetchColumn();
        if (0 < $ck_cycle) {
            $pay_cycle = 2;
        }
    }
    $getpaylevel = $db->prepare("select type, level from idevaff_affiliates where id = ?");
    $getpaylevel->execute(array($idev));
    $paylevel = $getpaylevel->fetch();
    $type = $paylevel["type"];
    $level = $paylevel["level"];
    $getpayamount = $db->prepare("select amt, amt_alt from idevaff_paylevels where type = ? and level = ?");
    $getpayamount->execute(array($type, $level));
    $payamount = $getpayamount->fetch();
    if ($pay_cycle == 2 && 0 < $payamount["amt_alt"]) {
        $payout = $payamount["amt_alt"];
        $alternate_amount = 1;
    } else {
        $payout = $payamount["amt"];
    }
    if ($sliding == 1) {
        $getpayamount = $db->prepare("select id, amt, amt_alt from idevaff_paylevels_sliding where (min_amount <= ? and max_amount >= ?) and (type = ? and paylevel = ?)");
        $getpayamount->execute(array($avar, $avar, $type, $level));
        $payamount = $getpayamount->fetch();
        if ($payamount) {
            if ($pay_cycle == 2 && 0 < $payamount["amt_alt"]) {
                $payout = $payamount["amt_alt"];
                $sliding_alternate = 1;
            } else {
                $payout = $payamount["amt"];
            }
            $sliding_scale = $payamount["id"];
        }
    }
    $app_check = "sale_approval_" . $type;
    if ($type == 1) {
        $payout_type = 1;
        $payout = $avar * $payout;
    }
    $percent_override = check_type("idev_percent");
    if (isset($percent_override)) {
        $payout_type = 2;
        if ($type == 1) {
            $payout = $avar * $percent_override;
        }
    }
    if (isset($idev_commission)) {
        $payout_type = 2;
        $payout = $idev_commission;
    }
    if (isset($_REQUEST["idev_commission"])) {
        $payout_type = 2;
        $payout = $_REQUEST["idev_commission"];
    }
    $products_purchased = check_type("products_purchased");
    if (isset($products_purchased)) {
        $payout_type = 2;
        include_once "includes/sale.products.php";
    }
    if (isset($idev_leadamt)) {
        $payout_type = 2;
        $payout = $idev_leadamt;
    }
    if (isset($_REQUEST["idev_leadamt"])) {
        $payout = $_REQUEST["idev_leadamt"];
    }
    $payout_currency = check_type("idev_currency");
    if (isset($payout_currency)) {
        $payout_currency = strtoupper($payout_currency);
        $currency = strtoupper($currency);
        if ($payout_currency != $currency) {
            $currency_valid = $db->prepare("select * from idevaff_currency where currency_code = ?");
            $currency_valid->execute(array($payout_currency));
            if ($currency_valid->rowCount()) {
                $new_currency = $currency_valid->fetch();
                $new_currency_rate = $new_currency["currency_rate"];
                $currency_to_write = strtoupper($payout_currency);
                $payout = $payout * $new_currency_rate;
                $converted_amount = $avar * $new_currency_rate;
                $payout_type = 2;
            }
        }
    }
    if (0 < $coupon_affiliate && (0 < $idev && $coupon_priority == 2 || $idev == 0)) {
        $per_product_used = 0;
        $tracking_method_used = "Coupon Code: " . $coupon_override;
        $idevcc = $db->prepare("select coupon_affiliate, coupon_amount, coupon_type from idevaff_coupons where coupon_code = ?");
        $idevcc->execute(array($coupon_override));
        if ($idevcc->rowCount()) {
            $ccdat = $idevcc->fetch();
            $idev = $ccdat["coupon_affiliate"];
            $coupon_amount = $ccdat["coupon_amount"];
            $coupon_type = $ccdat["coupon_type"];
            if ($coupon_type == 1) {
                $payout_type = 1;
                $type = $payout_type;
                $app_check = "sale_approval_" . $payout_type;
                $temp_p = $coupon_amount / 100;
                if (isset($converted_amount)) {
                    $payout = $converted_amount * $temp_p;
                } else {
                    $payout = $avar * $temp_p;
                }
            }
            if ($coupon_type == 2) {
                $payout_type = 2;
                $type = $payout_type;
                $app_check = "sale_approval_" . $payout_type;
                $payout = $coupon_amount;
            }
            if ($coupon_type == 3) {
                $getpaylevel = $db->prepare("select type, level from idevaff_affiliates where id = ?");
                $getpaylevel->execute(array($idev));
                $paylevel = $getpaylevel->fetch();
                $type = $paylevel["type"];
                $level = $paylevel["level"];
                $getpayamount = $db->prepare("select amt from idevaff_paylevels where type = ? and level = ?");
                $getpayamount->execute(array($type, $level));
                $payamount = $getpayamount->fetch();
                $payout1 = $payamount["amt"];
                $app_check = "sale_approval_" . $type;
                $payout_type = $type;
                if ($type == 1) {
                    if ($payout_type == 1) {
                        if (isset($converted_amount)) {
                            $payout = $converted_amount * $payout1;
                        } else {
                            $payout = $avar * $payout1;
                        }
                    } else {
                        if ($payout_type == 2) {
                            $payout_type = 2;
                            $payout = $payout * $payout1;
                        }
                    }
                } else {
                    if ($type == 2) {
                        $payout = $payout1;
                    }
                }
            }
        }
    }
    $promo_add = 0;
    $promo = $db->prepare("select amount from idevaff_promo where start_date < ? AND end_date > ? AND enabled = '1'");
    $promo->execute(array($commission_time, $commission_time));
    if ($promo->rowCount()) {
        $promo_add = $promo->fetch();
        $promo_add = $promo_add['amount'];
        if ($idev != "106" && $idev != "107") { // remove id svet0slav and 100yan from additional bonus
        $promo_add = $payout * $promo_add;
        $payout = $payout + $promo_add;
        } else {
        $payout = $payout;
        }
    }
    if ($max_comm_use == 1 && 0 < $max_comm_amt && $max_comm_amt < $payout) {
        if ($max_comm_email == 1) {
            include $path . "/templates/email/admin.max_commission_exceeded.php";
        }
        exit;
    }
    if (!isset($currency_to_write)) {
        $currency_to_write = strtoupper($currency);
    }
    if (!isset($converted_amount)) {
        $converted_amount = "0";
    }
// update conversions per aff and promo tool start
$clickid         = NULL;
$src1            = 3;
$src2            = 49;
$sub_id          = NULL;
$tid1            = NULL;
$tid2            = NULL;
$tid3            = NULL;
$tid4            = NULL;
$country_code    = NULL;
$ip_addr         = NULL;
/*
    if (isset($_GET['currency']) && $_GET['currency'] == USD || isset($_GET['cur']) && $_GET['currency'] == USD) {
        $dollar=$_GET['idev_saleamt'];
        $usd_to_eur=file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
        $avar=$dollar * $usd_to_eur; // unset first?
        $currency_to_write = "$~€"; // unset first?
    } 
*/
    if ($payout != 0 && ${$app_check} == 0 && $src1 && $src2) {
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
        $statement = $db->prepare('update idevaff_' . $table . ' set conv = conv+1, earnings = earnings+' . $avar . ' where ' . $col . ' = ?');
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
    if ($payout != 0 && $type == 3) {
        $data = array((string) $idev);
        $statement = $db->prepare('update idevaff_affiliates set conv = conv+1, earnings = earnings+' . $payout . ' where id = ?');
        $statement->execute($data);
    }
// update conversions per aff and promo tool end
    if ($type != 3) {
        if (isset($app_check) && ${$app_check} == 1) {
            $setme = "0";
        } else {
            $setme = "1";
        }
        if ($setme == 1 && $payout == 0) {
        } else {
            $idev_tier_1 = $db->prepare("select parent from idevaff_tiers where child = ? order by id");
            $idev_tier_1->execute(array($idev));
            $idev_tier_1 = $idev_tier_1->fetch();
            $texist = $idev_tier_1["parent"];
            if (0 < $texist) {
                $tiernumber = $texist;
            } else {
                $tiernumber = 0;
            }
            if (!$split) {
                $split = false;
            }
            if (!$payout) {
                $payout = 0;
            }
            if ($delay_use && isset($delay_days)) {
                $delay_insert = $delay_days;
                $setme = 0;
            } else {
                $delay_insert = 0;
            }
            if (!isset($profile)) {
                $profile = "0";
            }
            if (!isset($diff)) {
                $diff = "0";
            }
            $statement = $db->prepare("insert into idevaff_sales (id, payment, approved, ip, code, tracking, amount, op1, op2, op3, type, split, profile, delay, referring_url, sub_id, tid1, tid2, tid3, tid4, target_url, currency, converted_amount, geo, tracking_method, conversion_time,alt_amt,sliding_scale,sliding_alternate,per_product, src1, src2, clickid) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $data = array($idev, $payout, $setme, $ip_addr, $commission_time, $idev_ordernum, $avar, $ov1, $ov2, $ov3, $type, $split, $profile, $delay_insert, $r_url, $sub_id, $tid1, $tid2, $tid3, $tid4, $target_url, $currency_to_write, $converted_amount, $country_code, $tracking_method_used, $diff, $alternate_amount, $sliding_scale, $sliding_alternate, $per_product_used, $src1, $src2, $clickid);
            $statement->execute($data);
//  postback start
// GET DATA START
$record          = $db->query("SHOW TABLE STATUS LIKE 'idevaff_sales'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];
$get_db_postback = $db->prepare('select * from idevaff_postbacks where acct_id = ?');
$get_db_postback->execute([$idev]);
$q_db_p = $get_db_postback->fetch();
$db_postback_url = $q_db_p['postback_url'];
$method = $q_db_p['method'];
$postback_status = $q_db_p['status'];
// GET DATA END

// rewrite postback url with actual data start
$notify_postback_url = str_replace(
  array('[commission_id]', '[payout]', '[status]', '[timestamp]', '[sub_id]', '[tid1]', '[tid2]', '[tid3]', '[tid4]', '[geo]', '[offer_id]', '[click_id]', '&amp;'),
  array($record, $payout, $status, $timestamp, $sub_id, $tid1, $tid2, $tid3, $tid4, $country_code, $offer_id, $click_id, '&'), 
  $db_postback_url
);
$postback_post_base = preg_replace('/\\?.*/', '', $notify_postback_url);
$postback_post_query_string = str_replace($postback_post_base, '', $notify_postback_url);
// rewrite postback url with actual data end

// check, if a successful notification about the sale already exists
$chcek_duplicate = $db->prepare('select record from idevaff_postbacks_logs where record = ? and result = 1'); // select was *
$chcek_duplicate->execute([$record]);
$number_of_all_rows = $chcek_duplicate->fetchALL();
$number_of_rows     = count($number_of_all_rows);

if ($postback_status == 1) { // if postback is enabled and if successful notification for the about-to-be-inserted record does not exist, send via get or post and add it
// curl notify $_GET start
    if ($method == 0 && $number_of_rows == 0) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $notify_postback_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        $http_status = $info["http_code"];
        if ($http_status === 200){$result = 1;}else{$result = 0;}
        curl_close($ch);
    } elseif ($method == 1 && $number_of_rows == 0) {
// curl notify $_GET end
// curl notify $_POST start
        $ch = curl_init($postback_post_base);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postback_post_query_string);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        $http_status = $info["http_code"];
        if ($http_status === 200){$result = 1;}else{$result = 0;}
        curl_close($ch);
// curl notify $_POST end

// postback log entry start
$postback_log_entry = $db->prepare('insert into idevaff_postbacks_logs (record, acct_id, grp, postback_url, status, method, result, http_status, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$postback_log_entry->execute(array($record, $idev, $offer_id, $notify_postback_url, $status, $method, $result, $http_status, $timestamp)); // Note: 0 = global, number = offer id, NULL = no offer id (impossible)
// postback log entry end
    }
}
//  postback end
            if (isset($record_type) && $record_type == 1) {
                $data = array((string) $idev, (string) $commission_time, (string) $payout, (string) $ov1, (string) $ov2, (string) $ov3, (string) $idev_ordernum, 1);
                $statement = $db->prepare("insert into idevaff_pp_transactions (aff_id, code, amt, op1, op2, op3, order_num, rec) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $statement->execute($data);
            }
            if ($setme == "1") {
                if (${$app_check} == 0 && $sale_notify_affiliate == 1) {
                    $note_added = true;
                    $id = $idev;
                    $email = "top";
                    $payoute = $payout;
                    include $path . "/templates/email/affiliate.new_commission.php";
                }
                $event = "commission_approved";
                $data_affiliate_id = $idev;
                $data_order_number = $idev_ordernum;
                $data_commission = number_format($payout, $decimal_symbols);
                if (".01" < $avar) {
                    $data_sale_amount = number_format($avar, $decimal_symbols);
                } else {
                    $data_sale_amount = 0;
                }
                $data_date = date($dateformat, $commission_time);
                $data_time = date($timeformat, $commission_time);
                $data_timestamp = $commission_time;
                $data_sub_id = $sub_id;
                $data_tid1 = $tid1;
                $data_tid2 = $tid2;
                $data_tid3 = $tid3;
                $data_tid4 = $tid4;
                $data_currency = $currency_to_write;
                $data_cart_profile = $profile;
                include $path . "/API/webhooks/webhook.php";
            }
            if (${$app_check} == 0) {
                if ($rewards == 1 && ($rew_app == 1 || $rew_app == 3)) {
                    $update_account_process = $idev;
                    include $path . "/includes/process_rewards.php";
                }
                if ($delay_use == "0" && 0 < $tier_numbers) {
                    include "includes/tiers.php";
                }
                if ($delay_use == "0") {
                    $idev_id_override = $idev;
                    include "includes/overrides.php";
                }
            }
            if ($setme == "0" && $sale_generated_notify_affiliate == 1) {
                $note_added = true;
                $id = $idev;
                $payoute = $payout;
                $order_number = $idev_ordernum;
                include $path . "/templates/email/affiliate.new_commission_pending.php";
            }
            if ($setme == "0") {
                $commission_status = "Pending Approval";
            } else {
                if ($setme == "1") {
                    $commission_status = "Auto-Approved";
                }
            }
            $commission_amount = $payout;
            $order_number = $idev_ordernum;
            if ($sale_notify == 1) {
                include $path . "/templates/email/admin.new_commission.php";
            }
            if (!isset($event)) {
                $event = "commission_created";
                $data_affiliate_id = $idev;
                $data_order_number = $idev_ordernum;
                $data_commission = number_format($payout, $decimal_symbols);
                if ("0.01" < $avar) {
                    $data_sale_amount = number_format($avar, $decimal_symbols);
                } else {
                    $data_sale_amount = 0;
                }
                $data_date = date($dateformat, $commission_time);
                $data_time = date($timeformat, $commission_time);
                $data_timestamp = $commission_time;
                $data_sub_id = $sub_id;
                $data_tid1 = $tid1;
                $data_tid2 = $tid2;
                $data_tid3 = $tid3;
                $data_tid4 = $tid4;
                $data_currency = $currency_to_write;
                $data_cart_profile = $profile;
                include $path . "/API/webhooks/webhook.php";
            }
        }
    }
} else {
    if ($non_commissioned == 1) {
        include_once "includes/geo.php";
        $payout_currency = check_type("idev_currency");
        if (isset($payout_currency)) {
            $payout_currency = strtoupper($payout_currency);
            $currency = strtoupper($currency);
            if ($payout_currency != $currency) {
                $currency_valid = $db->prepare("select * from idevaff_currency where currency_code = ?");
                $currency_valid->execute(array($payout_currency));
                if ($currency_valid->rowCount()) {
                    $new_currency = $currency_valid->fetch();
                    $new_currency_rate = $new_currency["currency_rate"];
                    $currency_to_write = strtoupper($payout_currency);
                    $converted_amount = $avar * $new_currency_rate;
                }
            }
        }
        if (!isset($currency_to_write)) {
            $currency_to_write = strtoupper($currency);
        }
        if (!isset($converted_amount)) {
            $converted_amount = "0";
        }
        $check_ip = check_type("ip_address");
        if (isset($check_ip)) {
            $ip_addr = $check_ip;
        }
        $statement = $db->prepare("insert into idevaff_general_sales (time_stamp, order_number, sale_amount, customer_ip, currency, converted_amount, geo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $data = array((string) $commission_time, (string) $idev_ordernum, (string) $avar, (string) $ip_addr, (string) $currency_to_write, (string) $converted_amount, (string) $country_code);
        $statement->execute($data);
    }
}

?>