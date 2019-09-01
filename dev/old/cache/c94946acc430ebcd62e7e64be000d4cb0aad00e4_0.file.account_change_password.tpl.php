<?php
/* Smarty version 3.1.30, created on 2019-03-23 02:21:09
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_change_password.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c957bf5717654_42248949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c94946acc430ebcd62e7e64be000d4cb0aad00e4' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_change_password.tpl',
      1 => 1551650079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c957bf5717654_42248949 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
        <i class="fa fa-key fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['password_title']->value;?>

    </h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet portlet-basic">
            <div class="portlet-body" style="padding: 20px;">
            
            <?php if (isset($_smarty_tpl->tpl_vars['password_notice']->value)) {?>
            <div class="alert alert-success">
                <?php echo $_smarty_tpl->tpl_vars['password_notice']->value;?>

            </div>
            
            <?php } elseif (isset($_smarty_tpl->tpl_vars['password_warning']->value)) {?>
                <div class="alert alert-danger">
                    <?php echo $_smarty_tpl->tpl_vars['password_warning']->value;?>

                </div>
            <?php }?>
            
            <form method="POST" action="/dashboard/manage-account/change-password" class="form-horizontal">
                
                <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                <input type="hidden" name="change_password" value="1">
                <input type="hidden" name="page" value="18">
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['password_new_password']->value;?>
</label>
                    
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input class="form-control" type="password" name="pass2">
                <!-- hide
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-target="#modal-1" data-toggle="modal">
                                    <i class="fa fa-question-circle"></i>
                                </button>
                            </span>
                -->
                            <div class="modal fade" id="modal-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>
">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            
                                            <h4 class="modal-title">
                                                <?php echo $_smarty_tpl->tpl_vars['help_new_password_heading']->value;?>

                                            </h4>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p>
                                                <?php echo $_smarty_tpl->tpl_vars['help_new_password_info']->value;?>

                                            </p>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>
</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" style="font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['password_confirm_password']->value;?>
</label>
                    
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input class="form-control" type="password" name="pass3">
                <!-- hide
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-target="#modal-2" data-toggle="modal">
                                    <i class="fa fa-question-circle"></i>
                                </button>
                            </span>
                -->
                            <div class="modal fade" id="modal-2" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>
">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            
                                            <h4 class="modal-title">
                                                <?php echo $_smarty_tpl->tpl_vars['help_confirm_password_heading']->value;?>

                                            </h4>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p>
                                                <?php echo $_smarty_tpl->tpl_vars['help_confirm_password_info']->value;?>

                                            </p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                <?php echo $_smarty_tpl->tpl_vars['modal_close']->value;?>

                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['marketing_button']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['password_button']->value;?>
</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div><?php }
}
