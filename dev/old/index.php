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
$affiliates = $db->prepare('SELECT id, SUM(payment) AS total_count FROM ((SELECT id, payment FROM idevaff_sales where approved = 1 and code >= ? and code <= ?) UNION ALL (SELECT id, payment FROM idevaff_archive where code >= ? and code <= ?)) as x GROUP BY id ORDER BY total_count DESC LIMIT 9');
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

$d_start_date = strtotime(date('m/d/Y 00:00:00'));
$d_end_date = strtotime(date('m/d/Y 23:59:59'));
$d_top_affiliates = '';
$d_affiliates = $db->prepare('SELECT id, SUM(payment) AS total_count FROM ((SELECT id, payment FROM idevaff_sales where approved = 1 and code >= ? and code <= ?) UNION ALL (SELECT id, payment FROM idevaff_archive where code >= ? and code <= ?)) as x GROUP BY id ORDER BY total_count DESC LIMIT 9');
$d_affiliates->execute(array($d_start_date, $d_end_date, $d_start_date, $d_end_date));

while ($d_rs = $d_affiliates->fetch()) {
	$d_get_username = $db->prepare('select username from idevaff_affiliates where id = ?');
	$d_get_username->execute(array($d_rs['id']));
	$d_get_username = $d_get_username->fetch();
	$d_username = $d_get_username['username'];
	$listpay = number_format($d_rs['total_count'], $decimal_symbols);

	if ($d_cur_sym_location == 1) {
		$listpay = $cur_sym . $listpay;
	}

	if ($cur_sym_location == 2) {
		$listpay = $listpay . ' ' . $cur_sym;
	}

	$listpay = $listpay . ' ' . $currency;
	$d_username = str_replace('"', '\\"', $d_username);
	$d_top_affiliates .= '{label: "' . $d_username . '", value: "100", formatted: "' . $listpay . '"}, ';
}

if ($d_top_affiliates == '') {
}

$smarty->assign('top_affiliates', $top_affiliates);
$smarty->assign('d_top_affiliates', $d_top_affiliates);

if ($seal == '1') {
	$smarty->assign('show_seal', 1);
}

  $c_sr_l6m = unserialize(file_get_contents('0_c_sr_l6m.txt'));
  $c_sr_tm = unserialize(file_get_contents('0_c_sr_tm.txt'));
  $all_sales_ratio = unserialize(file_get_contents('0_g_sr_l6m.txt'));
  $tm_all_sales_ratio = unserialize(file_get_contents('0_g_sr_tm.txt'));

  $c_epc_l6m = unserialize(file_get_contents('0_c_epc_l6m.txt'));
  $c_epc_tm = unserialize(file_get_contents('0_c_epc_tm.txt'));
  $all_epc = unserialize(file_get_contents('0_g_epc_l6m.txt'));
  $tm_all_epc = unserialize(file_get_contents('0_g_epc_tm.txt'));

/* Last update times, if needed for heavier queries to show top conv and epc on index.
$c_sr_l6m_f = '0_c_sr_l6m.txt';
if (file_exists($c_sr_l6m_f)) {
    $c_sr_l6m_t = date ("Y-m-d H:i:s.", filemtime($c_sr_l6m_f));
}
$c_epc_l6m_f = '0_g_epc_l6m.txt';
if (file_exists($c_epc_l6m_f)) {
    $c_epc_l6m_t = date ("Y-m-d H:i:s.", filemtime($c_epc_l6m_f));
}

$c_sr_tm_f = '0_c_sr_tm.txt';
if (file_exists($c_sr_tm_f)) {
    $c_sr_tm_t = date ("Y-m-d H:i:s.", filemtime($c_sr_tm_f));
}
$c_epc_tm_f = '0_c_epc_tm.txt';
if (file_exists($c_epc_tm_f)) {
    $c_epc_tm_t = date ("Y-m-d H:i:s.", filemtime($c_epc_tm_f));
}
*/

$smarty->assign('top_converting', $c_sr_l6m);
$smarty->assign('tm_top_converting', $c_sr_tm);
$smarty->assign('total_sr', $all_sales_ratio); // last 6 months average sales ratio
$smarty->assign('total_sr_tm', $tm_all_sales_ratio); // this month average sales ratio

$smarty->assign('c_epc_l6m', $c_epc_l6m);
$smarty->assign('c_epc_tm', $c_epc_tm);
$smarty->assign('all_epc', $all_epc);
$smarty->assign('tm_all_epc', $tm_all_epc);

$smarty->assign('c_sr_l6m_t', $c_sr_l6m_t);
$smarty->assign('c_epc_l6m_t', $c_epc_l6m_t);
$smarty->assign('c_sr_tm_t', $c_sr_tm_t);
$smarty->assign('c_epc_tm_t', $c_epc_tm_t);

$smarty->display('index.tpl');

?>