<?php
include "/var/www/sublimerevenue.com/API/config.php";

//get aff id from bakcoffer
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
// geo target first with geo direct offer bakcoffers or simply bakcoffers if offers are good for this geo
if ( $country == "BA" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMkPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - BA - Nonincent" ID: 15396
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMjPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - BA - Nonincent" ID: 15395
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - BA - Nonincent" ID: 15392
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMePAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - BA - Nonincent" ID: 15390
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMYPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - BA - Nonincent" ID: 15384
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMYPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - BA - Nonincent" ID: 15384
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMbPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - BA - Nonincent" ID: 15387
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMlPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - BA - Nonincent" ID: 15397
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMXPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - BA - Nonincent" ID: 15383
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMaPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - BA - Nonincent" ID: 15386
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMdPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - BA - Nonincent" ID: 15389
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=24635&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=24638&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30579&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31398&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31399&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31400&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31401&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31402&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31403&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31404&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31405&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=32772&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=32941&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=32945&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33000&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMhPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - BA - Nonincent" ID: 15393
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Horoscope Taro Purple - BA - Nonincent" ID: 15394
        "https://gltrak.com/aff_c2.php?offer_id=1279&aff_id=10787&pid=86634&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // BA-BabaVanga-Mobile (ID: 1279)
        "https://gltrak.com/aff_c2.php?offer_id=1279&aff_id=10787&pid=86679&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // BA-BabaVanga-Mobile (ID: 1279)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1277&aff_id=10787&pid=86601&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // EE-BabaVanga-Mobile (ID: 1277)
        "https://gltrak.com/aff_c2.php?offer_id=1277&aff_id=10787&pid=86680&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // EE-BabaVanga-Mobile (ID: 1277)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1275&aff_id=10787&pid=86628&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // LV-BabaVanga-Mobile (ID: 1275)
        "https://gltrak.com/aff_c2.php?offer_id=1275&aff_id=10787&pid=86682&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // LV-BabaVanga-Mobile (ID: 1275)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1273&aff_id=10787&pid=86597&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // LT-BabaVanga-Mobile (ID: 1273)
        "https://gltrak.com/aff_c2.php?offer_id=1273&aff_id=10787&pid=86681&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // LT-BabaVanga-Mobile (ID: 1273)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOjOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - RO - Nonincent" ID: 15267
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOWOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - RO - Nonincent" ID: 15254
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RO - Nonincent" ID: 15253
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RO - Nonincent" ID: 15252
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOROwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - RO - Nonincent" ID: 15249
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOQOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow - RO - Nonincent" ID: 15248
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RO - Nonincent" ID: 15252
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RO - Nonincent" ID: 15253
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOWOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - RO - Nonincent" ID: 15254
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOXOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - RO - Nonincent" ID: 15255
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - RO - Nonincent" ID: 15256
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOcOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - RO - Nonincent" ID: 15260
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOeOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - RO - Nonincent" ID: 15262
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOhOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - RO - Nonincent" ID: 15265
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOaOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - RO - Nonincent" ID: 15258
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOfOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - RO - Nonincent" ID: 15263
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOTOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - RO - Nonincent" ID: 15251
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOdOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - RO - Nonincent" ID: 15261
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQObOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - RO - Nonincent" ID: 15259
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOZOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - RO - Nonincent" ID: 15257
        "https://gltrak.com/aff_c2.php?offer_id=1271&aff_id=10787&pid=86585&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // RO-BabaVanga-Mobile (ID: 1271)
        "https://gltrak.com/aff_c2.php?offer_id=1271&aff_id=10787&pid=86683&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // RO-BabaVanga-Mobile (ID: 1271)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOHOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - RS - Nonincent" ID: 15239
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMyOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange S2 - RS - Nonincent" ID: 14898
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMzOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - RS - Nonincent" ID: 14899
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM0OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - RS - Nonincent" ID: 14900
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM2OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - RS - Nonincent" ID: 14902
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM4OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - RS - Nonincent" ID: 14904
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM7OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - RS - Nonincent" ID: 14907
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM9OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse 2 - RS - Nonincent" ID: 14909
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM-OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - RS - Nonincent" ID: 14910
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM-OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - RS - Nonincent" ID: 14910
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMxOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange S1 - RS - Nonincent" ID: 14897
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOEOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - RS - Nonincent" ID: 15236
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOFOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - RS - Nonincent" ID: 15237
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMyOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange S2 - RS - Nonincent" ID: 14898
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM8OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RS - Nonincent" ID: 14908
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM8OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RS - Nonincent" ID: 14908
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM_OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RS - Nonincent" ID: 14911
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM_OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RS - Nonincent" ID: 14911
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM3OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - RS - Nonincent" ID: 14903
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM4OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - RS - Nonincent" ID: 14904
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM6OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - RS - Nonincent" ID: 14906
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM5OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - RS - Nonincent" ID: 14905
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMvOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow - RS - Nonincent" ID: 14895
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM1OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Offer "Horoscope Taro Dark - RS - Nonincent" ID: 14901
        "https://gltrak.com/aff_c2.php?offer_id=1269&aff_id=10787&pid=86593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // RS-BabaVanga-Mobile (ID: 1269)
        "https://gltrak.com/aff_c2.php?offer_id=1269&aff_id=10787&pid=86684&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // RS-BabaVanga-Mobile (ID: 1269)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOKOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - PL - Nonincent" ID: 15242
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNFOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - PL - Nonincent" ID: 14917
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNDOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - PL - Nonincent" ID: 14915
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNGOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - PL - Nonincent" ID: 14918
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNLOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - PL - Nonincent" ID: 14923
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNMOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - PL - Nonincent" ID: 14924
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNOOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - PL - Nonincent" ID: 14926
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNROgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - PL - Nonincent" ID: 14929
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNSOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - PL - Nonincent" ID: 14930
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNTOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - PL - Nonincent" ID: 14931
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOJOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - PL - Nonincent" ID: 15241
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNGOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - PL - Nonincent" ID: 14918
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNHOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - PL - Nonincent" ID: 14919
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNLOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - PL - Nonincent" ID: 14923
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNMOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - PL - Nonincent" ID: 14924
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNIOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - PL - Nonincent" ID: 14920
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNJOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - PL - Nonincent" ID: 14921
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNKOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - PL - Nonincent" ID: 14922
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNNOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - PL - Nonincent" ID: 14925
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNQOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - PL - Nonincent" ID: 14928
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNPOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - PL - Nonincent" ID: 14927
        "https://gltrak.com/aff_c2.php?offer_id=1235&aff_id=10787&pid=81090&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // PL-BabaVanga-Mobile (ID: 1235)
        "https://gltrak.com/aff_c2.php?offer_id=1235&aff_id=10787&pid=81092&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // PL-BabaVanga-Mobile (ID: 1235)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMWPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal payment page - SK - Nonincent" ID: 15382
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPjOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - SK - Nonincent" ID: 15331
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPhOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - SK - Nonincent" ID: 15329
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPgOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - SK - Nonincent" ID: 15328
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPZOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - SK - Nonincent" ID: 15321
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - SK - Nonincent" ID: 15317
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - SK - Nonincent" ID: 15317
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPTOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow - SK - Nonincent" ID: 15315
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - SK - Nonincent" ID: 15316
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - SK - Nonincent" ID: 15316
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPbOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - SK - Nonincent" ID: 15323
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPcOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - SK - Nonincent" ID: 15324
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPaOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - SK - Nonincent" ID: 15322
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPfOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - SK - Nonincent" ID: 15327
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPWOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - SK - Nonincent" ID: 15318
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SK - Nonincent" ID: 15320
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SK - Nonincent" ID: 15320
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SK - Nonincent" ID: 15320
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPdOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - SK - Nonincent" ID: 15325
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPXOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - SK - Nonincent" ID: 15319
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPiOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - SK - Nonincent" ID: 15330
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPeOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - SK - Nonincent" ID: 15326
        "https://gltrak.com/aff_c2.php?offer_id=1233&aff_id=10787&pid=79687&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // SK-BabaVanga-Mobile (ID: 1233)
        "https://gltrak.com/aff_c2.php?offer_id=1233&aff_id=10787&pid=79689&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // SK-BabaVanga-Mobile (ID: 1233)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1216&aff_id=10787&pid=77908&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // PT-BabaVanga-Mobile (ID: 1216)
        "https://gltrak.com/aff_c2.php?offer_id=1216&aff_id=10787&pid=77876&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // PT-BabaVanga-Mobile (ID: 1216)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1210&aff_id=10787&pid=77165&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // IT-BabaVanga-Mobile (ID: 1210)
        "https://gltrak.com/aff_c2.php?offer_id=1210&aff_id=10787&pid=77183&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // IT-BabaVanga-Mobile (ID: 1210)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1208&aff_id=10787&pid=77167&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // CZ-BabaVanga-Mobile (ID: 1208)
        "https://gltrak.com/aff_c2.php?offer_id=1208&aff_id=10787&pid=77185&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // CZ-BabaVanga-Mobile (ID: 1208)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1206&aff_id=10787&pid=77172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // HU-BabaVanga-Mobile (ID: 1206)
        "https://gltrak.com/aff_c2.php?offer_id=1206&aff_id=10787&pid=77189&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // HU-BabaVanga-Mobile (ID: 1206)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQP0OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - SI - Nonincent" ID: 15348
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPzOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - SI - Nonincent" ID: 15347
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPyOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - SI - Nonincent" ID: 15346
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPxOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - SI - Nonincent" ID: 15345
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPvOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - SI - Nonincent" ID: 15343
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPuOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - SI - Nonincent" ID: 15342
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPtOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - SI - Nonincent" ID: 15341
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPsOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - SI - Nonincent" ID: 15340
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPrOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - SI - Nonincent" ID: 15339
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPqOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SI - Nonincent" ID: 15338
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPoOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - SI - Nonincent" ID: 15336
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPlOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow v2 - SI - Nonincent" ID: 15333
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPkOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - SI - Nonincent" ID: 15332
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - SI - Nonincent" ID: 15344
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPnOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - SI - Nonincent" ID: 15335
        "https://gltrak.com/aff_c2.php?offer_id=1204&aff_id=10787&pid=77175&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // SI-BabaVanga-Mobile (ID: 1204)
        "https://gltrak.com/aff_c2.php?offer_id=1204&aff_id=10787&pid=77193&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // SI-BabaVanga-Mobile (ID: 1204)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO4OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - HR - Nonincent" ID: 15288
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO3OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - HR - Nonincent" ID: 15287
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO2OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - HR - Nonincent" ID: 15286
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO1OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - HR - Nonincent" ID: 15285
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO0OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - HR - Nonincent" ID: 15284
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOzOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - HR - Nonincent" ID: 15283
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOyOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - HR - Nonincent" ID: 15282
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOpOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - HR - Nonincent" ID: 15273
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOxOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - HR - Nonincent" ID: 15281
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35533&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35534&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35535&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35537&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35538&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35539&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35540&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35541&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35542&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35543&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35544&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35545&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35546&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35547&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35548&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35549&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35550&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35551&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35552&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35553&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "https://gltrak.com/aff_c2.php?offer_id=1202&aff_id=10787&pid=77170&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=bakcoffer&mbbr=1&pof=1&aof=1", // HR-BabaVanga-Mobile (ID: 1202)
        "https://gltrak.com/aff_c2.php?offer_id=1202&aff_id=10787&pid=77186&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // HR-BabaVanga-Mobile (ID: 1202)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27380&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35805&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38095&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38096&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41362&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41362&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41368&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Offer "Money amulet - TH" ID: 12049
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to bakcoffers after geo target
    $urls = array(
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General bakcoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream bakcoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream bakcoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=bakcoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BitterStrawberry mainstream bakcoffer
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
//geo target first with geo direct offer bakcoffers or simply bakcoffers if offers are good for this geo
if ( $country == "BA" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMkPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - BA - Nonincent" ID: 15396
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMjPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - BA - Nonincent" ID: 15395
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - BA - Nonincent" ID: 15392
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMePAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - BA - Nonincent" ID: 15390
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMYPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - BA - Nonincent" ID: 15384
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMYPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - BA - Nonincent" ID: 15384
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMbPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - BA - Nonincent" ID: 15387
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMlPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - BA - Nonincent" ID: 15397
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMXPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - BA - Nonincent" ID: 15383
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMaPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - BA - Nonincent" ID: 15386
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMdPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - BA - Nonincent" ID: 15389
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=24635&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=24638&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30579&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31398&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31399&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31400&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31401&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31402&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31403&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31404&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31405&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=32772&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=32941&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=32945&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMgKwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33000&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - BA - Nonincent" ID: 11040
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMhPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - BA - Nonincent" ID: 15393
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Horoscope Taro Purple - BA - Nonincent" ID: 15394
        "https://gltrak.com/aff_c2.php?offer_id=1278&aff_id=10787&pid=86632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // BA-BabaVanga-Desktop (ID: 1278)
        "https://gltrak.com/aff_c2.php?offer_id=1278&aff_id=10787&pid=86673&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // BA-BabaVanga-Desktop (ID: 1278)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1276&aff_id=10787&pid=86599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // EE-BabaVanga-Desktop (ID: 1276)
        "https://gltrak.com/aff_c2.php?offer_id=1276&aff_id=10787&pid=86674&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // EE-BabaVanga-Desktop (ID: 1276)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1274&aff_id=10787&pid=86626&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // LV-BabaVanga-Desktop (ID: 1274)
        "https://gltrak.com/aff_c2.php?offer_id=1274&aff_id=10787&pid=86676&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // LV-BabaVanga-Desktop (ID: 1274)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1272&aff_id=10787&pid=86595&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // LT-BabaVanga-Desktop (ID: 1272)
        "https://gltrak.com/aff_c2.php?offer_id=1272&aff_id=10787&pid=86675&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // LT-BabaVanga-Desktop (ID: 1272)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOjOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - RO - Nonincent" ID: 15267
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOWOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - RO - Nonincent" ID: 15254
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RO - Nonincent" ID: 15253
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RO - Nonincent" ID: 15252
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOROwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - RO - Nonincent" ID: 15249
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOQOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow - RO - Nonincent" ID: 15248
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RO - Nonincent" ID: 15252
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RO - Nonincent" ID: 15253
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOWOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - RO - Nonincent" ID: 15254
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOXOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - RO - Nonincent" ID: 15255
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - RO - Nonincent" ID: 15256
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOcOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - RO - Nonincent" ID: 15260
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOeOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - RO - Nonincent" ID: 15262
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOhOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - RO - Nonincent" ID: 15265
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOaOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - RO - Nonincent" ID: 15258
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOfOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - RO - Nonincent" ID: 15263
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOTOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - RO - Nonincent" ID: 15251
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOdOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - RO - Nonincent" ID: 15261
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQObOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - RO - Nonincent" ID: 15259
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOZOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - RO - Nonincent" ID: 15257
        "https://gltrak.com/aff_c2.php?offer_id=1270&aff_id=10787&pid=86583&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // RO-BabaVanga-Desktop (ID: 1270)
        "https://gltrak.com/aff_c2.php?offer_id=1270&aff_id=10787&pid=86677&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // RO-BabaVanga-Desktop (ID: 1270)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOHOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - RS - Nonincent" ID: 15239
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMyOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange S2 - RS - Nonincent" ID: 14898
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMzOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - RS - Nonincent" ID: 14899
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM0OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - RS - Nonincent" ID: 14900
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM2OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - RS - Nonincent" ID: 14902
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM4OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - RS - Nonincent" ID: 14904
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM7OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - RS - Nonincent" ID: 14907
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM9OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse 2 - RS - Nonincent" ID: 14909
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM-OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - RS - Nonincent" ID: 14910
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM-OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - RS - Nonincent" ID: 14910
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMxOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange S1 - RS - Nonincent" ID: 14897
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOEOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - RS - Nonincent" ID: 15236
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOFOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - RS - Nonincent" ID: 15237
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMyOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange S2 - RS - Nonincent" ID: 14898
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM8OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RS - Nonincent" ID: 14908
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM8OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - RS - Nonincent" ID: 14908
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM_OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RS - Nonincent" ID: 14911
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM_OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - RS - Nonincent" ID: 14911
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM3OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - RS - Nonincent" ID: 14903
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM4OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - RS - Nonincent" ID: 14904
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMuOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - RS - Nonincent" ID: 14894
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM6OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - RS - Nonincent" ID: 14906
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM5OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - RS - Nonincent" ID: 14905
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMvOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow - RS - Nonincent" ID: 14895
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQM1OgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Offer "Horoscope Taro Dark - RS - Nonincent" ID: 14901
        "https://gltrak.com/aff_c2.php?offer_id=1268&aff_id=10787&pid=86591&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // RS-BabaVanga-Desktop (ID: 1268)
        "https://gltrak.com/aff_c2.php?offer_id=1268&aff_id=10787&pid=86678&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // RS-BabaVanga-Desktop (ID: 1268)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOKOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - PL - Nonincent" ID: 15242
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNFOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - PL - Nonincent" ID: 14917
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNDOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Main - PL - Nonincent" ID: 14915
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNGOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - PL - Nonincent" ID: 14918
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNLOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - PL - Nonincent" ID: 14923
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNMOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - PL - Nonincent" ID: 14924
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNOOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - PL - Nonincent" ID: 14926
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNROgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - PL - Nonincent" ID: 14929
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNSOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - PL - Nonincent" ID: 14930
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNTOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - PL - Nonincent" ID: 14931
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOJOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - PL - Nonincent" ID: 15241
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNGOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - PL - Nonincent" ID: 14918
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNHOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - PL - Nonincent" ID: 14919
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNLOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - PL - Nonincent" ID: 14923
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNMOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - PL - Nonincent" ID: 14924
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNIOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - PL - Nonincent" ID: 14920
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNJOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - PL - Nonincent" ID: 14921
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNKOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - PL - Nonincent" ID: 14922
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNNOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - PL - Nonincent" ID: 14925
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNQOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - PL - Nonincent" ID: 14928
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQNPOgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - PL - Nonincent" ID: 14927
        "https://gltrak.com/aff_c2.php?offer_id=1234&aff_id=10787&pid=81089&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // PL-BabaVanga-Desktop (ID: 1234)
        "https://gltrak.com/aff_c2.php?offer_id=1234&aff_id=10787&pid=81091&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // PL-BabaVanga-Desktop (ID: 1234)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMWPAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal payment page - SK - Nonincent" ID: 15382
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPjOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - SK - Nonincent" ID: 15331
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPhOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - SK - Nonincent" ID: 15329
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPgOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - SK - Nonincent" ID: 15328
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPZOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - SK - Nonincent" ID: 15321
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - SK - Nonincent" ID: 15317
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPVOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Orange - SK - Nonincent" ID: 15317
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPTOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow - SK - Nonincent" ID: 15315
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - SK - Nonincent" ID: 15316
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPUOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Blue - SK - Nonincent" ID: 15316
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPbOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - SK - Nonincent" ID: 15323
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPcOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - SK - Nonincent" ID: 15324
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPaOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - SK - Nonincent" ID: 15322
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPfOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - SK - Nonincent" ID: 15327
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPWOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - SK - Nonincent" ID: 15318
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SK - Nonincent" ID: 15320
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SK - Nonincent" ID: 15320
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPYOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SK - Nonincent" ID: 15320
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPdOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - SK - Nonincent" ID: 15325
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPXOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - SK - Nonincent" ID: 15319
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPiOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - SK - Nonincent" ID: 15330
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPeOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - SK - Nonincent" ID: 15326
        "https://gltrak.com/aff_c2.php?offer_id=1232&aff_id=10787&pid=79686&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // SK-BabaVanga-Desktop (ID: 1232)
        "https://gltrak.com/aff_c2.php?offer_id=1232&aff_id=10787&pid=79688&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // SK-BabaVanga-Desktop (ID: 1232)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1215&aff_id=10787&pid=77890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // PT-BabaVanga-Desktop (ID: 1215)
        "https://gltrak.com/aff_c2.php?offer_id=1215&aff_id=10787&pid=77875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // PT-BabaVanga-Desktop (ID: 1215)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1209&aff_id=10787&pid=77166&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // IT-BabaVanga-Desktop (ID: 1209)
        "https://gltrak.com/aff_c2.php?offer_id=1209&aff_id=10787&pid=77181&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // IT-BabaVanga-Desktop (ID: 1209)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1207&aff_id=10787&pid=77168&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // CZ-BabaVanga-Desktop (ID: 1207)
        "https://gltrak.com/aff_c2.php?offer_id=1207&aff_id=10787&pid=77184&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // CZ-BabaVanga-Desktop (ID: 1207)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1205&aff_id=10787&pid=77173&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // HU-BabaVanga-Desktop (ID: 1205)
        "https://gltrak.com/aff_c2.php?offer_id=1205&aff_id=10787&pid=77188&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // HU-BabaVanga-Desktop (ID: 1205)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQP0OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - SI - Nonincent" ID: 15348
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPzOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - SI - Nonincent" ID: 15347
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPyOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - SI - Nonincent" ID: 15346
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPxOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - SI - Nonincent" ID: 15345
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPvOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - SI - Nonincent" ID: 15343
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPuOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - SI - Nonincent" ID: 15342
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPtOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Black Magic - SI - Nonincent" ID: 15341
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPsOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Gold - SI - Nonincent" ID: 15340
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPrOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga 8-12 - SI - Nonincent" ID: 15339
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPqOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Date Death - SI - Nonincent" ID: 15338
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPoOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse - SI - Nonincent" ID: 15336
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPlOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Vanga Yellow v2 - SI - Nonincent" ID: 15333
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPkOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Purple - SI - Nonincent" ID: 15332
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - SI - Nonincent" ID: 15344
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQPnOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - SI - Nonincent" ID: 15335
        "https://gltrak.com/aff_c2.php?offer_id=1203&aff_id=10787&pid=77174&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // SI-BabaVanga-Desktop (ID: 1203)
        "https://gltrak.com/aff_c2.php?offer_id=1203&aff_id=10787&pid=77192&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // SI-BabaVanga-Desktop (ID: 1203)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO4OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Universal Paypage Horo - HR - Nonincent" ID: 15288
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO3OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Astro - HR - Nonincent" ID: 15287
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO2OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Hiromant 2 Hand - HR - Nonincent" ID: 15286
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO1OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Children - HR - Nonincent" ID: 15285
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQO0OwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope China - HR - Nonincent" ID: 15284
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOzOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Taro Dark - HR - Nonincent" ID: 15283
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOyOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Curse v2 - HR - Nonincent" ID: 15282
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOpOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Medium - HR - Nonincent" ID: 15273
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQOxOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope Financial - HR - Nonincent" ID: 15281
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35533&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35534&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35535&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35537&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35538&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35539&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35540&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35541&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35542&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35543&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35544&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35545&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35546&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35547&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35548&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35549&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35550&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35551&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35552&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "http://gurfv.pro/?target=-7EBNQCgQAAAMNDQMiNwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35553&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Horoscope - HR - Nonincent" ID: 14114
        "https://gltrak.com/aff_c2.php?offer_id=1201&aff_id=10787&pid=77169&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=bakcoffer&mbbr=1&pof=1&aof=1", // HR-BabaVanga-Desktop (ID: 1201)
        "https://gltrak.com/aff_c2.php?offer_id=1201&aff_id=10787&pid=77187&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=bakcoffer&mbbr=1&pof=1&aof=1" // HR-BabaVanga-Desktop (ID: 1201)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27380&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35805&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38095&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38096&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41362&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41362&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41368&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Money amulet - TH" ID: 12049
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMRLwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Offer "Money amulet - TH" ID: 12049
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to bakcoffers after geo target
    $urls = array(
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General bakcoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream bakcoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream bakcoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>