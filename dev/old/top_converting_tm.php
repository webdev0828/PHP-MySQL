<?php
set_time_limit(0);
$control_panel_session = true;
include_once 'includes/control_panel.php';
include_once 'includes/tokens.php';

$start_date = strtotime(date('m/d/Y 00:00:00', strtotime('first day of this month')));
$end_date = strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month')));

if (filemtime('0_c_epc_tm.txt') < time()-1*900) {

// global convert ratio start

// this month
    $tm_q_raw_visits_all = "SELECT COUNT(ip) from idevaff_iptracking where geo IS NOT NULL and stamp between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_approved = "SELECT COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_paid = "SELECT COUNT(*) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";

    $tm_q_earnings = "SELECT COALESCE(SUM(amount),0) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_paid_earnings = "SELECT COALESCE(SUM(amount),0) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";

// global convert ratio end

//per geo start

//this month queries per geo start

    $tm_q_raw_visits_country = "SELECT COUNT(ip) v, geo n from idevaff_iptracking where geo IS NOT NULL and stamp between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";
    $tm_q_approved_country = "SELECT COUNT(*) v, geo n from idevaff_sales where geo IS NOT NULL and approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";
    $tm_q_paid_country = "SELECT COUNT(*) v, geo n from idevaff_archive where geo IS NOT NULL and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";

    $tm_q_earnings_country = "SELECT COALESCE(SUM(amount),0) v, geo n from idevaff_sales where geo IS NOT NULL and approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by geo order by v desc";
    $tm_q_paid_earnings_country = "SELECT COALESCE(SUM(amount),0) v, geo n from idevaff_archive where geo IS NOT NULL and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by geo order by v desc";
//this month queries per geo end

    $tm_transactions_country = [];
    foreach ($db->query($tm_q_paid_country) as $row) {
        array_push($tm_transactions_country, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($tm_q_approved_country) as $row) {

        if(array_search($index = $row["n"], $tm_transactions_country))
        {
            $tm_transactions_country[$index]["v"] = $row["v"];
        }else{
            array_push($tm_transactions_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $tm_sales_ratio_country = [];
    foreach ($db->query($tm_q_raw_visits_country) as $row) {
        foreach ($tm_transactions_country as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If raw traffic 0
                if ($row["v"] == 0) {
                    array_push($tm_sales_ratio_country, [
                        "n" => $row["n"],
                        "v" => 0
                    ]);
                } else {
                    $tm_sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($tm_sales_ratio_country, [
                        "n" => $row["n"],
                        "v" => round($tm_sales_ratio, 3)
                    ]);
                }
                break;
            }
        }
    }

    $tm_earnings_country = [];
    foreach ($db->query($tm_q_earnings_country) as $row) {
        array_push($tm_earnings_country, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($tm_q_paid_earnings_country) as $row) {
        if($index = array_search($row["n"], array_column($tm_earnings_country, 'n')))
        {
            $tm_earnings_country[$index]["v"] = $row["v"];
        }else{
            array_push($tm_earnings_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $tm_epc_country = [];
    foreach ($tm_earnings_country as $row) {
        foreach ($db->query($tm_q_raw_visits_country) as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If raw traffic 0
                if ($row_["v"] == 0) {
                    array_push($tm_epc_country, [
                        "n" => $row["n"],
                        "v" => 0
                    ]);
                } else {
                    $tm_epc = $row["v"] / $row_["v"] * 100;
                    array_push($tm_epc_country, [
                        "n" => $row["n"],
                        "v" => round($tm_epc, 4)
                    ]);
                }
                break;
            }
        }
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_tm_top_converting (n char(2), v float(16)) ENGINE=MEMORY";
    $db->query($temp_table);

    foreach ($tm_sales_ratio_country as $r)
    {
        $tm_q_general = "INSERT INTO tmp_tm_top_converting VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($tm_q_general);
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_tm_top_earning (n char(2), v float(16)) ENGINE=MEMORY";
    $db->query($temp_table);

    foreach ($tm_epc_country as $r)
    {
        $tm_q_general = "INSERT INTO tmp_tm_top_earning VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($tm_q_general);
    }

    $q_tm_sales_ratio_country = "SELECT * FROM tmp_tm_top_converting GROUP BY n ORDER BY v DESC";
    $q_tm_epc_country = "SELECT * FROM tmp_tm_top_earning GROUP BY n ORDER BY v DESC";

// per geo end

// global exec this month

    $tm_table_raw_traffic = $db->prepare($tm_q_raw_visits_all);
    $tm_table_raw_traffic->execute();
    $tm_all_traffic = $tm_table_raw_traffic->fetchColumn();
    
    $tm_table_approved_sales = $db->prepare($tm_q_approved);
    $tm_table_approved_sales->execute();
    $tm_all_approved_sales = $tm_table_approved_sales->fetchColumn();

    $tm_table_paid_sales = $db->prepare($tm_q_paid);
    $tm_table_paid_sales->execute();
    $tm_all_paid_sales = $tm_table_paid_sales->fetchColumn();

    $tm_table_approved_earnings = $db->prepare($tm_q_earnings);
    $tm_table_approved_earnings->execute();
    $tm_all_approved_earnings = $tm_table_approved_earnings->fetchColumn();

    $tm_table_paid_earnings = $db->prepare($tm_q_paid_earnings);
    $tm_table_paid_earnings->execute();
    $tm_all_paid_earnings = $tm_table_paid_earnings->fetchColumn();

        $tm_all_sales = $tm_all_approved_sales + $tm_all_paid_sales;
        $tm_all_sales_ratio_unrounded = $tm_all_sales / $tm_all_traffic * 100;
        $tm_all_sales_ratio = round($tm_all_sales_ratio_unrounded, 3);

        $tm_all_earnings = $tm_all_approved_earnings + $tm_all_paid_earnings;
        $tm_all_epc_unrounded = $tm_all_earnings / $tm_all_traffic * 100;
        $tm_all_epc = round($tm_all_epc_unrounded, 4);

$c_sr_tm = $db->query($q_tm_sales_ratio_country)->fetchAll(PDO::FETCH_ASSOC);
$c_epc_tm = $db->query($q_tm_epc_country)->fetchAll(PDO::FETCH_ASSOC);

file_put_contents('0_c_sr_tm.txt', serialize($c_sr_tm));
file_put_contents('0_g_sr_tm.txt', serialize($tm_all_sales_ratio));

file_put_contents('0_c_epc_tm.txt', serialize($c_epc_tm));
file_put_contents('0_g_epc_tm.txt', serialize($tm_all_epc));

} else {

  $c_sr_tm = unserialize(file_get_contents('0_c_sr_tm.txt'));
  $tm_all_sales_ratio = unserialize(file_get_contents('0_g_sr_tm.txt'));

  $c_epc_tm = unserialize(file_get_contents('0_c_epc_tm.txt'));
  $tm_all_epc = unserialize(file_get_contents('0_g_epc_tm.txt'));

}
exit();
?>