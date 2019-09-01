<?php
/* Smarty version 3.1.30, created on 2019-04-03 13:15:52
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_privacy.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca4b208137c92_40161128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c3fa209b753be67658fcfeb2dcab938edfb5319' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_privacy.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca4b208137c92_40161128 (Smarty_Internal_Template $_smarty_tpl) {
?>



<div class="row">
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        <?php echo $_smarty_tpl->tpl_vars['privacy_signup_title']->value;?>

                    </h3>

            <div class="portlet-body">
                <div class="form-group">
                    <div class="row">
                        <textarea class="form-control col-full" name="privacy_policy" rows="10" readonly><?php echo $_smarty_tpl->tpl_vars['privacy_policy']->value;?>
</textarea>
                    </div>
                </div>
                
                <?php if (isset($_smarty_tpl->tpl_vars['privacy_required']->value)) {?>
                    <div class="form-group">
                        <div class="row">
                        <label class="container"><span style="color:#532B72;">*</span><?php echo $_smarty_tpl->tpl_vars['privacy_signup_agree']->value;?>

                        <input type="checkbox" name="privacy_accepted" value="1"> <span class="checkmark"></span>
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
