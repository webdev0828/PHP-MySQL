<?php
// get vars for requests start
if (isset($_GET['clickid'])){$clickid=$_GET['clickid'];}
if (isset($_GET['idev_ordernum'])){$oder_number=$_GET['idev_ordernum'];}
if (isset($_GET['affiliate_id'])){$aff_id=$_GET['affiliate_id'];}
// $ convert start
if (isset($_GET['idev_saleamt'])){$dollar=$_GET['idev_saleamt'];}
$rate	= file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur	= $dollar * $rate;
// $ convert end
// get vars for requests end
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU.php?idev_ordernum=".$oder_number."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$clickid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
?>