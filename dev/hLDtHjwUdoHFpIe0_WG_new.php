<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for WarGaming | DONE - TEST
// get vars for requests start
$idev_ordernum		= isset($_GET['idev_ordernum']) ? $_GET['idev_ordernum'] : '';
$affiliate_id		= isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
$sub_id				= isset($_GET['sub_id']) ? $_GET['sub_id'] : '';
$tidp1				= isset($_GET['tidp1']) ? $_GET['tidp1'] : '';
$tidp2				= isset($_GET['tidp2']) ? $_GET['tidp2'] : '';
$geosl				= isset($_GET['geosl']) ? $_GET['geosl'] : '';
// get vars for requests end
// convert $ start
$dollar				= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$usd_to_eur 		= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur 				= $dollar * $usd_to_eur;
// convert $ end
// get vars for requests end
if (strpos($tidp1, 'RkwuK6') !== false) {           	// old method
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_WG_sale_new.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$affiliate_id."&sub_id=".$sub_id."&tidp1=".$tidp1."&tidp2=".$tidp2."&geosl=".$geosl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
} else {                                                // new method EUR conv from USD
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$affiliate_id."&clickid=".$sub_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
}
?>