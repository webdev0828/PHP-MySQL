<?php
/* Smarty version 3.1.30, created on 2019-03-27 08:27:46
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_banners.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c9b17e2051e32_95372970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adbde6e07abc03e5dcee442cf89c83471a2743f5' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_banners.tpl',
      1 => 1553667936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9b17e2051e32_95372970 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/dev/templates/smarty/plugins/modifier.replace.php';
?>

<?php ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable1=ob_get_clean();
ob_start();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable1,''),'</a>','');
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('direct_url', $_prefixVariable2);
ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable3=ob_get_clean();
ob_start();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="https://sublimerevenue.com/',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable3,''),'</a>','');
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('banner_id', $_prefixVariable4);
ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable5=ob_get_clean();
ob_start();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable5,''),'</a>','');
$_prefixVariable6=ob_get_clean();
$_smarty_tpl->_assignInScope('banner_url', $_prefixVariable6);
echo '<script'; ?>
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
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['one_click_delivery']->value)) {?>
                    <?php
$__section_nr_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['banner_link_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total != 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                                        <h4>
                                            <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_group_name'],'SmartLink','Smart Banner');?>
 <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_size_1'];?>
 x <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_size_2'];?>
 <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_description'];?>

                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-group">
                                        <!-- hide
                                        <li class="list-group-item">
                                            <label><?php echo $_smarty_tpl->tpl_vars['banners_size']->value;?>
:</label> <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_size_1'];?>
 x <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_size_2'];?>

                                        </li>

                                        <li class="list-group-item">
                                            <label><?php echo $_smarty_tpl->tpl_vars['banners_description']->value;?>
:</label> <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_description'];?>

                                        </li>

                                        <li class="list-group-item">
                                            <label><?php echo $_smarty_tpl->tpl_vars['marketing_target_url']->value;?>
:</label> <a href="<?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_target_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_target_url'];?>
</a>
                                        </li>
                                        -->
                                        <li class="list-group-item">
                                            <label style="width:100%;"><?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];?>

                                            
                                            <br />
                                            <br/>

                                            <?php echo $_smarty_tpl->tpl_vars['marketing_source_code']->value;?>

                                            </label>

                                            <br/>

                                            <textarea id="" rows="2" class="form-control"><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable7=ob_get_clean();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable7,''),'</a>','');?>
" target="_blank" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];?>
</a></textarea>
    <?php if (isset($_smarty_tpl->tpl_vars['custom_links_enabled']->value)) {
echo '<script'; ?>
>
function parammeterize() {
    var tid1 = document.getElementById('tid1').value;
    var tid2 = document.getElementById('tid2').value;
    var tid3 = document.getElementById('tid3').value;
    var tid4 = document.getElementById('tid4').value;
 
    var html = '<a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable8=ob_get_clean();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable8,''),'</a>','');?>
?tid1=' + tid1 + '&tid2=' + tid2 + '&tid3=' + tid3 + '&tid4=' + tid4 + '" target="_blank" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];?>
</a>'';

    document.querySelectorAll('parammed-banner-<?php ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable9=ob_get_clean();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="https://sublimerevenue.com/',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable9,''),'</a>',''),'.php','');?>
').innerHTML = html;
}
 
document.getElementById('add_parameters').addEventListener('click', parammeterize);
<?php echo '</script'; ?>
>
    <?php }?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
}
}
if ($__section_nr_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_0_saved;
}
?>

                    <?php } else { ?>
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
                <!-- DataTables HTML start -->
                <table id="dyntable_Offers" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="width:8px;"></th>
                        <th style="text-align:left !important;"><?php echo $_smarty_tpl->tpl_vars['custom_offer_name']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_niche']->value;?>
</th>
                        <th style="width:11%;"><?php echo $_smarty_tpl->tpl_vars['custom_countries']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_devices']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_os']->value;?>
</th>
                        <th style="width:5%;"><?php echo $_smarty_tpl->tpl_vars['custom_connection_type']->value;?>
</th>
                        <th style="width:9%;"><?php echo $_smarty_tpl->tpl_vars['custom_mobile_carriers']->value;?>
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
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select id="country-filter" style="width:100%;" class="form-control">
                                    <option value=""></option>
                                </select>
                            </td>

                            <td>
                                <select id="devices-filter" style="width:100%;" class="form-control devices-filter">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select id="os-filter" style="width:100%;" class="form-control">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <select id="connection-filter" style="width:100%;" class="form-control">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                
                                    
                                
                            </td>
                            <td>
                                <select id="flow-filter" style="width:100%;" class="form-control">
                                    <option value=""></option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <?php echo '<script'; ?>
 type="text/javascript">
                    window.jstext = {
                        language : {
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
                            "custom_limit_is":"<?php echo $_smarty_tpl->tpl_vars['custom_limit_is']->value;?>
"
                        }
                    }
                <?php echo '</script'; ?>
>
                <!-- DataTables HTML end -->
                <div> <span class="label label-success">!NB</span>
                <ul style="font-size: 1.4rem;">
                    <li>More offers coming soon... </li>
                    <li>EPC stats is separate for each smart tool and each direct offer promo tool no matter smart tools MAY contain offers from direct offers table. This is done in order to evaluate performance of each based on promotion method, etc.</li>
                    <li>Payouts value WILL vary based on your affiliate level.</li>
                    <li>Payouts value displayed in EUR units may vary based on currency exchange rates at both the time of table display and time of transaction.</li>
                    <li>Failure to comply with offer restrictions and GEO regulations may result not only in a serious fine from local govenrments but your account being suspended, no payouts made or even a lawsuit with all its consequences.</li>
                </ul>
                </div>
<!-- hide
                                <div class="portlet-body">
                                    TODO: add DataTables table with offers
                                    <form class="form-horizontal" role="form" method="post" action="/dashboard/promo-tools/direct-offers">
                                        <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                                        <input type="hidden" name="page" value="7">
                                                    <?php
$__section_nr_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['banner_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total != 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                                <button type="submit" name="banner_picked" class="portlet-title" style="border:0;margin:1px;padding:14px 19px;color:#fff;text-align:left;width:100%;background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;" value="<?php echo $_smarty_tpl->tpl_vars['banner_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_group_id'];?>
"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_group_name'],'SmartLink','Smart Banner');?>

                                                </button>
                                                    <?php
}
}
if ($__section_nr_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_1_saved;
}
?>
                                    </form>
                                </div>
-->
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['banner_group_chosen']->value)) {?>
                            <div class="portlet banner-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;margin-bottom: -10px;">
                                        <h4 style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#banner-tracking">
                    <i class="fa fa-sliders-h fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_link_customization']->value;?>


                    <span class="pull-right">
                        <i class="fa fa-angle-down"></i>
                    </span>
                                        </h4>
                                    </div>

                            <div id="banner-tracking" class="panel-collapse collapse" style="background-color:#fff;color:#000">
                                <ul class="list-group">
                                            <li class="list-group-item">
                                                <label><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 1:</label> <input type="text" id="tid1" name="tid1">
                                            </li>
                                            <li class="list-group-item">
                                                <label><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 2:</label> <input type="text" id="tid2" name="tid2">
                                            </li>
                                            <li class="list-group-item">
                                                <label><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 3:</label> <input type="text" id="tid3" name="tid3">
                                            </li>
                                            <li class="list-group-item">
                                                <label><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 4:</label> <input type="text" id="tid4" name="tid4">
                                            </li>
                                            <li class="list-group-item">
                                                <button id="add_parameters" name="submit" class="btn btn-primary">
                                                <?php echo $_smarty_tpl->tpl_vars['custom_apply_tracking']->value;?>

                                                </button>
                                            </li>
                                </ul>
                            </div>
                                 </div>
                            </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet banner-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;" class="panel-collapse collapse">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                                        <h4>
                                        <i class="fa fa-link fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_direct_link']->value;?>

                                        </h4>
                                    </div>
                                        <div class="portlet-body"><label><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['marketing_target_url']->value,'sublimerevenue.com','srtrak.com');?>
:</label>
                                            <textarea id="direct-link" rows="1" class="form-control"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['direct_url']->value,'sublimerevenue.com','srtrak.com');?>
</textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
$__section_nr_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['banner_link_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_2_total = $__section_nr_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_2_total != 0) {
for ($__section_nr_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_2_iteration <= $__section_nr_2_total; $__section_nr_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable10=ob_get_clean();
ob_start();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="https://sublimerevenue.com/',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable10,''),'</a>','');
$_prefixVariable11=ob_get_clean();
$_smarty_tpl->_assignInScope('banner_id', $_prefixVariable11);
ob_start();
echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'];
$_prefixVariable12=ob_get_clean();
ob_start();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_code'],'<a href="',''),'" target="_blank" rel="nofollow">',''),$_prefixVariable12,''),'</a>','');
$_prefixVariable13=ob_get_clean();
$_smarty_tpl->_assignInScope('banner_url', $_prefixVariable13);
ob_start();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'],'sublimerevenue.com/media/banners','static.sublimerevenue.com');
$_prefixVariable14=ob_get_clean();
$_smarty_tpl->_assignInScope('kartinka', $_prefixVariable14);
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet banner-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;" class="panel-collapse collapse">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                                        <h4>
                                            <i class="fa fa-image fa-fw"></i> <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_chosen_group_name']->value,'SmartLink','Smart Banner');?>
 <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_description'];?>
 <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_size_1'];?>
 x <?php echo $_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_size_2'];?>

                                        </h4>
                                    </div>
                                </div>
<!-- TODO add collapse + button  to class list-group or this class PER BANNER DIMENSION -->
                                <div class="portlet-body">
<!-- TODO add collapse + button  to class list-group or this class PER BANNER DIMENSION -->
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label style="width:100%;"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'],'sublimerevenue.com/media/banners','static.sublimerevenue.com');?>


                                            <br/>
                                            <br/>

                                            <?php echo $_smarty_tpl->tpl_vars['marketing_source_code']->value;?>

                                            </label>

                                            <br/>

                                            <textarea id="parammed_banner_<?php echo $_smarty_tpl->tpl_vars['banner_id']->value;?>
" rows="2" class="form-control"><a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_url']->value,'sublimerevenue.com','srtrak.com');?>
" target="_blank" rel="nofollow"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['banner_display'],'sublimerevenue.com/media/banners','static.sublimerevenue.com');?>
</a></textarea>
                                        </li>
    <?php if (isset($_smarty_tpl->tpl_vars['custom_links_enabled']->value)) {
echo '<script'; ?>
>
function parammeterize() {
    var tid1 = document.getElementById('tid1').value;
    var tid2 = document.getElementById('tid2').value;
    var tid3 = document.getElementById('tid3').value;
    var tid4 = document.getElementById('tid4').value;

    var html = '<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_url']->value,'sublimerevenue.com','srtrak.com');?>
?tid1=' + tid1 + '&tid2=' + tid2 + '&tid3=' + tid3 + '&tid4=' + tid4 + '" target="_blank" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['kartinka']->value;?>
</a>';
    var html2 = '<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['banner_url']->value,'sublimerevenue.com','srtrak.com');?>
?tid1=' + tid1 + '&tid2=' + tid2 + '&tid3=' + tid3 + '&tid4=' + tid4;

var myClasses = document.getElementsByClassName("form-control");
for (var i = 0; i < myClasses.length; i++) {
  myClasses[i].innerHTML = html;
  }
    document.getElementById('direct-link').innerHTML = html2;
}

document.getElementById('add_parameters').addEventListener('click', parammeterize);
<?php echo '</script'; ?>
>
    <?php }
echo '<script'; ?>
>
document.getElementById("parammed_banner_<?php echo $_smarty_tpl->tpl_vars['banner_id']->value;?>
").onclick = function() {
  this.select();
  document.execCommand('copy');
  swal('<?php echo $_smarty_tpl->tpl_vars['custom_copied_to_clipboard']->value;?>
!\n<?php echo $_smarty_tpl->tpl_vars['custom_good_luck']->value;?>
!');
}
<?php echo '</script'; ?>
>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
}
}
if ($__section_nr_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_2_saved;
}
?>
                    
                        <?php } else { ?>
                            
                            
                            
                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php echo '<script'; ?>
>
document.getElementById("direct-link").onclick = function() {
  this.select();
  document.execCommand('copy');
  swal('<?php echo $_smarty_tpl->tpl_vars['custom_copied_to_clipboard']->value;?>
!\n<?php echo $_smarty_tpl->tpl_vars['custom_good_luck']->value;?>
!');
}
<?php echo '</script'; ?>
>
<style>
.details-control {
    background: url('/templates/themes/SublimeRevenue/images/details_open.png') no-repeat center center;
    cursor: pointer;
    display: block;
    height:40px;
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
    .select2-container{
        width : 80% !important;
    }
.select2-dropdown {
        width : auto !important;
        white-space: nowrap;
}
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
    $('div.offers-filter select').select2();
    $("div.dataTables_length select").select2({minimumResultsForSearch: Infinity});
});
<?php echo '</script'; ?>
>
<?php }
}
