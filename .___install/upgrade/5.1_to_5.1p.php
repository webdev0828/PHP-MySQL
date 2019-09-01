<?PHP

$db->query("ALTER TABLE idevaff_invoice CHANGE `country` `country` varchar(3) NOT NULL");

// ENCRYPT PASSWORDS
// ---------------------------------------------------------------------
$getpasses = $db->query("select id,password from idevaff_affiliates");
if ($getpasses->rowCount()) {
	while ($qry = $getpasses->fetch()) {
		$id = $qry['id'];
		$pa = $qry['password'];
		$num = strlen($pa);
		if ($num < 20) {
			$pa = sha1('idev_secret'.$pa);
			$db_update = $db->prepare("update idevaff_affiliates set password = ? where id = ?");
			$db_update->execute(array($pa,$id));
		}
	}
}


// ALTER COUNTRY CODES
// ---------------------------------------------------------------------
$getcountries = $db->query("select id, country from idevaff_affiliates");
if ($getcountries->rowCount()) {
while ($qry = $getcountries->fetch()) {
$aff_id = $qry['id'];
$country = $qry['country'];
$num = strlen($country);
$new_country = "";
if ($num == 2) {

if ($country == "US") { $new_country = "USA"; }
if ($country == "CA") { $new_country = "CAN"; }
if ($country == "AF") { $new_country = "AFG"; }
if ($country == "AL") { $new_country = "ALB"; }
if ($country == "DZ") { $new_country = "DZA"; }
if ($country == "AS") { $new_country = "ASM"; }
if ($country == "AD") { $new_country = "AND"; }
if ($country == "AO") { $new_country = "AGO"; }
if ($country == "AI") { $new_country = "AIA"; }
if ($country == "AQ") { $new_country = "ATA"; }
if ($country == "AG") { $new_country = "ATG"; }
if ($country == "AR") { $new_country = "ARG"; }
if ($country == "AM") { $new_country = "ARM"; }
if ($country == "AW") { $new_country = "ABW"; }
if ($country == "AU") { $new_country = "AUS"; }
if ($country == "AT") { $new_country = "AUT"; }
if ($country == "AZ") { $new_country = "AZE"; }
if ($country == "BS") { $new_country = "BHS"; }
if ($country == "BH") { $new_country = "BHR"; }
if ($country == "BD") { $new_country = "BGD"; }
if ($country == "BB") { $new_country = "BRB"; }
if ($country == "BY") { $new_country = "BLR"; }
if ($country == "BE") { $new_country = "BEL"; }
if ($country == "BZ") { $new_country = "BLZ"; }
if ($country == "BJ") { $new_country = "BEN"; }
if ($country == "BM") { $new_country = "BMU"; }
if ($country == "BU") { $new_country = "BTN"; }
if ($country == "BO") { $new_country = "BOL"; }
if ($country == "BA") { $new_country = "BIH"; }
if ($country == "BW") { $new_country = "BWA"; }
if ($country == "BV") { $new_country = "BVT"; }
if ($country == "BR") { $new_country = "BRA"; }
if ($country == "IO") { $new_country = "IOT"; }
if ($country == "BN") { $new_country = "BRN"; }
if ($country == "BG") { $new_country = "BGR"; }
if ($country == "BF") { $new_country = "BFA"; }
if ($country == "BI") { $new_country = "BDI"; }
if ($country == "BT") { $new_country = "KHM"; }
if ($country == "KH") { $new_country = "CMR"; }
if ($country == "CM") { $new_country = "XCA"; }
if ($country == "CV") { $new_country = "CPV"; }
if ($country == "KY") { $new_country = "CYM"; }
if ($country == "CF") { $new_country = "CAF"; }
if ($country == "TD") { $new_country = "TCD"; }
if ($country == "CL") { $new_country = "CHL"; }
if ($country == "CN") { $new_country = "CHN"; }
if ($country == "CX") { $new_country = "CXR"; }
if ($country == "CC") { $new_country = "CCK"; }
if ($country == "CO") { $new_country = "COL"; }
if ($country == "KM") { $new_country = "COM"; }
if ($country == "CG") { $new_country = "COG"; }
if ($country == "CK") { $new_country = "COK"; }
if ($country == "CR") { $new_country = "CRI"; }
if ($country == "HR") { $new_country = "CIV"; }
if ($country == "CU") { $new_country = "HRV"; }
if ($country == "CY") { $new_country = "CUB"; }
if ($country == "CZ") { $new_country = "CYP"; }
if ($country == "CS") { $new_country = "CZE"; }
if ($country == "DK") { $new_country = "DNK"; }
if ($country == "DJ") { $new_country = "DJI"; }
if ($country == "DM") { $new_country = "DMA"; }
if ($country == "DO") { $new_country = "DOM"; }
if ($country == "TP") { $new_country = "XET"; }
if ($country == "EC") { $new_country = "ECU"; }
if ($country == "EG") { $new_country = "EGY"; }
if ($country == "SV") { $new_country = "SLV"; }
if ($country == "GQ") { $new_country = "GNQ"; }
if ($country == "ER") { $new_country = "ERI"; }
if ($country == "EE") { $new_country = "EST"; }
if ($country == "ET") { $new_country = "ETH"; }
if ($country == "FK") { $new_country = "FLK"; }
if ($country == "FO") { $new_country = "FRO"; }
if ($country == "FJ") { $new_country = "FJI"; }
if ($country == "FI") { $new_country = "FIN"; }
if ($country == "FR") { $new_country = "FRA"; }
if ($country == "FX") { $new_country = "FXX"; }
if ($country == "FG") { $new_country = "GUF"; }
if ($country == "FP") { $new_country = "PYF"; }
if ($country == "FS") { $new_country = "ATF"; }
if ($country == "TF") { $new_country = "GAB"; }
if ($country == "GM") { $new_country = "GMB"; }
if ($country == "GE") { $new_country = "GEO"; }
if ($country == "DE") { $new_country = "DEU"; }
if ($country == "GH") { $new_country = "GHA"; }
if ($country == "GI") { $new_country = "GIB"; }
if ($country == "GR") { $new_country = "GRC"; }
if ($country == "GL") { $new_country = "GRL"; }
if ($country == "GD") { $new_country = "GRD"; }
if ($country == "GP") { $new_country = "GLP"; }
if ($country == "GU") { $new_country = "GUM"; }
if ($country == "GT") { $new_country = "GTM"; }
if ($country == "GN") { $new_country = "GIN"; }
if ($country == "GW") { $new_country = "GNB"; }
if ($country == "GY") { $new_country = "GUY"; }
if ($country == "HT") { $new_country = "HTI"; }
if ($country == "HM") { $new_country = "HMD"; }
if ($country == "HN") { $new_country = "HND"; }
if ($country == "HK") { $new_country = "HKG"; }
if ($country == "HU") { $new_country = "HUN"; }
if ($country == "IS") { $new_country = "ISL"; }
if ($country == "IN") { $new_country = "IND"; }
if ($country == "ID") { $new_country = "IDN"; }
if ($country == "IR") { $new_country = "IRN"; }
if ($country == "IQ") { $new_country = "IRQ"; }
if ($country == "IE") { $new_country = "IRL"; }
if ($country == "IL") { $new_country = "ISR"; }
if ($country == "IT") { $new_country = "ITA"; }
if ($country == "JM") { $new_country = "JAM"; }
if ($country == "JP") { $new_country = "JPN"; }
if ($country == "JO") { $new_country = "XJE"; }
if ($country == "KZ") { $new_country = "JOR"; }
if ($country == "KE") { $new_country = "KAZ"; }
if ($country == "KG") { $new_country = "KEN"; }
if ($country == "KI") { $new_country = "KIR"; }
if ($country == "KP") { $new_country = "PRK"; }
if ($country == "KR") { $new_country = "KOR"; }
if ($country == "KW") { $new_country = "KWT"; }
if ($country == "KG") { $new_country = "KGZ"; }
if ($country == "LA") { $new_country = "LAO"; }
if ($country == "LV") { $new_country = "LVA"; }
if ($country == "LB") { $new_country = "LBN"; }
if ($country == "LS") { $new_country = "LSO"; }
if ($country == "LR") { $new_country = "LBR"; }
if ($country == "LY") { $new_country = "LBY"; }
if ($country == "LI") { $new_country = "LIE"; }
if ($country == "LT") { $new_country = "LTU"; }
if ($country == "LU") { $new_country = "LUX"; }
if ($country == "MO") { $new_country = "MAC"; }
if ($country == "MS") { $new_country = "MKD"; }
if ($country == "MG") { $new_country = "MDG"; }
if ($country == "MW") { $new_country = "MWI"; }
if ($country == "MY") { $new_country = "MYS"; }
if ($country == "MV") { $new_country = "MDV"; }
if ($country == "ML") { $new_country = "MLI"; }
if ($country == "MT") { $new_country = "MLT"; }
if ($country == "MH") { $new_country = "MHL"; }
if ($country == "MQ") { $new_country = "MTQ"; }
if ($country == "MR") { $new_country = "MRT"; }
if ($country == "MU") { $new_country = "MUS"; }
if ($country == "MY") { $new_country = "MYT"; }
if ($country == "MX") { $new_country = "MEX"; }
if ($country == "FM") { $new_country = "FSM"; }
if ($country == "MD") { $new_country = "MDA"; }
if ($country == "MC") { $new_country = "MCO"; }
if ($country == "MN") { $new_country = "MNG"; }
if ($country == "MS") { $new_country = "MSR"; }
if ($country == "MA") { $new_country = "MAR"; }
if ($country == "MZ") { $new_country = "MOZ"; }
if ($country == "MM") { $new_country = "MMR"; }
if ($country == "NA") { $new_country = "NAM"; }
if ($country == "NR") { $new_country = "NRU"; }
if ($country == "NP") { $new_country = "NPL"; }
if ($country == "NL") { $new_country = "NLD"; }
if ($country == "AN") { $new_country = "ANT"; }
if ($country == "NC") { $new_country = "NCL"; }
if ($country == "NZ") { $new_country = "NZL"; }
if ($country == "NI") { $new_country = "NIC"; }
if ($country == "NE") { $new_country = "NER"; }
if ($country == "NG") { $new_country = "NGA"; }
if ($country == "NU") { $new_country = "NIU"; }
if ($country == "NF") { $new_country = "NFK"; }
if ($country == "MP") { $new_country = "MNP"; }
if ($country == "NO") { $new_country = "NOR"; }
if ($country == "OM") { $new_country = "OMN"; }
if ($country == "PK") { $new_country = "PAK"; }
if ($country == "PW") { $new_country = "PLW"; }
if ($country == "PA") { $new_country = "PAN"; }
if ($country == "PG") { $new_country = "PNG"; }
if ($country == "PY") { $new_country = "PRY"; }
if ($country == "PE") { $new_country = "PER"; }
if ($country == "PH") { $new_country = "PHL"; }
if ($country == "PN") { $new_country = "PCN"; }
if ($country == "PL") { $new_country = "POL"; }
if ($country == "PT") { $new_country = "PRT"; }
if ($country == "PR") { $new_country = "PRI"; }
if ($country == "QA") { $new_country = "QAT"; }
if ($country == "RE") { $new_country = "REU"; }
if ($country == "RO") { $new_country = "ROM"; }
if ($country == "RU") { $new_country = "RUS"; }
if ($country == "RW") { $new_country = "RWA"; }
if ($country == "SK") { $new_country = "KNA"; }
if ($country == "LC") { $new_country = "LCA"; }
if ($country == "SV") { $new_country = "VCT"; }
if ($country == "WS") { $new_country = "WSM"; }
if ($country == "SM") { $new_country = "SMR"; }
if ($country == "ST") { $new_country = "STP"; }
if ($country == "SA") { $new_country = "SAU"; }
if ($country == "SN") { $new_country = "SEN"; }
if ($country == "SC") { $new_country = "SYC"; }
if ($country == "SL") { $new_country = "SLE"; }
if ($country == "SG") { $new_country = "SGP"; }
if ($country == "SK") { $new_country = "SVK"; }
if ($country == "SI") { $new_country = "SVN"; }
if ($country == "SB") { $new_country = "SLB"; }
if ($country == "SO") { $new_country = "SOM"; }
if ($country == "ZA") { $new_country = "ZAF"; }
if ($country == "SU") { $new_country = "SGS"; }
if ($country == "ES") { $new_country = "ESP"; }
if ($country == "LK") { $new_country = "LKA"; }
if ($country == "PM") { $new_country = "XSB"; }
if ($country == "ST") { $new_country = "XSE"; }
if ($country == "SH") { $new_country = "SHN"; }
if ($country == "SP") { $new_country = "SPM"; }
if ($country == "SD") { $new_country = "SDN"; }
if ($country == "SR") { $new_country = "SUR"; }
if ($country == "SJ") { $new_country = "SJM"; }
if ($country == "SZ") { $new_country = "SWZ"; }
if ($country == "SE") { $new_country = "SWE"; }
if ($country == "CH") { $new_country = "CHE"; }
if ($country == "SY") { $new_country = "SYR"; }
if ($country == "TW") { $new_country = "TWN"; }
if ($country == "TJ") { $new_country = "TJK"; }
if ($country == "TZ") { $new_country = "TZA"; }
if ($country == "TH") { $new_country = "THA"; }
if ($country == "DR") { $new_country = "DRC"; }
if ($country == "TG") { $new_country = "TGO"; }
if ($country == "TK") { $new_country = "TKL"; }
if ($country == "TO") { $new_country = "TON"; }
if ($country == "TT") { $new_country = "TTO"; }
if ($country == "TN") { $new_country = "TUN"; }
if ($country == "TR") { $new_country = "TUR"; }
if ($country == "TM") { $new_country = "TKM"; }
if ($country == "TC") { $new_country = "TCA"; }
if ($country == "TV") { $new_country = "TUV"; }
if ($country == "UG") { $new_country = "UGA"; }
if ($country == "UA") { $new_country = "UKR"; }
if ($country == "AE") { $new_country = "ARE"; }
if ($country == "GB") { $new_country = "GBR"; }
if ($country == "UM") { $new_country = "UMI"; }
if ($country == "UY") { $new_country = "URY"; }
if ($country == "UZ") { $new_country = "UZB"; }
if ($country == "VU") { $new_country = "VUT"; }
if ($country == "VA") { $new_country = "VAT"; }
if ($country == "VE") { $new_country = "VEN"; }
if ($country == "VN") { $new_country = "VNM"; }
if ($country == "VG") { $new_country = "VGB"; }
if ($country == "VI") { $new_country = "VIR"; }
if ($country == "WF") { $new_country = "WLF"; }
if ($country == "EH") { $new_country = "ESH"; }
if ($country == "YE") { $new_country = "YEM"; }
if ($country == "YU") { $new_country = "YUG"; }
if ($country == "ZM") { $new_country = "ZMB"; }
if ($country == "ZW") { $new_country = "ZWE"; }
if ( $new_country != '' ) {
	$db_update = $db->prepare("update idevaff_affiliates set country = ? where id = ?");
	$db_update->execute(array($new_country,$aff_id));
}


} } }

// ENCRYPT TAX ID & SSN
// ---------------------------------------------------------------------
$result = $db->query('select tax_id_ssn from idevaff_affiliates');
$i = 0;

$better_key1 = better_key();
$better_key2 = better_key();



$my_file = "../API/keys.php";
if (file_exists($my_file)) { unlink($my_file); }
$handle = @fopen($my_file, 'a');
$data_to_write = "<?PHP

	// ---------------------------------------------------------
	// Encryption Keys - Unique To Each Installation
	// ---------------------------------------------------------
	if(!defined('AUTH_KEY')) {
		define('AUTH_KEY', '" . $better_key1 . "');
	}

	if ( !defined('SITE_KEY') ) {
		define('SITE_KEY', '" . $better_key2 . "');
	}


?>";
@fwrite($handle, $data_to_write);

include("../API/keys.php");

while ($i < $result->columnCount()) {
	$col = $result->getColumnMeta($i);
	//if ($meta["blob"] != 1) {
	if ( isset($col["blob"]) && $col["blob"] != 1) {
		try {
			$db->query("ALTER TABLE idevaff_affiliates CHANGE `tax_id_ssn` `tax_id_ssn` blob NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		$getssn = $db->query("select id, tax_id_ssn from idevaff_affiliates");

		if ($getssn->rowCount()) {
			while ($qry = $getssn->fetch()) {
				$ssn_id = $qry['id'];
				$ssn = $qry['tax_id_ssn'];
				$db->query("update idevaff_affiliates set tax_id_ssn = (AES_ENCRYPT('$ssn', '" . AUTH_KEY . "')) where id = $ssn_id");
			}
		}
	}
	$i++;
}
//mysql_free_result($result);


$upgrade_version = '5.1p';
try {
	$db_update = $db->prepare("update idevaff_config set version = ?");
	$db_update->execute(array($upgrade_version));
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
?>
