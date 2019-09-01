<?php
//get aff id from smartlink
$tracker = $_GET['idev_id'];

$tid11 = $_GET['idev_tid1'];
$tid22 = $_GET['idev_tid2'];
$tid33 = $_GET['idev_tid3'];
$tid44 = $_GET['idev_tid4'];
$delitel = 'RkwuK6';
/* TODO: pass trackers to partners, come up with ways to get them from partners and display tracking in stats
TC - use {click_id} and explode
SlimSpots - use my_track_id=[wsid] and explode
BitterStrawberry - use clickid3 and explode
*/
    session_start();

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
    $urls = array(
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BitterStrawberry mainstream
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
?>
