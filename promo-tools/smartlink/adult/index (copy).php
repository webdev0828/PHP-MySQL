<?php
//get aff id from smartlink
$tracker = $_GET['idev_id'];
if (isset($_GET['idev_tid1'])) 
{ 
$tid11 = $_GET['idev_tid1'];
} 
if (isset($_GET['idev_tid2'])) 
{ 
$tid22 = $_GET['idev_tid2'];
} 
if (isset($_GET['idev_tid3'])) 
{ 
$tid33 = $_GET['idev_tid3'];
} 
if (isset($_GET['idev_tid4'])) 
{ 
$tid44 = $_GET['idev_tid4'];
} 
$delitel = 'RkwuK6';
$ip = $_SERVER [ 'REMOTE_ADDR' ]; 
$country = file_get_contents ( 'http://api.hostip.info/country.php?ip=' . $ip ); 
$useragent=$_SERVER['HTTP_USER_AGENT'];


if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
//mobile traffic start

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
// geo target first with geo direct offer smartlinks or simply smartlinks if offers are good for this geo
if ( $_SESSION['country'] == "EE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=196&aff_id=10787&pid=35297&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=206&aff_id=10787&pid=35294&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LV" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=209&aff_id=10787&pid=35291&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1&qxw=t21" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=194&aff_id=10787&pid=35258&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "RO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&6creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=58181&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=58978&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=58924&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=57514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=56343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=57982&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile66&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=82498&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=81829&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=81202&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=70135&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=74174&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=70131&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ME" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "HR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=51663&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=82985&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=82340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=82340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=71345&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=71283&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "HU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=203&aff_id=10787&pid=35264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5dfa9d4d3.traffic-c.com/?wid=12649&wid_hmac=4a6a1276b531dec4df4ebda14da02c2b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 12649 - HU-3G/WIFI-HotvidEXCLUSIVE
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=81485&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=84037&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=51659&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=72187&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=74004&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=71346&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
// offer paused        "https://gltrak.com/aff_c2.php?offer_id=1230&aff_id=10787&pid=79597&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=221&aff_id=10787&pid=35279&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SI" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=218&aff_id=10787&pid=35276&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=81836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=81836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=64691&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=81919&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=56344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=71320&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "RS" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=82263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=83621&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=83469&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1&qxw=t21", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=71321&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=73050&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=71941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=193&aff_id=10787&pid=35255&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CY" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=60449&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=60450&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=62647&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=60440&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=214&aff_id=10787&pid=35270&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink TC for poland is good, keep
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlinkp
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=205&aff_id=10787&pid=35288&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink, Italy is good, keep
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "GR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=199&aff_id=10787&pid=35285&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13214&wid_hmac=37e6905f64588d84d77cf771e4d57c5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13214 - NO-Mobile-MinSexDate-SnapEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13172&wid_hmac=dc75d9cb04383811d25c8fefb5ad5f02&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13172 - NO-Mobile-MinSexDate-DiskretEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13170&wid_hmac=2c1bda808610ca520e808d8e82565270&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13170 - NO-Mobile-MinSexDate-AdvarselEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13168&wid_hmac=483fe70e97ff359065627716ea2c4637&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13168 - NO-Mobile-MinSexDate-LokaleEXCLUSIVE
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13166&wid_hmac=6275c9f57cdeef72825982bd598fa8d0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany 13166 - NO-Mobile-MinSexDate-LykkenEXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "FI" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat 
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5dfa9d4d3.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany Costa Rica Adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AD" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AF" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BS" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "DE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "DK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "DO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "EC" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "EG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ES" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ET" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "FO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "FR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "UK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "GB" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "GU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "HK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ID" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IS" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JM" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JP" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LB" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
//        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LI" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MC" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MV" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MX" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MY" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "OM" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "QA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "RU" ) { 
    $urls = array(
        "http://runetki2.com?c=606140&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Runetki
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SM" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
//        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "UA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "US" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "UY" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "VE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "VN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ZA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// mobile traffic end
} else {
// desktop traffic start

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
// geo target first with geo direct offer smartlinks or simply smartlinks if offers are good for this geo
if ( $_SESSION['country'] == "EE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=196&aff_id=10787&pid=35297&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=206&aff_id=10787&pid=35294&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LV" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=209&aff_id=10787&pid=35291&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1&qxw=t21" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=194&aff_id=10787&pid=35258&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "RO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ME" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "HR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "HU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=203&aff_id=10787&pid=35264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
// offer paused        "https://gltrak.com/aff_c2.php?offer_id=1230&aff_id=10787&pid=79597&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=221&aff_id=10787&pid=35279&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SI" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=218&aff_id=10787&pid=35276&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "RS" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&&source=desktopcreative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=193&aff_id=10787&pid=35255&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // turbomax
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CY" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=214&aff_id=10787&pid=35270&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink 
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=205&aff_id=10787&pid=35288&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "GR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=199&aff_id=10787&pid=35285&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // turbomax
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13215&wid_hmac=c32ffab26bbd4436c4333a4054bf3e4d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13215 - NO-Desktop-MinSexDate-SnapEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13173&wid_hmac=b2e8b41b9ba3613024c2014541a94472&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13173 - NO-Desktop-MinSexDate-DiskretEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13171&wid_hmac=c03d5388df0da55c41f34248dca3d3e8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13171 - NO-Desktop-MinSexDate-AdvarselEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13169&wid_hmac=3b9b8560cf665e0be930cf3dfb5a866c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13169 - NO-Desktop-MinSexDate-LokaleEXCLUSIVE
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BitterStrawberry adult smartlink
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13167&wid_hmac=6c9ab7ff242b98eb6c1f6204ef524734&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany 13167 - NO-Desktop-MinSexDate-LykkenEXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "FI" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // whatschat 
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AD" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AF" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "AW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BS" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "BW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
//        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "CR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "DE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "DK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "DO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "EC" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "EG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ES" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ET" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "FO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "FR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "GB" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "UK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "GU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "HK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ID" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "IS" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JM" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JO" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "JP" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "KZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LB" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
//        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LI" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "LU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MC" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MU" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MV" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MX" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MY" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "MZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NL" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "NZ" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "OM" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PK" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "PR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "QA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "RU" ) { 
    $urls = array(
        "http://runetki2.com?c=606140&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Runetki
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "SM" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TG" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TH" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
//        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TR" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TT" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "TW" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "UA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "US" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "UY" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "VE" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "VN" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $_SESSION['country'] == "ZA" ) { 
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-Smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://onlinesexnow.com?c=605932&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BongaCash Whitelabel
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult smartlink
//        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=Desktop-smartlink&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country", // TrafficPartner smartlink
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>
