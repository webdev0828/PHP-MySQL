<?PHP

// Basic function for outputting errors to screen.  Designed to
// be very basic in case you want to add your own functionality.
// --------------------------------------------------------------

 define('IDEV_DEBUG_LEVEL', '0');

 switch(IDEV_DEBUG_LEVEL) {
 case 0:
 error_reporting (0);
 break;

 case 1:
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 break;
 
 default:
 error_reporting(E_ALL);
   
 }

?>