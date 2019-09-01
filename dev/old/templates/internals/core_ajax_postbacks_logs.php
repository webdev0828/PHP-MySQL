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
function queryByDateRange($startD, $endD, $db, $linkid) {

//  echo $startD ."====".$endD;
$date_where = "between '" . strtotime($startD . " 00:00:00") . "' and '" . strtotime($endD . " 23:59:59") . "'";
$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];

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

            $whereCond = "WHERE acct_id = ? ";

        if ($sSearch != '') {
            $whereCond .= ' AND ' . $sSearch;
        }
        
        $query .= $whereCond . $sOrder. $sLimit;
        
        //echo $query;
        
        $result = $db->prepare($query);
        // $result->execute(array($linkid));
}        
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
            if ($rmethod == 0) { $method = 'GET'; } else { $method = 'POST'; }
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
