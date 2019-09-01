<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for BongaCash | DONE - TEST
// get vars for requests start
$bonga_type         = isset($_GET['type']) ? $_GET['type'] : '';
$geotids            = isset($_GET['geotids']) ? $_GET['geotids'] : '';
$idev_ordernum  	= isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$aff_id         	= isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
// convert start
$dollar				= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$usd_to_eur 		= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur 				= $dollar * $usd_to_eur;
// convert end
// get vars for requests end
if (strpos($geotids, 'RkwuK6') !== false) {           // old method
    if ($bonga_type == "initial" || $bonga_type == "rebill") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_BC_sale.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&geotids=".$geotids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($bonga_type == "refund" || $bonga_type == "chargeback" || $bonga_type == "ban") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=".$idev_ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
} else {                                                // new method EUR
    if ($bonga_type == "initial" || $bonga_type == "rebill") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$geotids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($bonga_type == "refund" || $bonga_type == "chargeback" || $bonga_type == "ban") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=".$idev_ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
}
?>