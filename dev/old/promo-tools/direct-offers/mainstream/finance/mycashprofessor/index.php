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
if ( $country == "HU" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1066&aff_id=10787&pid=65619&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-MyCashProfessor-mobile (ID: 1066) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1066&aff_id=10787&pid=65618&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-MyCashProfessor-mobile (ID: 1066) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1064&aff_id=10787&pid=62241&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-MyCashProfessor-Mobile (ID: 1064) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1064&aff_id=10787&pid=62326&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-MyCashProfessor-Mobile (ID: 1064) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1061&aff_id=10787&pid=64173&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-MyCashProfessor-Mobile (ID: 1061) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1061&aff_id=10787&pid=64171&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-MyCashProfessor-Mobile (ID: 1061) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1056&aff_id=10787&pid=62324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-MyCashProfessor-Mobile (ID: 1056) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1056&aff_id=10787&pid=62311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-MyCashProfessor-Mobile (ID: 1056) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1054&aff_id=10787&pid=62332&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-MyCashProfessor-Mobile (ID: 1054) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1054&aff_id=10787&pid=62308&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-MyCashProfessor-Mobile (ID: 1054) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1045&aff_id=10787&pid=62240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-MyCashProfessor-Mobile (ID: 1045) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1045&aff_id=10787&pid=62240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-MyCashProfessor-Mobile (ID: 1045) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1032&aff_id=10787&pid=60931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-MyCashProfessor-Mobile (ID: 1032) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1032&aff_id=10787&pid=60917&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-MyCashProfessor-Mobile (ID: 1032) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1026&aff_id=10787&pid=60933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-MyCashProfessor-Mobile (ID: 1026) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1026&aff_id=10787&pid=60909&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-MyCashProfessor-Mobile (ID: 1026) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1025&aff_id=10787&pid=60920&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-MyCashProfessor-Mobile (ID: 1025) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1025&aff_id=10787&pid=60910&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-MyCashProfessor-Mobile (ID: 1025) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1001&aff_id=10787&pid=60354&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-MyCashProfessor-Mobile (ID: 1001) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1001&aff_id=10787&pid=60354&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-MyCashProfessor-Mobile (ID: 1001) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=985&aff_id=10787&pid=59852&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-MyCashProfessor-Mobile (ID: 985) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=985&aff_id=10787&pid=59851&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-MyCashProfessor-Mobile (ID: 985) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=976&aff_id=10787&pid=59772&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-MyCashProfessor-Mobile (ID: 976) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=976&aff_id=10787&pid=59770&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-MyCashProfessor-Mobile (ID: 976) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1012&aff_id=10787&pid=60362&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-MyCashProfessor-Desktop (ID: 1012) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1012&aff_id=10787&pid=62585&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-MyCashProfessor-Desktop (ID: 1012) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/55527?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Finance smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream smartlink
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream smartlink
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
if ( $country == "LV" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1063&aff_id=10787&pid=62236&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-MyCashProfessor-Desktop (ID: 1063) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1063&aff_id=10787&pid=62325&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-MyCashProfessor-Desktop (ID: 1063) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1062&aff_id=10787&pid=64172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-MyCashProfessor-Desktop (ID: 1062) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1062&aff_id=10787&pid=64170&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-MyCashProfessor-Desktop (ID: 1062) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1055&aff_id=10787&pid=62323&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-MyCashProfessor-Desktop (ID: 1055) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1055&aff_id=10787&pid=62309&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-MyCashProfessor-Desktop (ID: 1055) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1053&aff_id=10787&pid=62330&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-MyCashProfessor-Desktop (ID: 1053) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1053&aff_id=10787&pid=62307&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-MyCashProfessor-Desktop (ID: 1053) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1047&aff_id=10787&pid=62331&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-MyCashProfessor-Desktop (ID: 1047) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1047&aff_id=10787&pid=62586&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-MyCashProfessor-Desktop (ID: 1047) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1044&aff_id=10787&pid=62235&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-MyCashProfessor-Desktop (ID: 1044) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1044&aff_id=10787&pid=62235&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-MyCashProfessor-Desktop (ID: 1044) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1031&aff_id=10787&pid=60930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-MyCashProfessor-Desktop (ID: 1031) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1031&aff_id=10787&pid=60916&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-MyCashProfessor-Desktop (ID: 1031) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1024&aff_id=10787&pid=57100&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-MyCashProfessor-Desktop (ID: 1024) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1024&aff_id=10787&pid=57255&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-MyCashProfessor-Desktop (ID: 1024) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1012&aff_id=10787&pid=60362&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-MyCashProfessor-Desktop (ID: 1012) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1012&aff_id=10787&pid=62585&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-MyCashProfessor-Desktop (ID: 1012) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1003&aff_id=10787&pid=60343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-MyCashProfessor-Desktop (ID: 1003) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1003&aff_id=10787&pid=62576&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-MyCashProfessor-Desktop (ID: 1003) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1002&aff_id=10787&pid=60363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-MyCashProfessor-Desktop (ID: 1002) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1002&aff_id=10787&pid=60350&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-MyCashProfessor-Desktop (ID: 1002) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=883&aff_id=10787&pid=58510&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-MyCashProfessor-Desktop (ID: 883) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=883&aff_id=10787&pid=62582&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-MyCashProfessor-Desktop (ID: 883) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=883&aff_id=10787&pid=58955&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-MyCashProfessor-Desktop (ID: 883) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "291" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=844&aff_id=10787&pid=57628&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-MyCashProfessor-Desktop (ID: 844) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "292" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=844&aff_id=10787&pid=57800&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-MyCashProfessor-Desktop (ID: 844) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/55527?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Finance smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>