<?php
/* Smarty version 3.1.30, created on 2019-04-10 13:32:40
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/33.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cadf0783c0a16_04019018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cf8109259bba6992ad8444b7444462f07c7a8dd' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/33.tpl',
      1 => 1554902475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cadf0783c0a16_04019018 (Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
    td.details-control, tfoot th.details-control {
        background: url('/templates/themes/SublimeRevenue/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    td.details-control.details, tfoot th.details-control.details {
        background: url('/templates/themes/SublimeRevenue/images/details_close.png') no-repeat center center;
    }
</style>

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-bar-chart fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>

        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                <div class="portlet-title" style="color:#ffffff;">
                <h4 data-toggle="collapse">
                    <i class="fa fa-table fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics_table']->value;?>




                </h4>
                </div>
            </div>
            <div id="dyntable_general_Stats" class="panel-collapse collapse in">
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
                </div>
            </div>
        </div>
    </div>
                <?php echo '<script'; ?>
 type="text/javascript">
                    window.jstext = {
                        language : {
                            "custom_show": "<?php echo $_smarty_tpl->tpl_vars['custom_show']->value;?>
",
                            "custom_raw_visits": "<?php echo $_smarty_tpl->tpl_vars['custom_raw_visits']->value;?>
",
                            "custom_unique_visits": "<?php echo $_smarty_tpl->tpl_vars['custom_unique_visits']->value;?>
",
                            "custom_transactions": "<?php echo $_smarty_tpl->tpl_vars['custom_transactions']->value;?>
",
                            "custom_sales_ratio": "<?php echo $_smarty_tpl->tpl_vars['custom_sales_ratio']->value;?>
",
                            "custom_rpm": "<?php echo $_smarty_tpl->tpl_vars['custom_rpm']->value;?>
",
                            "custom_earnings": "<?php echo $_smarty_tpl->tpl_vars['custom_earnings']->value;?>
",
                            "custom_interval": "<?php echo $_smarty_tpl->tpl_vars['custom_interval']->value;?>
",
                            "custom_smart_tools": "<?php echo $_smarty_tpl->tpl_vars['custom_smart_tools']->value;?>
",
                            "custom_offer_tools": "<?php echo $_smarty_tpl->tpl_vars['custom_offer_tools']->value;?>
",
                            "custom_daily": "<?php echo $_smarty_tpl->tpl_vars['custom_daily']->value;?>
",
                            "custom_monthly": "<?php echo $_smarty_tpl->tpl_vars['custom_monthly']->value;?>
"
                        }
                    }
                <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_assignInScope('trans', array("custom_this_year"=>$_smarty_tpl->tpl_vars['custom_this_year']->value,"custom_last_year"=>$_smarty_tpl->tpl_vars['custom_last_year']->value,"custom_country"=>$_smarty_tpl->tpl_vars['custom_country']->value,"custom_total"=>$_smarty_tpl->tpl_vars['custom_total']->value,"custom_tracking_id"=>$_smarty_tpl->tpl_vars['custom_tracking_id']->value,"custom_tracking_ids_combinations"=>$_smarty_tpl->tpl_vars['custom_tracking_ids_combinations']->value,"custom_tracking_id_four"=>$_smarty_tpl->tpl_vars['custom_tracking_id_four']->value,"custom_tracking_id_one"=>$_smarty_tpl->tpl_vars['custom_tracking_id_one']->value,"custom_tracking_id_three"=>$_smarty_tpl->tpl_vars['custom_tracking_id_three']->value,"custom_tracking_id_two"=>$_smarty_tpl->tpl_vars['custom_tracking_id_two']->value,"custom_today"=>$_smarty_tpl->tpl_vars['custom_today']->value,"custom_yesterday"=>$_smarty_tpl->tpl_vars['custom_yesterday']->value,"custom_last_seven_days"=>$_smarty_tpl->tpl_vars['custom_last_seven_days']->value,"custom_last_thirty_days"=>$_smarty_tpl->tpl_vars['custom_last_thirty_days']->value,"custom_this_month"=>$_smarty_tpl->tpl_vars['custom_this_month']->value,"custom_last_month"=>$_smarty_tpl->tpl_vars['custom_last_month']->value,"custom_apply"=>$_smarty_tpl->tpl_vars['custom_apply']->value,"custom_custom_cancel"=>$_smarty_tpl->tpl_vars['custom_custom_cancel']->value,"custom_from"=>$_smarty_tpl->tpl_vars['custom_from']->value,"custom_to"=>$_smarty_tpl->tpl_vars['custom_to']->value,"custom_custom"=>$_smarty_tpl->tpl_vars['custom_custom']->value,"custom_w"=>$_smarty_tpl->tpl_vars['custom_w']->value,"custom_mo"=>$_smarty_tpl->tpl_vars['custom_mo']->value,"custom_tu"=>$_smarty_tpl->tpl_vars['custom_tu']->value,"custom_we"=>$_smarty_tpl->tpl_vars['custom_we']->value,"custom_th"=>$_smarty_tpl->tpl_vars['custom_th']->value,"custom_fr"=>$_smarty_tpl->tpl_vars['custom_fr']->value,"custom_sa"=>$_smarty_tpl->tpl_vars['custom_sa']->value,"custom_su"=>$_smarty_tpl->tpl_vars['custom_su']->value,"custom_january"=>$_smarty_tpl->tpl_vars['custom_january']->value,"custom_february"=>$_smarty_tpl->tpl_vars['custom_february']->value,"custom_march"=>$_smarty_tpl->tpl_vars['custom_march']->value,"custom_april"=>$_smarty_tpl->tpl_vars['custom_april']->value,"custom_may"=>$_smarty_tpl->tpl_vars['custom_may']->value,"custom_june"=>$_smarty_tpl->tpl_vars['custom_june']->value,"custom_july"=>$_smarty_tpl->tpl_vars['custom_july']->value,"custom_august"=>$_smarty_tpl->tpl_vars['custom_august']->value,"custom_september"=>$_smarty_tpl->tpl_vars['custom_september']->value,"custom_october"=>$_smarty_tpl->tpl_vars['custom_october']->value,"custom_november"=>$_smarty_tpl->tpl_vars['custom_november']->value,"custom_december"=>$_smarty_tpl->tpl_vars['custom_december']->value));
?>
<input type="hidden" id="trans" value='<?php echo json_encode($_smarty_tpl->tpl_vars['trans']->value);?>
'>
<!-- dynamic table end --><?php }
}
