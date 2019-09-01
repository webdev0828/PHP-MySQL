<?php
/* Smarty version 3.1.30, created on 2019-04-09 10:30:55
  from "/var/www/sublimerevenue.com/dev/old/templates/themes/SublimeRevenue/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cac745f248b01_64758662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28ef6fee8985c9ebe06bbacde53ef8fc4fb088c2' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/old/templates/themes/SublimeRevenue/index.tpl',
      1 => 1553534452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac745f248b01_64758662 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/dev/old/templates/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_counter')) require_once '/var/www/sublimerevenue.com/dev/old/templates/smarty/plugins/function.counter.php';
if (!is_callable('smarty_function_math')) require_once '/var/www/sublimerevenue.com/dev/old/templates/smarty/plugins/function.math.php';
?>


<!DOCTYPE html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
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

    <!-- Charts and graphs JS
    ================================================== -->
    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/raphael-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/morris.js"><?php echo '</script'; ?>
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

    <div class="clearfix"></div>
    <div class="content-area col-lg-12 col-md-12 nopad">
        <div class="cnt">
            <?php if (isset($_smarty_tpl->tpl_vars['logout_msg']->value)) {?>
                <div class="row">
                    <div class="col-md-12" style="margin-top:30px;margin-left:30px;">
                        <div class="alert-box alert-box--info hideit">
                            <?php echo $_smarty_tpl->tpl_vars['logout_msg']->value;?>

                    <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            <?php }?>

            <div class="highlight clearfix">
            </div>
        </div>
    </div>

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

            <ul class="header-nav__list">
                <li><a class="smoothscroll" href="#home" title="<?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
"><i
                                class="fa fa-home fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
</a></li>
                <li><a class="smoothscroll" href="#publishers" title="<?php echo $_smarty_tpl->tpl_vars['custom_publishers']->value;?>
"><i
                                class="fa fa-user-circle fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_publishers']->value;?>
</a></li>
                <li><a class="smoothscroll" href="#advertisers" title="<?php echo $_smarty_tpl->tpl_vars['custom_advertisers']->value;?>
"><i
                                class="fa fa-user-circle-o fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_advertisers']->value;?>
</a></li>
                <li><a class="smoothscroll" href="#statistics" title="<?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
"><i
                                class="fa fa-bar-chart fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
</a></li>
                <li><a href="/blog" title="<?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
"><i
                                class="fa fa-newspaper fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
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

<!-- home
================================================== -->
<div class="wrapper">
<section id="home" class="s-home page-hero target-section" data-parallax="scroll">
    <div class="corner-ribbon top-left sticky purple shadow"><?php echo $_smarty_tpl->tpl_vars['custom_closed_beta']->value;?>
</div>

    <div class="grid-overlay">
        <div>
        </div>
    </div>
    <div class="sliding-background">
    </div>
    <div class="home-content">
        <div class="row home-content__main">
            <a href="/"><img src="/images/logo_big.svg" width="735" height="86" alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
"/></a>
            <h1>
                Developer Version
            </h1>

            <h3>
                <?php echo $_smarty_tpl->tpl_vars['custom_we_build_brands']->value;?>
 <span class="flicker-1"><?php echo $_smarty_tpl->tpl_vars['custom_globally']->value;?>
</span>
            </h3>
            
            <div class="home-content__button">
                <a href="/signup" class="btn btn--primary btn--large">
                    <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>

                </a>
                <a href="#publishers" class="smoothscroll btn btn--large">
                    <?php echo $_smarty_tpl->tpl_vars['custom_more_about_us']->value;?>

                </a>
            </div>

        </div> <!-- end home-content__main -->

<div class="addthis_inline_follow_toolbox" style="margin:3.6rem;width:0%;bottom:0.6rem;position:absolute;"></div>

        <div class="home-content__scroll">
            <a href="#publishers" class="scroll-link smoothscroll">
                <?php echo $_smarty_tpl->tpl_vars['custom_scroll']->value;?>

            </a>
        </div>
    </div> <!-- end home-content -->


</section> <!-- end s-home -->

</div>
<!-- about
================================================== -->
<section id="publishers" class="s-publishers target-section">

    <div class="row section-header bit-narrow" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead"><?php echo $_smarty_tpl->tpl_vars['custom_publishers']->value;?>
</h3>
            <h1 class="display-1">
                <?php echo $_smarty_tpl->tpl_vars['custom_sublime_revenue_is']->value;?>

            </h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row bit-narrow" data-aos="fade-up">
        <div class="col-full">
            <p class="lead">
                <?php echo $_smarty_tpl->tpl_vars['custom_we_design']->value;?>

            </p>
        </div>
    </div> <!-- end about-desc -->

    <div class="row bit-narrow">

        <div class="about-process process block-1-2 block-tab-full">

            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h4 class="item-title"><?php echo $_smarty_tpl->tpl_vars['index_heading_1']->value;?>
</h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['index_paragraph_1']->value;?>

                    </p>
                </div>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h4 class="item-title"><?php echo $_smarty_tpl->tpl_vars['index_heading_2']->value;?>
</h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['index_paragraph_2']->value;?>

                    </p>
                </div>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h4 class="item-title"><?php echo $_smarty_tpl->tpl_vars['index_table_title']->value;?>
</h4>
                    <p>
                    <table>
                        <tbody>
                        <?php if (isset($_smarty_tpl->tpl_vars['details_show_type']->value)) {?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['index_table_commission_type']->value;?>
</td>
                                <td><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['commission_type_info']->value,'65%','16.25%');?>
, 1-click, 2-click, SMS/MO, Pin Submit, CC-submit, PPL (SOI, DOI), PPS, PPI, COD...</td>
                            </tr>
                            
                            <?php if (isset($_smarty_tpl->tpl_vars['choose_percentage_payout']->value)) {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['index_table_sale']->value;?>
:</td>
                                    <td>
                                        <div class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['bot1']->value;?>
%</div>
                                        <?php echo $_smarty_tpl->tpl_vars['index_table_sale_text']->value;?>

                                    </td>
                                </tr>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['choose_flatrate_payout']->value)) {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['index_table_sale']->value;?>
:</td>
                                    <td>
                                        <div class="label label-danger"><?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['bot2']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</div>
                                        <?php echo $_smarty_tpl->tpl_vars['index_table_sale_text']->value;?>

                                    </td>
                                </tr>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['choose_perclick_payout']->value)) {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['index_table_click']->value;?>
:</td>
                                    <td>
                                        <div class="label label-danger"><?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['bot3']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</div>
                                        <?php echo $_smarty_tpl->tpl_vars['index_table_click_text']->value;?>

                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['details_show_signup']->value)) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['add_balance_row']->value)) {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['index_table_initial_deposit']->value;?>
</td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['init_deposit']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                        - <font color="#CC0000"><b><?php echo $_smarty_tpl->tpl_vars['index_table_deposit_tag']->value;?>
</b></font></td>
                                </tr>
                            <?php }?>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['details_show_requirements']->value)) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['add_requirements_row']->value)) {?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['index_table_requirements']->value;?>
</td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['init_req']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                        - <?php echo $_smarty_tpl->tpl_vars['index_table_requirements_tag']->value;?>
</td>
                                </tr>
                            <?php }?>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['details_show_duration']->value)) {?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['index_table_duration']->value;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['index_table_duration_tag']->value;?>
</td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                    </p>
                </div>
            </div>
            <div class="col-block item-process" data-aos="fade-up">
                <div class="item-process__text">
                    <h4 class="item-title"><?php echo $_smarty_tpl->tpl_vars['index_heading_3']->value;?>
</h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['index_paragraph_3']->value;?>

                    </p>
                    <h4 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_heading_four']->value;?>
!</h4>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['custom_paragraph_four']->value;?>

                    </p>
                    <div class="home-content__button">
                        <a href="/signup" class="btn btn--primary btn--large heartbeat" style="width:25.5rem;">
                            <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>

                        </a>
                        <a href="#statistics" class="smoothscroll btn btn btn--large" style="width:25.5rem;">
                            <?php echo $_smarty_tpl->tpl_vars['custom_show_me_more']->value;?>

                        </a>
                    </div>
                </div>
            </div>

        </div> <!-- end process -->

    </div> <!-- end row -->

</section> <!-- end s-publishers -->


<!-- services
================================================== -->
<section id="advertisers" class="s-advertisers target-section darker">

    <div class="row section-header bit-narrow" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead"><?php echo $_smarty_tpl->tpl_vars['custom_advertisers']->value;?>
</h3>
            <h1 class="display-1">
                <?php echo $_smarty_tpl->tpl_vars['custom_our_services_are']->value;?>

            </h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row bit-narrow" data-aos="fade-up">
        <div class="col-full">
            <p class="lead">
                <?php echo $_smarty_tpl->tpl_vars['custom_we_bring']->value;?>

            </p>
        </div>
    </div> <!-- end services-desc -->

    <div class="row bit-narrow advertisers block-1-2 block-tab-full">

        <div class="col-block item-service" data-aos="fade-up">
            <div class="item-service__icon">
                <i class="fa fa-star fa fw" style="color:#532B72;"></i>
            </div>
            <div class="item-service__text">
                <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_brand_identity']->value;?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['custom_we_can']->value;?>

                </p>
            </div>
        </div>

        <div class="col-block item-service" data-aos="fade-up">
            <div class="item-service__icon">
                <i class="fa fa-code fa fw" style="color:#532B72;"></i>
            </div>
            <div class="item-service__text">
                <h3 class="item-title"> <?php echo $_smarty_tpl->tpl_vars['custom_integration']->value;?>
</h3>
                <p><?php echo $_smarty_tpl->tpl_vars['custom_do_you_own']->value;?>

                </p>
            </div>
        </div>
        <div class="col-full" data-aos="fade-up">
            <div class="home-content__button">
                <a href="javascript:void(Tawk_API.toggle())" class="btn btn--primary btn--large heartbeat" style="width:25.5rem;">
                    <?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>

                </a>
                <a href="#statistics" class="smoothscroll btn btn btn--large" style="width:25.5rem;">
                    <?php echo $_smarty_tpl->tpl_vars['custom_show_me_more']->value;?>

                </a>
            </div>
        </div>
    </div> <!-- end services -->

</section> <!-- end s-advertisers -->


<!-- works
================================================== -->
<section id="statistics" class="s-statistics target-section">

    <div class="row section-header has-bottom-sep narrow target-section" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead"><?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
</h3>
            <h1 class="display-1">
                <?php echo $_smarty_tpl->tpl_vars['custom_we_create']->value;?>

            </h1>
        </div>

    </div> <!-- end section-header -->
    <?php if (isset($_smarty_tpl->tpl_vars['bar_comms_last_6']->value) || isset($_smarty_tpl->tpl_vars['pie_top_5_month']->value)) {?>
        <div class="row bit-narrow advertisers block-1-2 block-tab-full">

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="fa fa-calendar fa fw" style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_top_rpm_last_six_months']->value;?>
</h3>
                    <p>
                    <ul class="stats-tabs">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c_epc_l6m']->value, 'top');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['top']->value) {
?>
                            <?php smarty_function_counter(array('name'=>'l6mrpm','assign'=>'i'),$_smarty_tpl);?>

                            <li><a href="#0"><?php echo sprintf("%.4f",$_smarty_tpl->tpl_vars['top']->value["v"]);?>
 €<em>#<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
: <b><?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
</b>
                                        <img border="0" src="/images/geo_flags/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['top']->value["n"], 'UTF-8');?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
" class="geo_flag"/></em></a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                <ul class="skill-bars">
                    <li><?php ob_start();
echo smarty_modifier_replace(sprintf("%.2f",$_smarty_tpl->tpl_vars['all_epc']->value),'0.','');
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('round1', $_prefixVariable1);
?>
                    <div class="progress percent<?php ob_start();
echo $_smarty_tpl->tpl_vars['round1']->value;
$_prefixVariable2=ob_get_clean();
ob_start();
echo smarty_function_math(array('equation'=>"round( x / y ) * y",'x'=>$_prefixVariable2,'y'=>5),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
if ($_prefixVariable3 == 0) {?>5<?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['round1']->value;
$_prefixVariable4=ob_get_clean();
echo smarty_function_math(array('equation'=>"round( x / y ) * y",'x'=>$_prefixVariable4,'y'=>5),$_smarty_tpl);
}?>"><span><?php echo sprintf("%.4f",$_smarty_tpl->tpl_vars['all_epc']->value);?>
 €</span></div>
                    <strong><i class="fa fa-globe fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_global']->value;?>
</strong> 
                    </li>
                </ul>
                <!--
                <div class="last-updated"> 
                <?php echo $_smarty_tpl->tpl_vars['custom_last_updated']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['c_epc_l6m_t']->value;?>

                </div>
                -->
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                        <i class="fa fa-calendar-check fa fw " style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_top_rpm_this_month']->value;?>
</h3>
                    <p>
                    <ul class="stats-tabs">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c_epc_tm']->value, 'top');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['top']->value) {
?>
                            <?php smarty_function_counter(array('name'=>'tmrpm','assign'=>'i'),$_smarty_tpl);?>

                            <li><a href="#0"><?php echo sprintf("%.4f",$_smarty_tpl->tpl_vars['top']->value["v"]);?>
 €<em>#<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
: <b><?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
</b>
                                        <img border="0" src="/images/geo_flags/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['top']->value["n"], 'UTF-8');?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
" class="geo_flag"/></em></a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                <ul class="skill-bars">
                    <li><?php ob_start();
echo smarty_modifier_replace(sprintf("%.2f",$_smarty_tpl->tpl_vars['tm_all_epc']->value),'0.','');
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('round2', $_prefixVariable5);
?>
                    <div class="progress percent<?php ob_start();
echo $_smarty_tpl->tpl_vars['round2']->value;
$_prefixVariable6=ob_get_clean();
ob_start();
echo smarty_function_math(array('equation'=>"round( x / y ) * y",'x'=>$_prefixVariable6,'y'=>5),$_smarty_tpl);
$_prefixVariable7=ob_get_clean();
if ($_prefixVariable7 == 0) {?>5<?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['round2']->value;
$_prefixVariable8=ob_get_clean();
echo smarty_function_math(array('equation'=>"round( x / y ) * y",'x'=>$_prefixVariable8,'y'=>5),$_smarty_tpl);
}?>"><span><?php echo sprintf("%.4f",$_smarty_tpl->tpl_vars['tm_all_epc']->value);?>
 €</span></div>
                    <strong><i class="fa fa-globe fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_global']->value;?>
</strong>
                    </li>
                </ul>
                <!--
                <div class="last-updated"> 
                <?php echo $_smarty_tpl->tpl_vars['custom_last_updated']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['c_epc_tm_t']->value;?>

                </div>
                -->
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="fa fa-calendar fa fw" style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_top_five_last_six_months']->value;?>
</h3>
                    <p>
                    <ul class="stats-tabs">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['top_converting']->value, 'top');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['top']->value) {
?>
                            <?php smarty_function_counter(array('name'=>'l6msr','assign'=>'i'),$_smarty_tpl);?>

                            <li><a href="#0"><?php echo smarty_modifier_replace(sprintf("%.3f",$_smarty_tpl->tpl_vars['top']->value["v"]),'.000','');?>
%<em>#<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
: <b><?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
</b>
                                        <img border="0" src="/images/geo_flags/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['top']->value["n"], 'UTF-8');?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
" class="geo_flag"/></em></a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                <ul class="skill-bars">
                    <li><?php ob_start();
echo smarty_modifier_replace(sprintf("%.2f",$_smarty_tpl->tpl_vars['total_sr']->value),'0.','');
$_prefixVariable9=ob_get_clean();
$_smarty_tpl->_assignInScope('round3', $_prefixVariable9);
?>
                    <div class="progress percent<?php ob_start();
echo $_smarty_tpl->tpl_vars['round3']->value;
$_prefixVariable10=ob_get_clean();
echo smarty_function_math(array('equation'=>"round( x / y ) * y",'x'=>$_prefixVariable10,'y'=>5),$_smarty_tpl);?>
"><span><?php echo sprintf("%.3f",$_smarty_tpl->tpl_vars['total_sr']->value);?>
%</span></div>
                    <strong><i class="fa fa-globe fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_global']->value;?>
</strong>
                    </li>
                </ul>
                <!--
                <div class="last-updated"> 
                <?php echo $_smarty_tpl->tpl_vars['custom_last_updated']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['c_sr_l6m_t']->value;?>

                </div>
                -->
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                        <i class="fa fa-calendar-check fa fw " style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_top_five_this_month']->value;?>
</h3>
                    <p>
                    <ul class="stats-tabs">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tm_top_converting']->value, 'top');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['top']->value) {
?>
                            <?php smarty_function_counter(array('name'=>'tmsr','assign'=>'i'),$_smarty_tpl);?>

                            <li><a href="#0"><?php echo smarty_modifier_replace(sprintf("%.3f",$_smarty_tpl->tpl_vars['top']->value["v"]),'.000','');?>
%<em>#<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
: <b><?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
</b>
                                        <img border="0" src="/images/geo_flags/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['top']->value["n"], 'UTF-8');?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['top']->value["n"];?>
" class="geo_flag"/></em></a>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                <ul class="skill-bars">
                    <li><?php ob_start();
echo smarty_modifier_replace(sprintf("%.2f",$_smarty_tpl->tpl_vars['total_sr_tm']->value),'0.','');
$_prefixVariable11=ob_get_clean();
$_smarty_tpl->_assignInScope('round4', $_prefixVariable11);
?>
                    <div class="progress percent<?php ob_start();
echo $_smarty_tpl->tpl_vars['round4']->value;
$_prefixVariable12=ob_get_clean();
echo smarty_function_math(array('equation'=>"round( x / y ) * y",'x'=>$_prefixVariable12,'y'=>5),$_smarty_tpl);?>
"><span><?php echo sprintf("%.3f",$_smarty_tpl->tpl_vars['total_sr_tm']->value);?>
%</span></div>
                    <strong><i class="fa fa-globe fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_global']->value;?>
</strong>
                    </li>
                </ul>
                <!--
                <div class="last-updated"> 
                <?php echo $_smarty_tpl->tpl_vars['custom_last_updated']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['c_sr_tm_t']->value;?>

                </div>
                -->
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="fa fa-chart-pie fa fw" style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['custom_chart_today']->value;?>
</h3>
                    <p style="color:#fff;">
                        <?php if (isset($_smarty_tpl->tpl_vars['pie_top_5_month']->value)) {?>
                    <div class="row">
                        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">

                            <div class="portlet-body">
                                <div id="donut-daily-index"></div>

                                <?php if (!empty($_smarty_tpl->tpl_vars['d_top_affiliates']->value)) {?>
                                
                                    <?php echo '<script'; ?>
 type="text/javascript">

                                        Morris.Donut({
                                            element: 'donut-daily-index',
                                            resize: true,
                                            data: [ <?php echo $_smarty_tpl->tpl_vars['d_top_affiliates']->value;?>
 ],
                                            formatter: function (x, data) {
                                                return data.formatted;
                                            }

                                        });

                                    <?php echo '</script'; ?>
>
                                

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['chart_this_month_none']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="fa fa-chart-pie fa fw" style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['chart_this_month']->value;?>
</h3>
                    <p style="color:#fff;">
                        <?php if (isset($_smarty_tpl->tpl_vars['pie_top_5_month']->value)) {?>
                    <div class="row">
                        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">

                            <div class="portlet-body">
                                <div id="donut-monthly-index"></div>

                                <?php if (!empty($_smarty_tpl->tpl_vars['top_affiliates']->value)) {?>
                                
                                    <?php echo '<script'; ?>
 type="text/javascript">

                                        Morris.Donut({
                                            element: 'donut-monthly-index',
                                            resize: true,
                                            data: [ <?php echo $_smarty_tpl->tpl_vars['top_affiliates']->value;?>
 ],
                                            formatter: function (x, data) {
                                                return data.formatted;
                                            }

                                        });

                                    <?php echo '</script'; ?>
>
                                

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['chart_this_month_none']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    </p>
                </div>
            </div>

            <div class="col-full item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="fa fa-chart-bar fa fw" style="color:#532B72;"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['chart_last_6_months']->value;?>
</h3>
                    <p>
                        <?php if (isset($_smarty_tpl->tpl_vars['bar_comms_last_6']->value)) {?>
                    <div class="row">
                        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">

                            <div class="portlet-body">
                                <div id="bar-commissions-index"></div>

                                
                                <?php echo '<script'; ?>
 type="text/javascript">
                                    Morris.Bar({
                                        element: 'bar-commissions-index',
                                        data: [{
                                            x: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[0]['name'];?>
',
                                            y: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[0]['commissions'];?>
'
                                        }, {
                                            x: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[1]['name'];?>
',
                                            y: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[1]['commissions'];?>
'
                                        }, {
                                            x: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[2]['name'];?>
',
                                            y: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[2]['commissions'];?>
'
                                        }, {
                                            x: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[3]['name'];?>
',
                                            y: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[3]['commissions'];?>
'
                                        }, {
                                            x: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[4]['name'];?>
',
                                            y: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[4]['commissions'];?>
'
                                        }, {
                                            x: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[5]['name'];?>
',
                                            y: '<?php echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[5]['commissions'];?>
'
                                        },],
                                        xkey: 'x',
                                        ykeys: ['y'],
                                        labels: ['<?php echo $_smarty_tpl->tpl_vars['chart_last_6_months_paid']->value;?>
'],
                                        barColors: function (row, series, type) {
                                            if (type === 'bar') {
                                                return 'rgb(83,43,114)';
                                            } else {
                                                return '#fff';
                                            }
                                        }
                                    });

                                <?php echo '</script'; ?>
>
                                
                                <div class="morris-hover-row-label">
                                    <?php echo $_smarty_tpl->tpl_vars['custom_total']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['chart_last_6_months']->value;?>
: <?php ob_start();
echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[0]['commissions'];
$_prefixVariable13=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[1]['commissions'];
$_prefixVariable14=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[2]['commissions'];
$_prefixVariable15=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[3]['commissions'];
$_prefixVariable16=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[4]['commissions'];
$_prefixVariable17=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['monthly_commissions']->value[5]['commissions'];
$_prefixVariable18=ob_get_clean();
echo smarty_function_math(array('equation'=>"(a + b + c + d + e + f)",'a'=>$_prefixVariable13,'b'=>$_prefixVariable14,'c'=>$_prefixVariable15,'d'=>$_prefixVariable16,'e'=>$_prefixVariable17,'f'=>$_prefixVariable18),$_smarty_tpl);?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    </p>
                </div>
            </div>

        </div>

        <!-- end services -->
    <?php }?>
    <div class="home-content__button">
        <a href="/signup" class="btn btn--primary btn--large heartbeat" style="width:25.5rem;">
            <?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>

        </a>
        <a href="javascript:void(Tawk_API.toggle())" class="btn btn btn--large" style="width:25.5rem;">
            <?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>

        </a>
    </div>
</section> <!-- end s-statistics -->

<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section">

    <div class="grid-overlay">
        <div></div>
    </div>

    <div class="row section-header narrow" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead"><?php echo $_smarty_tpl->tpl_vars['custom_keep_in_touch']->value;?>
</h3>
            <h1 class="display-1"><?php echo $_smarty_tpl->tpl_vars['custom_feel_free']->value;?>
</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row contact-main" data-aos="fade-up">
        <div class="col-full">

<div class="addthis_inline_follow_toolbox" style="margin: auto;width: 184px;"></div>

            <p class="contact-address" style="font-size:1.5rem;">
                Countess Cat Inc. <br />
                <i class="fa fa-map-marker fa fw"></i> Global Gateway 8, Rue de la Perle, Providence, Mahe, Seychelles
            </p>
        </div>
    </div>

</section> <!-- end s-contact -->


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
