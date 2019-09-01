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
if ( $country == "BR" ) { 
    $urls = array(
        "https://1d5e040e4b3.traffic-c.com/?wid=13791&wid_hmac=7e1bf06c07b2f5568a4524bc19c2ffa7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13791 - BR-Nutra-Anadrole
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13334&wid_hmac=826ae6b09dfc94cf3001ad43fa6dff11&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13334 - US-Nutra-TrailTrembolex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=10351&wid_hmac=88289c8a789458654cb4af7bdb4e135b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10351 - IT-3G/WIFI-Long Up
        "https://www.nutracash.club/?id=43331&product=4&lang=it&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus IT All Pack
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26588&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35436&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - IT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR         
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);    
} elseif ( $country == "MY" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13715&wid_hmac=6998ed07f9a3a8bca25944353e425ae3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13715 - MY-3G/Wifi-Bustelle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13481&wid_hmac=39941eadf2e502be8bd57d20e1913962&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13481 - NL-3G/WIFI-Actidol
        "https://1d5e04ea053.traffic-c.com/?wid=13480&wid_hmac=5ff6bc572ded25ade33ccd74e61105b3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13480 - NL-3G/WIFI-Actidol (Prelander)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitness
       "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13506&wid_hmac=371a1a89ae00a58baf83586de5ea10e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13506 - ES-3G/WIFI-Musle Growth (Prelander)
        "https://www.nutracash.club/?id=43331&product=4&lang=es&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus ES All Pack
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
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35439&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - HU
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26142&ap=26536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CZ
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);        
} elseif ( $country == "FR" ) { 
    $urls = array(
        "https://www.nutracash.club/?id=43331&product=4&lang=fr&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus FR All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26526&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Waist Trainer - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Waist Trainer - BG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);    
} elseif ( $country == "GB" ) { 
    $urls = array(
       "https://www.nutracash.club/?id=43331&product=4&lang=en&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus EN All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNaQQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Spa - BA
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);    
} elseif ( $country == "CH" ) { 
    $urls = array(
       "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus DE All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
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
if ( $country == "BR" ) { 
    $urls = array(
       "https://1d5e040e4b3.traffic-c.com/?wid=13791&wid_hmac=7e1bf06c07b2f5568a4524bc19c2ffa7&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13791 - BR-Nutra-Anadrole
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13334&wid_hmac=826ae6b09dfc94cf3001ad43fa6dff11&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13334 - US-Nutra-TrailTrembolex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=10351&wid_hmac=88289c8a789458654cb4af7bdb4e135b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10351 - IT-3G/WIFI-Long Up
        "https://www.nutracash.club/?id=43331&product=4&lang=it&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus IT All Pack
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26588&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35436&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - IT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR         
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);      
} elseif ( $country == "MY" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13715&wid_hmac=6998ed07f9a3a8bca25944353e425ae3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13715 - MY-3G/Wifi-Bustelle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "https://1d5e04ea053.traffic-c.com/?wid=13481&wid_hmac=39941eadf2e502be8bd57d20e1913962&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13481 - NL-3G/WIFI-Actidol
        "https://1d5e04ea053.traffic-c.com/?wid=13480&wid_hmac=5ff6bc572ded25ade33ccd74e61105b3&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13480 - NL-3G/WIFI-Actidol (Prelander)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitness
       "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
       "https://1d5e04ea053.traffic-c.com/?wid=13506&wid_hmac=371a1a89ae00a58baf83586de5ea10e2&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13506 - ES-3G/WIFI-Musle Growth (Prelander)
        "https://www.nutracash.club/?id=43331&product=4&lang=es&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus ES All Pack
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
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35439&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - HU
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26142&ap=26536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CZ
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);         
} elseif ( $country == "FR" ) { 
    $urls = array(
        "https://www.nutracash.club/?id=43331&product=4&lang=fr&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus FR All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26526&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Waist Trainer - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Waist Trainer - BG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);    
} elseif ( $country == "HR" ) { 
    $urls = array(
        "https://gltrak.com/aff_c2.php?offer_id=974&aff_id=10787&pid=59529&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-L-arginine-Desktop (ID: 974)
        "https://gltrak.com/aff_c2.php?offer_id=974&aff_id=10787&pid=59779&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // HR-L-arginine-Desktop (ID: 974)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
       "https://www.nutracash.club/?id=43331&product=4&lang=en&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus EN All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNaQQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Spa - BA
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);    
} elseif ( $country == "CH" ) { 
    $urls = array(
       "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus DE All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.glzelnk.com/53653?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Fitnesssmartlink
        "https://dtrk.slimcdn.com/directclick/?pid=r3osD70AeZ7IQyPv0pjPCaK0Vjg1&wsid=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subid=$tracker", // SlimSpots mainstream smartlink
        "https://1d5df208093.traffic-c.com/?p=5221&media_type=mainstream&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TrafficCompany mainstream smartlink
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>