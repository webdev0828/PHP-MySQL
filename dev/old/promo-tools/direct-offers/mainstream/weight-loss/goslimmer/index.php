<?php
include "/var/www/sublimerevenue.com/API/config.php";

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
if (isset($_GET['set'])) { 
$set = $_GET['set'];
}
if (isset($_GET['link'])) { 
$link = $_GET['link'];
}
$ip = $_SERVER['REMOTE_ADDR'];

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        function Dot2LongIP($IPaddr) 
        {
            if ($IPaddr == "") {
                return 0;
            }
            $ips = explode(".", $IPaddr);
            return $ips[3] + $ips[2] * 256 + $ips[1] * 256 * 256 + $ips[0] * 256 * 256 * 256;
        }
        $ipno = Dot2LongIP($ip);
        $ipquery = "SELECT country_code FROM idevaff_ip2location WHERE " . $ipno . " <= ip_to LIMIT 1";
    } else {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            function Dot2LongIPipv6($ip)
            {
                $int = inet_pton($ip);
                $bits = 15;
                for ($ipv6long = 0; 0 <= $bits; $bits--) {
                    $bin = sprintf("%08b", ord($int[$bits]));
                    if ($ipv6long) {
                        $ipv6long = $bin . $ipv6long;
                    } else {
                        $ipv6long = $bin;
                    }
                }
                $ipv6long = gmp_strval(gmp_init($ipv6long, 2), 10);
                return $ipv6long;
            }
            $ipno = Dot2LongIPipv6($ip);
            $ipquery = "SELECT country_code FROM idevaff_ip2location_ipv6 WHERE " . $ipno . " <= ip_to LIMIT 1";
        }
    }
    $ipresult = $db->query($ipquery);
    if (0 < $ipresult->rowCount()) {
        $country_check = $ipresult->fetch();
        $country = $country_check["country_code"];
    }
} else {
    $country = 'XX';
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
//mobile traffic start

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
// geo target first with geo direct offer smartlinks or simply smartlinks if offers are good for this geo
if ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1090&aff_id=10787&pid=78725&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // VN-GoSlimmer-Mobile (ID: 1090) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1090&aff_id=10787&pid=78753&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // VN-GoSlimmer-Mobile (ID: 1090) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=843&aff_id=10787&pid=57097&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-GoSlimmer-Mobile (ID: 843) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=843&aff_id=10787&pid=57257&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // AL-GoSlimmer-Mobile (ID: 843) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=843&aff_id=10787&pid=57609&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-GoSlimmer-Mobile (ID: 843) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=793&aff_id=10787&pid=56836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Mobile (ID: 793) Landing
        "https://gltrak.com/aff_c2.php?offer_id=793&aff_id=10787&pid=54087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-GoSlimmer-Mobile (ID: 793) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=793&aff_id=10787&pid=56953&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-GoSlimmer-Mobile (ID: 793) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=792&aff_id=10787&pid=57988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Mobile (ID: 792) Landing
        "https://gltrak.com/aff_c2.php?offer_id=792&aff_id=10787&pid=54093&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-GoSlimmer-Mobile (ID: 792) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=792&aff_id=10787&pid=56958&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-GoSlimmer-Mobile (ID: 792) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=791&aff_id=10787&pid=60341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Mobile (ID: 791) Landing
        "https://gltrak.com/aff_c2.php?offer_id=791&aff_id=10787&pid=54084&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-GoSlimmer-Mobile (ID: 791) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=791&aff_id=10787&pid=56950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-GoSlimmer-Mobile (ID: 791) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=790&aff_id=10787&pid=55551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Mobile (ID: 790) Landing
        "https://gltrak.com/aff_c2.php?offer_id=790&aff_id=10787&pid=54092&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-GoSlimmer-Mobile (ID: 790) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=790&aff_id=10787&pid=56957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-GoSlimmer-Mobile (ID: 790) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=789&aff_id=10787&pid=57095&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Mobile (ID: 789) Landing
        "https://gltrak.com/aff_c2.php?offer_id=789&aff_id=10787&pid=54088&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-GoSlimmer-Mobile (ID: 789) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=789&aff_id=10787&pid=57048&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-GoSlimmer-Mobile (ID: 789) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=787&aff_id=10787&pid=62671&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Mobile (ID: 787) Landing
        "https://gltrak.com/aff_c2.php?offer_id=787&aff_id=10787&pid=54090&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-GoSlimmer-Mobile (ID: 787) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=787&aff_id=10787&pid=56955&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-GoSlimmer-Mobile (ID: 787) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=786&aff_id=10787&pid=56835&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Mobile (ID: 786) Landing
        "https://gltrak.com/aff_c2.php?offer_id=786&aff_id=10787&pid=54086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-GoSlimmer-Mobile (ID: 786) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=786&aff_id=10787&pid=56952&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-GoSlimmer-Mobile (ID: 786) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=785&aff_id=10787&pid=56832&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Mobile (ID: 785) Landing
        "https://gltrak.com/aff_c2.php?offer_id=785&aff_id=10787&pid=54078&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-GoSlimmer-Mobile (ID: 785) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=785&aff_id=10787&pid=56946&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-GoSlimmer-Mobile (ID: 785) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=784&aff_id=10787&pid=56834&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Mobile (ID: 784) Landing
        "https://gltrak.com/aff_c2.php?offer_id=784&aff_id=10787&pid=54082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-GoSlimmer-Mobile (ID: 784) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=784&aff_id=10787&pid=56949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-GoSlimmer-Mobile (ID: 784) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=783&aff_id=10787&pid=56833&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Mobile (ID: 783) Landing
        "https://gltrak.com/aff_c2.php?offer_id=783&aff_id=10787&pid=54081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-GoSlimmer-Mobile (ID: 783) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=783&aff_id=10787&pid=57047&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-GoSlimmer-Mobile (ID: 783) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=782&aff_id=10787&pid=54091&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-GoSlimmer-Mobile (ID: 782) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=782&aff_id=10787&pid=56956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-GoSlimmer-Mobile (ID: 782) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=60349&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59848&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59461&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58961&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58637&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile7&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=54080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile8&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-GoSlimmer-Mobile (ID: 781) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=60914&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile9&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile10&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59323&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile11&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile12&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile13&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile14&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=56948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile16&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-GoSlimmer-Mobile (ID: 781) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=62361&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780) Landing
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=59526&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780) Landing
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=54089&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-GoSlimmer-Mobile (ID: 780) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=59856&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=57625&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=56954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-GoSlimmer-Mobile (ID: 780) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=62419&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60929&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60589&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60355&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59034&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58959&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile7&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58984&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile8&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58516&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile9&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58512&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile10&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58242&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile11&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=57825&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile12&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=57253&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile13&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=56848&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile14&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=54083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile15&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-GoSlimmer-Mobile (ID: 779) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=62364&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile16&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile17&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile18&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61952&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile19&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile20&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61962&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile21&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60591&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile22&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59463&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile23&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59331&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile24&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile25&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59040&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile26&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile27&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile28&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58944&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile29&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=57985&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile30&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-GoSlimmer-Mobile (ID: 779) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=54085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Mobile (ID: 742) Landing
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=70946&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Mobile (ID: 742) Landing
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=44617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-GoSlimmer-Mobile (ID: 742) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=56951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-GoSlimmer-Mobile (ID: 742) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitnesssmartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream smartlink
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BitterStrawberry mainstream smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// mobile traffic end
} else {
// desktop traffic start

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
//geo target first with geo direct offer smartlinks or simply smartlinks if offers are good for this geo
if ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1091&aff_id=10787&pid=78766&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // VN-GoSlimmer-Desktop (ID: 1091) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1091&aff_id=10787&pid=78752&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // VN-GoSlimmer-Desktop (ID: 1091) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=876&aff_id=10787&pid=57096&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-GoSlimmer-Desktop (ID: 876) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=876&aff_id=10787&pid=57608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // AL-GoSlimmer-Desktop (ID: 876) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=876&aff_id=10787&pid=57256&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-GoSlimmer-Desktop (ID: 876) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=53830&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Desktop (ID: 508) Landing
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=44608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-GoSlimmer-Desktop (ID: 508) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=56943&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Desktop (ID: 508) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=46242&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-GoSlimmer-Desktop (ID: 508) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=55549&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Desktop (ID: 505) Landing
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=44605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-GoSlimmer-Desktop (ID: 505) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=56944&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Desktop (ID: 505) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=46245&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-GoSlimmer-Desktop (ID: 505) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=44611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502) Landing
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=50964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502) Landing
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=57987&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-GoSlimmer-Desktop (ID: 502) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=56945&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=51311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=46248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-GoSlimmer-Desktop (ID: 502) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=44602&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499) Landing
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=62670&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499) Landing
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=53829&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-GoSlimmer-Desktop (ID: 499) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=56942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=46239&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-GoSlimmer-Desktop (ID: 499) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=62360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496) Landing
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=59525&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496) Landing
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=44599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-GoSlimmer-Desktop (ID: 496) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=59855&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=57624&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=56941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=46236&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-GoSlimmer-Desktop (ID: 496) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=57094&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493) Landing
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=44596&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-GoSlimmer-Desktop (ID: 493) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=46233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=57046&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-GoSlimmer-Desktop (ID: 493) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=56831&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Desktop (ID: 490) Landing
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=44620&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-GoSlimmer-Desktop (ID: 490) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=56940&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Desktop (ID: 490) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=46230&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-GoSlimmer-Desktop (ID: 490) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=56830&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Desktop (ID: 487) Landing
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=44623&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-GoSlimmer-Desktop (ID: 487) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=56939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Desktop (ID: 487) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=46227&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-GoSlimmer-Desktop (ID: 487) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=70471&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484) Landing
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=51321&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484) Landing
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=44617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-GoSlimmer-Desktop (ID: 484) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=70472&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=56938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=47930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=46224&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-GoSlimmer-Desktop (ID: 484) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=60340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Desktop (ID: 481) Landing
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=44593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-GoSlimmer-Desktop (ID: 481) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=56937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Desktop (ID: 481) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=46221&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-GoSlimmer-Desktop (ID: 481) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=62418&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60588&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60927&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60592&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59033&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58983&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58958&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58627&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58515&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop9&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58511&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop10&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58241&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=deskto11p&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=57824&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop12&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=57252&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop13&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=56846&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop14&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=44590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop15&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-GoSlimmer-Desktop (ID: 478) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=62363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop16&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop17&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop18&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop19&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61953&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop20&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61961&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop21&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop22&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59464&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop23&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop24&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59039&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop25&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop26&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop27&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop28&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61959&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop29&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58943&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop30&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-GoSlimmer-Desktop (ID: 478) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=56829&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Desktop (ID: 475) Landing
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=44614&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-GoSlimmer-Desktop (ID: 475) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=56936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Desktop (ID: 475) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=46215&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-GoSlimmer-Desktop (ID: 475) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=56828&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Desktop (ID: 472) Landing
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=44626&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-GoSlimmer-Desktop (ID: 472) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=57045&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Desktop (ID: 472) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=46212&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-GoSlimmer-Desktop (ID: 472) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59460&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=44587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58635&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=60348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59036&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58513&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-GoSlimmer-Desktop (ID: 469) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=61944&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop9&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=60913&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop10&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59853&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop11&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59321&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop12&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop13&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58940&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop14&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop15&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=46209&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop16&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-GoSlimmer-Desktop (ID: 469) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=44584&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Desktop (ID: 466) Landing
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=56827&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-GoSlimmer-Desktop (ID: 466) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "256" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=56933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Desktop (ID: 466) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=46203&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-GoSlimmer-Desktop (ID: 466) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitnesssmartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>