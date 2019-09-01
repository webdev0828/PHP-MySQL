<?php
set_time_limit(0);
$control_panel_session = true;
include_once 'includes/control_panel.php';
include_once 'includes/tokens.php';

$start_date_l6m = strtotime(date('F 1, Y 00:00:00', strtotime('-6 months')));
$end_date_l6m = strtotime(date('m/d/Y 23:59:59', strtotime('last day of -1 month')));

if (filemtime('0_c_epc_l6m.txt') < time()-1*900) {

// global convert ratio start

// last 6 months
    $q_raw_visits_all = "SELECT COUNT(ip) from idevaff_iptracking where geo IS NOT NULL and stamp between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_approved = "SELECT COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_paid = "SELECT COUNT(*) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";

    $q_earnings = "SELECT COALESCE(SUM(amount),0) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_paid_earnings = "SELECT COALESCE(SUM(amount),0) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";

//per geo start
//last 6 months queries per geo start

    $q_raw_visits_country = "SELECT COUNT(ip) v, geo n from idevaff_iptracking where geo IS NOT NULL and stamp between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";
    $q_approved_country = "SELECT COUNT(*) v, geo n from idevaff_sales where geo IS NOT NULL and approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";
    $q_paid_country = "SELECT COUNT(*) v, geo n from idevaff_archive where geo IS NOT NULL and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";

    $q_earnings_country = "SELECT COALESCE(SUM(amount),0) v, geo n from idevaff_sales where geo IS NOT NULL and approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by geo order by v desc";
    $q_paid_earnings_country = "SELECT COALESCE(SUM(amount),0) v, geo n from idevaff_archive where geo IS NOT NULL and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by geo order by v desc";
//last 6 months queries per geo end

//this month queries per geo start

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
            $transactions_country[$index]["v"] += $row["v"];
        }else{
            array_push($transactions_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $sales_ratio_country = [];
    foreach ($db->query($q_raw_visits_country) as $row) {
        foreach ($transactions_country as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If raw traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_country, [
                        "n" => $row["n"],
                        "v" => 0
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_country, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3)
                    ]);
                }
                break;
            }
        }
    }

    $earnings_country = [];
    foreach ($db->query($q_earnings_country) as $row) {
        array_push($earnings_country, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_paid_earnings_country) as $row) {
        if($index = array_search($row["n"], array_column($earnings_country, 'n')))
        {
            $earnings_country[$index]["v"] = $row["v"];
        }else{
            array_push($earnings_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $epc_country = [];
    foreach ($earnings_country as $row) {
        foreach ($db->query($q_raw_visits_country) as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If raw traffic 0
                if ($row_["v"] == 0) {
                    array_push($epc_country, [
                        "n" => $row["n"],
                        "v" => 0
                    ]);
                } else {
                    $epc = $row["v"] / $row_["v"] * 100;
                    array_push($epc_country, [
                        "n" => $row["n"],
                        "v" => round($epc, 4)
                    ]);
                }
                break;
            }
        }
    }


    $temp_table = "CREATE TEMPORARY TABLE tmp_top_converting (n char(2), v float(16)) ENGINE=MEMORY";
    $db->query($temp_table);

    foreach ($sales_ratio_country as $r)
    {
        $q_general = "INSERT INTO tmp_top_converting VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($q_general);
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_top_earning (n char(2), v float(16)) ENGINE=MEMORY";
    $db->query($temp_table);

    foreach ($epc_country as $r)
    {
        $q_general = "INSERT INTO tmp_top_earning VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($q_general);
    }


    $q_sales_ratio_country = "SELECT * FROM tmp_top_converting GROUP BY n ORDER BY v DESC";
    $q_epc_country = "SELECT * FROM tmp_top_earning GROUP BY n ORDER BY v DESC";

// per geo end

// global exec last 6 months

    $table_raw_traffic = $db->prepare($q_raw_visits_all);
    $table_raw_traffic->execute();
    $all_traffic = $table_raw_traffic->fetchColumn();
    
    $table_approved_sales = $db->prepare($q_approved);
    $table_approved_sales->execute();
    $all_approved_sales = $table_approved_sales->fetchColumn();

    $table_paid_sales = $db->prepare($q_paid);
    $table_paid_sales->execute();
    $all_paid_sales = $table_paid_sales->fetchColumn();

    $table_approved_earnings = $db->prepare($q_earnings);
    $table_approved_earnings->execute();
    $all_approved_earnings = $table_approved_earnings->fetchColumn();

    $table_paid_earnings = $db->prepare($q_paid_earnings);
    $table_paid_earnings->execute();
    $all_paid_earnings = $table_paid_earnings->fetchColumn();

        $all_sales = $all_approved_sales + $all_paid_sales;
        $all_sales_ratio_unrounded = $all_sales / $all_traffic * 100;
        $all_sales_ratio = round($all_sales_ratio_unrounded, 3);

        $all_earnings = $all_approved_earnings + $all_paid_earnings;
        $all_epc_unrounded = $all_earnings / $all_traffic * 100;
        $all_epc = round($all_epc_unrounded, 4);

$c_sr_l6m = $db->query($q_sales_ratio_country)->fetchAll(PDO::FETCH_ASSOC);
$c_epc_l6m = $db->query($q_epc_country)->fetchAll(PDO::FETCH_ASSOC);

file_put_contents('0_c_sr_l6m.txt', serialize($c_sr_l6m));
file_put_contents('0_g_sr_l6m.txt', serialize($all_sales_ratio));
file_put_contents('0_c_epc_l6m.txt', serialize($c_epc_l6m));
file_put_contents('0_g_epc_l6m.txt', serialize($all_epc));

} else {

  $c_sr_l6m = unserialize(file_get_contents('0_c_sr_l6m.txt'));
  $all_sales_ratio = unserialize(file_get_contents('0_g_sr_l6m.txt'));

  $c_epc_l6m = unserialize(file_get_contents('0_c_epc_l6m.txt'));
  $all_epc = unserialize(file_get_contents('0_g_epc_l6m.txt'));

}
exit();
?>