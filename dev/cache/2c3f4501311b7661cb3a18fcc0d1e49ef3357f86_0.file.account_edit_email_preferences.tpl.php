<?php
/* Smarty version 3.1.30, created on 2019-04-08 15:43:16
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_edit_email_preferences.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cab6c15005039_30270921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c3f4501311b7661cb3a18fcc0d1e49ef3357f86' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_edit_email_preferences.tpl',
      1 => 1554205576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cab6c15005039_30270921 (Smarty_Internal_Template $_smarty_tpl) {
?>



<?php if (isset($_smarty_tpl->tpl_vars['select_options']->value)) {?> 
<select name="email_language" id="email_language" class="form-control"> <opttion></opttion> <?php echo $_smarty_tpl->tpl_vars['select_options']->value;?>
 </select>
<?php }
}
}
