<?php
include "/var/www/sublimerevenue.com/API/config.php";

//get aff id from popunder
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
// geo target first with geo direct offer popunders or simply popunders if offers are good for this geo
if ( $country == "MA" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56631&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=57937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56637&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56634&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // MA-TrueDefender-Mobile (ID: 991)
        "https://gltrak.com/aff_c2.php?offer_id=991&aff_id=10787&pid=56640&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1" // MA-TrueDefender-Mobile (ID: 991)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60652&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60653&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60646&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60647&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // CY-TrueDefender-Mobile (ID: 1115)
        "https://gltrak.com/aff_c2.php?offer_id=1115&aff_id=10787&pid=60648&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1" // CY-TrueDefender-Mobile (ID: 1115)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=54372&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=82811&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=55571&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=55348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=55067&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // RS-UltraSaver-Mobile (ID: 749)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=60168&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=60470&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=60990&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=65892&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://gltrak.com/aff_c2.php?offer_id=745&aff_id=10787&pid=66814&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // RS-WallieGet-Mobile (ID: 745)
        "https://1d5e040e4b3.traffic-c.com/?wid=13268&wid_hmac=60ba9b0691282c5039a149cec59c7005&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13268 - RS-3G/Wifi-ViberDownload
        "https://gltrak.com/aff_c2.php?offer_id=749&aff_id=10787&pid=51990&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=popunder&mbbr=1&pof=1&aof=1" // RS-UltraSaver-Mobile (ID: 749)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=766&aff_id=10787&pid=62272&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // HR-UltraSaver-Mobile (ID: 766)
        "https://gltrak.com/aff_c2.php?offer_id=766&aff_id=10787&pid=51987&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // HR-UltraSaver-Mobile (ID: 766)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=62033&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=65142&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=65652&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=65890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=764&aff_id=10787&pid=66812&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // HR-WallieGet-Mobile (ID: 764)
        "https://gltrak.com/aff_c2.php?offer_id=766&aff_id=10787&pid=60374&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1" // HR-UltraSaver-Mobile (ID: 766)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=771&aff_id=10787&pid=51988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // HU-UltraSaver-Mobile (ID: 771)
        "https://gltrak.com/aff_c2.php?offer_id=769&aff_id=10787&pid=62034&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // HU-WallieGet-Mobile (ID: 769)
        "https://gltrak.com/aff_c2.php?offer_id=769&aff_id=10787&pid=65423&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // HU-WallieGet-Mobile (ID: 769)
        "https://gltrak.com/aff_c2.php?offer_id=769&aff_id=10787&pid=65424&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // HU-WallieGet-Mobile (ID: 769)
        "https://1d5e040e4b3.traffic-c.com/?wid=13787&wid_hmac=df5636e51594bc1a58ba0bb96401fc75&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13787 - HU-3G/Wifi-Download
        "https://gltrak.com/aff_c2.php?offer_id=771&aff_id=10787&pid=51982&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // HU-UltraSaver-Mobile (ID: 771)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65552&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65550&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65553&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // LT-WallieGet-Mobile (ID: 1110)
        "https://gltrak.com/aff_c2.php?offer_id=1110&aff_id=10787&pid=65493&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1" // LT-WallieGet-Mobile (ID: 1110)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities 
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67156&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67155&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67157&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67158&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // LV-WallieGet-Mobile (ID: 1111)
        "https://gltrak.com/aff_c2.php?offer_id=1111&aff_id=10787&pid=67150&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1" // LV-WallieGet-Mobile (ID: 1111)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HN" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12715&wid_hmac=a6db41fbf54e542f4ccd9a2c9429a247&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12715 - HN-Tigo/Wifi-Dwnl Green
        "https://1d5e040e4b3.traffic-c.com/?wid=12748&wid_hmac=00ec5a740d8392ef3880967d3bc667bd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12748 - HN-Claro-Love
        "https://1d5e040e4b3.traffic-c.com/?wid=12452&wid_hmac=46c03b8c8cb8ee1a2ce3677b66f53e96&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12452 - HN-Tigo/Wifi-Download  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13449&wid_hmac=53af2bf75e07b63c3d696be7c69ddc0e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13449 - GR-Antivirus
        "https://1d5e040e4b3.traffic-c.com/?wid=13448&wid_hmac=e55b184795d372ee5f94ba6b1b2b597c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13448 - GR-Whatsapp
        "https://1d5e051ad93.traffic-c.com/?wid=13257&wid_hmac=bb75a52d9c0d5f8a36d8fa8f75040e4f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13257 - GR-3g/WiFi-Antivirus  EXCLUSIVE
        "https://1d5e040e4b3.traffic-c.com/?wid=13348&wid_hmac=dc1a5f1c8168082c9a416cdbb1c62437&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13348 - GR-3G/Wifi-AntiVirus
        "https://1d5e040e4b3.traffic-c.com/?wid=12887&wid_hmac=35a88489c5766e128d6bd83b7a5da013&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12887 - GR-3G/Wifi-whatsapp  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13519&wid_hmac=559b7b9a0d801f04f6c116d141cd986e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13519 - ZA-CellC-Antivirus
        "https://1d5e040e4b3.traffic-c.com/?wid=13426&wid_hmac=2ce4b4db1cc204244322e5a0f6b06416&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13426 - ZA-CellC-Downloads
        "https://1d5e040e4b3.traffic-c.com/?wid=12633&wid_hmac=5f0e4f4100eab33914be797cda765af4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12633 - ZA-CellC-ValuePack
        "https://1d5e040e4b3.traffic-c.com/?wid=12717&wid_hmac=1090cb5b2a7c3d25832dc245fa81aabe&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12717 - ZA-3G-2app  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12959&wid_hmac=05421a685932027aaf7f8ed05e53555f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12959 - CH-3G/WiFi-Antivirus
        "https://1d5e040e4b3.traffic-c.com/?wid=13837&wid_hmac=30738168b4dd827a693a71a1a3dd4e99&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13837 - CH-Swisscom/Salt-Download 
        "https://1d5e040e4b3.traffic-c.com/?wid=12564&wid_hmac=5632c6ae268b1defe272d58ea2c9084b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12564 - CH-Salt-2app  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13868&wid_hmac=f6fdef3d0212a8063dc78252e8445637&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13868 - KZ-3g/wifi-FileDownload(aggresivePrelander)
        "https://1d5e040e4b3.traffic-c.com/?wid=13869&wid_hmac=eff40a6e778c3a766ce8cd65b33ef2a5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13869 - KZ-3g/wifi-ClickFileDownload
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13807&wid_hmac=2cad45dd1c7808cedc00ae5a62034400&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13807 - RU-Tele2-Download 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12782&wid_hmac=a330584e6f5877fc740b6bc9250a4d54&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12782 - GT-Claro-Descarga
        "https://1d5e040e4b3.traffic-c.com/?wid=13508&wid_hmac=dd41d11db52f85529de1504e5d259c24&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13508 - GT-Claro-Common
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13343&wid_hmac=b615ed879df1d61b0df625249e7edc45&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13343 - DZ-3G/Wifi-SpicyAutoDL-Main
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12754&wid_hmac=48372ecafc03df83f8ef1f62185727f6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12754 - CR-Claro-Prediccion
        "https://1d5e040e4b3.traffic-c.com/?wid=13054&wid_hmac=3053698c8cea71149b6dadca48c757b3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13054 - CR-Claro-Horoscopo
        "https://1d5e040e4b3.traffic-c.com/?wid=12753&wid_hmac=58e2534d475a63c4625863d533b27cab&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12753 - CR-Claro-Love
        "https://1d5e040e4b3.traffic-c.com/?wid=13250&wid_hmac=7a008dee167674da9afa89f07604bb45&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13250 - CR-ICE-Todoclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13247&wid_hmac=16ba80bcbf0a50c23153ab8fe9440167&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13247 - PR-Claro-Todoclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13239&wid_hmac=4a48bd82cb99c2648d14f6b71be1cd29&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13239 - PA-Claro-Todoclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KE" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=10182&wid_hmac=c504a04f269145bb31003a05ae08e2b8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10182 - KE-Safaricom-Download
        "https://1d5e051ad93.traffic-c.com/?wid=13933&wid_hmac=7988bf17a2887441da08ecf594bf5c1e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13933 - KE-Safaricom-Antivirus  
        "https://1d5e040e4b3.traffic-c.com/?wid=13208&wid_hmac=e9655c1b8628ae3b8ff46e7b4f73fa0e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13208 - KE-Safaricom-SuperBattery
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13142&wid_hmac=f073c68b208ae251d7847a6adaf23147&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13142 - PE-Claro/Wifi-Lovematch
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13066&wid_hmac=8d96914432d4488221b29e3fe7b3e346&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13066 - AZ-3G-Batterysaver
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12396&wid_hmac=2208e444c6edfb93f2b6db82aec9c9de&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12396 - BR-TIM-Maquiagem
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CM" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e051ad93.traffic-c.com/?wid=13875&wid_hmac=dfb7bbc92961cc4d119478020e39c559&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13875 - CM-Orange-DownloadManager
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to popunders after geo target
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities popunder
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream popunder
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
//geo target first with geo direct offer popunders or simply popunders if offers are good for this geo
if ( $country == "HN" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12748&wid_hmac=00ec5a740d8392ef3880967d3bc667bd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12748 - HN-Claro-Love
        "https://1d5e040e4b3.traffic-c.com/?wid=12715&wid_hmac=a6db41fbf54e542f4ccd9a2c9429a247&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12715 - HN-Tigo/Wifi-Dwnl Green
        "https://1d5e040e4b3.traffic-c.com/?wid=12452&wid_hmac=46c03b8c8cb8ee1a2ce3677b66f53e96&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12452 - HN-Tigo/Wifi-Download  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13449&wid_hmac=53af2bf75e07b63c3d696be7c69ddc0e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13449 - GR-Antivirus
        "https://1d5e040e4b3.traffic-c.com/?wid=13448&wid_hmac=e55b184795d372ee5f94ba6b1b2b597c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13448 - GR-Whatsapp
        "https://1d5e040e4b3.traffic-c.com/?wid=12887&wid_hmac=35a88489c5766e128d6bd83b7a5da013&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12887 - GR-3G/Wifi-whatsapp  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13868&wid_hmac=f6fdef3d0212a8063dc78252e8445637&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13868 - KZ-3g/wifi-FileDownload(aggresivePrelander)
        "https://1d5e040e4b3.traffic-c.com/?wid=13869&wid_hmac=eff40a6e778c3a766ce8cd65b33ef2a5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13869 - KZ-3g/wifi-ClickFileDownload
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12959&wid_hmac=05421a685932027aaf7f8ed05e53555f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12959 - CH-3G/WiFi-Antivirus
        "https://1d5e040e4b3.traffic-c.com/?wid=13837&wid_hmac=30738168b4dd827a693a71a1a3dd4e99&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // 13837 - CH-Swisscom/Salt-Download
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13807&wid_hmac=2cad45dd1c7808cedc00ae5a62034400&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13807 - RU-Tele2-Download 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13787&wid_hmac=df5636e51594bc1a58ba0bb96401fc75&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13787 - HU-3G/Wifi-Download
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13426&wid_hmac=2ce4b4db1cc204244322e5a0f6b06416&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13426 - ZA-CellC-Downloads
        "https://1d5e040e4b3.traffic-c.com/?wid=12633&wid_hmac=5f0e4f4100eab33914be797cda765af4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12633 - ZA-CellC-ValuePack
        "https://1d5e040e4b3.traffic-c.com/?wid=13519&wid_hmac=559b7b9a0d801f04f6c116d141cd986e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13519 - ZA-CellC-Antivirus
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12782&wid_hmac=a330584e6f5877fc740b6bc9250a4d54&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12782 - GT-Claro-Descarga
        "https://1d5e040e4b3.traffic-c.com/?wid=13508&wid_hmac=dd41d11db52f85529de1504e5d259c24&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13508 - GT-Claro-Common
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13343&wid_hmac=b615ed879df1d61b0df625249e7edc45&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13343 - DZ-3G/Wifi-SpicyAutoDL-Main
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13054&wid_hmac=3053698c8cea71149b6dadca48c757b3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13054 - CR-Claro-Horoscopo
        "https://1d5e040e4b3.traffic-c.com/?wid=12754&wid_hmac=48372ecafc03df83f8ef1f62185727f6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12754 - CR-Claro-Prediccion
        "https://1d5e040e4b3.traffic-c.com/?wid=12753&wid_hmac=58e2534d475a63c4625863d533b27cab&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12753 - CR-Claro-Love
        "https://1d5e040e4b3.traffic-c.com/?wid=13250&wid_hmac=7a008dee167674da9afa89f07604bb45&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13250 - CR-ICE-Todoclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13247&wid_hmac=16ba80bcbf0a50c23153ab8fe9440167&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13247 - PR-Claro-Todoclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13239&wid_hmac=4a48bd82cb99c2648d14f6b71be1cd29&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13239 - PA-Claro-Todoclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KE" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13208&wid_hmac=e9655c1b8628ae3b8ff46e7b4f73fa0e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13208 - KE-Safaricom-SuperBattery
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13142&wid_hmac=f073c68b208ae251d7847a6adaf23147&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13142 - PE-Claro/Wifi-Lovematch
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=13066&wid_hmac=8d96914432d4488221b29e3fe7b3e346&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13066 - AZ-3G-Batterysaver
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e040e4b3.traffic-c.com/?wid=12396&wid_hmac=2208e444c6edfb93f2b6db82aec9c9de&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12396 - BR-TIM-Maquiagem
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CM" ) { 
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities
        "https://1d5e051ad93.traffic-c.com/?wid=13875&wid_hmac=dfb7bbc92961cc4d119478020e39c559&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13875 - CM-Orange-DownloadManager
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to popunders after geo target
    $urls = array(
        "http://ck.gl2021.info/52705?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Utilities popunder
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream popunder
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>
