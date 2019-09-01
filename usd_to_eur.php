<?
$url = 'https://free.currencyconverterapi.com/api/v6/convert?q=USD_EUR&compact=ultra&apiKey=313686660d6afd79b553';
$json = file_get_contents($url);
$json = json_decode($json, true);
$usd_eur = $json['USD_EUR'];
// 	main
    if ($usd_eur != '' && is_numeric($usd_eur)) {
		$eur = $usd_eur;
    } elseif ($usd_eur == '' && is_numeric($usd_eur)) {
// 	fallback
    	$fallback_url = 'http://apilayer.net/api/live?access_key=bb9f0cdf4356a874895a0f238c7604e4&currencies=EUR&format=1';
		$fallback_json = file_get_contents($fallback_url);
		$fallback_json = json_decode($fallback_json, true);
    	$usd_eur = $fallback_json['quotes']['USDEUR'];
    	$eur = $usd_eur;
	} else {
//	manual
		$eur = "0.84";
	}
file_put_contents('0_usd_to_eur.txt', $eur);
echo $eur;
?>