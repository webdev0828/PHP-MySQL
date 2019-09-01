<?PHP


// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------

$temp_fields = 'qr_code_size,qr_code_button,qr_code_offline_title,qr_code_offline_content1,qr_code_offline_content2,
qr_code_online_title,qr_code_online_content';
try {
    $query = $db->query("select {$temp_fields} from `idevaff_language_".$pack_table_selected."` LIMIT 1");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $getlanguage=$query->fetch();
    $query->closeCursor();
} catch ( Exception $ex ) {
    echo '<strong>Error:</strong><br>File: ' . $ex->getFile() . '<br><strong>Line:</strong> ' . $ex->getLine() . '<br><strong>Message:</strong> ' . $ex->getMessage();
    die;
}

$qr_code_size=html_language_output($getlanguage['qr_code_size']);
$qr_code_button=html_language_output($getlanguage['qr_code_button']);
$qr_code_offline_title=html_language_output($getlanguage['qr_code_offline_title']);
$qr_code_offline_content1=html_language_output($getlanguage['qr_code_offline_content1']);
$qr_code_offline_content2=html_language_output($getlanguage['qr_code_offline_content2']);
$qr_code_online_title=html_language_output($getlanguage['qr_code_online_title']);
$qr_code_online_content=html_language_output($getlanguage['qr_code_online_content']);



$smarty->assign('size_only', '232');
$smarty->assign('marketing_group_title', $marketing_group_title);


$smarty->assign('qr_code_size', $qr_code_size);
$smarty->assign('qr_code_button', $qr_code_button);
$smarty->assign('qr_code_offline_title', $qr_code_offline_title);
$smarty->assign('qr_code_offline_content1', $qr_code_offline_content1);
$smarty->assign('qr_code_offline_content2', $qr_code_offline_content2);
$smarty->assign('qr_code_online_title', $qr_code_online_title);
$smarty->assign('qr_code_online_content', $qr_code_online_content);

//$get_qr_links = $db->query("select * from idevaff_groups where id > '0' and qr_enabled = '1' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = $linkid) order by name");
$get_qr_links = $db->prepare("select * from idevaff_groups where id > '0' and qr_enabled = '1' and id NOT IN (select id FROM idevaff_groups_exclude WHERE affiliate_id = ?) order by name");
$get_qr_links->execute(array($linkid));
if ($get_qr_links->rowCount()) {
$smarty->assign('qr_groups_available', 1); }

$qr_results = array(); 
$i=0; 
while ($s=$get_qr_links->fetch()) {
$groupid=$s['id'];
$groupname=$s['name'];
            $tmps = array( 'qr_group_id' => $groupid, 'qr_group_name' => $groupname );
            $qr_results[$i++] = $tmps; }
$smarty->assign('qr_results', $qr_results);

if (isset($_POST['qr_picked'])) {

$qr_picked = $_POST['qr_picked'];
$smarty->assign('qr_group_chosen', $qr_picked);
$qr_tagname=$db->prepare("select name from idevaff_groups where id = ?");
$qr_tagname->execute(array($qr_picked));
$qr_res=$qr_tagname->fetch();
$qr_tag=$qr_res['name'];
$smarty->assign('qr_chosen_group_name', $qr_tag);
$qr_lnk = $db->prepare("select * from idevaff_groups where id = ?");
$qr_lnk->execute(array($qr_picked));
$qr_res=$qr_lnk->fetch();
$qr_tag=$qr_res['name'];
$qr_loc=$qr_res['location'];
$qr_pageid=$qr_res['id'];

if ($qr_loc) { $quick_link = $qr_loc; } else { $quick_link = $default_destination; }

if ($qr_loc) {
$display_tag = "$qr_tag";
if ($link_style == 1) {  $qr_loc = "_$qr_pageid"; }
if ($link_style == 2) {  $qr_loc = "-$qr_pageid"; }
} else {
$display_tag = "$sitename"; }
$smarty->assign('qr_chosen_group_name', $qr_tag);
$smarty->assign('qr_chosen_display_tag', $display_tag);

if ($link_style == 1) {
$delivery_url = $base_url . "/" . $filename . ".php?id=" . $standard_link_association . $qr_loc;
} elseif ($link_style == 2) {
$delivery_url = $seo_url . $seo_link_association_marketing . $qr_loc . $seo_link_extension;
}

$smarty->assign('qr_chosen_url', $delivery_url);


$qr_size = $_POST['qr_code_size'];

$img = $linkid . "_" . $qr_size . "_" . $qr_picked . ".png";

include "templates/source/qr_codes/barcode.php";
$qr = new BarcodeQR();
$qr->url($delivery_url); 
$qr->draw($qr_size, "media/qr_codes/" . $img);


$smarty->assign('qr_image', '<img src="' . $base_url . '/media/qr_codes/' . $img . '" width="' . $qr_size . '" height="' . $qr_size . '">');
$smarty->assign('image_only', '/media/qr_codes/' . $img);
$smarty->assign('size_only', $qr_size);
$smarty->assign('url_only', $delivery_url);
$smarty->assign('target_url', $quick_link);

}

?>