<?php
/* Smarty version 3.1.30, created on 2019-03-29 18:44:10
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/menu_top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c9e4b5a111a35_77830564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a0756e17429886bbf295443780a50cf9b9b3682' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/menu_top.tpl',
      1 => 1553877847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9e4b5a111a35_77830564 (Smarty_Internal_Template $_smarty_tpl) {
?>


<nav class="navbar-top<?php if (isset($_smarty_tpl->tpl_vars['cp_fixed_navbar']->value)) {?> fixed<?php }?>" role="navigation" style="background-color: <?php echo $_smarty_tpl->tpl_vars['header_background']->value;?>
;">
    <div class="navbar-inner <?php if (!isset($_smarty_tpl->tpl_vars['cp_page_width']->value)) {?> container<?php }?>">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
                <i class="fa fa-bars"></i>
            </button>

            <div class="navbar-brand col-md-12">

                <?php if (isset($_smarty_tpl->tpl_vars['main_logo']->value)) {?>
                <a href="index.php" class="brand">
                    <img class="img-responsive" style="border:none;" src="<?php echo $_smarty_tpl->tpl_vars['main_logo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
">
                </a>
                <?php }?>

            </div>
        </div>

        <div class="nav-top">
            <form id="language_form" method="POST" action="">
                
                <input name="csrf_token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
" type="hidden"/>
                <input type="hidden" id="idev_language" name="idev_language" value="" />
                <input name="lang_token" value="<?php echo $_smarty_tpl->tpl_vars['language_token']->value;?>
" type="hidden" />

            </form>

            <ul class="nav lang navbar-right <?php if (isset($_smarty_tpl->tpl_vars['cp_fixed_navbar']->value)) {?>mobileFix<?php }?>">
                <li class="dropdown" style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="user-info" style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['language_selected']->value;?>
 dd</span> 
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">

                        <?php
$__section_nr_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['language_pack']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total != 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_nr']->value['last'] = ($__section_nr_0_iteration == $__section_nr_0_total);
?>
                        <li>
                            <a href="#" onclick="document.getElementById('idev_language').value = '<?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['value'];?>
'; document.getElementById('language_form').submit(); return false;"><?php echo $_smarty_tpl->tpl_vars['language_pack']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['name'];?>
</a>
                        </li>

                        <?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['last'] : null)) {?>
                        <li class="divider"></li>
                        <?php }?>

                        <?php
}
}
if ($__section_nr_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_0_saved;
}
?>

                    </ul>
                </li>
            </ul>
<!-- hide aff menu
            <?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
            <ul class="nav user-information navbar-right <?php if (isset($_smarty_tpl->tpl_vars['cp_fixed_navbar']->value)) {?>mobileFix<?php }?>">
                <li class="dropdown" style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="user-info" style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['affiliate_username']->value;?>
</span> 
                        <b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu">
                        <li>
                            <a href="account.php?page=17"><?php echo $_smarty_tpl->tpl_vars['menu_drop_edit']->value;?>
</a>
                        </li>
                        
                        <li>
                            <a href="account.php?page=48"><?php echo $_smarty_tpl->tpl_vars['payment_settings']->value;?>
</a>
                        </li>
                        
                        <li>
                            <a href="account.php?page=18"><?php echo $_smarty_tpl->tpl_vars['menu_drop_password']->value;?>
</a>
                        </li>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['change_commission']->value)) {?>
                        <li class="divider"></li>

                        <li>
                            <a href="account.php?page=19"><?php echo $_smarty_tpl->tpl_vars['menu_drop_change']->value;?>
</a>
                        </li>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['pic_upload']->value)) {?>
                        <li class="divider"></li>

                        <li>
                            <a href="account.php?page=43"><?php echo $_smarty_tpl->tpl_vars['menu_upload_picture']->value;?>
</a>
                        </li>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['logos_enabled']->value)) {?>
                        <li class="divider"></li>
                        
                        <li>
                            <a href="account.php?page=27"><?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_logo']->value;?>
</a>
                        </li>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['use_faq']->value) && ($_smarty_tpl->tpl_vars['faq_location']->value == 2)) {?>
                            <li class="divider"></li>
                            
                            <li>
                                <a href="account.php?page=21"><?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_faq']->value;?>
</a>
                            </li>
                        <?php }?>

                        <?php if (isset($_smarty_tpl->tpl_vars['testimonials']->value)) {?>
                            <li class="divider"></li>
                        
                            <li>
                                <a href="account.php?page=41"><?php echo $_smarty_tpl->tpl_vars['menu_offer_testi']->value;?>
</a>
                            </li>
                        <?php }?>

                        <li class="divider"></li>
                        
                        <li>
                            <a href="index.php?logout=true"><i class="fa fa-power-off"></i> <?php echo $_smarty_tpl->tpl_vars['menu_logout']->value;?>
</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php }?>
-->
            <div class="collapse navbar-collapse top-collapse mobileFix">
                <ul class="nav navbar-left navbar-nav">
                    <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                        <a href="index.php">
                            <span style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['header_indexLink']->value;?>
</span>
                        </a>
                    </li>
                    
                    <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                        <a href="account.php?sorts[date]=-1">
                            <span style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['header_accountLink']->value;?>
</span>
                        </a>
                    </li>
                    
                    <?php if (!isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
                    <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                        <a href="signup.php">
                            <span style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['header_signupLink']->value;?>
</span>
                        </a>
                    </li>
                    <?php }?>

                    <?php if (isset($_smarty_tpl->tpl_vars['contact_form']->value)) {?>
                    <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                        <a href="contact.php">
                            <span style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
</span>
                        </a>
                    </li>
                    <?php }?>
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['use_faq']->value) && ($_smarty_tpl->tpl_vars['faq_location']->value == 1)) {?>
                    <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                        <a href="faq.php">
                            <span style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['menu_faq']->value;?>
</span>
                        </a>
                    </li>
                    <?php }?>
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['testimonials']->value) && (isset($_smarty_tpl->tpl_vars['testimonials_active']->value))) {?>
                    <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['top_menu_background']->value;?>
;">
                        <a href="testimonials.php">
                            <span style="color: <?php echo $_smarty_tpl->tpl_vars['top_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['header_testimonials']->value;?>
</span>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php }
}
