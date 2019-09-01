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
if ( $country == "RO" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=58181&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=58978&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=58924&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=57514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=56343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1016&aff_id=10787&pid=57982&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=82498&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=81829&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=81202&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=70135&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=74174&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=746&aff_id=10787&pid=70131&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=51663&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=82985&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=82340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=82340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=71345&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=762&aff_id=10787&pid=71283&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5dfa9d4d3.traffic-c.com/?wid=12649&wid_hmac=4a6a1276b531dec4df4ebda14da02c2b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 12649 - HU-3G/WIFI-HotvidEXCLUSIVE
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=81485&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=84037&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=51659&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=72187&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=74004&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://1d5e0bf8a93.traffic-c.com/?wid=12649&wid_hmac=4a6a1276b531dec4df4ebda14da02c2b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12649 - HU-3G/WIFI-Hotvid  EXCLUSIVE
        "https://gltrak.com/aff_c2.php?offer_id=767&aff_id=10787&pid=71346&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=81836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=81836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=64691&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=81919&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=56344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1017&aff_id=10787&pid=71320&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=82263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=83621&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=83469&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=71321&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=73050&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=744&aff_id=10787&pid=71941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=60449&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=60450&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=62647&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // hottiecell
        "https://gltrak.com/aff_c2.php?offer_id=1114&aff_id=10787&pid=60440&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // hottiecell
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13191&wid_hmac=7a51410579f4ed505e93a9aa79f6ffb2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13191 - PL-T-Mobile-Mobisex
        "https://1d5e0bf8a93.traffic-c.com/?wid=12962&wid_hmac=ebca7e68fc5df5524a80710890c84822&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12962 - PL-Tmobile-VIP  VIP EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=13890&wid_hmac=83779b4bdf0f2d45862b78e5d52eebf3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13890 - PL-3G/Wifi-PornHub
        "https://1d5e0bf8a93.traffic-c.com/?wid=13889&wid_hmac=74a8e1129ad6be2d77f8dd852ad8ae79&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13889 - PL-3G/Wifi-Adult
        "https://1d5e0bf8a93.traffic-c.com/?wid=11232&wid_hmac=d467fd90cd55e0d1b7fde7068880acbb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11232 - PL-Plus-Adult-Funskan  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13287&wid_hmac=6dada41ec393969bee72f0ec527a7394&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13287 - IT-TIM-Pleasure4you
        "https://1d5e0bf8a93.traffic-c.com/?wid=13520&wid_hmac=b927c5c1d609f76fd6524f9391952b3c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13520 - IT-TIM-ModelleGlamour
        "https://1d5e0bf8a93.traffic-c.com/?wid=13502&wid_hmac=efae840bce79af644d74e9d1ce0804f6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13502 - IT-3G/WIFI-Vking (Prelander)
        "https://1d5e0bf8a93.traffic-c.com/?wid=13546&wid_hmac=7dae990c82f6e0d3cd23ec0dfc402252&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13546 - IT-WIND-MagicJellyAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13758&wid_hmac=cb4e849ec1bd50383dca300689635042&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13758 - IT-WIND-DailyNewsAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=14006&wid_hmac=1586d33b4f2aa87be10ffa83095263c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 14006 - IT-TIM-SexyBella
        "https://1d5e0bf8a93.traffic-c.com/?wid=13991&wid_hmac=3171d8dd65bbebaf6cb0bb887cc438f5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13991 - IT-WIND-Sexy4you
        "https://1d5e0bf8a93.traffic-c.com/?wid=13743&wid_hmac=1c32f43f80d85a2640147b49dc596a1f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13743 - IT-WIND-TerreNoDigiochiAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13192&wid_hmac=b5d2539967fbf8562895ca2a51aef148&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13192 - IT-H3G-Censored
        "https://1d5e0bf8a93.traffic-c.com/?wid=13085&wid_hmac=312ea60443dad0be5e775fa1fb1a53be&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13085 - IT-WIND-VideoMagicflow-adult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13071&wid_hmac=7414840227fb1422129f3bef9b3df98f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13071 - IT-H3G-SexyBellezze
        "https://1d5e0bf8a93.traffic-c.com/?wid=13058&wid_hmac=269e7378a17e531ad1722fa745301e4d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13058 - IT-TIM-IwantYou
        "https://1d5e0bf8a93.traffic-c.com/?wid=12300&wid_hmac=764c777d26219b0b013021d6ae9b7ef0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12300 - IT-Vodafone-Android-VIP  VIP EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13838&wid_hmac=884acc4f39c19157728a0c7a6f98d646&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13838 - Chile-Entel-Android-VIP  VIP
        "https://1d5e0bf8a93.traffic-c.com/?wid=13156&wid_hmac=50496f8848ad7c6f891625dd0cb292dd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13156 - CL-Movistar-Android-VIP 2  VIP
        "https://1d5e0bf8a93.traffic-c.com/?wid=13902&wid_hmac=c420ba7bf374fc6f43e243bcbd7dfcde&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13902 - CL-Entel-NightClub
        "https://1d5e0bf8a93.traffic-c.com/?wid=13905&wid_hmac=6ad6ce6d8766df51bb977a41eccc11fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13905 - CL-Entel-Android-VIP 2  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13543&wid_hmac=78eed5f066f7fea5a4a6d39a4e148f74&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13543 - DE-Vodafone-VOD
        "https://1d5e0bf8a93.traffic-c.com/?wid=13542&wid_hmac=693876d44f55dd2b0e215c171721a972&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13542 - DE-Vodafone-Erotic
        "https://1d5e0bf8a93.traffic-c.com/?wid=13541&wid_hmac=1485a893c7294ec0cbf54fdd8394e3b9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13541 - DE-Vodafone-Playboy
        "https://1d5e0bf8a93.traffic-c.com/?wid=13184&wid_hmac=2a7c3eac799c736229f449590468ceb9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13184 - DE-Vodafone-Hotxl  EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=13990&wid_hmac=f7782aba8e9aa389cf05001255b63f83&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13990 - DE-3G-LesbianPorn
        "https://1d5e0bf8a93.traffic-c.com/?wid=13544&wid_hmac=7831bc6bb01e2ace3b5d6a57d731b0cc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13544 - DE-Vodafone-Android-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12497&wid_hmac=aa18a271f4992102d16a72b750d04bc2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12497 - IE-3G/WIFI-HotXL (Click2SMS)  EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=12496&wid_hmac=878eb4e9a49abbb15d722f7fbc1d84b4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12496 - IE-3G/WIFI-HotXL (MSISDN)  EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=11785&wid_hmac=ec5e9712d495bd12c2c76e86533313fe&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11785 - IE-Three-AppMob
        "https://1d5e0bf8a93.traffic-c.com/?wid=12299&wid_hmac=862a179d40888f4451f8258d881970eb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12299 - IE-Three-Android-VIP 2  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=11792&wid_hmac=7e5ee56ed37d813d4685fa869e0768d0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11792 - CR-Claro-Extremo Club  
        "https://1d5e0bf8a93.traffic-c.com/?wid=13223&wid_hmac=ddaada5c71d572a4f2e247e0399c4030&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13223 - CR-Claro-Sexyclub
        "https://1d5e0bf8a93.traffic-c.com/?wid=12191&wid_hmac=efa9dd107aaf7c007589c26dcd8db8fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12191 - CR-Claro-Android-VIP 1  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HN" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12910&wid_hmac=048e62dc8efcfe68409baa1395591dd4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12910 - HN-Tigo/Wifi-Loader
        "https://1d5e0bf8a93.traffic-c.com/?wid=12883&wid_hmac=a3dd2b9ae6c9bfd77c6324bf60a1fa9f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12883 - HN-Tigo/Wifi-Azul
        "https://1d5e0bf8a93.traffic-c.com/?wid=12276&wid_hmac=56e714006ae53286dfea7959b56c0a55&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12276 - HN-Claro-Sexy
        "https://1d5e0bf8a93.traffic-c.com/?wid=13593&wid_hmac=fe2b99816fc6005dbe0a461b1c665bc9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13593 - HN-Tigo-Enamoradas
        "https://1d5e0bf8a93.traffic-c.com/?wid=11995&wid_hmac=a1c751b41659a16b93b5c37c49f8ce2b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11995 - HN-Claro-Android-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LK" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13372&wid_hmac=319991f628e90b2be65a6068463d00f0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13372 - LK-Mobitel-ContentAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13601&wid_hmac=90e609b7a5a040a46ecff8c040001451&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13601 - LK-Mobitel-Video (Adult)
        "https://1d5e0bf8a93.traffic-c.com/?wid=11964&wid_hmac=b97a9c2c85658d45f428482b3951ff40&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11964 - LK-Mobitel-Android-Adult-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=10937&wid_hmac=63ff3be27e7ec8fd6461cd0c08cd754a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 10937 - IN-Tata-Android-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13115&wid_hmac=30694d57f5e66c6ed18d5e94d674dccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13115 - CH-3G/WiFi-GirlsClub
        "https://1d5e0bf8a93.traffic-c.com/?wid=12957&wid_hmac=84dce72bffdd88e5050efbc37d158449&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12957 - CH-3G/WiFi-Pornhubs
        "https://1d5e0bf8a93.traffic-c.com/?wid=13533&wid_hmac=05ca7c68b638a638e4063e169aeacb97&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13533 - CH-3G/Wifi-FlashContact
        "https://1d5e0bf8a93.traffic-c.com/?wid=12566&wid_hmac=b45715084913e2dbc25861952f879948&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12566 - CH-Salt-XL69  EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=12846&wid_hmac=505c04e938e1b3c0506511a2c7598db7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12846 - CH-Salt-XS1  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=11922&wid_hmac=29a75da98eae1a4a21fe41de6b5762f3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11922 - AT-H3G-SX69  EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=12843&wid_hmac=9605ef5f8377c6cbf439989fd6ae3047&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12843 - AT-H3G-Xtub  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12317&wid_hmac=696c30c7b8f76f2c0ef322d90fc4a6c2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12317 - GR-Vodafone-Amateur
        "https://1d5e0bf8a93.traffic-c.com/?wid=12235&wid_hmac=089d84af9ef97e85508b27facb5b5c03&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12235 - GR-Vodafone-Sex Deluxe
        "https://1d5e0bf8a93.traffic-c.com/?wid=14005&wid_hmac=24ba8e8fcc5f991eeb9b7241b8d602bf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 14005 - GR-3G-ViberAdult  
        "https://1d5e0bf8a93.traffic-c.com/?wid=12789&wid_hmac=ad0b7937f048055520702d903f5d0dcb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12789 - GR-3G-HotXL  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13965&wid_hmac=31733e94806f40c3ab11a276aaa8360a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13965 - MX-Movistar-Hotline
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13948&wid_hmac=30638e15544b57f4a8cbe087ffa793e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13948 - UK-Vodafone-XtremeFilth
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13942&wid_hmac=98aecb928155ca7f7decd08e0b37f940&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13942 - TH-Truemove-AdultClub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12319&wid_hmac=c629f677935fc5a2409e75ce6e48f7f4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12319 - PT-Vodafone-Euroteens
        "https://1d5e0bf8a93.traffic-c.com/?wid=12236&wid_hmac=2c8f407977330502876262518364527a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12236 - PT-Vodafone-Metart
        "https://1d5e0bf8a93.traffic-c.com/?wid=13756&wid_hmac=bb606c4ac43a9e268a179b3df1d5c5ec&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13756 - PT-Vodafone-Sexy TV
        "https://1d5e0bf8a93.traffic-c.com/?wid=13755&wid_hmac=e21383b134a98ad3b23c16b37f6a471e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13755 - PT-Vodafone-VIP Club
        "https://1d5e0bf8a93.traffic-c.com/?wid=13754&wid_hmac=5d247aef0d8120de04201212b536cc56&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13754 - PT-Vodafone-2for1
        "https://1d5e0bf8a93.traffic-c.com/?wid=13753&wid_hmac=42cea7564cee6c1119f1ff4ca02b55f7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13753 - PT-Vodafone-FlirtGo
        "https://1d5e0bf8a93.traffic-c.com/?wid=13766&wid_hmac=0b38d1cf1c61f27e689683f581d15f7b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13766 - PT-Vodafone-XXX club
        "https://1d5e0bf8a93.traffic-c.com/?wid=13881&wid_hmac=43f0f1a60ad94dfc17bb061900b954db&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13881 - PT-MEO-Boazonatube
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13761&wid_hmac=51ae01f80adf285dde21a50e22b92f10&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13761 - BR-TIM-Sexy Portal
        "https://1d5e0bf8a93.traffic-c.com/?wid=13826&wid_hmac=7025afd14a3098b1cfb1eb4402c969c5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13826 - BR-TIM-Adultos
        "https://1d5e0bf8a93.traffic-c.com/?wid=13870&wid_hmac=0196883c563f651fe2bb4bb355381ef2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13870 - BR-TIM-Adultos
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13655&wid_hmac=0dfc8fdb7d0d7009be2ed795a20b224d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13655 - NO-3G/Wifi-Nude 1
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SV" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13605&wid_hmac=e82cd60d6f40592efe360d3867d9942f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13605 - SV-3G-Mundia
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12188&wid_hmac=7ba9d0db98b89f2fb60b0fd93dcb854a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12188 - ES-Movistar-PornoGafas
        "https://1d5e0bf8a93.traffic-c.com/?wid=13599&wid_hmac=498b417e0fc2aacca7a84365d41c688d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13599 - ES-Movistar-IntimaX
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SN" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13596&wid_hmac=257cb8ad149ba8a6c02ca3cbcdc275c1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13596 - SN-3G-SpicyDL
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13576&wid_hmac=c2cdb77c5bd243971285e60829b3f77a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13576 - AR-Movistar-Adult
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13175&wid_hmac=feaf8f960d288c24be2c1af2abbff856&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13175 - ZA-Vodacom-VipClub
        "https://1d5e0bf8a93.traffic-c.com/?wid=13174&wid_hmac=0cd8cd7e15eaecf1b0d162f8f3d9046f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13174 - ZA-Vodacom-FlirtGo/LiveWebcams
        "https://1d5e0bf8a93.traffic-c.com/?wid=13090&wid_hmac=2136390016894378ee7c7d64cebfd58c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13090 - ZA-CellC-HotGirls
        "https://1d5e0bf8a93.traffic-c.com/?wid=13033&wid_hmac=8c8eadf6768ed01c26b4ee0d78b5628e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13033 - ZA-MTN/Vodacom-XtremeGogo
        "https://1d5e0bf8a93.traffic-c.com/?wid=13436&wid_hmac=f7a113db453d718946019b215ffdecdf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13436 - ZA-MTN-Hotties18+
        "https://1d5e0bf8a93.traffic-c.com/?wid=13377&wid_hmac=ec74c28787705304e8f45f7049d37618&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13377 - ZA-CellC-SpicyBabes
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GH" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12630&wid_hmac=a57d8cd2c6424d665b9c7f39073cd041&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12630 - GH-3G-LeakedChatroom18+
        "https://1d5e0bf8a93.traffic-c.com/?wid=12309&wid_hmac=b8d509a3a09bbddf70f1917d4d912109&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12309 - GH-Vodafone/MTN-Mobilove
        "https://1d5e0bf8a93.traffic-c.com/?wid=13368&wid_hmac=703c274d102e5f02fcfd1d2625457273&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13368 - GH-3G-Leaked Chatroom 18+ Videos
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13342&wid_hmac=904786e8f1edabbc2d05c5ad3e35b415&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13342 - DZ-3G/Wifi-SpicyAutoDL
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13182&wid_hmac=f7620e114087ca70d03f9eeb1cad10d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13182 - GT-Claro-Adult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13252&wid_hmac=ba63247537a32e193419dfa97cba61f8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13252 - GT-Claro-Sexyclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13246&wid_hmac=8af6298df82054ff98320b3c4165e4c8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13246 - PR-Claro-Sexyclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13245&wid_hmac=82b458c902d4e3bac3b0803cc67e3674&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13245 - CO-Claro-Sexy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13211&wid_hmac=d0b12e9448973bb5c161b3c50484e035&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13211 - HT-Digicell-Movilx
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12996&wid_hmac=412f39fe10fb7e60828233e0d8ba0970&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12996 - BY-Life-Adultvideo
        "https://1d5e0bf8a93.traffic-c.com/?wid=12927&wid_hmac=c70cdad2d62d462a253966475e4f8585&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12927 - BY-Velcom-Adultvideo
        "https://1d5e0bf8a93.traffic-c.com/?wid=13190&wid_hmac=71b4dfff07bebf120b608322aebb6ae2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13190 - BY-MTS-Adultvideo
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13180&wid_hmac=ef438a0aa1b9f38cc875131fb577c54b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13180 - PA-Claro-Adult
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SU" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12665&wid_hmac=ce218c3dfa78cc37087fb4201b76bf11&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12665 - SU-Digicel-ClubMovil
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NI" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=11399&wid_hmac=d1c89710ad791fd82e50f99da56f76ca&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11399 - NI-Claro-Extremo Club
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
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
    $_SESSION['country'] = $country; 
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
if ( $country == "PL" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13191&wid_hmac=7a51410579f4ed505e93a9aa79f6ffb2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13191 - PL-T-Mobile-Mobisex
        "https://1d5e0bf8a93.traffic-c.com/?wid=12962&wid_hmac=ebca7e68fc5df5524a80710890c84822&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12962 - PL-Tmobile-VIP  VIP EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=13890&wid_hmac=83779b4bdf0f2d45862b78e5d52eebf3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13890 - PL-3G/Wifi-PornHub
        "https://1d5e0bf8a93.traffic-c.com/?wid=13889&wid_hmac=74a8e1129ad6be2d77f8dd852ad8ae79&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13889 - PL-3G/Wifi-Adult
        "https://1d5e0bf8a93.traffic-c.com/?wid=11232&wid_hmac=d467fd90cd55e0d1b7fde7068880acbb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11232 - PL-Plus-Adult-Funskan  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13287&wid_hmac=6dada41ec393969bee72f0ec527a7394&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13287 - IT-TIM-Pleasure4you
        "https://1d5e0bf8a93.traffic-c.com/?wid=13520&wid_hmac=b927c5c1d609f76fd6524f9391952b3c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13520 - IT-TIM-ModelleGlamour
        "https://1d5e0bf8a93.traffic-c.com/?wid=13502&wid_hmac=efae840bce79af644d74e9d1ce0804f6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13502 - IT-3G/WIFI-Vking (Prelander)
        "https://1d5e0bf8a93.traffic-c.com/?wid=13546&wid_hmac=7dae990c82f6e0d3cd23ec0dfc402252&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13546 - IT-WIND-MagicJellyAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13758&wid_hmac=cb4e849ec1bd50383dca300689635042&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13758 - IT-WIND-DailyNewsAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=14006&wid_hmac=1586d33b4f2aa87be10ffa83095263c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 14006 - IT-TIM-SexyBella
        "https://1d5e0bf8a93.traffic-c.com/?wid=13991&wid_hmac=3171d8dd65bbebaf6cb0bb887cc438f5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13991 - IT-WIND-Sexy4you
        "https://1d5e0bf8a93.traffic-c.com/?wid=13743&wid_hmac=1c32f43f80d85a2640147b49dc596a1f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13743 - IT-WIND-TerreNoDigiochiAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13192&wid_hmac=b5d2539967fbf8562895ca2a51aef148&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13192 - IT-H3G-Censored
        "https://1d5e0bf8a93.traffic-c.com/?wid=13085&wid_hmac=312ea60443dad0be5e775fa1fb1a53be&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13085 - IT-WIND-VideoMagicflow-adult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13071&wid_hmac=7414840227fb1422129f3bef9b3df98f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13071 - IT-H3G-SexyBellezze
        "https://1d5e0bf8a93.traffic-c.com/?wid=13058&wid_hmac=269e7378a17e531ad1722fa745301e4d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13058 - IT-TIM-IwantYou
        "https://1d5e0bf8a93.traffic-c.com/?wid=12300&wid_hmac=764c777d26219b0b013021d6ae9b7ef0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12300 - IT-Vodafone-Android-VIP  VIP EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13838&wid_hmac=884acc4f39c19157728a0c7a6f98d646&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13838 - Chile-Entel-Android-VIP  VIP
        "https://1d5e0bf8a93.traffic-c.com/?wid=13156&wid_hmac=50496f8848ad7c6f891625dd0cb292dd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13156 - CL-Movistar-Android-VIP 2  VIP
        "https://1d5e0bf8a93.traffic-c.com/?wid=13902&wid_hmac=c420ba7bf374fc6f43e243bcbd7dfcde&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13902 - CL-Entel-NightClub
        "https://1d5e0bf8a93.traffic-c.com/?wid=13905&wid_hmac=6ad6ce6d8766df51bb977a41eccc11fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13905 - CL-Entel-Android-VIP 2  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13543&wid_hmac=78eed5f066f7fea5a4a6d39a4e148f74&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13543 - DE-Vodafone-VOD
        "https://1d5e0bf8a93.traffic-c.com/?wid=13542&wid_hmac=693876d44f55dd2b0e215c171721a972&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13542 - DE-Vodafone-Erotic
        "https://1d5e0bf8a93.traffic-c.com/?wid=13541&wid_hmac=1485a893c7294ec0cbf54fdd8394e3b9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13541 - DE-Vodafone-Playboy
        "https://1d5e0bf8a93.traffic-c.com/?wid=13184&wid_hmac=2a7c3eac799c736229f449590468ceb9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13184 - DE-Vodafone-Hotxl  EXCLUSIVE
        "https://1d5e0bf8a93.traffic-c.com/?wid=13990&wid_hmac=f7782aba8e9aa389cf05001255b63f83&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13990 - DE-3G-LesbianPorn
        "https://1d5e0bf8a93.traffic-c.com/?wid=13544&wid_hmac=7831bc6bb01e2ace3b5d6a57d731b0cc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13544 - DE-Vodafone-Android-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=11785&wid_hmac=ec5e9712d495bd12c2c76e86533313fe&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11785 - IE-Three-AppMob
        "https://1d5e0bf8a93.traffic-c.com/?wid=12299&wid_hmac=862a179d40888f4451f8258d881970eb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12299 - IE-Three-Android-VIP 2  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=11792&wid_hmac=7e5ee56ed37d813d4685fa869e0768d0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11792 - CR-Claro-Extremo Club  
        "https://1d5e0bf8a93.traffic-c.com/?wid=13223&wid_hmac=ddaada5c71d572a4f2e247e0399c4030&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13223 - CR-Claro-Sexyclub
        "https://1d5e0bf8a93.traffic-c.com/?wid=12191&wid_hmac=efa9dd107aaf7c007589c26dcd8db8fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12191 - CR-Claro-Android-VIP 1  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HN" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12910&wid_hmac=048e62dc8efcfe68409baa1395591dd4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12910 - HN-Tigo/Wifi-Loader
        "https://1d5e0bf8a93.traffic-c.com/?wid=12883&wid_hmac=a3dd2b9ae6c9bfd77c6324bf60a1fa9f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12883 - HN-Tigo/Wifi-Azul
        "https://1d5e0bf8a93.traffic-c.com/?wid=12276&wid_hmac=56e714006ae53286dfea7959b56c0a55&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12276 - HN-Claro-Sexy
        "https://1d5e0bf8a93.traffic-c.com/?wid=13593&wid_hmac=fe2b99816fc6005dbe0a461b1c665bc9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13593 - HN-Tigo-Enamoradas
        "https://1d5e0bf8a93.traffic-c.com/?wid=11995&wid_hmac=a1c751b41659a16b93b5c37c49f8ce2b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11995 - HN-Claro-Android-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LK" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13372&wid_hmac=319991f628e90b2be65a6068463d00f0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13372 - LK-Mobitel-ContentAdult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13601&wid_hmac=90e609b7a5a040a46ecff8c040001451&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13601 - LK-Mobitel-Video (Adult)
        "https://1d5e0bf8a93.traffic-c.com/?wid=11964&wid_hmac=b97a9c2c85658d45f428482b3951ff40&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11964 - LK-Mobitel-Android-Adult-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=10937&wid_hmac=63ff3be27e7ec8fd6461cd0c08cd754a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 10937 - IN-Tata-Android-VIP  VIP
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13965&wid_hmac=31733e94806f40c3ab11a276aaa8360a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13965 - MX-Movistar-Hotline
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13948&wid_hmac=30638e15544b57f4a8cbe087ffa793e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13948 - UK-Vodafone-XtremeFilth
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13942&wid_hmac=98aecb928155ca7f7decd08e0b37f940&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13942 - TH-Truemove-AdultClub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12319&wid_hmac=c629f677935fc5a2409e75ce6e48f7f4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12319 - PT-Vodafone-Euroteens
        "https://1d5e0bf8a93.traffic-c.com/?wid=12236&wid_hmac=2c8f407977330502876262518364527a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12236 - PT-Vodafone-Metart
        "https://1d5e0bf8a93.traffic-c.com/?wid=13756&wid_hmac=bb606c4ac43a9e268a179b3df1d5c5ec&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13756 - PT-Vodafone-Sexy TV
        "https://1d5e0bf8a93.traffic-c.com/?wid=13755&wid_hmac=e21383b134a98ad3b23c16b37f6a471e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13755 - PT-Vodafone-VIP Club
        "https://1d5e0bf8a93.traffic-c.com/?wid=13754&wid_hmac=5d247aef0d8120de04201212b536cc56&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13754 - PT-Vodafone-2for1
        "https://1d5e0bf8a93.traffic-c.com/?wid=13753&wid_hmac=42cea7564cee6c1119f1ff4ca02b55f7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13753 - PT-Vodafone-FlirtGo
        "https://1d5e0bf8a93.traffic-c.com/?wid=13766&wid_hmac=0b38d1cf1c61f27e689683f581d15f7b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13766 - PT-Vodafone-XXX club
        "https://1d5e0bf8a93.traffic-c.com/?wid=13881&wid_hmac=43f0f1a60ad94dfc17bb061900b954db&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13881 - PT-MEO-Boazonatube
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13761&wid_hmac=51ae01f80adf285dde21a50e22b92f10&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13761 - BR-TIM-Sexy Portal
        "https://1d5e0bf8a93.traffic-c.com/?wid=13826&wid_hmac=7025afd14a3098b1cfb1eb4402c969c5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13826 - BR-TIM-Adultos
        "https://1d5e0bf8a93.traffic-c.com/?wid=13870&wid_hmac=0196883c563f651fe2bb4bb355381ef2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13870 - BR-TIM-Adultos
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13655&wid_hmac=0dfc8fdb7d0d7009be2ed795a20b224d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13655 - NO-3G/Wifi-Nude 1
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SV" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13605&wid_hmac=e82cd60d6f40592efe360d3867d9942f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13605 - SV-3G-Mundia
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13576&wid_hmac=c2cdb77c5bd243971285e60829b3f77a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13576 - AR-Movistar-Adult
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12188&wid_hmac=7ba9d0db98b89f2fb60b0fd93dcb854a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12188 - ES-Movistar-PornoGafas
        "https://1d5e0bf8a93.traffic-c.com/?wid=13599&wid_hmac=498b417e0fc2aacca7a84365d41c688d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13599 - ES-Movistar-IntimaX
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13115&wid_hmac=30694d57f5e66c6ed18d5e94d674dccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13115 - CH-3G/WiFi-GirlsClub
        "https://1d5e0bf8a93.traffic-c.com/?wid=12957&wid_hmac=84dce72bffdd88e5050efbc37d158449&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12957 - CH-3G/WiFi-Pornhubs
        "https://1d5e0bf8a93.traffic-c.com/?wid=13533&wid_hmac=05ca7c68b638a638e4063e169aeacb97&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13533 - CH-3G/Wifi-FlashContact
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13175&wid_hmac=feaf8f960d288c24be2c1af2abbff856&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13175 - ZA-Vodacom-VipClub
        "https://1d5e0bf8a93.traffic-c.com/?wid=13174&wid_hmac=0cd8cd7e15eaecf1b0d162f8f3d9046f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13174 - ZA-Vodacom-FlirtGo/LiveWebcams
        "https://1d5e0bf8a93.traffic-c.com/?wid=13090&wid_hmac=2136390016894378ee7c7d64cebfd58c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13090 - ZA-CellC-HotGirls
        "https://1d5e0bf8a93.traffic-c.com/?wid=13033&wid_hmac=8c8eadf6768ed01c26b4ee0d78b5628e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13033 - ZA-MTN/Vodacom-XtremeGogo
        "https://1d5e0bf8a93.traffic-c.com/?wid=13436&wid_hmac=f7a113db453d718946019b215ffdecdf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13436 - ZA-MTN-Hotties18+
        "https://1d5e0bf8a93.traffic-c.com/?wid=13377&wid_hmac=ec74c28787705304e8f45f7049d37618&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13377 - ZA-CellC-SpicyBabes
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GH" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12630&wid_hmac=a57d8cd2c6424d665b9c7f39073cd041&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12630 - GH-3G-LeakedChatroom18+
        "https://1d5e0bf8a93.traffic-c.com/?wid=12309&wid_hmac=b8d509a3a09bbddf70f1917d4d912109&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12309 - GH-Vodafone/MTN-Mobilove
        "https://1d5e0bf8a93.traffic-c.com/?wid=13368&wid_hmac=703c274d102e5f02fcfd1d2625457273&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13368 - GH-3G-Leaked Chatroom 18+ Videos
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13342&wid_hmac=904786e8f1edabbc2d05c5ad3e35b415&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13342 - DZ-3G/Wifi-SpicyAutoDL
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13182&wid_hmac=f7620e114087ca70d03f9eeb1cad10d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13182 - GT-Claro-Adult
        "https://1d5e0bf8a93.traffic-c.com/?wid=13252&wid_hmac=ba63247537a32e193419dfa97cba61f8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13252 - GT-Claro-Sexyclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13246&wid_hmac=8af6298df82054ff98320b3c4165e4c8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13246 - PR-Claro-Sexyclub
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13245&wid_hmac=82b458c902d4e3bac3b0803cc67e3674&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13245 - CO-Claro-Sexy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HT" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13211&wid_hmac=d0b12e9448973bb5c161b3c50484e035&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13211 - HT-Digicell-Movilx
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12996&wid_hmac=412f39fe10fb7e60828233e0d8ba0970&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12996 - BY-Life-Adultvideo
        "https://1d5e0bf8a93.traffic-c.com/?wid=12927&wid_hmac=c70cdad2d62d462a253966475e4f8585&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12927 - BY-Velcom-Adultvideo
        "https://1d5e0bf8a93.traffic-c.com/?wid=13190&wid_hmac=71b4dfff07bebf120b608322aebb6ae2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13190 - BY-MTS-Adultvideo
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=13180&wid_hmac=ef438a0aa1b9f38cc875131fb577c54b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13180 - PA-Claro-Adult
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SU" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12665&wid_hmac=ce218c3dfa78cc37087fb4201b76bf11&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12665 - SU-Digicel-ClubMovil
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=12317&wid_hmac=696c30c7b8f76f2c0ef322d90fc4a6c2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12317 - GR-Vodafone-Amateur
        "https://1d5e0bf8a93.traffic-c.com/?wid=12235&wid_hmac=089d84af9ef97e85508b27facb5b5c03&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12235 - GR-Vodafone-Sex Deluxe
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NI" ) { 
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5e0bf8a93.traffic-c.com/?wid=11399&wid_hmac=d1c89710ad791fd82e50f99da56f76ca&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 11399 - NI-Claro-Extremo Club
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://delivery.bb2022.info/37391?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adult Video
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots adult smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>