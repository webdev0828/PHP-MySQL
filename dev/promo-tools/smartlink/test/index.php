<?php
//get aff id from smartlink
$tracker = $_GET['idev_id'];
$tid11 = $_GET['idev_tid1'];
$tid22 = $_GET['idev_tid2'];
$tid33 = $_GET['idev_tid3'];
$tid44 = $_GET['idev_tid4'];
$delitel = 'RkwuK6';
$ip = $_SERVER [ 'REMOTE_ADDR' ]; 
$country = file_get_contents ( 'http://api.hostip.info/country.php?ip=' . $ip ); 

    session_start();

if (!isset($_SESSION['country'])) {
	$ip = $_SERVER [ 'REMOTE_ADDR' ]; 
	$_SESSION['country'] = file_get_contents ( 'http://api.hostip.info/country.php?ip=' . $ip ); 
}

    function checkUrl($url, $urls){
        if(count($_SESSION['visited']) == count($urls)){
               $_SESSION['visited'] = Array();
        }
        if(in_array($url, $_SESSION['visited'])){
             $url = $urls[array_rand($urls)];
             checkUrl($url, $urls);
        }
        else{
             $_SESSION['visited'][] = $url;
             header("Location: $url");
        }
    }
if ( $_SESSION['country'] == "BG" ) { 
    $urls = array(
        "https://sexobiavi.eu?tracker=$tracker&tids=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BG Link1
        "https://sexobyavi.com?tracker=$tracker&tids=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BG Link1
        "https://seksobyavi.com?tracker=$tracker&tids=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BG Link1
    );
}
else {
    $urls = array(
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker", // TrafficCompany adult smartlink
/* hide because it sends in USD
        "https://t.irtyc.com/ok1lfbfark?aff_id=547&offer_id=3788&aff_sub=sublimerevenue&aff_sub2=adult&aff_sub3=smartlink&aff_sub4=$tracker", // CrakRevenue global adult smartlink
*/
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&subid=$tracker", // SlimSpots adult smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue&clickid2=adult&clickid3=smartlink&clickid4=$tracker" // BitterStrawberry adult smartlink
    );
}
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
?>
