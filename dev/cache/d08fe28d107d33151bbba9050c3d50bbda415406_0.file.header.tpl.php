<?php
/* Smarty version 3.1.30, created on 2019-04-05 17:24:30
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca78f4e2fcc56_80421920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd08fe28d107d33151bbba9050c3d50bbda415406' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/header.tpl',
      1 => 1554485065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca78f4e2fcc56_80421920 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
?>

<!doctype html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['affiliate_username']->value;?>
 #<?php echo $_smarty_tpl->tpl_vars['affiliate_id']->value;?>
</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/dots.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/font-awesome-animation.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/main.css">
    <?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?>
        <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/style-rtl.css">
    <?php } else { ?>
        <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/style.css?=v<?php ob_start();
echo time();
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
">
    <?php }?>

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/sweetalert.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/modernizr.js"><?php echo '</script'; ?>
>

    <?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/common/js/buttons.colVis.min.js"><?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/datatables/tabletools/TableTools.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/datatables/colvis/ColVis.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/datatables/DT_bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/uniform/jquery.uniform.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>
    <?php }?>

    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/raphael-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/morris.js"><?php echo '</script'; ?>
>
    <link href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/select2.min.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"><?php echo '</script'; ?>
>
    <style>
        .select2-container--open .select2-dropdown--below{
            background-color: black;
        }
        .select2-search__field{
            color: black;
        }
        .select2-container--default .select2-selection--single{
            background-color: #1e1e1e;
            color: #fff;
            border-color: rgba(255, 255, 255, 0.1);
            padding: 0.3rem 1.2rem;
            border-radius: 4px;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            height: 34px;
        }
        select[style*="display: none"] + .select2 { display: none; }
    </style>
    
    <!-- Language variables for Datatables (Start) -->
    <?php echo '<script'; ?>
 type="text/javascript">
        var affid = "<?php echo $_smarty_tpl->tpl_vars['affiliate_id']->value;?>
";
        var langDataTable = {};
        langDataTable["sEmptyTable"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sEmptyTable'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sInfo"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sInfo'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sInfoEmpty"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sInfoEmpty'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sInfoFiltered"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sInfoFiltered'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sLengthMenu"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sLengthMenu'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sLoadingRecords"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sLoadingRecords'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sProcessing"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sProcessing'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sSearch"] = "";
        langDataTable["sZeroRecords"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sZeroRecords'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sFirst"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sFirst'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sLast"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sLast'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sNext"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sNext'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sPrevious"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sPrevious'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sSortAscending"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sSortAscending'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sSortDescending"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sSortDescending'], ENT_QUOTES, 'UTF-8', true);?>
";
    <?php echo '</script'; ?>
>
    
    <!-- Language variables for Datatables (End) -->

    <?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/common/js/dynamic_tables.js"><?php echo '</script'; ?>
>

    <!-- jsTree -->
    <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && $_smarty_tpl->tpl_vars['internal_page']->value == 2) {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/common/jstree/jstree.min.js"><?php echo '</script'; ?>
>
    <?php }?>
    	
	<!-- Date Range Picker -->
    <link rel="stylesheet" type="text/css" media="all" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/daterangepicker.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#532B72">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#532B72">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#532B72">
</head>
<body style="background:<?php echo $_smarty_tpl->tpl_vars['background_color']->value;?>
;" id="bsoverride">

<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-jump">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="home-content" id="top" style="display:block;" align="center">
    <div class="row home-content__main" style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;" align="center">
        <a href="/"><img src="/images/logo_big.svg" alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
" /></a>
    </div>
</div>
            <?php if ($_smarty_tpl->tpl_vars['internal_page']->value) {?>

<!-- header
================================================== -->
    <nav class="header-nav">
            <div class="profile-area clearfix">
                <div class="pf-imgs">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['picture_details']->value;?>
" />
                </div>
                <div class="pf-name">
                    <h4>
                        <i class="fa fa-user fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['affiliate_username']->value;?>

                    </h4>
                    <h4>
                        <i class="fa fa-link fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['affiliate_id']->value;?>

                    </h4>
                </div>
            </div>
        <a href="#0" class="header-nav__close" title="<?php echo $_smarty_tpl->tpl_vars['custom_close']->value;?>
"><span><?php echo $_smarty_tpl->tpl_vars['custom_close']->value;?>
</span></a>

        <h3><?php echo $_smarty_tpl->tpl_vars['custom_navigate_to']->value;?>
</h3>

        <div class="header-nav__content">

            <ul class="header-nav__social">
                <?php
$__section_nr_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['language_pack']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total != 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                    <li>
                        <a href="#"
                           onclick="document.getElementById('idev_language').value = '<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['value'];?>
'; document.getElementById('language_form').submit(); return false;"><img
                                    src="/images/lang_flags/<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'];?>
.png" width="22" height="16"
                                    alt="<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'];?>
" class="lang_flag"/>
                            <span><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'],'Russian','Русский');?>
</span></a>
                    </li>
                <?php
}
}
if ($__section_nr_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_0_saved;
}
?>
            </ul>
            <form id="language_form" method="POST" action="">

                <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                <input type="hidden" id="idev_language" name="idev_language" value=""/>
                <input name="lang_token" value="<?php echo $_smarty_tpl->tpl_vars['language_token']->value;?>
" type="hidden"/>

            </form>
            </ul>

            <ul class="header-nav__list">
                <li><a href="/" title="<?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
"><i
                                class="fa fa-home fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
</a></li>
                <li><a href="/dashboard" title="<?php echo $_smarty_tpl->tpl_vars['custom_dashboard']->value;?>
"><i class="fas fa-tachometer-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_dashboard']->value;?>
</a></li>
                <li><a href="/dashboard/statistics" title="<?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fas fa-chart-bar fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
</a></li>
        <li class="show">
            <a href="#" title="<?php echo $_smarty_tpl->tpl_vars['menu_heading_marketing']->value;?>
" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;" id="promo-tools"><i class="fas fa-wrench fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_heading_marketing']->value;?>
</a>

            <ul class="submenu list-categories" id="promo-tools-list">
                <?php if (isset($_smarty_tpl->tpl_vars['textlink_count']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/smartlinks" title="<?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'text_links')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-external-link-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['htmlcount']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/popunders" title="<?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'htmlads')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-undo fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['etemplates_count']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/backoffers" title="<?php echo $_smarty_tpl->tpl_vars['custom_backoffer']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'email_templates')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-arrow-circle-left fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_backoffer']->value;?>
</a>
                </li>
                <?php }?>
<!-- hide QR
                <?php if (isset($_smarty_tpl->tpl_vars['qr_codes_enabled']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/qr-codes" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'qr_codes')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-qrcode fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['qr_code_title']->value;?>
</a>
                </li>
                <?php }?>
-->
                <?php if (isset($_smarty_tpl->tpl_vars['banner_count']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/direct-offers" title="<?php echo $_smarty_tpl->tpl_vars['custom_offers']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'banners')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-cart-arrow-down fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_offers']->value;?>
</a>
                </li>
                <?php }?>
<!-- hide PP
                <?php if (isset($_smarty_tpl->tpl_vars['page_peel_count']->value)) {?>
                <li>
                    <a href="/account.php?page=37" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'peels')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-file-alt fa-fw"></i> TODO: <?php echo $_smarty_tpl->tpl_vars['menu_page_peels']->value;?>
???</a>
                </li>
                <?php }?>
-->
<!-- hide
                <?php if (isset($_smarty_tpl->tpl_vars['textad_count']->value)) {?>
                <li>
                    <a href="account.php?page=8" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'textads')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-window-restore fa-fw"></i>TODO: Smart Banners</a>
                </li>
                <?php }?>
-->
                <?php if (isset($_smarty_tpl->tpl_vars['coupon_codes_available']->value)) {?>
                <li>
                    <a href="account.php?page=44" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'coupons')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_coupon']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['videomarketing_count']->value)) {?>
                <li>
                    <a href="account.php?page=47" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'video_marketing')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_marketing_videos']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['announcement_count']->value)) {?>
                <li>
                    <a href="account.php?page=45" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'social_media')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_announcements']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['lightbox_count']->value)) {?>
                <li>
                    <a href="account.php?page=38" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'lightboxes')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_lightboxes']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['email_links_available']->value)) {?>
                <li>
                    <a href="account.php?page=10" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'email_links')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_email_links']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['offline_marketing']->value)) {?>
                <li>
                    <a href="account.php?page=11" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'offline')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_offline']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pdf_marketing_count']->value)) {?>
                <li>
                    <a href="account.php?page=24" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'pdf_marketing')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_pdf_marketing']->value;?>
</a>
                </li>
                <?php }?>
            </ul>
        </li>
        <li class="show">
            <a href="#" title="<?php echo $_smarty_tpl->tpl_vars['custom_sts_postback']->value;?>
" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;" id="s2s-postback"><i class="fas fa-server fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_sts_postback']->value;?>
</a>
            <ul class="submenu list-categories" id="s2s-postback-list">
                <li>
                    <a href="/dashboard/postback/settings" title="<?php echo $_smarty_tpl->tpl_vars['custom_postback_settings']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'postbacks_settings')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-sliders-h fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_settings']->value;?>
</a>
                </li>
                <li>
                    <a href="/dashboard/postback/logs" title="<?php echo $_smarty_tpl->tpl_vars['custom_postback_logs']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'postbacks_logs')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-history fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_logs']->value;?>
</a>
                </li>
            </ul>
        </li>
    <li class="show">
            <a href="#" title="<?php echo $_smarty_tpl->tpl_vars['header_accountLink']->value;?>
" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;" id="manage-account"><i class="fas fa-user fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_accountLink']->value;?>
</a>
                    <ul class="submenu list-categories" id="manage-account-list">
                        <li>
                            <a href="/dashboard/manage-account/edit-account" title="<?php echo $_smarty_tpl->tpl_vars['menu_drop_edit']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && ($_smarty_tpl->tpl_vars['internal_page']->value == '17')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-edit fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_edit']->value;?>
</a>
                        </li>
<!-- TODO: peyment settings like on signup page
                        <li>
                            <a href="account.php?page=48"><i class="fas fa-angle-right fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['payment_settings']->value;?>
</a>
                        </li>
-->
                        <li>
                            <a href="/dashboard/manage-account/change-password" title="<?php echo $_smarty_tpl->tpl_vars['menu_drop_password']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && ($_smarty_tpl->tpl_vars['internal_page']->value == '18')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-key fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_password']->value;?>
</a>
                        </li>
                        <?php if (isset($_smarty_tpl->tpl_vars['change_commission']->value)) {?>
                        <li>
                            <a href="account.php?page=19"><i class="fas fa-angle-right fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_change']->value;?>
</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['pic_upload']->value)) {?>
                        <li>
                            <a href="/dashboard/manage-account/upload-picture" title="<?php echo $_smarty_tpl->tpl_vars['menu_upload_picture']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && ($_smarty_tpl->tpl_vars['internal_page']->value == '43')) {?> class="active"<?php }?>><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-camera fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_upload_picture']->value;?>
</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['logos_enabled']->value)) {?>
                        <li>
                            <a href="account.php?page=27"><i class="fas fa-angle-right fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_logo']->value;?>
</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['use_faq']->value) && ($_smarty_tpl->tpl_vars['faq_location']->value == 2)) {?>
                            
                            <li>
                                <a href="account.php?page=21"><i class="fas fa-angle-right fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_faq']->value;?>
</a>
                            </li>
                        <?php }?>
<!-- hide testies
                        <?php if (isset($_smarty_tpl->tpl_vars['testimonials']->value)) {?>
                        
                            <li>
                                <a href="account.php?page=41"><i class="fas fa-angle-right fa-fw"></i><i class="fas fa-comments fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_offer_testi']->value;?>
</a>
                            </li>
                        <?php }?>
-->
                    </ul>
        <li <?php if ($_smarty_tpl->tpl_vars['internal_page']->value == 3) {?> title="<?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_history']->value;?>
" class="active"<?php }?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="/dashboard/payment-history" title="<?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_history']->value;?>
" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fas fa-euro fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_history']->value;?>
</a>
        </li>
                <?php if (isset($_smarty_tpl->tpl_vars['second_tier']->value)) {?>
                <li>
                    <a href="/dashboard/referrals" title="<?php echo $_smarty_tpl->tpl_vars['custom_referrals']->value;?>
"><i class="fas fa-share-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_referrals']->value;?>
</a>
                </li>
                <?php }?>
    </li>
                <li>
                    <a href="/blog" title="<?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
"><i class="fas fa-newspaper fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
</a>
                </li>
                <?php if (isset($_smarty_tpl->tpl_vars['use_faq']->value) && ($_smarty_tpl->tpl_vars['faq_location']->value == 1)) {?>
                    <li><a href="/faq" title="<?php echo $_smarty_tpl->tpl_vars['menu_faq']->value;?>
"><i class="fa fa-question-circle fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_faq']->value;?>

                        </a></li>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['contact_form']->value)) {?>
                    <li><a href="javascript:void(Tawk_API.toggle())" title="<?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
"><i
                                    class="fa fa-envelope fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
</a></li>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li>
                        <a href="/logout" title="<?php echo $_smarty_tpl->tpl_vars['menu_logout']->value;?>
"><i
                                    class="fas fa-sign-out-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_logout']->value;?>
</a>
                    </li>
                <?php }?>
            </ul>

<div class="addthis_inline_follow_toolbox addthisfloats"></div>

        </div> <!-- end header-nav__content -->

    </nav> <!-- end header-nav -->

    <a class="header-menu-toggle" href="#0">
        <span class="header-menu-icon"></span>
    </a>

            <?php }?>
    </div>
</div>

<div class="clearfix"></div>
<?php echo '<script'; ?>
>
$(function() {
$( "#promo-tools" ).click(function() {
$( "#promo-tools-list" ).slideToggle('slow');
});
$( "#manage-account" ).click(function() {
$( "#manage-account-list" ).slideToggle('slow');
});
$( "#s2s-postback" ).click(function() {
$( "#s2s-postback-list" ).slideToggle('slow');
});
});
<?php echo '</script'; ?>
><?php }
}
