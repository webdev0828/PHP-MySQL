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
*/

    $linkid     = $_SESSION[$install_directory_name.'_idev_LoggedID'];
    $startD     = $_REQUEST['startD'];
    $endD       = $_REQUEST['endD'];
    $date_where = "between '" . strtotime($startD . " 00:00:00") . "' and '" . strtotime($endD . " 23:59:59") . "'";

    if ($linkid) {
    // footer filters - TODO: should change footer filters data based on date range, why $date_where does not solve this on each request??
    

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
        


    // TODO postback footer filters based on date range START
        $sSearch = '';
        /*if ($paramSearch != '') {
            $orWhereCondList = array();
            foreach($aColumns as $column) {
                $orWhereCondList[] = sprintf(" %s LIKE '%%%s%%' ", $column, $paramSearch);
            }

            $sSearch = implode(' OR ', $orWhereCondList);
            $sSearch = '(' . $sSearch . ') ';
        }
        */
        $queryRec = sprintf('SELECT * FROM idevaff_postbacks_logs ');

        // TODO Inner join with groups table to get offer name for tooltip
        // SELECT idevaff_postbacks_logs.timestamp,idevaff_postbacks_logs.status,idevaff_postbacks_logs.grp,idevaff_postbacks_logs.record,idevaff_postbacks_logs.method,idevaff_postbacks_logs.result,idevaff_postbacks_logs.http_status,idevaff_postbacks_logs.postback_url,idevaff_groups.name,idevaff_groups.niche FROM idevaff_postbacks_logs INNER JOIN idevaff_groups ON idevaff_postbacks_logs.grp = idevaff_groups.id

        
        $whereCond = "WHERE acct_id = ? AND timestamp ".$date_where;
        /*if(isset($_REQUEST['startD']) && $_REQUEST['endD']!=''){            
            //$whereCond .= $date_where;//' AND timestamp BETWEEN '.strtotime($_REQUEST['startD']). ' AND '.strtotime($_REQUEST['endD']);          
        }*/
        /*if ($sSearch != '') {
            $whereCond .= $sSearch;
        }*/       

        if(isset($_REQUEST['sSearch_1']) && $_REQUEST['sSearch_1']=='Approved'){
            $whereCond .= ' AND status = 1 ';
        }

        if(isset($_REQUEST['sSearch_2']) && $_REQUEST['sSearch_2']!=''){
            $whereCond .= ' AND grp = '.$_REQUEST['sSearch_2'].'';
        }

        if(isset($_REQUEST['sSearch_3']) && $_REQUEST['sSearch_3']!=''){
            $whereCond .= ' AND record = '.$_REQUEST['sSearch_3'];
        }

        if(isset($_REQUEST['sSearch_4']) && $_REQUEST['sSearch_4']!=''){
            if($_REQUEST['sSearch_4'] == 1){ // GET METHOD 
                $whereCond .= ' AND method = 0 ';
            }else{                         // SHOW POST METHOD
                $whereCond .= ' AND method = 1 ';
            }
        }

        if(isset($_REQUEST['sSearch_5']) && $_REQUEST['sSearch_5']!=''){
            if($_REQUEST['sSearch_5']=='Success'){
                $whereCond .= ' AND result =1 ';            
            }else{
                $whereCond .= ' AND result =0 ';
            }
        }

        if(isset($_REQUEST['sSearch_6']) && $_REQUEST['sSearch_6']!=''){                        
            $whereCond .= ' AND http_status = '.trim($_REQUEST['sSearch_6']);            
        }

        $queryRec .= $whereCond . $sOrder. $sLimit;




    $whereCond1 = "WHERE acct_id = '".$linkid."' AND timestamp ".$date_where;
    
    if(isset($_REQUEST['sSearch_1']) && $_REQUEST['sSearch_1']=='Approved'){
        $whereCond1 .= ' AND status = 1 ';
    }

    if(isset($_REQUEST['sSearch_2']) && $_REQUEST['sSearch_2']!=''){
        $whereCond1 .= ' AND grp = '.$_REQUEST['sSearch_2'].'';
    }

    $myQRY = "SELECT DISTINCT status FROM idevaff_postbacks_logs ".$whereCond1." ORDER by timestamp DESC";    
    $q_status = $db->query($myQRY);

    $mygrpQRY = "SELECT DISTINCT grp FROM idevaff_postbacks_logs ".$whereCond1." ORDER by timestamp DESC";
    $q_grp    = $db->query($mygrpQRY);

    
    $q_record = $db->query('SELECT DISTINCT record       FROM idevaff_postbacks_logs WHERE acct_id = '.$linkid.' AND timestamp '.$date_where.' ORDER by timestamp DESC');
    $q_method = $db->query('SELECT DISTINCT method       FROM idevaff_postbacks_logs WHERE acct_id = '.$linkid.' AND timestamp '.$date_where.' ORDER by timestamp DESC');
    $q_result = $db->query('SELECT DISTINCT result       FROM idevaff_postbacks_logs WHERE acct_id = '.$linkid.' AND timestamp '.$date_where.' ORDER by timestamp DESC');
    
    $q_pburl  = $db->query('SELECT          postback_url FROM idevaff_postbacks_logs WHERE acct_id = '.$linkid.' AND timestamp '.$date_where.' ORDER by timestamp DESC');

    /*$q_status = $db->query('SELECT DISTINCT status FROM idevaff_postbacks_logs WHERE status !=0 AND timestamp '.$date_where.' ');
    

    $q_grp    = $db->query('SELECT DISTINCT grp FROM idevaff_postbacks_logs WHERE grp !=0  ORDER by timestamp DESC');
    

    $q_record = $db->query('SELECT DISTINCT record FROM idevaff_postbacks_logs WHERE record !=0  ORDER by timestamp DESC');
   

    $q_method = $db->query('SELECT DISTINCT method FROM idevaff_postbacks_logs  ORDER by timestamp DESC');
    

    $q_result = $db->query('SELECT DISTINCT result FROM idevaff_postbacks_logs   ORDER by timestamp DESC');    
    

    $q_pburl  = $db->query('SELECT postback_url FROM idevaff_postbacks_logs WHERE postback_url !=""');*/

    $availableStatuses      = $q_status->fetchAll();
    $availableGrps          = $q_grp->fetchAll();
    $availableRecords       = $q_record->fetchAll();
    $availableMethods       = $q_method->fetchAll();
    $availableResults       = $q_result->fetchAll();
    
    $availablePbURLs        = $q_pburl->fetchAll();

    $f_statuses=[];
    foreach ($availableStatuses as $key => $f_status)
    {
        $sArr=explode(",",$f_status['status']);
        foreach ($sArr as $s){
            if(!in_array(trim($s),$f_statuses)){
                $f_statuses[]=trim($s);
            }
        }
    }
    $f_grps=[];
    foreach ($availableGrps as $key => $f_grp)
    {
        $gArr=explode(",",$f_grp['grp']);
        foreach ($gArr as $g){
            if(!in_array(trim($g),$f_grps)){
                $f_grps[]=trim($g);
            }
        }
    }
    $f_records=[];
    foreach ($availableRecords as $key => $f_record)
    {
        $rArr=explode(",",$f_record['record']);
        foreach ($rArr as $r){
            if(!in_array(trim($r),$f_records)){
                $f_records[]=trim($r);
            }
        }
    }
    $f_methods=[];
    foreach ($availableMethods as $key => $f_method)
    {
        $mArr=explode(",",$f_method['method']);
        foreach ($mArr as $m){
            if(!in_array(trim($m),$f_methods)){
                $f_methods[]=trim($m);
            }
        }
    }
    //$f_methods[]= array('0'=>'GET', '1'=>'POST'); 

    $f_results=[];
    
    foreach ($availableResults as $key => $f_result)
    {
        $r2Arr=explode(",",$f_result['result']);
        foreach ($r2Arr as $r2){
            if(!in_array(trim($r2),$f_results)){
                $f_results[]=trim($r2);
            }
        }
    }
    //$f_results[] = array('1'=>'Success', '0'=>'Error'); 


    $q_httpst = $db->query('SELECT DISTINCT http_status FROM idevaff_postbacks_logs WHERE http_status !=0 ORDER by timestamp DESC');
    $availableHttpstatuses  = $q_httpst->fetchAll();
    $f_https=[];
    foreach ($availableHttpstatuses as $key => $f_http)
    {
        $hArr=explode(",",$f_http['http_status']);
        foreach ($hArr as $h){
            if(!in_array(trim($h),$f_https)){
                $f_https[]=trim($h);
            }
        }
    }


    $f_pburls=[];
    foreach ($availablePbURLs as $key => $f_pburl)
    {
        $pArr=explode(",",$f_pburl['postback_url']);
        foreach ($pArr as $p){
            if(!in_array(trim($p),$f_pburls)){
                $f_pburls[]= trim($p);
            }
        }
    }









        // TODO postback footer filters based on date range END        

    // labels
    $qsmartlinks = $db->query("SELECT id FROM idevaff_groups WHERE name LIKE '%popunder%'");
    $qBackOffers = $db->query("SELECT id FROM idevaff_groups WHERE name LIKE '%backoffer%'");
    $qpopunders = $db->query("SELECT id FROM idevaff_groups WHERE name LIKE '%popunder%'");
    $qoffers = $db->query("SELECT id FROM idevaff_groups");

    $smartlinks_grps = $qsmartlinks->fetchAll();
    $backoffers_grps = $qBackOffers->fetchAll();
    $popunders_grps = $qpopunders->fetchAll();
    $offers_grps = $qoffers->fetchAll();

    $smartlinksArray=[];
    foreach ($smartlinks_grps as $smartlinks_grp){
        $smartlinksArray[]=$smartlinks_grp['id'];
    }
    $backoffersArray=[];
    foreach ($backoffers_grps as $backoffers_grp){
        $backoffersArray[]=$backoffers_grp['id'];
    }
    $popundersArray=[];
    foreach ($popunders_grps as $popunders_grp){
        $popundersArray[]=$popunders_grp['id'];
    }
    $offersArray=[];
    foreach ($offers_grps as $offers_grp){
        $offersArray[]=$offers_grp['id'];
    }

        $result = $db->prepare($queryRec);
        $result->execute(array($linkid));   


        //Get total count
        $queryCounts                     = sprintf('SELECT count(*) as c FROM idevaff_postbacks_logs ');
        $queryCounts                     .= $whereCond . $sOrder;


        $rResultTotal                    = $db->prepare($queryCounts);
        $rResultTotal                    ->execute(array($linkid));

        $totalCountObj                   = $rResultTotal->fetch();


        $totalCount                      = $totalCountObj["c"];

        $output                          = array();
        $output['sEcho']                 = intval($paramEcho);
        $output['iTotalRecords']         = count($totalCountObj);
        $output['iTotalDisplayRecords']  = count($totalCountObj);//count($accountList);
        $output['queryN']         = $queryCounts;
        $output['query']         = $queryRec;
        $output['requ']         = $_REQUEST;
        $output['myQRY']         = $mygrpQRY;
        


        $output['iTotalDisplayRecords']  = $totalCount;//count($accountList);
        $output['aaData']                = array();
        $output['availableStatuses']     = $f_statuses;
        $output['availableOffers']       = $f_grps;
        $output['availableRecords']      = $f_records;
        $output['availableMethods']      = $f_methods;
        $output['availableResults']      = $f_results;
        $output['availableHTTPstatuses'] = $f_https;
        $output['availablePostbackURLs'] = $f_pburls;

        $querylang = $db->query('SELECT * FROM idevaff_language_custom WHERE name = "custom_rejected" OR name = "custom_approved" OR name = "custom_error" OR name = "custom_success"');
        $languageVals = $querylang->fetchAll();

        $getlanguage = array();
        foreach($languageVals as $languageVal) {
            $querylang_val = $db->query('SELECT * FROM idevaff_language_custom_values WHERE id = ' . $languageVal['id']);
            $querylang_data= $querylang_val->fetch();
            $pack = 10;
            switch($_SESSION['idev_language']) {
                case 'russian': $pack = 10; break;
                case 'english': $pack = 16; break;
            }
            $getlanguage[$languageVal['name']] = $querylang_data['pack_' . $pack];
        }


        foreach ($result->fetchAll() as $pqry) {
            $firetime     = gmdate("Y-m-d H:i:s", $pqry['timestamp']);
            $rstatus       = $pqry['status'];
            if ($rstatus == 0) { $status = '<span class="label label-warning">'.$getlanguage['custom_rejected'].'</span>'; } else { $status = '<span class="label label-default">'.$getlanguage['custom_approved'].'</span>'; }
            $grp          = $pqry['grp']; // get offer name based on this from _groups name column and show 18+ if adult niche from _groups niche column
            if (in_array($grp, $smartlinksArray)) {
                $offer = '<span class="label label-info" title="SmartLink + $name"><i class="fas fa-external-link-alt fa-fw" style="text-shadow:none !important;"></i></span>';
            }elseif (in_array($grp, $backoffersArray)) {
                $offer = '<span class="label label-info" title="Smart BackOffer + $name"><i class="fas fa-arrow-circle-left fa-fw" style="text-shadow:none !important;"></i></span>';
            }elseif (in_array($grp, $popundersArray)) {
                $offer = '<span class="label label-info" title="Smart PopUnder + $name"><i class="fas fa-undo fa-fw" style="text-shadow:none !important;"></i></span>';
            } else { 
                $offer = '<span class="label label-info" title="'.$grp.' - $offer_name">'. $grp.'</span>'; 
            }
            $record 		  = $pqry['record'];
            $rmethod 		  = $pqry['method'];
            if ($rmethod == 0) { $method = 'GET'; } else { $method = 'POST'; }
            $rresult 		  = $pqry['result'];
            if ($rresult == 0) { $presult = '<span class="label label-warning">'.$getlanguage['custom_error'].'</span>'; } else { $presult = '<span class="label label-default">'.$getlanguage['custom_success'].'</span>'; }
            $http_status 	= $pqry['http_status'];
            $postback_url1 = $pqry['postback_url'];
            $p_url = substr("$postback_url1", 0, 60);
            if (strlen($p_url) > 59) { $p_url = $p_url . "..."; }
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

        echo($offers_grps['name']);
        exit;
    }

exit;
