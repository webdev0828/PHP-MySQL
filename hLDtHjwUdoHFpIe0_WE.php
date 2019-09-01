<?php
// script separates commission requests between old RkwuK6 separator method and new method with hashed clickid
// works for WapEmpire | DONE, TESTED
// get vars for requests start
$clickid          	= isset($_GET['click_id']) ? $_GET['click_id'] : '';
$idev_ordernum  	= isset($_GET['order_id']) ? $_GET['order_id'] : '';
$aff_id         	= isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : '';
// convert start
$dollar				= isset($_GET['payout']) ? $_GET['payout'] : '';
$usd_to_eur 		= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur 				= $dollar * $usd_to_eur;
// convert end
// get vars for requests end
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$clickid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
?>