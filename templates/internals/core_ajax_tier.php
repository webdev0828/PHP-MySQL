<?php
//TODO: show earnings row, for now it only shows referral username and that's all. FIX!
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');
 
//print_r($_REQUEST);
$report_number = isset($_REQUEST['report']) ? (int) $_REQUEST['report'] : '';
$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];

    if ($report_number) {
        //Get Param
        $paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
        $paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
        $paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;
        //Get data from database
        $aColumns = array('record', 'code', 'payment', 'approved', 'sub_id');
        //$paramSearch = trim($_REQUEST['sSearch']);
        $sLimit = sprintf(" LIMIT %d, %d ", $paramStart, $paramRowPerPage);
        
        
        /*
        * Ordering
        */
        $sOrder = " ORDER BY aff.username";

        $query = sprintf('SELECT ti.child, aff.username, aff.url, aff.email, aff.f_name, aff.l_name FROM `idevaff_tiers` as ti, idevaff_affiliates as aff ');
        $whereCond = " WHERE ti.parent = ? and aff.id = ti.child and aff.approved = '1' ";
        /*if ($sSearch != '') {
            $whereCond .= ' AND ' . $sSearch;
        }*/

        $query .= $whereCond . $sOrder . $sLimit;
        
        $result = $db->prepare($query);
        $result->execute(array($linkid));
        
        //Get total count
        $query = sprintf('SELECT count(*) as c FROM idevaff_tiers as ti, idevaff_affiliates as aff  ');
        $query .= $whereCond;
        $rResultTotal = $db->prepare($query);
        $rResultTotal->execute(array($linkid));
        $totalCountObj = $rResultTotal->fetch();
        $totalCount = $totalCountObj["c"];
        
        
        
        $output = array();
        $output['sEcho'] = intval($paramEcho);
        $output['iTotalRecords'] = $totalCount;
        $output['iTotalDisplayRecords'] = $totalCount;//count($accountList);
        $output['aaData'] = array();
        
        
        foreach ( $result->fetchAll() as $pqry) {
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
			
			if ($second_contact == 1) {
                $show_user_info = '<a href="mailto:'.$temail.'">'.$tieruser.'</a>';
			} else {
				$show_user_info = $tieruser;
			}

            $ret = "<div><span class='pull-left'><i class='fa fa-user' aria-hidden='true'></i> $show_user_info</span>";

            if ( $has_child ) {
                $token = $_SESSION['csrf_token'];

                $ret .= "<span class='pull-right'><button class='load_more' data-space='5' data-parent='$tierid' data-page_now='0' data-token='$token'><i class='fa fa-plus' aria-hidden='true'></i></button></span>";
            }

            $ret .= "</div>";
				


            $tmpcm = array(
                $ret,
            );
            $output['aaData'][] = $tmpcm;
        }
        echo json_encode($output);

        exit;
    }




exit;

