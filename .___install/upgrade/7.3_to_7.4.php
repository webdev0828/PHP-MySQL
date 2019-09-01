<?PHP
$q = $db->query("select version from idevaff_config");
$config_patch = $q->fetch();
$check_version=$config_patch['version'];
if ($check_version == '7.3') {
// ---------------------------------------------------------
// UPDATE TO 7.4
// ---------------------------------------------------------
// Create new theme settings
// ---------------------------------------------------------
    try {
        $db->query("CREATE TABLE IF NOT EXISTS idevaff_cp_settings (
		cp_theme varchar(255) NOT NULL,
		background varchar(10) NOT NULL,
		body_text varchar(10) NOT NULL,
		heading_text varchar(10) NOT NULL,
		menu_testi_text varchar(10) NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getFile() . ' : ' . $ex->getLine() . " : " .$ex->getMessage();
    }

    try {
        $db->query("INSERT INTO idevaff_cp_settings (cp_theme, background, body_text, heading_text, menu_testi_text) VALUES ('bootstrap_v2_fixed', '#FFFFFF', '#000000', '#000000', '#000000')");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getFile() . ' : ' . $ex->getLine() . " : " .$ex->getMessage();
    }

    try {
        $db->query("update idevaff_config set version = '7.4'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getFile() . ' : ' . $ex->getLine() . " : " .$ex->getMessage();
    }

}

?>