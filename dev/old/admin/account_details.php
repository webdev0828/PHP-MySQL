<?php

include_once "../API/config.php";
include_once "includes/session.check.php";
require_once "../API/stripe/config.php";
if (!defined("SITE_KEY")) {
    require_once "../API/keys.php";
}
if (isset($_REQUEST["terminate"]) && $staff_delete_accounts == "off" && !isset($_SESSION[$install_directory_name . "_idev_AdminAccount"])) {
    header("Location: staff_notice.php");
    exit;
}
$clean_id = "0";
if (isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"])) {
    $clean_id = $_REQUEST["id"];
}
$leftSubActiveMenu = "affiliates";
require "templates/header.php";
if (isset($_REQUEST["remove_pic"])) {
    $getpicture = $db->prepare("select picture from idevaff_affiliates where id = ?");
    $getpicture->execute(array($clean_id));
    $getpicture = $getpicture->fetch();
    $picturename = $getpicture["picture"];
    if ($picturename != "") {
        unlink("../assets/pictures/" . $picturename);
    }
    $st = $db->prepare("update idevaff_affiliates set picture = '' where id = ?");
    $st->execute(array($clean_id));
    $success_message = "<strong>Success!</strong> Picture removed.";
}
if (isset($_POST["id_update"])) {
    $custom_value = $_POST["custom_value"];
    $id_update = $_POST["id_update"];
    $custom_id = $_POST["custom_id"];
    $st = $db->prepare("select * from idevaff_form_custom_data where custom_id = ?");
    $st->execute(array($custom_id));
    if (!$st->rowCount()) {
        $st = $db->prepare("insert into idevaff_form_custom_data (affid, custom_id, custom_value) VALUES (?, ?, ?)");
        $st->execute(array($clean_id, $custom_id, $custom_value));
    } else {
        $st = $db->prepare("update idevaff_form_custom_data set custom_value = ? where id = ?");
        $st->execute(array($custom_value, $id_update));
    }
    $success_message = "<strong>Success!</strong> Custom field has been updated.";
}
if (isset($_POST["submit_data_6"])) {
    $indi_incoming_write = NULL;
    if ($_POST["indi_incoming"] != "http://") {
        if (filter_var($_POST["indi_incoming"], FILTER_VALIDATE_URL) === false) {
            $indi_incoming_write = NULL;
            $warning_message = "<strong>Warning!</strong> Invalid or empty Default Incoming Traffic Page. Default Incoming Traffic Page not updated.";
        } else {
            $indi_incoming_write = $_POST["indi_incoming"];
        }
    }
    if ($_POST["exp2"] == 1) {
        $estamp = $_POST["exp1"] * 60;
    }
    if ($_POST["exp2"] == 2) {
        $estamp = $_POST["exp1"] * 60 * 60;
    }
    if ($_POST["exp2"] == 3) {
        $estamp = $_POST["exp1"] * 60 * 60 * 24;
    }
    if ($_POST["exp2"] == 4) {
        $estamp = $_POST["exp1"] * 60 * 60 * 24 * 365;
    }
    $st = $db->prepare("update idevaff_affiliates set indi_incoming = ?, vat_override = ?, expire = ?, expire_type = ?, expire_stamp = ? where id = ?");
    if (isset($_POST["vat_override"])) {
        $vat_override = $_POST["vat_override"];
    } else {
        $vat_override = 0;
    }
    if (isset($_POST["cust_dur_reset"]) && $_POST["cust_dur_reset"] == "1") {
        $estamp = 0;
    }
    $st->execute(array($indi_incoming_write, $vat_override, $_POST["exp1"], $_POST["exp2"], $estamp, $_POST["who"]));
    $success_message = "<strong>Success!</strong> Account information updated.";
}
if (isset($_POST["submit_data_1"])) {
    $st = $db->prepare("update idevaff_affiliates set username = ?, payable = ?, f_name = ?, company = ?, l_name = ?, email = ?, address_1 = ?, address_2 = ?, city = ?, state = ?, zip = ?, country = ?, phone = ?, fax = ?, url = ?, vat_override = ? where id = ?");
    if (isset($_POST["vat_override"])) {
        $vat_override = $_POST["vat_override"];
    } else {
        $vat_override = 0;
    }
    $st->execute(array($_POST["username"], $_POST["payable"], $_POST["f_name"], $_POST["company"], $_POST["l_name"], $_POST["email"], $_POST["address_one"], $_POST["address_two"], $_POST["city"], $_POST["state"], $_POST["zip"], $_POST["country"], $_POST["phone"], $_POST["fax"], $_POST["url"], $vat_override, $_POST["who"]));
    if ($_POST["password"] != "") {
        $new_pass = $_POST["password"];
        $user_key = substr(strtr(base64_encode(sha1(microtime(true), true)), "+", "."), 0, 22);
        $new_pass = password_hash($user_key . $new_pass, PASSWORD_DEFAULT);
        $sql = "UPDATE `idevaff_affiliates` set `user_key`=?, `password`=? WHERE id=?";
        $q = $db->prepare($sql);
        $q->execute(array($user_key, $new_pass, $_POST["who"]));
    }
    $tax = $_POST["tax_id_ssn"];
    if ($tax != "") {
        $st = $db->prepare("update idevaff_affiliates set tax_id_ssn = (AES_ENCRYPT(?, '" . AUTH_KEY . "')) where id = ?");
        $st->execute(array($tax, $_POST["who"]));
    }
    $success_message = "<strong>Success!</strong> Account information updated.";
}
if (isset($_POST["submit_data_2"]) && is_numeric($_POST["submit_data_2"])) {
    if ($_POST["old_type"] != $_POST["new_type"]) {
        $setme = 1;
        $warning_message = "<strong>Warning!</strong> Payout level has been reset to level 1.  If you're ok with this, you're done. If not, please adjust the payout level now.";
    } else {
        $setme = $_POST["level"];
    }
    if (is_numeric($_POST["new_type"])) {
        if ($_POST["new_type"] == "1") {
            $allowtype = "a1";
        }
        if ($_POST["new_type"] == "2") {
            $allowtype = "a2";
        }
        if ($_POST["new_type"] == "3") {
            $allowtype = "a3";
        }
        $st = $db->prepare("update idevaff_affiliates set type = ?, level = ?, " . $allowtype . " = '1' where id = ?");
        $st->execute(array($_POST["new_type"], $setme, $_POST["who"]));
        $success_message = "<strong>Success!</strong> Commission payout settings updated.";
    }
}
if (isset($_POST["submit_data_3"])) {
    $st = $db->prepare("update idevaff_affiliates set paypal = ? where id = ?");
    $st->execute(array($_POST["pp_account"], $_POST["who"]));
    $success_message = "<strong>Success!</strong> Paypal payments updated.";
}
if (isset($_POST["submit_datas_4"])) {
    $delete_stripe = isset($_POST["delete_stripe_account"]) ? $_POST["delete_stripe_account"] : NULL;
    if ($delete_stripe === "delete_stripe") {
        try {
            $tokens = array();
            $tokens = base64_encode(serialize($tokens));
            $st = $db->prepare("update idevaff_affiliates set stripe_user_data  = ? where id = ?");
            $st->execute(array($tokens, $_POST["who"]));
            $success_message = "<strong>Success!</strong> Stripe Account Deleted.";
        } catch (Exception $ex) {
            $fail_message = $ex->getMessage();
        }
    }
}
if (isset($_POST["submit_data_5"])) {
    $st = $db->prepare("update idevaff_affiliates set pay_method = ? where id = ?");
    $st->execute(array($_POST["current_method"], $_POST["who"]));
    $success_message = "<strong>Success!</strong> Payment method updated.";
    if ($_POST["current_method"] == "1" || $_POST["current_method"] == "2") {
        $insert = NULL;
        if ($_POST["current_method"] == "1") {
            $insert = "PayPal";
        } else {
            if ($_POST["current_method"] == "2") {
                $insert = "Stripe";
            }
        }
        $warning_message = "<strong>Warning!</strong> Please take a moment to enter the " . $insert . " account below.";
    }
}
$alldata = $db->prepare("select * from idevaff_affiliates where id = ?");
$alldata->execute(array($clean_id));
$indv_data = $alldata->fetch();
$uname = $indv_data["username"];
$upass = $indv_data["password"];
$picture = $indv_data["picture"];
$payto = $indv_data["payable"];
$company = $indv_data["company"];
$ufname = $indv_data["f_name"];
$ulname = $indv_data["l_name"];
$uemail = $indv_data["email"];
$ad1 = $indv_data["address_1"];
$ad2 = $indv_data["address_2"];
$c = $indv_data["city"];
$s = $indv_data["state"];
$z = $indv_data["zip"];
$coun = $indv_data["country"];
$phone = $indv_data["phone"];
$fax = $indv_data["fax"];
$url = $indv_data["url"];
$pp = $indv_data["pp"];
$approved = $indv_data["approved"];
$suspended = $indv_data["suspended"];
$hits = $indv_data["hits_in"];
$vat_override = $indv_data["vat_override"];
$last_logged = $indv_data["last_logged"];
if (0 < $last_logged) {
    $last_logged = date($dateformat, $last_logged);
} else {
    $last_logged = "N/A";
}
$indi_incoming = $indv_data["indi_incoming"];
if (filter_var($indi_incoming, FILTER_VALIDATE_URL) === false) {
    $indi_incoming = NULL;
}
$hits = number_format($hits);
$signup_date = $indv_data["signup_date"];
if (0 < $signup_date) {
    $signup_date = date($dateformat, $signup_date);
} else {
    $signup_date = "N/A";
}
$pay_method = $indv_data["pay_method"];
$get_pay_name = $db->prepare("SELECT name from idevaff_payment_methods where id = ?");
$get_pay_name->execute(array($pay_method));
$get_pay_name = $get_pay_name->fetch();
$pay_name = $get_pay_name["name"];
$ip = $indv_data["ip"];
if ($ip < 1) {
    $ip = "N/A";
}
$get_tax = $db->prepare("SELECT AES_DECRYPT(tax_id_ssn, '" . AUTH_KEY . "') AS decrypted FROM idevaff_affiliates where id = ?");
$get_tax->execute(array($clean_id));
$get_tax = $get_tax->fetch();
$utax = $get_tax["decrypted"];
$sales1 = $db->prepare("select record from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '0' and bonus = '0'");
$sales1->execute(array($clean_id));
$sales1 = $sales1->rowCount();
$sales2 = $db->prepare("select record from idevaff_archive where id = ? and top_tier_tag = '0' and bonus = '0'");
$sales2->execute(array($clean_id));
$sales2 = $sales2->rowCount();
$sales = $sales1 + $sales2;
$sales = number_format($sales);
$tsales1 = $db->prepare("select record from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '1' and bonus = '0'");
$tsales1->execute(array($clean_id));
$tsales1 = $tsales1->rowCount();
$tsales2 = $db->prepare("select record from idevaff_archive where id = ? and top_tier_tag = '1' and bonus = '0'");
$tsales2->execute(array($clean_id));
$tsales2 = $tsales2->rowCount();
$tsales = $tsales1 + $tsales2;
$tsales = number_format($tsales);
$osales1 = $db->prepare("select record from idevaff_sales where id = ? and approved = '1' and override = '1' and bonus = '0'");
$osales1->execute(array($clean_id));
$osales1 = $osales1->rowCount();
$osales2 = $db->prepare("select record from idevaff_archive where id = ? and override = '1' and bonus = '0'");
$osales2->execute(array($clean_id));
$osales2 = $osales2->rowCount();
$osales = $osales1 + $osales2;
$osales = number_format($osales);
$earnings1 = $db->prepare("select SUM(amount) AS total from idevaff_payments where id = ?");
$earnings1->execute(array($clean_id));
$row1 = $earnings1->fetch();
$sexact = $row1["total"];
$sexactd = number_format($sexact, $decimal_symbols);
$earnings2 = $db->prepare("select SUM(payment) AS total from idevaff_sales where id = ? and approved = '1'");
$earnings2->execute(array($clean_id));
$row2 = $earnings2->fetch();
$pexact = $row2["total"];
$pexactd = number_format($pexact, $decimal_symbols);
$totalsales = $sexact + $pexact;
$totalsales = number_format($totalsales, $decimal_symbols);
$appsales = $db->prepare("select id from idevaff_sales where id = ? and approved = '0'");
$appsales->execute(array($clean_id));
$salestotal = $appsales->rowCount();
$salestotal = number_format($salestotal, $decimal_symbols);
$ipstat = $db->prepare("select COUNT(DISTINCT ip) from idevaff_iptracking where acct_id = ?");
$ipstat->execute(array($clean_id));
$unique = number_format($ipstat->fetchColumn());
$bonu = $db->prepare("select bonus from idevaff_sales where id = ? and bonus = '1' and approved = '1'");
$bonu->execute(array($clean_id));
$bon = $bonu->rowCount();
$level = $indv_data["level"];
$levperc = $db->prepare("select amt from idevaff_paylevels where level = ?");
$levperc->execute(array($level));
$getlevperc = $levperc->fetch();
$percpay = $getlevperc["amt"];
$percpay = $percpay * 100;
if ($paytype == 1 || $paytype == 3) {
    $plt = "per sale";
} else {
    if ($paytype == 2) {
        $plt = "per click";
    }
}
if ($approved == 1) {
    $stat = "Approved";
} else {
    $stat = "<font color=\"#CC0000\">Pending Approval</font>";
}
$ipstat_total = $db->prepare("select COUNT(ip) from idevaff_iptracking where acct_id = ?");
$ipstat_total->execute(array($clean_id));
$hits = number_format($ipstat_total->fetchColumn());
echo "\r\n\r\n\r\n\r\n\r\n\r\n\r\n<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Affiliates</li>\r\n<li class=\"current\"> <a href=\"account_details.php?id=";
echo $clean_id;
echo "\" title=\"\">Account Details</a></li>\r\n</ul>\r\n";
include "templates/crumb_right.php";
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Account Details<span>Affiliate ID #";
echo html_output($clean_id);
echo ".</span></h3>\r\n</div>\r\n\r\n";
include "templates/stats.php";
echo "</div>\r\n\r\n";
include "includes/notifications.php";
echo "\r\n";
if (isset($_REQUEST["suspend"])) {
    echo "<div class=\"alert alert-warning\">\r\n<h4><strong>Suspend This Account</strong></h4>\r\nThis action will suspend the account. Once suspended, the affiliate will no longer have access to the affiliate control panel.<br /><br />\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"user_access.php\">\r\n<input name=\"csrf_token\" value=\"";
    echo $_SESSION["csrf_token"];
    echo "\" type=\"hidden\" />\r\n<input type=\"hidden\" name=\"suspend\" value=\"";
    echo html_output($clean_id);
    echo "\">\r\n<input type=\"hidden\" name=\"activity\" value=\"1\">\r\n<button class=\"btn btn-warning\">Suspend This Account</button>\r\n</form>\r\n</div>\r\n";
}
if (isset($_REQUEST["terminate"])) {
    echo "<div class=\"alert alert-danger\">\r\n<h4><strong>Terminate This Account</strong></h4>\r\nIf this is <u>not</u> a Facebook created account, this action will send the account to the <strong>Declined Accounts</strong> list. If needed, you can permanently remove this account from that page. If this is a Facebook created account, this termination function will be permanent right now as there is no way to preserve these types of accounts.<br /><br />\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"accounts_declined.php\">\r\n<input name=\"csrf_token\" value=\"";
    echo $_SESSION["csrf_token"];
    echo "\" type=\"hidden\" />\r\n<input type=\"hidden\" name=\"terminate\" value=\"";
    echo html_output($clean_id);
    echo "\">\r\n<button class=\"btn btn-danger\">Terminate This Account</button>\r\n</form>\r\n</div>\r\n";
}
echo "\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Account Snapshot</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Edit</a></li>\r\n<li ";
makeActiveTab(3);
echo "><a href=\"#tab_1_3\" data-toggle=\"tab\">Commission &amp; Payment</a></li>\r\n<li ";
makeActiveTab(6);
echo "><a href=\"#tab_1_6\" data-toggle=\"tab\">Account Overrides</a></li>\r\n<li ";
makeActiveTab(4);
echo "><a href=\"#tab_1_4\" data-toggle=\"tab\">Notes</a></li>\r\n<li ";
makeActiveTab(5);
echo "><a href=\"#tab_1_5\" data-toggle=\"tab\">Custom Fields</a></li>\r\n\r\n<li>\r\n";
if ("0" < $suspended) {
    echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-sm btn-warning dropdown-toggle\">Currently Suspended <span class=\"caret\"></span></button>\r\n<ul class=\"dropdown-menu\">\r\n<li><a href=\"user_access.php?tab=2&unid=";
    echo $clean_id;
    echo "\">Un-Suspend Account</a></li>\r\n<li class=\"divider\"></li>\r\n<li><a href=\"account_details.php?id=";
    echo $clean_id;
    echo "&terminate=1\">Terminate This Account</a></li>\r\n</ul>\r\n</div>\r\n";
} else {
    if ($approved == "0") {
        echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-sm btn-danger dropdown-toggle\">Pending Approval <span class=\"caret\"></span></button>\r\n<ul class=\"dropdown-menu\">\r\n<li><a href=\"accounts_pending.php?decision=1&id=";
        echo $clean_id;
        echo "\">Approve Account</a></li>\r\n<li class=\"divider\"></li>\r\n<li><a href=\"accounts_pending.php?decision=2&id=";
        echo $clean_id;
        echo "\">Decline Account</a></li>\r\n<li><a href=\"accounts_pending.php?decision=3&id=";
        echo $clean_id;
        echo "\">Decline Account w/ Email Notification</a></li>\r\n</ul></div>\r\n";
    } else {
        echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-sm btn-primary dropdown-toggle\">Currently Approved <span class=\"caret\"></span></button>\r\n<ul class=\"dropdown-menu\">\r\n<li><a href=\"account_details.php?cfg=35&id=";
        echo $clean_id;
        echo "\">Un-Approve Account</a></li>\r\n<li><a href=\"account_details.php?id=";
        echo $clean_id;
        echo "&suspend=1\">Suspend Account</a></li>\r\n<li class=\"divider\"></li>\r\n<li><a href=\"account_details.php?id=";
        echo $clean_id;
        echo "&terminate=1\">Terminate This Account</a></li>\r\n</ul></div>\r\n";
    }
}
echo "</li>\r\n</ul>\r\n\r\n<div class=\"tab-content\">\r\n\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, "no");
echo "\" id=\"tab_1_1\">\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\">\r\n\r\n<div class=\"widget box\" style=\"margin-top:20px;\" align=\"center\">\r\n<div class=\"widget-content\">\r\n";
if ($picture == "") {
    echo "<img src=\"images/default_image.jpg\">\r\n";
} else {
    echo "<img src=\"../assets/pictures/";
    echo $picture;
    echo "\">\r\n";
}
echo "</div>\r\n</div>\r\n";
if ($picture != "") {
    echo "<p style=\"text-align:center;\">\r\n<a href=\"account_details.php?remove_pic=true&id=";
    echo $clean_id;
    echo "\"><button class=\"btn btn-sm btn-default\">Remove Picture</button></a>\r\n</p>\r\n";
}
echo "</div>\r\n\r\n<div class=\"col-md-5\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-user\"></i> Account Details</h4><span class=\"pull-right\"><a href=\"../loginoverride.php?override_login=1&override_id=";
echo $clean_id;
echo "&secret_key=";
echo $secret;
echo "\" target=\"_blank\"><button class=\"btn btn-sm btn-info\">Login As Affiliate</button></a></span></div>\r\n<div class=\"widget-content\">\r\n<table class=\"table table-striped table-bordered table-highlight-head\">\r\n<tbody>\r\n<tr>\r\n<td>Name</td>\r\n<td>";
echo html_output($ufname);
echo " ";
echo html_output($ulname);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Username</td>\r\n<td><font color=\"#CC0000\">";
echo html_output($uname);
echo "</font></td>\r\n</tr>\r\n<tr>\r\n<td>Email Address</td>\r\n<td style=\"padding:3px 0 0 5px;\">";
if ($uemail) {
    echo "<a href=\"mailto:";
    echo html_output($uemail);
    echo "\" class=\"btn btn-sm btn-success\">Direct Email</a> <a href=\"email_affiliates.php?id=";
    echo $clean_id;
    echo "\" class=\"btn btn-sm btn-success\">Internal Email</a>";
} else {
    echo "N/A";
}
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Website</td>\r\n<td style=\"padding:3px 0 0 5px;\">";
if ($url && $url != "" && $url != "http://") {
    echo "<a href=\"";
    echo $url;
    echo "\" target=\"_blank\" class=\"btn btn-default btn-sm\">Visit Website</a>";
} else {
    echo "N/A";
}
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Phone Number</td>\r\n<td>";
if ($phone) {
    echo html_output($phone);
} else {
    echo "N/A";
}
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>IP Address At Signup</td>\r\n<td>";
echo html_output($ip);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Signup Date</td>\r\n<td>";
echo html_output($signup_date);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Payment Method</td>\r\n<td>";
echo $pay_name;
echo "</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-5\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-signal\"></i> Account Activity</h4><span class=\"pull-right\"><a href=\"report.php?view=1&id=";
echo $clean_id;
echo "\" target=\"_blank\"><button class=\"btn btn-sm btn-default\"><i class=\"icon-print\"></i> Printable Version</button></a></span></div>\r\n<div class=\"widget-content\">\r\n\r\n<table class=\"table table-striped table-bordered table-highlight-head\">\r\n<tbody>\r\n\t<tr>\r\n\t\t<td style=\"padding:3px 8px; line-height: 28px;\">Last Logged In<a href=\"setup.php?action=75&tab=3&id=";
echo html_output($clean_id);
echo "\" class=\"btn btn-default btn-sm pull-right\">Access Log</a></td>\r\n\t\t<td align=\"right\">";
echo html_output($last_logged);
echo "</td>\r\n\t</tr>\r\n<tr>\r\n<td style=\"padding:3px 8px; line-height: 28px;\">Total Hits In<a href=\"traffic_logs.php?id=";
echo html_output($clean_id);
echo "\" class=\"btn btn-danger btn-sm pull-right\">Traffic Log</a></td>\r\n<td align=\"right\">";
echo html_output($hits);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Unique Hits In</td>\r\n<td align=\"right\">";
echo html_output($unique);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Commissions</td>\r\n<td align=\"right\">";
echo html_output($sales);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Tier Commissions</td>\r\n<td align=\"right\">";
echo html_output($tsales);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Override Commissions</td>\r\n<td align=\"right\">";
echo html_output($osales);
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Current Commissions</td>\r\n<td align=\"right\">";
if ($cur_sym_location == 1) {
    echo html_output($cur_sym);
}
echo html_output($pexactd);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Paid Commissions</td>\r\n<td align=\"right\">";
if ($cur_sym_location == 1) {
    echo html_output($cur_sym);
}
echo html_output($sexactd);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
echo "</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Total Commissions</strong></td>\r\n<td align=\"right\"><strong>";
if ($cur_sym_location == 1) {
    echo html_output($cur_sym);
}
echo html_output($totalsales);
if ($cur_sym_location == 2) {
    echo " " . $cur_sym . " ";
}
echo " " . $currency;
echo "</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-bar-chart\"></i> Last 30 Days Activity</h4></div>\r\n<div class=\"widget-content\">\r\n\t\t\t\t\t\t\t<div class=\"widget-content\">\r\n\t\t\t\t\t\t\t\t<div id=\"chart_filled_red\" class=\"chart\"></div>\r\n\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t\t<div class=\"divider\"></div>\r\n\t\t\t\t\t\t\t<div class=\"widget-content\">\r\n\t\t\t\t\t\t\t\t<ul class=\"stats\">\r\n\t\t\t\t\t\t\t\t\t<li>\r\n\t\t\t\t\t\t\t\t\t\t<strong id=\"month_aff_traffic\"></strong>\r\n\t\t\t\t\t\t\t\t\t\t<small>Traffic Last 30 Days</small>\r\n\t\t\t\t\t\t\t\t\t</li>\r\n\t\t\t\t\t\t\t\t\t<li>\r\n\t\t\t\t\t\t\t\t\t\t<strong id=\"month_aff_commissions\"></strong>\r\n\t\t\t\t\t\t\t\t\t\t<small>Commissions Last 30 Days</small>\r\n\t\t\t\t\t\t\t\t\t</li>\r\n\t\t\t\t\t\t\t\t</ul>\r\n\t\t\t\t\t\t\t</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-bar-chart\"></i> Lifetime Activity</h4></div>\r\n<div class=\"widget-content\">\r\n\r\n\r\n\t\t\t\t\t\t\t<div class=\"widget-content\">\r\n\t\t\t\t\t\t\t\t<div id=\"chart_filled_green\" class=\"chart\"></div>\r\n\t\t\t\t\t\t\t</div>\r\n\t\t\t\t\t\t\t<div class=\"divider\"></div>\r\n\t\t\t\t\t\t\t<div class=\"widget-content\">\r\n\t\t\t\t\t\t\t\t<ul class=\"stats\"> <!-- .no-dividers -->\r\n\t\t\t\t\t\t\t\t\t<li class=\"light\">\r\n\t\t\t\t\t\t\t\t\t\t<strong id=\"life_aff_traffic\"></strong>\r\n\t\t\t\t\t\t\t\t\t\t<small>Total Traffic</small>\r\n\t\t\t\t\t\t\t\t\t</li>\r\n\t\t\t\t\t\t\t\t\t<li class=\"light\">\r\n\t\t\t\t\t\t\t\t\t\t<strong id=\"life_aff_commissions\"></strong>\r\n\t\t\t\t\t\t\t\t\t\t<small>Total Commissions</small>\r\n\t\t\t\t\t\t\t\t\t</li>\r\n\r\n\t\t\t\t\t\t\t\t</ul>\r\n\t\t\t\t\t\t\t</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, "no");
echo "\" id=\"tab_1_2\">\r\n";
$alldata = $db->prepare("select * from idevaff_affiliates where id = ?");
$alldata->execute(array($clean_id));
$indv_data = $alldata->fetch();
$username = $indv_data["username"];
$password = $indv_data["password"];
$payable = $indv_data["payable"];
$company = $indv_data["company"];
$f_name = $indv_data["f_name"];
$l_name = $indv_data["l_name"];
$email = $indv_data["email"];
$address_one = $indv_data["address_1"];
$address_two = $indv_data["address_2"];
$city = $indv_data["city"];
$state = $indv_data["state"];
$zip = $indv_data["zip"];
$country = $indv_data["country"];
$phone = $indv_data["phone"];
$fax = $indv_data["fax"];
$url = $indv_data["url"];
$pp = $indv_data["pp"];
$paypal = $indv_data["paypal"];
$stripe_user_data = $indv_data["stripe_user_data"];
$atype = $indv_data["type"];
$alevel = $indv_data["level"];
$get_tax = $db->prepare("SELECT AES_DECRYPT(tax_id_ssn, '" . AUTH_KEY . "') AS decrypted FROM idevaff_affiliates where id = ?");
$get_tax->execute(array($clean_id));
$get_tax = $get_tax->fetch();
$tax_id_ssn = $get_tax["decrypted"];
echo "<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-text-alt\"></i> Edit Account</h4></div>\r\n<div class=\"widget-content\">\r\n\r\n";
include "includes/char_reqs.php";
echo "\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"account_details.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Username</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"username\" class=\"form-control\" value=\"";
echo $username;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">New Password</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"password\" class=\"form-control\" value=\"\"><span class=\"help-block\">Leave blank to keep existing password.</span></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">First Name</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"f_name\" class=\"form-control\" value=\"";
echo $f_name;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Last Name</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"l_name\" class=\"form-control\" value=\"";
echo $l_name;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Email Address</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"email\" class=\"form-control\" value=\"";
echo $email;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Website Address</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"url\" class=\"form-control\" value=\"";
if ($url) {
    echo $url;
} else {
    echo "http://";
}
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Street Address</label>\r\n<div class=\"col-md-9\"><input type=\"text\" name=\"address_one\" class=\"form-control\" value=\"";
echo $address_one;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Street Address 2</label>\r\n<div class=\"col-md-9\"><input type=\"text\" name=\"address_two\" class=\"form-control\" value=\"";
echo $address_two;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">City</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"city\" class=\"form-control\" value=\"";
echo $city;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">State</label>\r\n<div class=\"col-md-2\"><input type=\"text\" name=\"state\" class=\"form-control\" value=\"";
echo $state;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Zip Code</label>\r\n<div class=\"col-md-2\"><input type=\"text\" name=\"zip\" class=\"form-control\" value=\"";
echo $zip;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Country</label>\r\n\r\n<div class=\"col-md-9\"><select class=\"form-control input-width-xxlarge\" name=\"country\">\r\n";
$get_countries = $db->query("select * from idevaff_countries order by country_name");
if ($get_countries->rowCount()) {
    while ($qry = $get_countries->fetch()) {
        echo "<option value=\"" . $qry["country_code"] . "\"";
        if ($country == $qry["country_code"]) {
            echo " selected";
        }
        echo ">" . $qry["country_name"] . "</option>\n";
    }
}
echo "</select>\r\n</div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Phone</label>\r\n<div class=\"col-md-2\"><input type=\"text\" name=\"phone\" class=\"form-control\" value=\"";
echo $phone;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Fax</label>\r\n<div class=\"col-md-2\"><input type=\"text\" name=\"fax\" class=\"form-control\" value=\"";
echo $fax;
echo "\"></div>\r\n</div>\r\n\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Company</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"company\" class=\"form-control\" value=\"";
echo $company;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Checks Payable To</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"payable\" class=\"form-control\" value=\"";
echo $payable;
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Tax ID/SSN/VAT</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"tax_id_ssn\" class=\"form-control\" value=\"";
echo $tax_id_ssn;
echo "\"></div>\r\n</div>\r\n\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Save Settings\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"submit_data_1\" value=\"1\">\r\n<input type=\"hidden\" name=\"who\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"old_type\" value=\"";
echo $atype;
echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"2\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(3, "no");
echo "\" id=\"tab_1_3\">\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"row\">\r\n\r\n";
$alldata_pay = $db->prepare("select pay_method from idevaff_affiliates where id = ?");
$alldata_pay->execute(array($clean_id));
$indv_data_pay = $alldata_pay->fetch();
$getpayid = $indv_data_pay["pay_method"];
$getpayname = $db->prepare("select name from idevaff_payment_methods where id = ?");
$getpayname->execute(array($getpayid));
$getpayname_result = $getpayname->fetch();
$getpayname_result = $getpayname_result["name"];
echo "\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Payment Method</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"account_details.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-6 control-label\">Change Payment Method</label>\r\n<div class=\"col-md-6\"><select name=\"current_method\" class=\"form-control\">\r\n";
$available_payment_methods = $db->query("select * from idevaff_payment_methods where enabled = '1' order by name");
if ($available_payment_methods->rowCount()) {
    while ($qry_methods = $available_payment_methods->fetch()) {
        echo "<option value=\"";
        echo $qry_methods["id"];
        echo "\"";
        if ($qry_methods["id"] == $getpayid) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo html_output($qry_methods["name"]);
        echo "</option>\r\n";
    }
}
echo "</select><br /><span class=\"help-block\">Currently Selected: ";
if ($getpayid == "0") {
    echo "<font color='#cc0000'>ERROR - Nothing selected.</font><br />Please select something now.";
} else {
    echo html_output($getpayname_result);
}
echo "</span></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Save Settings\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"submit_data_5\" value=\"1\">\r\n<input type=\"hidden\" name=\"who\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Commission Payout Settings</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"account_details.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-6 control-label\">Commission Style</label>\r\n<div class=\"col-md-6\"><select name=\"new_type\" class=\"form-control\">\r\n";
if ($ap_1 == 1) {
    echo "<option value=\"1\"";
    if ($atype == 1) {
        echo " selected=\"selected\"";
    }
    echo ">Percentage Payout</option>";
}
if ($ap_2 == 1) {
    echo "<option value=\"2\"";
    if ($atype == 2) {
        echo " selected=\"selected\"";
    }
    echo ">Flat Rate Payout</option>";
}
if ($ap_3 == 1) {
    echo "<option value=\"3\"";
    if ($atype == 3) {
        echo " selected=\"selected\"";
    }
    echo ">Pay-Per-Click</option>";
}
echo "</select></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-6 control-label\"";
if (isset($_POST["new_type"]) && $_POST["old_type"] != $_POST["new_type"]) {
    echo " style=\"color:#CC0000;\"";
}
echo ">Payout Level</label>\r\n<div class=\"col-md-6\"><select name=\"level\" class=\"form-control\">\r\n";
if ($alevel == 0) {
    print "<option value='0'>Select A Payout Level</option>";
}
$getlevels = $db->prepare("select * from idevaff_paylevels where type = ? order by level");
$getlevels->execute(array($atype));
if ($getlevels->rowCount()) {
    while ($qry = $getlevels->fetch()) {
        $lev_lev = $qry["level"];
        $lev_pay = $qry["amt"];
        if ($atype == 1) {
            $ext = "%";
            $lev_pay = $lev_pay * 100;
            $pre = "";
            print "<option value='" . $lev_lev . "'";
            if ($lev_lev == $alevel) {
                print " selected";
            }
            echo ">Level: " . $lev_lev . " - " . $pre . $lev_pay . $ext . "</option>";
        } else {
            $lev_pay = number_format($lev_pay, $decimal_symbols);
            if ($cur_sym_location == 1) {
                $lev_pay = $cur_sym . $lev_pay;
            }
            if ($cur_sym_location == 2) {
                $lev_pay = $lev_pay . " " . $cur_sym;
            }
            $lev_pay = $lev_pay . " " . $currency;
            if ($lev_lev == $alevel) {
                print " selected";
            }
            print "<option value='" . $lev_lev . "'";
            if ($lev_lev == $alevel) {
                print " selected";
            }
            echo ">Level: " . $lev_lev . " - " . $lev_pay . "</option>";
        }
    }
}
echo "</select></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Save Settings\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"submit_data_2\" value=\"1\">\r\n<input type=\"hidden\" name=\"who\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"old_type\" value=\"";
echo $atype;
echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n";
if ($getpayid != "0") {
    if ($getpayid == "1") {
        echo "<div class=\"col-md-12\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Paypal Payment Information</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"account_details.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION["csrf_token"];
        echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Paypal Account</label>\r\n<div class=\"col-md-9\"><input type=\"text\" name=\"pp_account\" class=\"form-control\" value=\"";
        echo $paypal;
        echo "\">";
        if ($paypal == "") {
            echo "<span class=\"help-block\" style=\"color:#CC0000;\">A Paypal account is required.</span>";
        }
        echo "</div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Save Settings\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"submit_data_3\" value=\"1\">\r\n<input type=\"hidden\" name=\"who\" value=\"";
        echo $clean_id;
        echo "\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
        echo $clean_id;
        echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n";
    } else {
        if ($getpayid == "2") {
            $stripe_user_data = unserialize(base64_decode($indv_data["stripe_user_data"]));
            echo "    \r\n    <div class=\"col-md-12\">\r\n        <div class=\"widget box\">\r\n            <div class=\"widget-header\"><h4><i class=\"icon-money\"></i> Stripe Payment Information</h4></div>\r\n            <div class=\"widget-content\">\r\n\t\t\t        ";
            if (is_array($stripe_user_data) && !empty($stripe_user_data) && $stripe_user_data["access_token"] != "") {
                echo "                <form class=\"form-horizontal row-border\" id=\"stripe_account_edit_form\" method=\"post\" action=\"account_details.php\">\r\n                <input name=\"csrf_token\" value=\"";
                echo $_SESSION["csrf_token"];
                echo "\" type=\"hidden\" />\r\n\t                \r\n\t\t\t\t\t<div class=\"form-group\">\r\n                        <label class=\"col-md-3 control-label\">Stripe Account</label>\r\n                        <div class=\"col-md-9\">Stripe account is connected, you can make stripe payment for this account.</div>\r\n                    </div>\r\n\t\t\t\t\t<div class=\"form-group\">\r\n\t\t\t\t\t<label class=\"col-md-3 control-label\">Delete This Account ?</label>\r\n                        <div class=\"col-md-9\">\r\n                            <input type=\"checkbox\" name=\"delete_stripe_account\" value=\"delete_stripe\">\r\n                        </div>\r\n                    </div>\r\n                    <br style=\"clear:both;\">\r\n                    <div class=\"form-actions\">\r\n                        <input type=\"submit\" value=\"Save Settings\" class=\"btn btn-primary\">\r\n                    </div>\r\n                    <input type=\"hidden\" name=\"submit_datas_4\" value=\"1\">\r\n                    <input type=\"hidden\" name=\"who\" value=\"";
                echo $clean_id;
                echo "\">\r\n                    <input type=\"hidden\" name=\"id\" value=\"";
                echo $clean_id;
                echo "\">\r\n                    <input type=\"hidden\" name=\"tab\" value=\"3\">\r\n                </form>\r\n                            ";
            } else {
                echo "\t\t\t\t\t\t\t<div class=\"col-md-12\">\r\n                                <font color=\"#CC0000\"><strong>No Payment Can Be Made</strong><br />Stripe account is not connected. Please have affiliate login and edit their account to connect a stripe account.</font>\r\n                            </div>\r\n\t\t\t\t\t\t\t";
            }
            echo "            </div>\r\n                             </div>\r\n                    </div>\r\n        <script type=\"text/javascript\">\r\n            \$('body').on('click', '#delete_stripe_account', function(){\r\n                if(\$(this).is(':checked')) {\r\n                    if(confirm('Are you sure you want to delete this account ?')) {\r\n                        \$(this).prop('checked', true);\r\n                    } else {\r\n                        \$(this).prop('checked', false);\r\n                    }\r\n                }\r\n            });\r\n        </script>\r\n   \r\n";
        } else {
            echo "<div class=\"col-md-12\">\r\n<div class=\"widget box\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> ";
            echo html_output($getpayname_result);
            echo " Payment Information</h4></div>\r\n<div class=\"widget-content\">\r\n";
            if ($getpayid == "3") {
                echo "No settings are required for this payment option. You will just complete the account crediting manually then mark the commission payment as \"archived\" like normal.";
            } else {
                if ($getpayid == "4") {
                    echo "No settings are required for this payment option. You will send the check/money order then mark the commission payment as \"archived\" like normal.";
                } else {
                    if ($getpayid == "5") {
                        echo "No settings are required for this payment option. You will send the wire transfer then mark the commission payment as \"archived\" like normal.<br /><br /><font color='#CC0000'>Special Note: </font>Due to security, PCI regulations and liability reasons, banking information is not stored in your database. To make payment via wire transfer, you will need to contact your affiliate directly to obtain this information.";
                    } else {
                        echo "No settings are available for this payment option.";
                    }
                }
            }
            echo "</div>\r\n</div>\r\n</div>\r\n";
        }
    }
}
echo "\r\n</div>\r\n\r\n\r\n\r\n<div class=\"tab-pane";
makeActiveTab(6, "no");
echo "\" id=\"tab_1_6\">\r\n";
$alldata = $db->prepare("select expire, expire_type, expire_stamp from idevaff_affiliates where id = ?");
$alldata->execute(array($clean_id));
$indv_data = $alldata->fetch();
$ex1_indi = $indv_data["expire"];
$ex2_indi = $indv_data["expire_type"];
$ex_stamp = $indv_data["expire_stamp"];
if ($ex_stamp == "0") {
    $ex1_indi = $ex1;
}
if ($ex_stamp == "0") {
    $ex2_indi = $ex2;
}
echo "<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-text-alt\"></i> Individual Account Overrides</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"account_details.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"well\">These are individual account overrides and will override your <strong>global</strong> settings.</div>\r\n\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Default <font color=\"#CC0000\">Incoming Traffic</font> Page</label>\r\n<div class=\"col-md-9\"><input type=\"text\" name=\"indi_incoming\" class=\"form-control input-width-xxlarge\" value=\"";
if (!isset($indi_incoming)) {
    echo "http://";
} else {
    echo $indi_incoming;
}
echo "\" style=\"display:inline-block;\">";
if (isset($indi_incoming)) {
    echo " <a href=\"";
    echo $indi_incoming;
    echo "\" style=\"display:inline-block;\" target=\"_blank\" class=\"btn btn-sm btn-default\">visit</a>";
}
echo "</div>\r\n</div>\r\n\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Disable VAT</label>\r\n<div class=\"col-md-4\"><label class=\"checkbox-inline\"><input type=\"checkbox\" name=\"vat_override\" value=\"1\"";
if ($vat_override == "1") {
    echo " checked=\"checked\"";
}
echo " /></label></div>\r\n</div>\r\n\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Customer Tracking Duration</label>\r\n<div class=\"col-md-9\"><input style=\"display:inline-block\" type=\"text\" name=\"exp1\" value=\"";
echo html_output($ex1_indi);
echo "\" class=\"form-control input-width-small\"> \r\n<select style=\"display: inline-block\" class=\"form-control input-width-small\" name=\"exp2\">\r\n<option value=\"1\" ";
if ($ex2_indi == "1") {
    echo " selected=\"selected\"";
}
echo ">Minutes</option>\r\n<option value=\"2\" ";
if ($ex2_indi == "2") {
    echo " selected=\"selected\"";
}
echo ">Hours</option>\r\n<option value=\"3\" ";
if ($ex2_indi == "3") {
    echo " selected=\"selected\"";
}
echo ">Days</option>\r\n<option value=\"4\" ";
if ($ex2_indi == "4") {
    echo " selected=\"selected\"";
}
echo ">Years</option></select> <span class=\"help-block\">Set to 50 years for lifetime.</span>\r\n<input type=\"checkbox\" name=\"cust_dur_reset\" value=\"1\" /> Tick for default setting.\r\n</div>\r\n</div>\r\n\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Save Settings\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"submit_data_6\" value=\"1\">\r\n<input type=\"hidden\" name=\"who\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
echo $clean_id;
echo "\">\r\n<input type=\"hidden\" name=\"old_type\" value=\"";
echo $atype;
echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"6\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(4, "no");
echo "\" id=\"tab_1_4\">\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-comment-alt\"></i> Affiliate Notes</h4><span class=\"pull-right\"><a href=\"notes.php?note_to=";
echo $clean_id;
echo "\" class=\"btn btn-primary btn-sm\">Create A New Note</a></span></div>\r\n<div class=\"widget-content\">\r\n\r\n";
$getnotes = $db->prepare("select * from idevaff_notes where note_to = ? and note_attach = '1' order by id DESC");
$getnotes->execute(array($clean_id));
if ($getnotes->rowCount()) {
    while ($qry = $getnotes->fetch()) {
        $edit_sub = stripslashes($qry["note_sub"]);
        $edit_con = stripslashes($qry["note_con"]);
        $edit_date = date($dateformat, $qry["stamp"]);
        $note_image = $qry["note_image"];
        $note_image_location = $qry["note_image_location"];
        if ($note_image != "") {
            list($width, $height, $type, $attr) = getimagesize("../assets/note_images/" . $note_image);
            $draw_image = "<img src=\"../assets/note_images/" . $note_image . "\" width=\"" . $width . "\" height=\"" . $height . "\" border=\"0px;\" />";
        }
        echo "\r\n<table class=\"table table-striped table-bordered table-highlight-head\">\r\n<tbody>\r\n<tr>\r\n<td>Date Created: ";
        echo html_output($edit_date);
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td><h4>";
        echo html_output($edit_sub);
        echo "</h4>\r\n";
        if ($note_image == "") {
            echo html_output($edit_con);
        } else {
            if ($note_image_location == "0") {
                echo $draw_image . "<p style='margin-top:10px;'>" . html_output($edit_con) . "</p>";
            } else {
                if ($note_image_location == "1") {
                    echo "<p style='margin-top:10px;'>" . html_output($edit_con) . "</p>" . $draw_image;
                }
            }
        }
        echo "</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n\r\n";
    }
} else {
    echo "No notes have been created for this affiliate.\r\n";
}
echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(5, "no");
echo "\" id=\"tab_1_5\">\r\n\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-text-file-alt\"></i> Custom Fields</h4></div>\r\n<div class=\"widget-content\">\r\n\r\n";
$getcustomrows = $db->query("select id, title from idevaff_form_fields_custom");
if ($getcustomrows->rowCount()) {
    echo "<table class=\"table table-striped table-bordered table-highlight-head\">\r\n<tbody>\r\n";
    while ($qry = $getcustomrows->fetch()) {
        $group_id = $qry["id"];
        $custom_title = $qry["title"];
        $getvars = $db->prepare("select * from idevaff_form_custom_data where custom_id = ? and affid = ?");
        $getvars->execute(array($group_id, $clean_id));
        $getvars = $getvars->fetch();
        $entry_id = $getvars["id"];
        $custom_id = $getvars["custom_id"];
        $custom_value = $getvars["custom_value"];
        echo "<form class=\"form-horizontal row-border\" method=\"post\" action=\"account_details.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION["csrf_token"];
        echo "\" type=\"hidden\" />\r\n<tr>\r\n<td>\r\n";
        echo html_output($custom_title);
        echo "</td>\r\n<td>\r\n<input type=\"hidden\" name=\"custom_id\" value=\"";
        echo $group_id;
        echo "\">\r\n<input type=\"hidden\" name=\"id\" value=\"";
        echo $clean_id;
        echo "\">\r\n<input type=\"hidden\" name=\"id_update\" value=\"";
        echo $entry_id;
        echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"5\">\r\n<input type=\"text\" name=\"custom_value\" size=\"20\" value=\"";
        echo $custom_value;
        echo "\" class=\"form-control input-width-xxlarge\" style=\"display:inline-block;\" /> <input  style=\"display:inline-block;\" type=\"submit\" class=\"btn btn-primary\" value=\"Edit\">\r\n</td>\r\n</tr>\r\n\r\n</form>\r\n";
    }
    echo "</tbody>\r\n</table>\r\n";
} else {
    echo "No custom fields created.\r\n";
}
echo "</div>\r\n</div>\r\n</div>\r\n\r\n\r\n\r\n\r\n\r\n\r\n</div>\r\n</div>\r\n\r\n\r\n";
include "templates/footer.php";

?>