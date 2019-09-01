<?php
include "/var/www/sublimerevenue.com/API/config.php";

//get aff id from backoffer
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
// geo target first with geo direct offer backoffers or simply backoffers if offers are good for this geo
if ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=it-IT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1001&aff_id=10787&pid=60354&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-MyCashProfessor-Mobile (ID: 1001)
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1261&aff_id=10787&pid=83509&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-LaserSharpener-Mobile (ID: 1261)
        "https://gltrak.com/aff_c2.php?offer_id=1245&aff_id=10787&pid=82301&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TurboEcoValve-Mobile (ID: 1245)
        "https://gltrak.com/aff_c2.php?offer_id=1245&aff_id=10787&pid=82313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TurboEcoValve-Mobile (ID: 1245)
        "https://gltrak.com/aff_c2.php?offer_id=1210&aff_id=10787&pid=77165&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-BabaVanga-Mobile (ID: 1210)
        "https://gltrak.com/aff_c2.php?offer_id=1210&aff_id=10787&pid=77183&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-BabaVanga-Mobile (ID: 1210)
        "https://gltrak.com/aff_c2.php?offer_id=1186&aff_id=10787&pid=74876&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-PinguLingo-Mobile (ID: 1186)
        "https://gltrak.com/aff_c2.php?offer_id=1186&aff_id=10787&pid=74878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-PinguLingo-Mobile (ID: 1186)
        "https://gltrak.com/aff_c2.php?offer_id=1107&aff_id=10787&pid=70954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Mobile (ID: 1107)
        "https://gltrak.com/aff_c2.php?offer_id=1107&aff_id=10787&pid=70951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Mobile (ID: 1107)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=pl-PL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1032&aff_id=10787&pid=60931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-MyCashProfessor-Mobile (ID: 1032)
        "https://gltrak.com/aff_c2.php?offer_id=1032&aff_id=10787&pid=60917&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-MyCashProfessor-Mobile (ID: 1032)
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1255&aff_id=10787&pid=82966&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-LerneLingu-Mobile (ID: 1255)
        "https://gltrak.com/aff_c2.php?offer_id=1255&aff_id=10787&pid=82979&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-LerneLingu-Mobile (ID: 1255)
        "https://gltrak.com/aff_c2.php?offer_id=1249&aff_id=10787&pid=82296&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TurboEcoValve-Mobile (ID: 1249)
        "https://gltrak.com/aff_c2.php?offer_id=1249&aff_id=10787&pid=82299&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TurboEcoValve-Mobile (ID: 1249)
        "https://gltrak.com/aff_c2.php?offer_id=1235&aff_id=10787&pid=81090&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-BabaVanga-Mobile (ID: 1235)
        "https://gltrak.com/aff_c2.php?offer_id=1235&aff_id=10787&pid=81092&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-BabaVanga-Mobile (ID: 1235)
        "https://gltrak.com/aff_c2.php?offer_id=1176&aff_id=10787&pid=74657&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-PinguLingo-Mobile (ID: 1176)
        "https://gltrak.com/aff_c2.php?offer_id=1176&aff_id=10787&pid=74659&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-PinguLingo-Mobile (ID: 1176)
        "https://gltrak.com/aff_c2.php?offer_id=1085&aff_id=10787&pid=66682&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TeslaSaverECO-Mobile (ID: 1085)
        "https://gltrak.com/aff_c2.php?offer_id=1085&aff_id=10787&pid=66680&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TeslaSaverECO-Mobile (ID: 1085)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60652&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60653&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60646&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60647&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60648&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1113&aff_id=10787&pid=60660&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-FunkContent-Mobile (ID: 1113)
        "https://gltrak.com/aff_c2.php?offer_id=1113&aff_id=10787&pid=60661&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-FunkContent-Mobile (ID: 1113)
        "https://gltrak.com/aff_c2.php?offer_id=1113&aff_id=10787&pid=60661&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-FunkContent-Mobile (ID: 1113)
        "https://gltrak.com/aff_c2.php?offer_id=1113&aff_id=10787&pid=60662&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // CY-FunkContent-Mobile (ID: 1113)
        "https://gltrak.com/aff_c2.php?offer_id=1113&aff_id=10787&pid=60663&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=backoffer&mbbr=1&pof=1&aof=1" // CY-FunkContent-Mobile (ID: 1113)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1275&aff_id=10787&pid=86628&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-BabaVanga-Mobile (ID: 1275)
        "https://gltrak.com/aff_c2.php?offer_id=1275&aff_id=10787&pid=86682&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-BabaVanga-Mobile (ID: 1275)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1112&aff_id=10787&pid=67152&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-FunkContent-Mobile (ID: 1112)
        "https://gltrak.com/aff_c2.php?offer_id=1064&aff_id=10787&pid=62241&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1",  // LV-MyCashProfessor-Mobile (ID: 1064)
        "https://gltrak.com/aff_c2.php?offer_id=1064&aff_id=10787&pid=62326&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1",  // LV-MyCashProfessor-Mobile (ID: 1064) 
        "https://gltrak.com/aff_c2.php?offer_id=1112&aff_id=10787&pid=67153&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-FunkContent-Mobile (ID: 1112)
        "https://gltrak.com/aff_c2.php?offer_id=1112&aff_id=10787&pid=67153&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-FunkContent-Mobile (ID: 1112)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67156&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67155&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67157&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1143&aff_id=10787&pid=73313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-TeslaSaverECO-Mobile (ID: 1143)
        "https://gltrak.com/aff_c2.php?offer_id=1143&aff_id=10787&pid=73228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-TeslaSaverECO-Mobile (ID: 1143)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67150&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1" // LV-WallieGet-Mobile (ID: 1111)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1273&aff_id=10787&pid=86597&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-BabaVanga-Mobile (ID: 1273)
        "https://gltrak.com/aff_c2.php?offer_id=1273&aff_id=10787&pid=86681&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-BabaVanga-Mobile (ID: 1273)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=lt-LT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1045&aff_id=10787&pid=62240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-MyCashProfessor-Mobile (ID: 1045)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65552&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65550&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65493&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1109&aff_id=10787&pid=65554&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-FunkContent-Mobile (ID: 1109)
        "https://gltrak.com/aff_c2.php?offer_id=1109&aff_id=10787&pid=65555&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-FunkContent-Mobile (ID: 1109)
        "https://gltrak.com/aff_c2.php?offer_id=1133&aff_id=10787&pid=73076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-TeslaSaverECO-Mobile (ID: 1133)
        "https://gltrak.com/aff_c2.php?offer_id=1109&aff_id=10787&pid=65556&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1" // LT-FunkContent-Mobile (ID: 1109)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1282&aff_id=10787&pid=87203&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-HerbaProstal-Mobila (ID: 1282)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=cs-CZ&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=985&aff_id=10787&pid=59852&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-MyCashProfessor-Mobile (ID: 985)
        "https://gltrak.com/aff_c2.php?offer_id=985&aff_id=10787&pid=59851&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-MyCashProfessor-Mobile (ID: 985)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=76150&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=76150&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=76150&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=71841&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=70468&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1263&aff_id=10787&pid=84171&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-LerneLingu-Mobile (ID: 1263)
        "https://gltrak.com/aff_c2.php?offer_id=1263&aff_id=10787&pid=84176&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-LerneLingu-Mobile (ID: 1263)
        "https://gltrak.com/aff_c2.php?offer_id=1243&aff_id=10787&pid=82260&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TurboEcoValve-Mobile (ID: 1243)
        "https://gltrak.com/aff_c2.php?offer_id=1243&aff_id=10787&pid=82260&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TurboEcoValve-Mobile (ID: 1243)
        "https://gltrak.com/aff_c2.php?offer_id=1208&aff_id=10787&pid=77167&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-BabaVanga-Mobile (ID: 1208)
        "https://gltrak.com/aff_c2.php?offer_id=1208&aff_id=10787&pid=77185&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-BabaVanga-Mobile (ID: 1208)
        "https://gltrak.com/aff_c2.php?offer_id=1149&aff_id=10787&pid=73336&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-PinguLingo-Mobile (ID: 1149)
        "https://gltrak.com/aff_c2.php?offer_id=1149&aff_id=10787&pid=73354&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-PinguLingo-Mobile (ID: 1149)
        "https://gltrak.com/aff_c2.php?offer_id=1076&aff_id=10787&pid=66295&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Mobile (ID: 1076)
        "https://gltrak.com/aff_c2.php?offer_id=1076&aff_id=10787&pid=66342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Mobile (ID: 1076)
        "https://gltrak.com/aff_c2.php?offer_id=905&aff_id=10787&pid=60356&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Mobile (ID: 905)
        "https://gltrak.com/aff_c2.php?offer_id=905&aff_id=10787&pid=58931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Mobile (ID: 905)
        "https://gltrak.com/aff_c2.php?offer_id=905&aff_id=10787&pid=58932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Mobile (ID: 905)
        "https://gltrak.com/aff_c2.php?offer_id=905&aff_id=10787&pid=60346&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Mobile (ID: 905)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=76148&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=backoffer&mbbr=1&pof=1&aof=1" // CZ-Sweepstakes-Mobile (ID: 1101)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1015&aff_id=10787&pid=59102&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-FunkContent-Mobile (ID: 1015)
        "https://gltrak.com/aff_c2.php?offer_id=1025&aff_id=10787&pid=60920&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-MyCashProfessor-Mobile (ID: 1025)
        "https://gltrak.com/aff_c2.php?offer_id=1025&aff_id=10787&pid=60910&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-MyCashProfessor-Mobile (ID: 1025)
        "https://gltrak.com/aff_c2.php?offer_id=1267&aff_id=10787&pid=84183&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-LerneLingu-Mobile (ID: 1267)
        "https://gltrak.com/aff_c2.php?offer_id=1267&aff_id=10787&pid=84185&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-LerneLingu-Mobile (ID: 1267)
        "https://gltrak.com/aff_c2.php?offer_id=1239&aff_id=10787&pid=82236&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TurboEcoValve-Mobile (ID: 1239)
        "https://gltrak.com/aff_c2.php?offer_id=1239&aff_id=10787&pid=82238&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TurboEcoValve-Mobile (ID: 1239)
        "https://gltrak.com/aff_c2.php?offer_id=1212&aff_id=10787&pid=77819&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TeslaSaverECO-Mobile (ID: 1212)
        "https://gltrak.com/aff_c2.php?offer_id=1212&aff_id=10787&pid=77821&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TeslaSaverECO-Mobile (ID: 1212)
        "https://gltrak.com/aff_c2.php?offer_id=1204&aff_id=10787&pid=77175&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-BabaVanga-Mobile (ID: 1204)
        "https://gltrak.com/aff_c2.php?offer_id=1204&aff_id=10787&pid=77193&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-BabaVanga-Mobile (ID: 1204)
        "https://gltrak.com/aff_c2.php?offer_id=1153&aff_id=10787&pid=73324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-PinguLingo-Mobile (ID: 1153)
        "https://gltrak.com/aff_c2.php?offer_id=1153&aff_id=10787&pid=73343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-PinguLingo-Mobile (ID: 1153)
        "https://gltrak.com/aff_c2.php?offer_id=1015&aff_id=10787&pid=59102&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // SI-FunkContent-Mobile (ID: 1015)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1271&aff_id=10787&pid=86585&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-BabaVanga-Mobile (ID: 1271)
        "https://gltrak.com/aff_c2.php?offer_id=1271&aff_id=10787&pid=86683&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-BabaVanga-Mobile (ID: 1271)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1014&aff_id=10787&pid=59101&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-FunkContent-Mobile (ID: 1014)
        "https://gltrak.com/aff_c2.php?offer_id=1061&aff_id=10787&pid=64173&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-MyCashProfessor-Mobile (ID: 1061)
        "https://gltrak.com/aff_c2.php?offer_id=1061&aff_id=10787&pid=64171&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-MyCashProfessor-Mobile (ID: 1061)
        "https://gltrak.com/aff_c2.php?offer_id=1014&aff_id=10787&pid=59101&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-FunkContent-Mobile (ID: 1014)
        "https://gltrak.com/aff_c2.php?offer_id=1155&aff_id=10787&pid=73328&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-PinguLingo-Mobile (ID: 1155)
        "https://gltrak.com/aff_c2.php?offer_id=1155&aff_id=10787&pid=73347&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-PinguLingo-Mobile (ID: 1155)
        "https://gltrak.com/aff_c2.php?offer_id=1131&aff_id=10787&pid=73080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-TeslaSaverECO-Mobile (ID: 1131)
        "https://gltrak.com/aff_c2.php?offer_id=1131&aff_id=10787&pid=73311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-TeslaSaverECO-Mobile (ID: 1131)
        "https://gltrak.com/aff_c2.php?offer_id=1087&aff_id=10787&pid=68496&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1" // RO-ViperVenomAktiv-Mobile (ID: 1087)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=hu-HU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1066&aff_id=10787&pid=65619&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-MyCashProfessor-mobile (ID: 1066)
        "https://gltrak.com/aff_c2.php?offer_id=1066&aff_id=10787&pid=65618&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-MyCashProfessor-mobile (ID: 1066)
        "https://gltrak.com/aff_c2.php?offer_id=771&aff_id=10787&pid=51988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-UltraSaver-Mobile (ID: 771)
        "https://gltrak.com/aff_c2.php?offer_id=771&aff_id=10787&pid=51982&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-UltraSaver-Mobile (ID: 771)
        "https://gltrak.com/aff_c2.php?offer_id=769&aff_id=10787&pid=62034&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-WallieGet-Mobile (ID: 769)
        "https://gltrak.com/aff_c2.php?offer_id=769&aff_id=10787&pid=65423&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-WallieGet-Mobile (ID: 769)
        "https://gltrak.com/aff_c2.php?offer_id=769&aff_id=10787&pid=65424&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-WallieGet-Mobile (ID: 769)
        "https://gltrak.com/aff_c2.php?offer_id=1241&aff_id=10787&pid=82241&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TurboEcoValve-Mobile (ID: 1241)
        "https://gltrak.com/aff_c2.php?offer_id=1241&aff_id=10787&pid=82247&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TurboEcoValve-Mobile (ID: 1241)
        "https://gltrak.com/aff_c2.php?offer_id=1206&aff_id=10787&pid=77172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-BabaVanga-Mobile (ID: 1206)
        "https://gltrak.com/aff_c2.php?offer_id=1206&aff_id=10787&pid=77189&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-BabaVanga-Mobile (ID: 1206)
        "https://gltrak.com/aff_c2.php?offer_id=1151&aff_id=10787&pid=73339&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PinguLingo-Mobile (ID: 1151)
        "https://gltrak.com/aff_c2.php?offer_id=1151&aff_id=10787&pid=73360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PinguLingo-Mobile (ID: 1151)
        "https://gltrak.com/aff_c2.php?offer_id=1126&aff_id=10787&pid=73070&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Mobile (ID: 1126)
        "https://gltrak.com/aff_c2.php?offer_id=1126&aff_id=10787&pid=73071&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Mobile (ID: 1126)
        "https://gltrak.com/aff_c2.php?offer_id=998&aff_id=10787&pid=60358&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-SecretsOfAlphaMales-Mobile (ID: 998)
        "https://gltrak.com/aff_c2.php?offer_id=998&aff_id=10787&pid=60347&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-SecretsOfAlphaMales-Mobile (ID: 998)
        "https://gltrak.com/aff_c2.php?offer_id=1010&aff_id=10787&pid=60361&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1" // HU-ViperVenomAktiv-Mobile (ID: 1010)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=hr-HR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=976&aff_id=10787&pid=59772&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1",  // HR-MyCashProfessor-Mobile (ID: 976)
        "https://gltrak.com/aff_c2.php?offer_id=976&aff_id=10787&pid=59770&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1",  // HR-MyCashProfessor-Mobile (ID: 976)
        "https://gltrak.com/aff_c2.php?offer_id=418&aff_id=10787&pid=60335&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Mobile (ID: 418)
        "https://gltrak.com/aff_c2.php?offer_id=418&aff_id=10787&pid=45330&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Mobile (ID: 418)
        "https://gltrak.com/aff_c2.php?offer_id=827&aff_id=10787&pid=58172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Mobile (ID: 827)
        "https://gltrak.com/aff_c2.php?offer_id=766&aff_id=10787&pid=62272&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-UltraSaver-Mobile (ID: 766)
        "https://gltrak.com/aff_c2.php?offer_id=766&aff_id=10787&pid=51987&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-UltraSaver-Mobile (ID: 766)
        "https://gltrak.com/aff_c2.php?offer_id=766&aff_id=10787&pid=60374&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-UltraSaver-Mobile (ID: 766)
        "https://gltrak.com/aff_c2.php?offer_id=765&aff_id=10787&pid=70899&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-FunkContent-Mobile (ID: 765)
        "https://gltrak.com/aff_c2.php?offer_id=765&aff_id=10787&pid=72047&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-FunkContent-Mobile (ID: 765)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=62033&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=65142&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=1265&aff_id=10787&pid=84173&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-LerneLingu-Mobile (ID: 1265)
        "https://gltrak.com/aff_c2.php?offer_id=1265&aff_id=10787&pid=84181&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-LerneLingu-Mobile (ID: 1265)
        "https://gltrak.com/aff_c2.php?offer_id=1251&aff_id=10787&pid=82703&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-MonteCarloMethod-Mobile (ID: 1251)
        "https://gltrak.com/aff_c2.php?offer_id=1251&aff_id=10787&pid=82705&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-MonteCarloMethod-Mobile (ID: 1251)
        "https://gltrak.com/aff_c2.php?offer_id=1237&aff_id=10787&pid=82214&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TurboEcoValve-Mobile (ID: 1237)
        "https://gltrak.com/aff_c2.php?offer_id=1237&aff_id=10787&pid=82216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TurboEcoValve-Mobile (ID: 1237)
        "https://gltrak.com/aff_c2.php?offer_id=1202&aff_id=10787&pid=77170&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BabaVanga-Mobile (ID: 1202)
        "https://gltrak.com/aff_c2.php?offer_id=1202&aff_id=10787&pid=77186&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BabaVanga-Mobile (ID: 1202)
        "https://gltrak.com/aff_c2.php?offer_id=1163&aff_id=10787&pid=73862&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-PinguLingo-Mobile (ID: 1163)
        "https://gltrak.com/aff_c2.php?offer_id=1163&aff_id=10787&pid=73885&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-PinguLingo-Mobile (ID: 1163)
        "https://gltrak.com/aff_c2.php?offer_id=1147&aff_id=10787&pid=73322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-HerbaProstal-Mobile (ID: 1147)
        "https://gltrak.com/aff_c2.php?offer_id=1125&aff_id=10787&pid=73064&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Mobile (ID: 1125)
        "https://gltrak.com/aff_c2.php?offer_id=1125&aff_id=10787&pid=73067&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Mobile (ID: 1125)
        "https://gltrak.com/aff_c2.php?offer_id=1036&aff_id=10787&pid=61956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EnergySaverECO-Mobile (ID: 1036)
        "https://gltrak.com/aff_c2.php?offer_id=1036&aff_id=10787&pid=61889&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EnergySaverECO-Mobile (ID: 1036)
        "https://gltrak.com/aff_c2.php?offer_id=904&aff_id=10787&pid=58930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-SecretsOfAlphaMales-Mobile (ID: 904)
        "https://gltrak.com/aff_c2.php?offer_id=904&aff_id=10787&pid=58929&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-SecretsOfAlphaMales-Mobile (ID: 904)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=65652&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1" // HR-WallieGet-Mobile (ID: 764)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1269&aff_id=10787&pid=86593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-BabaVanga-Mobile (ID: 1269)
        "https://gltrak.com/aff_c2.php?offer_id=1269&aff_id=10787&pid=86684&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-BabaVanga-Mobile (ID: 1269)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=sr&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
//        "https://gltrak.com/aff_c2.php?offer_id=1049&aff_id=10787&pid=62242&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-MyCashProfessor-Mobile (ID: 1049)
//        "https://gltrak.com/aff_c2.php?offer_id=1049&aff_id=10787&pid=62306&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-MyCashProfessor-Mobile (ID: 1049)
        "https://gltrak.com/aff_c2.php?offer_id=424&aff_id=10787&pid=45336&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Mobile (ID: 424)
        "https://gltrak.com/aff_c2.php?offer_id=424&aff_id=10787&pid=47487&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Mobile (ID: 424)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=54372&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=82811&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=55571&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=55348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=55067&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=51990&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=748&aff_id=10787&pid=84848&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-FunkContent-Mobile (ID: 748)
        "https://gltrak.com/aff_c2.php?offer_id=748&aff_id=10787&pid=79137&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-FunkContent-Mobile (ID: 748)
        "https://gltrak.com/aff_c2.php?offer_id=748&aff_id=10787&pid=83563&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-FunkContent-Mobile (ID: 748)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=60168&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=60470&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=60990&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=65892&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=1253&aff_id=10787&pid=82964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-LerneLingu-Mobile (ID: 1253)
        "https://gltrak.com/aff_c2.php?offer_id=1253&aff_id=10787&pid=82975&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-LerneLingu-Mobile (ID: 1253)
        "https://gltrak.com/aff_c2.php?offer_id=1196&aff_id=10787&pid=76974&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PinguLingo-Mobile (ID: 1196)
        "https://gltrak.com/aff_c2.php?offer_id=1196&aff_id=10787&pid=77008&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PinguLingo-Mobile (ID: 1196)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=66814&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1" // RS-WallieGet-Mobile (ID: 745)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=984&aff_id=10787&pid=59847&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Mobile (ID: 984)
        "https://gltrak.com/aff_c2.php?offer_id=1054&aff_id=10787&pid=62332&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-MyCashProfessor-Mobile (ID: 1054)
        "https://gltrak.com/aff_c2.php?offer_id=1054&aff_id=10787&pid=62308&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-MyCashProfessor-Mobile (ID: 1054)
        "https://gltrak.com/aff_c2.php?offer_id=412&aff_id=10787&pid=45324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Mobile (ID: 412)
        "https://gltrak.com/aff_c2.php?offer_id=1159&aff_id=10787&pid=73334&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-PinguLingo-Mobile (ID: 1159)
        "https://gltrak.com/aff_c2.php?offer_id=1159&aff_id=10787&pid=73363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-PinguLingo-Mobile (ID: 1159)
        "https://gltrak.com/aff_c2.php?offer_id=1129&aff_id=10787&pid=73087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-TeslaSaverECO-Mobile (ID: 1129)
        "https://gltrak.com/aff_c2.php?offer_id=1129&aff_id=10787&pid=73264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-TeslaSaverECO-Mobile (ID: 1129)
        "https://gltrak.com/aff_c2.php?offer_id=984&aff_id=10787&pid=59847&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // BG-ViperVenomAktiv-Mobile (ID: 984)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=992&aff_id=10787&pid=59865&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BY-FunkContent-Mobile (ID: 992)
        "https://gltrak.com/aff_c2.php?offer_id=992&aff_id=10787&pid=82809&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BY-FunkContent-Mobile (ID: 992)
        "https://gltrak.com/aff_c2.php?offer_id=992&aff_id=10787&pid=59868&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // BY-FunkContent-Mobile (ID: 992)
        "https://gltrak.com/aff_c2.php?offer_id=992&aff_id=10787&pid=59888&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // BY-FunkContent-Mobile (ID: 992)
        "https://gltrak.com/aff_c2.php?offer_id=992&aff_id=10787&pid=59863&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=backoffer&mbbr=1&pof=1&aof=1" // BY-FunkContent-Mobile (ID: 992)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56631&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=57937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56637&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56634&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56640&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=backoffer&mbbr=1&pof=1&aof=1" // MA-TrueDefender-Mobile (ID: 991)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IQ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HN" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=pt-PT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1218&aff_id=10787&pid=77874&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-PinguLingo-Mobile (ID: 1218)
        "https://gltrak.com/aff_c2.php?offer_id=1218&aff_id=10787&pid=77873&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-PinguLingo-Mobile (ID: 1218)
        "https://gltrak.com/aff_c2.php?offer_id=1216&aff_id=10787&pid=77908&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-BabaVanga-Mobile (ID: 1216)
        "https://gltrak.com/aff_c2.php?offer_id=1216&aff_id=10787&pid=77876&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-BabaVanga-Mobile (ID: 1216)
        "https://gltrak.com/aff_c2.php?offer_id=1214&aff_id=10787&pid=77910&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-TeslaSaverECO-Mobile (ID: 1214)
        "https://gltrak.com/aff_c2.php?offer_id=1214&aff_id=10787&pid=77878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-TeslaSaverECO-Mobile (ID: 1214)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SD" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BD" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://norgedating.com/?lc=no&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://sublimedates.com/?lc=no&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=da-DK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=en-GB&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=en-GB&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=es-ES&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=fr-FR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=nl-NL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=sk-SK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=430&aff_id=10787&pid=45333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Mobile (ID: 430)
        "https://gltrak.com/aff_c2.php?offer_id=1026&aff_id=10787&pid=60933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-MyCashProfessor-Mobile (ID: 1026)
        "https://gltrak.com/aff_c2.php?offer_id=1026&aff_id=10787&pid=60909&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-MyCashProfessor-Mobile (ID: 1026)
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1247&aff_id=10787&pid=82279&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TurboEcoValve-Mobile (ID: 1247)
        "https://gltrak.com/aff_c2.php?offer_id=1247&aff_id=10787&pid=82293&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TurboEcoValve-Mobile (ID: 1247)
        "https://gltrak.com/aff_c2.php?offer_id=1233&aff_id=10787&pid=79687&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-BabaVanga-Mobile (ID: 1233)
        "https://gltrak.com/aff_c2.php?offer_id=1233&aff_id=10787&pid=79689&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-BabaVanga-Mobile (ID: 1233)
        "https://gltrak.com/aff_c2.php?offer_id=1157&aff_id=10787&pid=73332&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-PinguLingo-Mobile (ID: 1157)
        "https://gltrak.com/aff_c2.php?offer_id=1157&aff_id=10787&pid=73350&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-PinguLingo-Mobile (ID: 1157)
        "https://gltrak.com/aff_c2.php?offer_id=1127&aff_id=10787&pid=73072&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Mobile (ID: 1127)
        "https://gltrak.com/aff_c2.php?offer_id=1127&aff_id=10787&pid=73073&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Mobile (ID: 1127)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=fi-FI&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=sv-SE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=tr-TR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=el-GR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1188&aff_id=10787&pid=74861&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-PinguLingo-Mobile (ID: 1188)
        "https://gltrak.com/aff_c2.php?offer_id=1188&aff_id=10787&pid=74871&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-PinguLingo-Mobile (ID: 1188)
        "https://gltrak.com/aff_c2.php?offer_id=1137&aff_id=10787&pid=73085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-TeslaSaverECO-Mobile (ID: 1137)
        "https://gltrak.com/aff_c2.php?offer_id=1137&aff_id=10787&pid=73234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-TeslaSaverECO-Mobile (ID: 1137)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=ru-RU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=th-TH&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JP" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=ja-JP&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1279&aff_id=10787&pid=86634&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-BabaVanga-Mobile (ID: 1279)
        "https://gltrak.com/aff_c2.php?offer_id=1279&aff_id=10787&pid=86679&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-BabaVanga-Mobile (ID: 1279)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=406&aff_id=10787&pid=45327&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Mobile (ID: 406)
        "https://gltrak.com/aff_c2.php?offer_id=1056&aff_id=10787&pid=62324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-MyCashProfessor-Mobile (ID: 1056)
        "https://gltrak.com/aff_c2.php?offer_id=1056&aff_id=10787&pid=62311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-MyCashProfessor-Mobile (ID: 1056)
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1257&aff_id=10787&pid=82961&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-LerneLingu-Mobile (ID: 1257)
        "https://gltrak.com/aff_c2.php?offer_id=1257&aff_id=10787&pid=82971&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-LerneLingu-Mobile (ID: 1257)
        "https://gltrak.com/aff_c2.php?offer_id=1194&aff_id=10787&pid=76978&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-PinguLingo-Mobile (ID: 1194)
        "https://gltrak.com/aff_c2.php?offer_id=1194&aff_id=10787&pid=77017&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-PinguLingo-Mobile (ID: 1194)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1198&aff_id=10787&pid=76976&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-PinguLingo-Mobile (ID: 1198)
        "https://gltrak.com/aff_c2.php?offer_id=1198&aff_id=10787&pid=77013&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-PinguLingo-Mobile (ID: 1198)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1277&aff_id=10787&pid=86601&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-BabaVanga-Mobile (ID: 1277)
        "https://gltrak.com/aff_c2.php?offer_id=1277&aff_id=10787&pid=86680&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-BabaVanga-Mobile (ID: 1277)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1135&aff_id=10787&pid=73083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-TeslaSaverECO-Mobile (ID: 1135)
        "https://gltrak.com/aff_c2.php?offer_id=1135&aff_id=10787&pid=73201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-TeslaSaverECO-Mobile (ID: 1135)
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to backoffers after geo target
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream backoffer
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
//geo target first with geo direct offer backoffers or simply backoffers if offers are good for this geo
if ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=it-IT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=844&aff_id=10787&pid=57628&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-MyCashProfessor-Desktop (ID: 844)
        "https://gltrak.com/aff_c2.php?offer_id=844&aff_id=10787&pid=57800&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-MyCashProfessor-Desktop (ID: 844)
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=53403&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=45354&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=46557&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=46530&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=712&aff_id=10787&pid=45525&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-EyelashStar-Desktop (ID: 712)
        "https://gltrak.com/aff_c2.php?offer_id=712&aff_id=10787&pid=46635&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-EyelashStar-Desktop (ID: 712)
        "https://gltrak.com/aff_c2.php?offer_id=807&aff_id=10787&pid=54472&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-NeckSlim-desktop (ID: 807)
        "https://gltrak.com/aff_c2.php?offer_id=830&aff_id=10787&pid=57620&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-PushUpBreast-Desktop (ID: 830)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60912&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=58343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=58343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60911&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=1260&aff_id=10787&pid=83508&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-LaserSharpener-Desktop (ID: 1260)
        "https://gltrak.com/aff_c2.php?offer_id=1244&aff_id=10787&pid=82300&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TurboEcoValve-Desktop (ID: 1244)
        "https://gltrak.com/aff_c2.php?offer_id=1244&aff_id=10787&pid=82300&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TurboEcoValve-Desktop (ID: 1244)
        "https://gltrak.com/aff_c2.php?offer_id=1209&aff_id=10787&pid=77166&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-BabaVanga-Desktop (ID: 1209)
        "https://gltrak.com/aff_c2.php?offer_id=1209&aff_id=10787&pid=77181&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-BabaVanga-Desktop (ID: 1209)
        "https://gltrak.com/aff_c2.php?offer_id=1185&aff_id=10787&pid=74875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-PinguLingo-Desktop (ID: 1185)
        "https://gltrak.com/aff_c2.php?offer_id=1185&aff_id=10787&pid=74879&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-PinguLingo-Desktop (ID: 1185)
        "https://gltrak.com/aff_c2.php?offer_id=1106&aff_id=10787&pid=70950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Desktop (ID: 1106)
        "https://gltrak.com/aff_c2.php?offer_id=1106&aff_id=10787&pid=70950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Desktop (ID: 1106)
        "https://gltrak.com/aff_c2.php?offer_id=979&aff_id=10787&pid=59785&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-SecretsOfAlphaMales-Desktop (ID: 979)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=46599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1" // IT-ViperVenomAktiv-Desktop (ID: 532)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=pl-PL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1031&aff_id=10787&pid=60930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-MyCashProfessor-Desktop (ID: 1031)
        "https://gltrak.com/aff_c2.php?offer_id=1031&aff_id=10787&pid=60916&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-MyCashProfessor-Desktop (ID: 1031)
        "https://gltrak.com/aff_c2.php?offer_id=454&aff_id=10787&pid=53080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-StarSilkPro-Desktop (ID: 454)
        "https://gltrak.com/aff_c2.php?offer_id=454&aff_id=10787&pid=45363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-StarSilkPro-Desktop (ID: 454)
        "https://gltrak.com/aff_c2.php?offer_id=454&aff_id=10787&pid=46566&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-StarSilkPro-Desktop (ID: 454)
        "https://gltrak.com/aff_c2.php?offer_id=679&aff_id=10787&pid=45498&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VivalProB-Desktop (ID: 679)
        "https://gltrak.com/aff_c2.php?offer_id=715&aff_id=10787&pid=45528&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-EyelashStar-Desktop (ID: 715)
        "https://gltrak.com/aff_c2.php?offer_id=715&aff_id=10787&pid=46638&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-EyelashStar-Desktop (ID: 715)
        "https://gltrak.com/aff_c2.php?offer_id=812&aff_id=10787&pid=54476&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-NeckSlim-desktop (ID: 812)
        "https://gltrak.com/aff_c2.php?offer_id=831&aff_id=10787&pid=57649&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-PushUpBreast-Desktop (ID: 831)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=58509&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=57794&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=44884&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=46605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=1254&aff_id=10787&pid=82967&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-LerneLingu-Desktop (ID: 1254)
        "https://gltrak.com/aff_c2.php?offer_id=1254&aff_id=10787&pid=82981&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-LerneLingu-Desktop (ID: 1254)
        "https://gltrak.com/aff_c2.php?offer_id=1248&aff_id=10787&pid=82295&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TurboEcoValve-Desktop (ID: 1248)
        "https://gltrak.com/aff_c2.php?offer_id=1248&aff_id=10787&pid=82297&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TurboEcoValve-Desktop (ID: 1248)
        "https://gltrak.com/aff_c2.php?offer_id=1234&aff_id=10787&pid=81089&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-BabaVanga-Desktop (ID: 1234)
        "https://gltrak.com/aff_c2.php?offer_id=1234&aff_id=10787&pid=81091&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-BabaVanga-Desktop (ID: 1234)
        "https://gltrak.com/aff_c2.php?offer_id=1175&aff_id=10787&pid=74658&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-PinguLingo-Desktop (ID: 1175)
        "https://gltrak.com/aff_c2.php?offer_id=1175&aff_id=10787&pid=74660&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-PinguLingo-Desktop (ID: 1175)
        "https://gltrak.com/aff_c2.php?offer_id=1084&aff_id=10787&pid=66681&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TeslaSaverECO-Desktop (ID: 1084)
        "https://gltrak.com/aff_c2.php?offer_id=1084&aff_id=10787&pid=66679&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-TeslaSaverECO-Desktop (ID: 1084)
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=hr-HR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1024&aff_id=10787&pid=57100&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-MyCashProfessor-Desktop (ID: 1024)
        "https://gltrak.com/aff_c2.php?offer_id=1024&aff_id=10787&pid=57255&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-MyCashProfessor-Desktop (ID: 1024)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=62301&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=62322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=53075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=61929&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=46551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=46524&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=58628&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=57251&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=45483&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=57380&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=46755&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=796&aff_id=10787&pid=54470&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-NeckSlim-desktop (ID: 796)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=61942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=60334&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=45519&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=46629&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=796&aff_id=10787&pid=60901&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-NeckSlim-desktop (ID: 796)
        "https://gltrak.com/aff_c2.php?offer_id=832&aff_id=10787&pid=57927&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-PushUpBreast-Desktop (ID: 832)
        "https://gltrak.com/aff_c2.php?offer_id=841&aff_id=10787&pid=57823&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-CellulitePatch-Desktop (ID: 841)
        "https://gltrak.com/aff_c2.php?offer_id=982&aff_id=10787&pid=60926&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BlackMask-Desktop (ID: 982)
        "https://gltrak.com/aff_c2.php?offer_id=982&aff_id=10787&pid=59776&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BlackMask-Desktop (ID: 982)
        "https://gltrak.com/aff_c2.php?offer_id=907&aff_id=10787&pid=59088&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", //HR-GreyAway-Desktop (ID: 907)
        "https://gltrak.com/aff_c2.php?offer_id=907&aff_id=10787&pid=59087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", //HR-GreyAway-Desktop (ID: 907)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59778&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59093&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=58171&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=55554&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=44866&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62591&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62391&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62320&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62295&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop9&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62366&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop10&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=62319&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop11&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59777&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop12&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=59081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop13&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=57623&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop14&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=57376&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop15&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=57377&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop16&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=1264&aff_id=10787&pid=84172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-LerneLingu-Desktop (ID: 1264)
        "https://gltrak.com/aff_c2.php?offer_id=1264&aff_id=10787&pid=84180&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-LerneLingu-Desktop (ID: 1264)
        "https://gltrak.com/aff_c2.php?offer_id=1250&aff_id=10787&pid=82702&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-MonteCarloMethod-Desktop (ID: 1250)
        "https://gltrak.com/aff_c2.php?offer_id=1250&aff_id=10787&pid=82704&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-MonteCarloMethod-Desktop (ID: 1250)
        "https://gltrak.com/aff_c2.php?offer_id=1236&aff_id=10787&pid=82213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TurboEcoValve-Desktop (ID: 1236)
        "https://gltrak.com/aff_c2.php?offer_id=1236&aff_id=10787&pid=82215&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TurboEcoValve-Desktop (ID: 1236)
        "https://gltrak.com/aff_c2.php?offer_id=1201&aff_id=10787&pid=77169&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BabaVanga-Desktop (ID: 1201)
        "https://gltrak.com/aff_c2.php?offer_id=1201&aff_id=10787&pid=77187&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BabaVanga-Desktop (ID: 1201)
        "https://gltrak.com/aff_c2.php?offer_id=1162&aff_id=10787&pid=73840&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-PinguLingo-Desktop (ID: 1162)
        "https://gltrak.com/aff_c2.php?offer_id=1162&aff_id=10787&pid=73884&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-PinguLingo-Desktop (ID: 1162)
        "https://gltrak.com/aff_c2.php?offer_id=1146&aff_id=10787&pid=73320&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-HerbaProstal-Desktop (ID: 1146)
        "https://gltrak.com/aff_c2.php?offer_id=1069&aff_id=10787&pid=66061&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Desktop (ID: 1069)
        "https://gltrak.com/aff_c2.php?offer_id=1069&aff_id=10787&pid=66058&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Desktop (ID: 1069)
        "https://gltrak.com/aff_c2.php?offer_id=1035&aff_id=10787&pid=61955&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EnergySaverECO-Desktop (ID: 1035)
        "https://gltrak.com/aff_c2.php?offer_id=1035&aff_id=10787&pid=61887&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EnergySaverECO-Desktop (ID: 1035)
        "https://gltrak.com/aff_c2.php?offer_id=873&aff_id=10787&pid=58779&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-SecretsOfAlphaMales-Desktop (ID: 873)
        "https://gltrak.com/aff_c2.php?offer_id=873&aff_id=10787&pid=58780&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-SecretsOfAlphaMales-Desktop (ID: 873)
        "https://gltrak.com/aff_c2.php?offer_id=873&aff_id=10787&pid=57629&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-SecretsOfAlphaMales-Desktop (ID: 873)
        "https://gltrak.com/aff_c2.php?offer_id=873&aff_id=10787&pid=57611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-SecretsOfAlphaMales-Desktop (ID: 873)
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=46593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop17&creative=backoffer&mbbr=1&pof=1&aof=1" // HR-ViperVenomAktiv-Desktop (ID: 526)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=57094&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=676&aff_id=10787&pid=45495&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-VivalProB-Desktop (ID: 676)
        "https://gltrak.com/aff_c2.php?offer_id=776&aff_id=10787&pid=53079&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-StarSilkPro-Desktop (ID: 776)
        "https://gltrak.com/aff_c2.php?offer_id=798&aff_id=10787&pid=54475&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-NeckSlim-desktop (ID: 798)
        "https://gltrak.com/aff_c2.php?offer_id=881&aff_id=10787&pid=58245&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-PushUpBreast-Desktop (ID: 881)
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=44596&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=57046&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=44881&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-ViperVenomAktiv-Desktop (ID: 541)
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=46602&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-ViperVenomAktiv-Desktop (ID: 541)
        "https://gltrak.com/aff_c2.php?offer_id=1197&aff_id=10787&pid=76977&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-PinguLingo-Desktop (ID: 1197)
        "https://gltrak.com/aff_c2.php?offer_id=1197&aff_id=10787&pid=77014&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-PinguLingo-Desktop (ID: 1197)
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=46233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // MK-GoSlimmer-Desktop (ID: 493)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=sk-SK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1003&aff_id=10787&pid=60343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-MyCashProfessor-Desktop (ID: 1003)
        "https://gltrak.com/aff_c2.php?offer_id=1003&aff_id=10787&pid=62576&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-MyCashProfessor-Desktop (ID: 1003)
        "https://gltrak.com/aff_c2.php?offer_id=427&aff_id=10787&pid=53082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Desktop (ID: 427)
        "https://gltrak.com/aff_c2.php?offer_id=427&aff_id=10787&pid=45369&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Desktop (ID: 427)
        "https://gltrak.com/aff_c2.php?offer_id=427&aff_id=10787&pid=46572&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Desktop (ID: 427)
        "https://gltrak.com/aff_c2.php?offer_id=691&aff_id=10787&pid=45504&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VivalProB-Desktop (ID: 691)
        "https://gltrak.com/aff_c2.php?offer_id=727&aff_id=10787&pid=45534&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-EyelashStar-Desktop (ID: 727)
        "https://gltrak.com/aff_c2.php?offer_id=727&aff_id=10787&pid=46644&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-EyelashStar-Desktop (ID: 727)
        "https://gltrak.com/aff_c2.php?offer_id=809&aff_id=10787&pid=54478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-NeckSlim-desktop (ID: 809)
        "https://gltrak.com/aff_c2.php?offer_id=809&aff_id=10787&pid=60936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-NeckSlim-desktop (ID: 809)
        "https://gltrak.com/aff_c2.php?offer_id=836&aff_id=10787&pid=57928&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-PushUpBreast-Desktop (ID: 836)
        "https://gltrak.com/aff_c2.php?offer_id=839&aff_id=10787&pid=57799&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-CellulitePatch-Desktop (ID: 839)
        "https://gltrak.com/aff_c2.php?offer_id=839&aff_id=10787&pid=57828&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-CellulitePatch-Desktop (ID: 839)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=58344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=44890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=59781&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=1246&aff_id=10787&pid=82278&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TurboEcoValve-Desktop (ID: 1246)
        "https://gltrak.com/aff_c2.php?offer_id=1246&aff_id=10787&pid=82292&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TurboEcoValve-Desktop (ID: 1246)
        "https://gltrak.com/aff_c2.php?offer_id=1232&aff_id=10787&pid=79686&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-BabaVanga-Desktop (ID: 1232)
        "https://gltrak.com/aff_c2.php?offer_id=1232&aff_id=10787&pid=79688&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-BabaVanga-Desktop (ID: 1232)
        "https://gltrak.com/aff_c2.php?offer_id=1156&aff_id=10787&pid=73331&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-PinguLingo-Desktop (ID: 1156)
        "https://gltrak.com/aff_c2.php?offer_id=1156&aff_id=10787&pid=73351&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-PinguLingo-Desktop (ID: 1156)
        "https://gltrak.com/aff_c2.php?offer_id=1071&aff_id=10787&pid=66063&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Desktop (ID: 1071)
        "https://gltrak.com/aff_c2.php?offer_id=1071&aff_id=10787&pid=66060&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Desktop (ID: 1071)
        "https://gltrak.com/aff_c2.php?offer_id=1058&aff_id=10787&pid=62357&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-EnergySaverECO-Desktop (ID: 1058)
        "https://gltrak.com/aff_c2.php?offer_id=1058&aff_id=10787&pid=62359&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-EnergySaverECO-Desktop (ID: 1058)
        "https://gltrak.com/aff_c2.php?offer_id=978&aff_id=10787&pid=59784&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-SecretsOfAlphaMales-Desktop (ID: 978)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=46611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // SK-ViperVenomAktiv-Desktop (ID: 556)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=553&aff_id=10787&pid=44893&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-ViperVenomAktiv-Desktop (ID: 553)
        "https://gltrak.com/aff_c2.php?offer_id=1002&aff_id=10787&pid=60363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-MyCashProfessor-Desktop (ID: 1002)
        "https://gltrak.com/aff_c2.php?offer_id=1002&aff_id=10787&pid=60363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-MyCashProfessor-Desktop (ID: 1002)
        "https://gltrak.com/aff_c2.php?offer_id=688&aff_id=10787&pid=58951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VivalProB-Desktop (ID: 688)
        "https://gltrak.com/aff_c2.php?offer_id=688&aff_id=10787&pid=45507&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VivalProB-Desktop (ID: 688)
        "https://gltrak.com/aff_c2.php?offer_id=724&aff_id=10787&pid=45537&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-EyelashStar-Desktop (ID: 724)
        "https://gltrak.com/aff_c2.php?offer_id=724&aff_id=10787&pid=46647&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-EyelashStar-Desktop (ID: 724)
        "https://gltrak.com/aff_c2.php?offer_id=799&aff_id=10787&pid=54479&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-NeckSlim-desktop (ID: 799)
        "https://gltrak.com/aff_c2.php?offer_id=799&aff_id=10787&pid=60937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-NeckSlim-desktop (ID: 799)
        "https://gltrak.com/aff_c2.php?offer_id=833&aff_id=10787&pid=57843&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-PushUpBreast-Desktop (ID: 833)
        "https://gltrak.com/aff_c2.php?offer_id=1266&aff_id=10787&pid=84182&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-LerneLingu-Desktop (ID: 1266)
        "https://gltrak.com/aff_c2.php?offer_id=1266&aff_id=10787&pid=84184&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-LerneLingu-Desktop (ID: 1266)
        "https://gltrak.com/aff_c2.php?offer_id=1238&aff_id=10787&pid=82235&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TurboEcoValve-Desktop (ID: 1238)
        "https://gltrak.com/aff_c2.php?offer_id=1238&aff_id=10787&pid=82237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TurboEcoValve-Desktop (ID: 1238)
        "https://gltrak.com/aff_c2.php?offer_id=1211&aff_id=10787&pid=77818&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TeslaSaverECO-Desktop (ID: 1211)
        "https://gltrak.com/aff_c2.php?offer_id=1211&aff_id=10787&pid=77820&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-TeslaSaverECO-Desktop (ID: 1211)
        "https://gltrak.com/aff_c2.php?offer_id=1203&aff_id=10787&pid=77174&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-BabaVanga-Desktop (ID: 1203)
        "https://gltrak.com/aff_c2.php?offer_id=1203&aff_id=10787&pid=77192&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-BabaVanga-Desktop (ID: 1203)
        "https://gltrak.com/aff_c2.php?offer_id=1152&aff_id=10787&pid=73325&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-PinguLingo-Desktop (ID: 1152)
        "https://gltrak.com/aff_c2.php?offer_id=1152&aff_id=10787&pid=73342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-PinguLingo-Desktop (ID: 1152)
        "https://gltrak.com/aff_c2.php?offer_id=553&aff_id=10787&pid=46614&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1" // SI-ViperVenomAktiv-Desktop (ID: 553)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1268&aff_id=10787&pid=86591&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-BabaVanga-Desktop (ID: 1268)
        "https://gltrak.com/aff_c2.php?offer_id=1268&aff_id=10787&pid=86678&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-BabaVanga-Desktop (ID: 1268)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=sr&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
//        "https://gltrak.com/aff_c2.php?offer_id=1048&aff_id=10787&pid=62237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-MyCashProfessor-Desktop (ID: 1048)
//        "https://gltrak.com/aff_c2.php?offer_id=1048&aff_id=10787&pid=62305&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-MyCashProfessor-Desktop (ID: 1048)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=50962&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=45375&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=61938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=51318&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=46578&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=46533&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=50970&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=45510&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=51312&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=47863&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=795&aff_id=10787&pid=54480&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-NeckSlim-desktop (ID: 795)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=50967&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=45540&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=51313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=46650&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=795&aff_id=10787&pid=60938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-NeckSlim-desktop (ID: 795)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=50969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=829&aff_id=10787&pid=57532&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PushUpBreast-Desktop (ID: 829)
        "https://gltrak.com/aff_c2.php?offer_id=829&aff_id=10787&pid=61937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PushUpBreast-Desktop (ID: 829)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=44896&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=51317&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=1252&aff_id=10787&pid=82965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-LerneLingu-Desktop (ID: 1252)
        "https://gltrak.com/aff_c2.php?offer_id=1252&aff_id=10787&pid=82976&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-LerneLingu-Desktop (ID: 1252)
        "https://gltrak.com/aff_c2.php?offer_id=1195&aff_id=10787&pid=76973&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PinguLingo-Desktop (ID: 1195)
        "https://gltrak.com/aff_c2.php?offer_id=1195&aff_id=10787&pid=77010&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PinguLingo-Desktop (ID: 1195)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=46617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // RS-ViperVenomAktiv-Desktop (ID: 550)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1270&aff_id=10787&pid=86583&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-BabaVanga-Desktop (ID: 1270)
        "https://gltrak.com/aff_c2.php?offer_id=1270&aff_id=10787&pid=86677&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-BabaVanga-Desktop (ID: 1270)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=68495&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=1062&aff_id=10787&pid=64172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-MyCashProfessor-Desktop (ID: 1062)
        "https://gltrak.com/aff_c2.php?offer_id=1062&aff_id=10787&pid=64170&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-MyCashProfessor-Desktop (ID: 1062)
        "https://gltrak.com/aff_c2.php?offer_id=457&aff_id=10787&pid=53081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-StarSilkPro-Desktop (ID: 457)
        "https://gltrak.com/aff_c2.php?offer_id=457&aff_id=10787&pid=45366&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-StarSilkPro-Desktop (ID: 457)
        "https://gltrak.com/aff_c2.php?offer_id=457&aff_id=10787&pid=46569&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-StarSilkPro-Desktop (ID: 457)
        "https://gltrak.com/aff_c2.php?offer_id=682&aff_id=10787&pid=45501&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-VivalProB-Desktop (ID: 682)
        "https://gltrak.com/aff_c2.php?offer_id=718&aff_id=10787&pid=45531&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-EyelashStar-Desktop (ID: 718)
        "https://gltrak.com/aff_c2.php?offer_id=718&aff_id=10787&pid=46641&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", //  RO-EyelashStar-Desktop (ID: 718)
        "https://gltrak.com/aff_c2.php?offer_id=806&aff_id=10787&pid=54477&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-NeckSlim-desktop (ID: 806)
        "https://gltrak.com/aff_c2.php?offer_id=806&aff_id=10787&pid=60935&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-NeckSlim-desktop (ID: 806)
        "https://gltrak.com/aff_c2.php?offer_id=822&aff_id=10787&pid=57071&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-PushUpBreast-Desktop (ID: 822)
        "https://gltrak.com/aff_c2.php?offer_id=821&aff_id=10787&pid=57051&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-XtremeProWhite-Desktop (ID: 821)
        "https://gltrak.com/aff_c2.php?offer_id=837&aff_id=10787&pid=57619&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-CellulitePatch-Desktop (ID: 837)
        "https://gltrak.com/aff_c2.php?offer_id=837&aff_id=10787&pid=57622&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-CellulitePatch-Desktop (ID: 837)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=56931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=44887&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=1154&aff_id=10787&pid=73329&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-PinguLingo-Desktop (ID: 1154)
        "https://gltrak.com/aff_c2.php?offer_id=1154&aff_id=10787&pid=73346&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-PinguLingo-Desktop (ID: 1154)
        "https://gltrak.com/aff_c2.php?offer_id=1130&aff_id=10787&pid=73079&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-TeslaSaverECO-Desktop (ID: 1130)
        "https://gltrak.com/aff_c2.php?offer_id=1130&aff_id=10787&pid=73310&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-TeslaSaverECO-Desktop (ID: 1130)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=46608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // RO-ViperVenomAktiv-Desktop (ID: 547)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1274&aff_id=10787&pid=86626&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-BabaVanga-Desktop (ID: 1274)
        "https://gltrak.com/aff_c2.php?offer_id=1274&aff_id=10787&pid=86676&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-BabaVanga-Desktop (ID: 1274)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=44878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-ViperVenomAktiv-Desktop (ID: 538)
        "https://gltrak.com/aff_c2.php?offer_id=1063&aff_id=10787&pid=62236&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-MyCashProfessor-Desktop (ID: 1063)
        "https://gltrak.com/aff_c2.php?offer_id=1063&aff_id=10787&pid=62325&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-MyCashProfessor-Desktop (ID: 1063)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=53078&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=45360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=61940&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=47493&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=673&aff_id=10787&pid=60314&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VivalProB-Desktop (ID: 673)
        "https://gltrak.com/aff_c2.php?offer_id=673&aff_id=10787&pid=45492&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VivalProB-Desktop (ID: 673)
        "https://gltrak.com/aff_c2.php?offer_id=813&aff_id=10787&pid=54474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-NeckSlim-desktop (ID: 813)
        "https://gltrak.com/aff_c2.php?offer_id=813&aff_id=10787&pid=60902&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-NeckSlim-desktop (ID: 813)
        "https://gltrak.com/aff_c2.php?offer_id=1160&aff_id=10787&pid=73335&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-PinguLingo-Desktop (ID: 1160)
        "https://gltrak.com/aff_c2.php?offer_id=1160&aff_id=10787&pid=73366&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-PinguLingo-Desktop (ID: 1160)
        "https://gltrak.com/aff_c2.php?offer_id=1142&aff_id=10787&pid=73312&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-TeslaSaverECO-Desktop (ID: 1142)
        "https://gltrak.com/aff_c2.php?offer_id=1142&aff_id=10787&pid=73227&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-TeslaSaverECO-Desktop (ID: 1142)
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=47514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1" // LV-ViperVenomAktiv-Desktop (ID: 538)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1272&aff_id=10787&pid=86595&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-BabaVanga-Desktop (ID: 1272)
        "https://gltrak.com/aff_c2.php?offer_id=1272&aff_id=10787&pid=86675&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-BabaVanga-Desktop (ID: 1272)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=lt-LT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1044&aff_id=10787&pid=62235&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-MyCashProfessor-Desktop (ID: 1044)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=53077&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=45357&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=61930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=46560&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=670&aff_id=10787&pid=45489&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VivalProB-Desktop (ID: 670)
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=44875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-ViperVenomAktiv-Desktop (ID: 535)
        "https://gltrak.com/aff_c2.php?offer_id=814&aff_id=10787&pid=54473&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-NeckSlim-desktop (ID: 814)
        "https://gltrak.com/aff_c2.php?offer_id=1132&aff_id=10787&pid=73075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-TeslaSaverECO-Desktop (ID: 1132)
        "https://gltrak.com/aff_c2.php?offer_id=1132&aff_id=10787&pid=73187&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-TeslaSaverECO-Desktop (ID: 1132)
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=47511&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1" // LT-ViperVenomAktiv-Desktop (ID: 535)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=hu-HU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=1047&aff_id=10787&pid=62331&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-MyCashProfessor-Desktop (ID: 1047)
        "https://gltrak.com/aff_c2.php?offer_id=1047&aff_id=10787&pid=62586&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-MyCashProfessor-Desktop (ID: 1047)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=53076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=45351&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=46554&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=46527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=60478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=45486&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=61292&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=47502&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=709&aff_id=10787&pid=60365&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EyelashStar-Desktop (ID: 709)
        "https://gltrak.com/aff_c2.php?offer_id=709&aff_id=10787&pid=45522&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EyelashStar-Desktop (ID: 709)
        "https://gltrak.com/aff_c2.php?offer_id=709&aff_id=10787&pid=46632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EyelashStar-Desktop (ID: 709)
        "https://gltrak.com/aff_c2.php?offer_id=802&aff_id=10787&pid=54471&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1",  // HU-NeckSlim-desktop (ID: 802)
        "https://gltrak.com/aff_c2.php?offer_id=834&aff_id=10787&pid=60332&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PushUpBreast-Desktop (ID: 834)
        "https://gltrak.com/aff_c2.php?offer_id=834&aff_id=10787&pid=57844&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PushUpBreast-Desktop (ID: 834)
        "https://gltrak.com/aff_c2.php?offer_id=834&aff_id=10787&pid=61291&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PushUpBreast-Desktop (ID: 834)
        "https://gltrak.com/aff_c2.php?offer_id=840&aff_id=10787&pid=57618&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CellulitePatch-Desktop (ID: 840)
        "https://gltrak.com/aff_c2.php?offer_id=840&aff_id=10787&pid=61293&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CellulitePatch-Desktop (ID: 840)
        "https://gltrak.com/aff_c2.php?offer_id=840&aff_id=10787&pid=57804&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CellulitePatch-Desktop (ID: 840)
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=58342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Desktop (ID: 529)
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=44869&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Desktop (ID: 529)
        "https://gltrak.com/aff_c2.php?offer_id=1240&aff_id=10787&pid=82240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TurboEcoValve-Desktop (ID: 1240)
        "https://gltrak.com/aff_c2.php?offer_id=1240&aff_id=10787&pid=82246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TurboEcoValve-Desktop (ID: 1240)
        "https://gltrak.com/aff_c2.php?offer_id=1205&aff_id=10787&pid=77173&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-BabaVanga-Desktop (ID: 1205)
        "https://gltrak.com/aff_c2.php?offer_id=1205&aff_id=10787&pid=77188&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-BabaVanga-Desktop (ID: 1205)
        "https://gltrak.com/aff_c2.php?offer_id=1150&aff_id=10787&pid=73338&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PinguLingo-Desktop (ID: 1150)
        "https://gltrak.com/aff_c2.php?offer_id=1150&aff_id=10787&pid=73359&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PinguLingo-Desktop (ID: 1150)
        "https://gltrak.com/aff_c2.php?offer_id=1070&aff_id=10787&pid=66062&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Desktop (ID: 1070)
        "https://gltrak.com/aff_c2.php?offer_id=1070&aff_id=10787&pid=66059&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Desktop (ID: 1070)
        "https://gltrak.com/aff_c2.php?offer_id=1057&aff_id=10787&pid=62356&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EnergySaverECO-Desktop (ID: 1057)
        "https://gltrak.com/aff_c2.php?offer_id=1057&aff_id=10787&pid=62358&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EnergySaverECO-Desktop (ID: 1057)
        "https://gltrak.com/aff_c2.php?offer_id=975&aff_id=10787&pid=59786&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-SecretsOfAlphaMales-Desktop (ID: 975)
        "https://gltrak.com/aff_c2.php?offer_id=975&aff_id=10787&pid=59783&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-SecretsOfAlphaMales-Desktop (ID: 975)
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=46596&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1" // HU-ViperVenomAktiv-Desktop (ID: 529)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=el-GR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=439&aff_id=10787&pid=53074&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-StarSilkPro-Desktop (ID: 439)
        "https://gltrak.com/aff_c2.php?offer_id=439&aff_id=10787&pid=45348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-StarSilkPro-Desktop (ID: 439)
        "https://gltrak.com/aff_c2.php?offer_id=439&aff_id=10787&pid=46548&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-StarSilkPro-Desktop (ID: 439)
        "https://gltrak.com/aff_c2.php?offer_id=661&aff_id=10787&pid=45480&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-VivalProB-Desktop (ID: 661)
        "https://gltrak.com/aff_c2.php?offer_id=703&aff_id=10787&pid=45516&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-EyelashStar-Desktop (ID: 703)
        "https://gltrak.com/aff_c2.php?offer_id=703&aff_id=10787&pid=46626&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-EyelashStar-Desktop (ID: 703)
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=60921&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523)
        "https://gltrak.com/aff_c2.php?offer_id=811&aff_id=10787&pid=54469&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-NeckSlim-desktop (ID: 811)
        "https://gltrak.com/aff_c2.php?offer_id=811&aff_id=10787&pid=60900&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-NeckSlim-desktop (ID: 811)
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=60921&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523)
        "https://gltrak.com/aff_c2.php?offer_id=1187&aff_id=10787&pid=74862&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-PinguLingo-Desktop (ID: 1187)
        "https://gltrak.com/aff_c2.php?offer_id=1187&aff_id=10787&pid=74870&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-PinguLingo-Desktop (ID: 1187)
        "https://gltrak.com/aff_c2.php?offer_id=1136&aff_id=10787&pid=73084&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-TeslaSaverECO-Desktop (ID: 1136)
        "https://gltrak.com/aff_c2.php?offer_id=1136&aff_id=10787&pid=73233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-TeslaSaverECO-Desktop (ID: 1136)
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=46590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1" // GR-ViperVenomAktiv-Desktop (ID: 523)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1276&aff_id=10787&pid=86599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-BabaVanga-Desktop (ID: 1276)
        "https://gltrak.com/aff_c2.php?offer_id=1276&aff_id=10787&pid=86674&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-BabaVanga-Desktop (ID: 1276)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=60333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=1012&aff_id=10787&pid=60362&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-MyCashProfessor-Desktop (ID: 1012)
        "https://gltrak.com/aff_c2.php?offer_id=1012&aff_id=10787&pid=62585&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-MyCashProfessor-Desktop (ID: 1012)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=53073&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=45345&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=61939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=47490&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=658&aff_id=10787&pid=60311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VivalProB-Desktop (ID: 658)
        "https://gltrak.com/aff_c2.php?offer_id=658&aff_id=10787&pid=60311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VivalProB-Desktop (ID: 658)
        "https://gltrak.com/aff_c2.php?offer_id=815&aff_id=10787&pid=54468&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-NeckSlim-desktop (ID: 815)
        "https://gltrak.com/aff_c2.php?offer_id=838&aff_id=10787&pid=57617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-CellulitePatch-Desktop (ID: 838)
        "https://gltrak.com/aff_c2.php?offer_id=838&aff_id=10787&pid=57621&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-CellulitePatch-Desktop (ID: 838)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=44860&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=61941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=1161&aff_id=10787&pid=73679&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-PinguLingo-Desktop (ID: 1161)
        "https://gltrak.com/aff_c2.php?offer_id=1161&aff_id=10787&pid=73680&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-PinguLingo-Desktop (ID: 1161)
        "https://gltrak.com/aff_c2.php?offer_id=1134&aff_id=10787&pid=73081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-TeslaSaverECO-Desktop (ID: 1134)
        "https://gltrak.com/aff_c2.php?offer_id=1134&aff_id=10787&pid=73204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-TeslaSaverECO-Desktop (ID: 1134)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=47508&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // EE-ViperVenomAktiv-Desktop (ID: 520)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1281&aff_id=10787&pid=87205&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-HerbaProstal-Desktop (ID: 1281)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=cs-CZ&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=883&aff_id=10787&pid=58510&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-MyCashProfessor-Desktop (ID: 883)
        "https://gltrak.com/aff_c2.php?offer_id=883&aff_id=10787&pid=62582&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-MyCashProfessor-Desktop (ID: 883)
        "https://gltrak.com/aff_c2.php?offer_id=883&aff_id=10787&pid=58955&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-MyCashProfessor-Desktop (ID: 883)
        "https://gltrak.com/aff_c2.php?offer_id=136&aff_id=10787&pid=33536&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-AntiAcneGel-Desktop (ID: 136)
        "https://gltrak.com/aff_c2.php?offer_id=433&aff_id=10787&pid=53072&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-StarSilkPro-Desktop (ID: 433)
        "https://gltrak.com/aff_c2.php?offer_id=433&aff_id=10787&pid=33542&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-StarSilkPro-Desktop (ID: 433)
        "https://gltrak.com/aff_c2.php?offer_id=433&aff_id=10787&pid=46545&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=deskto3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-StarSilkPro-Desktop (ID: 433)
        "https://gltrak.com/aff_c2.php?offer_id=655&aff_id=10787&pid=45474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VivalProB-Desktop (ID: 655)
        "https://gltrak.com/aff_c2.php?offer_id=655&aff_id=10787&pid=60313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VivalProB-Desktop (ID: 655)
        "https://gltrak.com/aff_c2.php?offer_id=655&aff_id=10787&pid=58962&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VivalProB-Desktop (ID: 655)
        "https://gltrak.com/aff_c2.php?offer_id=700&aff_id=10787&pid=42791&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-EyelashStar-Desktop (ID: 700)
        "https://gltrak.com/aff_c2.php?offer_id=700&aff_id=10787&pid=46623&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-EyelashStar-Desktop (ID: 700)
        "https://gltrak.com/aff_c2.php?offer_id=804&aff_id=10787&pid=54467&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-NeckSlim-desktop (ID: 804)
        "https://gltrak.com/aff_c2.php?offer_id=804&aff_id=10787&pid=60899&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-NeckSlim-desktop (ID: 804)
        "https://gltrak.com/aff_c2.php?offer_id=835&aff_id=10787&pid=57986&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-PushUpBreast-Desktop (ID: 835)
        "https://gltrak.com/aff_c2.php?offer_id=906&aff_id=10787&pid=59038&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-GreyAway-Desktop (ID: 906)
        "https://gltrak.com/aff_c2.php?offer_id=906&aff_id=10787&pid=59037&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-GreyAway-Desktop (ID: 906)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59528&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59466&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=44857&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58631&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=1262&aff_id=10787&pid=84170&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-LerneLingu-Desktop (ID: 1262)
        "https://gltrak.com/aff_c2.php?offer_id=1262&aff_id=10787&pid=84175&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-LerneLingu-Desktop (ID: 1262)
        "https://gltrak.com/aff_c2.php?offer_id=1242&aff_id=10787&pid=82259&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TurboEcoValve-Desktop (ID: 1242)
        "https://gltrak.com/aff_c2.php?offer_id=1242&aff_id=10787&pid=82264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TurboEcoValve-Desktop (ID: 1242)
        "https://gltrak.com/aff_c2.php?offer_id=1219&aff_id=10787&pid=78713&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-LaserSharpener-Desktop (ID: 1219)
        "https://gltrak.com/aff_c2.php?offer_id=1207&aff_id=10787&pid=77168&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-BabaVanga-Desktop (ID: 1207)
        "https://gltrak.com/aff_c2.php?offer_id=1207&aff_id=10787&pid=77184&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-BabaVanga-Desktop (ID: 1207)
        "https://gltrak.com/aff_c2.php?offer_id=1148&aff_id=10787&pid=73337&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-PinguLingo-Desktop (ID: 1148)
        "https://gltrak.com/aff_c2.php?offer_id=1148&aff_id=10787&pid=73356&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-PinguLingo-Desktop (ID: 1148)
        "https://gltrak.com/aff_c2.php?offer_id=1075&aff_id=10787&pid=66294&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Desktop (ID: 1075)
        "https://gltrak.com/aff_c2.php?offer_id=1075&aff_id=10787&pid=66341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Desktop (ID: 1075)
        "https://gltrak.com/aff_c2.php?offer_id=1039&aff_id=10787&pid=61888&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-EnergySaverECO-Desktop (ID: 1039)
        "https://gltrak.com/aff_c2.php?offer_id=1039&aff_id=10787&pid=61886&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-EnergySaverECO-Desktop (ID: 1039)
        "https://gltrak.com/aff_c2.php?offer_id=879&aff_id=10787&pid=58173&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Desktop (ID: 879)
        "https://gltrak.com/aff_c2.php?offer_id=879&aff_id=10787&pid=58778&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Desktop (ID: 879)
        "https://gltrak.com/aff_c2.php?offer_id=879&aff_id=10787&pid=58777&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Desktop (ID: 879)
        "https://gltrak.com/aff_c2.php?offer_id=879&aff_id=10787&pid=58345&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-SecretsOfAlphaMales-Desktop (ID: 879)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=46587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=backoffer&mbbr=1&pof=1&aof=1" // CZ-ViperVenomAktiv-Desktop (ID: 517)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=59846&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=1053&aff_id=10787&pid=62330&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-MyCashProfessor-Desktop (ID: 1053)
        "https://gltrak.com/aff_c2.php?offer_id=1053&aff_id=10787&pid=62307&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-MyCashProfessor-Desktop (ID: 1053)
        "https://gltrak.com/aff_c2.php?offer_id=409&aff_id=10787&pid=53070&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Desktop (ID: 409)
        "https://gltrak.com/aff_c2.php?offer_id=409&aff_id=10787&pid=45339&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Desktop (ID: 409)
//        "https://gltrak.com/aff_c2.php?offer_id=409&aff_id=10787&pid=46539&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Desktop (ID: 409)
        "https://gltrak.com/aff_c2.php?offer_id=652&aff_id=10787&pid=60312&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VivalProB-Desktop (ID: 652)
        "https://gltrak.com/aff_c2.php?offer_id=652&aff_id=10787&pid=45468&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VivalProB-Desktop (ID: 652)
        "https://gltrak.com/aff_c2.php?offer_id=697&aff_id=10787&pid=45513&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-EyelashStar-Desktop (ID: 697)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=22478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=1158&aff_id=10787&pid=73333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-PinguLingo-Desktop (ID: 1158)
        "https://gltrak.com/aff_c2.php?offer_id=1158&aff_id=10787&pid=73364&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-PinguLingo-Desktop (ID: 1158)
        "https://gltrak.com/aff_c2.php?offer_id=1128&aff_id=10787&pid=73086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-TeslaSaverECO-Desktop (ID: 1128)
        "https://gltrak.com/aff_c2.php?offer_id=1128&aff_id=10787&pid=73263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-TeslaSaverECO-Desktop (ID: 1128)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=46581&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1" // BG-ViperVenomAktiv-Desktop (ID: 514)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1278&aff_id=10787&pid=86632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-BabaVanga-Desktop (ID: 1278)
        "https://gltrak.com/aff_c2.php?offer_id=1278&aff_id=10787&pid=86673&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-BabaVanga-Desktop (ID: 1278)
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=44854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-ViperVenomAktiv-Desktop (ID: 511)
        "https://gltrak.com/aff_c2.php?offer_id=1055&aff_id=10787&pid=62323&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-MyCashProfessor-Desktop (ID: 1055)
        "https://gltrak.com/aff_c2.php?offer_id=1055&aff_id=10787&pid=62309&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-MyCashProfessor-Desktop (ID: 1055)
        "https://gltrak.com/aff_c2.php?offer_id=403&aff_id=10787&pid=53071&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Desktop (ID: 403)
//        "https://gltrak.com/aff_c2.php?offer_id=403&aff_id=10787&pid=45342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Desktop (ID: 403)
//        "https://gltrak.com/aff_c2.php?offer_id=403&aff_id=10787&pid=46542&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Desktop (ID: 403)
        "https://gltrak.com/aff_c2.php?offer_id=403&aff_id=10787&pid=86474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Desktop (ID: 403)
        "https://gltrak.com/aff_c2.php?offer_id=649&aff_id=10787&pid=45471&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-VivalProB-Desktop (ID: 649)
        "https://gltrak.com/aff_c2.php?offer_id=649&aff_id=10787&pid=47862&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-VivalProB-Desktop (ID: 649)
        "https://gltrak.com/aff_c2.php?offer_id=794&aff_id=10787&pid=54466&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1",  // BA-NeckSlim-desktop (ID: 794)
        "https://gltrak.com/aff_c2.php?offer_id=880&aff_id=10787&pid=58244&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", //BA-PushUpBreast-Desktop (ID: 880)
        "https://gltrak.com/aff_c2.php?offer_id=880&aff_id=10787&pid=61936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", //BA-PushUpBreast-Desktop (ID: 880)
        "https://gltrak.com/aff_c2.php?offer_id=1256&aff_id=10787&pid=82960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-LerneLingu-Desktop (ID: 1256)
        "https://gltrak.com/aff_c2.php?offer_id=1256&aff_id=10787&pid=82970&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-LerneLingu-Desktop (ID: 1256)
        "https://gltrak.com/aff_c2.php?offer_id=1193&aff_id=10787&pid=76979&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-PinguLingo-Desktop (ID: 1193)
        "https://gltrak.com/aff_c2.php?offer_id=1193&aff_id=10787&pid=77016&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-PinguLingo-Desktop (ID: 1193)
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=44854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1" // BA-ViperVenomAktiv-Desktop (ID: 511)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://norgedating.com/?lc=no&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://sublimedates.com/?lc=no&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=da-DK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=en-GB&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=en-GB&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=es-ES&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=fr-FR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=nl-NL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=pt-PT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://gltrak.com/aff_c2.php?offer_id=1217&aff_id=10787&pid=77939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-PinguLingo-Desktop (ID: 1217)
        "https://gltrak.com/aff_c2.php?offer_id=1217&aff_id=10787&pid=77872&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-PinguLingo-Desktop (ID: 1217)
        "https://gltrak.com/aff_c2.php?offer_id=1215&aff_id=10787&pid=77890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-BabaVanga-Desktop (ID: 1215)
        "https://gltrak.com/aff_c2.php?offer_id=1215&aff_id=10787&pid=77875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-BabaVanga-Desktop (ID: 1215)
        "https://gltrak.com/aff_c2.php?offer_id=1213&aff_id=10787&pid=77889&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-TeslaSaverECO-Desktop (ID: 1213)
        "https://gltrak.com/aff_c2.php?offer_id=1213&aff_id=10787&pid=77877&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PT-TeslaSaverECO-Desktop (ID: 1213)
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=fi-FI&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=sv-SE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=tr-TR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=ru-RU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://dating-soulmates.com/?lc=th-TH&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JP" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?lc=ja-JP&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to backoffers after geo target
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes backoffer
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General backoffer
        "https://sublimedates.com/?subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>