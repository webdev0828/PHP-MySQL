<?php
/* Smarty version 3.1.30, created on 2019-04-08 07:49:41
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_general_stats.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5caafd1595db05_12297214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3bdd52186a10941674a07e187cf73ecaf39e68d' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_general_stats.tpl',
      1 => 1554708735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:account_notes.tpl' => 1,
  ),
),false)) {
function content_5caafd1595db05_12297214 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_counter')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_regex_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.regex_replace.php';
?>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

<div class="row">
    <div class="col-md-12 ">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
<div class="col-md-12">
    <div class="highlights clearfix">
        <div class="col-md-3 col-sm-3 col-xs-6 hl-data oringe" style="color:<?php echo $_smarty_tpl->tpl_vars['box_ce_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon"
                 style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['box_ce_back']->value;?>
 width:100% !important;">
                <i class="fa fa-user fa-fw"></i>
            </div>

            <div class="col-md-9 dl-dt-txt">
                <div class="price">
                    <?php if (!isset($_smarty_tpl->tpl_vars['current_total_commissions_no_ref']->value)) {?>0.00<?php } else {
echo $_smarty_tpl->tpl_vars['current_total_commissions_no_ref']->value;
}?> €
                </div>

                <div class="sub">
                    <?php echo $_smarty_tpl->tpl_vars['general_current_earnings']->value;?>

                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 hl-data oringe" style="color:<?php echo $_smarty_tpl->tpl_vars['box_ce_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon"
                 style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['box_ce_back']->value;?>
;">
                <i class="fa fa-users fa-fw"></i>
            </div>

            <div class="col-md-9 dl-dt-txt">
                <div class="price">
                    <?php if (!isset($_smarty_tpl->tpl_vars['current_total_commissions_only_ref']->value)) {?>0.00<?php } else {
echo $_smarty_tpl->tpl_vars['current_total_commissions_only_ref']->value;
}?>
                    €
                </div>

                <div class="sub">
                    <?php echo $_smarty_tpl->tpl_vars['account_second_tier']->value;?>

                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 hl-data blue" style="color:<?php echo $_smarty_tpl->tpl_vars['box_te_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon"
                 style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #fff;">
                <i class="fas fa-university fa-fw" style="text-shadow: 1px 1px 9px #fff !important;"></i>
            </div>

            <div class="col-md-9 dl-dt-txt">
                <div class="price">
                    <?php echo $_smarty_tpl->tpl_vars['current_total_commissions']->value;?>

                </div>

                <div class="sub">
                    <?php echo $_smarty_tpl->tpl_vars['account_earned_todate']->value;?>

                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 hl-data blue" style="color:<?php echo $_smarty_tpl->tpl_vars['box_te_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon"
                 style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #fff;">
                <i class="fa fa-award fa-fw" style="text-shadow: 1px 1px 9px #fff !important;"></i>
            </div>

            <div class="col-md-9 dl-dt-txt">
                <div class="price">
                    <!-- TODO: split vars and fix for translations -->
                    <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['current_level']->value,': 65% to 80% Revenue Share',''),': 70% to 80% Revenue Share',''),': 75% to 80% Revenue Share',''),': 80% to 80% Revenue Share',''),': 100% to 80% Revenue Share',''),': 65% до 80% с каждой продажи',''),': 70% до 80% с каждой продажи',''),': 75% до 80% с каждой продажи',''),': 80% до 80% с каждой продажи',''),': 100% до 80% с каждой продажи','');?>

                </div>

                <div class="sub">
                    <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['current_level']->value,'Level 1:',''),'Level 2:',''),'Level 3:',''),'Level 4:',''),'Уровень 1: ',''),'Уровень 2: ',''),'Уровень 3: ',''),'Уровень 4: ',''),'.',''),'Level 9: ',''),'Уровень 9: ',''),' to 80%',''),' до 80%',''),'65% Revenue Share','No Bonus'),'65% с каждой продажи','Нет Бонуса'),'100% Revenue Share','Full Bonus'),'100% с каждой продажи','Макс Бонус'),'70% Revenue Share','Bonus +5%'),'70% с каждой продажи','Бонус +5%'),'75% Revenue Share','Bonus +10%'),'75% с каждой продажи','Бонус +10%'),'80% Revenue Share','Bonus +15%'),'80% с каждой продажи','Бонус +15%');?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['linking_code']->value == 'available') {?>
    <div class="panel-group col-md-6" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading"
                 style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#eligility">
                    <i class="fa fa-sync fa-fw fa-spin"></i> <?php echo $_smarty_tpl->tpl_vars['progress_title']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['eligible_percent']->value;?>
% <?php echo $_smarty_tpl->tpl_vars['progress_complete']->value;?>


                    <span class="pull-right">
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>

            <div id="eligility" class="panel-collapse collapse in">
                <div class="progress no-rounded progress-striped active">
                    <div class="progress-bar progress-bar-primary" role="progressbar"
                         aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['eligible_percent']->value;?>
" aria-valuemin="0" aria-valuemax="100"
                         style="width: <?php echo $_smarty_tpl->tpl_vars['eligible_percent']->value;?>
%"></div>
                </div>
                <?php echo $_smarty_tpl->tpl_vars['eligible_info']->value;?>

            </div>
        </div>
    </div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:account_notes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel-group col-md-12" style="width:100%">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
        <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#bestptools">
                <i class="fas fa-fire animated" ></i> <?php echo $_smarty_tpl->tpl_vars['custom_best_performing_tools']->value;?>

                <span class="pull-right"> 
                    <i class="fa fa-angle-down"></i>
                </span>
            </h4>
        </div>
        <div id="bestptools" class="panel-collapse collapse">
<div class="panel-group col-md-12" style="width:100%">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
        <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#mainstream">
                <i class="fas fa-mountain" ></i> Mainstream
                <span class="pull-right"> 
                    <i class="fa fa-angle-down"></i>
                </span>
            </h4>
        </div>
        <div id="mainstream" class="panel-collapse collapse">
    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotlinks">
                    <i class="fas fa-link fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_links']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotlinks" class="panel-collapse collapse">
                <?php
$__section_links_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_links']) ? $_smarty_tpl->tpl_vars['__smarty_section_links'] : false;
$__section_links_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotlinks']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_links_0_total = $__section_links_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_links'] = new Smarty_Variable(array());
if ($__section_links_0_total != 0) {
for ($__section_links_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] = 0; $__section_links_0_iteration <= $__section_links_0_total; $__section_links_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotlinks','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['cr'];
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable1 >= 0.3 && $_prefixVariable2 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['inhouse'];
$_prefixVariable3=ob_get_clean();
if ($_prefixVariable3 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['inhouse'];
$_prefixVariable4=ob_get_clean();
if ($_prefixVariable4 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['grp'];?>
 - <?php echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['linktext'];?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['land'];
$_prefixVariable5=ob_get_clean();
if ($_prefixVariable5 == 1) {?> Landing <?php } else { ?> Pre-landing<?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runninglinks']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_link']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable6=ob_get_clean();
if (!$_prefixVariable6) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_links_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_links'] = $__section_links_0_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotbanners">
                    <i class="fa fa-image fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_banners']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotbanners" class="panel-collapse collapse">
                <?php
$__section_banners_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_banners']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners'] : false;
$__section_banners_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotbanners']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_banners_1_total = $__section_banners_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_banners'] = new Smarty_Variable(array());
if ($__section_banners_1_total != 0) {
for ($__section_banners_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] = 0; $__section_banners_1_iteration <= $__section_banners_1_total; $__section_banners_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotbanners','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['epc'];
$_prefixVariable7=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['cr'];
$_prefixVariable8=ob_get_clean();
if ($_prefixVariable7 >= 0.3 && $_prefixVariable8 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['inhouse'];
$_prefixVariable9=ob_get_clean();
if ($_prefixVariable9 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['grp'];?>
 - <?php echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['description'];?>
 <?php echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['size1'];?>
x<?php echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['size2'];?>
 (<?php echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['language'];?>
)
                            <?php if (in_array($_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runninglinks']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_banner']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['epc'];
$_prefixVariable10=ob_get_clean();
if (!$_prefixVariable10) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotbanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_banners_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_banners'] = $__section_banners_1_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotsmartlinks">
                    <i class="fas fa-external-link-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotsmartlinks" class="panel-collapse collapse">
                <?php
$__section_links_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_links']) ? $_smarty_tpl->tpl_vars['__smarty_section_links'] : false;
$__section_links_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotsmartlinks']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_links_2_total = $__section_links_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_links'] = new Smarty_Variable(array());
if ($__section_links_2_total != 0) {
for ($__section_links_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] = 0; $__section_links_2_iteration <= $__section_links_2_total; $__section_links_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotsmartlinks','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable11=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['cr'];
$_prefixVariable12=ob_get_clean();
if ($_prefixVariable11 >= 0.3 && $_prefixVariable12 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['inhouse'];
$_prefixVariable13=ob_get_clean();
if ($_prefixVariable13 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo smarty_modifier_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['name'],'/[0-9]+/',''),'.','');?>
 <?php echo $_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['linktext'];?>

                            <?php if (in_array($_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runninglinks']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_smartlink']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable14=ob_get_clean();
if (!$_prefixVariable14) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotsmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_links_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_links'] = $__section_links_2_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotpopunders">
                    <i class="fas fa-undo fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotpopunders" class="panel-collapse collapse">
                <?php
$__section_pops_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_pops']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops'] : false;
$__section_pops_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotpopunders']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pops_3_total = $__section_pops_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_pops'] = new Smarty_Variable(array());
if ($__section_pops_3_total != 0) {
for ($__section_pops_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] = 0; $__section_pops_3_iteration <= $__section_pops_3_total; $__section_pops_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotpopunders','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['epc'];
$_prefixVariable15=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['cr'];
$_prefixVariable16=ob_get_clean();
if ($_prefixVariable15 >= 0.3 && $_prefixVariable16 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['inhouse'];
$_prefixVariable17=ob_get_clean();
if ($_prefixVariable17 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo smarty_modifier_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['name'],'/[0-9]+/',''),'.','');?>
 <?php echo $_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['linktext'];?>

                            <?php if (in_array($_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runningpopunders']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_popunder']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['epc'];
$_prefixVariable18=ob_get_clean();
if (!$_prefixVariable18) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotpopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_pops_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_pops'] = $__section_pops_3_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotbackoffers">
                    <i class="fas fa-arrow-circle-left fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_backoffer']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotbackoffers" class="panel-collapse collapse">
                <?php
$__section_clicks_4_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks'] : false;
$__section_clicks_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotbackoffers']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_clicks_4_total = $__section_clicks_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_clicks'] = new Smarty_Variable(array());
if ($__section_clicks_4_total != 0) {
for ($__section_clicks_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] = 0; $__section_clicks_4_iteration <= $__section_clicks_4_total; $__section_clicks_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotbackoffers','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['epc'];
$_prefixVariable19=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['cr'];
$_prefixVariable20=ob_get_clean();
if ($_prefixVariable19 >= 0.3 && $_prefixVariable20 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['inhouse'];
$_prefixVariable21=ob_get_clean();
if ($_prefixVariable21 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo smarty_modifier_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['name'],'/[0-9]+/',''),'.','');?>
 <?php echo $_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['linktext'];?>

                            <?php if (in_array($_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runningbackoffers']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_backoffer']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['epc'];
$_prefixVariable22=ob_get_clean();
if (!$_prefixVariable22) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotbackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_clicks_4_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_clicks'] = $__section_clicks_4_saved;
}
?>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<div class="panel-group col-md-12" style="width:100%">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
        <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#adult">
                <span class="fa-stack fa-xs" style="margin-left:-2px;"><span class="far fa-circle fa-stack-2x fa-xs"></span><strong class="fa-stack-1x fa-sm">18</strong></span> Adult
                <span class="pull-right"> 
                    <i class="fa fa-angle-down"></i>
                </span>
            </h4>
        </div>
        <div id="adult" class="panel-collapse collapse">
    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotalinks">
                    <i class="fas fa-link fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_links']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotalinks" class="panel-collapse collapse">
                <?php
$__section_links_5_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_links']) ? $_smarty_tpl->tpl_vars['__smarty_section_links'] : false;
$__section_links_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotalinks']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_links_5_total = $__section_links_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_links'] = new Smarty_Variable(array());
if ($__section_links_5_total != 0) {
for ($__section_links_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] = 0; $__section_links_5_iteration <= $__section_links_5_total; $__section_links_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotalinks','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable23=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['cr'];
$_prefixVariable24=ob_get_clean();
if ($_prefixVariable23 >= 0.3 && $_prefixVariable24 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['inhouse'];
$_prefixVariable25=ob_get_clean();
if ($_prefixVariable25 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['grp'];?>
 - <?php echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['linktext'];?>
 <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['land'];
$_prefixVariable26=ob_get_clean();
if ($_prefixVariable26 == 1) {?> Landing <?php } else { ?> Pre-landing<?php }?>
                            <?php if (in_array($_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runninglinks']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_link']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable27=ob_get_clean();
if (!$_prefixVariable27) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotalinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_links_5_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_links'] = $__section_links_5_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotabanners">
                    <i class="fa fa-image fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_banners']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotabanners" class="panel-collapse collapse">
                <?php
$__section_banners_6_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_banners']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners'] : false;
$__section_banners_6_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotabanners']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_banners_6_total = $__section_banners_6_loop;
$_smarty_tpl->tpl_vars['__smarty_section_banners'] = new Smarty_Variable(array());
if ($__section_banners_6_total != 0) {
for ($__section_banners_6_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] = 0; $__section_banners_6_iteration <= $__section_banners_6_total; $__section_banners_6_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotabanners','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['epc'];
$_prefixVariable28=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['cr'];
$_prefixVariable29=ob_get_clean();
if ($_prefixVariable28 >= 0.3 && $_prefixVariable29 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['inhouse'];
$_prefixVariable30=ob_get_clean();
if ($_prefixVariable30 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['grp'];?>
 - <?php echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['description'];?>
 <?php echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['size1'];?>
x<?php echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['size2'];?>
 (<?php echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['language'];?>
)
                            <?php if (in_array($_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runninglinks']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_banner']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['epc'];
$_prefixVariable31=ob_get_clean();
if (!$_prefixVariable31) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotabanners']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_banners']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_banners_6_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_banners'] = $__section_banners_6_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotasmartlinks">
                    <i class="fas fa-external-link-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotasmartlinks" class="panel-collapse collapse">
                <?php
$__section_links_7_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_links']) ? $_smarty_tpl->tpl_vars['__smarty_section_links'] : false;
$__section_links_7_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotasmartlinks']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_links_7_total = $__section_links_7_loop;
$_smarty_tpl->tpl_vars['__smarty_section_links'] = new Smarty_Variable(array());
if ($__section_links_7_total != 0) {
for ($__section_links_7_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] = 0; $__section_links_7_iteration <= $__section_links_7_total; $__section_links_7_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotasmartlinks','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable32=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['cr'];
$_prefixVariable33=ob_get_clean();
if ($_prefixVariable32 >= 0.3 && $_prefixVariable33 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['inhouse'];
$_prefixVariable34=ob_get_clean();
if ($_prefixVariable34 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo smarty_modifier_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['name'],'/[0-9]+/',''),'.','');?>
 <?php echo $_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['linktext'];?>

                            <?php if (in_array($_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runninglinks']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_smartlink']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
$_prefixVariable35=ob_get_clean();
if (!$_prefixVariable35) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotasmartlinks']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_links']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_links']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_links_7_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_links'] = $__section_links_7_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotapopunders">
                    <i class="fas fa-undo fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotapopunders" class="panel-collapse collapse">
                <?php
$__section_pops_8_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_pops']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops'] : false;
$__section_pops_8_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotapopunders']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pops_8_total = $__section_pops_8_loop;
$_smarty_tpl->tpl_vars['__smarty_section_pops'] = new Smarty_Variable(array());
if ($__section_pops_8_total != 0) {
for ($__section_pops_8_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] = 0; $__section_pops_8_iteration <= $__section_pops_8_total; $__section_pops_8_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotapopunders','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['epc'];
$_prefixVariable36=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['cr'];
$_prefixVariable37=ob_get_clean();
if ($_prefixVariable36 >= 0.3 && $_prefixVariable37 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['inhouse'];
$_prefixVariable38=ob_get_clean();
if ($_prefixVariable38 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo smarty_modifier_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['name'],'/[0-9]+/',''),'.','');?>
 <?php echo $_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['linktext'];?>

                            <?php if (in_array($_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runningpopunders']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_popunder']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['epc'];
$_prefixVariable39=ob_get_clean();
if (!$_prefixVariable39) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotapopunders']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pops']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_pops_8_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_pops'] = $__section_pops_8_saved;
}
?>
            </div>
        </div>
    </div>

    <div class="panel-group col-md-12" style="width:100%">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#hotabackoffers">
                    <i class="fas fa-arrow-circle-left fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_backoffer']->value;?>

                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="hotabackoffers" class="panel-collapse collapse">
                <?php
$__section_clicks_9_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks'] : false;
$__section_clicks_9_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['hotabackoffers']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_clicks_9_total = $__section_clicks_9_loop;
$_smarty_tpl->tpl_vars['__smarty_section_clicks'] = new Smarty_Variable(array());
if ($__section_clicks_9_total != 0) {
for ($__section_clicks_9_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] = 0; $__section_clicks_9_iteration <= $__section_clicks_9_total; $__section_clicks_9_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']++){
?> 
                            <?php smarty_function_counter(array('name'=>'hotabackoffers','assign'=>'i'),$_smarty_tpl);?>

                <table class="table" style="margin:1rem;">
                    <tr>
                        <td style="text-align:left;">
                            <i class="fas fa-hashtag fa-sm"></i><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
. <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['epc'];
$_prefixVariable40=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['cr'];
$_prefixVariable41=ob_get_clean();
if ($_prefixVariable40 >= 0.3 && $_prefixVariable41 >= 0.3) {?><span class="label label-success" title="<?php echo $_smarty_tpl->tpl_vars['custom_hot_tooltip']->value;?>
">HOT</span> <?php }
ob_start();
echo $_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['inhouse'];
$_prefixVariable42=ob_get_clean();
if ($_prefixVariable42 == 1) {?><span class="badge" title="<?php echo $_smarty_tpl->tpl_vars['custom_in_house_tooltip']->value;?>
">IN-HOUSE</span> <?php }
echo smarty_modifier_replace(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['name'],'/[0-9]+/',''),'.','');?>
 <?php echo $_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['linktext'];?>

                            <?php if (in_array($_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['grp'],$_smarty_tpl->tpl_vars['runningbackoffers']->value)) {?>
                            <span class="badge running" title="<?php echo $_smarty_tpl->tpl_vars['custom_running_backoffer']->value;?>
"><i class="fas fa-running fa-2x"></i></span>
                            <?php }?>
                        </td>
                        <td style="text-align:right;">
                            EPC: <?php ob_start();
echo $_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['epc'];
$_prefixVariable43=ob_get_clean();
if (!$_prefixVariable43) {?>0.0000<?php } else {
echo $_smarty_tpl->tpl_vars['hotabackoffers']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_clicks']->value['index'] : null)]['epc'];
}?> €
                        </td>
                    </tr>
                </table>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value == 9) {?>
                                <?php break 1;?>
                            <?php }?>
                <?php
}
}
if ($__section_clicks_9_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_clicks'] = $__section_clicks_9_saved;
}
?>
            </div>
        </div>
    </div>
    </div>
</div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
<?php }
}
