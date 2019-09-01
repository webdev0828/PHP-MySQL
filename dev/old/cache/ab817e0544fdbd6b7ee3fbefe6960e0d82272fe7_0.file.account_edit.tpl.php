<?php
/* Smarty version 3.1.30, created on 2019-03-23 02:20:37
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c957bd510a131_71566161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab817e0544fdbd6b7ee3fbefe6960e0d82272fe7' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_edit.tpl',
      1 => 1553300432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:account_edit_custom.tpl' => 1,
    'file:account_edit_email_preferences.tpl' => 1,
  ),
),false)) {
function content_5c957bd510a131_71566161 (Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-edit fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['edit_button']->value;?>

        </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
    <div class="content-white-area">
        
        <?php if (isset($_smarty_tpl->tpl_vars['display_edit_errors']->value)) {?>
        <div class="alert alert-danger">
            <h4><?php echo $_smarty_tpl->tpl_vars['error_title']->value;?>
</h4>

            <?php echo $_smarty_tpl->tpl_vars['error_list']->value;?>

        </div>
        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['edit_success']->value)) {?>
        <div class="alert alert-success">
            <?php echo $_smarty_tpl->tpl_vars['edit_success']->value;?>

        </div>
        <?php }?>

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
                                    <i class="fa fa-user fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['account_edit_general_prefs']->value;?>

                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['account_edit_email_language']->value;?>
</label>

                                <div class="col-sm-6">
                                    <?php $_smarty_tpl->_subTemplateRender("file:account_edit_email_preferences.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                </div>
                            </div>

                            <?php if (isset($_smarty_tpl->tpl_vars['optionals_used']->value)) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['row_email']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_standard_email']->value;?>
</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="email" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postemail']->value;?>
" tabindex="4">
                                </div>
                            </div>
                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['row_company']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_standard_company']->value;?>
</label>
                                
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="company" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postcompany']->value;?>
" tabindex="5">
                                </div>
                            </div>
                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['row_checks']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_standard_checkspayable']->value;?>
</label>
                                
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="payable" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postchecks']->value;?>
" tabindex="6">
                                </div>
                            </div>
                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['row_website']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_standard_weburl']->value;?>
</label>
                                
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="url" size="30" value="<?php echo $_smarty_tpl->tpl_vars['postwebsite']->value;?>
" tabindex="7">
                                </div>
                            </div>
                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['row_taxinfo']->value)) {?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_standard_taxinfo']->value;?>
</label>
                                
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tax_id_ssn" size="30" value="<?php echo $_smarty_tpl->tpl_vars['posttax']->value;?>
" tabindex="8">
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
                                    <i class="fa fa-user fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['edit_personal_title']->value;?>

                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_fname']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="f_name" value="<?php echo $_smarty_tpl->tpl_vars['postfname']->value;?>
" tabindex="9">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_lname']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="l_name" value="<?php echo $_smarty_tpl->tpl_vars['postlname']->value;?>
" tabindex="10">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_phone']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['postphone']->value;?>
" tabindex="15">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"
                                       style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_fax']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="fax" value="<?php echo $_smarty_tpl->tpl_vars['postfaxnm']->value;?>
" tabindex="16">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_addr1']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="address_one" value="<?php echo $_smarty_tpl->tpl_vars['postaddr1']->value;?>
" tabindex="11">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_addr2']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="address_two" value="<?php echo $_smarty_tpl->tpl_vars['postaddr2']->value;?>
" tabindex="12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_city']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="city" value="<?php echo $_smarty_tpl->tpl_vars['postcity']->value;?>
" tabindex="13">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_state']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="state" value="<?php echo $_smarty_tpl->tpl_vars['poststate']->value;?>
" tabindex="14">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_zip']->value;?>
</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="zip" value="<?php echo $_smarty_tpl->tpl_vars['postzip']->value;?>
" tabindex="17">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['edit_personal_country']->value;?>
</label>

                                <div class="col-sm-6">
                                    <select name="country" id="country" class="form-control">
                                        <?php echo $_smarty_tpl->tpl_vars['c_drop']->value;?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                
                                <div class="col-sm-6">
                                    <input class="btn btn-primary" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['edit_button']->value;?>
">
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
    $('#email_language').select2();
    $('#country').select2();
});
<?php echo '</script'; ?>
><?php }
}
