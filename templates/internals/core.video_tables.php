<?PHP

// FILE INCLUDE VALIDATION
if (!defined('IDEV_FILE_AUTH')) { die('Unauthorized Access'); }
// -------------------------------------------------------------------------------------------------


if (isset($uploaded_videos_exist)) {
// ----------------------------------------------------------------
// Uploaded Videos
// ----------------------------------------------------------------
$data = $db->query("select * from idevaff_video_tutorials order by sort");
$table_html = '';
$i = 0;
if ($data->rowCount()) {
    while ($qry = $data->fetch()) {
        $video_id = $qry['id'];
		$video_location = $qry['video_location'];
        $video_name = $qry['video_title'];
        $video_size = $qry['video_length'];
        $cell_html = "<td width='10%' align='center'><img src='images/play.png' border='0' height='32' width='32'></td>";
		$cell_html .= "<td width='40%' >" . "<a href='" . $video_location . "' class='fancy-page'><b>" . $video_name . "</b></a>" . "<br />Running Time: " . $video_size . " minutes.</td>";
        if($i%2 == 0) { 
            $table_html .= "<tr>" . $cell_html;
        } else {
            $table_html .= $cell_html . "</tr>"; 
        }
        $i++; } }
if($i%2 != 0) { $table_html .= "<td width='50%' colspan='2' ></td></tr>"; }
if ($data->rowCount()) {
$smarty->assign('Uploaded_Video_Tutorials', $table_html);
} else {
$cell_html = "<tr><td width='100%' >No Videos Available</td></tr>";
$smarty->assign('Uploaded_Video_Tutorials', $cell_html); }
}

if ($videos_enabled == 1) {
$smarty->assign('videos_enabled', '1');

if (isset($videos_key)) {


$smarty->assign('active_subscription', '1');




// ----------------------------------------------------------------
// GET ALL VIDEO CATS AND VIDEOS
// ----------------------------------------------------------------


$get_cats = $db->query("select * from idevaff_video_cats");
if ($get_cats->rowCount()) {
	$video_results = array(); 
	while ($r=$get_cats->fetch()) {
		$cat_id = $r['id'];
		$cat_name = $r['name'];	
		$i=0; 
		
		//$data = $db->query("select * from idevaff_video_library where video_cat = '$cat_id' and video_enabled = '1' order by id");
                $data = $db->prepare("select * from idevaff_video_library where video_cat = ? and video_enabled = '1' order by id");
                $data->execute(array($cat_id));
		$total_rows = $data->rowCount();
		$total_rows_displayed = 0;
		if ($data->rowCount()) {
			$cell_html = "<tr>";
			while ($qry = $data->fetch()) {
				$i++;
				$total_rows_displayed++;
				//Row separation after 2 records
				if($i>2){
					$i=1;
					$cell_html .= "</tr><tr>";
				}
				
				$video_id = $qry['id'];
				$video_name = $qry['video_name'];
				$video_size = $qry['video_size'];
				$cell_html .= "<td width='10%' align='center'><img src='images/play.png' border='0' height='32' width='32'></td>";
				$cell_html .= "<td width='40%'>" . "<a href='videos.php?id=" . $video_id . "' class='fancy-page'><b>" . $video_name . "</b></a>" . "<br />Running Time: " . $video_size . " minutes.</td>";
				
				//Odd row colspan
				$oddColspan = "";
				if ($total_rows % 2 != 0) {
					//If last row
					if($total_rows_displayed == $total_rows){
						$cell_html .= "<td width='60%' colspan='2'>&nbsp;</td>";
					}
				}
				
			}
			$cell_html .= "</tr>";
			
			$video_results[$cat_name] = $cell_html;
		}
		
	}

	$smarty->assign('video_results', $video_results);
	
}




} else {

// ----------------------------------------------------------------
// No Subscription - Give Free Movie Only
// ----------------------------------------------------------------
$data = $db->query("select * from idevaff_video_library where id = '1' and video_enabled = '1' order by id");
$table_html = '';
$i = 0;
if ($data->rowCount()) {
    while ($qry = $data->fetch()) {
        $video_id = $qry['id'];
        $video_name = $qry['video_name'];
        $video_size = $qry['video_size'];
        $cell_html = "<td width='10%' align='center'><img src='images/play.png' border='0' height='32' width='32'></td>";
        $cell_html .= "<td width='40%'>" . "<a href='videos.php?id=" . $video_id . "' class='fancy-page'><b>" . $video_name . "</b></a>" . "<br />Running Time: " . $video_size . " minutes.</td>";
        if($i%2 == 0) {
            $table_html .= "<tr>" . $cell_html;
        } else {
            $table_html .= $cell_html . "</tr>"; 
        }
        $i++; } }
if($i%2 != 0) { $table_html .= "<td width='50%' colspan='2'></td></tr>"; }
$smarty->assign('Table_Rows_General_Affiliate_Marketing', $table_html);

// ----------------------------------------------------------------
// No Subscription - No Paid Movies
// ----------------------------------------------------------------

$cell_html = "<tr><td width='100%'>No Videos Available</td></tr>";
$smarty->assign('Table_Rows_Marketing_Materials', $cell_html);
$smarty->assign('Table_Rows_General_Account_Functions', $cell_html);
$smarty->assign('Table_Rows_Tier_System', $cell_html);
$smarty->assign('Table_Rows_Advanced_Affiliate_Marketing', $cell_html);
$smarty->assign('Table_Rows_Advanced_Marketing_Materials', $cell_html);
$smarty->assign('Table_Rows_Professional_Affiliate_Marketing', $cell_html);

}

}
?>

