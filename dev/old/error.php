<?php
header('refresh: 7; url=https://sublimerevenue.com'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sublime Revenue Tracking</title>
<link href="/css/bootstrap.css" rel="stylesheet">
<style>
body {background-color:#121212 !important;text-align:center;}
.panel-primary > .panel-heading {background-color:#532B72;border-color:#532B72;}
.panel-primary {border-color:#532B72;}
</style>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
</head>
<body>
<div style="padding:50px; width:80%; margin-left:auto; margin-right:auto;">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong><i class="fa fa-exclamation-triangle fa-fw"></i> Oops!</strong></h3>
</div>
<div class="panel-body">
<p><b>We were unable to display what you were looking for.</b></p>
<p>We will now be using the super powers granted to us in order to fix this mistake of the Universe as soon as possible.</p>
<p>Attempting to redirect you to <b>sublimerevenue.com</b> in about <span id="counter" style="font-weight: bold;">9</span> seconds!</p>
<p>If this does not work, please try clearing your browser's cache and cookies!</p>
</div>
</div>
</div>
    <script src="https://use.fontawesome.com/fc6a809c72.js"></script>
</body>
</html>