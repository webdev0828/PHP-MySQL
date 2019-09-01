<?php

$control_panel_session = true;
unset($_SESSION[$install_directory_name . "_idev_LoggedID"]);
include_once "includes/control_panel.php";
$temp_fields = "private_heading,private_info,private_required_heading,private_code_title,private_button,\r\nprivate_error_title,private_error_invalid,private_error_expired";
try {
    $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo "<strong>Error:</strong><br>File: " . $ex->getFile() . "<br><strong>Line:</strong> " . $ex->getLine() . "<br><strong>Message:</strong> " . $ex->getMessage();
    exit;
}
$private_heading = html_language_output($getlanguage["private_heading"]);
$private_info = html_language_output($getlanguage["private_info"]);
$private_required_heading = html_language_output($getlanguage["private_required_heading"]);
$private_code_title = html_language_output($getlanguage["private_code_title"]);
$private_button = html_language_output($getlanguage["private_button"]);
$private_error_title = html_language_output($getlanguage["private_error_title"]);
$private_error_invalid = html_language_output($getlanguage["private_error_invalid"]);
$private_error_expired = html_language_output($getlanguage["private_error_expired"]);
if (isset($_POST["signup_code"])) {
    $token_affiliate_private = "";
    if (isset($_POST["token_affiliate_private"]) && $_POST["token_affiliate_private"] != "") {
        $token_affiliate_private = html_output($_POST["token_affiliate_private"], ENT_QUOTES, "UTF-8");
    }
    $token_db = "";
    $token_db = $db->query("select affiliate_private from idevaff_tokens");
    $token_db_results = $token_db->fetch();
    $token_db = $token_db_results["affiliate_private"];
    $check_code = $db->prepare("select * from idevaff_private where code = ?");
    $check_code->execute(array($_POST["signup_code"]));
    if ($check_code->rowCount()) {
        $time_now = time();
        $qry = $check_code->fetch();
        $signup_id = $qry["id"];
        $signup_type = $qry["type"];
        $signup_expires = $qry["expires"];
        if ($signup_type == "1") {
            if ($time_now < $signup_expires) {
                $_SESSION["idev_private"] = "true";
                header("Location: /signup");
            } else {
                if ($signup_expires < $time_now) {
                    $smarty->assign("display_signup_errors", "1");
                    $smarty->assign("error_title", $private_error_title);
                    $smarty->assign("error_list", $private_error_expired);
                }
            }
        } else {
            if ($signup_expires == "0") {
                $_SESSION["idev_private"] = "true";
                header("Location: /signup");
            }
        }
    } else {
        $smarty->assign("display_signup_errors", "1");
        $smarty->assign("error_title", $private_error_title);
        $smarty->assign("error_list", $private_error_invalid);
    }
}
$smarty->assign("private_heading", $private_heading);
$smarty->assign("private_info", $private_info);
$smarty->assign("private_required_heading", $private_required_heading);
$smarty->assign("private_code_title", $private_code_title);
$smarty->assign("private_button", $private_button);
include_once "includes/tokens.php";
$smarty->display("private.tpl");

?>