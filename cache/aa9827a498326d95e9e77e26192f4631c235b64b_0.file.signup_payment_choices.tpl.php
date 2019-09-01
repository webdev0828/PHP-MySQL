<?php
/* Smarty version 3.1.30, created on 2019-04-05 17:33:23
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_payment_choices.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca79163c3c764_37042414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa9827a498326d95e9e77e26192f4631c235b64b' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_payment_choices.tpl',
      1 => 1552993656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca79163c3c764_37042414 (Smarty_Internal_Template $_smarty_tpl) {
?>



<div class="row">
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
		    <h3 class="subhead">
                <?php echo $_smarty_tpl->tpl_vars['commission_method']->value;?>

            </h3>
        </div>
    </div>
            
            <div class="portlet-body">
                <div class="form-group">
                    <div class="col-md-6">
                        <select name="payme" class="form-control">
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['commission_option_percentage']->value)) {?>
                        <option value="1"<?php echo $_smarty_tpl->tpl_vars['payme_selected_1']->value;?>
><?php echo $_smarty_tpl->tpl_vars['signup_commission_style_PPS']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['bot1']->value;?>
%</option>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['commission_option_flatrate']->value)) {?>
                        <option value="2"<?php echo $_smarty_tpl->tpl_vars['payme_selected_2']->value;?>
><?php echo $_smarty_tpl->tpl_vars['signup_commission_style_PPS']->value;?>
: <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['bot2']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</option>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['commission_option_perclick']->value)) {?>
                        <option value="3"<?php echo $_smarty_tpl->tpl_vars['payme_selected_3']->value;?>
><?php echo $_smarty_tpl->tpl_vars['signup_commission_style_PPC']->value;?>
: <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['bot3']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</option>
                        <?php }?>
                        
                        </select>
                    </div>
                </div>
            </div>
</div>
<?php }
}
