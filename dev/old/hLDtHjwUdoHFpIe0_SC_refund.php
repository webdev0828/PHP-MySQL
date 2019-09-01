<?php
// script gets clickid and searches in current sales to find the order number and to unapprove commission by it
// works for StripChat | DONE - TEST
// TODO: make archive payment / mark as paid to aslo include clickid && make declining payment also move clickid
include_once "API/config.php";
$clickid    = isset($_GET['clickid']) ? $_GET['clickid'] : '';
$qtrackers 	= $db->prepare('SELECT tracking FROM idevaff_sales WHERE clickid = ? LIMIT 1');
$qtrackers->execute([$clickid]);
$tquery 	= $qtrackers->fetch();
$ordernum 	= $tquery['tracking'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=".$ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
die();
?>