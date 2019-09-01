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
	// TODO: Add indexes to idevaff_groups/idevaff_banners/idevaff_links MySQL table for faster execution when done, if needed.

	// affiliate ID
	$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];

	$offerid = $_REQUEST['id'];
	$land = $_REQUEST['land'];
	$country = $_REQUEST['country'];
	$linktext = $_REQUEST['linktext'];

	$queryData = $db->prepare('SELECT * FROM idevaff_groups WHERE id = :id ');
	$queryData->execute(array(
		':id'=>$offerid
	));

	$queryLinks="SELECT * FROM idevaff_links WHERE grp = :id ";
	$qArray=[':id'=>$offerid];
	if($land != "" && $land != "undefined"){
		$queryLinks.="AND land = '$land' ";
	}
	if($country != "" && $country != "undefined" && $country != "null"){
		$queryLinks.="AND country = '$country' ";
	}
	if($linktext != "" && $linktext != "undefined" && $linktext != "null"){
		$queryLinks.="AND linktext = '$linktext' ";
	}
	$query = $db->prepare($queryLinks." ORDER BY earnings / hits * 100 DESC, id ASC");
	$query->execute($qArray);
//	if($land != ""){
//		$queryLinks = $db->prepare('SELECT * FROM idevaff_links WHERE grp = :id AND land = '.$land.' ORDER BY id');
//		$queryLinks->execute(array(
//			':id'=>$offerid
//		));
//	}
//	else{
//		$queryLinks = $db->prepare('SELECT * FROM idevaff_links WHERE grp = :id ORDER BY id');
//		$queryLinks->execute(array(
//			':id'=>$offerid
//		));
//	}

	// TODO filter links by niche: female / male / tranny / couple / all only on offer sublimecam - select option AND GEO
	$group = $queryData->fetch();
	$links = $query->fetchAll();

	$weekago = strtotime('-1 week');
	$now = time();
	$qRunningLinks = $db->query('SELECT distinct src2 FROM idevaff_iptracking WHERE acct_id = '.$linkid.' AND src1 = 3 AND stamp between '.$weekago.' and '.$now.' GROUP BY src2 HAVING COUNT(*) >= 1');
	$runninglinks = $qRunningLinks->fetchAll();
	$runningLinksArray=[];
	foreach ($runninglinks as $runninglink){
		$runningLinksArray[]=$runninglink['src2'];
	}

	$changedOption=$_REQUEST['changedOption'];
	$atextlink_loc = $group['location'];
	$countries=[];
	$linktexts=[];
	foreach($links as $i=>$link) {

		if($linktext == "" || $changedOption == 'landChanged') {
			if(!in_array($link['linktext'],$linktexts) && $link['linktext'] != ""){
				$linktexts[]=$link['linktext'];
			}
		}

		if($country == "" || $changedOption == 'linktextChanged') {
			if ( ! in_array( $link['country'], $countries ) && $link['country'] != "" ) {
				$countries[] = $link['country'];
			}
		}
		if ($atextlink_loc) { $quick_link = $atextlink_loc; } else { $quick_link = $default_destination; }
		$banadded = '';
		if ($link_style == 1) {
			// GROUP & STATS
			if (($atextlink_loc) && ($mark_track == 1)) { $banadded = "_" . $offerid . "_3_" . $link['id']; }
			// GROUP ONLY
			if (($atextlink_loc) && (!$mark_track)) { $banadded = "_" . $offerid  ; }
			// STATS ONLY
			if ((!$atextlink_loc) && ($mark_track == 1)) { $banadded = "_0_1_" . $link['id']; }
			// NO GROUP, NO STATS
			if ((!$atextlink_loc) && (!$mark_track)) { $banadded = null; }
			// SEO LINKS
			// ---------------------------------------------------
		} elseif ($link_style == 2) {
			// GROUP & STATS
			if (($atextlink_loc) && ($mark_track == 1)) { $banadded = "-" . $group['id']   . "-3-" . $link['id']; }
			// GROUP ONLY
			if (($atextlink_loc) && (!$mark_track)) { $banadded = "-" . $group['id']  ; }
			// STATS ONLY
			if ((!$atextlink_loc) && ($mark_track == 1)) { $banadded = "-0-1-" . $link['id']; }
			// NO GROUP, NO STATS
			if ((!$atextlink_loc) && (!$mark_track)) { $banadded = null; }
		}
		if ($link_style == 1) {
			$linkurl = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $banadded;
		} elseif ($link_style == 2) {
			$linkurl = $seo_url . $linkid . $banadded . $seo_link_extension;
		}

		$links[$i]['direct_url']=str_replace('sublimerevenue.com','srtrak.com',$linkurl);
	}

	echo json_encode(array(
		// 'direct_url'=>isset($banners[2])?str_replace('sublimerevenue.com','srtrak.com',$banners[2]['lnk']):'',
		'countries' => $countries,
		'linktext' => $linktexts,
		'link'=>$links,
		'data'=>$group,
		'running_links'=>$runningLinksArray
	));
	// affiliate ID
} catch (Exception $e) {
	echo $e->getMessage();
}