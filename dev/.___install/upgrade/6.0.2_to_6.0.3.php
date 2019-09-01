<?PHP

// 6.0.3 Update
try {
    $db->query('ALTER TABLE `idevaff_integration` ADD COLUMN `option_1` blob NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_email_settings` ADD COLUMN `smtp_char_set` varchar(25) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_email_settings` ADD COLUMN `smtp_security` varchar(25) NOT NULL');

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_email_settings` CHANGE `smtp_pass` `smtp_pass` blob NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_language_english set footer_copyright = 'Copyright'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("ALTER TABLE `idevaff_iptracking` CHANGE `target_url` `target_url` VARCHAR(255) NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query('ALTER TABLE `idevaff_banners` ADD COLUMN `alt_tag` varchar(255) NOT NULL');
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


try {
    $db->query("update idevaff_config set version = '6.0.3'");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
$upgrade_version = '6.0.3';

?>