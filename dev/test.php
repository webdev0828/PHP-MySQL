<?php
// include_once $_SERVER["DOCUMENT_ROOT"]."/API/config.php";

// $x = range(0,10);
// $y = range(15,30);
// $z = array_merge($x, $y);
// print_r($z);


// $x = range(0,1);
// $x = array_merge($x, range(15,17));
// $x = array_merge($x, range(20,22));
// print_r($x);
echo date('Y-m-d H:i:s T', time()) . "\n";
echo "<br><br>";
date_default_timezone_set('UTC');
echo date('Y-m-d H:i:s T', time()) . "\n";
?>