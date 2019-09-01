<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');

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
$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];

    if ($report_number) {
        //Get Param
        $paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
        $paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
        $paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;
        //Get data from database
        $aColumns = array( 'stamp', 'stamp', 'ip', 'refer');
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
        
        
        $query = sprintf('SELECT * FROM idevaff_iptracking ');

            $whereCond = "WHERE acct_id = ? ";

        
        
        if ($sSearch != '') {
            $whereCond .= ' AND ' . $sSearch;
        }
        

        $query .= $whereCond . $sOrder. $sLimit;

        //echo $query;
        
        $result = $db->prepare($query);
        $result->execute(array($linkid));
        
        //Get total count
        $query = sprintf('SELECT count(*) as c FROM idevaff_iptracking ');
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
            $date=date($dateformat, $pqry['stamp']);
            $time=date($timeformat, $pqry['stamp']);
            $ip = $pqry['ip'];
            $refer1 = $pqry['refer'];
            if (!$refer1) { $refer = $traffic_no_url;
            } else {
            $refer = substr("$refer1", 0, 60);
            if (strlen($refer) > 59) { $refer = $refer . "..."; }
            $refer = "<a href=\"$refer1\" target=\"_blank\" title=\"header=[$traffic_box_title] body=[$refer1<br />$traffic_box_info]\" style=\"cursor:pointer;\">$refer</a>"; }

            $flag_country = strtolower($pqry['geo']);
            $flag = '';
            if (file_exists($path.'/images/geo_flags/'.$flag_country.'.png')) {
            $flag = "<img src=\"images/geo_flags/".$flag_country.".png\" height=\"24\" width=\"24\" border=\"none;\" />"; }

			if ($gdpr_hide_ip == 1) {
				
            $tmpcm = array(
                $date,
                $time,
                $refer
            );
            
			} else {
				
            $tmpcm = array(
                $date,
                $time,
                $ip.'<span class="pull-right">'.$flag.'</span>',
                $refer
            );
				
			}
            
            $output['aaData'][] = $tmpcm;
        }
        echo json_encode($output);

        exit;
    }




exit;

