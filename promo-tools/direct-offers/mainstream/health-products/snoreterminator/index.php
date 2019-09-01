<?php
include "/var/www/sublimerevenue.com/API/config.php";

//get aff id from direct-offer
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
// geo target first with geo direct offer direct-offers or simply direct-offers if offers are good for this geo
if ( $country == "GR" && $link == "372" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1180&aff_id=10787&pid=64869&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SnoreTerminator-Mobile (ID: 1180) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1180&aff_id=10787&pid=74852&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SnoreTerminator-Mobile (ID: 1180) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1179&aff_id=10787&pid=74849&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SnoreTerminator-Mobile (ID: 1179) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1179&aff_id=10787&pid=74850&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SnoreTerminator-Mobile (ID: 1179) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1178&aff_id=10787&pid=74845&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SnoreTerminator-Mobile (ID: 1178) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1178&aff_id=10787&pid=74847&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SnoreTerminator-Mobile (ID: 1178) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1177&aff_id=10787&pid=74842&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SnoreTerminator-Mobile (ID: 1177) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1177&aff_id=10787&pid=74844&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SnoreTerminator-Mobile (ID: 1177) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1122&aff_id=10787&pid=72996&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SnoreTerminator-Mobile (ID: 1122) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1122&aff_id=10787&pid=72999&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SnoreTerminator-Mobile (ID: 1122) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1108&aff_id=10787&pid=72397&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SnoreTerminator-Mobile (ID: 1108) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1108&aff_id=10787&pid=72393&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SnoreTerminator-Mobile (ID: 1108) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1023&aff_id=10787&pid=60905&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SnoreTerminator-Mobile (ID: 1023) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1023&aff_id=10787&pid=62587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SnoreTerminator-Mobile (ID: 1023) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1022&aff_id=10787&pid=60906&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SnoreTerminator-Mobile (ID: 1022) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1022&aff_id=10787&pid=60908&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SnoreTerminator-Mobile (ID: 1022) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=997&aff_id=10787&pid=60330&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SnoreTerminator-Mobile (ID: 997) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=997&aff_id=10787&pid=62298&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SnoreTerminator-Mobile (ID: 997) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=996&aff_id=10787&pid=60345&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SnoreTerminator-Mobile (ID: 996) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=996&aff_id=10787&pid=60344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SnoreTerminator-Mobile (ID: 996) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=995&aff_id=10787&pid=60329&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SnoreTerminator-Mobile (ID: 995) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=995&aff_id=10787&pid=60907&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SnoreTerminator-Mobile (ID: 995) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=994&aff_id=10787&pid=60328&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SnoreTerminator-Mobile (ID: 994) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=994&aff_id=10787&pid=60328&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SnoreTerminator-Mobile (ID: 994) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=993&aff_id=10787&pid=60351&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SnoreTerminator-Mobile (ID: 993) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=993&aff_id=10787&pid=60351&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SnoreTerminator-Mobile (ID: 993) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=901&aff_id=10787&pid=58938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SnoreTerminator-Mobile (ID: 901) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=901&aff_id=10787&pid=59849&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-SnoreTerminator-Mobile (ID: 901) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=901&aff_id=10787&pid=59089&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SnoreTerminator-Mobile (ID: 901) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=56930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-SnoreTerminator-Desktop (ID: 343) Landing
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=44557&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SnoreTerminator-Desktop (ID: 343) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=58620&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-SnoreTerminator-Desktop (ID: 343) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=46467&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SnoreTerminator-Desktop (ID: 343) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=58934&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SnoreTerminator-Desktop (ID: 337) Landing
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=44551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SnoreTerminator-Desktop (ID: 337) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=61286&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SnoreTerminator-Desktop (ID: 337) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=46461&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SnoreTerminator-Desktop (ID: 337) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to direct-offers after geo target
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream direct-offer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=direct-offer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BitterStrawberry mainstream direct-offer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream direct-offer
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
//geo target first with geo direct offer direct-offers or simply direct-offers if offers are good for this geo
if ( $country == "EE" && $link == "372" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=900&aff_id=10787&pid=58933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SnoreTerminator-Desktop (ID: 900) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=900&aff_id=10787&pid=58933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SnoreTerminator-Desktop (ID: 900) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=352&aff_id=10787&pid=58517&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-SnoreTerminator-Desktop (ID: 352) Landing
        "https://gltrak.com/aff_c2.php?offer_id=352&aff_id=10787&pid=44563&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SnoreTerminator-Desktop (ID: 352) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=352&aff_id=10787&pid=58621&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-SnoreTerminator-Desktop (ID: 352) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=352&aff_id=10787&pid=46470&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SnoreTerminator-Desktop (ID: 352) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=349&aff_id=10787&pid=58935&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-SnoreTerminator-Desktop (ID: 349) Landing
        "https://gltrak.com/aff_c2.php?offer_id=349&aff_id=10787&pid=44560&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SnoreTerminator-Desktop (ID: 349) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=349&aff_id=10787&pid=46473&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SnoreTerminator-Desktop (ID: 349) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=346&aff_id=10787&pid=50961&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-SnoreTerminator-Desktop (ID: 346) Landing
        "https://gltrak.com/aff_c2.php?offer_id=346&aff_id=10787&pid=44566&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SnoreTerminator-Desktop (ID: 346) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=346&aff_id=10787&pid=58622&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-SnoreTerminator-Desktop (ID: 346) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=346&aff_id=10787&pid=51319&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-SnoreTerminator-Desktop (ID: 346) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=346&aff_id=10787&pid=46476&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SnoreTerminator-Desktop (ID: 346) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=56930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-SnoreTerminator-Desktop (ID: 343) Landing
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=44557&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SnoreTerminator-Desktop (ID: 343) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=58620&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-SnoreTerminator-Desktop (ID: 343) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=343&aff_id=10787&pid=46467&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SnoreTerminator-Desktop (ID: 343) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=340&aff_id=10787&pid=57530&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-SnoreTerminator-Desktop (ID: 340) Landing
        "https://gltrak.com/aff_c2.php?offer_id=340&aff_id=10787&pid=44554&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SnoreTerminator-Desktop (ID: 340) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=340&aff_id=10787&pid=58619&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-SnoreTerminator-Desktop (ID: 340) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=340&aff_id=10787&pid=46464&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SnoreTerminator-Desktop (ID: 340) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=58934&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SnoreTerminator-Desktop (ID: 337) Landing
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=44551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SnoreTerminator-Desktop (ID: 337) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=61286&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SnoreTerminator-Desktop (ID: 337) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=337&aff_id=10787&pid=46461&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SnoreTerminator-Desktop (ID: 337) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=334&aff_id=10787&pid=44575&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SnoreTerminator-Desktop (ID: 334) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=334&aff_id=10787&pid=46458&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SnoreTerminator-Desktop (ID: 334) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=331&aff_id=10787&pid=61289&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-SnoreTerminator-Desktop (ID: 331) Landing
        "https://gltrak.com/aff_c2.php?offer_id=331&aff_id=10787&pid=44578&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SnoreTerminator-Desktop (ID: 331) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=331&aff_id=10787&pid=61285&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-SnoreTerminator-Desktop (ID: 331) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=331&aff_id=10787&pid=46455&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SnoreTerminator-Desktop (ID: 331) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=328&aff_id=10787&pid=44572&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-SnoreTerminator-Desktop (ID: 328) Landing
        "https://gltrak.com/aff_c2.php?offer_id=328&aff_id=10787&pid=57607&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SnoreTerminator-Desktop (ID: 328) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=328&aff_id=10787&pid=46452&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SnoreTerminator-Desktop (ID: 328) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=325&aff_id=10787&pid=59465&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-SnoreTerminator-Desktop (ID: 325) Landing
        "https://gltrak.com/aff_c2.php?offer_id=325&aff_id=10787&pid=44548&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SnoreTerminator-Desktop (ID: 325) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=325&aff_id=10787&pid=46449&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SnoreTerminator-Desktop (ID: 325) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=322&aff_id=10787&pid=60352&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SnoreTerminator-Desktop (ID: 322) Landing
        "https://gltrak.com/aff_c2.php?offer_id=322&aff_id=10787&pid=55552&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SnoreTerminator-Desktop (ID: 322) Landing
        "https://gltrak.com/aff_c2.php?offer_id=322&aff_id=10787&pid=6387&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SnoreTerminator-Desktop (ID: 322) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=322&aff_id=10787&pid=62318&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SnoreTerminator-Desktop (ID: 322) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=322&aff_id=10787&pid=57062&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SnoreTerminator-Desktop (ID: 322) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=322&aff_id=10787&pid=46446&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SnoreTerminator-Desktop (ID: 322) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=319&aff_id=10787&pid=44569&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SnoreTerminator-Desktop (ID: 319) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=319&aff_id=10787&pid=46443&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SnoreTerminator-Desktop (ID: 319) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=316&aff_id=10787&pid=44542&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-SnoreTerminator-Desktop (ID: 316) Landing
        "https://gltrak.com/aff_c2.php?offer_id=316&aff_id=10787&pid=58518&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SnoreTerminator-Desktop (ID: 316) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=316&aff_id=10787&pid=61284&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-SnoreTerminator-Desktop (ID: 316) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=316&aff_id=10787&pid=58618&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-SnoreTerminator-Desktop (ID: 316) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=316&aff_id=10787&pid=46437&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SnoreTerminator-Desktop (ID: 316) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=313&aff_id=10787&pid=60336&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-SnoreTerminator-Desktop (ID: 313) Landing
        "https://gltrak.com/aff_c2.php?offer_id=313&aff_id=10787&pid=44539&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SnoreTerminator-Desktop (ID: 313) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=313&aff_id=10787&pid=46431&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SnoreTerminator-Desktop (ID: 313) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "372" ) { 
   $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=310&aff_id=10787&pid=59771&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-SnoreTerminator-Desktop (ID: 310) Landing
        "https://gltrak.com/aff_c2.php?offer_id=310&aff_id=10787&pid=44536&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SnoreTerminator-Desktop (ID: 310) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "373" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=310&aff_id=10787&pid=46434&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SnoreTerminator-Desktop (ID: 310) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to direct-offers after geo target
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitnessdirect-offer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream direct-offer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream direct-offer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>