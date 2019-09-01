<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for AdCombo | DONE - TEST
// get vars for requests start
$currency         	= isset($_GET['cur']) ? $_GET['cur'] : '';
$clickid          	= isset($_GET['clickid']) ? $_GET['clickid'] : '';
$idev_ordernum  	= isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$aff_id         	= isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
// get vars for requests end
    if ($currency == "EUR") {
$eur				= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$clickid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } elseif ($currency == "USD") {
// convert start
$dollar				= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$usd_to_eur 		= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur_equivalent 	= $dollar * $usd_to_eur;
// convert end
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur_equivalent."&affiliate_id=".$aff_id."&clickid=".$clickid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
            die();
    }
?>