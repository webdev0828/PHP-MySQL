<?php
/* Smarty version 3.1.30, created on 2019-04-05 07:36:31
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_change_password.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca7057fd82028_49284356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c94946acc430ebcd62e7e64be000d4cb0aad00e4' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_change_password.tpl',
      1 => 1554449606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca7057fd82028_49284356 (Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php if (isset($_smarty_tpl->tpl_vars['password_notice']->value)) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-success">
                            <?php echo $_smarty_tpl->tpl_vars['password_notice']->value;?>

                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            <?php } elseif (isset($_smarty_tpl->tpl_vars['password_warning']->value)) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-danger">
                            <?php echo $_smarty_tpl->tpl_vars['password_warning']->value;?>
            
                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            <?php }?>

<div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
        <i class="fa fa-key fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['password_title']->value;?>

    </h1>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                <div class="portlet-title" style="color:#ffffff;">
                    <h4 data-toggle="collapse">
                        <i class="fa fa-lock fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['marketing_button']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['password_button']->value;?>

                    </h4>
                </div>
            </div>
            <div i class="panel-collapse collapse in">

            <form method="POST" action="/dashboard/manage-account/change-password" class="form-horizontal">
                
                <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                <input type="hidden" name="change_password" value="1">
                <input type="hidden" name="page" value="18">
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" style="font-weight:normal;padding-top:2rem;"></label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="input-group input-group-bgp">
                                <input class="form-control" type="password" name="pass2" placeholder="<?php echo $_smarty_tpl->tpl_vars['password_new_password']->value;?>
">
                                <i class="fa fa-lock fa fw" aria-hidden="true" style="text-shadow: none !important;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" style="font-weight:normal;padding-top:2rem;"></label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="input-group input-group-bgp">
                                <input class="form-control" type="password" name="pass3" placeholder="<?php echo $_smarty_tpl->tpl_vars['password_confirm_password']->value;?>
">
                                <i class="fa fa-lock fa fw" aria-hidden="true" style="text-shadow: none !important;"></i>
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
</div>
                </div>
            </div>
        </div>
    </div><?php }
}
