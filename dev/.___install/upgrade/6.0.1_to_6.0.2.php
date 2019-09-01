<?PHP

// 6.0.2 Update
try {
    $db->query("ALTER TABLE `idevaff_config` CHANGE `cur_sym` `cur_sym` VARCHAR( 10 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}
try {
    $db->query("update idevaff_config set cur_sym = '$'");

} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}

try {
    $db->query("CREATE INDEX `ip` ON idevaff_iptracking (ip)");
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}



$upgrade_version = '6.0.2';
try {
    $db_update = $db->prepare("update idevaff_config set version = ?");
    $db_update->execute(array($upgrade_version));
} catch (Exception $ex) {
    $ret_ajax['errors'][] = $ex->getMessage();
}


?>