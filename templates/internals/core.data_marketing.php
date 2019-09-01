<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

if (isset($data_get)) {
    $smarty->assign('marketing_group_title', $marketing_group_title);
    $smarty->assign('marketing_button', $marketing_button);
    $smarty->assign('marketing_no_group', $marketing_no_group);
    $smarty->assign('marketing_choose', $marketing_choose);
    $smarty->assign('marketing_notice', $marketing_notice);

    if ($data_get == 7) { include ("core.data_banners.php"); }
    if ($data_get == 8) { include ("core.data_textads.php"); }
    if ($data_get == 9) { include ("core.data_textlinks.php"); }
    if ($data_get == 10) { include ("core.data_email_links.php"); }
    if ($data_get == 23) { include ("core.data_htmlads.php"); }
    if ($data_get == 28) { include ("core.data_email_templates.php"); }
    if ($data_get == 37) { include ("core.data_peels.php"); }
    if ($data_get == 38) { include ("core.data_lightboxes.php"); }
    if (($data_get == 45) && ($anncount > 0) && (isset($sm_eligible)) && (file_exists('plugin_keys/social_media_license_key.php'))) { include ("core.data_announcements.php"); }
    if ($data_get == 47) { include ("core.data_vids.php"); }

if ($data_get == 11) {
    $temp_fields = 'offline_title,offline_paragraph_one,offline_send,offline_page_link,offline_paragraph_two';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $offline_title=html_language_output($getlanguage['offline_title']);
    $offline_paragraph_one=html_language_output($getlanguage['offline_paragraph_one']);
    $offline_send=html_language_output($getlanguage['offline_send']);
    $offline_page_link=html_language_output($getlanguage['offline_page_link']);
    $offline_paragraph_two=html_language_output($getlanguage['offline_paragraph_two']);

    $smarty->assign('offline_location', $offline_loc);
    $smarty->assign('offline_tag', $offline_tag);
    $smarty->assign('offline_title', $offline_title);
    $smarty->assign('offline_paragraph_one', $offline_paragraph_one);
    $smarty->assign('offline_send', $offline_send);
    $smarty->assign('offline_page_link', $offline_page_link);
    $smarty->assign('offline_paragraph_two', $offline_paragraph_two);
}

if ($data_get == 12) {
    $temp_fields = 'tlinks_title,tlinks_embedded_one,tlinks_embedded_two,tlinks_embedded_current,tlinks_forced_two,
    tlinks_forced_code,tlinks_forced_paste,tlinks_forced_money,tlinks_active,tlinks_payout_structure,tlinks_level,
    tierText1,tierText2,tierText3,tierTextflat';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $tlinks_title=html_language_output($getlanguage['tlinks_title']);
    $tlinks_embedded_one=html_language_output($getlanguage['tlinks_embedded_one']);
    $tlinks_embedded_two=html_language_output($getlanguage['tlinks_embedded_two']);
    $tlinks_embedded_current=html_language_output($getlanguage['tlinks_embedded_current']);
    $tlinks_forced_two=html_language_output($getlanguage['tlinks_forced_two']);
    $tlinks_forced_code=html_language_output($getlanguage['tlinks_forced_code']);
    $tlinks_forced_paste=html_language_output($getlanguage['tlinks_forced_paste']);
    $tlinks_forced_money=html_language_output($getlanguage['tlinks_forced_money']);

    $tlinks_active=html_language_output($getlanguage['tlinks_active']);
    $tlinks_payout_structure=html_language_output($getlanguage['tlinks_payout_structure']);
    $tlinks_level=html_language_output($getlanguage['tlinks_level']);
    $tierText1=html_language_output($getlanguage['tierText1']);
    $tierText2=html_language_output($getlanguage['tierText2']);
    $tierText3=html_language_output($getlanguage['tierText3']);
    $tierTextflat=html_language_output($getlanguage['tierTextflat']);

$smarty->assign('tier_numbers', $tier_numbers);

$smarty->assign('tlinks_active', $tlinks_active);
$smarty->assign('tlinks_payout_structure', $tlinks_payout_structure);
$smarty->assign('tlinks_level', $tlinks_level);

if ($tier_numbers > 0) {

// TIER ONE STATS
if ($tier_numbers >= 1) {
$smarty->assign('tier_1_active', '1');
$get_payout_type = $db->query("select level_1_amount, level_1_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_1_amount = $get_payout_type['level_1_amount'];
$tier_1_type = $get_payout_type['level_1_type'];
if ($tier_1_type == 1) { $smarty->assign('tier_1_amount', $tier_1_amount); $smarty->assign('tier_1_type', $tierText1); }
if ($tier_1_type == 2) { $smarty->assign('tier_1_amount', $tier_1_amount); $smarty->assign('tier_1_type', $tierText2); }
if ($tier_1_type == 3) { $smarty->assign('tier_1_amount', $tier_1_amount); $smarty->assign('tier_1_type', $tierText3); }
if ($tier_1_type == 4) { 
$tier1_payout_flat = number_format($tier_1_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier1_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier1_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_1_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_1_type', $tierText4); }
}

// TIER TWO STATS
if ($tier_numbers >= 2) {
$smarty->assign('tier_2_active', '1');
$get_payout_type = $db->query("select level_2_amount, level_2_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_2_amount = $get_payout_type['level_2_amount'];
$tier_2_type = $get_payout_type['level_2_type'];
if ($tier_2_type == 1) { $smarty->assign('tier_2_amount', $tier_2_amount); $smarty->assign('tier_2_type', $tierText1); }
if ($tier_2_type == 2) { $smarty->assign('tier_2_amount', $tier_2_amount); $smarty->assign('tier_2_type', $tierText2); }
if ($tier_2_type == 3) { $smarty->assign('tier_2_amount', $tier_2_amount); $smarty->assign('tier_2_type', $tierText3); }
if ($tier_2_type == 4) { 
$tier2_payout_flat = number_format($tier_2_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier2_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier2_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_2_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_2_type', $tierText4); }
}

// TIER THREE STATS
if ($tier_numbers >= 3) {
$smarty->assign('tier_3_active', '1');
$get_payout_type = $db->query("select level_3_amount, level_3_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_3_amount = $get_payout_type['level_3_amount'];
$tier_3_type = $get_payout_type['level_3_type'];
if ($tier_3_type == 1) { $smarty->assign('tier_3_amount', $tier_3_amount); $smarty->assign('tier_3_type', $tierText1); }
if ($tier_3_type == 2) { $smarty->assign('tier_3_amount', $tier_3_amount); $smarty->assign('tier_3_type', $tierText2); }
if ($tier_3_type == 3) { $smarty->assign('tier_3_amount', $tier_3_amount); $smarty->assign('tier_3_type', $tierText3); }
if ($tier_3_type == 4) { 
$tier3_payout_flat = number_format($tier_3_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier3_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier3_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_3_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_3_type', $tierText4); }
}

// TIER FOUR STATS
if ($tier_numbers >= 4) {
$smarty->assign('tier_4_active', '1');
$get_payout_type = $db->query("select level_4_amount, level_4_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_4_amount = $get_payout_type['level_4_amount'];
$tier_4_type = $get_payout_type['level_4_type'];
if ($tier_4_type == 1) { $smarty->assign('tier_4_amount', $tier_4_amount); $smarty->assign('tier_4_type', $tierText1); }
if ($tier_4_type == 2) { $smarty->assign('tier_4_amount', $tier_4_amount); $smarty->assign('tier_4_type', $tierText2); }
if ($tier_4_type == 3) { $smarty->assign('tier_4_amount', $tier_4_amount); $smarty->assign('tier_4_type', $tierText3); }
if ($tier_4_type == 4) { 
$tier4_payout_flat = number_format($tier_4_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier4_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier4_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_4_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_4_type', $tierText4); }
}

// TIER FIVE STATS
if ($tier_numbers >= 5) {
$smarty->assign('tier_5_active', '1');
$get_payout_type = $db->query("select level_5_amount, level_5_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_5_amount = $get_payout_type['level_5_amount'];
$tier_5_type = $get_payout_type['level_5_type'];
if ($tier_5_type == 1) { $smarty->assign('tier_5_amount', $tier_5_amount); $smarty->assign('tier_5_type', $tierText1); }
if ($tier_5_type == 2) { $smarty->assign('tier_5_amount', $tier_5_amount); $smarty->assign('tier_5_type', $tierText2); }
if ($tier_5_type == 3) { $smarty->assign('tier_5_amount', $tier_5_amount); $smarty->assign('tier_5_type', $tierText3); }
if ($tier_5_type == 4) { 
$tier5_payout_flat = number_format($tier_5_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier5_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier5_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_5_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_5_type', $tierText4); }
}

// TIER SIX STATS
if ($tier_numbers >= 6) {
$smarty->assign('tier_6_active', '1');
$get_payout_type = $db->query("select level_6_amount, level_6_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_6_amount = $get_payout_type['level_6_amount'];
$tier_6_type = $get_payout_type['level_6_type'];
if ($tier_6_type == 1) { $smarty->assign('tier_6_amount', $tier_6_amount); $smarty->assign('tier_6_type', $tierText1); }
if ($tier_6_type == 2) { $smarty->assign('tier_6_amount', $tier_6_amount); $smarty->assign('tier_6_type', $tierText2); }
if ($tier_6_type == 3) { $smarty->assign('tier_6_amount', $tier_6_amount); $smarty->assign('tier_6_type', $tierText3); }
if ($tier_6_type == 4) { 
$tier6_payout_flat = number_format($tier_6_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier6_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier6_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_6_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_6_type', $tierText4); }
}

// TIER SEVEN STATS
if ($tier_numbers >= 7) {
$smarty->assign('tier_7_active', '1');
$get_payout_type = $db->query("select level_7_amount, level_7_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_7_amount = $get_payout_type['level_7_amount'];
$tier_7_type = $get_payout_type['level_7_type'];
if ($tier_7_type == 1) { $smarty->assign('tier_7_amount', $tier_7_amount); $smarty->assign('tier_7_type', $tierText1); }
if ($tier_7_type == 2) { $smarty->assign('tier_7_amount', $tier_7_amount); $smarty->assign('tier_7_type', $tierText2); }
if ($tier_7_type == 3) { $smarty->assign('tier_7_amount', $tier_7_amount); $smarty->assign('tier_7_type', $tierText3); }
if ($tier_7_type == 4) { 
$tier7_payout_flat = number_format($tier_7_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier7_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier7_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_7_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_7_type', $tierText4); }
}

// TIER EIGHT STATS
if ($tier_numbers >= 8) {
$smarty->assign('tier_8_active', '1');
$get_payout_type = $db->query("select level_8_amount, level_8_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_8_amount = $get_payout_type['level_8_amount'];
$tier_8_type = $get_payout_type['level_8_type'];
if ($tier_8_type == 1) { $smarty->assign('tier_8_amount', $tier_8_amount); $smarty->assign('tier_8_type', $tierText1); }
if ($tier_8_type == 2) { $smarty->assign('tier_8_amount', $tier_8_amount); $smarty->assign('tier_8_type', $tierText2); }
if ($tier_8_type == 3) { $smarty->assign('tier_8_amount', $tier_8_amount); $smarty->assign('tier_8_type', $tierText3); }
if ($tier_8_type == 4) { 
$tier8_payout_flat = number_format($tier_8_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier8_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier8_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_8_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_8_type', $tierText4); }
}

// TIER NINE STATS
if ($tier_numbers >= 9) {
$smarty->assign('tier_9_active', '1');
$get_payout_type = $db->query("select level_9_amount, level_9_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_9_amount = $get_payout_type['level_9_amount'];
$tier_9_type = $get_payout_type['level_9_type'];
if ($tier_9_type == 1) { $smarty->assign('tier_9_amount', $tier_9_amount); $smarty->assign('tier_9_type', $tierText1); }
if ($tier_9_type == 2) { $smarty->assign('tier_9_amount', $tier_9_amount); $smarty->assign('tier_9_type', $tierText2); }
if ($tier_9_type == 3) { $smarty->assign('tier_9_amount', $tier_9_amount); $smarty->assign('tier_9_type', $tierText3); }
if ($tier_9_type == 4) { 
$tier9_payout_flat = number_format($tier_9_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier9_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier9_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_9_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_9_type', $tierText4); }
}

// TIER TEN STATS
if ($tier_numbers >= 10) {
$smarty->assign('tier_10_active', '1');
$get_payout_type = $db->query("select level_10_amount, level_10_type from idevaff_tier_settings");
$get_payout_type = $get_payout_type->fetch();
$tier_10_amount = $get_payout_type['level_10_amount'];
$tier_10_type = $get_payout_type['level_10_type'];
if ($tier_10_type == 1) { $smarty->assign('tier_10_amount', $tier_10_amount); $smarty->assign('tier_10_type', $tierText1); }
if ($tier_10_type == 2) { $smarty->assign('tier_10_amount', $tier_10_amount); $smarty->assign('tier_10_type', $tierText2); }
if ($tier_10_type == 3) { $smarty->assign('tier_10_amount', $tier_10_amount); $smarty->assign('tier_10_type', $tierText3); }
if ($tier_10_type == 4) { 
$tier10_payout_flat = number_format($tier_10_amount,$decimal_symbols);
if($cur_sym_location == 1) { $pdis = $cur_sym . $tier10_payout_flat; }
if($cur_sym_location == 2) { $pdis = $tier10_payout_flat . " " . $cur_sym; }
$smarty->assign('tier_10_amount', $pdis);
$tierText4 =  " " . $currency . " " . $tierTextflat;
$smarty->assign('tier_10_type', $tierText4); }
}

}

$smarty->assign('tlinks_forced_code', $tlinks_forced_code);
$smarty->assign('tlinks_title', $tlinks_title);
if ($tlinks) {
    $smarty->assign('forced_links', 1);



    $smarty->assign('tlinks_forced_two', $tlinks_forced_two);
    $smarty->assign('tlinks_forced_paste', $tlinks_forced_paste);
    $smarty->assign('tlinks_forced_money', $tlinks_forced_money);
} else {
    $get_payout_type = $db->query("select level_1_amount, level_1_type from idevaff_tier_settings");
    $get_payout_type = $get_payout_type->fetch();
    $tier_1_amount = $get_payout_type['level_1_amount'];
    $tier_1_type = $get_payout_type['level_1_type'];




    $smarty->assign('tlinks_embedded_one', $tlinks_embedded_one);
    $smarty->assign('tlinks_embedded_two', $tlinks_embedded_two);
    $smarty->assign('tlinks_embedded_current', $tlinks_embedded_current);
}
}

if ($data_get == 24) {
$get_others = $db->query("select * from idevaff_pdf where pdf_type = '1' or pdf_type= '3' order by sort"); 
$others_results = array(); 
$i=0; 
while ($r=$get_others->fetch()) {
$pdf_filename = $r['filename'];
$pdf_desc = $r['pdf_desc'];
$pdf_size = number_format($r['size']);
$pdf_type = $r['pdf_type'];
            $tmp = array( 
                'pdf_filename' => $pdf_filename, 
                'pdf_desc' => $pdf_desc, 
				'pdf_type' => $pdf_type, 
                'pdf_size' => $pdf_size
            );
            $pdf_results[$i++] = $tmp; }

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
    $smarty->assign('pdf_marketing', $pdf_marketing);
    $smarty->assign('pdf_description_1', $pdf_description_1);
    $smarty->assign('pdf_description_2', $pdf_description_2);
    $smarty->assign('pdf_file_name', $pdf_file_name);
    $smarty->assign('pdf_file_size', $pdf_file_size);
    $smarty->assign('pdf_file_description', $pdf_file_description);
    $smarty->assign('pdf_bytes', $pdf_bytes);
}

if ($data_get == 13) {

$smarty->assign('friends_title', $friends_title);
$smarty->assign('friends_info_one', $friends_info_one);
$smarty->assign('friends_info_two', $friends_info_two);
$smarty->assign('friends_info_three', $friends_info_three);
$smarty->assign('friends_heading_name', $friends_heading_name);
$smarty->assign('friends_heading_email', $friends_heading_email);
$smarty->assign('friends_recip_one', $friends_recip_one);
$smarty->assign('friends_recip_two', $friends_recip_two);
$smarty->assign('friends_recip_three', $friends_recip_three);
$smarty->assign('friends_subject', $friends_subject);
$smarty->assign('friends_body', $friends_body);
$smarty->assign('friends_insert', $friends_insert);
$smarty->assign('friends_footer', $friends_footer);
$smarty->assign('friends_chars_left', $friends_chars_left);
$smarty->assign('friends_note_heading', $friends_note_heading);
$smarty->assign('friends_note_one', $friends_note_one);
$smarty->assign('friends_note_two', $friends_note_two);
$smarty->assign('friends_note_three', $friends_note_three);
$smarty->assign('friends_note_four', $friends_note_four);
$smarty->assign('friends_button', $friends_button);
$smarty->assign('help_friends_footer_heading', $help_friends_footer_heading);
if (isset($help_friends_footer_subject)) { $smarty->assign('help_friends_footer_subject', $help_friends_footer_subject); }
$smarty->assign('help_friends_footer_info', $help_friends_footer_info);
$smarty->assign('help_friends_subject_heading', $help_friends_subject_heading);
if (isset($help_friends_subject_subject)) { $smarty->assign('help_friends_subject_subject', $help_friends_subject_subject); }
$smarty->assign('help_friends_subject_info', $help_friends_subject_info);
$smarty->assign('help_friends_message_heading', $help_friends_message_heading);
if (isset($help_friends_message_subject)) { $smarty->assign('help_friends_message_subject', $help_friends_message_subject); }
$smarty->assign('help_friends_message_info', $help_friends_message_info);

//$dispdata=$db->query("select email, f_name, l_name from idevaff_affiliates where id = '$linkid'");
$dispdata=$db->prepare("select email, f_name, l_name from idevaff_affiliates where id = ?");
$dispdata->execute(array($linkid));
$dispdata=$dispdata->fetch();
$affemail=$dispdata['email'];
$f_name=$dispdata['f_name'];
$l_name=$dispdata['l_name'];
$smarty->assign('affemail', $affemail);

$tpldispdata = $db->query("select friend_subject, friend_body from idevaff_email_english");
$tpldatadispdata = $tpldispdata->fetch();
$fr_sub=$tpldatadispdata['friend_subject'];
$fr_bod=$tpldatadispdata['friend_body'];

if ($link_style == 1) {
$email_friends_url = $base_url . "/" . $filename . ".php?id=" . $standard_link_association;
} elseif ($link_style == 2) {
if (($seo_link_structure == 1) || ($seo_link_structure == 3)){ $add_html = ".html"; } else { $add_html = null; }
$email_friends_url = $siteurl . $seo_link_association_marketing . $add_html;
}

$smarty->assign('email_friends_url', $email_friends_url);

$smarty->assign('email_interval', $email_interval);

if (isset($_POST['subject'])) {
$smarty->assign('sub', stripslashes($_POST['subject']));
} else {
$smarty->assign('sub', $fr_sub); }

if (isset($_POST['body'])) {
$smarty->assign('bod', stripslashes($_POST['body']));
} else {
$smarty->assign('bod', $fr_bod); }

if (isset($_POST['footer'])) {
$smarty->assign('foot', stripslashes($_POST['footer']));
} else {
$smarty->assign('foot', $f_name . ' ' . $l_name); }

if (isset($_POST['name1'])) { $smarty->assign('post_name1', stripslashes($_POST['name1'])); }
if (isset($_POST['name2'])) { $smarty->assign('post_name2', stripslashes($_POST['name2'])); }
if (isset($_POST['name3'])) { $smarty->assign('post_name3', stripslashes($_POST['name3'])); }
if (isset($_POST['email1'])) { $smarty->assign('post_email1', stripslashes($_POST['email1'])); }
if (isset($_POST['email2'])) { $smarty->assign('post_email2', stripslashes($_POST['email2'])); }
if (isset($_POST['email3'])) { $smarty->assign('post_email3', stripslashes($_POST['email3'])); } }

if ($data_get == 14) {
    $temp_fields = 'keyword_title,keyword_info,keyword_heading,keyword_tracking,keyword_build,keyword_example,keyword_tutorial';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $keyword_title=html_language_output($getlanguage['keyword_title']);
    $keyword_info=html_language_output($getlanguage['keyword_info']);
    $keyword_heading=html_language_output($getlanguage['keyword_heading']);
    $keyword_tracking=html_language_output($getlanguage['keyword_tracking']);
    $keyword_build=html_language_output($getlanguage['keyword_build']);
    $keyword_example=html_language_output($getlanguage['keyword_example']);
    $keyword_tutorial=html_language_output($getlanguage['keyword_tutorial']);

    $smarty->assign('keyword_title', $keyword_title);
    $smarty->assign('keyword_info', $keyword_info);
    $smarty->assign('keyword_heading', $keyword_heading);
    $smarty->assign('keyword_tracking', $keyword_tracking);
    $smarty->assign('keyword_build', $keyword_build);
    $smarty->assign('keyword_example', $keyword_example);
    $smarty->assign('keyword_tutorial', $keyword_tutorial);
    $ck_linkurl = "$base_url/" . $filename . ".php?id=" . $linkid;
    $smarty->assign('custom_keyword_linkurl', $ck_linkurl);
}

if ($data_get == 26) {
    $temp_fields = 'sub_tracking_id,sub_tracking_title,sub_tracking_info,sub_tracking_build,sub_tracking_example,
    sub_tracking_tutorial,sub_tracking_none';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $sub_tracking_id=html_language_output($getlanguage['sub_tracking_id']);
    $sub_tracking_title=html_language_output($getlanguage['sub_tracking_title']);
    $sub_tracking_info=html_language_output($getlanguage['sub_tracking_info']);
    $sub_tracking_build=html_language_output($getlanguage['sub_tracking_build']);
    $sub_tracking_example=html_language_output($getlanguage['sub_tracking_example']);
    $sub_tracking_tutorial=html_language_output($getlanguage['sub_tracking_tutorial']);
    $sub_tracking_none=html_language_output($getlanguage['sub_tracking_none']);

    $smarty->assign('sub_tracking_info', $sub_tracking_info);
    $smarty->assign('sub_tracking_build', $sub_tracking_build);
    $smarty->assign('sub_tracking_example', $sub_tracking_example);
    $smarty->assign('sub_tracking_tutorial', $sub_tracking_tutorial);
    $ck_linkurl = $base_url . "/" . $filename . ".php?id=" . $linkid . "&sub_id=XXX";
    $smarty->assign('sub_affiliate_linkurl', $ck_linkurl);
    $cks_linkurl = $base_url . "/" . $filename . ".php?id=" . $linkid;
    $smarty->assign('sub_affiliate_sample_link', $cks_linkurl);
}

if ($data_get == 35) {
$alternate_keyword_linkurl = "$base_url/" . $filename . ".php?id=" . $linkid;
$smarty->assign('alternate_keyword_linkurl', $alternate_keyword_linkurl);
//$get_clinks = $db->query("select * from idevaff_custom_links where aff_id = $linkid and display = 1");
$get_clinks = $db->prepare("select * from idevaff_custom_links where aff_id = ? and display = 1");
$get_clinks->execute(array($linkid));
$clinks_results = array(); 
$i=0; 
while ($r=$get_clinks->fetch()) {
$clink_id = $r['id'];
$clink_url = $r['url'];

$clink_linkurl = "$base_url/" . $filename . ".php?id=" . $linkid . "&url=" . $clink_id;

            $tmp = array( 
                'clink_id' => $clink_id, 
                'clink_url' => $clink_url, 
                'clink_linkurl' => $clink_linkurl
            );
            $clinks_results[$i++] = $tmp; }

$smarty->assign('clinks_results', $clinks_results);

    $temp_fields = 'alternate_title,alternate_option_1,alternate_heading_1,alternate_info_1,alternate_button,
    alternate_links_heading,alternate_links_note,alternate_links_remove';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }

    $alternate_title=html_language_output($getlanguage['alternate_title']);
    $alternate_option_1=html_language_output($getlanguage['alternate_option_1']);
    $alternate_heading_1=html_language_output($getlanguage['alternate_heading_1']);
    $alternate_info_1=html_language_output($getlanguage['alternate_info_1']);
    $alternate_button=html_language_output($getlanguage['alternate_button']);
    $alternate_links_heading=html_language_output($getlanguage['alternate_links_heading']);
    $alternate_links_note=html_language_output($getlanguage['alternate_links_note']);
    $alternate_links_remove=html_language_output($getlanguage['alternate_links_remove']);



    $temp_fields = 'alternate_option_2,alternate_info_2,alternate_variable,alternate_example,alternate_none,alternate_build,
    alternate_tutorial,alternate_success_title,alternate_success_info,alternate_failed_title,alternate_failed_info';
    try {
        $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $getlanguage=$query->fetch();
        $query->closeCursor();
    } catch ( Exception $ex ) {
        echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
        die;
    }


    $alternate_option_2=html_language_output($getlanguage['alternate_option_2']);
    $alternate_info_2=html_language_output($getlanguage['alternate_info_2']);
    $alternate_variable=html_language_output($getlanguage['alternate_variable']);
    $alternate_example=html_language_output($getlanguage['alternate_example']);
    $alternate_none=html_language_output($getlanguage['alternate_none']);
    $alternate_build=html_language_output($getlanguage['alternate_build']);
    $alternate_tutorial=html_language_output($getlanguage['alternate_tutorial']);
    $alternate_success_title=html_language_output($getlanguage['alternate_success_title']);
    $alternate_success_info=html_language_output($getlanguage['alternate_success_info']);
    $alternate_failed_title=html_language_output($getlanguage['alternate_failed_title']);
    $alternate_failed_info=html_language_output($getlanguage['alternate_failed_info']);




    $smarty->assign('alternate_none', $alternate_none);
    $smarty->assign('alternate_tutorial', $alternate_tutorial);
    $smarty->assign('alternate_title', $alternate_title);
    $smarty->assign('alternate_option_1', $alternate_option_1);
    $smarty->assign('alternate_heading_1', $alternate_heading_1);
    $smarty->assign('alternate_info_1', $alternate_info_1);
    $smarty->assign('alternate_button', $alternate_button);
    $smarty->assign('alternate_links_heading', $alternate_links_heading);
    $smarty->assign('alternate_links_note', $alternate_links_note);
    $smarty->assign('alternate_links_remove', $alternate_links_remove);
    $smarty->assign('alternate_option_2', $alternate_option_2);
    $smarty->assign('alternate_info_2', $alternate_info_2);
    $smarty->assign('alternate_variable', $alternate_variable);
    $smarty->assign('alternate_example', $alternate_example);
    $smarty->assign('alternate_build', $alternate_build);
}

}

?>
