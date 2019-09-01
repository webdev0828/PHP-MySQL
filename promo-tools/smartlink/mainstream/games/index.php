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
if ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13760&wid_hmac=7eaebea13727bde3bc6b04e7a062896c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13760 - PL-3G-mobgames  HOT EXCLUSIVE 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13825&wid_hmac=dfc671ff0d72ea2d4103aca18c7c082c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13825 - IN-Vodafone-Schooltimmy  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12972&wid_hmac=302d2681ea8a14a38196ddf392791f5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 12972 - DZ-Ooredoo-CristianoRonaldo
        "https://1d5e0394393.traffic-c.com/?wid=13582&wid_hmac=c0652d4c3ec19cf1855ef49bb08a882f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13582 - DZ-Ooredoo-GodOfLight  
        "https://1d5e0394393.traffic-c.com/?wid=13595&wid_hmac=e90307adba56ecbcd48a47716ec607bc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13595 - DZ-Ooredoo-SportsClub  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13043&wid_hmac=74c744fb9054c47a65cec99c44403b6b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13043 - IT-H3G-Penguino
        "https://1d5e0394393.traffic-c.com/?wid=13346&wid_hmac=925089714d410bb7d3dd249dd270af91&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13346 - IT-TIM-IwantYouMain
        "https://1d5e0394393.traffic-c.com/?wid=13734&wid_hmac=b570c3b47e72252dbd4f18ef2defd81d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13734 - IT-WIND-Game2play
        "https://1d5e0394393.traffic-c.com/?wid=13737&wid_hmac=fc23c48cb0fa37b44b435e29a0e6c937&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13737 - IT-WIND-DailyNews
        "https://1d5e0394393.traffic-c.com/?wid=13572&wid_hmac=df686543042ee08c9dbab0c69be42180&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13572 - IT-H3G-150Giochi  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13376&wid_hmac=5c7322f5a5dea47b8bac6890dcfa99ae&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13376 - MM-Telenor-TopGames
        "https://1d5e0394393.traffic-c.com/?wid=13748&wid_hmac=5e509df50ccb966e7510a7c016ee839c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13748 - MM-Telenor-GamersHeaven
        "https://1d5e0394393.traffic-c.com/?wid=13410&wid_hmac=865008966852e3912f8f612cb651d8c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13410 - MM-Telenor-Godoflight  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "QA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13719&wid_hmac=4fd4189e602d43fb8016aca8a055e27e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13719 - QA-Ooredoo-Gamezone  
        "https://1d5e0394393.traffic-c.com/?wid=13017&wid_hmac=e1ff4f263f3b071610e517434280c4c2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13017 - QT-Ooredoo/Vodafone-Gamemob  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13828&wid_hmac=b61a7d398457334ef88a4161708451ea&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13828 - UY-Antel-Gamer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13818&wid_hmac=9ff7d6fddae5b8b4ab82c2cc833c9ff3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13818 - AE-Etisalat-YoungTV
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13812&wid_hmac=162c6a2b83979eaf27bfee8dda6573d6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13812 - KE-Safaricom-Gamezone
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13301&wid_hmac=faf6c1ec6f13a2fc84f092aaf7fa4cfd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13301 - CH-Swisscom-BrainTrainer
        "https://1d5e0394393.traffic-c.com/?wid=13802&wid_hmac=cfc713ecd32cedc6f536d88d5f195348&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13802 - CH-3G/Wifi-Pub6game
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "OM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13769&wid_hmac=23c67f4b75483a6c52807b26d2668c5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13769 - OM-Omantel-GameSpace
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13767&wid_hmac=7799b5737f700693775571c5298c9792&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13767 - PT-Vodafone-HTML5 Games 
        "https://1d5e0394393.traffic-c.com/?wid=13768&wid_hmac=7e2fdc88a6354f4ed110d358a7e4b8dc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13768 - PT-Vodafone-PlayGo
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13740&wid_hmac=bb6394ed8c18f91b9f3c7378e9cf890e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13740 - TR-Vodafone-Funnygames
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13736&wid_hmac=7dfc6616d9f9a30520d8de47a81f6deb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13736 - ES-Vodafone-CasinoGame
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13679&wid_hmac=203387317b2406b7d5e61e3b3fd3e812&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13679 - NL-3G-TheGame
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IQ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13562&wid_hmac=5050ed4dd1bc3ee8ed9c97dfb93cd5c4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13562 - IQ-Asiacell-Templerun  
        "https://1d5e0394393.traffic-c.com/?wid=13591&wid_hmac=fbb8082fd763428cdbb6e7b3fbd576bd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13591 - IQ-Asiacell-Playbox
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13560&wid_hmac=97fb7e515dd4c26af60567069063da7e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13560 - ZA-CellC-BestGames  
        "https://1d5e0394393.traffic-c.com/?wid=13561&wid_hmac=f77a0e9be7765d315bdc2837401f6544&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13561 - ZA-CellC-Fifa19  
        "https://1d5e0394393.traffic-c.com/?wid=13578&wid_hmac=8f72e8069d0fbbd5a9c145b4111b7b8b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13578 - ZA-MTN-CoolGames
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13535&wid_hmac=f80e4a03f7004f29f18c6f186c990f7a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13535 - CL-WOM-ThorGame
        "https://1d5e0394393.traffic-c.com/?wid=13536&wid_hmac=cde65b105103d9cb54e380c2e1b258f5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13536 - CL-WOM-Starwars
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13522&wid_hmac=5dc55541f339a3d5cc5005cd960770d9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13522 - DK-3G/WiFi-Pokemon
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13445&wid_hmac=d4486ddd396e38fd65722934bfc095e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13445 - KW-Ooredoo-TopGames
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13429&wid_hmac=33365fc89354a613d78d9edc3c501cef&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13429 - AR-Movistar-Gameasy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LC" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13395&wid_hmac=9d6efdb54001451a1f159b741711af0b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13395 - LC-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13394&wid_hmac=39e945ef145e2d05ca89ea94ef0faaae&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13394 - CW-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13393&wid_hmac=fcfbacd424119ee3d554cddf7abc78f2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13393 - AW-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13392&wid_hmac=af86ea049d51ecf60609a86cd35c1afa&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13392 - SR-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13391&wid_hmac=6eceac8a223d702c18d7f8ed4abf6136&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13391 - TT-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13390&wid_hmac=bf70ad0c93ac1923ec92bd8dcad19ff4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13390 - JM-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13329&wid_hmac=f0aaf365deefc4b3f9234404eb51fb49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13329 - RU-Tele2-GoodContent
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13244&wid_hmac=431ad289c77545c311de696ac09e5aa2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13244 - CO-Claro-Gamecity
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13242&wid_hmac=45e957fd8adde24b06a5398f3fc66acd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13242 - PA-Claro-Gamecity
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13227&wid_hmac=c656fcdadc65d3e809d378bffb56a004&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13227 - EC-Claro-Gamecity
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SD" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13029&wid_hmac=0b992b5a09f66751e759241bcab75c2c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13029 - SD-MTN-AssasinsCreed
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12862&wid_hmac=6cfc19975cb2faa4114d580db9facffb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12862 - AT-H3G-BrainTeacher
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12751&wid_hmac=eb1ec0f496baba8f70b28fec6d608bdd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12751 - CR-Claro-Gender
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12698&wid_hmac=8cd6a740113b239c73437825b360cc50&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12698 - BY-3G-Mobigamer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12698&wid_hmac=8cd6a740113b239c73437825b360cc50&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12698 - BY-3G-Mobigamer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games smartlink
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
if ( $country == "IN" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13825&wid_hmac=dfc671ff0d72ea2d4103aca18c7c082c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13825 - IN-Vodafone-Schooltimmy  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12972&wid_hmac=302d2681ea8a14a38196ddf392791f5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 12972 - DZ-Ooredoo-CristianoRonaldo
        "https://1d5e0394393.traffic-c.com/?wid=13582&wid_hmac=c0652d4c3ec19cf1855ef49bb08a882f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13582 - DZ-Ooredoo-GodOfLight
        "https://1d5e0394393.traffic-c.com/?wid=13595&wid_hmac=e90307adba56ecbcd48a47716ec607bc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13595 - DZ-Ooredoo-SportsClub  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4704&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships IT - Network
        "https://wgaffiliate.com/?a=1960&c=4725&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - IT - Network
        "https://1d5e0394393.traffic-c.com/?wid=13043&wid_hmac=74c744fb9054c47a65cec99c44403b6b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13043 - IT-H3G-Penguino
        "https://1d5e0394393.traffic-c.com/?wid=13346&wid_hmac=925089714d410bb7d3dd249dd270af91&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13346 - IT-TIM-IwantYouMain
        "https://1d5e0394393.traffic-c.com/?wid=13734&wid_hmac=b570c3b47e72252dbd4f18ef2defd81d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13734 - IT-WIND-Game2play
        "https://1d5e0394393.traffic-c.com/?wid=13737&wid_hmac=fc23c48cb0fa37b44b435e29a0e6c937&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13737 - IT-WIND-DailyNews
        "https://1d5e0394393.traffic-c.com/?wid=13572&wid_hmac=df686543042ee08c9dbab0c69be42180&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13572 - IT-H3G-150Giochi  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13376&wid_hmac=5c7322f5a5dea47b8bac6890dcfa99ae&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13376 - MM-Telenor-TopGames
        "https://1d5e0394393.traffic-c.com/?wid=13748&wid_hmac=5e509df50ccb966e7510a7c016ee839c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13748 - MM-Telenor-GamersHeaven 
        "https://1d5e0394393.traffic-c.com/?wid=13410&wid_hmac=865008966852e3912f8f612cb651d8c9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13410 - MM-Telenor-Godoflight  HOT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "QA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13719&wid_hmac=4fd4189e602d43fb8016aca8a055e27e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13719 - QA-Ooredoo-Gamezone  
        "https://1d5e0394393.traffic-c.com/?wid=13017&wid_hmac=e1ff4f263f3b071610e517434280c4c2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13017 - QT-Ooredoo/Vodafone-Gamemob  EXCLUSIVE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships Latam - Network
        "https://1d5e0394393.traffic-c.com/?wid=13828&wid_hmac=b61a7d398457334ef88a4161708451ea&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13828 - UY-Antel-Gamer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13818&wid_hmac=9ff7d6fddae5b8b4ab82c2cc833c9ff3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13818 - AE-Etisalat-YoungTV
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - DE/AT/CH - Network
        "https://wgaffiliate.com/?a=1960&c=4692&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships DE/AT/CH - Network
        "https://1d5e0394393.traffic-c.com/?wid=13802&wid_hmac=cfc713ecd32cedc6f536d88d5f195348&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13802 - CH-3G/Wifi-Pub6game
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13812&wid_hmac=162c6a2b83979eaf27bfee8dda6573d6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13812 - KE-Safaricom-Gamezone
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "OM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games 
        "https://1d5e0394393.traffic-c.com/?wid=13769&wid_hmac=23c67f4b75483a6c52807b26d2668c5d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13769 - OM-Omantel-GameSpace
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4736&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - PT - Network
        "https://wgaffiliate.com/?a=1960&c=4715&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships PT - Network
        "https://1d5e0394393.traffic-c.com/?wid=13767&wid_hmac=7799b5737f700693775571c5298c9792&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13767 - PT-Vodafone-HTML5 Games
        "https://1d5e0394393.traffic-c.com/?wid=13768&wid_hmac=7e2fdc88a6354f4ed110d358a7e4b8dc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13768 - PT-Vodafone-PlayGo
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4742&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - TR - Network
        "https://wgaffiliate.com/?a=1960&c=4724&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships TR - Network
        "https://1d5e0394393.traffic-c.com/?wid=13740&wid_hmac=bb6394ed8c18f91b9f3c7378e9cf890e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13740 - TR-Vodafone-Funnygames
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4694&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships ES - Network
        "https://wgaffiliate.com/?a=1960&c=4709&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - ES - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=9453&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - NL - Network
        "https://wgaffiliate.com/?a=1960&c=9452&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IQ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13560&wid_hmac=97fb7e515dd4c26af60567069063da7e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13560 - ZA-CellC-BestGames  
        "https://1d5e0394393.traffic-c.com/?wid=13562&wid_hmac=5050ed4dd1bc3ee8ed9c97dfb93cd5c4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13562 - IQ-Asiacell-Templerun
        "https://1d5e0394393.traffic-c.com/?wid=13591&wid_hmac=fbb8082fd763428cdbb6e7b3fbd576bd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13591 - IQ-Asiacell-Playbox
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13561&wid_hmac=f77a0e9be7765d315bdc2837401f6544&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13561 - ZA-CellC-Fifa19
        "https://1d5e0394393.traffic-c.com/?wid=13578&wid_hmac=8f72e8069d0fbbd5a9c145b4111b7b8b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13578 - ZA-MTN-CoolGames
        "https://wgaffiliate.com/?a=1960&c=9451&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships SA - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships Latam - Network
        "https://1d5e0394393.traffic-c.com/?wid=13535&wid_hmac=f80e4a03f7004f29f18c6f186c990f7a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13535 - CL-WOM-ThorGame
        "https://1d5e0394393.traffic-c.com/?wid=13536&wid_hmac=cde65b105103d9cb54e380c2e1b258f5&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13536 - CL-WOM-Starwars
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Scand/NL - Network
        "https://wgaffiliate.com/?a=1960&c=4719&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships Scand/NL - Network
        "https://1d5e0394393.traffic-c.com/?wid=13522&wid_hmac=5dc55541f339a3d5cc5005cd960770d9&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13522 - DK-3G/WiFi-Pokemon
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13445&wid_hmac=d4486ddd396e38fd65722934bfc095e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13445 - KW-Ooredoo-TopGames
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships Latam - Network
        "https://1d5e0394393.traffic-c.com/?wid=13429&wid_hmac=33365fc89354a613d78d9edc3c501cef&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13429 - AR-Movistar-Gameasy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LC" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13395&wid_hmac=9d6efdb54001451a1f159b741711af0b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13395 - LC-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13394&wid_hmac=39e945ef145e2d05ca89ea94ef0faaae&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13394 - CW-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AW" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13393&wid_hmac=fcfbacd424119ee3d554cddf7abc78f2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13393 - AW-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13392&wid_hmac=af86ea049d51ecf60609a86cd35c1afa&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13392 - SR-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13391&wid_hmac=6eceac8a223d702c18d7f8ed4abf6136&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13391 - TT-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JM" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13390&wid_hmac=bf70ad0c93ac1923ec92bd8dcad19ff4&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13390 - JM-Digicel-Games
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RU" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://1d5e0394393.traffic-c.com/?wid=13329&wid_hmac=f0aaf365deefc4b3f9234404eb51fb49&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13329 - RU-Tele2-GoodContent
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships Latam - Network
        "https://1d5e0394393.traffic-c.com/?wid=13244&wid_hmac=431ad289c77545c311de696ac09e5aa2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13244 - CO-Claro-Gamecity
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13242&wid_hmac=45e957fd8adde24b06a5398f3fc66acd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13242 - PA-Claro-Gamecity
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships Latam - Network
        "https://1d5e0394393.traffic-c.com/?wid=13227&wid_hmac=c656fcdadc65d3e809d378bffb56a004&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13227 - EC-Claro-Gamecity
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SD" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=13029&wid_hmac=0b992b5a09f66751e759241bcab75c2c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13029 - SD-MTN-AssasinsCreed
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - DE/AT/CH - Network
        "https://wgaffiliate.com/?a=1960&c=4692&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CR" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://1d5e0394393.traffic-c.com/?wid=12751&wid_hmac=eb1ec0f496baba8f70b28fec6d608bdd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12751 - CR-Claro-Gender
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BY" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://1d5e0394393.traffic-c.com/?wid=12698&wid_hmac=8cd6a740113b239c73437825b360cc50&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 12698 - BY-3G-Mobigamer
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - DE/AT/CH - Network
        "https://wgaffiliate.com/?a=1960&c=4692&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Scand/NL - Network
        "https://wgaffiliate.com/?a=1960&c=4719&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Scand/NL - Network
        "https://wgaffiliate.com/?a=1960&c=4719&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Scand/NL - Network
        "https://wgaffiliate.com/?a=1960&c=4719&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4696&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Canada - Network
        "https://wgaffiliate.com/?a=1960&c=4688&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Canada - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4728&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships US - Network
        "https://wgaffiliate.com/?a=1960&c=4728&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships US - Network
        "https://wgaffiliate.com/?a=1960&c=4745&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - US - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4683&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - AU - Network
        "https://wgaffiliate.com/?a=1960&c=4682&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships AU - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games
        "https://wgaffiliate.com/?a=1960&c=4681&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships - NZ - Network
        "https://wgaffiliate.com/?a=1960&c=4733&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - NZ - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "JP" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4706&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships JP - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4727&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships UK/IE - Network
        "https://wgaffiliate.com/?a=1960&c=4744&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - UK/IE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4727&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships UK/IE - Network
        "https://wgaffiliate.com/?a=1960&c=4744&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - UK/IE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4712&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - FR/BE - Network
        "https://wgaffiliate.com/?a=1960&c=4697&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships FR/BE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4712&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - FR/BE - Network
        "https://wgaffiliate.com/?a=1960&c=4697&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships FR/BE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4691&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CZ/SK - Network
        "https://wgaffiliate.com/?a=1960&c=4702&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CZ/SK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4691&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CZ/SK - Network
        "https://wgaffiliate.com/?a=1960&c=4702&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CZ/SK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4735&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - PL - Network
        "https://wgaffiliate.com/?a=1960&c=4713&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships PL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4703&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships HU - Network
        "https://wgaffiliate.com/?a=1960&c=4722&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - HU - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4714&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - GR - Network
        "https://wgaffiliate.com/?a=1960&c=4699&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships GR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4701&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships HR - Network
        "https://wgaffiliate.com/?a=1960&c=4720&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - HR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4740&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - SG - Network
        "https://wgaffiliate.com/?a=1960&c=4721&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships SG - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TW" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4743&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - TW - Network
        "https://wgaffiliate.com/?a=1960&c=4726&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships TW - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AM" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MD" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TM" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UA" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4689&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships CIS (RU/BY/UA/KZ) - Network
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Baltics - Network
        "https://wgaffiliate.com/?a=1960&c=4684&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Baltics - Network
        "https://wgaffiliate.com/?a=1960&c=4684&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - Baltics - Network
        "https://wgaffiliate.com/?a=1960&c=4684&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HK" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4700&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships HK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4716&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships RO - Network
        "https://wgaffiliate.com/?a=1960&c=4737&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - RO - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games smartlink
        "https://wgaffiliate.com/?a=1960&c=4718&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Warships RS - Network
        "https://wgaffiliate.com/?a=1960&c=4738&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - RS - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4690&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - BG - Network
        "https://wgaffiliate.com/?a=1960&c=4685&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships BG - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - LATAM - Network
        "https://wgaffiliate.com/?a=1960&c=4759&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships Latam - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4693&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - BR - Network
        "https://wgaffiliate.com/?a=1960&c=4687&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships BR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4732&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - MY - Network
        "https://wgaffiliate.com/?a=1960&c=4710&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships MY - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4734&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - PH - Network
        "https://wgaffiliate.com/?a=1960&c=4711&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships PH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4741&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - TH - Network
        "https://wgaffiliate.com/?a=1960&c=4723&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships TH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IL" ) { 
    $urls = array(
        "https://wgpartner.com/?a=1960&c=9457&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - IL - Network
        "https://wgaffiliate.com/?a=1960&c=9456&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships - IL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9450&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - KR - Network
        "https://wgaffiliate.com/?a=1960&c=9449&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships KR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9455&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // WG new World of Tanks - GE - Network
        "https://wgaffiliate.com/?a=1960&c=9454&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Warships GE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2022.info/52667?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Games smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream smartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>