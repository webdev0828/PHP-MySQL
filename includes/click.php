<?php

if (!defined("IDEV_FILE_AUTH")) {
    exit("click.php - Unauthorized Access");
}
if (${$app_check} == 1) {
    $setme = "0";
} else {
    $setme = "1";
}
if ($sale_notify_ppc == 1) {
    if ($setme == "0") {
        $commission_status = "Pending Approval";
    } else {
        if ($setme == "1") {
            $commission_status = "Auto-Approved";
        }
    }
    $idev = $id;
    $commission_amount = number_format($payout, 2);
    $order_number = "N/A - PPC Generated";
    include $path . "/templates/email/admin.new_commission.php";
}
$st = $db->prepare("insert into idevaff_sales (id, payment, approved, ip, code, type, referring_url, sub_id, tid1, tid2, tid3, tid4, target_url, currency) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$st->execute(array($id, $payout, $setme, $ip_addr, $commission_time, $type, $curl, $sub_id, $tid1, $tid2, $tid3, $tid4, $redirect, $currency));
if (${$app_check} == 0) {
    if ($rewards == 1 && ($rew_app == 2 || $rew_app == 3)) {
        $update_account_process = $id;
        include (string) $path . "/includes/process_rewards.php";
    }
    if ($sale_notify_affiliate_ppc == 1) {
        $id = $id;
        $email = "top";
        $payoute = $payout;
        include $path . "/templates/email/affiliate.new_commission.php";
    }
}
if (${$app_check} == 0) {
    $idev_id_override = $id;
    $idev_tier_1 = $db->prepare("select parent from idevaff_tiers where child = ? order by id");
    $idev_tier_1->execute(array($id));
    $idev_tier_1 = $idev_tier_1->fetch();
    $texist = $idev_tier_1["parent"];
    if (0 < $texist) {
        $tiernumber = $texist;
        $idev_ordernum = NULL;
        $avar = NULL;
        $r_url = $curl;
        $ov1 = NULL;
        $ov2 = NULL;
        $ov3 = NULL;
        $profile = NULL;
        $target_url = $redirect;
        if (!isset($currency_to_write)) {
            $currency_to_write = strtoupper($currency);
        }
        if (!isset($converted_amount)) {
            $converted_amount = NULL;
        }
    } else {
        $tiernumber = 0;
    }
    if (0 < $tier_numbers) {
        include $path . "/includes/tiers.php";
    }
    include $path . "/includes/overrides.php";
}

?>