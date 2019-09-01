<?php
/* Smarty version 3.1.30, created on 2019-04-10 07:08:18
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_banners.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cad9662060a97_22068439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adbde6e07abc03e5dcee442cf89c83471a2743f5' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_banners.tpl',
      1 => 1554536976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cad9662060a97_22068439 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="//bartaz.github.io/sandbox.js/jquery.highlight.js"><?php echo '</script'; ?>
>
<link href="//cdn.datatables.net/plug-ins/1.10.19/features/searchHighlight/dataTables.searchHighlight.css">
<?php echo '<script'; ?>
 src="//cdn.datatables.net/plug-ins/1.10.19/features/searchHighlight/dataTables.searchHighlight.min.js"><?php echo '</script'; ?>
>
    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-cart-arrow-down fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_offers']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['offer_id']->value;?>

        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic banner-port">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet banner-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;">
                                        <h4>
                                            <i class="fa fa-hand-pointer fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_choose_an_offer']->value;?>

                                        </h4>
                                    </div>
                                </div>
            <div id="Offerstbl" class="panel-collapse collapse in">
                <!-- DataTables HTML start -->
                <table id="dyntable_Offers" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>   

                    <tr>
                        <th style="width:4%;"></th>
                        <th style="text-align:left !important;"><?php echo $_smarty_tpl->tpl_vars['custom_offer_name']->value;?>
</th>
                        <th style="width:6%;"><?php echo $_smarty_tpl->tpl_vars['custom_niche']->value;?>
</th>
                        <th style="width:11%;"><?php echo $_smarty_tpl->tpl_vars['custom_countries']->value;?>
</th>
                        <th style="width:6%;"><?php echo $_smarty_tpl->tpl_vars['custom_devices']->value;?>
</th>
                        <th style="width:6%;"><?php echo $_smarty_tpl->tpl_vars['custom_os']->value;?>
</th>
                        <th style="width:6%;"><?php echo $_smarty_tpl->tpl_vars['custom_connection_type']->value;?>
</th>
                        <th style="width:6%;"><?php echo $_smarty_tpl->tpl_vars['custom_mobile_carriers']->value;?>
</th>
                        <th style="width:13%;"><?php echo $_smarty_tpl->tpl_vars['custom_flow_type']->value;?>
</th>
                        <th style="width:12%;"><?php echo $_smarty_tpl->tpl_vars['custom_payout']->value;?>
</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <select id="niche-filter" style="width:100%;" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="country-filter" style="width:100%;" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>

                            <td>
                                <select id="devices-filter" style="width:100%;" class="form-control devices-filter">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="os-filter" style="width:100%;" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>
                                <select id="connection-filter" style="width:100%;" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td>

                            </td>
                            <td>
                                <select id="flow-filter" style="width:100%;" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
</option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
                <?php echo '<script'; ?>
 type="text/javascript">
                    window.jstext = {
                        language : {
                            "custom_show": "<?php echo $_smarty_tpl->tpl_vars['custom_show']->value;?>
",
                            "custom_link_customization": "<?php echo $_smarty_tpl->tpl_vars['custom_link_customization']->value;?>
",
                            "custom_tracking_id": "<?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
",
                            "custom_apply_tracking": "<?php echo $_smarty_tpl->tpl_vars['custom_apply_tracking']->value;?>
",
                            "custom_direct_link":"<?php echo $_smarty_tpl->tpl_vars['custom_direct_link']->value;?>
",
                            "custom_copied_to_clipboard":"<?php echo $_smarty_tpl->tpl_vars['custom_copied_to_clipboard']->value;?>
",
                            "custom_good_luck":"<?php echo $_smarty_tpl->tpl_vars['custom_good_luck']->value;?>
",
                            "marketing_target_url":"<?php echo $_smarty_tpl->tpl_vars['marketing_target_url']->value;?>
",
                            "marketing_source_code":"<?php echo $_smarty_tpl->tpl_vars['marketing_source_code']->value;?>
",
                            "custom_raw_visits":"<?php echo $_smarty_tpl->tpl_vars['custom_raw_visits']->value;?>
",
                            "custom_transactions":"<?php echo $_smarty_tpl->tpl_vars['custom_transactions']->value;?>
",
                            "custom_earnings":"<?php echo $_smarty_tpl->tpl_vars['custom_earnings']->value;?>
",
                            "custom_sub_id":"<?php echo $_smarty_tpl->tpl_vars['custom_sub_id']->value;?>
",
                            "custom_offer_details":"<?php echo $_smarty_tpl->tpl_vars['custom_offer_details']->value;?>
",
                            "custom_countries":"<?php echo $_smarty_tpl->tpl_vars['custom_countries']->value;?>
",
                            "custom_niche":"<?php echo $_smarty_tpl->tpl_vars['custom_niche']->value;?>
",
                            "custom_devices":"<?php echo $_smarty_tpl->tpl_vars['custom_devices']->value;?>
",
                            "custom_os":"<?php echo $_smarty_tpl->tpl_vars['custom_os']->value;?>
",
                            "custom_connection_type":"<?php echo $_smarty_tpl->tpl_vars['custom_connection_type']->value;?>
",
                            "custom_mobile_carriers":"<?php echo $_smarty_tpl->tpl_vars['custom_mobile_carriers']->value;?>
",
                            "custom_flow_type":"<?php echo $_smarty_tpl->tpl_vars['custom_flow_type']->value;?>
",
                            "custom_payout":"<?php echo $_smarty_tpl->tpl_vars['custom_payout']->value;?>
",
                            "custom_conversion_flow":"<?php echo $_smarty_tpl->tpl_vars['custom_conversion_flow']->value;?>
",
                            "custom_restrictions":"<?php echo $_smarty_tpl->tpl_vars['custom_restrictions']->value;?>
",
                            "custom_add_remove_filters":"<?php echo $_smarty_tpl->tpl_vars['custom_add_remove_filters']->value;?>
",
                            "custom_filter_by_landing":"<?php echo $_smarty_tpl->tpl_vars['custom_filter_by_landing']->value;?>
",
                            "custom_filter_by_width":"<?php echo $_smarty_tpl->tpl_vars['custom_filter_by_width']->value;?>
",
                            "custom_filter_by_height":"<?php echo $_smarty_tpl->tpl_vars['custom_filter_by_height']->value;?>
",
                            "custom_filter_by_language":"<?php echo $_smarty_tpl->tpl_vars['custom_filter_by_language']->value;?>
",
                            "custom_filter_by_set":"<?php echo $_smarty_tpl->tpl_vars['custom_filter_by_set']->value;?>
",
                            "custom_all":"<?php echo $_smarty_tpl->tpl_vars['custom_all']->value;?>
",
                            "custom_landing":"<?php echo $_smarty_tpl->tpl_vars['custom_landing']->value;?>
",
                            "custom_pre_landing":"<?php echo $_smarty_tpl->tpl_vars['custom_pre_landing']->value;?>
",
                            "custom_links":"<?php echo $_smarty_tpl->tpl_vars['custom_links']->value;?>
",
                            "custom_banners":"<?php echo $_smarty_tpl->tpl_vars['custom_banners']->value;?>
",
                            "custom_please":"<?php echo $_smarty_tpl->tpl_vars['custom_please']->value;?>
",
                            "custom_contact_manager":"<?php echo $_smarty_tpl->tpl_vars['custom_contact_manager']->value;?>
",
                            "custom_for_discussion":"<?php echo $_smarty_tpl->tpl_vars['custom_for_discussion']->value;?>
",
                            "custom_download":"<?php echo $_smarty_tpl->tpl_vars['custom_download']->value;?>
",
                            "custom_need_more_creatives":"<?php echo $_smarty_tpl->tpl_vars['custom_need_more_creatives']->value;?>
",
                            "custom_custom_filter_by_geo":"<?php echo $_smarty_tpl->tpl_vars['custom_custom_filter_by_geo']->value;?>
",
                            "custom_max_length_reached":"<?php echo $_smarty_tpl->tpl_vars['custom_max_length_reached']->value;?>
",
                            "custom_add_new":"<?php echo $_smarty_tpl->tpl_vars['custom_add_new']->value;?>
",
                            "custom_delete":"<?php echo $_smarty_tpl->tpl_vars['custom_delete']->value;?>
",
                            "custom_submit":"<?php echo $_smarty_tpl->tpl_vars['custom_submit']->value;?>
",
                            "custom_custom_offer_type":"<?php echo $_smarty_tpl->tpl_vars['custom_custom_offer_type']->value;?>
",
                            "custom_custom_running":"<?php echo $_smarty_tpl->tpl_vars['custom_custom_running']->value;?>
",
                            "custom_running_link":"<?php echo $_smarty_tpl->tpl_vars['custom_running_link']->value;?>
",
                            "custom_running_banner":"<?php echo $_smarty_tpl->tpl_vars['custom_running_banner']->value;?>
",
                            "custom_method":"<?php echo $_smarty_tpl->tpl_vars['custom_method']->value;?>
",
                            "custom_save":"<?php echo $_smarty_tpl->tpl_vars['custom_save']->value;?>
",
                            "custom_add":"<?php echo $_smarty_tpl->tpl_vars['custom_add']->value;?>
",
                            "custom_remove":"<?php echo $_smarty_tpl->tpl_vars['custom_remove']->value;?>
",
                            "custom_offer":"<?php echo $_smarty_tpl->tpl_vars['custom_offer']->value;?>
",
                            "custom_sts_postback":"<?php echo $_smarty_tpl->tpl_vars['custom_sts_postback']->value;?>
",
                            "custom_action_notification":"<?php echo $_smarty_tpl->tpl_vars['custom_action_notification']->value;?>
",
                            "custom_limit_is":"<?php echo $_smarty_tpl->tpl_vars['custom_limit_is']->value;?>
"
                        }
                    }
                <?php echo '</script'; ?>
>
                <!-- DataTables HTML end -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
.details-control {
    background: url('/templates/themes/SublimeRevenue/images/details_open.png') no-repeat center center;
    cursor: pointer;
    display: block;
    height:6rem;
}
.dataTable .highlight {
    background: rgba(244, 206, 33, 0.99) !important;
    color: #000 !important;
    text-shadow:none;
    font-weight: 700;
    padding: 0px !important;
}
.details-control.open {
    background: url('/templates/themes/SublimeRevenue/images/details_close.png') no-repeat center center;
}
.details-control:hover,
.details-control:active,
.details-control:focus { border: none; outline: none; }
</style>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
    $('#niche-filter').select2();
    $('#country-filter').select2();
    $('#devices-filter').select2();
    $('#os-filter').select2();
    $('#connection-filter').select2();
    $('#flow-filter').select2();
});
<?php echo '</script'; ?>
><?php }
}
