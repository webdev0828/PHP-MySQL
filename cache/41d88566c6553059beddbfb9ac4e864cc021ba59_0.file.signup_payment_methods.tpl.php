<?php
/* Smarty version 3.1.30, created on 2019-04-08 08:16:32
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_payment_methods.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cab0360c02310_18497495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41d88566c6553059beddbfb9ac4e864cc021ba59' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/signup_payment_methods.tpl',
      1 => 1554711297,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cab0360c02310_18497495 (Smarty_Internal_Template $_smarty_tpl) {
?>



<div class="row" style="margin-left:0.1rem;">
    <div class="col-md-12">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
		    <h3 class="subhead">
                        <?php echo $_smarty_tpl->tpl_vars['signup_commission_title']->value;?>

            </h3>

            <div class="portlet-body">
                <?php if ((isset($_smarty_tpl->tpl_vars['select_multiple_methods']->value))) {?>
                    <div class="form-group">                        
                        <div class="col-md-6">
                            <div class="input-group input-group-bg">
                                <select name="payment_method" class="form-control" id="payment_method">
                                    <?php echo $_smarty_tpl->tpl_vars['select_available_payment_methods']->value;?>

                                </select>
                                <i style="text-shadow: none !important;" class="fa fa-euro-sign fa-fw" aria-hidden="true">&nbsp;</i>
                            </div>
                            <span class="help-block">
                                <?php echo $_smarty_tpl->tpl_vars['payment_method_description']->value;?>

                            </span>
                        </div>
                    </div>

                    <!-- paypal settings -->
                    <div class="form-group payment_method" id="paypal_settings">
                        <label style="width:300px;" class="col-md-3 control-label"><?php echo $_smarty_tpl->tpl_vars['paypal_email']->value;?>
 <span style="color:#532B72;">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pp_account" value="<?php echo $_smarty_tpl->tpl_vars['pp_account']->value;?>
" />
                        </div>
                    </div>

                    <!-- stripe settings -->
                    <div class="form-group payment_method" id="stripe_settings" >
                        <label style="width:300px;" class="col-md-3 control-label"><?php echo $_smarty_tpl->tpl_vars['stripe_acct_details']->value;?>
</label>
                        <div class="col-md-6">
                            <h5>
                                <?php echo $_smarty_tpl->tpl_vars['stripe_connect']->value;?>

                            </h5>
                        </div>
                    </div>
                
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['payment_method_description']->value;?>

                <?php }?>
            </div>
        </div>
    </div>
</div>


    <?php echo '<script'; ?>
 type="text/javascript">

        jQuery(function ($) {
            function changePaymentMethod() {
                $('.payment_method').hide();
                $('span.payment_description').hide();

                var val = $('#payment_method').val();
                $('span.method_' + val).show();
                
                if (val == 1) { /*paypal is selected*/
                    $('#paypal_settings').show();
                } else if (val == 2) { /*stripe selected*/
                    $('#stripe_settings').show();
                }
            }

            changePaymentMethod();
            $('body').on('change', '#payment_method', function () {
                changePaymentMethod();
            });
        });

    <?php echo '</script'; ?>
>

<?php }
}
