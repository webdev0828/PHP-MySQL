<?php

if (!isset($_SESSION[$install_directory_name . "_idev_LoggedID"])) {
    header("Location: /login");
    exit;
}
$_SESSION[$install_directory_name . "_expire"] = time() + $expire_time;
if ($_SERVER["REQUEST_METHOD"] === "POST" && (empty($_POST["csrf_token"]) || empty($_SESSION["csrf_token"]) || $_POST["csrf_token"] != $_SESSION["csrf_token"])) {
    header("HTTP/1.1 403 Forbidden");
    echo "Request failed. Please try again or contact support. <a href=\"javascript: window.history.back();\">Go back</a>.";
    exit;
}
if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = substr(md5(rand()), 0, 20);
}
if (isset($smarty)) {
    $smarty->assign("csrf_token", $_SESSION["csrf_token"]);
}

?>