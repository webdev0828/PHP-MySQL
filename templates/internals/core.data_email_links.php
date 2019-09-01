<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'email_title,email_button,email_no_group,email_choose,email_notice,email_ascii,email_html,
email_test,email_test_info,email_source';
try {
    $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage=$query->fetch();
    $query->closeCursor();
} catch ( Exception $ex ) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}

$email_title=html_language_output($getlanguage['email_title']);
$email_button=html_language_output($getlanguage['email_button']);
$email_no_group=html_language_output($getlanguage['email_no_group']);
$email_choose=html_language_output($getlanguage['email_choose']);
$email_notice=html_language_output($getlanguage['email_notice']);
$email_ascii=html_language_output($getlanguage['email_ascii']);
$email_html=html_language_output($getlanguage['email_html']);
$email_test=html_language_output($getlanguage['email_test']);
$email_test_info=html_language_output($getlanguage['email_test_info']);
$email_source=html_language_output($getlanguage['email_source']);

$smarty->assign('email_title', $email_title);
//$smarty->assign('email_group', $email_group);
$smarty->assign('email_button', $email_button);
$smarty->assign('email_no_group', $email_no_group);
$smarty->assign('email_choose', $email_choose);
$smarty->assign('email_notice', $email_notice);
$smarty->assign('email_ascii', $email_ascii);
$smarty->assign('email_html', $email_html);
$smarty->assign('email_test', $email_test);
$smarty->assign('email_test_info', $email_test_info);
$smarty->assign('email_source', $email_source);
//$get_email_links = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by name");
$get_email_links = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by name");
$get_email_links->execute(array($linkid));

$email_results = array(); 
$i=0; 
while ($s=$get_email_links->fetch()) {
$groupid=$s['id'];
$groupname=$s['name'];
            $tmps = array( 'email_group_id' => $groupid, 'email_group_name' => $groupname );
            $email_results[$i++] = $tmps; }
$smarty->assign('email_results', $email_results);

if (isset($_POST['email_picked'])) { $email_picked = $_POST['email_picked'];
$smarty->assign('email_group_chosen', 1);
$email_lnk = $db->prepare("select * from idevaff_groups where id = ?");
$email_lnk->execute(array($email_picked));
$email_res=$email_lnk->fetch();
$email_tag=$email_res['name'];
$email_loc=$email_res['location'];
$email_pageid=$email_res['id'];
if ($email_loc) {
$display_tag = "$email_tag";
if ($link_style == 1) {  $email_loc = "_$email_pageid"; }
if ($link_style == 2) {  $email_loc = "-$email_pageid"; }
} else {
$display_tag = "$sitename"; }
$smarty->assign('email_chosen_group_name', $email_tag);
$smarty->assign('email_chosen_display_tag', $display_tag);
if ($link_style == 1) {
$email_chosen_url = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $email_loc;
} elseif ($link_style == 2) {
$email_chosen_url = $seo_url . $seo_link_association_marketing . $email_loc . $seo_link_extension;
}

$smarty->assign('email_chosen_url', $email_chosen_url); }

?>