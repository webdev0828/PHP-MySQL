<?php
/* Smarty version 3.1.30, created on 2019-03-23 02:20:37
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit_email_preferences.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c957bd5113b15_80553154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36c803cb8b1248e488e3f88a912c4644bd2fad93' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit_email_preferences.tpl',
      1 => 1553300425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c957bd5113b15_80553154 (Smarty_Internal_Template $_smarty_tpl) {
?>



<?php if (isset($_smarty_tpl->tpl_vars['select_options']->value)) {?> 
<select name="email_language" id="email_language" class="form-control"> <?php echo $_smarty_tpl->tpl_vars['select_options']->value;?>
 </select>
<?php }
}
}
