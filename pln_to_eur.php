<?
$url = 'https://free.currencyconverterapi.com/api/v6/convert?q=PLN_EUR&compact=ultra&apiKey=313686660d6afd79b553';
$json = file_get_contents($url);
$json = json_decode($json, true);
$pln_eur = $json['PLN_EUR'];
// 	main
    if ($pln_eur != '' && is_numeric($pln_eur)) {
		$eur = $pln_eur;
// 	fallback
	} else {
//	manual
		$eur = "0.23";
	}	
file_put_contents('0_pln_to_eur.txt', $eur);
echo $eur;
?>