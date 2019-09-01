<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------
$temp_fields = 'peels_title,peels_view,peels_description';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$peels_title=html_language_output($getlanguage['peels_title']);
$peels_view=html_language_output($getlanguage['peels_view']);
$peels_description=html_language_output($getlanguage['peels_description']);

if ($marketing_delivery == 1) {

$smarty->assign('peels_view', $peels_view);
$smarty->assign('peels_title', $peels_title);
$smarty->assign('peels_description', $peels_description);

//$get_peel_links = $db->query("select * from idevaff_peels where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by sort");
$get_peel_links = $db->prepare("select * from idevaff_peels where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by sort");
$get_peel_links->execute(array($linkid));
$peel_link_results = array(); 
$i=0;
while ($peel_res = $get_peel_links->fetch()) {
$peel_tag=$peel_res['name'];
$peel_group=$peel_res['grp'];
$peelid = $peel_res['number'];
$peelname = $peel_res['name'];
$peelgrp = $peel_res['grp'];
$peeldesc = $peel_res['description'];

//$peeltagname=$db->query("select * from idevaff_groups where id = '$peelgrp'");
$peeltagname=$db->prepare("select * from idevaff_groups where id = ?");
$peeltagname->execute(array($peelgrp));
$peelres=$peeltagname->fetch();
$peelpageid=$peelres['id'];
$peeltag=$peelres['name'];
$peelloc=$peelres['location'];

if ($peelloc) { $loc = "&page=$peelpageid"; } else { $loc = null; }

if ($peelloc) { $quick_link = $peelloc; } else { $quick_link = $default_destination; }

$newcode = $base_url . "/idevpagepeels.php?id=" . $linkid . "&peel=" . $peelid . $loc;
$source_location = $base_url . "/templates/source/pagepeels";
$samplecode = "peelview.php?id=" . $linkid . "&peel=" . $peelid . $loc;

if ($peeldesc) { $peeldescription = $peeldesc; } else { $peeldescription = $account_not_available; }

            $tmpgtr = array( 
			'peel_link_name' => $peelname,
			'peel_link_id' => $peelid, 
			'peel_link_url' => $newcode, 
			'peel_source_location' => $source_location, 
			'peel_description' => $peeldescription, 
			'peel_sample_url' => $samplecode, 
			'peel_group_name' => $peeltag, 
			'peel_target_url' => $quick_link 
		);
            $peel_link_results [$i++] = $tmpgtr; }

$smarty->assign('peel_link_results', $peel_link_results);



} else {



$smarty->assign('peels_view', $peels_view);
$smarty->assign('peels_title', $peels_title);
$smarty->assign('peels_description', $peels_description);
//$get_peels = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) and peels > 0 order by name");
$get_peels = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and peels > 0 order by name");
$get_peels->execute(array($linkid));
$peels_results = array(); 
$i=0; 
while ($baq=$get_peels->fetch()) {
$peelsgroupid=$baq['id'];
$peelsgroupname=$baq['name'];
            $tmppeels = array( 
                'peels_group_id' => $peelsgroupid, 
                'peels_group_name' => $peelsgroupname 
            );
            $peels_results[$i++] = $tmppeels; }
$smarty->assign('peels_results', $peels_results);

if (isset($_POST['peels_picked'])) { $peels_picked = $_POST['peels_picked'];
$smarty->assign('peels_group_chosen', $peels_picked);
$peels_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$peels_tagname->execute(array($peels_picked));
$peels_res=$peels_tagname->fetch();
$peels_tag=$peels_res['name'];
$smarty->assign('peels_chosen_group_name', $peels_tag);
$get_peels_links = $db->prepare("select * from idevaff_peels where grp = ? order by sort");
$get_peels_links->execute(array($peels_picked));
$peels_link_results = array(); 
$i=0;
while ($bat=$get_peels_links->fetch()) {
$peelsid=$bat['number'];
$peels_tag=$bat['name'];
$peels_image500=$bat['image500'];
$peels_description=$bat['description'];

if (!isset($peels_d)) { $peels_d = "None Given"; }

$peels_tagname=$db->prepare("select id, name, location from idevaff_groups where id = ?");
$peels_tagname->execute(array($peels_picked));
$peels_res=$peels_tagname->fetch();
$peels_tag=$peels_res['name'];
$peels_loc=$peels_res['location'];
$peels_pageid=$peels_res['id'];


if ($peels_loc) { $loc = "&page=$peels_pageid"; } else { $loc = null; }
if ($peels_loc) { $quick_link = $peels_loc; } else { $quick_link = $default_destination; }

$newcode = $base_url . "/idevpagepeels.php?id=" . $linkid . "&peel=" . $peelsid . $loc;
$source_location = $base_url . "/templates/source/pagepeels";
$samplecode = "peelview.php?id=" . $linkid . "&peel=" . $peelsid . $loc;

if (isset($peeldesc)) { $peeldescription = $peeldesc; } else { $peeldescription = $account_not_available; }

            $tmpgtb = array(
			'peels_link_name' => $peels_tag, 
			'peels_link_id' => $peelsid, 
			'peels_link_url' => $newcode, 
			'peels_source_location' => $source_location, 
			'peels_description' => $peels_description, 
			'peels_sample_url' => $samplecode, 
			'peels_group_name' => $peels_tag, 
			'peels_target_url' => $quick_link 
		);
            $peels_link_results [$i++] = $tmpgtb; }
$smarty->assign('peels_link_results', $peels_link_results); } }

?>