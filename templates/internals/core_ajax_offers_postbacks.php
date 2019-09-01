<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');

// $temp_fields = 'invoice_button';
// try {
//     $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
//     $query->setFetchMode(PDO::FETCH_ASSOC);
//     $getlanguage=$query->fetch();
//     $query->closeCursor();
// } catch ( Exception $ex ) {
//     echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
//     die;
// }

// $invoice_button = $getlanguage['invoice_button'];
// TODO: get each postback data 
//print_r($_REQUEST);
// $report_number = isset($_REQUEST['report']) ? (int) $_REQUEST['report'] : '';
$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];
$grp 	= $_REQUEST['grp'];
// $get_data = $db->query("select * from idevaff_invoice");
// $get_data = $get_data->fetch();
// $aff_inv = $get_data['aff_inv'];


if ($linkid) {
        //Get Param
        $paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
        $paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
        $paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;
        //Get data from database
        $aColumns = array('id','acct_id', 'grp', 'postback_url', 'state', 'method');
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
       $query = sprintf('SELECT * FROM idevaff_postbacks ');

        

       $sSearch = '';
      if ($paramSearch != '') {
          $orWhereCondList = array();
          foreach($aColumns as $column) {
              $orWhereCondList[] = sprintf(" %s LIKE '%%%s%%' ", $column, $paramSearch);
          }
          
          $sSearch = implode(' OR ', $orWhereCondList);
          $sSearch = '(' . $sSearch . ')';
      }
            $whereCond = "WHERE acct_id = ? AND grp = ".$grp;
        
        if ($sSearch != '') {
            $whereCond .= ' AND ' . $sSearch;
        }
        $query .= $whereCond .$sOrder . $sLimit;
        $result = $db->prepare($query);
        $result->execute(array($linkid));
        $query = sprintf('SELECT count(*) as c FROM idevaff_postbacks ');
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
            $postback_id = $pqry['id'];
            $postback_grp = $pqry['grp'];
            $postback_url = $pqry['postback_url'];
            $postback_state = $pqry['state'];
            $postback_method = $pqry['method'];

            // $ptotget = $db->prepare("select * from idevaff_archive where payment_rec = ?"); 
            // $ptotget->execute(array($record_id));
            // $ptot = (number_format($ptotget->rowCount()));

            $tmpcm = array(
                $postback_id,
                $postback_grp,
                $postback_url,
                $postback_state,
                $postback_method
            );

            // if ( $aff_inv == 1) {
            //     $tmpcm[] = '<form style="height:6rem;margin-bottom:0;" method="POST" action="/invoice" target="_blank"><input name="csrf_token" value="'.$_SESSION['csrf_token'].'" type="hidden" /><input type="hidden" value="'.$record_id.'" name="stamp"><button type="submit" value="'.$invoice_button.'" class="btn btn-xs btn-primary">'.$invoice_button.'</button></form>';
            // }

            $output['aaData'][] = $tmpcm;
        }
        echo json_encode($output);
    }

exit;