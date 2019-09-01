<?PHP

function redirectToHttps()
{
	if ((empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off") || $_SERVER['SERVER_PORT'] != 443 ) {
        $redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location:$redirect");
        exit();
    }
}

if ($force_ssl == 1) {
    redirectToHttps();
}

?>
