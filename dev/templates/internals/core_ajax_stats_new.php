<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
include_once('../../includes/session.check_affiliates.php');
// function to return all dates between start and end dates from daterangepicker in array


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
	$begin = new DateTime($startD . "00:00:00",new DateTimeZone("UTC"));
	$end = new DateTime($endD . " 23:59:59",new DateTimeZone("UTC"));

	if ($_REQUEST['aggregate'] == 'daily') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY DAY(___)';
		$intervalVal= '1 day';
	} else if ($_REQUEST['aggregate'] == 'monthly') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY MONTH(___)';
		$intervalVal= '1 month';
	} else if ($_REQUEST['aggregate'] == 'yearly') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY YEAR(___)';
		$intervalVal= '1 year';
	}
	else{
		$intervalVal = '1 day';
	}
	// Set interval 1 day
	// TODO: interval per month, per year !?
	$interval = DateInterval::createFromDateString($intervalVal);

	// Get all the period for the query
	$period = new DatePeriod($begin, $interval, $end);

	$days = 0;

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
	if ($_REQUEST['aggregate'] == 'monthly') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY MONTH(___)';
	} else if ($_REQUEST['aggregate'] == 'yearly') {
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY YEAR(___)';
	}
	else{
		$fields = 'date_,SUM(raw_visits) raw_visits,SUM(unique_visits) unique_visits,SUM(transactions) transactions,SUM(sales_ratio) sales_ratio,SUM(earnings) earnings,SUM(epc) epc';
		$grouping = ' GROUP BY DAY(___)';
	}
	$d=[];
	foreach ($period as $dt) {

			$startD     = $dt->format("Y-m-d");
		if ($_REQUEST['aggregate'] == 'monthly') {
			$endD       = $dt->add(new DateInterval('P1M'))->format( "Y-m-d");
		}
		else if ($_REQUEST['aggregate'] == 'yearly') {
			$endD       = $dt->add(new DateInterval('P1Y'))->format("Y-m-d");
		}
		else{
			$endD       = $dt->format("Y-m-d");
		}
		$date_where = "between '" . strtotime($startD . " 00:00:00") . "' and '" . strtotime($endD . " 23:59:59") . "'";

			$filtered   = "SELECT SUM(`raw_visits_count`.`raw_visits`) as raw_visits, SUM(`unique_visits_count`.`unique_visits`) as unique_visits, 
`approved_count`.`c_approved` + `paid_count`.`c_paid` as transactions , `earnings_count`.`earnings` + `paid_earnings_count`.`paidEarnings` as earnings, 
(((`approved_count`.`c_approved` + `paid_count`.`c_paid`)/(`raw_visits_count`.`raw_visits`))*100) as sales_ratio, 
(((`earnings_count`.`earnings` + `paid_earnings_count`.`paidEarnings`)/(`raw_visits_count`.`raw_visits`))*100) as epc,
DATE_FORMAT(FROM_UNIXTIME(`raw_visits_count`.`stamp`), '%Y-%m-%d') as date_ FROM (
(SELECT COUNT(ip) raw_visits, stamp FROM idevaff_iptracking WHERE acct_id = $linkid and stamp " . $date_where . str_replace('___','stamp',$grouping). ") as raw_visits_count,
(SELECT COUNT(DISTINCT(ip)) unique_visits FROM idevaff_iptracking WHERE acct_id = $linkid and stamp " . $date_where . str_replace('___','stamp',$grouping). ") as unique_visits_count,
(SELECT COUNT(*) c_approved FROM idevaff_sales WHERE approved=1 and id = $linkid and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping). ") as approved_count,
(SELECT COUNT(*) c_paid FROM idevaff_archive WHERE id = $linkid and top_tier_tag=0 and code " . $date_where. str_replace('___','code',$grouping). ") as paid_count,
(SELECT COALESCE(SUM(payment),0) earnings FROM idevaff_sales WHERE approved=1 and id = $linkid and top_tier_tag=0 and code " . $date_where. str_replace('___','code',$grouping) . ") as earnings_count,
(SELECT COALESCE(SUM(payment),0) paidEarnings FROM idevaff_archive WHERE id = $linkid and top_tier_tag=0 and code " . $date_where . str_replace('___','code',$grouping). ") as paid_earnings_count)" .
			              $search . str_replace( '___', 'date_', $grouping );
			echo $filtered;
			$filter = $db->prepare( trim( $filtered ) );
			$filter->execute();

			// Query to get the result, it's which is sended to the datatable
			$q_result = $filtered . $sOrder;
			foreach ( $db->query( $q_result ) as $row ) {
				$d[] = $row;
			}
		$days++;
	}
	// These are the data for the datatable
	$output = array();
	$output['draw'] = intval($paramEcho);              //draws count
	$output["data"] = [];
	$cnt=0;
	$d = array_reverse($d);
	$a = array_slice($d, $paramStart, $paramRowPerPage);
	foreach ($a as $row) {
		// Fill an array
		$data = [];
		$data["date_"] = $row["date_"];
		if ($_REQUEST['aggregate'] == 'monthly') {
			$data['date_'] = date('F',strtotime($row['date_']));
		} else if ($_REQUEST['aggregate'] == 'yearly') {
			$data['date_'] = date('Y',strtotime($row['date_']));
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

		// Add data array to output["data"] array
		array_push($output["data"], $data);
	}
	$output['recordsTotal'] = $days;             // total records for ajax
	$output['recordsFiltered'] = count($d);      // total filtered
	$output['debbug'] = [
		"sql" => $filtered,
		"startD" => $startD,
		"endD" => $endD
	]; // Only for debugg proposes
	// Response data
	echo json_encode($output);
	return;

} catch (Exception $ex) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}