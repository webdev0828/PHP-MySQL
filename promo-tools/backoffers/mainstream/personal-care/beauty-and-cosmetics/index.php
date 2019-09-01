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
        "https://1d5e04ea053.traffic-c.com/?wid=13684&wid_hmac=0acc3c161fd60046e42afcc770d53277&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13684 - DE/AT-3G/Wifi-Wonder Cells
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=13926&wid_hmac=b5f4f7f034dd583efa1a0ac5158cda7f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13926 - USA-RevivaBrainTrail
        "https://1d5e04ea053.traffic-c.com/?wid=13924&wid_hmac=4433d5866243d154afb9e61ac88fab4f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13924 - USA/CA-AntiAgeCream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13924&wid_hmac=4433d5866243d154afb9e61ac88fab4f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13924 - USA/CA-AntiAgeCream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13496&wid_hmac=e101feb365e576cdd63b34bad52c9ace&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13496 - IT-3G/WIFI-Anti Age
        "https://1d5e04ea053.traffic-c.com/?wid=10325&wid_hmac=204a8bb21a67ce9b6a367b194008d3a1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10325 - IT-3G/WIFI-LeReel
        "https://gltrak.com/aff_c2.php?offer_id=981&aff_id=10787&pid=59774&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-RectiStop-Mobile (ID: 981)
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=48837&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Mobile (ID: 740)
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=60359&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Mobile (ID: 740)
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=54076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Mobile (ID: 740)
        "https://gltrak.com/aff_c2.php?offer_id=740&aff_id=10787&pid=48839&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Mobile (ID: 740)
        "https://gltrak.com/aff_c2.php?offer_id=1094&aff_id=10787&pid=70949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-CleoLUX-Mobile (ID: 1094)
        "https://gltrak.com/aff_c2.php?offer_id=1094&aff_id=10787&pid=69350&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-CleoLUX-Mobile (ID: 1094)
        "https://gltrak.com/aff_c2.php?offer_id=1094&aff_id=10787&pid=70948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-CleoLUX-Mobile (ID: 1094)
        "https://gltrak.com/aff_c2.php?offer_id=1094&aff_id=10787&pid=69343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-CleoLUX-Mobile (ID: 1094)
        "https://1d5e04ea053.traffic-c.com/?wid=10203&wid_hmac=f730df36cce266825dd0f26cd5f495e1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10203 - IT-3G/WIFI_Lumiskin
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26588&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35436&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - IT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR         
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://gltrak.com/aff_c2.php?offer_id=1027&aff_id=10787&pid=60934&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-RectiStop-Mobile (ID: 1027)
        "https://gltrak.com/aff_c2.php?offer_id=1027&aff_id=10787&pid=60903&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-RectiStop-Mobile (ID: 1027)
        "https://1d5e04ea053.traffic-c.com/?wid=10317&wid_hmac=3712d0978eef472936f049e33f8fe6f7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10317 - GR-3G/WIFI-LeReel
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=424&aff_id=10787&pid=45336&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Mobile (ID: 424)
        "https://gltrak.com/aff_c2.php?offer_id=424&aff_id=10787&pid=47487&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Mobile (ID: 424)
        "https://gltrak.com/aff_c2.php?offer_id=1028&aff_id=10787&pid=60932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-RectiStop-Mobile (ID: 1028)
        "https://gltrak.com/aff_c2.php?offer_id=1028&aff_id=10787&pid=60904&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-RectiStop-Mobile (ID: 1028)
        "https://gltrak.com/aff_c2.php?offer_id=565&aff_id=10787&pid=54077&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Mobile (ID: 565)
        "https://gltrak.com/aff_c2.php?offer_id=565&aff_id=10787&pid=45381&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Mobile (ID: 565)
        "https://gltrak.com/aff_c2.php?offer_id=565&aff_id=10787&pid=47501&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Mobile (ID: 565)
        "https://1d5e04ea053.traffic-c.com/?wid=13712&wid_hmac=ccfda9a02d38c750ff01f9902a699b10&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13712 - RS-3G/Wifi-Fresh
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13693&wid_hmac=22992bc34ec8f5e0538ccc834a904319&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13693 - MX-3G/Wifi-Goji Cream
        "https://1d5e04ea053.traffic-c.com/?wid=13711&wid_hmac=02ffeb6af000766c31461603782e643a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13711 - MX-3G/Wifi-Gialuron
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13482&wid_hmac=6c790069573521ec3dda1a5844977ff9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13482 - NL-3G/WIFI-Collagen (Prelander)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=13695&wid_hmac=d7b1e95409b38d7821f8e10722b517f8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13695 - PT-3G/Wifi-Mulberry
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13694&wid_hmac=c065be6c3041f81b3000142b0bd824fe&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13694 - CL-3G/Wifi-Princess Mask
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13689&wid_hmac=fad2967a16494ce58b2a7de381c6bb79&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13689 - TH-3G/Wifi-Goji Cream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13688&wid_hmac=3130e46cbe0dc22dd757971dc92b0956&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13688 - PE-3G/Wifi-Goji Cream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13684&wid_hmac=0acc3c161fd60046e42afcc770d53277&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13684 - DE/AT-3G/Wifi-Wonder Cells
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=13444&wid_hmac=86c41ae81bc6a9be8f14bb0491255058&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13444 - ES-3G/WIFI-Deeper Gel
        "https://1d5e04ea053.traffic-c.com/?wid=10314&wid_hmac=9a81de541c3172d524bd4daac9b320e3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10314 - ES-3G/WIFI-Lumiskin
        "https://1d5e04ea053.traffic-c.com/?wid=10313&wid_hmac=b5ad87ccede54d926088b2eb72fe9512&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10313 - ES-3G/WIFI-LeReel
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=26525&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36672&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36673&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - ES
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOrLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26135&ap=26535&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - FR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);    
} elseif ( $country == "SK" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=10334&wid_hmac=d850c1b9ae1e58a090d35920f922b4e4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10334 - SK-3G/WIFI-Lumiskin
        "https://gltrak.com/aff_c2.php?offer_id=430&aff_id=10787&pid=45333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Mobile (ID: 430)
        "https://gltrak.com/aff_c2.php?offer_id=1011&aff_id=10787&pid=60360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Mobile (ID: 1011)
        "https://gltrak.com/aff_c2.php?offer_id=1011&aff_id=10787&pid=62590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Mobile (ID: 1011)
        "https://gltrak.com/aff_c2.php?offer_id=1011&aff_id=10787&pid=60918&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Mobile (ID: 1011)
        "https://gltrak.com/aff_c2.php?offer_id=1004&aff_id=10787&pid=60327&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-RectiStop-Mobile (ID: 1004)
        "https://gltrak.com/aff_c2.php?offer_id=1081&aff_id=10787&pid=66678&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-CleoLUX-Mobile (ID: 1081)
        "https://gltrak.com/aff_c2.php?offer_id=1081&aff_id=10787&pid=66686&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-CleoLUX-Mobile (ID: 1081)
        "https://1d5e04ea053.traffic-c.com/?wid=10331&wid_hmac=c57b6f76b9db75bbf410f23ba48f64ce&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 10331 - SK-3G/WIFI-LeReel
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://gltrak.com/aff_c2.php?offer_id=1087&aff_id=10787&pid=68496&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Mobile (ID: 1087)
        "https://1d5e04ea053.traffic-c.com/?wid=10328&wid_hmac=405b02dcd344e1792c7bf7742e926188&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 10328 - RO-3G/WIFI-LeReel
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1172&aff_id=10787&pid=74341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-HeiwaZEN-Mobile (ID: 1172)
        "https://gltrak.com/aff_c2.php?offer_id=1172&aff_id=10787&pid=74343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-HeiwaZEN-Mobile (ID: 1172)
        "https://gltrak.com/aff_c2.php?offer_id=1010&aff_id=10787&pid=60361&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Mobile (ID: 1010)
        "https://gltrak.com/aff_c2.php?offer_id=999&aff_id=10787&pid=60338&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Mobile (ID: 999)
        "https://gltrak.com/aff_c2.php?offer_id=980&aff_id=10787&pid=59780&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-RectiStop-Mobile (ID: 980)
        "https://gltrak.com/aff_c2.php?offer_id=980&aff_id=10787&pid=59850&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-RectiStop-Mobile (ID: 980)
        "https://gltrak.com/aff_c2.php?offer_id=1092&aff_id=10787&pid=69349&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CleoLUX-Mobile (ID: 1092)
        "https://gltrak.com/aff_c2.php?offer_id=1092&aff_id=10787&pid=69342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CleoLUX-Mobile (ID: 1092)
        "https://1d5e04ea053.traffic-c.com/?wid=10320&wid_hmac=cfacc0b3c0ae7bf4759e2fdf4ba36703&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10320 - HU-3G/WIFI-LeReel
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35439&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - HU
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=10310&wid_hmac=c07d59cc493398abe637ea020c11ef08&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10310 - CZ-3G/WIFI-Lumiskin
        "https://gltrak.com/aff_c2.php?offer_id=1223&aff_id=10787&pid=78982&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-HeiwaZEN-Mobile (ID: 1223)
        "https://gltrak.com/aff_c2.php?offer_id=1223&aff_id=10787&pid=78988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-HeiwaZEN-Mobile (ID: 1223)
        "https://gltrak.com/aff_c2.php?offer_id=983&aff_id=10787&pid=69346&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-RectiStop-Mobile (ID: 983)
        "https://gltrak.com/aff_c2.php?offer_id=983&aff_id=10787&pid=69337&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-RectiStop-Mobile (ID: 983)
        "https://gltrak.com/aff_c2.php?offer_id=739&aff_id=10787&pid=54075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Mobile (ID: 739)
        "https://gltrak.com/aff_c2.php?offer_id=739&aff_id=10787&pid=48836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Mobile (ID: 739)
        "https://gltrak.com/aff_c2.php?offer_id=739&aff_id=10787&pid=48838&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Mobile (ID: 739)
        "https://gltrak.com/aff_c2.php?offer_id=1095&aff_id=10787&pid=69347&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-CleoLUX-Mobile (ID: 1095)
        "https://gltrak.com/aff_c2.php?offer_id=1095&aff_id=10787&pid=69340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-CleoLUX-Mobile (ID: 1095)
        "https://1d5e04ea053.traffic-c.com/?wid=10308&wid_hmac=4015569290e096d10555e4dcf389eac0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10308 - CZ-3G/WIFI-LeReel      
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26142&ap=26536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CZ
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=984&aff_id=10787&pid=59847&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Mobile (ID: 984)
        "https://gltrak.com/aff_c2.php?offer_id=1009&aff_id=10787&pid=60322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-RectiStop-Mobile (ID: 1009)
        "https://gltrak.com/aff_c2.php?offer_id=1009&aff_id=10787&pid=60342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-RectiStop-Mobile (ID: 1009)
        "https://gltrak.com/aff_c2.php?offer_id=778&aff_id=10787&pid=61932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Mobile (ID: 778)
        "https://gltrak.com/aff_c2.php?offer_id=778&aff_id=10787&pid=54073&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Mobile (ID: 778)
        "https://gltrak.com/aff_c2.php?offer_id=412&aff_id=10787&pid=45324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Mobile (ID: 412)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26526&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Waist Trainer - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Waist Trainer - BG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=827&aff_id=10787&pid=58172&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Mobile (ID: 827)
        "https://gltrak.com/aff_c2.php?offer_id=796&aff_id=10787&pid=54470&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-NeckSlim-desktop (ID: 796)
        "https://gltrak.com/aff_c2.php?offer_id=796&aff_id=10787&pid=60901&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-NeckSlim-desktop (ID: 796)
        "https://gltrak.com/aff_c2.php?offer_id=418&aff_id=10787&pid=60335&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Mobile (ID: 418)
        "https://gltrak.com/aff_c2.php?offer_id=1019&aff_id=10787&pid=60595&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Mobile (ID: 1019)
        "https://gltrak.com/aff_c2.php?offer_id=1019&aff_id=10787&pid=60919&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Mobile (ID: 1019)
        "https://gltrak.com/aff_c2.php?offer_id=882&aff_id=10787&pid=60915&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Mobile (ID: 882)
        "https://gltrak.com/aff_c2.php?offer_id=882&aff_id=10787&pid=58346&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Mobile (ID: 882)
        "https://gltrak.com/aff_c2.php?offer_id=882&aff_id=10787&pid=58936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Mobile (ID: 882)
        "https://gltrak.com/aff_c2.php?offer_id=1093&aff_id=10787&pid=69348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-CleoLUX-Mobile (ID: 1093)
        "https://gltrak.com/aff_c2.php?offer_id=1093&aff_id=10787&pid=69341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-CleoLUX-Mobile (ID: 1093)
        "https://gltrak.com/aff_c2.php?offer_id=418&aff_id=10787&pid=45330&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // HR-StarSilkPro-Mobile (ID: 418)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1040&aff_id=10787&pid=61934&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Mobile (ID: 1040)
        "https://gltrak.com/aff_c2.php?offer_id=1040&aff_id=10787&pid=61903&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Mobile (ID: 1040)
        "https://gltrak.com/aff_c2.php?offer_id=1007&aff_id=10787&pid=60324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1" // LT-RectiStop-Mobile (ID: 1007)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1018&aff_id=10787&pid=61935&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Mobile (ID: 1018)
        "https://gltrak.com/aff_c2.php?offer_id=1018&aff_id=10787&pid=61904&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Mobile (ID: 1018)
        "https://gltrak.com/aff_c2.php?offer_id=1008&aff_id=10787&pid=60325&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-RectiStop-Mobile (ID: 1008)
        "https://gltrak.com/aff_c2.php?offer_id=1105&aff_id=10787&pid=70549&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-CleoLUX-Mobile (ID: 1105)
        "https://gltrak.com/aff_c2.php?offer_id=1105&aff_id=10787&pid=70541&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-CleoLUX-Mobile (ID: 1105)
        "https://gltrak.com/aff_c2.php?offer_id=1008&aff_id=10787&pid=62584&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // LV-RectiStop-Mobile (ID: 1008)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1041&aff_id=10787&pid=61933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Mobile (ID: 1041)
        "https://gltrak.com/aff_c2.php?offer_id=1041&aff_id=10787&pid=61902&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Mobile (ID: 1041)
        "https://gltrak.com/aff_c2.php?offer_id=1006&aff_id=10787&pid=60323&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-RectiStop-Mobile (ID: 1006)
        "https://gltrak.com/aff_c2.php?offer_id=1103&aff_id=10787&pid=70547&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-CleoLUX-Mobile (ID: 1103)
        "https://gltrak.com/aff_c2.php?offer_id=1103&aff_id=10787&pid=70545&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // EE-CleoLUX-Mobile (ID: 1103)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1050&aff_id=10787&pid=62233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Mobile (ID: 1050)
        "https://gltrak.com/aff_c2.php?offer_id=903&aff_id=10787&pid=58952&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-RectiStop-Mobile (ID: 903)
        "https://gltrak.com/aff_c2.php?offer_id=1083&aff_id=10787&pid=66684&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-CleoLUX-Mobile (ID: 1083)
        "https://gltrak.com/aff_c2.php?offer_id=1083&aff_id=10787&pid=66676&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-CleoLUX-Mobile (ID: 1083)
        "https://gltrak.com/aff_c2.php?offer_id=903&aff_id=10787&pid=58937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // SI-RectiStop-Mobile (ID: 903)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://gltrak.com/aff_c2.php?offer_id=1005&aff_id=10787&pid=60326&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-RectiStop-Mobile (ID: 1005)
        "https://gltrak.com/aff_c2.php?offer_id=1164&aff_id=10787&pid=73989&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Mobile (ID: 1164)
        "https://gltrak.com/aff_c2.php?offer_id=1164&aff_id=10787&pid=73988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=backoffer&mbbr=1&pof=1&aof=1" // PL-VeinStopper-Mobile (ID: 1164)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=406&aff_id=10787&pid=45327&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Mobile (ID: 406)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNaQQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Spa - BA
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize Make-up
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to backoffers after geo target
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=backoffer&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BitterStrawberry mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream backoffer
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
        "https://1d5e04ea053.traffic-c.com/?wid=13684&wid_hmac=0acc3c161fd60046e42afcc770d53277&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13684 - DE/AT-3G/Wifi-Wonder Cells
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=13926&wid_hmac=b5f4f7f034dd583efa1a0ac5158cda7f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13926 - USA-RevivaBrainTrail
        "https://1d5e04ea053.traffic-c.com/?wid=13924&wid_hmac=4433d5866243d154afb9e61ac88fab4f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13924 - USA/CA-AntiAgeCream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13924&wid_hmac=4433d5866243d154afb9e61ac88fab4f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13924 - USA/CA-AntiAgeCream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13496&wid_hmac=e101feb365e576cdd63b34bad52c9ace&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13496 - IT-3G/WIFI-Anti Age
        "https://1d5e04ea053.traffic-c.com/?wid=10325&wid_hmac=204a8bb21a67ce9b6a367b194008d3a1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10325 - IT-3G/WIFI-LeReel
        "https://1d5e04ea053.traffic-c.com/?wid=10203&wid_hmac=f730df36cce266825dd0f26cd5f495e1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10203 - IT-3G/WIFI_Lumiskin
        "https://gltrak.com/aff_c2.php?offer_id=777&aff_id=10787&pid=53521&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VivalProB-Desktop (ID: 777)
        "https://gltrak.com/aff_c2.php?offer_id=807&aff_id=10787&pid=54472&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-NeckSlim-desktop (ID: 807)
        "https://gltrak.com/aff_c2.php?offer_id=712&aff_id=10787&pid=45525&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-EyelashStar-Desktop (ID: 712)
        "https://gltrak.com/aff_c2.php?offer_id=712&aff_id=10787&pid=46635&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-EyelashStar-Desktop (ID: 712)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60912&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=58343&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=57605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=60911&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=532&aff_id=10787&pid=46599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-ViperVenomAktiv-Desktop (ID: 532)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=53403&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=830&aff_id=10787&pid=57620&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-PushUpBreast-Desktop (ID: 830)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=45354&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=46557&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
        "https://gltrak.com/aff_c2.php?offer_id=862&aff_id=10787&pid=57085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-RectiStop-Desktop (ID: 862)
        "https://gltrak.com/aff_c2.php?offer_id=862&aff_id=10787&pid=59845&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-RectiStop-Desktop (ID: 862)
        "https://gltrak.com/aff_c2.php?offer_id=862&aff_id=10787&pid=57229&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-RectiStop-Desktop (ID: 862)
        "https://gltrak.com/aff_c2.php?offer_id=808&aff_id=10787&pid=54484&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-FootFixPro-Desktop (ID: 808)
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=45405&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589)
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=56849&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589)
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=51322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589)
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=53397&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589)
        "https://gltrak.com/aff_c2.php?offer_id=589&aff_id=10787&pid=45954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-VeinStopper-Desktop (ID: 589)
        "https://gltrak.com/aff_c2.php?offer_id=1073&aff_id=10787&pid=66066&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-CleoLUX-Desktop (ID: 1073)
        "https://gltrak.com/aff_c2.php?offer_id=1073&aff_id=10787&pid=65895&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-CleoLUX-Desktop (ID: 1073)
        "https://gltrak.com/aff_c2.php?offer_id=445&aff_id=10787&pid=46530&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // IT-StarSilkPro-Desktop (ID: 445)
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26588&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35436&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - IT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=10317&wid_hmac=3712d0978eef472936f049e33f8fe6f7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10317 - GR-3G/WIFI-LeReel
        "https://gltrak.com/aff_c2.php?offer_id=811&aff_id=10787&pid=54469&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-NeckSlim-desktop (ID: 811)
        "https://gltrak.com/aff_c2.php?offer_id=811&aff_id=10787&pid=60900&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-NeckSlim-desktop (ID: 811)
        "https://gltrak.com/aff_c2.php?offer_id=703&aff_id=10787&pid=45516&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-EyelashStar-Desktop (ID: 703)
        "https://gltrak.com/aff_c2.php?offer_id=703&aff_id=10787&pid=46626&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-EyelashStar-Desktop (ID: 703)
        "https://gltrak.com/aff_c2.php?offer_id=661&aff_id=10787&pid=45480&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-VivalProB-Desktop (ID: 661)
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=60921&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523)
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=44863&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523)
        "https://gltrak.com/aff_c2.php?offer_id=523&aff_id=10787&pid=46590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-ViperVenomAktiv-Desktop (ID: 523)
        "https://gltrak.com/aff_c2.php?offer_id=871&aff_id=10787&pid=57411&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-RectiStop-Desktop (ID: 871)
        "https://gltrak.com/aff_c2.php?offer_id=871&aff_id=10787&pid=57610&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-RectiStop-Desktop (ID: 871)
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=57246&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-VeinStopper-Desktop (ID: 580)
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=45396&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-VeinStopper-Desktop (ID: 580)
        "https://gltrak.com/aff_c2.php?offer_id=580&aff_id=10787&pid=45945&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-VeinStopper-Desktop (ID: 580)
        "https://gltrak.com/aff_c2.php?offer_id=439&aff_id=10787&pid=53074&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-StarSilkPro-Desktop (ID: 439)
        "https://gltrak.com/aff_c2.php?offer_id=439&aff_id=10787&pid=45348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-StarSilkPro-Desktop (ID: 439)
        "https://gltrak.com/aff_c2.php?offer_id=439&aff_id=10787&pid=46548&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // GR-StarSilkPro-Desktop (ID: 439)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=795&aff_id=10787&pid=54480&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-NeckSlim-desktop (ID: 795)
        "https://gltrak.com/aff_c2.php?offer_id=795&aff_id=10787&pid=60938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-NeckSlim-desktop (ID: 795)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=50967&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=45540&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=51313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=721&aff_id=10787&pid=46650&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-EyelashStar-Desktop (ID: 721)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=50970&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=45510&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=51312&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=685&aff_id=10787&pid=47863&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VivalProB-Desktop (ID: 685)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=50969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=44896&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=51317&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=550&aff_id=10787&pid=46617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-ViperVenomAktiv-Desktop (ID: 550)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=50962&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=45375&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=61938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=51318&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=46578&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=421&aff_id=10787&pid=46533&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-StarSilkPro-Desktop (ID: 421)
        "https://gltrak.com/aff_c2.php?offer_id=860&aff_id=10787&pid=57092&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-RectiStop-Desktop (ID: 860)
        "https://gltrak.com/aff_c2.php?offer_id=860&aff_id=10787&pid=57231&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-RectiStop-Desktop (ID: 860)
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=57382&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568)
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=50965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568)
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=45426&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568)
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=51315&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568)
        "https://gltrak.com/aff_c2.php?offer_id=568&aff_id=10787&pid=47498&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-VeinStopper-Desktop (ID: 568)
        "https://gltrak.com/aff_c2.php?offer_id=829&aff_id=10787&pid=57532&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PushUpBreast-Desktop (ID: 829)
        "https://gltrak.com/aff_c2.php?offer_id=829&aff_id=10787&pid=61937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RS-PushUpBreast-Desktop (ID: 829)
        "https://1d5e04ea053.traffic-c.com/?wid=13712&wid_hmac=ccfda9a02d38c750ff01f9902a699b10&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13712 - RS-3G/Wifi-Fresh
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13693&wid_hmac=22992bc34ec8f5e0538ccc834a904319&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13693 - MX-3G/Wifi-Goji Cream
        "https://1d5e04ea053.traffic-c.com/?wid=13711&wid_hmac=02ffeb6af000766c31461603782e643a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13711 - MX-3G/Wifi-Gialuron
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13482&wid_hmac=6c790069573521ec3dda1a5844977ff9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13482 - NL-3G/WIFI-Collagen (Prelander)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=13695&wid_hmac=d7b1e95409b38d7821f8e10722b517f8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13695 - PT-3G/Wifi-Mulberry
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13694&wid_hmac=c065be6c3041f81b3000142b0bd824fe&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13694 - CL-3G/Wifi-Princess Mask
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13689&wid_hmac=fad2967a16494ce58b2a7de381c6bb79&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13689 - TH-3G/Wifi-Goji Cream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13688&wid_hmac=3130e46cbe0dc22dd757971dc92b0956&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13688 - PE-3G/Wifi-Goji Cream
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13684&wid_hmac=0acc3c161fd60046e42afcc770d53277&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13684 - DE/AT-3G/Wifi-Wonder Cells
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://1d5e04ea053.traffic-c.com/?wid=13444&wid_hmac=86c41ae81bc6a9be8f14bb0491255058&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13444 - ES-3G/WIFI-Deeper Gel
        "https://1d5e04ea053.traffic-c.com/?wid=10314&wid_hmac=9a81de541c3172d524bd4daac9b320e3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10314 - ES-3G/WIFI-Lumiskin
        "https://1d5e04ea053.traffic-c.com/?wid=10313&wid_hmac=b5ad87ccede54d926088b2eb72fe9512&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10313 - ES-3G/WIFI-LeReel
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=26525&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36672&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36673&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - ES
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOrLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26135&ap=26535&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - FR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);        
} elseif ( $country == "SK" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=10334&wid_hmac=d850c1b9ae1e58a090d35920f922b4e4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10334 - SK-3G/WIFI-Lumiskin
        "https://gltrak.com/aff_c2.php?offer_id=836&aff_id=10787&pid=57928&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-PushUpBreast-Desktop (ID: 836)
        "https://gltrak.com/aff_c2.php?offer_id=809&aff_id=10787&pid=54478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-NeckSlim-desktop (ID: 809)
        "https://gltrak.com/aff_c2.php?offer_id=809&aff_id=10787&pid=60936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-NeckSlim-desktop (ID: 809)
        "https://gltrak.com/aff_c2.php?offer_id=727&aff_id=10787&pid=45534&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-EyelashStar-Desktop (ID: 727)
        "https://gltrak.com/aff_c2.php?offer_id=1080&aff_id=10787&pid=66677&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-CleoLUX-Desktop (ID: 1080)
        "https://gltrak.com/aff_c2.php?offer_id=1080&aff_id=10787&pid=66685&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-CleoLUX-Desktop (ID: 1080)
        "https://gltrak.com/aff_c2.php?offer_id=727&aff_id=10787&pid=46644&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-EyelashStar-Desktop (ID: 727)
        "https://gltrak.com/aff_c2.php?offer_id=691&aff_id=10787&pid=45504&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VivalProB-Desktop (ID: 691)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=58344&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=44890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=59781&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=556&aff_id=10787&pid=46611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-ViperVenomAktiv-Desktop (ID: 556)
        "https://gltrak.com/aff_c2.php?offer_id=427&aff_id=10787&pid=53082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Desktop (ID: 427)
        "https://gltrak.com/aff_c2.php?offer_id=427&aff_id=10787&pid=45369&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Desktop (ID: 427)
        "https://gltrak.com/aff_c2.php?offer_id=869&aff_id=10787&pid=57090&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-RectiStop-Desktop (ID: 869)
        "https://gltrak.com/aff_c2.php?offer_id=869&aff_id=10787&pid=57372&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-RectiStop-Desktop (ID: 869)
        "https://gltrak.com/aff_c2.php?offer_id=810&aff_id=10787&pid=54485&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-FootFixPro-Desktop (ID: 810)
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=57077&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607)
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=53402&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607)
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=45420&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607)
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=61964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607)
        "https://gltrak.com/aff_c2.php?offer_id=607&aff_id=10787&pid=45972&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-VeinStopper-Desktop (ID: 607)
        "https://gltrak.com/aff_c2.php?offer_id=427&aff_id=10787&pid=46572&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SK-StarSilkPro-Desktop (ID: 427)
        "https://1d5e04ea053.traffic-c.com/?wid=10331&wid_hmac=c57b6f76b9db75bbf410f23ba48f64ce&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 10331 - SK-3G/WIFI-LeReel
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://gltrak.com/aff_c2.php?offer_id=821&aff_id=10787&pid=57051&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-XtremeProWhite-Desktop (ID: 821)
        "https://gltrak.com/aff_c2.php?offer_id=806&aff_id=10787&pid=54477&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-NeckSlim-desktop (ID: 806)
        "https://gltrak.com/aff_c2.php?offer_id=806&aff_id=10787&pid=60935&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-NeckSlim-desktop (ID: 806)
        "https://gltrak.com/aff_c2.php?offer_id=718&aff_id=10787&pid=45531&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-EyelashStar-Desktop (ID: 718)
        "https://gltrak.com/aff_c2.php?offer_id=718&aff_id=10787&pid=46641&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-EyelashStar-Desktop (ID: 718)
        "https://gltrak.com/aff_c2.php?offer_id=682&aff_id=10787&pid=45501&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-VivalProB-Desktop (ID: 682)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=68495&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=56931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=44887&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=547&aff_id=10787&pid=46608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-ViperVenomAktiv-Desktop (ID: 547)
        "https://gltrak.com/aff_c2.php?offer_id=457&aff_id=10787&pid=45366&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-StarSilkPro-Desktop (ID: 457)
        "https://gltrak.com/aff_c2.php?offer_id=457&aff_id=10787&pid=53081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-StarSilkPro-Desktop (ID: 457)
        "https://gltrak.com/aff_c2.php?offer_id=861&aff_id=10787&pid=57089&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-RectiStop-Desktop (ID: 861)
        "https://gltrak.com/aff_c2.php?offer_id=861&aff_id=10787&pid=57230&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-RectiStop-Desktop (ID: 861)
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=58243&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601)
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=45417&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601)
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=53401&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601)
        "https://gltrak.com/aff_c2.php?offer_id=601&aff_id=10787&pid=45969&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-VeinStopper-Desktop (ID: 601)
        "https://gltrak.com/aff_c2.php?offer_id=457&aff_id=10787&pid=46569&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-StarSilkPro-Desktop (ID: 457)
        "https://gltrak.com/aff_c2.php?offer_id=822&aff_id=10787&pid=57071&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=backoffer&mbbr=1&pof=1&aof=1", // RO-PushUpBreast-Desktop (ID: 822)
        "https://1d5e04ea053.traffic-c.com/?wid=10328&wid_hmac=405b02dcd344e1792c7bf7742e926188&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 10328 - RO-3G/WIFI-LeReel
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=1171&aff_id=10787&pid=74340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-HeiwaZEN-Desktop (ID: 1171)
        "https://gltrak.com/aff_c2.php?offer_id=1171&aff_id=10787&pid=74342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-HeiwaZEN-Desktop (ID: 1171)
        "https://gltrak.com/aff_c2.php?offer_id=802&aff_id=10787&pid=54471&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-NeckSlim-desktop (ID: 802)
        "https://gltrak.com/aff_c2.php?offer_id=709&aff_id=10787&pid=60365&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EyelashStar-Desktop (ID: 709)
        "https://gltrak.com/aff_c2.php?offer_id=709&aff_id=10787&pid=45522&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EyelashStar-Desktop (ID: 709)
        "https://gltrak.com/aff_c2.php?offer_id=709&aff_id=10787&pid=46632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-EyelashStar-Desktop (ID: 709)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=60478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=45486&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=61292&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=667&aff_id=10787&pid=47502&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VivalProB-Desktop (ID: 667)
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=58342&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Desktop (ID: 529)
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=44869&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Desktop (ID: 529)
        "https://gltrak.com/aff_c2.php?offer_id=529&aff_id=10787&pid=46596&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-ViperVenomAktiv-Desktop (ID: 529)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=53076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=45351&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=46554&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=442&aff_id=10787&pid=46527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-StarSilkPro-Desktop (ID: 442)
        "https://gltrak.com/aff_c2.php?offer_id=857&aff_id=10787&pid=57084&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-RectiStop-Desktop (ID: 857)
        "https://gltrak.com/aff_c2.php?offer_id=857&aff_id=10787&pid=59844&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-RectiStop-Desktop (ID: 857)
        "https://gltrak.com/aff_c2.php?offer_id=857&aff_id=10787&pid=57228&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-RectiStop-Desktop (ID: 857)
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=60337&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586)
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=53396&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586)
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=45402&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586)
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=60475&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586)
        "https://gltrak.com/aff_c2.php?offer_id=586&aff_id=10787&pid=45951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-VeinStopper-Desktop (ID: 586)
        "https://gltrak.com/aff_c2.php?offer_id=1079&aff_id=10787&pid=66338&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CleoLUX-Desktop (ID: 1079)
        "https://gltrak.com/aff_c2.php?offer_id=1079&aff_id=10787&pid=66340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-CleoLUX-Desktop (ID: 1079)
        "https://gltrak.com/aff_c2.php?offer_id=834&aff_id=10787&pid=60332&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PushUpBreast-Desktop (ID: 834)
        "https://gltrak.com/aff_c2.php?offer_id=834&aff_id=10787&pid=57844&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PushUpBreast-Desktop (ID: 834)
        "https://gltrak.com/aff_c2.php?offer_id=834&aff_id=10787&pid=61291&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HU-PushUpBreast-Desktop (ID: 834)
        "https://1d5e04ea053.traffic-c.com/?wid=10320&wid_hmac=cfacc0b3c0ae7bf4759e2fdf4ba36703&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10320 - HU-3G/WIFI-LeReel
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35439&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - HU        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=10310&wid_hmac=c07d59cc493398abe637ea020c11ef08&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10310 - CZ-3G/WIFI-Lumiskin
        "https://gltrak.com/aff_c2.php?offer_id=1222&aff_id=10787&pid=78981&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-HeiwaZEN-Desktop (ID: 1222)
        "https://gltrak.com/aff_c2.php?offer_id=1222&aff_id=10787&pid=78987&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-HeiwaZEN-Desktop (ID: 1222)
        "https://gltrak.com/aff_c2.php?offer_id=1020&aff_id=10787&pid=60587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-BlackMask-Desktop (ID: 1020)
        "https://gltrak.com/aff_c2.php?offer_id=1020&aff_id=10787&pid=60586&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-BlackMask-Desktop (ID: 1020)
        "https://gltrak.com/aff_c2.php?offer_id=906&aff_id=10787&pid=59038&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-GreyAway-Desktop (ID: 906)
        "https://gltrak.com/aff_c2.php?offer_id=906&aff_id=10787&pid=59037&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-GreyAway-Desktop (ID: 906)
        "https://gltrak.com/aff_c2.php?offer_id=804&aff_id=10787&pid=54467&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-NeckSlim-desktop (ID: 804)
        "https://gltrak.com/aff_c2.php?offer_id=804&aff_id=10787&pid=60899&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-NeckSlim-desktop (ID: 804)
        "https://gltrak.com/aff_c2.php?offer_id=700&aff_id=10787&pid=42791&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-EyelashStar-Desktop (ID: 700)
        "https://gltrak.com/aff_c2.php?offer_id=700&aff_id=10787&pid=46623&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-EyelashStar-Desktop (ID: 700)
        "https://gltrak.com/aff_c2.php?offer_id=655&aff_id=10787&pid=45474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VivalProB-Desktop (ID: 655)
        "https://gltrak.com/aff_c2.php?offer_id=655&aff_id=10787&pid=60313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VivalProB-Desktop (ID: 655)
        "https://gltrak.com/aff_c2.php?offer_id=655&aff_id=10787&pid=60313&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VivalProB-Desktop (ID: 655)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59528&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59466&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=44857&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=59527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=58631&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=517&aff_id=10787&pid=46587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-ViperVenomAktiv-Desktop (ID: 517)
        "https://gltrak.com/aff_c2.php?offer_id=433&aff_id=10787&pid=53072&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-StarSilkPro-Desktop (ID: 433)
        "https://gltrak.com/aff_c2.php?offer_id=433&aff_id=10787&pid=33542&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-StarSilkPro-Desktop (ID: 433)
        "https://gltrak.com/aff_c2.php?offer_id=433&aff_id=10787&pid=46545&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-StarSilkPro-Desktop (ID: 433)
        "https://gltrak.com/aff_c2.php?offer_id=136&aff_id=10787&pid=33536&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-AntiAcneGel-Desktop (ID: 136)
        "https://gltrak.com/aff_c2.php?offer_id=867&aff_id=10787&pid=57082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-RectiStop-Desktop (ID: 867)
        "https://gltrak.com/aff_c2.php?offer_id=867&aff_id=10787&pid=57370&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-RectiStop-Desktop (ID: 867)
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=55547&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Desktop (ID: 574)
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=45390&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Desktop (ID: 574)
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=60473&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Desktop (ID: 574)
        "https://gltrak.com/aff_c2.php?offer_id=574&aff_id=10787&pid=45939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-VeinStopper-Desktop (ID: 574)
        "https://gltrak.com/aff_c2.php?offer_id=1074&aff_id=10787&pid=66064&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-CleoLUX-Desktop (ID: 1074)
        "https://gltrak.com/aff_c2.php?offer_id=1074&aff_id=10787&pid=65893&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-CleoLUX-Desktop (ID: 1074)
        "https://gltrak.com/aff_c2.php?offer_id=835&aff_id=10787&pid=57986&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // CZ-PushUpBreast-Desktop (ID: 835)
        "https://1d5e04ea053.traffic-c.com/?wid=10308&wid_hmac=4015569290e096d10555e4dcf389eac0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10308 - CZ-3G/WIFI-LeReel
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26142&ap=26536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CZ
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=59846&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=22478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=46581&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=801&aff_id=10787&pid=54465&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-NeckSlim-desktop (ID: 801)
        "https://gltrak.com/aff_c2.php?offer_id=801&aff_id=10787&pid=60898&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-NeckSlim-desktop (ID: 801)
        "https://gltrak.com/aff_c2.php?offer_id=697&aff_id=10787&pid=45513&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-EyelashStar-Desktop (ID: 697)
        "https://gltrak.com/aff_c2.php?offer_id=652&aff_id=10787&pid=60312&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VivalProB-Desktop (ID: 652)
        "https://gltrak.com/aff_c2.php?offer_id=652&aff_id=10787&pid=45468&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VivalProB-Desktop (ID: 652)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=59846&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=22478&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=514&aff_id=10787&pid=46581&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-ViperVenomAktiv-Desktop (ID: 514)
        "https://gltrak.com/aff_c2.php?offer_id=409&aff_id=10787&pid=53070&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Desktop (ID: 409)
        "https://gltrak.com/aff_c2.php?offer_id=409&aff_id=10787&pid=45339&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Desktop (ID: 409)
        "https://gltrak.com/aff_c2.php?offer_id=863&aff_id=10787&pid=57080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-RectiStop-Desktop (ID: 863)
        "https://gltrak.com/aff_c2.php?offer_id=863&aff_id=10787&pid=62317&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-RectiStop-Desktop (ID: 863)
        "https://gltrak.com/aff_c2.php?offer_id=863&aff_id=10787&pid=57225&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-RectiStop-Desktop (ID: 863)
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=45384&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Desktop (ID: 571)
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=57074&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Desktop (ID: 571)
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=53394&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Desktop (ID: 571)
        "https://gltrak.com/aff_c2.php?offer_id=571&aff_id=10787&pid=45936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-VeinStopper-Desktop (ID: 571)
        "https://gltrak.com/aff_c2.php?offer_id=409&aff_id=10787&pid=46539&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // BG-StarSilkPro-Desktop (ID: 409)
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26526&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Waist Trainer - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Waist Trainer - BG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=828&aff_id=10787&pid=57261&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-AntifungalFootCream-Desktop (ID: 828)
        "https://gltrak.com/aff_c2.php?offer_id=828&aff_id=10787&pid=57386&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-AntifungalFootCream-Desktop (ID: 828)
        "https://gltrak.com/aff_c2.php?offer_id=1065&aff_id=10787&pid=62592&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-AntiAcneGel-Desktop (ID: 1065)
        "https://gltrak.com/aff_c2.php?offer_id=982&aff_id=10787&pid=60926&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BlackMask-Desktop (ID: 982)
        "https://gltrak.com/aff_c2.php?offer_id=982&aff_id=10787&pid=59776&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-BlackMask-Desktop (ID: 982)
        "https://gltrak.com/aff_c2.php?offer_id=907&aff_id=10787&pid=59088&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-GreyAway-Desktop (ID: 907)
        "https://gltrak.com/aff_c2.php?offer_id=907&aff_id=10787&pid=59087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-GreyAway-Desktop (ID: 907)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=61942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=60334&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=45519&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=706&aff_id=10787&pid=46629&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-EyelashStar-Desktop (ID: 706)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=58628&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=57251&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=45483&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=57380&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
        "https://gltrak.com/aff_c2.php?offer_id=664&aff_id=10787&pid=46755&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VivalProB-Desktop (ID: 664)
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
        "https://gltrak.com/aff_c2.php?offer_id=526&aff_id=10787&pid=46593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop17&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-ViperVenomAktiv-Desktop (ID: 526)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=62301&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=62322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=53075&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=6389&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=61929&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=46551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-StarSilkPro-Desktop (ID: 415)
        "https://gltrak.com/aff_c2.php?offer_id=870&aff_id=10787&pid=58508&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Desktop (ID: 870)
        "https://gltrak.com/aff_c2.php?offer_id=870&aff_id=10787&pid=57410&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Desktop (ID: 870)
        "https://gltrak.com/aff_c2.php?offer_id=870&aff_id=10787&pid=57254&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Desktop (ID: 870)
        "https://gltrak.com/aff_c2.php?offer_id=870&aff_id=10787&pid=58953&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Desktop (ID: 870)
        "https://gltrak.com/aff_c2.php?offer_id=870&aff_id=10787&pid=58954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Desktop (ID: 870)
        "https://gltrak.com/aff_c2.php?offer_id=870&aff_id=10787&pid=57374&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-RectiStop-Desktop (ID: 870)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=55545&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=55546&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=45399&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57375&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57268&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=57057&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=583&aff_id=10787&pid=45948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-VeinStopper-Desktop (ID: 583)
        "https://gltrak.com/aff_c2.php?offer_id=1072&aff_id=10787&pid=66065&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-CleoLUX-Desktop (ID: 1072)
        "https://gltrak.com/aff_c2.php?offer_id=1072&aff_id=10787&pid=65894&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-CleoLUX-Desktop (ID: 1072)
        "https://gltrak.com/aff_c2.php?offer_id=832&aff_id=10787&pid=57927&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // HR-PushUpBreast-Desktop (ID: 832)
        "https://gltrak.com/aff_c2.php?offer_id=415&aff_id=10787&pid=46524&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=backoffer&mbbr=1&pof=1&aof=1" // HR-StarSilkPro-Desktop (ID: 415)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=814&aff_id=10787&pid=54473&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-NeckSlim-desktop (ID: 814)
        "https://gltrak.com/aff_c2.php?offer_id=670&aff_id=10787&pid=45489&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VivalProB-Desktop (ID: 670)
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=44875&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-ViperVenomAktiv-Desktop (ID: 535)
        "https://gltrak.com/aff_c2.php?offer_id=535&aff_id=10787&pid=47511&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-ViperVenomAktiv-Desktop (ID: 535)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=53077&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=45357&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=61930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-StarSilkPro-Desktop (ID: 448)
        "https://gltrak.com/aff_c2.php?offer_id=859&aff_id=10787&pid=57086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-RectiStop-Desktop (ID: 859)
        "https://gltrak.com/aff_c2.php?offer_id=859&aff_id=10787&pid=57108&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-RectiStop-Desktop (ID: 859)
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=57811&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592)
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=53398&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592)
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=45408&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592)
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=60476&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592)
        "https://gltrak.com/aff_c2.php?offer_id=592&aff_id=10787&pid=45957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // LT-VeinStopper-Desktop (ID: 592)
        "https://gltrak.com/aff_c2.php?offer_id=448&aff_id=10787&pid=46560&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // LT-StarSilkPro-Desktop (ID: 448)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=813&aff_id=10787&pid=54474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-NeckSlim-desktop (ID: 813)
        "https://gltrak.com/aff_c2.php?offer_id=813&aff_id=10787&pid=60902&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-NeckSlim-desktop (ID: 813)
        "https://gltrak.com/aff_c2.php?offer_id=673&aff_id=10787&pid=60314&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VivalProB-Desktop (ID: 673)
        "https://gltrak.com/aff_c2.php?offer_id=673&aff_id=10787&pid=45492&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VivalProB-Desktop (ID: 673)
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=44878&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-ViperVenomAktiv-Desktop (ID: 538)
        "https://gltrak.com/aff_c2.php?offer_id=538&aff_id=10787&pid=47514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-ViperVenomAktiv-Desktop (ID: 538)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=53078&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=45360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=61940&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-StarSilkPro-Desktop (ID: 451)
        "https://gltrak.com/aff_c2.php?offer_id=872&aff_id=10787&pid=57798&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-RectiStop-Desktop (ID: 872)
        "https://gltrak.com/aff_c2.php?offer_id=872&aff_id=10787&pid=57803&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-RectiStop-Desktop (ID: 872)
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=57247&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595)
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=53399&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595)
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=45411&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595)
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=60594&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595)
        "https://gltrak.com/aff_c2.php?offer_id=595&aff_id=10787&pid=45960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-VeinStopper-Desktop (ID: 595)
        "https://gltrak.com/aff_c2.php?offer_id=1104&aff_id=10787&pid=70548&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-CleoLUX-Desktop (ID: 1104)
        "https://gltrak.com/aff_c2.php?offer_id=1104&aff_id=10787&pid=70540&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // LV-CleoLUX-Desktop (ID: 1104)
        "https://gltrak.com/aff_c2.php?offer_id=451&aff_id=10787&pid=47493&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // LV-StarSilkPro-Desktop (ID: 451)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=799&aff_id=10787&pid=54479&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-NeckSlim-desktop (ID: 799)
        "https://gltrak.com/aff_c2.php?offer_id=799&aff_id=10787&pid=60937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-NeckSlim-desktop (ID: 799)
        "https://gltrak.com/aff_c2.php?offer_id=724&aff_id=10787&pid=45537&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-EyelashStar-Desktop (ID: 724)
        "https://gltrak.com/aff_c2.php?offer_id=724&aff_id=10787&pid=46647&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-EyelashStar-Desktop (ID: 724)
        "https://gltrak.com/aff_c2.php?offer_id=688&aff_id=10787&pid=58951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VivalProB-Desktop (ID: 688)
        "https://gltrak.com/aff_c2.php?offer_id=688&aff_id=10787&pid=45507&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VivalProB-Desktop (ID: 688)
        "https://gltrak.com/aff_c2.php?offer_id=460&aff_id=10787&pid=53404&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-StarSilkPro-Desktop (ID: 460)
        "https://gltrak.com/aff_c2.php?offer_id=460&aff_id=10787&pid=45372&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-StarSilkPro-Desktop (ID: 460)
        "https://gltrak.com/aff_c2.php?offer_id=460&aff_id=10787&pid=61931&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-StarSilkPro-Desktop (ID: 460)
        "https://gltrak.com/aff_c2.php?offer_id=460&aff_id=10787&pid=46575&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-StarSilkPro-Desktop (ID: 460)
        "https://gltrak.com/aff_c2.php?offer_id=856&aff_id=10787&pid=57091&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-RectiStop-Desktop (ID: 856)
        "https://gltrak.com/aff_c2.php?offer_id=856&aff_id=10787&pid=57373&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-RectiStop-Desktop (ID: 856)
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=57531&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604)
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=57078&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604)
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=54122&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604)
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=61963&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=deskto4p&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-VeinStopper-Desktop (ID: 604)
        "https://gltrak.com/aff_c2.php?offer_id=1082&aff_id=10787&pid=66683&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-CleoLUX-Desktop (ID: 1082)
        "https://gltrak.com/aff_c2.php?offer_id=1082&aff_id=10787&pid=66675&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-CleoLUX-Desktop (ID: 1082)
        "https://gltrak.com/aff_c2.php?offer_id=833&aff_id=10787&pid=57843&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // SI-PushUpBreast-Desktop (ID: 833)
        "https://gltrak.com/aff_c2.php?offer_id=604&aff_id=10787&pid=54123&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1" // SI-VeinStopper-Desktop (ID: 604)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "https://gltrak.com/aff_c2.php?offer_id=812&aff_id=10787&pid=54476&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-NeckSlim-desktop (ID: 812)
        "https://gltrak.com/aff_c2.php?offer_id=715&aff_id=10787&pid=45528&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-EyelashStar-Desktop (ID: 715)
        "https://gltrak.com/aff_c2.php?offer_id=715&aff_id=10787&pid=46638&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-EyelashStar-Desktop (ID: 715)
        "https://gltrak.com/aff_c2.php?offer_id=679&aff_id=10787&pid=45498&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VivalProB-Desktop (ID: 679)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=58509&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=57794&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=44884&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=544&aff_id=10787&pid=46605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-ViperVenomAktiv-Desktop (ID: 544)
        "https://gltrak.com/aff_c2.php?offer_id=454&aff_id=10787&pid=53080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-StarSilkPro-Desktop (ID: 454)
        "https://gltrak.com/aff_c2.php?offer_id=454&aff_id=10787&pid=45363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-StarSilkPro-Desktop (ID: 454)
        "https://gltrak.com/aff_c2.php?offer_id=454&aff_id=10787&pid=46566&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-StarSilkPro-Desktop (ID: 454)
        "https://gltrak.com/aff_c2.php?offer_id=864&aff_id=10787&pid=57088&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-RectiStop-Desktop (ID: 864)
        "https://gltrak.com/aff_c2.php?offer_id=864&aff_id=10787&pid=57534&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-RectiStop-Desktop (ID: 864)
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=57076&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598)
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=53400&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598)
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=45414&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598)
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=60477&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598)
        "https://gltrak.com/aff_c2.php?offer_id=598&aff_id=10787&pid=45966&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=backoffer&mbbr=1&pof=1&aof=1", // PL-VeinStopper-Desktop (ID: 598)
        "https://gltrak.com/aff_c2.php?offer_id=831&aff_id=10787&pid=57649&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1" // PL-PushUpBreast-Desktop (ID: 831)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=815&aff_id=10787&pid=54468&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-NeckSlim-desktop (ID: 815)
        "https://gltrak.com/aff_c2.php?offer_id=658&aff_id=10787&pid=60311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VivalProB-Desktop (ID: 658)
        "https://gltrak.com/aff_c2.php?offer_id=658&aff_id=10787&pid=45477&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VivalProB-Desktop (ID: 658)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=60333&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=44860&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=61941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=520&aff_id=10787&pid=47508&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-ViperVenomAktiv-Desktop (ID: 520)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=53073&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=45345&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=61939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=436&aff_id=10787&pid=47490&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-StarSilkPro-Desktop (ID: 436)
        "https://gltrak.com/aff_c2.php?offer_id=866&aff_id=10787&pid=57083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-RectiStop-Desktop (ID: 866)
        "https://gltrak.com/aff_c2.php?offer_id=866&aff_id=10787&pid=57227&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-RectiStop-Desktop (ID: 866)
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=57245&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Desktop (ID: 577)
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=45393&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Desktop (ID: 577)
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=60474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-VeinStopper-Desktop (ID: 577)
        "https://gltrak.com/aff_c2.php?offer_id=1102&aff_id=10787&pid=70546&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-CleoLUX-Desktop (ID: 1102)
        "https://gltrak.com/aff_c2.php?offer_id=1102&aff_id=10787&pid=70544&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // EE-CleoLUX-Desktop (ID: 1102)
        "https://gltrak.com/aff_c2.php?offer_id=577&aff_id=10787&pid=45942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=backoffer&mbbr=1&pof=1&aof=1" // EE-VeinStopper-Desktop (ID: 577)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=794&aff_id=10787&pid=54466&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-NeckSlim-desktop (ID: 794)
        "https://gltrak.com/aff_c2.php?offer_id=694&aff_id=10787&pid=60659&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-EyelashStar-Desktop (ID: 694)
        "https://gltrak.com/aff_c2.php?offer_id=649&aff_id=10787&pid=45471&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-VivalProB-Desktop (ID: 649)
        "https://gltrak.com/aff_c2.php?offer_id=649&aff_id=10787&pid=47862&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-VivalProB-Desktop (ID: 649)
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=44854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-ViperVenomAktiv-Desktop (ID: 511)
        "https://gltrak.com/aff_c2.php?offer_id=511&aff_id=10787&pid=46584&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-ViperVenomAktiv-Desktop (ID: 511)
        "https://gltrak.com/aff_c2.php?offer_id=403&aff_id=10787&pid=53071&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Desktop (ID: 403)
        "https://gltrak.com/aff_c2.php?offer_id=880&aff_id=10787&pid=58244&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-PushUpBreast-Desktop (ID: 880)
        "https://gltrak.com/aff_c2.php?offer_id=880&aff_id=10787&pid=61936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-PushUpBreast-Desktop (ID: 880)
        "https://gltrak.com/aff_c2.php?offer_id=403&aff_id=10787&pid=86474&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // BA-StarSilkPro-Desktop (ID: 403)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNaQQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Spa - BA
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
    } elseif ( $country == "AL" ) { 
    $urls = array(
       "https://gltrak.com/aff_c2.php?offer_id=875&aff_id=10787&pid=57248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // AL-VeinStopper-Desktop (ID: 875)
        "https://gltrak.com/aff_c2.php?offer_id=865&aff_id=10787&pid=57079&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // AL-RectiStop-Desktop (ID: 865)
        "https://gltrak.com/aff_c2.php?offer_id=865&aff_id=10787&pid=57224&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // AL-RectiStop-Desktop (ID: 865)
        "https://gltrak.com/aff_c2.php?offer_id=875&aff_id=10787&pid=57381&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1" // AL-VeinStopper-Desktop (ID: 875)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=798&aff_id=10787&pid=54475&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-NeckSlim-desktop (ID: 798)
        "https://gltrak.com/aff_c2.php?offer_id=868&aff_id=10787&pid=57087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-RectiStop-Desktop (ID: 868)
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=57632&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-VeinStopper-Desktop (ID: 735)
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=47390&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-VeinStopper-Desktop (ID: 735)
        "https://gltrak.com/aff_c2.php?offer_id=735&aff_id=10787&pid=48316&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-VeinStopper-Desktop (ID: 735)
        "https://gltrak.com/aff_c2.php?offer_id=776&aff_id=10787&pid=53079&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-StarSilkPro-Desktop (ID: 776)
        "https://gltrak.com/aff_c2.php?offer_id=676&aff_id=10787&pid=45495&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-VivalProB-Desktop (ID: 676)
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=44881&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-ViperVenomAktiv-Desktop (ID: 541)
        "https://gltrak.com/aff_c2.php?offer_id=541&aff_id=10787&pid=46602&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-ViperVenomAktiv-Desktop (ID: 541)
        "https://gltrak.com/aff_c2.php?offer_id=881&aff_id=10787&pid=58245&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=backoffer&mbbr=1&pof=1&aof=1", // MK-PushUpBreast-Desktop (ID: 881)
        "https://gltrak.com/aff_c2.php?offer_id=868&aff_id=10787&pid=57371&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=backoffer&mbbr=1&pof=1&aof=1" // MK-RectiStop-Desktop (ID: 868)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize Make-up
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to backoffers after geo target
    $urls = array(
        "http://ck.glzelnk.com/53652?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Make-up
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitnessbackoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream backoffer
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream backoffer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>