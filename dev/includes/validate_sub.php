<?php

if (!defined("IDEV_FILE_AUTH")) {
    exit("validate_sub.php - Unauthorized Access");
}
$sub_id = check_type("sub_id");
if ($sub_id && !valid_sub($sub_id)) {
    $sub_id = NULL;
}
function valid_sub($credential)
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