<?php
define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;
include_once("../../API/config.php");

$linkid = 106;/*$_SESSION[$install_directory_name . '_idev_LoggedID'];*/
/*$linkid = $_SESSION[$install_directory_name . '_idev_LoggedID'];*/


$startD = $_GET["startD"];
$endD = $_GET["endD"];
$info = $_GET["info"];

function detailsByDateRange($startD, $endD, $db, $id, $info)
{
    $date_where = "between '" . strtotime($startD . ' 00:00:00') . "' and '" . strtotime($endD . ' 23:59:59') . "'";
    $q_raw_visits_country = "select COUNT(*) v,geo n from idevaff_iptracking where acct_id = $id and stamp " . $date_where . " group by geo order by v desc";


    $q_raw_visits_tid1 = "select COUNT(*) v,tid1 n from idevaff_iptracking where acct_id = $id and tid1 IS NOT NULL AND tid1 <> ''  and stamp " . $date_where . " group by tid1  order by v desc";
    $q_raw_visits_tid2 = "select COUNT(*) v,tid2 n from idevaff_iptracking where acct_id = $id and tid2 IS NOT NULL AND tid2 <> '' and stamp " . $date_where . " group by tid2  order by v desc";
    $q_raw_visits_tid3 = "select COUNT(*) v,tid3 n from idevaff_iptracking where acct_id = $id and tid3 IS NOT NULL AND tid3 <> '' and stamp " . $date_where . " group by tid3  order by v desc";
    $q_raw_visits_tid4 = "select COUNT(*) v,tid4 n from idevaff_iptracking where acct_id = $id and tid4 IS NOT NULL AND tid4 <> '' and stamp " . $date_where . " group by tid4  order by v desc";

    $q_raw_visits_tid_combinations = "select COUNT(*) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_iptracking where acct_id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and stamp " . $date_where . " group by n  order by v desc";

    $q_unique_visits_country = "select COUNT(distinct(ip)) v,geo n from idevaff_iptracking where acct_id = $id  and stamp " . $date_where . " group by geo  order by v desc";
    $q_unique_visits_tid1 = "select COUNT(distinct(ip)) v,tid1 n from idevaff_iptracking where acct_id = $id and tid1 IS NOT NULL AND tid1 <> '' and stamp " . $date_where . " group by tid1  order by v desc";
    $q_unique_visits_tid2 = "select COUNT(distinct(ip)) v,tid2 n from idevaff_iptracking where acct_id = $id and tid2 IS NOT NULL AND tid2 <> '' and stamp " . $date_where . " group by tid2  order by v desc";
    $q_unique_visits_tid3 = "select COUNT(distinct(ip)) v,tid3 n from idevaff_iptracking where acct_id = $id and tid3 IS NOT NULL AND tid3 <> '' and stamp " . $date_where . " group by tid3  order by v desc";
    $q_unique_visits_tid4 = "select COUNT(distinct(ip)) v,tid4 n from idevaff_iptracking where acct_id = $id and tid4 IS NOT NULL AND tid4 <> '' and stamp " . $date_where . " group by tid4  order by v desc";

    $q_unique_visits_tid_combinations = "select COUNT(distinct(ip)) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_iptracking where acct_id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and stamp " . $date_where . " group by n  order by v desc";


    $q_earnings_country = "select COALESCE(SUM(payment),0)v,geo n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and code " . $date_where . " group by geo  order by v desc";
    $q_earnings_tid1 = "select COALESCE(SUM(payment),0)v,tid1 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid1 IS NOT NULL AND tid1 <> '' and code " . $date_where . " group by tid1  order by v desc";
    $q_earnings_tid2 = "select COALESCE(SUM(payment),0)v,tid2 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid2 IS NOT NULL AND tid2 <> '' and code " . $date_where . " group by tid2  order by v desc";
    $q_earnings_tid3 = "select COALESCE(SUM(payment),0)v,tid3 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid3 IS NOT NULL AND tid3 <> '' and code " . $date_where . " group by tid3  order by v desc";
    $q_earnings_tid4 = "select COALESCE(SUM(payment),0)v,tid4 n from idevaff_sales where id = $id and approved=1 and top_tier_tag=0 and tid4 IS NOT NULL AND tid4 <> '' and code " . $date_where . " group by tid4  order by v desc";

    $q_earnings_tid_combinations = "select COALESCE(SUM(payment),0)v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_sales where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and approved=1 and top_tier_tag=0 and code " . $date_where . " group by n  order by v desc";

    $q_paid_earnings_country = "select COALESCE(SUM(payment),0)v,geo n from idevaff_archive where id = $id and top_tier_tag=0 and code " . $date_where . " group by geo  order by v desc";
    $q_paid_earnings_tid1 = "select COALESCE(SUM(payment),0)v,tid1 n from idevaff_archive where id = $id and top_tier_tag=0 and tid1 IS NOT NULL AND tid1 <> '' and code " . $date_where . " group by tid1  order by v desc";
    $q_paid_earnings_tid2 = "select COALESCE(SUM(payment),0)v,tid2 n from idevaff_archive where id = $id and top_tier_tag=0 and tid2 IS NOT NULL AND tid2 <> '' and code " . $date_where . " group by tid2  order by v desc";
    $q_paid_earnings_tid3 = "select COALESCE(SUM(payment),0)v,tid3 n from idevaff_archive where id = $id and top_tier_tag=0 and tid3 IS NOT NULL AND tid3 <> '' and code " . $date_where . " group by tid3  order by v desc";
    $q_paid_earnings_tid4 = "select COALESCE(SUM(payment),0)v,tid4 n from idevaff_archive where id = $id and top_tier_tag=0 and tid4 IS NOT NULL AND tid4 <> '' and code " . $date_where . " group by tid4  order by v desc";

    $q_paid_earnings_tid_combinations = "select COALESCE(SUM(payment),0)v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_archive where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and top_tier_tag=0 and code " . $date_where . " group by n  order by v desc";

    $q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and id = $id and top_tier_tag=0 and code " . $date_where . " group by geo";
    $q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where id = $id and top_tier_tag=0 and code " . $date_where . " group by geo";
    $q_approved_tid1 = "select COUNT(*) v, tid1 n from idevaff_sales where approved=1 and id = $id and tid1 IS NOT NULL AND tid1 <> ''  and top_tier_tag=0 and code " . $date_where . " group by tid1";
    $q_paid_tid1 = "select COUNT(*) v, tid1 n from idevaff_archive where id = $id and top_tier_tag=0  and tid1 IS NOT NULL AND tid1 <> '' and code " . $date_where . " group by tid1";
    $q_approved_tid2 = "select COUNT(*) v, tid2 n from idevaff_sales where approved=1 and id = $id  and tid2 IS NOT NULL AND tid2 <> '' and top_tier_tag=0 and code " . $date_where . " group by tid2";
    $q_paid_tid2 = "select COUNT(*) v, tid2 n from idevaff_archive where id = $id and top_tier_tag=0  and tid2 IS NOT NULL AND tid2 <> '' and code " . $date_where . " group by tid2";
    $q_approved_tid3 = "select COUNT(*) v, tid3 n from idevaff_sales where approved=1 and id = $id  and tid3 IS NOT NULL AND tid3 <> '' and top_tier_tag=0 and code " . $date_where . " group by tid3";
    $q_paid_tid3 = "select COUNT(*) v, tid3 n from idevaff_archive where id = $id and top_tier_tag=0  and tid3 IS NOT NULL AND tid3 <> '' and code " . $date_where . " group by tid3";
    $q_approved_tid4 = "select COUNT(*) v, tid4 n from idevaff_sales where approved=1 and id = $id  and tid4 IS NOT NULL AND tid4 <> '' and top_tier_tag=0 and code " . $date_where . " group by tid4";
    $q_paid_tid4 = "select COUNT(*) v, tid4 n from idevaff_archive where id = $id and top_tier_tag=0  and tid4 IS NOT NULL AND tid4 <> '' and code " . $date_where . " group by tid4";

    $q_approved_tid_combinations = "select count(*) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_sales where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and approved=1 and top_tier_tag=0 and code " . $date_where . " group by n  order by v desc";

    $q_paid_tid_combinations = "select count(*) v,CONCAT(tid1,' ',tid2, ' ',tid3, ' ',tid4) n from idevaff_archive where id = $id and CONCAT(tid1,tid2,tid3,tid4) IS NOT NULL AND CONCAT(tid1,tid2,tid3,tid4) <>'' and top_tier_tag=0 and code " . $date_where . " group by n  order by v desc";

    $transactions_country = [];
    foreach ($db->query($q_paid_country) as $row) {
        array_push($transactions_country, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_approved_country) as $row) {

        if (array_search($index = $row["n"], $transactions_country)) {
            $transactions_country[$index]["v"] = $row["v"];
        } else {
            array_push($transactions_country, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $transactions_tid1 = [];
    foreach ($db->query($q_paid_tid1) as $row) {
        array_push($transactions_tid1, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_approved_tid1) as $row) {

        if (array_search($index = $row["n"], $transactions_tid1)) {
            $transactions_tid1[$index]["v"] = $row["v"];
        } else {
            array_push($transactions_tid1, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $transactions_tid2 = [];
    foreach ($db->query($q_paid_tid2) as $row) {
        array_push($transactions_tid2, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_approved_tid2) as $row) {

        if (array_search($index = $row["n"], $transactions_tid2)) {
            $transactions_tid2[$index]["v"] = $row["v"];
        } else {
            array_push($transactions_tid2, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $transactions_tid3 = [];
    foreach ($db->query($q_paid_tid3) as $row) {
        array_push($transactions_tid3, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_approved_tid3) as $row) {

        if (array_search($index = $row["n"], $transactions_tid3)) {
            $transactions_tid3[$index]["v"] = $row["v"];
        } else {
            array_push($transactions_tid3, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $transactions_tid4 = [];
    foreach ($db->query($q_paid_tid4) as $row) {
        array_push($transactions_tid4, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_approved_tid4) as $row) {

        if (array_search($index = $row["n"], $transactions_tid4)) {
            $transactions_tid4[$index]["v"] = $row["v"];
        } else {
            array_push($transactions_tid4, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $transactions_combinations = [];
    foreach ($db->query($q_approved_tid_combinations) as $row) {

        array_push($transactions_combinations, [
            "n" => $row["n"],
            "v" => $row["v"]
        ]);
    }
    foreach ($db->query($q_paid_tid_combinations) as $row) {
        if ($index = array_search($row["n"], array_column($transactions_combinations, 'n'))) {
            $transactions_combinations[$index]["v"] = $row["v"];
        } else {
            array_push($transactions_combinations, [
                "n" => $row["n"],
                "v" => $row["v"]
            ]);
        }
    }

    $unique_visits_country = $db->query($q_unique_visits_country)->fetchAll(PDO::FETCH_ASSOC);
    $unique_visits_tid1 = $db->query($q_unique_visits_tid1)->fetchAll(PDO::FETCH_ASSOC);
    $unique_visits_tid2 = $db->query($q_unique_visits_tid2)->fetchAll(PDO::FETCH_ASSOC);
    $unique_visits_tid3 = $db->query($q_unique_visits_tid3)->fetchAll(PDO::FETCH_ASSOC);
    $unique_visits_tid4 = $db->query($q_unique_visits_tid4)->fetchAll(PDO::FETCH_ASSOC);
    $unique_visits_combinations = $db->query($q_unique_visits_tid_combinations)->fetchAll(PDO::FETCH_ASSOC);

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

    $sales_ratio_tid1 = [];
    foreach ($unique_visits_tid1 as $row) {
        foreach ($transactions_tid1 as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_tid1, [
                        "n" => $row["n"],
                        "v" => 0 . "%"
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_tid1, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3) . "%"
                    ]);
                }
                break;
            }
        }
    }

    $sales_ratio_tid2 = [];
    foreach ($unique_visits_tid2 as $row) {
        foreach ($transactions_tid2 as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_tid2, [
                        "n" => $row["n"],
                        "v" => 0 . "%"
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_tid2, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3) . "%"
                    ]);
                }
                break;
            }
        }
    }

    $sales_ratio_tid3 = [];
    foreach ($unique_visits_tid3 as $row) {
        foreach ($transactions_tid3 as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_tid3, [
                        "n" => $row["n"],
                        "v" => 0 . "%"
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_tid3, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3) . "%"
                    ]);
                }
                break;
            }
        }
    }

    $sales_ratio_tid4 = [];
    foreach ($unique_visits_tid4 as $row) {
        foreach ($transactions_tid4 as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_tid4, [
                        "n" => $row["n"],
                        "v" => 0 . "%"
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_tid4, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3) . "%"
                    ]);
                }
                break;
            }
        }
    }

    $sales_ratio_combinations = [];
    foreach ($unique_visits_combinations as $row) {
        foreach ($transactions_combinations as $row_) {
            if ($row["n"] === $row_["n"]) {
                // If unique traffic 0
                if ($row["v"] == 0) {
                    array_push($sales_ratio_combinations, [
                        "n" => $row["n"],
                        "v" => 0 . "%"
                    ]);
                } else {
                    $sales_ratio = $row_["v"] / $row["v"] * 100;
                    array_push($sales_ratio_combinations, [
                        "n" => $row["n"],
                        "v" => round($sales_ratio, 3) . "%"
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
            "v" => $row["v"] . "€"
        ]);
    }
    foreach ($db->query($q_paid_earnings_country) as $row) {
        if ($index = array_search($row["n"], array_column($earnings_country, 'n'))) {
            $earnings_country[$index]["v"] = $row["v"];
        } else {
            array_push($earnings_country, [
                "n" => $row["n"],
                "v" => $row["v"] . "€"
            ]);
        }
    }

    $earnings_tid1 = [];
    foreach ($db->query($q_earnings_tid1) as $row) {
        array_push($earnings_tid1, [
            "n" => $row["n"],
            "v" => $row["v"] . "€"
        ]);
    }
    foreach ($db->query($q_paid_earnings_tid1) as $row) {
        if ($index = array_search($row["n"], array_column($earnings_tid1, 'n'))) {
            $earnings_tid1[$index]["v"] = $row["v"];
        } else {
            array_push($earnings_tid1, [
                "n" => $row["n"],
                "v" => $row["v"] . "€"
            ]);
        }
    }

    $earnings_tid2 = [];
    foreach ($db->query($q_earnings_tid2) as $row) {
        array_push($earnings_tid2, [
            "n" => $row["n"],
            "v" => $row["v"] . "€"
        ]);
    }
    foreach ($db->query($q_paid_earnings_tid2) as $row) {
        if ($index = array_search($row["n"], array_column($earnings_tid2, 'n'))) {
            $earnings_tid2[$index]["v"] = $row["v"];
        } else {
            array_push($earnings_tid2, [
                "n" => $row["n"],
                "v" => $row["v"] . "€"
            ]);
        }
    }

    $earnings_tid3 = [];
    foreach ($db->query($q_earnings_tid3) as $row) {
        array_push($earnings_tid3, [
            "n" => $row["n"],
            "v" => $row["v"] . "€"
        ]);
    }
    foreach ($db->query($q_paid_earnings_tid3) as $row) {
        if ($index = array_search($row["n"], array_column($earnings_tid3, 'n'))) {
            $earnings_tid3[$index]["v"] = $row["v"];
        } else {
            array_push($earnings_tid3, [
                "n" => $row["n"],
                "v" => $row["v"] . "€"
            ]);
        }
    }

    $earnings_tid4 = [];
    foreach ($db->query($q_earnings_tid4) as $row) {
        array_push($earnings_tid4, [
            "n" => $row["n"],
            "v" => $row["v"] . "€"
        ]);
    }
    foreach ($db->query($q_paid_earnings_tid4) as $row) {
        if ($index = array_search($row["n"], array_column($earnings_tid4, 'n'))) {
            $earnings_tid4[$index]["v"] = $row["v"];
        } else {
            array_push($earnings_tid4, [
                "n" => $row["n"],
                "v" => $row["v"] . "€"
            ]);
        }
    }

    $earnings_combinations = [];
    foreach ($db->query($q_earnings_tid_combinations) as $row) {

        array_push($earnings_combinations, [
            "n" => $row["n"],
            "v" => $row["v"] . "€"
        ]);
    }
    foreach ($db->query($q_paid_earnings_tid_combinations) as $row) {
        if ($index = array_search($row["n"], array_column($earnings_combinations, 'n'))) {
            $earnings_combinations[$index]["n"] = $row["v"];
        } else {
            array_push($earnings_combinations, [
                "n" => $row["n"],
                "v" => $row["v"] . "€"
            ]);
        }
    }

    return [
        "raw_visits_detail" => [
            "country" => $db->query($q_raw_visits_country)->fetchAll(PDO::FETCH_ASSOC),
            "tid1" => $db->query($q_raw_visits_tid1)->fetchAll(PDO::FETCH_ASSOC),
            "tid2" => $db->query($q_raw_visits_tid2)->fetchAll(PDO::FETCH_ASSOC),
            "tid3" => $db->query($q_raw_visits_tid3)->fetchAll(PDO::FETCH_ASSOC),
            "tid4" => $db->query($q_raw_visits_tid4)->fetchAll(PDO::FETCH_ASSOC),
            "combinations" => $db->query($q_raw_visits_tid_combinations)->fetchAll(PDO::FETCH_ASSOC)
        ],
        "unique_visits_detail" => [
            "country" => $unique_visits_country,
            "tid1" => $unique_visits_tid1,
            "tid2" => $unique_visits_tid2,
            "tid3" => $unique_visits_tid3,
            "tid4" => $unique_visits_tid4,
            "combinations" => $db->query($q_unique_visits_tid_combinations)->fetchAll(PDO::FETCH_ASSOC)
        ],
        "transactions_detail" => [
            "country" => $transactions_country,
            "tid1" => $transactions_tid1,
            "tid2" => $transactions_tid2,
            "tid3" => $transactions_tid3,
            "tid4" => $transactions_tid4,
            "combinations" => $transactions_combinations
        ],
        "sales_ratio_detail" => [
            "country" => $sales_ratio_country,
            "tid1" => $sales_ratio_tid1,
            "tid2" => $sales_ratio_tid2,
            "tid3" => $sales_ratio_tid3,
            "tid4" => $sales_ratio_tid4,
            "combinations" => $sales_ratio_combinations
        ],
        "earnings_detail" => [
            "country" => $earnings_country,
            "tid1" => $earnings_tid1,
            "tid2" => $earnings_tid2,
            "tid3" => $earnings_tid3,
            "tid4" => $earnings_tid4,
            "combinations" => $earnings_combinations
        ]
    ];
}

try{
    $data = [];
    $t = detailsByDateRange($data["date_"], $data["date_"], $db, $linkid, $info);
    /*$data["raw_visits_details"] = $t["raw_visits_detail"];
    $data["unique_visits_details"] = $t["unique_visits_detail"];
    $data["transactions_details"] = $t["transactions_detail"];
    $data["sales_ratio_details"] = $t["sales_ratio_detail"];
    $data["earnings_details"] = $t["earnings_detail"];
    $data["paid_earnings_details"] = $t["paid_earnings_detail"];*/

    echo json_encode($t);
    return;
}catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}