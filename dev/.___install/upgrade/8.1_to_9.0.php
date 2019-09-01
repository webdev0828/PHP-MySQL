<?PHP

// ---------------------------------------------------------
// UPDATE FROM 8.1 TO 9.0
// ---------------------------------------------------------
	$version = '9.0';
// ---------------------------------------------------------


// idevaff_admin
try {
    $db->query("ALTER TABLE idevaff_admin ADD user_key varchar(255) character set utf8 NULL DEFAULT NULL");
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}



// idevaff_affiliates
try {
    $db->query("ALTER TABLE idevaff_affiliates ADD fb_user_id varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates ADD stripe_user_data mediumtext character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {

    $db->query("ALTER TABLE idevaff_affiliates ADD pay_method int(255) NOT NULL default '0'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates ADD user_key varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates ADD vat_override int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates ADD expire int(10) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates ADD expire_type int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates ADD expire_stamp bigint(40) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_affiliates CHANGE password password varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}



// idevaff_announcements
$db->query("CREATE TABLE IF NOT EXISTS idevaff_announcements (
  number int(3) NOT NULL AUTO_INCREMENT,
  grp int(10) NOT NULL default '0',
  announcement_name varchar(255) character set utf8 NULL DEFAULT NULL,
  facebook_message text NULL,
  twitter_message varchar(140) character set utf8 NULL DEFAULT NULL,
  facebook_picture varchar(255) character set utf8 NULL DEFAULT NULL,
  sort int(255) NOT NULL default '0',
  local int(1) NOT NULL default '0',
  PRIMARY KEY (number)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

// idevaff_archive
try {
    $db->query("ALTER TABLE idevaff_archive ADD tracking_method varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_archive ADD notes mediumtext character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_carts_data
// OUT OF ALPHA ORDER - NEEDED FOR TABLE BELOW
// -----------------------------------------------
// NO TABLES, THEY ARE CREATED DIRECTLY
// IN THE CART INTEGRATION PLUGIN FILES
$db->query("CREATE TABLE IF NOT EXISTS idevaff_carts_data (
table_id int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$db->query("insert into idevaff_carts_data (table_id) VALUES ('1')");

// idevaff_carts
$db->query("CREATE TABLE IF NOT EXISTS idevaff_carts (
  id int(255) NOT NULL AUTO_INCREMENT,
  name varchar(128) DEFAULT NULL,
  cat int(255) NOT NULL DEFAULT '0',
  module_location varchar(64) DEFAULT NULL,
  protection_eligible int(1) NOT NULL DEFAULT '0',
  coupon_code_eligible int(1) NOT NULL DEFAULT '0',
  per_product_eligible int(1) NOT NULL DEFAULT '0',
  profile_protection_eligible int(1) NOT NULL DEFAULT '0',
  recurring_supported int(1) NOT NULL DEFAULT '0',
  alternate_commission int(1) NOT NULL DEFAULT '0',
  version decimal(5,2) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");




// idevaff_config
try {
    $db->query("ALTER TABLE idevaff_config ADD stripe_api_secret blob NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD stripe_client_id blob NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD contact_form int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD contact_link int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD admin_notify_api_recurring int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD admin_notify_api_delayed int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD sale_generated_notify_affiliate int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD affiliate_notify_declined int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD seal int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD email_links_active int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD deb_show int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD protection_profile int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD protection_secret_key int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config ADD tier_link_url varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_config set char_set = 'utf-8'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_countries
$db->query("CREATE TABLE IF NOT EXISTS idevaff_countries (
  country_code text COLLATE utf8_unicode_ci NOT NULL,
  country_name text COLLATE utf8_unicode_ci NOT NULL,
  def int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

try {
$db->query("INSERT INTO idevaff_countries (country_code, country_name, def)
VALUES ('AFG', 'Afghanistan', 0),
('ALA', 'Åland Islands', 0),
('ALB', 'Albania', 0),
('DZA', 'Algeria', 0),
('ASM', 'American Samoa', 0),
('AND', 'Andorra', 0),
('AGO', 'Angola', 0),
('AIA', 'Anguilla', 0),
('ATA', 'Antarctica', 0),
('ATG', 'Antigua and Barbuda', 0),
('ARG', 'Argentina', 0),
('ARM', 'Armenia', 0),
('ABW', 'Aruba', 0),
('AUS', 'Australia', 0),
('AUT', 'Austria', 0),
('AZE', 'Azerbaijan', 0),
('BHS', 'Bahamas', 0),
('BHR', 'Bahrain', 0),
('BGD', 'Bangladesh', 0),
('BRB', 'Barbados', 0),
('BLR', 'Belarus', 0),
('BEL', 'Belgium', 0),
('BLZ', 'Belize', 0),
('BEN', 'Benin', 0),
('BMU', 'Bermuda', 0),
('BTN', 'Bhutan', 0),
('BOL', 'Bolivia, Plurinational State of', 0),
('BES', 'Bonaire, Sint Eustatius and Saba', 0),
('BIH', 'Bosnia and Herzegovina', 0),
('BWA', 'Botswana', 0),
('BVT', 'Bouvet Island', 0),
('BRA', 'Brazil', 0),
('IOT', 'British Indian Ocean Territory', 0),
('BRN', 'Brunei Darussalam', 0),
('BGR', 'Bulgaria', 0),
('BFA', 'Burkina Faso', 0),
('BDI', 'Burundi', 0),
('KHM', 'Cambodia', 0),
('CMR', 'Cameroon', 0),
('CAN', 'Canada', 0),
('CPV', 'Cape Verde', 0),
('CYM', 'Cayman Islands', 0),
('CAF', 'Central African Republic', 0),
('TCD', 'Chad', 0),
('CHL', 'Chile', 0),
('CHN', 'China', 0),
('CXR', 'Christmas Island', 0),
('CCK', 'Cocos (Keeling) Islands', 0),
('COL', 'Colombia', 0),
('COM', 'Comoros', 0),
('COG', 'Congo', 0),
('COD', 'Congo, the Democratic Republic of the', 0),
('COK', 'Cook Islands', 0),
('CRI', 'Costa Rica', 0),
('CIV', 'Côte d''Ivoire', 0),
('HRV', 'Croatia', 0),
('CUB', 'Cuba', 0),
('CUW', 'Curaçao', 0),
('CYP', 'Cyprus', 0),
('CZE', 'Czech Republic', 0),
('DNK', 'Denmark', 0),
('DJI', 'Djibouti', 0),
('DMA', 'Dominica', 0),
('DOM', 'Dominican Republic', 0),
('ECU', 'Ecuador', 0),
('EGY', 'Egypt', 0),
('SLV', 'El Salvador', 0),
('GNQ', 'Equatorial Guinea', 0),
('ERI', 'Eritrea', 0),
('EST', 'Estonia', 0),
('ETH', 'Ethiopia', 0),
('FLK', 'Falkland Islands (Malvinas)', 0),
('FRO', 'Faroe Islands', 0),
('FJI', 'Fiji', 0),
('FIN', 'Finland', 0),
('FRA', 'France', 0),
('GUF', 'French Guiana', 0),
('PYF', 'French Polynesia', 0),
('ATF', 'French Southern Territories', 0),
('GAB', 'Gabon', 0),
('GMB', 'Gambia', 0),
('GEO', 'Georgia', 0),
('DEU', 'Germany', 0),
('GHA', 'Ghana', 0),
('GIB', 'Gibraltar', 0),
('GRC', 'Greece', 0),
('GRL', 'Greenland', 0),
('GRD', 'Grenada', 0),
('GLP', 'Guadeloupe', 0),
('GUM', 'Guam', 0),
('GTM', 'Guatemala', 0),
('GGY', 'Guernsey', 0),
('GIN', 'Guinea', 0),
('GNB', 'Guinea-Bissau', 0),
('GUY', 'Guyana', 0),
('HTI', 'Haiti', 0),
('HMD', 'Heard Island and McDonald Islands', 0),
('VAT', 'Holy See (Vatican City State)', 0),
('HND', 'Honduras', 0),
('HKG', 'Hong Kong', 0),
('HUN', 'Hungary', 0),
('ISL', 'Iceland', 0),
('IND', 'India', 0),
('IDN', 'Indonesia', 0),
('IRN', 'Iran, Islamic Republic of', 0),
('IRQ', 'Iraq', 0),
('IRL', 'Ireland', 0),
('IMN', 'Isle of Man', 0),
('ISR', 'Israel', 0),
('ITA', 'Italy', 0),
('JAM', 'Jamaica', 0),
('JPN', 'Japan', 0),
('JEY', 'Jersey', 0),
('JOR', 'Jordan', 0),
('KAZ', 'Kazakhstan', 0),
('KEN', 'Kenya', 0),
('KIR', 'Kiribati', 0),
('PRK', 'Korea, Democratic People''s Republic of', 0),
('KOR', 'Korea, Republic of', 0),
('KWT', 'Kuwait', 0),
('KGZ', 'Kyrgyzstan', 0),
('LAO', 'Lao People''s Democratic Republic', 0),
('LVA', 'Latvia', 0),
('LBN', 'Lebanon', 0),
('LSO', 'Lesotho', 0),
('LBR', 'Liberia', 0),
('LBY', 'Libya', 0),
('LIE', 'Liechtenstein', 0),
('LTU', 'Lithuania', 0),
('LUX', 'Luxembourg', 0),
('MAC', 'Macao', 0),
('MKD', 'Macedonia, the former Yugoslav Republic of', 0),
('MDG', 'Madagascar', 0),
('MWI', 'Malawi', 0),
('MYS', 'Malaysia', 0),
('MDV', 'Maldives', 0),
('MLI', 'Mali', 0),
('MLT', 'Malta', 0),
('MHL', 'Marshall Islands', 0),
('MTQ', 'Martinique', 0),
('MRT', 'Mauritania', 0),
('MUS', 'Mauritius', 0),
('MYT', 'Mayotte', 0),
('MEX', 'Mexico', 0),
('FSM', 'Micronesia, Federated States of', 0),
('MDA', 'Moldova, Republic of', 0),
('MCO', 'Monaco', 0),
('MNG', 'Mongolia', 0),
('MNE', 'Montenegro', 0),
('MSR', 'Montserrat', 0),
('MAR', 'Morocco', 0),
('MOZ', 'Mozambique', 0),
('MMR', 'Myanmar', 0),
('NAM', 'Namibia', 0),
('NRU', 'Nauru', 0),
('NPL', 'Nepal', 0),
('NLD', 'Netherlands', 0),
('NCL', 'New Caledonia', 0),
('NZL', 'New Zealand', 0),
('NIC', 'Nicaragua', 0),
('NER', 'Niger', 0),
('NGA', 'Nigeria', 0),
('NIU', 'Niue', 0),
('NFK', 'Norfolk Island', 0),
('MNP', 'Northern Mariana Islands', 0),
('NOR', 'Norway', 0),
('PAK', 'Pakistan', 0),
('PLW', 'Palau', 0),
('PSE', 'Palestinian Territory, Occupied', 0),
('PAN', 'Panama', 0),
('PNG', 'Papua New Guinea', 0),
('PRY', 'Paraguay', 0),
('PER', 'Peru', 0),
('PHL', 'Philippines', 0),
('PCN', 'Pitcairn', 0),
('POL', 'Poland', 0),
('PRT', 'Portugal', 0),
('PRI', 'Puerto Rico', 0),
('QAT', 'Qatar', 0),
('REU', 'Réunion', 0),
('ROU', 'Romania', 0),
('RUS', 'Russian Federation', 0),
('RWA', 'Rwanda', 0),
('BLM', 'Saint Barthélemy', 0),
('SHN', 'Saint Helena, Ascension and Tristan da Cunha', 0),
('KNA', 'Saint Kitts and Nevis', 0),
('LCA', 'Saint Lucia', 0),
('MAF', 'Saint Martin (French part)', 0),
('SPM', 'Saint Pierre and Miquelon', 0),
('VCT', 'Saint Vincent and the Grenadines', 0),
('WSM', 'Samoa', 0),
('SMR', 'San Marino', 0),
('STP', 'Sao Tome and Principe', 0),
('SAU', 'Saudi Arabia', 0),
('SEN', 'Senegal', 0),
('SRB', 'Serbia', 0),
('SYC', 'Seychelles', 0),
('SLE', 'Sierra Leone', 0),
('SGP', 'Singapore', 0),
('SXM', 'Sint Maarten (Dutch part)', 0),
('SVK', 'Slovakia', 0),
('SVN', 'Slovenia', 0),
('SLB', 'Solomon Islands', 0),
('SOM', 'Somalia', 0),
('ZAF', 'South Africa', 0),
('SGS', 'South Georgia and the South Sandwich Islands', 0),
('SSD', 'South Sudan', 0),
('ESP', 'Spain', 0),
('LKA', 'Sri Lanka', 0),
('SDN', 'Sudan', 0),
('SUR', 'Suriname', 0),
('SJM', 'Svalbard and Jan Mayen', 0),
('SWZ', 'Swaziland', 0),
('SWE', 'Sweden', 0),
('CHE', 'Switzerland', 0),
('SYR', 'Syrian Arab Republic', 0),
('TWN', 'Taiwan, Province of China', 0),
('TJK', 'Tajikistan', 0),
('TZA', 'Tanzania, United Republic of', 0),
('THA', 'Thailand', 0),
('TLS', 'Timor-Leste', 0),
('TGO', 'Togo', 0),
('TKL', 'Tokelau', 0),
('TON', 'Tonga', 0),
('TTO', 'Trinidad and Tobago', 0),
('TUN', 'Tunisia', 0),
('TUR', 'Turkey', 0),
('TKM', 'Turkmenistan', 0),
('TCA', 'Turks and Caicos Islands', 0),
('TUV', 'Tuvalu', 0),
('UGA', 'Uganda', 0),
('UKR', 'Ukraine', 0),
('ARE', 'United Arab Emirates', 0),
('GBR', 'United Kingdom', 0),
('USA', 'United States', 1),
('UMI', 'United States Minor Outlying Islands', 0),
('URY', 'Uruguay', 0),
('UZB', 'Uzbekistan', 0),
('VUT', 'Vanuatu', 0),
('VEN', 'Venezuela, Bolivarian Republic of', 0),
('VNM', 'Viet Nam', 0),
('VGB', 'Virgin Islands, British', 0),
('VIR', 'Virgin Islands, U.S.', 0),
('WLF', 'Wallis and Futuna', 0),
('ESH', 'Western Sahara', 0),
('YEM', 'Yemen', 0),
('ZMB', 'Zambia', 0),
('ZWE', 'Zimbabwe', 0)
");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_cp_settings
$db->query("DROP TABLE IF EXISTS idevaff_cp_settings");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_cp_settings (
  cp_theme varchar(255) character set utf8 NULL DEFAULT NULL,
  background varchar(10) character set utf8 NULL DEFAULT NULL,
  header_background varchar(10) character set utf8 NULL DEFAULT NULL,
  heading_text varchar(10) character set utf8 NULL DEFAULT NULL,
  top_menu_background varchar(10) character set utf8 NULL DEFAULT NULL,
  heading_back varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_1 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_2 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_3 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_4 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_5 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_6 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_1 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_2 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_3 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_4 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_5 varchar(10) character set utf8 NULL DEFAULT NULL,
  portlet_text_6 varchar(10) character set utf8 NULL DEFAULT NULL,
  box_tt_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_tt_text varchar(10) character set utf8 NULL DEFAULT NULL,
  box_ce_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_ce_text varchar(10) character set utf8 NULL DEFAULT NULL,
  box_te_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_te_text varchar(10) character set utf8 NULL DEFAULT NULL,
  box_uv_back varchar(10) character set utf8 NULL DEFAULT NULL,
  box_uv_text varchar(10) character set utf8 NULL DEFAULT NULL,
  bar_comms_last_6 int(1) NOT NULL default '0',
  pie_top_5_month int(1) NOT NULL default '0',
  cp_page_width int(1) NOT NULL default '0',
  cp_menu_location int(1) NOT NULL default '0',
  cp_fixed_navbar int(1) NOT NULL default '0',
  cp_fixed_left_menu int(1) NOT NULL default '0',
  top_menu_text varchar(10) character set utf8 NULL DEFAULT NULL,
  cp_main_menu_color varchar(10) character set utf8 NULL DEFAULT NULL,
  cp_main_menu_text varchar(10) character set utf8 NULL DEFAULT NULL,
  logo_footer int(1) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$db->query("INSERT INTO idevaff_cp_settings (cp_theme, background, header_background, heading_text, top_menu_background, heading_back, portlet_1, portlet_2, portlet_3, portlet_4, portlet_5, portlet_6, portlet_text_1, portlet_text_2, portlet_text_3, portlet_text_4, portlet_text_5, portlet_text_6, box_tt_back, box_tt_text, box_ce_back, box_ce_text, box_te_back, box_te_text, box_uv_back, box_uv_text, bar_comms_last_6, pie_top_5_month, cp_page_width, cp_menu_location, cp_fixed_navbar, cp_fixed_left_menu, top_menu_text, cp_main_menu_color, cp_main_menu_text, logo_footer) VALUES ('default', '#454e54', '#000000', '#454e54', '#000000', '#ffffff', '#bcc7cf', '#454e54', '#133d85', '#0c0f66', '#cc0000', '#33cc33', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#33cc33', '#ffffff', '#cc0000', '#ffffff', '#454e54', '#ffffff', '#246fe0', '#ffffff', 0, 0, 0, 0, 1, 1, '#ffffff', '#ffffff', '#454e54', 1)");

// idevaff_custom
$db->query("DROP TABLE IF EXISTS idevaff_custom");

// idevaff_custom_vars
try {
    $db->query("ALTER TABLE idevaff_custom_vars ADD google_utm_source_value varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_custom_vars ADD google_utm_medium_value varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_custom_vars ADD google_utm_campaign_value varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_debit
$db->query("CREATE TABLE IF NOT EXISTS idevaff_debit (
  id int(255) NOT NULL AUTO_INCREMENT,
  aff_id int(255) NOT NULL default '0',
  amount decimal(20,2) NOT NULL default '0.00',
  code bigint(12) NOT NULL default '0',
  reason int(1) NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

// idevaff_debit_archive
$db->query("CREATE TABLE IF NOT EXISTS idevaff_debit_archive (
  id int(255) NOT NULL AUTO_INCREMENT,
  aff_id int(255) NOT NULL default '0',
  amount decimal(20,2) NOT NULL default '0.00',
  code bigint(12) NOT NULL default '0',
  reason int(1) NOT NULL default '0',
  payment_record int(255) NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");


// idevaff_deleted_accounts
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD fb_user_id varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD stripe_user_data mediumtext character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD pay_method int(255) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD user_key varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD vat_override int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD expire int(10) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD expire_type int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts ADD expire_stamp int(40) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_accounts CHANGE password password varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_deleted_sales
try {
    $db->query("ALTER TABLE idevaff_deleted_sales ADD tracking_method varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_sales ADD conversion_time bigint(12) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_sales ADD notes mediumtext character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_deleted_sales ADD alt_amt decimal(10,3) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// idevaff_email_settings
try {
    $db->query("ALTER TABLE idevaff_email_settings ADD api_email_address varchar(128) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// ---------------------------------------------------------
// UPDATE EMAIL LANGUAGE PACKS
// ---------------------------------------------------------
$get_language_tables = $db->query("select table_name from idevaff_email_language_packs");
if ($get_language_tables->rowCount()) {
    while ($qry = $get_language_tables->fetch()) {
        $tmp_tbl = $qry['table_name'];
        try {
            $db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `aff_comm_declined_sub` text NOT NULL");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `aff_comm_declined_body` text NOT NULL");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `aff_comm_gen_sub` text NOT NULL");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `aff_comm_gen_body` text NOT NULL");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `new_debit_subject` text NOT NULL");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `new_debit_body` text NOT NULL");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("update idevaff_email_{$tmp_tbl} SET aff_comm_declined_sub = 'Commission Declined - {company_name} Affiliate Program',aff_comm_declined_body = 'Dear {username},\r\n\r\nWe are sorry to inform you that we have had to decline a commission assigned to you. This commission was declined due to the issue of a customer refund, charge back or fraud. For further information about this commission being declined, please reply to this email message.\r\n\r\nWe appreciate your understanding in this matter.', aff_comm_gen_sub = 'New Commission Created / Pending Approval - {company_name} Affiliate Program', aff_comm_gen_body = 'Dear {first_name},\r\n\r\nWe are pleased to let you know you have generated a commission in our affiliate program. This commission is pending approval. We will let you know when it has been approved. Thank you for your continued participation in our affiliate program.', new_debit_subject = 'New Debit Added - {company_name} Affiliate Program', new_debit_body = 'Dear {first_name},\r\n\r\nWe have added a new debit to your account. This debit will be subtracted from your next payment. Please do not hesitate to contact us for further information. The reason for this debit can be found below.'");
        } catch ( Exception $ex ) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}

/*
// ---------------------------------------------------------
// ADD NEW EMAIL LANGUAGE PACKS
// ---------------------------------------------------------
try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'chinese_simplified'");
    if ( !$get_lang_info->rowCount() ) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_chinese_simplified SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('mandarin chinese', 1, 0, 'chinese_simplified', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'chinese_traditional'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_chinese_traditional SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('traditional chinese', 1, 0, 'chinese_traditional', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'finnish'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_finnish SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('finnish', 1, 0, 'finnish', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'hebrew'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_hebrew SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('hebrew', 1, 0, 'hebrew', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'hungarian'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_hungarian SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('hungarian', 1, 0, 'hungarian', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'japanese'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_japanese SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('japanese', 1, 0, 'japanese', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'korean'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_korean SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('korean', 1, 0, 'korean', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'polish'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_polish SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('polish', 1, 0, 'polish', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'russian'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_russian SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('russian', 1, 0, 'russian', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'turkish'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_turkish SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('turkish', 1, 0, 'turkish', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'ukrainian'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_ukrainian SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('ukrainian', 1, 0, 'ukrainian', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $get_lang_info = $db->query("select id from idevaff_email_language_packs where table_name = 'vietnamese'");
    if (!$get_lang_info->rowCount()) {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_email_vietnamese SELECT * FROM idevaff_email_english");
        $db->query("INSERT INTO idevaff_email_language_packs (name, status, def, table_name, user_created) VALUES ('vietnamese', 1, 0, 'vietnamese', '0')");
    }
} catch ( Exception $ex ) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

*/

$get_language_tables = $db->query("select table_name from idevaff_email_language_packs");
if ($get_language_tables->rowCount()) {
    while ($qry = $get_language_tables->fetch()) {
        if ($qry['table_name'] != 'english') {

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_acct_subject");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_acct_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_sale_subject");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_sale_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_rec_subject");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_rec_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_rew_subject");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_rew_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_fail_subject");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_fail_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_notify_logo_sub");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_notify_logo_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_new_testi_sub");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_new_testi_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_vanity_sub");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_vanity_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_max_comm_exceeded_sub");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }

            try {
                $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " DROP admin_max_comm_exceeded_body");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
        }
    }
}

$get_language_tables = $db->query("select table_name from idevaff_email_language_packs");
if ($get_language_tables->rowCount()) {
    while ($qry = $get_language_tables->fetch()) {
        try {
            $db->query("ALTER TABLE idevaff_email_" . $qry['table_name'] . " CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
    }
}

// idevaff_facebook
$db->query("DROP TABLE IF EXISTS idevaff_facebook");
$db->query("CREATE TABLE IF NOT EXISTS idevaff_facebook (
  enabled int(1) NOT NULL default '0',
  id varchar(64) character set utf8 NULL DEFAULT NULL,
  secret varchar(64) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
$db->query("INSERT INTO idevaff_facebook (enabled, id, secret) VALUES (0, '', '')");

// idevaff_groups
try {
    $db->query("ALTER TABLE idevaff_groups ADD vids int(10) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_groups ADD announcements int(10) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_iptracking
// takes too long on large databases
// can do case-by-case for customer via support ticket if needed
//$db->query("ALTER TABLE idevaff_iptracking ENGINE=InnoDB");

// idevaff_keywords
$db->query("DROP TABLE IF EXISTS idevaff_keywords");

// idevaff_language_packs
try {
    $db->query("ALTER TABLE idevaff_language_packs CHANGE `name` `name` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_language_packs CHANGE `table_name` `table_name` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_logs_admin
try {
    $db->query("ALTER TABLE idevaff_logs_admin ADD `type` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_logs_admin ADD `affiliate` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_logs_admin ADD `amount` decimal(10,2) NOT NULL default '0.00'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_newsletter_addons
$db->query("CREATE TABLE IF NOT EXISTS idevaff_newsletter_addons (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  meta_key varchar(255) character set utf8 NULL DEFAULT NULL,
  meta_value longtext NULL,
  PRIMARY KEY (id),
  UNIQUE KEY meta_key (meta_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

// ---------------------------
// NEWSLETTER INSERTS
// ---------------------------

// aweber
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='aweber'";
$st = $db->prepare($query);
$st->execute();

if ( ! $st->rowCount() ) {
    $data = array(
        'enabled' => 0,
        'oauth_code' => '',
        'consumer_key' => '',
        'consumer_secret' => '',
        'access_key' => '',
        'access_secret' => '',
        'list_ids' => array()
    );

    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('aweber','$data')";
    $db->query($query);
}

// get response
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='get_response'";
$st = $db->prepare($query);
$st->execute();

if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
        'api_key' => '',
        'list_ids' => array()
    );

    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('get_response','$data')";
    $db->query($query);
}


// iContact
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='i_contact'";
$st = $db->prepare($query);
$st->execute();

if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
        'app_id' => '',
        'api_username' => '',
        'api_password' => '',
        'list_ids' => array()
    );

    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('i_contact','$data')";
    $db->query($query);
}


// constant contact
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='constant_contact'";
$st = $db->prepare($query);
$st->execute();

if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
        'username' => '',
        'password' => '',
        'list_ids' => array()
    );

    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('constant_contact','$data')";
    $db->query($query);
}

// mail chimp
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='mailchimp'";
$st = $db->prepare($query);
$st->execute();

if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
        'api_key' => '',
        'list_ids' => array()
    );

    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('mailchimp','$data')";
    $db->query($query);
}

// ---------------------------

// idevaff_newsletter_generic
$db->query("DROP TABLE IF EXISTS idevaff_newsletter_generic");

// idevaff_newsletter_mailchimp
$db->query("DROP TABLE IF EXISTS idevaff_newsletter_mailchimp");

// idevaff_notes
try {
    $db->query("ALTER TABLE idevaff_notes ADD note_image varchar(256) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_notes ADD note_image_location int(1) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_paylevels
try {
    $db->query("ALTER TABLE idevaff_paylevels ADD amt_alt decimal(10,3) NOT NULL DEFAULT '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_payment_methods
$db->query("CREATE TABLE IF NOT EXISTS idevaff_payment_methods (
  id int(255) NOT NULL AUTO_INCREMENT,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  enabled int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

try {
$db->query("INSERT INTO idevaff_payment_methods (id, name, enabled) VALUES
(1, 'PayPal', 1),
(2, 'Stripe', 1),
(3, 'Account Credit', 1),
(4, 'Check/Money Order', 1),
(5, 'Wire Transfer', 1)");
} catch (Exception $ex) {
$ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_sales
try {
    $db->query("ALTER TABLE idevaff_sales ADD tracking_method varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales ADD conversion_time bigint(12) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales ADD notes mediumtext NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE idevaff_sales ADD alt_amt decimal(10,3) NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// idevaff_videos
$db->query("CREATE TABLE IF NOT EXISTS idevaff_videos (
  record int(255) NOT NULL AUTO_INCREMENT,
  grp int(10) NOT NULL DEFAULT '0',
  video_type varchar(10) character set utf8 NULL DEFAULT NULL,
  video varchar(255) character set utf8 NULL DEFAULT NULL,
  logo varchar(255) character set utf8 NULL DEFAULT NULL,
  logo_location varchar(20) character set utf8 NULL DEFAULT NULL,
  splash varchar(255) character set utf8 NULL DEFAULT NULL,
  effect varchar(20) character set utf8 NULL DEFAULT NULL,
  video_finish varchar(20) character set utf8 NULL DEFAULT NULL,
  preroll_show varchar(5) character set utf8 NULL DEFAULT NULL,
  preroll_skip varchar(5) character set utf8 NULL DEFAULT NULL,
  preroll_seconds int(10) NOT NULL DEFAULT '0',
  preroll_mp4 varchar(255) character set utf8 NULL DEFAULT NULL,
  preroll_thumb varchar(255) character set utf8 NULL DEFAULT NULL,
  responsive varchar(5) character set utf8 NULL DEFAULT NULL,
  fixed_width varchar(10) character set utf8 NULL DEFAULT NULL,
  fixed_height varchar(10) character set utf8 NULL DEFAULT NULL,
  auto_play varchar(5) character set utf8 NULL DEFAULT NULL,
  video_title text character set utf8 NULL DEFAULT NULL,
  video_desc text character set utf8 NULL DEFAULT NULL,
  sort int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

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

// --------------------------------------------
// UPDATE ../API/keys.php with unique keys.
// --------------------------------------------

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

if ($handle = opendir('../admin/carts/')) {
while (false !== ($entry = readdir($handle))) {
	
	$info = pathinfo($entry);
	
    if ($entry != "." && $entry != ".." && $entry != "module_update.php" && $entry != "notes.php" && $entry != "notes_integration.php" && $info['extension'] == "php") {
        $query = $db->prepare("SELECT COUNT(*) from idevaff_carts where module_location = ?");
        $query->execute(array($entry));
        if (!$query->fetchColumn()) {
            $readingonly = true;
            include('../admin/carts/' . $entry);

            $st1 = $db->prepare("insert into idevaff_carts (id, name, cat, module_location,protection_eligible,coupon_code_eligible,per_product_eligible,profile_protection_eligible,recurring_supported,alternate_commission,version) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $st1->execute(array($cart_profile,$cart_name,$cart_cat,$entry,$protection_eligible,$coupon_code_eligible,$per_product_eligible,$profile_protection_eligible,$recurring_supported,$alternate_commission_supported,$cart_profile_version));
        }
    }
}
closedir($handle);
}

// -------------------------------
// CONVERSIONS FOR LOCAL KEYS
// -------------------------------
$ssn_enc_key = 'robyn$1&8kdbailey$dsj&';
// Convert TAX/SSN
$query = "SELECT id, AES_DECRYPT(tax_id_ssn, '$ssn_enc_key') AS decrypted FROM idevaff_affiliates";
$stmt = $db->prepare($query);
$stmt->execute();
while( $row = $stmt->fetch() ) {
    if (isset($row['decrypted'])) {
        $sql = "update idevaff_affiliates set tax_id_ssn = (AES_ENCRYPT('" . addslashes($row['decrypted']) . "', '" . AUTH_KEY . "')) where id = ?";
        $q = $db->prepare($sql);
        $q->execute(array($row['id']));
    }
}

// -------------------------------
// CONVERT PAYMENT SETTINGS
// -------------------------------

// RESET
try {
    $db->query("update idevaff_payment_methods SET enabled = '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// NEW SET HERE
try {
    $config4upgrade	= $db->query("select paypal, force_paypal from idevaff_config");
    $config4upgrade->setFetchMode(PDO::FETCH_ASSOC);
    $config4upgrade = $config4upgrade->fetch();
    $paypal = $config4upgrade['paypal'];
    $force_paypal = $config4upgrade['force_paypal'];

    if ($paypal == '1' && $force_paypal == '1') {
		
        try {
            $db->query("update idevaff_payment_methods SET enabled = '1' where id = '1'");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
		}

    if ($paypal == '1' && $force_paypal == '0') {
		
        try {
            $db->query("update idevaff_payment_methods SET enabled = '1' where id = '1'");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }

        try {
            $db->query("update idevaff_payment_methods SET enabled = '1' where id = '4'");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
		}

    if (($paypal == '0' && $force_paypal == '0') || ($paypal == '0' && $force_paypal == '1')) {
		
        try {
            $db->query("update idevaff_payment_methods SET enabled = '1' where id = '4'");
        } catch (Exception $ex) {
            $ret_ajax['errors'][] = $ex->getMessage();
        }
		}

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// --------------------------------------------------------------
// UPDATE AFFILIATE PAYMENT SETTINGS
// --------------------------------------------------------------
try {
    $db->query("update idevaff_affiliates SET pay_method = '1' where pp = '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_affiliates SET pay_method = '4' where pp = '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// --------------------------------------------------------------
// HANDLE NON-LANGUAGE DROPS HERE
// Ensures data is available for conversion.
// --------------------------------------------------------------
try {
    $db->query("ALTER TABLE idevaff_config DROP paypal_cur");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config DROP paypal_rate");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config DROP paypal_return");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config DROP use_rate");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config DROP flashcab");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config DROP force_paypal");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_config DROP social_location");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// -------------------------------
// UPDATE IP TABLE
// DOING THIS IN 9.2 UPDATE NOW
// -------------------------------
//$db->query("delete from idevaff_ip2location");
//include("ip_table.php");

// -------------------------------
// REMOVE OLD BOOTSTRAP THEME
// -------------------------------

$dir = '../templates/themes/bootstrap_v2_fixed';

if (is_dir($dir)) {
    $objects = new RecursiveIteratorIterator (
        new RecursiveDirectoryIterator($dir),
        RecursiveIteratorIterator::SELF_FIRST);
    $directories = array(0 => $dir);
    $files = array();

    /** Recursive process of Folders. Discovery step for files and directories */
    foreach ($objects as $name => $object) {
        if (is_file($name)) {
            $files[] = $name;
        } elseif (is_dir($name)) {
            $directories[] = $name;
        }
    }

    foreach ($files as $file) {
            @unlink($file);
    }

    /** Sort folders in reverse order and delete one at a time */
    arsort($directories);
    foreach ($directories as $directory) {
        @rmdir($directory);
    }
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