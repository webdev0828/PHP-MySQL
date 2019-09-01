<?PHP
#############################################################
## iDevAffiliate Version 9.2
## Copyright - iDevAffiliate Inc.
## Website: https://www.idevdirect.com/
## Support: https://www.idevsupport.com/
#############################################################

	ob_start();

	// Get server path
	include("path.php");
	
	// Get install folder
	$install_directory_name = substr($path, strlen($_SERVER['DOCUMENT_ROOT']) + 1);
	
	// Set session duration.
	$expire_time = 60 * 60; // seconds * minutes, 90 minutes (90 * 30) = default

	include("debug.php");

	// Include DB connection.
	include_once($path.'/API/database.php');
 
	// Include session data.
	if (isset($control_panel_session)) {
	include_once($path.'/API/session.class_affiliates.php');
	} else { include_once($path. '/API/session.class.php'); }

	// Include sanitation functions.
	include_once($path.'/includes/functions.php');

	// Activate session.
	$session = new session();
	$session->start_session("_s", false);

	// Include encryption keys
	include_once ($path.'/API/keys.php');
	
	// Include package definitions.
	if ( strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false) {
		include_once ($path.'/API/config_package.php');
	}
	
	// Include global data.
	include($path.'/API/data.php');
	
	// Include Facebook API.
	include($path.'/API/facebook.php');
	
	// Include force ssl switcher
    include($path.'/API/sslSwitcher.php');
	
?>