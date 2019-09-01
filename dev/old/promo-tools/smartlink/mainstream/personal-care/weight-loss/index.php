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
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e040e4b3.traffic-c.com/?wid=13792&wid_hmac=d36ca0e5ac75ca2b17cfc6786e082dec&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13792 - BR-Nutra-Green Coffee
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13490&wid_hmac=5bb562b821ccbf960b4acf38e76c3b26&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13490 - DE-3G/WIFI-Weigh Loss (Prelander)
        "https://1d5e04ea053.traffic-c.com/?wid=13488&wid_hmac=617c7710d1f0a20a676dfb0be2c3860d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13488 - DE-3G/WIFI-Raspberry (Prelander)
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13931&wid_hmac=c864795b7c8e466812882a972b25c176&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13931 - DE-BioVelissTabs(Prelander)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5858&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6376&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6478&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6595&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7373&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7383&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7455&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8025&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8738&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10806&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13530&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13613&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14885&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15330&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16074&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17084&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17565&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11354&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12916&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12919&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13269&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14001&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18800&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30501&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33022&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT   
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13927&wid_hmac=9c1de3420b675d64b0a6d48bf3183ae0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13927 - USA-KetoXSDiet
        "https://1d5e04ea053.traffic-c.com/?wid=13332&wid_hmac=acadd8eda2da96855bc2848550e1ddc8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13332 - US/CA-Nutra-ApexForskolin
        "https://1d5e04ea053.traffic-c.com/?wid=13928&wid_hmac=94728e83fa90f978d52a405c41dbf2f6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13928 - USA-GarciniaProDiet
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13332&wid_hmac=acadd8eda2da96855bc2848550e1ddc8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13332 - US/CA-Nutra-ApexForskolin
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13534&wid_hmac=85b0e50a4d02f8161d155bb2ced6f03f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13534 - Italy-3G/wifi-Oslim
        "https://1d5e04ea053.traffic-c.com/?wid=10322&wid_hmac=a96d1ca6772c1eadae013ca83595cdbf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10322 - IT-3G/WIFI-Anti Cellulite
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=54085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Mobile (ID: 742)
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=70946&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Mobile (ID: 742)
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=44617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Mobile (ID: 742)
        "https://gltrak.com/aff_c2.php?offer_id=742&aff_id=10787&pid=56951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Mobile (ID: 742)
        "https://gltrak.com/aff_c2.php?offer_id=910&aff_id=10787&pid=59890&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-SlimExcelle-Mobile (ID: 910)
        "https://www.nutracash.club/?id=43331&product=4&lang=it&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus IT All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13764&wid_hmac=48107da2b683363c6b5eabc18a17c272&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13764 - IT-3G/WIFI-Gacinia (Prelander)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38585&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40058&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40060&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41036&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41037&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41484&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11319&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11465&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12467&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12915&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15064&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15205&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19861&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21045&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36472&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46825&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=48822&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=54&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=56&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=58&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=578&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=1401&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=1907&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=1908&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2287&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2683&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3203&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3555&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5132&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5236&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5381&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://azsxd.pro/forms/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5187&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5592&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5595&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6034&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6056&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6094&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6160&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6182&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8214&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8733&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19524&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOtMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30600&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOtMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33021&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEPAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16678&ap=106&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEPAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16678&ap=297&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39062&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC ULTRASLIM - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42250&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC ULTRASLIM - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42251&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC ULTRASLIM - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26588&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35436&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - IT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOlOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - SE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOlOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39089&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC EcoSlim fizzy - SE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MY" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=664&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8781&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16636&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16639&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28973&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30653&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36507&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36508&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36762&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36763&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36840&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36841&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37359&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37359&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37375&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37410&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37411&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37777&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39041&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20471&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23356&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24372&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24373&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6PQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23575&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Let Duet - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6PQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30847&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Let Duet - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6PQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42072&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Let Duet - MY          
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11701&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12559&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12820&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12926&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13367&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13404&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15208&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18848&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47720&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47723&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7340&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14083&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16523&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16562&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30462&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33019&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=10318&wid_hmac=cd1202be76bcd10711c9091eca59970b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10318 - GR-3G/WIFI-MultiSlim
        "https://gltrak.com/aff_c2.php?offer_id=784&aff_id=10787&pid=56834&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Mobile (ID: 784)
        "https://gltrak.com/aff_c2.php?offer_id=784&aff_id=10787&pid=54082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Mobile (ID: 784)
        "https://gltrak.com/aff_c2.php?offer_id=784&aff_id=10787&pid=56949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Mobile (ID: 784)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11701&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12559&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12820&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12926&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13367&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13404&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15208&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18848&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47720&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47723&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7340&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14083&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16523&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16562&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30462&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33019&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=792&aff_id=10787&pid=57988&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Mobile (ID: 792)
        "https://gltrak.com/aff_c2.php?offer_id=792&aff_id=10787&pid=54093&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Mobile (ID: 792)
        "https://gltrak.com/aff_c2.php?offer_id=792&aff_id=10787&pid=56958&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Mobile (ID: 792)
        "https://gltrak.com/aff_c2.php?offer_id=265&aff_id=10787&pid=15839&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Mobile (ID: 265)
        "https://gltrak.com/aff_c2.php?offer_id=265&aff_id=10787&pid=47484&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Mobile (ID: 265)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17593&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23374&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23377&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25580&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31153&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31824&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Nutrivix - RS
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize Nutra
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30284&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30285&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31106&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34388&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41073&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46843&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47717&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47718&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47827&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5675&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5988&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6094&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6126&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7684&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9694&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9695&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12298&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13932&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14112&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17121&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20751&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate Slim - NL, BE 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13474&wid_hmac=8811cf44b4f0849be54437ef6178e2af&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13474 - NL-3G/WIFI-Garcini
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30284&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30285&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31106&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34388&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41073&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46843&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47717&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47718&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47827&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5675&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5988&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6094&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6126&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7684&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9694&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9695&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12298&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13932&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14112&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17121&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20751&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate Slim - NL, BE 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13663&wid_hmac=1f584ab9dcfdf1b4ceb33d14fb91aacc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13663 - PT-3G/Wifi-Choco Linea 2
        "https://1d5e04ea053.traffic-c.com/?wid=13662&wid_hmac=13ccde65fdc7f474a7c32d91a17c9c54&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13662 - PT-3G/Wifi-Choco Linea 1
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11550&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14516&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16440&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17377&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17628&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8241&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Chocolate Slim - PT       
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26105&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30823&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31109&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31111&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31425&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37304&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37914&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45721&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47487&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9887&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10333&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10512&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10638&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11350&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11834&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12326&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15537&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16179&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16303&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16405&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim (green coffee) - TH
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://gltrak.com/aff_c2.php?offer_id=1090&aff_id=10787&pid=78725&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // VN-GoSlimmer-Mobile (ID: 1090)
        "https://gltrak.com/aff_c2.php?offer_id=1090&aff_id=10787&pid=78753&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // VN-GoSlimmer-Mobile (ID: 1090)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13579&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14305&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14306&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14322&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21651&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22949&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29393&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39670&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4988&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5127&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5348&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5433&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6060&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6061&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6316&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8054&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8147&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8592&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8834&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8985&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9701&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10968&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11645&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11800&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12250&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12494&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12939&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19102&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23347&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23689&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24299&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee (capsules) - VN  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5858&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6376&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6478&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6595&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7373&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7383&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7455&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8025&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8738&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10806&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13530&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13613&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14885&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15330&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16074&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17084&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17565&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11354&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12916&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12919&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13269&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14001&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18800&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30501&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33022&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=667&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2526&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3777&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4089&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4988&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5344&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5649&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6504&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7355&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15325&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15720&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16412&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17056&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17102&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17541&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21677&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23575&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23608&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35746&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35758&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36495&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36952&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43172&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47950&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=642&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=907&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=1491&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=4989&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5333&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5826&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5827&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=6504&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=7104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=7197&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=8390&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=12132&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=13032&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=16823&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=19104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=20737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee (caps) - IN                                      
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13504&wid_hmac=84ef0c14d0b870e3a7ab4c39f5898d2e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13504 - ES-3G/WIFI-Weight Loss (Prelander)
        "https://www.nutracash.club/?id=43331&product=4&lang=es&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus ES All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13665&wid_hmac=c62213b119f1580636fd3816304d85eb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13665 - ES-3G/Wifi-Choco Linea
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11297&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12638&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12914&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14507&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15067&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15206&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16922&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17114&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17603&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18282&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20815&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                           
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21493&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23089&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36474&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39440&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45053&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5116&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5181&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5858&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6117&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6306&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6479&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6496&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7657&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8736&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12298&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13384&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13560&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13686&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16912&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17790&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20385&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20751&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEMAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16670&ap=112&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEMAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16670&ap=358&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEMAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16670&ap=398&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOuMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30477&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOuMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33020&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=26525&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36672&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36673&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - ES  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://www.nutracash.club/?id=43331&product=4&lang=fr&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus FR All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13493&wid_hmac=e46d05c48a1ec489921ec83face86fdc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13493 - FR-3G/WIFI-Anti Cellulite
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=11228&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=11550&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33639&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=12927&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=13008&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33639&ap=13394&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33639&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=15101&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=17254&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=19117&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=19902&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5048&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5130&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5675&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6034&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6319&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6434&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6941&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7009&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7193&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7657&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7684&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8729&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13478&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30486&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33052&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOrLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26135&ap=26535&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - FR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13330&wid_hmac=89a8274d22e48cf209cbc6fbd4445b0b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13330 - AU/NZ-Nutra-NutraluWithProbua
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13330&wid_hmac=89a8274d22e48cf209cbc6fbd4445b0b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13330 - AU/NZ-Nutra-NutraluWithProbua
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=782&aff_id=10787&pid=54091&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Mobile (ID: 782)
        "https://gltrak.com/aff_c2.php?offer_id=782&aff_id=10787&pid=56956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Mobile (ID: 782)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6730&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - SK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7421&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - SK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8730&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate slim - SK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=787&aff_id=10787&pid=62671&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Mobile (ID: 787)
        "https://gltrak.com/aff_c2.php?offer_id=787&aff_id=10787&pid=54090&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Mobile (ID: 787)
        "https://gltrak.com/aff_c2.php?offer_id=787&aff_id=10787&pid=56955&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Mobile (ID: 787)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11465&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12607&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12624&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13269&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17753&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19599&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20815&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24265&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24706&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24794&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24798&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28423&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28940&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46826&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC EcoSlim - RO  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=791&aff_id=10787&pid=60341&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Mobile (ID: 791)
        "https://gltrak.com/aff_c2.php?offer_id=791&aff_id=10787&pid=54084&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Mobile (ID: 791)
        "https://gltrak.com/aff_c2.php?offer_id=791&aff_id=10787&pid=56950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Mobile (ID: 791)
        "https://gltrak.com/aff_c2.php?offer_id=259&aff_id=10787&pid=15842&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Mobile (ID: 259)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=14365&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=20344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=20346&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=21066&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=21536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=21766&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=47961&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14365&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20346&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21066&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21766&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=220&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=311&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=315&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=322&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=1989&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOxMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30048&ap=30615&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOxMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30048&ap=33092&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35439&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - HU     
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=60349&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59848&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59461&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58961&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58637&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58514&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile7&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=54080&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile8&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=60914&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile9&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59854&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile10&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59323&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile11&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=59086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile12&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile13&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=58957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile14&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "https://gltrak.com/aff_c2.php?offer_id=781&aff_id=10787&pid=56948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile15&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Mobile (ID: 781)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13009&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13670&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14090&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15107&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6146&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6443&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6742&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10585&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO2MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30451&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO2MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CZ       
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26142&ap=26536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CZ
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=785&aff_id=10787&pid=56832&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Mobile (ID: 785)
        "https://gltrak.com/aff_c2.php?offer_id=785&aff_id=10787&pid=54078&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Mobile (ID: 785)
        "https://gltrak.com/aff_c2.php?offer_id=785&aff_id=10787&pid=56946&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Mobile (ID: 785)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=7183&ap=7146&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - BG
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=7183&ap=19411&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11787&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12589&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12657&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12722&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13007&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13365&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13391&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15072&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO4MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30557&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Diet Duet - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO4MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33023&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Diet Duet - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26526&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Waist Trainer - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Waist Trainer - BG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=819&aff_id=10787&pid=57827&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Mobile (ID: 819)
        "https://gltrak.com/aff_c2.php?offer_id=819&aff_id=10787&pid=56845&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Mobile (ID: 819)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60929&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=57825&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=62419&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60589&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60355&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59034&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile7&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58959&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile8&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58984&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile9&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58516&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile10&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58512&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile11&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58242&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile12&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=57253&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile13&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=56848&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile14&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=54083&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile15&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=62364&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile16&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile17&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile18&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61952&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile19&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile20&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61962&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile21&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=60591&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile22&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59463&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile23&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59331&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile24&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59324&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile25&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=59040&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile26&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=61960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile27&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile28&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=58944&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile29&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "https://gltrak.com/aff_c2.php?offer_id=779&aff_id=10787&pid=57985&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile30&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Mobile (ID: 779)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPKPQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41535&ap=41575&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Stars - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN1FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13057&ap=13104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN1FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13057&ap=19007&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMlHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16731&ap=16833&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMlHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16731&ap=34385&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim fizzy - HR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=786&aff_id=10787&pid=56835&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Mobile (ID: 786)
        "https://gltrak.com/aff_c2.php?offer_id=786&aff_id=10787&pid=54086&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Mobile (ID: 786)
        "https://gltrak.com/aff_c2.php?offer_id=786&aff_id=10787&pid=56952&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Mobile (ID: 786)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPaEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=8497&ap=8109&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LT
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPaEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=8497&ap=19443&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LT
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16841&ap=16905&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - LT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16841&ap=22833&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - LT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16841&ap=34386&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - LT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41536&ap=41585&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Diet Stars - LT 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=793&aff_id=10787&pid=56836&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Mobile (ID: 793)
        "https://gltrak.com/aff_c2.php?offer_id=793&aff_id=10787&pid=54087&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Mobile (ID: 793)
        "https://gltrak.com/aff_c2.php?offer_id=793&aff_id=10787&pid=56953&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Mobile (ID: 793)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMnHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16625&ap=16786&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMnHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16625&ap=22832&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMnHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16625&ap=34387&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPXEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7447&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPXEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7599&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LV
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41537&ap=41584&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Diet Stars - LV
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=783&aff_id=10787&pid=56833&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Mobile (ID: 783)
        "https://gltrak.com/aff_c2.php?offer_id=783&aff_id=10787&pid=54081&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Mobile (ID: 783)
        "https://gltrak.com/aff_c2.php?offer_id=783&aff_id=10787&pid=57047&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Mobile (ID: 783)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMpHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17050&ap=16906&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - EE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMpHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17050&ap=34384&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - EE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP7NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41534&ap=41577&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Stars - EE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPdEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=8092&ap=7516&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate slim - EE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=790&aff_id=10787&pid=55551&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Mobile (ID: 790)
        "https://gltrak.com/aff_c2.php?offer_id=790&aff_id=10787&pid=54092&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Mobile (ID: 790)
        "https://gltrak.com/aff_c2.php?offer_id=790&aff_id=10787&pid=56957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1" // SI-GoSlimmer-Mobile (ID: 790)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
// TODO: add PL-SlimExcelle-Mobile (ID: 899) when fixed
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=62361&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780)
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=59526&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780)
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=54089&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780)
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=59856&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile4&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780)
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=57625&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile5&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Mobile (ID: 780)
        "https://gltrak.com/aff_c2.php?offer_id=780&aff_id=10787&pid=56954&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile6&creative=smartlink&mbbr=1&pof=1&aof=1" // PL-GoSlimmer-Mobile (ID: 780)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=253&aff_id=10787&pid=44479&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Mobile (ID: 253)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNaQQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Spa - BA
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=789&aff_id=10787&pid=57095&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Mobile (ID: 789)
        "https://gltrak.com/aff_c2.php?offer_id=789&aff_id=10787&pid=54088&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Mobile (ID: 789)
        "https://gltrak.com/aff_c2.php?offer_id=789&aff_id=10787&pid=57048&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1" // MK-GoSlimmer-Mobile (ID: 789)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=843&aff_id=10787&pid=57097&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile&creative=smartlink&mbbr=1&pof=1&aof=1", // AL-GoSlimmer-Mobile (ID: 843)
        "https://gltrak.com/aff_c2.php?offer_id=843&aff_id=10787&pid=57257&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile2&creative=smartlink&mbbr=1&pof=1&aof=1", // AL-GoSlimmer-Mobile (ID: 843)
        "https://gltrak.com/aff_c2.php?offer_id=843&aff_id=10787&pid=57609&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=mobile3&creative=smartlink&mbbr=1&pof=1&aof=1" // AL-GoSlimmer-Mobile (ID: 843)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://www.nutracash.club/?id=43331&product=4&lang=en&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus EN All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus DE All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ID" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=30847&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=31169&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=40884&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=40919&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=41104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=41747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=42143&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID  
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=660&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4603&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4891&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5821&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6018&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7667&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9494&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9965&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10214&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12451&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13700&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15122&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15656&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15678&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16055&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17363&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17934&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27180&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34151&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=660&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=4603&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=4891&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5821&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=6018&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=7667&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=9494&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=9965&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=10214&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=13700&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=14278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=15122&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=17934&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Exitox Greenco (Green Coffee) P - ID             
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LK" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16606&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24920&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24924&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37169&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37170&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim - LK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=664&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16636&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16773&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25384&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25842&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26546&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27831&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27832&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29914&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42055&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee grains - SG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30383&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32016&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35244&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35251&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35312&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36896&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37717&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37718&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=692&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3756&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9042&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11467&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15679&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15902&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16389&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16959&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16960&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17695&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20632&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21089&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21333&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21334&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21403&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21404&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21915&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23407&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24553&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24554&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee Grains - PH 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GE" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11609&ap=11586&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Liquid Chestnut - GE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11609&ap=11587&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Liquid Chestnut - GE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AE" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPgLgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26978&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - AE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPgLgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38707&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - AE       
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPgLgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Nutrivix - AE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CN" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=402&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=403&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=405&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=1328&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=6415&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=21293&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=22452&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=22453&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=33343&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=33344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=33345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=34293&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=34311&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=36272&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim (Green Coffee) - CN
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13279&ap=12355&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOmOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39454&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOmOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39455&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC EcoSlim - DK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP0FAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9035&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - FI
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP0FAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9037&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - FI
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOnOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39643&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - FI
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOnOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39644&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim fizzy - FI
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HK" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5049&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16202&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16342&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16346&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17517&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20271&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22140&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22400&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22452&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22453&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33343&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34407&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim (Green Coffee) - HK
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
if ( $country == "BR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e040e4b3.traffic-c.com/?wid=13792&wid_hmac=d36ca0e5ac75ca2b17cfc6786e082dec&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13792 - BR-Nutra-Green Coffee
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13490&wid_hmac=5bb562b821ccbf960b4acf38e76c3b26&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13490 - DE-3G/WIFI-Weigh Loss (Prelander)
        "https://1d5e04ea053.traffic-c.com/?wid=13488&wid_hmac=617c7710d1f0a20a676dfb0be2c3860d&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13488 - DE-3G/WIFI-Raspberry (Prelander)
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13931&wid_hmac=c864795b7c8e466812882a972b25c176&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13931 - DE-BioVelissTabs(Prelander)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5858&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6376&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6478&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6595&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7373&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7383&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7455&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8025&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8738&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10806&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13530&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13613&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14885&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15330&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16074&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17084&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17565&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11354&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12916&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12919&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13269&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14001&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18800&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30501&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33022&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT   
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13927&wid_hmac=9c1de3420b675d64b0a6d48bf3183ae0&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13927 - USA-KetoXSDiet
        "https://1d5e04ea053.traffic-c.com/?wid=13332&wid_hmac=acadd8eda2da96855bc2848550e1ddc8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13332 - US/CA-Nutra-ApexForskolin
        "https://1d5e04ea053.traffic-c.com/?wid=13928&wid_hmac=94728e83fa90f978d52a405c41dbf2f6&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13928 - USA-GarciniaProDiet
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13332&wid_hmac=acadd8eda2da96855bc2848550e1ddc8&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13332 - US/CA-Nutra-ApexForskolin
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13534&wid_hmac=85b0e50a4d02f8161d155bb2ced6f03f&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13534 - Italy-3G/wifi-Oslim
        "https://1d5e04ea053.traffic-c.com/?wid=10322&wid_hmac=a96d1ca6772c1eadae013ca83595cdbf&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10322 - IT-3G/WIFI-Anti Cellulite
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=70471&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=51321&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=44617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=70472&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=56938&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=47930&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=484&aff_id=10787&pid=46224&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-GoSlimmer-Desktop (ID: 484)
        "https://gltrak.com/aff_c2.php?offer_id=286&aff_id=10787&pid=59889&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-SlimExcelle-Desktop (ID: 286)
        "https://gltrak.com/aff_c2.php?offer_id=286&aff_id=10787&pid=57488&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-SlimExcelle-Desktop (ID: 286)
        "https://gltrak.com/aff_c2.php?offer_id=286&aff_id=10787&pid=46401&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // IT-SlimExcelle-Desktop (ID: 286)
        "https://www.nutracash.club/?id=43331&product=4&lang=it&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus IT All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13764&wid_hmac=48107da2b683363c6b5eabc18a17c272&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13764 - IT-3G/WIFI-Gacinia (Prelander)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38585&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40058&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=40060&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41036&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41037&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOCOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41484&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC UltraMetabolismo - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11319&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11465&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12467&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12915&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15064&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15205&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19861&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21045&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36472&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46825&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNxFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=48822&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=50&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=54&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=56&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=58&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=578&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=1401&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=1907&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=1908&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2287&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2683&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3203&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3555&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5132&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5236&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5381&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://azsxd.pro/forms/?target=-7EBNQCgQAAAMNDQNWBQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5187&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5592&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5595&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6034&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6056&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6094&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6160&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6182&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8214&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8733&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19524&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOtMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30600&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOtMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33021&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEPAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16678&ap=106&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEPAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16678&ap=297&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39062&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC ULTRASLIM - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42250&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC ULTRASLIM - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42251&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC ULTRASLIM - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26588&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - IT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOoLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35436&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - IT
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOlOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - SE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOlOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39089&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC EcoSlim fizzy - SE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MY" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=664&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8781&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16636&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMBAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16639&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28973&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30653&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36507&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36508&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36762&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36763&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36840&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36841&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37359&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37359&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37375&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37410&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37411&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37777&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPZMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39041&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20471&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23356&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24372&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPnGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24373&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Goji berries - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6PQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23575&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Let Duet - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6PQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30847&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Let Duet - MY
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6PQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42072&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Let Duet - MY            
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CY" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11701&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12559&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12820&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12926&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13367&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13404&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15208&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18848&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47720&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47723&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7340&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14083&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16523&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16562&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30462&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33019&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=10318&wid_hmac=cd1202be76bcd10711c9091eca59970b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 10318 - GR-3G/WIFI-MultiSlim
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=56829&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Desktop (ID: 475)
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=44614&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Desktop (ID: 475)
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=56936&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Desktop (ID: 475)
        "https://gltrak.com/aff_c2.php?offer_id=475&aff_id=10787&pid=46215&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-GoSlimmer-Desktop (ID: 475)
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=61260&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280)
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=44521&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280)
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=61278&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280)
        "https://gltrak.com/aff_c2.php?offer_id=280&aff_id=10787&pid=46392&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // GR-SlimExcelle-Desktop (ID: 280)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11701&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12559&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12820&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12926&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13367&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13404&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15208&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18848&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47720&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN6FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47723&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7340&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14083&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16523&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOJEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16562&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30462&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33019&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - CY, GR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35442&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CY, GR 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=44611&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502)
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=57987&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502)
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=50964&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502)
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=56945&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502)
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=51311&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502)
        "https://gltrak.com/aff_c2.php?offer_id=502&aff_id=10787&pid=46248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-GoSlimmer-Desktop (ID: 502)
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=50963&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268)
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=7248&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268)
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=51316&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268)
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=46425&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268)
        "https://gltrak.com/aff_c2.php?offer_id=268&aff_id=10787&pid=7247&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // RS-SlimExcelle-Desktop (ID: 268)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17593&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23374&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23377&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25580&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31153&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - RS
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31824&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Nutrivix - RS
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize Nutra
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30284&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30285&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31106&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34388&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41073&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46843&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47717&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47718&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47827&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5675&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5988&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6094&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6126&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7684&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9694&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9695&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12298&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13932&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14112&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17121&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20751&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate Slim - NL, BE 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13474&wid_hmac=8811cf44b4f0849be54437ef6178e2af&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13474 - NL-3G/WIFI-Garcini
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30284&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30285&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31106&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34388&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41073&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46843&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47717&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47718&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7MwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47827&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5675&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5988&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6094&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6126&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7684&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9694&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9695&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12298&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13932&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14112&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17121&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - NL, BE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOKEQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20751&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate Slim - NL, BE 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13663&wid_hmac=1f584ab9dcfdf1b4ceb33d14fb91aacc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13663 - PT-3G/Wifi-Choco Linea 2
        "https://1d5e04ea053.traffic-c.com/?wid=13662&wid_hmac=13ccde65fdc7f474a7c32d91a17c9c54&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13662 - PT-3G/Wifi-Choco Linea 1
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11550&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14516&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16440&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17377&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNyFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17628&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - PT
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoFQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8241&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Chocolate Slim - PT       
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize Nutra
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26105&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30823&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31109&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31111&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=31425&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37304&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37914&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45721&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47487&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9887&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10333&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10512&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10638&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11350&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11834&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12326&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15537&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16179&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16303&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (green coffee) - TH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOHFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16405&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim (green coffee) - TH
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Glize Nutra
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VN" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://gltrak.com/aff_c2.php?offer_id=1091&aff_id=10787&pid=78766&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // VN-GoSlimmer-Desktop (ID: 1091)
        "https://gltrak.com/aff_c2.php?offer_id=1091&aff_id=10787&pid=78752&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // VN-GoSlimmer-Desktop (ID: 1091)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13579&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14305&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14306&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14322&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21651&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22949&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29393&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNYGwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39670&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - VN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4988&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5127&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5348&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5433&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6060&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6061&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6316&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8054&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8147&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8592&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8834&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8985&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9701&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10968&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11645&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11800&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12250&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12494&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12939&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19102&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23347&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23689&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (capsules) - VN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOICQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24299&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee (capsules) - VN  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus DE All Pack
        "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4605&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5858&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6376&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6478&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6595&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7373&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7383&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7455&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7950&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8025&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8088&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8738&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10635&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10806&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13530&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13613&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14885&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15330&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16015&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16074&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17084&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17565&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPEDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11354&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12916&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12919&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13269&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14001&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15069&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15209&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN4FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18800&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30501&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOyMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33022&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPyQAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=44630&ap=44631&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Pectin - DE, AT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOsLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26522&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - DE, AT 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IN" ) { 
    $urls = array(
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=667&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=2526&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3777&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4089&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4988&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5344&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5649&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6504&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7355&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15325&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15720&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16412&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17056&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17102&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17541&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21677&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23575&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23608&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35746&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35758&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36495&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36952&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=43172&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMiCQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=47950&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Green Coffee organic - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=642&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=907&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=1491&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=4989&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5333&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5826&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5827&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=6504&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=7104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=7197&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=8390&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=12132&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=13032&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=16823&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=19104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee (caps) - IN
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQH-AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=20737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee (caps) - IN
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://1d5e04ea053.traffic-c.com/?wid=13504&wid_hmac=84ef0c14d0b870e3a7ab4c39f5898d2e&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13504 - ES-3G/WIFI-Weight Loss (Prelander)
        "https://www.nutracash.club/?id=43331&product=4&lang=es&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus ES All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13665&wid_hmac=c62213b119f1580636fd3816304d85eb&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13665 - ES-3G/Wifi-Choco Linea
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11297&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12638&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12914&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14507&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15067&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15206&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16922&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17114&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17603&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18282&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20815&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                           
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21493&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23089&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36474&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39440&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES                                             
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNlFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=45053&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&subacc=$tracker", // AC Ecoslim fizzy - ES
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5116&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5181&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5591&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5858&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6117&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6306&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6479&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6496&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7657&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8736&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12298&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13384&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13560&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13686&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16912&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17790&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20385&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPRDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20751&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEMAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16670&ap=112&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEMAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16670&ap=358&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEMAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&al=16670&ap=398&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Garcinia Veda - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOuMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30477&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOuMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33020&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=26525&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36672&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - ES
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOpLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26084&ap=36673&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - ES          
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://www.nutracash.club/?id=43331&product=4&lang=fr&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protecvital Plus FR All Pack
        "https://1d5e04ea053.traffic-c.com/?wid=13493&wid_hmac=e46d05c48a1ec489921ec83face86fdc&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // TC 13493 - FR-3G/WIFI-Anti Cellulite
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=11228&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=11550&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33639&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=12927&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=13008&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33639&ap=13394&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=33639&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=15101&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=17254&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13788&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=19117&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNwFgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11191&ap=19902&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5048&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5130&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5675&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6034&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6196&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6319&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6434&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6941&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7009&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7193&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7657&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7684&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8729&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPPDQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13478&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30486&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOwMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33052&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - FR
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOrLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26135&ap=26535&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - FR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13330&wid_hmac=89a8274d22e48cf209cbc6fbd4445b0b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13330 - AU/NZ-Nutra-NutraluWithProbua
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://1d5e04ea053.traffic-c.com/?wid=13330&wid_hmac=89a8274d22e48cf209cbc6fbd4445b0b&p=5221&pi=$tracker&click_id=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // TC 13330 - AU/NZ-Nutra-NutraluWithProbua
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=53830&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Desktop (ID: 508)
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=44608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Desktop (ID: 508)
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=56943&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Desktop (ID: 508)
        "https://gltrak.com/aff_c2.php?offer_id=508&aff_id=10787&pid=46242&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-GoSlimmer-Desktop (ID: 508)
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=61265&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307)
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=7429&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307)
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=61282&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307)
        "https://gltrak.com/aff_c2.php?offer_id=307&aff_id=10787&pid=46932&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-SlimExcelle-Desktop (ID: 307)
        "https://gltrak.com/aff_c2.php?offer_id=839&aff_id=10787&pid=57799&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-CellulitePatch-Desktop (ID: 839)
        "https://gltrak.com/aff_c2.php?offer_id=839&aff_id=10787&pid=57828&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // SK-CellulitePatch-Desktop (ID: 839)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6730&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - SK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7421&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - SK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5EgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8730&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate slim - SK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=44602&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499)
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=62670&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499)
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=53829&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499)
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=56942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499)
        "https://gltrak.com/aff_c2.php?offer_id=499&aff_id=10787&pid=46239&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-GoSlimmer-Desktop (ID: 499)
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=7435&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-SlimExcelle-Desktop (ID: 301)
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=57409&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-SlimExcelle-Desktop (ID: 301)
        "https://gltrak.com/aff_c2.php?offer_id=301&aff_id=10787&pid=7436&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-SlimExcelle-Desktop (ID: 301)
        "https://gltrak.com/aff_c2.php?offer_id=837&aff_id=10787&pid=57619&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-CellulitePatch-Desktop (ID: 837)
        "https://gltrak.com/aff_c2.php?offer_id=837&aff_id=10787&pid=57622&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // RO-CellulitePatch-Desktop (ID: 837)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11465&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12128&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12607&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12624&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13269&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13514&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17753&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=18082&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=19599&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20815&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21150&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23758&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24265&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24706&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24794&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24798&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28423&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=28940&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - RO
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMKFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46826&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC EcoSlim - RO  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=60340&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Desktop (ID: 481)
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=44593&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Desktop (ID: 481)
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=56937&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Desktop (ID: 481)
        "https://gltrak.com/aff_c2.php?offer_id=481&aff_id=10787&pid=46221&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-GoSlimmer-Desktop (ID: 481)
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=61261&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262)
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=60339&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262)
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=6963&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262)
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=61283&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262)
        "https://gltrak.com/aff_c2.php?offer_id=262&aff_id=10787&pid=46398&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-SlimExcelle-Desktop (ID: 262)
        "https://gltrak.com/aff_c2.php?offer_id=840&aff_id=10787&pid=57618&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-CellulitePatch-Desktop (ID: 840)
        "https://gltrak.com/aff_c2.php?offer_id=840&aff_id=10787&pid=61293&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-CellulitePatch-Desktop (ID: 840)
        "https://gltrak.com/aff_c2.php?offer_id=840&aff_id=10787&pid=57804&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // HU-CellulitePatch-Desktop (ID: 840)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=14365&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=20344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=20346&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=21066&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=21536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=21766&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPeIwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=20566&ap=47961&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14365&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20346&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21066&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaGAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21766&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=220&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=311&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=315&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=322&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQEGAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=1989&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOxMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30048&ap=30615&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOxMgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=30048&ap=33092&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Waist Trainer - HU
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO7LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35439&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - HU                  
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=60348&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59460&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=44587&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59082&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59036&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58960&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58635&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58513&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=61944&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop9&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=60913&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop10&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59853&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop11&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59321&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop12&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=59085&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop13&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58940&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop14&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=58956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop15&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=469&aff_id=10787&pid=46209&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop16&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-GoSlimmer-Desktop (ID: 469)
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=16400&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-SlimExcelle-Desktop (ID: 274)
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=61965&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-SlimExcelle-Desktop (ID: 274)
        "https://gltrak.com/aff_c2.php?offer_id=274&aff_id=10787&pid=46386&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // CZ-SlimExcelle-Desktop (ID: 274)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11544&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13009&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13670&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14090&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN5FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15107&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6146&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6443&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6742&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=8739&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10585&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate Slim - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO2MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30451&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CZ
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO2MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33059&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Duet - CZ       
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO0LQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=26142&ap=26536&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Waist Trainer - CZ        
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=44584&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Desktop (ID: 466)
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=56827&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Desktop (ID: 466)
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=56933&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Desktop (ID: 466)
        "https://gltrak.com/aff_c2.php?offer_id=466&aff_id=10787&pid=46203&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-GoSlimmer-Desktop (ID: 466)
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=16268&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271)
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=61257&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271)
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=61275&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271)
        "https://gltrak.com/aff_c2.php?offer_id=271&aff_id=10787&pid=46380&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // BG-SlimExcelle-Desktop (ID: 271)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=7183&ap=7146&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - BG
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOVEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=7183&ap=19411&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11787&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12589&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12657&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12722&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13007&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13365&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13391&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMsFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15072&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO4MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30557&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Diet Duet - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQO4MgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33023&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Diet Duet - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26526&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Waist Trainer - BG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzLQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35441&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // Waist Trainer - BG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=855&aff_id=10787&pid=57093&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-PureDetoxPro-Desktop (ID: 855)
        "https://gltrak.com/aff_c2.php?offer_id=974&aff_id=10787&pid=59529&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-L-arginine-Desktop (ID: 974)
        "https://gltrak.com/aff_c2.php?offer_id=974&aff_id=10787&pid=59779&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-L-arginine-Desktop (ID: 974)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=62418&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60588&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60927&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60592&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59033&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58983&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58958&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58627&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop8&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58515&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop9&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58511&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop10&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58241&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop11&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=57824&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop12&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=57252&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop13&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=56846&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop14&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=44590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop15&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=62363&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop16&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58942&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop17&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop18&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61951&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop19&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61953&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop20&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61961&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop21&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=60590&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop22&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59464&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop23&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59322&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop24&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=59039&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop25&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58949&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop26&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58948&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop27&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58950&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop28&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=61959&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop29&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=478&aff_id=10787&pid=58943&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop30&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-GoSlimmer-Desktop (ID: 478)
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=57826&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Desktop (ID: 283)
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=56844&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Desktop (ID: 283)
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=5557&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Desktop (ID: 283)
        "https://gltrak.com/aff_c2.php?offer_id=283&aff_id=10787&pid=46395&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-SlimExcelle-Desktop (ID: 283)
        "https://gltrak.com/aff_c2.php?offer_id=841&aff_id=10787&pid=57823&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // HR-CellulitePatch-Desktop (ID: 841)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPKPQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41535&ap=41575&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Stars - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN1FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13057&ap=13104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQN1FgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13057&ap=19007&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMlHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16731&ap=16833&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - HR
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMlHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16731&ap=34385&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim fizzy - HR
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=56830&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Desktop (ID: 487)
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=44623&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Desktop (ID: 487)
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=56939&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Desktop (ID: 487)
        "https://gltrak.com/aff_c2.php?offer_id=487&aff_id=10787&pid=46227&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-GoSlimmer-Desktop (ID: 487)
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=61262&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289)
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=44530&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289)
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=61279&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289)
        "https://gltrak.com/aff_c2.php?offer_id=289&aff_id=10787&pid=46404&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // LT-SlimExcelle-Desktop (ID: 289)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPaEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=8497&ap=8109&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LT
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPaEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=8497&ap=19443&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LT
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16841&ap=16905&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - LT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16841&ap=22833&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - LT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMoHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16841&ap=34386&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim fizzy - LT
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP5NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41536&ap=41585&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Diet Stars - LT 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=56831&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Desktop (ID: 490)
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=44620&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Desktop (ID: 490)
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=56940&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Desktop (ID: 490)
        "https://gltrak.com/aff_c2.php?offer_id=490&aff_id=10787&pid=46230&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-GoSlimmer-Desktop (ID: 490)
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=61263&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292)
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=44527&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292)
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=61280&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292)
        "https://gltrak.com/aff_c2.php?offer_id=292&aff_id=10787&pid=46407&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // LV-SlimExcelle-Desktop (ID: 292)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMnHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16625&ap=16786&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMnHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16625&ap=22832&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMnHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=16625&ap=34387&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPXEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7447&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LV
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPXEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7599&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - LV
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41537&ap=41584&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Diet Stars - LV
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SI" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=55549&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Desktop (ID: 505)
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=44605&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Desktop (ID: 505)
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=56944&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Desktop (ID: 505)
        "https://gltrak.com/aff_c2.php?offer_id=505&aff_id=10787&pid=46245&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-GoSlimmer-Desktop (ID: 505)
        "https://gltrak.com/aff_c2.php?offer_id=304&aff_id=10787&pid=44512&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // SI-SlimExcelle-Desktop (ID: 304)
        "https://gltrak.com/aff_c2.php?offer_id=304&aff_id=10787&pid=16394&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1" // SI-SlimExcelle-Desktop (ID: 304)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=62360&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=59525&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=44599&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=59855&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=57624&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop5&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=56941&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop6&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=496&aff_id=10787&pid=46236&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop7&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-GoSlimmer-Desktop (ID: 496)
        "https://gltrak.com/aff_c2.php?offer_id=298&aff_id=10787&pid=57606&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-SlimExcelle-Desktop (ID: 298)
        "https://gltrak.com/aff_c2.php?offer_id=298&aff_id=10787&pid=35465&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // PL-SlimExcelle-Desktop (ID: 298)
        "https://gltrak.com/aff_c2.php?offer_id=298&aff_id=10787&pid=46413&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1" // PL-SlimExcelle-Desktop (ID: 298)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=56828&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Desktop (ID: 472)
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=44626&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Desktop (ID: 472)
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=57045&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Desktop (ID: 472)
        "https://gltrak.com/aff_c2.php?offer_id=472&aff_id=10787&pid=46212&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-GoSlimmer-Desktop (ID: 472)
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=61259&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277)
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=44533&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277)
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=61277&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277)
        "https://gltrak.com/aff_c2.php?offer_id=277&aff_id=10787&pid=46389&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-SlimExcelle-Desktop (ID: 277)
        "https://gltrak.com/aff_c2.php?offer_id=838&aff_id=10787&pid=57617&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-CellulitePatch-Desktop (ID: 838)
        "https://gltrak.com/aff_c2.php?offer_id=838&aff_id=10787&pid=57621&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // EE-CellulitePatch-Desktop (ID: 838)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMpHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17050&ap=16906&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - EE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMpHgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=17050&ap=34384&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - EE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP7NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41534&ap=41577&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Diet Stars - EE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPdEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=8092&ap=7516&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Chocolate slim - EE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BA" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=61258&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Desktop (ID: 256)
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=6956&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Desktop (ID: 256)
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=6957&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Desktop (ID: 256)
        "https://gltrak.com/aff_c2.php?offer_id=256&aff_id=10787&pid=61276&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // BA-SlimExcelle-Desktop (ID: 256)
        "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNaQQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=46737&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Spa - BA
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AL" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=876&aff_id=10787&pid=57096&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // AL-GoSlimmer-Desktop (ID: 876)
        "https://gltrak.com/aff_c2.php?offer_id=876&aff_id=10787&pid=57608&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // AL-GoSlimmer-Desktop (ID: 876)
        "https://gltrak.com/aff_c2.php?offer_id=876&aff_id=10787&pid=57256&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1" // AL-GoSlimmer-Desktop (ID: 876)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MK" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=57094&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=44596&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=57046&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=493&aff_id=10787&pid=46233&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-GoSlimmer-Desktop (ID: 493)
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=61264&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295)
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=44503&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop2&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295)
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=61281&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop3&creative=smartlink&mbbr=1&pof=1&aof=1", // MK-SlimExcelle-Desktop (ID: 295)
        "https://gltrak.com/aff_c2.php?offer_id=295&aff_id=10787&pid=46410&aff_sub=$tracker&aff_sub2=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id&source=desktop4&creative=smartlink&mbbr=1&pof=1&aof=1" // MK-SlimExcelle-Desktop (ID: 295)
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://www.nutracash.club/?id=43331&product=4&lang=en&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus EN All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
       "https://www.nutracash.club/?id=43331&product=3&lang=de&p[]=4&p[]=5&p[]=6&p[]=7&p[]=8&l[]=6&l[]=7&l[]=8&l[]=9&l[]=10&l[]=11&l[]=13&l[]=14&l[]=16&l[]=17&l[]=21&l[]=22&l[]=23&l[]=24&l[]=25&l[]=27&clickid=sublimerevenue-mainstream-e-commerce-protectvital&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // BS Protectvital DE All Pack
        "https://www.nutracash.club/?id=43331&product=4&lang=de&p[]=10&p[]=11&p[]=12&p[]=13&p[]=14&p[]=17&l[]=43&l[]=44&l[]=45&l[]=46&l[]=47&l[]=48&l[]=49&l[]=50&clickid=sublimerevenue-mainstream-e-commerce-protectvitalplus&clickid2=smartlink&clickid3=$tracker&clickid4=$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BS Protecvital Plus DE All Pack
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ID" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=30847&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=31169&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=40884&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=40919&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=41104&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=41747&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQM_NAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=41763&ap=42143&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Exitox Greenco (Green Coffee) caps - ID 
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=660&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4603&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=4891&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5821&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=6018&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=7667&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9494&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9965&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=10214&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=12451&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=13700&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=14278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15122&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15656&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15678&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16055&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17363&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17934&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27180&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOzEwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34151&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (caps) - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=660&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=4603&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=4891&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=5821&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=6018&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=7667&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=9494&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=9965&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=10214&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=13700&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=14278&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=15122&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Exitox Greenco (Green Coffee) P - ID
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQIBAAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=17934&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Exitox Greenco (Green Coffee) P - ID              
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LK" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16606&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24920&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24924&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37169&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - LK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP6HQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37170&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim - LK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=664&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16636&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16773&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25384&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=25842&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26546&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27831&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=27832&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29914&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=29917&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee grains - SG
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPfMQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42055&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee grains - SG
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=30383&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=32016&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35244&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35251&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=35312&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36896&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=36897&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37717&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=37718&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMhMwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=42533&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=692&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=3756&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9042&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=11467&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15679&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=15902&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16389&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16959&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16960&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17695&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20632&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21089&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21333&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21334&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21403&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21404&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=21915&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=23407&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24553&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Green Coffee Grains - PH
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMOAQAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=24554&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Green Coffee Grains - PH 
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GE" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11609&ap=11586&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Liquid Chestnut - GE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQMaFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=11609&ap=11587&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Liquid Chestnut - GE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AE" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPgLgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=26978&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - AE
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPgLgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=38707&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Nutrivix - AE       
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQPgLgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=41110&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Nutrivix - AE
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CN" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=402&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=403&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=405&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=1328&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=6415&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=21293&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=22452&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=22453&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=33343&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=33344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=33345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=34293&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=34311&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - CN
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQG3AAUBARERChEJChENQhENEgABf2FkY29tYm8BMQ&ap=36272&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim (Green Coffee) - CN
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOfFwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&al=13279&ap=12355&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - DK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOmOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39454&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC EcoSlim - DK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOmOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39455&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC EcoSlim - DK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP0FAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9035&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - FI
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQP0FAAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=9037&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Chocolate slim - FI
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOnOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39643&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim fizzy - FI
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQOnOwAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=39644&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim fizzy - FI
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HK" ) { 
    $urls = array(
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=5049&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16202&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16342&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=16346&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=17517&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=20271&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22140&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22400&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22452&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=22453&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33343&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33344&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=33345&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // AC Ecoslim (Green Coffee) - HK
       "http://axdsz.pro/?target=-7EBNQCgQAAAMNDQNBDgAFAQEREQoRCQoRDUIRDRIAAX9hZGNvbWJvATE&ap=34407&subacc=$tracker&clickid=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // AC Ecoslim (Green Coffee) - HK
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);                                      
} else {
//fallback to smartlinks after geo target
    $urls = array(
        "http://ck.gl2021.info/53030?subaffiliate_id=$tracker&session_id=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id", // Glize Nutra
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