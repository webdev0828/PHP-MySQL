<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;

try {
	include_once("../../API/config.php");
	include_once 'includes/control_panel.php';
	include_once('../../includes/session.check_affiliates.php');
	// TODO: Add indexes to idevaff_groups/idevaff_banners/idevaff_links MySQL table for faster execution when done;

	// affiliate ID
	$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];

	$offerid = $_REQUEST['id'];
	$size1 = $_REQUEST['size1'];
	$size2 = $_REQUEST['size2'];
	$language = $_REQUEST['language'];
	$description = $_REQUEST['description'];

	$queryString="SELECT * FROM idevaff_banners WHERE grp = :id ";
	$qArray=[':id'=>$offerid];
	if($size1 != "" && $size1 != "undefined" && $size1 != "null"){
		$queryString.="AND size1 = '$size1' ";
	}
	if($size2 != "" && $size2 != "undefined" && $size2 != "null"){
		$queryString.="AND size2 = '$size2' ";
	}
	if($language != "" && $language != "undefined" && $language != "null"){
		$queryString.="AND language = '$language' ";
	}
	if($description != "" && $description != "undefined" && $description != "null"){
		$queryString.="AND description = '$description' ";
	}
	$queryString.="ORDER BY earnings / hits * 100 DESC, number ASC";  // TODO: pagination

	$query = $db->prepare($queryString);
	$query->execute($qArray);

	$queryData = $db->prepare('SELECT * FROM idevaff_groups WHERE id = :id');
	$queryData->execute(array(
		':id'=>$offerid
	));
	$banners = $query->fetchAll();
	$group = $queryData->fetch();
	$ban_loc = $group['location'];

	$weekago = strtotime('-1 week');
	$now = time();
	$qRunningBanners = $db->query('SELECT distinct src2 FROM idevaff_iptracking WHERE acct_id = '.$linkid.' AND src1 = 1 AND stamp between '.$weekago.' and '.$now.' GROUP BY src2 HAVING COUNT(*) >= 1');
	$runningbanners = $qRunningBanners->fetchAll();
	$runningBannersArray=[];
	foreach ($runningbanners as $runningbanner){
		$runningBannersArray[]=$runningbanner['src2'];
	}

	$changedOption=$_REQUEST['changedOption'];
	$atextlink_loc = $group['location'];
	$size11=[];
	$size21=[];
	$language1=[];
	$description1=[];
	foreach($banners as $i=>$banner) {
		if($description == "" ) {
			if(!in_array($banner['description'],$description1)){
				$description1[]=$banner['description'];
			}
		}
		if($size1 == ""|| $changedOption == 'descriptionChanged') {
			if ( ! in_array( $banner['size1'], $size11 ) ) {
				$size11[] = $banner['size1'];
			}
		}
		if($size2 == "" || $changedOption == 'size1Changed') {
			if(!in_array($banner['size2'],$size21)){
				$size21[]=$banner['size2'];
			}
		}
		if($language == "" || $changedOption == 'size2Changed') {
			if(!in_array($banner['language'],$language1)){
				$language1[]=$banner['language'];
			}
		}

		$chkfiletype = substr($banner['image'], -3);
		if ($ban_loc) { $quick_link = $ban_loc; } else { $quick_link = $default_destination; }
		// STANDARD BANNERS
		// ---------------------------------------------------
		if ($chkfiletype != "swf") {
			if ($link_style == 1) {
				// GROUP & STATS
				if (($ban_loc) && ($mark_track == 1)) { $banadded = "_" . $group['id'] . "_1_" . $banner['number']; }
				// GROUP ONLY
				if (($ban_loc) && (!$mark_track)) { $banadded = "_" . $group['id'] ; }
				// STATS ONLY
				if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $banner['number']; }
				// NO GROUP, NO STATS
				if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }
				// SEO LINKS
				// ---------------------------------------------------
			} elseif ($link_style == 2) {
				// GROUP & STATS
				if (($ban_loc) && ($mark_track == 1)) { $banadded = "-" . $group['id']  . "-1-" . $banner['number']; }
				// GROUP ONLY
				if (($ban_loc) && (!$mark_track)) { $banadded = "-" . $group['id'] ; }
				// STATS ONLY
				if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $banner['number']; }
				// NO GROUP, NO STATS
				if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }
			}
		}
		else {
			// FLASH BANNERS
			// ---------------------------------------------------
			// NON SEO LINKS
			if ($link_style != 2) {
				// GROUP & STATS
				if (($ban_loc) && ($mark_track == 1)) { $banadded = "_" . $group['id']  . "_1_" . $banner['number']; }
				// GROUP ONLY
				if (($ban_loc) && (!$mark_track)) { $banadded = "_" . $group['id'] ; }
				// STATS ONLY
				if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $banner['number']; }
				// NO GROUP, NO STATS
				if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }
			} else {
				// SEO LINKS
				// ---------------------------------------------------
				// GROUP & STATS
				if (($ban_loc) && ($mark_track == 1)) { $banadded = "-" . $group['id'] . "-1-" . $banner['number']; }
				// GROUP ONLY
				if (($ban_loc) && (!$mark_track)) { $banadded = "-" . $group['id'] ; }
				// STATS ONLY
				if ((!$ban_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $banner['number']; }
				// NO GROUP, NO STATS
				if ((!$ban_loc) && (!$mark_track)) { $banadded = null; }

			}
		}
		$seo_link_association_marketing = $linkid;
		if ($chkfiletype != "swf") {
			if ($link_style == 1) {
				$banurl = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $banadded;
				// if (empty($direct_url)) $direct_url = str_replace($banner['number'],$grouplink['id'],$banurl);
			} elseif ($link_style == 2) {
				$banurl = $seo_url . $seo_link_association_marketing . $banadded . $seo_link_extension;
				// if (empty($direct_url)) $direct_url = str_replace($banner['number'],$grouplink['id'],$banurl);
			} }

		$banners[$i]['lnk']=str_replace('sublimerevenue.com','srtrak.com',$banurl);
	}

	echo json_encode(array(
		// 'direct_url'=>isset($banners[2])?str_replace('sublimerevenue.com','srtrak.com',$banners[2]['lnk']):'',
		'banners'=>$banners,
		'size1' => $size11,
		'size2' => $size21,
		'language' => $language1,
		'description' => $description1, // banner set
		'data'=>$group,
		'running_banners'=>$runningBannersArray
	));
	// affiliate ID
} catch (Exception $e) {
	echo $e->getMessage();
}