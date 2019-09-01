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
if ( $country == "UK" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13847&wid_hmac=196ad3ad91d5ec2f4ea85582db9af1b7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13847 - UK-3G/Wifi-IOS-Casinocom
        "https://1d5e0426b53.traffic-c.com/?wid=13849&wid_hmac=6b46db61e5c4d16e70e99551ebf7c557&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13849 - UK-3G/Wifi-IOS-888
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13847&wid_hmac=196ad3ad91d5ec2f4ea85582db9af1b7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13847 - UK-3G/Wifi-IOS-Casinocom
        "https://1d5e0426b53.traffic-c.com/?wid=13849&wid_hmac=6b46db61e5c4d16e70e99551ebf7c557&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13849 - UK-3G/Wifi-IOS-888
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13848&wid_hmac=94d11adc8aa4d3470db3dbe5ce349973&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13848 - AU-3G/Wifi-Unique
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13780 - Multigeo-3G/wifi-CasinoRama
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13846&wid_hmac=1210b0acde29c69da5b0f56521d7d76c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13846 - DE-3G/Wifi-Casinocom
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13780 - Multigeo-3G/wifi-CasinoRama
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13845&wid_hmac=e65aeb0eaa2c0f31003a9cefa7f44ebd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13845 - CA-3G/Wifi-IOS-Casinocom
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13704&wid_hmac=f222863e15b85a6361e8f400e18ce8d2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13704 - ZA-3G/wifi-CasinoOnline
        "https://1d5e0426b53.traffic-c.com/?wid=13705&wid_hmac=e7065e28802f6bce2d90640b7451c92d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13705 - ZA-3G/wifi-Rugby
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FK" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GL" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IM" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LB" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LU" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to backoffers after geo target
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling backoffer
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
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
//geo target first with geo direct offer backoffers or simply backoffers if offers are good for this geo
if ( $country == "UK" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13847&wid_hmac=196ad3ad91d5ec2f4ea85582db9af1b7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13847 - UK-3G/Wifi-IOS-Casinocom
        "https://1d5e0426b53.traffic-c.com/?wid=13849&wid_hmac=6b46db61e5c4d16e70e99551ebf7c557&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13849 - UK-3G/Wifi-IOS-888
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13847&wid_hmac=196ad3ad91d5ec2f4ea85582db9af1b7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // 13847 - UK-3G/Wifi-IOS-Casinocom
        "https://1d5e0426b53.traffic-c.com/?wid=13849&wid_hmac=6b46db61e5c4d16e70e99551ebf7c557&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13849 - UK-3G/Wifi-IOS-888
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13848&wid_hmac=94d11adc8aa4d3470db3dbe5ce349973&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13848 - AU-3G/Wifi-Unique
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13780 - Multigeo-3G/wifi-CasinoRama
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13846&wid_hmac=1210b0acde29c69da5b0f56521d7d76c&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13846 - DE-3G/Wifi-Casinocom
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13780 - Multigeo-3G/wifi-CasinoRama
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13845&wid_hmac=e65aeb0eaa2c0f31003a9cefa7f44ebd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13845 - CA-3G/Wifi-IOS-Casinocom
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5e0426b53.traffic-c.com/?wid=13779&wid_hmac=74ef2c0be030d56475504e03f47c0d8a&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13779 - Multigeo-3G/wifi-CasinoGrato
        "https://1d5e0426b53.traffic-c.com/?wid=13778&wid_hmac=5596c0fa9c876de5db435f12db928f82&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13778 - Multigeo-3G/Wifi-Scratchmania
        "https://1d5e0426b53.traffic-c.com/?wid=13777&wid_hmac=2cc5348f816f2382461b15461aba96c0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13777 - Multigeo-3G/Wifi-CasinoPark  
        "https://1d5e0426b53.traffic-c.com/?wid=13780&wid_hmac=2a20bc249e51c2672f1a24f0d9e4e266&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13780 - Multigeo-3G/wifi-CasinoRama
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ZA" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13674&wid_hmac=16c0e26c2a4e515904af22b243aa20fb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13674 - Multigeo-3G/wifi-WinwardCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13672&wid_hmac=88ee6b269578291016a5b72dbde5249e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13672 - Multigeo-3G/wifi-ThebesCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13671&wid_hmac=04d2175623571d32bc83fdb12e97a175&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13671 - Multigeo-3G/wifi-Tangierscasino
        "https://1d5e0426b53.traffic-c.com/?wid=13670&wid_hmac=796de09b37bf2bff414c857b017cf749&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13670 - Multigeo-3G/wifi-MoonsCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13669&wid_hmac=e8e6df136a733dfec7c09e13129b9629&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13669 - Multigeo-3G/wifi-RichCasino
        "https://1d5e0426b53.traffic-c.com/?wid=13704&wid_hmac=f222863e15b85a6361e8f400e18ce8d2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13704 - ZA-3G/wifi-CasinoOnline
        "https://1d5e0426b53.traffic-c.com/?wid=13705&wid_hmac=e7065e28802f6bce2d90640b7451c92d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13705 - ZA-3G/wifi-Rugby
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FK" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GL" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IM" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LB" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LU" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13583 - Multigeo-Casino
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to backoffers after geo target
    $urls = array(
        "http://ck.gl2022.info/53036?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Gambling backoffer
        "https://1d5e0426b53.traffic-c.com/?wid=13583&wid_hmac=4febf016205cbd120e8d9c81f56944fd&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13583 - Multigeo-Casino
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TrafficCompany mainstream backoffer
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker" // SlimSpots mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>
