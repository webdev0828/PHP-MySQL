<?PHP
$q = $db->query("select version from idevaff_config");

if ( $q->rowCount() ) {
    $config_patch = $q->fetch();
    $check_version = $config_patch['version'];

    if ($check_version == '7.0') {
        // ---------------------------------------------------------
        // UPDATE TO 7.1
        // ---------------------------------------------------------
        $db->query("update idevaff_config set version = '7.1'");
    }
}
?>