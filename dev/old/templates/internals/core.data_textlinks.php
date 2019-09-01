<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

// TEXT LINKS

if ($marketing_delivery == 1) {

//$get_textlink_links = $db->query("select * from idevaff_links where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = '$linkid') order by sort");
$get_textlink_links = $db->prepare("select * from idevaff_links where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by sort");
$get_textlink_links->execute(array($linkid));

$textlink_link_results = array(); 
$i=0;
while ($gt=$get_textlink_links->fetch()) {
$textlink_link_tag=$gt['linktext'];
$textmaid=$gt['id'];
$textgrp=$gt['grp'];
$texthits=$gt['hits'];
$textconv=$gt['conv'];
$textearnings=$gt['earnings'];
if ($texthits == 0) {
$text_epc = 0;
$text_sr = 0;
} else {
$text_epc_no_round = $textearnings / $texthits * 100;
$text_epc = round($text_epc_no_round, 4);
$text_sr_no_round = $textconv / $texthits * 100;
$text_sr = round($text_sr_no_round, 3);
}
//$atextlink_lnk = $db->query("select * from idevaff_groups where id = '$textgrp'");
$atextlink_lnk = $db->prepare("select * from idevaff_groups where id = ?");
$atextlink_lnk->execute(array($textgrp));
$atextlink_res=$atextlink_lnk->fetch();
$atextlink_loc=$atextlink_res['location'];
$atextlink_pageid=$atextlink_res['id'];
$atextlink_gname=$atextlink_res['name'];

if ($atextlink_loc) { $quick_link = $atextlink_loc; } else { $quick_link = $default_destination; }

if ($link_style == 1) {

// GROUP & STATS
if (($atextlink_loc) && ($mark_track == 1)) { $tadded = "_$atextlink_pageid" . "_3_" . "$textmaid"; }
// GROUP ONLY
if (($atextlink_loc) && (!$mark_track)) { $tadded = "_$atextlink_pageid"; }
// STATS ONLY
if ((!$atextlink_loc) && ($mark_track == 1)) { $tadded = "_0_3_" . "$textmaid"; }
// NO GROUP, NO STATS
if ((!$atextlink_loc) && (!$mark_track)) { $tadded = null; }

} elseif ($link_style == 2) {
// GROUP & STATS
if (($atextlink_loc) && ($mark_track == 1)) { $tadded = "-{$atextlink_pageid}-3-{$textmaid}"; }
// GROUP ONLY
if (($atextlink_loc) && (!$mark_track)) { $tadded = "-{$atextlink_pageid}"; }
// STATS ONLY
if ((!$atextlink_loc) && ($mark_track == 1)) { $tadded = "-0-3-{$textmaid}"; }
// NO GROUP, NO STATS
if ((!$atextlink_loc) && (!$mark_track)) { $tadded = null; }
}

if ($link_style == 1) {
$textlink_link_url = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $tadded;
} elseif ($link_style == 2) {
$textlink_link_url = $seo_url . $seo_link_association_marketing . $tadded . $seo_link_extension;
}
            $tmpgt = array( 
			'textlink_link_text' => $textlink_link_tag,
			'textlink_link_url' => $textlink_link_url, 
			'textlink_group_name' => $atextlink_gname, 
			'textlink_target_url' => $quick_link,
			'textlink_hits' => $texthits,
			'textlink_conv' => $textconv,
			'textlink_earnings' => $textearnings,
			'textlink_epc' => $text_epc,
			'textlink_sr' => $text_sr
		);
            $textlink_link_results [$i++] = $tmpgt; }
$smarty->assign('textlink_link_results', $textlink_link_results);

} else {


//$get_textlinks = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = '$linkid') and links > 0 order by name");
$get_textlinks = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and links > 0 order by name");
$get_textlinks->execute(array($linkid));
$textlink_results = array(); 
$i=0; 
while ($q=$get_textlinks->fetch()) {
$groupid=$q['id'];
$groupname=$q['name'];
            $tmpt = array( 
                'textlink_group_id' => $groupid, 
                'textlink_group_name' => $groupname, 
            );
            $textlink_results[$i++] = $tmpt; }
$smarty->assign('textlink_results', $textlink_results);
if (isset($_POST['textlinks_picked'])) { $textlink_picked = $_POST['textlinks_picked'];
$smarty->assign('textlink_group_chosen', $textlink_picked);
$textlink_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$textlink_tagname->execute(array($textlink_picked));
$textlink_res=$textlink_tagname->fetch();
$textlink_tag=$textlink_res['name'];
$smarty->assign('textlink_chosen_group_name', $textlink_tag);
$get_textlink_links = $db->prepare("select * from idevaff_links where grp = ? order by sort");
$get_textlink_links->execute(array($textlink_picked));
$textlink_link_results = array(); 
$i=0;
while ($gt=$get_textlink_links->fetch()) {
$textlink_link_tag=$gt['linktext'];
$textmaid=$gt['id'];
$texthits=$gt['hits'];
$textconv=$gt['conv'];
$textearnings=$gt['earnings'];
if ($texthits == 0) {
$text_epc = 0;
$text_sr =0;
}else {
$text_epc_no_round = $textearnings / $texthits * 100;
$text_epc = round($text_epc_no_round, 4);
$text_sr_no_round = $textconv / $texthits * 100;
$text_sr = round($text_sr_no_round, 3);
}
$atextlink_lnk = $db->prepare("select * from idevaff_groups where id = ?");
$atextlink_lnk->execute(array($textlink_picked));
$atextlink_res=$atextlink_lnk->fetch();
$atextlink_loc=$atextlink_res['location'];
$atextlink_pageid=$atextlink_res['id'];

if ($atextlink_loc) { $quick_link = $atextlink_loc; } else { $quick_link = $default_destination; }

if ($link_style == 1) {

// GROUP & STATS
if (($atextlink_loc) && ($mark_track == 1)) { $tadded = "_$atextlink_pageid" . "_3_" . "$textmaid"; }
// GROUP ONLY
if (($atextlink_loc) && (!$mark_track)) { $tadded = "_$atextlink_pageid"; }
// STATS ONLY
if ((!$atextlink_loc) && ($mark_track == 1)) { $tadded = "_0_3_" . "$textmaid"; }
// NO GROUP, NO STATS
if ((!$atextlink_loc) && (!$mark_track)) { $tadded = null; }

} elseif ($link_style == 2) {
// GROUP & STATS
if (($atextlink_loc) && ($mark_track == 1)) { $tadded = "-{$atextlink_pageid}-3-{$textmaid}"; }
// GROUP ONLY
if (($atextlink_loc) && (!$mark_track)) { $tadded = "-{$atextlink_pageid}"; }
// STATS ONLY
if ((!$atextlink_loc) && ($mark_track == 1)) { $tadded = "-0-3-{$textmaid}"; }
// NO GROUP, NO STATS
if ((!$atextlink_loc) && (!$mark_track)) { $tadded = null; }
}

if ($link_style == 1) {
$textlink_link_url = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $tadded;
} elseif ($link_style == 2) {
$textlink_link_url = $seo_url . $seo_link_association_marketing . $tadded . $seo_link_extension;
}

            $tmpgt = array( 
			'textlink_link_text' => $textlink_link_tag,
			'textlink_link_url' => $textlink_link_url, 
			'textlink_target_url' => $quick_link,
			'textlink_hits' => $texthits,
			'textlink_conv' => $textconv,
			'textlink_earnings' => $textearnings,
			'textlink_epc' => $text_epc,
			'textlink_sr' => $text_sr
		);
            $textlink_link_results [$i++] = $tmpgt; }
$smarty->assign('textlink_link_results', $textlink_link_results); }
}


?>