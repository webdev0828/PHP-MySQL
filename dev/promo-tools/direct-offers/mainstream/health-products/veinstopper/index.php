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
if ( $country == "PL" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1164&aff_id=10787&pid=73989&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-VeinStopper-Mobile (ID: 1164) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1164&aff_id=10787&pid=73988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-VeinStopper-Mobile (ID: 1164) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1050&aff_id=10787&pid=62233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-VeinStopper-Mobile (ID: 1050) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1050&aff_id=10787&pid=62233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-VeinStopper-Mobile (ID: 1050) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1041&aff_id=10787&pid=61933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-VeinStopper-Mobile (ID: 1041) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1041&aff_id=10787&pid=61902&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-VeinStopper-Mobile (ID: 1041) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1040&aff_id=10787&pid=61934&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-VeinStopper-Mobile (ID: 1040) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1040&aff_id=10787&pid=61903&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-VeinStopper-Mobile (ID: 1040) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1019&aff_id=10787&pid=60595&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-VeinStopper-Mobile (ID: 1019) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1019&aff_id=10787&pid=60919&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-VeinStopper-Mobile (ID: 1019) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1018&aff_id=10787&pid=61935&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-VeinStopper-Mobile (ID: 1018) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1018&aff_id=10787&pid=61904&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-VeinStopper-Mobile (ID: 1018) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1011&aff_id=10787&pid=60360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-VeinStopper-Mobile (ID: 1011) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1011&aff_id=10787&pid=62590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Mobile (ID: 1011) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=1011&aff_id=10787&pid=60918&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-VeinStopper-Mobile (ID: 1011) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=999&aff_id=10787&pid=60338&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-VeinStopper-Mobile (ID: 999) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=999&aff_id=10787&pid=60338&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-VeinStopper-Mobile (ID: 999) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=778&aff_id=10787&pid=61932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-VeinStopper-Mobile (ID: 778) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=778&aff_id=10787&pid=54073&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-VeinStopper-Mobile (ID: 778) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=48837&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Mobile (ID: 740) Landing
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=60359&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Mobile (ID: 740) Landing
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=54076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-VeinStopper-Mobile (ID: 740) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=48839&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-VeinStopper-Mobile (ID: 740) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=739&aff_id=10787&pid=54075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Mobile (ID: 739) Landing
        "https://gltrak.com/aff_c2.php?offer_id=739&aff_id=10787&pid=48836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-VeinStopper-Mobile (ID: 739) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=739&aff_id=10787&pid=48838&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-VeinStopper-Mobile (ID: 739) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=565&aff_id=10787&pid=54077&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Mobile (ID: 565) Landing
        "https://gltrak.com/aff_c2.php?offer_id=565&aff_id=10787&pid=45381&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-VeinStopper-Mobile (ID: 565) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=565&aff_id=10787&pid=47501&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-VeinStopper-Mobile (ID: 565) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=559&aff_id=10787&pid=62232&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-VeinStopper-Mobile (ID: 559) Landing
        "https://gltrak.com/aff_c2.php?offer_id=559&aff_id=10787&pid=54074&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-VeinStopper-Mobile (ID: 559) Landing
        "https://gltrak.com/aff_c2.php?offer_id=559&aff_id=10787&pid=45378&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-VeinStopper-Mobile (ID: 559) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=559&aff_id=10787&pid=62232&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-VeinStopper-Mobile (ID: 559) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=559&aff_id=10787&pid=54074&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1", // BA-VeinStopper-Mobile (ID: 559) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=559&aff_id=10787&pid=45378&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-VeinStopper-Mobile (ID: 559) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=875&aff_id=10787&pid=57248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-VeinStopper-Desktop (ID: 875) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=875&aff_id=10787&pid=57381&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-VeinStopper-Desktop (ID: 875) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=57632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-VeinStopper-Desktop (ID: 735) Landing
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=47390&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-VeinStopper-Desktop (ID: 735) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=48316&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-VeinStopper-Desktop (ID: 735) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=58243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601) Landing
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=45417&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601) Landing
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=53401&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-VeinStopper-Desktop (ID: 601) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=45969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-VeinStopper-Desktop (ID: 601) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=57246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-VeinStopper-Desktop (ID: 580) Landing
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=45396&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-VeinStopper-Desktop (ID: 580) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=45945&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-VeinStopper-Desktop (ID: 580) Pre-landing
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
if ( $country == "AL" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=875&aff_id=10787&pid=57248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-VeinStopper-Desktop (ID: 875) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=875&aff_id=10787&pid=57381&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // AL-VeinStopper-Desktop (ID: 875) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=57632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // MK-VeinStopper-Desktop (ID: 735) Landing
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=47390&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-VeinStopper-Desktop (ID: 735) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=48316&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // MK-VeinStopper-Desktop (ID: 735) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=57077&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607) Landing
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=53402&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607) Landing
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=45420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-VeinStopper-Desktop (ID: 607) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=61964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=45972&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // SK-VeinStopper-Desktop (ID: 607) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=57531&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604) Landing
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=57078&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604) Landing
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=54122&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-VeinStopper-Desktop (ID: 604) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=61963&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=54123&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // SI-VeinStopper-Desktop (ID: 604) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=58243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601) Landing
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=45417&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601) Landing
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=53401&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-VeinStopper-Desktop (ID: 601) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=45969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // RO-VeinStopper-Desktop (ID: 601) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=57076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598) Landing
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=53400&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop22&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598) Landing
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=45414&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-VeinStopper-Desktop (ID: 598) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=60477&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=45966&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // PL-VeinStopper-Desktop (ID: 598) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=57247&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595) Landing
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=53399&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595) Landing
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=45411&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-VeinStopper-Desktop (ID: 595) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=60594&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=45960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // LV-VeinStopper-Desktop (ID: 595) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=57811&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592) Landing
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=53398&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592) Landing
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=45408&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-VeinStopper-Desktop (ID: 592) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=60476&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=45957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // LT-VeinStopper-Desktop (ID: 592) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=56849&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589) Landing
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=51322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589) Landing
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=53397&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589) Landing
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=45405&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-VeinStopper-Desktop (ID: 589) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=45954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // IT-VeinStopper-Desktop (ID: 589) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=60337&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586) Landing
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=53396&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586) Landing
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=45402&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-VeinStopper-Desktop (ID: 586) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=60475&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=45951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // HU-VeinStopper-Desktop (ID: 586) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=55545&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583) Landing
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=55546&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583) Landing
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=45399&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-VeinStopper-Desktop (ID: 583) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57375&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57268&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57057&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=direct-offer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=45948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=direct-offer&mbbr=1&pof=1&aof=1" // HR-VeinStopper-Desktop (ID: 583) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=57246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // GR-VeinStopper-Desktop (ID: 580) Landing
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=45396&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-VeinStopper-Desktop (ID: 580) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=45945&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // GR-VeinStopper-Desktop (ID: 580) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=57245&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Desktop (ID: 577) Landing
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=45393&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-VeinStopper-Desktop (ID: 577) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=60474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Desktop (ID: 577) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=45942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // EE-VeinStopper-Desktop (ID: 577) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=55547&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Desktop (ID: 574) Landing
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=55547&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-VeinStopper-Desktop (ID: 574) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=55547&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Desktop (ID: 574) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=45939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // CZ-VeinStopper-Desktop (ID: 574) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=45384&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Desktop (ID: 571) Landing
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=57074&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Desktop (ID: 571) Landing
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=53394&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-VeinStopper-Desktop (ID: 571) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=45936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1" // BG-VeinStopper-Desktop (ID: 571) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=57382&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568) Landing
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=50965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568) Landing
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=45426&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-VeinStopper-Desktop (ID: 568) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=51315&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=direct-offer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568) Pre-landing
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=47498&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=direct-offer&mbbr=1&pof=1&aof=1" // RS-VeinStopper-Desktop (ID: 568) Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link = "413" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=562&aff_id=10787&pid=57075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-VeinStopper-Desktop (ID: 562) Landing
        "https://gltrak.com/aff_c2.php?offer_id=562&aff_id=10787&pid=53395&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-VeinStopper-Desktop (ID: 562) Landing
        "https://gltrak.com/aff_c2.php?offer_id=562&aff_id=10787&pid=45387&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-VeinStopper-Desktop (ID: 562) Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" && $link = "414" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=562&aff_id=10787&pid=47495&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // BA-VeinStopper-Desktop (ID: 562) Pre-landing
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