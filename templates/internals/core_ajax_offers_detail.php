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

	// affiliate ID
	$linkid = $_SESSION[$install_directory_name.'_idev_LoggedID'];
	// promo tools pagination
	$paramRowPerPage = isset($_REQUEST['iDisplayOffersLength']) ? (int)$_REQUEST['iDisplayOffersLength'] : 9e13; // set to default 10 when pagination is enabled
	$paramStart = isset($_REQUEST['iDisplayOffersOffset']) ? (int)$_REQUEST['iDisplayOffersOffset'] : 0;
	// affiliate percentage
	$checkaff = $db->query("select * from idevaff_affiliates where id = '" . $linkid . "'");
	$res = $checkaff->fetch();
	$lev = $res['level'];
	$levamt = $db->prepare('select amt from idevaff_paylevels where level = ?');
	$levamt->execute([$lev]);
	$lamt = $levamt->fetch();
	$levelamt = $lamt['amt'];

	$offerid = $_REQUEST['id']; // for offer page
	$weekago = strtotime('-1 week');
	$now = time();

	// get postbacks data
	$qOfferPostbacks = $db->query('SELECT * FROM idevaff_postbacks WHERE acct_id = '.$linkid.' AND grp ='.$offerid);
	$offerpostbacks = $qOfferPostbacks->fetchAll(PDO::FETCH_ASSOC);

	// postback add, remove and save mechanism START
// if (isset($_POST['postback_edit'])) { // save postback to DB
//     include $_SERVER["DOCUMENT_ROOT"].'/includes/validate_postback_edit.php';
//     if ($error_list) {
//         $smarty->assign('update_warning', 1);
//         $smarty->assign('display_edit_errors', 1);
//         $smarty->assign('error_title', $error_title);
//         $smarty->assign('error_list', $error_list);
//     } else {
//         $smarty->assign('update_notice', 1);
//         $smarty->assign('edit_success', $edit_success);
//         if (isset($_POST['e_postback_url'])) {
//             $e_postback_url = html_output($_POST['e_postback_url']);
//             $e_method = html_output($_POST['e_method']); // 0 for GET, 1 for POST
//             $chk_postback_state = html_output($_POST['e_postback_state']);
//             if ($chk_postback_state === "on") { $e_postback_state = 1; } else { $e_postback_state = 0; }
//             $st = $db->prepare('update idevaff_postbacks set postback_url = ?, method = ?, state = ? where acct_id = ? and grp = 0');
//             $st->execute([$e_postback_url, $e_method, $e_postback_state, $linkid]);
//         }
//     }
// } else { // get postbacks from DB
// $get_e_postback = $db->prepare('select * from idevaff_postbacks where acct_id = ? and grp = 0');
// $get_e_postback->execute([$linkid]);
// $query = $get_e_postback->fetch();
// $e_postback_url = $query['postback_url'];
// $e_postback_state = $query['state'];
// $e_method = $query['method'];
//     if (!$e_postback_url) {
//     $e_postback_url = 'N/A';
//     }
// }
	// postback add, remove and save mechanism END

	$query = $db->prepare('SELECT * FROM idevaff_banners WHERE grp = :id ORDER BY earnings / hits * 100 DESC, number ASC LIMIT '.$paramStart.','.$paramRowPerPage); // TODO: pagination
	$query->execute(array(
		':id'=>$offerid
	));
	$queryData = $db->prepare('SELECT * FROM idevaff_groups WHERE id = :id');
	$queryData->execute(array(
		':id'=>$offerid
	));
	$queryLinks = $db->prepare('SELECT * FROM idevaff_links WHERE grp = :id ORDER BY earnings / hits * 100 DESC, id ASC LIMIT '.$paramStart.','.$paramRowPerPage); // TODO: pagination
	$queryLinks->execute(array(
		':id'=>$offerid
	));
	$qHotLinks = $db->query('SELECT distinct id FROM idevaff_links WHERE earnings / hits * 100 >= 0.05');
	$qFHotBanners = $db->query('SELECT distinct number FROM idevaff_banners WHERE earnings / hits * 100 >= 0.05');
	$hotlinks = $qHotLinks->fetchAll(PDO::FETCH_ASSOC);
	$hotbanners = $qFHotBanners->fetchAll(PDO::FETCH_ASSOC);
	$qRunningLinks = $db->query('SELECT distinct src2 FROM idevaff_iptracking WHERE acct_id = '.$linkid.' AND src1 = 3 AND stamp between '.$weekago.' and '.$now.' GROUP BY src2 HAVING COUNT(*) >= 1');
	$qRunningBanners = $db->query('SELECT distinct src2 FROM idevaff_iptracking WHERE acct_id = '.$linkid.' AND src1 = 1 AND stamp between '.$weekago.' and '.$now.' GROUP BY src2 HAVING COUNT(*) >= 1');
	$banners = $query->fetchAll();
	$group = $queryData->fetch();
	$links = $queryLinks->fetchAll();
	$runninglinks = $qRunningLinks->fetchAll();
	$runningbanners = $qRunningBanners->fetchAll();
	$runningLinksArray=[];
	foreach ($runninglinks as $runninglink){
		$runningLinksArray[]=$runninglink['src2'];
	}
	$runningBannersArray=[];
	foreach ($runningbanners as $runningbanner){
		$runningBannersArray[]=$runningbanner['src2'];
	}
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
	foreach($links as $i=>$link) {
		if(!in_array($link['linktext'],$linktexts) && $link['linktext'] != ""){
			$linktexts[]=$link['linktext'];
		}
		if ( ! in_array( $link['country'], $countries ) && $link['country'] != "" ) {
			$countries[] = $link['country'];
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
		'banners'=>$banners,
		'hotbanners' => $hotbanners,
		'running_banners' => $runningBannersArray,
		'data'=>$group,
		'link'=>$links,
		'hotlinks' => $hotlinks,
		'running_links' => $runningLinksArray,
		'size1' => $size1,
		'size2' => $size2,
		'language' => $language,
		'description' => $description,
		'countries' => $countries,
		'linktext' => $linktexts,
		'sub_payout_details' => $payout,
		'offer_postbacks' => $offerpostbacks
	));
} catch (Exception $e) {
	echo $e->getMessage();
}