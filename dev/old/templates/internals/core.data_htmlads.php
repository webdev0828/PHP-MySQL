<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'html_title,html_view_link';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$html_title=html_language_output($getlanguage['html_title']);
$html_view_link=html_language_output($getlanguage['html_view_link']);

$smarty->assign('html_name', $html_title);
$smarty->assign('html_view_link', $html_view_link);
$smarty->assign('html_title', $html_title);
$smarty->assign('html_view_link', $html_view_link);

if ($marketing_delivery == 1) {

//$get_html_links = $db->query("select * from idevaff_htmlads where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by sort");
$get_html_links = $db->prepare("select * from idevaff_htmlads where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by sort");
$get_html_links->execute(array($linkid));
$html_link_results = array(); 
$i=0;
while ($getad=$get_html_links->fetch()) {
$adid = $getad['id'];
$adname = $getad['name'];
$adgrp = $getad['grp'];
$adcode = $getad['html_code'];

$adhits = $getad['hits'];
$adconv = $getad['conv'];
$adearnings = $getad['earnings'];
if ($adhits == 0) {
$adepc = 0;
$adsr = 0;
}else {
$adepc_no_round = $adearnings / $adhits * 100;
$adepc = round($adepc_no_round, 4);
$adsr_no_round = $adearnings / $adhits * 100;
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
if (($adloc) && ($mark_track == 1)) { $adadded = "_$adpageid" . "_4_" . "$adid"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "_$adpageid"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "_0_4_" . "$adid"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }

} elseif ($link_style == 2) {
// GROUP & STATS
if (($adloc) && ($mark_track == 1)) { $adadded = "-{$adpageid}-4-{$adid}"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "-{$adpageid}"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "-0-4-{$adid}"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }
}

$newcode = preg_replace("/_weblink_/", "$base_url", $adcode);

/*
if ($link_style == 1) {
$newcode = preg_replace("/_afflink_/", "$base_url/{$filename}.php?id={$standard_link_association_marketing}{$adadded}", $newcode);
} elseif ($link_style == 2) {
if (($seo_link_structure == 1) || ($seo_link_structure == 3)){ $add_html = ".html"; } else { $add_html = null; }
$newcode = preg_replace("/_afflink_/", "{$siteurl}{$seo_link_association_marketing}{$adadded}{$add_html}", $newcode);
}
*/
if ($link_style == 1) {
$newcode = preg_replace("/_afflink_/", "{$base_url}/{$filename}.php?id={$standard_link_association}{$adadded}", $newcode);
} elseif ($link_style == 2) {
$newcode = preg_replace("/_afflink_/", "{$seo_url}{$seo_link_association_marketing}{$adadded}{$seo_link_extension}", $newcode);
}

            $tmpgtr = array( 
			'html_link_name' => $adname,
			'html_link_id' => $adid, 
			'html_link_url' => $newcode, 
			'html_group_name' => $adtag, 
			'html_target_url' => $quick_link,
			'html_link_hits' => $adhits,
			'html_link_conv' => $adconv,
			'html_link_earnings' => $adearnings,
			'html_link_epc' => $adepc,
			'html_link_sr' => $adsr
		);
            $html_link_results [$i++] = $tmpgtr; }
$smarty->assign('html_link_results', $html_link_results);

} else {


//$get_htmlads = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) and hads > 0 order by name");
$get_htmlads = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and hads > 0 order by name");
$get_htmlads->execute(array($linkid));
$htmlad_results = array(); 
$i=0; 
while ($qh=$get_htmlads->fetch()) {
$groupid=$qh['id'];
$groupname=$qh['name'];
            $tmpht = array( 
                'htmlad_group_id' => $groupid, 
                'htmlad_group_name' => $groupname, 
            );
            $htmlad_results[$i++] = $tmpht; }
$smarty->assign('htmlad_results', $htmlad_results); }
if (isset($_POST['html_picked'])) { $html_picked = $_POST['html_picked'];
$smarty->assign('html_group_chosen', $html_picked);
$html_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$html_tagname->execute(array($html_picked));
$html_res=$html_tagname->fetch();
$html_tag=$html_res['name'];
$smarty->assign('html_chosen_group_name', $html_tag);
$get_html_links = $db->prepare("select * from idevaff_htmlads where grp = ? order by sort");
$get_html_links->execute(array($html_picked));
$html_link_results = array(); 
$i=0;
while ($getad=$get_html_links->fetch()) {
$adid = $getad['id'];
$adname = $getad['name'];
$adgrp = $getad['grp'];
$adcode = $getad['html_code'];

$adhits = $getad['hits'];
$adconv = $getad['conv'];
$adearnings = $getad['earnings'];
if ($adhits == 0) {
$adepc = 0;
$adsr = 0;
}else {
$adepc_no_round = $adearnings / $adhits * 100;
$adepc = round($adepc_no_round, 4);
$adsr_no_round = $adearnings / $adhits * 100;
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
if (($adloc) && ($mark_track == 1)) { $adadded = "_$adpageid" . "_4_" . "$adid"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "_$adpageid"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "_0_4_" . "$adid"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }

} elseif ($link_style == 2) {
// GROUP & STATS
if (($adloc) && ($mark_track == 1)) { $adadded = "-{$adpageid}-4-{$adid}"; }
// GROUP ONLY
if (($adloc) && (!$mark_track)) { $adadded = "-{$adpageid}"; }
// STATS ONLY
if ((!$adloc) && ($mark_track == 1)) { $adadded = "-0-4-{$adid}"; }
// NO GROUP, NO STATS
if ((!$adloc) && (!$mark_track)) { $adadded = null; }
}


$newcode = preg_replace("/_weblink_/", "$base_url", $adcode);

if ($link_style == 1) {
$newcode = preg_replace("/_afflink_/", "{$base_url}/{$filename}.php?id={$standard_link_association}{$adadded}", $newcode);
} elseif ($link_style == 2) {
$newcode = preg_replace("/_afflink_/", "{$seo_url}{$seo_link_association_marketing}{$adadded}{$seo_link_extension}", $newcode);
}

            $tmpgtr = array( 
			'html_link_name' => $adname,
			'html_link_id' => $adid, 
			'html_link_url' => $newcode,
			'html_target_url' => $quick_link,
			'html_link_hits' => $adhits,
			'html_link_conv' => $adconv,
			'html_link_earnings' => $adearnings,
			'html_link_epc' => $adepc,
			'html_link_sr' => $adsr
		);
            $html_link_results [$i++] = $tmpgtr; }
$smarty->assign('html_link_results', $html_link_results); }

?>