<?php
$eur = mt_rand(2,99)/100 + mt_rand(0,12);
$idev_ordernum = mt_rand();
$subid = mt_rand(112,120);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_fictive.php?idev_ordernum=fictive-".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$subid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
?>