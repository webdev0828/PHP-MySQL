<?PHP

// ---------------------------------------------------------
// UPDATE FROM 9.1 TO 9.2
// ---------------------------------------------------------
	$version = '9.2';
// ---------------------------------------------------------

// ---------------------------------------------------------
// TABLE DROPS
// ---------------------------------------------------------
	// NONE
	$db->query("DROP TABLE IF EXISTS idevaff_sessions");
	$db->query("DROP TABLE IF EXISTS idevaff_sessions_aff");
	$db->query("DROP TABLE IF EXISTS idevaff_admin_lockout");
	
// ---------------------------------------------------------
// TABLE ADDS
// ---------------------------------------------------------
$db->query("CREATE TABLE IF NOT EXISTS idevaff_ga (
  footer text NULL,
  signup text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_ip2location_ipv6 (
  ip_from decimal(39,0) UNSIGNED DEFAULT NULL,
  ip_to decimal(39,0) UNSIGNED DEFAULT NULL,
  country_code char(2) collate utf8_bin default NULL,
  country_name varchar(64) collate utf8_bin default NULL,
  KEY idx_ip_from (ip_from),
  KEY idx_ip_to (ip_to),
  KEY idx_ip_from_to (ip_from,ip_to),
  KEY country_code (country_code)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_paylevels_sliding (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  type int UNSIGNED NOT NULL DEFAULT '0',
  paylevel int UNSIGNED NOT NULL DEFAULT '0',
  slidinglevel int UNSIGNED NOT NULL DEFAULT '0',
  min_amount decimal(10,3) NOT NULL DEFAULT '0.000',
  max_amount decimal(10,3) NOT NULL DEFAULT '0.000',
  amt decimal(10,3) NOT NULL DEFAULT '0.000',
  amt_alt decimal(10,3) NOT NULL DEFAULT '0.000',
  UNIQUE KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_privacy (
  privacy_enabled int UNSIGNED NOT NULL DEFAULT '0',
  privacy_signup int UNSIGNED NOT NULL DEFAULT '0',
  privacy_required int UNSIGNED NOT NULL DEFAULT '0',
  policy text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_aff_lockout (
  id int UNSIGNED NOT NULL auto_increment,
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  attempts tinyint UNSIGNED NOT NULL DEFAULT '0',
  code bigint UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

// DROPPED ABOVE
// RECREATING HERE TO GET UNIQUE KEY ADDED
// UNIQUE KEY ADDED BELOW
$db->query("CREATE TABLE IF NOT EXISTS idevaff_admin_lockout (
  id int UNSIGNED NOT NULL auto_increment,
  ip varchar(64) character set utf8 NULL DEFAULT NULL,
  attempts tinyint UNSIGNED NOT NULL DEFAULT '0',
  code bigint UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sessions (
  id char(128) character set utf8 NULL DEFAULT NULL,
  set_time char(10) character set utf8 NULL DEFAULT NULL,
  data text NULL,
  session_key char(128) character set utf8 NULL DEFAULT NULL,
  UNIQUE KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

$db->query("CREATE TABLE IF NOT EXISTS idevaff_sessions_aff (
  id char(128) character set utf8 NULL DEFAULT NULL,
  set_time char(10) character set utf8 NULL DEFAULT NULL,
  data text NULL,
  session_key char(128) character set utf8 NULL DEFAULT NULL,
  UNIQUE KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");


// ---------------------------------------------------------
// COLUMN ADDS
// ---------------------------------------------------------

try {
$db->query("ALTER TABLE idevaff_announcements ADD pinterest_message varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
$db->query("ALTER TABLE idevaff_announcements ADD pinterest_picture varchar(255) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
$db->query("ALTER TABLE idevaff_announcements ADD pinterest_local int UNSIGNED NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_affiliates ADD last_logged int UNSIGNED NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
$db->query("ALTER TABLE idevaff_deleted_accounts ADD last_logged int UNSIGNED NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_config 
	ADD force_ssl tinyint UNSIGNED NOT NULL default '0',
	ADD recruitment_bonus decimal(20,2) NOT NULL default '0',
	ADD sliding tinyint UNSIGNED NOT NULL default '0',
	ADD idev_date_format tinyint UNSIGNED NOT NULL default '0',
	ADD time_seconds tinyint UNSIGNED NOT NULL default '0',
	ADD idev_time_format tinyint UNSIGNED NOT NULL default '0',
	ADD gdpr_hide_ip tinyint UNSIGNED NOT NULL default '0'
	");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_sales 
	ADD sliding_scale int UNSIGNED NOT NULL default '0',
	ADD sliding_alternate int UNSIGNED NOT NULL default '0',
	ADD per_product int UNSIGNED NOT NULL default '0'
	");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_deleted_sales 
	ADD sliding_scale int UNSIGNED NOT NULL default '0',
	ADD sliding_alternate int UNSIGNED NOT NULL default '0',
	ADD per_product int UNSIGNED NOT NULL default '0'
	");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
	$db->query("ALTER TABLE idevaff_notes ADD stamp bigint UNSIGNED NOT NULL default '0'");
} catch (Exception $ex) {
	$ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_countries ADD id int UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id)");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_countries ADD status int UNSIGNED NOT NULL default '1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_suspensions ADD susp_allow_comm int UNSIGNED NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_faq ADD sort int NOT NULL default '0'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
$db->query("ALTER TABLE idevaff_admin ADD api_key varchar(64) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

// ---------------------------------------------------------
// DATA UPDATES
// ---------------------------------------------------------

$db->query("update idevaff_config set idev_date_format = '3', idev_time_format = '12'");

$db->query("insert into idevaff_privacy (privacy_enabled, privacy_signup, privacy_required, policy) VALUES (0, 0, 0, '<strong>Section 1</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<strong>Section 2</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<strong>Section 3</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<strong>Section 4</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<strong>Section 5</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n<strong>Section 6</strong>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n')");

$db->query("insert into idevaff_ga (footer, signup) VALUES (null,null)");

// ---------------------------------------------------------
// Mailing List Adds
// ---------------------------------------------------------

// ConvertKit
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='convertkit'";
$st = $db->prepare($query);
$st->execute();
if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
		'api_key' => '',
        'api_secret' => ''
    );
    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('convertkit','$data')";
    $db->query($query);
}

// InfusionSoft
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='infusionsoft'";
$st = $db->prepare($query);
$st->execute();
if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
		'api_key' => '',
        'api_secret' => '',
        'access_token' => ''
    );
    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('infusionsoft','$data')";
    $db->query($query);
}

// SendGrid
$query = "SELECT * FROM idevaff_newsletter_addons WHERE meta_key='sendgrid'";
$st = $db->prepare($query);
$st->execute();
if ( ! $st->rowCount() ) {
    $data = array (
        'enabled' => 0,
		'api_key' => ''
    );
    $data = serialize($data);
    $query = "insert into idevaff_newsletter_addons (meta_key,meta_value) values('sendgrid','$data')";
    $db->query($query);
}

// ---------------------------------------------------------
// FIELD CHANGES
// ---------------------------------------------------------
	// NONE

// ---------------------------------------------------------
// FIELD DROPS
// ---------------------------------------------------------
	// NONE

// ---------------------------------------------------------
// UPDATE FOR NEW IP LOCATIONS
// ---------------------------------------------------------

include("ip_table_ipv4.php");
include("ip_table_ipv6.php");

// ---------------------------------------------------------
// ADD SLIDING SCALE LEVELS
// ---------------------------------------------------------

// Percentage
$getdata = $db->query("select level from idevaff_paylevels where type = 1");
if ($getdata->rowCount()) {
    while ($qry = $getdata->fetch()) {
        $level = $qry['level'];
            try {
				$query = $db->prepare("insert into idevaff_paylevels_sliding (type, paylevel, slidinglevel, min_amount, max_amount, amt, amt_alt) VALUES (1, ?, 1, 0, 0, 0, 0)");
				$query->execute(array($level));
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
} }

// Flat Rate
$getdata = $db->query("select level from idevaff_paylevels where type = 2");
if ($getdata->rowCount()) {
    while ($qry = $getdata->fetch()) {
        $level = $qry['level'];
            try {
				$query = $db->prepare("insert into idevaff_paylevels_sliding (type, paylevel, slidinglevel, min_amount, max_amount, amt, amt_alt) VALUES (2, ?, 1, 0, 0, 0, 0)");
				$query->execute(array($level));
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
} }

// ---------------------------------------------------------
// CONVERT NOTES DATE TO UNIX TIME STAMP
// ---------------------------------------------------------
	
$get_notes_count = $db->query("select * from idevaff_notes");
if ($get_notes_count->rowCount()) {
	while ($qry = $get_notes_count->fetch()) {
		$note_stamp = $qry['stamp'];
		$note_id = $qry['id'];
		$note_date = $qry['note_date'];
		$dt = DateTime::createFromFormat('m-d-Y', $note_date);
		$unix_date = $dt->format('U');
		$new_date = date('m-d-Y', $unix_date);
		// echo $note_date . " - " . $unix_date . " - " . $new_date . "<br />";
		if ($note_stamp == 0) {
			// echo "writing<br />";
			$st = $db->prepare("update idevaff_notes set stamp = ? where id = ?");
			$st->execute(array($unix_date,$note_id));
		}
	}
	// remove note_date column?
}

// ---------------------------------------------------------
// LANGUAGE PACK UPDATES
// ---------------------------------------------------------

include_once ("upgrade/language_updates/".$version."/updates.php");

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