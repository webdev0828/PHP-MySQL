<?php
/* Smarty version 3.1.30, created on 2019-03-19 13:07:38
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c90cd7a9118c2_99130080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86006cd9d412860bff40ef9c28c88e7184d5829c' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup.tpl',
      1 => 1552993655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:signup_facebook.tpl' => 1,
    'file:signup_payment_choices.tpl' => 1,
    'file:signup_payment_methods.tpl' => 1,
    'file:signup_custom.tpl' => 1,
    'file:signup_terms.tpl' => 1,
    'file:signup_privacy.tpl' => 1,
    'file:signup_canspam.tpl' => 1,
    'file:signup_security_code.tpl' => 1,
  ),
),false)) {
function content_5c90cd7a9118c2_99130080 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
?>


<!DOCTYPE html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['signup_login_title']->value;?>
</title>

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/checkboxes.css">

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
                <h1 class="subhead"><?php echo $_smarty_tpl->tpl_vars['signup_left_column_title']->value;?>
</h1>
                <div>
		<?php echo $_smarty_tpl->tpl_vars['signup_left_column_text']->value;?>

		</div>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow advertisers block-1-2 block-tab-full">

            <div class="col-full item-service" data-aos="fade-up">
                <div class="item-service__text">
                    <p>
<div class="content-area col-lg-12 col-md-12 nopad">
    <div class="cnt">
        <div class="highlight clearfix">
            <div class="col-md-12">
                <div class="portlet portlet-basic">
                    <div class="portlet-body">

                        <?php if (isset($_smarty_tpl->tpl_vars['maintenance_mode']->value)) {?>
                        <div class="row">
                            <div class="col-md-12" style="margin-top:25px;">
                                <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_5']->value;?>
;">
                                            <h3 class="subhead">
                                                <?php echo $_smarty_tpl->tpl_vars['signup_maintenance_heading']->value;?>

                                            </h3>

                                    <div class="portlet-body">
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['signup_maintenance_info']->value;?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } else { ?>
<!-- hide duplicate
                        <div class="page-header title">
                            <h1 class="subhead">
                                <?php echo $_smarty_tpl->tpl_vars['signup_left_column_title']->value;?>

                            </h1>
                        </div>
-->
                        <?php if (isset($_smarty_tpl->tpl_vars['signup_complete']->value)) {?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_6']->value;?>
;">
                                            <h3 class="subhead">
                                                <?php echo $_smarty_tpl->tpl_vars['signup_page_success']->value;?>

                                            </h3>

                                    <div class="portlet-body">
                                        <div class="alert alert-success">
                                            <?php echo $_smarty_tpl->tpl_vars['signup_success_email_comment']->value;?>

                                        </div>
                                        
                                        <a href="/dashboard" class="btn btn--primary btn--large"><?php echo $_smarty_tpl->tpl_vars['signup_success_login_link']->value;?>
</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
<!-- Start Google Analytics -->
<?php echo $_smarty_tpl->tpl_vars['ga_signup']->value;?>

<!-- End Google Analytics -->
                                
                        <?php } else { ?>
                        <?php if (isset($_smarty_tpl->tpl_vars['display_signup_errors']->value)) {?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_5']->value;?>
;">
                                            <h3 class="subhead">
                                                <?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>

                                            </h3>

                                    <div class="portlet-body">
                                        <div class="alert alert-danger">
                                            <?php echo $_smarty_tpl->tpl_vars['error_list']->value;?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?> 
<!-- hide duplicate text
                        <?php if (!isset($_smarty_tpl->tpl_vars['signup_complete']->value) && !isset($_smarty_tpl->tpl_vars['display_signup_errors']->value)) {?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet portlet-basic">
                                    <div class="portlet-body">
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['signup_left_column_text']->value;?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?> 
-->
                        <?php if (isset($_smarty_tpl->tpl_vars['idev_facebook_enabled']->value) && !isset($_smarty_tpl->tpl_vars['display_signup_errors']->value)) {?> 
                            <?php $_smarty_tpl->_subTemplateRender("file:signup_facebook.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
                        <?php }?>

                        <?php if (!isset($_smarty_tpl->tpl_vars['idev_facebook_required']->value)) {?>
                            <form class="form-horizontal" action="/signup" method="POST" id="signup_form">
                                
                                <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                                <input type="hidden" value="1" name="submit1"/>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                                                    <h3 class="subhead">
                                                        <?php echo $_smarty_tpl->tpl_vars['signup_login_title']->value;?>

                                                    </h3>

                                            <div class="portlet-body">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                            <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_login_username']->value;?>
" name="username" value="<?php if (isset($_smarty_tpl->tpl_vars['postuser']->value)) {
echo $_smarty_tpl->tpl_vars['postuser']->value;
}?>" tabindex="1"/>
                                                            <i class="fa fa-user fa fw" aria-hidden="true">&nbsp;</i>
<!-- hide modals
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button" data-target="#modal-1" data-toggle="modal">
                                                                    <i class="fa fa-question-circle"></i>
                                                                </button>
                                                            </span>
-->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                            <input type="password" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_login_password']->value;?>
" name="password" value="<?php if (isset($_smarty_tpl->tpl_vars['postpass']->value)) {
echo $_smarty_tpl->tpl_vars['postpass']->value;
}?>" tabindex="2" autocomplete="off"/>
                                                            <i class="fa fa-key fa fw" aria-hidden="true"></i>
<!-- hide modals
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button" data-target="#modal-1" data-toggle="modal">
                                                                    <i class="fa fa-question-circle"></i>
                                                                </button>
                                                            </span>
-->
                                                        </div>
                                                    </div>
                                                </div>
<!-- hide modals
                                                <div class="modal fade" id="modal-1" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>
">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>

                                                                <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['signup_login_username']->value;?>
& <?php echo $_smarty_tpl->tpl_vars['signup_login_password']->value;?>
</h3>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p>
                                                                    <?php echo $_smarty_tpl->tpl_vars['signup_login_minmax_chars']->value;?>

                                                                </p>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                    <?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
-->
                                                <div class="form-group">                                                    
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                            <input type="password" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_login_password_again']->value;?>
" name="password_c" value="<?php echo $_smarty_tpl->tpl_vars['postpasc']->value;?>
" tabindex="3" autocomplete="off"/>
                                                            <i class="fa fa-key fa fw" aria-hidden="true"></i>
<!-- hide modals
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button" data-target="#modal-2" data-toggle="modal">
                                                                    <i class="fa fa-question-circle"></i>
                                                                </button>
                                                            </span>
-->
                                                        </div>
                                                    </div>
                                                </div>
<!-- hide modals
                                                <div class="modal fade" id="modal-2" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>
">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                
                                                                <h4 class="modal-title">
                                                                    <?php echo $_smarty_tpl->tpl_vars['signup_login_password_again']->value;?>

                                                                </h3>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p>
                                                                    <?php echo $_smarty_tpl->tpl_vars['signup_login_must_match']->value;?>

                                                                </p>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                    <?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if (isset($_smarty_tpl->tpl_vars['optionals_used']->value)) {?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                                                        <h3 class="subhead">
                                                            <?php echo $_smarty_tpl->tpl_vars['signup_standard_title']->value;?>

                                                        </h3>

                                                <div class="portlet-body">
                                                    <?php if (isset($_smarty_tpl->tpl_vars['row_email']->value)) {?>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-bg">
                                                                    <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_standard_email']->value;?>
" name="email" value="<?php echo $_smarty_tpl->tpl_vars['postemail']->value;?>
" tabindex="4"/>
                                                                    <i class="fa fa-at fa fw" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?> 

                                                    <?php if (isset($_smarty_tpl->tpl_vars['row_company']->value)) {?>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-bg"><input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_standard_company']->value;?>
" name="company" value="<?php echo $_smarty_tpl->tpl_vars['postcompany']->value;?>
" tabindex="5"/>
                                                                <i class="fa fa-building fa fw" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?> 

                                                    <?php if (isset($_smarty_tpl->tpl_vars['row_checks']->value)) {?>
                                                        <div class="form-group">
                                                            <label style="width:300px;" class="col-md-3 control-label"><?php echo $_smarty_tpl->tpl_vars['signup_standard_checkspayable']->value;?>

                                                                <?php if (isset($_smarty_tpl->tpl_vars['required_notice_checkspayable']->value)) {?>
                                                                    <span style="color:#532B72;">*</span>
                                                                <?php }?>
                                                            </label>

                                                            <div class="col-md-6"><input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_standard_checkspayable']->value;?>
" name="payable" value="<?php echo $_smarty_tpl->tpl_vars['postchecks']->value;?>
" tabindex="6"/></div>
                                                        </div>
                                                    <?php }?> 

                                                    <?php if (isset($_smarty_tpl->tpl_vars['row_website']->value)) {?>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-bg">
                                                                <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_standard_weburl']->value;?>
" name="url" value="" tabindex="7"/>
                                                                <i class="fa fa-link fa fw" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?> 

                                                    <?php if (isset($_smarty_tpl->tpl_vars['row_taxinfo']->value)) {?>
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-bg">
                                                                    <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_standard_taxinfo']->value;?>
" name="tax_id_ssn" value="<?php echo $_smarty_tpl->tpl_vars['posttax']->value;?>
" tabindex="8"/>
                                                                <i class="fa fa-id-card fa fw" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?> 

                                <?php if (isset($_smarty_tpl->tpl_vars['standards_used']->value)) {?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                                                    <h3 class="subhead">
                                                        <?php echo $_smarty_tpl->tpl_vars['signup_personal_title']->value;?>

                                                    </h3>

                                            <div class="portlet-body">
                                                <?php if (isset($_smarty_tpl->tpl_vars['row_fname']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_fname']->value;?>
" name="f_name" value="<?php echo $_smarty_tpl->tpl_vars['postfname']->value;?>
" tabindex="9"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_lname']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_lname']->value;?>
" name="l_name" value="<?php echo $_smarty_tpl->tpl_vars['postlname']->value;?>
" tabindex="10"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_addr1']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_addr1']->value;?>
" name="address_one" value="<?php echo $_smarty_tpl->tpl_vars['postaddr1']->value;?>
" tabindex="11"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_addr2']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_addr2']->value;?>
" name="address_two" value="<?php echo $_smarty_tpl->tpl_vars['postaddr2']->value;?>
" tabindex="12"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_city']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_city']->value;?>
" name="city" value="<?php echo $_smarty_tpl->tpl_vars['postcity']->value;?>
" tabindex="13"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_state']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_state']->value;?>
" name="state" value="<?php echo $_smarty_tpl->tpl_vars['poststate']->value;?>
" tabindex="14"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_phone']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_phone']->value;?>
" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['postphone']->value;?>
" tabindex="15"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_fax']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_fax']->value;?>
" name="fax" value="<?php echo $_smarty_tpl->tpl_vars['postfaxnm']->value;?>
" tabindex="16"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?> 

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_zip']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <input type="text" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['signup_personal_zip']->value;?>
" name="zip" value="<?php echo $_smarty_tpl->tpl_vars['postzip']->value;?>
" tabindex="17"/>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?>

                                                <?php if (isset($_smarty_tpl->tpl_vars['row_countries']->value)) {?>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                        <div class="input-group input-group-bg">
                                                        <select class="form-control" name="country"> <?php echo $_smarty_tpl->tpl_vars['c_drop']->value;?>
 </select>
                                                        <i class="fa fa-address-card fa fw" aria-hidden="true"></i>
                                                        </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>

                                <?php if (isset($_smarty_tpl->tpl_vars['payment_choice_used']->value)) {?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:signup_payment_choices.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                <?php }?>

                            


                                <?php $_smarty_tpl->_subTemplateRender("file:signup_payment_methods.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                <?php if (isset($_smarty_tpl->tpl_vars['insert_custom_fields']->value)) {?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:signup_custom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                <?php }?>                         
                                <?php if (isset($_smarty_tpl->tpl_vars['terms_conditions']->value)) {?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:signup_terms.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                <?php }?>
                                
                                <?php if (isset($_smarty_tpl->tpl_vars['privacy_signup']->value)) {?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:signup_privacy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                <?php }?>
                                
                                <?php if (isset($_smarty_tpl->tpl_vars['canspam_conditions']->value)) {?>
                                    <?php $_smarty_tpl->_subTemplateRender("file:signup_canspam.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                <?php }?>

                                <?php if (isset($_smarty_tpl->tpl_vars['security_required']->value)) {?>
                                    <?php if ($_smarty_tpl->tpl_vars['security_required']->value) {?>
                                        <?php $_smarty_tpl->_subTemplateRender("file:signup_security_code.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                    <?php }?>
                                <?php }?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-body">
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                            <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[0]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_how_did_you_hear_about_us']->value;?>
" />
                            <i class="fa fa-question fa fw" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn--primary btn--large">
                                            <?php echo $_smarty_tpl->tpl_vars['signup_page_button']->value;?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                                <div class="space-30"></div>

                            <?php }?>
                            </form>
                            <?php }?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
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
