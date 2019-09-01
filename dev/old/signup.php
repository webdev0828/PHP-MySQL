<?php

$control_panel_session = true;
include_once "includes/control_panel.php";
unset($_SESSION[$install_directory_name . "_idev_LoggedID"]);
if (!isset($complete)) {
    $complete = false;
}
if (!isset($input_error)) {
    $input_error = false;
}
if ($private_signup_enabled == "1" && !isset($_SESSION["idev_private"])) {
    header("Location: /private");
    exit;
}
if (isset($_REQUEST["ref"])) {
    $referring_affiliate_id = $_REQUEST["ref"];
    if (!is_numeric($referring_affiliate_id)) {
        $convert_l2n = $db->prepare("select id from idevaff_affiliates where username = ?");
        $convert_l2n->execute(array($referring_affiliate_id));
        $convert_l2n = $convert_l2n->fetch();
        $referring_affiliate_id = $convert_l2n["id"];
    }
    $checkref = $db->prepare("select ta, ti from idevaff_tlog where ta = ? and ti = ?");
    $checkref->execute(array($referring_affiliate_id, $ip_addr));
    if ($checkref->rowCount() < 1) {
        $statement = $db->prepare("insert into idevaff_tlog (ta, ti) values (:referring_affiliate_id, :ip_addr)");
        $statement->execute(array("referring_affiliate_id" => $referring_affiliate_id, "ip_addr" => $ip_addr));
    }
}
if (isset($_POST["submit1"])) {
    include "includes/validate.php";
}
if ($complete) {
    $smarty->assign("signup_complete", 1);
    $temp_fields = "signup_success_email_comment,signup_success_login_link,signup_page_success";
    try {
        $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo "<strong>Error:</strong><br>File: " . $ex->getFile() . "<br><strong>Line:</strong> " . $ex->getLine() . "<br><strong>Message:</strong> " . $ex->getMessage();
        exit;
    }
    $signup_success_email_comment = html_language_output($getlanguage["signup_success_email_comment"]);
    $signup_success_login_link = html_language_output($getlanguage["signup_success_login_link"]);
    $signup_page_success = html_language_output($getlanguage["signup_page_success"]);
    $smarty->assign("signup_page_success", $signup_page_success);
    $smarty->assign("signup_success_email_comment", $signup_success_email_comment);
    $smarty->assign("signup_success_login_link", $signup_success_login_link);
}
$temp_fields = "signup_left_column_title,signup_left_column_text,signup_login_title,signup_login_username,signup_login_password,signup_login_minmax_chars,signup_login_password_again,signup_login_must_match,privacy_signup_title,privacy_signup_agree";
try {
    $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit;
}
$signup_left_column_title = html_language_output($getlanguage["signup_left_column_title"]);
$signup_left_column_text = html_language_output($getlanguage["signup_left_column_text"]);
$signup_login_title = html_language_output($getlanguage["signup_login_title"]);
$signup_login_username = html_language_output($getlanguage["signup_login_username"]);
$signup_login_password = html_language_output($getlanguage["signup_login_password"]);
$signup_login_minmax_chars = html_language_output($getlanguage["signup_login_minmax_chars"]);
$signup_login_minmax_chars = str_replace("characters_allowed", $characters_allowed, $signup_login_minmax_chars);
$signup_login_password_again = html_language_output($getlanguage["signup_login_password_again"]);
$signup_login_must_match = html_language_output($getlanguage["signup_login_must_match"]);
$privacy_signup_title = html_language_output($getlanguage["privacy_signup_title"]);
$privacy_signup_agree = html_language_output($getlanguage["privacy_signup_agree"]);
$temp_fields = "signup_personal_title,signup_personal_fname,signup_personal_lname,\r\nsignup_personal_addr1,signup_personal_addr2,signup_personal_city,signup_personal_state,signup_personal_phone,signup_personal_fax";
try {
    $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit;
}
$signup_personal_title = html_language_output($getlanguage["signup_personal_title"]);
$signup_personal_fname = html_language_output($getlanguage["signup_personal_fname"]);
$signup_personal_lname = html_language_output($getlanguage["signup_personal_lname"]);
$signup_personal_addr1 = html_language_output($getlanguage["signup_personal_addr1"]);
$signup_personal_addr2 = html_language_output($getlanguage["signup_personal_addr2"]);
$signup_personal_city = html_language_output($getlanguage["signup_personal_city"]);
$signup_personal_state = html_language_output($getlanguage["signup_personal_state"]);
$signup_personal_phone = html_language_output($getlanguage["signup_personal_phone"]);
$signup_personal_fax = html_language_output($getlanguage["signup_personal_fax"]);
$temp_fields = "signup_personal_zip,signup_personal_country,signup_terms_title,\r\nsignup_terms_agree,canspam_heading,canspam_accept,signup_security_title,signup_security_code,signup_page_button";
try {
    $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit;
}
$signup_personal_zip = html_language_output($getlanguage["signup_personal_zip"]);
$signup_personal_country = html_language_output($getlanguage["signup_personal_country"]);
$signup_terms_title = html_language_output($getlanguage["signup_terms_title"]);
$signup_terms_agree = html_language_output($getlanguage["signup_terms_agree"]);
$canspam_heading = html_language_output($getlanguage["canspam_heading"]);
$canspam_accept = html_language_output($getlanguage["canspam_accept"]);
$signup_security_title = html_language_output($getlanguage["signup_security_title"]);
$signup_security_code = html_language_output($getlanguage["signup_security_code"]);
$signup_page_button = html_language_output($getlanguage["signup_page_button"]);
$temp_fields = "signup_commission_style_PPS,signup_commission_style_PPC,signup_security_info";
try {
    $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit;
}
$signup_commission_style_PPS = html_language_output($getlanguage["signup_commission_style_PPS"]);
$signup_commission_style_PPC = html_language_output($getlanguage["signup_commission_style_PPC"]);
$signup_security_info = html_language_output($getlanguage["signup_security_info"]);
$smarty->assign("signup_left_column_title", $signup_left_column_title);
$smarty->assign("signup_left_column_text", $signup_left_column_text);
$username = "";
if (isset($_POST["username"]) && $_POST["username"] != "") {
    $username = html_output($_POST["username"], ENT_QUOTES, "UTF-8");
}
$smarty->assign("postuser", $username);
$password = "";
if (isset($_POST["password"]) && $_POST["password"] != "") {
    $password = html_output($_POST["password"], ENT_QUOTES, "UTF-8");
}
$smarty->assign("postpass", $password);
$password_c = "";
if (isset($_POST["password_c"]) && $_POST["password_c"] != "") {
    $password_c = html_output($_POST["password_c"], ENT_QUOTES, "UTF-8");
}
$smarty->assign("postpasc", $password_c);
$smarty->assign("signup_login_title", $signup_login_title);
$smarty->assign("signup_login_username", $signup_login_username);
$smarty->assign("signup_login_password", $signup_login_password);
$smarty->assign("signup_login_password_again", $signup_login_password_again);
$signup_login_minmax_chars = preg_replace("/user_min_chars/", $user_min, $signup_login_minmax_chars);
$signup_login_minmax_chars = preg_replace("/pass_min_chars/", $pass_min, $signup_login_minmax_chars);
$smarty->assign("signup_login_minmax_chars", $signup_login_minmax_chars);
$smarty->assign("signup_login_must_match", $signup_login_must_match);
if ($input_error) {
    $smarty->assign("display_signup_errors", 1);
    $smarty->assign("error_title", $error_title);
    $smarty->assign("error_list", $input_error);
}
if ($f_es == 1 || $f_cos == 1 || $f_chs == 1 || $f_ws == 1 || $f_ts == 1) {
    $smarty->assign("signup_standard_title", $signup_standard_title);
    $smarty->assign("optionals_used", 1);
}
if ($f_es == 1) {
    $email = "";
    if (isset($_POST["email"]) && $_POST["email"] != "") {
        $email = html_output($_POST["email"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postemail", $email);
    if ($f_er == 1) {
        $smarty->assign("required_notice_email", 1);
    }
    $smarty->assign("signup_standard_email", $signup_standard_email);
    $smarty->assign("row_email", 1);
}
if ($f_cos == 1) {
    $company = "";
    if (isset($_POST["company"]) && $_POST["company"] != "") {
        $company = html_output($_POST["company"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postcompany", $company);
    if ($f_cor == 1) {
        $smarty->assign("required_notice_company", 1);
    }
    $smarty->assign("signup_standard_company", $signup_standard_company);
    $smarty->assign("row_company", 1);
}
if ($f_chs == 1) {
    $payable = "";
    if (isset($_POST["payable"]) && $_POST["payable"] != "") {
        $payable = html_output($_POST["payable"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postchecks", $payable);
    if ($f_chr == 1) {
        $smarty->assign("required_notice_checkspayable", 1);
    }
    $smarty->assign("signup_standard_checkspayable", $signup_standard_checkspayable);
    $smarty->assign("row_checks", 1);
}
if ($f_ws == 1) {
    $url = "http://";
    if (isset($_POST["url"]) && $_POST["url"] != "") {
        $url = html_output($_POST["url"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postwebsite", $url);
    if ($f_wr == 1) {
        $smarty->assign("required_notice_weburl", 1);
    }
    $smarty->assign("signup_standard_weburl", $signup_standard_weburl);
    $smarty->assign("row_website", 1);
}
if ($f_ts == 1) {
    $tax_id_ssn = "";
    if (isset($_POST["tax_id_ssn"]) && $_POST["tax_id_ssn"] != "") {
        $tax_id_ssn = html_output($_POST["tax_id_ssn"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("posttax", $tax_id_ssn);
    if ($f_tr == 1) {
        $smarty->assign("required_notice_taxinfo", 1);
    }
    $smarty->assign("signup_standard_taxinfo", $signup_standard_taxinfo);
    $smarty->assign("row_taxinfo", 1);
}
if ($f_fnames == 1 || $f_lnames == 1 || $f_phones == 1 || $f_faxs == 1 || $f_add1s == 1 || $f_add2s == 1 || $f_citys == 1 || $f_states == 1 || $f_zips == 1 || $f_countrys == 1) {
    $smarty->assign("signup_personal_title", $signup_personal_title);
    $smarty->assign("standards_used", 1);
}
if ($f_fnames == 1) {
    $f_name = "";
    if (isset($_POST["f_name"]) && $_POST["f_name"] != "") {
        $f_name = html_output($_POST["f_name"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postfname", $f_name);
    if ($f_fnamer == 1) {
        $smarty->assign("required_notice_fname", 1);
    }
    $smarty->assign("signup_personal_fname", $signup_personal_fname);
    $smarty->assign("row_fname", 1);
}
if ($f_lnames == 1) {
    $l_name = "";
    if (isset($_POST["l_name"]) && $_POST["l_name"] != "") {
        $l_name = html_output($_POST["l_name"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postlname", $l_name);
    if ($f_lnamer == 1) {
        $smarty->assign("required_notice_lname", 1);
    }
    $smarty->assign("signup_personal_lname", $signup_personal_lname);
    $smarty->assign("row_lname", 1);
}
if ($f_phones == 1) {
    $phone = "";
    if (isset($_POST["phone"]) && $_POST["phone"] != "") {
        $phone = html_output($_POST["phone"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postphone", $phone);
    if ($f_phoner == 1) {
        $smarty->assign("required_notice_phone", 1);
    }
    $smarty->assign("signup_personal_phone", $signup_personal_phone);
    $smarty->assign("row_phone", 1);
}
if ($f_faxs == 1) {
    $fax = "";
    if (isset($_POST["fax"]) && $_POST["fax"] != "") {
        $fax = html_output($_POST["fax"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postfaxnm", $fax);
    if ($f_faxr == 1) {
        $smarty->assign("required_notice_fax", 1);
    }
    $smarty->assign("signup_personal_fax", $signup_personal_fax);
    $smarty->assign("row_fax", 1);
}
if ($f_add1s == 1) {
    $address_one = "";
    if (isset($_POST["address_one"]) && $_POST["address_one"] != "") {
        $address_one = html_output($_POST["address_one"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postaddr1", $address_one);
    if ($f_add1r == 1) {
        $smarty->assign("required_notice_ad1", 1);
    }
    $smarty->assign("signup_personal_addr1", $signup_personal_addr1);
    $smarty->assign("row_addr1", 1);
}
if ($f_add2s == 1) {
    $address_two = "";
    if (isset($_POST["address_two"]) && $_POST["address_two"] != "") {
        $address_two = html_output($_POST["address_two"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postaddr2", $address_two);
    if ($f_add2r == 1) {
        $smarty->assign("required_notice_ad2", 1);
    }
    $smarty->assign("signup_personal_addr2", $signup_personal_addr2);
    $smarty->assign("row_addr2", 1);
}
if ($f_citys == 1) {
    $postcity = "";
    if (isset($_POST["city"]) && $_POST["city"] != "") {
        $postcity = html_output($_POST["city"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postcity", $postcity);
    if ($f_cityr == 1) {
        $smarty->assign("required_notice_city", 1);
    }
    $smarty->assign("signup_personal_city", $signup_personal_city);
    $smarty->assign("row_city", 1);
}
if ($f_states == 1) {
    $poststate = "";
    if (isset($_POST["state"]) && $_POST["state"] != "") {
        $poststate = html_output($_POST["state"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("poststate", $poststate);
    if ($f_stater == 1) {
        $smarty->assign("required_notice_state", 1);
    }
    $smarty->assign("signup_personal_state", $signup_personal_state);
    $smarty->assign("row_state", 1);
}
if ($f_zips == 1) {
    $postzip = "";
    if (isset($_POST["zip"]) && $_POST["zip"] != "") {
        $postzip = html_output($_POST["zip"], ENT_QUOTES, "UTF-8");
    }
    $smarty->assign("postzip", $postzip);
    if ($f_zipr == 1) {
        $smarty->assign("required_notice_zip", 1);
    }
    $smarty->assign("signup_personal_zip", $signup_personal_zip);
    $smarty->assign("row_zip", 1);
}
if ($f_countrys == 1) {
    $country = "";
    $c_drop = "";
    if (isset($_POST["country"]) && $_POST["country"] != "") {
        $country = html_output($_POST["country"], ENT_QUOTES, "UTF-8");
    }
    $get_countries = $db->query("select * from idevaff_countries order by country_name");
    if ($get_countries->rowCount()) {
        while ($qry = $get_countries->fetch()) {
            if (isset($_POST["country"])) {
                $country_selected = $qry["country_code"] == $country ? "selected=\"selected\"" : "";
            } else {
                if ($qry["def"] == "1") {
                    $country_selected = "selected=\"selected\"";
                } else {
                    $country_selected = "";
                }
            }
            $c_drop .= "<option value=\"" . $qry["country_code"] . "\" " . $country_selected . ">" . $qry["country_name"] . "</option>\n";
        }
        $smarty->assign("c_drop", $c_drop);
    }
    $smarty->assign("country_select", $country);
    if ($f_countryr == 1) {
        $smarty->assign("signup_personal_country", $signup_personal_country);
    } else {
        $smarty->assign("signup_personal_country", $signup_personal_country);
    }
    $smarty->assign("row_countries", 1);
}
if (isset($_POST["canspam_accepted"])) {
    $smarty->assign("canspam_checked", " checked");
}
if (isset($_POST["accepted"])) {
    $smarty->assign("terms_checked", " checked");
}
$smarty->assign("signup_personal_title", $signup_personal_title);
$smarty->assign("signup_security_title", $signup_security_title);
$smarty->assign("signup_security_info", $signup_security_info);
if ($paytype == 1) {
    $botlev1 = $db->query("select amt from idevaff_paylevels where level = '1' and type = '1'");
    $res = $botlev1->fetch();
    $bot1 = $res["amt"];
    $bot1 = $bot1 * 100;
    $botlev2 = $db->query("select amt from idevaff_paylevels where level = '1' and type = '2'");
    $res = $botlev2->fetch();
    $bot2 = $res["amt"];
    $botlev3 = $db->query("select amt from idevaff_paylevels where level = '1' and type = '3'");
    $res = $botlev3->fetch();
    $bot3 = $res["amt"];
    if ($ap_1 == 1) {
        if (isset($_POST["payme"]) && $_POST["payme"] == 1) {
            $smarty->assign("payme_selected_1", " selected");
        }
        $smarty->assign("commission_option_percentage", 1);
        $smarty->assign("signup_commission_style_PPS", $signup_commission_style_PPS);
        $smarty->assign("bot1", $bot1);
    }
    if ($ap_2 == 1) {
        if (isset($_POST["payme"]) && $_POST["payme"] == 2) {
            $smarty->assign("payme_selected_2", " selected");
        }
        $smarty->assign("commission_option_flatrate", 1);
        $smarty->assign("signup_commission_style_PPS", $signup_commission_style_PPS);
        $smarty->assign("bot2", $bot2);
    }
    if ($ap_3 == 1) {
        if (isset($_POST["payme"]) && $_POST["payme"] == 3) {
            $smarty->assign("payme_selected_3", " selected");
        }
        $smarty->assign("commission_option_perclick", 1);
        $smarty->assign("signup_commission_style_PPC", $signup_commission_style_PPC);
        $smarty->assign("bot3", $bot3);
    }
    $smarty->assign("payment_choice_used", 1);
}
if ($terms_d) {
    $smarty->assign("signup_terms_title", $signup_terms_title);
    $smarty->assign("terms_t", strip_tags($terms_t));
    $smarty->assign("terms_conditions", 1);
    if ($terms_f) {
        $smarty->assign("signup_terms_agree", $signup_terms_agree);
        $smarty->assign("terms_required", 1);
    }
}
if ($privacy_signup) {
    $smarty->assign("privacy_signup_title", $privacy_signup_title);
    $smarty->assign("privacy_policy", strip_tags($privacy_policy));
    $smarty->assign("privacy_signup", 1);
    if ($privacy_required) {
        $smarty->assign("privacy_signup_agree", $privacy_signup_agree);
        $smarty->assign("privacy_required", 1);
    }
}
if ($canspam_d) {
    $smarty->assign("signup_canspam_title", $canspam_heading);
    $smarty->assign("canspam_t", $canspam_t);
    $smarty->assign("canspam_conditions", 1);
    if ($canspam_f) {
        $smarty->assign("signup_canspam_agree", $canspam_accept);
        $smarty->assign("canspam_required", 1);
    }
}
if ($use_security == 1) {
    $smarty->assign("signup_security_code", $signup_security_code);
    $smarty->assign("security_required", 1);
    include_once "includes/security_image.php";
    $captcha = new CaptchaSecurityImages();
    $captcha_image = $captcha->CaptchaSecurityImages();
    $smarty->assign("captcha_image", $captcha_image);
}
if ($maint_mode) {
    $smarty->assign("maintenance_mode", 1);
    $temp_fields = "signup_maintenance_heading,signup_maintenance_info";
    try {
        $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo $ex->getMessage();
        exit;
    }
    $signup_page_maintenance_heading = html_language_output($getlanguage["signup_maintenance_heading"]);
    $signup_page_maintenance_info = html_language_output($getlanguage["signup_maintenance_info"]);
    $smarty->assign("signup_maintenance_heading", $signup_page_maintenance_heading);
    $smarty->assign("signup_maintenance_info", $signup_page_maintenance_info);
}
$getcustomrows = $db->query("select id from idevaff_form_fields_custom");
if ($getcustomrows->rowCount()) {
    $smarty->assign("insert_custom_fields", 1);
    $smarty->assign("custom_fields_title", $custom_fields_title);
}
$custom_input_links = $db->query("select name, title, def_value, req from idevaff_form_fields_custom order by sort");
$custom_input_results = array();
$i = 0;
while ($cil_res = $custom_input_links->fetch()) {
    $custom_title = $cil_res["title"];
    $custom_name = $cil_res["name"];
    $custom_req = $cil_res["req"];
    if (isset($_POST[$custom_name]) && $_POST[$custom_name] != "") {
        $custom_value = $_POST[$custom_name];
    } else {
        $custom_value = $cil_res["def_value"];
    }
    $tmpgtrcil = array("custom_title" => $custom_title, "custom_name" => $custom_name, "custom_required" => $custom_req, "custom_value" => html_output($custom_value));
    $custom_input_results[$i++] = $tmpgtrcil;
}
$smarty->assign("custom_input_results", $custom_input_results);
$smarty->assign("signup_page_button", $signup_page_button);
include_once "includes/tokens.php";
$smarty->assign("fb_login_url", $fb_login_url);
$payment_method = isset($_POST["payment_method"]) ? (int) $_POST["payment_method"] : 0;
$pp_account = isset($_POST["pp_account"]) ? html_output($_POST["pp_account"], ENT_QUOTES, "UTF-8") : NULL;
$smarty->assign("pp_account", $pp_account);
$select_options = "";
$available_payment_methods = $db->query("select * from idevaff_payment_methods where enabled = '1' order by name");
if (0 < $available_payment_methods->rowCount()) {
    $method_description = "";
    while ($qry_methods = $available_payment_methods->fetch()) {
        $method_id = $qry_methods["id"];
        if ($method_id <= 5) {
            if ($method_id == 1) {
                $temp_fields_desc = "pm_paypal";
                $temp_fields_title = "pm_title_paypal";
            } else {
                if ($method_id == 2) {
                    $temp_fields_desc = "pm_stripe";
                    $temp_fields_title = "pm_title_stripe";
                } else {
                    if ($method_id == 3) {
                        $temp_fields_desc = "pm_account_credit";
                        $temp_fields_title = "pm_title_credit";
                    } else {
                        if ($method_id == 4) {
                            $temp_fields_desc = "pm_check_money_order";
                            $temp_fields_title = "pm_title_mo";
                        } else {
                            if ($method_id == 5) {
                                $temp_fields_desc = "pm_wire";
                                $temp_fields_title = "pm_title_wire";
                            }
                        }
                    }
                }
            }
            $query = $db->query("select " . $temp_fields_desc . "," . $temp_fields_title . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $getlanguage = $query->fetch();
            $desc = $getlanguage[$temp_fields_desc];
            $method_name = $getlanguage[$temp_fields_title];
        } else {
            $desc = "";
            $method_name = $qry_methods["name"];
        }
        $method_description .= "<span class='payment_description method_" . $method_id . "'>" . $desc . "</span>";
        $select_options .= "\n<option value='" . $method_id . "'";
        if ($payment_method == $method_id) {
            $select_options .= " selected='selected' ";
        }
        $select_options .= ">" . $method_name . "</option>\n";
    }
    $smarty->assign("select_multiple_methods", 1);
    $smarty->assign("select_available_payment_methods", $select_options);
    $smarty->assign("payment_method_description", $method_description);
}
$smarty->display("signup.tpl");

?>