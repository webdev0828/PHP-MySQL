<?php

$control_panel_session = true;
include_once 'includes/control_panel.php';
include_once 'includes/tokens.php';

$start_date = strtotime(date('m/d/Y 00:00:00', strtotime('first day of this month')));
$end_date = strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month')));

// set dates for last 6 month start and end
$start_date_l6m = strtotime(date('F 1, Y 00:00:00', strtotime('-6 months')));
$end_date_l6m = strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month')));

if (filemtime('0_c_sr_l6m.txt') < time()-1*300) {

// global convert ratio start

// last 6 months
    $q_unique_visits_all = "select COUNT(DISTINCT(ip)) from idevaff_iptracking where stamp between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_approved = "select COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_paid = "select COUNT(*) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";

    $q_earnings = "select COALESCE(SUM(payment),0) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_paid_earnings = "select COALESCE(SUM(payment),0) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";

// this month
    $tm_q_unique_visits_all = "select COUNT(DISTINCT(ip)) from idevaff_iptracking where stamp between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_approved = "select COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_paid = "select COUNT(*) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";

    $tm_q_earnings = "select COALESCE(SUM(payment),0) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_paid_earnings = "select COALESCE(SUM(payment),0) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";

// global convert ratio end

//per geo start
//last 6 months queries per geo start

    $q_unique_visits_country = "select COUNT(DISTINCT(ip)) v, geo n from idevaff_iptracking where stamp between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";
    $q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";
    $q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";

    $q_earnings_country = "select COALESCE(SUM(payment),0) v, geo n from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by geo order by v desc";
    $q_paid_earnings_country = "select COALESCE(SUM(payment),0) v, geo n from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by geo order by v desc";
//last 6 months queries per geo end

//this month queries per geo start

    $tm_q_unique_visits_country = "select COUNT(DISTINCT(ip)) v, geo n from idevaff_iptracking where stamp between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";
    $tm_q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";
    $tm_q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";

    $tm_q_earnings_country = "select COALESCE(SUM(payment),0) v, geo n from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by geo order by v desc";
    $tm_q_paid_earnings_country = "select COALESCE(SUM(payment),0) v, geo n from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by geo order by v desc";
//this month queries per geo end

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
    foreach ($db->query($q_unique_visits_country) as $row) {
        foreach ($transactions_country as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
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
    foreach ($db->query($tm_q_unique_visits_country) as $row) {
        foreach ($tm_transactions_country as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
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

    $rpm_country = [];
    foreach ($earnings_country as $row) {
        foreach ($db->query($q_unique_visits_country) as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row_["v"] == 0) {
                    array_push($rpm_country, [
                        "n" => $row["n"],
                        "v" => 0
                    ]);
                } else {
                    $rpm = $row["v"] / $row_["v"] * 1000;
                    array_push($rpm_country, [
                        "n" => $row["n"],
                        "v" => round($rpm, 2)
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

    $tm_rpm_country = [];
    foreach ($tm_earnings_country as $row) {
        foreach ($db->query($tm_q_unique_visits_country) as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row_["v"] == 0) {
                    array_push($tm_rpm_country, [
                        "n" => $row["n"],
                        "v" => 0
                    ]);
                } else {
                    $tm_rpm = $row["v"] / $row_["v"] * 1000;
                    array_push($tm_rpm_country, [
                        "n" => $row["n"],
                        "v" => round($tm_rpm, 2)
                    ]);
                }
                break;
            }
        }
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_top_converting (n varchar(2), v float)";
    $db->query($temp_table);

    foreach ($sales_ratio_country as $r)
    {
        $q_general = "INSERT INTO tmp_top_converting VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($q_general);
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_tm_top_converting (n varchar(2), v float)";
    $db->query($temp_table);

    foreach ($tm_sales_ratio_country as $r)
    {
        $tm_q_general = "INSERT INTO tmp_tm_top_converting VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($tm_q_general);
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_top_earning (n varchar(2), v float)";
    $db->query($temp_table);

    foreach ($rpm_country as $r)
    {
        $q_general = "INSERT INTO tmp_top_earning VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($q_general);
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_tm_top_earning (n varchar(2), v float)";
    $db->query($temp_table);

    foreach ($tm_rpm_country as $r)
    {
        $tm_q_general = "INSERT INTO tmp_tm_top_earning VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($tm_q_general);
    }

    $q_sales_ratio_country = "SELECT * FROM tmp_top_converting GROUP BY n ORDER BY v DESC LIMIT 9";
    $q_tm_sales_ratio_country = "SELECT * FROM tmp_tm_top_converting GROUP BY n ORDER BY v DESC LIMIT 9";

    $q_rpm_country = "SELECT * FROM tmp_top_earning  GROUP BY n ORDER BY v DESC LIMIT 9";
    $q_tm_rpm_country = "SELECT * FROM tmp_tm_top_earning  GROUP BY n ORDER BY v DESC LIMIT 9";

 
// per geo end

// global exec last 6 months and this month

    $table_unique_traffic = $db->prepare($q_unique_visits_all);
    $table_unique_traffic->execute();
    $all_traffic = $table_unique_traffic->fetchColumn();
    
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
        $all_rpm_unrounded = $all_earnings / $all_traffic * 1000;
        $all_rpm = round($all_rpm_unrounded, 2);

    $tm_table_unique_traffic = $db->prepare($tm_q_unique_visits_all);
    $tm_table_unique_traffic->execute();
    $tm_all_traffic = $tm_table_unique_traffic->fetchColumn();
    
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
        $tm_all_rpm_unrounded = $tm_all_earnings / $tm_all_traffic * 1000;
        $tm_all_rpm = round($tm_all_rpm_unrounded, 2);

$c_sr_l6m = $db->query($q_sales_ratio_country)->fetchAll(PDO::FETCH_ASSOC);
$c_sr_tm = $db->query($q_tm_sales_ratio_country)->fetchAll(PDO::FETCH_ASSOC);

$c_rpm_l6m = $db->query($q_rpm_country)->fetchAll(PDO::FETCH_ASSOC);
$c_rpm_tm = $db->query($q_tm_rpm_country)->fetchAll(PDO::FETCH_ASSOC);
/*
$newarray         = array();
$indexedArray     = array();
foreach ($c_rpm_tm as $miniarray) {
    $newarray[$miniarray['n']]['v'] += $miniarray['v'];
    $newarray[$miniarray['n']]['n'] = $miniarray['n'];
}
foreach ($newarray as $values) {
    $indexedArray[] = $values;
}
$newarray2         = array();
$indexedArray2     = array();
foreach ($c_rpm_l6m as $miniarray) {
    $newarray2[$miniarray['n']]['v'] += $miniarray['v'];
    $newarray2[$miniarray['n']]['n'] = $miniarray['n'];
}
foreach ($newarray2 as $values) {
    $indexedArray2[] = $values;
}

$v = array();
foreach ($indexedArray as $key => $row)
{
    $v[$key] = $row['v'];
}
array_multisort($v, SORT_DESC, $indexedArray);

$v = array();
foreach ($indexedArray2 as $key => $row)
{
    $v[$key] = $row['v'];
}
array_multisort($v, SORT_DESC, $indexedArray2);
*/
file_put_contents('0_c_sr_l6m.txt', serialize($c_sr_l6m));
file_put_contents('0_c_sr_tm.txt', serialize($c_sr_tm));
file_put_contents('0_g_sr_l6m.txt', serialize($all_sales_ratio));
file_put_contents('0_g_sr_tm.txt', serialize($tm_all_sales_ratio));
/*
file_put_contents('0_c_rpm_l6m.txt', serialize($indexedArray2));
file_put_contents('0_c_rpm_tm.txt', serialize($indexedArray));
*/
file_put_contents('0_c_rpm_l6m.txt', serialize($c_rpm_l6m));
file_put_contents('0_c_rpm_tm.txt', serialize($c_rpm_tm));
file_put_contents('0_g_rpm_l6m.txt', serialize($all_rpm));
file_put_contents('0_g_rpm_tm.txt', serialize($tm_all_rpm));

} else {

  $c_sr_l6m = unserialize(file_get_contents('0_c_sr_l6m.txt'));
  $c_sr_tm = unserialize(file_get_contents('0_c_sr_tm.txt'));
  $all_sales_ratio = unserialize(file_get_contents('0_g_sr_l6m.txt'));
  $tm_all_sales_ratio = unserialize(file_get_contents('0_g_sr_tm.txt'));

  $c_rpm_l6m = unserialize(file_get_contents('0_c_rpm_l6m.txt'));
  $c_rpm_tm = unserialize(file_get_contents('0_c_rpm_tm.txt'));
  $all_rpm = unserialize(file_get_contents('0_g_rpm_l6m.txt'));
  $tm_all_rpm = unserialize(file_get_contents('0_g_rpm_tm.txt'));

}

?>