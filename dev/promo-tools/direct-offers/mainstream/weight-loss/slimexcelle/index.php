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
if ( $country == "IT" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=910&aff_id=10787&pid=59890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SlimExcelle-Mobile (ID: 910) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=910&aff_id=10787&pid=59890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SlimExcelle-Mobile (ID: 910) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=899&aff_id=10787&pid=58928&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SlimExcelle-Mobile (ID: 899) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=899&aff_id=10787&pid=59041&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SlimExcelle-Mobile (ID: 899) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=819&aff_id=10787&pid=57827&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Mobile (ID: 819) Landing
        "https://gltrak.com/aff_c2.php?offer_id=819&aff_id=10787&pid=56845&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SlimExcelle-Mobile (ID: 819) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=819&aff_id=10787&pid=57827&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Mobile (ID: 819) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=819&aff_id=10787&pid=56845&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SlimExcelle-Mobile (ID: 819) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=61265&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307) Landing
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=7429&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SlimExcelle-Desktop (ID: 307) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=61282&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=46932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SlimExcelle-Desktop (ID: 307) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=304&aff_id=10787&pid=44512&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SlimExcelle-Desktop (ID: 304) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=304&aff_id=10787&pid=16394&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SlimExcelle-Desktop (ID: 304) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=7435&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-SlimExcelle-Desktop (ID: 301) Landing
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=57409&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SlimExcelle-Desktop (ID: 301) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=7436&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SlimExcelle-Desktop (ID: 301) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=61264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295) Landing
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=44503&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SlimExcelle-Desktop (ID: 295) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=61281&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=46410&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SlimExcelle-Desktop (ID: 295) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=61263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292) Landing
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=44527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SlimExcelle-Desktop (ID: 292) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=61280&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=46407&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SlimExcelle-Desktop (ID: 292) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=61262&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289) Landing
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=44530&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SlimExcelle-Desktop (ID: 289) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=61279&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=46404&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SlimExcelle-Desktop (ID: 289) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=61260&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280) Landing
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=44521&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SlimExcelle-Desktop (ID: 280) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=61278&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=46392&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SlimExcelle-Desktop (ID: 280) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=61259&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277) Landing
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=44533&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SlimExcelle-Desktop (ID: 277) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=61277&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=46389&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SlimExcelle-Desktop (ID: 277) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=16400&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SlimExcelle-Desktop (ID: 274) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=61965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-SlimExcelle-Desktop (ID: 274) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=46386&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SlimExcelle-Desktop (ID: 274) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=16268&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271) Landing
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=61257&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SlimExcelle-Desktop (ID: 271) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=61275&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=46380&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SlimExcelle-Desktop (ID: 271) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=265&aff_id=10787&pid=15839&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SlimExcelle-Mobile (ID: 265) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=265&aff_id=10787&pid=47484&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SlimExcelle-Mobile (ID: 265) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=259&aff_id=10787&pid=15842&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SlimExcelle-Mobile (ID: 259) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=259&aff_id=10787&pid=15842&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SlimExcelle-Mobile (ID: 259) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=253&aff_id=10787&pid=44479&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SlimExcelle-Mobile (ID: 253) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=253&aff_id=10787&pid=44479&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SlimExcelle-Mobile (ID: 253) Pre-landing
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
if ( $country == "SK" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=61265&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307) Landing
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=7429&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SlimExcelle-Desktop (ID: 307) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=61282&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=46932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-SlimExcelle-Desktop (ID: 307) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=304&aff_id=10787&pid=44512&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SlimExcelle-Desktop (ID: 304) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=304&aff_id=10787&pid=16394&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-SlimExcelle-Desktop (ID: 304) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=7435&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-SlimExcelle-Desktop (ID: 301) Landing
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=57409&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SlimExcelle-Desktop (ID: 301) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=7436&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-SlimExcelle-Desktop (ID: 301) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=298&aff_id=10787&pid=57606&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-SlimExcelle-Desktop (ID: 298) Landing
        "https://gltrak.com/aff_c2.php?offer_id=298&aff_id=10787&pid=35465&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SlimExcelle-Desktop (ID: 298) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=298&aff_id=10787&pid=46413&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-SlimExcelle-Desktop (ID: 298) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=61264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295) Landing
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=44503&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SlimExcelle-Desktop (ID: 295) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=61281&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=46410&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-SlimExcelle-Desktop (ID: 295) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=61263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292) Landing
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=44527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SlimExcelle-Desktop (ID: 292) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=61280&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=46407&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-SlimExcelle-Desktop (ID: 292) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=61262&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289) Landing
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=44530&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SlimExcelle-Desktop (ID: 289) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=61279&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=46404&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-SlimExcelle-Desktop (ID: 289) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=286&aff_id=10787&pid=59889&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-SlimExcelle-Desktop (ID: 286) Landing
        "https://gltrak.com/aff_c2.php?offer_id=286&aff_id=10787&pid=57488&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SlimExcelle-Desktop (ID: 286) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=286&aff_id=10787&pid=46401&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-SlimExcelle-Desktop (ID: 286) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=57826&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Desktop (ID: 283) Landing
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=56844&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Desktop (ID: 283) Landing
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=5557&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SlimExcelle-Desktop (ID: 283) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=46395&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-SlimExcelle-Desktop (ID: 283) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=61260&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280) Landing
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=44521&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SlimExcelle-Desktop (ID: 280) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=61278&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=46392&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-SlimExcelle-Desktop (ID: 280) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=61259&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277) Landing
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=44533&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SlimExcelle-Desktop (ID: 277) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=61277&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=46389&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-SlimExcelle-Desktop (ID: 277) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=16400&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SlimExcelle-Desktop (ID: 274) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=61965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-SlimExcelle-Desktop (ID: 274) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=46386&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-SlimExcelle-Desktop (ID: 274) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=16268&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271) Landing
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=61257&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SlimExcelle-Desktop (ID: 271) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=61275&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=46380&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-SlimExcelle-Desktop (ID: 271) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=50963&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268) Landing
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=7248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SlimExcelle-Desktop (ID: 268) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=51316&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=46425&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=7247&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-SlimExcelle-Desktop (ID: 268) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=61261&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262) Landing
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=60339&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262) Landing
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=6963&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SlimExcelle-Desktop (ID: 262) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=61283&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=46398&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-SlimExcelle-Desktop (ID: 262) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "374" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=61258&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Desktop (ID: 256) Landing
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=61258&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SlimExcelle-Desktop (ID: 256) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "375" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=61276&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Desktop (ID: 256) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=6957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-SlimExcelle-Desktop (ID: 256) Pre-landing
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