<?php
/* Smarty version 3.1.30, created on 2019-04-02 17:01:00
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_html_ads.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca36b1cabc393_38502859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30bccc30e34013929b376e849973e31fbe6c4ca0' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account_html_ads.tpl',
      1 => 1554213656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca36b1cabc393_38502859 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/sublimerevenue.com/templates/smarty/plugins/modifier.replace.php';
?>


<div class="page-header title col-md-12 nopad" style="background:#000;">
        <h1 style="color:#fff;">
        <i class="fa fa-undo fa fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>

    </h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet portlet-basic">
            <div class="portlet-body">
                <?php if (isset($_smarty_tpl->tpl_vars['one_click_delivery']->value)) {?>
                <?php
$__section_nr_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['html_link_results']->value) ? count($_loop) : max(0, (int) $_loop));
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
: <?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_group_name'];?>
</h4>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <label><?php echo $_smarty_tpl->tpl_vars['html_name']->value;?>
:</label> <?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_name'];?>

                                    </li>

                                    <li class="list-group-item">
                                        <label><?php echo $_smarty_tpl->tpl_vars['marketing_target_url']->value;?>
:</label> <a href="<?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_target_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_target_url'];?>
</a>
                                    </li>

                                    <li class="list-group-item">
                                        <label style="width:100%;">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
/adview.php?id=<?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_id'];?>
" class="btn btn-mini btn-primary fancy-page"><?php echo $_smarty_tpl->tpl_vars['html_view_link']->value;?>
</a>

                                            <br/>
                                            <br/>

                                            <?php echo $_smarty_tpl->tpl_vars['marketing_source_code']->value;?>

                                        </label>

                                        <br/>

                                        <textarea rows="8" class="form-control"><?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_url'];?>
</textarea>
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
                                <form class="form-horizontal" role="form" method="post" action="/dashboard/promo-tools/popunders">
                                    
                                    <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                                    <input type="hidden" name="page" value="23">
                                    
                                    <div class="form-group">


                                            <select name="html_picked" class="form-control" id="popunders-select" style="width:100%">
                                                <option></option>
                                                <?php
$__section_nr_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['htmlad_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total != 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['htmlad_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['htmlad_group_id'];?>
"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['htmlad_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['htmlad_group_name'],'SmartLink','Smart PopUnder');?>
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
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-6">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo $_smarty_tpl->tpl_vars['marketing_button']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($_smarty_tpl->tpl_vars['html_group_chosen']->value)) {?>
                            <div class="portlet popunder-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;margin-bottom: -10px;">
                                        <h4 style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#popunder-tracking">
                                            <i class="fa fa-sliders-h fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_link_customization']->value;?>

                                                <span class="pull-right">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
               				            </h4>
            			            </div>

                                    <div id="popunder-tracking" class="panel-collapse collapse" style="background-color:#fff;color:#000">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input type="text" class="select-selected" id="sub_id" name="sub_id" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_sub_id']->value;?>
" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" class="select-selected" id="tid1" name="tid1" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 1" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" class="select-selected" id="tid2" name="tid2" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 2" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" class="select-selected" id="tid3" name="tid3" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 3" maxlength="64">
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" class="select-selected" id="tid4" name="tid4" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_tracking_id']->value;?>
 4" maxlength="64">
                                            </li>
                                        </ul>
                                            <button id="add_parameters" type="submit" class="btn btn-primary">
                                                <?php echo $_smarty_tpl->tpl_vars['custom_apply_tracking']->value;?>

                                            </button>
 			                        </div>
			                    </div>
                            <div class="portlet popunder-port" style="border-color:<?php echo $_smarty_tpl->tpl_vars['portlet_3']->value;?>
;">
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">
                                    <div class="portlet-title" style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_3_text']->value;?>
;margin-bottom: -10px;">
                                        <h4 style="color:<?php echo $_smarty_tpl->tpl_vars['portlet_2_text']->value;?>
;" data-toggle="collapse" href="#popunder-capping">
                                            <i class="fa fa-user-clock fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_frequency_capping']->value;?>

                                                <span class="pull-right">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                        </h4>
                                    </div>
                                    <div id="popunder-capping" class="panel-collapse collapse" style="background-color:#fff;color:#000">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input type="number" min="1" max="168" class="select-selected" id="cap" name="cap" size="1" maxlength="3" placeholder="<?php echo $_smarty_tpl->tpl_vars['custom_hour_s']->value;?>
"> 
                                            </li>
                                        </ul>
                                            <button id="apply_capping" type="submit" class="btn btn-primary">
                                                <?php echo $_smarty_tpl->tpl_vars['custom_apply_capping']->value;?>

                                            </button>
                                    </div>
                                </div>
                            </div>
			                </div>
                <?php
$__section_nr_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['html_link_results']->value) ? count($_loop) : max(0, (int) $_loop));
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
                                            <i class="fa fa-undo fa fw"></i>
                                                 <?php ob_start();
echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_epc'];
$_prefixVariable1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_sr'];
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable1 >= 0.3 && $_prefixVariable2 >= 0.3) {?>
                                                 <span class="label label-success">HOT</span>
                                                 <?php }?>
                                                 <?php echo $_smarty_tpl->tpl_vars['html_chosen_group_name']->value;?>

                                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_grp'];
$_prefixVariable3=ob_get_clean();
if (in_array($_prefixVariable3,$_smarty_tpl->tpl_vars['runningLinksArray']->value)) {?> 
                                                 <span class="badge running" title="Running SmartLink: Raw Visits from you in the last 7 days ≥ 1"><i class="fas fa-running fa-2x"></i></span>
                                                <?php }?>
                                                <span style="float:right">
                                                EPC: <?php echo number_format($_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_epc'],4,".",",");?>
 €
                                                </span>
                                        </h4>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <ul class="list-group">
                                        <!--
                                        <li class="list-group-item">
                                            <label><?php echo $_smarty_tpl->tpl_vars['custom_smartlink_description']->value;?>
:</label> <?php echo $_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_name'];?>

                                        </li>
                                        -->
                                        <li class="list-group-item">
                                            <label style="width:100%;">
                                                <i class="fas fa-code fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['marketing_source_code']->value;?>

                                            </label>

                                            <br/>

                                            <textarea id="parammed_popunder" rows="3" class="form-control"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_url'],'sublimerevenue.com/promo-tools/pop','static4.sublimerevenue.com'),'/sublimerevenue.com','/srtrak.com');?>
</textarea>
                                        </li>
<?php ob_start();
echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['html_link_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['html_link_url'],'sublimerevenue.com/promo-tools/pop','static4.sublimerevenue.com'),'/sublimerevenue.com','/srtrak.com'),'<script type="text/javascript" src="https://static4.sublimerevenue.com/under.js"></script> ','');
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('bez1', $_prefixVariable4);
ob_start();
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['bez1']->value,'<script type="text/javascript">var popURL=["',''),'"];SublimeRevenuePopunder1(popURL,{cap:1,wait:(3600*24),cookie:"sublimerevenue-popunder-v1"});</script>','');
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('gotovpop', $_prefixVariable5);
$_smarty_tpl->_assignInScope('script1', "<script type=\"text\/javascript\" src=\"https:\/\/static4.sublimerevenue.com/under.js\"><\/script> <script type=\"text\/javascript\">var popURL=[\"");
$_smarty_tpl->_assignInScope('script2', "\"];SublimeRevenuePopunder1(popURL,\{cap:1,wait:(3600*24),cookie:\"sublimerevenue-popunder-v1\"\});<\/script>");
?>
    <?php if (isset($_smarty_tpl->tpl_vars['custom_links_enabled']->value)) {?>

<?php echo '<script'; ?>
>
document.getElementById('add_parameters').addEventListener('click', parammeterize);
function parammeterize() {
  let html = '<?php echo $_smarty_tpl->tpl_vars['script1']->value;
echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['bez1']->value,'<script type="text/javascript">var popURL=["',''),'"];SublimeRevenuePopunder1(popURL,{cap:1,wait:(3600*24),cookie:"sublimerevenue-popunder-v1"});</script>','');?>
';
  let html2 = '<?php echo $_smarty_tpl->tpl_vars['script2']->value;?>
';
  let params = {};
  document.querySelectorAll('#popunder-tracking input.select-selected').forEach((element) => {
    if (element.value.length > 0)
        params[element.id] = element.value;
  });
  let esc = encodeURIComponent;
  let query = Object.keys(params)
    .map(k => esc(k) + '=' + esc(params[k]))
    .join('&');
  html += '?' + query;
    document.getElementById('parammed_popunder').innerHTML = html + html2;
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
document.getElementById("parammed_popunder").onclick = function() {
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
>
$("#apply_capping").click(function() {
    $("body").find("textarea").each(function() {
        $(this).val($(this).val().replace(/(?<=\*).*?(?=\))/g,$("#cap").val()));
    });
});
<?php echo '</script'; ?>
> 

<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function() {
    $('#popunders-select').select2({placeholder: "<?php echo $_smarty_tpl->tpl_vars['custom_niche']->value;?>
",allowClear: true});
});
<?php echo '</script'; ?>
>
<?php }
}
