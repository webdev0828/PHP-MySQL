<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

function escapeJavaScriptText($string)
{
	return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
}

$temp_fields = 'announcements_name,announcements_facebook_message,announcements_twitter_message,announcements_facebook_picture,announcements_facebook_link';
try {
	$query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$getlanguage=$query->fetch();
	$query->closeCursor();
} catch ( Exception $ex ) {
	echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
	die;
}

$announcements_name=html_language_output($getlanguage['announcements_name']);
$announcements_facebook_message=html_language_output($getlanguage['announcements_facebook_message']);
$announcements_twitter_message=html_language_output($getlanguage['announcements_twitter_message']);
$announcements_facebook_picture=html_language_output($getlanguage['announcements_facebook_picture']);
$announcements_facebook_link=html_language_output($getlanguage['announcements_facebook_link']);

$smarty->assign('announcements_name', $announcements_name);
$smarty->assign('announcements_facebook_message', $announcements_facebook_message);
$smarty->assign('announcements_twitter_message', $announcements_twitter_message);
$smarty->assign('announcements_facebook_picture', $announcements_facebook_picture);
$smarty->assign('announcements_facebook_link', $announcements_facebook_link);

//$smarty->assign('facebook_app_id', $appId);
$smarty->assign('facebook_app_id', $idev_facebook_id);

if ($marketing_delivery == 1) {
    //$announcements = $db->query("select * from idevaff_announcements where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by grp desc");
    $announcements = $db->prepare("select * from idevaff_announcements where grp NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by grp desc");
    $announcements->execute(array($linkid));
    $announcement_link_results = array();
    $i = 0;

    while ($rs = $announcements->fetch()) {
        $number = $rs['number'];
        $grp = $rs['grp'];
        $announcement_name = escapeJavaScriptText($rs['announcement_name']);
        $facebook_message = escapeJavaScriptText($rs['facebook_message']);
        $twitter_message = $rs['twitter_message'];
        $facebook_picture = $rs['facebook_picture'];
        $pinterest_message = escapeJavaScriptText($rs['pinterest_message']);
        $pinterest_picture = $rs['pinterest_picture'];

        //$group_stats = $db->query("select id, name, location from idevaff_groups where id = '$grp'");
        $group_stats = $db->prepare("select id, name, location from idevaff_groups where id = ?");
        $group_stats->execute(array($grp));
        $group_stats = $group_stats->fetch();
        $group_name = $group_stats['name'];
        $sm_loc = $group_stats['location'];
        $sm_pageid = $group_stats['id'];

        $facebook_picture_img = null;

        if ($rs['facebook_picture'] != '') {
            if ($rs['local'] == 1) {
                $facebook_picture = $rs['facebook_picture'];
            } else {
                $facebook_picture = $base_url . '/media/banners/' . $rs['facebook_picture'];
            }

            $facebook_picture_img = '<img src="' . $facebook_picture . '" style="border:none;"></a>';
        } else {
            $facebook_picture = '';
        }

        $pinterest_picture_img = null;

        if ($rs['pinterest_picture'] != '') {
            if ($rs['pinterest_local'] == 1) {
                $pinterest_picture = $rs['pinterest_picture'];
            } else {
                $pinterest_picture = $base_url . '/media/banners/' . $rs['pinterest_picture'];
            }

            $pinterest_picture_img = '<img src="' . $pinterest_picture . '" style="border:none;"></a>';
        } else {
            $pinterest_picture = '';
        }

// --------------------------------------------------
// ADDED TO CREATE AFFILIATE LINK
        if ($sm_loc != '') {
            $smadded = "-" . $sm_pageid;
        } else {
            $smadded = null;
        }
        $smref = $seo_url . $seo_link_association_marketing . $smadded . $seo_link_extension;
        $twitter_message = preg_replace("/_afflink_/", "$smref", $twitter_message);
// --------------------------------------------------
        $data = array(
            'number' => $number,
            'grp' => $grp,
            'group_name' => $group_name,
            'announcement_name' => $announcement_name,
            'facebook_message' => $facebook_message,
            'twitter_message' => $twitter_message,
            'encoded_twitter_message' => urlencode($twitter_message),
            'facebook_link' => $smref,
            'facebook_picture_img' => $facebook_picture_img,
            'facebook_picture' => $facebook_picture,
            'pinterest_message' => $pinterest_message,
            'pinterest_link' => $smref,
            'pinterest_picture_img' => $pinterest_picture_img,
            'pinterest_picture' => $pinterest_picture
        );

        $announcement_link_results[$i++] = $data;
    }

    $smarty->assign('announcement_link_results', $announcement_link_results);

} else {

	//$announcements = $db->query("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) and announcements > 0 order by name");
	$announcements = $db->prepare("select * from idevaff_groups where id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) and announcements > 0 order by name");
	$announcements->execute(array($linkid));
	$announcement_results = array();
	$i=0;

	while ($rs = $announcements->fetch()) {
		$group_id = $rs['id'];
		$group_name = $rs['name'];
		$data = array(
				'group_id' => $group_id,
				'group_name' => $group_name
		);

		$announcement_results[$i++] = $data;
	}

	$smarty->assign('announcement_results', $announcement_results);

	if (isset($_POST['announcements_picked'])) {
		$group_picked = $_POST['announcements_picked'];
		$smarty->assign('announcement_group_chosen', 1);



		$group_name = $db->prepare("select name from idevaff_groups where id = ?");
		$group_name->execute(array($group_picked));
		$group_name = $group_name->fetch();
		$group_name = $group_name['name'];
		$smarty->assign('announcement_chosen_group_name', $group_name);

		$announcements = $db->prepare("select * from idevaff_announcements where grp = ?");
		$announcements->execute(array($group_picked));
		$announcement_link_results = array();
		$i=0;

		while ($rs = $announcements->fetch()) {
			$number = $rs['number'];
			$grp = $rs['grp'];
			$announcement_name = $rs['announcement_name'];
			$facebook_message = escapeJavaScriptText($rs['facebook_message']);
			$twitter_message = $rs['twitter_message'];
			$facebook_picture = $rs['facebook_picture'];
            $pinterest_message = escapeJavaScriptText($rs['pinterest_message']);
            $pinterest_picture = $rs['pinterest_picture'];

			$group_stats = $db->prepare("select id, name, location from idevaff_groups where id = ?");
			$group_stats->execute(array($grp));
			$group_stats = $group_stats->fetch();
			$group_name = $group_stats['name'];
			$sm_loc=$group_stats['location'];
			$sm_pageid=$group_stats['id'];

			$facebook_picture_img = null;

			if ($rs['facebook_picture'] != '') {
				if ($rs['local'] == 1) {
					$facebook_picture = $rs['facebook_picture'];
				}
				else {
					$facebook_picture = $base_url.'/media/banners/'.$rs['facebook_picture'];
				}

				$facebook_picture_img = '<img src="'.$facebook_picture.'" style="border:none;"></a>';
			}
			else {
				$facebook_picture = '';
			}

            $pinterest_picture_img = null;

            if ($rs['pinterest_picture'] != '') {
                if ($rs['pinterest_local'] == 1) {
                    $pinterest_picture = $rs['pinterest_picture'];
                } else {
                    $pinterest_picture = $base_url . '/media/banners/' . $rs['pinterest_picture'];
                }

                $pinterest_picture_img = '<img src="' . $pinterest_picture . '" style="border:none;"></a>';
            } else {
                $pinterest_picture = '';
            }

			// --------------------------------------------------
			// ADDED TO CREATE AFFILIATE LINK
			if ($sm_loc != '') { $smadded = "-" . $sm_pageid; } else { $smadded = null; }
			$smref = $seo_url . $seo_link_association_marketing . $smadded . $seo_link_extension;
			$twitter_message = preg_replace("/_afflink_/", "$smref", $twitter_message);
			// --------------------------------------------------
			$data = array(
					'number' => $number,
					'grp' => $grp,
					'group_name' => $group_name,
					'announcement_name' => $announcement_name,
					'facebook_message' => $facebook_message,
					'twitter_message' => $twitter_message,
					'encoded_twitter_message' => urlencode($twitter_message),
					'facebook_link' => $smref,
					'facebook_picture_img' => $facebook_picture_img,
                'facebook_picture' => $facebook_picture,
                'pinterest_message' => $pinterest_message,
                'pinterest_link' => $smref,
                'pinterest_picture_img' => $pinterest_picture_img,
                'pinterest_picture' => $pinterest_picture
			);

			$announcement_link_results[$i++] = $data;
		}

		$smarty->assign('announcement_link_results', $announcement_link_results);
	}
}
?>