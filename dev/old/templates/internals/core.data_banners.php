<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

$temp_fields = 'banners_title,banners_size,banners_description';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$banners_title=html_language_output($getlanguage['banners_title']);
$banners_size=html_language_output($getlanguage['banners_size']);
$banners_description=html_language_output($getlanguage['banners_description']);

if ($marketing_delivery == 1) {



$smarty->assign('banners_size', $banners_size);
$smarty->assign('banners_description', $banners_description);
$smarty->assign('banners_title', $banners_title);

$get_banner_links = $db->prepare("select * from idevaff_banners where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by sort");
$get_banner_links->execute(array($linkid));
$banner_link_results = array(); 
$i=0;
while ($bat=$get_banner_links->fetch()) {
$banid=$bat['number'];
$b_1=$bat['size1'];
$b_2=$bat['size2'];
$b_d=$bat['description'];
$b_i=$bat['image'];
$local=$bat['local'];
$b_g=$bat['grp'];
$b_a=$bat['alt_tag'];
if (!$b_d) { $b_d = $account_not_available; }

$ban_tagname=$db->prepare("select * from idevaff_groups where id = ?");
$ban_tagname->execute(array($b_g));
$ban_res=$ban_tagname->fetch();
$ban_tag=$ban_res['name'];
$ban_loc=$ban_res['location'];
$ban_pageid=$ban_res['id'];
$chkfiletype = substr("$b_i", -3);

if ($ban_loc) { $quick_link = $ban_loc; } else { $quick_link = $default_destination; }

// STANDARD BANNERS
// ---------------------------------------------------
if ($chkfiletype != "swf") {

// STANDARD LINKS
// ---------------------------------------------------
if ($link_style == 1) {

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "_" . $ban_pageid . "_1_" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "_" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

// SEO LINKS
// ---------------------------------------------------
} elseif ($link_style == 2) {

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "-" . $ban_pageid . "-1-" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "-" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

} } else {

// FLASH BANNERS
// ---------------------------------------------------

// NON SEO LINKS
if ($link_style != 2) {

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "_" . $ban_pageid . "_1_" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "_" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

} else {

// SEO LINKS
// ---------------------------------------------------

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "-" . $ban_pageid . "-1-" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "-" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

} }

if ($chkfiletype != "swf") {
if ($link_style == 1) {
$banref = "<a href=\"" . $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $banadded . "\"" . " target=\"_blank\"" . $rel_values . ">";
} elseif ($link_style == 2) {
$banref = "<a href=\"" . $seo_url . $seo_link_association_marketing . $banadded . $seo_link_extension . "\"" . " target=\"_blank\"" . $rel_values . ">";
} }

if ($local == 1) {
$url_help = $b_i;
} else {
$url_help = $base_url . "/media/banners/" . $b_i;
}

$banner_display = "<img style=\"border:0px\" src=\"$url_help\" width=\"$b_1\" height=\"$b_2\" alt=\"$b_a\">";
$banner_code = $banref . "<img style=\"border:0px\" src=\"$url_help\" width=\"$b_1\" height=\"$b_2\" alt=\"$b_a\"></a>";

			$tmpgtb = array( 
			'banner_display' => $banner_display, 
			'banner_code' => $banner_code, 
			'banner_size_1' => $b_1, 
			'banner_size_2' => $b_2, 
			'banner_description' => $b_d, 
			'banner_group_name' => $ban_tag, 
			'banner_target_url' => $quick_link 
		);
            $banner_link_results [$i++] = $tmpgtb; } 
$smarty->assign('banner_link_results', $banner_link_results);


} else {


$smarty->assign('banners_title', $banners_title);
$smarty->assign('banners_size', $banners_size);
$smarty->assign('banners_description', $banners_description);
$get_banners = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and contains > 0 order by name");
$get_banners->execute(array($linkid));
$banner_results = array(); 
$i=0; 
while ($baq=$get_banners->fetch()) {
$bangroupid=$baq['id'];
$bangroupname=$baq['name'];
            $tmpban = array( 
                'banner_group_id' => $bangroupid, 
                'banner_group_name' => $bangroupname 
            );
            $banner_results[$i++] = $tmpban; }
$smarty->assign('banner_results', $banner_results);

if (isset($_POST['banner_picked'])) { $banner_picked = $_POST['banner_picked'];
$smarty->assign('banner_group_chosen', $banner_picked);
$banner_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$banner_tagname->execute(array($banner_picked));
$banner_res=$banner_tagname->fetch();
$banner_tag=$banner_res['name'];
$smarty->assign('banner_chosen_group_name', $banner_tag);
$get_banner_links = $db->prepare("select * from idevaff_banners where grp = ? order by sort");
$get_banner_links->execute(array($banner_picked));
$banner_link_results = array(); 
$i=0;
while ($bat=$get_banner_links->fetch()) {
$banid=$bat['number'];
$b_1=$bat['size1'];
$b_2=$bat['size2'];
$b_d=$bat['description'];
$b_i=$bat['image'];
$local=$bat['local'];
$b_a=$bat['alt_tag'];
if (!$b_d) { $b_d = "None Given"; }
$ban_tagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$ban_tagname->execute(array($banner_picked));
$ban_res=$ban_tagname->fetch();
$ban_tag=$ban_res['name'];
$ban_loc=$ban_res['location'];
$ban_pageid=$ban_res['id'];

if ($ban_loc) { $quick_link = $ban_loc; } else { $quick_link = $default_destination; }

$chkfiletype = substr("$b_i", -3);

// STANDARD BANNERS
// ---------------------------------------------------
if ($chkfiletype != "swf") {

// STANDARD LINKS
// ---------------------------------------------------
if ($link_style == 1) {

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "_" . $ban_pageid . "_1_" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "_" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

// SEO LINKS
// ---------------------------------------------------
} elseif ($link_style == 2) {

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "-" . $ban_pageid . "-1-" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "-" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

} } else {

// FLASH BANNERS
// ---------------------------------------------------

// NON SEO LINKS
if ($link_style != 2) {

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "_" . $ban_pageid . "_1_" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "_" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

} else {

// SEO LINKS
// ---------------------------------------------------

// GROUP & STATS
if (($ban_loc) && ($mark_track == 1)) { $banadded = "-" . $ban_pageid . "-1-" . $banid; }
// GROUP ONLY
if (($ban_loc) && (!$mark_track)) { $banadded = "-" . $ban_pageid; }
// STATS ONLY
if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $banid; }
// NO GROUP, NO STATS
if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

} }


$chkfiletype = substr("$b_i", -3);
if ($chkfiletype != "swf") {
if ($link_style == 1) {
$banref = "<a href=\"" . $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $banadded . "\"" . " target=\"_blank\"" . $rel_values . ">";
} elseif ($link_style == 2) {
$banref = "<a href=\"" . $seo_url . $seo_link_association_marketing . $banadded . $seo_link_extension . "\"" . " target=\"_blank\"" . $rel_values . ">";
} }

if ($local == 1) {
$url_help = $b_i;
} else {
$url_help = $base_url . "/media/banners/" . $b_i;
}

$banner_display = "<img style=\"border:0px\" src=\"$url_help\" width=\"$b_1\" height=\"$b_2\" alt=\"$b_a\">";
$banner_code = $banref . "<img style=\"border:0px\" src=\"$url_help\" width=\"$b_1\" height=\"$b_2\" alt=\"$b_a\"></a>";

            $tmpgtb = array( 
			'banner_display' => $banner_display, 
			'banner_code' => $banner_code, 
			'banner_size_1' => $b_1, 
			'banner_size_2' => $b_2, 
			'banner_description' => $b_d,
			'banner_target_url' => $quick_link 
		);
            $banner_link_results [$i++] = $tmpgtb; }
$smarty->assign('banner_link_results', $banner_link_results); }
}

?>