<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;

try {
    include_once("../../API/config.php");
    include_once('../../includes/session.check_affiliates.php');
    // TODO: Add indexes to idevaff_groups MySQL table for faster execution when done;

    // affiliate ID
    $linkid = $_SESSION[$install_directory_name.'_idev_LoggedID']; 
    // affiliate percentage
    $checkaff = $db->query("select * from idevaff_affiliates where id = '" . $linkid . "'");
    $res = $checkaff->fetch();
    $lev = $res['level'];
    $levamt = $db->prepare('select amt from idevaff_paylevels where level = ?');
    $levamt->execute([$lev]);
    $lamt = $levamt->fetch();
    $levelamt = $lamt['amt'];

        //Get Param
        $paramRowPerPage = isset($_REQUEST['iDisplayLength']) ? (int)$_REQUEST['iDisplayLength'] : 10;
        $paramEcho = isset($_REQUEST['sEcho']) ? stripslashes($_REQUEST['sEcho']) : '';
        $paramStart = isset($_REQUEST['iDisplayStart']) ? (int)$_REQUEST['iDisplayStart'] : 0;
            
        //Get data from database
        $groups_table = 'idevaff_groups';
        $aColumns = array( 'name', 'niche', 'countries', 'flow_type', 'payout');
        $paramSearch = trim($_REQUEST['sSearch']);
        $sLimit = sprintf(" LIMIT %d OFFSET %d ", $paramRowPerPage,$paramStart);
        
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
                               $sOrder .= $aColumns[ intval( $_REQUEST['iSortCol_'.$i] ) ]." ".
                                       ($_REQUEST['sSortDir_'.$i]==='DESC' ? 'DESC' : 'ASC') .", ";
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
       
        //Query
        $query = sprintf('SELECT %s FROM '.$groups_table.' ', implode(', ', $aColumns));
       
        if ($sSearch != '') {
            $whereCond .= (empty($whereCond)?'WHERE':' AND ') . $sSearch;
        } else {
            $whereCond = "WHERE show_in_table = 1 ";
        }

        $query .= $whereCond . $sOrder. $sLimit;
        
        $result = $db->prepare($query);
        
        $result->execute(array());

        echo '<pre>';
        print_r($query);
        print_r($result->fetchAll());
        die;
        
        //Get total count
        $query = sprintf('SELECT count(*) as c FROM '.$groups_table . ' ');
        $query .= $whereCond;
        $rResultTotal = $db->prepare($query);
        $rResultTotal->execute(array());
        $totalCountObj = $rResultTotal->fetch();
        $totalCount = $totalCountObj["c"]; 
        
        $output = array();
        $output['sEcho'] = intval($paramEcho);
        $output['iTotalRecords'] = $totalCount;
        $output['iTotalDisplayRecords'] = $totalCount;
        $output['debug']= $linkid;
        $output['aaData'] = array();
        
        foreach ( $result->fetchAll() as $pqry) {
            $name = $pqry['name'];
            $niche = $pqry['niche'];
            $countries = $pqry['countries']; // will only list countries, e.g. US, DE, CA, etc.
            // country - foreach country separated by comma echo flag next to flag (but show no more than 9 in the table row and show all countries on hover)
            if ($countries == 0) {
                $countries = "All"; // TODO: has to be translatable variable for EN and RU
            } else {
                $exploded = explode(',', $countries);
                $result = array();
                foreach ($exploded as $elem) {
                $result[] = array('numbers' => $elem);
                }
                $countries = '';
                foreach( $result as $country) {
                $flag = '<img src="/images/geo_flags/'. strtolower($country) .'.png" class="geo_flag" alt="'.$countries.'" border="0">';
                $countries .= $flag.' ';
                }
            }
            $flow_type = $pqry['flow_type'];
            
            // payout should regexp % or € and be multiplied by $levelamt then added the % or € again to display final value
            $measure = preg_replace('/[0-9]+/', '', $pqry['payout']);
            $pay_out = intval($pqry['payout']) * $levelamt;
            $payout = $pay_out. $measure;

            $tmpOfferList = array(
                $name,
                $niche,
                $countries,
                $flow_type,
                $payout
            );
            
            $output['aaData'][] = $tmpOfferList;
        }
        $output['iTotalDisplayRecords'] = count($output['aaData']);
        echo json_encode($output);

        exit;
} catch (Exception $e) {
    echo $e->getMessage();
}