<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');

$temp_fields = 'invoice_button';
try {
    $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage=$query->fetch();
    $query->closeCursor();
} catch ( Exception $ex ) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}

$invoice_button = $getlanguage['invoice_button'];
 
//print_r($_REQUEST);
$report_number = isset($_REQUEST['report']) ? (int) $_REQUEST['report'] : '';
$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];

$get_data = $db->query("select * from idevaff_invoice");
$get_data = $get_data->fetch();
$aff_inv = $get_data['aff_inv'];


if ($report_number) {
        //Get Param
        $paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
        $paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
        $paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;
        //Get data from database
        $aColumns = array('code','code', 'amount');
        $paramSearch = trim($_REQUEST['sSearch']);
        $sLimit = sprintf(" LIMIT %d, %d ", $paramStart, $paramRowPerPage);
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
       $query = sprintf('SELECT * FROM idevaff_payments ');

        

       $sSearch = '';
      if ($paramSearch != '') {
          $orWhereCondList = array();
          foreach($aColumns as $column) {
              $orWhereCondList[] = sprintf(" %s LIKE '%%%s%%' ", $column, $paramSearch);
          }
          
          $sSearch = implode(' OR ', $orWhereCondList);
          $sSearch = '(' . $sSearch . ')';
      }
        if ($report_number == '2') {
            $whereCond = "WHERE id = ? and approved = '1' and top_tier_tag = '1' ";
        }

        if ($report_number == '3') {
            $whereCond = "WHERE id = ?";
        }

        if ($report_number == '6') {
            $whereCond = "WHERE id = ? and approved = '0' and delay > '0' and payment != '0' ";
        }
        
        if ($sSearch != '') {
            $whereCond .= ' AND ' . $sSearch;
        }
        $query .= $whereCond .$sOrder . $sLimit;
        $result = $db->prepare($query);
        $result->execute(array($linkid));
        $query = sprintf('SELECT count(*) as c FROM idevaff_payments ');
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
            $record_id = $pqry['record'];
            $commission_date = date($dateformat, $pqry['code']);
            $commission_amount = number_format($pqry['amount'], $decimal_symbols);
            if($cur_sym_location == 1) { $commission_amount = $cur_sym . $commission_amount; }
	        if($cur_sym_location == 2) { $commission_amount = $commission_amount . " " . $cur_sym; }
	        $commission_amount = $commission_amount . " " . $currency;
            $ptotget = $db->prepare("select * from idevaff_archive where payment_rec = ?"); 
            $ptotget->execute(array($record_id));
            $ptot = (number_format($ptotget->rowCount()));
            $tmpcm = array(
                $commission_date,
                $ptot,
                $commission_amount
            );

            if ( $aff_inv == 1) {
                $tmpcm[] = '<form style="height:6rem;margin-bottom:0;" method="POST" action="/invoice" target="_blank"><input name="csrf_token" value="'.$_SESSION['csrf_token'].'" type="hidden" /><input type="hidden" value="'.$record_id.'" name="stamp"><button type="submit" value="'.$invoice_button.'" class="btn btn-xs btn-primary label-info"><i class="fa fa-file-alt fa-fw"></i> '.$invoice_button.'</button></form>';
            }

            $output['aaData'][] = $tmpcm;
        }
        echo json_encode($output);
    }



exit;

