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
if ( $country == "CY" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18303&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18309&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46899&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18303&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18309&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46899&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18287&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18290&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50811&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50885&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - HU Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18041&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43815&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50749&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - HU Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18087&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30603&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50816&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - ES Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18216&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31671&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50750&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - ES Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17956&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18913&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23942&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17956&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18913&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23942&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=28311&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30652&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31881&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50882&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28474&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32521&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32912&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38040&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42097&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42975&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=28311&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30652&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31881&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50882&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28474&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32521&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32912&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38040&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42097&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42975&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17943&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31780&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50886&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - IT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17948&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35315&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35558&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - IT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30605&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - PT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18379&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - PT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18375&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18028&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18469&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18636&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31779&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=43446&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50883&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - RO Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17956&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23807&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35389&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37833&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43009&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - RO Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOiHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18127&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CZ Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOiHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18037&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CZ Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOiHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20816&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CZ Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOdHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18076&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - SK Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOdHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - SK Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=19984&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - BG Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18092&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - BG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35313&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - BG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42491&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - BG Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOgHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18544&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - PL Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOgHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18421&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PL Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOgHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18027&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PL Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31778&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - FR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17996&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - FR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18077&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - FR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39640&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - FR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39642&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - FR Pre-landing
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
if ( $country == "CY" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18303&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18309&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46899&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18303&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18309&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CY, GR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=46899&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOeHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18103&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CY, GR Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18287&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18290&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50811&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50885&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - HU Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18041&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43815&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - HU Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOjHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50749&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - HU Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18087&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30603&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50816&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - ES Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18216&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31671&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - ES Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOZHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50750&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - ES Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17956&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18913&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23942&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17956&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18913&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - DE, AT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOcHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23942&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - DE, AT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=28311&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30652&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31881&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50882&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28474&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32521&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32912&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38040&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42097&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42975&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=28311&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30652&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31881&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50882&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28474&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32521&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32912&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38040&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42097&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - NL, BE Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNQMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42975&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - NL, BE Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17943&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31780&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50886&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - IT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17948&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35315&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - IT Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOYHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35558&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - IT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30605&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - PT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18379&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - PT Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18375&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PT Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOaHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18028&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PT Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18469&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18636&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31779&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=43446&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=50883&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - RO Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17956&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23807&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35389&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37833&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - RO Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOhHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43009&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - RO Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOiHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18127&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CZ Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOiHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18037&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - CZ Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOiHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20816&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - CZ Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOdHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18076&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - SK Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOdHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18641&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - SK Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=19984&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - BG Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18092&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - BG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35313&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - BG Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42491&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - BG Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOgHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18544&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - PL Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOgHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=18421&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PL Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOgHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18027&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - PL Pre-landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" && $link == "363" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=31778&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - FR Landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17996&ap=-1&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - FR Landing
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" && $link == "365" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18077&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - FR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39640&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Motion Free - FR Pre-landing
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQObHwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39642&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Motion Free - FR Pre-landing
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