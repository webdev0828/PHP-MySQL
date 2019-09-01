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
if ( $country == "HR" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=827&aff_id=10787&pid=58172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-ViperVenomAktiv-Mobile (ID: 827) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=827&aff_id=10787&pid=58172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-ViperVenomAktiv-Mobile (ID: 827) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=984&aff_id=10787&pid=59847&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-ViperVenomAktiv-Mobile (ID: 984) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=984&aff_id=10787&pid=59847&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-ViperVenomAktiv-Mobile (ID: 984) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1010&aff_id=10787&pid=60361&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-ViperVenomAktiv-Mobile (ID: 1010) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1010&aff_id=10787&pid=60361&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-ViperVenomAktiv-Mobile (ID: 1010) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1087&aff_id=10787&pid=68496&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-ViperVenomAktiv-Mobile (ID: 1087) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1087&aff_id=10787&pid=68496&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-ViperVenomAktiv-Mobile (ID: 1087) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=44854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-ViperVenomAktiv-Desktop (ID: 511) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=46584&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-ViperVenomAktiv-Desktop (ID: 511) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=50969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550) Landing
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=44896&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-ViperVenomAktiv-Desktop (ID: 550) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=51317&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=46617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-ViperVenomAktiv-Desktop (ID: 550) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=60333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520) Landing
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=44860&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-ViperVenomAktiv-Desktop (ID: 520) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=60333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=44860&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-ViperVenomAktiv-Desktop (ID: 520) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=60921&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523) Landing
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=44863&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-ViperVenomAktiv-Desktop (ID: 523) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=46590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-ViperVenomAktiv-Desktop (ID: 523) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=44875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-ViperVenomAktiv-Desktop (ID: 535) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=47511&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-ViperVenomAktiv-Desktop (ID: 535) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=44878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-ViperVenomAktiv-Desktop (ID: 538) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=47514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-ViperVenomAktiv-Desktop (ID: 538) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=44881&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-ViperVenomAktiv-Desktop (ID: 541) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=46602&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-ViperVenomAktiv-Desktop (ID: 541) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=553&aff_id=10787&pid=44893&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-ViperVenomAktiv-Desktop (ID: 553) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=553&aff_id=10787&pid=46614&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-ViperVenomAktiv-Desktop (ID: 553) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59528&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59466&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=44857&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58631&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=46587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile7&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-ViperVenomAktiv-Desktop (ID: 517) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60912&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=58343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=57605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=44872&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60911&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=46599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-ViperVenomAktiv-Desktop (ID: 532) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=58509&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544) Landing
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=57794&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544) Landing
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=44884&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-ViperVenomAktiv-Desktop (ID: 544) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=46605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-ViperVenomAktiv-Desktop (ID: 544) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=58344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556) Landing
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=44890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-ViperVenomAktiv-Desktop (ID: 556) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=59781&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=46611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-ViperVenomAktiv-Desktop (ID: 556) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to direct-offers after geo target
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
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
if ( $country == "BA" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=44854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-ViperVenomAktiv-Desktop (ID: 511) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=46584&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-ViperVenomAktiv-Desktop (ID: 511) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=50969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550) Landing
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=44896&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-ViperVenomAktiv-Desktop (ID: 550) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=51317&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=46617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-ViperVenomAktiv-Desktop (ID: 550) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=59846&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514) Landing
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=22478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-ViperVenomAktiv-Desktop (ID: 514) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=46581&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-ViperVenomAktiv-Desktop (ID: 514) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=60333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520) Landing
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=44860&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-ViperVenomAktiv-Desktop (ID: 520) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=60333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=44860&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-ViperVenomAktiv-Desktop (ID: 520) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=60921&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523) Landing
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=44863&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-ViperVenomAktiv-Desktop (ID: 523) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=46590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-ViperVenomAktiv-Desktop (ID: 523) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59778&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59093&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=58171&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=55554&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=44866&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-ViperVenomAktiv-Desktop (ID: 526) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62591&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62391&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62320&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62295&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62366&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop9&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62319&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop10&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59777&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop11&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop12&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=57623&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop13&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=57376&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop14&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=57377&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop15&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=46593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop16&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-ViperVenomAktiv-Desktop (ID: 526) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=58342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Desktop (ID: 529) Landing
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=44869&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-ViperVenomAktiv-Desktop (ID: 529) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=46596&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-ViperVenomAktiv-Desktop (ID: 529) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=44875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-ViperVenomAktiv-Desktop (ID: 535) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=47511&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-ViperVenomAktiv-Desktop (ID: 535) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=44878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-ViperVenomAktiv-Desktop (ID: 538) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=47514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-ViperVenomAktiv-Desktop (ID: 538) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=44881&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-ViperVenomAktiv-Desktop (ID: 541) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=46602&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-ViperVenomAktiv-Desktop (ID: 541) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=44887&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547) Landing
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=68495&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547) Landing
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=56931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-ViperVenomAktiv-Desktop (ID: 547) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=46608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-ViperVenomAktiv-Desktop (ID: 547) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=553&aff_id=10787&pid=44893&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-ViperVenomAktiv-Desktop (ID: 553) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=553&aff_id=10787&pid=46614&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-ViperVenomAktiv-Desktop (ID: 553) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59528&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59466&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=44857&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-ViperVenomAktiv-Desktop (ID: 517) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58631&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=46587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-ViperVenomAktiv-Desktop (ID: 517) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60912&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=58343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=57605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=44872&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-ViperVenomAktiv-Desktop (ID: 532) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60911&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=46599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-ViperVenomAktiv-Desktop (ID: 532) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=58509&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544) Landing
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=57794&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544) Landing
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=44884&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-ViperVenomAktiv-Desktop (ID: 544) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=46605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-ViperVenomAktiv-Desktop (ID: 544) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "415" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=58344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556) Landing
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=44890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-ViperVenomAktiv-Desktop (ID: 556) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "416" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=59781&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=46611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-ViperVenomAktiv-Desktop (ID: 556) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to direct-offers after geo target
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
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