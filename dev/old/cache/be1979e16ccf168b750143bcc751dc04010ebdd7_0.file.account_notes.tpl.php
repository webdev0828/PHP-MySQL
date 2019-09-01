<?php
/* Smarty version 3.1.30, created on 2019-03-25 23:16:13
  from "/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_notes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c99451dbf44b8_09801941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be1979e16ccf168b750143bcc751dc04010ebdd7' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/templates/themes/SublimeRevenue/account_notes.tpl',
      1 => 1548584310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c99451dbf44b8_09801941 (Smarty_Internal_Template $_smarty_tpl) {
?>

                <?php
$__section_nr_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['note_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total != 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
    <div class="panel-group col-md-12  ">
        <div class="panel panel-default" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                <h4 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#days">
                    <?php echo $_smarty_tpl->tpl_vars['general_notes_title']->value;?>


                    <span class="pull-right">
                        <i class="fa fa-angle-down"></i>
                    </span>
                </h4>
            </div>
            <div id="days" class="panel-collapse collapse">

                <table class="table">
                    <tr>
                        <td width="50%" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_1']->value;?>
;">
                            <span style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_1_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['general_notes_date']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_date'];?>
</span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="100%" colspan="2">
                            <b><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_subject'];?>
</b>
                        </td>
                    </tr>

                    <?php if (isset($_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image']) && $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_image_location'] == '0') {?>
                    <tr>
                        <td width="100%" colspan="2"><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image'];?>
</td>
                    </tr>
                    <?php }?>

                    <tr>
                        <td width="100%" colspan="2"><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_content'];?>
</td>
                    </tr>

                    <?php if (isset($_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image']) && $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['note_image_location'] == '1') {?>
                    <tr>
                        <td width="100%" colspan="2"><?php echo $_smarty_tpl->tpl_vars['note_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['draw_image'];?>
</td>
                    </tr>
                    <?php }?>

                </table>

                <br />
                

            </div>
        </div>
    </div>
                <?php }} else {
 ?>
                <?php
}
if ($__section_nr_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_1_saved;
}
}
}
