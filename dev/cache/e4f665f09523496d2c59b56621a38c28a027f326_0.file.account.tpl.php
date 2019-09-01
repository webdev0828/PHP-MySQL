<?php
/* Smarty version 3.1.30, created on 2019-04-04 15:10:10
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca61e523e3de7_68285060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4f665f09523496d2c59b56621a38c28a027f326' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/account.tpl',
      1 => 1554132258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:tandc_re-accept.tpl' => 2,
    'file:account_pending_approval.tpl' => 1,
    'file:account_suspended.tpl' => 1,
    'file:account_general_stats.tpl' => 1,
    'file:account_tier_stats.tpl' => 1,
    'file:account_payment_history.tpl' => 1,
    'file:account_commission_list_subs.tpl' => 1,
    'file:account_commission_list.tpl' => 1,
    'file:account_traffic_log.tpl' => 1,
    'file:account_banners.tpl' => 1,
    'file:account_text_ads.tpl' => 1,
    'file:account_text_links.tpl' => 1,
    'file:account_email_links.tpl' => 1,
    'file:account_offline_marketing.tpl' => 1,
    'file:account_tier_code.tpl' => 1,
    'file:account_email_friends.tpl' => 1,
    'file:account_keyword_links.tpl' => 1,
    'file:account_commission_alert.tpl' => 1,
    'file:account_commission_stats.tpl' => 1,
    'file:account_edit.tpl' => 1,
    'file:account_change_password.tpl' => 1,
    'file:account_change_commission.tpl' => 1,
    'file:account_faq.tpl' => 1,
    'file:account_commission_details.tpl' => 1,
    'file:account_html_ads.tpl' => 1,
    'file:account_pdf_marketing.tpl' => 1,
    'file:account_pdf_training.tpl' => 1,
    'file:account_sub_affiliates.tpl' => 1,
    'file:account_upload_logo.tpl' => 1,
    'file:account_email_templates.tpl' => 1,
    'file:account_sub_affiliates_test.tpl' => 1,
    'file:custom/30.tpl' => 1,
    'file:custom/31.tpl' => 1,
    'file:custom/32.tpl' => 1,
    'file:custom/33.tpl' => 1,
    'file:custom/34.tpl' => 1,
    'file:account_alternate_page_links.tpl' => 1,
    'file:account_custom_reports.tpl' => 1,
    'file:account_page_peels.tpl' => 1,
    'file:account_lightboxes.tpl' => 1,
    'file:training_videos.tpl' => 1,
    'file:account_direct_links.tpl' => 1,
    'file:account_testimonials.tpl' => 1,
    'file:account_qr_codes.tpl' => 1,
    'file:account_upload_picture.tpl' => 1,
    'file:account_coupon_codes.tpl' => 1,
    'file:account_announcements.tpl' => 1,
    'file:account_debits.tpl' => 1,
    'file:account_marketing_videos.tpl' => 1,
    'file:account_edit_payment_method.tpl' => 1,
    'file:footer.tpl' => 2,
  ),
),false)) {
function content_5ca61e523e3de7_68285060 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




    <div class="content-area col-full nopad">
        <div class="cnt">
            <?php if (isset($_smarty_tpl->tpl_vars['re_accept']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:tandc_re-accept.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php } else { ?>

                <?php if (isset($_smarty_tpl->tpl_vars['re_accept']->value)) {?>
                    <div class="row">
                        <?php $_smarty_tpl->_subTemplateRender("file:tandc_re-accept.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    </div>

                <?php } else { ?>
            <?php if (isset($_smarty_tpl->tpl_vars['page_not_authorized']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:account_pending_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php } elseif (isset($_smarty_tpl->tpl_vars['affiliate_suspended']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:account_suspended.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php } else { ?>
                <?php if (isset($_smarty_tpl->tpl_vars['payment_update_notice']->value)) {
echo $_smarty_tpl->tpl_vars['payment_update_notice']->value;
}?>
                <?php if ($_smarty_tpl->tpl_vars['internal_page']->value == 1) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_general_stats.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 2) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_tier_stats.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 3) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_payment_history.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 4) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['sub_affiliates_enabled']->value)) {?>
                        <?php $_smarty_tpl->_subTemplateRender("file:account_commission_list_subs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php } else { ?>
                        <?php $_smarty_tpl->_subTemplateRender("file:account_commission_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 6) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_traffic_log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 7) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_banners.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 8) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_text_ads.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 9) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_text_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 10) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_email_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 11) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_offline_marketing.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 12) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_tier_code.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 13) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_email_friends.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 14) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_keyword_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 15) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_commission_alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 16) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_commission_stats.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 17) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 18) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_change_password.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 19) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_change_commission.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 21) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_faq.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 22) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_commission_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 23) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_html_ads.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 24) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_pdf_marketing.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 25) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_pdf_training.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 26) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_sub_affiliates.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 27) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_upload_logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 28) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_email_templates.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 29) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_sub_affiliates_test.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 30) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:custom/30.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 31) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:custom/31.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 32) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:custom/32.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 33) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:custom/33.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 34) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:custom/34.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 35) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_alternate_page_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 36) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_custom_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 37) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_page_peels.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 38) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_lightboxes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 39) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:training_videos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 40) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_direct_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 41) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_testimonials.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 42) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_qr_codes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 43) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_upload_picture.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 44) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_coupon_codes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 45) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_announcements.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 46) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_debits.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 47) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_marketing_videos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php } elseif ($_smarty_tpl->tpl_vars['internal_page']->value == 48) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:account_edit_payment_method.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <?php }?>
            <?php }?>
            <?php }?>
            <?php }?>
        </div>
    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['re_accept']->value)) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
    <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php }
}
}
