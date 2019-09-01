<?php

if (!defined("IDEV_FILE_AUTH")) {
    exit("redirect_page.php - Unauthorized Access");
}
$def_loc_override = $db->prepare("select indi_incoming from idevaff_affiliates where id = ?");
$def_loc_override->execute(array($id));
$def_loc_override = $def_loc_override->fetch();
if (!filter_var($def_loc_override["indi_incoming"], FILTER_VALIDATE_URL) === false) {
    $default_destination = $def_loc_override["indi_incoming"];
}
$custom_url = check_type("url");
if ($custom_url) {
    if (is_numeric($custom_url)) {
        $get_loc = $db->prepare("select url from idevaff_custom_links where id = ? and aff_id = ?");
        $get_loc->execute(array($custom_url, $id));
        $get_loc = $get_loc->fetch();
        $db_loc = $get_loc["url"];
        if ($db_loc) {
            $custom_move_location = $db_loc;
        } else {
            $custom_move_location = $default_destination;
        }
    }
    $redirect = $custom_move_location;
} else {
    if (isset($_REQUEST["offline_delivery"])) {
        $redirect = $offline_loc_send;
    } else {
        if ($page) {
            $getpage = $db->prepare("select location from idevaff_groups where id = ?");
            $getpage->execute(array($page));
            $getpage = $getpage->fetch();
            $sendvisitor = $getpage["location"];
            $redirect = $sendvisitor;
        }
    }
}
if (!$custom_url) {
    $getgeo = $db->prepare("select location from idevaff_geo_target where country = ?");
    $getgeo->execute(array($country_code));
    $getgeo = $getgeo->fetch();
    $sendgeo = $getgeo["location"];
    if ($sendgeo != "") {
        $redirect = $sendgeo;
    }
}
if (!isset($redirect) || $redirect == "" || $redirect == "http://") {
    $redirect = $default_destination;
}
if (isset($suspended_account)) {
    $get_suspension_page = $db->prepare("select id from idevaff_suspensions where affid = ? and alt_delivery = '1'");
    $get_suspension_page->execute(array($id));
    if ($get_suspension_page->rowCount() && $suspended_location != "" && $suspended_location != "http://") {
        $redirect = $suspended_location;
    }
}

?>