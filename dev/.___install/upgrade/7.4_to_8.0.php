<?PHP

// ---------------------------------------------------------
// UPDATE FROM 7.4 TO 8.0
// ---------------------------------------------------------
// TABLE DROPS
// ---------------------------------------------------------

$db->query("DROP TABLE IF EXISTS idevaff_colors");
$db->query("DROP TABLE IF EXISTS idevaff_training_videos");

// ---------------------------------------------------------
// COLUMN DROPS
// ---------------------------------------------------------
try {
	$db->query("ALTER TABLE idevaff_admin DROP `date`");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_admin DROP `time`");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_video_library DROP video_dir");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}


try {
	$db->query("ALTER TABLE idevaff_video_library DROP video_filename");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_video_library DROP video_query_string");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}


// ---------------------------------------------------------
// TABLE UPDATES
// ---------------------------------------------------------
try {
	$db->query("ALTER TABLE idevaff_admin ADD `code` bigint(12) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_ads ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_affiliates ADD `picture` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_archive ADD geo ENUM('AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW') NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_archive ADD `ip` varchar(64) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_banners ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_banners ADD `local` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}


try {
	$db->query("ALTER TABLE idevaff_config ADD `social_location` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `theme` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `install_date` bigint(12) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `logo_uploaded` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `qsg_box` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `message_check` varchar(30) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `pic_upload` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `vanity_codes` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `vanity_notify` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `aff_lib` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `toggle_bonus_display` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `suspended_location` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `login_count` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config ADD `admin_theme` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

//$db->query("ALTER TABLE idevaff_config ADD `qr_codes` int(1) NOT NULL default '0'");

try {
	$db->query("ALTER TABLE idevaff_coupons ADD `discount_amount` text NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_cp_settings ADD `theme_color` varchar(64) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_deleted_accounts ADD `picture` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_deleted_sales ADD geo ENUM('AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW') NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_email_templates ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_general_sales ADD geo ENUM('AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW') NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_groups ADD `qr_enabled` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_htmlads ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_iptracking ADD geo ENUM('AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW') NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_links ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_lightboxes ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_pdf ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_peels ADD `sort` int(255) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_sales ADD geo ENUM('AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW') NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_suspensions ADD `alt_delivery` int(1) NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_video_library ADD `video_location` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

// ---------------------------------------------------------
// TABLE CHANGES
// ---------------------------------------------------------
try {
	$db->query("ALTER TABLE idevaff_config CHANGE `sitename` `sitename` varchar(128) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `siteurl` `siteurl` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `base_url` `base_url` varchar(255) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `full_path` `default_destination` varchar(255) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `cookie_url` `cookie_url` varchar(128) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `currency` `currency` varchar(10) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `cur_sym` `cur_sym` varchar(10) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `paypal_cur` `paypal_cur` varchar(3) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `paypal_return` `paypal_return` varchar(128) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `payday` `payday` varchar(1) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `offline_loc` `offline_loc` varchar(128) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `offline_send` `offline_send` varchar(128) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `offline_tag` `offline_tag` varchar(64) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `idev_affiliate` `idev_affiliate` varchar(10) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `version` `version` varchar(20) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `license` `license` varchar(64) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `page_style` `page_style` char(1) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `panel_align` `panel_align` varchar(6) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `filename` `filename` varchar(128) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
try {
	$db->query("ALTER TABLE idevaff_config CHANGE `flashcab` `flashcab` varchar(20) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `pass_var` `pass_var` varchar(32) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `ip_setting` `ip_setting` varchar(64) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `bk_image` `bk_image` varchar(255) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
try {
	$db->query("ALTER TABLE idevaff_config CHANGE `lightbox_link_text` `lightbox_link_text` text character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `char_set` `char_set` varchar(24) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `staff` `staff` varchar(64) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `seo_url` `seo_url` varchar(255) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
try {
	$db->query("ALTER TABLE idevaff_config CHANGE `link_type` `link_type` varchar(20) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_config CHANGE `main_logo` `main_logo` varchar(255) character set utf8 NULL DEFAULT NULL");

} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_banners CHANGE `image` `image` varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

// ---------------------------------------------------------
// TABLE ADDS
// ---------------------------------------------------------

$db->query("CREATE TABLE IF NOT EXISTS idevaff_coupons_pending (
  id int(11) NOT NULL auto_increment,
  affiliate int(255) NOT NULL default '0',
  coupon_code varchar(255) character set utf8 NULL DEFAULT NULL,
  stamp int(40) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

/*
// DOING IN 9.2 UPDATE NOW
$db->query("CREATE TABLE IF NOT EXISTS idevaff_ip2location (
  ip_from int(10) unsigned default NULL,
  ip_to int(10) unsigned default NULL,
  country_code char(2) collate utf8_bin default NULL,
  country_name varchar(64) collate utf8_bin default NULL,
  KEY idx_ip_from (ip_from),
  KEY idx_ip_to (ip_to),
  KEY idx_ip_from_to (ip_from,ip_to)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
*/

$db->query("CREATE TABLE IF NOT EXISTS idevaff_messages (
  record int(255) NOT NULL auto_increment,
  message_id int(255) NOT NULL default '0',
  message_date varchar(64) character set utf8 NULL DEFAULT NULL,
  read_date varchar(64) character set utf8 NULL DEFAULT NULL,
  m_type int(1) NOT NULL default '0',
  PRIMARY KEY  (record)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_qsg (
  step_1 int(1) NOT NULL default '0',
  step_2 int(1) NOT NULL default '0',
  step_3 int(1) NOT NULL default '0',
  step_4 int(1) NOT NULL default '0',
  step_5 int(1) NOT NULL default '0',
  step_6 int(1) NOT NULL default '0',
  step_7 int(1) NOT NULL default '0',
  step_8 int(1) NOT NULL default '0',
  step_9 int(1) NOT NULL default '0',
  step_10 int(1) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sessions (
  id char(128) character set utf8 NULL DEFAULT NULL,
  set_time char(10) character set utf8 NULL DEFAULT NULL,
  data text NULL,
  session_key char(128) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sessions_aff (
  id char(128) character set utf8 NULL DEFAULT NULL,
  set_time char(10) character set utf8 NULL DEFAULT NULL,
  data text NULL,
  session_key char(128) character set utf8 NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_social (
  id int(255) NOT NULL auto_increment,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  enabled int(1) NOT NULL default '0',
  link varchar(2083) character set utf8 NULL DEFAULT NULL,
  image varchar(255) character set utf8 NULL DEFAULT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_vat (
  id int(255) NOT NULL auto_increment,
  country varchar(3) character set utf8 NULL DEFAULT NULL,
  rate decimal(10,2) NOT NULL default '0.00',
  admin_invoice int(1) NOT NULL default '0',
  affiliate_invoice int(1) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_options (
  id int(255) NOT NULL auto_increment,
  name varchar(255) character set utf8 NULL DEFAULT NULL,
  description text NULL,
  price_initial decimal(10,2) NOT NULL default '0.00',
  days_initial int(10) NOT NULL default '0',
  duration_initial varchar(1) character set utf8 NULL DEFAULT NULL,
  price_recurring decimal(10,2) NOT NULL default '0.00',
  days_recurring int(10) NOT NULL default '0',
  duration_recurring varchar(1) character set utf8 NULL DEFAULT NULL,
  days int(10) NOT NULL default '0',
  discount_percent decimal(10,2) NOT NULL default '0.00',
  discount_flat decimal(10,2) NOT NULL default '0.00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_settings (
  paypal varchar(255) character set utf8 NULL DEFAULT NULL,
  stamp int(64) NOT NULL default '0',
  enabled int(1) NOT NULL default '0',
  sidebar int(1) NOT NULL default '0',
  retro varchar(10) character set utf8 NULL DEFAULT NULL,
  video_logo_url varchar(255) character set utf8 NULL DEFAULT NULL,
  library_version decimal(10,2) NOT NULL default '0.00',
  cloud_location varchar(64) character set utf8 NULL DEFAULT NULL,
  UNIQUE KEY paypal (paypal)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_tutorials (
  id int(255) NOT NULL auto_increment,
  video_location varchar(255) character set utf8 NULL DEFAULT NULL,
  video_title varchar(255) character set utf8 NULL DEFAULT NULL,
  video_length varchar(10) character set utf8 NULL DEFAULT NULL,
  sort int(255) NOT NULL default '0',
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_admin_lockout (
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  attempts int(1) NOT NULL default '0',
  code bigint(12) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_tokens (
  panel_language varchar(64) NOT NULL,
  affiliate_login varchar(64) NOT NULL,
  affiliate_creds varchar(64) NOT NULL,
  affiliate_private varchar(64) NOT NULL,
  KEY panel_language (panel_language),
  KEY affiliate_login (affiliate_login),
  KEY affiliate_creds (affiliate_creds),
  KEY affiliate_private (affiliate_private)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

// ---------------------------------------------------------
// UPDATE EMAIL LANGUAGE PACKS - ADD
// ---------------------------------------------------------
$get_language_tables = $db->query("select `table_name` from idevaff_email_language_packs");
if ($get_language_tables->rowCount()) {
	while ($qry = $get_language_tables->fetch()) {
		$tmp_tbl = $qry['table_name'];
		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `aff_new_cc_sub` text NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `aff_new_cc_body` text NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `admin_vanity_sub` text NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} ADD `admin_vanity_body` text NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("update idevaff_email_" . $qry['table_name'] . " SET aff_new_cc_sub = 'Your Site Name Coupon Code Assigned',aff_new_cc_body = 'Dear _firstname_,\r\n\r\nWe have created a new coupon code for you to use in your marketing efforts.  Please login to your affiliate account for details on how much this coupon code is valid for and your commission rate each time it''s used.\r\n\r\nCoupon Code: _couponcode_\r\n\r\n_loginpage_', admin_vanity_sub = 'New Vanity Coupon Code Request on Our Affiliate Program', admin_vanity_body = 'Dear Admin,\r\n\r\nYou have a new vanity code request.  Please login to your admin center to setup or decline this coupon code.\r\n\r\nAffiliate ID: _id_\r\nCoupon Code Requested: _couponcode_'");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

	}
}

// ---------------------------------------------------------
// UPDATE EMAIL LANGUAGE PACKS - SUBTRACT
// ---------------------------------------------------------
$get_language_tables = $db->query("select `table_name` from idevaff_email_language_packs where `table_name` != 'english'");
if ($get_language_tables->rowCount()) {
	while ($qry = $get_language_tables->fetch()) {
		$tmp_tbl = $qry['table_name'];
		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} DROP admin_max_comm_exceeded_sub");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} DROP admin_max_comm_exceeded_body");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} DROP admin_vanity_sub");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

		try {
			$db->query("ALTER TABLE idevaff_email_{$tmp_tbl} DROP admin_vanity_body");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
	}
}

// ---------------------------------------------------------
// UPDATE LANGUAGE PACKS - ADD
// ---------------------------------------------------------
$get_language_tables = $db->query("select `table_name` from idevaff_language_packs");
if ($get_language_tables->rowCount()) {
	while ($qry = $get_language_tables->fetch()) {
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `menu_coupon` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_title` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_desc` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_head_1` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_head_2` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_head_3` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_sale_amt` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_flat_rate` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_default` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_title` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_field` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_button` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_error_missing` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_error_exists` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_error` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `cc_vanity_success` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `coupon_none` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_error_title` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_missing` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_invalid` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_error` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_success` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_title` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_info` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_bullet_1` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_bullet_2` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_bullet_3` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_file` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_button` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_current` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `pic_remove` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `progress_title` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `progress_complete` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `progress_none` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `progress_sentence_1` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `progress_sentence_2` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `progress_sentence_3` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `aff_lib_button` mediumtext NOT NULL");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
	}
}

// ---------------------------------------------------------
// UPDATE LANGUAGE PACKS - SUBTRACT
// ---------------------------------------------------------
$get_language_tables = $db->query("select `table_name` from idevaff_language_packs");
if ($get_language_tables->rowCount()) {
	while ($qry = $get_language_tables->fetch()) {
		try {
			$db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " DROP friends_title");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}
	}
}

// ---------------------------------------------------------
// DATA INSERTIONS
// ---------------------------------------------------------

//include ("ip_table.php");
// Done in 9.2 now

$checkdata = $db->query("select * from idevaff_video_settings");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_video_settings (paypal, stamp, enabled, sidebar, retro, video_logo_url, library_version, cloud_location) VALUES ('payments@idevsubscriptions.com', '0', '1', '1', '', '', '1.00', 's36qxytxlvb371')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}
}

$checkdata = $db->query("select * from idevaff_qsg");
if (!$checkdata->rowCount()) {
	try {
		$db->query("INSERT INTO idevaff_qsg (step_1, step_2, step_3, step_4, step_5, step_6, step_7, step_8, step_9, step_10) VALUES (1, 1, 1, 1, 1, 1, 1, 1, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$install_date = time();
try {
	//$db->query("update idevaff_config set social_location = '1', theme = 'bootstrap_v2_fixed', qr_codes = '0', install_date = '$install_date', logo_uploaded = '0', qsg_box = '0', message_check = '', pic_upload = '0', vanity_codes = '0', vanity_notify = '1', aff_lib = '1', toggle_bonus_display = '1', suspended_location = 'http://', login_count = '3', admin_theme = '1'");
	$st = $db->prepare("update idevaff_config set social_location = '1', theme = 'bootstrap_v2_fixed', qr_codes = '0', install_date = ?, logo_uploaded = '0', qsg_box = '0', message_check = '', pic_upload = '0', vanity_codes = '0', vanity_notify = '1', aff_lib = '1', toggle_bonus_display = '1', suspended_location = 'http://', login_count = '3', admin_theme = '1'");
	$st->execute(array($install_date));
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
try {
	$db->query("update idevaff_coupons set discount_amount = 'N/A'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
try {
	$db->query("update idevaff_cp_settings set theme_color = 'dark_blue'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

$checkdata = $db->query("select * from idevaff_tokens");
if (!$checkdata->rowCount()) {
	try {
		$db->query("INSERT INTO idevaff_tokens (panel_language, affiliate_login, affiliate_creds, affiliate_private) VALUES ('ABC', 'ABC', 'ABC', 'ABC')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}
}

$checkdata = $db->query("select id from idevaff_form_fields where id = '6'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (6, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '7'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (7, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '8'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (8, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '9'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (9, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '10'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (10, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '11'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (11, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '12'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (12, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '13'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (13, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '14'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (14, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$checkdata = $db->query("select id from idevaff_form_fields where id = '15'");
if (!$checkdata->rowCount()) {
	try {
		$db->query("insert into idevaff_form_fields (id, used, req) VALUES (15, 1, 1)");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}
}

$checkdata = $db->query("select * from idevaff_social");
if (!$checkdata->rowCount()) {
	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (1, 'facebook', 0, 'http://', 'facebook.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (2, 'twitter', 0, 'http://', 'twitter.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (3, 'linkedin', 0, 'http://', 'linkedin.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (4, 'myspace', 0, 'http://', 'myspace.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (5, 'bebo', 0, 'http://', 'bebo.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (6, 'wordpress', 0, 'http://', 'wordpress.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (7, 'youtube', 0, 'http://', 'youtube.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

	try {
		$db->query("INSERT INTO idevaff_social (id, `name`, enabled, link, image) VALUES (8, 'vimeo', 0, 'http://', 'vimeo.png')");
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

// ---------------------------------------------------------
// LANGUAGE UPDATES
// ---------------------------------------------------------

// UPDATE ALL LANGUAGES WITH NEW ENGLISH
// THIS COVERS USER CREATED LANGUAGES WITH ENGLISH
// STOCK EXTRA LANGUAGES ARE RE-UPDATED BELOW
$get_language_tables = $db->query("select `table_name` from idevaff_language_packs");
if ($get_language_tables->rowCount()) {
	while ($qry = $get_language_tables->fetch()) {
		try {
			$db->query("update idevaff_language_" . $qry['table_name'] . " set menu_coupon = 'Coupon Codes',  coupon_title = 'Your Available Coupon Codes',   coupon_desc = 'Give these coupon codes out and earn a commission each time someone uses your code!',   coupon_head_1 = 'Coupon Code',   coupon_head_2 = 'Discount To Customer',   coupon_head_3 = 'Your Commission Amount',   coupon_sale_amt = 'of sale amount',   coupon_flat_rate = 'flat rate',   coupon_default = 'Default Payout Level',   cc_vanity_title = 'Request A Personalized Coupon Code',   cc_vanity_field = 'Coupon Code',   cc_vanity_button = 'Request Coupon Code',   cc_vanity_error_missing = '<strong>Error!</strong> Please enter a coupon code.',   cc_vanity_error_exists = '<strong>Error!</strong> You''ve already requested this code. It is pending approval.',   cc_vanity_error = '<strong>Error!</strong> Coupon code is invalid. Please use only letters, numbers and underscores.',   cc_vanity_success = '<strong>Success!</strong> Your personalized coupon code has been requested.',   coupon_none = 'No coupon codes currently available.',   pic_error_title = 'Image Upload Error',   pic_missing = 'Please choose a filename.',   pic_invalid = 'Image type is not allowed. Allowed image types are .gif, .jpg and .png.',   pic_error = 'Image upload error, please contact the affiliate manager.',   pic_success = 'Your picture was successfully uploaded.',   pic_title = 'Upload Your Picture',   pic_info = 'Uploading your picture helps to personalize our experience with you.',   pic_bullet_1 = 'Images may be .jpg, .gif or .png.',   pic_bullet_2 = 'Any inappropriate images will be discarded and your account suspended.',   pic_bullet_3 = 'Your picture will not be shown publically. It will only be attached your account for us to see.',   pic_file = 'Select A File:',   pic_button = 'Upload',   pic_current = 'My Current Picture',   pic_remove = 'Remove Picture',   progress_title = 'Eligibility For Next Payout:',   progress_complete = 'complete.',   progress_none = 'We have no minimum payout requirement.',   progress_sentence_1 = 'You have earned',   progress_sentence_2 = 'of the',   progress_sentence_3 = 'requirement.',   aff_lib_button = '<font style=\"font-size:16px; font-weight:bold;\">Claim Your Free Access To</font><br>www.AffiliateLibrary.com'");
		} catch (Exception $ex) {
			$ret_ajax['errors'][] = $ex->getMessage();
		}

	}
}

$query=$db->query("SHOW TABLES LIKE 'idevaff_language_german'");
if ( $query->rowCount() == 1) {
// Update existing language to converted language.
// Old language was English.
$signup_maintenance_heading = html_output(utf8_encode('In Wartung'));
$signup_maintenance_info = html_output(utf8_encode('Derzeit ist keine Anmeldung möglich. Bitte versuchen sie es später nocheinmal.'));
$marketing_group_title = html_output(utf8_encode('Marketing Gruppe'));
$marketing_button = html_output(utf8_encode('Anzeige'));
$marketing_no_group = html_output(utf8_encode('keine Gruppe ausgewählt'));
$marketing_choose = html_output(utf8_encode('Bitte wählen Sie eine Marketing Gruppe'));
$marketing_notice = html_output(utf8_encode('Marketing Gruppen können ein unterschiedliches Datenvolumen auf deren Seiten haben'));
$canspam_heading = html_output(utf8_encode('CAN-SPAM Akzeptanz und Regeln'));
$canspam_accept = html_output(utf8_encode('Die oben genannten CAN-SPAM Regeln, habe ich gelesen und verstanden.'));
$canspam_error = html_output(utf8_encode('Du hast unsere CAN-SPAM-Regeln nicht akzeptiert.'));
$signup_banned = html_output(utf8_encode('während der Kontoerstellung ist ein Fehler aufgetreten. Für weitere Informationen, wenden sie sich bitte an den Systemadministrator.'));
$header_testimonials = html_output(utf8_encode('Partner-Werbung'));
$testi_visit = html_output(utf8_encode('Besuchen Sie die Webseite'));
$testi_description = html_output(utf8_encode('Senden Sie Ihre Referenzen für unser Partner-Programm, und wir werden diese auf unserer &lt;a href=&quot;testimonials.php&quot;&gt;Referenzen&lt;/a&gt; Seite, mit einem Link zu Ihrer Webseite platzieren.'));
$testi_name = html_output(utf8_encode('Name'));
$testi_url = html_output(utf8_encode('Webadresse'));
$testi_content = html_output(utf8_encode('Referenz'));
$testi_code = html_output(utf8_encode('Sicherheits-Code'));
$testi_submit = html_output(utf8_encode('Referenz senden'));
$testi_na = html_output(utf8_encode('Es sind keine Referenzen verfügbar.'));
$testi_title = html_output(utf8_encode('Referenz absenden'));
$testi_success_title = html_output(utf8_encode('Referenz erfolgreich hochgeladen'));
$testi_success_message = html_output(utf8_encode('Vielen Dank für die Übermittlung Ihrer Referenz.Unser Team wird es in Kürze bearbeiten.'));
$testi_error_title = html_output(utf8_encode('Fehler beim Hochladen der Referenz'));
$testi_error_name_missing = html_output(utf8_encode('Bitte geben Sie einen Namen für Ihre Referenz ein.'));
$testi_error_url_missing = html_output(utf8_encode('Bitte geben Sie eine Internetadresse für Ihre Bewertung an.'));
$testi_error_missing = html_output(utf8_encode('Schreiben sie Bitte einen Text zu ihrer Referenz.'));
$menu_drop_delayed = html_output(utf8_encode('Verzögerte Aufträge'));
$details_drop_6 = html_output(utf8_encode('Aktuell Verzögerte Aufträge'));
$details_type_6 = html_output(utf8_encode('Verzögert – in kürze bewilligt'));
$comdetails_status_6 = html_output(utf8_encode('Verzögert – in kürze bewilligt'));
$tc_reaccept_title = html_output(utf8_encode('AGB Änderungsmitteilung'));
$tc_reaccept_sub_title = html_output(utf8_encode('Sie müssen unsere neuen Nutzungsbedingungen akzeptieren, um den Zugang zu Ihrem Konto zu erhalten.'));
$tc_reaccept_button = html_output(utf8_encode('Die oben genannten Bedingungen habe ich gelesen, verstanden und akzeptiert.'));
$tlinks_active = html_output(utf8_encode('Anzahl der aktiven Ebenen'));
$tlinks_payout_structure = html_output(utf8_encode('Reihe für Auszahlungsfristen'));
$tlinks_level = html_output(utf8_encode('Stufe'));
$tierText1 = html_output(utf8_encode('Der Provisionsbetrag % wird aus dem vorgelegtem Partnerprogram berechnet.'));
$tierText2 = html_output(utf8_encode('Der Provisionsbetrag % wird aus der oberen Klasse berechnet'));
$tierText3 = html_output(utf8_encode('% Wird vom Verkaufsbetrag berechnet.'));
$tierTextflat = html_output(utf8_encode('Flatrate.'));
$edit_custom_button = html_output(utf8_encode('Antwort bearbeiten'));
$private_heading = html_output(utf8_encode('Privat Anmelden'));
$private_info = html_output(utf8_encode('Unser Partnerprogram ist nicht für die allgemeine Öffentlichkeit und erfordert einen Registrierungs Code. Für Informationen und den erhalt eines Registrierungscodes, klicken sie bitte hier.'));
$private_required_heading = html_output(utf8_encode('Registrierungscode erforderlich'));
$private_code_title = html_output(utf8_encode('Registrierungscode eingeben'));
$private_button = html_output(utf8_encode('Code Senden'));
$private_error_title = html_output(utf8_encode('Ungültiger Registrierungscode'));
$private_error_invalid = html_output(utf8_encode('Die Registrierungs Code ist ungültig.'));
$private_error_expired = html_output(utf8_encode('Der zur Verfügung gestellte Registrierungs Code ist nicht mehr gültig.'));
$qr_code_title = html_output(utf8_encode('QR-Code'));
$qr_code_size = html_output(utf8_encode('QR Code Grösse'));
$qr_code_button = html_output(utf8_encode('QR Code zeigen'));
$qr_code_offline_title = html_output(utf8_encode('Offline Vertrieb'));
$qr_code_offline_content1 = html_output(utf8_encode('Benutzen sie diesen QR Code für ihre Marketing Broschüren und Flyer.'));
$qr_code_offline_content2 = html_output(utf8_encode('- Mit der rechten Maustaste auf das Bild klicken <strong>Speichern unter</strong>, um es auf ihrem Computer zu speichern.'));
$qr_code_online_title = html_output(utf8_encode('Online-Vertrieb'));
$qr_code_online_content = html_output(utf8_encode('Benutzen Sie diesen QR Code für Ihre Webseite, Social Media, Blogs, etc.'));
	try {
		//$db->query("update idevaff_language_german set signup_maintenance_heading = '$signup_maintenance_heading', signup_maintenance_info = '$signup_maintenance_info', marketing_group_title = '$marketing_group_title', marketing_button = '$marketing_button', marketing_no_group = '$marketing_no_group', marketing_choose = '$marketing_choose', marketing_notice = '$marketing_notice', canspam_heading = '$canspam_heading', canspam_accept = '$canspam_accept', canspam_error = '$canspam_error', signup_banned = '$signup_banned', header_testimonials = '$header_testimonials', testi_visit = '$testi_visit', testi_description = '$testi_description', testi_name = '$testi_name', testi_url = '$testi_url', testi_content = '$testi_content', testi_code = '$testi_code', testi_submit = '$testi_submit', testi_na = '$testi_na', testi_title = '$testi_title', testi_success_title = '$testi_success_title', testi_success_message = '$testi_success_message', testi_error_title = '$testi_error_title', testi_error_name_missing = '$testi_error_name_missing', testi_error_url_missing = '$testi_error_url_missing', testi_error_missing = '$testi_error_missing', menu_drop_delayed = '$menu_drop_delayed', details_drop_6 = '$details_drop_6', details_type_6 = '$details_type_6', comdetails_status_6 = '$comdetails_status_6', tc_reaccept_title = '$tc_reaccept_title', tc_reaccept_sub_title = '$tc_reaccept_sub_title', tc_reaccept_button = '$tc_reaccept_button', tlinks_active = '$tlinks_active', tlinks_payout_structure = '$tlinks_payout_structure', tlinks_level = '$tlinks_level', tierText1 = '$tierText1', tierText2 = '$tierText2', tierText3 = '$tierText3', tierTextflat = '$tierTextflat', edit_custom_button = '$edit_custom_button', private_heading = '$private_heading', private_info = '$private_info', private_required_heading = '$private_required_heading', private_code_title = '$private_code_title', private_button = '$private_button', private_error_title = '$private_error_title', private_error_invalid = '$private_error_invalid', private_error_expired = '$private_error_expired', qr_code_title = '$qr_code_title', qr_code_size = '$qr_code_size', qr_code_button = '$qr_code_button', qr_code_offline_title = '$qr_code_offline_title', qr_code_offline_content1 = '$qr_code_offline_content1', qr_code_offline_content2 = '$qr_code_offline_content2', qr_code_online_title = '$qr_code_online_title', qr_code_online_content = '$qr_code_online_content'");
		$st = $db->prepare("update idevaff_language_german set signup_maintenance_heading = ?, signup_maintenance_info = ?, marketing_group_title = ?, marketing_button = ?, marketing_no_group = ?, marketing_choose = ?, marketing_notice = ?, canspam_heading = ?, canspam_accept = ?, canspam_error = ?, signup_banned = ?, header_testimonials = ?, testi_visit = ?, testi_description = ?, testi_name = ?, testi_url = ?, testi_content = ?, testi_code = ?, testi_submit = ?, testi_na = ?, testi_title = ?, testi_success_title = ?, testi_success_message = ?, testi_error_title = ?, testi_error_name_missing = ?, testi_error_url_missing = ?, testi_error_missing = ?, menu_drop_delayed = ?, details_drop_6 = ?, details_type_6 = ?, comdetails_status_6 = ?, tc_reaccept_title = ?, tc_reaccept_sub_title = ?, tc_reaccept_button = ?, tlinks_active = ?, tlinks_payout_structure = ?, tlinks_level = ?, tierText1 = ?, tierText2 = ?, tierText3 = ?, tierTextflat = ?, edit_custom_button = ?, private_heading = ?, private_info = ?, private_required_heading = ?, private_code_title = ?, private_button = ?, private_error_title = ?, private_error_invalid = ?, private_error_expired = ?, qr_code_title = ?, qr_code_size = ?, qr_code_button = ?, qr_code_offline_title = ?, qr_code_offline_content1 = ?, qr_code_offline_content2 = ?, qr_code_online_title = ?, qr_code_online_content = ?");
		$st->execute(array($signup_maintenance_heading,$signup_maintenance_info,$marketing_group_title,$marketing_button,$marketing_no_group,$marketing_choose,$marketing_notice,$canspam_heading,$canspam_accept,$canspam_error,$signup_banned,$header_testimonials,$testi_visit,$testi_description,$testi_name,$testi_url,$testi_content,$testi_code,$testi_submit,$testi_na,$testi_title,$testi_success_title,$testi_success_message,$testi_error_title,$testi_error_name_missing,$testi_error_url_missing,$testi_error_missing,$menu_drop_delayed,$details_drop_6,$details_type_6,$comdetails_status_6,$tc_reaccept_title,$tc_reaccept_sub_title,$tc_reaccept_button,$tlinks_active,$tlinks_payout_structure,$tlinks_level,$tierText1,$tierText2,$tierText3,$tierTextflat,$edit_custom_button,$private_heading,$private_info,$private_required_heading,$private_code_title,$private_button,$private_error_title,$private_error_invalid,$private_error_expired,$qr_code_title,$qr_code_size,$qr_code_button,$qr_code_offline_title,$qr_code_offline_content1,$qr_code_offline_content2,$qr_code_online_title,$qr_code_online_content));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

// Update new language.
$menu_coupon = html_output(utf8_encode('Gutscheincodes'));
$coupon_title = html_output(utf8_encode('Erhalten sie Ihren Gutscheincode'));
$coupon_desc = html_output(utf8_encode('Mit diesem Gutscheincode verdienen sie immer dann Geld, wenn jemand darauf klickt!'));
$coupon_head_1 = html_output(utf8_encode('Gutschein-Code'));
$coupon_head_2 = html_output(utf8_encode('Discount Abnehmer'));
$coupon_head_3 = html_output(utf8_encode('Ihr Kommissions Betrag'));
$coupon_sale_amt = html_output(utf8_encode('der Verkaufsbetrag'));
$coupon_flat_rate = html_output(utf8_encode('Flatrate'));
$coupon_default = html_output(utf8_encode('Standardauszahlungsniveau'));
$cc_vanity_title = html_output(utf8_encode('Einen personalisierten Gutscheincode erhalten'));
$cc_vanity_field = html_output(utf8_encode('Gutschein-Code'));
$cc_vanity_button = html_output(utf8_encode('Antrag für einen Gutschein-Code'));
$cc_vanity_error_missing = html_output(utf8_encode('<strong>Fehler</strong> Bitte geben Sie einen Gutscheincode an.'));
$cc_vanity_error_exists = html_output(utf8_encode('<strong>Fehler</strong> Sie haben diesen Code bereits angefordert.'));
$cc_vanity_error = html_output(utf8_encode('<strong>Fehler</strong> Gutscheincode ungültig! Bitte geben sie nur Buchstaben, Zahlen und Unterstriche ein!'));
$cc_vanity_success = html_output(utf8_encode('<strong>Erfolgreich</strong> Ihr personalisierter Gutschein-Code wurde angefordert!'));
$coupon_none = html_output(utf8_encode('keine Gutscheincodes verfügbar.'));
$pic_error_title = html_output(utf8_encode('Fehler beim Hochladen des Bildes'));
$pic_missing = html_output(utf8_encode('Bitte geben Sie einen Dateinamen ein.'));
$pic_invalid = html_output(utf8_encode('Bildtyp ist nicht erlaubt! Bildtypen müssen in gif, jpg und png sein.'));
$pic_error = html_output(utf8_encode('Bild-Upload-Fehler! Kontaktieren Sie bitte den Webmaster.'));
$pic_success = html_output(utf8_encode('Dein Bild wurde erfolgreich hochgeladen..'));
$pic_title = html_output(utf8_encode('Laden Sie Ihr Bild hoch'));
$pic_info = html_output(utf8_encode('Ihre Hochgeladenen Bilder helfen uns, Sie zu personifizieren.'));
$pic_bullet_1 = html_output(utf8_encode('Bilder können in jpg, gif oder png sein.'));
$pic_bullet_2 = html_output(utf8_encode('unangebrachte Bilder werden entfernt und Ihr Konto wird gelöscht.'));
$pic_bullet_3 = html_output(utf8_encode('Ihr Bild wird nicht öffentlich gezeigt! Es wird nur eine Verknüpfung zu ihrem Account zu sehen sein.'));
$pic_file = html_output(utf8_encode('Wählen Sie eine Datei:'));
$pic_button = html_output(utf8_encode('Hochladen'));
$pic_current = html_output(utf8_encode('Mein Aktuelles Bild'));
$pic_remove = html_output(utf8_encode('Bild entfernen'));
$progress_title = html_output(utf8_encode('Berechtigung der Auszahlung:'));
$progress_complete = html_output(utf8_encode('abgeschlossen.'));
$progress_none = html_output(utf8_encode('Wir haben keinen Mindestauszahlungsbetrag.'));
$progress_sentence_1 = html_output(utf8_encode('Du hast du verdient'));
$progress_sentence_2 = html_output(utf8_encode('der'));
$progress_sentence_3 = html_output(utf8_encode('Anforderung.'));
$aff_lib_button = html_output(utf8_encode('<font style="font-size:16px; font-weight:bold;">Ihr kostenloser Zugang zu</font><br>www.AffiliateLibrary.com'));
	try {
		//$db->query("update idevaff_language_german set menu_coupon = '$', coupon_title = '$', coupon_desc = '$', coupon_head_1 = '$', coupon_head_2 = '$', coupon_head_3 = '$', coupon_sale_amt = '$', coupon_flat_rate = '$', coupon_default = '$', cc_vanity_title = '$', cc_vanity_field = '$', cc_vanity_button = '$', cc_vanity_error_missing = '$', cc_vanity_error_exists = '$', cc_vanity_error = '$', cc_vanity_success = '$', coupon_none = '$', pic_error_title = '$', pic_missing = '$', pic_invalid = '$', pic_error = '$', pic_success = '$', pic_title = '$', pic_info = '$', pic_bullet_1 = '$', pic_bullet_2 = '$pic_bullet_2', pic_bullet_3 = '$pic_bullet_3', pic_file = '$pic_file', pic_button = '$pic_button', pic_current = '$pic_current', pic_remove = '$pic_remove', progress_title = '$progress_title', progress_complete = '$progress_complete', progress_none = '$progress_none', progress_sentence_1 = '$progress_sentence_1', progress_sentence_2 = '$progress_sentence_2', progress_sentence_3 = '$progress_sentence_3', aff_lib_button = '$aff_lib_button'");
		$st = $db->prepare("update idevaff_language_german set menu_coupon = ?, coupon_title = ?, coupon_desc = ?, coupon_head_1 = ?, coupon_head_2 = ?, coupon_head_3 = ?, coupon_sale_amt = ?, coupon_flat_rate = ?, coupon_default = ?, cc_vanity_title = ?, cc_vanity_field = ?, cc_vanity_button = ?, cc_vanity_error_missing = ?, cc_vanity_error_exists = ?, cc_vanity_error = ?, cc_vanity_success = ?, coupon_none = ?, pic_error_title = ?, pic_missing = ?, pic_invalid = ?, pic_error = ?, pic_success = ?, pic_title = ?, pic_info = ?, pic_bullet_1 = ?, pic_bullet_2 = ?, pic_bullet_3 = ?, pic_file = ?, pic_button = ?, pic_current = ?, pic_remove = ?, progress_title = ?, progress_complete = ?, progress_none = ?, progress_sentence_1 = ?, progress_sentence_2 = ?, progress_sentence_3 = ?, aff_lib_button = ?");
		$st->execute(array($menu_coupon,$coupon_title,$coupon_desc,$coupon_head_1,$coupon_head_2,$coupon_head_3,$coupon_sale_amt,$coupon_flat_rate,$coupon_default,$cc_vanity_title,$cc_vanity_field,$cc_vanity_button,$cc_vanity_error_missing,$cc_vanity_error_exists,$cc_vanity_error,$cc_vanity_success,$coupon_none,$pic_error_title,$pic_missing,$pic_invalid,$pic_error,$pic_success,$pic_title,$pic_info,$pic_bullet_1,$pic_bullet_2,$pic_bullet_3,$pic_file,$pic_button,$pic_current,$pic_remove,$progress_title,$progress_complete,$progress_none,$progress_sentence_1,$progress_sentence_2,$progress_sentence_3,$aff_lib_button));
	} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$query=$db->query("SHOW TABLES LIKE 'idevaff_language_dutch'");
if ( $query->rowCount() == 1 ) {
// Update existing language to converted language.
// Old language was English.
$signup_maintenance_heading = html_output(utf8_encode('Onderhouds Berichtgeving'));
$signup_maintenance_info = html_output(utf8_encode('Aanmeldingen tijdelijk niet mogelijk. Probeer het later nogmaals.'));
$marketing_group_title = html_output(utf8_encode('Marketing Groep'));
$marketing_button = html_output(utf8_encode('Weergave'));
$marketing_no_group = html_output(utf8_encode('Geen Groep Geselecteerd'));
$marketing_choose = html_output(utf8_encode('Gaarne Hierboven Een Marketing Groep Selecteren'));
$marketing_notice = html_output(utf8_encode('Mogelijk Verschillend Verkeer Van Inkomende Paginas Voor Marketing Groepen'));
$canspam_heading = html_output(utf8_encode('CAN-SPAM Regels en Acceptatie'));
$canspam_accept = html_output(utf8_encode('Ik heb bovenstaande CAN-SPAM regels gelezen, begrepen en geaccepteert.'));
$canspam_error = html_output(utf8_encode('U heeft de CAN-SPAM regels niet geaccepteerd.'));
$signup_banned = html_output(utf8_encode('Er is een fout opgetreden tijdens het account aanmaken. Neemt u gaarne contact op met de systeem beheerder voor meer informatie.'));
$header_testimonials = html_output(utf8_encode('Testimonium'));
$testi_visit = html_output(utf8_encode('Bezoek Website'));
$testi_description = html_output(utf8_encode('Geef uw testimonium en wij zullen deze plaatsen op onze &lt;a href=&quot;testimonials.php&quot;&gt;Testimonium&lt;/a&gt; pagina met een link naar uw website.'));
$testi_name = html_output(utf8_encode('Naam'));
$testi_url = html_output(utf8_encode('Website URL'));
$testi_content = html_output(utf8_encode('Testimonium'));
$testi_code = html_output(utf8_encode('Beveiligings Code'));
$testi_submit = html_output(utf8_encode('Verstuur Testimonium'));
$testi_na = html_output(utf8_encode('Testimoniums zijn niet beschikbaar.'));
$testi_title = html_output(utf8_encode('Geef een Testimonium.'));
$testi_success_title = html_output(utf8_encode('Testimonium Succesvol '));
$testi_success_message = html_output(utf8_encode('Bedankt voor het versturen van uw Testimonium. Ons team zal het spoedig herzien.'));
$testi_error_title = html_output(utf8_encode('Testimonium foutmelding'));
$testi_error_name_missing = html_output(utf8_encode('Plaats gaarne uw naam bij uw Testimonium.'));
$testi_error_url_missing = html_output(utf8_encode('Plaats gaarne uw website URL bij uw Testimonium.'));
$testi_error_missing = html_output(utf8_encode('Plaats gaarne uw text voor uw Testimonium.'));
$menu_drop_delayed = html_output(utf8_encode('Vertraagde commissies'));
$details_drop_6 = html_output(utf8_encode('Huidige Vertraagde commissies'));
$details_type_6 = html_output(utf8_encode('Vertraagd - Zal snel goed gekeurd worden.'));
$comdetails_status_6 = html_output(utf8_encode('Vertraagd - Zal snel goed gekeurd worden'));
$tc_reaccept_title = html_output(utf8_encode('Notificatie Verandering van Algemene Voorwaarden'));
$tc_reaccept_sub_title = html_output(utf8_encode('Om toegang te krijgen tot uw account moet u onze nieuwe algemene voorwaarden accepteren.'));
$tc_reaccept_button = html_output(utf8_encode('Ik heb bovenstaande algemene voorwaarden gelezen, begrepen en geaccepteert.'));
$tlinks_active = html_output(utf8_encode('Aantal Actieve Niveaus'));
$tlinks_payout_structure = html_output(utf8_encode('Niveau Uitbetalings Structuur'));
$tlinks_level = html_output(utf8_encode('Niveau'));
$tierText1 = html_output(utf8_encode('% Berekent van het bedrag van geassocieerde partners commissie.'));
$tierText2 = html_output(utf8_encode('% Berekent van hoog niveau commissie bedrag.'));
$tierText3 = html_output(utf8_encode('% Berekent van het verkoop bedrag.'));
$tierTextflat = html_output(utf8_encode('Vast tarief.'));
$edit_custom_button = html_output(utf8_encode('Wijzig Antwoord'));
$private_heading = html_output(utf8_encode('Prive Aannmelding'));
$private_info = html_output(utf8_encode('Ons programma voor geassocieerde partners is niet publiekelijk toegangelijk en vereist een aanmeldigings code.  Informatie voor het verkrijgen van een aanmeldigings code zou hier moeten staan.'));
$private_required_heading = html_output(utf8_encode('Aanmeldigings Code Vereist'));
$private_code_title = html_output(utf8_encode('Vul Aanmeldigings Ccode In'));
$private_button = html_output(utf8_encode('Verstuur Code'));
$private_error_title = html_output(utf8_encode('Incorrecte Aanmeldigings Code Ingevult'));
$private_error_invalid = html_output(utf8_encode('De aanmeldigings code die u heeft ingevult is incorrect.'));
$private_error_expired = html_output(utf8_encode('De aanmeldigings code die u heeft ingevult is verlopen en niet langer geldig.'));
$qr_code_title = html_output(utf8_encode('QR Codes'));
$qr_code_size = html_output(utf8_encode('QR Code Grootte'));
$qr_code_button = html_output(utf8_encode('Weergave QR Code'));
$qr_code_offline_title = html_output(utf8_encode('Offline Marketing'));
$qr_code_offline_content1 = html_output(utf8_encode('Voeg deze QR code toe aan uw marketing brochures, flyers, visite kaartjes, etc.'));
$qr_code_offline_content2 = html_output(utf8_encode('- Rechter muisknop klik op het afbeelding <strong>bewaar als</strong> en het word opgeslagen op uw computer.'));
$qr_code_online_title = html_output(utf8_encode('Online Marketing'));
$qr_code_online_content = html_output(utf8_encode('Voeg deze QR code toe aan uw website, social media, blogs, etc.'));
	try {
		//$db->query("update idevaff_language_dutch set signup_maintenance_heading = '$signup_maintenance_heading', signup_maintenance_info = '$signup_maintenance_info', marketing_group_title = '$marketing_group_title', marketing_button = '$marketing_button', marketing_no_group = '$marketing_no_group', marketing_choose = '$marketing_choose', marketing_notice = '$marketing_notice', canspam_heading = '$canspam_heading', canspam_accept = '$canspam_accept', canspam_error = '$canspam_error', signup_banned = '$signup_banned', header_testimonials = '$header_testimonials', testi_visit = '$testi_visit', testi_description = '$testi_description', testi_name = '$testi_name', testi_url = '$testi_url', testi_content = '$testi_content', testi_code = '$testi_code', testi_submit = '$testi_submit', testi_na = '$testi_na', testi_title = '$testi_title', testi_success_title = '$testi_success_title', testi_success_message = '$testi_success_message', testi_error_title = '$testi_error_title', testi_error_name_missing = '$testi_error_name_missing', testi_error_url_missing = '$testi_error_url_missing', testi_error_missing = '$testi_error_missing', menu_drop_delayed = '$menu_drop_delayed', details_drop_6 = '$details_drop_6', details_type_6 = '$details_type_6', comdetails_status_6 = '$comdetails_status_6', tc_reaccept_title = '$tc_reaccept_title', tc_reaccept_sub_title = '$tc_reaccept_sub_title', tc_reaccept_button = '$tc_reaccept_button', tlinks_active = '$tlinks_active', tlinks_payout_structure = '$tlinks_payout_structure', tlinks_level = '$tlinks_level', tierText1 = '$tierText1', tierText2 = '$tierText2', tierText3 = '$tierText3', tierTextflat = '$tierTextflat', edit_custom_button = '$edit_custom_button', private_heading = '$private_heading', private_info = '$private_info', private_required_heading = '$private_required_heading', private_code_title = '$private_code_title', private_button = '$private_button', private_error_title = '$private_error_title', private_error_invalid = '$private_error_invalid', private_error_expired = '$private_error_expired', qr_code_title = '$qr_code_title', qr_code_size = '$qr_code_size', qr_code_button = '$qr_code_button', qr_code_offline_title = '$qr_code_offline_title', qr_code_offline_content1 = '$qr_code_offline_content1', qr_code_offline_content2 = '$qr_code_offline_content2', qr_code_online_title = '$qr_code_online_title', qr_code_online_content = '$qr_code_online_content'");
		$st = $db->prepare("update idevaff_language_german set signup_maintenance_heading = ?, signup_maintenance_info = ?, marketing_group_title = ?, marketing_button = ?, marketing_no_group = ?, marketing_choose = ?, marketing_notice = ?, canspam_heading = ?, canspam_accept = ?, canspam_error = ?, signup_banned = ?, header_testimonials = ?, testi_visit = ?, testi_description = ?, testi_name = ?, testi_url = ?, testi_content = ?, testi_code = ?, testi_submit = ?, testi_na = ?, testi_title = ?, testi_success_title = ?, testi_success_message = ?, testi_error_title = ?, testi_error_name_missing = ?, testi_error_url_missing = ?, testi_error_missing = ?, menu_drop_delayed = ?, details_drop_6 = ?, details_type_6 = ?, comdetails_status_6 = ?, tc_reaccept_title = ?, tc_reaccept_sub_title = ?, tc_reaccept_button = ?, tlinks_active = ?, tlinks_payout_structure = ?, tlinks_level = ?, tierText1 = ?, tierText2 = ?, tierText3 = ?, tierTextflat = ?, edit_custom_button = ?, private_heading = ?, private_info = ?, private_required_heading = ?, private_code_title = ?, private_button = ?, private_error_title = ?, private_error_invalid = ?, private_error_expired = ?, qr_code_title = ?, qr_code_size = ?, qr_code_button = ?, qr_code_offline_title = ?, qr_code_offline_content1 = ?, qr_code_offline_content2 = ?, qr_code_online_title = ?, qr_code_online_content = ?");
		$st->execute(array($signup_maintenance_heading,$signup_maintenance_info,$marketing_group_title,$marketing_button,$marketing_no_group,$marketing_choose,$marketing_notice,$canspam_heading,$canspam_accept,$canspam_error,$signup_banned,$header_testimonials,$testi_visit,$testi_description,$testi_name,$testi_url,$testi_content,$testi_code,$testi_submit,$testi_na,$testi_title,$testi_success_title,$testi_success_message,$testi_error_title,$testi_error_name_missing,$testi_error_url_missing,$testi_error_missing,$menu_drop_delayed,$details_drop_6,$details_type_6,$comdetails_status_6,$tc_reaccept_title,$tc_reaccept_sub_title,$tc_reaccept_button,$tlinks_active,$tlinks_payout_structure,$tlinks_level,$tierText1,$tierText2,$tierText3,$tierTextflat,$edit_custom_button,$private_heading,$private_info,$private_required_heading,$private_code_title,$private_button,$private_error_title,$private_error_invalid,$private_error_expired,$qr_code_title,$qr_code_size,$qr_code_button,$qr_code_offline_title,$qr_code_offline_content1,$qr_code_offline_content2,$qr_code_online_title,$qr_code_online_content));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

// Update new language.
$menu_coupon = html_output(utf8_encode('Coupon Codes'));
$coupon_title = html_output(utf8_encode('Uw Beschikbare Coupon Codes'));
$coupon_desc = html_output(utf8_encode('Verstrek deze coupon codes en verdien een commissie elke keer als iemand deze code gebruikt!'));
$coupon_head_1 = html_output(utf8_encode('Coupon Code'));
$coupon_head_2 = html_output(utf8_encode('Korting Aan Klant'));
$coupon_head_3 = html_output(utf8_encode('Uw Commissie Bedrag'));
$coupon_sale_amt = html_output(utf8_encode('van verkoop bedrag'));
$coupon_flat_rate = html_output(utf8_encode('vast tarief'));
$coupon_default = html_output(utf8_encode('Standaard Uitbetalings Niveau'));
$cc_vanity_title = html_output(utf8_encode('Vraag Een Persoonlijke Coupon Code Aan'));
$cc_vanity_field = html_output(utf8_encode('Coupon Code'));
$cc_vanity_button = html_output(utf8_encode('Vraag Coupon Code Aan'));
$cc_vanity_error_missing = html_output(utf8_encode('<strong>Foutmelding!</strong> Gaarne een coupon code invullen.'));
$cc_vanity_error_exists = html_output(utf8_encode('<strong>Foutmelding!</strong> U heeft deze code al aangevraagd. Het is in afwachting van goedkeuring.'));
$cc_vanity_error = html_output(utf8_encode('<strong>Foutmelding!</strong> Coupon code is niet correct. Gaarne alleen letters, nummers en liggende streepjes gebruiken.'));
$cc_vanity_success = html_output(utf8_encode('<strong>Succes!</strong> Uw persoonlijke coupon code is aangevraagd.'));
$coupon_none = html_output(utf8_encode('Momenteel geen coupon codes beschikbaar.'));
$pic_error_title = html_output(utf8_encode('Afbeelding Upload Foutmelding'));
$pic_missing = html_output(utf8_encode('Kies gaarne een bestandsnaam.'));
$pic_invalid = html_output(utf8_encode('Afbeeldings type is niet toegestaan. Toegestane afbeelding types zijn .gif, .jpg en .png.'));
$pic_error = html_output(utf8_encode('Afbeelding upload foutmelding, neem gaarne contact op met de manager van de geassocieerde partner.'));
$pic_success = html_output(utf8_encode('Uw foto is succesvol geupload.'));
$pic_title = html_output(utf8_encode('Upload Uw Foto'));
$pic_info = html_output(utf8_encode('Het uploaden van uw foto maakt onze interactie met u persoonlijker.'));
$pic_bullet_1 = html_output(utf8_encode('Afbeeldingen mogen .jpg, .gif of .png. formaat zijn'));
$pic_bullet_2 = html_output(utf8_encode('Ongepaste afbeeldingen zullen verwijdert worden en uw account geschorst.'));
$pic_bullet_3 = html_output(utf8_encode('Uw foto zal niet openbaar zichtbaar zijn. Het is alleen toegevoegt aan uw account voor ons overzicht.'));
$pic_file = html_output(utf8_encode('Selecteer Een Bestand:'));
$pic_button = html_output(utf8_encode('Upload'));
$pic_current = html_output(utf8_encode('Mijn Huidige Foto'));
$pic_remove = html_output(utf8_encode('Verwijder Foto'));
$progress_title = html_output(utf8_encode('Kwalificatie voor de volgende uitbetaling:'));
$progress_complete = html_output(utf8_encode('compleet.'));
$progress_none = html_output(utf8_encode('Wij hebben geen minimum uitbetalings bedrag.'));
$progress_sentence_1 = html_output(utf8_encode('U heeft verdient'));
$progress_sentence_2 = html_output(utf8_encode('van de'));
$progress_sentence_3 = html_output(utf8_encode('vereiste.'));
$aff_lib_button = html_output(utf8_encode('<font style="font-size:16px; font-weight:bold;">Claim Uw Gratis Toegang Tot</font><br>www.AffiliateLibrary.com'));
	try {
		//$db->query("update idevaff_language_dutch set menu_coupon = '$menu_coupon', coupon_title = '$coupon_title', coupon_desc = '$coupon_desc', coupon_head_1 = '$coupon_head_1', coupon_head_2 = '$coupon_head_2', coupon_head_3 = '$coupon_head_3', coupon_sale_amt = '$coupon_sale_amt', coupon_flat_rate = '$coupon_flat_rate', coupon_default = '$coupon_default', cc_vanity_title = '$cc_vanity_title', cc_vanity_field = '$cc_vanity_field', cc_vanity_button = '$cc_vanity_button', cc_vanity_error_missing = '$cc_vanity_error_missing', cc_vanity_error_exists = '$cc_vanity_error_exists', cc_vanity_error = '$cc_vanity_error', cc_vanity_success = '$cc_vanity_success', coupon_none = '$coupon_none', pic_error_title = '$pic_error_title', pic_missing = '$pic_missing', pic_invalid = '$pic_invalid', pic_error = '$pic_error', pic_success = '$pic_success', pic_title = '$pic_title', pic_info = '$pic_info', pic_bullet_1 = '$pic_bullet_1', pic_bullet_2 = '$pic_bullet_2', pic_bullet_3 = '$pic_bullet_3', pic_file = '$pic_file', pic_button = '$pic_button', pic_current = '$pic_current', pic_remove = '$pic_remove', progress_title = '$progress_title', progress_complete = '$progress_complete', progress_none = '$progress_none', progress_sentence_1 = '$progress_sentence_1', progress_sentence_2 = '$progress_sentence_2', progress_sentence_3 = '$progress_sentence_3', aff_lib_button = '$aff_lib_button'");
		$st = $db->prepare("update idevaff_language_german set menu_coupon = ?, coupon_title = ?, coupon_desc = ?, coupon_head_1 = ?, coupon_head_2 = ?, coupon_head_3 = ?, coupon_sale_amt = ?, coupon_flat_rate = ?, coupon_default = ?, cc_vanity_title = ?, cc_vanity_field = ?, cc_vanity_button = ?, cc_vanity_error_missing = ?, cc_vanity_error_exists = ?, cc_vanity_error = ?, cc_vanity_success = ?, coupon_none = ?, pic_error_title = ?, pic_missing = ?, pic_invalid = ?, pic_error = ?, pic_success = ?, pic_title = ?, pic_info = ?, pic_bullet_1 = ?, pic_bullet_2 = ?, pic_bullet_3 = ?, pic_file = ?, pic_button = ?, pic_current = ?, pic_remove = ?, progress_title = ?, progress_complete = ?, progress_none = ?, progress_sentence_1 = ?, progress_sentence_2 = ?, progress_sentence_3 = ?, aff_lib_button = ?");
		$st->execute(array($menu_coupon,$coupon_title,$coupon_desc,$coupon_head_1,$coupon_head_2,$coupon_head_3,$coupon_sale_amt,$coupon_flat_rate,$coupon_default,$cc_vanity_title,$cc_vanity_field,$cc_vanity_button,$cc_vanity_error_missing,$cc_vanity_error_exists,$cc_vanity_error,$cc_vanity_success,$coupon_none,$pic_error_title,$pic_missing,$pic_invalid,$pic_error,$pic_success,$pic_title,$pic_info,$pic_bullet_1,$pic_bullet_2,$pic_bullet_3,$pic_file,$pic_button,$pic_current,$pic_remove,$progress_title,$progress_complete,$progress_none,$progress_sentence_1,$progress_sentence_2,$progress_sentence_3,$aff_lib_button));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}


$q = $db->query("SHOW TABLES LIKE 'idevaff_language_french'");
if ( $q->rowCount() == 1 ) {
// Update existing language to converted language.
// Old language was English.
$signup_maintenance_heading = html_output(utf8_encode('Avis de maintenance'));
$signup_maintenance_info = html_output(utf8_encode('Les inscriptions sont désactivées temporairement. Veuillez réessayer ultérieurement.'));
$marketing_group_title = html_output(utf8_encode('Groupe de marketing'));
$marketing_button = html_output(utf8_encode('Afficher'));
$marketing_no_group = html_output(utf8_encode('Aucun groupe selectionné'));
$marketing_choose = html_output(utf8_encode('Veuillez choisir un groupe de Marketing dessus'));
$marketing_notice = html_output(utf8_encode('Les groupes de marketing peuvent avoir différentes pages de traffic entrant'));
$canspam_heading = html_output(utf8_encode('Règles de CAN-SPAM et d\'acceptation'));
$canspam_accept = html_output(utf8_encode('J\'ai lu, compris et accepté les règles CAN-SPAM en dessus.'));
$canspam_error = html_output(utf8_encode('Vous n\'avez pas accepté nos règles CAN-SPAM.'));
$signup_banned = html_output(utf8_encode('Une erreur est survenue lors de la création de votre compte. Merci de contacter l\'administrateur système pour plus d\'informations.'));
$header_testimonials = html_output(utf8_encode('Témoignages d\'affiliés'));
$testi_visit = html_output(utf8_encode('Visiter le site web'));
$testi_description = html_output(utf8_encode('Offrez votre témoignage sur notre programme d\'affiliation et nous le placerons sur notre page &lt;a href=&quot;testimonials.php&quot;&gt;témoignages&lt;/a&gt;  avec un lien vers votre site web.'));
$testi_name = html_output(utf8_encode('Nom'));
$testi_url = html_output(utf8_encode('URL du site web'));
$testi_content = html_output(utf8_encode('Témoignage'));
$testi_code = html_output(utf8_encode('Code de sécurité'));
$testi_submit = html_output(utf8_encode('Envoyer le témoignage'));
$testi_na = html_output(utf8_encode('Les témoignages ne sont pas disponibles.'));
$testi_title = html_output(utf8_encode('Faire un témoignage'));
$testi_success_title = html_output(utf8_encode('Réussite du témoignage'));
$testi_success_message = html_output(utf8_encode('Merci pour votre témoignage. Notre équipe l\'examinera sous peu.'));
$testi_error_title = html_output(utf8_encode('Erreur dans le témoignage'));
$testi_error_name_missing = html_output(utf8_encode('Veuillez inclure votre nom dans votre témoignage.'));
$testi_error_url_missing = html_output(utf8_encode('Veuillez inclure l\'URL de votre site web dans votre témoignage.'));
$testi_error_missing = html_output(utf8_encode('Veuillez inclure du texte dans votre témoignage.'));
$menu_drop_delayed = html_output(utf8_encode('Commissions différées'));
$details_drop_6 = html_output(utf8_encode('Commisions différées en cours'));
$details_type_6 = html_output(utf8_encode('Différée - Sera approuvée bientôt'));
$comdetails_status_6 = html_output(utf8_encode('Différée - Sera approuvée bientôt'));
$tc_reaccept_title = html_output(utf8_encode('Notification de changement de termes et conditions'));
$tc_reaccept_sub_title = html_output(utf8_encode('Vous devez accepter nos termes et conditions afin de pouvoir vous connecter à votre compte.'));
$tc_reaccept_button = html_output(utf8_encode('J\'ai lu, compris et accepté les termes et conditions en dessus.'));
$tlinks_active = html_output(utf8_encode('Nombre de niveaux actifs'));
$tlinks_payout_structure = html_output(utf8_encode('Niveaux de structures de paiement'));
$tlinks_level = html_output(utf8_encode('Niveau'));
$tierText1 = html_output(utf8_encode('% calculée à partir de la commission de l\'affilié correspondant.'));
$tierText2 = html_output(utf8_encode('% calculée à partir du niveau supérieur de la commission.'));
$tierText3 = html_output(utf8_encode('% calculée à partir du montant de la vente.'));
$tierTextflat = html_output(utf8_encode('forfaitaire.'));
$edit_custom_button = html_output(utf8_encode('Modifier la réponse'));
$private_heading = html_output(utf8_encode('Inscription privée'));
$private_info = html_output(utf8_encode('Notre programme d\'affiliation n\'est pas ouvert au public général et nécessite un code d\'inscription.  Plus d\'informations sur la façon d\'obtenir un code d\'inscription sont ici.'));
$private_required_heading = html_output(utf8_encode('Code d\'inscription requis'));
$private_code_title = html_output(utf8_encode('Veuillez entrer votre code d\'inscription'));
$private_button = html_output(utf8_encode('Envoyer le code'));
$private_error_title = html_output(utf8_encode('Code d\'inscription invalide'));
$private_error_invalid = html_output(utf8_encode('Le code d\'inscription que vous avez soumis est invalide.'));
$private_error_expired = html_output(utf8_encode('Le code d\'inscription que vous avez soumis a expiré et n\'est plus valide.'));
$qr_code_title = html_output(utf8_encode('Codes QR'));
$qr_code_size = html_output(utf8_encode('Taille du code QR'));
$qr_code_button = html_output(utf8_encode('Afficher le code QR'));
$qr_code_offline_title = html_output(utf8_encode('Marketing offligne'));
$qr_code_offline_content1 = html_output(utf8_encode('Ajoutez ce code QR à vos brochures de marketing, pliants, cartes de visite, etc.'));
$qr_code_offline_content2 = html_output(utf8_encode('- Click droit sur l\'image et <strong>Enregistrer-sous</strong> votre ordinateur.'));
$qr_code_online_title = html_output(utf8_encode('Marketing online'));
$qr_code_online_content = html_output(utf8_encode('Ajoutez ce code QR sur votre site web, médias sociaux, blogs, etc.'));
	try {
		//$db->query("update idevaff_language_french set signup_maintenance_heading = '$signup_maintenance_heading', signup_maintenance_info = '$signup_maintenance_info', marketing_group_title = '$marketing_group_title', marketing_button = '$marketing_button', marketing_no_group = '$marketing_no_group', marketing_choose = '$marketing_choose', marketing_notice = '$marketing_notice', canspam_heading = '$canspam_heading', canspam_accept = '$canspam_accept', canspam_error = '$canspam_error', signup_banned = '$signup_banned', header_testimonials = '$header_testimonials', testi_visit = '$testi_visit', testi_description = '$testi_description', testi_name = '$testi_name', testi_url = '$testi_url', testi_content = '$testi_content', testi_code = '$testi_code', testi_submit = '$testi_submit', testi_na = '$testi_na', testi_title = '$testi_title', testi_success_title = '$testi_success_title', testi_success_message = '$testi_success_message', testi_error_title = '$testi_error_title', testi_error_name_missing = '$testi_error_name_missing', testi_error_url_missing = '$testi_error_url_missing', testi_error_missing = '$testi_error_missing', menu_drop_delayed = '$menu_drop_delayed', details_drop_6 = '$details_drop_6', details_type_6 = '$details_type_6', comdetails_status_6 = '$comdetails_status_6', tc_reaccept_title = '$tc_reaccept_title', tc_reaccept_sub_title = '$tc_reaccept_sub_title', tc_reaccept_button = '$tc_reaccept_button', tlinks_active = '$tlinks_active', tlinks_payout_structure = '$tlinks_payout_structure', tlinks_level = '$tlinks_level', tierText1 = '$tierText1', tierText2 = '$tierText2', tierText3 = '$tierText3', tierTextflat = '$tierTextflat', edit_custom_button = '$edit_custom_button', private_heading = '$private_heading', private_info = '$private_info', private_required_heading = '$private_required_heading', private_code_title = '$private_code_title', private_button = '$private_button', private_error_title = '$private_error_title', private_error_invalid = '$private_error_invalid', private_error_expired = '$private_error_expired', qr_code_title = '$qr_code_title', qr_code_size = '$qr_code_size', qr_code_button = '$qr_code_button', qr_code_offline_title = '$qr_code_offline_title', qr_code_offline_content1 = '$qr_code_offline_content1', qr_code_offline_content2 = '$qr_code_offline_content2', qr_code_online_title = '$qr_code_online_title', qr_code_online_content = '$qr_code_online_content'");
		$st = $db->prepare("update idevaff_language_german set signup_maintenance_heading = ?, signup_maintenance_info = ?, marketing_group_title = ?, marketing_button = ?, marketing_no_group = ?, marketing_choose = ?, marketing_notice = ?, canspam_heading = ?, canspam_accept = ?, canspam_error = ?, signup_banned = ?, header_testimonials = ?, testi_visit = ?, testi_description = ?, testi_name = ?, testi_url = ?, testi_content = ?, testi_code = ?, testi_submit = ?, testi_na = ?, testi_title = ?, testi_success_title = ?, testi_success_message = ?, testi_error_title = ?, testi_error_name_missing = ?, testi_error_url_missing = ?, testi_error_missing = ?, menu_drop_delayed = ?, details_drop_6 = ?, details_type_6 = ?, comdetails_status_6 = ?, tc_reaccept_title = ?, tc_reaccept_sub_title = ?, tc_reaccept_button = ?, tlinks_active = ?, tlinks_payout_structure = ?, tlinks_level = ?, tierText1 = ?, tierText2 = ?, tierText3 = ?, tierTextflat = ?, edit_custom_button = ?, private_heading = ?, private_info = ?, private_required_heading = ?, private_code_title = ?, private_button = ?, private_error_title = ?, private_error_invalid = ?, private_error_expired = ?, qr_code_title = ?, qr_code_size = ?, qr_code_button = ?, qr_code_offline_title = ?, qr_code_offline_content1 = ?, qr_code_offline_content2 = ?, qr_code_online_title = ?, qr_code_online_content = ?");
		$st->execute(array($signup_maintenance_heading,$signup_maintenance_info,$marketing_group_title,$marketing_button,$marketing_no_group,$marketing_choose,$marketing_notice,$canspam_heading,$canspam_accept,$canspam_error,$signup_banned,$header_testimonials,$testi_visit,$testi_description,$testi_name,$testi_url,$testi_content,$testi_code,$testi_submit,$testi_na,$testi_title,$testi_success_title,$testi_success_message,$testi_error_title,$testi_error_name_missing,$testi_error_url_missing,$testi_error_missing,$menu_drop_delayed,$details_drop_6,$details_type_6,$comdetails_status_6,$tc_reaccept_title,$tc_reaccept_sub_title,$tc_reaccept_button,$tlinks_active,$tlinks_payout_structure,$tlinks_level,$tierText1,$tierText2,$tierText3,$tierTextflat,$edit_custom_button,$private_heading,$private_info,$private_required_heading,$private_code_title,$private_button,$private_error_title,$private_error_invalid,$private_error_expired,$qr_code_title,$qr_code_size,$qr_code_button,$qr_code_offline_title,$qr_code_offline_content1,$qr_code_offline_content2,$qr_code_online_title,$qr_code_online_content));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

// Update new language.
$menu_coupon = html_output(utf8_encode('Coupons de réductions'));
$coupon_title = html_output(utf8_encode('Vos coupons de réduction disponibles'));
$coupon_desc = html_output(utf8_encode('Partagez ce coupon de réduction et gagnez une commission chaque fois que quelqu\'un utilise votre code!'));
$coupon_head_1 = html_output(utf8_encode('Coupon de réductions'));
$coupon_head_2 = html_output(utf8_encode('Remise à la clientèle'));
$coupon_head_3 = html_output(utf8_encode('Votre commission'));
$coupon_sale_amt = html_output(utf8_encode('de vente'));
$coupon_flat_rate = html_output(utf8_encode('forfaitaire'));
$coupon_default = html_output(utf8_encode('Niveau de paiement par défaut'));
$cc_vanity_title = html_output(utf8_encode('Demandez un coupon de réductions personnalisé'));
$cc_vanity_field = html_output(utf8_encode('Coupon de réduction'));
$cc_vanity_button = html_output(utf8_encode('Demandez un coupon de réduction'));
$cc_vanity_error_missing = html_output(utf8_encode('<strong>Erreur!</strong> Veuillez entrer un coupon de réduction.'));
$cc_vanity_error_exists = html_output(utf8_encode('<strong>Error!</strong> Vous avez déjà demandé ce code. Il est en attente d\'approbation.'));
$cc_vanity_error = html_output(utf8_encode('<strong>Erreur!</strong> code invalide. Veuillez utliser uniquement des lettres, des chiffres et des traits de soulignement.'));
$cc_vanity_success = html_output(utf8_encode('<strong>Réussi!</strong> Votre demande de code de promotion personnalisé a été envoyée.'));
$coupon_none = html_output(utf8_encode('Pas de codes de promotions disponibles actuellement.'));
$pic_error_title = html_output(utf8_encode('Erreur lors du chargement de l\'image'));
$pic_missing = html_output(utf8_encode('Veuillez choisir un nom de fichiers.'));
$pic_invalid = html_output(utf8_encode('Ce type d\'images n\'est pas permis. Les types permis sont .gif, .jpg and .png.'));
$pic_error = html_output(utf8_encode('Erreur lors du chargement de l\'image, Veuillez contacter le manager affilié.'));
$pic_success = html_output(utf8_encode('Votre photo a été chargée avec succès.'));
$pic_title = html_output(utf8_encode('Veuillez charger votre photo'));
$pic_info = html_output(utf8_encode('Le chargement de votre photo aide à personnaliser notre expérience avec vous.'));
$pic_bullet_1 = html_output(utf8_encode('Les images peuvent être .jpg, .gif or .png.'));
$pic_bullet_2 = html_output(utf8_encode('En cas d\'images inappropriées, celles-ci seront bannies et votre compte sera suspendu.'));
$pic_bullet_3 = html_output(utf8_encode('Votre photo ne sera pas montrée au public. Elle sera uniquement attachée à votre compte pour que nous la voyons.'));
$pic_file = html_output(utf8_encode('Veuillez sélectionner un fichier:'));
$pic_button = html_output(utf8_encode('Charger'));
$pic_current = html_output(utf8_encode('Ma photo actuelle'));
$pic_remove = html_output(utf8_encode('Supprimer la photo'));
$progress_title = html_output(utf8_encode('Eligibilité pour un paiement futur:'));
$progress_complete = html_output(utf8_encode('terminé.'));
$progress_none = html_output(utf8_encode('Nous n\'avons pas un minimum requis de paiement.'));
$progress_sentence_1 = html_output(utf8_encode('Vous avez gagné'));
$progress_sentence_2 = html_output(utf8_encode('de'));
$progress_sentence_3 = html_output(utf8_encode('exigence.'));
$aff_lib_button = html_output(utf8_encode('<font style="font-size:16px; font-weight:bold;">Réclamez votre accès libre à</font><br>www.AffiliateLibrary.com'));
	try {
		//$db->query("update idevaff_language_french set menu_coupon = '$menu_coupon', coupon_title = '$coupon_title', coupon_desc = '$coupon_desc', coupon_head_1 = '$coupon_head_1', coupon_head_2 = '$coupon_head_2', coupon_head_3 = '$coupon_head_3', coupon_sale_amt = '$coupon_sale_amt', coupon_flat_rate = '$coupon_flat_rate', coupon_default = '$coupon_default', cc_vanity_title = '$cc_vanity_title', cc_vanity_field = '$cc_vanity_field', cc_vanity_button = '$cc_vanity_button', cc_vanity_error_missing = '$cc_vanity_error_missing', cc_vanity_error_exists = '$cc_vanity_error_exists', cc_vanity_error = '$cc_vanity_error', cc_vanity_success = '$cc_vanity_success', coupon_none = '$coupon_none', pic_error_title = '$pic_error_title', pic_missing = '$pic_missing', pic_invalid = '$pic_invalid', pic_error = '$pic_error', pic_success = '$pic_success', pic_title = '$pic_title', pic_info = '$pic_info', pic_bullet_1 = '$pic_bullet_1', pic_bullet_2 = '$pic_bullet_2', pic_bullet_3 = '$pic_bullet_3', pic_file = '$pic_file', pic_button = '$pic_button', pic_current = '$pic_current', pic_remove = '$pic_remove', progress_title = '$progress_title', progress_complete = '$progress_complete', progress_none = '$progress_none', progress_sentence_1 = '$progress_sentence_1', progress_sentence_2 = '$progress_sentence_2', progress_sentence_3 = '$progress_sentence_3', aff_lib_button = '$aff_lib_button'");
		$st = $db->prepare("update idevaff_language_german set menu_coupon = ?, coupon_title = ?, coupon_desc = ?, coupon_head_1 = ?, coupon_head_2 = ?, coupon_head_3 = ?, coupon_sale_amt = ?, coupon_flat_rate = ?, coupon_default = ?, cc_vanity_title = ?, cc_vanity_field = ?, cc_vanity_button = ?, cc_vanity_error_missing = ?, cc_vanity_error_exists = ?, cc_vanity_error = ?, cc_vanity_success = ?, coupon_none = ?, pic_error_title = ?, pic_missing = ?, pic_invalid = ?, pic_error = ?, pic_success = ?, pic_title = ?, pic_info = ?, pic_bullet_1 = ?, pic_bullet_2 = ?, pic_bullet_3 = ?, pic_file = ?, pic_button = ?, pic_current = ?, pic_remove = ?, progress_title = ?, progress_complete = ?, progress_none = ?, progress_sentence_1 = ?, progress_sentence_2 = ?, progress_sentence_3 = ?, aff_lib_button = ?");
		$st->execute(array($menu_coupon,$coupon_title,$coupon_desc,$coupon_head_1,$coupon_head_2,$coupon_head_3,$coupon_sale_amt,$coupon_flat_rate,$coupon_default,$cc_vanity_title,$cc_vanity_field,$cc_vanity_button,$cc_vanity_error_missing,$cc_vanity_error_exists,$cc_vanity_error,$cc_vanity_success,$coupon_none,$pic_error_title,$pic_missing,$pic_invalid,$pic_error,$pic_success,$pic_title,$pic_info,$pic_bullet_1,$pic_bullet_2,$pic_bullet_3,$pic_file,$pic_button,$pic_current,$pic_remove,$progress_title,$progress_complete,$progress_none,$progress_sentence_1,$progress_sentence_2,$progress_sentence_3,$aff_lib_button));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$q = $db->query("SHOW TABLES LIKE 'idevaff_language_italian'");
if ( $q->rowCount() == 1 ) {
// Update existing language to converted language.
// Old language was English.
$signup_maintenance_heading = html_output(utf8_encode('Avviso di Manutenzione'));
$signup_maintenance_info = html_output(utf8_encode('Iscrizioni temporaneamente sospese. Per favore, riprovare in seguito.'));
$marketing_group_title = html_output(utf8_encode('Gruppo di marketing'));
$marketing_button = html_output(utf8_encode('Mostra'));
$marketing_no_group = html_output(utf8_encode('Nessun gruppo selezionato'));
$marketing_choose = html_output(utf8_encode('Per favore scegliere un gruppo di marketing di cui sopra'));
$marketing_notice = html_output(utf8_encode('I gruppi di marketing potrebbero avere diverse pagine di traffico in entrata'));
$canspam_heading = html_output(utf8_encode('Regolamento ed accettazione di CAN-SPAM'));
$canspam_accept = html_output(utf8_encode('Ho letto, compreso e accettato il regolamento di CAN-SPAM.'));
$canspam_error = html_output(utf8_encode('Non hai accettato il regolamento di CAN-SPAM.'));
$signup_banned = html_output(utf8_encode('Si è verificato un errore durante la creazione dell\’account. Per favore contattare l\’amministratore di sistema per ulteriori informazioni.'));
$header_testimonials = html_output(utf8_encode('Referenti affiliati'));
$testi_visit = html_output(utf8_encode('Visita il sito web'));
$testi_description = html_output(utf8_encode('Offrite il vostro referente per il nostro programma affiliati e noi lo posizioneremo nella nostra pagina &lt;a href=&quot;testimonials.php&quot;&gt;referenti&lt;/a&gt; con un link al vostro sito web.'));
$testi_name = html_output(utf8_encode('Nome'));
$testi_url = html_output(utf8_encode('URL sito web'));
$testi_content = html_output(utf8_encode('Referente'));
$testi_code = html_output(utf8_encode('Codice di sicurezza'));
$testi_submit = html_output(utf8_encode('Presenta referente'));
$testi_na = html_output(utf8_encode('I referenti non sono disponibili.'));
$testi_title = html_output(utf8_encode('Offri un referente'));
$testi_success_title = html_output(utf8_encode('Referente riuscito'));
$testi_success_message = html_output(utf8_encode('Grazie per aver presentato il vostro referente. A breve il nostro team lo sottoporrà ad un controllo.'));
$testi_error_title = html_output(utf8_encode('Errore referente'));
$testi_error_name_missing = html_output(utf8_encode('Per favore includere il vostro nome per il vostro referente.'));
$testi_error_url_missing = html_output(utf8_encode('Per favore includere l\’URL al vostro sito web per il vostro referente.'));
$testi_error_missing = html_output(utf8_encode('Per favore includere un testo per il vostro referente.'));
$menu_drop_delayed = html_output(utf8_encode('Commissioni in attesa'));
$details_drop_6 = html_output(utf8_encode('Commissioni attuali in attesa'));
$details_type_6 = html_output(utf8_encode('In attesa - Approvazione a breve'));
$comdetails_status_6 = html_output(utf8_encode('In attesa - Approvazione a breve'));
$tc_reaccept_title = html_output(utf8_encode('Notifica cambiamento Termini e condizioni'));
$tc_reaccept_sub_title = html_output(utf8_encode('È necessario accettare i nuovi Termini e condizioni per poter accedere di nuovo al proprio account.'));
$tc_reaccept_button = html_output(utf8_encode('Ho letto, compreso e accettato i nuovi Termini e condizioni di cui sopra.'));
$tlinks_active = html_output(utf8_encode('Numero di livelli attivi'));
$tlinks_payout_structure = html_output(utf8_encode('Struttura di pagamento a livelli'));
$tlinks_level = html_output(utf8_encode('Livello'));
$tierText1 = html_output(utf8_encode('% calcolato dall\’importo delle commissioni degli affiliati di riferimento.'));
$tierText2 = html_output(utf8_encode('% calcolato dall\’importo delle commissioni del livello superiore.'));
$tierText3 = html_output(utf8_encode('% calcolato dall\’importo delle vendite.'));
$tierTextflat = html_output(utf8_encode('tasso forfettario.'));
$edit_custom_button = html_output(utf8_encode('Modifica risposta'));
$private_heading = html_output(utf8_encode('Iscrizione privata'));
$private_info = html_output(utf8_encode('Il nostro programma affiliati non è aperto al pubblico e richiede un codice d\’iscrizione per aderirvi.  Le informazioni su come ottenere un codice d\’iscrizione sono reperibili qui.'));
$private_required_heading = html_output(utf8_encode('Codice d\’iscrizione richiesto'));
$private_code_title = html_output(utf8_encode('Digitare codice d\’iscrizione'));
$private_button = html_output(utf8_encode('Verifica codice'));
$private_error_title = html_output(utf8_encode('Codice d\’iscrizione fornito invalido'));
$private_error_invalid = html_output(utf8_encode('Il codice d\’iscrizione da voi fornito non è valido.'));
$private_error_expired = html_output(utf8_encode('Il codice d\’iscrizione da voi fornito è scaduto e non è più valido.'));
$qr_code_title = html_output(utf8_encode('Codice QR'));
$qr_code_size = html_output(utf8_encode('Dimensione Codice QR'));
$qr_code_button = html_output(utf8_encode('Mostra Codice QR'));
$qr_code_offline_title = html_output(utf8_encode('Commercializzazione offline'));
$qr_code_offline_content1 = html_output(utf8_encode('Aggiungete questo codice QR ai vostri opuscoli, volantini, biglietti da visita, ecc.'));
$qr_code_offline_content2 = html_output(utf8_encode('- Fare click con il destro sull’immagine e <strong>salvare come</strong> nel vostro computer.'));
$qr_code_online_title = html_output(utf8_encode('Commercializzazione online'));
$qr_code_online_content = html_output(utf8_encode('Aggiungete questo codice QR al vostro sito web, social media, blog, ecc.'));
	try {
		//$db->query("update idevaff_language_italian set signup_maintenance_heading = '$signup_maintenance_heading', signup_maintenance_info = '$signup_maintenance_info', marketing_group_title = '$marketing_group_title', marketing_button = '$marketing_button', marketing_no_group = '$marketing_no_group', marketing_choose = '$marketing_choose', marketing_notice = '$marketing_notice', canspam_heading = '$canspam_heading', canspam_accept = '$canspam_accept', canspam_error = '$canspam_error', signup_banned = '$signup_banned', header_testimonials = '$header_testimonials', testi_visit = '$testi_visit', testi_description = '$testi_description', testi_name = '$testi_name', testi_url = '$testi_url', testi_content = '$testi_content', testi_code = '$testi_code', testi_submit = '$testi_submit', testi_na = '$testi_na', testi_title = '$testi_title', testi_success_title = '$testi_success_title', testi_success_message = '$testi_success_message', testi_error_title = '$testi_error_title', testi_error_name_missing = '$testi_error_name_missing', testi_error_url_missing = '$testi_error_url_missing', testi_error_missing = '$testi_error_missing', menu_drop_delayed = '$menu_drop_delayed', details_drop_6 = '$details_drop_6', details_type_6 = '$details_type_6', comdetails_status_6 = '$comdetails_status_6', tc_reaccept_title = '$tc_reaccept_title', tc_reaccept_sub_title = '$tc_reaccept_sub_title', tc_reaccept_button = '$tc_reaccept_button', tlinks_active = '$tlinks_active', tlinks_payout_structure = '$tlinks_payout_structure', tlinks_level = '$tlinks_level', tierText1 = '$tierText1', tierText2 = '$tierText2', tierText3 = '$tierText3', tierTextflat = '$tierTextflat', edit_custom_button = '$edit_custom_button', private_heading = '$private_heading', private_info = '$private_info', private_required_heading = '$private_required_heading', private_code_title = '$private_code_title', private_button = '$private_button', private_error_title = '$private_error_title', private_error_invalid = '$private_error_invalid', private_error_expired = '$private_error_expired', qr_code_title = '$qr_code_title', qr_code_size = '$qr_code_size', qr_code_button = '$qr_code_button', qr_code_offline_title = '$qr_code_offline_title', qr_code_offline_content1 = '$qr_code_offline_content1', qr_code_offline_content2 = '$qr_code_offline_content2', qr_code_online_title = '$qr_code_online_title', qr_code_online_content = '$qr_code_online_content'");
		$st = $db->prepare("update idevaff_language_german set signup_maintenance_heading = ?, signup_maintenance_info = ?, marketing_group_title = ?, marketing_button = ?, marketing_no_group = ?, marketing_choose = ?, marketing_notice = ?, canspam_heading = ?, canspam_accept = ?, canspam_error = ?, signup_banned = ?, header_testimonials = ?, testi_visit = ?, testi_description = ?, testi_name = ?, testi_url = ?, testi_content = ?, testi_code = ?, testi_submit = ?, testi_na = ?, testi_title = ?, testi_success_title = ?, testi_success_message = ?, testi_error_title = ?, testi_error_name_missing = ?, testi_error_url_missing = ?, testi_error_missing = ?, menu_drop_delayed = ?, details_drop_6 = ?, details_type_6 = ?, comdetails_status_6 = ?, tc_reaccept_title = ?, tc_reaccept_sub_title = ?, tc_reaccept_button = ?, tlinks_active = ?, tlinks_payout_structure = ?, tlinks_level = ?, tierText1 = ?, tierText2 = ?, tierText3 = ?, tierTextflat = ?, edit_custom_button = ?, private_heading = ?, private_info = ?, private_required_heading = ?, private_code_title = ?, private_button = ?, private_error_title = ?, private_error_invalid = ?, private_error_expired = ?, qr_code_title = ?, qr_code_size = ?, qr_code_button = ?, qr_code_offline_title = ?, qr_code_offline_content1 = ?, qr_code_offline_content2 = ?, qr_code_online_title = ?, qr_code_online_content = ?");
		$st->execute(array($signup_maintenance_heading,$signup_maintenance_info,$marketing_group_title,$marketing_button,$marketing_no_group,$marketing_choose,$marketing_notice,$canspam_heading,$canspam_accept,$canspam_error,$signup_banned,$header_testimonials,$testi_visit,$testi_description,$testi_name,$testi_url,$testi_content,$testi_code,$testi_submit,$testi_na,$testi_title,$testi_success_title,$testi_success_message,$testi_error_title,$testi_error_name_missing,$testi_error_url_missing,$testi_error_missing,$menu_drop_delayed,$details_drop_6,$details_type_6,$comdetails_status_6,$tc_reaccept_title,$tc_reaccept_sub_title,$tc_reaccept_button,$tlinks_active,$tlinks_payout_structure,$tlinks_level,$tierText1,$tierText2,$tierText3,$tierTextflat,$edit_custom_button,$private_heading,$private_info,$private_required_heading,$private_code_title,$private_button,$private_error_title,$private_error_invalid,$private_error_expired,$qr_code_title,$qr_code_size,$qr_code_button,$qr_code_offline_title,$qr_code_offline_content1,$qr_code_offline_content2,$qr_code_online_title,$qr_code_online_content));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

// Update new language.
$menu_coupon = html_output(utf8_encode('Codici coupon'));
$coupon_title = html_output(utf8_encode('I vostri codici coupon disponibili'));
$coupon_desc = html_output(utf8_encode('Distribuite questi codici coupon e guadagnate una commissione ogni volta che qualcuno usa il vostro codice!'));
$coupon_head_1 = html_output(utf8_encode('Codice Coupon'));
$coupon_head_2 = html_output(utf8_encode('Sconto cliente'));
$coupon_head_3 = html_output(utf8_encode('Il vostro importo commissione'));
$coupon_sale_amt = html_output(utf8_encode('dell\’importo vendite'));
$coupon_flat_rate = html_output(utf8_encode('tasso forfettario'));
$coupon_default = html_output(utf8_encode('Livello pagamento di default'));
$cc_vanity_title = html_output(utf8_encode('Richiedi un codice coupon personalizzato'));
$cc_vanity_field = html_output(utf8_encode('Codice coupon'));
$cc_vanity_button = html_output(utf8_encode('Richiedi un codice coupon personalizzato'));
$cc_vanity_error_missing = html_output(utf8_encode('<strong>Errore!</strong> Per favore inserire un codice coupon.'));
$cc_vanity_error_exists = html_output(utf8_encode('<strong>Errore!</strong> Questo codice coupon è già stato richiesto. È in corso d’approvazione.'));
$cc_vanity_error = html_output(utf8_encode('<strong>Errore!</strong> Codice coupon non valido. Per favore utilizzare solo lettere, numeri e underscore.'));
$cc_vanity_success = html_output(utf8_encode('<strong>Success!</strong> Il vostro codice coupon personalizzato è stato richiesto.'));
$coupon_none = html_output(utf8_encode('Codici coupon attualmente non disponibili.'));
$pic_error_title = html_output(utf8_encode('Errore caricamento immagine'));
$pic_missing = html_output(utf8_encode('Per favore scegliere un nome per il file.'));
$pic_invalid = html_output(utf8_encode('Formato immagine non consentito. I formati immagine consentiti sono .gif, .jpg and .png.'));
$pic_error = html_output(utf8_encode('Errore caricamento immagine, per favore contattare il manager affiliato.'));
$pic_success = html_output(utf8_encode('L’immagine è stata caricata con successo.'));
$pic_title = html_output(utf8_encode('Carica un\’immagine'));
$pic_info = html_output(utf8_encode('Caricare una tua foto è di aiuto alla personalizzazione della nostra esperienza con te.'));
$pic_bullet_1 = html_output(utf8_encode('I formati file possono essere .jpg, .gif or .png.'));
$pic_bullet_2 = html_output(utf8_encode('Ogni immagine inappropriata sarà eliminata e il vostro account sospeso.'));
$pic_bullet_3 = html_output(utf8_encode('La tua foto non sarà mostrata pubblicamente. Sarà connessa solo al tuo account e visibile solo a noi.'));
$pic_file = html_output(utf8_encode('Seleziona un file:'));
$pic_button = html_output(utf8_encode('Carica'));
$pic_current = html_output(utf8_encode('La mia foto'));
$pic_remove = html_output(utf8_encode('Rimuovi foto'));
$progress_title = html_output(utf8_encode('Idoneità al prossimo pagamento:'));
$progress_complete = html_output(utf8_encode('completo.'));
$progress_none = html_output(utf8_encode('Non richiediamo un pagamento minimo.'));
$progress_sentence_1 = html_output(utf8_encode('Hai guadagnato'));
$progress_sentence_2 = html_output(utf8_encode('del'));
$progress_sentence_3 = html_output(utf8_encode('requisito.'));
$aff_lib_button = html_output(utf8_encode('<font style="font-size:16px; font-weight:bold;"> Riscuoti il tuo accesso gratuito a</font><br>www.AffiliateLibrary.com'));
	try {
		//$db->query("update idevaff_language_italian set menu_coupon = '$menu_coupon', coupon_title = '$coupon_title', coupon_desc = '$coupon_desc', coupon_head_1 = '$coupon_head_1', coupon_head_2 = '$coupon_head_2', coupon_head_3 = '$coupon_head_3', coupon_sale_amt = '$coupon_sale_amt', coupon_flat_rate = '$coupon_flat_rate', coupon_default = '$coupon_default', cc_vanity_title = '$cc_vanity_title', cc_vanity_field = '$cc_vanity_field', cc_vanity_button = '$cc_vanity_button', cc_vanity_error_missing = '$cc_vanity_error_missing', cc_vanity_error_exists = '$cc_vanity_error_exists', cc_vanity_error = '$cc_vanity_error', cc_vanity_success = '$cc_vanity_success', coupon_none = '$coupon_none', pic_error_title = '$pic_error_title', pic_missing = '$pic_missing', pic_invalid = '$pic_invalid', pic_error = '$pic_error', pic_success = '$pic_success', pic_title = '$pic_title', pic_info = '$pic_info', pic_bullet_1 = '$pic_bullet_1', pic_bullet_2 = '$pic_bullet_2', pic_bullet_3 = '$pic_bullet_3', pic_file = '$pic_file', pic_button = '$pic_button', pic_current = '$pic_current', pic_remove = '$pic_remove', progress_title = '$progress_title', progress_complete = '$progress_complete', progress_none = '$progress_none', progress_sentence_1 = '$progress_sentence_1', progress_sentence_2 = '$progress_sentence_2', progress_sentence_3 = '$progress_sentence_3', aff_lib_button = '$aff_lib_button'");
		$st = $db->prepare("update idevaff_language_german set menu_coupon = ?, coupon_title = ?, coupon_desc = ?, coupon_head_1 = ?, coupon_head_2 = ?, coupon_head_3 = ?, coupon_sale_amt = ?, coupon_flat_rate = ?, coupon_default = ?, cc_vanity_title = ?, cc_vanity_field = ?, cc_vanity_button = ?, cc_vanity_error_missing = ?, cc_vanity_error_exists = ?, cc_vanity_error = ?, cc_vanity_success = ?, coupon_none = ?, pic_error_title = ?, pic_missing = ?, pic_invalid = ?, pic_error = ?, pic_success = ?, pic_title = ?, pic_info = ?, pic_bullet_1 = ?, pic_bullet_2 = ?, pic_bullet_3 = ?, pic_file = ?, pic_button = ?, pic_current = ?, pic_remove = ?, progress_title = ?, progress_complete = ?, progress_none = ?, progress_sentence_1 = ?, progress_sentence_2 = ?, progress_sentence_3 = ?, aff_lib_button = ?");
		$st->execute(array($menu_coupon,$coupon_title,$coupon_desc,$coupon_head_1,$coupon_head_2,$coupon_head_3,$coupon_sale_amt,$coupon_flat_rate,$coupon_default,$cc_vanity_title,$cc_vanity_field,$cc_vanity_button,$cc_vanity_error_missing,$cc_vanity_error_exists,$cc_vanity_error,$cc_vanity_success,$coupon_none,$pic_error_title,$pic_missing,$pic_invalid,$pic_error,$pic_success,$pic_title,$pic_info,$pic_bullet_1,$pic_bullet_2,$pic_bullet_3,$pic_file,$pic_button,$pic_current,$pic_remove,$progress_title,$progress_complete,$progress_none,$progress_sentence_1,$progress_sentence_2,$progress_sentence_3,$aff_lib_button));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

}

$q = $db->query("SHOW TABLES LIKE 'idevaff_language_portuguese'");
if ( $q->rowCount() == 1 ) {
// Update existing language to converted language.
// Old language was English.
$signup_maintenance_heading = html_output(utf8_encode('Aviso de Manutenção'));
$signup_maintenance_info = html_output(utf8_encode('Os inícios de sessão estão temporariamente desactivados. Por favor tente outra vez mais tarde.'));
$marketing_group_title = html_output(utf8_encode('Grupo de Marketing'));
$marketing_button = html_output(utf8_encode('Mostrar'));
$marketing_no_group = html_output(utf8_encode('Nenhum Grupo selecionado'));
$marketing_choose = html_output(utf8_encode('Por favor escolha um Grupo de Marketing acima'));
$marketing_notice = html_output(utf8_encode('Os Grupos de Marketing podem ter diferentes páginas de entrada de tráfego'));
$canspam_heading = html_output(utf8_encode('CAN-SPAM Regras e Aprovação'));
$canspam_accept = html_output(utf8_encode('Eu li, percebi e concordo com as regras CAN-SPAM apresentadas acima.'));
$canspam_error = html_output(utf8_encode('Não aceitou as nossas regras CAN-SPAM.'));
$signup_banned = html_output(utf8_encode('Ocorreu um erro durante a criação da sua conta. Por favor contacte o administrador do sistema para mais informações.'));
$header_testimonials = html_output(utf8_encode('Testemunhos de Afiliados'));
$testi_visit = html_output(utf8_encode('Visitar Website'));
$testi_description = html_output(utf8_encode('Ofereça o seu testemunho do nosso programa de afiliados e nós trataremos de pô-lo na nossa página de &lt;a href=&quot;testimonials.php&quot;&gt;testemunhoss&lt;/a&gt; com um link para o seu website.'));
$testi_name = html_output(utf8_encode('Nome'));
$testi_url = html_output(utf8_encode('URL do Website'));
$testi_content = html_output(utf8_encode('Testemunho'));
$testi_code = html_output(utf8_encode('Código de Segurança'));
$testi_submit = html_output(utf8_encode('Submeter Testemunho'));
$testi_na = html_output(utf8_encode('Os testemunhos não estão disponíveis.'));
$testi_title = html_output(utf8_encode('Oferecer testemunho'));
$testi_success_title = html_output(utf8_encode('Testemunho registado com sucesso'));
$testi_success_message = html_output(utf8_encode('Obrigado por submeter o seu testemunho. A nossa equipa irá revê-lo rapidamente.'));
$testi_error_title = html_output(utf8_encode('Erro no Testemunho'));
$testi_error_name_missing = html_output(utf8_encode('Por favor inclua o seu nome no testemunho.'));
$testi_error_url_missing = html_output(utf8_encode('Por favor inclua o URL do seu website no seu testemunho.'));
$testi_error_missing = html_output(utf8_encode('Por favor inclua texto no seu testemunho.'));
$menu_drop_delayed = html_output(utf8_encode('Comissões atrasadas'));
$details_drop_6 = html_output(utf8_encode('Comissões actuais atrasadas'));
$details_type_6 = html_output(utf8_encode('Atrasada - Será aprovada em breve'));
$comdetails_status_6 = html_output(utf8_encode('Atrasada - Será aprovada em breve'));
$tc_reaccept_title = html_output(utf8_encode('Notificação de mudança de Termos e Condições'));
$tc_reaccept_sub_title = html_output(utf8_encode('Tem de concordar com os nossos novos termos e condições para recuperar o acesso à sua conta.'));
$tc_reaccept_button = html_output(utf8_encode('Eu li, percebi e concordo com os termos e condições expressos acima.'));
$tlinks_active = html_output(utf8_encode('Número de níveis de pagamento activos'));
$tlinks_payout_structure = html_output(utf8_encode('Estrutura dos níveis de pagamento'));
$tlinks_level = html_output(utf8_encode('Nível'));
$tierText1 = html_output(utf8_encode('% calculada a partir do valor da comissão do respectivo afiliado.'));
$tierText2 = html_output(utf8_encode('% calculada a partir do valor da comissão dos níveis de pagamento superiores.'));
$tierText3 = html_output(utf8_encode('% calculada a partir do valor da venda.'));
$tierTextflat = html_output(utf8_encode('taxa fixa.'));
$edit_custom_button = html_output(utf8_encode('Editar Resposta'));
$private_heading = html_output(utf8_encode('Inscrição Privada'));
$private_info = html_output(utf8_encode('O nosso programa de afiliados não está aberto ao público em geral e requer um código de inscrição para aderir.  A informação sobre como obter um código de inscrição pode ser encontrada aqui.'));
$private_required_heading = html_output(utf8_encode('Necessário Código de Inscrição'));
$private_code_title = html_output(utf8_encode('Colocar Código de Inscrição'));
$private_button = html_output(utf8_encode('Submeter Código'));
$private_error_title = html_output(utf8_encode('Código de Inscrição inválido'));
$private_error_invalid = html_output(utf8_encode('O código de inscrição fornecido é inválido.'));
$private_error_expired = html_output(utf8_encode('O código de inscrição fornecido expirou e deixou de ser válido.'));
$qr_code_title = html_output(utf8_encode('Códigos QR'));
$qr_code_size = html_output(utf8_encode('Tamanho dos códigos QR'));
$qr_code_button = html_output(utf8_encode('Mostrar código QR'));
$qr_code_offline_title = html_output(utf8_encode('Marketing Offline'));
$qr_code_offline_content1 = html_output(utf8_encode('Adicione este código QR às suas brochuras, folhetos, cartões de visita, etc.'));
$qr_code_offline_content2 = html_output(utf8_encode('- Clique com o botão direito do rato na imagem e <strong>guardar como</strong> para o seu computador.'));
$qr_code_online_title = html_output(utf8_encode('Marketing Online'));
$qr_code_online_content = html_output(utf8_encode('Adicione este código QR ao seu website, rede social, blog, etc.'));
	try {
		//$db->query("update idevaff_language_portuguese set signup_maintenance_heading = '$signup_maintenance_heading', signup_maintenance_info = '$signup_maintenance_info', marketing_group_title = '$marketing_group_title', marketing_button = '$marketing_button', marketing_no_group = '$marketing_no_group', marketing_choose = '$marketing_choose', marketing_notice = '$marketing_notice', canspam_heading = '$canspam_heading', canspam_accept = '$canspam_accept', canspam_error = '$canspam_error', signup_banned = '$signup_banned', header_testimonials = '$header_testimonials', testi_visit = '$testi_visit', testi_description = '$testi_description', testi_name = '$testi_name', testi_url = '$testi_url', testi_content = '$testi_content', testi_code = '$testi_code', testi_submit = '$testi_submit', testi_na = '$testi_na', testi_title = '$testi_title', testi_success_title = '$testi_success_title', testi_success_message = '$testi_success_message', testi_error_title = '$testi_error_title', testi_error_name_missing = '$testi_error_name_missing', testi_error_url_missing = '$testi_error_url_missing', testi_error_missing = '$testi_error_missing', menu_drop_delayed = '$menu_drop_delayed', details_drop_6 = '$details_drop_6', details_type_6 = '$details_type_6', comdetails_status_6 = '$comdetails_status_6', tc_reaccept_title = '$tc_reaccept_title', tc_reaccept_sub_title = '$tc_reaccept_sub_title', tc_reaccept_button = '$tc_reaccept_button', tlinks_active = '$tlinks_active', tlinks_payout_structure = '$tlinks_payout_structure', tlinks_level = '$tlinks_level', tierText1 = '$tierText1', tierText2 = '$tierText2', tierText3 = '$tierText3', tierTextflat = '$tierTextflat', edit_custom_button = '$edit_custom_button', private_heading = '$private_heading', private_info = '$private_info', private_required_heading = '$private_required_heading', private_code_title = '$private_code_title', private_button = '$private_button', private_error_title = '$private_error_title', private_error_invalid = '$private_error_invalid', private_error_expired = '$private_error_expired', qr_code_title = '$qr_code_title', qr_code_size = '$qr_code_size', qr_code_button = '$qr_code_button', qr_code_offline_title = '$qr_code_offline_title', qr_code_offline_content1 = '$qr_code_offline_content1', qr_code_offline_content2 = '$qr_code_offline_content2', qr_code_online_title = '$qr_code_online_title', qr_code_online_content = '$qr_code_online_content'");
		$st = $db->prepare("update idevaff_language_german set signup_maintenance_heading = ?, signup_maintenance_info = ?, marketing_group_title = ?, marketing_button = ?, marketing_no_group = ?, marketing_choose = ?, marketing_notice = ?, canspam_heading = ?, canspam_accept = ?, canspam_error = ?, signup_banned = ?, header_testimonials = ?, testi_visit = ?, testi_description = ?, testi_name = ?, testi_url = ?, testi_content = ?, testi_code = ?, testi_submit = ?, testi_na = ?, testi_title = ?, testi_success_title = ?, testi_success_message = ?, testi_error_title = ?, testi_error_name_missing = ?, testi_error_url_missing = ?, testi_error_missing = ?, menu_drop_delayed = ?, details_drop_6 = ?, details_type_6 = ?, comdetails_status_6 = ?, tc_reaccept_title = ?, tc_reaccept_sub_title = ?, tc_reaccept_button = ?, tlinks_active = ?, tlinks_payout_structure = ?, tlinks_level = ?, tierText1 = ?, tierText2 = ?, tierText3 = ?, tierTextflat = ?, edit_custom_button = ?, private_heading = ?, private_info = ?, private_required_heading = ?, private_code_title = ?, private_button = ?, private_error_title = ?, private_error_invalid = ?, private_error_expired = ?, qr_code_title = ?, qr_code_size = ?, qr_code_button = ?, qr_code_offline_title = ?, qr_code_offline_content1 = ?, qr_code_offline_content2 = ?, qr_code_online_title = ?, qr_code_online_content = ?");
		$st->execute(array($signup_maintenance_heading,$signup_maintenance_info,$marketing_group_title,$marketing_button,$marketing_no_group,$marketing_choose,$marketing_notice,$canspam_heading,$canspam_accept,$canspam_error,$signup_banned,$header_testimonials,$testi_visit,$testi_description,$testi_name,$testi_url,$testi_content,$testi_code,$testi_submit,$testi_na,$testi_title,$testi_success_title,$testi_success_message,$testi_error_title,$testi_error_name_missing,$testi_error_url_missing,$testi_error_missing,$menu_drop_delayed,$details_drop_6,$details_type_6,$comdetails_status_6,$tc_reaccept_title,$tc_reaccept_sub_title,$tc_reaccept_button,$tlinks_active,$tlinks_payout_structure,$tlinks_level,$tierText1,$tierText2,$tierText3,$tierTextflat,$edit_custom_button,$private_heading,$private_info,$private_required_heading,$private_code_title,$private_button,$private_error_title,$private_error_invalid,$private_error_expired,$qr_code_title,$qr_code_size,$qr_code_button,$qr_code_offline_title,$qr_code_offline_content1,$qr_code_offline_content2,$qr_code_online_title,$qr_code_online_content));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

// Update new language.
$menu_coupon = html_output(utf8_encode('Códigos Promocionais'));
$coupon_title = html_output(utf8_encode('Os seus códigos promocionais disponíveis'));
$coupon_desc = html_output(utf8_encode('Distribua estes códigos promocionais e ganhe uma comissão cada vez que alguém use o seu código!'));
$coupon_head_1 = html_output(utf8_encode('Código Promocional'));
$coupon_head_2 = html_output(utf8_encode('Desconto para o cliente'));
$coupon_head_3 = html_output(utf8_encode('Valor da sua Comissão'));
$coupon_sale_amt = html_output(utf8_encode('do valor da venda'));
$coupon_flat_rate = html_output(utf8_encode('taxa fixa'));
$coupon_default = html_output(utf8_encode('Nível de Pagamento Padrão'));
$cc_vanity_title = html_output(utf8_encode('Pedir um Código Promocional Personalizado'));
$cc_vanity_field = html_output(utf8_encode('Código Promocional'));
$cc_vanity_button = html_output(utf8_encode('Pedir Código Promocional'));
$cc_vanity_error_missing = html_output(utf8_encode('<strong>Erro!</strong> Por favor insira um código promocional.'));
$cc_vanity_error_exists = html_output(utf8_encode('<strong>Erro!</strong> Já pediu este código. Aguarda aprovação.'));
$cc_vanity_error = html_output(utf8_encode('<strong>Erro!</strong> O código promocional é inválido. Por favor utilise apenas letras, números e underscores.'));
$cc_vanity_success = html_output(utf8_encode('<strong>Successo!</strong> O seu código promocional personalizado foi pedido.'));
$coupon_none = html_output(utf8_encode('Nenhum código promocional disponível de momento.'));
$pic_error_title = html_output(utf8_encode('Erro no carregamento de imagem'));
$pic_missing = html_output(utf8_encode('Por favor escolha um nome para o ficheiro.'));
$pic_invalid = html_output(utf8_encode('O formato da imagem não é permitido. Os formatos permitidos são .gif, .jpg e .png.'));
$pic_error = html_output(utf8_encode('Erro no carregamento de imagem, por favor contacte o gestor afiliado.'));
$pic_success = html_output(utf8_encode('A sua imagem foi carregada com sucesso.'));
$pic_title = html_output(utf8_encode('Carregue a sua imagem'));
$pic_info = html_output(utf8_encode('Carregar a sua imagem ajuda-nos a personalizar a nossa experiência consigo.'));
$pic_bullet_1 = html_output(utf8_encode('As imagens podem ser do formato .jpg, .gif ou .png.'));
$pic_bullet_2 = html_output(utf8_encode('Qualquer imagem inapropriada será apagada e a sua conta suspensa.'));
$pic_bullet_3 = html_output(utf8_encode('A sua imagem não será apresentada ao público. Apenas será anexada à sua conta e só nós teremos acesso.'));
$pic_file = html_output(utf8_encode('Selecione um Ficheiro:'));
$pic_button = html_output(utf8_encode('Carregar'));
$pic_current = html_output(utf8_encode('A Minha Fotografia Actual'));
$pic_remove = html_output(utf8_encode('Remover Fotografia'));
$progress_title = html_output(utf8_encode('Eligibilidade Para o Próximo Pagamento:'));
$progress_complete = html_output(utf8_encode('completo.'));
$progress_none = html_output(utf8_encode('Não temos requisitos de pagamento mínimo.'));
$progress_sentence_1 = html_output(utf8_encode('Ganhou'));
$progress_sentence_2 = html_output(utf8_encode('do'));
$progress_sentence_3 = html_output(utf8_encode('requisito.'));
$aff_lib_button = html_output(utf8_encode('<font style="font-size:16px; font-weight:bold;">Reivindique O Seu Acesso Grátis Ao</font><br>www.AffiliateLibrary.com'));
	try {
		//$db->query("update idevaff_language_portuguese set menu_coupon = '$menu_coupon', coupon_title = '$coupon_title', coupon_desc = '$coupon_desc', coupon_head_1 = '$coupon_head_1', coupon_head_2 = '$coupon_head_2', coupon_head_3 = '$coupon_head_3', coupon_sale_amt = '$coupon_sale_amt', coupon_flat_rate = '$coupon_flat_rate', coupon_default = '$coupon_default', cc_vanity_title = '$cc_vanity_title', cc_vanity_field = '$cc_vanity_field', cc_vanity_button = '$cc_vanity_button', cc_vanity_error_missing = '$cc_vanity_error_missing', cc_vanity_error_exists = '$cc_vanity_error_exists', cc_vanity_error = '$cc_vanity_error', cc_vanity_success = '$cc_vanity_success', coupon_none = '$coupon_none', pic_error_title = '$pic_error_title', pic_missing = '$pic_missing', pic_invalid = '$pic_invalid', pic_error = '$pic_error', pic_success = '$pic_success', pic_title = '$pic_title', pic_info = '$pic_info', pic_bullet_1 = '$pic_bullet_1', pic_bullet_2 = '$pic_bullet_2', pic_bullet_3 = '$pic_bullet_3', pic_file = '$pic_file', pic_button = '$pic_button', pic_current = '$pic_current', pic_remove = '$pic_remove', progress_title = '$progress_title', progress_complete = '$progress_complete', progress_none = '$progress_none', progress_sentence_1 = '$progress_sentence_1', progress_sentence_2 = '$progress_sentence_2', progress_sentence_3 = '$progress_sentence_3', aff_lib_button = '$aff_lib_button'");
		$st = $db->prepare("update idevaff_language_german set menu_coupon = ?, coupon_title = ?, coupon_desc = ?, coupon_head_1 = ?, coupon_head_2 = ?, coupon_head_3 = ?, coupon_sale_amt = ?, coupon_flat_rate = ?, coupon_default = ?, cc_vanity_title = ?, cc_vanity_field = ?, cc_vanity_button = ?, cc_vanity_error_missing = ?, cc_vanity_error_exists = ?, cc_vanity_error = ?, cc_vanity_success = ?, coupon_none = ?, pic_error_title = ?, pic_missing = ?, pic_invalid = ?, pic_error = ?, pic_success = ?, pic_title = ?, pic_info = ?, pic_bullet_1 = ?, pic_bullet_2 = ?, pic_bullet_3 = ?, pic_file = ?, pic_button = ?, pic_current = ?, pic_remove = ?, progress_title = ?, progress_complete = ?, progress_none = ?, progress_sentence_1 = ?, progress_sentence_2 = ?, progress_sentence_3 = ?, aff_lib_button = ?");
		$st->execute(array($menu_coupon,$coupon_title,$coupon_desc,$coupon_head_1,$coupon_head_2,$coupon_head_3,$coupon_sale_amt,$coupon_flat_rate,$coupon_default,$cc_vanity_title,$cc_vanity_field,$cc_vanity_button,$cc_vanity_error_missing,$cc_vanity_error_exists,$cc_vanity_error,$cc_vanity_success,$coupon_none,$pic_error_title,$pic_missing,$pic_invalid,$pic_error,$pic_success,$pic_title,$pic_info,$pic_bullet_1,$pic_bullet_2,$pic_bullet_3,$pic_file,$pic_button,$pic_current,$pic_remove,$progress_title,$progress_complete,$progress_none,$progress_sentence_1,$progress_sentence_2,$progress_sentence_3,$aff_lib_button));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}
}

$q = $db->query("SHOW TABLES LIKE 'idevaff_language_spanish'");
if( $q->rowCount() == 1) {
// Update existing language to converted language.
// Old language was English.
$signup_maintenance_heading = html_output(utf8_encode('Aviso de mantenimiento'));
$signup_maintenance_info = html_output(utf8_encode('Las inscripciones estan temporalmente desactivadas. Por favor, inténtelo de nuevo más tarde. '));
$marketing_group_title = html_output(utf8_encode('Grupo de Marketing'));
$marketing_button = html_output(utf8_encode('Display'));
$marketing_no_group = html_output(utf8_encode('No hay un grupo seleccionado'));
$marketing_choose = html_output(utf8_encode('Por favor, selecciona un grupo de Marketing arriba'));
$marketing_notice = html_output(utf8_encode('Los grupos de Marketing pueden tener diferentes páginas de tráfico entrantes'));
$canspam_heading = html_output(utf8_encode('CAN-SPAM Reglas y Aceptación'));
$canspam_accept = html_output(utf8_encode('He leido, entendido y estoy de acuerdo con las siguientes reglas de CAN-SPAM.'));
$canspam_error = html_output(utf8_encode('No has aceptado nuestras nuestras reglas de CAN-SPAM.'));
$signup_banned = html_output(utf8_encode('Un error ha ocurrido durante la creación de la cuenta. Por favor contacta con el administrador del sistema para más información.'));
$header_testimonials = html_output(utf8_encode('Testimonios de afiliados'));
$testi_visit = html_output(utf8_encode('Visita el sitio web'));
$testi_description = html_output(utf8_encode('Ofrecenos tu testimonio para nuestro programa de afiliación y lo pondremos en nuestra página de &lt;a href=&quot;testimonials.php&quot;&gt;testimonios&lt;/a&gt; con un enlace a tu página web.'));
$testi_name = html_output(utf8_encode('Nombre'));
$testi_url = html_output(utf8_encode('Pagina web'));
$testi_content = html_output(utf8_encode('Testimonio'));
$testi_code = html_output(utf8_encode('Código de seguridad'));
$testi_submit = html_output(utf8_encode('Enviar el testimonio'));
$testi_na = html_output(utf8_encode('Los testimonios no están disponibles.'));
$testi_title = html_output(utf8_encode('Ofrecer un testimonio'));
$testi_success_title = html_output(utf8_encode('Testimonio exitoso'));
$testi_success_message = html_output(utf8_encode('Gracias por enviar tu testimonio. Nuestro equipo lo revisará pronto.'));
$testi_error_title = html_output(utf8_encode('Error en el testimonio'));
$testi_error_name_missing = html_output(utf8_encode('Por favor, incluye tu nombre para tu testimonio.'));
$testi_error_url_missing = html_output(utf8_encode('Por favor, incluye tu página web para tu testimonio.'));
$testi_error_missing = html_output(utf8_encode('Por favor, incluye un texto para tu testimonio.'));
$menu_drop_delayed = html_output(utf8_encode('Comisiones retrasadas'));
$details_drop_6 = html_output(utf8_encode('Comisiones retrasadas actualmente'));
$details_type_6 = html_output(utf8_encode('Retrasada - Aprobaremos pronto'));
$comdetails_status_6 = html_output(utf8_encode('Retrasada - Aprobaremos pronto'));
$tc_reaccept_title = html_output(utf8_encode('Notificación de cambio en los términos y condiciones'));
$tc_reaccept_sub_title = html_output(utf8_encode('Tienes que aceptar nuestros nuevos términos y condiciones para poder acceder a tu cuenta.'));
$tc_reaccept_button = html_output(utf8_encode('He leido, entendido y estoy de acuerdo con los términos y condiciones de arriba.'));
$tlinks_active = html_output(utf8_encode('Número de niveles activos'));
$tlinks_payout_structure = html_output(utf8_encode('Estructura de pagos por nivel'));
$tlinks_level = html_output(utf8_encode('Nivel'));
$tierText1 = html_output(utf8_encode('% calculado a partir de la cantidad de comisión de los afiliados referenciados.'));
$tierText2 = html_output(utf8_encode('% calculado a partir de la cantidad de comisión del nivel superior.'));
$tierText3 = html_output(utf8_encode('% calculado a partir del montante de venta.'));
$tierTextflat = html_output(utf8_encode('tarifa plana.'));
$edit_custom_button = html_output(utf8_encode('Editar respuesta'));
$private_heading = html_output(utf8_encode('Registrarse privadamente'));
$private_info = html_output(utf8_encode('Nuestro programa de afiliación no esta abierto al público general y requiere un código de registro para unirse. La información sobre cómo obtener un código de registro debe hacerse aquí.'));
$private_required_heading = html_output(utf8_encode('Código de registro requerido'));
$private_code_title = html_output(utf8_encode('Introduzca el código de registro'));
$private_button = html_output(utf8_encode('Enviar código'));
$private_error_title = html_output(utf8_encode('El código de registro enviado no es válido'));
$private_error_invalid = html_output(utf8_encode('El código de registro que nos has dado no es válido.'));
$private_error_expired = html_output(utf8_encode('El código de registro que nos has dado ha expirado y ya no es válido.'));
$qr_code_title = html_output(utf8_encode('Códigos QR'));
$qr_code_size = html_output(utf8_encode('Tamaño del código QR'));
$qr_code_button = html_output(utf8_encode('Código QR de Display'));
$qr_code_offline_title = html_output(utf8_encode('Marketing Offline'));
$qr_code_offline_content1 = html_output(utf8_encode('Añade este código QR en tus folletos de marketing, flyers, tarjetas de visita, etc.'));
$qr_code_offline_content2 = html_output(utf8_encode('- Botón derecho de la imagen y <strong>salvar-como</strong> en tu ordenador.'));
$qr_code_online_title = html_output(utf8_encode('Marketing Online'));
$qr_code_online_content = html_output(utf8_encode('Añade este código QR en tu página web, redes sociales, blogs, etc.'));
	try {
		$db->query("update idevaff_language_spanish set signup_maintenance_heading = '$signup_maintenance_heading', signup_maintenance_info = '$signup_maintenance_info', marketing_group_title = '$marketing_group_title', marketing_button = '$marketing_button', marketing_no_group = '$marketing_no_group', marketing_choose = '$marketing_choose', marketing_notice = '$marketing_notice', canspam_heading = '$canspam_heading', canspam_accept = '$canspam_accept', canspam_error = '$canspam_error', signup_banned = '$signup_banned', header_testimonials = '$header_testimonials', testi_visit = '$testi_visit', testi_description = '$testi_description', testi_name = '$testi_name', testi_url = '$testi_url', testi_content = '$testi_content', testi_code = '$testi_code', testi_submit = '$testi_submit', testi_na = '$testi_na', testi_title = '$testi_title', testi_success_title = '$testi_success_title', testi_success_message = '$testi_success_message', testi_error_title = '$testi_error_title', testi_error_name_missing = '$testi_error_name_missing', testi_error_url_missing = '$testi_error_url_missing', testi_error_missing = '$testi_error_missing', menu_drop_delayed = '$menu_drop_delayed', details_drop_6 = '$details_drop_6', details_type_6 = '$details_type_6', comdetails_status_6 = '$comdetails_status_6', tc_reaccept_title = '$tc_reaccept_title', tc_reaccept_sub_title = '$tc_reaccept_sub_title', tc_reaccept_button = '$tc_reaccept_button', tlinks_active = '$tlinks_active', tlinks_payout_structure = '$tlinks_payout_structure', tlinks_level = '$tlinks_level', tierText1 = '$tierText1', tierText2 = '$tierText2', tierText3 = '$tierText3', tierTextflat = '$tierTextflat', edit_custom_button = '$edit_custom_button', private_heading = '$private_heading', private_info = '$private_info', private_required_heading = '$private_required_heading', private_code_title = '$private_code_title', private_button = '$private_button', private_error_title = '$private_error_title', private_error_invalid = '$private_error_invalid', private_error_expired = '$private_error_expired', qr_code_title = '$qr_code_title', qr_code_size = '$qr_code_size', qr_code_button = '$qr_code_button', qr_code_offline_title = '$qr_code_offline_title', qr_code_offline_content1 = '$qr_code_offline_content1', qr_code_offline_content2 = '$qr_code_offline_content2', qr_code_online_title = '$qr_code_online_title', qr_code_online_content = '$qr_code_online_content'");
		$st = $db->prepare("update idevaff_language_german set signup_maintenance_heading = ?, signup_maintenance_info = ?, marketing_group_title = ?, marketing_button = ?, marketing_no_group = ?, marketing_choose = ?, marketing_notice = ?, canspam_heading = ?, canspam_accept = ?, canspam_error = ?, signup_banned = ?, header_testimonials = ?, testi_visit = ?, testi_description = ?, testi_name = ?, testi_url = ?, testi_content = ?, testi_code = ?, testi_submit = ?, testi_na = ?, testi_title = ?, testi_success_title = ?, testi_success_message = ?, testi_error_title = ?, testi_error_name_missing = ?, testi_error_url_missing = ?, testi_error_missing = ?, menu_drop_delayed = ?, details_drop_6 = ?, details_type_6 = ?, comdetails_status_6 = ?, tc_reaccept_title = ?, tc_reaccept_sub_title = ?, tc_reaccept_button = ?, tlinks_active = ?, tlinks_payout_structure = ?, tlinks_level = ?, tierText1 = ?, tierText2 = ?, tierText3 = ?, tierTextflat = ?, edit_custom_button = ?, private_heading = ?, private_info = ?, private_required_heading = ?, private_code_title = ?, private_button = ?, private_error_title = ?, private_error_invalid = ?, private_error_expired = ?, qr_code_title = ?, qr_code_size = ?, qr_code_button = ?, qr_code_offline_title = ?, qr_code_offline_content1 = ?, qr_code_offline_content2 = ?, qr_code_online_title = ?, qr_code_online_content = ?");
		$st->execute(array($signup_maintenance_heading,$signup_maintenance_info,$marketing_group_title,$marketing_button,$marketing_no_group,$marketing_choose,$marketing_notice,$canspam_heading,$canspam_accept,$canspam_error,$signup_banned,$header_testimonials,$testi_visit,$testi_description,$testi_name,$testi_url,$testi_content,$testi_code,$testi_submit,$testi_na,$testi_title,$testi_success_title,$testi_success_message,$testi_error_title,$testi_error_name_missing,$testi_error_url_missing,$testi_error_missing,$menu_drop_delayed,$details_drop_6,$details_type_6,$comdetails_status_6,$tc_reaccept_title,$tc_reaccept_sub_title,$tc_reaccept_button,$tlinks_active,$tlinks_payout_structure,$tlinks_level,$tierText1,$tierText2,$tierText3,$tierTextflat,$edit_custom_button,$private_heading,$private_info,$private_required_heading,$private_code_title,$private_button,$private_error_title,$private_error_invalid,$private_error_expired,$qr_code_title,$qr_code_size,$qr_code_button,$qr_code_offline_title,$qr_code_offline_content1,$qr_code_offline_content2,$qr_code_online_title,$qr_code_online_content));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}

// Update new language.
$menu_coupon = html_output(utf8_encode('Códigos promocionales'));
$coupon_title = html_output(utf8_encode('Tus codigos promocionales disponibles'));
$coupon_desc = html_output(utf8_encode('Entrega estos códigos promocionales y ¡gana una comisión cada vez que alguien use tu código!'));
$coupon_head_1 = html_output(utf8_encode('Código promocional'));
$coupon_head_2 = html_output(utf8_encode('Descuento al cliente'));
$coupon_head_3 = html_output(utf8_encode('Tu cantidad de comisión'));
$coupon_sale_amt = html_output(utf8_encode('de cantidad vendida'));
$coupon_flat_rate = html_output(utf8_encode('tarifa plana'));
$coupon_default = html_output(utf8_encode('Nivel de pago por defecto'));
$cc_vanity_title = html_output(utf8_encode('Pide un cupón promocional personalizado'));
$cc_vanity_field = html_output(utf8_encode('Código promocional'));
$cc_vanity_button = html_output(utf8_encode('Pide un código promocional'));
$cc_vanity_error_missing = html_output(utf8_encode('<strong>¡Error!</strong> Por favor, introduce un código promocional.'));
$cc_vanity_error_exists = html_output(utf8_encode('<strong>¡Error!</strong> Ya has pedido este código. Esta pendiente de aprovación.'));
$cc_vanity_error = html_output(utf8_encode('<strong>¡Error!</strong> El código promocional no es válido. Por favor use sólo letras, números y guiones.'));
$cc_vanity_success = html_output(utf8_encode('<strong>¡Éxito!</strong> Tu cupón promocional personalizado ha sido solicitado.'));
$coupon_none = html_output(utf8_encode('Actualmente no hay cupones promocionales disponibles.'));
$pic_error_title = html_output(utf8_encode('Error en la subida de imágen'));
$pic_missing = html_output(utf8_encode('Por favor, elige un nombre de archivo.'));
$pic_invalid = html_output(utf8_encode('El tipo de imágen no esta permitido. Los tipos de imágenes permitidos son .gif, .jpg y .png.'));
$pic_error = html_output(utf8_encode('Error en la subida de imágen, por favor contacta con el administrador de afiliación.'));
$pic_success = html_output(utf8_encode('Tu imagen se ha subido satisfactoriamente.'));
$pic_title = html_output(utf8_encode('Sube tu imágen'));
$pic_info = html_output(utf8_encode('Subir tu imágen ayuda a personalizar nuestra experiencia contigo.'));
$pic_bullet_1 = html_output(utf8_encode('Las imágenes deben ser .jpg, .gif o .png.'));
$pic_bullet_2 = html_output(utf8_encode('Cualquier imágen inapropiada será descartada y tu cuenta suspendida.'));
$pic_bullet_3 = html_output(utf8_encode('Tu imágen no se mostrará al público. Sólo se adjuntará a tu cuenta para poder verla nosotros.'));
$pic_file = html_output(utf8_encode('Elige un archivo:'));
$pic_button = html_output(utf8_encode('Subir'));
$pic_current = html_output(utf8_encode('Mi imágen actual'));
$pic_remove = html_output(utf8_encode('Eliminar imágen'));
$progress_title = html_output(utf8_encode('Requisitos para el siguiente pago:'));
$progress_complete = html_output(utf8_encode('Completo.'));
$progress_none = html_output(utf8_encode('No tenemos un requisito de pago mínimo.'));
$progress_sentence_1 = html_output(utf8_encode('Has ganado'));
$progress_sentence_2 = html_output(utf8_encode('del'));
$progress_sentence_3 = html_output(utf8_encode('requisito.'));
$aff_lib_button = html_output(utf8_encode('<font style="font-size:16px; font-weight:bold;">Reclama tu acceso gratuito a </font><br>www.AffiliateLibrary.com'));
	try {
		//$db->query("update idevaff_language_spanish set menu_coupon = '$menu_coupon', coupon_title = '$coupon_title', coupon_desc = '$coupon_desc', coupon_head_1 = '$coupon_head_1', coupon_head_2 = '$coupon_head_2', coupon_head_3 = '$coupon_head_3', coupon_sale_amt = '$coupon_sale_amt', coupon_flat_rate = '$coupon_flat_rate', coupon_default = '$coupon_default', cc_vanity_title = '$cc_vanity_title', cc_vanity_field = '$cc_vanity_field', cc_vanity_button = '$cc_vanity_button', cc_vanity_error_missing = '$cc_vanity_error_missing', cc_vanity_error_exists = '$cc_vanity_error_exists', cc_vanity_error = '$cc_vanity_error', cc_vanity_success = '$cc_vanity_success', coupon_none = '$coupon_none', pic_error_title = '$pic_error_title', pic_missing = '$pic_missing', pic_invalid = '$pic_invalid', pic_error = '$pic_error', pic_success = '$pic_success', pic_title = '$pic_title', pic_info = '$pic_info', pic_bullet_1 = '$pic_bullet_1', pic_bullet_2 = '$pic_bullet_2', pic_bullet_3 = '$pic_bullet_3', pic_file = '$pic_file', pic_button = '$pic_button', pic_current = '$pic_current', pic_remove = '$pic_remove', progress_title = '$progress_title', progress_complete = '$progress_complete', progress_none = '$progress_none', progress_sentence_1 = '$progress_sentence_1', progress_sentence_2 = '$progress_sentence_2', progress_sentence_3 = '$progress_sentence_3', aff_lib_button = '$aff_lib_button'");
		$st = $db->prepare("update idevaff_language_german set menu_coupon = ?, coupon_title = ?, coupon_desc = ?, coupon_head_1 = ?, coupon_head_2 = ?, coupon_head_3 = ?, coupon_sale_amt = ?, coupon_flat_rate = ?, coupon_default = ?, cc_vanity_title = ?, cc_vanity_field = ?, cc_vanity_button = ?, cc_vanity_error_missing = ?, cc_vanity_error_exists = ?, cc_vanity_error = ?, cc_vanity_success = ?, coupon_none = ?, pic_error_title = ?, pic_missing = ?, pic_invalid = ?, pic_error = ?, pic_success = ?, pic_title = ?, pic_info = ?, pic_bullet_1 = ?, pic_bullet_2 = ?, pic_bullet_3 = ?, pic_file = ?, pic_button = ?, pic_current = ?, pic_remove = ?, progress_title = ?, progress_complete = ?, progress_none = ?, progress_sentence_1 = ?, progress_sentence_2 = ?, progress_sentence_3 = ?, aff_lib_button = ?");
		$st->execute(array($menu_coupon,$coupon_title,$coupon_desc,$coupon_head_1,$coupon_head_2,$coupon_head_3,$coupon_sale_amt,$coupon_flat_rate,$coupon_default,$cc_vanity_title,$cc_vanity_field,$cc_vanity_button,$cc_vanity_error_missing,$cc_vanity_error_exists,$cc_vanity_error,$cc_vanity_success,$coupon_none,$pic_error_title,$pic_missing,$pic_invalid,$pic_error,$pic_success,$pic_title,$pic_info,$pic_bullet_1,$pic_bullet_2,$pic_bullet_3,$pic_file,$pic_button,$pic_current,$pic_remove,$progress_title,$progress_complete,$progress_none,$progress_sentence_1,$progress_sentence_2,$progress_sentence_3,$aff_lib_button));
		} catch (Exception $ex) {
		$ret_ajax['errors'][] = $ex->getMessage();
	}
}


try {
	$db->query("update idevaff_config set version = '8.0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}
?>