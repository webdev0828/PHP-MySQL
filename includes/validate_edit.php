<?php

$temp_fields = "error_title,missing_fname,missing_lname,missing_company,missing_checks,missing_website,missing_tax,missing_phone,missing_fax,missing_email,invalid_email,missing_address,missing_city,missing_state,missing_zip,missing_phone";
try {
    $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo "<strong>Error:</strong><br>File: " . $ex->getFile() . "<br><strong>Line:</strong> " . $ex->getLine() . "<br><strong>Message:</strong> " . $ex->getMessage();
    exit;
}
$error_title = html_language_output($getlanguage["error_title"]);
$missing_fname = html_language_output($getlanguage["missing_fname"]);
$missing_lname = html_language_output($getlanguage["missing_lname"]);
$missing_company = html_language_output($getlanguage["missing_company"]);
$missing_checks = html_language_output($getlanguage["missing_checks"]);
$missing_website = html_language_output($getlanguage["missing_website"]);
$missing_tax = html_language_output($getlanguage["missing_tax"]);
$missing_phone = html_language_output($getlanguage["missing_phone"]);
$missing_fax = html_language_output($getlanguage["missing_fax"]);
$missing_email = html_language_output($getlanguage["missing_email"]);
$invalid_email = html_language_output($getlanguage["invalid_email"]);
$missing_address = html_language_output($getlanguage["missing_address"]);
$missing_city = html_language_output($getlanguage["missing_city"]);
$missing_state = html_language_output($getlanguage["missing_state"]);
$missing_zip = html_language_output($getlanguage["missing_zip"]);
$missing_phone = html_language_output($getlanguage["missing_phone"]);
if (!defined("IDEV_FILE_AUTH")) {
    exit("validate_edit.php - Unauthorized Access");
}
$error_list = "";
$fail = 0;
if ($f_er) {
    if (!$_POST["email"]) {
        $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_email . "<BR />\n";
    }
    if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $invalid_email . "<BR />\n";
    }
}
if ($f_cor && !$_POST["company"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_company . "<BR />\n";
}
if ($f_chr && !$_POST["payable"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_checks . "<BR />\n";
}
if ($f_wr && (!$_POST["url"] || $_POST["url"] == "http://")) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_website . "<BR />\n";
}
if ($f_tr && !$_POST["tax_id_ssn"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_tax . "<BR />\n";
}
if ($f_fnamer == 1 && !$_POST["f_name"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_fname . "<BR />\n";
}
if ($f_lnamer == 1 && !$_POST["l_name"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_lname . "<BR />\n";
}
if ($f_phoner == 1 && !$_POST["phone"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_phone . "<BR />\n";
}
if ($f_faxr == 1 && !$_POST["fax"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_fax . "<br />\n";
}
if ($f_add1r == 1 && !$_POST["address_one"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_address . "<BR />\n";
}
if ($f_add2r == 1 && !$_POST["address_two"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_address . "<BR />\n";
}
if ($f_cityr == 1 && !$_POST["city"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_city . "<BR />\n";
}
if ($f_stater == 1 && !$_POST["state"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_state . "<BR />\n";
}
if ($f_zipr == 1 && !$_POST["zip"]) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_zip . "<BR />\n";
}

?>