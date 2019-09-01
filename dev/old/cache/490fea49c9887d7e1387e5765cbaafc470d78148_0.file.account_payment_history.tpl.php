<?php
/* Smarty version 3.1.30, created on 2019-03-31 11:07:12
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_payment_history.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca09f60d30ec0_68596282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '490fea49c9887d7e1387e5765cbaafc470d78148' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_payment_history.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca09f60d30ec0_68596282 (Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-euro fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['payment_title']->value;?>

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
                    <i class="fa fa-file-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_invoices']->value;?>

<!-- hide
                    <?php if (isset($_smarty_tpl->tpl_vars['payment_history_exists']->value)) {?>
                    <span> 
                        <span class="label label-primary">
                            <?php echo $_smarty_tpl->tpl_vars['custom_total']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['payments_total']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['payment_commissions']->value;?>

                        </span>

                        <span class="label label-danger">
                            <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {?>
                                <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;?>

                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['payments_archived']->value;?>

                            <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?>
                                <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;?>

                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>


                        </span>
                    <?php }?>
                    </span>
-->
                </h4>
                </div>
            </div>
            <div i class="panel-collapse collapse in">

                <?php if (isset($_smarty_tpl->tpl_vars['payment_history_exists']->value)) {?>
                <table id='dyntable_payment_history' class="table table-bordered table-hover tc-table" style="background: #121212;color:#fff;">
                    <thead>
                        <tr>
                            <th style="text-align:left !important;"><?php echo $_smarty_tpl->tpl_vars['payment_date']->value;?>
</th>

                            <th><?php echo $_smarty_tpl->tpl_vars['payment_commissions']->value;?>
</th>

                            <th><?php echo $_smarty_tpl->tpl_vars['payment_amount']->value;?>
</th>
                            
                            <?php if ($_smarty_tpl->tpl_vars['invoice_enabled']->value) {?>
                            <th class="no-sort"></th>
                            <?php }?>

                        </tr>
                    </thead>
                    
                    <tbody></tbody>
                    <tfoot>
                    <tr id="totals">
                        <th><?php echo $_smarty_tpl->tpl_vars['custom_total']->value;?>
:</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>

                
                <?php echo '<script'; ?>
>
                    var dyntable_payment_history_col = 2;
                    
                    <?php if ($_smarty_tpl->tpl_vars['invoice_enable']->value) {?> dyntable_payment_history_col = 3;<?php }?>
                    
                <?php echo '</script'; ?>
>
                
                
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['payment_none']->value;?>

                <?php }?>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div><?php }
}
