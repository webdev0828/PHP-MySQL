<?php

if (!defined("IDEV_FILE_AUTH")) {
    exit("picture_upload.php - Unauthorized Access");
}
$picture_error = 0;
$error_message = NULL;
$picture_file_type = $_FILES["picture"]["type"];
$picture_file_size = $_FILES["picture"]["size"];
$picture_file_name = $_FILES["picture"]["name"];
$picture_file_temp = $_FILES["picture"]["tmp_name"];
$picture_file_extension = strtolower(substr($picture_file_name, -3));
if ($picture_file_temp) {
    list($width, $height, $type, $attr) = getimagesize($picture_file_temp);
}
if (!$picture_file_temp) {
    $picture_error = 1;
    $error_message .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $pic_missing . "<br />\n";
}
if (!$picture_error) {
    if ($picture_file_type == "image/gif" || $picture_file_type == "image/jpeg" || $picture_file_type == "image/pjpeg" || $picture_file_type == "image/x-png" || $picture_file_type == "image/png") {
        $picture_error = $picture_error;
    } else {
        $picture_error = 1;
        $error_message .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $pic_invalid . "<br />\n";
    }
}
if ($picture_error) {
    $smarty->assign("upload_error", 1);
    $smarty->assign("error_message", $error_message);
}
if (!$picture_error) {
    $newfilename = NULL;
    $newfilename = md5($newfilename . microtime());
    $newfilename = $newfilename . "." . $picture_file_extension;
    $res = copy($picture_file_temp, $path . "/assets/pictures/" . $newfilename);
    if (!$res) {
        $picture_error = 1;
        $error_message .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $pic_error . "<br />\n";
    }
    if ($picture_error) {
        $smarty->assign("upload_error", 1);
        $smarty->assign("error_message", $error_message);
    } else {
        $complete_upload = $db->prepare("update idevaff_affiliates set picture = ? where id = ?");
        $complete_upload->execute(array($newfilename, $_SESSION[$install_directory_name . "_idev_LoggedID"]));
        if ($admin_notify_picture) {
            include "templates/email/admin.image_upload.php";
        }
        $smarty->assign("upload_success", 1);
        $success_message = $pic_success;
        $smarty->assign("success_message", $success_message);
    }
}

?>