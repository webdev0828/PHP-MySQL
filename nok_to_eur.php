<?
$url = 'https://free.currencyconverterapi.com/api/v6/convert?q=NOK_EUR&compact=ultra&apiKey=313686660d6afd79b553';
$json = file_get_contents($url);
$json = json_decode($json, true);
$nok_eur = $json['NOK_EUR'];
// 	main
    if ($nok_eur != '' && is_numeric($nok_eur)) {
		$eur = $nok_eur;
// 	fallback
	} else {
//	manual
		$eur = "0.100";
	}	
file_put_contents('0_nok_to_eur.txt', $eur);
echo $eur;
?>