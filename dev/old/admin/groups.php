<?php

include_once "../API/config.php";
include_once "includes/session.check.php";
if ($staff_marketing_materials == "off" && !isset($_SESSION[$install_directory_name . "_idev_AdminAccount"])) {
    header("Location: staff_notice.php");
    exit;
}
$leftSubActiveMenu = "marketing";
include "templates/header.php";
if (isset($_POST["editme"])) {
    $dpage = $_POST["inclink"];
    if (isset($dpage) && $dpage == "https://") {
        $dpage = NULL;
    }
    $st = $db->prepare("update idevaff_groups set name = ?, location = ?, qr_enabled = ? where id = ?");
    $st->execute(array($_POST["editval"], $dpage, $_POST["qrcodes"], $_POST["groupid"]));
    $success_message = "<strong>Success!</strong> Marketing group edited.";
}
if (isset($_POST["newgroup"])) {
    $echeck = $db->prepare("select name from idevaff_groups where name = ?");
    $echeck->execute(array($_POST["newgroup"]));
    $ex = $echeck->rowCount();
    if (0 < $ex) {
        $fail_message = "<strong>Error!</strong> Marketing group name already exists.";
    } else {
        if ($_POST["newgroup"] == "") {
            $fail_message = "<strong>Error!</strong> Marketing group name can not be empty.";
        } else {
            $dpage = $_POST["newpage"];
            if (isset($dpage) && $dpage == "https://") {
                $dpage = NULL;
            }
    $devices = $_POST['devices'];
    $os = $_POST['os'];
    $connection = $_POST['connection'];
    $carrier = $_POST['carrier'];
    $niche = $_POST['niche'];
    $countries = $_POST['countries'];
    $flow_type = $_POST['flow_type'];
    $payout = $_POST['payout'];
// file upload start
    if (empty($_FILES['offer_image']['tmp_name'])) {
        $offer_image = "no_preview.jpg";
    }else {
        $offer_image = $_FILES['offer_image']['name'];
    }
$uploaddir = '/var/www/sublimerevenue.com/images/offers_thumbs/';
$uploadfile = $uploaddir . basename($_FILES['offer_image']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['offer_image']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Error!\n";
}
/*
echo 'Here is some more debugging info:';
print_r($_FILES);
*/
print "</pre>";
// file upload end
    $payout_details = $_POST['payout_details'];
    $conversion_flow = $_POST['conversion_flow'];
    $restrictions = $_POST['restrictions'];
            $st = $db->prepare("insert into idevaff_groups (name, location, qr_enabled, devices, os, connection, carrier, niche, countries, flow_type, payout, show_in_table, offer_image, payout_details, conversion_flow, restrictions) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '1', ?, ?, ?, ?)");
            $st->execute(array($_POST["newgroup"], $dpage, $_POST["qrcodes"], $devices, $os, $connection, $carrier, $niche, $countries, $flow_type, $payout, $offer_image, $payout_details, $conversion_flow, $restrictions));
            $success_message = "<strong>Success!</strong> Marketing group created.";
        }
    }
}
if (isset($_REQUEST["remove"])) {
    $get1 = $db->prepare("select grp from idevaff_banners where grp = ?");
    $get1->execute(array($_REQUEST["remove"]));
    $numb1 = $get1->rowCount();
    $get2 = $db->prepare("select grp from idevaff_ads where grp = ?");
    $get2->execute(array($_REQUEST["remove"]));
    $numb2 = $get2->rowCount();
    $get3 = $db->prepare("select grp from idevaff_links where grp = ?");
    $get3->execute(array($_REQUEST["remove"]));
    $numb3 = $get3->rowCount();
    $get4 = $db->prepare("select grp from idevaff_htmlads where grp = ?");
    $get4->execute(array($_REQUEST["remove"]));
    $numb4 = $get4->rowCount();
    $get5 = $db->prepare("select grp from idevaff_email_templates where grp = ?");
    $get5->execute(array($_REQUEST["remove"]));
    $numb5 = $get5->rowCount();
    $get6 = $db->prepare("select grp from idevaff_peels where grp = ?");
    $get6->execute(array($_REQUEST["remove"]));
    $numb6 = $get6->rowCount();
    $get7 = $db->prepare("select grp from idevaff_lightboxes where grp = ?");
    $get7->execute(array($_REQUEST["remove"]));
    $numb7 = $get7->rowCount();
    $get = $db->query("select * from idevaff_groups");
    $numb = $get->rowCount();
    if (0 < $numb1 || 0 < $numb2 || 0 < $numb3 || 0 < $numb4 || 0 < $numb5 || 0 < $numb6 || 0 < $numb7) {
        $fail_message = "<strong>Error!</strong> Marketing group is not empty. Marketing materials need moved to other groups first.";
    } else {
        if ($numb == 1) {
            $fail_message = "<strong>Error!</strong> Marketing group can not be removed. You need to have at leaset 1 marketing group active.";
        } else {
            $st = $db->prepare("delete from idevaff_groups where id = ?");
            $st->execute(array($_REQUEST["remove"]));
            $success_message = "<strong>Success!</strong> Marketing group removed.";
        }
    }
}
echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li class=\"current\"> <a href=\"groups.php\" title=\"\">Marketing Groups</a></li>\r\n</ul>\r\n";
include "templates/crumb_right.php";
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Marketing Groups</h3><span>Organize your marketing materials and drive traffic to alternate pages/websites.</span></div>\r\n";
include "templates/stats.php";
echo "</div>\r\n\r\n";
include "includes/notifications.php";
echo "\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Create A Group</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Manage Groups</a></li>\r\n<li ";
makeActiveTab(3);
echo "><a href=\"#tab_1_3\" data-toggle=\"tab\">Settings</a></li>\r\n<li><a data-toggle=\"modal\" href=\"#video_tutorial\"><i class=\"icon-play\"></i> Video Tutorial</a></li>\r\n</ul>\r\n\r\n<div class=\"modal fade\" id=\"video_tutorial\">\r\n<div class=\"modal-dialog\">\r\n<div class=\"modal-content\">\r\n<div class=\"modal-header\">\r\n<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\r\n<h4 class=\"modal-title\">Video Tutorial: Marketing Groups</h4>\r\n</div>\r\n<div class=\"modal-body\">\r\n<div class=\"video-container\">\r\n<iframe src=\"//player.vimeo.com/video/85584612\" frameborder=\"0\" width=\"560\" height=\"315\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\r\n</div>\r\n</div>\r\n<div class=\"modal-footer\">\r\n<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, "no");
echo "\" id=\"tab_1_1\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-sitemap\"></i> Create A Marketing Group</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" ENCTYPE=\"multipart/form-data\" method=\"post\" action=\"groups.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Group Name</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"newgroup\" class=\"form-control\" value=\"";
if (isset($_POST["newgroup"])) {
    echo html_output($_POST["newgroup"]);
}
echo "\"></div>\r\nSmart tool or offer name.</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Incoming Traffic Page</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"newpage\" class=\"form-control\" value=\"";
if (isset($_POST["newpage"])) {
    echo html_output($_POST["newpage"]);
} else {
    echo "https://";
}
echo "\"></div>\r\nLink to script on our end.</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Devices</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"devices\" class=\"form-control\" value=\"";
if (isset($_POST['devices'])) {
    echo html_output($_POST['devices']);
}
echo "\"/></div>\r\nMobile, Tablet, Desktop or All</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">OS</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"os\" class=\"form-control\" value=\"";
if (isset($_POST['os'])) {
    echo html_output($_POST['os']);
}
echo "\"/></div>\r\nAndroid, iOS, Windows, Mac OS, Linux, BlackBerry, Other OR All</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Connection</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"connection\" class=\"form-control\" value=\"";
if (isset($_POST['connection'])) {
    echo html_output($_POST['connection']);
}
echo "\"/></div>\r\nCarrier, Wi-Fi, Wired, All</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Carrier</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"carrier\" class=\"form-control\" value=\"";
if (isset($_POST['carrier'])) {
    echo html_output($_POST['carrier']);
}
echo "\"/></div>\r\nCarrier Name or All</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Vertical</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"niche\" class=\"form-control\" value=\"";
if (isset($_POST['niche'])) {
    echo html_output($_POST['niche']);
}
echo "\"/></div>\r\nMainstream or Adult + sub-vertical name.</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Countries</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"countries\" class=\"form-control\" value=\"";
if (isset($_POST['countries'])) {
    echo html_output($_POST['countries']);
}
echo "\"/></div>\r\nUS, DE, CA, etc. or simply US or All.</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Flow Type</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"flow_type\" class=\"form-control\" value=\"";
if (isset($_POST['flow_type'])) {
    echo html_output($_POST['flow_type']);
}
echo "\"/></div>\r\n1-click, 2-click, SOI, DOI, COD, SMS, etc</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Conversion Flow</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"conversion_flow\" class=\"form-control\" value=\"";
if (isset($_POST['conversion_flow'])) {
    echo html_output($_POST['conversion_flow']);
}
echo "\"/></div>\r\nHow conversion is triggered?</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Restrictions</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"restrictions\" class=\"form-control\" value=\"";
if (isset($_POST['restrictions'])) {
    echo html_output($_POST['restrictions']);
}
echo "\"/></div>\r\nDescribe restrictions, e.g. no hardcore content.</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Payout</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"payout\" class=\"form-control\" value=\"";
if (isset($_POST['payout'])) {
    echo html_output($_POST['payout']);
}
echo "\"/></div>\r\n100% for rev share, 3.00 € for fixed price</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Image</label>\r\n<div class=\"col-md-6\"><input type=\"file\" name=\"offer_image\" data-style=\"fileinput\" class=\"form-control\"/>";
if (isset($_FILES["file"]["name"])) {
    echo html_output($_FILES["file"]["name"]);
}
echo "</div>\r\nUpload Image - 256 height MAXIMUM, JPG Only</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Payout Details</label>\r\n<div class=\"col-md-6\"><textarea rows=\"9\" type=\"text\" name=\"payout_details\" class=\"form-control\">";
if (isset($_POST['payout_details'])) {
    echo html_output($_POST['payout_details']);
}
echo "</textarea></div>\r\nPayout details per geo/device, if different</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Allow QR Codes</label>\r\n<div class=\"col-md-9\"><select name=\"qrcodes\" class=\"form-control input-width-xlarge\" style=\"display:inline-block;\">\r\n<option value=\"0\">No</option>\r\n<option value=\"1\">Yes</option>\r\n</select></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" name=\"submit\" value=\"Create Group\" class=\"btn btn-primary\">\r\n</div>\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, "no");
echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-sitemap\"></i> Edit A Marketing Group</h4></div>\r\n<div class=\"widget-content\">\r\n";
$groupcount = $db->query("SELECT COUNT(*) FROM idevaff_groups");
if ($groupcount->fetchColumn(0)) {
    echo "<table class=\"table\" id=\"dyntable_groups\">\r\n<thead>\r\n<th></th>\r\n</thead>\r\n<tbody>\r\n</tbody>\r\n</table>\r\n";
} else {
    echo "No marketing groups yet.\r\n";
}
echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(3, "no");
echo "\" id=\"tab_1_3\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-sitemap\"></i> Marketing Group Settings</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"groups.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Marketing Materials Delivery</label>\r\n<div class=\"col-md-4\"><select name=\"marketing_delivery\" class=\"form-control\">\r\n<option value=\"0\" ";
if ($marketing_delivery == 0) {
    echo " selected ";
}
echo ">Affiliate Chooses Marketing Group</option>\r\n<option value=\"1\" ";
if ($marketing_delivery == 1) {
    echo " selected ";
}
echo ">One-Click Delivery</option>\r\n</select></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Allow Email Links</label>\r\n<div class=\"col-md-3\"><select name=\"email_links_active\" class=\"form-control\">\r\n<option value=\"1\" ";
if ($email_links_active == 1) {
    echo " selected ";
}
echo ">Enabled</option>\r\n<option value=\"0\" ";
if ($email_links_active == 0) {
    echo " selected ";
}
echo ">Disabled</option>\r\n</select></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Save Setting\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"cfg\" value=\"134\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n\r\n";
include "templates/footer.php";

?>