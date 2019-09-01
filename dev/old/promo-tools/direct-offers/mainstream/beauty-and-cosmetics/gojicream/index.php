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
if ( $country == "MY" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13587&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18719&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=21409&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22718&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22724&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=25049&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=25694&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=27989&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=28066&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=29301&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=29302&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31490&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=42793&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - MY Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MY" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13967&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17594&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18616&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18835&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20812&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21105&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21803&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21823&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21851&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21859&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21868&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21986&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22638&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22725&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22771&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23330&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27361&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31492&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33554&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41629&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41630&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41632&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41633&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41634&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41636&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - MY Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41638&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - MY Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AE" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN2QQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=45011&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - AE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN2QQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=45690&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - AE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AE" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN2QQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10831&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - AE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN2QQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45012&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - AE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN2QQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45606&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - AE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=4160&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=5062&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=9794&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11096&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=36203&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=39719&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - ES Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6741&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7260&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15997&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18329&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19576&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19711&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29789&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34183&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM7DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50155&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - ES Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=51181&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=48531&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35469&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35468&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=35467&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=29269&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=25695&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22207&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13329&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - PH Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13293&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19328&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19329&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20188&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20930&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21050&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40674&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - PH Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM1GgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - PH Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13047&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11798&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11302&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - RO Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9137&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10073&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12762&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMFFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15997&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - RO Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=4080&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=6216&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=9830&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11472&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12440&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=27008&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=47742&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4123&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6211&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6212&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7509&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7793&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10341&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11317&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11473&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11730&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11945&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12561&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12762&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33254&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47051&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - NL, BE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=4080&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=6216&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=9830&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11472&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12440&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=27008&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=47742&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4123&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6211&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6212&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7509&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7793&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10341&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11317&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11473&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11730&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11945&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12561&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12762&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33254&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM6DQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47051&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - NL, BE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP_EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11677&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - SK Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP_EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=7232&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - SK Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP_EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7000&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - SK Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPbEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=10323&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - LT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPbEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10376&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - LT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPbEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11722&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - LT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPbEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11723&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji cream - LT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPbEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12816&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji cream - LT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JO" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPAMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30287&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - JO Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JO" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPAMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30721&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - JO Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16145&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16146&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22324&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22325&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22327&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=22328&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - SG Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16123&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16124&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17765&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21964&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21965&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21967&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - SG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOIHQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21969&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - SG Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46901&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46900&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12007&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=9170&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - CY, GR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9144&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10174&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15052&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - CY, GR Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "255" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46901&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46900&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12007&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=9170&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - CY, GR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "296" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9144&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10174&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Goji Cream - CY, GR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15052&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Goji Cream - CY, GR Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "YY" && $link == "296" ) { 
    $urls = array(
        "&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // XXX Pre-landing
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
if ( $country == "VN" && $link == "255" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1091&aff_id=10787&pid=78766&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=direct-offer&mbbr=1&pof=1&aof=1" // VN-GoSlimmer-Desktop (ID: 1091) Landing
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