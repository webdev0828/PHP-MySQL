<?php
/* Smarty version 3.1.30, created on 2019-04-06 18:33:40
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_custom.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca8c6d4753269_16856351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd156026fc2ed40d164bced822884d15cd3b792a3' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_custom.tpl',
      1 => 1554564818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca8c6d4753269_16856351 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
$(function() {
  $('#payment_method').change(function(){
    $('.payment_selection').hide();
    $('#' + $(this).val()).show();
  });
});
<?php echo '</script'; ?>
>
<div class="output">
<div id="10" class="payment_selection 10">
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        <?php echo $_smarty_tpl->tpl_vars['custom_check_payable_to']->value;?>

                    </h3>

            <div class="portlet-body">
                <span style="color:#532B72;"><b><?php echo $_smarty_tpl->tpl_vars['custom_note']->value;?>
:</b> <?php echo $_smarty_tpl->tpl_vars['custom_us_only']->value;?>
</span>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[1]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_check_recipient']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[1]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[2]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_check_phone_number']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[2]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[3]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_check_state']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[3]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[4]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_check_city']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[4]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[5]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_check_address']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[5]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[6]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_check_zip']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[6]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="8" class="payment_selection 8" style="display:none;"> 
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        ePayService <?php echo $_smarty_tpl->tpl_vars['custom_details']->value;?>

                    </h3>

            <div class="portlet-body">
                <?php echo $_smarty_tpl->tpl_vars['custom_no_epayservice']->value;?>
 <a target="_blank" href="/epayservice"><?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
</a>!
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[7]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_epayservice_wallet_number']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[7]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="11" class="payment_selection 11" style="display:none;"> 
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        TransferWise <?php echo $_smarty_tpl->tpl_vars['custom_details']->value;?>

                    </h3>

            <div class="portlet-body">
                <?php echo $_smarty_tpl->tpl_vars['custom_no_transferwise']->value;?>
 <a target="_blank" href="/transferwise"><?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
</a>!
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[8]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_transferwise_email']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[8]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-at fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[9]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_transferwise_account_holder']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[9]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-user fa-fw">&nbsp;</i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[10]['custom_name'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_transferwise_iban']->value;?>
" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[10]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="9" class="payment_selection 9" style="display:none;"> 
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        WebMoney <?php echo $_smarty_tpl->tpl_vars['custom_details']->value;?>

                    </h3>
                    
            <div class="portlet-body">
                <?php echo $_smarty_tpl->tpl_vars['custom_no_webmoney']->value;?>
 <a target="_blank" href="/webmoney"><?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
</a>!
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[17]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_webmoney_wallet_number']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[17]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="14" class="payment_selection 14" style="display:none;"> 
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        ePayments <?php echo $_smarty_tpl->tpl_vars['custom_details']->value;?>

                    </h3>
                    
            <div class="portlet-body">
                <?php echo $_smarty_tpl->tpl_vars['custom_no_epayments_account']->value;?>
 <a target="_blank" href="/epayments"><?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
</a>!
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[19]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_epayments_wallet_number']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[19]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="12" class="payment_selection 12" style="display:none;"> 
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        WireTransfer EU <?php echo $_smarty_tpl->tpl_vars['custom_details']->value;?>

                    </h3>

            <div class="portlet-body">
                
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[11]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_wiretransfer_account_holder']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[11]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-user fa-fw">&nbsp;</i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[12]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_wiretransfer_iban']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[12]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="13" class="payment_selection 13" style="display:none;"> 
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                    <h3 class="subhead">
                        WireTransfer US <?php echo $_smarty_tpl->tpl_vars['custom_details']->value;?>

                    </h3>

            <div class="portlet-body">
                
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[13]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_wire_us_account_holder']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[13]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-user fa-fw">&nbsp;</i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[14]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_wire_us_routing_number']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[14]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[15]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_wire_us_account_number']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[15]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-hashtag fa-fw" aria-hidden="true"></i>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group input-group-bg">
                        <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[16]['custom_name'];?>
" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_wire_us_account_type']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['custom_input_results']->value[16]['custom_value'];?>
" /><i style="text-shadow: none !important;" class="fa fa-user fa-fw">&nbsp;</i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php }
}
