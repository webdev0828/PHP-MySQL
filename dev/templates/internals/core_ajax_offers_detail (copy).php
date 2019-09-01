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
    $offerid = $_REQUEST['id'];

    $query = $db->prepare('SELECT * FROM idevaff_banners WHERE grp = :id ORDER BY number');
    $query->execute(array(
    	':id'=>$offerid
    ));

    $queryData = $db->prepare('SELECT * FROM idevaff_groups WHERE id = :id');
    $queryData->execute(array(
    	':id'=>$offerid
    ));

    $queryLinks = $db->prepare('SELECT * FROM idevaff_links WHERE grp = :id');
    $queryLinks->execute(array(
        ':id'=>$offerid
    ));

    $linkid = $_SESSION[$install_directory_name.'_idev_LoggedID']; 
    
    $banners = $query->fetchAll();
    $group = $queryData->fetch();
    $grouplink = $queryLinks->fetch();
    $ban_loc = $group['location'];
    $direct_url = '';
    foreach($banners as $i=>$banner) {
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
    if (empty($direct_url)) {
        $banadded = '';
        if ($link_style == 1) {
            // GROUP & STATS
            if (($mark_track == 1)) { $banadded = "_" . $offerid . "_3_" . $grouplink['id']; }
                // GROUP ONLY
                if ((!$mark_track)) { $banadded = "_" . $offerid  ; }
                // STATS ONLY
                // if (($mark_track == 1)) { $banadded = "_0_1_" . $grouplink['id']; }
                // NO GROUP, NO STATS
                if ((!$mark_track)) { $banadded = null; }
                // SEO LINKS
                // ---------------------------------------------------
        } elseif ($link_style == 2) {
                // GROUP & STATS
                if (($mark_track == 1)) { $banadded = "-" . $group['id']   . "-3-" . $grouplink['id']; }
                // GROUP ONLY
                if ((!$mark_track)) { $banadded = "-" . $group['id']  ; }
                // STATS ONLY
                // if (($mark_track == 1)) { $banadded = "-0-1-" . $grouplink['id']; }
                // NO GROUP, NO STATS
                if ((!$mark_track)) { $banadded = null; }
        }
        if ($link_style == 1) {
        $direct_url = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $banadded;
        } elseif ($link_style == 2) {
        $direct_url = $seo_url . $linkid . $banadded . $seo_link_extension;
        }
    }

    echo json_encode(array(
        // 'direct_url'=>isset($banners[2])?str_replace('sublimerevenue.com','srtrak.com',$banners[2]['lnk']):'',
        'direct_url'=>str_replace('sublimerevenue.com','srtrak.com',$direct_url),
    	'banners'=>$banners,
    	'data'=>$group,
        'link'=>$grouplink
    ));
    // affiliate ID
} catch (Exception $e) {
	echo $e->getMessage();
}