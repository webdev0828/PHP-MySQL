<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'etemplates_title,etemplates_view_link,etemplates_name';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$etemplates_title=html_language_output($getlanguage['etemplates_title']);
$etemplates_view_link=html_language_output($getlanguage['etemplates_view_link']);
$etemplates_name=html_language_output($getlanguage['etemplates_name']);

$smarty->assign('etemplates_title', $etemplates_title);
$smarty->assign('etemplates_view_link', $etemplates_view_link);
$smarty->assign('etemplates_name', $etemplates_name);

if ($marketing_delivery == 1) {

//$get_etemplates_links = $db->query("select * from idevaff_email_templates where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = '$linkid') order by sort");
$get_etemplates_links = $db->prepare("select * from idevaff_email_templates where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by sort");
$get_etemplates_links->execute(array($linkid));
$etemplates_link_results = array(); 
$i=0;
while ($getad=$get_etemplates_links->fetch()) {
$adid = $getad['id'];
$adname = $getad['name'];
$adgrp = $getad['grp'];
$adcode = $getad['content'];

$adhits = $getad['hits'];
$adconv = $getad['conv'];
$adearnings = $getad['earnings'];
if ($adhits == 0) {
$adepc = 0;
$adsr = 0;
}else {
$adepc_no_round = $adearnings / $adhits * 100;
$adepc = round($adepc_no_round, 4);
$adsr_no_round = $adconv / $adhits * 100;
$adsr = round($adsr_no_round, 3);
}
//$adtagname=$db->query("select id, name, location from idevaff_groups where id = '$adgrp'");
$adtagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$adtagname->execute(array($adgrp));
$adres=$adtagname->fetch();
$adpageid=$adres['id'];
$adtag=$adres['name'];
$adloc=$adres['location'];

if ($adloc) { $quick_link = $adloc; } else { $quick_link = $default_destination; }

if ($link_style == 1) {
// GROUP & STATS
if (($adloc) && ($mark_track == 1)) { $adadded = "_$adpageid" . "_5_" . "$adid"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "_$adpageid"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "_0_5_" . "$adid"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }

} elseif ($link_style == 2) {
// GROUP & STATS
if (($adloc) && ($mark_track == 1)) { $adadded = "-{$adpageid}-5-{$adid}"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "-{$adpageid}"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "-0-5-{$adid}"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }
}

$checkapp=$db->query("select * from idevaff_affiliates where id = '" . $_SESSION[$install_directory_name.'_idev_LoggedID'] . "'");
$res=$checkapp->fetch();
$linkid=$res['id'];
$name=$res['username'];
$fname=$res['f_name'];
$lname=$res['l_name'];
$e=$res['email'];

$adcode = preg_replace("/_id_/", "$linkid", $adcode);
$adcode = preg_replace("/_username_/", "$name", $adcode);
$adcode = preg_replace("/_firstname_/", "$fname", $adcode);
$adcode = preg_replace("/_lastname_/", "$lname", $adcode);
$adcode = preg_replace("/_email_/", "$e", $adcode);
$adcode = preg_replace("/_webhome_/", "$siteurl", $adcode);
$adcode = preg_replace("/_affhome_/", "$base_url/index.php", $adcode);
$adcode = preg_replace("/_loginpage_/", "$base_url/login.php", $adcode);

if ($link_style == 1) {
$newcode = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $adadded;
} elseif ($link_style == 2) {
$newcode = $seo_url . $seo_link_association_marketing . $adadded . $seo_link_extension;
}

$adcode = preg_replace("/_afflink_/", $newcode, $adcode);

            $tmpgtr = array( 
			'etemplates_link_name' => $adname,
			'etemplates_link_id' => $adid, 
			'etemplates_box_code' => $adcode, 
			'etemplates_link_url' => $newcode, 
			'etemplates_target_url' => $quick_link,
			'etemplates_group_name' => $adtag,
			'etemplates_hits' => $adhits,
			'etemplates_conv' => $adconv,
			'etemplates_earnings' => $adearnings,
			'etemplates_epc' => $adepc,
			'etemplates_sr' => $adsr
		);
            $etemplates_link_results [$i++] = $tmpgtr; }
$smarty->assign('etemplates_link_results', $etemplates_link_results);

} else {

//$get_etemplates = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) and etemps > 0 order by name");
$get_etemplates = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and etemps > 0 order by name");
$get_etemplates->execute(array($linkid));
$etemplates_results = array(); 
$i=0;

while ($getad=$get_etemplates->fetch()) {
$groupid = $getad['id'];
$groupname = $getad['name'];

            $tmpht = array( 
                'etemplates_group_id' => $groupid, 
                'etemplates_group_name' => $groupname, 
            );
            $etemplates_results[$i++] = $tmpht; }
$smarty->assign('etemplates_results', $etemplates_results); }
if (isset($_POST['etemplates_picked'])) { $etemplates_picked = $_POST['etemplates_picked'];
$smarty->assign('etemplates_group_chosen', $etemplates_picked);
$etemplates_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$etemplates_tagname->execute(array($etemplates_picked));
$etemplates_res=$etemplates_tagname->fetch();
$etemplates_tag=$etemplates_res['name'];
$smarty->assign('etemplates_chosen_group_name', $etemplates_tag);
$get_etemplates_links = $db->prepare("select * from idevaff_email_templates where grp = ? order by sort");
$get_etemplates_links->execute(array($etemplates_picked));
$etemplates_link_results = array(); 
$i=0;
while ($getad=$get_etemplates_links->fetch()) {
$adid = $getad['id'];
$adname = $getad['name'];
$adgrp = $getad['grp'];
$adcode = $getad['content'];

$adhits = $getad['hits'];
$adconv = $getad['conv'];
$adearnings = $getad['earnings'];
if ($adhits == 0) {
$adepc = 0;
$adsr = 0;
}else {
$adepc_no_round = $adearnings / $adhits * 100;
$adepc = round($adepc_no_round, 4);
$adsr_no_round = $adconv / $adhits * 100;
$adsr = round($adsr_no_round, 3);
}
//$adtagname=$db->query("select id, name, location from idevaff_groups where id = '$adgrp'");
$adtagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$adtagname->execute(array($adgrp));
$adres=$adtagname->fetch();
$adpageid=$adres['id'];
$adtag=$adres['name'];
$adloc=$adres['location'];

if ($adloc) { $quick_link = $adloc; } else { $quick_link = $default_destination; }

if ($link_style == 1) {
// GROUP & STATS
if (($adloc) && ($mark_track == 1)) { $adadded = "_$adpageid" . "_5_" . "$adid"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "_$adpageid"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "_0_5_" . "$adid"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }

} elseif ($link_style == 2) {
// GROUP & STATS
if (($adloc) && ($mark_track == 1)) { $adadded = "-{$adpageid}-5-{$adid}"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "-{$adpageid}"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "-0-5-{$adid}"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }
}

$checkapp=$db->query("select * from idevaff_affiliates where id = '" . $_SESSION[$install_directory_name.'_idev_LoggedID'] . "'");
$res=$checkapp->fetch();
$linkid=$res['id'];
$name=$res['username'];
$fname=$res['f_name'];
$lname=$res['l_name'];
$e=$res['email'];

$adcode = preg_replace("/_id_/", "$linkid", $adcode);
$adcode = preg_replace("/_username_/", "$name", $adcode);
$adcode = preg_replace("/_firstname_/", "$fname", $adcode);
$adcode = preg_replace("/_lastname_/", "$lname", $adcode);
$adcode = preg_replace("/_email_/", "$e", $adcode);
$adcode = preg_replace("/_webhome_/", "$siteurl", $adcode);
$adcode = preg_replace("/_affhome_/", "$base_url/index.php", $adcode);
$adcode = preg_replace("/_loginpage_/", "$base_url/login.php", $adcode);

if ($link_style == 1) {
$newcode = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $adadded;
} elseif ($link_style == 2) {
$newcode = $seo_url . $seo_link_association_marketing . $adadded . $seo_link_extension;
}

$adcode = preg_replace("/_afflink_/", $newcode, $adcode);

            $tmpgtr = array( 
			'etemplates_link_name' => $adname,
			'etemplates_link_id' => $adid, 
			'etemplates_box_code' => $adcode, 
			'etemplates_link_url' => $newcode, 
			'etemplates_target_url' => $quick_link,
			'etemplates_group_name' => $adtag,
			'etemplates_hits' => $adhits,
			'etemplates_conv' => $adconv,
			'etemplates_earnings' => $adearnings,
			'etemplates_epc' => $adepc,
			'etemplates_sr' => $adsr
		);
            $etemplates_link_results [$i++] = $tmpgtr; }
$smarty->assign('etemplates_link_results', $etemplates_link_results); }

?>