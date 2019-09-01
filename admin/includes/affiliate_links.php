<?PHP
if (!defined('admin_includes')) { die(); }
include("session.check.php");
//$idev_url = parse_url($base_url);
//$new_domain = preg_replace("/^http:\/\//i","",$idev_url['path']);
//if (!$new_domain) { $new_domain = $base_url; }
if ($standard_link_structure == 1) {
$id_addon = "100";
} elseif ($standard_link_structure == 2) {
$id_addon = "username"; }
if ($seo_link_structure == 1) {
$seo_id_addon = "100" . $seo_link_extension;
} elseif ($seo_link_structure == 2) {
$seo_id_addon = "username" . $seo_link_extension; }
?>

<div class="crumbs">
<ul id="breadcrumbs" class="breadcrumb">
<li><i class="icon-home"></i> <a href="dashboard.php">Dashboard</a></li>
<li> General Settings</li>
<li class="current"> <a href="setup.php?action=19" title="">Affiliate Tracking Links</a></li>
</ul>
<?PHP include("templates/crumb_right.php"); ?>
</div>
<div class="page-header">
<div class="page-title"><h3>Affiliate Tracking Links</h3><span>Define the linking structure for your affiliate program.</span></div>
<?PHP include("templates/stats.php"); ?>
</div>
<?PHP include("notifications.php"); ?>
<div class="tabbable tabbable-custom">
<ul class="nav nav-tabs">
<li <?php makeActiveTab(1);?>><a href="#tab_1_1" data-toggle="tab">Link Settings</a></li>
<li <?php makeActiveTab(2);?>><a href="#tab_1_2" data-toggle="tab">Link Configuration</a></li>
<li><a data-toggle="modal" href="#video_tutorial"><i class="icon-play"></i> Video Tutorial</a></li>
<li <?php makeActiveTab(4);?>><a href="#tab_1_4" data-toggle="tab"><i class="icon-shopping-cart"></i> Order Professional Setup</a></li>
</ul>
<div class="modal fade" id="video_tutorial">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Video Tutorial: Affiliate Links</h4>
</div>
<div class="modal-body">
<div class="video-container">
<iframe src="//player.vimeo.com/video/85580506" frameborder="0" width="560" height="315" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="tab-content">
<div class="tab-pane<?php makeActiveTab(1, 'no');?>" id="tab_1_1">
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-link"></i> Affiliate Link Settings</h4></div>
<div class="widget-content">
<form class="form-horizontal row-border" method="post" action="setup.php">
<input name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" type="hidden" />
<?PHP if (isset($seo_links_valid)) { ?>
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<h4>SEO Links Notice</h4>
<p>Before adjusting any settings on this page, please click the <strong>Tutorial</strong> tab to learn about Affiliate Tracking Links setup. If your SEO links are not setup properly, you can cripple incoming affiliate links <u>and</u> general traffic to your website!</p>
</div>
<?PHP } else { ?>
<div class="alert alert-warning">SEO links are not enabled. The only available linking method is <strong>Standard Links</strong>.<br /><br />
<a href="https://www.idevdirect.com/idevaffiliate-seo-plugin.php" target="_blank" class="btn btn-default">Learn More</button></a>
</div>
<?PHP } ?>
<div class="form-group">
<label class="col-md-3 control-label">Redirect Method</label>
<div class="col-md-2"><select class="form-control" name="redirect_method">
<option value="301" <?PHP if ($redirect_method == '301') { ?> selected="selected" <?PHP } ?>>301 (Default)</option>
<option value="302" <?PHP if ($redirect_method == '302') { ?> selected="selected" <?PHP } ?>>302</option>
</select></div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Link Type Options</label>
<div class="col-md-2"><select name="link_type" class="form-control">
<option value="none" <?PHP if ($link_type == 'none') { ?> selected="selected" <?PHP } ?>>None</option>
<option value="nofollow" <?PHP if ($link_type == 'nofollow') { ?> selected="selected" <?PHP } ?>>rel="nofollow"</option>
</select></div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Linking Method To Use</label>
<div class="col-md-2"><select name="link_style" class="form-control">
<option value="1" <?PHP if ($link_style == '1') { ?> selected="selected" <?PHP } ?>>Standard Links</option>
<?PHP if (isset($seo_links_valid)) { ?>
<option value="2" <?PHP if ($link_style == '2') { ?> selected="selected" <?PHP } ?>>SEO Links</option>
<?PHP } ?>
</select></div>
</div>
<div class="form-actions">
<input type="submit" value="Continue To Link Configuration" class="btn btn-primary">
</div>
<input type="hidden" name="action" value="19">
<input type="hidden" name="cfg" value="32">
<input type="hidden" name="tab" value="2">
</form>
</div>
</div>
</div>
</div>
<div class="tab-pane<?php makeActiveTab(2, 'no');?>" id="tab_1_2">
<?PHP
if ($link_style == 1) {
$display_link_type = "Standard Links";
} elseif ($link_style == 2) {
$display_link_type = "SEO Links"; }
?>
<?PHP
if (isset($_POST['seo_code_option'])) {
if ($_POST['seo_code_option'] == 1) {
if ($seo_link_structure == 1) {
include("seo_id.php");
} elseif ($seo_link_structure == 2) {
include("seo_username.php"); }
} elseif ($_POST['seo_code_option'] == 2) {
if ($seo_link_structure == 1) {
include("seo_win_id.php");
} elseif ($seo_link_structure == 2) {
include("seo_win_username.php"); }
}
}
?>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-link"></i> Affiliate Link Configuration: <font color="#CC0000"><?PHP echo html_output($display_link_type); ?></font></h4></div>
<div class="widget-content">
<?PHP if ($link_style == 1) { ?>
<form class="form-horizontal row-border" method="post" action="setup.php">
<input name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" type="hidden" />
<div class="alert alert-info"><h4>Example Incoming Link:</h4> <a href="<?PHP echo $base_url; ?>/<?PHP echo $filename; ?>.php?id=<?PHP echo $id_addon; ?>" target="_blank"><?PHP echo $base_url; ?>/<?PHP echo $filename; ?>.php?id=<font color="#CC0000"><?PHP echo $id_addon; ?></font></a></div>

<div class="form-group">
<label class="col-md-3 control-label">Standard Link Identifier</label>
<div class="col-md-3"><select class="form-control" name="standard_link_structure">
<option value="1" <?PHP if ($standard_link_structure == '1') { ?> selected <?PHP } ?>>Affiliate ID</option>
<option value="2" <?PHP if ($standard_link_structure == '2') { ?> selected <?PHP } ?>>Affiliate Username</option>
</select></div>
</div>
<div class="form-actions">
<input type="submit" value="Save Setting" class="btn btn-primary">
</div>
<input type="hidden" name="action" value="19">
<input type="hidden" name="cfg" value="32.1">
<input type="hidden" name="tab" value="2">
</form>
<?PHP } elseif ($link_style == 2) { ?>
<form class="form-horizontal row-border" method="post" action="setup.php">
<input name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" type="hidden" />
<div class="alert alert-info"><h4>Example Incoming Link:</h4> <a href="<?PHP echo $seo_url; ?><?PHP echo $seo_id_addon; ?>" target="_blank"><?PHP echo $seo_url; ?><font color="#CC0000"><?PHP echo $seo_id_addon; ?></font></a></div>
<div class="form-group">
<label class="col-md-3 control-label">SEO Link Identifier</label>
<div class="col-md-9"><select class="form-control input-width-large" name="seo_link_structure" style="display:inline-block;">
<option value="1"<?PHP if ($seo_link_structure == '1') { ?> selected<?PHP } ?>>Affiliate ID</option>
<option value="2"<?PHP if ($seo_link_structure == '2') { ?> selected<?PHP } ?>>Affiliate Username</option>
</select> <select class="form-control input-width-small" name="seo_link_extension" style="display: inline-block">
<option value="1"<?PHP if ($seo_link_extension_raw == '1') { ?> selected<?PHP } ?>>.html</option>
<option value="2"<?PHP if ($seo_link_extension_raw == '2') { ?> selected<?PHP } ?>>.htm</option>
<option value="3"<?PHP if ($seo_link_extension_raw == '3') { ?> selected<?PHP } ?>>.php</option>
<option value="4"<?PHP if ($seo_link_extension_raw == '4') { ?> selected<?PHP } ?>>.asp</option>
</select></div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">Operating System</label>
<div class="col-md-4"><select class="form-control" name="seo_code_option">
<option value="1" <?PHP if ((isset($_POST['seo_code_option'])) && ($_POST['seo_code_option'] == '1')) { ?> selected <?PHP } ?>>Unix/Linux: Apache mod_rewrite</option>
<option value="2" <?PHP if ((isset($_POST['seo_code_option'])) && ($_POST['seo_code_option'] == '2')) { ?> selected <?PHP } ?>>Windows IIS: ISAPI rewrite</option>
</select></div>
</div>
<div class="form-group">
<label class="col-md-3 control-label">SEO Link Domain</label>
<div class="col-md-9"><input type="text" class="form-control" name="seo_url" <?PHP if (($seo_url == "http://") || ($seo_url == "https://") || ($seo_url == '')) { echo "value='https://'"; } else { echo "value='$seo_url'"; } ?>></div>
</div>
<div class="form-actions">
<input type="submit" value="Continue To Link Configuration" class="btn btn-primary">
</div>
<input type="hidden" name="action" value="19">
<input type="hidden" name="cfg" value="32.2">
<input type="hidden" name="tab" value="2">
</form>
<?PHP } ?>
</div>
</div>
</div>
</div>
<div class="tab-pane<?php makeActiveTab(4, 'no');?>" id="tab_1_4">
<?PHP
$seo_order_status = null;
if (function_exists("curl_init")) {
$useragent = "iDevAffiliate/8.0";
    $curl_handle=curl_init();
    if($curl_handle) {
        curl_setopt($curl_handle,CURLOPT_URL,'https://www.idevupdate.com/8/order_seo.php');
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	    curl_setopt($curl_handle, CURLOPT_USERAGENT, $useragent);
        $buffer = curl_exec($curl_handle);
       if (curl_getinfo($curl_handle, CURLINFO_HTTP_CODE) == 404) { ?>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-link"></i> Order Professional SEO Links Setup</h4></div>
<div class="widget-content">
The server could not be reached. Please try again later or contact technical support at <a href="https://www.idevsupport.com/" target="_blank">https://www.idevsupport.com/</a>.
</div>
</div>
</div>
<?PHP	   }
        else {
            curl_close($curl_handle);
            if (empty($buffer)) { echo "buffer not set"; }
            else {
                $data_line = explode("|", $buffer);
				if (isset($data_line[0])) { $seo_order_status = remote_incoming_data($data_line[0]); } else { $seo_order_status = null; }
                if (isset($data_line[1])) { $paypal_addr = remote_incoming_data($data_line[1]); } else { $paypal_addr = null; }
				if (isset($data_line[2])) { $paypal_amount = remote_incoming_data($data_line[2]); } else { $paypal_amount = null; }
                if (isset($data_line[3])) { $paypal_return = remote_incoming_data($data_line[3]); } else { $paypal_return = null; }								
                if (isset($data_line[4])) { $paypal_product_name = remote_incoming_data($data_line[4]); } else { $paypal_product_name = null; }				
		} } }
if ($seo_order_status == "enabled") {
?>
<?PHP if (!isset($seo_links_valid)) { ?>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-shopping-cart"></i> <font color="#CC0000">Step 1: </font>Order SEO Links Plugin</h4></div>
<div class="widget-content">
Please be sure to order the SEO Links plugin prior to ordering professional setup services.<br /><br />
<a href="https://www.idevdirect.com/idevaffiliate-seo-plugin.php" target="_blank" class="btn btn-primary">Purchase SEO Links Plugin</button></a>
</div>
</div>
</div>
<?PHP } ?>
<?PHP if (!isset($seo_links_valid)) {
$step_number_1 = "2";
$step_number_2 = "3";
} else {
$step_number_1 = "1";
$step_number_2 = "2";
}
?>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-shopping-cart"></i> <font color="#CC0000">Step <?PHP echo html_output($step_number_1); ?>: </font>Order Professional SEO Links Setup</h4></div>
<div class="widget-content">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" type="hidden" />
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="<?PHP echo $paypal_addr; ?>" />
<input type="hidden" name="amount" value="<?PHP echo $paypal_amount; ?>" />
<input type="hidden" name="item_name" value="<?PHP echo $paypal_product_name; ?>" />
<input type="hidden" name="return" value="<?PHP echo $paypal_return; ?>" />
<input type="hidden" name="notify_url" value="<?PHP echo $paypal_return; ?>" />
<input type="hidden" name="currency_code" value="USD" />
<!-- ............................................................... -->
<input type="hidden" name="custom" value="<?PHP echo $license; ?>" />
<input type="hidden" name="undefined_quantity" value="1" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="bn" value="PP-BuyNowBF" />
This service includes a website evaluation and setup of your affiliate links using the best SEO linking method possible.<br /><br />Price: $<?PHP echo html_output($paypal_amount); ?> USD<br /><br />
<button class="btn btn-danger">Order Professional Setup</button>
</form>
</div>
</div>
</div>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-file-alt"></i> <font color="#CC0000">Step <?PHP echo html_output($step_number_2); ?>: </font>Setup Request</h4></div>
<div class="widget-content">
<form action="https://www.idevdirect.com/install_seo.php" method="post" target="_blank">
<input name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" type="hidden" />
After you complete your purchase, you must complete the SEO Setup Request Form. Upon completion of the form, you will be put into the setup queue. SEO setups can usually take place same day, up to 24 hours and are completed Mon-Fri during normal business hours.<br /><br />
<button class="btn btn-warning">Complete SEO Setup Request Form</button>
<input type="hidden" name="license" value="<?PHP echo $license; ?>" />
</form>
</div>
</div>
</div>
<?PHP } elseif ($seo_order_status == "disabled") { ?>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-shopping-cart"></i> Order Professional SEO Links Setup</h4></div>
<div class="widget-content">
<div class="widgetcontent bordered nomargin">This service is temporarily unavailable.</font><br />Please contact technical support at <a href="https://www.idevsupport.com/" target="_blank">https://www.idevsupport.com/</a>.
</div>
</div>
</div>
</div>
<?PHP } } else { ?>
<div class="col-md-12">
<div class="widget box" style="margin-top:20px;">
<div class="widget-header"><h4><i class="icon-shopping-cart"></i> Order Professional SEO Links Setup</h4></div>
<div class="widget-content">
<font color="#CC0000">SEO Links Ordering Error</font><br />In order to use this feature, cURL must be enabled on your server. Please have your hosting provider enable cURL then reload this page again.
</div>
</div>
</div>
<?PHP } ?>
</div>
</div>
</div>