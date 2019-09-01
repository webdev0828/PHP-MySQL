<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');
/*
$temp_fields = 'traffic_no_url,traffic_box_title,traffic_box_info';
try {
    $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage=$query->fetch();
    $query->closeCursor();
} catch ( Exception $ex ) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}
$traffic_no_url = $getlanguage['traffic_no_url'];
$traffic_box_title = $getlanguage['traffic_box_title'];
$traffic_box_info = $getlanguage['traffic_box_info'];

//print_r($_REQUEST);
$report_number = isset($_REQUEST['report']) ? (int) $_REQUEST['report'] : '';
*/
$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];
//  TOOD: Add date range function!!
$date_where = "between '" . strtotime($startD . " 00:00:00") . "' and '" . strtotime($endD . " 23:59:59") . "'";
$startD = $_REQUEST['startD'];
$endD = $_REQUEST['endD'];
function queryByDateRange($startD, $endD, $db, $linkid) {
    
    $q_timestamp = "select timestamp from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_status = "select status from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_grp = "select grp from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_record = "select record from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_method = "select method from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_result = "select result from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_status = "select http_status from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;
    $q_postback_url = "select postback_url from idevaff_postbacks_logs where acct_id = ? and timestamp " . $date_where;

    $r_timestamp = $db->prepare($q_timestamp);
    $r_timestamp->execute(array($linkid));
    $r_status = $db->prepare($q_status);
    $r_status->execute(array($linkid));
    $r_grp = $db->prepare($q_grp);
    $r_grp->execute(array($linkid));
    $r_record = $db->prepare($q_record);
    $r_record->execute(array($linkid));
    $r_method = $db->prepare($q_method);
    $r_method->execute(array($linkid));
    $r_result = $db->prepare($q_result);
    $r_result->execute(array($linkid));
    $r_status = $db->prepare($q_status);
    $r_status->execute(array($linkid));
    $r_postback_url = $db->prepare($q_postback_url);
    $r_postback_url->execute(array($linkid));

    $f_datetime = $r_timestamp->fetchColumn();
    $f_status = $r_status->fetchColumn();
    $f_grp = $r_grp->fetchColumn();
    $f_record = $r_record->fetchColumn();
    $f_method = $r_method->fetchColumn();
    $f_result = $r_result->fetchColumn();
    $f_http_status = $r_status->fetchColumn();
    $f_postback_url = $r_postback_url->fetchColumn();

        return [
            "timestamp" => $f_datetime,
            "status" => $f_status,
            "grp" => $f_grp,
            "record" => $f_record,
            "method" => $f_method,
            "result" => $f_result,
            "http_status" => $f_http_status,
            "postback_url" => $f_postback_url
        ];
}

    if ($linkid) {
        //Get Param
        $paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
        $paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
        $paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;
        //Get data from database
        $aColumns = array('timestamp', 'status', 'grp', 'record', 'method', 'result', 'http_status', 'postback_url');
        $paramSearch = trim($_REQUEST['sSearch']);
        $sLimit = sprintf(" LIMIT %d, %d ", $paramStart, $paramRowPerPage);
        
        /*
        * Ordering
        */
       if ( isset( $_REQUEST['iSortCol_0'] ) )
       {

               $sOrder = " ORDER BY  ";
               for ( $i=0 ; $i<intval( $_REQUEST['iSortingCols'] ) ; $i++ )
               {
                       if ( $_REQUEST[ 'bSortable_'.intval($_REQUEST['iSortCol_'.$i]) ] == "true" )
                       {
                               $sOrder .= "`".$aColumns[ intval( $_REQUEST['iSortCol_'.$i] ) ]."` ".
                                       ($_REQUEST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
                       }
               }

               $sOrder = substr_replace( $sOrder, "", -2 );
               if ( $sOrder == " ORDER BY" )
               {
                       $sOrder = "";
               }
       }
       
        $sSearch = '';
        if ($paramSearch != '') {
            $orWhereCondList = array();
            foreach($aColumns as $column) {
                $orWhereCondList[] = sprintf(" %s LIKE '%%%s%%' ", $column, $paramSearch);
            }

            $sSearch = implode(' OR ', $orWhereCondList);
            $sSearch = '(' . $sSearch . ') ';
        }

        $query = sprintf('SELECT * FROM idevaff_postbacks_logs ');

            $whereCond = "WHERE acct_id = ? AND timestamp ".$date_where;

        if ($sSearch != '') {
            $whereCond .= ' AND ' . $sSearch;
        }
        
        $query .= $whereCond . $sOrder. $sLimit;
        
        //echo $query;
        $result = $db->prepare($query);
        $result->execute(array($linkid));
        
        //Get total count
        $query = sprintf('SELECT count(*) as c FROM idevaff_postbacks_logs ');
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
        
        
        foreach ($result->fetchAll() as $pqry) {
            $firetime     = gmdate("Y-m-d H:i:s", $pqry['timestamp']);
            $rstatus       = $pqry['status']; // get name based on this
            if ($rstatus == 0) { $status = 'Rejected'; } else { $status = 'Approved'; }
            $grp          = $pqry['grp']; // get name based on this
            if ($grp == 0) { $offer = 'Global'; } else { $offer = $grp; }
            $record 		  = $pqry['record'];
            $rmethod 		  = $pqry['method'];
            if ($rmethod == 0) { $method = '1'; } else { $method = '0'; }
            $rresult 		  = $pqry['result'];
            if ($rresult == 0) { $presult = 'Fail'; } else { $presult = 'Success'; }
            $http_status 	= $pqry['http_status'];
            $postback_url1 = $pqry['postback_url'];
            $p_url = substr("$postback_url1", 0, 69);
            if (strlen($p_url) > 68) { $p_url = $p_url . "..."; }
            $p_url = "<span class=\"url\" title=\"$postback_url1\" style=\"cursor:pointer;\">$p_url</span>";  // align

            $tmpcm = array(
                $firetime,
                $status,
                $offer,
                $record,
                $method,
                $presult,
                $http_status,
                $p_url
            );

            $output['aaData'][] = $tmpcm;
        }
        echo json_encode($output);

        exit;
    }

exit;
