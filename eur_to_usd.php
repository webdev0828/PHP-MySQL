<?
$url = 'https://free.currencyconverterapi.com/api/v6/convert?q=EUR_USD&compact=ultra&apiKey=313686660d6afd79b553';
$json = file_get_contents($url);
$json = json_decode($json, true);
$eur_usd = $json['EUR_USD'];
// 	main
    if ($eur_usd != '' && is_numeric($eur_usd)) {
		$dollar = $eur_usd;
	} else {
//	manual
		$dollar = "1.12";
	}
file_put_contents('0_eur_to_usd.txt', $dollar);
?>