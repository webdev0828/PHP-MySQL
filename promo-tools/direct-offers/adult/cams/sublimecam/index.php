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
if ( $link == "107" ) { 
    $urls = array(
        "http://sublimecam.com?c=614529&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Anal_Play
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "108" ) { 
    $urls = array(
        "http://sublimecam.com?c=614530&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Asian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "109" ) { 
    $urls = array(
        "http://sublimecam.com?c=614531&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females BBW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "110" ) { 
    $urls = array(
        "http://sublimecam.com?c=614532&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Babes
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "111" ) { 
    $urls = array(
        "http://sublimecam.com?c=614533&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Big_Butt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "112" ) { 
    $urls = array(
        "http://sublimecam.com?c=614534&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Big_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "113" ) { 
    $urls = array(
        "http://sublimecam.com?c=614535&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Blonde
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "114" ) { 
    $urls = array(
        "http://sublimecam.com?c=614536&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Bondage
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "115" ) { 
    $urls = array(
        "http://sublimecam.com?c=614537&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Brunette
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "116" ) { 
    $urls = array(
        "http://sublimecam.com?c=614538&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females College_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "117" ) { 
    $urls = array(
        "http://sublimecam.com?c=614539&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Curvy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "118" ) { 
    $urls = array(
        "http://sublimecam.com?c=614540&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Ebony
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "119" ) { 
    $urls = array(
        "http://sublimecam.com?c=614541&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Foot_Fetish
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "120" ) { 
    $urls = array(
        "http://sublimecam.com?c=614542&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Granny
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "121" ) { 
    $urls = array(
        "http://sublimecam.com?c=614543&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Group_Sex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "122" ) { 
    $urls = array(
        "http://sublimecam.com?c=614544&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Hairy_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "123" ) { 
    $urls = array(
        "http://sublimecam.com?c=614545&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Housewives
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "124" ) { 
    $urls = array(
        "http://sublimecam.com?c=614546&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Huge_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "125" ) { 
    $urls = array(
        "http://sublimecam.com?c=614547&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Latina
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "126" ) { 
    $urls = array(
        "http://sublimecam.com?c=614548&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Lesbian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "127" ) { 
    $urls = array(
        "http://sublimecam.com?c=614549&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Mature
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "128" ) { 
    $urls = array(
        "http://sublimecam.com?c=614550&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Medium_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "129" ) { 
    $urls = array(
        "http://sublimecam.com?c=614551&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Muscle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "130" ) { 
    $urls = array(
        "http://sublimecam.com?c=614552&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Petite_Body
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "131" ) { 
    $urls = array(
        "http://sublimecam.com?c=614553&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Pornstar
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "132" ) { 
    $urls = array(
        "http://sublimecam.com?c=614554&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Pregnant
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "133" ) { 
    $urls = array(
        "http://sublimecam.com?c=614555&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Redhead
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "134" ) { 
    $urls = array(
        "http://sublimecam.com?c=614556&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Shaved_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "135" ) { 
    $urls = array(
        "http://sublimecam.com?c=614557&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Small_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "136" ) { 
    $urls = array(
        "http://sublimecam.com?c=614558&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Smoking
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "137" ) { 
    $urls = array(
        "http://sublimecam.com?c=614559&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Squirt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "138" ) { 
    $urls = array(
        "http://sublimecam.com?c=614560&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Teens_18+
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "139" ) { 
    $urls = array(
        "http://sublimecam.com?c=614561&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Toys
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "140" ) { 
    $urls = array(
        "http://sublimecam.com?c=614562&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females White_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "141" ) { 
    $urls = array(
        "http://sublimecam.com?c=614563&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "142" ) { 
    $urls = array(
        "http://sublimecam.com?c=614564&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Anal_Sex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "143" ) { 
    $urls = array(
        "http://sublimecam.com?c=614565&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Bears
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "144" ) { 
    $urls = array(
        "http://sublimecam.com?c=614567&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Big_Dick
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "145" ) { 
    $urls = array(
        "http://sublimecam.com?c=614566&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Bisexual
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "146" ) { 
    $urls = array(
        "http://sublimecam.com?c=614568&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males College
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "147" ) { 
    $urls = array(
        "http://sublimecam.com?c=614569&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Couples
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "148" ) { 
    $urls = array(
        "http://sublimecam.com?c=614571&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Gay
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "149" ) { 
    $urls = array(
        "http://sublimecam.com?c=614570&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Muscle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "150" ) { 
    $urls = array(
        "http://sublimecam.com?c=614572&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Straight
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "151" ) { 
    $urls = array(
        "http://sublimecam.com?c=614573&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "152" ) { 
    $urls = array(
        "http://sublimecam.com?c=614574&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Anal
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "153" ) { 
    $urls = array(
        "http://sublimecam.com?c=614575&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Asian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "154" ) { 
    $urls = array(
        "http://sublimecam.com?c=614576&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Big_Cock
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "155" ) { 
    $urls = array(
        "http://sublimecam.com?c=614577&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Big_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "156" ) { 
    $urls = array(
        "http://sublimecam.com?c=614578&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Blonde
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "157" ) { 
    $urls = array(
        "http://sublimecam.com?c=614579&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Booty
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "158" ) { 
    $urls = array(
        "http://sublimecam.com?c=614580&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Brunette
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "159" ) { 
    $urls = array(
        "http://sublimecam.com?c=614581&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Latin
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "160" ) { 
    $urls = array(
        "http://sublimecam.com?c=614582&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Mature
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "161" ) { 
    $urls = array(
        "http://sublimecam.com?c=614583&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Redhead
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "162" ) { 
    $urls = array(
        "http://sublimecam.com?c=614584&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Shemale_Fuck_Shemale
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "163" ) { 
    $urls = array(
        "http://sublimecam.com?c=614585&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Small_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "164" ) { 
    $urls = array(
        "http://sublimecam.com?c=614586&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Toys
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "165" ) { 
    $urls = array(
        "http://sublimecam.com?c=614587&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Young_18+
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "166" ) { 
    $urls = array(
        "http://sublimecam.com?c=614588&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "167" ) { 
    $urls = array(
        "http://sublimecam.com?c=614589&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Anal_Play
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "168" ) { 
    $urls = array(
        "http://sublimecam.com?c=614590&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Asian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "169" ) { 
    $urls = array(
        "http://sublimecam.com?c=614591&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples BBW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "170" ) { 
    $urls = array(
        "http://sublimecam.com?c=614592&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Babes
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "171" ) { 
    $urls = array(
        "http://sublimecam.com?c=614594&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Big_Butt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "172" ) { 
    $urls = array(
        "http://sublimecam.com?c=614593&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Big_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "173" ) { 
    $urls = array(
        "http://sublimecam.com?c=614595&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Blonde
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "174" ) { 
    $urls = array(
        "http://sublimecam.com?c=614596&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Bondage
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "175" ) { 
    $urls = array(
        "http://sublimecam.com?c=614598&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Brunette
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "176" ) { 
    $urls = array(
        "http://sublimecam.com?c=614597&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples College_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "177" ) { 
    $urls = array(
        "http://sublimecam.com?c=614599&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Curvy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "178" ) { 
    $urls = array(
        "http://sublimecam.com?c=614600&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Ebony
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "179" ) { 
    $urls = array(
        "http://sublimecam.com?c=614601&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Foot_Fetish
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "180" ) { 
    $urls = array(
        "http://sublimecam.com?c=614602&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Granny
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "181" ) { 
    $urls = array(
        "http://sublimecam.com?c=614603&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Group_Sex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "182" ) { 
    $urls = array(
        "http://sublimecam.com?c=614604&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Hairy_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "183" ) { 
    $urls = array(
        "http://sublimecam.com?c=614605&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Housewives
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "184" ) { 
    $urls = array(
        "http://sublimecam.com?c=614606&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Huge_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "185" ) { 
    $urls = array(
        "http://sublimecam.com?c=614607&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Latina
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "186" ) { 
    $urls = array(
        "http://sublimecam.com?c=614608&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Lesbian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "187" ) { 
    $urls = array(
        "http://sublimecam.com?c=614609&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Mature
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "188" ) { 
    $urls = array(
        "http://sublimecam.com?c=614610&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Medium_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "189" ) { 
    $urls = array(
        "http://sublimecam.com?c=614611&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Muscle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "190" ) { 
    $urls = array(
        "http://sublimecam.com?c=614613&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Petite_Body
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "191" ) { 
    $urls = array(
        "http://sublimecam.com?c=614612&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Pornstar
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "192" ) { 
    $urls = array(
        "http://sublimecam.com?c=614614&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Pregnant
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "193" ) { 
    $urls = array(
        "http://sublimecam.com?c=614615&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Redhead
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "194" ) { 
    $urls = array(
        "http://sublimecam.com?c=614616&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Shaved_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "195" ) { 
    $urls = array(
        "http://sublimecam.com?c=614617&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Small_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "197" ) { 
    $urls = array(
        "http://sublimecam.com?c=614618&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Smoking
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "198" ) { 
    $urls = array(
        "http://sublimecam.com?c=614619&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Squirt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "199" ) { 
    $urls = array(
        "http://sublimecam.com?c=614620&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Teens_18+
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "200" ) { 
    $urls = array(
        "http://sublimecam.com?c=614622&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Toys
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "201" ) { 
    $urls = array(
        "http://sublimecam.com?c=614621&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples White_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else { 
// $link = 106
    $urls = array(
        "http://sublimecam.com?c=614528&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// mobile traffic end
} else {
// desktop traffic start
    session_start();
if (!isset($_SESSION['country'])) {
    $ip = $_SERVER [ 'REMOTE_ADDR' ]; 
    $_SESSION['country'] = $country; 
}
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
if ( $link == "107" ) { 
    $urls = array(
        "http://sublimecam.com?c=614529&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Anal_Play
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "108" ) { 
    $urls = array(
        "http://sublimecam.com?c=614530&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Asian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "109" ) { 
    $urls = array(
        "http://sublimecam.com?c=614531&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females BBW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "110" ) { 
    $urls = array(
        "http://sublimecam.com?c=614532&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Babes
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "111" ) { 
    $urls = array(
        "http://sublimecam.com?c=614533&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Big_Butt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "112" ) { 
    $urls = array(
        "http://sublimecam.com?c=614534&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Big_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "113" ) { 
    $urls = array(
        "http://sublimecam.com?c=614535&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Blonde
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "114" ) { 
    $urls = array(
        "http://sublimecam.com?c=614536&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Bondage
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "115" ) { 
    $urls = array(
        "http://sublimecam.com?c=614537&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Brunette
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "116" ) { 
    $urls = array(
        "http://sublimecam.com?c=614538&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females College_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "117" ) { 
    $urls = array(
        "http://sublimecam.com?c=614539&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Curvy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "118" ) { 
    $urls = array(
        "http://sublimecam.com?c=614540&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Ebony
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "119" ) { 
    $urls = array(
        "http://sublimecam.com?c=614541&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Foot_Fetish
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "120" ) { 
    $urls = array(
        "http://sublimecam.com?c=614542&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Granny
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "121" ) { 
    $urls = array(
        "http://sublimecam.com?c=614543&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Group_Sex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "122" ) { 
    $urls = array(
        "http://sublimecam.com?c=614544&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Hairy_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "123" ) { 
    $urls = array(
        "http://sublimecam.com?c=614545&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Housewives
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "124" ) { 
    $urls = array(
        "http://sublimecam.com?c=614546&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Huge_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "125" ) { 
    $urls = array(
        "http://sublimecam.com?c=614547&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Latina
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "126" ) { 
    $urls = array(
        "http://sublimecam.com?c=614548&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Lesbian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "127" ) { 
    $urls = array(
        "http://sublimecam.com?c=614549&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Mature
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "128" ) { 
    $urls = array(
        "http://sublimecam.com?c=614550&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Medium_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "129" ) { 
    $urls = array(
        "http://sublimecam.com?c=614551&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Muscle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "130" ) { 
    $urls = array(
        "http://sublimecam.com?c=614552&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Petite_Body
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "131" ) { 
    $urls = array(
        "http://sublimecam.com?c=614553&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Pornstar
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "132" ) { 
    $urls = array(
        "http://sublimecam.com?c=614554&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Pregnant
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "133" ) { 
    $urls = array(
        "http://sublimecam.com?c=614555&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Redhead
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "134" ) { 
    $urls = array(
        "http://sublimecam.com?c=614556&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Shaved_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "135" ) { 
    $urls = array(
        "http://sublimecam.com?c=614557&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Small_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "136" ) { 
    $urls = array(
        "http://sublimecam.com?c=614558&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Smoking
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "137" ) { 
    $urls = array(
        "http://sublimecam.com?c=614559&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Squirt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "138" ) { 
    $urls = array(
        "http://sublimecam.com?c=614560&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Teens_18+
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "139" ) { 
    $urls = array(
        "http://sublimecam.com?c=614561&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females Toys
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "140" ) { 
    $urls = array(
        "http://sublimecam.com?c=614562&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females White_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "141" ) { 
    $urls = array(
        "http://sublimecam.com?c=614563&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "142" ) { 
    $urls = array(
        "http://sublimecam.com?c=614564&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Anal_Sex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "143" ) { 
    $urls = array(
        "http://sublimecam.com?c=614565&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Bears
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "144" ) { 
    $urls = array(
        "http://sublimecam.com?c=614567&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Big_Dick
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "145" ) { 
    $urls = array(
        "http://sublimecam.com?c=614566&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Bisexual
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "146" ) { 
    $urls = array(
        "http://sublimecam.com?c=614568&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males College
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "147" ) { 
    $urls = array(
        "http://sublimecam.com?c=614569&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Couples
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "148" ) { 
    $urls = array(
        "http://sublimecam.com?c=614571&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Gay
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "149" ) { 
    $urls = array(
        "http://sublimecam.com?c=614570&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Muscle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "150" ) { 
    $urls = array(
        "http://sublimecam.com?c=614572&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Males Straight
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "151" ) { 
    $urls = array(
        "http://sublimecam.com?c=614573&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "152" ) { 
    $urls = array(
        "http://sublimecam.com?c=614574&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Anal
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "153" ) { 
    $urls = array(
        "http://sublimecam.com?c=614575&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Asian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "154" ) { 
    $urls = array(
        "http://sublimecam.com?c=614576&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Big_Cock
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "155" ) { 
    $urls = array(
        "http://sublimecam.com?c=614577&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Big_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "156" ) { 
    $urls = array(
        "http://sublimecam.com?c=614578&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Blonde
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "157" ) { 
    $urls = array(
        "http://sublimecam.com?c=614579&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Booty
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "158" ) { 
    $urls = array(
        "http://sublimecam.com?c=614580&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Brunette
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "159" ) { 
    $urls = array(
        "http://sublimecam.com?c=614581&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Latin
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "160" ) { 
    $urls = array(
        "http://sublimecam.com?c=614582&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Mature
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "161" ) { 
    $urls = array(
        "http://sublimecam.com?c=614583&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Redhead
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "162" ) { 
    $urls = array(
        "http://sublimecam.com?c=614584&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Shemale_Fuck_Shemale
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "163" ) { 
    $urls = array(
        "http://sublimecam.com?c=614585&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Small_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "164" ) { 
    $urls = array(
        "http://sublimecam.com?c=614586&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Toys
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "165" ) { 
    $urls = array(
        "http://sublimecam.com?c=614587&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Transsexuals Young_18+
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "166" ) { 
    $urls = array(
        "http://sublimecam.com?c=614588&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "167" ) { 
    $urls = array(
        "http://sublimecam.com?c=614589&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Anal_Play
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "168" ) { 
    $urls = array(
        "http://sublimecam.com?c=614590&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Asian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "169" ) { 
    $urls = array(
        "http://sublimecam.com?c=614591&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples BBW
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "170" ) { 
    $urls = array(
        "http://sublimecam.com?c=614592&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Babes
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "171" ) { 
    $urls = array(
        "http://sublimecam.com?c=614594&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Big_Butt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "172" ) { 
    $urls = array(
        "http://sublimecam.com?c=614593&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Big_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "173" ) { 
    $urls = array(
        "http://sublimecam.com?c=614595&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Blonde
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "174" ) { 
    $urls = array(
        "http://sublimecam.com?c=614596&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Bondage
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "175" ) { 
    $urls = array(
        "http://sublimecam.com?c=614598&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Brunette
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "176" ) { 
    $urls = array(
        "http://sublimecam.com?c=614597&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples College_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "177" ) { 
    $urls = array(
        "http://sublimecam.com?c=614599&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Curvy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "178" ) { 
    $urls = array(
        "http://sublimecam.com?c=614600&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Ebony
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "179" ) { 
    $urls = array(
        "http://sublimecam.com?c=614601&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Foot_Fetish
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "180" ) { 
    $urls = array(
        "http://sublimecam.com?c=614602&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Granny
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "181" ) { 
    $urls = array(
        "http://sublimecam.com?c=614603&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Group_Sex
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "182" ) { 
    $urls = array(
        "http://sublimecam.com?c=614604&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Hairy_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "183" ) { 
    $urls = array(
        "http://sublimecam.com?c=614605&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Housewives
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "184" ) { 
    $urls = array(
        "http://sublimecam.com?c=614606&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Huge_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "185" ) { 
    $urls = array(
        "http://sublimecam.com?c=614607&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Latina
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "186" ) { 
    $urls = array(
        "http://sublimecam.com?c=614608&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Lesbian
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "187" ) { 
    $urls = array(
        "http://sublimecam.com?c=614609&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Mature
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "188" ) { 
    $urls = array(
        "http://sublimecam.com?c=614610&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Medium_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "189" ) { 
    $urls = array(
        "http://sublimecam.com?c=614611&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Muscle
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "190" ) { 
    $urls = array(
        "http://sublimecam.com?c=614613&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Petite_Body
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "191" ) { 
    $urls = array(
        "http://sublimecam.com?c=614612&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Pornstar
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "192" ) { 
    $urls = array(
        "http://sublimecam.com?c=614614&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Pregnant
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "193" ) { 
    $urls = array(
        "http://sublimecam.com?c=614615&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Redhead
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "194" ) { 
    $urls = array(
        "http://sublimecam.com?c=614616&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Shaved_Pussy
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "195" ) { 
    $urls = array(
        "http://sublimecam.com?c=614617&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Small_Tits
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "197" ) { 
    $urls = array(
        "http://sublimecam.com?c=614618&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Smoking
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "198" ) { 
    $urls = array(
        "http://sublimecam.com?c=614619&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Squirt
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "199" ) { 
    $urls = array(
        "http://sublimecam.com?c=614620&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Teens_18+
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "200" ) { 
    $urls = array(
        "http://sublimecam.com?c=614622&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples Toys
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} elseif ( $link == "201" ) { 
    $urls = array(
        "http://sublimecam.com?c=614621&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Couples White_Girls
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
} else { 
// $link = 106
    $urls = array(
        "http://sublimecam.com?c=614528&subid=$tracker&subid2=$country$delitel$tid11$delitel$tid22$delitel$tid33$delitel$tid44$delitel$set$delitel$link$delitel$sub_id" // BongaCash Whitelabel Females All
    );
    $url = $urls[array_rand($urls)];
    checkUrl($url, $urls);
}
// desktop traffic end
}
?>