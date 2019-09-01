<?php
include_once "../API/config.php";
include_once "includes/session.check.php";
$leftSubActiveMenu = "affiliates";
require "templates/header.php";
$note_fill_3 = 0;
$note_fill_4 = 0;
if (isset($_REQUEST["delete"])) {
    $st = $db->prepare("delete from idevaff_notes where id = ?");
    $st->execute(array($_REQUEST["delete"]));
    $success_message = "<strong>Success!</strong> Affiliate note deleted.";
}
if (isset($_POST["edit"])) {
    $editnote = $_POST["edit_con"];
    $editnote1 = $_POST["edit_sub"];
    if ($_POST["edit_display"]) {
        $edit_display = 1;
    } else {
        $edit_display = 0;
    }
    if ($_POST["edit_attach"]) {
        $edit_attach = 1;
    } else {
        $edit_attach = 0;
    }
    $st = $db->prepare("update idevaff_notes set note_sub = ?, note_con = ?, note_display = ?, note_attach = ? where id = ?");
    $st->execute(array($editnote1, $editnote, $edit_display, $edit_attach, $_POST["edit"]));
    $success_message = "<strong>Success!</strong> Affiliate note updated.";
}
if (isset($_POST["note_sub"])) {
    $note_fill_1 = stripslashes(strip_tags(htmlspecialchars($_POST["note_sub"])));
}
if (isset($_POST["note_con"])) {
    $note_fill_2 = stripslashes(strip_tags(htmlspecialchars($_POST["note_con"])));
}
if (isset($_POST["note_display"])) {
    $note_fill_3 = $_POST["note_display"];
}
if (isset($_POST["note_attach"])) {
    $note_fill_4 = $_POST["note_attach"];
}
$notescount = $db->query("SELECT COUNT(*) as c FROM idevaff_notes");
$notescount = $notescount->fetch()["c"];
echo "<div class=\"crumbs\">\r\n<ul id=\"breadcrumbs\" class=\"breadcrumb\">\r\n<li><i class=\"icon-home\"></i> <a href=\"dashboard.php\">Dashboard</a></li>\r\n<li> Affiliates</li>\r\n<li class=\"current\"> <a href=\"notes.php\">Affiliate Notes</a></li>\r\n</ul>\r\n";
include "templates/crumb_right.php";
echo "</div>\r\n\r\n<div class=\"page-header\">\r\n<div class=\"page-title\"><h3>Affiliate Notes</h3><span>Create notes for your affiliates to read when they are logged in.</span></div>\r\n";
include "templates/stats.php";
echo "</div>\r\n\r\n";
include "includes/notifications.php";
echo "<div class=\"tabbable tabbable-custom\">\r\n<ul class=\"nav nav-tabs\">\r\n<li ";
makeActiveTab(1);
echo "><a href=\"#tab_1_1\" data-toggle=\"tab\">Create A Note</a></li>\r\n<li ";
makeActiveTab(2);
echo "><a href=\"#tab_1_2\" data-toggle=\"tab\">Manage Notes <span class=\"label label-danger\">";
echo $notescount;
echo "</span></a></li>\r\n</ul>\r\n\r\n<div class=\"tab-content\">\r\n\r\n<div class=\"tab-pane";
makeActiveTab(1, "no");
echo "\" id=\"tab_1_1\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-comment-alt\"></i> Create A Note</h4></div>\r\n<div class=\"widget-content\">\r\n<form class=\"form-horizontal row-border\" method=\"post\" enctype=\"multipart/form-data\" action=\"notes.php\">\r\n<input name=\"csrf_token\" value=\"";
echo $_SESSION["csrf_token"];
echo "\" type=\"hidden\" />\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Choose An Affiliate</label>\r\n<div class=\"col-md-4\"><select class=\"form-control\" name=\"note_to\">\r\n";
$getnames = $db->query("select id, username from idevaff_affiliates order by id");
if ($getnames->rowCount()) {
    print "<option value='0'>All Affiliates</option>\n";
    while ($qry = $getnames->fetch()) {
        $chid = $qry["id"];
        $chuser = $qry["username"];
        print "<option value='" . $chid . "'";
        if (isset($_REQUEST["note_to"]) && $chid == $_REQUEST["note_to"]) {
            print " selected";
        }
        print ">" . $chid . " - " . $chuser . "</option>\n";
    }
}
echo "</select></div>\r\n</div>\r\n\r\n<div class=\"form-group\" style=\"background:#ebf3ff;\">\r\n<label class=\"col-md-3 control-label\">Upload An Image<span class=\"pull-right label label-info\">optional</span></label>\r\n<div class=\"col-md-2\"><input type=\"file\" name=\"file_upload_logo\" data-style=\"fileinput\" /></div>\r\n</div>\r\n<div class=\"form-group\" style=\"background:#ebf3ff;\">\r\n<label class=\"col-md-3 control-label\">Image Positioning<span class=\"pull-right label label-info\">optional</span></label>\r\n<div class=\"col-md-4\"><select name=\"note_image_location\" class=\"form-control\">\r\n<option value=\"0\">Display Before Message</option>\r\n<option value=\"1\">Display After Message</option>\r\n</select></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Subject</label>\r\n<div class=\"col-md-9\"><textarea class=\"form-control\" name=\"note_sub\" cols=\"40\">";
if (isset($note_fill_1)) {
    echo stripslashes($note_fill_1);
}
echo "</textarea></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Message</label>\r\n<div class=\"col-md-9\"><textarea rows=\"6\" name=\"note_con\" class=\"form-control\">";
if (isset($note_fill_2)) {
    echo stripslashes($note_fill_2);
}
echo "</textarea></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Display To Affiliate</label>\r\n<div class=\"col-md-2\"><select name=\"note_display\" class=\"form-control\">\r\n<option value=\"1\"";
if ($note_fill_3 == 1) {
    echo " selected=\"selected\"";
}
echo ">Yes</option>\r\n<option value=\"0\"";
if ($note_fill_3 == 0) {
    echo " selected=\"selected\"";
}
echo ">No</option>\r\n</select></div>\r\n</div>\r\n<div class=\"form-group\">\r\n<label class=\"col-md-3 control-label\">Attach To Affiliate Record</label>\r\n<div class=\"col-md-2\"><select name=\"note_attach\" class=\"form-control\">\r\n<option value=\"1\"";
if ($note_fill_4 == 1) {
    echo " selected=\"selected\"";
}
echo ">Yes</option>\r\n<option value=\"0\"";
if ($note_fill_4 == 0) {
    echo " selected=\"selected\"";
}
echo ">No</option>\r\n</select></div>\r\n</div>\r\n<div class=\"form-actions\">\r\n<input type=\"submit\" value=\"Create Note\" class=\"btn btn-primary\">\r\n</div>\r\n<input type=\"hidden\" name=\"cfg\" value=\"84\">\r\n</form>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"tab-pane";
makeActiveTab(2, "no");
echo "\" id=\"tab_1_2\">\r\n<div class=\"col-md-12\">\r\n<div class=\"widget box\" style=\"margin-top:20px;\">\r\n<div class=\"widget-header\"><h4><i class=\"icon-comment-alt\"></i> Manage Notes</h4></div>\r\n<div class=\"widget-content\">\r\n";
if ($notescount) {
    echo "<table class=\"table\" id=\"dyntable_notes\">\r\n<thead>\r\n<th></th>\r\n</thead>\r\n<tbody>\r\n</tbody>\r\n</table>\r\n";
} else {
    echo "No notes yet.\r\n";
}
echo "</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n</div>\r\n</div>\r\n\r\n";
require "templates/footer.php";

?>