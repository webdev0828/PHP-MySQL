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
if ( $country == "CZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=76150&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=74323&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=66320&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=71841&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=70468&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1", // CZ-Sweepstakes-Mobile (ID: 1101)
        "https://gltrak.com/aff_c2.php?offer_id=1101&aff_id=10787&pid=76148&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=popunder&mbbr=1&pof=1&aof=1" // CZ-Sweepstakes-Mobile (ID: 1101)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=12552&wid_hmac=a834bcf2a2f76175cc72540c68232ebb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12552 - IE-3G/WIFI-Sweepstake-Click2sms  EXCLUSIVE 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13450&wid_hmac=70451b88c72889cd6efdd03f3e6128e6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13450 - GR- win iPhone - sweepstake
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13752&wid_hmac=3cb7613f602fdeccc3bdf7eded8fe8b9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13752 - CL-3G-SamsungS9
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13571 - Latam-3G/WIFI-HBO
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13751&wid_hmac=adf21a12e5532226ba52bafaf8c08f51&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13751 - CL-3G-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13530&wid_hmac=2c006a9b16e4fae0e59416422df2dc8d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13530 - US-3G/Wifi-IphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13627&wid_hmac=e3fbce1fb89f18b492898753abd041a6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13627 - US-3G/WiFi-IphoneXS  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SN" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13626&wid_hmac=2225d637a2ce7ff1bc61b55ca532b6d7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13626 - SG-3G/WiFi-IphoneXR/XS   
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13361&wid_hmac=cd2ac1c0275e302c86ca6e173825b282&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13361 - NZ-3G/WiFi-CCSubmitNetflix  
        "https://1d5e037bcf3.traffic-c.com/?wid=13401&wid_hmac=c54b6c847b354791a27628f3c38cc945&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id",  // 13401 - NZ-3G/WiFi-WinIphoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13400&wid_hmac=03fee53a4210801d53d9bd8c01ce4221&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13400 - NZ-3G/WiFi-CountdownGiftcard  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13570 - Multi-3G/WIFI-HBO  
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13625&wid_hmac=c7106b935815986009bc1176107b409d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13625 - NZ-3G/WiFi-IphoneXS
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e037bcf3.traffic-c.com/?wid=13307&wid_hmac=f26be5f6e4cf1c5d128612304251d5a3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13307 - SE-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13443&wid_hmac=2f740805482d90abdf23418f282b6df2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13443 - SE-3G/WiFi-WinIphoneX  
        "https://1d5e037bcf3.traffic-c.com/?wid=13442&wid_hmac=1c08804f6331878c065fa94df3d75411&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13442 - SE-3G/WiFi-CoopVoucher  
        "https://1d5e0363653.traffic-c.com/?wid=13624&wid_hmac=611728e1797068b1a5983c1ec8c7c0fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13624 - SE-3G/WiFi-WinIphoneXR  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13362&wid_hmac=b5ec2df995f982b4ad879fd842f548d6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13362 - AU-3G/WiFi-CCSubmitNetflix  
        "https://1d5e037bcf3.traffic-c.com/?wid=13399&wid_hmac=02167a8180805adcbc5d29d909947834&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13399 - AU-3G/WiFi-WinIphoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13398&wid_hmac=8c8158e5a53456ceee1ab211acb8ace2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13398 - AU-3G/WiFi-ColesGiftcard
        "https://1d5e037bcf3.traffic-c.com/?wid=13441&wid_hmac=922c563617651ed9c2eca4b7b1cd7a9d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13441 - AU-3G/WiFi-Mazda  
        "https://1d5e037bcf3.traffic-c.com/?wid=13440&wid_hmac=595eaad7c66fad4d60d09bb86673e5cd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13440 - AU-3G/WiFi-PricelineVoucher  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13570 - Multi-3G/WIFI-HBO  
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13529&wid_hmac=00db4e5c0768efbd1e88d942857df500&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13529 - AU-3G/Wifi-IphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13623&wid_hmac=0d2a3ed5d3af59e789d32c63e59b7637&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13623 - AU-3G/WiFi-IphoneXS
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13295&wid_hmac=db7fee948fb5142e933e1d0b0ee41e5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13295 - CA-CCSubmit-SamsungS9 
        "https://1d5e037bcf3.traffic-c.com/?wid=13363&wid_hmac=add974f32a1cc2139fac68cfe7ca8c95&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13363 - CA-3G/WiFi-CCSubmitNetflix
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // 13570 - Multi-3G/WIFI-HBO  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // 13570 - Multi-3G/WIFI-HBO  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13306&wid_hmac=3b3169ca5bc815acae580d25e4c6c5bb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13306 - AR-CCSubmit-SamsungS9   
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13293&wid_hmac=89d140a36e04f90a0b005c67d03966a7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13293 - FR-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13360&wid_hmac=51be183ea646f0a34cc3c9abc82eb8a5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13360 - FR-3G/WiFi-CCSubmitNetflix   
        "https://1d5e0363653.traffic-c.com/?wid=13567&wid_hmac=0bebcf63cfb59cdd0480600db131c824&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13567 - FR/BE/CH-3G/WIFI-Descarga  
        "https://1d5e037bcf3.traffic-c.com/?wid=13434&wid_hmac=0f7b12bebc1fe6645c7fdf4c3301fd10&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13434 - FR-3G/WiFi-Win16000Cash  
        "https://1d5e037bcf3.traffic-c.com/?wid=13433&wid_hmac=c467aba2ea80b5207235c45164cce282&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13433 - FR-3G/WiFi-WinIphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13568&wid_hmac=a34a68bf48b1ddbc4a4e8ff45d66a285&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13568 - FR/BE/CH-3G/WIFI-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13305&wid_hmac=bfaf295214c81dfcbbf4ca88b8c4089a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13305 - BE-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13356&wid_hmac=3f769eb9aba75e2c161fe159078b4851&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13356 - BE-3G/WiFi-CCSubmitNetflix 
        "https://1d5e037bcf3.traffic-c.com/?wid=13414&wid_hmac=b32cc8446635f351df5d37e6cce99edf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13414 - BENL-3G/WiFi-WinChocolate  
        "https://1d5e037bcf3.traffic-c.com/?wid=13413&wid_hmac=442edbd2d1193fe4144099a16c6f4199&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13413 - BENL-3G/WiFi-WinIphoneX   
        "https://1d5e037bcf3.traffic-c.com/?wid=13416&wid_hmac=02a5be110448a130027d4a6c026b20e8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13416 - BE-3G/WiFi-WinMediaMarktGiftcard
        "https://1d5e037bcf3.traffic-c.com/?wid=13415&wid_hmac=2cea7730e388be83a79d9d6f0e2166e3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13415 - BEFR-3G/WiFi-WinNetflix1year  
        "https://1d5e0363653.traffic-c.com/?wid=13567&wid_hmac=0bebcf63cfb59cdd0480600db131c824&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13567 - FR/BE/CH-3G/WIFI-Descarga  
        "https://1d5e0363653.traffic-c.com/?wid=13568&wid_hmac=a34a68bf48b1ddbc4a4e8ff45d66a285&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13568 - FR/BE/CH-3G/WIFI-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13299&wid_hmac=caaf16126e1dab5317830bbc643c6ca3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13299 - CH-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13357&wid_hmac=0bb1cdf5f56ce283a563097dd40b4937&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13357 - CH-3G/WiFi-CCSubmitNetflix
        "https://1d5e0363653.traffic-c.com/?wid=13357&wid_hmac=0bb1cdf5f56ce283a563097dd40b4937&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13357 - CH-3G/WiFi-CCSubmitNetflix  
        "https://1d5e0363653.traffic-c.com/?wid=13299&wid_hmac=caaf16126e1dab5317830bbc643c6ca3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13299 - CH-CCSubmit-SamsungS9  
        "https://1d5e0363653.traffic-c.com/?wid=13567&wid_hmac=0bebcf63cfb59cdd0480600db131c824&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13567 - FR/BE/CH-3G/WIFI-Descarga  
        "https://1d5e0363653.traffic-c.com/?wid=13568&wid_hmac=a34a68bf48b1ddbc4a4e8ff45d66a285&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13568 - FR/BE/CH-3G/WIFI-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13296&wid_hmac=078f62fad32abf9e9f097acab21f513b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13296 - NO-CCsubmit-SamsungS9   
        "https://1d5e0363653.traffic-c.com/?wid=13531&wid_hmac=6d6f90f30f04d9b5925071e5dd7460ff&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13531 - NO-3G/Wifi-IphoneX  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13411&wid_hmac=a32e5ace1d9757708862f3174c47e0ed&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13411 - NL-3G/WiFi-WinTripToBali  
        "https://1d5e037bcf3.traffic-c.com/?wid=13412&wid_hmac=88c9b04aea854ed9f0ef913f828fee57&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13412 - NL-3G/WiFi-WinIphoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13528&wid_hmac=c82e655e7410e7b7421eead213cd5ddd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13528 - NL-3G/Wifi-IphoneX
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13294&wid_hmac=ab126e5c7bf67a9d01108d0afba3c562&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13294 - UK-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13403&wid_hmac=58b044d9c7c6725a6d1cdc52328281f9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13403 - UK-3G/WiFi-CadburyGiftCard
        "https://1d5e037bcf3.traffic-c.com/?wid=13402&wid_hmac=36e777763557a367e82e289d155191d5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13402 - UK-3G/WiFi-PrimarkGiftCard  
        "https://1d5e037bcf3.traffic-c.com/?wid=13527&wid_hmac=b84972255b6bc71a4334935a1cccf374&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13527 - UK-3G/Wifi-IphoneX  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13294&wid_hmac=ab126e5c7bf67a9d01108d0afba3c562&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13294 - UK-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13403&wid_hmac=58b044d9c7c6725a6d1cdc52328281f9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13403 - UK-3G/WiFi-CadburyGiftCard
        "https://1d5e037bcf3.traffic-c.com/?wid=13402&wid_hmac=36e777763557a367e82e289d155191d5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13402 - UK-3G/WiFi-PrimarkGiftCard  
        "https://1d5e037bcf3.traffic-c.com/?wid=13527&wid_hmac=b84972255b6bc71a4334935a1cccf374&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13527 - UK-3G/Wifi-IphoneX  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes  
        "https://1d5e037bcf3.traffic-c.com/?wid=13470&wid_hmac=0d719d6b436b82dcac0100660fa1bafb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13470 - PL-3G/WiFi-H&M-Voucher  
        "https://1d5e037bcf3.traffic-c.com/?wid=13471&wid_hmac=8e7e656ddd57c49ceb6a6a249ccab0f3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13471 - PL-3G/WiFi-SamsungS9  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes  
        "https://1d5e037bcf3.traffic-c.com/?wid=13430&wid_hmac=6d23c684f399034b94736a570fdb4411&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13430 - ES-3G/WiFi-WinIphoneX  
        "https://1d5e037bcf3.traffic-c.com/?wid=13431&wid_hmac=3081c676e67079058bd23f80218fd820&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13431 - ES-3G/WiFi-AmazonGiftcard  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13388&wid_hmac=0d3a7bc0d7231e2b7cfae7fc757618e5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13388 - IT-TIM/Vodafone-WinSamsungS8  
        "https://1d5e037bcf3.traffic-c.com/?wid=13389&wid_hmac=9a021d63a28213c26b8b1c30f0772cc2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13389 - IT-TIM/Vodafone-WinAppleEasy 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13297&wid_hmac=597356d67616ca2dec03045bede1d3a2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13297 - DK-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13359&wid_hmac=467baad6ef106b0e1dd51a7599c38b34&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13359 - DK-3G/WiFi-CCSubmitNetflix
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13027&wid_hmac=b9c04345039121b6c6efdd77e3f8d832&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13027 - DE-3G/WiFi-Win-IphoneX  
        "https://1d5e037bcf3.traffic-c.com/?wid=13300&wid_hmac=7af21adc370e5b3d6be16fe72b430218&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13300 - DE-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13358&wid_hmac=a70ac8d7cb20a8bf3a5f6a384c621721&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13358 - DE-3G/WiFi-CCSubmitNetflix
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13355&wid_hmac=e79f096949d6ce8317429ee08c497535&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13355 - AT-3G/WiFi-CCSubmitNetflix  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13298&wid_hmac=c045a1cc6f799f94902361df41bef3be&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13298 - FI-CCSubmit-SamsungS9
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to popunders after geo target
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes popunder
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
//geo target first with geo direct offer popunders or simply popunders if offers are good for this geo
if ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13450&wid_hmac=70451b88c72889cd6efdd03f3e6128e6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13450 - GR- win iPhone - sweepstake
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13530&wid_hmac=2c006a9b16e4fae0e59416422df2dc8d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13530 - US-3G/Wifi-IphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13627&wid_hmac=e3fbce1fb89f18b492898753abd041a6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13627 - US-3G/WiFi-IphoneXS  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SN" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13626&wid_hmac=2225d637a2ce7ff1bc61b55ca532b6d7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13626 - SG-3G/WiFi-IphoneXR/XS   
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13361&wid_hmac=cd2ac1c0275e302c86ca6e173825b282&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13361 - NZ-3G/WiFi-CCSubmitNetflix  
        "https://1d5e037bcf3.traffic-c.com/?wid=13400&wid_hmac=03fee53a4210801d53d9bd8c01ce4221&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13400 - NZ-3G/WiFi-CountdownGiftcard
        "https://1d5e037bcf3.traffic-c.com/?wid=13401&wid_hmac=c54b6c847b354791a27628f3c38cc945&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id",  // 13401 - NZ-3G/WiFi-WinIphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13570 - Multi-3G/WIFI-HBO  
        "https://1d5e0363653.traffic-c.com/?wid=13625&wid_hmac=c7106b935815986009bc1176107b409d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13625 - NZ-3G/WiFi-IphoneXS
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13307&wid_hmac=f26be5f6e4cf1c5d128612304251d5a3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13307 - SE-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13443&wid_hmac=2f740805482d90abdf23418f282b6df2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13443 - SE-3G/WiFi-WinIphoneX  
        "https://1d5e037bcf3.traffic-c.com/?wid=13442&wid_hmac=1c08804f6331878c065fa94df3d75411&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13442 - SE-3G/WiFi-CoopVoucher  
        "https://1d5e0363653.traffic-c.com/?wid=13624&wid_hmac=611728e1797068b1a5983c1ec8c7c0fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13624 - SE-3G/WiFi-WinIphoneXR  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13362&wid_hmac=b5ec2df995f982b4ad879fd842f548d6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13362 - AU-3G/WiFi-CCSubmitNetflix  
        "https://1d5e037bcf3.traffic-c.com/?wid=13398&wid_hmac=8c8158e5a53456ceee1ab211acb8ace2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13398 - AU-3G/WiFi-ColesGiftcard
        "https://1d5e037bcf3.traffic-c.com/?wid=13399&wid_hmac=02167a8180805adcbc5d29d909947834&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13399 - AU-3G/WiFi-WinIphoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13441&wid_hmac=922c563617651ed9c2eca4b7b1cd7a9d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13441 - AU-3G/WiFi-Mazda  
        "https://1d5e037bcf3.traffic-c.com/?wid=13440&wid_hmac=595eaad7c66fad4d60d09bb86673e5cd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13440 - AU-3G/WiFi-PricelineVoucher  
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13570 - Multi-3G/WIFI-HBO  
        "https://1d5e037bcf3.traffic-c.com/?wid=13529&wid_hmac=00db4e5c0768efbd1e88d942857df500&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13529 - AU-3G/Wifi-IphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13623&wid_hmac=0d2a3ed5d3af59e789d32c63e59b7637&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13623 - AU-3G/WiFi-IphoneXS
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13295&wid_hmac=db7fee948fb5142e933e1d0b0ee41e5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13295 - CA-CCSubmit-SamsungS9 
        "https://1d5e037bcf3.traffic-c.com/?wid=13363&wid_hmac=add974f32a1cc2139fac68cfe7ca8c95&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13363 - CA-3G/WiFi-CCSubmitNetflix  
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // 13570 - Multi-3G/WIFI-HBO  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13569&wid_hmac=179f5badc9330a2624d89f6f485cb0d1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13569 - Multi-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13570&wid_hmac=ab2abda64cb23a7a5b941f1344ba2e49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // 13570 - Multi-3G/WIFI-HBO  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e037bcf3.traffic-c.com/?wid=13306&wid_hmac=3b3169ca5bc815acae580d25e4c6c5bb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13306 - AR-CCSubmit-SamsungS9  
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e0363653.traffic-c.com/?wid=13566&wid_hmac=190d99c7d45799e8d2e4b950f68d21c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13566 - Latam-3G/WIFI-iPhoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13571&wid_hmac=4203e241557a613c5d47a30c92aff903&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13571 - Latam-3G/WIFI-HBO
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e037bcf3.traffic-c.com/?wid=13293&wid_hmac=89d140a36e04f90a0b005c67d03966a7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13293 - FR-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13360&wid_hmac=51be183ea646f0a34cc3c9abc82eb8a5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13360 - FR-3G/WiFi-CCSubmitNetflix
        "https://1d5e037bcf3.traffic-c.com/?wid=13434&wid_hmac=0f7b12bebc1fe6645c7fdf4c3301fd10&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13434 - FR-3G/WiFi-Win16000Cash  
        "https://1d5e0363653.traffic-c.com/?wid=13567&wid_hmac=0bebcf63cfb59cdd0480600db131c824&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13567 - FR/BE/CH-3G/WIFI-Descarga  
        "https://1d5e037bcf3.traffic-c.com/?wid=13433&wid_hmac=c467aba2ea80b5207235c45164cce282&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13433 - FR-3G/WiFi-WinIphoneX  
        "https://1d5e0363653.traffic-c.com/?wid=13568&wid_hmac=a34a68bf48b1ddbc4a4e8ff45d66a285&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13568 - FR/BE/CH-3G/WIFI-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13305&wid_hmac=bfaf295214c81dfcbbf4ca88b8c4089a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13305 - BE-CCSubmit-SamsungS9
        "https://1d5e037bcf3.traffic-c.com/?wid=13356&wid_hmac=3f769eb9aba75e2c161fe159078b4851&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13356 - BE-3G/WiFi-CCSubmitNetflix  
        "https://1d5e037bcf3.traffic-c.com/?wid=13413&wid_hmac=442edbd2d1193fe4144099a16c6f4199&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13413 - BENL-3G/WiFi-WinIphoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13415&wid_hmac=2cea7730e388be83a79d9d6f0e2166e3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13415 - BEFR-3G/WiFi-WinNetflix1year
        "https://1d5e037bcf3.traffic-c.com/?wid=13414&wid_hmac=b32cc8446635f351df5d37e6cce99edf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13414 - BENL-3G/WiFi-WinChocolate  
        "https://1d5e037bcf3.traffic-c.com/?wid=13416&wid_hmac=02a5be110448a130027d4a6c026b20e8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13416 - BE-3G/WiFi-WinMediaMarktGiftcard    
        "https://1d5e0363653.traffic-c.com/?wid=13567&wid_hmac=0bebcf63cfb59cdd0480600db131c824&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13567 - FR/BE/CH-3G/WIFI-Descarga  
        "https://1d5e0363653.traffic-c.com/?wid=13568&wid_hmac=a34a68bf48b1ddbc4a4e8ff45d66a285&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13568 - FR/BE/CH-3G/WIFI-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13299&wid_hmac=caaf16126e1dab5317830bbc643c6ca3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13299 - CH-CCSubmit-SamsungS9
        "https://1d5e037bcf3.traffic-c.com/?wid=13357&wid_hmac=0bb1cdf5f56ce283a563097dd40b4937&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13357 - CH-3G/WiFi-CCSubmitNetflix
        "https://1d5e0363653.traffic-c.com/?wid=13357&wid_hmac=0bb1cdf5f56ce283a563097dd40b4937&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13357 - CH-3G/WiFi-CCSubmitNetflix 
        "https://1d5e0363653.traffic-c.com/?wid=13299&wid_hmac=caaf16126e1dab5317830bbc643c6ca3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13299 - CH-CCSubmit-SamsungS9  
        "https://1d5e0363653.traffic-c.com/?wid=13567&wid_hmac=0bebcf63cfb59cdd0480600db131c824&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13567 - FR/BE/CH-3G/WIFI-Descarga  
        "https://1d5e0363653.traffic-c.com/?wid=13568&wid_hmac=a34a68bf48b1ddbc4a4e8ff45d66a285&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13568 - FR/BE/CH-3G/WIFI-iPhoneX 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13296&wid_hmac=078f62fad32abf9e9f097acab21f513b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13296 - NO-CCsubmit-SamsungS9 
        "https://1d5e0363653.traffic-c.com/?wid=13531&wid_hmac=6d6f90f30f04d9b5925071e5dd7460ff&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13531 - NO-3G/Wifi-IphoneX  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13412&wid_hmac=88c9b04aea854ed9f0ef913f828fee57&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13412 - NL-3G/WiFi-WinIphoneX 
        "https://1d5e037bcf3.traffic-c.com/?wid=13411&wid_hmac=a32e5ace1d9757708862f3174c47e0ed&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13411 - NL-3G/WiFi-WinTripToBali  
        "https://1d5e037bcf3.traffic-c.com/?wid=13528&wid_hmac=c82e655e7410e7b7421eead213cd5ddd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13528 - NL-3G/Wifi-IphoneX
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13294&wid_hmac=ab126e5c7bf67a9d01108d0afba3c562&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13294 - UK-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13403&wid_hmac=58b044d9c7c6725a6d1cdc52328281f9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13403 - UK-3G/WiFi-CadburyGiftCard
        "https://1d5e037bcf3.traffic-c.com/?wid=13402&wid_hmac=36e777763557a367e82e289d155191d5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13402 - UK-3G/WiFi-PrimarkGiftCard  
        "https://1d5e037bcf3.traffic-c.com/?wid=13527&wid_hmac=b84972255b6bc71a4334935a1cccf374&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13527 - UK-3G/Wifi-IphoneX  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13294&wid_hmac=ab126e5c7bf67a9d01108d0afba3c562&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13294 - UK-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13403&wid_hmac=58b044d9c7c6725a6d1cdc52328281f9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13403 - UK-3G/WiFi-CadburyGiftCard 
        "https://1d5e037bcf3.traffic-c.com/?wid=13402&wid_hmac=36e777763557a367e82e289d155191d5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13402 - UK-3G/WiFi-PrimarkGiftCard  
        "https://1d5e037bcf3.traffic-c.com/?wid=13527&wid_hmac=b84972255b6bc71a4334935a1cccf374&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13527 - UK-3G/Wifi-IphoneX  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes 
        "https://1d5e037bcf3.traffic-c.com/?wid=13470&wid_hmac=0d719d6b436b82dcac0100660fa1bafb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", //  13470 - PL-3G/WiFi-H&M-Voucher  
        "https://1d5e037bcf3.traffic-c.com/?wid=13471&wid_hmac=8e7e656ddd57c49ceb6a6a249ccab0f3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13471 - PL-3G/WiFi-SamsungS9  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes  
        "https://1d5e037bcf3.traffic-c.com/?wid=13430&wid_hmac=6d23c684f399034b94736a570fdb4411&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13430 - ES-3G/WiFi-WinIphoneX  
        "https://1d5e037bcf3.traffic-c.com/?wid=13431&wid_hmac=3081c676e67079058bd23f80218fd820&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13431 - ES-3G/WiFi-AmazonGiftcard  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13388&wid_hmac=0d3a7bc0d7231e2b7cfae7fc757618e5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13388 - IT-TIM/Vodafone-WinSamsungS8  
        "https://1d5e037bcf3.traffic-c.com/?wid=13389&wid_hmac=9a021d63a28213c26b8b1c30f0772cc2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13389 - IT-TIM/Vodafone-WinAppleEasy 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13297&wid_hmac=597356d67616ca2dec03045bede1d3a2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13297 - DK-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13359&wid_hmac=467baad6ef106b0e1dd51a7599c38b34&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13359 - DK-3G/WiFi-CCSubmitNetflix
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13027&wid_hmac=b9c04345039121b6c6efdd77e3f8d832&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13027 - DE-3G/WiFi-Win-IphoneX
        "https://1d5e037bcf3.traffic-c.com/?wid=13300&wid_hmac=7af21adc370e5b3d6be16fe72b430218&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13300 - DE-CCSubmit-SamsungS9  
        "https://1d5e037bcf3.traffic-c.com/?wid=13358&wid_hmac=a70ac8d7cb20a8bf3a5f6a384c621721&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13358 - DE-3G/WiFi-CCSubmitNetflix
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13355&wid_hmac=e79f096949d6ce8317429ee08c497535&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13355 - AT-3G/WiFi-CCSubmitNetflix  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes
        "https://1d5e037bcf3.traffic-c.com/?wid=13298&wid_hmac=c045a1cc6f799f94902361df41bef3be&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13298 - FI-CCSubmit-SamsungS9
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to popunders after geo target
    $urls = array(
        "http://ck.gl2022.info/52647?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Sweepstakes popunder
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>
