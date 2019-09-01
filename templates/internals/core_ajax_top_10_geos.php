<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");
// TODO: return geos and convert ratio for last 6 months and last month in array, e.g. Array ( [RO] => 0.321%, [BG] => 0,234%, etc ) // order by sales ratio desc and limit to 5

// strtotime(date('m/d/Y 00:00:00', strtotime('first day of this month')))
//$start_date_l6m = strtotime(date('F 1, Y 00:00:00', strtotime('-6 months')));
//$end_date_l6m = strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month')));

// function to return all dates between start and end dates from daterangepicker in array
function queryByDateRange($startD, $endD, $db, $id)
{
    $date_where = "between '" . strtotime($startD . " 00:00:00") . "' and '" . strtotime($endD . " 23:59:59") . "'";

    $q_unique_visits = "select COUNT(DISTINCT(ip)) unique_visits from idevaff_iptracking where stamp " . $date_where;

    $q_approved = "select COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code " . $date_where;

    $q_paid = "select COUNT(*) from idevaff_archive where top_tier_tag=0 and code " . $date_where;


    // results start

    $table_unique_traffic = $db->prepare($q_unique_visits);         // unique visits count
    $table_unique_traffic->execute();

    $table_paid = $db->prepare($q_paid);            // number of paid commissions
    $table_paid->execute();

    $table_approved = $db->prepare($q_approved);    // number of approved commissions
    $table_approved->execute();
    // results end


    $uniqueTraffic = $table_unique_traffic->fetchColumn();
    $approved = $table_approved->fetchColumn();
    $paid = $table_paid->fetchColumn();
    $transactions = $approved + $paid;                 // number of sales integer

    if ($uniqueTraffic == 0) {
        $sales_ratio = 0;
    } else {
        $sales_ratio = $transactions / $uniqueTraffic * 100;
        $sales_ratio = round($sales_ratio, 3);
    }
    return [
        "unique_visits" => $uniqueTraffic,
        "transactions" => $transactions,
        "sales_ratio" => $sales_ratio
    ];
}

function detailsByDateRange($startD, $endD, $db, $id)
{
    $date_where = "between '" . strtotime(date('m/d/Y 00:00:00', strtotime('first day of this month'))) . "' and '" . strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month'))) . "'"; // set dates here, now is this month
    $q_unique_visits_country = "select COUNT(distinct(ip)) v,geo n from idevaff_iptracking where acct_id = $id and stamp " . $date_where . " group by geo  order by v desc";
    $q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and id = $id and top_tier_tag=0 and code " . $date_where . " group by geo";
    $q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where and top_tier_tag=0 and code " . $date_where . " group by geo";

    $transactions_country = [];
    foreach ($db->query($q_paid_country) as $row) {
        array_push($transactions_country, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_approved_country) as $row) {

        if(array_search($index = $row["n"], $transactions_country))
        {
            $transactions_country[$index]["v"] = $row["v"];
        }else{
            array_push($transactions_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }



    $unique_visits_country = $db->query($q_unique_visits_country)->fetchAll(PDO::FETCH_ASSOC);

    $sales_ratio_country = [];
    foreach ($unique_visits_country as $row) {
        foreach ($transactions_country as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_country, [
                        "n" => $row["n"],
                        "v" => 0 . "%"
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_country, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3) . "%"
                    ]);
                }
                break;
            }
        }
    }

    return [
        "sales_ratio_detail" => [$sales_ratio_country]
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

    //Get Param
    $paramRowPerPage = isset($_REQUEST['length']) ? (int)$_REQUEST['length'] : 5; // how many rows to show (days)
    $paramEcho = isset($_REQUEST['draw']) ? stripslashes($_REQUEST['draw']) : '';
    $paramStart = isset($_REQUEST['start']) ? (int)$_REQUEST['start'] : 0;
    // Columns from the table
    $aColumns = array('sales_ratio', ''); 

    $paramSearch = trim($_REQUEST['search']["value"]);
    $sLimit = sprintf(" LIMIT %d, %d ", $paramStart, $paramRowPerPage);


    // Get the DateTime Instance for end and start dates
    $begin = new DateTime($startD . "00:00:00");
    $end = new DateTime($endD . " 23:59:59");

    // Set interval 1 day
    $interval = DateInterval::createFromDateString('1 month');
    // Get all the period for the query
    $period = new DatePeriod($begin, $interval, $end);

    $days = 0;
    // Creating a temprary table to filter from
    $temp_table = "CREATE TEMPORARY TABLE tmp_result (unique_visits int(11),transactions int(11), sales_ratio float)";
    $db->query($temp_table);
    // Loop in each period of time of 1 day
    foreach ($period as $dt) {
        // Get the data for the specific date, with the function queryByDateRange
        $r = queryByDateRange($dt->format("Y-m-d"), $dt->format("Y-m-d"), $db, $linkid);
        // Insert values on temprary table
        $q_general = "INSERT INTO tmp_result VALUES(" . $r["unique_visits"] . "," . $r["transactions"] . "," . $r["sales_ratio"] . ")";

        $db->query($q_general);
    }


    // Query to get the filtered data
    $filtered = "SELECT * FROM tmp_result order by sales_ratio desc";
    $filter = $db->prepare($filtered);
    $filter->execute();

    // Query to get the result, it's which is sended to the datatable
    $q_result = $filtered . $sOrder . $sLimit;

    // These are the data for the datatable
    $output = array();
    $output["data"] = [];
    foreach ($db->query($q_result) as $row) {
        // Fill an array
        $data = [];
        $t = detailsByDateRange($data["date_"], $data["date_"], $db, $linkid);
        $data["sales_ratio_details"] = $t["sales_ratio_detail"];

        // Add data array to output["data"] array
        array_push($output["data"], $data);
    }
/*
    $startD = new DateTime($startD . " 00:00:00");
    $endD = new DateTime($endD . " 23:59:59");
    $date_where = "between '" . $startD->getTimestamp() . "' and '" . $endD->getTimestamp() . "'";
    $q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and id = $linkid and top_tier_tag=0 and code " . $date_where . " group by geo";
    $output['recordsTotal'] = $days;             // total records for ajax
    $output['recordsFiltered'] = $filter->rowCount();      // total filtered
    $output['query'] = $db->query($q_approved_country)->fetchAll(PDO::FETCH_ASSOC); // Only for debugg proposes
    $output['debbug'] = [
        "sql" => $q_approved_country,
        "startD" => $startD,
        "endD" => $endD
    ]; // Only for debugg proposes
*/
    // Response data
    print_r($output);
    return;

} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}