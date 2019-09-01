<?php
// script reports commission requests from AWE by clickid, order number and sale amount
// works for AWE | DONE - TEST
// get vars for requests start
include_once 'API/config.php';
// vars START
$clickid           = isset($_GET['clickid']) ? $_GET['clickid'] : '';
$idev_ordernum     = isset($_GET['ordernum']) ? $_GET['ordernum'] : '';
$qtrackers 		   = $db->prepare('SELECT acct_id FROM idevaff_iptracking WHERE clickid = ? LIMIT 1');
$qtrackers->execute([$clickid]);
$tquery 		   = $qtrackers->fetch();
$aff_id            = $tquery['acct_id'];
// vars END
// convert start
$dollar			   = isset($_GET['saleamt']) ? $_GET['saleamt'] : '';
$usd_to_eur 	   = file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
$eur 			   = $dollar * $usd_to_eur;
// convert end
// get vars for requests end
    if ($dollar > 0) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/q8GfuAqBtoDwD0AIsU_EUR.php?idev_ordernum=awe-".$idev_ordernum."&idev_saleamt=".$eur."&affiliate_id=".$aff_id."&clickid=".$clickid);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    } else {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sublimerevenue.com/API/scripts/unapprove_commission.php?secret=346077037&order_number=awe-".$idev_ordernum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
            die();
    }

echo $aff_id;
?>