<?php
if (isset($_GET['idev_ordernum'])) { $idev_ordernum=$_GET['idev_ordernum']; }
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=".$idev_ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
die();
?>