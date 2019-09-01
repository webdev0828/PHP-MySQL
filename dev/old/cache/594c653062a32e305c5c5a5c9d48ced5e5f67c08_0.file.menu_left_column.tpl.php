<?php
/* Smarty version 3.1.30, created on 2019-03-15 13:17:54
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/menu_left_column.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c8b89e2ccd762_38904014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '594c653062a32e305c5c5a5c9d48ced5e5f67c08' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/menu_left_column.tpl',
      1 => 1552594651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8b89e2ccd762_38904014 (Smarty_Internal_Template $_smarty_tpl) {
?>



<?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>

<div class="b-right"<?php if (!isset($_smarty_tpl->tpl_vars['cp_menu_location']->value)) {?> style=""<?php }?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
">
    <div style="display:none;" class="menu-button">
        <span>Touch for more options</span>
        <img alt="" src="/images/collapse-top.png"/>
    </div>

    <ul class="prime">
        <?php if (isset($_smarty_tpl->tpl_vars['tier_enabled']->value)) {?>
        <li class="dropdown" style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
">
            <a href="/dashboard/statistics" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fa fa-bar-chart fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_statistics']->value;?>
</a>
        </li>

        <?php } else { ?>
        <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="/dashboard/statistics"><?php echo $_smarty_tpl->tpl_vars['menu_drop_general_stats']->value;?>
</a>
        </li>
        <?php }?>

        <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="#" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fa fa-wrench fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_heading_marketing']->value;?>
</a>

            <ul class="submenu">
                <?php if (isset($_smarty_tpl->tpl_vars['textlink_count']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/smartlinks" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'text_links')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-external-link-alt fa fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_text_links']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['htmlcount']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/popunders" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'htmlads')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-undo fa fw"></i><?php echo $_smarty_tpl->tpl_vars['custom_popunder']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['etemplates_count']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/backoffers" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'email_templates')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-arrow-circle-left fa fw"></i><?php echo $_smarty_tpl->tpl_vars['custom_backoffer']->value;?>
</a>
                </li>
                <?php }?>
<!-- hide QR
                <?php if (isset($_smarty_tpl->tpl_vars['qr_codes_enabled']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/qr-codes" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'qr_codes')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-qrcode fa fw"></i><?php echo $_smarty_tpl->tpl_vars['qr_code_title']->value;?>
</a>
                </li>
                <?php }?>
-->
                <?php if (isset($_smarty_tpl->tpl_vars['banner_count']->value)) {?>
                <li>
                    <a href="/dashboard/promo-tools/direct-offers" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'banners')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-cart-arrow-down fa fw"></i><?php echo $_smarty_tpl->tpl_vars['custom_offers']->value;?>
</a>
                </li>
                <?php }?>
<!-- hide PP
                <?php if (isset($_smarty_tpl->tpl_vars['page_peel_count']->value)) {?>
                <li>
                    <a href="/account.php?page=37" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'peels')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-file-alt fa fw"></i> TODO: <?php echo $_smarty_tpl->tpl_vars['menu_page_peels']->value;?>
???</a>
                </li>
                <?php }?>
-->
<!-- hide
                <?php if (isset($_smarty_tpl->tpl_vars['textad_count']->value)) {?>
                <li>
                    <a href="account.php?page=8" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'textads')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-window-restore fa fw"></i>TODO: Smart Banners</a>
                </li>
                <?php }?>
-->
                <?php if (isset($_smarty_tpl->tpl_vars['coupon_codes_available']->value)) {?>
                <li>
                    <a href="account.php?page=44" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'coupons')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_coupon']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['videomarketing_count']->value)) {?>
                <li>
                    <a href="account.php?page=47" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'video_marketing')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_marketing_videos']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['announcement_count']->value)) {?>
                <li>
                    <a href="account.php?page=45" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'social_media')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_announcements']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['lightbox_count']->value)) {?>
                <li>
                    <a href="account.php?page=38" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'lightboxes')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_lightboxes']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['email_links_available']->value)) {?>
                <li>
                    <a href="account.php?page=10" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'email_links')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_email_links']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['offline_marketing']->value)) {?>
                <li>
                    <a href="account.php?page=11" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'offline')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_offline']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pdf_marketing_count']->value)) {?>
                <li>
                    <a href="account.php?page=24" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'pdf_marketing')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_pdf_marketing']->value;?>
</a>
                </li>
                <?php }?>
            </ul>
        </li>

        <?php if (isset($_smarty_tpl->tpl_vars['show_debits']->value)) {?>
        <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="account.php?page=46" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['menu_drop_pending_debits']->value;?>
</a>
        </li>
        <?php }?>
<!-- hide commissions menu
        <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="#" style=" color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fa fa-euro fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_commissions']->value;?>
</a>

            <ul class="submenu">
                
                <li>
                    <a href="account.php?page=4&report=1" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'comms_current')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_current']->value;?>
</a>
                </li>

                <?php if (isset($_smarty_tpl->tpl_vars['tier_enabled']->value)) {?>
                <li>
                    <a href="account.php?page=4&report=2" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'comms_tier')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_drop_tier']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['pending_enabled']->value)) {?>
                <li>
                    <a href="account.php?page=4&report=3" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'comms_pending')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_pending']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['delayed_enabled']->value)) {?>
                <li>
                    <a href="account.php?page=4&report=6" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'comms_delayed')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_delayed']->value;?>
</a>
                </li>
                <?php }?>

                <li>
                    <a href="account.php?page=4&report=4" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'comms_paid')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_paid']->value;?>
</a>
                </li>

                <?php if (isset($_smarty_tpl->tpl_vars['tier_enabled']->value)) {?>
                <li>
                    <a href="account.php?page=4&report=5" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'comms_paid_tier')) {?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['menu_drop_paid_rec']->value;?>
</a>
                </li>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['show_debits']->value)) {?>
                <li>
                    <a href="account.php?page=46"><?php echo $_smarty_tpl->tpl_vars['menu_drop_pending_debits']->value;?>
</a>
                </li>
                <?php }?>
            </ul>
        </li>
-->
        <li <?php if ($_smarty_tpl->tpl_vars['internal_page']->value == 3) {?> class="active"<?php }?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="/dashboard/payment-history" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fa fa-euro fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_history']->value;?>
</a>
        </li>
<!-- hide traffic log
        <li <?php if ($_smarty_tpl->tpl_vars['internal_page']->value == 6) {?> class="active"<?php }?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="account.php?page=6" style=" color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_traffic']->value;?>
</a>
        </li>
-->
	<li style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="#" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fa fa-user fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_accountLink']->value;?>
</a>
                    <ul class="submenu">
                        <li>
                            <a href="/dashboard/manage-account/edit-account" <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && ($_smarty_tpl->tpl_vars['internal_page']->value == '17')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-edit fa fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_edit']->value;?>
</a>
                        </li>
<!-- hide 
                        <li>
                            <a href="account.php?page=48"><i class="fa fa-angle-right fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['payment_settings']->value;?>
</a>
                        </li>
-->
                        <li>
                            <a href="/dashboard/manage-account/change-password" <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && ($_smarty_tpl->tpl_vars['internal_page']->value == '18')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-key fa fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_password']->value;?>
</a>
                        </li>
                        <?php if (isset($_smarty_tpl->tpl_vars['change_commission']->value)) {?>
                        <li>
                            <a href="account.php?page=19"><i class="fa fa-angle-right fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_drop_change']->value;?>
</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['pic_upload']->value)) {?>
                        <li>
                            <a href="/dashboard/manage-account/upload-picture" <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && ($_smarty_tpl->tpl_vars['internal_page']->value == '43')) {?> class="active"<?php }?>><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-camera fa fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_upload_picture']->value;?>
</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['logos_enabled']->value)) {?>
                        <li>
                            <a href="account.php?page=27"><i class="fa fa-angle-right fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_logo']->value;?>
</a>
                        </li>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['use_faq']->value) && ($_smarty_tpl->tpl_vars['faq_location']->value == 2)) {?>
                            
                            <li>
                                <a href="account.php?page=21"><i class="fa fa-angle-right fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_faq']->value;?>
</a>
                            </li>
                        <?php }?>
<!-- hide testies
                        <?php if (isset($_smarty_tpl->tpl_vars['testimonials']->value)) {?>
                        
                            <li>
                                <a href="account.php?page=41"><i class="fa fa-angle-right fa-fw"></i><i class="fa fa-comments fa fw"></i><?php echo $_smarty_tpl->tpl_vars['menu_offer_testi']->value;?>
</a>
                            </li>
                        <?php }?>
-->
                    </ul>

                <?php if (isset($_smarty_tpl->tpl_vars['second_tier']->value)) {?>
                <li>
                    <a href="/dashboard/referrals"><i class="fa fa-share-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_referrals']->value;?>
</a>
                </li>
                <?php }?>
	</li>
        <li style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;">
            <a href="#" style="color:<?php echo $_smarty_tpl->tpl_vars['cp_main_menu_text']->value;?>
;"><i class="fa fa-server fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_sts_postback']->value;?>
</a>
            <ul class="submenu">
                <li>
                    <a href="/dashboard/postback/settings" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'postbacks_settings')) {?> class="active"<?php }?>><i class="fa fa-sliders-h fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_settings']->value;?>
</a>
                </li>
                <li>
                    <a href="/dashboard/postback/logs" <?php if (isset($_smarty_tpl->tpl_vars['sub_menu_group']->value) && ($_smarty_tpl->tpl_vars['sub_menu_group']->value == 'postbacks_logs')) {?> class="active"<?php }?>><i class="fa fa-history fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_postback_logs']->value;?>
</a>
                </li>
            </ul>
        </li>
                <li>
                    <a href="/blog"><i class="fa fa-newspaper fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['custom_blog']->value;?>
</a>
                </li>
                <li>
                    <a href="/faq"><i class="fa fa-question-circle fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_drop_heading_faq']->value;?>
</a>
                </li>
                <li>
                    <a href="javascript:void(Tawk_API.toggle())"><i class="fa fa-envelope fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
</a>
                </li>
                <li>
                    <a href="/logout"><i class="fa fa-sign-out-alt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['menu_logout']->value;?>
</a>
                </li>
    </ul>
    </div>
    <?php }?>
    
    <?php if (isset($_smarty_tpl->tpl_vars['affiliate_library_access']->value)) {?>
    <div style="padding-top:15px; padding-bottom: 15px; text-align:center;" class="hidden-xs">
        <form method="post" target="_blank" action="https://www.affiliatelibrary.com/welcome/index.php">
            
            <input type="hidden" name="aff_fname" value="<?php echo $_smarty_tpl->tpl_vars['aff_fname']->value;?>
"/>
            <input type="hidden" name="aff_lname" value="<?php echo $_smarty_tpl->tpl_vars['aff_lname']->value;?>
"/>
            <input type="hidden" name="aff_email" value="<?php echo $_smarty_tpl->tpl_vars['aff_email']->value;?>
"/>
            
            <button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['aff_lib_button']->value;?>
</button>
        </form>
    </div>
    <?php }
}
}
