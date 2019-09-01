<?php
/* Smarty version 3.1.30, created on 2019-04-08 07:08:38
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_suspended.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5caaf3767ab609_24073887',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cc3b26bbf45711c0766b4b7f425f1bc10a15ee8' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_suspended.tpl',
      1 => 1554707065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5caaf3767ab609_24073887 (Smarty_Internal_Template $_smarty_tpl) {
?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-danger">
                            <h4><i class="fas fa-exclamation-triangle fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['suspended_page_title']->value;?>
</h4>
                            <?php echo $_smarty_tpl->tpl_vars['suspended_page_heading']->value;?>
!
                            <br/>
                            <?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <?php }
}
