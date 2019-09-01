<?php
/*  TODO: eventually make it ping URL to confirm it works before saving
        if (isset($_POST['save'])) {
            $url = html_output($_POST['e_postback_url']);
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if($httpcode=200 && $httpcode<300){
                  $httpresult = 1;
                } else {
                  $httpresult = 0;
                }
        }
*/
$temp_fields = "error_title,missing_website";
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
$missing_website = html_language_output($getlanguage["missing_website"]);
$ping_unsuccessful = "Ping to URL unsuccessful!";
if (!defined("IDEV_FILE_AUTH")) {
    exit("validate_postback_edit.php - Unauthorized Access");
}
$error_list = "";
$fail = 0;
if (!$_POST["e_postback_url"] || filter_var($_POST["e_postback_url"], FILTER_VALIDATE_URL) === FALSE) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $missing_website . "<BR />\n";
}
/* ping error
if ($httpresult && $httpresult == 0) {
    $error_list .= "<img border='0' src='/images/mark.gif' height='16' width='16'>&nbsp; " . $ping_unsuccessful . "<BR />\n";
}
*/
?>