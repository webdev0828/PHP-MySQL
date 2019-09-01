<?php
/* Smarty version 3.1.30, created on 2019-04-08 07:17:26
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_tier_stats.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5caaf586557cf9_65040418',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d3731dfaa531e0ce5b55ea009e98062e506c57f' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_tier_stats.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5caaf586557cf9_65040418 (Smarty_Internal_Template $_smarty_tpl) {
?>



<?php if (isset($_smarty_tpl->tpl_vars['tier_enabled']->value)) {?>
Data: <?php echo $_smarty_tpl->tpl_vars['tier_tree_data']->value;?>

<div class="col-md-12">
    <div class="highlight clearfix">
        <div class="page-heading-sec" style="background:<?php echo $_smarty_tpl->tpl_vars['heading_back']->value;?>
;">
          <h1 style="color:<?php echo $_smarty_tpl->tpl_vars['heading_text']->value;?>
;">
                <?php echo $_smarty_tpl->tpl_vars['tier_stats_title']->value;?>
 
                <span class="pull-right">
                    <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['tier_stats_accounts']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['number_of_tier_accounts']->value;?>
</span>
<!-- TODO: split these 2 per username -->
                    <span class="label label-danger">Current Referral Earnings: <?php echo $_smarty_tpl->tpl_vars['current_tier_commissions']->value;?>
</span>
                    <span class="label label-danger">Total Referral Earnings: <?php echo $_smarty_tpl->tpl_vars['tier_amount_earned']->value;?>
</span>
                </span>
            </h1>
        </div>
        
        <br />
      
        <p>

            <a href="account.php?page=12" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['tier_stats_grab_link']->value;?>
</a>
        </p>
        
        

        <?php if (isset($_smarty_tpl->tpl_vars['tier_accounts_exist']->value)) {?> 
        <table id='dyntable_payment_Tier' class="table table-bordered">
            <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['tier_stats_username']->value;?>
</th>
<!-- TODO: add these values, extract from DB with queries from acc0unt.php and add them to core.tier_statistics.php, assing translation strings in core.data_tables.php
                    <th>This Period</th>
                    <th>Total</th>
-->
                </tr>
            </thead>
            
            <tbody></tbody>
        </table>
        <?php }?>
    </div>
<?php }
}
}
