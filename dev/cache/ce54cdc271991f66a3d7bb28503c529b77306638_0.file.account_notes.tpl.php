<?php
/* Smarty version 3.1.30, created on 2019-04-04 16:51:30
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_notes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca636125b6c90_97768180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce54cdc271991f66a3d7bb28503c529b77306638' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_notes.tpl',
      1 => 1554137139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca636125b6c90_97768180 (Smarty_Internal_Template $_smarty_tpl) {
?>

               
    <div class="panel-group col-md-12  ">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#days">
<?php ob_start();
echo $_smarty_tpl->tpl_vars['last_note_stamp']->value;
$_prefixVariable44=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['last_logged']->value;
$_prefixVariable45=ob_get_clean();
if ($_prefixVariable44 < $_prefixVariable45) {?>
                    <i class="fa fa-bell"></i> <?php echo $_smarty_tpl->tpl_vars['general_notes_title']->value;?>

<?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['last_note_stamp']->value;
$_prefixVariable46=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['last_logged']->value;
$_prefixVariable47=ob_get_clean();
if ($_prefixVariable46 == $_prefixVariable47) {?>
                    <i class="fa fa-bell faa-ring animated" style="color:rgba(244, 206, 33, 0.99);"></i> <?php echo $_smarty_tpl->tpl_vars['general_notes_title']->value;?>

<?php } else { ?>
                    <i class="fa fa-bell faa-ring animated" style="color:rgba(244, 206, 33, 0.99);"></i> <?php echo $_smarty_tpl->tpl_vars['general_notes_title']->value;?>

<?php }}?>
                    <span class="pull-right"> 
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="days" class="panel-collapse collapse in">
                <table class="table" style="margin:1rem;">

                <?php
$__section_nr_10_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_10_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['note_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_10_total = $__section_nr_10_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_10_total != 0) {
for ($__section_nr_10_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_10_iteration <= $__section_nr_10_total; $__section_nr_10_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
<tr><td>
                    <div>
                        <span width="100%" colspan="2">
                            <i class="fas fa-sticky-note"></i> <?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_date'];?>
 - <strong><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_subject'];?>
</strong>
                        </span>
                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image']) && $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_image_location'] == '0') {?>
                    <div>
                        <span width="100%" colspan="2"><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image'];?>
</span>
                    </div>
                    <?php }?>
                    <div>
                        <span width="100%" colspan="2"><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_content'];?>
</span>
                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image']) && $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_image_location'] == '1') {?>
                    <div>
                        <span width="100%" colspan="2"><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image'];?>
</span>
                    </div>
                    <?php }?>
</td></tr>
                <?php }} else {
 ?>
                <?php
}
if ($__section_nr_10_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_10_saved;
}
?>
                </table>
            </div>
        </div>
    </div>

<?php }
}
