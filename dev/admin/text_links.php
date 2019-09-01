<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
include_once '../API/config.php';
include_once 'includes/session.check.php';
if ('off' === $staff_marketing_materials && !isset($_SESSION[$install_directory_name.'_idev_AdminAccount'])) {
    header('Location: staff_notice.php');
    exit();
}

$leftSubActiveMenu = 'marketing';
require 'templates/header.php';
if (isset($_POST['insert'])) {
    if ('' !== $_POST['linktext']) {
        $max_sort = $db->query('select max(sort) as sort from idevaff_links');
        $result = $max_sort->fetch();
        $new_sort = $result['sort'] + 1;
        $land = $_POST['land'];
        $country = $_POST['country'];
        $st = $db->prepare('insert into idevaff_links (grp, linktext, sort, land, country) values (?, ?, ?, ?, ?)');
        $st->execute([$_POST['linkgroup'], $_POST['linktext'], $new_sort, $land, $country]);
        include 'updates/auto_update_groups.php';
        $success_message = '<strong>Success!</strong> The link has been added.';
    } else {
        $fail_message = '<strong>Error!</strong> Please enter text for your link.';
    }
}

if (isset($_REQUEST['remove'])) {
    $st = $db->prepare('delete from idevaff_links where id = ?');
    $st->execute([$_REQUEST['remove']]);
    include 'updates/auto_update_groups.php';
    $success_message = '<strong>Success!</strong> Text link has been removed.';
}

if (isset($_POST['sort_order'])) {
    $sort_order = $_POST['sort_order'];
    $textlink_id = $_POST['textlink_id'];
    if (is_numeric($sort_order)) {
        $st = $db->prepare('update idevaff_links set sort = ? where id = ?');
        $st->execute([$sort_order, $textlink_id]);
        $success_message = '<strong>Success!</strong> Sort order updated.';
    }
}

echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Marketing Materials</li>\r\n<li class=\"current\"> <a href=\"text_links.php\" title=\"\">SmartLinks</a></li>\r\n</ul>\r\n";
include 'templates/crumb_right.php';
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>SmartLinks</h3><span>SmartLinks created here are automatically made available to your affiliates.</span></div>\r\n";
include 'templates/stats.php';
echo "</div>\r\n\r\n";
include 'includes/notifications.php';
echo "\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Add A SmartLink</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Manage SmartLinks</a></li>\r\n<li ";
makeActiveTab(3);
echo "><a href=\"#tab_1_3\" data-toggle=\"tab\"><i class=\"icon-sort\"></i> Sort Order</a></li>\r\n</ul>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, 'no');
echo "\" id=\"tab_1_1\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-text-width\"></i> Add A New SmartLink</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"text_links.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION['csrf_token'];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Marketing Group (Offer)</label>\r\n<div class=\"col-md-9\"><select class=\"form-control input-width-xlarge\" name=\"linkgroup\" style=\"display:inline-block;\">\r\n";
    if (isset($_POST['linkgroup'])) {
        echo "<option value='".$_POST['linkgroup']."' selected>From Last Submit</option>\n";
    }
//TODO: keep select option from last post request - done but at least show the name in option
$groups = $db->query('select * from idevaff_groups order by name');
if ($groups->rowCount()) {
    while ($qry = $groups->fetch()) {
        $groupid = $qry['id'];
        $groupname = $qry['name'];
        echo "<option value='".$groupid."'>".$groupname."</option>\n";
    }

}
echo "</select> <a href=\"groups.php?tab=2\" class=\"btn btn-sm btn-default\" style=\"display:inline-block;\">Manage Groups (Offers)</a></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Description</label>\r\n<div class=\"col-md-4\"><input type=\"text\" name=\"linktext\" class=\"form-control\" value=\"\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Type</label>\r\n<div class=\"col-md-4\"><select class=\"form-control input-width-xlarge\" name=\"land\" style=\"display:inline-block;\">\r\n<option value='1'>Landing</option><option value='0'>Pre-landing</option></select></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Country</label>\r\n<div class=\"col-md-9\"><select class=\"form-control input-width-xlarge\" name=\"country\" style=\"display:inline-block;\">\r\n";
        echo "<option value='' selected>Global</option>\n";
$countries = $db->query('SELECT * FROM idevaff_countries_geo');
if ($countries->rowCount()) {
    while ($qry = $countries->fetch()) {
        $countrycode = $qry['country_code'];
        $countryname = $qry['country_name'];
        echo "<option value='".$countrycode."'>".$countryname."</option>\n";
    }
}
echo "</select></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Add Text Link\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"add\" value=\"1\">\r\n<input type=\"hidden\" name=\"insert\" value=\"1\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, 'no');
echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-text-width\"></i> Manage Existing SmartLinks</h4></div>\r\n<div class=\"widget-content\">\r\n";
$linklist = $db->query('select * from idevaff_links order by sort');
if ($linklist->rowCount()) {
    echo "<table class=\"table valign table-striped table-bordered table-highlight-head\" id=\"dyntable_textlinks\">\r\n<thead>\r\n<tr>\r\n<th>Marketing Group (Offer)</th>\r\n<th>Description</th>\r\n<th>Action</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n</tbody>\r\n</table>\r\n";
} else {
    echo "No text links created yet.\r\n";
}

echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(3, 'no');
echo "\" id=\"tab_1_3\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-sort\"></i> Sort Order</h4></div>\r\n<div class=\"widget-content\">\r\n";
$linklist = $db->query('select * from idevaff_links order by sort');
if ($linklist->rowCount()) {
    echo "<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<thead>\r\n<th>Marketing Group (Offer)</th>\r\n<th>Text Link</th>\r\n<th>Sort Order</th>\r\n</thead>\r\n<tbody>\r\n";
    while ($qry = $linklist->fetch()) {
        $linkid = $qry['id'];
        $linkgrp = $qry['grp'];
        $linktext = $qry['linktext'];
        $land = $qry['land'];
        $country = $qry['country'];
        $sort_order = $qry['sort'];
        $gnameout = $db->prepare('select name from idevaff_groups where id = ?');
        $gnameout->execute([$linkgrp]);
        $qry = $gnameout->fetch();
        $gnameout = $qry['name'];
        echo "<form class=\"form-horizontal row-border\" method=\"post\" action=\"text_links.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION['csrf_token'];
        echo "\" type=\"hidden\" />\r\n<tr>\r\n<td>";
        echo $gnameout;
        echo "</td>\r\n<td>";
        echo $linktext;
        echo "</td>\r\n<td><input type=\"text\" name=\"sort_order\" class=\"form-control input-width-small\" value=\"";
        echo $sort_order;
        echo "\" style=\"display:inline-block;\"> <input type=\"submit\"  style=\"display:inline-block;\" class=\"btn btn-primary\" value=\"Update\" /></td>\r\n</tr>\r\n<input type=\"hidden\" name=\"textlink_id\" value=\"";
        echo $linkid;
        echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n</form>\r\n";
    }
    echo "</tbody>\r\n</table>\r\n";
} else {
    echo "No text links created yet.\r\n";
}

echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n\r\n";
include 'templates/footer.php';

} catch (Exception $e) {
    echo $e->getMessage();
}
?>