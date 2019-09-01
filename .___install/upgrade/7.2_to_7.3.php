<?PHP
$q=$db->query("select version from idevaff_config");
$config_patch=$q->fetch();
$check_version=$config_patch['version'];
if ($check_version == '7.2') {
    // ---------------------------------------------------------
    // UPDATE TO 7.3
    // ---------------------------------------------------------
    // Update idevaff_config table
    // ---------------------------------------------------------
    try {
        $db->query("ALTER TABLE idevaff_config ADD `qr_codes` int(1) NOT NULL");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
    try {
        $db->query("update idevaff_config set qr_codes = '0'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // Update language packs
    // ---------------------------------------------------------
    $get_language_tables = $db->query("select table_name from idevaff_language_packs");
    if ($get_language_tables->rowCount()) {
        while ($qry = $get_language_tables->fetch()) {
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_title` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_size` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_button` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_offline_title` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_offline_content1` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_offline_content2` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_online_title` mediumtext NOT NULL");

            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("ALTER TABLE idevaff_language_" . $qry['table_name'] . " ADD `qr_code_online_content` mediumtext NOT NULL");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
            try {
                $db->query("update idevaff_language_" . $qry['table_name'] . " set qr_code_title = 'QR Codes', qr_code_size = 'QR Code Size', qr_code_button = 'Display QR Code', qr_code_offline_title = 'Offline Marketing', qr_code_offline_content1 = 'Add this QR code to your marketing brochures, flyers, business cards, etc.', qr_code_offline_content2 = '- Right click the image and &lt;strong&gt;save-as&lt;/strong&gt; to your computer.', qr_code_online_title = 'Online Marketing', qr_code_online_content = 'Add this QR code to your website, social media, blogs, etc.'");
            } catch (Exception $ex) {
                $ret_ajax['errors'][] = $ex->getMessage();
            }
        }
    }

    // ---------------------------------------------------------
    // ADD idevaff_ads_default table
    // ---------------------------------------------------------
    $db->query("CREATE TABLE IF NOT EXISTS idevaff_ads_default (
      ad_target varchar(10) NOT NULL,
      BoxWidth varchar(10) NOT NULL,
      OutlineColor varchar(10) NOT NULL,
      TitleTextColor varchar(10) NOT NULL,
      TitleTextBackgroundColor varchar(10) NOT NULL,
      LinkColor varchar(10) NOT NULL,
      TextColor varchar(10) NOT NULL,
      TextBackgroundColor varchar(10) NOT NULL,
      title varchar(64) NOT NULL,
      content text NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");

    try {
        $db->query("INSERT INTO idevaff_ads_default (ad_target, BoxWidth, OutlineColor, TitleTextColor, TitleTextBackgroundColor, LinkColor, TextColor, TextBackgroundColor, title, content) VALUES ('_blank', '275', 'CCCCCC', '333', 'EFEFEF', '0033CC', '000000', 'FFFFFF', 'Sample Text Ad', 'Your advertising content will go here. This is a great way to promote specific products, current specials or limited time offers.\r\n\r\nSpecial Price: $99.99 USD')");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }

    // ---------------------------------------------------------
    // Clear cache folder we're adding bootstrap template
    // ---------------------------------------------------------

    //$files = glob($path . "/cache/*");
    //foreach($files as $file){
    //if(is_file($file))
    //unlink($file); }
    try {
        $db->query("update idevaff_config set version = '7.3'");
    } catch (Exception $ex) {
        $ret_ajax['errors'][] = $ex->getMessage();
    }
}
?>