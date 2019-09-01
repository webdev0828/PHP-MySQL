<?php

$control_panel_session = true;
include_once 'includes/control_panel.php';
include_once 'includes/session.check_affiliates.php';
include 'includes/video_source/key-gen.php';
require_once 'API/stripe/config.php';
if (isset($_GET['code'], $_GET['scope'])) {
    $oauth = new StripeOAuth(STRIPE_PLATFORM_SECRET, STRIPE_API_SECRET);

    try {
        $tokens = $oauth->getTokens($_GET['code'], false);
        $tokens = base64_encode(serialize($tokens));
        $st = $db->prepare('update idevaff_affiliates set stripe_user_data = ?, pay_method = ? where id = ?');
        $st->execute([$tokens, '2', $_SESSION[$install_directory_name . '_idev_LoggedID']]);
    } catch (Exception $ex) {
        $tokens = [];
        $tokens = base64_encode(serialize($tokens));
        $st = $db->prepare('update idevaff_affiliates set stripe_user_data = ? where id = ?');
        $st->execute([$tokens, $_SESSION[$install_directory_name . '_idev_LoggedID']]);
    }
}

if (isset($_POST['terms_accepted']) && true === $_POST['terms_accepted']) {
    $db->query("update idevaff_affiliates set tc_status = '1' where id = '" . $_SESSION[$install_directory_name . '_idev_LoggedID'] . "'");
    $timenow = time();
    $get_user_id = $_SESSION[$install_directory_name . '_idev_LoggedID'];
    $get_update_record = $db->query('select record from idevaff_tc_updates ORDER BY record DESC LIMIT 1');
    $get_update_record = $get_update_record->fetch();
    $get_update_record = $get_update_record['record'];
    $st = $db->prepare('insert into idevaff_tc_log (update_record, aff_id, stamp) VALUES (?, ?, ?)');
    $st->execute([$get_update_record, $get_user_id, $timenow]);
}

if (isset($_POST['terms_accepted']) && true === $_POST['terms_accepted']) {
    $db->query("update idevaff_affiliates set tc_status = '1' where id = '" . $_SESSION[$install_directory_name . '_idev_LoggedID'] . "'");
}

if (isset($_POST['id_update'])) {
    $custom_value = (isset($_POST['custom_value']) ? html_output($_POST['custom_value']) : '');
    $id_update = (isset($_POST['id_update']) ? html_output($_POST['id_update']) : '');
    $aff_id = (isset($_POST['id']) ? html_output($_POST['id']) : '');
    $custom_id = (isset($_POST['custom_id']) ? html_output($_POST['custom_id']) : '');
    if (null === $id_update) {
        $statement = $db->prepare('insert into idevaff_form_custom_data (affid, custom_id, custom_value) VALUES (?, ?, ?)');
        $statement->execute([$_SESSION[$install_directory_name . '_idev_LoggedID'], $custom_id, $custom_value]);
    } else {
        $statement = $db->prepare('update idevaff_form_custom_data set custom_value = ? where id = ? AND affid = ?');
        $statement->execute([$custom_value, $id_update, $_SESSION[$install_directory_name . '_idev_LoggedID']]);
    }

    $smarty->assign('edit_success', $edit_success);
}

$temp_fields = 'comdetails_title,change_comm_curr_comm,change_comm_curr_pay';

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    exit();
}
$comdetails_title = html_language_output($getlanguage['comdetails_title']);
$current_comm_details = html_language_output($getlanguage['change_comm_curr_comm']);
$current_comm_pay = html_language_output($getlanguage['change_comm_curr_pay']);
$smarty->assign('comdetails_title', $comdetails_title);
$smarty->assign('current_comm_details', $current_comm_details);
$smarty->assign('current_comm_pay', $current_comm_pay);
$temp_fields = "menu_drop_general_stats,menu_drop_tier_stats,menu_coupon,menu_marketing_videos,menu_announcements,menu_banners,\r\nmenu_page_peels,menu_lightboxes,menu_text_ads,menu_html_links,menu_text_links,menu_email_links,menu_email_templates,\r\nmenu_offline,menu_pdf_marketing,menu_heading_custom_links,invoice_button";

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    exit();
}
$menu_drop_general_stats = html_language_output($getlanguage['menu_drop_general_stats']);
$menu_drop_tier_stats = html_language_output($getlanguage['menu_drop_tier_stats']);
$menu_coupon = html_language_output($getlanguage['menu_coupon']);
$menu_marketing_videos = html_language_output($getlanguage['menu_marketing_videos']);
$menu_announcements = html_language_output($getlanguage['menu_announcements']);
$menu_banners = html_language_output($getlanguage['menu_banners']);
$menu_page_peels = html_language_output($getlanguage['menu_page_peels']);
$menu_lightboxes = html_language_output($getlanguage['menu_lightboxes']);
$menu_text_ads = html_language_output($getlanguage['menu_text_ads']);
$menu_html_links = html_language_output($getlanguage['menu_html_links']);
$menu_text_links = html_language_output($getlanguage['menu_text_links']);
$menu_email_links = html_language_output($getlanguage['menu_email_links']);
$menu_email_templates = html_language_output($getlanguage['menu_email_templates']);
$menu_offline = html_language_output($getlanguage['menu_offline']);
$menu_pdf_marketing = html_language_output($getlanguage['menu_pdf_marketing']);
$menu_heading_custom_links = html_language_output($getlanguage['menu_heading_custom_links']);
$invoice_button = html_language_output($getlanguage['invoice_button']);
$temp_fields = "menu_custom_reports,menu_keyword_links,menu_subid_links,menu_alteranate_links,menu_heading_additional,\r\nmenu_heading_training_materials,menu_videos,menu_pdf_training,menu_custom_manual,menu_drop_heading_commissions,\r\nmenu_drop_current,menu_drop_tier,menu_drop_pending,menu_drop_delayed";

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
$menu_custom_reports = html_language_output($getlanguage['menu_custom_reports']);
$menu_keyword_links = html_language_output($getlanguage['menu_keyword_links']);
$menu_subid_links = html_language_output($getlanguage['menu_subid_links']);
$menu_alteranate_links = html_language_output($getlanguage['menu_alteranate_links']);
$menu_heading_additional = html_language_output($getlanguage['menu_heading_additional']);
$menu_heading_training_materials = html_language_output($getlanguage['menu_heading_training_materials']);
$menu_videos = html_language_output($getlanguage['menu_videos']);
$menu_pdf_training = html_language_output($getlanguage['menu_pdf_training']);
$menu_custom_manual = html_language_output($getlanguage['menu_custom_manual']);
$menu_drop_heading_commissions = html_language_output($getlanguage['menu_drop_heading_commissions']);
$menu_drop_current = html_language_output($getlanguage['menu_drop_current']);
$menu_drop_tier = html_language_output($getlanguage['menu_drop_tier']);
$menu_drop_pending = html_language_output($getlanguage['menu_drop_pending']);
$menu_drop_delayed = html_language_output($getlanguage['menu_drop_delayed']);
$temp_fields = "menu_drop_paid,menu_drop_paid_rec,menu_drop_pending_debits,menu_drop_heading_history,\r\nmenu_drop_heading_traffic,progress_complete,progress_none,progress_sentence_1,progress_sentence_2,progress_sentence_3,\r\nad_info,edit_button,account_standard_linking_code,account_copy_paste,account_not_approved,account_suspended,\r\naccount_total_transactions,account_standard_earnings,account_earned_todate";

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    exit();
}
$menu_drop_paid = html_language_output($getlanguage['menu_drop_paid']);
$menu_drop_paid_rec = html_language_output($getlanguage['menu_drop_paid_rec']);
$menu_drop_pending_debits = html_language_output($getlanguage['menu_drop_pending_debits']);
$menu_drop_heading_history = html_language_output($getlanguage['menu_drop_heading_history']);
$menu_drop_heading_traffic = html_language_output($getlanguage['menu_drop_heading_traffic']);
$progress_complete = html_language_output($getlanguage['progress_complete']);
$progress_none = html_language_output($getlanguage['progress_none']);
$progress_sentence_1 = html_language_output($getlanguage['progress_sentence_1']);
$progress_sentence_2 = html_language_output($getlanguage['progress_sentence_2']);
$progress_sentence_3 = html_language_output($getlanguage['progress_sentence_3']);
$account_standard_linking_code = html_language_output($getlanguage['account_standard_linking_code']);
$account_copy_paste = html_language_output($getlanguage['account_copy_paste']);
$account_not_approved = html_language_output($getlanguage['account_not_approved']);
$account_suspended = html_language_output($getlanguage['account_suspended']);
$account_total_transactions = html_language_output($getlanguage['account_total_transactions']);
$account_standard_earnings = html_language_output($getlanguage['account_standard_earnings']);
$account_earned_todate = html_language_output($getlanguage['account_earned_todate']);
$temp_fields = "menu_heading_overview,menu_general_stats,menu_tier_stats,menu_tier_linking_code,progress_title,\r\nmenu_payment_history,menu_commission_details,menu_traffic_log,menu_heading_marketing,\r\nmenu_heading_management,menu_edit_account,menu_change_pass,menu_change_commission,menu_heading_general_info,\r\nlinks_title,marketing_target_url,marketing_source_code";

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    exit();
}
$menu_heading_overview = html_language_output($getlanguage['menu_heading_overview']);
$menu_general_stats = html_language_output($getlanguage['menu_general_stats']);
$menu_tier_stats = html_language_output($getlanguage['menu_tier_stats']);
$menu_tier_linking_code = html_language_output($getlanguage['menu_tier_linking_code']);
$progress_title = html_language_output($getlanguage['progress_title']);
$menu_payment_history = html_language_output($getlanguage['menu_payment_history']);
$menu_commission_details = html_language_output($getlanguage['menu_commission_details']);
$menu_traffic_log = html_language_output($getlanguage['menu_traffic_log']);
$menu_heading_marketing = html_language_output($getlanguage['menu_heading_marketing']);
$menu_heading_management = html_language_output($getlanguage['menu_heading_management']);
$menu_edit_account = html_language_output($getlanguage['menu_edit_account']);
$menu_change_pass = html_language_output($getlanguage['menu_change_pass']);
$menu_change_commission = html_language_output($getlanguage['menu_change_commission']);
$menu_heading_general_info = html_language_output($getlanguage['menu_heading_general_info']);
$links_title = html_language_output($getlanguage['links_title']);
$marketing_target_url = html_language_output($getlanguage['marketing_target_url']);
$marketing_source_code = html_language_output($getlanguage['marketing_source_code']);
$temp_fields = "general_current_earnings,general_traffic_unique,general_last_30_days_activity,paypal_required,\r\ngeneral_last_30_days_activity_traffic,general_last_30_days_activity_commissions,account_hidden,\r\nmenu_drop_heading_stats,menu_drop_heading_account,account_second_tier,account_not_available,account_inc_bonus";

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    exit();
}
$general_current_earnings = html_language_output($getlanguage['general_current_earnings']);
$general_traffic_unique = html_language_output($getlanguage['general_traffic_unique']);
$general_last_30_days_activity = html_language_output($getlanguage['general_last_30_days_activity']);
$general_last_30_days_activity_traffic = html_language_output($getlanguage['general_last_30_days_activity_traffic']);
$general_last_30_days_activity_commissions = html_language_output($getlanguage['general_last_30_days_activity_commissions']);
$account_hidden = html_language_output($getlanguage['account_hidden']);
$menu_drop_heading_stats = html_language_output($getlanguage['menu_drop_heading_stats']);
$menu_drop_heading_account = html_language_output($getlanguage['menu_drop_heading_account']);
$account_second_tier = html_language_output($getlanguage['account_second_tier']);
$account_not_available = html_language_output($getlanguage['account_not_available']);
$account_inc_bonus = html_language_output($getlanguage['account_inc_bonus']);
$paypal_required = html_language_output($getlanguage['paypal_required']);
$smarty->assign('menu_drop_heading_stats', $menu_drop_heading_stats);
$smarty->assign('menu_drop_heading_commissions', $menu_drop_heading_commissions);
$smarty->assign('menu_drop_heading_history', $menu_drop_heading_history);
$smarty->assign('menu_drop_heading_traffic', $menu_drop_heading_traffic);
$smarty->assign('menu_drop_heading_account', $menu_drop_heading_account);
$smarty->assign('menu_drop_general_stats', $menu_drop_general_stats);
$smarty->assign('menu_drop_tier_stats', $menu_drop_tier_stats);
$smarty->assign('menu_drop_current', $menu_drop_current);
$smarty->assign('menu_drop_tier', $menu_drop_tier);
$smarty->assign('menu_drop_pending', $menu_drop_pending);
$smarty->assign('menu_drop_paid', $menu_drop_paid);
$smarty->assign('menu_drop_paid_rec', $menu_drop_paid_rec);
$smarty->assign('menu_drop_delayed', $menu_drop_delayed);
if (1 === $deb_show) {
    $check_for_debs = $db->query("SELECT COUNT(*) FROM idevaff_debit where aff_id = '" . $_SESSION[$install_directory_name . '_idev_LoggedID'] . "'");
    if ($check_for_debs->fetchColumn()) {
        $smarty->assign('show_debits', 1);
        $smarty->assign('menu_drop_pending_debits', $menu_drop_pending_debits);
    }
}

$smarty->assign('account_hidden', $account_hidden);
$smarty->assign('general_last_30_days_activity', $general_last_30_days_activity);
$smarty->assign('general_last_30_days_activity_traffic', $general_last_30_days_activity_traffic);
$smarty->assign('general_last_30_days_activity_commissions', $general_last_30_days_activity_commissions);
$smarty->assign('seo_url', $seo_url);
$getcustomrows = $db->query('select id from idevaff_form_fields_custom');
if ($getcustomrows->rowCount()) {
    $smarty->assign('custom_fields_title', $custom_fields_title);
}

$get_data = $db->query('select * from idevaff_invoice');
$get_data = $get_data->fetch();
$aff_inv = $get_data['aff_inv'];
if (1 === $aff_inv) {
    $smarty->assign('invoice_enabled', '1');
}

$smarty->assign('site_homepage', $siteurl);
$smarty->assign('site_affhome', $base_url . '/index.php');
$checkapp = $db->query("select * from idevaff_affiliates where id = '" . $_SESSION[$install_directory_name . '_idev_LoggedID'] . "'");
$res = $checkapp->fetch();
$getcode = $res['approved'];
$suspended = $res['suspended'];
$lev = $res['level'];
$linkid = $res['id'];
$logged_user = $res['username'];
$testi_name_field = $res['f_name'] . ' ' . $res['l_name'];
$testi_website = $res['url'];
$tc_status = $res['tc_status'];
$qr_codes_enabled = null;
if (1 === $qrc && file_exists('plugin_keys/qr_license_key.php')) {
    include 'plugin_keys/qr_license_key.php';
    if (isset($qr_key) && '81573' === $qr_key) {
        $check_valid_qr_groups = $db->prepare("select id from idevaff_groups where id > '0' and qr_enabled = '1' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by name");
        $check_valid_qr_groups->execute([$linkid]);
        if ($check_valid_qr_groups->rowCount()) {
            $qr_codes_enabled = true;
            $smarty->assign('qr_codes_enabled', 1);
        }
    }
}

include 'includes/linking_methods.php';
if ('none' !== $link_type) {
    $rel_values = ' rel="' . $link_type . '"';
    $lb_rel_values = $link_type . ' ';
    $smarty->assign('rel_values', '" rel="' . $link_type);
    $smarty->assign('lb_rel_values', $link_type . ' ');
    $smarty->assign('tl_rel_values', ' rel="' . $link_type . '"');
} else {
    $rel_values = null;
    $lb_rel_values = null;
}

if (isset($_GET['remove_logo']) && $_GET['remove_logo'] === $_SESSION[$install_directory_name . '_idev_LoggedID']) {
    $remove_logo = $_GET['remove_logo'];
    $getlogo = $db->prepare('select filename from idevaff_logos where id = ?');
    $getlogo->execute([$remove_logo]);
    $getlogo = $getlogo->fetch();
    $logoname = $getlogo['filename'];
    unlink('assets/logos/' . $logoname);
    $st = $db->prepare('delete from idevaff_logos where id = ?');
    $st->execute([$remove_logo]);
}

if (isset($_GET['remove_picture']) && $_GET['remove_picture'] === $_SESSION[$install_directory_name . '_idev_LoggedID']) {
    $remove_picture = $_GET['remove_picture'];
    $getpicture = $db->prepare('select picture from idevaff_affiliates where id = ?');
    $getpicture->execute([$remove_picture]);
    $getpicture = $getpicture->fetch();
    $picturename = $getpicture['picture'];
    unlink('assets/pictures/' . $picturename);
    $st = $db->prepare("update idevaff_affiliates set picture = '' where id = ?");
    $st->execute([$remove_picture]);
}

if (isset($_GET['custom_remove'])) {
    $cremove = $_GET['custom_remove'];
    $st = $db->prepare('update idevaff_custom_links set display = 0 where id = ? AND aff_id = ?');
    $st->execute([$cremove, $_SESSION[$install_directory_name . '_idev_LoggedID']]);
}

if (isset($_POST['create_alternate'])) {
    $temp_fields = 'alternate_success_title,alternate_success_info,alternate_failed_title, alternate_failed_info';

    try {
        $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        exit();
    }
    $alternate_success_title = $getlanguage['alternate_success_title'];
    $alternate_success_info = $getlanguage['alternate_success_info'];
    $alternate_failed_title = $getlanguage['alternate_failed_title'];
    $alternate_failed_info = $getlanguage['alternate_failed_info'];
    include 'includes/validate_custom_link.php';
    if (!$input_error) {
        $st = $db->prepare("insert into idevaff_custom_links (aff_id, url, display) values (?, ?, '1')");
        $st->execute([$linkid, $custom_link]);
        $smarty->assign('display_custom_success', 1);
        $smarty->assign('custom_success_title', $alternate_success_title);
        $smarty->assign('custom_success_message', $alternate_success_info);
    } else {
        $smarty->assign('display_custom_errors', 1);
        $smarty->assign('custom_error_title', $alternate_failed_title);
        $smarty->assign('custom_error_list', $input_error);
    }
}

$temp_fields = "testi_description,testi_name,testi_url,testi_content,testi_code,testi_submit,testi_title,\r\ntesti_success_title,testi_success_message,testi_error_title,testi_error_name_missing,testi_error_url_missing,\r\ntesti_error_missing,aff_lib_button";

try {
    $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage = $query->fetch();
    $query->closeCursor();
} catch (Exception $ex) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    exit();
}
$testi_description = html_language_output($getlanguage['testi_description']);
$testi_name = html_language_output($getlanguage['testi_name']);
$testi_url = html_language_output($getlanguage['testi_url']);
$testi_content = html_language_output($getlanguage['testi_content']);
$testi_code = html_language_output($getlanguage['testi_code']);
$testi_submit = html_language_output($getlanguage['testi_submit']);
$testi_title = html_language_output($getlanguage['testi_title']);
$testi_success_title = html_language_output($getlanguage['testi_success_title']);
$testi_success_message = html_language_output($getlanguage['testi_success_message']);
$testi_error_title = html_language_output($getlanguage['testi_error_title']);
$testi_error_name_missing = html_language_output($getlanguage['testi_error_name_missing']);
$testi_error_url_missing = html_language_output($getlanguage['testi_error_url_missing']);
$testi_error_missing = html_language_output($getlanguage['testi_error_missing']);
$aff_lib_button = html_language_output($getlanguage['aff_lib_button']);
$smarty->assign('testi_title', $testi_title);
$smarty->assign('testi_description', $testi_description);
$smarty->assign('testi_name', $testi_name);
$smarty->assign('testi_url', $testi_url);
$smarty->assign('testi_content', $testi_content);
$smarty->assign('testi_code', $testi_code);
$smarty->assign('testi_submit', $testi_submit);
if (isset($_POST['create_testimonial'])) {
    include 'includes/validate_testimonial.php';
    $smarty->assign('submit_name', stripslashes($submit_name));
    $smarty->assign('submit_website', stripslashes($submit_website));
    $smarty->assign('submit_testimonial', stripslashes($submit_testimonial));
    $insert_name = $_POST['submit_name'];
    $insert_testi = $_POST['submit_testimonial'];
    if (!$input_error) {
        $st = $db->prepare("insert into idevaff_testimonials (aff_id, affiliate_name, website_url, testimonial, approved) values (?, ?, ?, ?, '0')");
        $st->execute([$linkid, $insert_name, $submit_website, $insert_testi]);
        if (1 === $admin_notify_testimonial) {
            include 'templates/email/admin.new_testimonial.php';
        }

        $smarty->assign('display_testimonial_success', 1);
        $smarty->assign('testimonial_success_title', $testi_success_title);
        $smarty->assign('testimonial_success_message', $testi_success_message);
    } else {
        $smarty->assign('display_testimonial_errors', 1);
        $smarty->assign('testimonial_error_title', $testi_error_title);
        $smarty->assign('testimonial_error_list', $input_error);
    }
} else {
    $testi_website_check = substr($testi_website, 0, 4);
    if ('http' !== $testi_website_check || '' === $testi_website) {
        $testi_website = 'http://';
    }

    $smarty->assign('submit_name', $testi_name_field);
    $smarty->assign('submit_website', $testi_website);
    $smarty->assign('submit_testimonial', '');
}

if (1 === $testimonials_security) {
    $smarty->assign('testimonials_security', $testimonials_security);
    include_once 'includes/security_image.php';
    $captcha = new CaptchaSecurityImages();
    $testimonial_captcha = $captcha->CaptchaSecurityImages();
    $smarty->assign('testimonial_captcha', $testimonial_captcha);
}
/*
$chart_traffic = $db->prepare('select id from idevaff_iptracking where acct_id = ? LIMIT 1');
$chart_traffic->execute([$linkid]);
$chart_traffic = $chart_traffic->rowCount();
if (0 < $chart_traffic) {
    $smarty->assign('traffic_exists', 1);
}

$postback_logs = $db->prepare('select id from idevaff_postbacks_logs where acct_id = ? LIMIT 1');
$postback_logs->execute([$linkid]);
$postback_logs = $chart_traffic->rowCount();
if (0 < $postback_logs) {
    $smarty->assign('postback_exists', 1);
}
*/
$coupons_exist = null;
$check_for_coupons = $db->prepare('select id from idevaff_coupons where coupon_affiliate = ?');
$check_for_coupons->execute([$linkid]);
$check_for_coupons = $check_for_coupons->rowCount();
if (0 < $check_for_coupons || '1' === $vanity_codes) {
    $coupons_exist = true;
    $smarty->assign('menu_coupon', $menu_coupon);
    $smarty->assign('coupon_codes_available', 1);
}

if (1 === $sub_enable) {
    $smarty->assign('sub_affiliates', 1);
    $smarty->assign('sub_affiliates_enabled', 1);
}

if (1 === $marketing_delivery) {
    $smarty->assign('one_click_delivery', 1);
}

if (1 === $aff_lib) {
    $smarty->assign('aff_lib_button', $aff_lib_button);
    $smarty->assign('affiliate_library_access', 1);
}

if (1 === $allow_alternate) {
    $check_pay_type = $db->prepare("select type from idevaff_affiliates where id = ? and type = '3'");
    $check_pay_type->execute([$linkid]);
    if (!$check_pay_type->rowCount()) {
        $smarty->assign('alternate_keywords_enabled', 1);
    }
}

if (1 === $sub_enable || 1 === $allow_alternate || 1 === $use_keywords) {
    $smarty->assign('custom_tracking_enabled', 1);
}

$show_email_links = $db->prepare('select id from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)');
$show_email_links->execute([$linkid]);
if ($show_email_links->rowCount() && '1' === $email_links_active) {
    $smarty->assign('email_links_available', 1);
}

if (1 === $sub_enable || 1 === $use_keywords) {
    $smarty->assign('custom_reports_enabled', 1);
}

if (1 === $logo_status) {
    $smarty->assign('allow_logos', 1);
}

$smarty->assign('affiliate_id', $linkid);
if (1 === $link_style) {
    $smarty->assign('site_textlink', $base_url . '/' . $filename . '.php?id=' . $standard_link_association);
} else {
    if (2 === $link_style) {
        $smarty->assign('site_textlink', $seo_url . $seo_link_association);
    }
}

if (isset($_POST['change_password'])) {
    include 'templates/internals/core.change_password.php';
}

if (isset($_POST['coupon_code_request'])) {
    include 'includes/validate_vanity_codes.php';
}

if (isset($_POST['edit'])) {
    include 'includes/validate_edit.php';
    if ($error_list) {
        $smarty->assign('update_warning', 1);
        $smarty->assign('display_edit_errors', 1);
        $smarty->assign('error_title', $error_title);
        $smarty->assign('error_list', $error_list);
    } else {
        $smarty->assign('update_notice', 1);
        $smarty->assign('edit_success', $edit_success);
        $email_language = (isset($_POST['email_language']) ? html_output($_POST['email_language']) : '');
        $st = $db->prepare('update idevaff_affiliates set email_override = ? where id = ?');
        $st->execute([$email_language, $linkid]);
        if (isset($_POST['f_name'])) {
            $f_name = html_output($_POST['f_name']);
            $st = $db->prepare('update idevaff_affiliates set f_name = ? where id = ?');
            $st->execute([$f_name, $linkid]);
        }

        if (isset($_POST['l_name'])) {
            $l_name = html_output($_POST['l_name']);
            $st = $db->prepare('update idevaff_affiliates set l_name = ? where id = ?');
            $st->execute([$l_name, $linkid]);
        }

        if (isset($_POST['address_one'])) {
            $address_one = html_output($_POST['address_one']);
            $st = $db->prepare('update idevaff_affiliates set address_1 = ? where id = ?');
            $st->execute([$address_one, $linkid]);
        }

        if (isset($_POST['address_two'])) {
            $address_two = html_output($_POST['address_two']);
            $st = $db->prepare('update idevaff_affiliates set address_2 = ? where id = ?');
            $st->execute([$address_two, $linkid]);
        }

        if (isset($_POST['city'])) {
            $city = html_output($_POST['city']);
            $st = $db->prepare('update idevaff_affiliates set city = ? where id = ?');
            $st->execute([$city, $linkid]);
        }

        if (isset($_POST['state'])) {
            $state = html_output($_POST['state']);
            $st = $db->prepare('update idevaff_affiliates set state = ? where id = ?');
            $st->execute([$state, $linkid]);
        }

        if (isset($_POST['phone'])) {
            $phone = html_output($_POST['phone']);
            $st = $db->prepare('update idevaff_affiliates set phone = ? where id = ?');
            $st->execute([$phone, $linkid]);
        }

        if (isset($_POST['fax'])) {
            $fax = html_output($_POST['fax']);
            $st = $db->prepare('update idevaff_affiliates set fax = ? where id = ?');
            $st->execute([$fax, $linkid]);
        }

        if (isset($_POST['zip'])) {
            $zip = html_output($_POST['zip']);
            $st = $db->prepare('update idevaff_affiliates set zip = ? where id = ?');
            $st->execute([$zip, $linkid]);
        }

        if (isset($_POST['country'])) {
            $country = html_output($_POST['country']);
            $st = $db->prepare('update idevaff_affiliates set country = ? where id = ?');
            $st->execute([$country, $linkid]);
        }

        if (isset($_POST['email'])) {
            $email = html_output($_POST['email']);
            $st = $db->prepare('update idevaff_affiliates set email = ? where id = ?');
            $st->execute([$email, $linkid]);
        }

        if (isset($_POST['company'])) {
            $company = html_output($_POST['company']);
            $st = $db->prepare('update idevaff_affiliates set company= ? where id = ?');
            $st->execute([$company, $linkid]);
        }

        if (isset($_POST['payable'])) {
            $payable = html_output($_POST['payable']);
            $st = $db->prepare('update idevaff_affiliates set payable = ? where id = ?');
            $st->execute([$payable, $linkid]);
        }

        if (isset($_POST['url'])) {
            $url = html_output($_POST['url']);
            $st = $db->prepare('update idevaff_affiliates set url = ? where id = ?');
            $st->execute([$url, $linkid]);
        }

        if (isset($_POST['tax_id_ssn'])) {
            $st = $db->prepare("update idevaff_affiliates set tax_id_ssn = (AES_ENCRYPT(?, '" . AUTH_KEY . "')) where id = ?");
            $st->execute([$_POST['tax_id_ssn'], $linkid]);
        }
    }
}

if (isset($_POST['commission_payment'])) {
    $temp_fields = 'invalid_paypal_address,stripe_removed,payment_settings_success,payment_settings_updated';

    try {
        $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '`');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        exit();
    }
    $invalid_paypal_address = html_language_output($getlanguage['invalid_paypal_address']);
    $stripe_removed = html_language_output($getlanguage['stripe_removed']);
    $payment_settings_success = html_language_output($getlanguage['payment_settings_success']);
    $payment_settings_updated = html_language_output($getlanguage['payment_settings_updated']);
    if (isset($_POST['pay_method'])) {
        $payment_method = (int)$_POST['pay_method'];
    } else {
        $payment_method = 0;
    }

    $pp_account = null;
    $stripe_data = null;
    $pp = 0;
    if ($payment_method) {
        if (1 === $payment_method) {
            $error_list = null;
            if (isset($_POST['pp_account'])) {
                $pp_account = $_POST['pp_account'];
            } else {
                $pp_account = null;
            }

            if (!$pp_account) {
                $error_list .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $paypal_required . "<BR />\n";
            } else {
                if (!preg_match('/^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$/i', $pp_account)) {
                    $error_list .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $invalid_paypal_address . "<BR />\n";
                }
            }
        }
    } else {
        $input_error .= "<img border='0' src='images/mark.gif' height='16' width='16'>&nbsp; " . $payment_method_error . "<BR />\n";
    }

    if (isset($error_list) && '' !== $error_list) {
        $smarty->assign('update_warning', 1);
        $smarty->assign('display_edit_errors', 1);
        $smarty->assign('error_title', $error_title);
        $smarty->assign('error_list', $error_list);
    } else {
        $success_message = '<strong>' . $payment_settings_success . '</strong> ' . $payment_settings_updated;
        $fail_message = '';
        if (isset($_POST['pay_method'])) {
            $pay_method = (int)$_POST['pay_method'];
            $st = $db->prepare('update idevaff_affiliates set pay_method = ? where id = ?');
            $st->execute([$pay_method, $linkid]);
        }

        if (isset($_POST['pp_account'])) {
            $pp_account = html_output($_POST['pp_account']);
            $st = $db->prepare('update idevaff_affiliates set paypal = ? where id = ?');
            $st->execute([$pp_account, $linkid]);
        }

        if (isset($_POST['delete_stripe_account']) && 'delete_stripe' === $_POST['delete_stripe_account']) {
            try {
                $tokens = [];
                $tokens = base64_encode(serialize($tokens));
                $st = $db->prepare('update idevaff_affiliates set stripe_user_data  = ? where id = ?');
                $st->execute([$tokens, $linkid]);
                $success_message = '<strong>' . $payment_settings_success . '</strong> ' . $stripe_removed;
            } catch (Exception $ex) {
                $fail_message = $ex->getMessage();
            }
        }

        if ('' !== $success_message) {
            $smarty->assign('edit_success', $success_message);
        }

        if ('' !== $fail_message) {
            $smarty->assign('error_title', $error_title);
            $smarty->assign('error_list', $fail_message);
        }
    }
}

$pass = $res['password'];
$levamt = $db->prepare('select amt from idevaff_paylevels where level = ?');
$levamt->execute([$lev]);
$lamt = $levamt->fetch();
$levelamt = $lamt['amt'];
$hi = $res['hits_in'];
$hin = number_format($hi, 0);
$smarty->assign('hin', $hin);
$smarty->assign('link_id', $linkid);
$smarty->assign('base_url', $base_url);
$smarty->assign('username', $logged_user);
$smarty->assign('affiliate_username', $logged_user);
if (isset($_POST['changec'])) {
    $st = $db->prepare('update idevaff_affiliates set type = ?, level = 1 where id = ?');
    $st->execute([$_POST['type'], $linkid]);
    $smarty->assign('commission_updated', $change_comm_updated);
}

if (isset($_POST['submit'])) {
    $st = $db->prepare('update idevaff_affiliates set payable = ?, tax_id_ssn = ?, company = ?, f_name = ?, l_name = ?, email = ?, address_1 = ?, address_2 = ?, city = ?, state = ?, zip = ?, country = ?, phone = ?, fax = ?, url = ?, pp = ?, paypal = ? where id = ?');
    $st->execute([$_POST['payable'], $_POST['tax_id_ssn'], $_POST['company'], $_POST['f_name'], $_POST['l_name'], $_POST['email'], $_POST['address_one'], $_POST['address_two'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['country'], $_POST['phone'], $_POST['fax'], $_POST['url'], $_POST['pp'], $_POST['pp_account'], $linkid]);
    $tagedit = 'Account Updated';
}
// commented lines below not needed - clean start //
$pay = $db->prepare('select SUM(amount) as total from idevaff_payments where id = ?');
$pay->execute([$linkid]);
$paid = $pay->fetch();
$pai = $paid['total'];
$paid = number_format($pai, $decimal_symbols);
// total earnings + referral earnings
$sales_app = $db->prepare("select SUM(payment) as totalapp from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '0'");
$sales_app->execute([$linkid]);
$approved_sales = $sales_app->fetch();
$approved_sale = $approved_sales['totalapp'];
$approved_sales = number_format($approved_sale, $decimal_symbols);

//$ref_app = $db->prepare("select SUM(payment) as totalapp from idevaff_sales where id = ? and approved = '1' and top_tier_tag = '1'");
//$ref_app->execute([$linkid]);
//$ref_sales = $ref_app->fetch();
//$ref_sale = $ref_sales['totalapp'];
//$ref_sales = number_format($ref_sale, $decimal_symbols);

if (1 === $cur_sym_location) {
    $approved_sales = $cur_sym . $approved_sales;
//    $ref_sales = $cur_sym.$ref_sales;
}

if (2 === $cur_sym_location) {
    $approved_sales = $approved_sales . ' ' . $cur_sym;
//    $ref_sales = $ref_sales.' '.$cur_sym;
}

$approved_sales = $approved_sales . ' ' . $currency;
$smarty->assign('current_approved_commissions', $approved_sales);
//$ref_sales = $ref_sales.' '.$currency;
//$smarty->assign('current_ref_commissions', $ref_sales);
// commented lines below not needed - clean END //
$tpay = $db->prepare("select SUM(payment) as total from idevaff_archive where top_tier_tag != '1' and id = ?");
$tpay->execute([$linkid]);
$tpaid = $tpay->fetch();
$tpai = $tpaid['total'];
$reg = $tpai + $approved_sale;
$reg = number_format($reg, $decimal_symbols);
$bonu = $db->prepare("select bonus from idevaff_sales where id = ? and bonus = '1' and approved = '1'");
$bonu->execute([$linkid]);
$bon = $bonu->rowCount();
if (1 === $cur_sym_location) {
    $reg = $cur_sym . $reg;
}

if (2 === $cur_sym_location) {
    $reg = $reg . ' ' . $cur_sym;
}

$reg = $reg . ' ' . $currency;
$smarty->assign('standard_amount_earnings', $reg);
if (0 < $bon) {
    $smarty->assign('insert_bonus', 1);
    $smarty->assign('account_inc_bonus', $account_inc_bonus);
}

$tsales_app = $db->prepare("select SUM(payment) as ttotalapp from idevaff_sales where id = ? and bonus != '1' and approved = '1' and top_tier_tag > '0'");
$tsales_app->execute([$linkid]);
$tapproved_sales = $tsales_app->fetch();
$tapproved_sale = $tapproved_sales['ttotalapp'];
$tapproved_sales = number_format($tapproved_sale, $decimal_symbols);
if (0 === $tier_numbers) {
    $smarty->assign('account_second_tier', '<font color="#cccccc">' . $account_second_tier . '</font>');
    $smarty->assign('current_tier_commissions', '<font color="#cccccc">' . $account_not_available . '</font>');
} else {
    $smarty->assign('account_second_tier', $account_second_tier);
    if (1 === $cur_sym_location) {
        $tapproved_sales = $cur_sym . $tapproved_sales;
    }

    if (2 === $cur_sym_location) {
        $tapproved_sales = $tapproved_sales . ' ' . $cur_sym;
    }

    $tapproved_sales = $tapproved_sales . ' ' . $currency;
    $smarty->assign('current_tier_commissions', $tapproved_sales);
}

$tpayt = $db->prepare("select SUM(payment) as total from idevaff_archive where top_tier_tag = '1' and id = ?");
$tpayt->execute([$linkid]);
$tpaidt = $tpayt->fetch();
$tpait = $tpaidt['total'];
$ttier = $tpait + $tapproved_sale;
$ttier = number_format($ttier, $decimal_symbols);
if (0 === $tier_numbers) {
    $smarty->assign('account_second_tier', '<font color="#646464">' . $account_second_tier . '</font>');
    $smarty->assign('tier_amount_earned', '<font color="#646464">' . $account_not_available . '</font>');
} else {
    $smarty->assign('account_second_tier', $account_second_tier);
    if (1 === $cur_sym_location) {
        $ttier = $cur_sym . $ttier;
    }

    if (2 === $cur_sym_location) {
        $ttier = $ttier . ' ' . $cur_sym;
    }

    $ttier = $ttier . ' ' . $currency;
    $smarty->assign('tier_amount_earned', $ttier);
}

$tearned = $pai + $approved_sale + $tapproved_sale;
$tearned = number_format($tearned, $decimal_symbols);
if (1 === $cur_sym_location) {
    $tearned = $cur_sym . $tearned;
}

if (2 === $cur_sym_location) {
    $tearned = $tearned . ' ' . $cur_sym;
}

$tearned = $tearned . ' ' . $currency;
$smarty->assign('total_amount_earned', $tearned);
$arc_tot = $tpai + $tpait;
$arc_tot = number_format($arc_tot, $decimal_symbols);
$smarty->assign('payments_archived', $arc_tot);
$totcsales_bar = $approved_sale + $tapproved_sale;
$totcsales = $approved_sale + $tapproved_sale;
$totcsales = number_format($totcsales, $decimal_symbols);
$smarty->assign('current_total_commissions_no_ref', $approved_sale);
$smarty->assign('current_total_commissions_only_ref', $tapproved_sale);
if (1 === $cur_sym_location) {
    $totcsales = $cur_sym . $totcsales;
}

if (2 === $cur_sym_location) {
    $totcsales = $totcsales . ' ' . $cur_sym;
}

$totcsales = $totcsales . ' ' . $currency;
$smarty->assign('current_total_commissions', $totcsales);
$num_app = $db->prepare("select id from idevaff_sales where id = ? and bonus != '1' and approved = '1' and top_tier_tag = '0'");
$num_app->execute([$linkid]);
$num_app1 = $num_app->rowCount();
$num_app = number_format($num_app1);
$smarty->assign('current_transactions', $num_app);
$num_appt = $db->prepare("select id from idevaff_archive where id = ? and bonus != '1' and top_tier_tag = '0'");
$num_appt->execute([$linkid]);
$num_appt = $num_appt->rowCount();
$num_appt = $num_appt + $num_app1;
$num_appt = number_format($num_appt);
$smarty->assign('total_transactions', $num_appt);
$tiernums = $db->prepare('select id from idevaff_tiers where parent = ?');
$tiernums->execute([$linkid]);
$tnumsdisp = $tiernums->rowCount();
$smarty->assign('number_of_tier_accounts', $tnumsdisp);
$bancount = $db->prepare("select id from idevaff_groups where contains > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$bancount->execute([$linkid]);
$bancount = $bancount->rowCount();
$anncount = $db->prepare("select id from idevaff_groups where announcements > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$anncount->execute([$linkid]);
$anncount = $anncount->rowCount();
$markvidcount = $db->prepare("select id from idevaff_groups where vids > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$markvidcount->execute([$linkid]);
$markvidcount = $markvidcount->rowCount();
$txtcount = $db->prepare("select id from idevaff_groups where ads > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$txtcount->execute([$linkid]);
$txtcount = $txtcount->rowCount();
$lnkcount = $db->prepare("select id from idevaff_groups where links > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$lnkcount->execute([$linkid]);
$lnkcount = $lnkcount->rowCount();
$htmlcount = $db->prepare("select id from idevaff_groups where hads > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$htmlcount->execute([$linkid]);
$htmlcount = $htmlcount->rowCount();
$etempscount = $db->prepare("select id from idevaff_groups where etemps > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$etempscount->execute([$linkid]);
$etempscount = $etempscount->rowCount();
$marketingcount = $db->query("select id from idevaff_pdf where pdf_type = '1'");
$marketingcount = $marketingcount->rowCount();
$trainingcount = $db->query("select id from idevaff_pdf where pdf_type = '2'");
$trainingcount = $trainingcount->rowCount();
$peelcount = $db->prepare("select id from idevaff_groups where peels > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$peelcount->execute([$linkid]);
$peelcount = $peelcount->rowCount();
$lightboxcount = $db->prepare("select id from idevaff_groups where lightboxes > '0' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?)");
$lightboxcount->execute([$linkid]);
$lightboxcount = $lightboxcount->rowCount();
$smarty->assign('invoice_button', $invoice_button);
if (!$getcode) {
    $temp_fields = 'pending_title,pending_heading,pending_note';

    try {
        $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        exit();
    }
    $pending_page_title = html_language_output($getlanguage['pending_title']);
    $pending_page_heading = html_language_output($getlanguage['pending_heading']);
    $pending_page_note = html_language_output($getlanguage['pending_note']);
    $smarty->assign('pending_page_title', $pending_page_title);
    $smarty->assign('pending_page_heading', $pending_page_heading);
    $smarty->assign('pending_page_note', $pending_page_note);
    $smarty->assign('page_not_authorized', 1);
}

if ($suspended) {
    $temp_fields = 'suspended_title,suspended_heading,suspended_notes';

    try {
        $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        exit();
    }
    $suspended_page_title = html_language_output($getlanguage['suspended_title']);
    $suspended_page_heading = html_language_output($getlanguage['suspended_heading']);
    $suspended_page_notes = html_language_output($getlanguage['suspended_notes']);
    $smarty->assign('suspended_page_title', $suspended_page_title);
    $smarty->assign('suspended_page_heading', $suspended_page_heading);
    $smarty->assign('suspended_page_notes', $suspended_page_notes);
    $smarty->assign('affiliate_suspended', 1);
}

if (0 === $tc_status && 1 === $terms_re_f) {
    $smarty->assign('re_accept', 1);
    $smarty->assign('terms_t', $terms_t);
}

if ($getcode && !$suspended) {
    $smarty->assign('linking_code', 'available');
    $smarty->assign('account_standard_linking_code', $account_standard_linking_code);
    $smarty->assign('account_copy_paste', $account_copy_paste);
    if (1 === $link_style) {
        $smarty->assign('box_code', $base_url . '/' . $filename . '.php?id=' . $standard_link_association);
    } else {
        if (2 === $link_style) {
            $smarty->assign('box_code', $seo_url . $seo_link_association);
        }
    }
} else {
    if (!$getcode) {
        $smarty->assign('linking_code', 'pending_approval');
        $smarty->assign('account_not_approved', $account_not_approved);
    } else {
        if ($suspended) {
            $smarty->assign('linking_code', 'account_suspended');
            $smarty->assign('account_suspended', $account_suspended);
        }
    }
}

$smarty->assign('account_total_transactions', $account_total_transactions);
$smarty->assign('account_standard_earnings', $account_standard_earnings);
$smarty->assign('account_earned_todate', $account_earned_todate);
if (1 === $second_contact) {
    $smarty->assign('display_tier_contact_info', 1);
}

if (1 === $pend_show) {
    $smarty->assign('pending_enabled', 1);
}

$smarty->assign('menu_heading_overview', $menu_heading_overview);
$smarty->assign('menu_general_stats', $menu_general_stats);
if (0 < $tier_numbers) {
    $smarty->assign('tier_enabled', 1);
    $smarty->assign('menu_tier_stats', $menu_tier_stats);
    $smarty->assign('second_tier', 1);
    $smarty->assign('menu_tier_linking_code', $menu_tier_linking_code);
    $smarty->assign('tier_links', 1);
}

$smarty->assign('progress_title', $progress_title);
$smarty->assign('progress_complete', $progress_complete);
if (0 < $balance) {
    $init_req = number_format($balance, $decimal_symbols);
    $smarty->assign('init_req', $init_req);
    $sales_app_no_bonus = $db->prepare("select SUM(payment) as totalapp_no_bonus from idevaff_sales where id = ? and bonus != '1' and approved = '1' and top_tier_tag = '0'");
    $sales_app_no_bonus->execute([$linkid]);
    $sales_app_no_bonus = $sales_app_no_bonus->fetch();
    $sales_app_no_bonus = $sales_app_no_bonus['totalapp_no_bonus'];
    $totcsales_bar = $sales_app_no_bonus + $tapproved_sale;
    $eligible_percent = $totcsales_bar / $balance;
    $eligible_percent = $eligible_percent * 100;
    if ('100' <= $eligible_percent) {
        $eligible_percent = 100;
    }

    $eligible_percent = number_format($eligible_percent, 2);
    $smarty->assign('eligible_percent', $eligible_percent);
    if (1 === $cur_sym_location) {
        $init_req_bar = $cur_sym . $init_req;
    }

    if (2 === $cur_sym_location) {
        $init_req_bar = $init_req . ' ' . $cur_sym;
    }

    $init_req_bar = $init_req_bar . ' ' . $currency;
    $totcsales_bar = number_format($totcsales_bar, $decimal_symbols);
    if (1 === $cur_sym_location) {
        $totcsales_bar = $cur_sym . $totcsales_bar;
    }

    if (2 === $cur_sym_location) {
        $totcsales_bar = $totcsales_bar . ' ' . $cur_sym;
    }

    $totcsales_bar = $totcsales_bar . ' ' . $currency;
    $eligible_info = $progress_sentence_1 . ' ' . $totcsales_bar . ' ' . $progress_sentence_2 . ' ' . $init_req_bar . ' ' . $progress_sentence_3;
    $smarty->assign('eligible_info', $eligible_info);
} else {
    $smarty->assign('eligible_percent', 100);
    $smarty->assign('eligible_info', $progress_none);
}

$smarty->assign('menu_payment_history', $menu_payment_history);
if (1 === $com_show) {
    $smarty->assign('menu_commission_details', $menu_commission_details);
    $smarty->assign('show_commissions', 1);
}

if (1 === $delay_use) {
    $smarty->assign('delayed_enabled', 1);
}

$smarty->assign('menu_traffic_log', $menu_traffic_log);
$smarty->assign('menu_heading_marketing', $menu_heading_marketing);
if (0 < $bancount) {
    $smarty->assign('menu_banners', $menu_banners);
    $smarty->assign('banner_count', 1);
}

if (0 < $anncount && isset($sm_eligible) && file_exists('plugin_keys/social_media_license_key.php')) {
    $smarty->assign('menu_announcements', $menu_announcements);
    $smarty->assign('announcement_count', 1);
}

if (0 < $markvidcount) {
    $smarty->assign('menu_marketing_videos', $menu_marketing_videos);
    $smarty->assign('videomarketing_count', 1);
}

if (0 < $txtcount) {
    $smarty->assign('menu_text_ads', $menu_text_ads);
    $smarty->assign('textad_count', 1);
}

if (0 < $lnkcount) {
    $smarty->assign('menu_text_links', $menu_text_links);
    $smarty->assign('textlink_count', 1);
}

$smarty->assign('menu_email_links', $menu_email_links);
if (1 === $offline) {
    $smarty->assign('offline_enabled', '1');
    $smarty->assign('menu_offline', $menu_offline);
    $smarty->assign('offline_marketing', 1);
}

if (1 === $use_keywords) {
    $smarty->assign('custom_links_enabled', '1');
}

$smarty->assign('menu_heading_management', $menu_heading_management);
$smarty->assign('menu_edit_account', $menu_edit_account);
$smarty->assign('menu_change_pass', $menu_change_pass);
if (1 === $paytype && 1 === $mod_later) {
    $smarty->assign('menu_change_commission', $menu_change_commission);
}

if (0 < $trainingcount) {
    $smarty->assign('menu_heading_general_info', $menu_heading_general_info);
    $smarty->assign('general_heading', 1);
}

if (1 === $faq) {
    $smarty->assign('menu_faq', $menu_faq);
    $smarty->assign('use_faq', 1);
    $smarty->assign('faq_enabled', 1);
}

if (0 < $htmlcount) {
    $smarty->assign('menu_html_links', $menu_html_links);
    $smarty->assign('htmlcount', 1);
}

if (0 < $trainingcount) {
    $smarty->assign('menu_pdf_training', $menu_pdf_training);
    $smarty->assign('pdf_training_count', 1);
}

if (0 < $marketingcount) {
    $smarty->assign('menu_pdf_marketing', $menu_pdf_marketing);
    $smarty->assign('pdf_marketing_count', 1);
}

if (1 === $videos_enabled) {
    $smarty->assign('menu_videos', $menu_videos);
    $smarty->assign('training_videos', 1);
}

$data = $db->query('select id from idevaff_video_tutorials');
if ($data->rowCount()) {
    $uploaded_videos_exist = 1;
    $smarty->assign('menu_videos', $menu_videos);
    $smarty->assign('uploaded_training_videos', 1);
}

if (!empty($videos_key) && $videos_enabled) {
    $smarty->assign('video_resources_link', 1);
}

if (1 === $videos_enabled || 0 < $trainingcount || 1 === $sub_enable || 1 === $allow_alternate || 1 === $use_keywords) {
    $smarty->assign('training_materials', 1);
}

if (0 < $peelcount) {
    $smarty->assign('menu_page_peels', $menu_page_peels);
    $smarty->assign('page_peel_count', 1);
}

if (1 === $videos_enabled || 0 < $trainingcount || 1 === $sub_enable || 1 === $allow_alternate || 1 === $use_keywords) {
    $smarty->assign('menu_heading_training_materials', $menu_heading_training_materials);
}

$smarty->assign('menu_custom_manual', $menu_custom_manual);
$smarty->assign('menu_heading_custom_links', $menu_heading_custom_links);
$smarty->assign('menu_custom_reports', $menu_custom_reports);
$smarty->assign('menu_keyword_links', $menu_keyword_links);
$smarty->assign('menu_subid_links', $menu_subid_links);
$smarty->assign('menu_alteranate_links', $menu_alteranate_links);
$smarty->assign('menu_heading_additional', $menu_heading_additional);
if (0 < $lightboxcount) {
    $smarty->assign('menu_lightboxes', $menu_lightboxes);
    $smarty->assign('lightbox_count', 1);
}

if (0 < $etempscount) {
    $smarty->assign('menu_etemplates', $menu_email_templates);
    $smarty->assign('etemplates_count', 1);
}

$page_request = null;
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page_request = html_output($_REQUEST['page'], ENT_QUOTES, 'UTF-8');
}

$report_request = null;
if (isset($_REQUEST['report']) && is_numeric($_REQUEST['report'])) {
    $report_request = html_output($_REQUEST['report'], ENT_QUOTES, 'UTF-8');
}

if (!isset($page_request) || '1' === $page_request) {
    $data_get = '1';
    $smarty->assign('internal_page', 1);
}

if ('1' === $page_request) {
    $smarty->assign('main_menu_group', 'general_stats');
    $smarty->assign('sub_menu_group', 'general_stats');
}

if (isset($page_request)) {
    if ('2' === $page_request) {
        $data_get = '2';
        $smarty->assign('internal_page', 2);
        $smarty->assign('main_menu_group', 'general_stats');
        $smarty->assign('sub_menu_group', 'tier_stats');
    }

    if ('3' === $page_request) {
        $data_get = '3';
        $smarty->assign('internal_page', 3);
    }

    if ('4' === $page_request) {
        $data_get = '4';
        $smarty->assign('internal_page', 4);
        $smarty->assign('main_menu_group', 'comms');
        if (isset($report_request) && 1 === $report_request) {
            $smarty->assign('sub_menu_group', 'comms_current');
        }

        if (isset($report_request) && 2 === $report_request) {
            $smarty->assign('sub_menu_group', 'comms_tier');
        }

        if (isset($report_request) && 3 === $report_request) {
            $smarty->assign('sub_menu_group', 'comms_pending');
        }

        if (isset($report_request) && 4 === $report_request) {
            $smarty->assign('sub_menu_group', 'comms_paid');
        }

        if (isset($report_request) && 5 === $report_request) {
            $smarty->assign('sub_menu_group', 'comms_paid_tier');
        }

        if (isset($report_request) && 6 === $report_request) {
            $smarty->assign('sub_menu_group', 'comms_delayed');
        }
    }

    if ('5' === $page_request) {
        $data_get = '5';
        $smarty->assign('internal_page', 5);
        $smarty->assign('main_menu_group', 'comms');
        $smarty->assign('sub_menu_group', 'comms_rec');
    }

    if ('6' === $page_request) {
        $data_get = '6';
        $smarty->assign('internal_page', 6);
    }

    if ('7' === $page_request) {
        $data_get = '7';
        $offer_id = $_GET['offer_id'];
        $smarty->assign('internal_page', 7);
        $smarty->assign('offer_id', $offer_id);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'banners');
    }

    if ('8' === $page_request) {
        $data_get = '8';
        $smarty->assign('internal_page', 8);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'textads');
    }

    if ('9' === $page_request) {
        $data_get = '9';
        $smarty->assign('internal_page', 9);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'text_links');
    }

    if ('10' === $page_request) {
        $data_get = '10';
        $smarty->assign('internal_page', 10);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'email_links');
    }

    if ('11' === $page_request) {
        $data_get = '11';
        $smarty->assign('internal_page', 11);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'offline');
    }

    if ('12' === $page_request) {
        $data_get = '12';
        $smarty->assign('internal_page', 12);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'tiers');
    }

    if ('13' === $page_request) {
        $data_get = '13';
        $smarty->assign('internal_page', 13);
    }

    if ('14' === $page_request) {
        $data_get = '14';
        $smarty->assign('internal_page', 14);
        $smarty->assign('main_menu_group', 'custom');
        $smarty->assign('sub_menu_group', 'keywords');
    }

    if ('16' === $page_request) {
        $data_get = '16';
        $smarty->assign('internal_page', 16);
    }

    if ('17' === $page_request) {
        $data_get = '17';
        $smarty->assign('internal_page', 17);
        $smarty->assign('sub_menu_group', 'edit-account');
    }

    if ('18' === $page_request) {
        $data_get = '18';
        $smarty->assign('internal_page', 18);
    }

    if ('19' === $page_request) {
        $data_get = '19';
        $smarty->assign('internal_page', 19);
    }

    if ('20' === $page_request) {
        $data_get = '20';
        $smarty->assign('internal_page', 20);
    }

    if ('21' === $page_request) {
        $data_get = '21';
        $smarty->assign('internal_page', 21);
    }

    if ('22' === $page_request) {
        $data_get = '22';
        $smarty->assign('internal_page', 22);
    }

    if ('23' === $page_request) {
        $data_get = '23';
        $smarty->assign('internal_page', 23);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'htmlads');
    }

    if ('24' === $page_request) {
        $data_get = '24';
        $smarty->assign('internal_page', 24);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'pdf_marketing');
    }

    if ('25' === $page_request) {
        $data_get = '25';
        $smarty->assign('internal_page', 25);
        $smarty->assign('main_menu_group', 'tm');
        $smarty->assign('sub_menu_group', 'pdf_training');
    }

    if ('26' === $page_request) {
        $data_get = '26';
        $smarty->assign('internal_page', 26);
        $smarty->assign('main_menu_group', 'custom');
        $smarty->assign('sub_menu_group', 'subs');
    }

    if ('27' === $page_request) {
        $data_get = '27';
        $smarty->assign('internal_page', 27);
    }

    if ('28' === $page_request) {
        $data_get = '28';
        $smarty->assign('internal_page', 28);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'email_templates');
    }

    if ('29' === $page_request) {
        $data_get = '29';
        $smarty->assign('internal_page', 29);
    }

    if ('30' === $page_request) { // POSTBACK SETTINGS PAGE START
$get_pic = $db->query("select picture from idevaff_affiliates where id = '" . $_SESSION[$install_directory_name . '_idev_LoggedID'] . "'");
$get_pic_result = $get_pic->fetch();
$picture = $get_pic_result['picture'];
if ($picture != '') {
    $smarty->assign('picture_exists', 1);
    $picture_details = "/assets/pictures/" . $picture;
} else {
    $picture_details = "/images/default_image.jpg";
}
list($width, $height, $type, $attr) = getimagesize($picture_details);
$image_height = $height;
$image_width = $width;

if (isset($_POST['postback_edit'])) { // save postback to DB
    include 'includes/validate_postback_edit.php';
    if ($error_list) {
        $smarty->assign('update_warning', 1);
        $smarty->assign('display_edit_errors', 1);
        $smarty->assign('error_title', $error_title);
        $smarty->assign('error_list', $error_list);
    } else {
        $smarty->assign('update_notice', 1);
        $smarty->assign('edit_success', $edit_success);
        if (isset($_POST['e_postback_url'])) {
            $e_postback_url = html_output($_POST['e_postback_url']); // TODO display N/A instead of empty
            $e_method = html_output($_POST['e_method']); // 0 for GET, 1 for POST
            $chk_postback_state = html_output($_POST['e_postback_state']);
            if ($chk_postback_state === "on") { $e_postback_state = 1; } else { $e_postback_state = 0; }
            $st = $db->prepare('update idevaff_postbacks set postback_url = ?, method = ?, state = ? where acct_id = ? and grp = 0');
            $st->execute([$e_postback_url, $e_method, $e_postback_state, $linkid]);
        }
    }
} else { // get postbacks from DB
$get_e_postback = $db->prepare('select * from idevaff_postbacks where acct_id = ? and grp = 0');
$get_e_postback->execute([$linkid]);
$query = $get_e_postback->fetch();
$e_postback_url = $query['postback_url'];
$e_postback_state = $query['state'];
$e_method = $query['method'];
    if (!$e_postback_url) {
    $e_postback_url = 'N/A';
    }
}
        $smarty->assign('image_height', $image_height);
        $smarty->assign('image_width', $image_width);
        $smarty->assign('picture_details', $picture_details);
        $smarty->assign('internal_page', 30);
    	$smarty->assign('main_menu_group', 'postbacks');
    	$smarty->assign('sub_menu_group', 'postbacks_settings');
        $smarty->assign('e_postback_url', $e_postback_url);
        $smarty->assign('e_postback_state', $e_postback_state);
        $smarty->assign('e_method', $e_method);
        $smarty->assign('httpcode', $httpcode);
        $smarty->assign('httpresult', $httpresult);
    } 
// POSTBACK SETTINGS PAGE END
// POSTBACK LOGS START
    if ('31' === $page_request) {
$get_pic = $db->query("select picture from idevaff_affiliates where id = '" . $_SESSION[$install_directory_name . '_idev_LoggedID'] . "'");
$get_pic_result = $get_pic->fetch();
$picture = $get_pic_result['picture'];

if ($picture != '') {
    $smarty->assign('picture_exists', 1);
    $picture_details = "/assets/pictures/" . $picture;
} else {
    $picture_details = "/images/default_image.jpg";
}

list($width, $height, $type, $attr) = getimagesize($picture_details);
$image_height = $height;
$image_width = $width;
$smarty->assign('image_height', $image_height);
$smarty->assign('image_width', $image_width);
$smarty->assign('picture_details', $picture_details);
        $smarty->assign('internal_page', 31);
    	$smarty->assign('main_menu_group', 'postbacks');
    	$smarty->assign('sub_menu_group', 'postbacks_logs');
    }
// POSTBACK LOGS END

// OFFER PAGE START
    if ('32' === $page_request) {
        $smarty->assign('internal_page', 32);
    }
// OFFER PAGE END

    if ('33' === $page_request) {
        $smarty->assign('internal_page', 33);
    }

    if ('34' === $page_request) {
        $smarty->assign('internal_page', 34);
    }

    if ('35' === $page_request) {
        $data_get = '35';
        $smarty->assign('internal_page', 35);
        $smarty->assign('main_menu_group', 'custom');
        $smarty->assign('sub_menu_group', 'alternate');
    }

    if ('36' === $page_request) {
        $data_get = '36';
        $smarty->assign('internal_page', 36);
        $smarty->assign('main_menu_group', 'custom');
        $smarty->assign('sub_menu_group', 'reports');
    }

    if ('37' === $page_request) {
        $data_get = '37';
        $smarty->assign('internal_page', 37);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'peels');
    }

    if ('38' === $page_request) {
        $data_get = '38';
        $smarty->assign('internal_page', 38);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'lightboxes');
    }

    if ('39' === $page_request) {
        $data_get = '39';
        $smarty->assign('internal_page', 39);
        $smarty->assign('main_menu_group', 'tm');
        $smarty->assign('sub_menu_group', 'videos');
    }

    if ('40' === $page_request) {
        $data_get = '40';
        $smarty->assign('internal_page', 40);
    }

    if ('41' === $page_request) {
        $data_get = '41';
        $smarty->assign('internal_page', 41);
    }

    if ('42' === $page_request && $qr_codes_enabled) {
        $data_get = '42';
        $smarty->assign('internal_page', 42);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'qr_codes');
    }

    if ('43' === $page_request && '1' === $pic_upload) {
        $data_get = '43';
        $smarty->assign('internal_page', 43);
    }

    if ('44' === $page_request) {
        $data_get = '44';
        $smarty->assign('internal_page', 44);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'coupons');
    }

    if ('45' === $page_request && 0 < $anncount && isset($sm_eligible) && file_exists('plugin_keys/social_media_license_key.php')) {
        $data_get = '45';
        $smarty->assign('internal_page', 45);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'social_media');
    }

    if ('46' === $page_request) {
        $data_get = '46';
        $smarty->assign('internal_page', 46);
    }

    if ('47' === $page_request && 0 < $markvidcount) {
        $data_get = '47';
        $smarty->assign('internal_page', 47);
        $smarty->assign('main_menu_group', 'marketing');
        $smarty->assign('sub_menu_group', 'video_marketing');
    }

    if ('48' === $page_request) {
        $data_get = '48';
        $smarty->assign('internal_page', 48);
    }
}

$smarty->assign('sub_tracking_id', $sub_tracking_id);
$smarty->assign('textlink_name', $links_title);
$smarty->assign('marketing_target_url', $marketing_target_url);
$smarty->assign('marketing_source_code', $marketing_source_code);
$smarty->assign('sub_tracking_title', $sub_tracking_title);
if (2 === $link_style) {
    $smarty->assign('seo_links', 1);
    $smarty->assign('siteurl', $siteurl);
}

$suspended_notes = $db->prepare('select notice from idevaff_suspensions where affid = ?');
$suspended_notes->execute([$linkid]);
$query = $suspended_notes->fetch();
$notice = $query['notice'];
if (!$notice) {
    $notice = 'None';
}

$smarty->assign('notice', $notice);
if (isset($data_get)) {
    include 'templates/internals/core.data_tables.php';
}

if (isset($_POST['update_logo'])) {
    include 'includes/logo_upload.php';
}

if (isset($_POST['update_picture'])) {
    include 'includes/picture_upload.php';
}

if (7 === $page_request || 37 === $page_request || 38 === $page_request || 8 === $page_request || 23 === $page_request || 9 === $page_request || 10 === $page_request || 28 === $page_request || 11 === $page_request || 12 === $page_request || 24 === $page_request || 13 === $page_request || 14 === $page_request || 26 === $page_request || 35 === $page_request || 45 === $page_request || 47 === $page_request) {
    include 'templates/internals/core.data_marketing.php';
}

if (39 === $page_request) {
    include 'templates/internals/core.video_tables.php';
}

if (42 === $page_request && $qr_codes_enabled) {
    include 'templates/internals/core.qr_codes.php';
}

if (44 === $page_request) {
    include 'templates/internals/core.coupon_codes.php';
}
/*
if (isset($_GET['startD'])) {
    $startD = $_GET['startD'];
} else {
    $startD = date('Y/m/d');
}
if (isset($_GET['endD'])) {
    $endD = $_GET['endD'];
} else {
    $endD = date('Y/m/d');
}
$date1 = strtotime($startD);
$date2 = strtotime($endD);
$datediff = $date2 - $date1;
$day_diff = round($datediff / (60 * 60 * 24));

$chart_traffic = $db->prepare('select COUNT(DISTINCT ip) from idevaff_iptracking where acct_id = ?');
$chart_traffic->execute([$linkid]);
$chart_traffic = $chart_traffic->fetchColumn();
$chart_traffic = $chart_traffic[0];

$chart_approved = $db->prepare("select COUNT(*) from idevaff_sales where approved = '1' and bonus = '0' and id = ?");
$chart_approved->execute([$linkid]);
$chart_approved = $chart_approved->fetchColumn();
$chart_approved = $chart_approved[0];
$chart_paid = $db->prepare("select COUNT(*) from idevaff_archive where bonus = '0' and id = ?");
$chart_paid->execute([$linkid]);
$chart_paid = $chart_paid->fetchColumn();
$chart_paid = $chart_paid[0];
$chart_commissions = $chart_approved + $chart_paid;
$smarty->assign('chart_traffic', $chart_traffic);
$smarty->assign('chart_commissions', $chart_commissions);
*/
$button_details = $db->prepare('select f_name, l_name, email from idevaff_affiliates where id = ?');
$button_details->execute([$linkid]);
$button_result = $button_details->fetch();
$fname_data = $button_result['f_name'];
$lname_data = $button_result['l_name'];
$email_data = $button_result['email'];
$pass_word = 'just_encrypted_not_secure';
$aff_fname_encrypted = encrypt($fname_data, $pass_word);
$aff_lname_encrypted = encrypt($lname_data, $pass_word);
$aff_email_encrypted = encrypt($email_data, $pass_word);
$smarty->assign('aff_fname', $aff_fname_encrypted);
$smarty->assign('aff_lname', $aff_lname_encrypted);
$smarty->assign('aff_email', $aff_email_encrypted);
// smarty dates needed for date ranges of JS date range selector use start and end vars to extract date ranges
// TODO: replace .strtotime('00:00:00 -'.$l.' days'). with start and .strtotime('23:59:59 -'.$l.' days') with end
/*
 $ajax_var1 = $_POST['variable1'];
 $ajax_var2 = $_POST['variable2'];
 $dni - do not use - use 2 vars to set the range
*/
$config['date'] = '%I:%M %p';
$config['time'] = '%H:%M:%S';
$smarty->assign('config', $config);
$smarty->assign('yesterday', strtotime('-1 days'));
$smarty->assign('minus7', strtotime('-6 days'));
$smarty->assign('minus30', strtotime('-29 days'));
// smarty dates end

include_once 'includes/tokens.php';
/*
$chart_array_graph = '';
$dni = 29;
for ($l = $day_diff; $dni <= $l; --$l) {
    $chart_traffic_raw = $db->prepare('select COUNT(ip) from idevaff_iptracking where acct_id = ? and stamp between ' . strtotime('00:00:00 -' . $l . ' days') . ' and ' . strtotime('23:59:59 -' . $l . ' days'));
    $chart_traffic_raw->execute([$linkid]);
    $chart_traffic = $db->prepare('select COUNT(DISTINCT ip) from idevaff_iptracking where acct_id = ? and stamp between ' . strtotime('00:00:00 -' . $l . ' days') . ' and ' . strtotime('23:59:59 -' . $l . ' days'));
    $chart_traffic->execute([$linkid]);
    $chart_approved = $db->prepare("select COUNT(*) from idevaff_sales where approved = '1' and id = ? and top_tier_tag = '0' and code between " . strtotime('00:00:00 -' . $l . ' days') . ' and ' . strtotime('23:59:59 -' . $l . ' days'));
    $chart_approved->execute([$linkid]);
    $chart_paid = $db->prepare('select COUNT(*) from idevaff_archive where id = ? and top_tier_tag = "0" and code between ' . strtotime('00:00:00 -' . $l . ' days') . ' and ' . strtotime('23:59:59 -' . $l . ' days'));
    $chart_paid->execute([$linkid]);
    $chart_sales_totals = $db->prepare("select COALESCE(SUM(payment),0) as chart_sales_totals from idevaff_sales where approved = '1' and id = ? and top_tier_tag = '0' and code between " . strtotime('00:00:00 -' . $l . ' days') . ' and ' . strtotime('23:59:59 -' . $l . ' days'));
    $chart_sales_totals->execute([$linkid]);
// paid
    $chart_sales_totals_paid = $db->prepare("select COALESCE(SUM(payment),0) as chart_sales_totals_paid from idevaff_archive where id = ? and top_tier_tag = '0' and code between " . strtotime('00:00:00 -' . $l . ' days') . ' and ' . strtotime('23:59:59 -' . $l . ' days'));
    $chart_sales_totals_paid->execute([$linkid]);

    $chart_traffic_raw = $chart_traffic_raw->fetchColumn();
    $chart_traffic = $chart_traffic->fetchColumn();
    $chart_approved = $chart_approved->fetchColumn();
    $chart_paid = $chart_paid->fetchColumn();
    $chart_sales_totals = $chart_sales_totals->fetch();
    $chart_sales_totals = $chart_sales_totals['chart_sales_totals'];
    $chart_sales_totals_paid = $chart_sales_totals_paid->fetch();
    $chart_sales_totals_paid = $chart_sales_totals_paid['chart_sales_totals_paid'];
    $chart_commissions = $chart_approved + $chart_paid;
    $chart_all_earnings = $chart_sales_totals + $chart_sales_totals_paid;

    if ($chart_traffic == 0) {
        $sales_ratio = 0;
        $sales_ratio_rounded = 0;
        $chart_rpm = 0;
    } else {
        $sales_ratio = $chart_commissions / $chart_traffic * 100;
        $sales_ratio_rounded = round($sales_ratio, 3);
        $chart_rpm_unrounded = $chart_all_earnings / $chart_traffic * 1000;
        $chart_rpm = round($chart_rpm_unrounded, 2);
    }


    $table_stats .= '[ "' . date('Y/m/d', strtotime('-' . $l . ' days')) . '", "' . $chart_traffic_raw . '", "' . $chart_traffic . '", "' . $chart_commissions . '", "' . $sales_ratio_rounded . '%", "' . $chart_rpm . '€", "' . $chart_all_earnings . '€" ],';

    $chart_array_graph .= "{ d: '" . date('Y/m/d', strtotime('-' . $l . ' days')) . "', a: " . $chart_traffic . ', b: ' . $chart_commissions . ', e: ' . $sales_ratio_rounded . ', f: ' . $chart_sales_totals . ' }, c: ' . $chart_all_earnings . ' },';

} 

// end for statement where $dni is delcared 
$smarty->assign('chart_array', $chart_array);
$smarty->assign('table_stats', $table_stats);
$smarty->assign('chart_array_graph', $chart_array_graph);
*/
$smarty->assign('inner_page', 1);
$get_payment_method = $db->prepare('select paypal, stripe_user_data, pay_method from idevaff_affiliates where id = ?');
$get_payment_method->execute([$linkid]);
$pay_method_results = $get_payment_method->fetch();
$res_paypal = $pay_method_results['paypal'];
$res_stripe = $pay_method_results['stripe_user_data'];
$res_method = $pay_method_results['pay_method'];
$smarty->assign('res_method', $res_method);
if (2 === $res_method) {
    $stripe_user_data = unserialize(base64_decode($pay_method_results['stripe_user_data'], true));
    if (is_array($stripe_user_data) && empty($stripe_user_data) || '' === $pay_method_results['stripe_user_data']) {
        $show_notice = 'Stripe';
    }
}

if (1 === $res_method && empty($res_paypal)) {
    $show_notice = 'PayPal';
}

if (isset($show_notice)) {
    $temp_fields = 'payment_update_notice_1,payment_update_notice_2';

    try {
        $query = $db->query('select ' . $temp_fields . ' from `idevaff_language_' . $pack_table_selected . '` LIMIT 1');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage = $query->fetch();
        $query->closeCursor();
    } catch (Exception $ex) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        exit();
    }
    $payment_update_notice_1 = html_language_output($getlanguage['payment_update_notice_1']);
    $payment_update_notice_2 = html_language_output($getlanguage['payment_update_notice_2']);
    $payment_update_notice_2 = str_replace('[payment_option_here]', $show_notice, $payment_update_notice_2);
    $smarty->assign('payment_update_notice', '<div class="alert alert-warning" style="margin-top:25px;"><strong>' . $payment_update_notice_1 . '</strong>' . ' ' . $payment_update_notice_2 . '</div>');
}

$smarty->display('account.tpl');
function encrypt($decrypted, $password, $salt = '!kQm*fF3pXe1Kbm%9')
{
    $method = 'aes-256-cbc';
    $encryption_key = substr(hash('sha512', $salt . $password), 0, 32);
    $iv_size = openssl_cipher_iv_length($method);
    $iv = openssl_random_pseudo_bytes($iv_size);
    $encrypted = openssl_encrypt($decrypted, $method, $encryption_key, 0, $iv);

    return base64_encode($encrypted) . ':' . base64_encode($iv);
}

?>
