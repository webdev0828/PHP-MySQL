<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for BrokerBabe and Glize | DONE - TEST
// TODO: make a separate for BitterStrawberry, so we can get offer name and mainstream-adult, etc like slimspots
$tids           = isset($_GET['geotids']) ? $_GET['geotids'] : '';
$eur            = isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$aff_id         = isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
$idev_ordernum  = isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$geo            = isset($_GET['geo']) ? $_GET['geo'] : '';
if (strpos($tids, 'RkwuK6') !== false) {                // old method
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_BB_sale.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&geotids=".$tids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
} else {                                                // new method EUR
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$tids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
}
?>