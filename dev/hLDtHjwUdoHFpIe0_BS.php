<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for BitterStrawberry | DONE - TEST
$tids           = isset($_GET['tids']) ? $_GET['tids'] : '';
$eur            = isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$aff_id         = isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
$idev_ordernum  = isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$geo            = isset($_GET['geo']) ? $_GET['geo'] : '';
$offer          = isset($_GET['offer']) ? $_GET['offer'] : '';
if (strpos($tids, 'RkwuK6') !== false) {                // old method
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_OLD.php?idev_ordernum=bitterstrawberry-".$offer."-".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&tids=".$tids."&geo=".$geo);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
} else {                                                // new method EUR
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=bitterstrawberry-".$offer."-".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$tids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
}
?>