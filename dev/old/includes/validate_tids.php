<?php

if (!defined("IDEV_FILE_AUTH")) {
    exit("validate_tids.php - Unauthorized Access");
}
$tid1 = check_type("tid1");
$tid2 = check_type("tid2");
$tid3 = check_type("tid3");
$tid4 = check_type("tid4");
$tid1 = strtolower($tid1);
$tid2 = strtolower($tid2);
$tid3 = strtolower($tid3);
$tid4 = strtolower($tid4);
if ($tid1 && !valid_tid($tid1)) {
    $tid1 = NULL;
}
if ($tid2 && !valid_tid($tid2)) {
    $tid2 = NULL;
}
if ($tid3 && !valid_tid($tid3)) {
    $tid3 = NULL;
}
if ($tid4 && !valid_tid($tid4)) {
    $tid4 = NULL;
}
function valid_tid($credential)
{
    $rtn_value = false;
    if (get_magic_quotes_gpc()) {
        $credential = stripslashes($credential);
    }
    if (1 <= strlen($credential) && strlen($credential) <= 64 && !preg_match("/[^a-z0-9_-]/i", $credential)) {
        $rtn_value = true;
    }
    return $rtn_value;
}

?>