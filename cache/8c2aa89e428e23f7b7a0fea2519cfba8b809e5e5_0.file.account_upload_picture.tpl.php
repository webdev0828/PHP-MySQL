<?php
/* Smarty version 3.1.30, created on 2019-04-05 07:34:23
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_upload_picture.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca704ff3b89a4_33554107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c2aa89e428e23f7b7a0fea2519cfba8b809e5e5' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_upload_picture.tpl',
      1 => 1554449657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca704ff3b89a4_33554107 (Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php if (isset($_smarty_tpl->tpl_vars['pic_upload']->value)) {?>

                                <?php if (isset($_smarty_tpl->tpl_vars['upload_success']->value)) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-success">
                                    <?php echo $_smarty_tpl->tpl_vars['success_message']->value;?>

                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                                <?php } elseif (isset($_smarty_tpl->tpl_vars['upload_error']->value)) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert-box hideit alert-danger">
                                    <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

                            <i class="fa fa-times alert-box__close" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                                <?php }?>

<div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
        <i class="fa fa-camera fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_upload_picture']->value;?>

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
                <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                    <h4 data-toggle="collapse">
                        <i class="fa fa-file-image fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_change_picture']->value;?>

                    </h4>
                </div>
            </div>
            <div i class="panel-collapse collapse in">
                                <?php echo $_smarty_tpl->tpl_vars['pic_info']->value;?>

                                <br />
                                <br />
                                <ul>
                                    <li>
                                        <?php echo $_smarty_tpl->tpl_vars['pic_bullet_1']->value;?>

                                    </li>

                                    <li>
                                        <?php echo $_smarty_tpl->tpl_vars['pic_bullet_3']->value;?>

                                    </li>
                                </ul>

                                <div class="space-12"></div>

                                <form enctype="multipart/form-data" action="/dashboard/manage-account/upload-picture" METHOD="POST" class="form-horizontal">
                                    
                                    <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                                    <input type="hidden" name="update_picture" value="1">
                                    <input type="hidden" name="page" value="43">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="padding-top:2rem;"><?php echo $_smarty_tpl->tpl_vars['pic_file']->value;?>
</label>

                                        <div class="col-sm-10">
                                    <label for="file-upload" class="btn custom-file-upload">
                                        <i class="fa fa-cloud-upload-alt fa fw" style="padding-top:2rem;"></i> <?php echo $_smarty_tpl->tpl_vars['custom_browse']->value;?>

                                    </label>
                                            <input type="file" class="btn btn-default" id="file-upload" name="picture">
                                    <button class="btn btn-primary" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['pic_button']->value;?>
"/><?php echo $_smarty_tpl->tpl_vars['pic_button']->value;?>
</button>
                                        </div>
                                    </div>
                                </form>
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
                                <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                                    <h4>
                                        <i class="fa fa-file-image fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['pic_current']->value;?>

                                    </h4>
                                </div>
                            </div>

                <?php if (isset($_smarty_tpl->tpl_vars['picture_exists']->value)) {?>
                            <div class="portlet-body">
                                [<a href="/dashboard/manage-account/upload-picture/?remove_picture=<?php echo $_smarty_tpl->tpl_vars['affiliate_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pic_remove']->value;?>
</a>]
                                
                                <br />
                                <br />
                <?php }?>
                                
                                <img style="border:none;" src="<?php echo $_smarty_tpl->tpl_vars['picture_details']->value;?>
" width="300px" height="300px" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div><?php }
}
