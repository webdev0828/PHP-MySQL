<?php
/* Smarty version 3.1.30, created on 2019-03-15 18:30:19
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit_custom.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c8bd31ba3d5d9_49031496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '578e0db925392e667a2809addda32be3c92aa38b' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit_custom.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8bd31ba3d5d9_49031496 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
?>



    <?php if (isset($_smarty_tpl->tpl_vars['fields_custom_array']->value)) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;">
                        <h4>
                            <i class="fa fa-euro fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_fields_title']->value;?>
 - <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['res_method']->value,'10','Check'),'8','ePayService'),'11','TransferWise'),'9','WebMoney'),'12','Wire Transfer EU'),'13','WireTransfer US');?>

                        </h4>
                    </div>
                </div>

                <div class="portlet-body">
                    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_custom_array']->value, 'fields');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fields']->value) {
?>
    <?php if (empty($_smarty_tpl->tpl_vars['fields']->value['custom_value'])) {?>
    <?php } else { ?>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['fields']->value['custom_title'],'(Check) ',''),'(ePayService) ',''),'(TransferWise) ',''),'(WireTransfer EU) ',''),'(WireTransfer US) ',''),'(WebMoney) ','');?>
</label>

                            <div class="col-md-7">
                                <label class="col-md-5 control-label" style="text-align: left;"><?php echo $_smarty_tpl->tpl_vars['fields']->value['custom_value'];?>
</label>
                            </div>
                        </div>
                    </div>
    <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                </div>
            </div>
        </div>
    </div>
    <?php }
}
}
