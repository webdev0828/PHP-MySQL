<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'mv_head_description,mv_head_source_code,mv_body_title,mv_body_description,mv_body_source_code,
mv_preview_button';
try {
    $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage=$query->fetch();
    $query->closeCursor();
} catch ( Exception $ex ) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}

$mv_head_description=html_language_output($getlanguage['mv_head_description']);
$mv_head_source_code=html_language_output($getlanguage['mv_head_source_code']);
$mv_body_title=html_language_output($getlanguage['mv_body_title']);
$mv_body_description=html_language_output($getlanguage['mv_body_description']);
$mv_body_source_code=html_language_output($getlanguage['mv_body_source_code']);
$mv_preview_button=html_language_output($getlanguage['mv_preview_button']);


$smarty->assign('install_url', $base_url);

$smarty->assign('mv_head_description', $mv_head_description);
$smarty->assign('mv_head_source_code', $mv_head_source_code);
$smarty->assign('mv_body_title', $mv_body_title);
$smarty->assign('mv_body_description', $mv_body_description);
$smarty->assign('mv_body_source_code', $mv_body_source_code);
$smarty->assign('mv_preview_button', $mv_preview_button);


$get_lbs = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and vids > 0 order by name");
$get_lbs->execute(array($linkid));
$mv_results = array(); 
$i=0; 
while ($baq=$get_lbs->fetch()) {
$bangroupid=$baq['id'];
$bangroupname=$baq['name'];
            $tmpban = array( 
                'mv_group_id' => $bangroupid, 
                'mv_group_name' => $bangroupname 
            );
            $mv_results[$i++] = $tmpban; }
			
$smarty->assign('mv_results', $mv_results);


if (isset($_POST['mv_picked'])) { $mv_picked = $_POST['mv_picked'];
$smarty->assign('mv_group_chosen', $mv_picked);
$mv_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$mv_tagname->execute(array($mv_picked));
$mv_res=$mv_tagname->fetch();
$mv_tag=$mv_res['name'];
$smarty->assign('mv_chosen_group_name', $mv_tag);
$get_mv_links = $db->prepare("select * from idevaff_videos where grp = ?");
$get_mv_links->execute(array($mv_picked));
$mv_link_results = array(); 
$i=0;
while ($getmvideos=$get_mv_links->fetch()) {
$mvideosid = $getmvideos['record'];
$mvideosname = $getmvideos['video_title'];
$mvideosgrp = $getmvideos['grp'];
$mvideosdesc = $getmvideos['video_desc'];

$mvideos_tagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$mvideos_tagname->execute(array($mv_picked));
$mvideos_res=$mvideos_tagname->fetch();
$mvideos_tag=$mvideos_res['name'];
$mvideos_loc=$mvideos_res['location'];
$mvideos_pageid=$mvideos_res['id'];

if ($mvideos_loc) { $quick_link = $mvideos_loc; } else { $quick_link = $default_destination; }

            $tmpgtb = array( 
			'mvideos_link_name' => $mvideosname,
			'mvideos_link_id' => $mvideosid, 
			'mvideos_group_name' => $mvideos_tag, 
			'mvideos_target_url' => $quick_link 
		);
            $mvideos_link_results [$i++] = $tmpgtb; }
$smarty->assign('mvideos_link_results', $mvideos_link_results); }

?>