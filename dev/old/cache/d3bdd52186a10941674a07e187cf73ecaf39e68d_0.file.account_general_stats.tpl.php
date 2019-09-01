<?php
/* Smarty version 3.1.30, created on 2019-03-25 16:02:32
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_general_stats.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c98df78259478_22115181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3bdd52186a10941674a07e187cf73ecaf39e68d' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_general_stats.tpl',
      1 => 1553522545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:account_notes.tpl' => 1,
  ),
),false)) {
function content_5c98df78259478_22115181 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
?>

<!-- TODO: add this to template css when done, set margin and padding for daterangepicker, clean up -->

<style>
    td.details-control, tfoot th.details-control {
        background: url('/templates/themes/SublimeRevenue/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    td.details-control.details, tfoot th.details-control.details {
        background: url('/templates/themes/SublimeRevenue/images/details_close.png') no-repeat center center;
    }
/*
    .dataTables_processing{
        top:105% !important;
*/
    }
</style>
<?php $_smarty_tpl->_subTemplateRender("file:account_notes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="col-md-12">

    <div class="highlights clearfix">
        <!--
        <div class="col-md-3  col-sm-3 col-xs-6 hl-data green" style=" color:<?php echo $_smarty_tpl->tpl_vars['box_tt_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['box_tt_back']->value;?>
; ">
                <i class="fa fa-shopping-cart"></i>
            </div>

            <div class="col-md-9 dl-dt-txt" style="border:1px solid <?php echo $_smarty_tpl->tpl_vars['box_tt_back']->value;?>
 !important;">
                <div class="price">
                    <?php echo $_smarty_tpl->tpl_vars['total_transactions']->value;?>

                </div>

                <div class="sub">
                    <?php echo $_smarty_tpl->tpl_vars['account_total_transactions']->value;?>

                </div>
            </div>
        </div>
-->
        <div class="col-md-3 col-sm-3 col-xs-6 hl-data oringe" style="color:<?php echo $_smarty_tpl->tpl_vars['box_ce_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon"
                 style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['box_ce_back']->value;?>
;">
                <i class="fa fa-user fa fw"></i>
            </div>

            <div class="col-md-9 dl-dt-txt" style="border:1px solid <?php echo $_smarty_tpl->tpl_vars['box_ce_back']->value;?>
 !important;">
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
                <i class="fa fa-users fa fw"></i>
            </div>

            <div class="col-md-9 dl-dt-txt" style="border:1px solid <?php echo $_smarty_tpl->tpl_vars['box_ce_back']->value;?>
 !important;">
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
                <i class="fa fa-euro eurotwo fa fw"></i>
            </div>

            <div class="col-md-9 dl-dt-txt" style="border:1px solid #fff !important;">
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
                <i class="fa fa-percent fa fw"></i>
            </div>

            <div class="col-md-9 dl-dt-txt" style="border:1px solid #fff !important;">
                <div class="price">
                    <!-- TODO: split vars and fix for translations -->
                    <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['current_level']->value,': 65% to 80% Revenue Share',''),': 70% to 80% Revenue Share',''),': 75% to 80% Revenue Share',''),': 80% to 80% Revenue Share',''),': 100% to 80% Revenue Share',''),': 65% до 80% с каждой продажи',''),': 70% до 80% с каждой продажи',''),': 75% до 80% с каждой продажи',''),': 80% до 80% с каждой продажи',''),': 100% до 80% с каждой продажи','');?>

                </div>

                <div class="sub">
                    <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['current_level']->value,'Level 1:',''),'Level 2:',''),'Level 3:',''),'Level 4:',''),'Уровень 1: ',''),'Уровень 2: ',''),'Уровень 3: ',''),'Уровень 4: ',''),'.',''),'Level 9: ',''),'Уровень 9: ',''),' to 80%',''),' до 80%',''),'65% Revenue Share','No Bonus'),'65% с каждой продажи','Нет Бонуса'),'100% Revenue Share','Full Bonus'),'100% с каждой продажи','Макс Бонус'),'70% Revenue Share','Bonus +5%'),'70% с каждой продажи','Бонус +5%'),'75% Revenue Share','Bonus +10%'),'75% с каждой продажи','Бонус +10%'),'80% Revenue Share','Bonus +15%'),'80% с каждой продажи','Бонус +15%');?>

                </div>
            </div>
        </div>
        <!--
        <div class="col-md-3 col-sm-3 col-xs-6 hl-data purple" style=" color:<?php echo $_smarty_tpl->tpl_vars['box_uv_text']->value;?>
;">
            <div class="col-md-3 dl-dt-icon" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['box_uv_back']->value;?>
;">
                <i class="fa fa-users"></i>
            </div>

            <div class="col-md-9 dl-dt-txt" style="border:1px solid <?php echo $_smarty_tpl->tpl_vars['box_uv_back']->value;?>
 !important;">
                <div class="price"><?php echo $_smarty_tpl->tpl_vars['unchits']->value;?>
<span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['perc']->value;?>
%</span></div>
                <div class="sub"><span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['general_traffic_unique']->value;?>
</span><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['general_traffic_ratio']->value;?>
</span></div>
            </div>
        </div>
        -->
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

<!--
<div class="panel-group col-md-12">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
        <div class="panel-heading"  style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;" data-toggle="collapse" href="#comdetails">
                <?php echo $_smarty_tpl->tpl_vars['comdetails_title']->value;?>


                <span class="pull-right">
                    <i class="fa fa-angle-down"></i>
                </span>
            </h4>
        </div>

        <div id="comdetails" class="panel-collapse collapse in">
            <table class="table table-bordered">
                <tr>
                    <td width="25%">
                        <?php echo $_smarty_tpl->tpl_vars['current_comm_details']->value;?>

                    </td>

                    <td width="75%">
                        <?php echo $_smarty_tpl->tpl_vars['current_style']->value;?>

                    </td>
                </tr>

                <tr>
                    <td width="25%">
                        <?php echo $_smarty_tpl->tpl_vars['current_comm_pay']->value;?>

                    </td>

                    <td width="75%">
                        <?php echo $_smarty_tpl->tpl_vars['current_level']->value;?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
-->

<!-- dynamic table start -->
<div class="panel-group col-md-12 ">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
        <div class="panel-heading"
             style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;" data-toggle="collapse"
                href="#dyntable_general_Stats">
                <i class="fa fa-bar-chart fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>


                <span class="pull-right"><i class="fa fa-angle-down"></i></span>
            </h4>
        </div>
        <div id="dyntable_general_Stats" class="panel-collapse collapse in">

            <div class="table-scroll">
                <div class="dateFiltersContainer">
                    <!-- daterangepicker start -->
                    <input type="text" id="range" class="form-control dateranger"/>
                    <!-- daterangepicker end -->
                    
                    <select type="text" id="aggregate" class="form-control" style="width:115px;z-index:10;margin:3px;">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                        
                    </select>
                </div>
                <!-- DataTables HTML start -->
                <table id="dyntable_Stats" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="text-align:left !important;"><?php echo $_smarty_tpl->tpl_vars['custom_date']->value;?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_raw_visits']->value;?>
</th>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_unique_visits']->value;?>
</th>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_transactions']->value;?>
</th>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_sales_ratio']->value;?>
</th>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_rpm']->value;?>
</th>
                        <th></th>
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_earnings']->value;?>
</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr id="totals">
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_total']->value;?>
:</th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                        <th></th>
                        <th tabindex="0" class="details-control total"></th>
                    </tr>
                    </tfoot>
                </table>
                <!-- DataTables HTML end -->
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_assignInScope('trans', array("custom_this_year"=>$_smarty_tpl->tpl_vars['custom_this_year']->value,"custom_last_year"=>$_smarty_tpl->tpl_vars['custom_last_year']->value,"custom_country"=>$_smarty_tpl->tpl_vars['custom_country']->value,"custom_total"=>$_smarty_tpl->tpl_vars['custom_total']->value,"custom_tracking_id"=>$_smarty_tpl->tpl_vars['custom_tracking_id']->value,"custom_tracking_ids_combinations"=>$_smarty_tpl->tpl_vars['custom_tracking_ids_combinations']->value,"custom_tracking_id_four"=>$_smarty_tpl->tpl_vars['custom_tracking_id_four']->value,"custom_tracking_id_one"=>$_smarty_tpl->tpl_vars['custom_tracking_id_one']->value,"custom_tracking_id_three"=>$_smarty_tpl->tpl_vars['custom_tracking_id_three']->value,"custom_tracking_id_two"=>$_smarty_tpl->tpl_vars['custom_tracking_id_two']->value,"custom_today"=>$_smarty_tpl->tpl_vars['custom_today']->value,"custom_yesterday"=>$_smarty_tpl->tpl_vars['custom_yesterday']->value,"custom_last_seven_days"=>$_smarty_tpl->tpl_vars['custom_last_seven_days']->value,"custom_last_thirty_days"=>$_smarty_tpl->tpl_vars['custom_last_thirty_days']->value,"custom_this_month"=>$_smarty_tpl->tpl_vars['custom_this_month']->value,"custom_last_month"=>$_smarty_tpl->tpl_vars['custom_last_month']->value,"custom_apply"=>$_smarty_tpl->tpl_vars['custom_apply']->value,"custom_custom_cancel"=>$_smarty_tpl->tpl_vars['custom_custom_cancel']->value,"custom_from"=>$_smarty_tpl->tpl_vars['custom_from']->value,"custom_to"=>$_smarty_tpl->tpl_vars['custom_to']->value,"custom_custom"=>$_smarty_tpl->tpl_vars['custom_custom']->value,"custom_w"=>$_smarty_tpl->tpl_vars['custom_w']->value,"custom_mo"=>$_smarty_tpl->tpl_vars['custom_mo']->value,"custom_tu"=>$_smarty_tpl->tpl_vars['custom_tu']->value,"custom_we"=>$_smarty_tpl->tpl_vars['custom_we']->value,"custom_th"=>$_smarty_tpl->tpl_vars['custom_th']->value,"custom_fr"=>$_smarty_tpl->tpl_vars['custom_fr']->value,"custom_sa"=>$_smarty_tpl->tpl_vars['custom_sa']->value,"custom_su"=>$_smarty_tpl->tpl_vars['custom_su']->value,"custom_january"=>$_smarty_tpl->tpl_vars['custom_january']->value,"custom_february"=>$_smarty_tpl->tpl_vars['custom_february']->value,"custom_march"=>$_smarty_tpl->tpl_vars['custom_march']->value,"custom_april"=>$_smarty_tpl->tpl_vars['custom_april']->value,"custom_may"=>$_smarty_tpl->tpl_vars['custom_may']->value,"custom_june"=>$_smarty_tpl->tpl_vars['custom_june']->value,"custom_july"=>$_smarty_tpl->tpl_vars['custom_july']->value,"custom_august"=>$_smarty_tpl->tpl_vars['custom_august']->value,"custom_september"=>$_smarty_tpl->tpl_vars['custom_september']->value,"custom_october"=>$_smarty_tpl->tpl_vars['custom_october']->value,"custom_november"=>$_smarty_tpl->tpl_vars['custom_november']->value,"custom_december"=>$_smarty_tpl->tpl_vars['custom_december']->value));
?>
<input type="hidden" id="trans" value='<?php echo json_encode($_smarty_tpl->tpl_vars['trans']->value);?>
'>
<!-- dynamic table end -->
<!-- graph hide start
<div class="panel-group col-md-12">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
        <div class="panel-heading"  style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;" data-toggle="collapse" href="#30days">
                Stats Graph

                <span class="pull-right">
                    <i class="fa fa-angle-down"></i>
                </span>
            </h4>
        </div>

        <div id="30days" class="panel-collapse collapse in">
            <div id="area-affiliate"></div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">

    Morris.Bar({
        element: 'area-affiliate',
        data: [  <?php echo $_smarty_tpl->tpl_vars['chart_array_graph']->value;?>
  ],
        xkey: 'd',
/* with traffic
        ykeys: ['a', 'b', 'e', 'f', 'c'],
        labels: ['Unique Visits', 'Sales', 'Sales Ratio', 'Earnings']
*/
        ykeys: ['a', 'b', 'e', 'f', 'c'],
        labels: ['Unique Visits', 'Sales', 'Sales Ratio', 'RPM', 'Earnings']
    });

<?php echo '</script'; ?>
>

graph hide end -->

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
    $('#aggregate').select2();
});
<?php echo '</script'; ?>
><?php }
}
