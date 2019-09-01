<?php
include_once '../API/config.php';
include_once 'includes/session.check.php';
if ('off' === $staff_marketing_materials && !isset($_SESSION[$install_directory_name.'_idev_AdminAccount'])) {
    header('Location: staff_notice.php');
    exit();
}

$leftSubActiveMenu = 'marketing';
require 'templates/header.php';
if (isset($_POST['edit'])) {
    $st = $db->prepare('update idevaff_banners set grp = ?, description = ?, alt_tag = ? where number = ?');
    $st->execute([$_POST['group'], $_POST['d'], $_POST['alt_tag_edit'], $_POST['edit']]);
    include 'updates/auto_update_groups.php';
    $success_message = '<strong>Success!</strong> Banner updated.';
}

if (isset($_REQUEST['remove'])) {
    $st = $db->prepare('delete from idevaff_banners where number = ?');
    $st->execute([$_REQUEST['remove']]);
    include 'updates/auto_update_groups.php';
    $success_message = '<strong>Success!</strong> Banner removed.';
}

if (isset($_POST['add'])) {
    $direct_url = $_POST['direct_url'];
    if ('' !== $direct_url && 'http://' !== $direct_url) {
        $test = getimagesize($direct_url);
        if (isset($test['mime'])) {
            $group = $_POST['group'];
            list($width, $height, $type, $attr) = getimagesize($direct_url);
            $s1 = $width;
            $s2 = $height;
            if (isset($_POST['desc'])) {
                $bdesc = $_POST['desc'];
            } else {
                $bdesc = '';
            }

            $alt_tag = $_POST['alt_tag'];
            $max_sort = $db->query('select max(sort) as sort from idevaff_banners');
            $result = $max_sort->fetch();
            $new_sort = $result['sort'] + 1;
            $st = $db->prepare("insert into idevaff_banners (grp, size1, size2, image, description, alt_tag, sort, local, niche, countries, flow_type, payout) VALUES (?, ?, ?, ?, ?, ?, ?, '1')");
            $st->execute([$group, $s1, $s2, $direct_url, $bdesc, $alt_tag, $new_sort]);
            include 'updates/auto_update_groups.php';
            $success_message = '<strong>Success!</strong> The banner has been added to the database and banner linking code has been created for your affiliates.';
        } else {
            $fail_message = "<strong>Error!</strong><br />- Invalid link to image file. Make sure the URL you're entering is pointing to a valid image file.<br />- For security purposes, iDevAffiliate only recognizes <strong>.gif</strong>, <strong>.jpg</strong> and <strong>.png files.<br /><br />Example URL: http://www.yoursite.com/images/banner.<strong>jpg</strong>";
        }
    } else {
        if (strlen(trim($_FILES['file']['name'])) < 1) {
            $fail = 1;
            $fail_message = '<strong>Error!</strong> Missing banner file name.';
        }

        if (!isset($fail) && file_exists($path.'/media/banners/'.$_FILES['file']['name'])) {
            $fail = 1;
            $fail_message = '<strong>Error!</strong> The filename already exists. Please rename your upload file and try again.';
        }

        if (!isset($fail)) {
            $res = copy($_FILES['file']['tmp_name'], (string) $path.'/media/banners/'.$_FILES['file']['name']);
            if (!$res) {
                $fail = 1;
                $fail_message = '<strong>Error!</strong> Due to an unexpected response from the server, the banner did not upload properly. Check your directory permissions for <strong>write</strong> access.';
            }
        }

        if (!isset($fail) && is_uploaded_file($_FILES['file']['tmp_name'])) {
            if ('image/gif' === $_FILES['file']['type'] || 'image/jpeg' === $_FILES['file']['type'] || 'image/pjpeg' === $_FILES['file']['type'] || 'image/x-png' === $_FILES['file']['type'] || 'image/png' === $_FILES['file']['type']) {
                $fname = $_FILES['file']['name'];
                $group = $_POST['group'];
                list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
                $s1 = $width;
                $s2 = $height;
                if (isset($_POST['desc'])) {
                    $bdesc = $_POST['desc'];
                } else {
                    $bdesc = '';
                }

                $alt_tag = $_POST['alt_tag'];
                $max_sort = $db->query('select max(sort) as sort from idevaff_banners');
                $result = $max_sort->fetch();
                $new_sort = $result['sort'] + 1;
                $st = $db->prepare("insert into idevaff_banners (grp, size1, size2, image, description, alt_tag, sort, local, niche, countries, flow_type, payout) VALUES (?, ?, ?, ?, ?, ?, ?, '0')");
                $st->execute([$group, $s1, $s2, $fname, $bdesc, $alt_tag, $new_sort]);
                include 'updates/auto_update_groups.php';
                $success_message = '<strong>Success!</strong> The banner has been added to the database and banner linking code has been created for your affiliates.';
            } else {
                $fail_message = '<strong>Error!</strong> For security purposes, iDevAffiliate only recognizes <strong>.gif</strong>, <strong>.jpg</strong> and <strong>.png</strong> files.';
            }
        }
    }
}

if (isset($_POST['sort_order'])) {
    $sort_order = $_POST['sort_order'];
    $banner_id = $_POST['banner_id'];
    if (is_numeric($sort_order)) {
        $st = $db->prepare('update idevaff_banners set sort = ? where number = ?');
        $st->execute([$sort_order, $banner_id]);
        $success_message = '<strong>Success!</strong> Sort order updated.';
    }
}

echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Marketing Materials</li>\r\n<li class=\"current\"> <a href=\"banners.php\" title=\"\">Banners</a></li>\r\n</ul>\r\n";
include 'templates/crumb_right.php';
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Offers</h3><span>Banners uploaded here are automatically made available to our affiliates as direct links and banner lists.</span></div>\r\n";
include 'templates/stats.php';
echo "</div>\r\n\r\n";
include 'includes/notifications.php';
echo "\r\n<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Add An Offer Banner</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Manage Offer Banners</a></li>\r\n<li ";
makeActiveTab(3);
echo "><a href=\"#tab_1_3\" data-toggle=\"tab\"><i class=\"icon-sort\"></i> Sort Order</a></li>\r\n<li><a data-toggle=\"modal\" href=\"#video_tutorial\"><i class=\"icon-play\"></i> Video Tutorial</a></li>\r\n</ul>\r\n\r\n<div class=\"modal fade\" id=\"video_tutorial\">\r\n<div class=\"modal-dialog\">\r\n<div class=\"modal-content\">\r\n<div class=\"modal-header\">\r\n<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\r\n<h4 class=\"modal-title\">Video Tutorial: Banners</h4>\r\n</div>\r\n<div class=\"modal-body\">\r\n<div class=\"video-container\">\r\n<iframe src=\"//player.vimeo.com/video/85580508\" frameborder=\"0\" width=\"560\" height=\"315\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\r\n</div>\r\n</div>\r\n<div class=\"modal-footer\">\r\n<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, 'no');
echo "\" id=\"tab_1_1\">\r\n<div class=\"col-md-12\">\r\n\r\n";
if (!is_writable('../media/banners/')) {
    echo "<div class=\"alert alert-warning\" style=\"margin-top:20px;\"><h4>Folder Permissions Warning</h4>The <strong>/media/banners</strong> folder requires <u>WRITE</u> permissions in order to upload a banner image. If you'd like to upload a banner image, please issue <u>write</u> permissions to the <strong>/media/banners</strong> folder now. If you aren't planning to upload a banner image, you can ignore this message and use a direct URL instead.</div>\r\n";
}

echo "\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-picture\"></i> Add A New Banner For Offer</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" ENCTYPE=\"multipart/form-data\" method=\"post\" action=\"banners.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION['csrf_token'];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Marketing Group (Offer Name)</label>\r\n<div class=\"col-md-9\"><select class=\"form-control input-width-xlarge\" name=\"group\" style=\"display:inline-block;\">\r\n";
$groups = $db->query('select * from idevaff_groups order by name');
if ($groups->rowCount()) {
    while ($qry = $groups->fetch()) {
        $groupid = $qry['id'];
        $groupname = $qry['name'];
        echo "<option value='".$groupid."'>".$groupname."</option>\n";
    }
}

echo "</select> <a href=\"groups.php?tab=2\" class=\"btn btn-sm btn-default\" style=\"display:inline-block;\">Manage Groups</a></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Alt Tag (Optional)</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"alt_tag\" class=\"form-control\" value=\"";
if (isset($_POST['alt_tag'])) {
    echo html_output($_POST['alt_tag']);
}
echo "\"></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Description (Optional)</label>\r\n<div class=\"col-md-6\"><textarea rows=\"2\" name=\"desc\" class=\"form-control\">";
if (isset($_POST['desc'])) {
    echo html_output($_POST['desc']);
}

// add size1 and size2 here as geo and flow type


echo "</textarea></div>\r\n</div>\r\n<div class=\"col-md-12 well\">Upload a banner image OR enter a direct URL to a banner image. Banner image types allowed are <font color=\"#CC0000\">GIF</font>, <font color=\"#CC0000\">JPG</font> and <font color=\"#CC0000\">PNG</font>.</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Upload A Banner</label>\r\n<div class=\"col-md-9\"><input type=\"file\" name=\"file\" data-style=\"fileinput\" /></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Enter URL To Banner Image</label>\r\n<div class=\"col-md-6\"><input type=\"text\" name=\"direct_url\" class=\"form-control\" value=\"http://\" /></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Add Banner\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"add\" value=\"1\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, 'no');
echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-picture\"></i> Manage Existing Banners</h4></div>\r\n<div class=\"widget-content\">\r\n";
$linklist = $db->query('select * from idevaff_banners order by sort');
if ($linklist->rowCount()) {
    echo "<table class=\"table valign\" id=\"dyntable_banners\">\r\n<thead>\r\n<th></th>\r\n</thead>\r\n<tbody>\r\n</tbody>\r\n</table>\r\n";
} else {
    echo "No offers uploaded yet.\r\n";
}

echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(3, 'no');
echo "\" id=\"tab_1_3\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-sort\"></i> Sort Order</h4></div>\r\n<div class=\"widget-content\">\r\n";
$linklist = $db->query('select * from idevaff_banners order by sort');
if ($linklist->rowCount()) {
    echo "<table class=\"table valign table-striped table-bordered table-highlight-head\">\r\n<thead>\r\n<th>Marketing Group (Offer Name)</th>\r\n<th>Banner Image</th>\r\n<th>Size</th>\r\n<th>Location</th>\r\n<th>Type</th>\r\n<th>Sort Order</th>\r\n</thead>\r\n<tbody>\r\n";
    while ($qry = $linklist->fetch()) {
        $linkid = $qry['number'];
        $linkgrp = $qry['grp'];
        $size1 = $qry['size1'];
        $size2 = $qry['size2'];
        $image = $qry['image'];
        $sort_order = $qry['sort'];
        $image_display = $qry['image'];
        $local = $qry['local'];
        if (1 === $local) {
            $image_display = basename($image_display);
            $banner_location = 'Direct URL';
            $url_help = $image;
        } else {
            $banner_location = 'Uploaded Image';
            $url_help = $base_url.'/media/banners/'.$image;
        }

        $view = "<a href='".$url_help."' class='btn fancy-image btn-default btn-sm' width='".$size1."' height='".$size2."'>View Banner</a>";
        $image_type = 'Image File';
        $gname = $db->prepare('select * from idevaff_groups where id = ?');
        $gname->execute([$linkgrp]);
        $qry = $gname->fetch();
        $gnameout = $qry['name'];
        echo "<form method=\"POST\" action=\"banners.php\">\r\n<input name=\"csrf_token\" value=\"";
        echo $_SESSION['csrf_token'];
        echo "\" type=\"hidden\" />\r\n<input type=\"hidden\" name=\"banner_id\" value=\"";
        echo $linkid;
        echo "\">\r\n<input type=\"hidden\" name=\"tab\" value=\"3\">\r\n<tr>\r\n<td>";
        echo html_output($gnameout);
        echo "</td>\r\n<td>";
        echo $view;
        echo "</td>\r\n<td>";
        echo html_output($size1).' x '.html_output($size2);
        echo "</td>\r\n<td>";
        echo html_output($banner_location);
        echo "</td>\r\n<td>";
        echo html_output($image_type);
        echo "</td>\r\n<td><input type=\"text\" name=\"sort_order\" class=\"form-control input-width-small\" value=\"";
        echo $sort_order;
        echo "\" style=\"display:inline-block;\"> <input type=\"submit\" style=\"display:inline-block;\" class=\"btn btn-primary\" value=\"Update\" /></td>\r\n</tr>\r\n</form>\r\n";
    }
    echo "</tbody>\r\n</table>\r\n";
} else {
    echo "No offers uploaded yet.\r\n";
}

echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n";
include 'templates/footer.php';

?>