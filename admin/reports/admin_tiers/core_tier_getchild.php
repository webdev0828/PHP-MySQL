<?php
include_once ("../../../API/config.php");
include_once("../../includes/session.check.php");

$result = array();

$space = isset($_POST['space']) ? intval($_POST['space']) : 1;
$parent = isset($_POST['parent']) ? intval($_POST['parent']) : 0;
$page_now = isset($_POST['page_now']) ? intval($_POST['page_now']) : 0;


//for pagination task
$limit_count = 10;
$start = $page_now ? ( $page_now * $limit_count ) : 0;
$end = ( $page_now * $limit_count ) + $limit_count;
$sLimit = " LIMIT $limit_count OFFSET $start";

//order by
$sOrder = " ORDER BY aff.username";


//start query
$query = sprintf('SELECT ti.child, aff.username, aff.url, aff.email, aff.f_name, aff.l_name FROM `idevaff_tiers` as ti, idevaff_affiliates as aff ');
$whereCond = " WHERE ti.parent = ? and aff.id = ti.child and aff.approved = '1' ";
$query .= $whereCond . $sOrder . $sLimit;
$result['parent'] = $parent;
$result['query'] = $query; //debug purpose

$res = $db->prepare($query);
$res->execute(array($parent));

$str = "";
if ( $res->rowCount() ) {
    foreach ( $res->fetchAll() as $pqry) {
        $tierid = $pqry['child'];
        $tieruser=$pqry['username'];
        $turl=$pqry['url'];
        $tname1=$pqry['f_name'];
        $tname2=$pqry['l_name'];
        $tname = $tname1 . ' ' . $tname2;
        $temail = $pqry['email'];

        //now check for if this child has child :D
        $query = "SELECT `child` FROM `idevaff_tiers` WHERE `parent` = ? LIMIT 1";
        $st = $db->prepare($query);
        $st->execute(array($tierid));
        $has_child = false;
        if ( $st->rowCount() ) {
            $has_child = true;
        }


        //print space
        $spaces = str_repeat("&nbsp;&nbsp;",$space);

			$show_user_info = $spaces . "<i class='icon-angle-right' aria-hidden='true'></i> <a href='account_details.php?id=".$tierid."'>" . $tieruser . "</a>";

        $ret = "<div><span class='pull-left'>$show_user_info</span>";
        $ret .= '<span class="pull-right">';

        if ( $has_child ) {
            $token = $_SESSION['csrf_token'];
            $child_space = $space + 5;
            $ret .= "<button class='load_more' data-space='$child_space' data-parent='$tierid' data-page_now='0' data-token='$token'><strong>+</strong></button>";
        }

        $ret .= "</span></div>";

        $str .= '<tr><td>' . $ret . '</td></tr>';
    }
}
$result['output'] = $str;



//Get total count
$query = sprintf('SELECT count(*) as c FROM idevaff_tiers as ti, idevaff_affiliates as aff  ');
$query .= $whereCond;
$rResultTotal = $db->prepare($query);
$rResultTotal->execute(array($parent));
$totalCountObj = $rResultTotal->fetch();
$totalCount = $totalCountObj["c"];


//start output
$result['success'] = 'yes';
$result['total'] = $totalCount;
$result['end'] = '0';


//check there other row available

if ( $totalCount < $end ) {
    $result['end'] = '1';
}

$result['page_now'] = ++$page_now;


header('Content-Type: application/json');
echo json_encode($result);
exit;