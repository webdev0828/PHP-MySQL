<?PHP
#############################################################
## iDevAffiliate Version 9.2
## Copyright - iDevAffiliate Inc.
## Website: https://www.idevdirect.com/
## Support: https://www.idevsupport.com/
#############################################################

if (is_file('templates/bootstrap/css/bootstrap.css')) {
$css_location = "templates/bootstrap/css/bootstrap.css";
} else { $css_location = "admin/templates/bootstrap/css/bootstrap.css"; }

$db_connection_failure = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Oops!</title>
<link href="/' . $css_location . '" rel="stylesheet">
<link href="/' . $css_location . '" rel="stylesheet">
<style>
body {background-color:#121212 !important;text-align:center;}
.panel-title{font-size:4rem;}
.panel-body{font-size:3rem;}
.panel-primary > .panel-heading {background-color:#532B72;border-color:#532B72;}
.panel-primary {border-color:#532B72;}
</style>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById(\'counter\');
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script></head>
<body>
<div style="padding:50px; width:80%; margin-left:auto; margin-right:auto;">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong><i class="fa fa-exclamation-triangle fa-fw"></i> Oops!</strong></h3>
</div>
<div class="panel-body">
<p><b>We were unable to display what you were looking for.</b></p>
<p>We will now be using the super powers granted to us in order to fix this mistake of the Universe as soon as possible.</p>
<p>Attempting page refresh in <span id="counter" style="font-weight: bold;">9</span>...</p>
</div>
</div>
</div>
    <script src="https://use.fontawesome.com/fc6a809c72.js"></script>
</body>
</html>';

$installcheck = 1;

try {
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
	$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@SESSION.sql_mode='TRADITIONAL,NO_AUTO_VALUE_ON_ZERO'");
	$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET @@SESSION.sql_mode='TRADITIONAL,NO_AUTO_VALUE_ON_ZERO,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
	$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET sql_mode='TRADITIONAL,NO_AUTO_VALUE_ON_ZERO,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
	
}
catch(PDOException $e) {
	//print "Error!: " . $e->getMessage() . "<br/>";
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
header('refresh: 9; url='.$actual_link); 
    die ($db_connection_failure);
}

?>
