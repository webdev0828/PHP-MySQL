<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/android/i',$useragent)) {
    echo "<b style='color:green;'>Android</b>: ";    echo $useragent;
}else{
    echo "<b style='color:red;'>Non-Android</b>: ";    echo $useragent;
}


?>