<?PHP

// ---------------------------------------------------------
// UPDATE FROM 9.0 TO 9.1
// ---------------------------------------------------------
	$version = '9.1';
// ---------------------------------------------------------

// TABLE DROPS
$db->query("DROP TABLE IF EXISTS idevaff_recurring");
$db->query("DROP TABLE IF EXISTS idevaff_messages");

// TABLE ADDS
$db->query("CREATE TABLE IF NOT EXISTS idevaff_cloud (
  client_id int(10) NOT NULL default '0',
  stripe_customer_id text NULL,
  package int(1) NOT NULL default '0',
  subscription_status varchar(255) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_webhook_log (
  id int(255) NOT NULL AUTO_INCREMENT,
  response_code varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  request_url varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  event_name varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  code bigint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_geo_target (
  id int(11) NOT NULL AUTO_INCREMENT,
  country char(2) CHARACTER SET utf8 DEFAULT NULL,
  location varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  country_name varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_countries_geo (
  country_code text COLLATE utf8_unicode_ci,
  country_name text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_country_coords (
  country_code char(2) CHARACTER SET utf8 DEFAULT NULL,
  latitude decimal(14,10) NOT NULL DEFAULT '0.0000000000',
  longitude decimal(14,10) NOT NULL DEFAULT '0.0000000000',
  UNIQUE KEY country_code (country_code)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

// FIELD ADDS
try {
$db->query("ALTER TABLE idevaff_language_packs ADD direction int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD indi_incoming varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_affiliates ADD indi_incoming varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD upgrade_notify int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD webhook_url varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD background_image varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD background_image_uploaded int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD chars_allowed varchar(24) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD pass_geo int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config ADD show_map int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_cp_settings ADD details_show int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_cp_settings ADD details_show_type int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_cp_settings ADD details_show_signup int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_cp_settings ADD details_show_requirements int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_cp_settings ADD details_show_duration int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_custom_vars ADD geo varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

$db->query("update idevaff_config set background_image = 'templates/logo/bg.jpg', chars_allowed = '!@#$%^&*()-_ []{}<>+=', show_map = '1'");
$db->query("update idevaff_cp_settings set details_show = '1', details_show_type = '1', details_show_signup = '1', details_show_requirements = '1', details_show_duration = '1'");
$db->query("update idevaff_custom_vars set geo = 'country'");

// Campaign Monitor
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='campaign_monitor'";
$st = $db->prepare($query);
$st->execute();
if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
		'api_key' => '',
        'client_id' => '',
        'list_ids' => array()
    );
    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('campaign_monitor','$data')";
    $db->query($query);
}

// Active Campaign
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='active_campaign'";
$st = $db->prepare($query);
$st->execute();
if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
        'api_url' => '',
        'api_key' => ''
    );
    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('active_campaign','$data')";
    $db->query($query);
}

// Vertical Response
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='vertical_response'";
$st = $db->prepare($query);
$st->execute();
if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
        'api_key' => '',
        'api_secret' => '',
		'access_token' => '',
		'list_ids' => array()
    );
    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('vertical_response','$data')";
    $db->query($query);
}

// FIELD CHANGES
try {
    $db->query("ALTER TABLE idevaff_admin CHANGE record record int(10) NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_admin CHANGE adminid adminid varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_admin CHANGE adminpass adminpass varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_affiliates CHANGE username username varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_affiliates CHANGE password password varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts CHANGE username username varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts CHANGE password password varchar(512) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// FIELD DROPS
try {
    $db->query("ALTER TABLE idevaff_config DROP allow_rec");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP user_max");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_config DROP pass_max");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive DROP recurring");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales DROP recurring");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_sales DROP recurring");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// ---------------------------------------------------------
// LANGUAGE PACK UPDATES
// ---------------------------------------------------------

include_once ("upgrade/language_updates/".$version."/add_tables.php");

if ($handle = opendir("upgrade/language_updates/".$version."/")) {
    while (false !== ($entry = readdir($handle))) {
		
		$info = pathinfo($entry);
		
        if ($entry != "." && $entry != ".." && $entry != "add_tables.php" && $info['extension'] == "php") {
            include('upgrade/language_updates/'.$version.'/' . $entry);
        }
    }
    closedir($handle);
}

include_once ("upgrade/language_updates/".$version."/drop_tables.php");

$get_language_tables = $db->query("select table_name from idevaff_language_packs");
if ( $get_language_tables->rowCount() ) {
    while ( $qry = $get_language_tables->fetch() ) {
        $query=$db->query("SHOW TABLES LIKE 'idevaff_language_" . $qry['table_name'] . "'");
        if ( $query->rowCount() == 1 ) {
            $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci");
        }
    }
}
	
// ---------------------------------------------------------
// NEW LANGUAGE PACK INSTALLS
// ---------------------------------------------------------

if ( $handle = opendir("../includes/languages/") ) {
    while ( false !== ($entry = readdir($handle)) ) {
		
		$info = pathinfo($entry);
		
        if ($entry != "." && $entry != ".." && $entry != "english.php" && $info['extension'] == "php") {
            $new_install_package = true;
            include('../includes/languages/' . $entry);
        }
    }
    closedir($handle);
}

// ---------------------------------------------------------
// UPDATE FOR NEW IP LOCATIONS
// DOING THE DATA UPDATE IN 9.2 UPDATE NEXT
// ---------------------------------------------------------
/*
// DOING IN 9.2 UPDATE NOW
try {
$db->query("ALTER TABLE idevaff_ip2location ADD INDEX country_code (country_code)");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
*/

// ---------------------------------------------------------
// INSERT COUNTRY CODES FOR GEO
// ---------------------------------------------------------
$q = $db->query("SHOW TABLES LIKE 'idevaff_countries_geo'");
if ( $q->rowCount() == 1 ) {
$db->query("DELETE FROM idevaff_countries_geo");
$checkdata = $db->query("select * from idevaff_countries_geo");
if (!$checkdata->rowCount()) {
try { 
$db->query("INSERT INTO idevaff_countries_geo (country_code, country_name) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Aland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BL', 'Saint Barthelemy'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia, Plurinational State of'),
('BQ', 'Bonaire, Sint Eustatius and Saba'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Congo, The Democratic Republic of The'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Cote D''ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cabo Verde'),
('CW', 'Curacao'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia and The South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran, Islamic Republic of'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People''s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People''s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MF', 'Saint Martin (French Part)'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia, The Former Yugoslav Republic of'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PR', 'Puerto Rico'),
('PS', 'Palestine, State of'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SI', 'Slovenia'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('SS', 'South Sudan'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SX', 'Sint Maarten (Dutch Part)'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan, Province of China'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Holy See'),
('VC', 'Saint Vincent and The Grenadines'),
('VE', 'Venezuela, Bolivarian Republic of'),
('VG', 'Virgin Islands, British'),
('VI', 'Virgin Islands, U.S.'),
('VN', 'Viet Nam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe')");
 } catch (Exception $ex) { $ret_ajax['errors'][] = $ex->getMessage(); }
 } }
 
// ---------------------------------------------------------
// INSERT COUNTRY CODES FOR GEO
// ---------------------------------------------------------
$q = $db->query("SHOW TABLES LIKE 'idevaff_country_coords'");
if ( $q->rowCount() == 1 ) {
$db->query("DELETE FROM idevaff_country_coords");
$checkdata = $db->query("select * from idevaff_country_coords");
if (!$checkdata->rowCount()) {
try {
$db->query("INSERT INTO idevaff_country_coords (country_code, latitude, longitude) VALUES
('AD', '42.546245', '1.601554'),
('AE', '23.424076', '53.847818'),
('AF', '33.93911', '67.709953'),
('AG', '17.060816', '-61.796428'),
('AI', '18.220554', '-63.068615'),
('AL', '41.153332', '20.168331'),
('AM', '40.069099', '45.038189'),
('AN', '12.226079', '-69.060087'),
('AO', '-11.202692', '17.873887'),
('AQ', '-75.250973', '-0.071389'),
('AR', '-38.416097', '-63.616672'),
('AS', '-14.270972', '-170.132217'),
('AT', '47.516231', '14.550072'),
('AU', '-25.274398', '133.775136'),
('AW', '12.52111', '-69.968338'),
('AZ', '40.143105', '47.576927'),
('BA', '43.915886', '17.679076'),
('BB', '13.193887', '-59.543198'),
('BD', '23.684994', '90.356331'),
('BE', '50.503887', '4.469936'),
('BF', '12.238333', '-1.561593'),
('BG', '42.733883', '25.48583'),
('BH', '25.930414', '50.637772'),
('BI', '-3.373056', '29.918886'),
('BJ', '9.30769', '2.315834'),
('BM', '32.321384', '-64.75737'),
('BN', '4.535277', '114.727669'),
('BO', '-16.290154', '-63.588653'),
('BR', '-14.235004', '-51.92528'),
('BS', '25.03428', '-77.39628'),
('BT', '27.514162', '90.433601'),
('BV', '-54.423199', '3.413194'),
('BW', '-22.328474', '24.684866'),
('BY', '53.709807', '27.953389'),
('BZ', '17.189877', '-88.49765'),
('CA', '56.130366', '-106.346771'),
('CC', '-12.164165', '96.870956'),
('CD', '-4.038333', '21.758664'),
('CF', '6.611111', '20.939444'),
('CG', '-0.228021', '15.827659'),
('CH', '46.818188', '8.227512'),
('CI', '7.539989', '-5.54708'),
('CK', '-21.236736', '-159.777671'),
('CL', '-35.675147', '-71.542969'),
('CM', '7.369722', '12.354722'),
('CN', '35.86166', '104.195397'),
('CO', '4.570868', '-74.297333'),
('CR', '9.748917', '-83.753428'),
('CU', '21.521757', '-77.781167'),
('CV', '16.002082', '-24.013197'),
('CX', '-10.447525', '105.690449'),
('CY', '35.126413', '33.429859'),
('CZ', '49.817492', '15.472962'),
('DE', '51.165691', '10.451526'),
('DJ', '11.825138', '42.590275'),
('DK', '56.26392', '9.501785'),
('DM', '15.414999', '-61.370976'),
('DO', '18.735693', '-70.162651'),
('DZ', '28.033886', '1.659626'),
('EC', '-1.831239', '-78.183406'),
('EE', '58.595272', '25.013607'),
('EG', '26.820553', '30.802498'),
('EH', '24.215527', '-12.885834'),
('ER', '15.179384', '39.782334'),
('ES', '40.463667', '-3.74922'),
('ET', '9.145', '40.489673'),
('FI', '61.92411', '25.748151'),
('FJ', '-16.578193', '179.414413'),
('FK', '-51.796253', '-59.523613'),
('FM', '7.425554', '150.550812'),
('FO', '61.892635', '-6.911806'),
('FR', '46.227638', '2.213749'),
('GA', '-0.803689', '11.609444'),
('GB', '55.378051', '-3.435973'),
('GD', '12.262776', '-61.604171'),
('GE', '42.315407', '43.356892'),
('GF', '3.933889', '-53.125782'),
('GG', '49.465691', '-2.585278'),
('GH', '7.946527', '-1.023194'),
('GI', '36.137741', '-5.345374'),
('GL', '71.706936', '-42.604303'),
('GM', '13.443182', '-15.310139'),
('GN', '9.945587', '-9.696645'),
('GP', '16.995971', '-62.067641'),
('GQ', '1.650801', '10.267895'),
('GR', '39.074208', '21.824312'),
('GS', '-54.429579', '-36.587909'),
('GT', '15.783471', '-90.230759'),
('GU', '13.444304', '144.793731'),
('GW', '11.803749', '-15.180413'),
('GY', '4.860416', '-58.93018'),
('GZ', '31.354676', '34.308825'),
('HK', '22.396428', '114.109497'),
('HM', '-53.08181', '73.504158'),
('HN', '15.199999', '-86.241905'),
('HR', '45.1', '15.2'),
('HT', '18.971187', '-72.285215'),
('HU', '47.162494', '19.503304'),
('ID', '-0.789275', '113.921327'),
('IE', '53.41291', '-8.24389'),
('IL', '31.046051', '34.851612'),
('IM', '54.236107', '-4.548056'),
('IN', '20.593684', '78.96288'),
('IO', '-6.343194', '71.876519'),
('IQ', '33.223191', '43.679291'),
('IR', '32.427908', '53.688046'),
('IS', '64.963051', '-19.020835'),
('IT', '41.87194', '12.56738'),
('JE', '49.214439', '-2.13125'),
('JM', '18.109581', '-77.297508'),
('JO', '30.585164', '36.238414'),
('JP', '36.204824', '138.252924'),
('KE', '-0.023559', '37.906193'),
('KG', '41.20438', '74.766098'),
('KH', '12.565679', '104.990963'),
('KI', '-3.370417', '-168.734039'),
('KM', '-11.875001', '43.872219'),
('KN', '17.357822', '-62.782998'),
('KP', '40.339852', '127.510093'),
('KR', '35.907757', '127.766922'),
('KW', '29.31166', '47.481766'),
('KY', '19.513469', '-80.566956'),
('KZ', '48.019573', '66.923684'),
('LA', '19.85627', '102.495496'),
('LB', '33.854721', '35.862285'),
('LC', '13.909444', '-60.978893'),
('LI', '47.166', '9.555373'),
('LK', '7.873054', '80.771797'),
('LR', '6.428055', '-9.429499'),
('LS', '-29.609988', '28.233608'),
('LT', '55.169438', '23.881275'),
('LU', '49.815273', '6.129583'),
('LV', '56.879635', '24.603189'),
('LY', '26.3351', '17.228331'),
('MA', '31.791702', '-7.09262'),
('MC', '43.750298', '7.412841'),
('MD', '47.411631', '28.369885'),
('ME', '42.708678', '19.37439'),
('MG', '-18.766947', '46.869107'),
('MH', '7.131474', '171.184478'),
('MK', '41.608635', '21.745275'),
('ML', '17.570692', '-3.996166'),
('MM', '21.913965', '95.956223'),
('MN', '46.862496', '103.846656'),
('MO', '22.198745', '113.543873'),
('MP', '17.33083', '145.38469'),
('MQ', '14.641528', '-61.024174'),
('MR', '21.00789', '-10.940835'),
('MS', '16.742498', '-62.187366'),
('MT', '35.937496', '14.375416'),
('MU', '-20.348404', '57.552152'),
('MV', '3.202778', '73.22068'),
('MW', '-13.254308', '34.301525'),
('MX', '23.634501', '-102.552784'),
('MY', '4.210484', '101.975766'),
('MZ', '-18.665695', '35.529562'),
('NA', '-22.95764', '18.49041'),
('NC', '-20.904305', '165.618042'),
('NE', '17.607789', '8.081666'),
('NF', '-29.040835', '167.954712'),
('NG', '9.081999', '8.675277'),
('NI', '12.865416', '-85.207229'),
('NL', '52.132633', '5.291266'),
('NO', '60.472024', '8.468946'),
('NP', '28.394857', '84.124008'),
('NR', '-0.522778', '166.931503'),
('NU', '-19.054445', '-169.867233'),
('NZ', '-40.900557', '174.885971'),
('OM', '21.512583', '55.923255'),
('PA', '8.537981', '-80.782127'),
('PE', '-9.189967', '-75.015152'),
('PF', '-17.679742', '-149.406843'),
('PG', '-6.314993', '143.95555'),
('PH', '12.879721', '121.774017'),
('PK', '30.375321', '69.345116'),
('PL', '51.919438', '19.145136'),
('PM', '46.941936', '-56.27111'),
('PN', '-24.703615', '-127.439308'),
('PR', '18.220833', '-66.590149'),
('PS', '31.952162', '35.233154'),
('PT', '39.399872', '-8.224454'),
('PW', '7.51498', '134.58252'),
('PY', '-23.442503', '-58.443832'),
('QA', '25.354826', '51.183884'),
('RE', '-21.115141', '55.536384'),
('RO', '45.943161', '24.96676'),
('RS', '44.016521', '21.005859'),
('RU', '61.52401', '105.318756'),
('RW', '-1.940278', '29.873888'),
('SA', '23.885942', '45.079162'),
('SB', '-9.64571', '160.156194'),
('SC', '-4.679574', '55.491977'),
('SD', '12.862807', '30.217636'),
('SE', '60.128161', '18.643501'),
('SG', '1.352083', '103.819836'),
('SH', '-24.143474', '-10.030696'),
('SI', '46.151241', '14.995463'),
('SJ', '77.553604', '23.670272'),
('SK', '48.669026', '19.699024'),
('SL', '8.460555', '-11.779889'),
('SM', '43.94236', '12.457777'),
('SN', '14.497401', '-14.452362'),
('SO', '5.152149', '46.199616'),
('SR', '3.919305', '-56.027783'),
('ST', '0.18636', '6.613081'),
('SV', '13.794185', '-88.89653'),
('SY', '34.802075', '38.996815'),
('SZ', '-26.522503', '31.465866'),
('TC', '21.694025', '-71.797928'),
('TD', '15.454166', '18.732207'),
('TF', '-49.280366', '69.348557'),
('TG', '8.619543', '0.824782'),
('TH', '15.870032', '100.992541'),
('TJ', '38.861034', '71.276093'),
('TK', '-8.967363', '-171.855881'),
('TL', '-8.874217', '125.727539'),
('TM', '38.969719', '59.556278'),
('TN', '33.886917', '9.537499'),
('TO', '-21.178986', '-175.198242'),
('TR', '38.963745', '35.243322'),
('TT', '10.691803', '-61.222503'),
('TV', '-7.109535', '177.64933'),
('TW', '23.69781', '120.960515'),
('TZ', '-6.369028', '34.888822'),
('UA', '48.379433', '31.16558'),
('UG', '1.373333', '32.290275'),
('UM', '', ''),
('US', '37.09024', '-95.712891'),
('UY', '-32.522779', '-55.765835'),
('UZ', '41.377491', '64.585262'),
('VA', '41.902916', '12.453389'),
('VC', '12.984305', '-61.287228'),
('VE', '6.42375', '-66.58973'),
('VG', '18.420695', '-64.639968'),
('VI', '18.335765', '-64.896335'),
('VN', '14.058324', '108.277199'),
('VU', '-15.376706', '166.959158'),
('WF', '-13.768752', '-177.156097'),
('WS', '-13.759029', '-172.104629'),
('XK', '42.602636', '20.902977'),
('YE', '15.552727', '48.516388'),
('YT', '-12.8275', '45.166244'),
('ZA', '-30.559482', '22.937506'),
('ZM', '-13.133897', '27.849332'),
('ZW', '-19.015438', '29.154857')
");
} catch (Exception $ex) { $ret_ajax['errors'][] = $ex->getMessage(); }
} }

// -------------------------------
// MOVE LICENSE KEY FILES
// -------------------------------
if (file_exists($path . '/admin/filename_license_key.php')) {
unlink($path . '/admin/filename_license_key.php');
}
if (file_exists($path . '/admin/private_license_key.php')) {
unlink($path . '/admin/private_license_key.php');
}
if (file_exists($path . '/admin/qr_license_key.php')) {
unlink($path . '/admin/qr_license_key.php');
}
if (file_exists($path . '/admin/seo_license_key.php')) {
unlink($path . '/admin/seo_license_key.php');
}
if (file_exists($path . '/admin/social_media_license_key.php')) {
unlink($path . '/admin/social_media_license_key.php');
}
if (file_exists($path . '/admin/vanity_codes_key.php')) {
unlink($path . '/admin/vanity_codes_key.php');
}

// -------------------------------
// UPDATE VERSION
// -------------------------------
try {
    $query = $db->prepare("update idevaff_config set version = ?");
    $query->execute(array($version));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
?>