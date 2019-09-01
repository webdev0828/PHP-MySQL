<?php
/* Smarty version 3.1.30, created on 2019-03-23 02:07:40
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/30.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c9578cc4cf066_41280828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2288c1f94b4ee0cdeed714e349021e20c0dac4bc' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/custom/30.tpl',
      1 => 1553299653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9578cc4cf066_41280828 (Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-sliders-h fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_settings']->value;?>
</a>
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

        <form method="POST" action="/dashboard/postback/settings" class="form-horizontal" id="postback_edit_form" name="pform">
            
            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
            <input type="hidden" name="postback_edit" value="1">
            <input type="hidden" name="page" value="30">

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;">
                                <h4>
                                    <i class="fa fa-link fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_global_action_notification']->value;?>

                                </h4>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="col-sm-1 control-label"><?php echo $_smarty_tpl->tpl_vars['custom_postback_state']->value;?>
</label>
                                <div class="col-sm-1">
                                    <label class="switch">
                                        <input name="e_postback_state" type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['e_postback_state']->value) && $_smarty_tpl->tpl_vars['e_postback_state']->value == 1) {?>checked<?php }?>>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <label class="col-sm-1 control-label"><?php echo $_smarty_tpl->tpl_vars['custom_method']->value;?>
</label>
                                <div class="col-sm-1">
                                    <select name="e_method" class="method form-control" style="width:110%">
                                        <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['e_method']->value) && $_smarty_tpl->tpl_vars['e_method']->value == 0) {?>selected="selected"<?php }?>>GET</option>
                                        <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['e_method']->value) && $_smarty_tpl->tpl_vars['e_method']->value == 1) {?>selected="selected"<?php }?>>POST</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">URL</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" name="e_postback_url" size="60" placeholder="<?php echo $_smarty_tpl->tpl_vars['e_postback_url']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['e_postback_url']->value;?>
" id="e_postback_url" maxlength="2048">
                                </div>
                                <div class="col-sm-1">
                                    <input class="btn btn-primary" name="save" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['custom_save']->value;?>
">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                        <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                            <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;">
                                <h4>
                                    <i class="fa fa-hashtag fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_tokens']->value;?>

                                </h4>
                            </div>
                        </div>
                        <div style="overflow-x:auto;">
                        <table id="dyntable_PostbackTokens" class="table table-bordered table-hover tc-table" width="100%" style="background: #121212;color:#fff;">
                            <thead>
                                <tr>
                                    <th class="token" style="text-align: left !important; width:15%"><?php echo $_smarty_tpl->tpl_vars['custom_token']->value;?>
</th>
                                    <th style="text-align:right !important;width:15%;"><?php echo $_smarty_tpl->tpl_vars['custom_type']->value;?>
</th>
                                    <th style="text-align:right !important;width:80%;"><?php echo $_smarty_tpl->tpl_vars['custom_description']->value;?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="token">[commission_id]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_numeric']->value;?>
-16</td>
                                    <td class="typedesc">Unique order ID of the commission</td>
                                </tr>
                                <tr>
                                    <td class="token">[offer_id]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_numeric']->value;?>
-10</td>
                                    <td class="typedesc">Unique offer ID</td>
                                </tr>
                                <tr>
                                    <td class="token">[creative_id]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_numeric']->value;?>
-10</td>
                                    <td class="typedesc">Unique offer creative ID</td>
                                </tr>
                                <tr>
                                    <td class="token">[payout]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_decimal']->value;?>
-20,2</td>
                                    <td class="typedesc">Amount of the commission in EUR</td>
                                </tr>
                                <tr>
                                    <td class="token">[status]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_numeric']->value;?>
-1</td>
                                    <td class="typedesc">Status of the commission: 1 for approved and 0 for rejected</td>
                                </tr>
                                <tr>
                                    <td class="token">[timestamp]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_numeric']->value;?>
- 20</td>
                                    <td class="typedesc">UNIX timestamp</td>
                                </tr>
                                <tr>
                                    <td class="token">[sub_id]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alphanumeric']->value;?>
-64</td>
                                    <td class="typedesc">Sub Account ID</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid1]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alphanumeric']->value;?>
-64</td>
                                    <td class="typedesc">Tracking ID 1</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid2]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alphanumeric']->value;?>
-64</td>
                                    <td class="typedesc">Tracking ID 2</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid3]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alphanumeric']->value;?>
-64</td>
                                    <td class="typedesc">Tracking ID 3</td>
                                </tr>
                                <tr>
                                    <td class="token">[tid4]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alphanumeric']->value;?>
-64</td>
                                    <td class="typedesc">Tracking ID 4</td>
                                </tr>
                                <tr>
                                    <td class="token">[geo]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alpha']->value;?>
-2</td>
                                    <td class="typedesc">Country code</td>
                                </tr>
                                <tr>
                                    <td class="token">[click_id]</td>
                                    <td class="typedesc"><?php echo $_smarty_tpl->tpl_vars['custom_alphanumeric']->value;?>
-64</td>
                                    <td class="typedesc">Unique Click ID</td>
                                </tr>
                            </tbody>
                        </table>
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
$("input").on("keyup",function() {
  var maxLength = $(this).attr("maxlength");
  if(maxLength == $(this).val().length) {
    swal("<?php echo $_smarty_tpl->tpl_vars['custom_max_length_reached']->value;?>
\n<?php echo $_smarty_tpl->tpl_vars['custom_limit_is']->value;?>
 " + maxLength + "!")
  }
})
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
$(function () {
    $('.token').on('click', function (event) {
        var url = $('#e_postback_url');
        var tkn = event.target
        url.val(url.val() + tkn.textContent);
    });
});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
    $('.method').select2();
});
<?php echo '</script'; ?>
><?php }
}
