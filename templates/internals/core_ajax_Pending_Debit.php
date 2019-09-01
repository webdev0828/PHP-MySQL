<?php
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
        $aColumns = array('code', 'amount', 'reason');
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
    $sSearch = '(' . $sSearch . ')';
}
        $query = sprintf('SELECT * FROM idevaff_debit ');
        $whereCond = "WHERE aff_id = ? ";
        if ($sSearch != '') {
    $whereCond .= ' AND ' . $sSearch;
}
        $query .= $whereCond .$sOrder.  $sLimit;
        
        $result = $db->prepare($query);
        $result->execute(array($linkid));
        
        //Get total count
        $query = sprintf('SELECT count(*) as c FROM idevaff_debit ');
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
            $debit_amount=number_format($pqry['amount'], $decimal_symbols);
            if($cur_sym_location == 1) { $debit_amount = $cur_sym . $debit_amount; }
	        if($cur_sym_location == 2) { $debit_amount = $debit_amount . " " . $cur_sym; }
	        $debit_amount = $debit_amount . " " . $currency;
            $debit_date=date($dateformat, $pqry['code']);
            $debitreason = ${"debit_reason_" . $pqry['reason']};
            $tmpcm = array(
                $debit_date,
                $debit_amount,
                $debitreason
            );
            $output['aaData'][] = $tmpcm;
        }
        echo json_encode($output);

        exit;
    }




exit;

