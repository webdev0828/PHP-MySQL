<?php

if (file_exists("../install/")) {
    header("Location: error.php");
}
$cur_admin_page = curpagename();
if (isset($_REQUEST["rem_pending"])) {
    $rem_pending = $_REQUEST["rem_pending"];
    $st = $db->prepare("delete from idevaff_coupons_pending where id = ?");
    $st->execute(array($rem_pending));
    $success_message = "<strong>Success!</strong> Coupon code removed from pending list.";
}
if (isset($_POST["coupon_type"])) {
    $coupon_code = $_POST["coupon_code"];
    $coupon_amount = $_POST["coupon_amount"];
    $coupon_affiliate = $_POST["coupon_affiliate"];
    $coupon_type = $_POST["coupon_type"];
    $email_notify = $_POST["email_notify"];
    if (isset($_POST["code_id"])) {
        $code_id = $_POST["code_id"];
    }
    $discount_amount = NULL;
    $discount_amount = $_POST["discount_amount"];
    $query = $db->prepare("select id from idevaff_coupons where coupon_code = ?");
    $query->execute(array($coupon_code));
    if (0 < $query->rowCount()) {
        $fail_message = "<strong>Error!</strong> Coupon code already exists.";
    } else {
        if ($coupon_code == "") {
            $fail_message = "<strong>Error!</strong> Please enter a coupon code.";
        } else {
            if ($coupon_code == "") {
                $fail_message = "<strong>Error!</strong> Commission amount is missing.";
            } else {
                if ($coupon_amount == "" || $coupon_amount == "0") {
                    $fail_message = "<strong>Error!</strong> Commission amount is missing.";
                } else {
                    function amount_valid($credential)
                    {
                        $rtn_value = false;
                        if (get_magic_quotes_gpc()) {
                            $credential = stripslashes($credential);
                        }
                        if (!preg_match("/[^0-9.]/i", $credential)) {
                            $rtn_value = true;
                        }
                        return $rtn_value;
                    }
                    if (!amount_valid($coupon_amount)) {
                        $fail_message = "<strong>Error!</strong> Invalid commission amount. Use only numeric values.";
                    } else {
                        function coupon_valid($credential)
                        {
                            $rtn_value = false;
                            if (get_magic_quotes_gpc()) {
                                $credential = stripslashes($credential);
                            }
                            if (!preg_match("/[^a-z0-9_-]/i", $credential)) {
                                $rtn_value = true;
                            }
                            return $rtn_value;
                        }
                        if (!coupon_valid($coupon_code)) {
                            $fail_message = "<strong>Error!</strong> Invalid coupon code. Use only alpha-numeric characters, underscores and hyphens.";
                        } else {
                            if (isset($code_id)) {
                                $st = $db->prepare("delete from idevaff_coupons_pending where id = ?");
                                $st->execute(array($code_id));
                                $warning_message = "<strong>Notice!</strong> The affiliates coupon code request has also been removed from the system.";
                            }
                            $st = $db->prepare("insert into idevaff_coupons (coupon_code, coupon_amount, coupon_affiliate, coupon_type, discount_amount) VALUES (?, ?, ?, ?, ?)");
                            $st->execute(array($coupon_code, $coupon_amount, $coupon_affiliate, $coupon_type, $discount_amount));
                            $success_message = "<strong>Success!</strong> Coupon code added.";
                            if ($email_notify == "1") {
                                include $path . "/templates/email/affiliate.new_coupon.php";
                            }
                        }
                    }
                }
            }
        }
    }
}
if (isset($_POST["quickbooks"])) {
    include_once "includes/quickbooks.php";
}
if (isset($_POST["export"])) {
    define("IDEV_REPORTS", true);
    include_once "export/export.php";
}
if (isset($_POST["import"])) {
    if ($_FILES["csv_upload"]["name"] != "") {
        include_once "includes/import.php";
    } else {
        $fail_message = "<strong>Error!</strong> Select a file to import.";
    }
}
if (isset($_POST["import_coupons"])) {
    if ($_FILES["csv_upload"]["name"] != "") {
        include_once "includes/import_cc.php";
    } else {
        $fail_message = "<strong>Error!</strong> Select a file to import.";
    }
}
include "../includes/video_source/key-gen.php";
if (isset($_REQUEST["admin_theme"])) {
    if ($_REQUEST["admin_theme"] == "dark") {
        $update_admin_theme = "1";
    } else {
        $update_admin_theme = "0";
    }
    $sbtheme = $db->prepare("update idevaff_config set admin_theme = ?");
    $sbtheme->execute(array($update_admin_theme));
}
$admin_theme = $db->query("select admin_theme from idevaff_config");
$admin_theme->setFetchMode(PDO::FETCH_ASSOC);
$admin_theme = $admin_theme->fetch();
$selected_theme = $admin_theme["admin_theme"];
if ($selected_theme == 1) {
    $theme_added = "copy_dark";
    $body_added = " class=\"theme-dark\"";
} else {
    $theme_added = "copy_light";
    $body_added = NULL;
}
echo "<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
echo $char_set;
echo "\" />\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n<title>Sublime Revenue Administrative Center</title>\r\n<link rel=\"shortcut icon\" href=\"templates/images/favicon.png\" type=\"image/x-icon\" />\r\n<link href=\"templates/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<!--[if lt IE 9]><link rel=\"stylesheet\" type=\"text/css\" href=\"templates/plugins/jquery-ui/jquery.ui.1.10.2.ie.css\"/><![endif]-->\r\n<link href=\"templates/css/main.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/css/plugins.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/css/responsive.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/css/icons.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link rel=\"stylesheet\" href=\"templates/css/fontawesome/font-awesome.min.css\">\r\n<!--[if IE 7]><link rel=\"stylesheet\" href=\"templates/css/fontawesome/font-awesome-ie7.min.css\"><![endif]-->\r\n<!--[if IE 8]><link href=\"templates/css/ie8.css\" rel=\"stylesheet\" type=\"text/css\" /><![endif]-->\r\n<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>\r\n<link href=\"templates/css/custom.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/css/menu.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/css/responsive.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/bootstrap/css/bootstrap-social.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<link href=\"templates/css/colorpicker/jquery.minicolors.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n\r\n<script type=\"text/javascript\" src=\"templates/js/libs/jquery-1.10.2.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/bootstrap/js/bootstrap.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/libs/underscore.min.js\"></script>\r\n<!--[if lt IE 9]><script src=\"templates/js/libs/html5shiv.js\"></script><![endif]-->\r\n<script type=\"text/javascript\" src=\"templates/plugins/touchpunch/jquery.ui.touch-punch.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/event.swipe/jquery.event.move.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/event.swipe/jquery.event.swipe.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/libs/breakpoints.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/respond/respond.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/cookie/jquery_cookie_min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/slimscroll/jquery.slimscroll.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/slimscroll/jquery.slimscroll.horizontal.min.js\"></script>\r\n<!--[if lt IE 9]><script type=\"text/javascript\" src=\"templates/plugins/flot/excanvas.min.js\"></script><![endif]-->\r\n<script type=\"text/javascript\" src=\"templates/plugins/sparkline/jquery.sparkline.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.tooltip.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.resize.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.time.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.orderBars.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.pie.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.growraf.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/flot/jquery.flot.categories.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/blockui/jquery.blockUI.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/fullcalendar/fullcalendar.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/noty/jquery.noty.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/noty/layouts/top.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/noty/themes/default.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/uniform/jquery.uniform.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/select2/select2.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/datatables/jquery.dataTables.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/datatables/tabletools/TableTools.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/datatables/colvis/ColVis.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/datatables/DT_bootstrap.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/dynamic_tables.js?v=";
echo time();
echo "\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/dynamic_tables_one_page.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/dynamic_tables_special.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/tagsinput/jquery.tagsinput.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/fileinput/fileinput.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/duallistbox/jquery.duallistbox.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/plugins/bootstrap-inputmask/jquery.inputmask.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/app.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/plugins.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/plugins.form-components.js\"></script>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"templates/fancybox2/jquery.fancybox.css\">\r\n<script type=\"text/javascript\" src=\"templates/fancybox2/jquery.fancybox.pack.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/fancybox2/helpers/jquery.fancybox-media.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/colorpicker/jquery.minicolors.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/clipboard.min.js\"></script>\r\n<script type=\"text/javascript\">\r\n\$(document).ready(function(){\r\n\t\"use strict\";\r\n\tApp.init();\r\n\tPlugins.init();\r\n\tFormComponents.init();\r\n\t\$('.select_nav').change(function(){\r\n\t\twindow.location.href = \$(this).val();\r\n\t});\r\n});\r\n</script>\r\n\r\n<script type=\"text/javascript\" src=\"templates/js/custom.js?v=";
echo time();
echo "\"></script>\r\n";
$script_name = explode(DIRECTORY_SEPARATOR, $_SERVER["SCRIPT_FILENAME"]);
$script_name = end($script_name);
if ("dashboard.php" == $script_name) {
    echo "<link href=\"templates/js/jquery-jvectormap/jquery-jvectormap-2.0.3.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n<script type=\"text/javascript\" src=\"templates/js/charts/dashboard.js.php\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/jquery-jvectormap/jquery-jvectormap-world-mill.js\"></script>\r\n";
}
if ("account_details.php" == $script_name) {
    echo "<script type=\"text/javascript\" src=\"templates/js/charts/lifetime_activity.js.php?id=";
    echo html_output($_REQUEST["id"]);
    echo "\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/charts/month_activity.js.php?id=";
    echo html_output($_REQUEST["id"]);
    echo "\"></script>\r\n\t";
}
echo "<script type=\"text/javascript\" src=\"templates/js/date.js\"></script>\r\n<script type=\"text/javascript\" src=\"templates/js/menu.js\"></script>\r\n\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"../includes/video_source/skin/functional.css\">\r\n<script type=\"text/javascript\" src=\"../includes/video_source/flowplayer.min.js\"></script>\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/css/intlTelInput.css\">\r\n    <style>\r\n        .iti-flag {background-image: url(\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/img/flags.png\");}\r\n\r\n        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {\r\n            .iti-flag {background-image: url(\"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/img/flags@2x.png\");}\r\n        }\r\n\r\n        .intl-tel-input.allow-dropdown input, .intl-tel-input.allow-dropdown input[type=\"text\"], .intl-tel-input.allow-dropdown input[type=\"tel\"], .intl-tel-input.separate-dial-code input, .intl-tel-input.separate-dial-code input[type=\"text\"], .intl-tel-input.separate-dial-code input[type=\"tel\"] {\r\n            padding-left: 52px !important;\r\n        }\r\n    </style>\r\n</head>\r\n\r\n";
if (isset($calc_commissions)) {
    echo "<body";
    echo $body_added;
    echo " onload=\"calc_sum()\">\r\n";
} else {
    echo "<body";
    echo $body_added;
    echo ">\r\n";
}
echo "\r\n\r\n<header class=\"header navbar navbar-fixed-top\" role=\"banner\">\r\n<div class=\"container\">\r\n<ul class=\"nav navbar-nav\"><li class=\"nav-toggle\"><a href=\"javascript:void();\" title=\"\"><i class=\"icon-reorder\"></i></a></li></ul>\r\n<a class=\"navbar-brand\" href=\"dashboard.php\"><img src=\"images/idevaffiliate_logo.png\" alt=\"logo\" style=\"height:40; width:200px; border:0px;\" /></a>\r\n";
include "templates/top_menu.php";
include "templates/top_right_menu.php";
echo "\r\n<div style=\"clear:both;\"></div>\r\n\r\n<div class=\"main_nav_res visible-sm visible-xs\">\r\n\t<select class=\"select_nav form-control\">\r\n    \t<option selected=\"selected\">Site Navigation</option>\r\n        \r\n        <optgroup label=\"System Settings\">\r\n        \t<option value=\"setup.php?action=1\">General Settings</option>\r\n            <option value=\"setup.php?action=54\">Localization</option>\r\n            <option value=\"setup.php?action=31\">Email Settings</option>\r\n            <option value=\"setup.php?action=35\">Paypal Payments</option>\r\n            <option value=\"setup.php?action=62\">Mailing List Integration</option>\r\n            <option value=\"setup.php?action=71\">Import Affiliate Accounts</option>\r\n        </optgroup>\r\n        \r\n        <optgroup label=\"Cart Integration\">\r\n        \t<option value=\"setup.php?action=10\">Shopping Cart Integration Wizard</option>\r\n            <option value=\"setup.php?action=2\">Integration Profiles &amp; Instructions</option>\r\n        </optgroup>  \r\n        \r\n        <optgroup label=\"General Settings\">  \r\n            <option value=\"setup.php?action=16\">Customer Tracking</option>\r\n            <option value=\"setup.php?action=19\">Affiliate Links</option>\r\n            <option value=\"setup.php?action=47\">Advanced Tracking</option>\r\n            <option value=\"setup.php?action=53\">Fraud Control</option>\r\n            <option value=\"setup.php?action=18\">Performance Rewards</option>\r\n            <option value=\"setup.php?action=17\">Offline Marketing</option>\r\n            <option value=\"setup.php?action=43\">Affiliate Co-Branding</option>\r\n            <option value=\"setup.php?action=78\">AffiliateLibrary.com</option>\r\n        </optgroup>\r\n        \r\n        <optgroup label=\"Commission Settings\">  \r\n            <option value=\"setup.php?action=4\">Payout Levels</option>\r\n            <option value=\"setup.php?action=36\">Tier Payout Levels</option>\r\n            <option value=\"setup.php?action=55\">Override Commissions</option>\r\n            <option value=\"setup.php?action=64\">Coupon Code Commissioning</option>\r\n            <option value=\"setup.php?action=65\">Per-Product Commissioning</option>\r\n            <option value=\"setup.php?action=59\">Promotional Bonuses</option>\r\n            <option value=\"setup.php?action=42\">Delayed Commissions</option>\r\n\t\t</optgroup>\r\n        \r\n        <optgroup label=\"Templates\">  \r\n            <option value=\"setup.php?action=9\">Control Panel Theme</option>\r\n            <option value=\"setup.php?action=74\">Social Media</option>\r\n            <option value=\"setup.php?action=21\">FAQ - Frequently Asked Questions</option>\r\n            <option value=\"setup.php?action=15\">Terms and Conditions</option>\r\n            <option value=\"setup.php?action=56\">CAN-SPAM Rules and Acceptance</option>\r\n            <option value=\"setup.php?action=33\">Language Templates</option>\r\n            <option value=\"setup.php?action=6\">Email Templates</option>\r\n            <option value=\"setup.php?action=34\">Signup Form Fields</option>\r\n            <option value=\"setup.php?action=73\">Custom Signup Form Fields</option>\r\n\t\t</optgroup>\r\n\r\n    </select>\r\n</div>\r\n\r\n\r\n</div>\r\n</header>\r\n\r\n<div id=\"container\">\r\n\r\n";
include "templates/sidebar.php";
function curPageName()
{
    return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}
function makeActiveTab($tab = NULL, $class = "yes")
{
    if (!isset($_REQUEST["tab"]) && $tab == "1") {
        echo $class == "yes" ? "class='active'" : " active";
    } else {
        if (isset($_REQUEST["tab"]) && $_REQUEST["tab"] == $tab) {
            echo $class == "yes" ? "class='active'" : " active";
        }
    }
}

?>