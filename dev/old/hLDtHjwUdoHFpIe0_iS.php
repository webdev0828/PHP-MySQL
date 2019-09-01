<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for iStripper | DONE - TEST
// get vars for requests start
$geotids          	= isset($_GET['clickid']) ? $_GET['clickid'] : '';
$idev_ordernum		= isset($_GET['clickid']) ? $_GET['clickid'] : mt_rand();;
$aff_id         	= isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
// convert start
// convert start
$dollar				= isset($_GET['idev_saleamt']) ? $_GET['idev_saleamt'] : '';
$usd_to_eur 		= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur 				= $dollar * $usd_to_eur;
// convert end
// get vars for requests end
if (strpos($geotids, 'RkwuK6') !== false) {           	// old method
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_AC_sale.php?idev_ordernum=istripper-".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&geotids=".$geotids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
} else {                                                // new method EUR conv from USD
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=istripper-".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$geotids);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
}
}
?>