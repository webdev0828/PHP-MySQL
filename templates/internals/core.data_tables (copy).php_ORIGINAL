<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

if ($data_get == '46') {

    $temp_fields = 'debit_amount_label,debit_date_label,debit_reason_label,debit_paragraph';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $debit_amount_label=html_language_output($getlanguage['debit_amount_label']);
    $debit_date_label=html_language_output($getlanguage['debit_date_label']);
    $debit_reason_label=html_language_output($getlanguage['debit_reason_label']);
    $debit_paragraph=html_language_output($getlanguage['debit_paragraph']);



    $smarty->assign('debit_title', $menu_drop_pending_debits);
    $smarty->assign('debit_amount_label', $debit_amount_label);
    $smarty->assign('debit_date_label', $debit_date_label);
    $smarty->assign('debit_reason_label', $debit_reason_label);
    $smarty->assign('debit_paragraph', $debit_paragraph);

$get_debs_active = $db->prepare("select * from idevaff_debit where aff_id = ? ORDER BY id DESC");
$get_debs_active->execute(array($linkid));
$debit_results = array(); 
$i=0;
while ($pqry = $get_debs_active->fetch()) {
$debit_amount=number_format($pqry['amount'], $decimal_symbols);
$debit_date=date($dateformat, $pqry['code']);
$debitreason = ${"debit_reason_" . $pqry['reason']};

            $deb_stuff = array( 
                'debit_table_amount' => $debit_amount, 
                'debit_table_date' => $debit_date, 
                'debit_table_reason' => $debitreason, 
            );
            $debit_results[$i++] = $deb_stuff; }
$smarty->assign('debit_results', $debit_results);

}



if (($data_get == 15) || ($data_get == 16) || ($data_get == 18)) {
//    $smarty->assign('password', $pass);
//    $smarty->assign('change_existing_password', $pass);
}

if ($data_get == 18) {
	
	$smarty->assign('password', $pass);
    $smarty->assign('change_existing_password', $pass);
	
    $temp_fields = 'password_title,password_old_password,password_new_password,password_confirm_password,password_button,
    help_new_password_heading,help_new_password_info,help_confirm_password_heading,help_confirm_password_info';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $password_title=html_language_output($getlanguage['password_title']);
    $password_old_password=html_language_output($getlanguage['password_old_password']);
    $password_new_password=html_language_output($getlanguage['password_new_password']);
    $password_confirm_password=html_language_output($getlanguage['password_confirm_password']);
    $password_button=html_language_output($getlanguage['password_button']);

    $help_new_password_heading=html_language_output($getlanguage['help_new_password_heading']);
    $help_new_password_info=html_language_output($getlanguage['help_new_password_info']);
	$help_new_password_info=str_replace("characters_allowed", $characters_allowed, $help_new_password_info);
    $help_confirm_password_heading=html_language_output($getlanguage['help_confirm_password_heading']);
    $help_confirm_password_info=html_language_output($getlanguage['help_confirm_password_info']);


    $smarty->assign('password_title', $password_title);
    $smarty->assign('password_old_password', $password_old_password);
    $smarty->assign('password_new_password', $password_new_password);
    $smarty->assign('password_confirm_password', $password_confirm_password);
    $smarty->assign('password_button', $password_button);

    $smarty->assign('help_new_password_heading', $help_new_password_heading);
    $help_new_password_info = preg_replace("/pass_min_chars/", $pass_min, $help_new_password_info);
    $smarty->assign('help_new_password_info', $help_new_password_info);
    $smarty->assign('help_confirm_password_heading', $help_confirm_password_heading);
    $smarty->assign('help_confirm_password_info', $help_confirm_password_info);
}

if ($data_get == 21) {
$get_faq = $db->query("select * from idevaff_faq ORDER BY sort");
$faq_results = array(); 
$i=0; 
while ($r=$get_faq->fetch()) {
$faq_sub = $r['question'];
$faq_con = html_entity_decode(nl2br($r['answer']));

            $tmp = array( 
                'faq_question' => $faq_sub, 
                'faq_answer' => $faq_con
            );
            $faq_results[$i++] = $tmp; }
$smarty->assign('faq_results', $faq_results);
$smarty->assign('faq_page_none', $faq_page_none);
}

    //global language files
    $temp_fields = 'change_comm_title,change_comm_curr_comm,change_comm_curr_pay,change_comm_new_comm,change_comm_warning,
    change_comm_button,change_comm_no_other,change_comm_level,change_comm_updated,index_table_sale,index_table_click,browse_title,browse_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $change_comm_page_title=html_language_output($getlanguage['change_comm_title']);
    $change_comm_page_curr_comm=html_language_output($getlanguage['change_comm_curr_comm']);
    $change_comm_page_curr_pay=html_language_output($getlanguage['change_comm_curr_pay']);
    $change_comm_page_new_comm=html_language_output($getlanguage['change_comm_new_comm']);
    $change_comm_page_warning=html_language_output($getlanguage['change_comm_warning']);
    $change_comm_page_button=html_language_output($getlanguage['change_comm_button']);
    $change_comm_page_no_other=html_language_output($getlanguage['change_comm_no_other']);
    $change_comm_page_level=html_language_output($getlanguage['change_comm_level']);
    $change_comm_updated=html_language_output($getlanguage['change_comm_updated']);

    $index_table_sale=html_language_output($getlanguage['index_table_sale']);
    $index_table_click=html_language_output($getlanguage['index_table_click']);

    $browse_page_title=html_language_output($getlanguage['browse_title']);
    $browse_page_none=html_language_output($getlanguage['browse_none']);

if ($data_get == 1) {
    $temp_fields = 'general_title,general_transactions,general_earnings_to_date,general_history_link,
    general_standard_earnings,general_traffic_title,general_traffic_visitors,general_traffic_sales,general_traffic_ratio,
    general_traffic_info,general_traffic_pay_type,general_traffic_pay_level,general_notes_title,general_notes_date,
    general_notes_to,general_notes_all,general_notes_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $general_title=html_language_output($getlanguage['general_title']);
    $general_transactions=html_language_output($getlanguage['general_transactions']);
    $general_earnings_to_date=html_language_output($getlanguage['general_earnings_to_date']);
    $general_history_link=html_language_output($getlanguage['general_history_link']);
    $general_standard_earnings=html_language_output($getlanguage['general_standard_earnings']);

    $general_traffic_title=html_language_output($getlanguage['general_traffic_title']);
    $general_traffic_visitors=html_language_output($getlanguage['general_traffic_visitors']);

    $general_traffic_sales=html_language_output($getlanguage['general_traffic_sales']);
    $general_traffic_ratio=html_language_output($getlanguage['general_traffic_ratio']);
    $general_traffic_info=html_language_output($getlanguage['general_traffic_info']);
    $general_traffic_pay_type=html_language_output($getlanguage['general_traffic_pay_type']);
    $general_traffic_pay_level=html_language_output($getlanguage['general_traffic_pay_level']);

    $general_notes_title=html_language_output($getlanguage['general_notes_title']);
    $general_notes_date=html_language_output($getlanguage['general_notes_date']);
    $general_notes_to=html_language_output($getlanguage['general_notes_to']);
    $general_notes_all=html_language_output($getlanguage['general_notes_all']);
    $general_notes_none=html_language_output($getlanguage['general_notes_none']);

    $smarty->assign('general_title', $general_title);
    $smarty->assign('general_transactions', $general_transactions);
    $smarty->assign('general_earnings_to_date', $general_earnings_to_date);
    $smarty->assign('general_history_link', $general_history_link);
    $smarty->assign('general_standard_earnings', $general_standard_earnings);
    $smarty->assign('general_current_earnings', $general_current_earnings);
    $smarty->assign('general_traffic_title', $general_traffic_title);
    $smarty->assign('general_traffic_visitors', $general_traffic_visitors);
    $smarty->assign('general_traffic_unique', $general_traffic_unique);
    $smarty->assign('general_traffic_sales', $general_traffic_sales);
    $smarty->assign('general_traffic_ratio', $general_traffic_ratio);
    $smarty->assign('general_traffic_info', $general_traffic_info);
    $smarty->assign('general_traffic_pay_type', $general_traffic_pay_type);
    $smarty->assign('general_traffic_pay_level', $general_traffic_pay_level);
    $smarty->assign('general_notes_title', $general_notes_title);
    $smarty->assign('general_notes_date', $general_notes_date);
    $smarty->assign('general_notes_to', $general_notes_to);
    $smarty->assign('general_notes_none', $general_notes_none);

$pay_details = $db->prepare("select type, level from idevaff_affiliates where id = ?");
$pay_details->execute(array($linkid));
$res = $pay_details->fetch();
$info1 = $res['type'];
$info2 = $res['level'];
if (($info1 == 1) || ($info1 == 2)) {
$smarty->assign('current_style', $index_table_sale);
} else {
$smarty->assign('current_style', $index_table_click); }
//$pay_details = $db->query("select amt from idevaff_paylevels where type = '$info1' and level = '$info2'");
$pay_details = $db->prepare("select amt from idevaff_paylevels where type = ? and level = ?");
$pay_details->execute(array($info1,$info2));
$res = $pay_details->fetch();
$payamt = $res['amt'];
if ($info1 == 1) {
$payamt = $payamt * 100;
$smarty->assign('current_level', $change_comm_page_level . ' ' . $info2 . ': ' . $payamt . '% ' . $index_table_sale_text);
} elseif ($info1 == 2) {
$payamt = number_format($payamt, $decimal_symbols);
if($cur_sym_location == 1) { $payamt = $cur_sym . $payamt; }
if($cur_sym_location == 2) { $payamt = $payamt . " " . $cur_sym; }
$payamt = $payamt . " $currency";
$smarty->assign('current_level', $change_comm_page_level . ' ' . $info2 . ': ' . $payamt . ' ' . $index_table_sale_text);
} elseif ($info1 == 3) {
$payamt = number_format($payamt, $decimal_symbols);
if($cur_sym_location == 1) { $payamt = $cur_sym . $payamt; }
if($cur_sym_location == 2) { $payamt = $payamt . " " . $cur_sym; }
$payamt = $payamt . " $currency";
$smarty->assign('current_level', $change_comm_page_level . ' ' . $info2 . ': ' . $payamt . ' ' . $index_table_click_text); }

$unc = $db->prepare("select COUNT(DISTINCT ip) from idevaff_iptracking where acct_id = ?");
$unc->execute(array($linkid));
$unchit = $unc->fetchColumn();
$unchits = number_format($unchit);
$smarty->assign('unchits', $unchits);

$ar = $db->prepare("select id from idevaff_archive where id = ? and bonus != '1' and top_tier_tag != '1'"); 
$ar->execute(array($linkid));
$arc = $ar->rowCount();
$car = $db->prepare("select id from idevaff_sales where approved = '1' and bonus != '1' and top_tier_tag != '1' and id = ?");
$car->execute(array($linkid));
$carn = $car->rowCount();
$salenu = $arc + $carn;
$salenum = (number_format($salenu,0));
$smarty->assign('salenum', $salenum);

$perc = "0.000";
if (($salenu > '0') && ($unchit > 0)) {
$perc = $salenu / $unchit * 100;
$perc = (number_format($perc,3));
}
$smarty->assign('perc', $perc);

$get_notes = $db->prepare("select * from idevaff_notes where note_display = '1' and (note_to = '0' or note_to = ?) order by id DESC");
$get_notes->execute(array($linkid));
$note_results = array(); 
$i=0; 
while ($r=$get_notes->fetch()) {
$note_sub = stripslashes($r['note_sub']);
$note_con = stripslashes(nl2br($r['note_con']));
$note_date = date($dateformat, $r['stamp']);
$note_to = $r['note_to'];
$note_image = $r['note_image'];
$note_image_location = $r['note_image_location'];

$draw_image = null;
if ($note_image != '') {
list($width, $height, $type, $attr) = getimagesize("assets/note_images/" . $note_image);
$draw_image = "<img src=\"assets/note_images/" . $note_image . "\" width=\"" . $width . "\" height=\"" . $height . "\" border=\"0px;\" />"; }

if ($note_to == $linkid) { $note_to = "<font color=\"#CC0000\">".$affiliate_username."</font>"; } else { $note_to = $general_notes_all; }
            $tmp = array( 
                'note_date' => $note_date, 
                'note_to' => $note_to, 
                'note_subject' => $note_sub, 
                'note_content' => $note_con, 
                'note_image' => $note_image, 
                'note_image_location' => $note_image_location, 
				'draw_image' => $draw_image
            );
            $note_results[$i++] = $tmp; }
$smarty->assign('note_results', $note_results);
}

if ($data_get == 19) {
$pay_details = $db->prepare("select type, level, a1, a2, a3 from idevaff_affiliates where id = ?");
$pay_details->execute(array($linkid));
$res = $pay_details->fetch();
$info1 = $res['type'];
$info2 = $res['level'];
$a1 = $res['a1'];
$a2 = $res['a2'];
$a3 = $res['a3'];
$botlev1 = $db->query("select amt from idevaff_paylevels where level = 1 and type = 1");
$res = $botlev1->fetch();
$bot1 = $res['amt'];
$bot1 = $bot1 * 100;
$botlev2 = $db->query("select amt from idevaff_paylevels where level = 1 and type = 2");
$res = $botlev2->fetch();
$bot2 = $res['amt'];
$botlev3 = $db->query("select amt from idevaff_paylevels where level = 1 and type = 3");
$res = $botlev3->fetch();
$bot3 = $res['amt'];
if (($info1 == 1) || ($info1 == 2)) {
$smarty->assign('current_style', $index_table_sale);
} else {
$smarty->assign('current_style', $index_table_click); }
//$pay_details = $db->query("select amt from idevaff_paylevels where type = $info1 and level = $info2");
$pay_details = $db->prepare("select amt from idevaff_paylevels where type = ? and level = ?");
$pay_details->execute(array($info1,$info2));
$res = $pay_details->fetch();
$payamt = $res['amt'];
if ($info1 == 1) {
$payamt = $payamt * 100;
$smarty->assign('current_level', $change_comm_page_level . ' ' . $info2 . ': ' . $payamt . '% ' . $index_table_sale_text);
} elseif ($info1 == 2) {
$payamt = number_format($payamt, $decimal_symbols);
if($cur_sym_location == 1) { $payamt = $cur_sym . $payamt; }
if($cur_sym_location == 2) { $payamt = $payamt . " " . $cur_sym; }
$payamt = $payamt . " $currency";
$smarty->assign('current_level', $change_comm_page_level . ' ' . $info2 . ': ' . $payamt . ' ' . $index_table_sale_text);
} elseif ($info1 == 3) {
$payamt = number_format($payamt, $decimal_symbols);
if($cur_sym_location == 1) { $payamt = $cur_sym . $payamt; }
if($cur_sym_location == 2) { $payamt = $payamt . " " . $cur_sym; }
$payamt = $payamt . " $currency";
$smarty->assign('current_level', $change_comm_page_level . ' ' . $info2 . ': ' . $payamt . ' ' . $index_table_click_text); }
if (($ap_1 == 1) && ($info1 != 1) && ($a1 == 1)) { $avail = 1; }
if (($ap_2 == 1) && ($info1 != 2) && ($a2 == 1)) { $avail = 1; }
if (($ap_3 == 1) && ($info1 != 3) && ($a3 == 1)) { $avail = 1; }
if (isset($avail)) {
$smarty->assign('available', 1);
if (($ap_1 == 1) && ($info1 != 1) && ($a1 == 1)) {
$smarty->assign('type_perc', 1);
$smarty->assign('bot1', $bot1); }
if (($ap_2 == 1) && ($info1 != 2) && ($a2 == 1)) {
$smarty->assign('type_flat', 1);
$smarty->assign('bot2', number_format($bot2, $decimal_symbols)); }
if (($ap_3 == 1) && ($info1 != 3) && ($a3 == 1)) {
$smarty->assign('type_clck', 1);
$smarty->assign('bot3', number_format($bot3, $decimal_symbols)); }
} else {
$smarty->assign('no_styles_available', $change_comm_page_no_other); }
$smarty->assign('change_comm_page_title', $change_comm_page_title);
$smarty->assign('change_comm_page_curr_comm', $change_comm_page_curr_comm);
$smarty->assign('change_comm_page_curr_pay', $change_comm_page_curr_pay);
$smarty->assign('change_comm_page_new_comm', $change_comm_page_new_comm);
$smarty->assign('change_comm_page_warning', $change_comm_page_warning);
$smarty->assign('change_comm_page_button', $change_comm_page_button);
}

if ($data_get == 20) {
$get_others = $db->query("select url from idevaff_affiliates where approved = '1' ORDER BY url"); 
$others_results = array(); 
$i=0; 
while ($r=$get_others->fetch()) {
$others_url = $r['url'];
            $tmp = array( 
                'others_url' => $others_url 
            );
            $others_results[$i++] = $tmp;
}

$smarty->assign('others_results', $others_results);
$smarty->assign('browse_page_title', $browse_page_title);
$smarty->assign('browse_page_none', $browse_page_none);
}

if ($data_get == 2) {

    $temp_fields = 'tier_stats_title,tier_stats_accounts,tier_stats_grab_link,tier_stats_username,tier_stats_current,
    tier_stats_previous,tier_stats_totals,tier_stats_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $tier_stats_none=html_language_output($getlanguage['tier_stats_none']);
    $tier_stats_title=html_language_output($getlanguage['tier_stats_title']);
    $tier_stats_accounts=html_language_output($getlanguage['tier_stats_accounts']);
    $tier_stats_grab_link=html_language_output($getlanguage['tier_stats_grab_link']);
    $tier_stats_username=html_language_output($getlanguage['tier_stats_username']);
    $tier_stats_current=html_language_output($getlanguage['tier_stats_current']);
    $tier_stats_previous=html_language_output($getlanguage['tier_stats_previous']);
    $tier_stats_totals=html_language_output($getlanguage['tier_stats_totals']);

    $smarty->assign('tier_stats_title', $tier_stats_title);
    $smarty->assign('tier_stats_accounts', $tier_stats_accounts);
    $smarty->assign('tier_stats_grab_link', $tier_stats_grab_link);
    $smarty->assign('tier_stats_none', $tier_stats_none);
    $smarty->assign('tier_stats_username', $tier_stats_username);
    $smarty->assign('tier_stats_current', $tier_stats_current);
    $smarty->assign('tier_stats_previous', $tier_stats_previous);
    $smarty->assign('tier_stats_totals', $tier_stats_totals);

    if ($tlinks) {
        $smarty->assign('forced_links', 1);
    }




//$get_tiers = $db->query("select child from idevaff_tiers where parent = '$linkid'");
$get_tiers = $db->prepare("select child from idevaff_tiers where parent = ?");
$get_tiers->execute(array($linkid));
if ($get_tiers->rowCount()) {

    $smarty->assign('tier_accounts_exist', 1);
    /*
    $tier_results = array();
    $i=0;
    while ($r=$get_tiers->fetch()) {
    $tierid=$r['child'];
    //$get_tier_data = $db->query("select id, username, url, f_name, l_name, email from idevaff_affiliates where id = '$tierid' and approved = '1' ORDER BY id");
    $get_tier_data = $db->prepare("select id, username, url, f_name, l_name, email from idevaff_affiliates where id = ? and approved = '1' ORDER BY id");
    $get_tier_data->execute(array($tierid));
    $get_tier_data = $get_tier_data->fetch();
    $tierid=$get_tier_data['id'];
    $tieruser=$get_tier_data['username'];
    $turl=$get_tier_data['url'];
    $tname1=$get_tier_data['f_name'];
    $tname2=$get_tier_data['l_name'];
    $tname = $tname1 . ' ' . $tname2;
    $temail = $get_tier_data['email'];

    //$cur = $db->query("select SUM(payment) as total from idevaff_sales where id = '$linkid' and top_tier_tag = '1' and tier_id = '$tierid' and approved = '1'");
    $cur = $db->prepare("select SUM(payment) as total from idevaff_sales where id = ? and top_tier_tag = '1' and tier_id = ? and approved = '1'");
    $cur->execute(array($linkid,$tierid));
    $now = $cur->fetch();
    $paynow = $now['total'];
    $pay_current = (number_format($paynow,$decimal_symbols));
    //$acur = $db->query("select SUM(payment) as total from idevaff_archive where id = '$linkid' and top_tier_tag = '1' and tier_id = '$tierid'");
    $acur = $db->prepare("select SUM(payment) as total from idevaff_archive where id = ? and top_tier_tag = '1' and tier_id = ?");
    $acur->execute(array($linkid,$tierid));
    $anow = $acur->fetch();
    $paythen = $anow['total'];
    $paid_archive = (number_format($paythen,$decimal_symbols));
    $total_tier_payouts = $paynow + $paythen;
    $total_tier_payouts = (number_format($total_tier_payouts,$decimal_symbols));
                $tmp = array(
                'tier_username' => $tieruser,
                'tier_url' => $turl,
                'tier_name' => $tname,
                'tier_email' => $temail,
                'tier_current_payments' => $pay_current,
                'tier_archived_payments' => $paid_archive,
                'tier_total_payments' => $total_tier_payouts
                );
                $tier_results[$i++] = $tmp; }
    $smarty->assign('tier_results', $tier_results);
    //$summary_cur = $db->query("select SUM(payment) as total from idevaff_sales where id = '$linkid' and top_tier_tag = '1' and approved = '1'");
    $summary_cur = $db->prepare("select SUM(payment) as total from idevaff_sales where id = ? and top_tier_tag = '1' and approved = '1'");
    $summary_cur->execute(array($linkid));
    $summary_now = $summary_cur->fetch();
    $summary_paynow = $summary_now['total'];
    $tier_summary_current_payments = (number_format($summary_paynow,$decimal_symbols));
    //$summary_acur = $db->query("select SUM(payment) as total from idevaff_archive where id = '$linkid' and top_tier_tag = '1'");
    $summary_acur = $db->prepare("select SUM(payment) as total from idevaff_archive where id = ? and top_tier_tag = '1'");
    $summary_acur->execute(array($linkid));
    $summary_anow = $summary_acur->fetch();
    $summary_paythen = $summary_anow['total'];
    $tier_summary_archived_payments = (number_format($summary_paythen,$decimal_symbols));
    $smarty->assign('tier_summary_current_payments', $tier_summary_current_payments);
    $smarty->assign('tier_summary_archived_payments', $tier_summary_archived_payments);
    */
}
    /*
    if ((isset($summary_paynow)) || (isset($summary_paythen))) { $summary_total_tier_payouts = $summary_paynow + $summary_paythen; } else { $summary_total_tier_payouts = (number_format(0,$decimal_symbols)); }
    if (isset($summary_total_tier_payouts)) { $summary_total_tier_payouts = (number_format($summary_total_tier_payouts,$decimal_symbols)); }
    if (isset($summary_total_tier_payouts)) { $smarty->assign('tier_summary_total_payments', $summary_total_tier_payouts); }
    */
}

if ($data_get == 6) {
    $temp_fields = 'traffic_title,traffic_display,traffic_display_visitors,traffic_button,traffic_title_details,traffic_ip,
    traffic_refer,traffic_date,traffic_time,traffic_bottom_tag_one,traffic_bottom_tag_two,traffic_bottom_tag_three,
    traffic_none,traffic_no_url,traffic_box_title,traffic_box_info';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $traffic_title=html_language_output($getlanguage['traffic_title']);
    $traffic_display=html_language_output($getlanguage['traffic_display']);
    $traffic_display_visitors=html_language_output($getlanguage['traffic_display_visitors']);
    $traffic_button=html_language_output($getlanguage['traffic_button']);
    $traffic_title_details=html_language_output($getlanguage['traffic_title_details']);
    $traffic_ip=html_language_output($getlanguage['traffic_ip']);
    $traffic_refer=html_language_output($getlanguage['traffic_refer']);
    $traffic_date=html_language_output($getlanguage['traffic_date']);
    $traffic_time=html_language_output($getlanguage['traffic_time']);
    $traffic_bottom_tag_one=html_language_output($getlanguage['traffic_bottom_tag_one']);
    $traffic_bottom_tag_two=html_language_output($getlanguage['traffic_bottom_tag_two']);
    $traffic_bottom_tag_three=html_language_output($getlanguage['traffic_bottom_tag_three']);
    $traffic_none=html_language_output($getlanguage['traffic_none']);
    $traffic_no_url=html_language_output($getlanguage['traffic_no_url']);
    $traffic_box_title=html_language_output($getlanguage['traffic_box_title']);
    $traffic_box_info=html_language_output($getlanguage['traffic_box_info']);

    $smarty->assign('traffic_title', $traffic_title);
    $smarty->assign('traffic_display', $traffic_display);
    $smarty->assign('traffic_display_visitors', $traffic_display_visitors);
    $smarty->assign('traffic_button', $traffic_button);
    $smarty->assign('traffic_title_details', $traffic_title_details);
    $smarty->assign('traffic_ip', $traffic_ip);
    $smarty->assign('traffic_refer', $traffic_refer);
    $smarty->assign('traffic_date', $traffic_date);
    $smarty->assign('traffic_time', $traffic_time);
    $smarty->assign('traffic_bottom_tag_one', $traffic_bottom_tag_one);
    $smarty->assign('traffic_bottom_tag_two', $traffic_bottom_tag_two);
    $smarty->assign('traffic_bottom_tag_three', $traffic_bottom_tag_three);
    $smarty->assign('traffic_none', $traffic_none);

if ((isset($_POST['cut'])) && (is_numeric($_POST['cut'])))  {
if ($_POST['cut']=='10') { $smarty->assign('cut_10', ' selected'); }
if ($_POST['cut']=='25') { $smarty->assign('cut_25', ' selected'); }
if ($_POST['cut']=='50') { $smarty->assign('cut_50', ' selected'); }
if ($_POST['cut']=='100') { $smarty->assign('cut_100', ' selected'); }
if ($_POST['cut']=='250') { $smarty->assign('cut_250', ' selected'); }
if ($_POST['cut']=='500') { $smarty->assign('cut_500', ' selected'); }
$limit = $_POST['cut'];
} else { $limit = '10'; }

//$get_traffic = $db->query("select ip, refer, stamp, geo from idevaff_iptracking where acct_id = '$linkid' ORDER BY id DESC limit $limit");
$get_traffic = $db->prepare("select ip, refer, stamp, geo from idevaff_iptracking where acct_id = ? ORDER BY id DESC limit $limit");
$get_traffic->execute(array($linkid));
if ($get_traffic->rowCount()) {
$smarty->assign('traffic_logs_exist', 1);
$traffic_results = array(); 
$i=0; 
while ($r=$get_traffic->fetch()) {
$ip=$r['ip'];
$refer1=$r['refer'];
$date=date($dateformat, $r['stamp']);
$time=date($timeformat, $r['stamp']);
if (!$refer1) { $refer = $traffic_no_url;
} else {
$refer = substr("$refer1", 0, 40);
if (strlen($refer) > 39) { $refer = $refer . "..."; }
$refer = "<a href=\"$refer1\" target=\"_blank\" title=\"header=[$traffic_box_title] body=[$refer1<br />$traffic_box_info]\" style=\"cursor:pointer;\">$refer</a>"; }

			$flag_country = strtolower($r['geo']);
			$flag = '';
			if (file_exists('images/geo_flags/'.$flag_country.'.png')) {
			$flag = "<img src=\"images/geo_flags/".$flag_country.".png\" height=\"24\" width=\"24\" border=\"none;\" />"; }
			
            $tmp = array( 
                'traffic_ip' => $ip, 
                'traffic_refer' => $refer, 
                'traffic_time' => $time, 
                'traffic_date' => $date,
				'traffic_flag' => $flag
            );
            $traffic_results[$i++] = $tmp; }
$smarty->assign('traffic_results', $traffic_results);
//$tot = $db->query("select COUNT(DISTINCT ip) from idevaff_iptracking where acct_id = '$linkid'");
$tot = $db->prepare("select COUNT(DISTINCT ip) from idevaff_iptracking where acct_id = ?");
$tot->execute(array($linkid));
$tot = $tot->rowCount();
$distot = number_format($tot[0]);
if ((isset($_POST['cut'])) && ($tot < $_POST['cut']) && (is_numeric($_POST['cut']))) {
$smarty->assign('search_limit', $distot);
} elseif (!isset($_POST['cut'])) {
$smarty->assign('search_limit', '10');
} else {
$badcut = $_POST['cut'];
$smarty->assign('search_limit', $badcut); }
$smarty->assign('search_total', $distot); }
}

if ($data_get == 3) {
    //get language field account_payment_history.tpl
    $temp_fields = 'payment_title,payment_date,payment_commissions,payment_amount,payment_totals,payment_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $payment_title=html_language_output($getlanguage['payment_title']);
    $payment_date=html_language_output($getlanguage['payment_date']);
    $payment_commissions=html_language_output($getlanguage['payment_commissions']);
    $payment_amount=html_language_output($getlanguage['payment_amount']);
    $payment_totals=html_language_output($getlanguage['payment_totals']);
    $payment_none=html_language_output($getlanguage['payment_none']);

    $smarty->assign('payment_title', $payment_title);
    $smarty->assign('payment_date', $payment_date);
    $smarty->assign('payment_commissions', $payment_commissions);
    $smarty->assign('payment_amount', $payment_amount);
    $smarty->assign('payment_totals', $payment_totals);
    $smarty->assign('payment_none', $payment_none);
//$get_payments = $db->query("select * from idevaff_payments where id = '$linkid' ORDER BY code");
$get_payments = $db->prepare("select * from idevaff_payments where id = ? ORDER BY code");
$get_payments->execute(array($linkid));
if ($get_payments->rowCount()) {
$smarty->assign('payment_history_exists', 1);
$payment_results = array(); 
$i=0; 
while ($r=$get_payments->fetch()) {
$pdate=date($dateformat, $r['code']);
$ppay=number_format($r['amount'], $decimal_symbols);
$pstamp=$r['record'];
//$ptotget = $db->query("select * from idevaff_archive where payment_rec = '$pstamp'"); 
$ptotget = $db->prepare("select * from idevaff_archive where payment_rec = ?"); 
$ptotget->execute(array($pstamp));
$ptot = (number_format($ptotget->rowCount()));

            $tmp = array( 
                'payment_date' => $pdate, 
                'payment_amount' => $ppay,
                'payment_stamp' => $pstamp, 
                'payment_total' => $ptot
            );
            $payment_results[$i++] = $tmp; }

$smarty->assign('payment_results', $payment_results);
//$totsl = $db->query("select id from idevaff_archive where id = '$linkid'"); 
$totsl = $db->prepare("select id from idevaff_archive where id = ?"); 
$totsl->execute(array($linkid));
$ptotsl = (number_format($totsl->rowCount()));
$smarty->assign('payments_total', $ptotsl); }
}

if ($data_get == 4) {
    //get language fields for account_commission_list_subs.tpl and account_commission_list.tpl
    $temp_fields = 'details_title,details_drop_1,details_drop_2,details_drop_3,details_drop_4,details_drop_5,
    details_button,details_date,details_status,details_commission,details_details,details_type_1,details_type_2,
    details_type_3,details_none,details_no_group,details_choose,details_drop_6,details_type_6';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $details_title=html_language_output($getlanguage['details_title']);
    $details_drop_1=html_language_output($getlanguage['details_drop_1']);
    $details_drop_2=html_language_output($getlanguage['details_drop_2']);
    $details_drop_3=html_language_output($getlanguage['details_drop_3']);
    $details_drop_4=html_language_output($getlanguage['details_drop_4']);
    $details_drop_5=html_language_output($getlanguage['details_drop_5']);
    $details_button=html_language_output($getlanguage['details_button']);
    $details_date=html_language_output($getlanguage['details_date']);
    $details_status=html_language_output($getlanguage['details_status']);
    $details_commission=html_language_output($getlanguage['details_commission']);
    $details_details=html_language_output($getlanguage['details_details']);
    $details_type_1=html_language_output($getlanguage['details_type_1']);
    $details_type_2=html_language_output($getlanguage['details_type_2']);
    $details_type_3=html_language_output($getlanguage['details_type_3']);
    $details_none=html_language_output($getlanguage['details_none']);
    $details_no_group=html_language_output($getlanguage['details_no_group']);
    $details_choose=html_language_output($getlanguage['details_choose']);
    $details_drop_6=html_language_output($getlanguage['details_drop_6']);
    $details_type_6=html_language_output($getlanguage['details_type_6']);

    $smarty->assign('details_title', $details_title);
    $smarty->assign('details_button', $details_button);
    $smarty->assign('details_date', $details_date);
    $smarty->assign('details_status', $details_status);
    $smarty->assign('details_commission', $details_commission);
    $smarty->assign('details_details', $details_details);
    $smarty->assign('details_none', $details_none);
    $smarty->assign('details_no_group', $details_no_group);
    $smarty->assign('details_choose', $details_choose);
    $smarty->assign('details_drop_1', $details_drop_1);
    $smarty->assign('details_drop_2', $details_drop_2);
    $smarty->assign('details_drop_3', $details_drop_3);
    $smarty->assign('details_drop_4', $details_drop_4);
    $smarty->assign('details_drop_5', $details_drop_5);
    $smarty->assign('details_drop_6', $details_drop_6);

if ($pend_show) {
$smarty->assign('commission_drop_pending', 1); }
if (isset($second_tier)) {
$smarty->assign('commission_drop_tier', 1); }


if ((isset($_REQUEST['report'])) && (is_numeric($_REQUEST['report']))) {
$smarty->assign('commission_group_chosen', 1);
$report_number = $_REQUEST['report'];

if ($report_number == '1') {
$smarty->assign('commission_group_name', $details_drop_1);
//$lpast = $db->query("select record, code, payment, approved, sub_id from idevaff_sales where id = '$linkid' and approved = '1' and top_tier_tag = '0' ORDER BY code DESC");
$lpast = $db->prepare("select record, code, payment, approved, sub_id from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '0' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }

if ($report_number == '2') {
$smarty->assign('commission_group_name', $details_drop_2);
//$lpast = $db->query("select record, code, payment, approved, sub_id from idevaff_sales where id = '$linkid' and approved = '1' and top_tier_tag = '1' ORDER BY code DESC");
$lpast = $db->prepare("select record, code, payment, approved, sub_id from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '1' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }

if ($report_number == '3') {
$smarty->assign('commission_group_name', $details_drop_3);
//$lpast = $db->query("select record, code, payment, approved, sub_id from idevaff_sales where id = '$linkid' and approved = '0' and delay = '0' and payment != '0' ORDER BY code DESC");
$lpast = $db->prepare("select record, code, payment, approved, sub_id from idevaff_sales where id = ? and approved = '0' and delay = '0' and payment != '0' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }

if ($report_number == '4') {
$smarty->assign('commission_group_name', $details_drop_4);
//$lpast = $db->query("select record, code, payment, sub_id from idevaff_archive where id = '$linkid' and top_tier_tag = '0' ORDER BY code DESC");
$lpast = $db->prepare("select record, code, payment, sub_id from idevaff_archive where id = ? and top_tier_tag = '0' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }

if ($report_number == '5') {
$smarty->assign('commission_group_name', $details_drop_5);
//$lpast = $db->query("select record, code, payment, sub_id from idevaff_archive where id = '$linkid' and top_tier_tag = '1' ORDER BY code DESC");
$lpast = $db->prepare("select record, code, payment, sub_id from idevaff_archive where id = ? and top_tier_tag = '1' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }

if ($report_number == '6') {
$smarty->assign('commission_group_name', $details_drop_6);
//$lpast = $db->query("select record, code, payment, approved, sub_id from idevaff_sales where id = '$linkid' and approved = '0' and delay > '0' and payment != '0' ORDER BY code DESC");
$lpast = $db->prepare("select record, code, payment, approved, sub_id from idevaff_sales where id = ? and approved = '0' and delay > '0' and payment != '0' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }

$commission_group_results = array(); 
$i=0;
while ($pqry = $lpast->fetch()) {
$record_id=$pqry['record'];
$commission_date=date($dateformat, $pqry['code']);
$commission_amount=number_format($pqry['payment'], $decimal_symbols);
$sub_id=$pqry['sub_id'];
if ($report_number < 4) { $papp=$pqry['approved']; }
if (($report_number == 4) || ($report_number == '5')) {
$record_type = 2;
$distype = $details_type_1;
} elseif ($report_number == 3) {
$record_type = 3;
$distype = $details_type_2;
} elseif ($report_number == 6) {
$record_type = 6;
$distype = $details_type_6;
} else {
$record_type = 1;
$distype = $details_type_3; }

if (!$sub_id) { $sub_id = $account_not_available; }

            $tmpcm = array( 
                'commission_results_date' => $commission_date, 
                'commission_results_type' => $distype, 
                'commission_results_amount' => $commission_amount, 
                'commission_results_record_type' => $record_type, 
                'commission_results_record_id' => $record_id, 
                'commission_results_sub_id' => $sub_id
            );
            $commission_group_results[$i++] = $tmpcm; }
$smarty->assign('commission_group_results', $commission_group_results);
} }

if ($data_get == 22) {
if ((isset($_REQUEST['type'])) && (is_numeric($_REQUEST['type']))) {

    $temp_fields = 'comdetails_title,comdetails_date,comdetails_time,comdetails_type,comdetails_status,comdetails_amount,
comdetails_additional_title,comdetails_additional_ordnum,comdetails_additional_saleamt,comdetails_status_6,comdetails_type_1,
comdetails_type_3,comdetails_type_4,comdetails_status_1,comdetails_status_2,comdetails_status_3,comdetails_not_available,sub_tracking_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $comdetails_title=html_language_output($getlanguage['comdetails_title']);
    $comdetails_date=html_language_output($getlanguage['comdetails_date']);
    $comdetails_time=html_language_output($getlanguage['comdetails_time']);
    $comdetails_type=html_language_output($getlanguage['comdetails_type']);
    $comdetails_status=html_language_output($getlanguage['comdetails_status']);
    $comdetails_amount=html_language_output($getlanguage['comdetails_amount']);
    $comdetails_additional_title=html_language_output($getlanguage['comdetails_additional_title']);
    $comdetails_additional_ordnum=html_language_output($getlanguage['comdetails_additional_ordnum']);
    $comdetails_additional_saleamt=html_language_output($getlanguage['comdetails_additional_saleamt']);
    $comdetails_status_6=html_language_output($getlanguage['comdetails_status_6']);
    $comdetails_type_1=html_language_output($getlanguage['comdetails_type_1']);
    $comdetails_type_3=html_language_output($getlanguage['comdetails_type_3']);
    $comdetails_type_4=html_language_output($getlanguage['comdetails_type_4']);
    $comdetails_status_1=html_language_output($getlanguage['comdetails_status_1']);
    $comdetails_status_2=html_language_output($getlanguage['comdetails_status_2']);
    $comdetails_status_3=html_language_output($getlanguage['comdetails_status_3']);
    $comdetails_not_available=html_language_output($getlanguage['comdetails_not_available']);
	$sub_tracking_none=html_language_output($getlanguage['sub_tracking_none']);
	

    $smarty->assign('comdetails_title', $comdetails_title);
    $smarty->assign('comdetails_date', $comdetails_date);
    $smarty->assign('comdetails_time', $comdetails_time);
    $smarty->assign('comdetails_type', $comdetails_type);
    $smarty->assign('comdetails_status', $comdetails_status);
    $smarty->assign('comdetails_amount', $comdetails_amount);
    $smarty->assign('comdetails_additional_title', $comdetails_additional_title);
    $smarty->assign('comdetails_additional_ordnum', $comdetails_additional_ordnum);
    $smarty->assign('comdetails_additional_saleamt', $comdetails_additional_saleamt);

$received_type = $_REQUEST['type'];
$received_id = $_REQUEST['id'];
if (($received_type == '1') || ($received_type == '3') || ($received_type == '6')) {
$getdet = $db->prepare("select * from idevaff_sales where record = ?");
$getdet->execute(array($received_id));
} elseif ($received_type == '2') {
$getdet = $db->prepare("select * from idevaff_archive where record = ?"); 
$getdet->execute(array($received_id));
}




$getdeta = $getdet->fetch();

$sub_id = $getdeta['sub_id'];
$tid1 = $getdeta['tid1'];
$tid2 = $getdeta['tid2'];
$tid3 = $getdeta['tid3'];
$tid4 = $getdeta['tid4'];
if (!$sub_id) { $sub_id = $sub_tracking_none; }
if (!$tid1) { $tid1 = $account_not_available; }
if (!$tid2) { $tid2 = $account_not_available; }
if (!$tid3) { $tid3 = $account_not_available; }
if (!$tid4) { $tid4 = $account_not_available; }

$smarty->assign('commission_details_subid', $sub_id);
$smarty->assign('commission_details_tid1', $tid1);
$smarty->assign('commission_details_tid2', $tid2);
$smarty->assign('commission_details_tid3', $tid3);
$smarty->assign('commission_details_tid4', $tid4);

$ddate = date($dateformat, $getdeta['code']);
$smarty->assign('commission_details_date', $ddate);
$dtime = date($timeformat, $getdeta['code']);
$smarty->assign('commission_details_time', $dtime);
$dpay = number_format($getdeta['payment'], $decimal_symbols);
if($cur_sym_location == 1) { $dpay = $cur_sym . $dpay; }
if($cur_sym_location == 2) { $dpay = $dpay . " " . $cur_sym; }
$dpay = $dpay . " $currency";
$smarty->assign('commission_details_payment', $dpay);
$dtier = $getdeta['top_tier_tag'];
$dbonus = $getdeta['bonus'];
if ($dbonus == 1) {
$dtype = $comdetails_type_1;
} elseif ($dtier == 1) {
$dtype = $comdetails_type_3;
} else {
$dtype = $comdetails_type_4; }
$smarty->assign('commission_details_type', $dtype);

if ($_GET['type'] == 2) {
$dstat = $comdetails_status_1;
} elseif ($_GET['type'] == 1) {
$dstat = $comdetails_status_2;
} elseif ($_GET['type'] == 3) {
$dstat = "<font color=\"#CC0000\">$comdetails_status_3</font>";
} elseif ($_GET['type'] == 6) {
$dstat = "<font color=\"#CC0000\">$comdetails_status_6</font>"; }

$smarty->assign('commission_details_status', $dstat);
if ($com_show_add == 1) {
$dtrk = $getdeta['tracking'];
if (!$dtrk) { $dtrk = $comdetails_not_available; }
$smarty->assign('commission_details_extras_ordernum', $dtrk);
$damt = number_format($getdeta['amount'], $decimal_symbols);
if ($damt < .01) { $damt = $comdetails_not_available;
} else {
if($cur_sym_location == 1) { $damt = $cur_sym . $damt; }
if($cur_sym_location == 2) { $damt = $damt . " " . $cur_sym; }
$damt = $damt . " $currency";
}
$smarty->assign('commission_details_extras_saleamount', $damt);
$smarty->assign('commission_details_show_extras', 1);

$profile = $getdeta['profile'];

if (!$profile) { $profile = 9000; }
if ($profile == 72198) { $profile = 0; }

$profile_to_check = $profile;
if ($profile == 0) { $profile_to_check = 72198; }
$integration=$db->prepare("select * from idevaff_integration where type = ?");
$integration->execute(array($profile_to_check));

$iconfig=$integration->fetch();

$opvar1_cart = $iconfig['cart_var1'];
$use_op1 = $iconfig['use_var1'];
$opvar1_tag = $iconfig['tag_var1'];

$opvar2_cart = $iconfig['cart_var2'];
$use_op2 = $iconfig['use_var2'];
$opvar2_tag = $iconfig['tag_var2'];

$opvar3_cart = $iconfig['cart_var3'];
$use_op3 = $iconfig['use_var3'];
$opvar3_tag = $iconfig['tag_var3'];

if (($use_op1 == 1) && ($opvar1_tag) && ($opvar1_cart)) {
$smarty->assign('commission_details_optional_one', 1);
$smarty->assign('commission_details_optional_name_one', $opvar1_tag);
$dop1 = $getdeta['op1']; if (!$dop1) { $dop1 = $comdetails_not_available; }
$smarty->assign('commission_details_optional_value_one', $dop1); }
if (($use_op2 == 1) && ($opvar2_tag) && ($opvar2_cart)) {
$smarty->assign('commission_details_optional_two', 1);
$smarty->assign('commission_details_optional_name_two', $opvar2_tag);
$dop2 = $getdeta['op2']; if (!$dop2) { $dop2 = $comdetails_not_available; }
$smarty->assign('commission_details_optional_value_two', $dop2); }
if (($use_op3 == 1) && ($opvar3_tag) && ($opvar3_cart)) {
$smarty->assign('commission_details_optional_three', 1);
$smarty->assign('commission_details_optional_name_three', $opvar3_tag);
$dop3 = $getdeta['op3']; if (!$dop3) { $dop3 = $comdetails_not_available; }
$smarty->assign('commission_details_optional_value_three', $dop3); } }
} }

if ($data_get == 17) {

// CUSTOM FIELDS

$fields_custom_array = array();
$whileCounter = 0;

$getcustomrows = $db->query("select id, title, name from idevaff_form_fields_custom where edit = '1' order by sort");
if ($getcustomrows->rowCount()) {
while ($qry=$getcustomrows->fetch()) {

//$getcustomrows = mysql_query("select id, title, name from idevaff_form_fields_custom where edit = '1' order by sort");
//if (mysql_num_rows($getcustomrows)) {
//	while ($qry = mysql_fetch_array($getcustomrows)) {
		$whileCounter++;
		$fields_custom_array[$whileCounter]["linkid"] = $linkid;
		$fields_custom_array[$whileCounter]["group_id"] = $qry['id'];
		$fields_custom_array[$whileCounter]["custom_title"] = $qry['title'];
		$fields_custom_array[$whileCounter]["custom_name"] = $qry['name'];
		//$getvars = $db->query("select id, custom_value from idevaff_form_custom_data where custom_id = '".$qry['id']."' and affid = '$linkid'");
                $getvars = $db->prepare("select id, custom_value from idevaff_form_custom_data where custom_id = ? and affid = ?");
                $getvars->execute(array($qry['id'],$linkid));
		$getvars = $getvars->fetch();
		//$getvars = mysql_query("select id, custom_value from idevaff_form_custom_data where custom_id = '".$qry['id']."' and affid = '$linkid'");
		//$getvars = mysql_fetch_array($getvars);
		$fields_custom_array[$whileCounter]["custom_value"] = $getvars['custom_value'];
		$fields_custom_array[$whileCounter]["entry_id"] = $getvars['id'];
	}
	
	$smarty->assign('fields_custom_array', $fields_custom_array);
	
}

// ----------------------------------
// Get Affiliate Override Language
// ----------------------------------
$select_options = '';
//$default_email_language = $db->query("select email_override from idevaff_affiliates where id = '$linkid'");
$default_email_language = $db->prepare("select email_override from idevaff_affiliates where id = ?");
$default_email_language->execute(array($linkid));
$default_email_language = $default_email_language->fetch();
//$default_email_language = mysql_query("select email_override from idevaff_affiliates where id = '$linkid'");
//$default_email_language = mysql_fetch_array($default_email_language);
$email_table_extension = $default_email_language['email_override'];
if (!$email_table_extension) {
	// ----------------------------------
	// Get Default Email Language
	// ----------------------------------
	$default_email_language = $db->query("select table_name from idevaff_email_language_packs where def = '1'");
	$default_email_language = $default_email_language->fetch();
	//$default_email_language = mysql_query("select table_name from idevaff_email_language_packs where def = '1'");
	//$default_email_language = mysql_fetch_array($default_email_language);
	$email_table_extension = $default_email_language['table_name'];
}
//$get_countries = mysql_query("select name, table_name from idevaff_email_language_packs where status = '1' order by name");
//if (mysql_num_rows($get_countries)) {
//	while ($available_countries = mysql_fetch_array($get_countries)) {
	
$get_countries = $db->query("select name, table_name from idevaff_email_language_packs where status = '1' order by name");
if ($get_countries->rowCount()) {
while ($available_countries=$get_countries->fetch()) {

		$pack_table = $available_countries['table_name'];
		$pack_name = $available_countries['name'];
		$select_options .= "\n<option value='" . $pack_table . "'";
		if ($email_table_extension == $pack_table) { $select_options .= " selected"; }
		$select_options .= ">" . ucwords($pack_name) . "</option>\n";
	} 
	$smarty->assign('select_options', $select_options);
}
//edited by nurul umbhiya
$get_stripe_query = $db->query('SELECT * FROM `idevaff_payment_methods` where name="Stripe"');
$get_stripe_data = $get_stripe_query->fetch();
$is_stripe_enable = (int) $get_stripe_data['enabled'];
$smarty->assign('is_stripe_enable', $is_stripe_enable);
//edit end
if (isset($_POST['edit'])) {
if ($error_list == '') {
$smarty->assign('edit_success', $edit_success);
} else {
$smarty->assign('display_edit_errors', $edit_success);
} } 

$smarty->assign('edit_button', $edit_button);

//$edit_details = $db->query("select f_name, l_name, address_1, address_2, city, state, phone, fax, zip, country, email, company, payable, url, tax_id_ssn, pay_method, paypal, stripe, pp from idevaff_affiliates where id = $linkid");
$edit_details = $db->prepare("select f_name, l_name, address_1, address_2, city, state, phone, fax, zip, country, email, company, payable, url, tax_id_ssn, pay_method, paypal, stripe_user_data, pp from idevaff_affiliates where id = ?");
$edit_details->execute(array($linkid));
$res = $edit_details->fetch();
$f_name = $res['f_name'];
$l_name = $res['l_name'];
$address_1 = $res['address_1'];
$address_2 = $res['address_2'];
$city = $res['city'];
$state = $res['state'];
$phone = $res['phone'];
$fax = $res['fax'];
$zip = $res['zip'];
$country = $res['country'];
if (($f_es == 1) || ($f_cos == 1) || ($f_chs == 1) || ($f_ws == 1) || ($f_ts == 1)) {
$smarty->assign('edit_standard_title', $signup_standard_title);
$smarty->assign('optionals_used', 1); }
if ($f_es == 1) {
if (isset($_POST['email'])) {
$smarty->assign('postemail', html_output ($_POST['email'], ENT_QUOTES, 'UTF-8' ));
} else {
$email = $res['email'];
$smarty->assign('postemail', $email); }
$smarty->assign('edit_standard_email', $signup_standard_email);
$smarty->assign('row_email', 1); }
if ($f_cos == 1) {
if (isset($_POST['company'])) {
$smarty->assign('postcompany', html_output ($_POST['company'], ENT_QUOTES, 'UTF-8' ));
} else {
$company = $res['company'];
$smarty->assign('postcompany', $company); }
$smarty->assign('edit_standard_company', $signup_standard_company);
$smarty->assign('row_company', 1); }
if ($f_chs == 1) {
if (isset($_POST['payable'])) {
$smarty->assign('postchecks', html_output ($_POST['payable'], ENT_QUOTES, 'UTF-8' ));
} else {
$payable = $res['payable'];
$smarty->assign('postchecks', $payable); }
$smarty->assign('edit_standard_checkspayable', $signup_standard_checkspayable);
$smarty->assign('row_checks', 1); }
if ($f_ws == 1) {
if (isset($_POST['url'])) {
$smarty->assign('postwebsite', html_output ($_POST['url'], ENT_QUOTES, 'UTF-8' ));
} else {
$website = $res['url'];
$smarty->assign('postwebsite', $website); }
$smarty->assign('edit_standard_weburl', $signup_standard_weburl);
$smarty->assign('row_website', 1); }

if ($f_ts == 1) {
if (isset($_POST['tax_id_ssn'])) {
$smarty->assign('posttax', html_output ($_POST['tax_id_ssn'], ENT_QUOTES, 'UTF-8' ));
} else {
$get_tax = $db->prepare("SELECT AES_DECRYPT(tax_id_ssn, '" . AUTH_KEY . "') AS decrypted FROM idevaff_affiliates where id = ?");
$get_tax->execute(array($linkid));
$get_tax = $get_tax->fetch();
$tax = $get_tax['decrypted'];
$smarty->assign('posttax', $tax); }
$smarty->assign('edit_standard_taxinfo', $signup_standard_taxinfo);
$smarty->assign('row_taxinfo', 1); }

if (isset($_POST['f_name'])) {
$smarty->assign('postfname', html_output ($_POST['f_name'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postfname', $f_name); }
if (isset($_POST['state'])) {
$smarty->assign('poststate', html_output ($_POST['state'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('poststate', $state); }
if (isset($_POST['l_name'])) {
$smarty->assign('postlname', html_output ($_POST['l_name'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postlname', $l_name); }
if (isset($_POST['phone'])) {
$smarty->assign('postphone', html_output ($_POST['phone'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postphone', $phone); }
if (isset($_POST['address_one'])) {
$smarty->assign('postaddr1', html_output ($_POST['address_one'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postaddr1', $address_1); }
if (isset($_POST['fax'])) {
$smarty->assign('postfaxnm', html_output ($_POST['fax'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postfaxnm', $fax); }
if (isset($_POST['address_two'])) {
$smarty->assign('postaddr2', html_output ($_POST['address_two'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postaddr2', $address_2); }
if (isset($_POST['zip'])) {
$smarty->assign('postzip', html_output ($_POST['zip'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postzip', $zip); }
if (isset($_POST['city'])) {
$smarty->assign('postcity', html_output ($_POST['city'], ENT_QUOTES, 'UTF-8' )); } else {
$smarty->assign('postcity', $city); }
//country dropdown

$c_drop = "";
if (isset ( $_POST ['country'] )) {
    if ($_POST ['country'] != '') {
        $country = html_output ( $_POST ['country'], ENT_QUOTES, 'UTF-8' );
    }
}

$get_countries = $db->query("select * from idevaff_countries order by country_name");

if ($get_countries->rowCount()) {
    while ($qry = $get_countries->fetch()) {
        if ( $country != ""  ) {
            $country_selected = ($qry['country_code'] == $country) ? 'selected="selected"' : '';
        } elseif( $qry['def'] == '1' ) {
            $country_selected = 'selected="selected"';
        } else {
            $country_selected = "";
        }
        $c_drop .= "<option value=\"" . $qry['country_code'] . "\" $country_selected>" . $qry['country_name'] . "</option>\n";

    }
    $smarty->assign ( 'c_drop', $c_drop );
}
    $temp_fields = 'signup_personal_zip,signup_personal_country,signup_personal_title,signup_personal_fname,signup_personal_lname,
signup_personal_addr1,signup_personal_addr2,signup_personal_city,signup_personal_state,signup_personal_phone,signup_personal_fax';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }


    $signup_personal_zip=html_language_output($getlanguage['signup_personal_zip']);
    $signup_personal_country=html_language_output($getlanguage['signup_personal_country']);
    $signup_personal_title=html_language_output($getlanguage['signup_personal_title']);
    $signup_personal_fname=html_language_output($getlanguage['signup_personal_fname']);
    $signup_personal_lname=html_language_output($getlanguage['signup_personal_lname']);
    $signup_personal_addr1=html_language_output($getlanguage['signup_personal_addr1']);
    $signup_personal_addr2=html_language_output($getlanguage['signup_personal_addr2']);
    $signup_personal_city=html_language_output($getlanguage['signup_personal_city']);
    $signup_personal_state=html_language_output($getlanguage['signup_personal_state']);
    $signup_personal_phone=html_language_output($getlanguage['signup_personal_phone']);
    $signup_personal_fax=html_language_output($getlanguage['signup_personal_fax']);

    $smarty->assign('edit_personal_title', $signup_personal_title);
    $smarty->assign('edit_personal_fname', $signup_personal_fname);
    $smarty->assign('edit_personal_state', $signup_personal_state);
    $smarty->assign('edit_personal_lname', $signup_personal_lname);
    $smarty->assign('edit_personal_phone', $signup_personal_phone);
    $smarty->assign('edit_personal_addr1', $signup_personal_addr1);
    $smarty->assign('edit_personal_fax', $signup_personal_fax);
    $smarty->assign('edit_personal_addr2', $signup_personal_addr2);
    $smarty->assign('edit_personal_zip', $signup_personal_zip);
    $smarty->assign('edit_personal_city', $signup_personal_city);
    $smarty->assign('edit_personal_country', $signup_personal_country);

}


if ($data_get == 48) {

    $edit_details = $db->prepare("select pay_method, paypal, stripe_user_data, pp from idevaff_affiliates where id = ?");
    $edit_details->execute(array($linkid));
    $res = $edit_details->fetch();

    $pay_method = (isset($_POST['pay_method'])) ? (int) $_POST['pay_method'] : (int) $res['pay_method'];

    $select_options = '';
    $available_payment_methods = $db->query ( "select * from idevaff_payment_methods where enabled = '1' order by name" );
    
	if ($available_payment_methods->rowCount () > 0) {
        $method_description = '';
        while ( $qry_methods = $available_payment_methods->fetch () ) {

		$method_id = $qry_methods ['id'];
		
		if ($method_id <= 5) {
		if ($method_id == 1) { $temp_fields_desc = 'pm_paypal'; $temp_fields_title = 'pm_title_paypal'; }
		elseif ($method_id == 2) { $temp_fields_desc = 'pm_stripe'; $temp_fields_title = 'pm_title_stripe'; }
		elseif ($method_id == 3) { $temp_fields_desc = 'pm_account_credit'; $temp_fields_title = 'pm_title_credit'; }
		elseif ($method_id == 4) { $temp_fields_desc = 'pm_check_money_order'; $temp_fields_title = 'pm_title_mo'; }
		elseif ($method_id == 5) { $temp_fields_desc = 'pm_wire'; $temp_fields_title = 'pm_title_wire'; }

		$query = $db->query("select {$temp_fields_desc},{$temp_fields_title} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$getlanguage=$query->fetch();

		$desc = $getlanguage[$temp_fields_desc];
		$method_name = $getlanguage[$temp_fields_title];
		
		} else {
		$desc = '';
		$method_name = $qry_methods ['name'];
		}

            if ( isset($qry_methods['description']) ) {
                $method_description .= "<span class='payment_description method_{$method_id}'>{$qry_methods['description']}</span>";
            }

            $select_options .= "\n<option value='" . $method_id . "'";
            if($pay_method == $method_id) $select_options .= " selected='selected' ";
            $select_options .= ">" . $method_name . "</option>\n";
        }
        $smarty->assign ( 'select_multiple_methods', 1 );
        $smarty->assign ( 'select_available_payment_methods', $select_options );
        $smarty->assign ( 'payment_method_description', $method_description );
    }


    $paypal = isset($_POST['pp_account']) ?  html_output ($_POST['pp_account'], ENT_QUOTES, 'UTF-8' ) : $res['paypal'];
    $smarty->assign('pp_account',$paypal);


    //work with stripe here
    $stripe_user_data = unserialize(base64_decode($res['stripe_user_data']));
    if(is_array($stripe_user_data) && !empty($stripe_user_data) && $stripe_user_data['access_token'] != '') {
        //stripe account is ok
        $smarty->assign('stripeToken',$stripe_success);
        $smarty->assign('showStripeForm','no');
    } else {
        //show stripe button
        $oauth = (new StripeOAuth(
            STRIPE_PLATFORM_SECRET,
            STRIPE_API_SECRET
        ));
        $redirect_url = str_replace('http://', 'https://', $base_url) . '/account.php?page=48';
        //$redirect_url = $base_url . '/account.php?page=17';

        $url = $oauth->getAuthorizeUri(array('redirect_uri' => $redirect_url,'scope'=>'read_write'), false);
        $smarty->assign('stripeUrl',$url);
        $smarty->assign('showStripeForm','yes');
    }


    $smarty->assign('edit_page_button', $edit_button);

}

if ($data_get == 25) {
$get_others = $db->query("select * from idevaff_pdf where pdf_type = '2' ORDER BY sort"); 
$others_results = array(); 
$i=0; 
while ($r=$get_others->fetch()) {
$pdf_filename = $r['filename'];
$pdf_desc = $r['pdf_desc'];
$pdf_size = number_format($r['size']);
            $tmp = array( 
                'pdf_filename' => $pdf_filename, 
                'pdf_desc' => $pdf_desc, 
                'pdf_size' => $pdf_size
            );
            $pdf_results[$i++] = $tmp;
}

    $temp_fields = 'pdf_title,pdf_training,pdf_marketing,pdf_description_1,pdf_description_2,pdf_file_name,pdf_file_size,
    pdf_file_description,pdf_bytes';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $pdf_title=html_language_output($getlanguage['pdf_title']);
    $pdf_training=html_language_output($getlanguage['pdf_training']);
    $pdf_marketing=html_language_output($getlanguage['pdf_marketing']);
    $pdf_description_1=html_language_output($getlanguage['pdf_description_1']);
    $pdf_description_2=html_language_output($getlanguage['pdf_description_2']);
    $pdf_file_name=html_language_output($getlanguage['pdf_file_name']);
    $pdf_file_size=html_language_output($getlanguage['pdf_file_size']);
    $pdf_file_description=html_language_output($getlanguage['pdf_file_description']);
    $pdf_bytes=html_language_output($getlanguage['pdf_bytes']);

    $smarty->assign('pdf_results', $pdf_results);

    $smarty->assign('pdf_title', $pdf_title);
    $smarty->assign('pdf_training', $pdf_training);
    $smarty->assign('pdf_description_1', $pdf_description_1);
    $smarty->assign('pdf_description_2', $pdf_description_2);
    $smarty->assign('pdf_file_name', $pdf_file_name);
    $smarty->assign('pdf_file_size', $pdf_file_size);
    $smarty->assign('pdf_file_description', $pdf_file_description);
    $smarty->assign('pdf_bytes', $pdf_bytes);
}

if ($data_get == 27) {
    $temp_fields = 'logo_bullet_three,logo_bullet_size_one,logo_bullet_size_two,logo_bullet_req_size_one,logo_bullet_req_size_two,
logo_bullet_pixels,logo_choose,logo_file,logo_browse,logo_button,logo_current,logo_remove,logo_display_status,logo_pending,
logo_approved,logo_success,logo_error_title,logo_title,logo_info,logo_bullet_one,logo_bullet_two';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $logo_bullet_three=html_language_output($getlanguage['logo_bullet_three']);
    $logo_bullet_size_one=html_language_output($getlanguage['logo_bullet_size_one']);
    $logo_bullet_size_two=html_language_output($getlanguage['logo_bullet_size_two']);
    $logo_bullet_req_size_one=html_language_output($getlanguage['logo_bullet_req_size_one']);
    $logo_bullet_req_size_two=html_language_output($getlanguage['logo_bullet_req_size_two']);
    $logo_bullet_pixels=html_language_output($getlanguage['logo_bullet_pixels']);
    $logo_choose=html_language_output($getlanguage['logo_choose']);
    $logo_file=html_language_output($getlanguage['logo_file']);
    $logo_browse=html_language_output($getlanguage['logo_browse']);
    $logo_button=html_language_output($getlanguage['logo_button']);
    $logo_current=html_language_output($getlanguage['logo_current']);
    $logo_remove=html_language_output($getlanguage['logo_remove']);
    $logo_display_status=html_language_output($getlanguage['logo_display_status']);
    $logo_pending=html_language_output($getlanguage['logo_pending']);
    $logo_approved=html_language_output($getlanguage['logo_approved']);
    $logo_success=html_language_output($getlanguage['logo_success']);
    $logo_error_title=html_language_output($getlanguage['logo_error_title']);
    $logo_title=html_language_output($getlanguage['logo_title']);
    $logo_info=html_language_output($getlanguage['logo_info']);
    $logo_bullet_one=html_language_output($getlanguage['logo_bullet_one']);
    $logo_bullet_two=html_language_output($getlanguage['logo_bullet_two']);


    $smarty->assign('logo_error_title', $logo_error_title);
    $smarty->assign('logo_title', $logo_title);
    $smarty->assign('logo_info', $logo_info);
    $smarty->assign('logo_bullet_one', $logo_bullet_one);
    $smarty->assign('logo_bullet_two', $logo_bullet_two);
    $smarty->assign('logo_bullet_three', $logo_bullet_three);
    $smarty->assign('logo_bullet_size_one', $logo_bullet_size_one);
    $smarty->assign('logo_bullet_size_two', $logo_bullet_size_two);
    $smarty->assign('logo_bullet_req_size_one', $logo_bullet_req_size_one);
    $smarty->assign('logo_bullet_req_size_two', $logo_bullet_req_size_two);
    $smarty->assign('logo_bullet_pixels', $logo_bullet_pixels);
    $smarty->assign('logo_choose', $logo_choose);
    $smarty->assign('logo_file', $logo_file);
    $smarty->assign('logo_browse', $logo_browse);
    $smarty->assign('logo_button', $logo_button);
    $smarty->assign('logo_current', $logo_current);
    $smarty->assign('logo_remove', $logo_remove);
    $smarty->assign('logo_display_status', $logo_display_status);
    $smarty->assign('logo_success', $logo_success);

//$get_logo = $db->query("select filename, approved from idevaff_logos where id = '$linkid'");
$get_logo = $db->prepare("select filename, approved from idevaff_logos where id = ?");
$get_logo->execute(array($linkid));
// if ($get_logo->fetch()) {
if ($get_logo->rowCount()) {

$query_result = $get_logo->fetch();

$logo = "assets/logos/" . $query_result['filename'];
list($width, $height, $type, $attr) = getimagesize($logo);
$image_height = $height;
$image_width = $width;
$status = $query_result['approved'];
if ($status == 1) { $status = $logo_approved; } else { $status = $logo_pending; }
$smarty->assign('image_exists', 1);
} else {
$logo = "images/nologo.gif";
list($width, $height, $type, $attr) = getimagesize($logo);
$image_height = $height;
$image_width = $width;
$status = $logo_approved; }

$logo_width = number_format($logo_w);
$logo_height = number_format($logo_h);
if (!$logo_type) { $logo_type = 0; }

if ($logo_type == 1) { $smarty->assign('logo_size_required', 1); }

$smarty->assign('logo_height', $logo_height);
$smarty->assign('logo_width', $logo_width);

$smarty->assign('image_status', $status);
$smarty->assign('image', $logo);
$smarty->assign('image_width', $image_width);
$smarty->assign('image_height', $image_height);

}

if ($data_get == 36) {

//$get1 = $db->query("select distinct tid1 from idevaff_iptracking where tid1 != '' and acct_id = '$linkid'");
$get1 = $db->prepare("select distinct tid1 from idevaff_iptracking where tid1 != '' and acct_id = ?");
$get1->execute(array($linkid));
if ($get1->rowCount()) {
$smarty->assign('tid1_set', 1);
$get1_results = array(); 
$i=0; 
while ($r=$get1->fetch()) {
$tid1_res=$r['tid1'];
		$tmp = array('tid1_value' => $tid1_res);
		$get1_results[$i++] = $tmp; }
$smarty->assign('get1_results', $get1_results); }

//$get2 = $db->query("select distinct tid2 from idevaff_iptracking where tid2 != '' and acct_id = '$linkid'");
$get2 = $db->prepare("select distinct tid2 from idevaff_iptracking where tid2 != '' and acct_id = ?");
$get2->execute(array($linkid));
if ($get2->rowCount()) {
$smarty->assign('tid2_set', 1);
$get2_results = array(); 
$i=0; 
while ($r=$get2->fetch()) {
$tid2_res=$r['tid2'];
		$tmp = array('tid2_value' => $tid2_res);
		$get2_results[$i++] = $tmp; }
$smarty->assign('get2_results', $get2_results); }

//$get3 = $db->query("select distinct tid3 from idevaff_iptracking where tid3 != '' and acct_id = '$linkid'");
$get3 = $db->prepare("select distinct tid3 from idevaff_iptracking where tid3 != '' and acct_id = ?");
$get3->execute(array($linkid));
if ($get3->fetch()) {
$smarty->assign('tid3_set', 1);
$get3_results = array(); 
$i=0; 
while ($r=$get3->fetch()) {
$tid3_res=$r['tid3'];
		$tmp = array('tid3_value' => $tid3_res);
		$get3_results[$i++] = $tmp; }
$smarty->assign('get3_results', $get3_results); }

//$get4 = $db->query("select distinct tid4 from idevaff_iptracking where tid4 != '' and acct_id = '$linkid'");
$get4 = $db->prepare("select distinct tid4 from idevaff_iptracking where tid4 != '' and acct_id = ?");
$get4->execute(array($linkid));
if ($get4->rowCount()) {
$smarty->assign('tid4_set', 1);
$get4_results = array(); 
$i=0; 
while ($r=$get4->fetch()) {
$tid4_res=$r['tid4'];
		$tmp = array('tid4_value' => $tid4_res);
		$get4_results[$i++] = $tmp; }
$smarty->assign('get4_results', $get4_results); }


    $temp_fields = 'cr_title,cr_select,cr_none,cr_button,cr_no_results,cr_no_results_info,cr_used,cr_found,
    cr_times,cr_unique,cr_detailed,cr_export';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $cr_title=html_language_output($getlanguage['cr_title']);
    $cr_select=html_language_output($getlanguage['cr_select']);
    $cr_none=html_language_output($getlanguage['cr_none']);
    $cr_button=html_language_output($getlanguage['cr_button']);
    $cr_no_results=html_language_output($getlanguage['cr_no_results']);
    $cr_no_results_info=html_language_output($getlanguage['cr_no_results_info']);
    $cr_used=html_language_output($getlanguage['cr_used']);
    $cr_found=html_language_output($getlanguage['cr_found']);
    $cr_times=html_language_output($getlanguage['cr_times']);
    $cr_unique=html_language_output($getlanguage['cr_unique']);
    $cr_detailed=html_language_output($getlanguage['cr_detailed']);
    $cr_export=html_language_output($getlanguage['cr_export']);


    $smarty->assign('cr_title', $cr_title);
    $smarty->assign('cr_select', $cr_select);
    $smarty->assign('cr_none', $cr_none);
    $smarty->assign('cr_button', $cr_button);
    $smarty->assign('cr_no_results', $cr_no_results);
    $smarty->assign('cr_no_results_info', $cr_no_results_info);
    $smarty->assign('cr_used', $cr_used);
    $smarty->assign('cr_found', $cr_found);
    $smarty->assign('cr_times', $cr_times);
    $smarty->assign('cr_unique', $cr_unique);
    $smarty->assign('cr_detailed', $cr_detailed);
    $smarty->assign('cr_export', $cr_export);

if ((isset($_POST['custom_report'])) && ($_POST['custom_report'] == 1)) {

$smarty->assign('custom_report_picked', 1);

if ($_POST['tid1'] == 'none') { $tid1 = null; } else { $tid1 = $_POST['tid1']; $add1 = "and tid1 = '" . $tid1 . "'"; }
if ($_POST['tid2'] == 'none') { $tid2 = null; } else { $tid2 = $_POST['tid2']; $add2 = "and tid2 = '" . $tid2 . "'"; }
if ($_POST['tid3'] == 'none') { $tid3 = null; } else { $tid3 = $_POST['tid3']; $add3 = "and tid3 = '" . $tid3 . "'"; }
if ($_POST['tid4'] == 'none') { $tid4 = null; } else { $tid4 = $_POST['tid4']; $add4 = "and tid4 = '" . $tid4 . "'"; }

if (!$tid1) { $add1 = null; }
if (!$tid2) { $add2 = null; }
if (!$tid3) { $add3 = null; }
if (!$tid4) { $add4 = null; }

if ( ($tid1) || ($tid2) || ($tid3) || ($tid4) ) {

$sql = 'SELECT tid1, tid2, tid3, tid4, count(*) as num_rows FROM idevaff_iptracking';
$sql_where = "AND acct_id = '$linkid' AND";
$sql_groupby = '';

if($tid1 != "") { $sql_where .= "AND tid1 = '$tid1' AND"; } else { $sql_groupby .= ",tid1,"; }
if($tid2 != "") { $sql_where .= "AND tid2 = '$tid2' AND"; } else { $sql_groupby .= ",tid2,"; }
if($tid3 != "") { $sql_where .= "AND tid3 = '$tid3' AND"; } else { $sql_groupby .= ",tid3,"; }
if($tid4 != "") { $sql_where .= "AND tid4 = '$tid4' AND"; } else { $sql_groupby .= ",tid4,"; }

if($sql_where != "") {
    $sql_where = substr($sql_where, 3, strlen($sql_where) -6 );
    $sql_where = preg_replace('/ANDAND/', 'AND', $sql_where);
    $sql_where = " WHERE " . $sql_where; }

$sql .= $sql_where;

if($sql_groupby != "") {

    $sql_groupby = substr($sql_groupby, 1, strlen($sql_groupby) -2 );

    $sql_groupby = preg_replace('/,,/', ',', $sql_groupby);

    $sql_groupby = " GROUP BY " . $sql_groupby; }
    else {
    // We need some sort of group by for the count(*)
    $sql_groupby = " GROUP BY tid1 ";
    }

$sql .= $sql_groupby;
// echo $sql;
$get_report = $db->query($sql);

if ($get_report->rowCount()) {

$rep_tot_lks = $get_report->rowCount();

$smarty->assign('report_total_links', $rep_tot_lks);
$smarty->assign('custom_logs_exist', 1);

$traffic_results = array();
$i=0;

while ($r=$get_report->fetch()) {
$atid1 = $r['tid1'];
$atid2 = $r['tid2'];
$atid3 = $r['tid3'];
$atid4 = $r['tid4'];
$anum_rows = $r['num_rows'];

if ($atid1) { $tid1drop = $atid1; } else { $tid1drop = ''; }
if ($atid2) { $tid2drop = $atid2; } else { $tid2drop = ''; }
if ($atid3) { $tid3drop = $atid3; } else { $tid3drop = ''; }
if ($atid4) { $tid4drop = $atid4; } else { $tid4drop = ''; }

if ($atid1) {
$aadd1 = " | tid1=";
if ($tid1) {
$atid1 = "<font color='#CC0000'>$atid1</font>"; }
$aadd1 .= $atid1;
} else { $aadd1 = null; }

if ($atid2) {
$aadd2 = " | tid2=";
if ($tid2) {
$atid2 = "<font color='#CC0000'>$atid2</font>"; }
$aadd2 .= $atid2;
} else { $aadd2 = null; }

if ($atid3) {
$aadd3 = " | tid3=";
if ($tid3) {
$atid3 = "<font color='#CC0000'>$atid3</font>"; }
$aadd3 .= $atid3;
} else { $aadd3 = null; }

if ($atid4) {
$aadd4 = " | tid4=";
if ($tid4) {
$atid4 = "<font color='#CC0000'>$atid4</font>"; }
$aadd4 .= $atid4;
} else { $aadd4 = null; }

$keywords = $aadd1 . $aadd2 . $aadd3 . $aadd4 . " |";

            $tmp = array(

                'report_keywords' => $keywords,
                'report_links' => $anum_rows, 
                'report_tid1' => $tid1drop, 
                'report_tid2' => $tid2drop, 
                'report_tid3' => $tid3drop, 
                'report_tid4' => $tid4drop
            );

            $report_results[$i++] = $tmp; }

$smarty->assign('report_results', $report_results);
} else { $smarty->assign('no_results_found', 1); } } else { $smarty->assign('no_results_found', 1); } }
}

if ((isset($_POST['sub_report'])) && ($_POST['sub_report'] == 1)) {
$smarty->assign('sub_report_picked', 1);

    $temp_fields = 'details_title,details_drop_1,details_drop_2,details_drop_3,details_drop_4,details_drop_5,details_drop_6,
    details_button,details_date,details_status,details_commission,details_details,details_none,details_no_group,details_choose';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $details_title=html_language_output($getlanguage['details_title']);
    $details_drop_1=html_language_output($getlanguage['details_drop_1']);
    $details_drop_2=html_language_output($getlanguage['details_drop_2']);
    $details_drop_3=html_language_output($getlanguage['details_drop_3']);
    $details_drop_4=html_language_output($getlanguage['details_drop_4']);
    $details_drop_5=html_language_output($getlanguage['details_drop_5']);
    $details_drop_6=html_language_output($getlanguage['details_drop_6']);
    $details_button=html_language_output($getlanguage['details_button']);
    $details_date=html_language_output($getlanguage['details_date']);
    $details_status=html_language_output($getlanguage['details_status']);
    $details_commission=html_language_output($getlanguage['details_commission']);
    $details_details=html_language_output($getlanguage['details_details']);
    $details_none=html_language_output($getlanguage['details_none']);
    $details_no_group=html_language_output($getlanguage['details_no_group']);
    $details_choose=html_language_output($getlanguage['details_choose']);

$smarty->assign('details_title', $details_title);
$smarty->assign('details_button', $details_button);
$smarty->assign('details_date', $details_date);
$smarty->assign('details_status', $details_status);
$smarty->assign('details_commission', $details_commission);
$smarty->assign('details_details', $details_details);
$smarty->assign('details_none', $details_none);
$smarty->assign('details_no_group', $details_no_group);
$smarty->assign('details_choose', $details_choose);
$smarty->assign('details_drop_1', $details_drop_1);
$smarty->assign('details_drop_2', $details_drop_2);
$smarty->assign('details_drop_3', $details_drop_3);
$smarty->assign('details_drop_4', $details_drop_4);
$smarty->assign('details_drop_5', $details_drop_5);
$smarty->assign('details_drop_6', $details_drop_6);

if (isset($_REQUEST['report'])) {
$smarty->assign('commission_group_chosen', 1); }
if ((isset($_REQUEST['report'])) && ($_REQUEST['report'] == 1)) {
$smarty->assign('commission_group_name', $details_drop_1);
$lpast = $db->prepare("select record, code, payment, approved from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '0' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }
if ((isset($_REQUEST['report'])) && ($_REQUEST['report'] == 2)) {
$smarty->assign('commission_group_name', $details_drop_2);
$lpast = $db->prepare("select record, code, payment, approved from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '1' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }
if ((isset($_REQUEST['report'])) && ($_REQUEST['report'] == 3)) {
$smarty->assign('commission_group_name', $details_drop_3);
$lpast = $db->prepare("select record, code, payment, approved from idevaff_sales where id = ? and approved = '0' and delay = '0' and payment != 0 ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }
if ((isset($_REQUEST['report'])) && ($_REQUEST['report'] == 4)) { 
$smarty->assign('commission_group_name', $details_drop_4);
$lpast = $db->prepare("select record, code, payment from idevaff_archive where id = ? and top_tier_tag = '0' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }
if ((isset($_REQUEST['report'])) && ($_REQUEST['report'] == 5)) { 
$smarty->assign('commission_group_name', $details_drop_5);
$lpast = $db->prepare("select record, code, payment from idevaff_archive where id = ? and top_tier_tag = '1' ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }
if ((isset($_REQUEST['report'])) && ($_REQUEST['report'] == 6)) {
$smarty->assign('commission_group_name', $details_drop_6);
$lpast = $db->prepare("select record, code, payment, approved, sub_id from idevaff_sales where id = ? and approved = '0' and delay = '1' and payment != 0 ORDER BY code DESC");
$lpast->execute(array($linkid));
if ($lpast->rowCount()) { $smarty->assign('commission_results_exist', 1); } }
if (isset($_REQUEST['report'])) {
$commission_group_results = array(); 
$i=0;
while ($pqry = $lpast->fetch()) {
$record_id=$pqry['record'];
$commission_date=date($dateformat, $pqry['code']);
$commission_amount=$pqry['payment'];
if ($_REQUEST['report'] < 4) {
$papp=$pqry['approved']; }
if (($_REQUEST['report'] == 4) || ($_REQUEST['report'] == 5)) {
$record_type = 2;
$distype = $details_type_1;
} elseif ($_REQUEST['report'] == 3) {
$record_type = 3;
$distype = $details_type_2;
} elseif ($_REQUEST['report'] == 6) {
$record_type = 6;
$distype = $details_type_6;
} else {
$record_type = 1;
$distype = $details_type_3; }
            $tmpcm = array( 
                'commission_results_date' => $commission_date, 
                'commission_results_type' => $distype, 
                'commission_results_amount' => $commission_amount, 
                'commission_results_record_type' => $record_type, 
                'commission_results_record_id' => $record_id 
            );
            $commission_group_results[$i++] = $tmpcm; }
$smarty->assign('commission_group_results', $commission_group_results);
}

}

$get_pic = $db->query("select picture from idevaff_affiliates where id = '" . $_SESSION[$install_directory_name.'_idev_LoggedID'] . "'");
$get_pic_result = $get_pic->fetch();
$picture = $get_pic_result['picture'];

if ($picture != '') {
$smarty->assign('picture_exists', 1);
$picture_details = "assets/pictures/" . $picture;
} else {
$picture_details = "images/default_image.jpg";
}

list($width, $height, $type, $attr) = getimagesize($picture_details);
$image_height = $height;
$image_width = $width;
$smarty->assign('image_height', $image_height);
$smarty->assign('image_width', $image_width);
$smarty->assign('picture_details', $picture_details);

if ($data_get == 43) {
	
    $temp_fields = 'pic_error_title,pic_missing,pic_invalid,pic_error,pic_success,pic_title,pic_info,pic_bullet_1,
    pic_bullet_2,pic_bullet_3,pic_file,pic_button,pic_current,pic_remove';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $pic_error_title=html_language_output($getlanguage['pic_error_title']);
    $pic_missing=html_language_output($getlanguage['pic_missing']);
    $pic_invalid=html_language_output($getlanguage['pic_invalid']);
    $pic_error=html_language_output($getlanguage['pic_error']);
    $pic_success=html_language_output($getlanguage['pic_success']);
    $pic_title=html_language_output($getlanguage['pic_title']);
    $pic_info=html_language_output($getlanguage['pic_info']);
    $pic_bullet_1=html_language_output($getlanguage['pic_bullet_1']);
    $pic_bullet_2=html_language_output($getlanguage['pic_bullet_2']);
    $pic_bullet_3=html_language_output($getlanguage['pic_bullet_3']);
    $pic_file=html_language_output($getlanguage['pic_file']);
    $pic_button=html_language_output($getlanguage['pic_button']);
    $pic_current=html_language_output($getlanguage['pic_current']);
    $pic_remove=html_language_output($getlanguage['pic_remove']);

$smarty->assign('picture_error_title', $pic_error_title);

$smarty->assign('pic_missing', $pic_missing);
$smarty->assign('pic_invalid', $pic_invalid);
$smarty->assign('pic_error', $pic_error);
$smarty->assign('pic_success', $pic_success);
$smarty->assign('pic_title', $pic_title);
$smarty->assign('pic_info', $pic_info);
$smarty->assign('pic_bullet_1', $pic_bullet_1);
$smarty->assign('pic_bullet_2', $pic_bullet_2);
$smarty->assign('pic_bullet_3', $pic_bullet_3);
$smarty->assign('pic_file', $pic_file);
$smarty->assign('pic_button', $pic_button);
$smarty->assign('pic_current', $pic_current);
$smarty->assign('pic_remove', $pic_remove);
}



?>