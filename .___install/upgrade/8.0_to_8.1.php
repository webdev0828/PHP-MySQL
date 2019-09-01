<?PHP

// ---------------------------------------------------------
// UPDATE FROM 8.0 TO 8.1
// ---------------------------------------------------------
// TABLE UPDATES
// ---------------------------------------------------------
try {
    $db->query("ALTER TABLE idevaff_config ADD `timezone` varchar(100) character set utf8 NULL DEFAULT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


$db->query("CREATE TABLE IF NOT EXISTS idevaff_video_cats (
  id int(255) NOT NULL,
  name varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

// ---------------------------------------------------------
// TABLE CHANGES
// ---------------------------------------------------------
try {
    $db->query("ALTER TABLE idevaff_video_settings CHANGE `stamp` `stamp` blob NOT NULL");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("ALTER TABLE idevaff_paylevels CHANGE `amt` `amt` decimal(10,3) NOT NULL default '0.000'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


// ---------------------------------------------------------
// DATA UPDATES
// ---------------------------------------------------------

if (date_default_timezone_get()) {
    $thenewtz = date_default_timezone_get();
} else {
    $thenewtz = "America/New_York";
}

try {
	$st = $db->prepare("update idevaff_config set timezone = ?");
	$st->execute(array($thenewtz));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("update idevaff_config set version = '8.1'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}