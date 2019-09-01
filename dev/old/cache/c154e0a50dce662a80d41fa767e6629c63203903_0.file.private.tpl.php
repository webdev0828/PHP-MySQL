<?php
/* Smarty version 3.1.30, created on 2019-04-03 06:51:19
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/private.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca42db7083422_57532532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c154e0a50dce662a80d41fa767e6629c63203903' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/private.tpl',
      1 => 1552994414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca42db7083422_57532532 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/dev/templates/smarty/plugins/modifier.replace.php';
?>


<!DOCTYPE html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['private_heading']->value;?>
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
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
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
"><i class="fa fa-user-circle-o fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_advertisers']->value;?>
</a></li>
                    <li><a href="/#statistics" title="<?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
"><i class="fa fa-bar-chart fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
</a></li>
                    <li><a href="/blog" title="<?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
"><i class="fa fa-newspaper fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
</a></li>
                <?php if (!isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li><a href="/login" title="<?php echo $_smarty_tpl->tpl_vars['custom_login']->value;?>
"><i class="fa fa-sign-in fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_login']->value;?>

                        </a></li>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li><a href="/dashboard" title="<?php echo $_smarty_tpl->tpl_vars['custom_dashboard']->value;?>
"><i
                                    class="fa fa-dashboard fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_dashboard']->value;?>
</a></li>
                <?php }?>
                <?php if (!isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li><a href="/signup" title="<?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
" style="color:#532B72;"><i
                                    class="fa fa-user-plus fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
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
                                    class="fa fa-sign-out fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_logout']->value;?>
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
                <h1 class="subhead"><?php echo $_smarty_tpl->tpl_vars['private_heading']->value;?>
</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow advertisers block-1-2 block-tab-full" data-aos="fade-up">

<div class="content-area col-lg-12 col-md-12 nopad">
    <div class="cnt">
        
        <div class="col-md-12">
            <div class="panel-group nopad">
                <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_5']->value;?>
;">
                    <div class="panel-heading">
                        <h4 class="panel-title" data-toggle="collapse" href="#contact" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_5_text']->value;?>
;">
                            <?php echo $_smarty_tpl->tpl_vars['private_required_heading']->value;?>

                        </h4>
                    </div>

                    <div id="contact" class="panel-collapse collapse in">
                        <?php if (isset($_smarty_tpl->tpl_vars['display_signup_errors']->value)) {?>
                        <div class="alert alert-danger">
                            <h4><?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>
</h4>

                            <?php echo $_smarty_tpl->tpl_vars['error_list']->value;?>

                        </div>
                        <?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['contact_email_received']->value)) {?>
                        <div class="alert alert-success"> 
                            <?php echo $_smarty_tpl->tpl_vars['contact_received_display']->value;?>
 
                        </div>
                        <?php }?>
                        
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['private_info']->value;?>

                        </p>

                        <br/>
                        
                        <form class="form-horizontal" role="form" method="post" action="/private">
                            
                            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-bg">
                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['private_code_title']->value;?>
" name="signup_code" value="<?php if (isset($_smarty_tpl->tpl_vars['signup_code']->value)) {
echo $_smarty_tpl->tpl_vars['signup_code']->value;
}?>"/>
                                        <i class="fa fa-lock fa fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>

                                <div class="col-sm-6">
                                    <input class="btn btn--primary btn--large" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['private_button']->value;?>
">
                                </div>
                            </div>

                            <input type="hidden" name="email_contact" value="1">
                            <input name="token_affiliate_private" value="<?php echo $_smarty_tpl->tpl_vars['private_token']->value;?>
" type="hidden">

                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<?php echo '<script'; ?>
 src="https://use.fontawesome.com/fc6a809c72.js"><?php echo '</script'; ?>
>
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
