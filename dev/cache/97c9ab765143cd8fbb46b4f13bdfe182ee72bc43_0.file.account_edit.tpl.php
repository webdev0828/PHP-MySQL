<?php
/* Smarty version 3.1.30, created on 2019-04-08 15:43:16
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cab6c14f233c7_94311790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97c9ab765143cd8fbb46b4f13bdfe182ee72bc43' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_edit.tpl',
      1 => 1554449175,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:account_edit_custom.tpl' => 1,
    'file:account_edit_email_preferences.tpl' => 1,
  ),
),false)) {
function content_5cab6c14f233c7_94311790 (Smarty_Internal_Template $_smarty_tpl) {
?>


            <?php if (isset($_smarty_tpl->tpl_vars['edit_success']->value)) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-success">
                            <?php echo $_smarty_tpl->tpl_vars['edit_success']->value;?>

                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['display_edit_errors']->value)) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-danger">
                            <h4><?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>
</h4>
                            <?php echo $_smarty_tpl->tpl_vars['error_list']->value;?>

                            
                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            <?php }?>

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-edit fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['edit_button']->value;?>

        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
    <div class="content-white-area">

        <?php $_smarty_tpl->_subTemplateRender("file:account_edit_custom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
        <form method="POST" action="/dashboard/manage-account/edit-account" class="form-horizontal" id="account_edit_form">
            
            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
            <input type="hidden" name="edit" value="1">
            <input type="hidden" name="page" value="17">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;">
                                <h4>
                                    <i class="fa fa-user fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['account_edit_general_prefs']->value;?>

                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                    <?php $_smarty_tpl->_subTemplateRender("file:account_edit_email_preferences.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                </div>
                            </div>

                            <?php if (isset($_smarty_tpl->tpl_vars['optionals_used']->value)) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['row_email']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="email" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postemail']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_standard_email']->value;?>
" tabindex="4">
                                    	<i style="text-shadow: none !important;" class="fa fa-at fa-fw" aria-hidden="true"></i>
                                	</div>
                                </div>
                            </div>
                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['row_company']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="company" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postcompany']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_standard_company']->value;?>
" tabindex="5">
                                    	<i style="text-shadow: none !important;" class="fa fa-building fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <?php }?>



                            <?php if (isset($_smarty_tpl->tpl_vars['row_website']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="url" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postwebsite']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_standard_weburl']->value;?>
" tabindex="7">
                                    	<i style="text-shadow: none !important;" class="fa fa-link fa-fw" aria-hidden="true"></i>
                                	</div>
                                </div>
                            </div>
                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['row_taxinfo']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="tax_id_ssn" size="30" value="<?php echo $_smarty_tpl->tpl_vars['posttax']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_standard_taxinfo']->value;?>
" tabindex="8">
                                    	<i style="text-shadow: none !important;" class="fa fa-id-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php }?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;">
                                <h4>
                                    <i class="fa fa-user fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['edit_personal_title']->value;?>

                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
	                                    <input type="text" class="form-control" name="f_name" value="<?php echo $_smarty_tpl->tpl_vars['postfname']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_fname']->value;?>
" tabindex="9">
    	                                <i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
    	                            </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="l_name" value="<?php echo $_smarty_tpl->tpl_vars['postlname']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_lname']->value;?>
" tabindex="10">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['postphone']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_phone']->value;?>
" tabindex="15">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                	</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>
                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="fax" value="<?php echo $_smarty_tpl->tpl_vars['postfaxnm']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_fax']->value;?>
" tabindex="16">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="address_one" value="<?php echo $_smarty_tpl->tpl_vars['postaddr1']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_addr1']->value;?>
" tabindex="11">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="address_two" value="<?php echo $_smarty_tpl->tpl_vars['postaddr2']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_addr2']->value;?>
" tabindex="12">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="city" value="<?php echo $_smarty_tpl->tpl_vars['postcity']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_city']->value;?>
" tabindex="13">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="state" value="<?php echo $_smarty_tpl->tpl_vars['poststate']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_state']->value;?>
" tabindex="14">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                	<div class="input-group input-group-bgp">
                                    	<input type="text" class="form-control" name="zip" value="<?php echo $_smarty_tpl->tpl_vars['postzip']->value;?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['edit_personal_zip']->value;?>
" tabindex="17">
                                    	<i style="text-shadow: none !important;" class="fa fa-address-card fa-fw" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"></label>

                                <div class="col-sm-6">
                                    <select name="country" id="country" class="form-control">
                                    	<option></option>
                                        <?php echo $_smarty_tpl->tpl_vars['c_drop']->value;?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['edit_button']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['edit_button']->value;?>
</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
                        </div>
                    </div>
                </div>
            </div>

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
    $('#email_language').select2({minimumResultsForSearch: Infinity, placeholder: "<?php echo $_smarty_tpl->tpl_vars['account_edit_email_language']->value;?>
",allowClear: true});
    $('#country').select2({placeholder: "<?php echo $_smarty_tpl->tpl_vars['edit_personal_country']->value;?>
",allowClear: true});
});
<?php echo '</script'; ?>
>
<?php }
}
