<?php
/* Smarty version 3.1.30, created on 2019-03-25 16:26:16
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_text_links.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c98e50805a8b2_43588435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '466a484e6219dcb65866e8f874f05c27d8d74a7f' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_text_links.tpl',
      1 => 1553523969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c98e50805a8b2_43588435 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
?>

    <div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
            <i class="fa fa-external-link-alt fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>

        </h1>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="portlet portlet-basic">
                <div class="portlet-body">

                    <?php if (isset($_smarty_tpl->tpl_vars['one_click_delivery']->value)) {?>
                    <?php
$__section_nr_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['textlink_link_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total != 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                                        <h4><?php echo $_smarty_tpl->tpl_vars['marketing_group_title']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_group_name'];?>
</h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-group">

                                        <li class="list-group-item">
                                            <label><?php echo $_smarty_tpl->tpl_vars['textlink_name']->value;?>
:</label> <?php echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_text'];?>

                                        </li>

                                        <li class="list-group-item">
                                            <label><?php echo $_smarty_tpl->tpl_vars['marketing_target_url']->value;?>
:</label> <a href="<?php echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_url'];?>
" target="_blank"<?php echo $_smarty_tpl->tpl_vars['tl_rel_values']->value;?>
><?php echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_url'];?>
</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
}
}
if ($__section_nr_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_0_saved;
}
?>

                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                    <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                        <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;">
                                            <h4>
                                                <i class="fa fa-hand-pointer fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_choose_a_niche']->value;?>

                                            </h4>
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                        <form class="form-horizontal" role="form" method="post" action="/dashboard/promo-tools/smartlinks">
                                            
                                            <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                                            <input type="hidden" name="page" value="9">
                                            
                                            <div class="form-group">
<div class="form-group">
<label class="container">Mainstream
  <input type="radio" checked="checked" name="radio" value=". Mainstream">
  <span class="checkmark"></span>
</label>
<label class="container">Adult
  <input type="radio" name="radio" value=". Adult">
  <span class="checkmark"></span>
</label>
</div>
                                            <label class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['custom_niche']->value;?>
</label>
                                                <div class="custom-select">
                                                    <select name="textlinks_picked" class="form-control">
                                                        
                                                        <?php
$__section_nr_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['textlink_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total != 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['textlink_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['textlink_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_group_name'];?>
</option>
                                                        <?php
}
}
if ($__section_nr_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_1_saved;
}
?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <button type="submit" class="btn btn-primary">
                                                        <?php echo $_smarty_tpl->tpl_vars['marketing_button']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($_smarty_tpl->tpl_vars['textlink_group_chosen']->value)) {?>
                            <div class="portlet smartlink-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;margin-bottom: -10px;">
                                        <h4 style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#smartlink-tracking">
                    <i class="fa fa-sliders-h fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_link_customization']->value;?>


                    <span class="pull-right">
                        <i class="fa fa-angle-down"></i>
                    </span>
               				             </h4>
            			             </div>

            			   <div id="smartlink-tracking" class="panel-collapse collapse" style="background-color:#fff;color:#000">
					 <ul class="list-group">
                                            <li class="list-group-item">
                                                <label class="trackings"><?php echo $_smarty_tpl->tpl_vars['custom_sub_id']->value;?>
:</label> <input type="text" class="select-selected" id="sub_id" name="sub_id" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <label class="trackings"><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 1:</label> <input type="text" class="select-selected" id="tid1" name="tid1" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <label class="trackings"><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 2:</label> <input type="text" class="select-selected" id="tid2" name="tid2" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <label class="trackings"><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 3:</label> <input type="text" class="select-selected" id="tid3" name="tid3" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <label class="trackings"><?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 4:</label> <input type="text" class="select-selected" id="tid4" name="tid4" maxlength="64">
                                            </li>
					</ul>
                            <button id="add_parameters" name="submit" class="btn btn-primary">
                            <?php echo $_smarty_tpl->tpl_vars['custom_apply_tracking']->value;?>

                            </button>
 			            </div>
			        </div>
			    </div>
                        <?php
$__section_nr_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['textlink_link_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_2_total = $__section_nr_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_2_total != 0) {
for ($__section_nr_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_2_iteration <= $__section_nr_2_total; $__section_nr_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_4']->value;?>
;">
                                    <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), <?php echo $_smarty_tpl->tpl_vars['portlet_2']->value;?>
;">
                                        <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_4_text']->value;?>
;">
                                            <h4>
                                                <i class="fa fa-external-link-alt fa fw"></i> 
                                                 <?php ob_start();
echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_epc'];
$_prefixVariable1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_sr'];
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable1 >= 0.3 && $_prefixVariable2 >= 0.3) {?>
                                                 <span class="label label-success">HOT</span>
                                                 <?php }?>
                                                 <?php echo $_smarty_tpl->tpl_vars['textlink_chosen_group_name']->value;?>
 
                                                <span style="float:right">
                                                EPC: <?php echo number_format($_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_epc'],4,".",",");?>
 €
                                                </span>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                        <ul class="list-group">
                                            <!-- TODO: Add description
                                            <li class="list-group-item">
                                                <label><?php echo $_smarty_tpl->tpl_vars['custom_smartlink_description']->value;?>
:</label> <?php echo $_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_text'];?>

                                            </li>
                                            -->
                                            <li class="list-group-item">
                                                <label><i class="fas fa-link fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['marketing_target_url']->value;?>
:</label> <textarea rows="1" id="parammed_url" name="parammed_url" class="form-control" value="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_url'],'sublimerevenue.com','srtrak.com');?>
" style="width:100%;"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_url'],'sublimerevenue.com','srtrak.com');?>
</textarea>
                                            </li>
    <?php if (isset($_smarty_tpl->tpl_vars['custom_links_enabled']->value)) {
echo '<script'; ?>
> 
document.getElementById('add_parameters').addEventListener('click', parammeterize);
function parammeterize() {
  let html = '<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['textlink_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['textlink_link_url'],'sublimerevenue.com','srtrak.com');?>
';
  let params = {};
  document.querySelectorAll('#smartlink-tracking input.select-selected').forEach((element) => {
    if (element.value.length > 0)
        params[element.id] = element.value;
  });
  let esc = encodeURIComponent;
  let query = Object.keys(params)
    .map(k => esc(k) + '=' + esc(params[k]))
    .join('&');
  html += '?' + query;
    document.getElementById('parammed_url').innerHTML = html;
}
<?php echo '</script'; ?>
>
    <?php }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
}
}
if ($__section_nr_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_2_saved;
}
?> 

                        <?php } else { ?> 

                           

                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php echo '<script'; ?>
 type="text/javascript">
document.getElementById("parammed_url").onclick = function() {
  this.select();
  document.execCommand('copy');
  swal('<?php echo $_smarty_tpl->tpl_vars['custom_copied_to_clipboard']->value;?>
!\n<?php echo $_smarty_tpl->tpl_vars['custom_good_luck']->value;?>
!');
}
<?php echo '</script'; ?>
>
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
 type="text/javascript">
$(document).ready(function(){
  function xyz(){
    var getval = $('label.container input[type="radio"]:checked').val();
    $('.select-items>div').each(function(){
      if($(this).text().indexOf(getval) > -1){
        $(this).show();
      }
      else {
        $(this).hide();
      }
    });
  }
  xyz();
  $('label.container input[type="radio"]').click(function(){
    xyz();
  });
});
<?php echo '</script'; ?>
>
<?php }
}
