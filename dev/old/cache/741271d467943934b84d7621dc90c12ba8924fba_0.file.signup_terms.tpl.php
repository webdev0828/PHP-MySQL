<?php
/* Smarty version 3.1.30, created on 2019-03-17 21:13:10
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_terms.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c8e9c46d69125_96660594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '741271d467943934b84d7621dc90c12ba8924fba' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_terms.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8e9c46d69125_96660594 (Smarty_Internal_Template $_smarty_tpl) {
?>



<div class="row">
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        <?php echo $_smarty_tpl->tpl_vars['signup_terms_title']->value;?>

                    </h3>

            <div class="portlet-body">
                <div class="form-group">
                    <div class="row">
                        <textarea class="form-control col-full" name="terms" rows="10" readonly><?php echo $_smarty_tpl->tpl_vars['terms_t']->value;?>
</textarea>
                    </div>
                </div>

                <?php if (isset($_smarty_tpl->tpl_vars['terms_required']->value)) {?>
                <div class="form-group">
                    <div class="row">
                        <label class="container"><span style="color:#532B72;">*</span><?php echo $_smarty_tpl->tpl_vars['signup_terms_agree']->value;?>

                        <input type="checkbox" name="accepted" value="1"> <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }
}
