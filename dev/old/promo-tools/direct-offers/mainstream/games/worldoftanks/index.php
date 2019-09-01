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
        "https://wgaffiliate.com/?a=1960&c=4725&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - IT - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4736&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - PT - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4742&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - TR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4709&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - ES - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9453&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4696&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Canada - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4745&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - US - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4683&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - AU - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4733&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - NZ - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4744&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - UK/IE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4744&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - UK/IE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4712&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - FR/BE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4712&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - FR/BE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4702&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CZ/SK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4702&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CZ/SK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4735&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - PL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4722&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - HU - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4714&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - GR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4720&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - HR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4740&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - SG - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TW" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4743&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - TW - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AM" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MD" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TM" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UA" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4737&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - RO - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4738&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - RS - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4690&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - BG - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4693&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - BR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4732&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - MY - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4734&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - PH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4741&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - TH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IL" ) { 
    $urls = array(
        "https://wgpartner.com/?a=1960&c=9457&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - IL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9450&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - KR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9455&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - GE - Network
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
if ( $country == "IT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4725&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - IT - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4736&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - PT - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4742&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - TR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "ES" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4709&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - ES - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9453&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DK" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EC" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4705&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - DE/AT/CH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FI" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4739&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Scand/NL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CA" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4696&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Canada - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "US" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4745&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - US - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4683&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - AU - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "NZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4733&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - NZ - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GB" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4744&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - UK/IE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4744&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - UK/IE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "FR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4712&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - FR/BE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4712&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - FR/BE - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4702&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CZ/SK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SK" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4702&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CZ/SK - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PL" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4735&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - PL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4722&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - HU - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4714&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - GR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "HR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4720&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - HR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "SG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4740&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - SG - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TW" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4743&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - TW - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AM" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "AZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MD" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TM" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UA" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "UZ" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4698&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - CIS (RU) - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "EE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "LV" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4686&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - Baltics - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4737&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - RO - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "RS" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4738&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - RS - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BG" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4690&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - BG - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "CU" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "DO" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GT" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MX" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "VE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4731&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - LATAM - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "BR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4693&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - BR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "MY" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4732&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - MY - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "PH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4734&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - PH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "TH" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=4741&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - TH - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "IL" ) { 
    $urls = array(
        "https://wgpartner.com/?a=1960&c=9457&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - IL - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "KR" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9450&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - KR - Network
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $country == "GE" ) { 
    $urls = array(
        "https://wgaffiliate.com/?a=1960&c=9455&s1=$tracker&s2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // WG new World of Tanks - GE - Network
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