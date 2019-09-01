<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
if (!defined("IDEV_FILE_AUTH")) {
    exit("validate.php - Unauthorized Access");
}
if (!defined("SITE_KEY")) {
    require_once "API/keys.php";
}
if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $email = NULL;
}
include "check_ban.php";
if ($passed_ban_check == true) {
    $temp_fields = "error_title,username_taken,username_invalid,username_short,password_short,password_mismatch,missing_checks,missing_tax,missing_fname,missing_lname,missing_privacy";
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
    $username_taken = html_language_output($getlanguage["username_taken"]);
    $username_invalid = html_language_output($getlanguage["username_invalid"]);
    $username_short = html_language_output($getlanguage["username_short"]);
    $password_short = html_language_output($getlanguage["password_short"]);
    $password_mismatch = html_language_output($getlanguage["password_mismatch"]);
    $missing_checks = html_language_output($getlanguage["missing_checks"]);
    $missing_tax = html_language_output($getlanguage["missing_tax"]);
    $missing_fname = html_language_output($getlanguage["missing_fname"]);
    $missing_lname = html_language_output($getlanguage["missing_lname"]);
    $missing_privacy = html_language_output($getlanguage["missing_privacy"]);
    $temp_fields = "missing_email,invalid_email,missing_address,missing_city,missing_state,missing_zip,missing_phone,missing_website,paypal_required,missing_terms,missing_company,missing_custom,invalid_paypal_address";
    try {
        $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo "<strong>Error:</strong><br>File: " . $ex->getFile() . "<br><strong>Line:</strong> " . $ex->getLine() . "<br><strong>Message:</strong> " . $ex->getMessage();
        exit;
    }
    $missing_email = html_language_output($getlanguage["missing_email"]);
    $invalid_email = html_language_output($getlanguage["invalid_email"]);
    $missing_address = html_language_output($getlanguage["missing_address"]);
    $missing_city = html_language_output($getlanguage["missing_city"]);
    $missing_state = html_language_output($getlanguage["missing_state"]);
    $missing_zip = html_language_output($getlanguage["missing_zip"]);
    $missing_phone = html_language_output($getlanguage["missing_phone"]);
    $missing_website = html_language_output($getlanguage["missing_website"]);
    $paypal_required = html_language_output($getlanguage["paypal_required"]);
    $missing_terms = html_language_output($getlanguage["missing_terms"]);
    $missing_company = html_language_output($getlanguage["missing_company"]);
    $missing_custom = html_language_output($getlanguage["missing_custom"]);
    $invalid_paypal_address = html_language_output($getlanguage["invalid_paypal_address"]);
    $temp_fields = "missing_security_code,email_already_used_1,email_already_used_2,email_already_used_3,missing_fax,payment_method_error,canspam_error,fb_permissions,missing_paypal,password_invalid";
    try {
        $query = $db->query("select " . $temp_fields . " from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo "<strong>Error:</strong><br>File: " . $ex->getFile() . "<br><strong>Line:</strong> " . $ex->getLine() . "<br><strong>Message:</strong> " . $ex->getMessage();
        exit;
    }
    $missing_security_code = html_language_output($getlanguage["missing_security_code"]);
    $email_already_used_1 = html_language_output($getlanguage["email_already_used_1"]);
    $email_already_used_2 = html_language_output($getlanguage["email_already_used_2"]);
    $email_already_used_3 = html_language_output($getlanguage["email_already_used_3"]);
    $missing_fax = html_language_output($getlanguage["missing_fax"]);
    $payment_method_error = html_language_output($getlanguage["payment_method_error"]);
    $canspam_error = html_language_output($getlanguage["canspam_error"]);
    $fb_permissions = html_language_output($getlanguage["fb_permissions"]);
    $missing_paypal = html_language_output($getlanguage["missing_paypal"]);
    $password_invalid = html_language_output($getlanguage["password_invalid"]);
    $password_invalid = str_replace("characters_allowed", $characters_allowed, $password_invalid);
    $username = $_POST["username"];
    $username = strtolower($username);
    $check_username = $db->prepare("select id from idevaff_affiliates where username = ?");
    $check_username->execute(array($username));
    if ($check_username->rowCount()) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $username_taken . "<BR />\n";
    }
    function username_short($credential)
    {
        global $db;
        $user_min = $db->query("select user_min from idevaff_config");
        $user_min = $user_min->fetch();
        $user_min = $user_min["user_min"];
        $rtn_value = false;
        if (get_magic_quotes_gpc()) {
            $credential = stripslashes($credential);
        }
        if (strlen($credential) < $user_min) {
            $rtn_value = true;
        }
        return $rtn_value;
    }
    $username_short = preg_replace("/user_min_chars/", $user_min, $username_short);
    if (username_short($username)) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $username_short . "<br />\n";
    }
    function username_valid($credential)
    {
        global $db;
        $rtn_value = false;
        if (get_magic_quotes_gpc()) {
            $credential = stripslashes($credential);
        }
        if (!preg_match("/[^a-z0-9_]/i", $credential)) {
            $rtn_value = true;
        }
        return $rtn_value;
    }
    if (!username_valid($username)) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $username_invalid . "<br />\n";
    }
    $password = $_POST["password"];
    $password_c = $_POST["password_c"];
    if ($password != $password_c) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $password_mismatch . "<BR />\n";
    }
    function password_short($credential)
    {
        global $db;
        $pass_min = $db->query("select pass_min from idevaff_config");
        $pass_min = $pass_min->fetch();
        $pass_min = $pass_min["pass_min"];
        $rtn_value = false;
        if (get_magic_quotes_gpc()) {
            $credential = stripslashes($credential);
        }
        if (strlen($credential) < $pass_min) {
            $rtn_value = true;
        }
        return $rtn_value;
    }
    $password_short = preg_replace("/pass_min_chars/", $pass_min, $password_short);
    if (password_short($password)) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $password_short . "<br />\n";
    }
    function password_valid($credential)
    {
        global $db;
        $rtn_value = false;
        if (get_magic_quotes_gpc()) {
            $credential = stripslashes($credential);
        }
        if (!preg_match("/[^a-z0-9\\!@#\$%\\^&\\*\\(\\)\\-_ \\[\\]\\{\\}<>\\+=]/i", $credential)) {
            $rtn_value = true;
        }
        return $rtn_value;
    }
    if (!password_valid($password)) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $password_invalid . "<br />\n";
    }
    if ($f_er && !$email) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_email . "<br />\n";
    }
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $invalid_email . "<br />\n";
    }
    if (0 < $emails_allowed) {
        $email_count = $db->prepare("select id from idevaff_affiliates where email = ?");
        $email_count->execute(array($email));
        if ($emails_allowed <= $email_count->rowCount()) {
            if (1 < $emails_allowed) {
                $extension = "s";
            } else {
                $extension = NULL;
            }
            $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $email_already_used_1 . " " . $emails_allowed . " " . $email_already_used_2 . $extension . " " . $email_already_used_3 . "<br />\n";
        }
    }
    if (isset($_POST["company"]) && $_POST["company"] != "") {
        $company = $_POST["company"];
    } else {
        $company = NULL;
    }
    if ($f_cor == 1 && !$company) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_company . "<br />\n";
    }
    if (isset($_POST["payable"]) && $_POST["payable"] != "") {
        $payable = $_POST["payable"];
    } else {
        $payable = NULL;
    }
    if ($f_chr == 1 && !$payable) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_checks . "<br />\n";
    }
    if (isset($_POST["url"]) && $_POST["url"] != "") {
        $website = $_POST["url"];
    } else {
        $website = NULL;
    }
    if ($f_wr == 1 && (!$website || $website == "http://")) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_website . "<br />\n";
    }
    if (isset($_POST["tax_id_ssn"]) && $_POST["tax_id_ssn"] != "") {
        $tax = $_POST["tax_id_ssn"];
    } else {
        $tax = NULL;
    }
    if ($f_tr == 1 && !$tax) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_tax . "<br />\n";
    }
    if (isset($_POST["f_name"]) && $_POST["f_name"] != "") {
        $f_name = $_POST["f_name"];
    } else {
        $f_name = NULL;
    }
    if ($f_fnamer == 1 && !$f_name) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_fname . "<br />\n";
    }
    if (isset($_POST["l_name"]) && $_POST["l_name"] != "") {
        $l_name = $_POST["l_name"];
    } else {
        $l_name = NULL;
    }
    if ($f_lnamer == 1 && !$l_name) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_lname . "<br />\n";
    }
    if (isset($_POST["address_one"]) && $_POST["address_one"] != "") {
        $address_one = $_POST["address_one"];
    } else {
        $address_one = NULL;
    }
    if ($f_add1r == 1 && !$address_one) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_address . "<br />\n";
    }
    if (isset($_POST["address_two"]) && $_POST["address_two"] != "") {
        $address_two = $_POST["address_two"];
    } else {
        $address_two = NULL;
    }
    if ($f_add2r == 1 && !$address_two) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_address . "<br />\n";
    }
    if (isset($_POST["city"]) && $_POST["city"] != "") {
        $city = $_POST["city"];
    } else {
        $city = NULL;
    }
    if ($f_cityr == 1 && !$city) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_city . "<br />\n";
    }
    if (isset($_POST["state"]) && $_POST["state"] != "") {
        $state = $_POST["state"];
    } else {
        $state = NULL;
    }
    if ($f_stater == 1 && !$state) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_state . "<br />\n";
    }
    if (isset($_POST["zip"]) && $_POST["zip"] != "") {
        $zip = $_POST["zip"];
    } else {
        $zip = NULL;
    }
    if ($f_zipr == 1 && !$zip) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_zip . "<br />\n";
    }
    if (isset($_POST["phone"]) && $_POST["phone"] != "") {
        $phone = $_POST["phone"];
    } else {
        $phone = NULL;
    }
    if ($f_phoner == 1 && !$phone) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_phone . "<br />\n";
    }
    if (isset($_POST["fax"]) && $_POST["fax"] != "") {
        $fax = $_POST["fax"];
    } else {
        $fax = NULL;
    }
    if ($f_faxr == 1 && !$fax) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_fax . "<br />\n";
    }
    if (isset($_POST["country"])) {
        $country = $_POST["country"];
    } else {
        $country = NULL;
    }
    if (isset($_POST["payment_method"])) {
        $payment_method = (int) $_POST["payment_method"];
    } else {
        $payment_method = 0;
    }
    $pp_account = NULL;
    $stripe_data = NULL;
    $pp = 0;
    if ($payment_method) {
        if ($payment_method == 1) {
            if (isset($_POST["pp_account"])) {
                $pp_account = $_POST["pp_account"];
            } else {
                $pp_account = NULL;
            }
            if (!$pp_account) {
                $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $paypal_required . "<BR />\n";
            } else {
                if (!filter_var($pp_account, FILTER_VALIDATE_EMAIL)) {
                    $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $invalid_paypal_address . "<br />\n";
                }
            }
        }
    } else {
        $payment_method_error = "Please select a payment method.";
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $payment_method_error . "<BR />\n";
    }
    if (isset($_POST["accepted"])) {
        $terms_accepted = 1;
    } else {
        $terms_accepted = 0;
    }
    if ($terms_f && !$terms_accepted) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_terms . "<BR />\n";
    }
    if (isset($_POST["privacy_accepted"])) {
        $privacy_accepted = 1;
    } else {
        $privacy_accepted = 0;
    }
    if ($privacy_required && !$privacy_accepted) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_privacy . "<BR />\n";
    }
    if (isset($_POST["canspam_accepted"])) {
        $canspam_accepted = 1;
    } else {
        $canspam_accepted = 0;
    }
    if ($canspam_f && !$canspam_accepted) {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $canspam_error . "<BR />\n";
    }
    $getcustom = $db->query("select name, title from idevaff_form_fields_custom where req = '1'");
    if ($getcustom->rowCount()) {
        while ($qry = $getcustom->fetch()) {
            $custom_name = $qry["name"];
            $custom_title = $qry["title"];
            if (!$_POST[$custom_name]) {
                $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_custom . " " . "<b>" . $custom_title . "</b><BR />\n";
            }
        }
    }
    if ($use_security == 1) {
        if (!isset($_POST["security_code"])) {
            $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_security_code . "<BR />\n";
        } else {
            if ($_SESSION["security_code"] == $_POST["security_code"] && !empty($_SESSION["security_code"])) {
                unset($_SESSION["security_code"]);
                unset($_SESSION["cap_img_crypt"]);
            } else {
                unset($_SESSION["security_code"]);
                unset($_SESSION["cap_img_crypt"]);
                $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $missing_security_code . "<BR />\n";
            }
        }
    }
    if (!empty($_POST["fb_user_id"]) && empty($_POST["email"])) {
        $request = new Facebook\FacebookRequest($fb_session, "DELETE", "/me/permissions");
        $response = $request->execute();
        $input_error = "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp;" . $fb_permissions . "<BR />\n";
        unset($_SESSION["fb_token"]);
    } else {
        if (!empty($_POST["fb_user_id"]) && !empty($_POST["email"])) {
            $input_error = "";
        }
    }
    if (isset($_POST["payme"])) {
        $payme = $_POST["payme"];
    } else {
        $payme = $def_pay;
    }
    $cta = $db->prepare("select ta from idevaff_tlog where ti = ? order by id desc");
    $cta->execute(array($ip_addr));
    $ctb = $cta->fetch();
    $ctc = $ctb["ta"];
    if ($ctc) {
        $insert_tier = $ctc;
    } else {
        $insert_tier = 0;
    }
    if (!$account_approval) {
        $setme = 1;
    } else {
        $setme = 0;
    }
    if (!$input_error) {
        $signup_date = time();
        $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), "+", "."), 0, 22);
        $password_enc = password_hash($user_key . $password, PASSWORD_DEFAULT);
        if (isset($_POST["email_language"])) {
            $write_email_language = $_POST["email_language"];
        } else {
            $write_email_language = NULL;
        }
        if (!isset($ip_addr)) {
            $ip_addr = NULL;
        }
        if (!isset($_POST["fb_user_id"])) {
            $_POST["fb_user_id"] = "";
        }
        $countaffiliates = $db->query("select id from idevaff_affiliates");
        if (!$countaffiliates->rowCount()) {
            $insert_id = $startnumber;
        }
        // TODO insert to blog, too. / multi-login
        $st = $db->prepare("insert into idevaff_affiliates (id, fb_user_id, username, password, user_key, approved, payable, company, f_name, l_name, email, address_1, address_2, city, state, zip, country, phone, fax, url, pp, pay_method, paypal, type, level, signup_date, email_override, tc_status, ip, tax_id_ssn) " . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, AES_ENCRYPT(?, '" . AUTH_KEY . "'))");
        $st->execute(array(!isset($insert_id) ? NULL : $insert_id, NULL, $username, $password_enc, $user_key, $setme, $payable, $company, $f_name, $l_name, $email, $address_one, $address_two, $city, $state, $zip, $country, $phone, $fax, $website, $pp, $payment_method, $pp_account, $payme, 1, $signup_date, $write_email_language, $terms_accepted, $ip_addr, $tax));
        $event = "affiliate.created";
        $data_affiliate_id = $db->lastInsertId();
        $st_postbacks = $db->prepare("insert into idevaff_postbacks (id, acct_id, grp, postback_url, status, method) VALUES (?, ?, ?, ?, ?)");
        $st_postbacks->execute([NULL, $data_affiliate_id, 0, NULL, 0, 0]);
        include $path . "/API/webhooks/webhook.php";
        if (is_array($mailchimp_data) && $mailchimp_data["enabled"] === "1") {
            require_once (string) $path . "/includes/integrations/mailchimp/mailchimp_signup.php";
        }
        if (is_array($getaweber) && $getaweber["enabled"] === "1") {
            include_once (string) $path . "/includes/integrations/aweber/aweber_signup.php";
        }
        if (is_array($constant_contact_data) && $constant_contact_data["enabled"] === "1") {
            include_once (string) $path . "/includes/integrations/constant_contact/cc_signup.php";
        }
        if (is_array($i_contact_data) && $i_contact_data["enabled"] === "1") {
            require_once (string) $path . "/includes/integrations/i_contact/ic_signup.php";
        }
        if (is_array($get_response_data) && $get_response_data["enabled"] === "1") {
            require_once (string) $path . "/includes/integrations/get_response/gr_signup.php";
        }
        if (is_array($active_campaign_data) && $active_campaign_data["enabled"] === "1") {
            require_once (string) $path . "/includes/integrations/active_campaign/ac_signup.php";
        }
        if (is_array($campaign_monitor_data) && $campaign_monitor_data["enabled"] === "1") {
            require_once (string) $path . "/includes/integrations/campaign_monitor/cm_signup.php";
        }
        if (is_array($vertical_response_data) && $vertical_response_data["enabled"] === "1") {
            require_once (string) $path . "/includes/integrations/vertical_response/vr_signup.php";
        }
        if (is_array($convertkit_data) && $convertkit_data["enabled"] === "1") {
            require_once $path . "/includes/integrations/convertkit/ck_signup.php";
        }
        if (is_array($infusionsoft_data) && $infusionsoft_data["enabled"] === "1") {
            require_once $path . "/includes/integrations/infusionsoft/is_signup.php";
        }
        if (is_array($sendgrid_data) && $sendgrid_data["enabled"] === "1") {
            require_once $path . "/includes/integrations/sendgrid/sg_signup.php";
        }
        if ($signup_api == 1) {
            $NewAccountAPITrigger = true;
            include_once "API/scripts/new_account_API_trigger.php";
        }
        if (0 < $insert_tier) {
            $newid = $db->prepare("select id from idevaff_affiliates where username = ?");
            $newid->execute(array($username));
            $getid = $newid->fetch();
            $insertid = $getid["id"];
            $st = $db->prepare("insert into idevaff_tiers (parent, child) VALUES (?, ?)");
            $st->execute(array($insert_tier, $insertid));
            if (0 < $recruitment_bonus) {
                $st = $db->prepare("insert into idevaff_sales (id, payment, bonus, approved, ip, code, currency) values (?, ?, ?, ?, ?, ?, ?)");
                $st->execute(array($insert_tier, $recruitment_bonus, "2", "1", $ip_addr, $commission_time, $currency));
            }
            if ($email_tier_referral == 1) {
                include $path . "/templates/email/affiliate.new_tier.php";
            }
        }
        $newid = $db->prepare("select id from idevaff_affiliates where username = ?");
        $newid->execute(array($username));
        $getid = $newid->fetch();
        $idforsessionstart = $getid["id"];
        $_SESSION[$install_directory_name . "_idev_LoggedID"] = $idforsessionstart;
        $log_time = time();
        $sql = "UPDATE idevaff_affiliates set last_logged = ? where id = ?";
        $q = $db->prepare($sql);
        $q->execute(array($log_time, $idforsessionstart));
        AffiliatelogEntry($username . "|" . $ip_addr . "|" . "Affiliate Login Success");
        if (0 < $initialbalance) {
            $newid = $db->prepare("select id from idevaff_affiliates where username = ?");
            $newid->execute(array($username));
            $getid = $newid->fetch();
            $insertid = $getid["id"];
            $st = $db->prepare("insert into idevaff_sales (id, payment, bonus, approved, ip, code, currency) values (?, ?, ?, ?, ?, ?, ?)");
            $st->execute(array($insertid, $initialbalance, "1", "1", $ip_addr, $commission_time, $currency));
        }
        $getcustom = $db->query("select id, name from idevaff_form_fields_custom");
        if ($getcustom->rowCount()) {
            $newid = $db->prepare("select id from idevaff_affiliates where username = ?");
            $newid->execute(array($username));
            $getid = $newid->fetch();
            $insertid = $getid["id"];
            while ($qry = $getcustom->fetch()) {
                $cus_id = $qry["id"];
                $cus_name = $qry["name"];
                if (isset($_POST[$cus_name])) {
                    $st = $db->prepare("insert into idevaff_form_custom_data (affid, custom_id, custom_value) VALUES (?, ?, ?)");
                    $st->execute(array($insertid, $cus_id, $_POST[$cus_name]));
                }
            }
        }
        $st = $db->prepare("delete from idevaff_tlog where ta = ? and ti = ?");
        $st->execute(array($insert_tier, $ip_addr));
        if ($mailadmin == 1) {
            include $path . "/templates/email/admin.new_account.php";
        }
        if ($we == 1) {
            include $path . "/templates/email/affiliate.welcome.php";
        }
        $complete = 1;
    }
}
} catch (Exception $e) {
	echo $e->getMessage();
}
?>