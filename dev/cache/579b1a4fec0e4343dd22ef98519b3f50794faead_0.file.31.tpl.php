<?php
/* Smarty version 3.1.30, created on 2019-04-06 13:37:59
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/31.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca88187497f04_12095406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '579b1a4fec0e4343dd22ef98519b3f50794faead' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/31.tpl',
      1 => 1554547070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca88187497f04_12095406 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-history fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_logs']->value;?>

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
                        <i class="fa fa-file-signature fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_records']->value;?>
</a>
                    </h4>
                </div>
            </div>
                <!-- DataTables HTML start -->
                <table id="dyntable_Postbacks_Logs" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="text-align:left!important;width:20%;"><?php echo $_smarty_tpl->tpl_vars['custom_date']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_status']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_offer']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_commission_id']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_method']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_result']->value;?>
</th>
                        <th style="width:5%;">HTTP</th>
                        <th style="text-align:left!important;width:40%;">URL</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr id="filters">
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>
                                <select id="status-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="offer-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="record-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="method-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="result-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="http-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="url-filter" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_allcustom_all']->value;?>
</option>
                                </select>
                            </td>
                        </tr>
                    </tfoot>
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
                            "custom_error": "<?php echo $_smarty_tpl->tpl_vars['custom_error']->value;?>
",
                            "custom_success": "<?php echo $_smarty_tpl->tpl_vars['custom_success']->value;?>
",
                            "custom_fail": "Failuer",
                            "custom_approved": "<?php echo $_smarty_tpl->tpl_vars['custom_approved']->value;?>
",
                            "custom_rejected": "<?php echo $_smarty_tpl->tpl_vars['custom_rejected']->value;?>
"
                        }
                    }
                <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_assignInScope('trans', array("custom_this_year"=>$_smarty_tpl->tpl_vars['custom_this_year']->value,"custom_last_year"=>$_smarty_tpl->tpl_vars['custom_last_year']->value,"custom_country"=>$_smarty_tpl->tpl_vars['custom_country']->value,"custom_total"=>$_smarty_tpl->tpl_vars['custom_total']->value,"custom_tracking_id"=>$_smarty_tpl->tpl_vars['custom_tracking_id']->value,"custom_tracking_ids_combinations"=>$_smarty_tpl->tpl_vars['custom_tracking_ids_combinations']->value,"custom_tracking_id_four"=>$_smarty_tpl->tpl_vars['custom_tracking_id_four']->value,"custom_tracking_id_one"=>$_smarty_tpl->tpl_vars['custom_tracking_id_one']->value,"custom_tracking_id_three"=>$_smarty_tpl->tpl_vars['custom_tracking_id_three']->value,"custom_tracking_id_two"=>$_smarty_tpl->tpl_vars['custom_tracking_id_two']->value,"custom_today"=>$_smarty_tpl->tpl_vars['custom_today']->value,"custom_yesterday"=>$_smarty_tpl->tpl_vars['custom_yesterday']->value,"custom_last_seven_days"=>$_smarty_tpl->tpl_vars['custom_last_seven_days']->value,"custom_last_thirty_days"=>$_smarty_tpl->tpl_vars['custom_last_thirty_days']->value,"custom_this_month"=>$_smarty_tpl->tpl_vars['custom_this_month']->value,"custom_last_month"=>$_smarty_tpl->tpl_vars['custom_last_month']->value,"custom_apply"=>$_smarty_tpl->tpl_vars['custom_apply']->value,"custom_custom_cancel"=>$_smarty_tpl->tpl_vars['custom_custom_cancel']->value,"custom_from"=>$_smarty_tpl->tpl_vars['custom_from']->value,"custom_to"=>$_smarty_tpl->tpl_vars['custom_to']->value,"custom_custom"=>$_smarty_tpl->tpl_vars['custom_custom']->value,"custom_w"=>$_smarty_tpl->tpl_vars['custom_w']->value,"custom_mo"=>$_smarty_tpl->tpl_vars['custom_mo']->value,"custom_tu"=>$_smarty_tpl->tpl_vars['custom_tu']->value,"custom_we"=>$_smarty_tpl->tpl_vars['custom_we']->value,"custom_th"=>$_smarty_tpl->tpl_vars['custom_th']->value,"custom_fr"=>$_smarty_tpl->tpl_vars['custom_fr']->value,"custom_sa"=>$_smarty_tpl->tpl_vars['custom_sa']->value,"custom_su"=>$_smarty_tpl->tpl_vars['custom_su']->value,"custom_january"=>$_smarty_tpl->tpl_vars['custom_january']->value,"custom_february"=>$_smarty_tpl->tpl_vars['custom_february']->value,"custom_march"=>$_smarty_tpl->tpl_vars['custom_march']->value,"custom_april"=>$_smarty_tpl->tpl_vars['custom_april']->value,"custom_may"=>$_smarty_tpl->tpl_vars['custom_may']->value,"custom_june"=>$_smarty_tpl->tpl_vars['custom_june']->value,"custom_july"=>$_smarty_tpl->tpl_vars['custom_july']->value,"custom_august"=>$_smarty_tpl->tpl_vars['custom_august']->value,"custom_september"=>$_smarty_tpl->tpl_vars['custom_september']->value,"custom_october"=>$_smarty_tpl->tpl_vars['custom_october']->value,"custom_november"=>$_smarty_tpl->tpl_vars['custom_november']->value,"custom_december"=>$_smarty_tpl->tpl_vars['custom_december']->value));
?>
<input type="hidden" id="trans" value='<?php echo json_encode($_smarty_tpl->tpl_vars['trans']->value);?>
'>
<?php }
}
