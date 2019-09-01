<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');
// function to return all dates between start and end dates from daterangepicker in array
function queryByDateRange($startD, $endD, $db, $id)
{

//	echo $startD ."====".$endD;
	$date_where = "between '" . strtotime($startD . " 00:00:00") . "' and '" . strtotime($endD . " 23:59:59") . "'";

	if ($_REQUEST['aggregate'] == 'monthly') {
		$grouping = ' GROUP BY MONTH(___)';
	} else if ($_REQUEST['aggregate'] == 'yearly') {
		$grouping = ' GROUP BY YEAR(___)';
	}
	else{
		$grouping = ' GROUP BY DAY(___)';
	}
//    $myNewQuery="SELECT sum(prijs) as SumOfPrijs, sum(amount) as SumOfFees, sum(prijs)+sum(amount) AS
//                    Total, year(vertrekdatum) as year
//                    FROM tbl_vluchtgegevens vg LEFT JOIN
//                         (select f.gegevenId, sum(amount) as Amount
//                          from tbl_fees f
//                          group by f.gegevenId
//                         ) f
//                         ON f.gegevenID = vg.gegevenID
//                    WHERE vertrekdatum <=NOW()
//                    GROUP by year(vertrekdatum)";
//	echo "SELECT
//	(SELECT  COUNT(ip) raw_visits FROM idevaff_iptracking WHERE acct_id = ? and stamp " . $date_where . str_replace('___','stamp',$grouping).") as raw_visits,
//  (SELECT COUNT(DISTINCT(ip)) unique_visits FROM idevaff_iptracking WHERE acct_id = ? and stamp " . $date_where . str_replace('___','stamp',$grouping).") as unique_visits,
//  (SELECT COUNT(*) FROM idevaff_sales WHERE approved=1 and id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping).") as approved,
//  (SELECT COUNT(*) FROM idevaff_archive WHERE approved=1 and id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping).") as paid,
//  (SELECT COALESCE(SUM(payment),0) earnings FROM idevaff_sales WHERE approved=1 and id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping).") as earnings,
//  (SELECT COALESCE(SUM(payment),0) paidEarnings FROM idevaff_archive WHERE id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping).") as paid_earnings,
//   approved+paid as transactions, earnings+paid_earnings as earnings_total";

	$q_raw_visits = "select COUNT(ip) raw_visits from idevaff_iptracking where acct_id = ? and stamp " . $date_where . str_replace('___','stamp',$grouping);

	$q_unique_visits = "select COUNT(DISTINCT(ip)) unique_visits from idevaff_iptracking where acct_id = ? and stamp " . $date_where . str_replace('___','stamp',$grouping);

	$q_approved = "select COUNT(*) from idevaff_sales where approved=1 and id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping);

	/*
	TODO:
	Display unapproved/declined commissions with negative value in color #3A1259 in child rows
	Check for uniqueness in record column for they may be the same - on chargeback first it gets unapproved then when admin verifies reason marks it as declined

		$q_Unapproved = "select COUNT(*) from idevaff_sales where approved=0 and id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping);
		$q_Declined = "select COUNT(*) from idevaff_deleted_sales where approved=0 and id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping);
	*/

	$q_paid = "select COUNT(*) from idevaff_archive where id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping);

	$q_earnings = "select COALESCE(SUM(payment),0) earnings from idevaff_sales where id = ? and approved=1 and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping);

	$q_paid_earnings = "select COALESCE(SUM(payment),0) paidEarnings from idevaff_archive where id = ? and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping);


	// results start
	$table_traffic_raw = $db->prepare($q_raw_visits);        // raw visits count
	$table_traffic_raw->execute(array($id));

	$table_unique_traffic = $db->prepare($q_unique_visits);         // unique visits count
	$table_unique_traffic->execute(array($id));

	$table_earnings = $db->prepare($q_earnings);        // sales amount in euros
	$table_earnings->execute(array($id));

	$table_paid = $db->prepare($q_paid);            // number of paid commissions
	$table_paid->execute(array($id));

	$table_approved = $db->prepare($q_approved);    // number of approved commissions
	$table_approved->execute(array($id));

	$table_paid_earnings = $db->prepare($q_paid_earnings);        // paid sales amount in euros
	$table_paid_earnings->execute(array($id));
	// results end

	$rawTraffic = $table_traffic_raw->fetchColumn();
	$uniqueTraffic = $table_unique_traffic->fetchColumn();
	$approved = $table_approved->fetchColumn();
	$paid = $table_paid->fetchColumn();
	$earnings = $table_earnings->fetchColumn();
	$transactions = $approved + $paid;                 // number of sales integer
	$earningsPaid = $table_paid_earnings->fetchColumn();
	$earnings_total = $earnings + $earningsPaid;

	if ($rawTraffic == 0) {
		$sales_ratio = 0;
		$epc_total = 0;
	} else {
		$sales_ratio = $transactions / $rawTraffic * 100;
		$sales_ratio = round($sales_ratio, 3);
		$epc_total = ($earnings_total / $rawTraffic) * 100;
		$epc_total = round($epc_total, 4);
	}
	return [
		"date" => $startD,
		"raw_visits" => $rawTraffic,
		"unique_visits" => $uniqueTraffic,
		"earnings" => $earnings_total,
		"transactions" => $transactions,
		"sales_ratio" => $sales_ratio,
		"epc" => $epc_total
	];
}

$temp_fields = 'traffic_no_url,traffic_box_title,traffic_box_info';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_" . $pack_table_selected . "` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage = $query->fetch();
	$query->closeCursor();


	$traffic_no_url = $getlanguage['traffic_no_url'];
	$traffic_box_title = $getlanguage['traffic_box_title'];
	$traffic_box_info = $getlanguage['traffic_box_info'];

	//get affiliate id from session
	/*$linkid = 106;*/
	$linkid = $_SESSION[$install_directory_name . '_idev_LoggedID'];
	//get date ranges from daterangepicker
	/*$startD = "2018/09/21";
	$endD = "2018/09/21";*/

	/*echo strtotime($startD . " 00:00:00") . "-". strtotime($endD . " 23:59:59");
	return;*/
	$datesWithSeparator = $_GET['columns'][0]["search"]["value"];
	if ($datesWithSeparator === "")
		$datesWithSeparator = $_GET["startD"] . "|" . $_GET["endD"];

	$datesArray = explode("|", $datesWithSeparator);
	$startD = $datesArray[0];
	$endD = $datesArray[1];


	//Get Param
	$paramRowPerPage = isset($_REQUEST['length']) ? (int)$_REQUEST['length'] : 10; // how many rows to show (days)
	$paramEcho = isset($_REQUEST['draw']) ? stripslashes($_REQUEST['draw']) : '';
	$paramStart = isset($_REQUEST['start']) ? (int)$_REQUEST['start'] : 0;
	// Columns from the table
	$aColumns = array('date_', 'raw_visits',  '', 'unique_visits', '', 'transactions', '', 'sales_ratio', '', 'epc', '', 'earnings', '');

	// check statements to extract data from db, order according to this script's mechanism to show stats on traffic log page
	$paramSearch = trim($_REQUEST['search']["value"]);
	$sLimit = sprintf(" LIMIT %d, %d ", $paramStart, $paramRowPerPage);


	/*
	* Ordering
	*/
	$sOrder = " ORDER BY  ";
	$sOrder .= " " . $aColumns[intval($_REQUEST['order'][0]["column"])] . " " . $_REQUEST['order'][0]["dir"] . " ";

	// Get the DateTime Instance for end and start dates
	$begin = new DateTime($startD . "00:00:00");
	$end = new DateTime($endD . " 23:59:59");
	$dates = [];
	if ($_REQUEST['aggregate'] == 'daily') {
		$interval = DateInterval::createFromDateString('1 day');
		// Get all the period for the query
		$period = new DatePeriod($begin, $interval, $end);
		foreach($period as $dt1){
			$d['start'] = $dt1->format("Y-m-d");
			$d['end']   = $dt1->format("Y-m-d");
			$dates[]=$d;
		}
	}
	else{
		$date1 = $startD;
		$date2 = $endD;
		$year1 = date('Y',strtotime($date1));
		$year2 = date('Y',strtotime($date2));



		if($year1 == $year2){
			$month1= date('m',strtotime($date1));
			$month2= date('m',strtotime($date2));
			if($month1 != $month2){
				for($i=$month1;$i<=$month2;$i++){
					$d=[];
					if($i == $month1){
						$d['start'] = $date1;
						$d['end']   = date('Y-m-t',strtotime($date1));
					}
					elseif($i == $month2){
						$d['start'] = date('Y-m-01',strtotime($date2));
						$d['end']   = $date2;
					}
					else{
						$d['start'] = date('Y-m-01',strtotime($year1."-".$i."-01"));
						$d['end']   = date('Y-m-t',strtotime($year1."-".$i."-01"));
					}
					$dates[]=$d;
				}
			}
			else{
				$d['start'] = $date1;
				$d['end']   = $date2;
				$dates[]=$d;
			}
		}
		else{
			for($j=$year1;$j<=$year2;$j++){
				if($j == $year1){
					$m1= date('m',strtotime($date1));
					$m2 = 12;
					if($m1 != $m2){
						for($i=$m1;$i<=$m2;$i++){
							$d=[];
							if($i == $m1){
								$d['start'] = $date1;
								$d['end']   = date('Y-m-t',strtotime($date1));
							}
							else{
								$strt = $j."-".$i."-01";
								$d['start'] = date('Y-m-d',strtotime($strt));
								$d['end']   = date('Y-m-t',strtotime($strt));
							}
							$dates[]=$d;
						}
					}
					else{
						$d['start'] =  $date1;
						$d['end']   = date('Y-m-t',strtotime($date1));
						$dates[]=$d;
					}
				}
				elseif($j == $year2){
					$m1= 1;
					$m2 = date('m',strtotime($date2));
					if($m1 != $m2){
						for($i=$m1;$i<=$m2;$i++){
							$d=[];
							if($i == $m2){
								$d['start'] =  date('Y-m-01',strtotime($date2));
								$d['end']   = $date2;
							}
							else{
								$strt = $j."-".$i."-01";
								$d['start'] = date('Y-m-d',strtotime($strt));
								$d['end']   = date('Y-m-t',strtotime($strt));
							}
							$dates[]=$d;
						}
					}
					else{
						$d['start'] =  date('Y-m-01',strtotime($date2));
						$d['end']   = $date2;
						$dates[]=$d;
					}
				}
				else{
					$m1= 1;
					$m2 = 12;
					for($i=$m1;$i<=$m2;$i++){
						$d=[];
						$strt = $j."-".$i."-01";
						$d['start'] =  date('Y-m-d',strtotime($strt));
						$d['end']   = date('Y-m-t',strtotime($strt));
						$dates[]=$d;
					}
				}
			}
		}
	}


	$days = 0;
	// Creating a temprary table to filter from
	$temp_table = "CREATE TEMPORARY TABLE tmp_result (date_ varchar(20), raw_visits int(11), unique_visits int(11),transactions int(11), 
					sales_ratio float, earnings float(11), epc float(11)) ENGINE=MEMORY";
	$db->query($temp_table);
	// Loop in each period of time of 1 day
	foreach ($dates as $dt) {
//		echo $dt['start']."---".$dt['end'];
		// Get the data for the specific date, with the function queryByDateRange
		$r = queryByDateRange($dt['start'], $dt['end'], $db, $linkid);
		foreach($r as $ridx=>$rval) {
			if (empty($rval)) {
				$r[$ridx]=0;
			}
		}
		// Insert values on temprary table ?! WTF
		$q_general = "INSERT INTO tmp_result VALUES('" . $r["date"] . "'," . $r["raw_visits"] . "," . $r["unique_visits"] . "," . $r["transactions"] . "," . $r["sales_ratio"] . "," . $r["earnings"] . "," . $r["epc"] . ")";
		$db->query($q_general);
		$days++;
	}
	/*
	 * Search value
	 * */
	$search = " WHERE ";
	$t = 0;
	if ($paramSearch !== "") {
		foreach ($aColumns as $column) {
			if ($column === "") {
				$t++;
				continue;
			}
			$search .= $column . " LIKE '%$paramSearch%' ";
			if (($t + 1) < count($aColumns))
				$search .= " OR ";
			$t++;
		}
	}

	if ($search === ' WHERE ')
		$search = "";

	$fields = '*';
	$grouping = '';
	echo $_REQUEST['aggregate'];
	if ($_REQUEST['aggregate'] == 'monthly') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY MONTH(___)';
	} else if ($_REQUEST['aggregate'] == 'yearly') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY YEAR(___)';
	}
	else{
		$grouping = ' GROUP BY DAY(___)';
	}
	// Query to get the filtered data
	$filtered = "SELECT ".$fields." FROM tmp_result " . $search . str_replace('___','date_',$grouping);

	$filter = $db->prepare(trim($filtered));
	$filter->execute();
	// Query to get the result, it's which is sended to the datatable
	$q_result = $filtered . $sOrder . $sLimit;

	// These are the data for the datatable
	$output = array();
	$output['draw'] = intval($paramEcho);              //draws count
	$output["data"] = [];
	$cnt=0;
	foreach ($db->query($q_result) as $row) {
		// Fill an array
		$data = [];
		$data["date_"] = $row["date_"];
		if ($_REQUEST['aggregate'] == 'monthly') {
			$data['actual_date']= date('Y-m-01',strtotime($row['date_']));
			$data['date_'] = date('F',strtotime($row['date_']));
		} else if ($_REQUEST['aggregate'] == 'yearly') {
			$data['actual_date']= date('Y-m-01',strtotime($row['date_']));
			$data['date_'] = date('Y',strtotime($row['date_']));
		}
		else{
			$data['actual_date']=$row['date_'];
		}
		$data['dt_RowId']=$cnt;

		$data["raw_visits"] = $row["raw_visits"];
		$data["unique_visits"] = $row["unique_visits"];
		$data["transactions"] = $row["transactions"];
		$data["sales_ratio"] = $row["sales_ratio"] . "%";
		$data["epc"] = $row["epc"] . " €";
		$data["earnings"] = $row["earnings"] . " €";
		$data["paid_earnings"] = $row["paid_earnings"] . " €";
		$cnt++;
		/*$t = detailsByDateRange($data["date_"], $data["date_"], $db, $linkid);
		$data["raw_visits_details"] = $t["raw_visits_detail"];
		$data["unique_visits_details"] = $t["unique_visits_detail"];
		$data["transactions_details"] = $t["transactions_detail"];
		$data["sales_ratio_details"] = $t["sales_ratio_detail"];
		$data["earnings_details"] = $t["earnings_detail"];
		$data["paid_earnings_details"] = $t["paid_earnings_detail"];*/

		// Add data array to output["data"] array
		array_push($output["data"], $data);
	}
	$output['recordsTotal'] = $days;             // total records for ajax
	$output['recordsFiltered'] = $filter->rowCount();      // total filtered
	/*$output['debbug'] = [
		"sql" => $q_approved_country,
		"startD" => $startD,
		"endD" => $endD
	]; // Only for debugg proposes*/
	// Response data
	echo json_encode($output);
	return;

} catch (Exception $ex) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}