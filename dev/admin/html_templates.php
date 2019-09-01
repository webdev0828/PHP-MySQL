<?php
include_once '../API/config.php';
include_once 'includes/session.check.php';
if ('off' === $staff_marketing_materials && !isset($_SESSION[$install_directory_name.'_idev_AdminAccount'])) {
    header('Location: staff_notice.php');
    exit();
}

$leftSubActiveMenu = 'marketing';
require 'templates/header.php';
if (isset($_POST['insert'])) {
    $fail = 0;
    $fail_message = null;
    if ('' === $_POST['html_code']) {
        $fail = 1;
        $fail_message = '<strong>Error!</strong> Please enter HTML Code for this PopUnder.';
    }

    if ('' === $_POST['html_name']) {
        $fail = 1;
        $fail_message = '<strong>Error!</strong> Please enter a PopUnder Name for this PopUnder.';
    }

    if (!$fail) {
        $max_sort = $db->query('select max(sort) as sort from idevaff_htmlads');
        $result = $max_sort->fetch();
        $new_sort = $result['sort'] + 1;
        $st = $db->prepare('insert into idevaff_htmlads (name, grp, html_code, sort) VALUES (?, ?, ?, ?)');
        $st->execute([$_POST['html_name'], $_POST['html_group'], $_POST['html_code'], $new_sort]);
        include 'updates/auto_update_groups.php';
        $success_message = '<strong>Success!</strong> PopUnder created.';
    }
}

if (isset($_REQUEST['remove'])) {
    $st = $db->prepare('delete from idevaff_htmlads where id = ?');
    $st->execute([$_GET['remove']]);
    include 'updates/auto_update_groups.php';
    $success_message = '<strong>Success!</strong> PopUnder removed.';
}

if (isset($_POST['update_id'])) {
    $st = $db->prepare('update idevaff_htmlads set name = ?, grp = ?, html_code = ? where id = ?');
    $st->execute([$_POST['html_name'], $_POST['html_group'], $_POST['html_code'], $_POST['update_id']]);
    include 'updates/auto_update_groups.php';
    $success_message = '<strong>Success!</strong> PopUnder updated.';
}

if (isset($_POST['sort_order'])) {
    $sort_order = $_POST['sort_order'];
    $html_id = $_POST['html_id'];
    if (is_numeric($sort_order)) {
        $st = $db->prepare('update idevaff_htmlads set sort = ? where id = ?');
        $st->execute([$sort_order, $html_id]);
        $success_message = '<strong>Success!</strong> Sort order updated.';
    }
}

echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Marketing Materials</li>\r\n<li class=\"current\"> <a href=\"html_templates.php\" title=\"\">PopUnders</a></li>\r\n</ul>\r\n";
include 'templates/crumb_right.php';
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>PopUnders</h3><span>PopUnders created here are automatically made available to your affiliates.</span></div>\r\n";
include 'templates/stats.php';
echo "</div>\r\n\r\n";
include 'includes/notifications.php';
echo "\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Create A PopUnder</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Manage PopUnders</a></li>\r\n<li ";
makeActiveTab(3);
echo "><a href=\"#tab_1_3\" data-toggle=\"tab\"><i class=\"icon-sort\"></i> Sort Order</a></li>\r\n</ul>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, 'no');
echo "\" id=\"tab_1_1\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-picture\"></i> Add A New PopUnder</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" action=\"html_templates.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION['csrf_token'];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Marketing Group (Niche)</label>\r\n<div class=\"col-md-9\"><select class=\"form-control input-width-xlarge\" name=\"html_group\" style=\"display:inline-block;\">\r\n";
$groups = $db->query('select * from idevaff_groups order by name');
if ($groups->rowCount()) {
    while ($qry = $groups->fetch()) {
        $groupid = $qry['id'];
        $groupname = $qry['name'];
        echo "<option value='".$groupid."'>".$groupname."</option>\n";
    }
}

echo "</select> <a href=\"groups.php?tab=2\" class=\"btn btn-sm btn-default\" style=\"display:inline-block;\">Manage Groups</a></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">PopUnder Name</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"html_name\" class=\"form-control\" value=\"";
if (isset($_POST['html_name'])) {
    echo html_output($_POST['html_name']);
}

echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">HTML Code</label>\r\n<div class=\"col-md-9\"><textarea rows=\"15\" name=\"html_code\" class=\"form-control\">";
if (isset($_POST['html_code'])) {
    echo html_output($_POST['html_code']);
}

echo "</textarea></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Add PopUnder\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"insert\" value=\"1\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n";
include 'includes/tokens_marketing_html.php';
echo "</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, 'no');
echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-picture\"></i> Manage Existing PopUnders</h4></div>\r\n<div class=\"widget-content\">\r\n";
$linklist = $db->query('select * from idevaff_htmlads order by sort');
if ($linklist->rowCount()) {
    echo "<table class=\"table \" id=\"dyntable_htmlads\">\r\n<thead>\r\n</thead>\r\n<tbody>\r\n</tbody>\r\n</table>\r\n";
} else {
    echo "No PopUnders created yet.\r\n";
}

echo "</div>\r\n</div>\r\n</div>\r\n";
include 'includes/tokens_marketing_html.php';
echo "</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(3, 'no');
echo "\" id=\"tab_1_3\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-sort\"></i> Sort Order</h4></div>\r\n<div class=\"widget-content\">\r\n";
$linklist = $db->query('select * from idevaff_htmlads order by sort');
if ($linklist->rowCount()) {
    echo "<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<thead>\r\n<th>Marketing Group (Niche)</th>\r\n<th>PopUnder Name</th>\r\n<th>View Template</th>\r\n<th>Sort Order</th>\r\n</thead>\r\n<tbody>\r\n";
    while ($qry = $linklist->fetch()) {
        $linkid = $qry['id'];
        $linkgrp = $qry['grp'];
        $linkname = $qry['name'];
        $sort_order = $qry['sort'];
        $gname = $db->prepare('select * from idevaff_groups where id = ?');
        $gname->execute([$linkgrp]);
        $qry = $gname->fetch();
        $gnameout = $qry['name'];
        echo "<form class=\"form-horizontal row-border\" method=\"post\" action=\"html_templates.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION['csrf_token'];
        echo "\" type=\"hidden\" />\r\n<tr>\r\n<td>";
        echo html_output($gnameout);
        echo "</td>\r\n<td>";
        echo html_output($linkname);
        echo "</td>\r\n<td><a href=\"html_sample_view.php?id=";
        echo html_output($linkid);
        echo "\" class=\"fancy-page btn btn-default\">View PopUnder</a></td>\r\n<td><input type=\"text\" name=\"sort_order\" class=\"form-control input-width-small\" value=\"";
        echo $sort_order;
        echo "\" style=\"display:inline-block;\"> <input type=\"submit\"  style=\"display:inline-block;\" class=\"btn btn-primary\" value=\"Update\" /></td>\r\n</tr>\r\n<input type=\"hidden\" name=\"html_id\" value=\"";
        echo $linkid;
        echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n</form>\r\n";
    }
    echo "</tbody>\r\n</table>\r\n";
} else {
    echo "No HTML Ads created yet.\r\n";
}

echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n\r\n";
include 'templates/footer.php';

?>