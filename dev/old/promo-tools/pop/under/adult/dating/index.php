<?php
include "/var/www/sublimerevenue.com/API/config.php";
// TODO: add some TC offers, check bstrawberry and trafficpartner for dating offers

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
if ( $country == "EE" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=lt-LT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=cs-CZ&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=pt-PT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile66&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ME" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=hu-HU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NG" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=sk-SK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=pl-PL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=it-IT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://norgesexdating.com/?lc=no&ubId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://sublimeadultdating.com/?lc=no&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13214&wid_hmac=37e6905f64588d84d77cf771e4d57c5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13214 - NO-Mobile-MinSexDate-SnapEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13172&wid_hmac=dc75d9cb04383811d25c8fefb5ad5f02&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13172 - NO-Mobile-MinSexDate-DiskretEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13170&wid_hmac=2c1bda808610ca520e808d8e82565270&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13170 - NO-Mobile-MinSexDate-AdvarselEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13168&wid_hmac=483fe70e97ff359065627716ea2c4637&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13168 - NO-Mobile-MinSexDate-LokaleEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13166&wid_hmac=6275c9f57cdeef72825982bd598fa8d0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany 13166 - NO-Mobile-MinSexDate-LykkenEXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=fi-FI&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat 
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=da-DK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=es-ES&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=fr-FR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=en-GB&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=nl-NL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=ru-RU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=sv-SE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to popunders after geo target
    $urls = array(
        "https://sublimeadultdating.com/?subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult popunder
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult popunder
        "https://bu3m0b.com/?id=45265&clickid=sublimerevenue-adult&clickid2=popunder&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry adult popunder
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
// geo target first with geo direct offer popunders or simply popunders if offers are good for this geo
if ( $country == "EE" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=146&aff_id=10787&pid=35249&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=lt-LT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=148&aff_id=10787&pid=35246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=149&aff_id=10787&pid=35243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=cs-CZ&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=152&aff_id=10787&pid=35210&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=155&aff_id=10787&pid=35222&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=pt-PT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=158&aff_id=10787&pid=35237&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=160&aff_id=10787&pid=35201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=163&aff_id=10787&pid=35204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ME" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=164&aff_id=10787&pid=35213&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=167&aff_id=10787&pid=35216&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=hu-HU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=170&aff_id=10787&pid=35219&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NG" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=173&aff_id=10787&pid=35240&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=sk-SK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=175&aff_id=10787&pid=35228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=178&aff_id=10787&pid=35225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&&source=desktopcreative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=181&aff_id=10787&pid=35231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=182&aff_id=10787&pid=35207&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat
        "https://gltrak.com/aff_c2.php?offer_id=184&aff_id=10787&pid=35234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=pl-PL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=it-IT&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://norgesexdating.com/?lc=no&ubId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://sublimeadultdating.com/?lc=no&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13215&wid_hmac=c32ffab26bbd4436c4333a4054bf3e4d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13215 - NO-Desktop-MinSexDate-SnapEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13173&wid_hmac=b2e8b41b9ba3613024c2014541a94472&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13173 - NO-Desktop-MinSexDate-DiskretEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13171&wid_hmac=c03d5388df0da55c41f34248dca3d3e8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13171 - NO-Desktop-MinSexDate-AdvarselEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13169&wid_hmac=3b9b8560cf665e0be930cf3dfb5a866c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany 13169 - NO-Desktop-MinSexDate-LokaleEXCLUSIVE
        "https://1d5dfa9d4d3.traffic-c.com/?wid=13167&wid_hmac=6c9ab7ff242b98eb6c1f6204ef524734&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany 13167 - NO-Desktop-MinSexDate-LykkenEXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=fi-FI&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=popunder&mbbr=1&pof=1&aof=1", // whatschat 
        "https://gltrak.com/aff_c2.php?offer_id=738&aff_id=10787&pid=48420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=popunder&mbbr=1&pof=1&aof=1" // whatschat
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult popunder
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots adult popunder
        "https://o-1542.prodtraff.com/67713aaf-de83-4302-b9c1-e4604e1f4489?subPublisher=SublimeRevenue-Adult-popunder&data1=$tracker&data2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&data3=$country" // TrafficPartner popunder
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=de-DE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=da-DK&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=es-ES&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=fr-FR&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=en-GB&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=nl-NL&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=ru-RU&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id" // Dating Factory
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://sublimeadultdating.com/?lc=sv-SE&subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2020.info/37392?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BrokerBabe Adult Dating2
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to popunders after geo target
    $urls = array(
        "https://sublimeadultdating.com/?subId=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$tracker$delitel$set$delitel$link$delitel$sub_id", // Dating Factory
        "http://delivery.bb2021.info/37390?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BrokerBabe Adlt Dating
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=adult&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany adult popunder
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD2qh-WsfbDjA2SJN63mmekk1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots adult popunder
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>