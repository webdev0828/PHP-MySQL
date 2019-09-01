<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

$get_settings = $db->query("select * from idevaff_ads_default");
$settings_result = $get_settings->fetch();
$smarty->assign('BoxWidth', $settings_result['BoxWidth']);
$smarty->assign('OutlineColor', $settings_result['OutlineColor']);
$smarty->assign('TitleTextColor', $settings_result['TitleTextColor']);
$smarty->assign('TitleTextBackgroundColor', $settings_result['TitleTextBackgroundColor']);
$smarty->assign('LinkColor', $settings_result['LinkColor']);
$smarty->assign('TextColor', $settings_result['TextColor']);
$smarty->assign('TextBackgroundColor', $settings_result['TextBackgroundColor']);

if ($marketing_delivery == 1) {


$smarty->assign('ad_info', $ad_info);

//$get_textads_links = $db->query("select * from idevaff_ads where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by grp desc");
$get_textads_links = $db->prepare("select * from idevaff_ads where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by grp desc");
$get_textads_links->execute(array($linkid));
$textad_link_results = array(); 
$i=0; 
while ($t=$get_textads_links->fetch()) {
$ta_id=$t['id'];
$ta_grp=$t['grp'];

//$atagname=$db->query("select * from idevaff_groups where id = '$ta_grp'");
$atagname=$db->prepare("select * from idevaff_groups where id = ?");
$atagname->execute(array($ta_grp));
$ares=$atagname->fetch();
$altpage=$ares['location'];
$pageid=$ares['id'];
$adname=$ares['name'];

if ($altpage) { $quick_link = $altpage; } else { $quick_link = $default_destination; }

if ($link_style == 1) {
$adloc = "&ad="  . $ta_id;
if ($altpage) { $adloc = $adloc . "&page=" . $pageid; }
} else {
$adloc = "-" . $ta_id;
if ($altpage) { $adloc = $adloc . "-" . $pageid; }
}

if ($link_style == 1) {
$texta_link_url = $base_url . "/" . "idevads" . ".php?id=" . $standard_link_association . $adloc;
} elseif ($link_style == 2) {
$texta_link_url = $seo_url . $seo_link_association_textads . $adloc . $seo_link_extension;
}

            $tmpo = array( 
		'textad_link_id' => $ta_id, 
		'textad_link_location' => $adloc, 
		'textad_target_url' => $quick_link, 
		'textad_group_name' => $adname,
		'textad_full_url' => $texta_link_url
		);

            $textad_link_results[$i++] = $tmpo; }
$smarty->assign('textad_link_results', $textad_link_results);


} else {

//$get_textads = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) and ads > 0 order by name");
$get_textads = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and ads > 0 order by name");
$get_textads->execute(array($linkid));
$textad_results = array(); 
$i=0; 
while ($r=$get_textads->fetch()) {
$groupid=$r['id'];
$groupname=$r['name'];
            $tmp = array( 
                'textad_group_id' => $groupid, 
                'textad_group_name' => $groupname
            );
            $textad_results[$i++] = $tmp; }
$smarty->assign('textad_results', $textad_results);

if (isset($_POST['textads_picked'])) {
$grppicked = $_POST['textads_picked'];
$smarty->assign('textad_group_chosen', 1);

$texttagname=$db->prepare("select name from idevaff_groups where id = ?");
$texttagname->execute(array($grppicked));
$texttagname=$texttagname->fetch();
$texttagname=$texttagname['name'];
$smarty->assign('textad_chosen_group_name', $texttagname);

$get_textads_links = $db->prepare("select id from idevaff_ads where grp = ?");
$get_textads_links->execute(array($grppicked));
$textad_link_results = array(); 
$i=0; 
while ($t=$get_textads_links->fetch()) {
$ta_id=$t['id'];
$atagname=$db->prepare("select id, location from idevaff_groups where id = ?");
$atagname->execute(array($grppicked));
$ares=$atagname->fetch();
$altpage=$ares['location'];
$pageidta=$ares['id'];

if ($altpage) { $quick_link = $altpage; } else { $quick_link = $default_destination; }

if ($link_style == 1) {
$adloc = "&ad="  . $ta_id;
if ($altpage) { $adloc = $adloc . "&page=" . $pageidta; }
} else {
$adloc = "-" . $ta_id;
if ($altpage) { $adloc = $adloc . "-" . $pageidta; }
}

if ($link_style == 1) {
$texta_link_url = $base_url . "/" . "idevads" . ".php?id=" . $standard_link_association . $adloc;
} elseif ($link_style == 2) {
$texta_link_url = $seo_url . $seo_link_association_textads . $adloc . $seo_link_extension;
}

            $tmpo = array( 
		'textad_link_id' => $ta_id, 
		'textad_link_location' => $adloc, 
		'textad_target_url' => $quick_link, 
		'textad_full_url' => $texta_link_url
		);
			
            $textad_link_results[$i++] = $tmpo; }
$smarty->assign('textad_link_results', $textad_link_results); } }

?>