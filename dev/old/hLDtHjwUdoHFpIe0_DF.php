<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for DatingFactory | DONE - TEST
// get vars for requests start
if (isset($_GET['sale_type'])) { 
$df_type=$_GET['sale_type'];
} else {
    die();
}
$idev_ordernum  = isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$payout			= isset($_GET['payout']) ? $_GET['payout'] : '';
$geo_tids_id    = isset($_GET['clickid']) ? $_GET['clickid'] : '';
$pieces			= explode("RkwuK6", $geo_tids_id);
// get vars for requests end
if (strpos($geo_tids_id, 'RkwuK6') !== false) {          // old method
    if ($df_type == "trial" || $df_type == "sale" || $df_type == "rebill") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_DF_sale.php?idev_ordernum=".$df_type."-".$idev_ordernum."&idev_saleamt=".$payout."&affiliate_id=".$pieces[5]."&clickid=".$geo_tids_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($df_type == "chargeback") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=".$df_type."-".$idev_ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
} else {                                                // new method EUR
include_once "API/config.php";
$geo_tids_id    = isset($_GET['clickid']) ? $_GET['clickid'] : '';
$qtrackers = $db->prepare('SELECT acct_id FROM idevaff_iptracking WHERE clickid = ? LIMIT 1');
$qtrackers->execute([$geo_tids_id]);
$tquery = $qtrackers->fetch();
$aff_id = $tquery['acct_id'];
    if ($df_type == "trial" || $df_type == "sale" || $df_type == "rebill") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$df_type."-".$idev_ordernum."&idev_saleamt=".$payout."&affiliate_id=".$aff_id."&clickid=".$geo_tids_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($df_type == "chargeback") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=".$df_type."-".$idev_ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
}
?>