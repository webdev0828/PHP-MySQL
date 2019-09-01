<?php
// script covnerts EUR to USD for plugrush conv tracking
// convert start
$eur				= isset($_GET['payout']) ? $_GET['payout'] : '';
$eur_to_usd 		= file_get_contents('https://sublimerevenue.com/0_eur_to_usd.txt');
$dollar 			= $eur * $eur_to_usd;
// convert end
$clickid				= isset($_GET['click_id']) ? $_GET['click_id'] : '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://prprocess.com/conversion/?user_id=3876&click_id=".$clickid."&currency=USD&payout=".$dollar);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
                die();
?>
