<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('TRAFFIC_EXCEEDED_EXEMPT', TRUE);
$control_panel_session = true;

try {
	include_once("API/config.php");
	include_once 'includes/control_panel.php';
	include_once('includes/session.check_affiliates.php');
	// TODO: Add indexes to idevaff_groups/idevaff_banners/idevaff_links MySQL table for faster execution when done;

	// affiliate ID
	$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];
	// affiliate percentage
	$checkaff = $db->query("select * from idevaff_affiliates where id = '" . $linkid . "'");
	$res = $checkaff->fetch();
	$lev = $res['level'];
	$levamt = $db->prepare('select amt from idevaff_paylevels where level = ?');
	$levamt->execute([$lev]);
	$lamt = $levamt->fetch();
	$levelamt = $lamt['amt'];

	$offerid = $_REQUEST['id'];

	$query = $db->prepare('SELECT * FROM idevaff_banners WHERE grp = :id ORDER BY number');
	$query->execute(array(
		':id'=>$offerid
	));

	$queryData = $db->prepare('SELECT * FROM idevaff_groups WHERE id = :id');
	$queryData->execute(array(
		':id'=>$offerid
	));

	$queryLinks = $db->prepare('SELECT * FROM idevaff_links WHERE grp = :id ORDER BY id');
	$queryLinks->execute(array(
		':id'=>$offerid
	));
	$qHotLinks = $db->query('SELECT distinct id FROM idevaff_links WHERE earnings / hits * 100 >= 0.05');
	$qFHotBanners = $db->query('SELECT distinct number FROM idevaff_banners WHERE earnings / hits * 100 >= 0.05');
	$hotlinks = $qHotLinks->fetchAll(PDO::FETCH_ASSOC);
	$hotbanners = $qFHotBanners->fetchAll(PDO::FETCH_ASSOC);
	// TODO filter links by niche: female / male / tranny / couple / all only on offer sublimecam - select option
	$banners = $query->fetchAll();
	$group = $queryData->fetch();
	$links = $queryLinks->fetchAll();
	$ban_loc = $group['location'];

	// extract numbers from description string, multiply by level percentage and insert back into description string
	$string = $group['payout_details'];
	$payout = "";
	$usd_to_eur=file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
	if(strpos($string, "$") === false) {
		$payout = preg_replace_callback('/(\d+(?:\.\d+)?)(\s*[€%])/i', function($matches) use ($levelamt){
			return number_format(round(($matches[1] * $levelamt), 2), 2).$matches[2];
		}, $string);    } else {
		$payout = preg_replace_callback('/(\d+(?:\.\d+)?)(\s*[$])/i', function($matches) use ($usd_to_eur){
			return str_replace("$","€", number_format(round(($matches[1] * $usd_to_eur), 2), 2).$matches[2]);
		}, $string);
	}


	$atextlink_loc = $group['location'];
	$size1=[];
	$size2=[];
	$language=[];
	$description=[];
	foreach($banners as $i=>$banner) {
		if(!in_array($banner['size1'],$size1)){
			$size1[]=$banner['size1'];
		}
		if(!in_array($banner['size2'],$size2)){
			$size2[]=$banner['size2'];
		}
		if(!in_array($banner['language'],$language)){
			$language[]=$banner['language'];
		}
		if(!in_array($banner['description'],$description)){
			$description[]=$banner['description'];
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
		} else {
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
	foreach($links as $i=>$link) {
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

	json_encode(array(
		// 'direct_url'=>isset($banners[2])?str_replace('sublimerevenue.com','srtrak.com',$banners[2]['lnk']):'',
		'banners'=>$banners,
		// TODO: add HOT label to name in grup array with array_walk or other method (make query for each column and use case). <span class="label label-success">HOT</span> display items with HOT label on top | ORDER by display always HOT first
		'data'=>$group,
		'link'=>$links,
		'hotlinks' => $hotlinks,
		'size1' => $size1,
		'size2' => $size2,
		'language' => $language,
		'description' => $description,
		'hotbanners' => $hotbanners,
		'sub_payout_details' => $payout
	));
	// affiliate ID

	$smarty->display('offers.tpl');
} catch (Exception $e) {
	echo $e->getMessage();
}