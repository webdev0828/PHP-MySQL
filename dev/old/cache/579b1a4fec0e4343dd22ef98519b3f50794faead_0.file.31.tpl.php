<?php
/* Smarty version 3.1.30, created on 2019-03-23 03:24:48
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/31.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c958ae0c8eec0_32862820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '579b1a4fec0e4343dd22ef98519b3f50794faead' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/31.tpl',
      1 => 1553304287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c958ae0c8eec0_32862820 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-history fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_logs']->value;?>

        </h1>
    </div>

<!-- dynamic table start -->
<div class="panel-group col-md-12 ">
    <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
        <div class="panel-heading"
             style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;">
                <i class="fa fa-file-signature fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_records']->value;?>
</a>
            </h4>
        </div>
        <div id="dyntable_postbacks_Logs" class="panel-collapse collapse in">

            <div class="table-scroll">
                <div class="dateFiltersContainer">
                    <!-- daterangepicker start -->
                    <input type="text" id="postback-range" class="form-control dateranger"/>
                    <!-- daterangepicker end -->
                </div>
                <!-- DataTables HTML start -->
                <table id="dyntable_Postbacks_Logs" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                    <thead>
                    <tr>
                        <th style="text-align:left!important;width:13%;"><?php echo $_smarty_tpl->tpl_vars['custom_date']->value;?>
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
                        <th style="text-align:left!important;width:47%;">URL</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr id="filters">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
                <!-- DataTables HTML end -->
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_assignInScope('trans', array("custom_this_year"=>$_smarty_tpl->tpl_vars['custom_this_year']->value,"custom_last_year"=>$_smarty_tpl->tpl_vars['custom_last_year']->value));
?>

TODO:
<br>- daterangepicker - select date range, for which we check postback (translate from UNIX timestamp from database and check only records between 2 values of 00:00 and 23:59:59 of both dates)
<br>- footer filters - select option + search for all columns, except date
<br><?php }
}
