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
	// affiliate percentage
	$checkaff = $db->query("select * from idevaff_affiliates where id = '" . $linkid . "'");
	$res = $checkaff->fetch();
	$lev = $res['level'];
	$levamt = $db->prepare('select amt from idevaff_paylevels where level = ?');
	$levamt->execute([$lev]);
	$lamt = $levamt->fetch();
	$levelamt = $lamt['amt'];

	$offer_id = $_REQUEST['id'];

	// POSTBACK START 
	/*
	$e_postback_url		= isset($_GET['e_postback_url']) ? $_GET['e_postback_url'] : '';
	$e_postback_method	= isset($_GET['e_postback_method']) ? $_GET['e_postback_method'] : '';
	$e_postback_status	= isset($_GET['e_postback_status']) ? $_GET['e_postback_status'] : '';
	$offer_id			= isset($_GET['id']) ? $_GET['id'] : '';
	$postback_id		= isset($_GET['e_postback_id']) ? $_GET['e_postback_id'] : '';
	if (isset($_POST['save'])) { // save // for each - get array from JS with form instead of one by one
	$pquery = $db->prepare('UPDATE idevaff_postbacks SET postback_url = ?, status + ?, method = ? WHERE id = ?');
    $pquery->execute([$e_postback_url, $e_postback_status, $e_postback_method, $postback_id]);
	));
	} elseif (isset($_POST['delete'])) { // delete // for each - get array from JS with form
	$pquery = $db->prepare('DELETE FROM idevaff_postbacks WHERE id = ?');
    $pquery->execute([$postback_id]);
	));
	} else { // show
	$pquery = $db->prepare('SELECT * FROM idevaff_postbacks WHERE id = ?');
    $pquery->execute([$postback_id]);
	}
	*/
	// POSTBACK END
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
	$qHotLinks = $db->query('SELECT distinct id FROM idevaff_links WHERE earnings / hits * 100 >= 0.05');
	$qFHotBanners = $db->query('SELECT distinct number FROM idevaff_banners WHERE earnings / hits * 100 >= 0.05');
	$hotlinks = $qHotLinks->fetchAll(PDO::FETCH_ASSOC);
	$hotbanners = $qFHotBanners->fetchAll(PDO::FETCH_ASSOC);
	// TODO filter links by niche: female / male / tranny / couple / all only on offer sublimecam - select option
	$banners = $query->fetchAll();
	$group = $queryData->fetch();
	$links = $queryLinks->fetchAll();
	//$postbacks = $queryLinks->fetchAll();
	$ban_loc = $group['location'];

	// extract numbers from description string, multiply by level percentage and insert back into description string
	$string = $group['payout_details'];
	$payout = "";
	$usd_to_eur=file_get_contents('https://sublimerevenue.com/0_usd_to_eur.txt');
	if(strpos($string, "$") === false) {
		$payout = preg_replace_callback('/(\d+(?:\.\d+)?)(\s*[€%])/i', function($matches) use ($levelamt){
			return number_format(round(($matches[1] * $levelamt), 2), 2).$matches[2];
		}, $string);    } else {
		$payout = preg_replace_callback('/(\d+(?:\.\d+)?)(\s*[$])/i', function($matches) use ($levelamt, $usd_to_eur){
			return str_replace("$","€", number_format(round(($matches[1] * $levelamt * $usd_to_eur), 2), 2).$matches[2]);
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
	$countries=[];
	$linktexts=[];
	//$postbacks=[];
	foreach($links as $i=>$link) {
		if(!in_array($link['country'],$countries) && $link['country'] != "" ){
			$countries[]=$link['country'];
		}
		if(!in_array($link['linktext'],$linktexts) && $link['linktext'] != "" ){
			$linktexts[]=$link['linktext'];
		}
		if ($atextlink_loc) { $quick_link = $atextlink_loc; } else { $quick_link = $default_destination; }
		$banadded = '';
		if ($link_style == 1) {
			// GROUP & STATS
			if (($atextlink_loc) && ($mark_track == 1)) { $banadded = "_" . $offer_id . "_3_" . $link['id']; }
			// GROUP ONLY
			if (($atextlink_loc) && (!$mark_track)) { $banadded = "_" . $offer_id  ; }
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
/*
	foreach($postbacks as $i=>$postback) {
		if(!in_array($postback['e_postback_url'],$e_postback_url)){
			$e_postback_url[]=$postback['e_postback_url'];
		}
		if(!in_array($postback['size2'],$size2)){
			$size2[]=$postback['size2'];
		}
		if(!in_array($postback['language'],$language)){
			$language[]=$postback['language'];
		}
		if(!in_array($postback['description'],$description)){
			$description[]=$postback['description'];
		}
		$postbacks[$i]['e_postback_url']	= $e_postback_url;
		$postbacks[$i]['e_postback_method']	= $e_postback_method;
		$postbacks[$i]['e_postback_status']	= $e_postback_status;
		$postbacks[$i]['postback_id']		= $postback_id;
	}
*/
	echo json_encode(array(
		//'postbacks' => $postbacks,
		'banners'=>$banners,
		'data'=>$group,
		'link'=>$links,
		'hotlinks' => $hotlinks,
		'size1' => $size1,
		'size2' => $size2,
		'language' => $language,
		'description' => $description,
		'hotbanners' => $hotbanners,
		'countries' => $countries,
		'linktext' => $linktexts,
		'sub_payout_details' => $payout
	));
	// affiliate ID
} catch (Exception $e) {
	echo $e->getMessage();
}