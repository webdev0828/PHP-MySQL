<?php
/* Smarty version 3.1.30, created on 2019-04-04 17:27:32
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_tier_code.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca63e84036ab3_46393243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ab0491335e700bfc1a7057dac204c0a74673096' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_tier_code.tpl',
      1 => 1554183611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca63e84036ab3_46393243 (Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-share-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_referrals']->value;?>

        </h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

    <?php if (isset($_smarty_tpl->tpl_vars['tier_enabled']->value)) {?>
<div class="row">
    <div class="col-md-12 ">
        <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
            <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                <div class="portlet-title" style="color:#ffffff;">
                <h4>
                    <i class="fa fa-users fa fw "></i> <?php echo $_smarty_tpl->tpl_vars['tlinks_title']->value;?>
<span class="pull-right"></span>
                </h4>
                </div>
            </div>

            <div i class="panel-collapse collapse in">

                <?php if (isset($_smarty_tpl->tpl_vars['forced_links']->value)) {?>
                <div class="alert alert-warning">
                    <?php echo $_smarty_tpl->tpl_vars['tlinks_forced_two']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['tlinks_payout_structure']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['tier_1_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_1_type']->value;?>

                </div>
                
                <?php } else { ?>
                <div class="alert alert-warning">
                    <?php echo $_smarty_tpl->tpl_vars['tlinks_embedded_two']->value;?>

                </div>
                
                <p>
                    <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_forced_code']->value;?>
</strong>

                    <br />

                    <?php echo $_smarty_tpl->tpl_vars['tlinks_embedded_one']->value;?>
 

                    <br />
                    <br />
                </p>
                <?php }?>
                
                <?php if (isset($_smarty_tpl->tpl_vars['forced_links']->value)) {?>
				
                <label><i class="fa fa-link fa fw "></i> <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_forced_code']->value;?>
</strong>:</label>
                <textarea textarea rows="1" class="form-control" id="parammed_ref_link2"><?php echo $_smarty_tpl->tpl_vars['seo_url']->value;?>
signup-<?php echo $_smarty_tpl->tpl_vars['textads_link']->value;
echo $_smarty_tpl->tpl_vars['textads_link_html_added']->value;?>
</textarea>

                <br />
                
                <?php if (isset($_smarty_tpl->tpl_vars['seo_links']->value)) {?>

                <label><i class="fas fa-code fa-fw"></i> <strong><?php echo $_smarty_tpl->tpl_vars['marketing_source_code']->value;?>
</strong></label>
                <textarea textarea rows="1" class="form-control" id="parammed_ref_link"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['seo_url']->value;?>
signup-<?php echo $_smarty_tpl->tpl_vars['textads_link']->value;
echo $_smarty_tpl->tpl_vars['textads_link_html_added']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tlinks_forced_money']->value;?>
</a></textarea>
                
                <?php } else { ?>
                <textarea textarea rows="1" class="form-control" id="parammed_ref_link"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/recruit.php?ref=<?php echo $_smarty_tpl->tpl_vars['link_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tlinks_forced_money']->value;?>
</a></textarea>
                <?php }?>
				<br />
                <br />
                <br />
                <?php }?>

                <table class="table table-primary table-bordered" style="background: #121212;color:#fff;">
                    <thead>
                        <tr>
                            <th width="33%">
                                <b><?php echo $_smarty_tpl->tpl_vars['tlinks_active']->value;?>
</b>
                            </th>
                            <th width="33%">
                                <b><?php echo $_smarty_tpl->tpl_vars['custom_current_referral_earnings']->value;?>
</b>
                            </th>
                            <th width="33%">
                                <b><?php echo $_smarty_tpl->tpl_vars['custom_total_referral_earnings']->value;?>
</b>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_1_active']->value)) {?>
                        <tr>
                            <td width="33%">
                                <?php echo $_smarty_tpl->tpl_vars['number_of_tier_accounts']->value;?>

                            </td>
                            <td width="33%">
                                <?php echo $_smarty_tpl->tpl_vars['current_tier_commissions']->value;?>

                            </td>
                            <td width="33%">
                                <?php echo $_smarty_tpl->tpl_vars['tier_amount_earned']->value;?>

                            </td>
                        </tr>
                        <?php }?>
<!-- hide rest of refs
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_2_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 2</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_2_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_2_type']->value;?>
</td>
                        </tr>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_3_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 3</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_3_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_3_type']->value;?>
</td>
                        </tr>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_4_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 4</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_4_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_4_type']->value;?>
</td>
                        </tr>
                        <?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['tier_5_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 5</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_5_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_5_type']->value;?>
</td>
                        </tr>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_6_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 6</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_6_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_6_type']->value;?>
</td>
                        </tr>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_7_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 7</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_7_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_7_type']->value;?>
</td>
                        </tr>
                        <?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['tier_8_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 8</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_8_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_8_type']->value;?>
</td>
                        </tr>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_9_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 9</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_9_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_9_type']->value;?>
</td>
                        </tr>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['tier_10_active']->value)) {?>
                        <tr>
                            <td width="25%">
                                <strong><?php echo $_smarty_tpl->tpl_vars['tlinks_level']->value;?>
 10</strong>
                            </td>
                            
                            <td width="75%"><?php echo $_smarty_tpl->tpl_vars['tier_10_amount']->value;
echo $_smarty_tpl->tpl_vars['tier_10_type']->value;?>
</td>
                        </tr>
                        <?php }?>
-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
    <?php }
echo '<script'; ?>
>
document.getElementById("parammed_ref_link").onclick = function() {
  this.select();
  document.execCommand('copy');
  swal('<?php echo $_smarty_tpl->tpl_vars['custom_copied_to_clipboard']->value;?>
!\n<?php echo $_smarty_tpl->tpl_vars['custom_good_luck']->value;?>
!');
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
document.getElementById("parammed_ref_link2").onclick = function() {
  this.select();
  document.execCommand('copy');
  swal('<?php echo $_smarty_tpl->tpl_vars['custom_copied_to_clipboard']->value;?>
!\n<?php echo $_smarty_tpl->tpl_vars['custom_good_luck']->value;?>
!');
}
<?php echo '</script'; ?>
>
<?php }
}
