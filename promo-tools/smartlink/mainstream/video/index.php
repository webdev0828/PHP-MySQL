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
if ( $country == "HN" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13950&wid_hmac=f4746d26bf3610e39c5d9bce2fefd365&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13950 - HN-3G-Navidad  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13631&wid_hmac=86417609c37df22a056ad9162ccd8da1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13631 - HN-Tigo/Wifi-Football 2
        "https://1d5e0be03f3.traffic-c.com/?wid=13630&wid_hmac=16f8cdb85598934acca62a2e90f6f7dc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13630 - HN-Tigo/Wifi-Football 1
        "https://1d5e0be03f3.traffic-c.com/?wid=13592&wid_hmac=d7918f87be8eff9a415996df2ec8d947&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13592 - HN-Tigo-Parejas
        "https://1d5e0be03f3.traffic-c.com/?wid=13234&wid_hmac=bcbe749900ba46e2563c0a7a08475f4a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13234 - HN-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13943&wid_hmac=63a8df345c80d86be9feeb2329f9174e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13943 - TH-Truemove-GlamourClub  HOT
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13934&wid_hmac=e88cdcb121013f6f0f25256ae8f16e63&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13934 - IT-VODAFONE-VideoMagicFlow  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13813&wid_hmac=99a2dfde3fa45bc81d34cf666a8ea558&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13813 - IT-TIM-ModelleGlamourMainstream  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13545&wid_hmac=e9f9dca95e53b13022da34b8e2025374&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13545 - IT-WIND-MagicJelly  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13876&wid_hmac=b6d5d9f9e1962dffb5cebd1563a7e383&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13876 - IT-H3G-TopFlowV1
        "https://1d5e0be03f3.traffic-c.com/?wid=13823&wid_hmac=ec1634190085bcd52d2d061ac07e61b5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13823 - IT-Vodafone-Main
        "https://1d5e0be03f3.traffic-c.com/?wid=13597&wid_hmac=ecaf525833fd4bd4db0114d3b63a0d44&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13597 - IT-H3G-MagicOffer
        "https://1d5e0be03f3.traffic-c.com/?wid=13435&wid_hmac=98de9583399404fb4ff230d8d665b484&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13435 - IT-H3G-MainMagic
        "https://1d5e0be03f3.traffic-c.com/?wid=12990&wid_hmac=36fd2e597c212911c2508ac01c3dccc0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // IT 12990 - IT-TIM-VideoMagicFlow-v2
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13067&wid_hmac=d3b7cdf39e7fbc3a8ded259e46d9eff2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13067 - PL-Tmobile-Android-VIP 2  VIP EXCLUSIVE
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13160&wid_hmac=4f4bb06fed67f06ef9b94c3ce5fe5b7e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13160 - IN-Tata-Android-VIP 2  VIP
        "https://1d5e0be03f3.traffic-c.com/?wid=13872&wid_hmac=af92832db84c819bcfd9cd148e1cf9bd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13872 - IN-Vodafone-Funvids  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13859&wid_hmac=1031fa699c835502c95bf4760a0b3130&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13859 - Tata-MainstreamVid
        "https://1d5e0be03f3.traffic-c.com/?wid=12879&wid_hmac=76ea2aa0a2b26b5108c6a5ef87a05a52&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12879 - IN-Vodafone-MainzModels
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TN" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12356&wid_hmac=b88b56a79bc5580a1763a61c8bbab6b3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12356 - TN-TNT-Android-VIP  VIP
        "https://1d5e0be03f3.traffic-c.com/?wid=13954&wid_hmac=01103054549ca4e063db99d6fac8c74e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13954 - TN-Orange-HappyContent
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LK" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=11963&wid_hmac=d79f9229b3477ca0fa85d07c5ad055a7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11963 - LK-Mobitel-Android-VIP  VIP
        "https://1d5e0be03f3.traffic-c.com/?wid=13602&wid_hmac=3323f6ec467e3c00636819ac14ae7ec9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13602 - LK-Airtel-Video (Mainstream)
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KW" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13820&wid_hmac=6b27304ef4102e0247803b412190400b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13820 - KW-Ooredoo-X247  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13708&wid_hmac=e9e1a235d4ff6aa6852cf49ba306f3c1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13708 - KW-Ooredoo-Jordan
        "https://1d5e0be03f3.traffic-c.com/?wid=13579&wid_hmac=db99387872a0a958f296ecd1d17dfd25&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13579 - KW-Zain-LiveTV
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13257&wid_hmac=bb75a52d9c0d5f8a36d8fa8f75040e4f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13257 - GR-3g/WiFi-Antivirus  EXCLUSIVE
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13185&wid_hmac=e9836f098ad9fba18643f82eaf4413d9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13185 - DE-Vodafone-Madfun  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13989&wid_hmac=310ee3c312d149f370a48a98ddf33cb0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13989 - DE-3G-GameOfThrones
        "https://1d5e0be03f3.traffic-c.com/?wid=13952&wid_hmac=0e2abaefacdf6209b76779c6a8452bd5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13952 - DE-Vodafone-MuscleHeroes
        "https://1d5e0be03f3.traffic-c.com/?wid=13861&wid_hmac=3794d56560635933042b1222ac24fccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13861 - DE/AT/CH-3G/Wifi-Get Stronger
        "https://1d5e0be03f3.traffic-c.com/?wid=13738&wid_hmac=73ae7089c076a455a692d1b93bf7f807&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13738 - DE-Telekom/Vodafone-Zoom2Moon
        "https://1d5e0be03f3.traffic-c.com/?wid=13523&wid_hmac=4959169a424675079820485a2463db4c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13523 - DE-Vodafone-Main
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12650&wid_hmac=5a3971e9939677f2466bc8839f82f0c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12650 - HU-3G/WIFI-FunVid  EXCLUSIVE
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12558&wid_hmac=22ee96087409d528d0ff790535d1d4a4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12558 - AT-H3G-Funvid  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13861&wid_hmac=3794d56560635933042b1222ac24fccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13861 - DE/AT/CH-3G/Wifi-Get Stronger
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13967&wid_hmac=0eb000331aa4c30ffc08f50e5529aeae&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13967 - MX-Movistar-Chango
        "https://1d5e0be03f3.traffic-c.com/?wid=13964&wid_hmac=399a244a76ad76329c21a951aeb16f06&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13964 - MX-Movistar-Funcel
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13956&wid_hmac=5684172ad8b72810de13d973a9e19d3d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13956 - RO-3G-GoodContent
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KE" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13951&wid_hmac=dbed82aaec0768b6f122f2315b21c855&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13951 - KE-Safaricom-DownloadContent
        "https://1d5e0be03f3.traffic-c.com/?wid=13614&wid_hmac=56f9cb7941226af5c3f921f7fc322570&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13614 - KE-Safaricom-ExcitingVideos
        "https://1d5e0be03f3.traffic-c.com/?wid=12193&wid_hmac=a905e4f648435709bba2045d3dfce0e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12193 - Ke-Safaricom-MegaDownload
        "https://1d5e0be03f3.traffic-c.com/?wid=11840&wid_hmac=58e698aaefc0caa170fe98d3c1a35542&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11840 - KE-Safaricom-DownloadHD
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13949&wid_hmac=f495bd7bbc33c41a9f15992ee4323b14&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13949 - CO-Tigo-Horoscope
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13947&wid_hmac=42ef42be48e385cc404397cda9d6c774&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13947 - PE-Claro/Wifi-Football
        "https://1d5e0be03f3.traffic-c.com/?wid=13946&wid_hmac=50a4fdffff5d8abd971432911011dfe7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13946 - PE-Claro/Wifi-Sonrisa
        "https://1d5e0be03f3.traffic-c.com/?wid=13936&wid_hmac=0e1873992f9da2ad84119a7c6971a4ef&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13936 - PE-Movistar-Beber
        "https://1d5e0be03f3.traffic-c.com/?wid=13935&wid_hmac=57da705e57ebdf2829aa910fbcbc9a87&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13935 - PE-Movistar-Chevere
        "https://1d5e0be03f3.traffic-c.com/?wid=13745&wid_hmac=91350592d6dd7f5748580d3eec4c033a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13745 - PE-Movistar-Naranja
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13941&wid_hmac=6cbb58f5d7cc0fa9571f8a9f29e4e66d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13941 - BR-TIM-Whatsapp
        "https://1d5e0be03f3.traffic-c.com/?wid=13929&wid_hmac=e357e18f1437464488ce06e44c538145&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13929 - BR-TIM-Gravidez
        "https://1d5e0be03f3.traffic-c.com/?wid=13830&wid_hmac=3d8b50e12b25b3848465c006095596ab&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13830 - BR-TIM-Gossip
        "https://1d5e0be03f3.traffic-c.com/?wid=13559&wid_hmac=c9952c2aa45379b0b83130198fd9095c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13559 - BR-TIM-Kwiz
        "https://1d5e0be03f3.traffic-c.com/?wid=13558&wid_hmac=28d0cde22ed293b3d4d96854981df19e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13558 - BR-TIM-MobiVids
        "https://1d5e0be03f3.traffic-c.com/?wid=13557&wid_hmac=90e66f7363abc6d94f4402c76c6967d6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13557 - BR-TIM-FeeVida
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "QA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13925&wid_hmac=2e61fe043a878acf901dcf4b9f1f5988&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13925 - QA-Vodafone-Soccer
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13923&wid_hmac=75c4289b821858b30d25d2b4155f5d3e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13923 - DZ-Ooredoo-Funny
        "https://1d5e0be03f3.traffic-c.com/?wid=12676&wid_hmac=805e962567154deb10929810eb16a058&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12676 - DZ-Djezzy-VoiceCallchat
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13903&wid_hmac=ba0ba48bc0dcdfffe1a4c59e23c9de44&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13903 - CL-Entel-SportCelebrities
        "https://1d5e0be03f3.traffic-c.com/?wid=13901&wid_hmac=f83e2b8132e813483520b7e574f02f34&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13901 - CL-Entel-Celebrities
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SV" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13880&wid_hmac=37d3ce7f96005e6e7ba30f67bae2da37&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13880 - SV-Movistar-Mundialize
        "https://1d5e0be03f3.traffic-c.com/?wid=13879&wid_hmac=799e5c6cf69b54279da322c1e515a891&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13879 - SV-Movistar-Feria
        "https://1d5e0be03f3.traffic-c.com/?wid=13878&wid_hmac=1376f243878b7570e3979c3dd2b0afe6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13878 - SV-Tigo-Feria
        "https://1d5e0be03f3.traffic-c.com/?wid=13633&wid_hmac=6559cd746261d066f4d45cdbb9f43f7e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13633 - SV-Tigo/Wifi-Football 1
        "https://1d5e0be03f3.traffic-c.com/?wid=13632&wid_hmac=2d12faaa37343190588fa3e9eb1cdc9f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13632 - SV-Tigo/Wifi-Football 2
        "https://1d5e0be03f3.traffic-c.com/?wid=13604&wid_hmac=bce61eef3080bd83e803aa6d75e46910&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13604 - SV-3G-Mundializate
        "https://1d5e0be03f3.traffic-c.com/?wid=13231&wid_hmac=c0197c877bf00c654a1b47acf22188d9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13231 - SV-Claro-Fonik
        "https://1d5e0be03f3.traffic-c.com/?wid=13230&wid_hmac=950a131c4a8b42cc41f6b2609e9d4443&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13230 - SV-Claro-Fanmania
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13874&wid_hmac=29afe3886660f651dc51f6d656effc87&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13874 - KZ-Beeline-Playboy
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13861&wid_hmac=3794d56560635933042b1222ac24fccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13861 - DE/AT/CH-3G/Wifi-Get Stronger
        "https://1d5e0be03f3.traffic-c.com/?wid=13116&wid_hmac=c944adaf753fcee55155a50f75e255b5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13116 - CH-3G/WiFi-Video-Top10
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13829&wid_hmac=f68261287bf45d236293de340f25ab9e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13829 - JO-3G-Bayern
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NG" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13809&wid_hmac=6e9cb6517608a2c52349bf32725676cd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13809 - NG-MTN-MobileMagazine
        "https://1d5e0be03f3.traffic-c.com/?wid=13808&wid_hmac=d3308fb85b7470ad445c473000cdd38f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13808 - NG-Airtel-3Flix
        "https://1d5e0be03f3.traffic-c.com/?wid=13273&wid_hmac=f963f1545dc60de30a9f8d826383d7da&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13273 - NG-Etisalat-HollywoodTrailers
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13806&wid_hmac=3114c644585a67ba4268fd5fccd475e0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13806 - RU-Tele2-Music
        "https://1d5e0be03f3.traffic-c.com/?wid=13123&wid_hmac=bfcd2bfe0d6e1b73aa96b1c1c3700a46&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13123 - RU-Beeline-Mainstr
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "OM" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13770&wid_hmac=85e52749e202be81b39eb555b897f6c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13770 - OM-Omantel-Football
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13739&wid_hmac=7109f3127c57095786e7eefd70cb639f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13739 - TR-3G-Victoria
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IQ" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13584&wid_hmac=86c1adcc7c6b534f6134ab4fd38b51a8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13584 - IQ-Korek-Kenzi
        "https://1d5e0be03f3.traffic-c.com/?wid=13420&wid_hmac=3526df75bcdbece634d58e76f0188cb5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13420 - IQ-Zain-Games
        "https://1d5e0be03f3.traffic-c.com/?wid=12866&wid_hmac=82577d9f1053cfb5080396838bc6cf96&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12866 - IQ-Zain-HalawatElDonia
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13575&wid_hmac=949a0e8f6b989e5799f29bebe89fc36f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13575 - AR-Movistar-Mainstream
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13565&wid_hmac=8b9c3708471aad57baf6e9f6d48dfcde&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13565 - PA-Digicel-Accidente
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13514&wid_hmac=34952e3a50e3b0ccd817d740b47fda11&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13514 - GH-Tigo-UnlimitedVideos
        "https://1d5e0be03f3.traffic-c.com/?wid=13513&wid_hmac=14b13d0ee367685b8da33db1ee6f6de0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13513 - GH-Tigo-Mtutor
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13511&wid_hmac=98b1678a37f8739b8f9921d542cd2b35&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13511 - KH-Cellcard-UnblockMeGame
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13272&wid_hmac=b9d5695197093f704bfc67f1f05b29b1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13272 - ZA-MTN/Vodacom-Videobox
        "https://1d5e0be03f3.traffic-c.com/?wid=13271&wid_hmac=7508514f1f1a38e9d28811657c3e7947&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13271 - ZA-Vodacom-AdrenalineJunkies
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13253&wid_hmac=eb8c1c7b128e396fbd001993d183bf1d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13253 - GT-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NI" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13237&wid_hmac=c835db501d3e4bf1731344a2cdb7d95a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13237 - NI-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13226&wid_hmac=dad9eeecac5997013c3a6ea696992360&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13226 - EC-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13225&wid_hmac=42756f3b16110c0d5ed3530667957bb9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13225 - CR-Claro-Fonik
        "https://1d5e0be03f3.traffic-c.com/?wid=13224&wid_hmac=a155311846e8cd4d9a83a7f9b8e7e710&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13224 - CR-Claro-Fanmania
        "https://1d5e0be03f3.traffic-c.com/?wid=11823&wid_hmac=8152af41f801b2552157bc7b883f4244&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11823 - CR-Claro-Main-Las mas hot
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13212&wid_hmac=8b8b94c474cad0163921bbda9f26c3d2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13212 - HT-Digicell-MovilMain
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12998&wid_hmac=202db106c27c3964b4fce420f7a80d83&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12998 - BY-Life-Mainstreamvideo
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SU" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12909&wid_hmac=9749160052518fb91a85fff5ba0d6b54&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12909 - SU-Digicel-Club Movil
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12905&wid_hmac=08006ad06be6d278a56b5e9c120e090d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12905 - UA-Life-MainstreamVideo
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BD" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12621&wid_hmac=5b5dad99520d5b4cc4a12748fdc5816e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12621 - BD-Robi-PuzzleGames
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=11903&wid_hmac=e866ac0ba3a6afc3edc77a838e3a3c7a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11903 - UK-O2-PlayBoyVids
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream smartlink
        "https://newgamesapp.net/?id=45268&clickid=sublimerevenue-mainstream&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BitterStrawberry mainstream smartlink
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
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
if ( $country == "HN" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13950&wid_hmac=f4746d26bf3610e39c5d9bce2fefd365&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13950 - HN-3G-Navidad  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13631&wid_hmac=86417609c37df22a056ad9162ccd8da1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13631 - HN-Tigo/Wifi-Football 2
        "https://1d5e0be03f3.traffic-c.com/?wid=13630&wid_hmac=16f8cdb85598934acca62a2e90f6f7dc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13630 - HN-Tigo/Wifi-Football 1
        "https://1d5e0be03f3.traffic-c.com/?wid=13592&wid_hmac=d7918f87be8eff9a415996df2ec8d947&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13592 - HN-Tigo-Parejas
        "https://1d5e0be03f3.traffic-c.com/?wid=13234&wid_hmac=bcbe749900ba46e2563c0a7a08475f4a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13234 - HN-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13943&wid_hmac=63a8df345c80d86be9feeb2329f9174e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13943 - TH-Truemove-GlamourClub  HOT
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13934&wid_hmac=e88cdcb121013f6f0f25256ae8f16e63&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13934 - IT-VODAFONE-VideoMagicFlow  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13813&wid_hmac=99a2dfde3fa45bc81d34cf666a8ea558&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13813 - IT-TIM-ModelleGlamourMainstream  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13545&wid_hmac=e9f9dca95e53b13022da34b8e2025374&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13545 - IT-WIND-MagicJelly  HOT
        "https://1d5e0be03f3.traffic-c.com/?wid=13876&wid_hmac=b6d5d9f9e1962dffb5cebd1563a7e383&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13876 - IT-H3G-TopFlowV1
        "https://1d5e0be03f3.traffic-c.com/?wid=13823&wid_hmac=ec1634190085bcd52d2d061ac07e61b5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13823 - IT-Vodafone-Main
        "https://1d5e0be03f3.traffic-c.com/?wid=13597&wid_hmac=ecaf525833fd4bd4db0114d3b63a0d44&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13597 - IT-H3G-MagicOffer
        "https://1d5e0be03f3.traffic-c.com/?wid=13435&wid_hmac=98de9583399404fb4ff230d8d665b484&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13435 - IT-H3G-MainMagic
        "https://1d5e0be03f3.traffic-c.com/?wid=12990&wid_hmac=36fd2e597c212911c2508ac01c3dccc0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // IT 12990 - IT-TIM-VideoMagicFlow-v2
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13067&wid_hmac=d3b7cdf39e7fbc3a8ded259e46d9eff2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13067 - PL-Tmobile-Android-VIP 2  VIP EXCLUSIVE
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13160&wid_hmac=4f4bb06fed67f06ef9b94c3ce5fe5b7e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13160 - IN-Tata-Android-VIP 2  VIP
        "https://1d5e0be03f3.traffic-c.com/?wid=13872&wid_hmac=af92832db84c819bcfd9cd148e1cf9bd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13872 - IN-Vodafone-Funvids  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13859&wid_hmac=1031fa699c835502c95bf4760a0b3130&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13859 - Tata-MainstreamVid
        "https://1d5e0be03f3.traffic-c.com/?wid=12879&wid_hmac=76ea2aa0a2b26b5108c6a5ef87a05a52&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12879 - IN-Vodafone-MainzModels
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TN" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12356&wid_hmac=b88b56a79bc5580a1763a61c8bbab6b3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12356 - TN-TNT-Android-VIP  VIP
        "https://1d5e0be03f3.traffic-c.com/?wid=13954&wid_hmac=01103054549ca4e063db99d6fac8c74e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13954 - TN-Orange-HappyContent
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LK" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=11963&wid_hmac=d79f9229b3477ca0fa85d07c5ad055a7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11963 - LK-Mobitel-Android-VIP  VIP
        "https://1d5e0be03f3.traffic-c.com/?wid=13602&wid_hmac=3323f6ec467e3c00636819ac14ae7ec9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13602 - LK-Airtel-Video (Mainstream)
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KW" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13820&wid_hmac=6b27304ef4102e0247803b412190400b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13820 - KW-Ooredoo-X247  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13708&wid_hmac=e9e1a235d4ff6aa6852cf49ba306f3c1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13708 - KW-Ooredoo-Jordan
        "https://1d5e0be03f3.traffic-c.com/?wid=13579&wid_hmac=db99387872a0a958f296ecd1d17dfd25&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13579 - KW-Zain-LiveTV
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13185&wid_hmac=e9836f098ad9fba18643f82eaf4413d9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13185 - DE-Vodafone-Madfun  EXCLUSIVE
        "https://1d5e0be03f3.traffic-c.com/?wid=13989&wid_hmac=310ee3c312d149f370a48a98ddf33cb0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13989 - DE-3G-GameOfThrones
        "https://1d5e0be03f3.traffic-c.com/?wid=13952&wid_hmac=0e2abaefacdf6209b76779c6a8452bd5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13952 - DE-Vodafone-MuscleHeroes
        "https://1d5e0be03f3.traffic-c.com/?wid=13861&wid_hmac=3794d56560635933042b1222ac24fccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13861 - DE/AT/CH-3G/Wifi-Get Stronger
        "https://1d5e0be03f3.traffic-c.com/?wid=13738&wid_hmac=73ae7089c076a455a692d1b93bf7f807&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13738 - DE-Telekom/Vodafone-Zoom2Moon
        "https://1d5e0be03f3.traffic-c.com/?wid=13523&wid_hmac=4959169a424675079820485a2463db4c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13523 - DE-Vodafone-Main
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13967&wid_hmac=0eb000331aa4c30ffc08f50e5529aeae&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13967 - MX-Movistar-Chango
        "https://1d5e0be03f3.traffic-c.com/?wid=13964&wid_hmac=399a244a76ad76329c21a951aeb16f06&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13964 - MX-Movistar-Funcel
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13956&wid_hmac=5684172ad8b72810de13d973a9e19d3d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13956 - RO-3G-GoodContent
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KE" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13951&wid_hmac=dbed82aaec0768b6f122f2315b21c855&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13951 - KE-Safaricom-DownloadContent
        "https://1d5e0be03f3.traffic-c.com/?wid=13614&wid_hmac=56f9cb7941226af5c3f921f7fc322570&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13614 - KE-Safaricom-ExcitingVideos
        "https://1d5e0be03f3.traffic-c.com/?wid=12193&wid_hmac=a905e4f648435709bba2045d3dfce0e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12193 - Ke-Safaricom-MegaDownload
        "https://1d5e0be03f3.traffic-c.com/?wid=11840&wid_hmac=58e698aaefc0caa170fe98d3c1a35542&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11840 - KE-Safaricom-DownloadHD
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13949&wid_hmac=f495bd7bbc33c41a9f15992ee4323b14&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13949 - CO-Tigo-Horoscope
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13947&wid_hmac=42ef42be48e385cc404397cda9d6c774&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13947 - PE-Claro/Wifi-Football
        "https://1d5e0be03f3.traffic-c.com/?wid=13946&wid_hmac=50a4fdffff5d8abd971432911011dfe7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13946 - PE-Claro/Wifi-Sonrisa
        "https://1d5e0be03f3.traffic-c.com/?wid=13936&wid_hmac=0e1873992f9da2ad84119a7c6971a4ef&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13936 - PE-Movistar-Beber
        "https://1d5e0be03f3.traffic-c.com/?wid=13935&wid_hmac=57da705e57ebdf2829aa910fbcbc9a87&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13935 - PE-Movistar-Chevere
        "https://1d5e0be03f3.traffic-c.com/?wid=13745&wid_hmac=91350592d6dd7f5748580d3eec4c033a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13745 - PE-Movistar-Naranja
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13941&wid_hmac=6cbb58f5d7cc0fa9571f8a9f29e4e66d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13941 - BR-TIM-Whatsapp
        "https://1d5e0be03f3.traffic-c.com/?wid=13929&wid_hmac=e357e18f1437464488ce06e44c538145&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13929 - BR-TIM-Gravidez
        "https://1d5e0be03f3.traffic-c.com/?wid=13830&wid_hmac=3d8b50e12b25b3848465c006095596ab&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13830 - BR-TIM-Gossip
        "https://1d5e0be03f3.traffic-c.com/?wid=13559&wid_hmac=c9952c2aa45379b0b83130198fd9095c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13559 - BR-TIM-Kwiz
        "https://1d5e0be03f3.traffic-c.com/?wid=13558&wid_hmac=28d0cde22ed293b3d4d96854981df19e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13558 - BR-TIM-MobiVids
        "https://1d5e0be03f3.traffic-c.com/?wid=13557&wid_hmac=90e66f7363abc6d94f4402c76c6967d6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13557 - BR-TIM-FeeVida
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "QA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13925&wid_hmac=2e61fe043a878acf901dcf4b9f1f5988&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13925 - QA-Vodafone-Soccer
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13923&wid_hmac=75c4289b821858b30d25d2b4155f5d3e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13923 - DZ-Ooredoo-Funny
        "https://1d5e0be03f3.traffic-c.com/?wid=12676&wid_hmac=805e962567154deb10929810eb16a058&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12676 - DZ-Djezzy-VoiceCallchat
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13903&wid_hmac=ba0ba48bc0dcdfffe1a4c59e23c9de44&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13903 - CL-Entel-SportCelebrities
        "https://1d5e0be03f3.traffic-c.com/?wid=13901&wid_hmac=f83e2b8132e813483520b7e574f02f34&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13901 - CL-Entel-Celebrities
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SV" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13880&wid_hmac=37d3ce7f96005e6e7ba30f67bae2da37&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13880 - SV-Movistar-Mundialize
        "https://1d5e0be03f3.traffic-c.com/?wid=13879&wid_hmac=799e5c6cf69b54279da322c1e515a891&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13879 - SV-Movistar-Feria
        "https://1d5e0be03f3.traffic-c.com/?wid=13878&wid_hmac=1376f243878b7570e3979c3dd2b0afe6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13878 - SV-Tigo-Feria
        "https://1d5e0be03f3.traffic-c.com/?wid=13633&wid_hmac=6559cd746261d066f4d45cdbb9f43f7e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13633 - SV-Tigo/Wifi-Football 1
        "https://1d5e0be03f3.traffic-c.com/?wid=13632&wid_hmac=2d12faaa37343190588fa3e9eb1cdc9f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13632 - SV-Tigo/Wifi-Football 2
        "https://1d5e0be03f3.traffic-c.com/?wid=13604&wid_hmac=bce61eef3080bd83e803aa6d75e46910&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13604 - SV-3G-Mundializate
        "https://1d5e0be03f3.traffic-c.com/?wid=13231&wid_hmac=c0197c877bf00c654a1b47acf22188d9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13231 - SV-Claro-Fonik
        "https://1d5e0be03f3.traffic-c.com/?wid=13230&wid_hmac=950a131c4a8b42cc41f6b2609e9d4443&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13230 - SV-Claro-Fanmania
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13874&wid_hmac=29afe3886660f651dc51f6d656effc87&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13874 - KZ-Beeline-Playboy
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13861&wid_hmac=3794d56560635933042b1222ac24fccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13861 - DE/AT/CH-3G/Wifi-Get Stronger
        "https://1d5e0be03f3.traffic-c.com/?wid=13116&wid_hmac=c944adaf753fcee55155a50f75e255b5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13116 - CH-3G/WiFi-Video-Top10
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13861&wid_hmac=3794d56560635933042b1222ac24fccd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13861 - DE/AT/CH-3G/Wifi-Get Stronger
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JO" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13829&wid_hmac=f68261287bf45d236293de340f25ab9e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13829 - JO-3G-Bayern
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NG" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13809&wid_hmac=6e9cb6517608a2c52349bf32725676cd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13809 - NG-MTN-MobileMagazine
        "https://1d5e0be03f3.traffic-c.com/?wid=13808&wid_hmac=d3308fb85b7470ad445c473000cdd38f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13808 - NG-Airtel-3Flix
        "https://1d5e0be03f3.traffic-c.com/?wid=13273&wid_hmac=f963f1545dc60de30a9f8d826383d7da&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13273 - NG-Etisalat-HollywoodTrailers
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13806&wid_hmac=3114c644585a67ba4268fd5fccd475e0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13806 - RU-Tele2-Music
        "https://1d5e0be03f3.traffic-c.com/?wid=13123&wid_hmac=bfcd2bfe0d6e1b73aa96b1c1c3700a46&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13123 - RU-Beeline-Mainstr
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "OM" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13770&wid_hmac=85e52749e202be81b39eb555b897f6c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13770 - OM-Omantel-Football
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13739&wid_hmac=7109f3127c57095786e7eefd70cb639f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13739 - TR-3G-Victoria
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IQ" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13584&wid_hmac=86c1adcc7c6b534f6134ab4fd38b51a8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13584 - IQ-Korek-Kenzi
        "https://1d5e0be03f3.traffic-c.com/?wid=13420&wid_hmac=3526df75bcdbece634d58e76f0188cb5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13420 - IQ-Zain-Games
        "https://1d5e0be03f3.traffic-c.com/?wid=12866&wid_hmac=82577d9f1053cfb5080396838bc6cf96&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12866 - IQ-Zain-HalawatElDonia
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13575&wid_hmac=949a0e8f6b989e5799f29bebe89fc36f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13575 - AR-Movistar-Mainstream
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13565&wid_hmac=8b9c3708471aad57baf6e9f6d48dfcde&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13565 - PA-Digicel-Accidente
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13514&wid_hmac=34952e3a50e3b0ccd817d740b47fda11&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13514 - GH-Tigo-UnlimitedVideos
        "https://1d5e0be03f3.traffic-c.com/?wid=13513&wid_hmac=14b13d0ee367685b8da33db1ee6f6de0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13513 - GH-Tigo-Mtutor
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KH" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13511&wid_hmac=98b1678a37f8739b8f9921d542cd2b35&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13511 - KH-Cellcard-UnblockMeGame
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13272&wid_hmac=b9d5695197093f704bfc67f1f05b29b1&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13272 - ZA-MTN/Vodacom-Videobox
        "https://1d5e0be03f3.traffic-c.com/?wid=13271&wid_hmac=7508514f1f1a38e9d28811657c3e7947&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13271 - ZA-Vodacom-AdrenalineJunkies
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13253&wid_hmac=eb8c1c7b128e396fbd001993d183bf1d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13253 - GT-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NI" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13237&wid_hmac=c835db501d3e4bf1731344a2cdb7d95a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13237 - NI-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13226&wid_hmac=dad9eeecac5997013c3a6ea696992360&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13226 - EC-Claro-Fonik
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13225&wid_hmac=42756f3b16110c0d5ed3530667957bb9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13225 - CR-Claro-Fonik
        "https://1d5e0be03f3.traffic-c.com/?wid=13224&wid_hmac=a155311846e8cd4d9a83a7f9b8e7e710&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13224 - CR-Claro-Fanmania
        "https://1d5e0be03f3.traffic-c.com/?wid=11823&wid_hmac=8152af41f801b2552157bc7b883f4244&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11823 - CR-Claro-Main-Las mas hot
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=13212&wid_hmac=8b8b94c474cad0163921bbda9f26c3d2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13212 - HT-Digicell-MovilMain
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12998&wid_hmac=202db106c27c3964b4fce420f7a80d83&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12998 - BY-Life-Mainstreamvideo
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SU" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12909&wid_hmac=9749160052518fb91a85fff5ba0d6b54&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12909 - SU-Digicel-Club Movil
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UA" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12905&wid_hmac=08006ad06be6d278a56b5e9c120e090d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12905 - UA-Life-MainstreamVideo
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BD" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=12621&wid_hmac=5b5dad99520d5b4cc4a12748fdc5816e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 12621 - BD-Robi-PuzzleGames
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5e0be03f3.traffic-c.com/?wid=11903&wid_hmac=e866ac0ba3a6afc3edc77a838e3a3c7a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 11903 - UK-O2-PlayBoyVids
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.glzelnk.com/53710?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize VOD
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream smartlink
        "http://ck.glzelnk.com/53711?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize VOD WW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>