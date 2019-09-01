<?PHP
#############################################################
## iDevAffiliate Version 9.2
## Copyright - iDevAffiliate Inc.
## Website: https://www.idevdirect.com/
## Support: https://www.idevsupport.com/
#############################################################

$idev_error = null;

// ======================================================
// Check PHP Version
// ======================================================
if (version_compare(phpversion(), '5.6.0', '<')) {
	$idev_error = "php";
	$version_required = "PHP 5.6, 7.0, 7.1 or 7.2";
}

// ======================================================
// Check ionCube Loaded
// ======================================================
if (!isset($idev_error)) {
if (!extension_loaded("IonCube Loader")) { $idev_error = "ioncube"; }
}

// ======================================================
// Check ionCube Version
// ======================================================
if (!isset($idev_error)) {
$loader_version = ioncube_loader_version();
if ($loader_version < '10.2') {
	$idev_error = "ioncube_version";
	$ioncube_version_required = '10.2';
}
}

// ======================================================
// PDO Enabled
// ======================================================
if (!isset($idev_error)) {
if (!extension_loaded('PDO')) { $idev_error = "pdo"; }
}

// ======================================================
// Check Memory Limit
// ======================================================
if (!isset($idev_error)) {
	$current_memory = ini_get('memory_limit');
	$current_memory = preg_replace('/\D/', '', $current_memory);
	
	if ($current_memory < '128') {
		$idev_error = "memory_limit";
		$memory_requirement = '128M';
	}
}

// ======================================================
// Check XML Stuff
// ======================================================
if (!isset($idev_error)) {
	if (!extension_loaded('xml')) { $idev_error = "xml"; }
}

if (!isset($idev_error)) {
	if (!extension_loaded('xmlreader')) { $idev_error = "xmlreader"; }
}

if (!isset($idev_error)) {
	if (!extension_loaded('xmlwriter')) { $idev_error = "xmlwriter"; }
}

// ======================================================
// Check for cURL
// ======================================================
if (!isset($idev_error)) {
	if (!function_exists('curl_init')) { $idev_error = "curl"; }
}

// ======================================================
// ALL GOOD FORWARD TO INSTALL
// ======================================================
if (!isset($idev_error)) {
header("Location: install.php"); exit;

} else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>iDevAffiliate <?PHP echo $write_edition; ?> Installation Program</title>
<link href="templates/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="templates/bootstrap/css/custom.css" rel="stylesheet">
</head>
<body>
  
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header" style="margin-top:6px;"><img src="../admin/images/idevaffiliate_logo.png"></div>
<div class="navbar-collapse collapse">
</div>
</div>
</div>

<div id="wrap">
<div class="container">

<div style="padding:20px; width:1000px; margin-left:auto; margin-right:auto;">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>Critical Error</strong><span class="pull-right">iDevAffiliate Installation Failure</span></h3>
</div>

<?PHP if ($idev_error == "php") { ?>
  <div class="panel-body">
    <div class="alert alert-info">The <strong>PHP version</strong> being used on your hosting account is outdated.</div>
	<p>Your web server is currently using PHP version <strong><?PHP echo phpversion(); ?></strong>. In order to install and run iDevAffiliate, <strong><?PHP echo $version_required; ?></strong> must be enabled on your web hosting account. You will need to contact your web hosting provider and/or server admin and ask them to upgade your hosting account to use <strong><?PHP echo $version_required; ?></strong>.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to do this now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, <strong><?PHP echo $version_required; ?></strong> is still not enabled in which case you will need to continue working with your web hosting provider and/or server admin.</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server. There is nothing additional required for you to purchase. This is a service that is already present on your web hosting account. It simply needs turned on/enabled. PHP INFO is provided below so you can review your server settings.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "pdo") { ?>
  <div class="panel-body">
    <div class="alert alert-info"><strong>PDO</strong> is not enabled on your web hosting account.</div>
	<p>In order to install and run iDevAffiliate, <strong>PDO</strong> must be enabled on your web hosting account. You will need to contact your web hosting provider and/or server admin and ask them to enable <strong>PDO</strong> on your web hosting account.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to do this now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, <strong>PDO</strong> is still not properly enabled in which case you will need to continue working with your web hosting provider and/or server admin.</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server. There is nothing additional required for you to purchase. This is a service that is already present on your web hosting account. It simply needs turned on/enabled. PHP INFO is provided below so you can review your server settings.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "ioncube") { ?>
  <div class="panel-body">
    <div class="alert alert-info"><strong>ionCube</strong> is not enabled on your web hosting account.</div>
	<p>In order to install and run iDevAffiliate, <strong>ionCube</strong> must be enabled on your web hosting account. You will need to contact your web hosting provider and/or server admin and ask them to enable <strong>ionCube</strong> on your web hosting account.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to do this now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, <strong>ionCube</strong> is still not properly enabled in which case you will need to continue working with your web hosting provider and/or server admin.</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server. There is nothing additional required for you to purchase. This is a service that is already present on your web hosting account. It simply needs turned on/enabled. PHP INFO is provided below so you can review your server settings.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "ioncube_version") { ?>
  <div class="panel-body">
    <div class="alert alert-info">The <strong>ionCube</strong> loader version enabled on your hosting account is out-of-date.</div>
	<p>The good news is, <strong>ionCube</strong> is enabled on your hosting account. The bad news is, the loader version being used is out-of-date and will need updated in order to continue. You will need to contact your web hosting provider and/or server admin and ask them to update the <strong>ionCube</strong> loader version being used on your web hosting account.</p>
	<p>ionCube Loader Version Currently Enabled: <?PHP echo $loader_version; ?></p>
	<p style="color:#CC0000;">ionCube Loader Version Required: <?PHP echo $ioncube_version_required; ?></p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to have this updated now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, the <strong>ionCube</strong> version is still not properly updated in which case you will need to continue working with your web hosting provider and/or server admin.</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server. There is nothing additional required for you to purchase. This is a service that is already present on your web hosting account. PHP INFO is provided below so you can review your server settings.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "memory_limit") { ?>
  <div class="panel-body">
    <div class="alert alert-info">The current PHP <strong>memory_limit</strong> is set too low and needs increased.</div>
	<p>Please contact your web hosting provider and/or server admin and ask them to increase the PHP <strong>memory_limit</strong> for your hosting account.</p>
	<p>Current <strong>memory_limit</strong> setting: <?PHP echo ini_get('memory_limit'); ?></p>
	<p style="color:#CC0000;">Required <strong>memory_limit</strong> setting: <?PHP echo $memory_requirement; ?></p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to have this updated now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, this error message persists, you will need to continue working with your web hosting provider and/or server admin to ensure the <strong>memory_limit</strong> is properly increased.</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "xml") { ?>
  <div class="panel-body">
    <div class="alert alert-info">The <strong>XML extension</strong> is not installed.</div>
	<p>Please contact your web hosting provider and/or server admin and ask them to enable the <strong>XML extension</strong> for your hosting account. While they are enabling this extension you should have them also confirm the <font color="#CC0000">XML Reader</font> and <font color="#CC0000">XML Writer</font> extensions are enabled as well.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to have this enabled now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, this error message persists, you will need to continue working with your web hosting provider and/or server admin to ensure the <strong>XML</strong> items are properly enabled</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "xmlreader") { ?>
  <div class="panel-body">
    <div class="alert alert-info">The <strong>XML Reader extension</strong> is not installed.</div>
	<p>Please contact your web hosting provider and/or server admin and ask them to enable the <strong>XML Reader extension</strong> for your hosting account. While they are enabling this extension you should have them also confirm the <font color="#CC0000">XML</font> and <font color="#CC0000">XML Writer</font> extensions are enabled as well.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to have this enabled now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, this error message persists, you will need to continue working with your web hosting provider and/or server admin to ensure the <strong>XML</strong> items are properly enabled</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "xmlwriter") { ?>
  <div class="panel-body">
    <div class="alert alert-info">The <strong>XML Writer extension</strong> is not installed.</div>
	<p>Please contact your web hosting provider and/or server admin and ask them to enable the <strong>XML Writer extension</strong> for your hosting account. While they are enabling this extension you should have them also confirm the <font color="#CC0000">XML</font> and <font color="#CC0000">XML Reader</font> extensions are enabled as well.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to have this enabled now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, this error message persists, you will need to continue working with your web hosting provider and/or server admin to ensure the <strong>XML</strong> items are properly enabled</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server.</p>
  </div>
<?PHP } ?>

<?PHP if ($idev_error == "curl") { ?>
  <div class="panel-body">
    <div class="alert alert-info"><strong>cURL</strong> is not enabled.</div>
	<p>Please contact your web hosting provider and/or server admin and ask them to enable <strong>cURL</strong> for your hosting account.</p>
	<p style="color:#CC0000; font-weight:bold;">Please take a moment to have this enabled now.</p>
	<p><a href="index.php" class="btn btn-primary btn-sm">Try Again</a></p>
	<p>If after clicking the above button you still see this page, this error message persists, you will need to continue working with your web hosting provider and/or server admin to ensure <strong>cURL</strong> is properly enabled</p>
	<p><strong>Please Note:</strong><br />This is not a task the iDevAffiliate support team can complete for you. This task can only be completed by the person or entity responsible for managing your web hosting server.</p>
  </div>
<?PHP } ?>

</div>
</div>

<br />

<?PHP phpinfo(); ?>


</div>
</div>

<div id="footer">
<div class="container">
<p class="text-muted credit pull-right">Copyright 1999-<?PHP echo date("Y"); ?> - iDevAffiliate Inc. - <a href="https://www.idevdirect.com/" target="_blank">iDevAffiliate</a></p>
</div>
</div>

</body>
</html>

<?PHP } ?>