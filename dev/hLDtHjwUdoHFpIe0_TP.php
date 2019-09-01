<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for TrafficPartner | DONE - TEST
// get vars for requests start
if (isset($_GET['cur'])) { 
$currency		= $_GET['cur'];
} else {
    die();
}
$tids           = isset($_GET['tids']) ? $_GET['tids'] : '';
$geo            = isset($_GET['geo']) ? $_GET['geo'] : '';
$idev_ordernum  = isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$aff_id         = isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
// get vars for requests end
if (strpos($geotids, 'RkwuK6') !== false) {           	// old method
    if ($currency == "EUR") {
$eur            = isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_TP_sale.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&tids=".$tids."&geo=".$geo);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($currency == "USD") {
// convert start
$dollar 		= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$usd_to_eur 	= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur_equivalent = $dollar * $usd_to_eur; // usd converted to eur for sale report
// convert end
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_TP_sale.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur_equivalent."&affiliate_id=".$aff_id."&tids=".$tids."&geo=".$geo);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
} else {                                                // new method both cases
    if ($currency == "EUR") {
$eur            = isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$tids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($currency == "USD") {
// convert start
$dollar 		= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$usd_to_eur 	= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur_equivalent = $dollar * $usd_to_eur; // usd converted to eur for sale report
// convert end
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur_equivalent."&affiliate_id=".$aff_id."&clickid=".$tids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
}
?>