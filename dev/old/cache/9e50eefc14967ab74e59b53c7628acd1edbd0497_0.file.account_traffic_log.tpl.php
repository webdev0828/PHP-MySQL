<?php
/* Smarty version 3.1.30, created on 2019-03-15 18:09:13
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_traffic_log.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c8bce291bb162_42856993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e50eefc14967ab74e59b53c7628acd1edbd0497' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_traffic_log.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8bce291bb162_42856993 (Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="panel-group col-md-12 ">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;"data-toggle="collapse">
                    <?php echo $_smarty_tpl->tpl_vars['traffic_title']->value;?>
<span class="pull-right"></span>
                </h4>
            </div>

            <div i class="panel-collapse collapse in">

                <?php if (isset($_smarty_tpl->tpl_vars['traffic_logs_exist']->value)) {?>
                <table id='dyntable_payment_Traffic' class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <?php echo $_smarty_tpl->tpl_vars['traffic_date']->value;?>

                            </th>
                            
                            <th>
                                <?php echo $_smarty_tpl->tpl_vars['traffic_time']->value;?>

                            </th>
                            
                            <?php if ((!isset($_smarty_tpl->tpl_vars['gdpr_hide_ip']->value))) {?>
                            <th>
                                <?php echo $_smarty_tpl->tpl_vars['traffic_ip']->value;?>

                            </th>
                            <?php }?>
                            
                            <th>
                                <?php echo $_smarty_tpl->tpl_vars['traffic_refer']->value;?>

                            </th>
                        </tr>
                    </thead>
                    
                    <tbody></tbody>
                    
                    <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['traffic_none']->value;?>

                    <?php }?>
                </table>
            </div>
        </div>
    </div>
<?php }
}
