<?php
/* Smarty version 3.1.30, created on 2019-04-05 17:37:41
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit_payment_method.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca7926511dd66_30540643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8b1d99f291921efa98750f93c761dc480d47f5' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit_payment_method.tpl',
      1 => 1554485860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:signup_payment_methods.tpl' => 1,
    'file:signup_custom.tpl' => 1,
  ),
),false)) {
function content_5ca7926511dd66_30540643 (Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="page-header title" style="background:<?php echo $_smarty_tpl->tpl_vars['heading_back']->value;?>
;">
        <h1 style="color:<?php echo $_smarty_tpl->tpl_vars['heading_text']->value;?>
;">
            <?php echo $_smarty_tpl->tpl_vars['payment_settings']->value;?>

        </h1>
    </div>

    <div class="content-white-area">
        <?php if (isset($_smarty_tpl->tpl_vars['display_edit_errors']->value)) {?>
        <div class="alert alert-danger">
            <h4><?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>
</h4>

            <?php echo $_smarty_tpl->tpl_vars['error_list']->value;?>

        </div>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['edit_success']->value)) {?>
        <div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['edit_success']->value;?>
</div>
        <?php }?>

        <form method="POST" action="account.php" class="form-horizontal" id="account_edit_form">
            
            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
            <input type="hidden" name="edit_payment" value="1">
            <input type="hidden" name="page" value="48">
            <input type="hidden" name="commission_payment" value="1">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                            <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;">
                                <h4>
                                    <?php echo $_smarty_tpl->tpl_vars['signup_commission_title']->value;?>

                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">

                                            <?php $_smarty_tpl->_subTemplateRender("file:signup_payment_methods.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                            <?php $_smarty_tpl->_subTemplateRender("file:signup_custom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-inverse" id="edit_payment_button">
                                        <?php echo $_smarty_tpl->tpl_vars['edit_payment_settings']->value;?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
<?php }
}
