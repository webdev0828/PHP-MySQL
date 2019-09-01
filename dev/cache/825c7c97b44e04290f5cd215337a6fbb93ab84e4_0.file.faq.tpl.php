<?php
/* Smarty version 3.1.30, created on 2019-04-09 07:08:05
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/faq.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cac44d5c06852_71589454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '825c7c97b44e04290f5cd215337a6fbb93ab84e4' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/faq.tpl',
      1 => 1554215505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac44d5c06852_71589454 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/dev/templates/smarty/plugins/modifier.replace.php';
?>


<!DOCTYPE html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['faq_page_title']->value;?>
</title>

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">

    <!-- Language direction CSS
    ================================================== -->
    <?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?>
        <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/css/style-rtl.css">
    <?php } else { ?>
        <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/css/style.css?=v<?php ob_start();
echo time();
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
">
    <?php }?>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- JS
    ================================================== -->
    <?php echo '<script'; ?>
 src="/js/modernizr.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/source/lightbox/js/video.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- Charts and graphs JS
    ================================================== -->
    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/raphael-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/morris.js"><?php echo '</script'; ?>
>
    
    
    <!-- Language variables for Datatables (Start) -->
    <?php echo '<script'; ?>
 type="text/javascript">
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
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#532B72">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#532B72">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#532B72">
</head>

<body style="background:<?php echo $_smarty_tpl->tpl_vars['background_color']->value;?>
;" id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- header
    ================================================== -->
    <header class="s-header">

<!-- end header-logo -->

        <nav class="header-nav">

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
                        <a href="#" onclick="document.getElementById('idev_language').value = '<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['value'];?>
'; document.getElementById('language_form').submit(); return false;"><img src="/images/lang_flags/<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'];?>
" class="lang_flag"/> <span><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'],'Russian','Русский');?>
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
                
                <ul class="header-nav__list">
                    <li><a href="/#home" title="<?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
"><i class="fa fa-home fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
</a></li>
                    <li><a href="/#publishers" title="<?php echo $_smarty_tpl->tpl_vars['custom_publishers']->value;?>
"><i class="fa fa-user-circle fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_publishers']->value;?>
</a></li>
                    <li><a href="/#advertisers" title="<?php echo $_smarty_tpl->tpl_vars['custom_advertisers']->value;?>
"><i class="far fa-user-circle fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_advertisers']->value;?>
</a></li>
                    <li><a href="/#statistics" title="<?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
"><i class="fas fa-chart-bar fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
</a></li>
                    <li><a href="/blog" title="<?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
"><i class="fa fa-newspaper fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
</a></li>
                <?php if (!isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li><a href="/login" title="<?php echo $_smarty_tpl->tpl_vars['custom_login']->value;?>
"><i class="fa fa-sign-in-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_login']->value;?>

                        </a></li>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li><a href="/dashboard" title="<?php echo $_smarty_tpl->tpl_vars['custom_dashboard']->value;?>
"><i
                                    class="fas fa-tachometer-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_dashboard']->value;?>
</a></li>
                <?php }?>
                <?php if (!isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li><a href="/signup" title="<?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
" style="color:#532B72;"><i
                                    class="fa fa-user-plus fa-fw" style="text-shadow: none !important;"></i> <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
</a></li>
                <?php }?>
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

    </header> <!-- end s-header -->

    <!-- services
    ================================================== -->
    <section id="publishers" class="s-publishers target-section">
<div class="corner-ribbon top-left sticky purple shadow"><?php echo $_smarty_tpl->tpl_vars['custom_closed_beta']->value;?>
</div>
            <div class="row" align="center">
 <a href="/"><img src="/images/logo_big.png" alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
"/></a>
            </div> <!-- end home-content__main -->

        <div class="row section-header bit-narrow" data-aos="fade-up" align="center">
            <div class="col-full">
                <h1 class="subhead"><?php echo $_smarty_tpl->tpl_vars['faq_page_title']->value;?>
</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow advertisers block-1-2 block-tab-full">

            <div class="col-full item-service" data-aos="fade-up">
                <div class="item-service__text">
                    <p>
    <div class="content-area col-lg-12 col-md-12 nopad">
        <div class="cnt">

            <?php if (isset($_smarty_tpl->tpl_vars['use_faq']->value) && ($_smarty_tpl->tpl_vars['faq_location']->value == 1)) {?>
            <div class="col-md-12">
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_one_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_one_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_two_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_two_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_three_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_three_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_four_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_four_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_five_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_five_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_six_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_six_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_seven_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_seven_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <div class="panel-group nopad" data-aos="fade-up">
                    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <h3 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['custom_faq_eight_q']->value;?>

                            </h3>
                        <div id="contact" class="panel-collapse collapse in">
                            <?php echo $_smarty_tpl->tpl_vars['custom_faq_eight_a']->value;?>

                        </div>
                    </div>
                </div>
                  <br/><br/>
                <?php } else { ?>
                <p class="well">
                    Our Frequently Asked Questions Are Not Made Public
                </p>
            </div>
            <?php }?>
        </div>
    </div>
                    </p>
                </div>
            </div>
        </div> <!-- end services -->

    </section> <!-- end s-advertisers -->

    <!-- footer
    ================================================== -->
    <footer>
        <div class="row">
<div class="addthis_relatedposts_inline"></div>
            <div class="col-full ss-copyright">
                <span><?php echo $_smarty_tpl->tpl_vars['footer_copyright']->value;?>
 <?php echo date("Y");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</a> - <?php echo $_smarty_tpl->tpl_vars['footer_rights']->value;?>
</span> 
                <span><?php if (isset($_smarty_tpl->tpl_vars['contact_link']->value)) {?> <a href="javascript:void(Tawk_API.toggle())" title="<?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
</a><?php }?></span>
                <span><?php if (isset($_smarty_tpl->tpl_vars['privacy_policy_public']->value)) {?> <a href="/privacy-policy"><?php echo $_smarty_tpl->tpl_vars['custom_privacy_policy']->value;?>
</a><?php }?></span>
            </div>
        </div>
        <div class="ss-go-top">
            <a class="smoothscroll" title="<?php echo $_smarty_tpl->tpl_vars['custom_back_to_top']->value;?>
" href="#top"><?php echo $_smarty_tpl->tpl_vars['custom_back_to_top']->value;?>
</a>
        </div>
    </footer>

<!-- Start Google Analytics -->
<?php echo $_smarty_tpl->tpl_vars['ga_footer']->value;?>

<!-- End Google Analytics -->

    <!-- Java Script
    ================================================== -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/plugins.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/main.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bcd66edbfeee9b3"><?php echo '</script'; ?>
>
<!--Start of Tawk.to Script-->
<?php echo '<script'; ?>
 type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be2a53a70ff5a5a3a7101d3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
<?php echo '</script'; ?>
>
<!--End of Tawk.to Script-->
</body>
</html>
<?php }
}
