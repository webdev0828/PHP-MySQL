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
if ( $country == "IT" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=3918&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=4200&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=4507&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=12062&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=12063&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=17624&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=17625&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=17626&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1107&aff_id=10787&pid=70954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Mobile (ID: 1107)
        "https://gltrak.com/aff_c2.php?offer_id=1107&aff_id=10787&pid=70951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Mobile (ID: 1107)
        "https://gltrak.com/aff_c2.php?offer_id=1261&aff_id=10787&pid=83509&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // IT-LaserSharpener-Mobile (ID: 1261)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1125&aff_id=10787&pid=73064&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Mobile (ID: 1125)
        "https://gltrak.com/aff_c2.php?offer_id=1125&aff_id=10787&pid=73067&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Mobile (ID: 1125)
        "https://gltrak.com/aff_c2.php?offer_id=1036&aff_id=10787&pid=61956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-EnergySaverECO-Mobile (ID: 1036)
        "https://gltrak.com/aff_c2.php?offer_id=1036&aff_id=10787&pid=61889&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // HR-EnergySaverECO-Mobile (ID: 1036)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1214&aff_id=10787&pid=77910&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // PT-TeslaSaverECO-Mobile (ID: 1214)
        "https://gltrak.com/aff_c2.php?offer_id=1214&aff_id=10787&pid=77878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // PT-TeslaSaverECO-Mobile (ID: 1214)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1212&aff_id=10787&pid=77819&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-TeslaSaverECO-Mobile (ID: 1212)
        "https://gltrak.com/aff_c2.php?offer_id=1212&aff_id=10787&pid=77821&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // SI-TeslaSaverECO-Mobile (ID: 1212)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1143&aff_id=10787&pid=73313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-TeslaSaverECO-Mobile (ID: 1143)
        "https://gltrak.com/aff_c2.php?offer_id=1143&aff_id=10787&pid=73228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // LV-TeslaSaverECO-Mobile (ID: 1143)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12696&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - CY, GR" ID: 6199
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12787&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - CY, GR" ID: 6199
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1137&aff_id=10787&pid=73085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-TeslaSaverECO-Mobile (ID: 1137)
        "https://gltrak.com/aff_c2.php?offer_id=1137&aff_id=10787&pid=73234&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // GR-TeslaSaverECO-Mobile (ID: 1137)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1135&aff_id=10787&pid=73083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-TeslaSaverECO-Mobile (ID: 1135)
        "https://gltrak.com/aff_c2.php?offer_id=1135&aff_id=10787&pid=73201&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // EE-TeslaSaverECO-Mobile (ID: 1135)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1133&aff_id=10787&pid=73076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // LT-TeslaSaverECO-Mobile (ID: 1133)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1131&aff_id=10787&pid=73080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-TeslaSaverECO-Mobile (ID: 1131)
        "https://gltrak.com/aff_c2.php?offer_id=1131&aff_id=10787&pid=73311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // RO-TeslaSaverECO-Mobile (ID: 1131)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1129&aff_id=10787&pid=73087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-TeslaSaverECO-Mobile (ID: 1129)
        "https://gltrak.com/aff_c2.php?offer_id=1129&aff_id=10787&pid=73264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // BG-TeslaSaverECO-Mobile (ID: 1129)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1127&aff_id=10787&pid=73072&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Mobile (ID: 1127)
        "https://gltrak.com/aff_c2.php?offer_id=1127&aff_id=10787&pid=73073&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // SK-TeslaSaverECO-Mobile (ID: 1127)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1126&aff_id=10787&pid=73070&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Mobile (ID: 1126)
        "https://gltrak.com/aff_c2.php?offer_id=1126&aff_id=10787&pid=73071&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1" // HU-TeslaSaverECO-Mobile (ID: 1126)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1085&aff_id=10787&pid=66682&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-TeslaSaverECO-Mobile (ID: 1085)
        "https://gltrak.com/aff_c2.php?offer_id=1085&aff_id=10787&pid=66680&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // PL-TeslaSaverECO-Mobile (ID: 1085)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1076&aff_id=10787&pid=66295&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Mobile (ID: 1076)
        "https://gltrak.com/aff_c2.php?offer_id=1076&aff_id=10787&pid=66342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1" // CZ-TeslaSaverECO-Mobile (ID: 1076)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMfDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12648&ap=3930&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - ES" ID: 3359
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMfDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12648&ap=4231&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - ES" ID: 3359
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMfDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12648&ap=9581&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - ES" ID: 3359
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28316&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30096&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30097&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30131&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30398&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30454&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30456&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4415&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13946&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14552&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15462&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15627&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16184&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17356&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23667&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24279&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28784&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33235&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
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
} elseif ( $country == "MY" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize WW CoolAirAC Whitehat
/*        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14580&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19011&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19484&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19488&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21126&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21127&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21647&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22311&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23303&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24604&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24763&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24947&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24948&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25033&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30786&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45724&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Offer "Power Factor Saver - MY" ID: 6995 */
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CN" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNNGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=14590&ap=14463&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Offer "Electricity Saving Box - CN" ID: 6989
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TW" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=14667&ap=14464&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Offer "Electricity Saving Box - TW" ID: 6992
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12696&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - CY, GR" ID: 6199
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12787&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Offer "Power Factor Saver - CY, GR" ID: 6199
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else { 
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
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
//geo target first with geo direct offer smartlinks or simply smartlinks if offers are good for this geo
if ( $country == "IT" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=3918&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=4200&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=4507&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=12062&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=12063&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=17624&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=17625&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMeDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12793&ap=17626&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - IT" ID: 3358
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1106&aff_id=10787&pid=70952&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Desktop (ID: 1106)
        "https://gltrak.com/aff_c2.php?offer_id=1106&aff_id=10787&pid=70950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-TeslaSaverECO-Desktop (ID: 1106)
        "https://gltrak.com/aff_c2.php?offer_id=1260&aff_id=10787&pid=83508&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // IT-LaserSharpener-Desktop (ID: 1260)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1075&aff_id=10787&pid=66294&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Desktop (ID: 1075)
        "https://gltrak.com/aff_c2.php?offer_id=1075&aff_id=10787&pid=66341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-TeslaSaverECO-Desktop (ID: 1075)
        "https://gltrak.com/aff_c2.php?offer_id=1039&aff_id=10787&pid=61888&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-EnergySaverECO-Desktop (ID: 1039)
        "https://gltrak.com/aff_c2.php?offer_id=1039&aff_id=10787&pid=61886&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-EnergySaverECO-Desktop (ID: 1039)
        "https://gltrak.com/aff_c2.php?offer_id=1219&aff_id=10787&pid=78713&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1" // CZ-LaserSharpener-Desktop (ID: 1219)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1071&aff_id=10787&pid=66063&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Desktop (ID: 1071)
        "https://gltrak.com/aff_c2.php?offer_id=1071&aff_id=10787&pid=66060&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-TeslaSaverECO-Desktop (ID: 1071)
        "https://gltrak.com/aff_c2.php?offer_id=1058&aff_id=10787&pid=62357&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-EnergySaverECO-Desktop (ID: 1058)
        "https://gltrak.com/aff_c2.php?offer_id=1058&aff_id=10787&pid=62359&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // SK-EnergySaverECO-Desktop (ID: 1058)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1070&aff_id=10787&pid=66062&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Desktop (ID: 1070)
        "https://gltrak.com/aff_c2.php?offer_id=1070&aff_id=10787&pid=66059&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-TeslaSaverECO-Desktop (ID: 1070)
        "https://gltrak.com/aff_c2.php?offer_id=1057&aff_id=10787&pid=62356&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-EnergySaverECO-Desktop (ID: 1057)
        "https://gltrak.com/aff_c2.php?offer_id=1057&aff_id=10787&pid=62358&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // HU-EnergySaverECO-Desktop (ID: 1057)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1069&aff_id=10787&pid=66061&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Desktop (ID: 1069)
        "https://gltrak.com/aff_c2.php?offer_id=1069&aff_id=10787&pid=66058&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-TeslaSaverECO-Desktop (ID: 1069)
        "https://gltrak.com/aff_c2.php?offer_id=1035&aff_id=10787&pid=61955&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-EnergySaverECO-Desktop (ID: 1035)
        "https://gltrak.com/aff_c2.php?offer_id=1035&aff_id=10787&pid=61887&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // HR-EnergySaverECO-Desktop (ID: 1035)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1213&aff_id=10787&pid=77889&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // PT-TeslaSaverECO-Desktop (ID: 1213)
        "https://gltrak.com/aff_c2.php?offer_id=1213&aff_id=10787&pid=77877&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // PT-TeslaSaverECO-Desktop (ID: 1213)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1211&aff_id=10787&pid=77818&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-TeslaSaverECO-Desktop (ID: 1211)
        "https://gltrak.com/aff_c2.php?offer_id=1211&aff_id=10787&pid=77820&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // SI-TeslaSaverECO-Desktop (ID: 1211)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1142&aff_id=10787&pid=73312&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-TeslaSaverECO-Desktop (ID: 1142)
        "https://gltrak.com/aff_c2.php?offer_id=1142&aff_id=10787&pid=73227&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // LV-TeslaSaverECO-Desktop (ID: 1142)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12696&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - CY, GR" ID: 6199
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12787&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - CY, GR" ID: 6199
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1136&aff_id=10787&pid=73084&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-TeslaSaverECO-Desktop (ID: 1136)
        "https://gltrak.com/aff_c2.php?offer_id=1136&aff_id=10787&pid=73233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // GR-TeslaSaverECO-Desktop (ID: 1136)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1134&aff_id=10787&pid=73081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-TeslaSaverECO-Desktop (ID: 1134)
        "https://gltrak.com/aff_c2.php?offer_id=1134&aff_id=10787&pid=73204&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // EE-TeslaSaverECO-Desktop (ID: 1134)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1132&aff_id=10787&pid=73075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-TeslaSaverECO-Desktop (ID: 1132)
        "https://gltrak.com/aff_c2.php?offer_id=1132&aff_id=10787&pid=73187&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // LT-TeslaSaverECO-Desktop (ID: 1132)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1130&aff_id=10787&pid=73079&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-TeslaSaverECO-Desktop (ID: 1130)
        "https://gltrak.com/aff_c2.php?offer_id=1130&aff_id=10787&pid=73310&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // RO-TeslaSaverECO-Desktop (ID: 1130)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1128&aff_id=10787&pid=73086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-TeslaSaverECO-Desktop (ID: 1128)
        "https://gltrak.com/aff_c2.php?offer_id=1128&aff_id=10787&pid=73263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // BG-TeslaSaverECO-Desktop (ID: 1128)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "https://gltrak.com/aff_c2.php?offer_id=1084&aff_id=10787&pid=66681&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-TeslaSaverECO-Desktop (ID: 1084)
        "https://gltrak.com/aff_c2.php?offer_id=1084&aff_id=10787&pid=66679&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // PL-TeslaSaverECO-Desktop (ID: 1084)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMfDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12648&ap=3930&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - ES" ID: 3359
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMfDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12648&ap=4231&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - ES" ID: 3359
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMfDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=12648&ap=9581&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - ES" ID: 3359
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2020.info/54618?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize iHeater ID: 7501
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28316&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30096&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30097&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30131&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30398&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30454&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP9MAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30456&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Electricity Saving Box - TH" ID: 12541
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4415&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13946&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14552&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15462&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15627&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16184&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17356&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23667&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24279&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28784&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQORDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33235&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Offer "Power Factor Saver - TH" ID: 3473
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
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
} elseif ( $country == "MY" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize WW CoolAirAC Whitehat
/*        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14580&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19011&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19484&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19488&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21126&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21127&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21647&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22311&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23303&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24604&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24763&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24947&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24948&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25033&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30786&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - MY" ID: 6995
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNTGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45724&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Offer "Power Factor Saver - MY" ID: 6995 */
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CN" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNNGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=14590&ap=14463&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Offer "Electricity Saving Box - CN" ID: 6989
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TW" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=14667&ap=14464&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Offer "Electricity Saving Box - TW" ID: 6992
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12696&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Offer "Power Factor Saver - CY, GR" ID: 6199
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM3GAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12787&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Offer "Power Factor Saver - CY, GR" ID: 6199
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/54621?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW Mosquitron Whitehat
        "http://ck.gl2021.info/54620?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize WW CoolAirAC Whitehat
        "http://ck.gl2022.info/52646?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize General smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>