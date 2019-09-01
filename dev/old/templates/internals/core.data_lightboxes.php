<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'lb_head_title,lb_head_description,lb_head_source_code,lb_head_code_notes,lb_head_tutorial,lb_body_title,
lb_body_description,lb_body_click,lb_body_source_code';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$lb_head_title=html_language_output($getlanguage['lb_head_title']);
$lb_head_description=html_language_output($getlanguage['lb_head_description']);
$lb_head_source_code=html_language_output($getlanguage['lb_head_source_code']);
$lb_head_code_notes=html_language_output($getlanguage['lb_head_code_notes']);
$lb_head_tutorial=html_language_output($getlanguage['lb_head_tutorial']);
$lb_body_title=html_language_output($getlanguage['lb_body_title']);
$lb_body_description=html_language_output($getlanguage['lb_body_description']);
$lb_body_click=html_language_output($getlanguage['lb_body_click']);
$lb_body_source_code=html_language_output($getlanguage['lb_body_source_code']);

$smarty->assign('install_url', $base_url);

$smarty->assign('lb_head_title', $lb_head_title);
$smarty->assign('lb_head_description', $lb_head_description);
$smarty->assign('lb_head_source_code', $lb_head_source_code);
$smarty->assign('lb_head_code_notes', $lb_head_code_notes);
$smarty->assign('lb_head_tutorial', $lb_head_tutorial);
$smarty->assign('lb_body_title', $lb_body_title);
$smarty->assign('lb_body_description', $lb_body_description);
$smarty->assign('lb_body_click', $lb_body_click);
$smarty->assign('lb_body_source_code', $lb_body_source_code);
$smarty->assign('lightbox_link_text', $lightbox_link_text);

if ($marketing_delivery == 1) {

//$get_lightbox_links = $db->query("select * from idevaff_lightboxes where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by grp desc");
$get_lightbox_links = $db->prepare("select * from idevaff_lightboxes where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by grp desc");
$get_lightbox_links->execute(array($linkid));
$lightbox_link_results = array(); 
$i=0;
while ($getlightbox=$get_lightbox_links->fetch()) {
$lightboxid = $getlightbox['number'];
$lightboxname = $getlightbox['name'];
$lightboxgrp = $getlightbox['grp'];
$lightboxdesc = $getlightbox['description'];
$lightboxt = $getlightbox['image75'];
$lightboxb = $getlightbox['image500'];

$data_lightboxt = "media/lightboxes/" . $getlightbox['image75'];
$data_lightboxb = "media/lightboxes/" . $getlightbox['image500'];
if(file_exists($data_lightboxt)) {
    list($width_thumb, $height_thumb, $type_thumb, $attr_thumb) = getimagesize($data_lightboxt);
}
else {
    list($width_thumb, $height_thumb, $type_thumb, $attr_thumb) = array('', '', '', '');
}

if(file_exists($data_lightboxb)) {
    list($width_big, $height_big, $type_big, $attr_big) = getimagesize($data_lightboxb);
}
else {
    list($width_big, $height_big, $type_big, $attr_big) = array('', '', '', '');
}

//$lightbox_tagname=$db->query("select id, name, location from idevaff_groups where id = '$lightboxgrp'");
$lightbox_tagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$lightbox_tagname->execute(array($lightboxgrp));
$lightbox_res=$lightbox_tagname->fetch();
$lightbox_tag=$lightbox_res['name'];
$lightbox_loc=$lightbox_res['location'];
$lightbox_pageid=$lightbox_res['id'];

if ($lightbox_loc) { $quick_link = $lightbox_loc; } else { $quick_link = $default_destination; }

// STANDARD LINKS
// ---------------------------------------------------
if ($link_style == 1) {
// GROUP & STATS
if (($lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "_" . $lightbox_pageid . "_7_" . $lightboxid; }
// GROUP ONLY
if (($lightbox_loc) && (!$mark_track)) { $lightboxadded = "_" . $lightbox_pageid; }
// STATS ONLY
if ((!$lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "_0_7_" . $lightboxid; }
// NO GROUP, NO STATS
if ((!$lightbox_loc) && (!$mark_track)) { $lightboxadded = null; }


// SEO LINKS
// ---------------------------------------------------
} elseif ($link_style == 2) {
// GROUP & STATS
if (($lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "-" . $lightbox_pageid . "-7-" . $lightboxid; }
// GROUP ONLY
if (($lightbox_loc) && (!$mark_track)) { $lightboxadded = "-" . $lightbox_pageid; }
// STATS ONLY
if ((!$lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "-0-7-" . $lightboxid; }
// NO GROUP, NO STATS
if ((!$lightbox_loc) && (!$mark_track)) { $lightboxadded = null; }

}
/*
if ($link_style == 1) {
$lightboxref = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $lightboxadded;
} elseif ($link_style == 2) {
if (($seo_link_structure == 1) || ($seo_link_structure == 3)){ $add_html = ".html"; } else { $add_html = null; }
$lightboxref = $siteurl . $seo_link_association_marketing . $lightboxadded . $add_html;
}
*/
if ($link_style == 1) {
$lightboxref = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $lightboxadded;
} elseif ($link_style == 2) {
$lightboxref = $seo_url . $seo_link_association_marketing . $lightboxadded . $seo_link_extension;
}




$lightbox_code = "<a href=\"{$base_url}/media/lightboxes/{$lightboxb}\" width=\"{$width_big}\" height=\"{$height_big}\" title=\"<a href='" . $lightboxref . "' target='_blank'>" . $lightbox_link_text . "</a>\" class=\"fancy-image\"><img src=\"{$base_url}/media/lightboxes/{$lightboxt}\" width=\"{$width_thumb}\" height=\"{$height_thumb}\" style=\"border:none;\" /></a>";


if ($lightboxdesc) { $lightboxdescription = $lightboxdesc; } else { $lightboxdescription = $account_not_available; }

            $tmpgtr = array( 
			'lightbox_link_name' => $lightboxname,
			'lightbox_link_id' => $lightboxid, 
			'lightbox_thumbnail' => $lightboxt, 
			'lightbox_image' => $lightboxb, 
			'lightbox_thumb_width' => $width_thumb, 
			'lightbox_thumb_height' => $height_thumb, 
			'lightbox_main_width' => $width_big, 
			'lightbox_main_height' => $height_big, 
			'lightbox_link' => $lightboxref, 
			'lightbox_description' => $lightboxdescription, 
			'lightbox_code' => $lightbox_code, 
			'lightbox_group_name' => $lightbox_tag, 
			'lightbox_target_url' => $quick_link 
		);
            $lightbox_link_results [$i++] = $tmpgtr; }
$smarty->assign('lightbox_link_results', $lightbox_link_results);


} else {


//$get_lbs = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) and lightboxes > 0 order by name");
$get_lbs = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and lightboxes > 0 order by name");
$get_lbs->execute(array($linkid));
$lb_results = array(); 
$i=0; 
while ($baq=$get_lbs->fetch()) {
$bangroupid=$baq['id'];
$bangroupname=$baq['name'];
            $tmpban = array( 
                'lb_group_id' => $bangroupid, 
                'lb_group_name' => $bangroupname 
            );
            $lb_results[$i++] = $tmpban; }
$smarty->assign('lb_results', $lb_results);
if (isset($_POST['lb_picked'])) { $lb_picked = $_POST['lb_picked'];
$smarty->assign('lb_group_chosen', $lb_picked);
$lb_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$lb_tagname->execute(array($lb_picked));
$lb_res=$lb_tagname->fetch();
$lb_tag=$lb_res['name'];
$smarty->assign('lb_chosen_group_name', $lb_tag);
$get_lb_links = $db->prepare("select * from idevaff_lightboxes where grp = ?");
$get_lb_links->execute(array($lb_picked));
$lb_link_results = array(); 
$i=0;
while ($getlightbox=$get_lb_links->fetch()) {
$lightboxid = $getlightbox['number'];
$lightboxname = $getlightbox['name'];
$lightboxgrp = $getlightbox['grp'];
$lightboxdesc = $getlightbox['description'];
$lightboxt = $getlightbox['image75'];
$lightboxb = $getlightbox['image500'];

$data_lightboxt = "media/lightboxes/" . $getlightbox['image75'];
$data_lightboxb = "media/lightboxes/" . $getlightbox['image500'];

list($width_thumb, $height_thumb, $type_thumb, $attr_thumb) = getimagesize($data_lightboxt);
list($width_big, $height_big, $type_big, $attr_big) = getimagesize($data_lightboxb);

//$lightbox_tagname=$db->query("select id, name, location from idevaff_groups where id = '$lb_picked'");
$lightbox_tagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$lightbox_tagname->execute(array($lb_picked));
$lightbox_res=$lightbox_tagname->fetch();
$lightbox_tag=$lightbox_res['name'];
$lightbox_loc=$lightbox_res['location'];
$lightbox_pageid=$lightbox_res['id'];

if ($lightbox_loc) { $quick_link = $lightbox_loc; } else { $quick_link = $default_destination; }

// STANDARD LINKS
// ---------------------------------------------------
if ($link_style == 1) {
// GROUP & STATS
if (($lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "_" . $lightbox_pageid . "_7_" . $lightboxid; }
// GROUP ONLY
if (($lightbox_loc) && (!$mark_track)) { $lightboxadded = "_" . $lightbox_pageid; }
// STATS ONLY
if ((!$lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "_0_7_" . $lightboxid; }
// NO GROUP, NO STATS
if ((!$lightbox_loc) && (!$mark_track)) { $lightboxadded = null; }

// SEO LINKS
// ---------------------------------------------------
} elseif ($link_style == 2) {
// GROUP & STATS
if (($lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "-" . $lightbox_pageid . "-7-" . $lightboxid; }
// GROUP ONLY
if (($lightbox_loc) && (!$mark_track)) { $lightboxadded = "-" . $lightbox_pageid; }
// STATS ONLY
if ((!$lightbox_loc) && ($mark_track == 1)) { $lightboxadded = "-0-7-" . $lightboxid; }
// NO GROUP, NO STATS
if ((!$lightbox_loc) && (!$mark_track)) { $lightboxadded = null; }
}

/*
if ($link_style == 1) {
$lightboxref = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $lightboxadded;
} elseif ($link_style == 2) {
if (($seo_link_structure == 1) || ($seo_link_structure == 3)){ $add_html = ".html"; } else { $add_html = null; }
$lightboxref = $siteurl . $seo_link_association_marketing . $lightboxadded . $add_html;
}
*/
if ($link_style == 1) {
$lightboxref = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $lightboxadded;
} elseif ($link_style == 2) {
$lightboxref = $seo_url . $seo_link_association_marketing . $lightboxadded . $seo_link_extension;
}

$lightbox_code = "<a href=\"{$base_url}/media/lightboxes/{$lightboxb}\" width=\"{$width_big}\" height=\"{$height_big}\" title=\"<a href='" . $lightboxref . "' target='_blank'>" . $lightbox_link_text . "</a>\" class=\"fancy-image\"><img src=\"{$base_url}/media/lightboxes/{$lightboxt}\" width=\"{$width_thumb}\" height=\"{$height_thumb}\" style=\"border:none;\" /></a>";


if ($lightboxdesc) { $lightboxdescription = $lightboxdesc; } else { $lightboxdescription = $account_not_available; }

            $tmpgtb = array( 
			'lightbox_link_name' => $lightboxname,
			'lightbox_link_id' => $lightboxid, 
			'lightbox_thumbnail' => $lightboxt, 
			'lightbox_image' => $lightboxb, 
			'lightbox_thumb_width' => $width_thumb, 
			'lightbox_thumb_height' => $height_thumb, 
			'lightbox_main_width' => $width_big, 
			'lightbox_main_height' => $height_big, 
			'lightbox_link' => $lightboxref, 
			'lightbox_description' => $lightboxdescription, 
			'lightbox_code' => $lightbox_code, 
			'lightbox_group_name' => $lightbox_tag, 
			'lightbox_target_url' => $quick_link 
		);
            $lightbox_link_results [$i++] = $tmpgtb; }
$smarty->assign('lightbox_link_results', $lightbox_link_results); } }

?>