<?php

include_once "../API/config.php";
include_once "includes/session.check.php";
if (isset($_REQUEST["archive"])) {
    $leftSubActiveMenu = "reports";
} else {
    $leftSubActiveMenu = "commissions";
}
require "templates/header.php";
if (!isset($_REQUEST["cfg"])) {
    $details = NULL;
    $data = NULL;
    $table = NULL;
    if (isset($_REQUEST["sales"])) {
        if (isset($_POST["commission_notes"])) {
            $st = $db->prepare("update idevaff_sales set notes = ? where record = ?");
            $st->execute(array($_POST["commission_notes"], $_POST["record_id"]));
            $success_message = "<strong>Success!</strong> Commission notes updated.";
        }
        if (is_numeric($_REQUEST["sales"])) {
            $data = $_REQUEST["sales"];
        } else {
            $data = "0";
        }
        $table = "sales";
        $details = $db->prepare("select * from idevaff_sales where record = ?");
        $details->execute(array($data));
    }
    if (isset($_REQUEST["archive"])) {
        if (isset($_POST["commission_notes"])) {
            $st = $db->prepare("update idevaff_archive set notes = ? where record = ?");
            $st->execute(array($_POST["commission_notes"], $_POST["record_id"]));
            $success_message = "<strong>Success!</strong> Commission notes updated.";
        }
        if (is_numeric($_REQUEST["archive"])) {
            $data = $_REQUEST["archive"];
        } else {
            $data = "0";
        }
        $table = "archive";
        $details = $db->prepare("select * from idevaff_archive where record = ?");
        $details->execute(array($data));
    }
    if (isset($details) && isset($data)) {
        $qry = $details->fetch();
        $record = $qry["record"];
        $id = $qry["id"];
        $approved = NULL;
        if (isset($table) && $table == "sales") {
            $approved = $qry["approved"];
        }
        $type = $qry["type"];
        $date = date($dateformat, $qry["code"]);
        $time = date($timeformat, $qry["code"]);
        $payment = number_format($qry["payment"], $decimal_symbols);
        $amount = $qry["amount"];
        $tracking = $qry["tracking"];
        $op1d = $qry["op1"];
        $op2d = $qry["op2"];
        $op3d = $qry["op3"];
        $profile = $qry["profile"];
        $top_tier_tag = $qry["top_tier_tag"];
        $override = $qry["override"];
        $tracking_method = $qry["tracking_method"];
        $commission_notes = $qry["notes"];
        if (empty($commission_notes) || trim($commission_notes) === "") {
            $tabnotes_count = "0";
            $tabnotes_color = "label-default";
        } else {
            $tabnotes_count = "1";
            $tabnotes_color = "label-primary";
        }
        $rec_id = NULL;
        if (isset($table) && $table == "sales") {
            $rec_id = $qry["rec_id"];
        }
        $listref = $qry["referring_url"];
        $converted_amount_raw = $qry["converted_amount"];
        $conversion_currency = $qry["currency"];
        $sub_id = $qry["sub_id"];
        if (!$sub_id) {
            $sub_id = "None";
        }
        $ip = $qry["ip"];
        $flag_country = strtolower($qry["geo"]);
        $flag = "";
        if (file_exists($path . "/admin/images/geo_flags/" . $flag_country . ".png")) {
            $flag = "<img src=\"images/geo_flags/" . $flag_country . ".png\" height=\"24\" width=\"24\" border=\"none;\" />";
        }
        $tid_count = 0;
        if ($qry["sub_id"] != "") {
            $sub_id = $qry["sub_id"];
            $tid_count = $tid_count + 1;
        } else {
            $sub_id = "None";
        }
        if ($qry["tid1"] != "") {
            $tid1 = $qry["tid1"];
            $tid_count = $tid_count + 1;
        } else {
            $tid1 = "None";
        }
        if ($qry["tid2"] != "") {
            $tid2 = $qry["tid2"];
            $tid_count = $tid_count + 1;
        } else {
            $tid2 = "None";
        }
        if ($qry["tid3"] != "") {
            $tid3 = $qry["tid3"];
            $tid_count = $tid_count + 1;
        } else {
            $tid3 = "None";
        }
        if ($qry["tid4"] != "") {
            $tid4 = $qry["tid4"];
            $tid_count = $tid_count + 1;
        } else {
            $tid4 = "None";
        }
        if (0 < $tid_count) {
            $tabtid_color = "label-danger";
        } else {
            $tabtid_color = "label-default";
        }
        if ($qry["target_url"]) {
            $target_url = "<a href=\"" . $qry["target_url"] . "\" target=\"_blank\">" . $qry["target_url"] . "</a>";
        } else {
            $target_url = "Not available.";
        }
        $details2 = $db->prepare("select username from idevaff_affiliates where id = ?");
        $details2->execute(array($id));
        $qry2 = $details2->fetch();
        $user = $qry2["username"];
        $optional_count = 0;
        if ($op1d == "" || $op1d == "N/A") {
            $op1d = "N/A";
        } else {
            $optional_count = $optional_count + 1;
        }
        if ($op2d == "" || $op2d == "N/A") {
            $op2d = "N/A";
        } else {
            $optional_count = $optional_count + 1;
        }
        if ($op3d == "" || $op3d == "N/A") {
            $op3d = "N/A";
        } else {
            $optional_count = $optional_count + 1;
        }
        if (0 < $optional_count) {
            $tabopt_color = "label-danger";
        } else {
            $tabopt_color = "label-default";
        }
        if ($table == "archive") {
            $status = "Paid";
        } else {
            if ($approved == 1) {
                $status = "Currently Approved";
            } else {
                if ($approved == 0) {
                    $status = "Pending Approval";
                }
            }
        }
        if ($top_tier_tag) {
            $type = "Tier Commission";
        } else {
            if ($override == 1) {
                $type = "Override Commission";
            } else {
                if ($top_tier_tag == 0) {
                    $type = "Standard Commission";
                }
            }
        }
        if (!$tracking) {
            $tracking = "N/A";
        }
        if (!$amount) {
            $amount = "N/A";
        } else {
            if (0 < $converted_amount_raw) {
                $temp_cur_sym = $db->prepare("select currency_symbol from idevaff_currency where currency_code = ?");
                $temp_cur_sym->execute(array($conversion_currency));
                $temp_cur_sym = $temp_cur_sym->fetch();
                $temp_cur_sym = $temp_cur_sym["currency_symbol"];
                $converted_amount = number_format($converted_amount_raw, $decimal_symbols);
                if ($cur_sym_location == 1) {
                    $converted_amount = $cur_sym . $converted_amount;
                }
                if ($cur_sym_location == 2) {
                    $converted_amount = $converted_amount . " " . $cur_sym;
                }
                $converted_amount = $converted_amount;
                $disamount = $temp_cur_sym . $amount . " " . $conversion_currency . " was converted to " . $converted_amount . " " . $currency;
            } else {
                $amount = number_format($amount, $decimal_symbols);
                if ($cur_sym_location == 1) {
                    $amount = $cur_sym . $amount;
                }
                if ($cur_sym_location == 2) {
                    $amount = $amount . " " . $cur_sym;
                }
                $disamount = $amount . " " . $currency;
            }
        }
        if (!$profile) {
            $profile = 9000;
        }
        if ($profile == 72198) {
            $profile = 0;
        }
        $profile_to_check = $profile;
        if ($profile == 0) {
            $profile_to_check = 72198;
        }
        $integration = $db->prepare("select * from idevaff_integration where type = ?");
        $integration->execute(array($profile_to_check));
        $iconfig = $integration->fetch();
        $opvar1_cart = $iconfig["cart_var1"];
        $use_op1 = $iconfig["use_var1"];
        $opvar1_tag = $iconfig["tag_var1"];
        $opvar2_cart = $iconfig["cart_var2"];
        $use_op2 = $iconfig["use_var2"];
        $opvar2_tag = $iconfig["tag_var2"];
        $opvar3_cart = $iconfig["cart_var3"];
        $use_op3 = $iconfig["use_var3"];
        $opvar3_tag = $iconfig["tag_var3"];
        $custom_count = $db->query("SELECT COUNT(*) FROM idevaff_form_fields_custom where display_record = '1' order by sort");
        $custom_count = $custom_count->fetchColumn();
        if (0 < $custom_count) {
            $tabcustom_color = "label-danger";
        } else {
            $tabcustom_color = "label-default";
        }
        $profile_name = $db->prepare("select name from idevaff_carts where id = ?");
        $profile_name->execute(array($profile));
        $qry = $profile_name->fetch();
        $tdisp = $qry["name"];
        if (!isset($tdisp)) {
            if ($profile == "0") {
                $tdisp = "Generic Tracking Pixel";
            }
            if ($profile == "44") {
                $tdisp = "Pay-Per-Lead Tracking Pixel";
            }
        }
        echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Commissions</li>\r\n<li class=\"current\"> <a href=\"commissions_approved.php\">Commission Details</a></li>\r\n</ul>\r\n";
        include "templates/crumb_right.php";
        echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Commission Details</h3><span>This commission has already been approved and/or paid.</span></div>\r\n";
        include "templates/stats.php";
        echo "</div>\r\n\r\n";
        include "includes/notifications.php";
        echo "\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
        makeActiveTab(1);
        echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">General Details</a></li>\r\n<li ";
        makeActiveTab(2);
        echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Optional Data <span class=\"label";
        if (isset($tabopt_color)) {
            echo " " . $tabopt_color;
        }
        echo "\">";
        echo html_output($optional_count);
        echo "</span></a></li>\r\n<li ";
        makeActiveTab(3);
        echo "><a href=\"#tab_1_3\" data-toggle=\"tab\">Tracking IDs <span class=\"label";
        if (isset($tabtid_color)) {
            echo " " . $tabtid_color;
        }
        echo "\">";
        echo html_output($tid_count);
        echo "</span></a></li>\r\n<li ";
        makeActiveTab(4);
        echo "><a href=\"#tab_1_4\" data-toggle=\"tab\">Custom Fields <span class=\"label";
        if (isset($tabcustom_color)) {
            echo " " . $tabcustom_color;
        }
        echo "\">";
        echo html_output($custom_count);
        echo "</span></a></li>\r\n<li ";
        makeActiveTab(6);
        echo "><a href=\"#tab_1_6\" data-toggle=\"tab\">Notes <span class=\"label";
        if (isset($tabnotes_color)) {
            echo " " . $tabnotes_color;
        }
        echo "\">";
        echo html_output($tabnotes_count);
        echo "</a></li>\r\n</ul>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
        makeActiveTab(1, "no");
        echo "\" id=\"tab_1_1\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-money\"></i> General Commission Details</h4>\r\n";
        if ($table == "archive") {
            echo "<span class=\"pull-right\"><span class=\"pull-right\"><a href=\"reports.php?report=3\"><button class=\"btn btn-sm btn-success\" style=\"display:inline-block;\">Choose Another Report</button></a> \r\n<a href=\"reports.php?report=3&sub_report=4\"><button class=\"btn btn-sm btn-danger\" style=\"display:inline-block;\">Choose Another Affiliate</button></a></span>";
        }
        echo "\r\n";
        if ($table != "archive" && $approved == "1") {
            echo "<span class=\"pull-right\"><span class=\"pull-right\"><a href=\"commissions_approved.php?unapprove=";
            echo html_output($record);
            echo "\"><button class=\"btn btn-danger btn-sm\">Un-Approve This Commission</button></a></span>";
        }
        echo "</div>\r\n<div class=\"widget-content\">\r\n\r\n\r\n\r\n<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<tr>\r\n<td>Account ID</td>\r\n<td>";
        echo html_output($id);
        echo "</td>\r\n<td>Commission Status</td>\r\n<td>";
        echo html_output($status);
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Affiliate</td>\r\n<td><a href=\"account_details.php?id=";
        echo html_output($id);
        echo "\">";
        echo html_output($user);
        echo "</a></td>\r\n<td>Type of Commission</td>\r\n<td>";
        echo html_output($type);
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Date</td>\r\n<td>";
        echo html_output($date);
        echo "</td>\r\n<td>Commission Amount</td>\r\n<td>";
        if ($cur_sym_location == 1) {
            echo html_output($cur_sym);
        }
        echo html_output($payment);
        if ($cur_sym_location == 2) {
            echo " " . html_output($cur_sym) . " ";
        }
        echo " " . $currency;
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Time</td>\r\n<td>";
        echo html_output($time);
        echo "</td>\r\n<td>Sale Amount</td>\r\n<td>";
        echo html_output($disamount);
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td>Order Number</td>\r\n<td>";
        echo html_output($tracking);
        echo "</td>\r\n<td>Customer IP</td>\r\n<td>";
        echo html_output($ip);
        echo "<span class=\"pull-right\">";
        echo $flag;
        echo "</span></td>\r\n</tr>\r\n<tr>\r\n<td>Cart/Billing System</td>\r\n<td>";
        if (!isset($tdisp)) {
            echo "N/A";
        } else {
            echo html_output($tdisp);
        }
        echo "</td>\r\n<td>Tracking Method<span class=\"pull-right\"><a data-toggle=\"modal\" href=\"#tracking_method_info\" class=\"btn btn-xs btn-info\">info</a></span></td>\r\n<td>";
        if ($tracking_method == "") {
            echo "N/A";
        } else {
            echo html_output($tracking_method);
        }
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td width=\"100%\" colspan=\"4\" style=\"background:#428bca; color:#f3f3f3;\">Associated Page URLs</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">Target URL</td>\r\n<td colspan=\"2\">";
        echo $target_url;
        echo "</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">Referring URL</td>\r\n<td colspan=\"2\">";
        if ($listref) {
            echo "<a href=\"" . $listref . "\" target=\"_blank\">" . $listref . "</a>";
        } else {
            echo "Not available. Possible bookmark or email link.";
        }
        echo "</td>\r\n</tr>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"modal fade\" id=\"tracking_method_info\">\r\n<div class=\"modal-dialog\">\r\n<div class=\"modal-content\">\r\n<div class=\"modal-header\">\r\n<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\r\n<h4 class=\"modal-title\">Tracking Method</h4>\r\n</div>\r\n<div class=\"modal-body\">There are several methods and factors involved when creating a commission. The method used depends on the different overrides, API calls, coupon codes and priority settings you have selected. This information is purely informational.\r\n<br /><br />\r\n<table class=\"table valign table-striped\">\r\n<tbody>\r\n<tr><td>N/A</td><td>Not available.</td></tr>\r\n<tr><td>N/A - Manually Created</td><td>Not available. Commission was manually created.</td></tr>\r\n<tr><td>IP Address</td><td>Standard IP tracking log was used for this commission.</td></tr>\r\n<tr><td>Cookie</td><td>Standard cookie was used for this commission.</td></tr>\r\n<tr><td>IP Address from Paypal</td><td>The Paypal IPN sent in the IP address for lookup.</td></tr>\r\n<tr><td>IP Address - API Style</td><td>An IP address was sent in via API style call.</td></tr>\r\n<tr><td>Affiliate ID Override</td><td>An affiliate ID was sent in, overriding all tracking logs.</td></tr>\r\n<tr><td>Coupon Code</td><td>A coupon code was used - includes actual code used.</td></tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"modal-footer\">\r\n<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
        makeActiveTab(2, "no");
        echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-text-alt\"></i> Optional Data</h4></div>\r\n<div class=\"widget-content\">\r\n";
        if (0 < $optional_count) {
            echo "<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n";
            if ($use_op1 == 1 && $opvar1_tag && $opvar1_cart) {
                echo "<tr><td width='30%'>";
                echo html_output($opvar1_tag);
                echo "</td><td width='70%'>";
                echo html_output($op1d);
                echo "</td></tr>\r\n";
            }
            if ($use_op2 == 1 && $opvar2_tag && $opvar2_cart) {
                echo "<tr><td width='30%'>";
                echo html_output($opvar2_tag);
                echo "</td><td width='70%'>";
                echo html_output($op2d);
                echo "</td></tr>\r\n";
            }
            if ($use_op3 == 1 && $opvar3_tag && $opvar3_cart) {
                echo "<tr><td width='30%'>";
                echo html_output($opvar3_tag);
                echo "</td><td width='70%'>";
                echo html_output($op3d);
                echo "</td></tr>\r\n";
            }
            echo "</table>\r\n";
        } else {
            echo "No optional data has been added to this commission.\r\n";
        }
        echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
        makeActiveTab(3, "no");
        echo "\" id=\"tab_1_3\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-text-alt\"></i> Tracking IDs</h4></div>\r\n<div class=\"widget-content\">\r\n";
        if ($tid1 != "None" || $tid2 != "None" || $tid3 != "None" || $tid4 != "None") {
            echo "<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<tr>\r\n<td width='20%'>TID1</td>\r\n<td width='80%'>";
            echo html_output($tid1);
            echo "</td>\r\n</tr>\r\n<tr>\r\n<td width='20%'>TID2</td>\r\n<td width='80%'>";
            echo html_output($tid2);
            echo "</td>\r\n</tr>\r\n<tr>\r\n<td width='20%'>TID3</td>\r\n<td width='80%'>";
            echo html_output($tid3);
            echo "</td>\r\n</tr>\r\n<tr>\r\n<td width='20%'>TID4</td>\r\n<td width='80%'>";
            echo html_output($tid4);
            echo "</td>\r\n</tr>\r\n<tr>\r\n<td width='20%'>SUB ID</td>\r\n<td width='80%'>";
            echo html_output($sub_id);
            echo "</td>\r\n</tr>\r\n</table>\r\n";
        } else {
            echo "No TIDs were used for this commission.\r\n";
        }
        echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
        makeActiveTab(4, "no");
        echo "\" id=\"tab_1_4\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-text-alt\"></i> Custom Fields</h4></div>\r\n<div class=\"widget-content\">\r\n";
        if (0 < $custom_count) {
            $getcustomrows = $db->query("select id, title from idevaff_form_fields_custom where display_record = '1' order by sort");
            echo "<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n";
            while ($qry = $getcustomrows->fetch()) {
                $group_id = $qry["id"];
                $custom_title = $qry["title"];
                $getvars = $db->prepare("select custom_value from idevaff_form_custom_data where custom_id = ? and affid = ?");
                $getvars->execute(array($group_id, $id));
                $getvars = $getvars->fetch();
                $custom_value = $getvars["custom_value"];
                if ($custom_value == NULL) {
                    $custom_value = "N/A";
                }
                echo "<tr>";
                echo "<td width='30%'>" . $custom_title . "\n</td>";
                echo "<td width='70%'>" . $custom_value . "\n</td>";
                echo "</tr>";
            }
            echo "</table>\r\n";
        } else {
            echo "No custom field answers being displayed on commission records.\r\n";
        }
        echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
        makeActiveTab(6, "no");
        echo "\" id=\"tab_1_6\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-file-alt\"></i> Commission Notes</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"commission_details.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION["csrf_token"];
        echo "\" type=\"hidden\" />\r\n<div class=\"alert alert-warning\">Commission notes are only viewable to administrative staff.</div>\r\n<div class=\"form-group\">\r\n<div class=\"col-md-12\"><textarea rows=\"12\" name=\"commission_notes\" class=\"form-control\">";
        echo $commission_notes;
        echo "</textarea></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Update Notes\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"record_id\" value=\"";
        echo $record;
        echo "\">\r\n";
        if (isset($_REQUEST["sales"])) {
            echo "<input type=\"hidden\" name=\"sales\" value=\"";
            echo $record;
            echo "\">";
        }
        if (isset($_REQUEST["archive"])) {
            echo "<input type=\"hidden\" name=\"archive\" value=\"";
            echo $record;
            echo "\">";
        }
        echo "<input type=\"hidden\" name=\"tab\" value=\"6\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n";
    }
}
include "templates/footer.php";
echo "\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n";

?>