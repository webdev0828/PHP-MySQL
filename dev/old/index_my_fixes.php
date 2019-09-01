<?php

$control_panel_session = true;
include_once 'includes/control_panel.php';
$temp_fields = 'index_heading_1,index_paragraph_1,index_heading_2,index_paragraph_2,index_heading_3,index_paragraph_3,' . "\r\n" . 'index_login_title,index_login_username,index_login_password,index_login_username_field,index_login_password_field,' . "\r\n" . 'index_login_button,index_login_signup_link,index_table_title';

try {
	$query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage = $query->fetch();
	$query->closeCursor();
}
catch (Exception $ex) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	exit();
}

$index_heading_1 = ($getlanguage['index_heading_1']);
$index_paragraph_1 = html_language_output($getlanguage['index_paragraph_1']);
$index_heading_2 = html_language_output($getlanguage['index_heading_2']);
$index_paragraph_2 = html_language_output($getlanguage['index_paragraph_2']);
$index_heading_3 = html_language_output($getlanguage['index_heading_3']);
$index_paragraph_3 = html_language_output($getlanguage['index_paragraph_3']);
$index_login_title = html_language_output($getlanguage['index_login_title']);
$index_login_username = html_language_output($getlanguage['index_login_username']);
$index_login_password = html_language_output($getlanguage['index_login_password']);
$index_login_username_field = html_language_output($getlanguage['index_login_username_field']);
$index_login_password_field = html_language_output($getlanguage['index_login_password_field']);
$index_login_button = html_language_output($getlanguage['index_login_button']);
$index_login_signup_link = html_language_output($getlanguage['index_login_signup_link']);
$index_table_title = html_language_output($getlanguage['index_table_title']);
$temp_fields = 'index_table_commission_type,index_table_initial_deposit,index_table_requirements,index_table_duration,' . "\r\n" . 'index_table_choose,index_table_deposit_tag,index_table_requirements_tag,index_table_duration_tag,logout_msg';

try {
	$query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage = $query->fetch();
	$query->closeCursor();
}
catch (Exception $ex) {
	echo $ex->getMessage();
	exit();
}

$index_table_commission_type = ($getlanguage['index_table_commission_type']);
$index_table_initial_deposit = html_language_output($getlanguage['index_table_initial_deposit']);
$index_table_requirements = html_language_output($getlanguage['index_table_requirements']);
$index_table_duration = html_language_output($getlanguage['index_table_duration']);
$index_table_choose = html_language_output($getlanguage['index_table_choose']);
$index_table_deposit_tag = html_language_output($getlanguage['index_table_deposit_tag']);
$index_table_requirements_tag = html_language_output($getlanguage['index_table_requirements_tag']);
$index_table_duration_tag = html_language_output($getlanguage['index_table_duration_tag']);
$logout_msg = html_language_output($getlanguage['logout_msg']);

if (isset($_REQUEST['logout'])) {
	$idev_language = $_SESSION['idev_language'];
	unset($_SESSION[$install_directory_name . '_idev_LoggedID']);
	session_destroy();
	$session = new session();
	$session->start_session('_s', false);
	$_SESSION['idev_language'] = $idev_language;

	if (is_object($helper)) {
		$fb_login_url = $helper->getLoginUrl(array('scope' => 'public_profile, email, publish_actions'));
	}
	else {
		$fb_login_url = '#';
	}

	$smarty->assign('logout_msg', $logout_msg);
	$smarty->clearAssign('affiliateUsername');
}

if (isset($_REQUEST['ref']) && (0 < $tier_numbers)) {
	$checkref = $db->prepare('select ta, ti from idevaff_tlog where ta = ? and ti = ?');
	$checkref->execute(array($_REQUEST['ref'], $ip_addr));

	if ($checkref->rowCount() == '0') {
		$statement = $db->prepare('insert into idevaff_tlog (ta, ti) values (?, ?)');
		$data = array($_REQUEST['ref'], $ip_addr);
		$statement->execute($data);
	}
}

$botlev1 = $db->query('select amt from idevaff_paylevels where level = \'1\' and type = \'1\'');
$res = $botlev1->fetch();
$bot1 = $res['amt'];
$bot1 = $bot1 * 100;
$botlev2 = $db->query('select amt from idevaff_paylevels where level = \'1\' and type = \'2\'');
$res = $botlev2->fetch();
$bot2 = number_format($res['amt'], $decimal_symbols);
$botlev3 = $db->query('select amt from idevaff_paylevels where level = \'1\' and type = \'3\'');
$res = $botlev3->fetch();
$bot3 = number_format($res['amt'], $decimal_symbols);

if ($paytype == 1) {
	$commission_type_info = '<font color=\'#CC0000\'>' . $index_table_choose . '</font>';
}
else {
	$checkdef = $db->query('select def_pay from idevaff_config');
	$result = $checkdef->fetch();
	$defres = $result['def_pay'];

	if ($defres == 1) {
		$commission_type_info = $index_table_sale . ' ' . $bot1 . '% ' . $index_table_sale_text;
	}

	if ($defres == 2) {
		if ($cur_sym_location == 1) {
			$pdis = $cur_sym . $bot2;
		}

		if ($cur_sym_location == 2) {
			$pdis = $bot2 . ' ' . $cur_sym;
		}

		$pdis = $pdis . ' ' . $currency;
		$commission_type_info = $index_table_sale . ' ' . $pdis . ' ' . $index_table_sale_text;
	}

	if ($defres == 3) {
		if ($cur_sym_location == 1) {
			$pdis = $cur_sym . $bot3;
		}

		if ($cur_sym_location == 2) {
			$pdis = $bot3 . ' ' . $cur_sym;
		}

		$pdis = $pdis . ' ' . $currency;
		$commission_type_info = $index_table_click . ' ' . $pdis . ' ' . $index_table_click_text;
	}
}

$smarty->assign('index_table_title', $index_table_title);

if ($paytype == 1) {
	if ($ap_1 == 1) {
		$smarty->assign('bot1', $bot1);
		$smarty->assign('choose_percentage_payout', 1);
	}

	if ($ap_2 == 1) {
		$smarty->assign('bot2', $bot2);
		$smarty->assign('choose_flatrate_payout', 1);
	}

	if ($ap_3 == 1) {
		$smarty->assign('bot3', $bot3);
		$smarty->assign('choose_perclick_payout', 1);
	}

	$smarty->assign('payout_add_small_row', 1);
}

if ($initialbalance != 0) {
	$init_deposit = number_format($initialbalance, $decimal_symbols);
	$smarty->assign('index_table_deposit_tag', $index_table_deposit_tag);
	$smarty->assign('index_table_initial_deposit', $index_table_initial_deposit);
	$smarty->assign('init_deposit', $init_deposit);
	$smarty->assign('add_balance_row', 1);
}

if ($balance != 0) {
	$init_req = number_format($balance, $decimal_symbols);
	$smarty->assign('index_table_requirements', $index_table_requirements);
	$smarty->assign('index_table_requirements_tag', $index_table_requirements_tag);
	$smarty->assign('init_req', $init_req);
	$smarty->assign('add_requirements_row', 1);
}

$smarty->assign('index_heading_1', $index_heading_1);
$smarty->assign('index_paragraph_1', $index_paragraph_1);
$smarty->assign('index_heading_2', $index_heading_2);
$smarty->assign('index_paragraph_2', $index_paragraph_2);
$smarty->assign('index_heading_3', $index_heading_3);
$smarty->assign('index_paragraph_3', $index_paragraph_3);
$smarty->assign('index_login_title', $index_login_title);
$smarty->assign('index_login_username', $index_login_username);
$smarty->assign('index_login_password', $index_login_password);
$smarty->assign('index_login_button', $index_login_button);
$smarty->assign('index_login_signup_link', $index_login_signup_link);
$smarty->assign('index_table_commission_type', $index_table_commission_type);
$smarty->assign('commission_type_info', $commission_type_info);
$smarty->assign('index_table_duration', $index_table_duration);
$smarty->assign('index_table_duration_tag', $index_table_duration_tag);

if ($details_show == 1) {
	$smarty->assign('details_show', $details_show);
}

if ($details_show_type == 1) {
	$smarty->assign('details_show_type', $details_show_type);
}

if ($details_show_signup == 1) {
	$smarty->assign('details_show_signup', $details_show_signup);
}

if ($details_show_requirements == 1) {
	$smarty->assign('details_show_requirements', $details_show_requirements);
}

if ($details_show_duration == 1) {
	$smarty->assign('details_show_duration', $details_show_duration);
}

include_once 'includes/tokens.php';
$smarty->assign('fb_login_url', $fb_login_url);
$monthly_commissions = array();
$i = 0;
$l = 6;

while (1 <= $l) {
	$commission = $db->query('SELECT COUNT(*) FROM idevaff_archive WHERE bonus = \'0\' AND DATE_FORMAT(FROM_UNIXTIME(code), \'%m\') = ' . date('m', strtotime('-' . $l . ' month')));
	$monthly_commissions[$i++] = array('name' => date('M', strtotime('-' . $l . ' month')), 'commissions' => $commission->fetchColumn());
	--$l;
}

$smarty->assign('monthly_commissions', $monthly_commissions);
$start_date = strtotime(date('m/d/Y 00:00:00', strtotime('first day of this month')));
$end_date = strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month')));
$top_affiliates = '';
$affiliates = $db->prepare('SELECT id, SUM(payment) AS total_count FROM ((SELECT id, payment FROM idevaff_sales where approved = 1 and code >= ? and code <= ?) UNION ALL (SELECT id, payment FROM idevaff_archive where code >= ? and code <= ?)) as x GROUP BY id ORDER BY total_count DESC LIMIT 5');
$affiliates->execute(array($start_date, $end_date, $start_date, $end_date));

while ($rs = $affiliates->fetch()) {
	$get_username = $db->prepare('select username from idevaff_affiliates where id = ?');
	$get_username->execute(array($rs['id']));
	$get_username = $get_username->fetch();
	$username = $get_username['username'];
	$listpay = number_format($rs['total_count'], $decimal_symbols);

	if ($cur_sym_location == 1) {
		$listpay = $cur_sym . $listpay;
	}

	if ($cur_sym_location == 2) {
		$listpay = $listpay . ' ' . $cur_sym;
	}

	$listpay = $listpay . ' ' . $currency;
	$username = str_replace('"', '\\"', $username);
	$top_affiliates .= '{label: "' . $username . '", value: "100", formatted: "' . $listpay . '"}, ';
}

if ($top_affiliates == '') {
}

$smarty->assign('top_affiliates', $top_affiliates);

if ($seal == '1') {
	$smarty->assign('show_seal', 1);
}
// set dates for last 6 month start and end
$start_date_l6m = strtotime(date('F 1, Y 00:00:00', strtotime('-6 months')));
$end_date_l6m = strtotime(date('m/d/Y 23:59:59', strtotime('last day of this month')));

// global convert ratio start

// last 6 months
    $q_unique_visits_all = "select COUNT(DISTINCT(ip)) from idevaff_iptracking where stamp between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_approved = "select COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";
    $q_paid = "select COUNT(*) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "'";

// this month
    $tm_q_unique_visits_all = "select COUNT(DISTINCT(ip)) from idevaff_iptracking where stamp between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_approved = "select COUNT(*) from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";
    $tm_q_paid = "select COUNT(*) from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "'";

// global convert ratio end
// TODO: top converting geos doe snot update
//per geo start
//last 6 months queries per geo start

	$q_unique_visits_country = "select COUNT(distinct(ip)) v, geo n from idevaff_iptracking where stamp between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";
    $q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";
    $q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where top_tier_tag=0 and code between '" . $start_date_l6m . "'  and '" . $end_date_l6m . "' group by n order by v desc";

//last 6 months queries per geo end

//this month queries per geo start

	$tm_q_unique_visits_country = "select COUNT(distinct(ip)) v, geo n from idevaff_iptracking where stamp between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";
    $tm_q_approved_country = "select COUNT(*) v, geo n from idevaff_sales where approved=1 and top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";
    $tm_q_paid_country = "select COUNT(*) v, geo n from idevaff_archive where top_tier_tag=0 and code between '" . $start_date . "'  and '" . $end_date . "' group by n order by v desc";

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
    foreach ($db->query($tm_q_paid_country) as $tm_row) {
        array_push($tm_transactions_country, [
            "n" => $tm_row["n"],
            "v" => $tm_row["v"]
        ]);
    }
    foreach ($db->query($tm_q_approved_country) as $tm_row) {

        if(array_search($index = $tm_row["n"], $tm_transactions_country))
        {
            $tm_transactions_country[$index]["v"] = $tm_row["v"];
        }else{
            array_push($tm_transactions_country, [
                "n" => $tm_row["n"],
                "v" => $tm_row["v"]
            ]);
        }
    }

    $tm_sales_ratio_country = [];
    foreach ($db->query($tm_q_unique_visits_country) as $tm_row) {
        foreach ($tm_transactions_country as $tm_row_) {
            if ($tm_row["n"] === $tm_row_["n"]) {
                // If unique traffic 0
                if ($tm_row["v"] == 0) {
                    array_push($tm_sales_ratio_country, [
                        "n" => $tm_row["n"],
                        "v" => 0
                    ]);
                } else {
                    $tm_sales_ratio = $tm_row_["v"] / $tm_row["v"] * 100;
                    array_push($tm_sales_ratio_country, [
                        "n" => $tm_row["n"],
                        "v" => round($tm_sales_ratio, 3)
                    ]);
                }
                break;
            }
        }
    }

    $temp_table = "CREATE TEMPORARY TABLE tmp_top_converting (n varchar(20), v float)";
    $db->query($temp_table);

    foreach ($sales_ratio_country as $r)
	{
        $q_general = "INSERT INTO tmp_top_converting VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($q_general);
	}

    $temp_table = "CREATE TEMPORARY TABLE tmp_tm_top_converting (n varchar(20), v float)";
    $db->query($temp_table);

    foreach ($tm_sales_ratio_country as $r)
    {
        $q_general = "INSERT INTO tmp_tm_top_converting VALUES('" . $r["n"] . "'," . $r["v"] . ")";
        $db->query($q_general);
    }

    $q_sales_ratio_country = "SELECT * FROM tmp_top_converting ORDER BY v DESC LIMIT 9";
    $q_tm_sales_ratio_country = "SELECT * FROM tmp_tm_top_converting ORDER BY v DESC LIMIT 9";

 
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

        $all_sales = $all_approved_sales + $all_paid_sales;
        $all_sales_ratio_unroundded = $all_sales / $all_traffic * 100;
        $all_sales_ratio = round($all_sales_ratio_unroundded, 3);

    $tm_table_unique_traffic = $db->prepare($tm_q_unique_visits_all);
    $tm_table_unique_traffic->execute();
    $tm_all_traffic = $tm_table_unique_traffic->fetchColumn();
    
    $tm_table_approved_sales = $db->prepare($tm_q_approved);
    $tm_table_approved_sales->execute();
    $tm_all_approved_sales = $tm_table_approved_sales->fetchColumn();

    $tm_table_paid_sales = $db->prepare($tm_q_paid);
    $tm_table_paid_sales->execute();
    $tm_all_paid_sales = $tm_table_paid_sales->fetchColumn();

        $tm_all_sales = $tm_all_approved_sales + $tm_all_paid_sales;
        $tm_all_sales_ratio_unroundded = $tm_all_sales / $tm_all_traffic * 100;
        $tm_all_sales_ratio = round($tm_all_sales_ratio_unroundded, 3);

$smarty->assign('total_sr', $all_sales_ratio); // last 6 months average sales ratio
$smarty->assign('total_sr_tm', $tm_all_sales_ratio); // this month average sales ratio
$smarty->assign('top_converting',$db->query($q_sales_ratio_country)->fetchAll(PDO::FETCH_ASSOC));
$smarty->assign('tm_top_converting',$db->query($q_tm_sales_ratio_country)->fetchAll(PDO::FETCH_ASSOC));
$smarty->display('index.tpl');

?>
