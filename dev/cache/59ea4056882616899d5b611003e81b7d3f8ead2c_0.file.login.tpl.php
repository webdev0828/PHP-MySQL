<?php
/* Smarty version 3.1.30, created on 2019-04-08 06:08:11
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5caae54b1b94a1_76824147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59ea4056882616899d5b611003e81b7d3f8ead2c' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/login.tpl',
      1 => 1554216598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5caae54b1b94a1_76824147 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/dev/templates/smarty/plugins/modifier.replace.php';
?>


<!DOCTYPE html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['login_left_column_title']->value;?>
</title>

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">

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
                <h1 class="subhead"><?php echo $_smarty_tpl->tpl_vars['login_left_column_title']->value;?>
</h1>
                <div>
					<?php echo $_smarty_tpl->tpl_vars['login_left_column_text']->value;?>

				</div>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow advertisers block-1-2 block-tab-full">

            <div class="col-full item-service" data-aos="fade-up">
                <div class="item-service__text">
                    <p>
<section class="contact-area login-page">
    <div class="container">
        <div class="lp-main">

            <div class="content clearfix col-md-4 blue white-txt" id="welcome">
                <div class="login-block ">

                    <?php if (isset($_smarty_tpl->tpl_vars['login_invalid']->value) && !isset($_smarty_tpl->tpl_vars['lockout_engaged']->value)) {?>
                    <div class="row">
                        <div class="col-sm-12 portlets">
                            <div class="alert btn-danger" style="color:#532B72;">
                                <?php echo $_smarty_tpl->tpl_vars['fail_message']->value;?>

                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if (isset($_smarty_tpl->tpl_vars['login_details']->value)) {?>
                    <div class="row">
                        <div class="col-sm-12 portlets">
                            <div class="alert alert-info">
                                <?php echo $_smarty_tpl->tpl_vars['login_details']->value;?>

                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if (isset($_smarty_tpl->tpl_vars['lockout_engaged']->value)) {?>
                    <div class="row">
                        <div class="col-sm-12 portlets">
                            <div class="alert btn-danger" style="margin-bottom: 0;">
                                <?php echo $_smarty_tpl->tpl_vars['fail_message']->value;?>

                            </div>
                        </div>
                    </div>

                    <?php } else { ?>
                        <?php if (!isset($_smarty_tpl->tpl_vars['lost_password_request']->value)) {?>
                        <form role="form" method="POST" action="/login">
                            <div class="row">
                            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                            <input name="token_affiliate_login" value="<?php echo $_smarty_tpl->tpl_vars['login_token']->value;?>
" type="hidden" />


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-bg">
                                        <input type="text" class="form-control text-input" placeholder="<?php echo $_smarty_tpl->tpl_vars['login_username']->value;?>
" name="userid" />
                                        <i class="fa fa-user fa fw" aria-hidden="true" style="text-shadow: none !important;">&nbsp;</i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-bg">
                                <input class="form-control text-input" placeholder="<?php echo $_smarty_tpl->tpl_vars['login_password']->value;?>
" type="password" name="password" autocomplete="off">
                                        <i class="fa fa-key fa fw" aria-hidden="true" style="text-shadow: none !important;"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn--primary btn--large">
                                        <?php echo $_smarty_tpl->tpl_vars['login_now']->value;?>

                                    </button>
                                </div>
                                
                                <br />
                                <br />
                                <div class="col-sm-12">
                                    <a href="/signup">
                                        <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>

                                    </a>
                                </div>
                                <div class="col-sm-12 text-center ">
                                    <a href="/login/?lost_password=true" class=" wt-href">
                                        <?php echo $_smarty_tpl->tpl_vars['login_send_title']->value;?>

                                    </a>
                                </div>

                                
                                <?php if (isset($_smarty_tpl->tpl_vars['idev_facebook_enabled']->value)) {?>
                                <div class="col-sm-12" style="padding-top:20px; padding-bottom:20px; text-align:center;">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['fb_login_url']->value;?>
" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i> <?php echo $_smarty_tpl->tpl_vars['fb_login']->value;?>
</a>
                                </div>
                                <?php }?>
                            </div>
                        </form>
                        
                        <?php } else { ?>
                        
                        <form role="form" method="POST" action="/login">
                            
                            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                            <input name="token_affiliate_creds" value="<?php echo $_smarty_tpl->tpl_vars['send_pass_token']->value;?>
" type="hidden" />
                            <input name="lost_password" value="true" type="hidden" />
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-bg">
                                        <input type="text" class="form-control text-input" placeholder="<?php echo $_smarty_tpl->tpl_vars['login_send_username']->value;?>
" name="sendpass" />
                                        <i class="fa fa-user fa fw" aria-hidden="true" style="text-shadow: none !important;">&nbsp;</i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn--primary btn--large">
                                        <?php echo $_smarty_tpl->tpl_vars['login_send_pass']->value;?>

                                    </button>
                                </div>
                                <br />
                                <br />
                                <div class="col-sm-12">
                                    <a href="/signup" class="btn btn--primary btn--large">
                                        <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>

                                    </a>
                                </div>
                                <br />
                                <br />
                                <div class="col-sm-12">
                                    <a href="login" class="btn btn--primary btn--large">
                                        <?php echo $_smarty_tpl->tpl_vars['login_now']->value;?>

                                    </a>
                                </div>
                            </div>
                        </form>
                        <?php }?>
                    <?php }?>
                </div>
            </div>

        </div>
    </div>
</section>
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
