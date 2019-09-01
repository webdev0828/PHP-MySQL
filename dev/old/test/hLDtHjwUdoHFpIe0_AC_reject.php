<?php
// get vars for requests start
$geotidove=$_GET['geotids'];
$idev_ordernum=$_GET['idev_ordernum'];
$subid=$_GET['affiliate_id'];
// convert start
if (isset($_GET['idev_saleamt'])) { 
$dollar=$_GET['idev_saleamt'];
} else {
    die();
}
$usd_to_eur=file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur=$dollar * $usd_to_eur;
// convert end
// get vars for requests end
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/hLDtHjwUdoHFpIe0_AC_remove_sale.php?idev_ordernum=reject-".$idev_ordernum."&idev_saleamt=-".$eur."&affiliate_id=".$subid."&geotids=".$geotidove);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
?>