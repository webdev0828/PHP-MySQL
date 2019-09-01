<?php
/* Smarty version 3.1.30, created on 2019-03-29 16:19:36
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/invoice.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c9e2978f3fa19_31916657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd36e15ce437584d528aceb379e9cf39469a7a869' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/invoice.tpl',
      1 => 1553300071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9e2978f3fa19_31916657 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['char_set']->value;?>
">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['custom_invoice_number']->value;?>
: SR<?php echo $_smarty_tpl->tpl_vars['invoice_number']->value;?>
</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/templates/source/common/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/fonts.css">
    <link rel="stylesheet" type="text/css" href="/templates/source/common/font-awesome/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/footable.min.css">
<!-- no whites
    <link rel="stylesheet" type="text/css" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/css/style.css">
-->
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#532B72">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#532B72">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#532B72">
</head>
<body style="margin-top:50px; background-color: #000;margin:2rem;">

<div id="wrapper">
    <div id="main-container">
        <!-- BEGIN MAIN PAGE CONTENT -->
        <div id="page-wrapper" class="collapsed">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="well white padding-25">
                                <div align="center">
                                    <?php if (isset($_smarty_tpl->tpl_vars['main_logo']->value)) {?>
                                        <img style="border:none; height:30px;padding:3px;" src="/<?php echo $_smarty_tpl->tpl_vars['main_logo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
">
                                    <?php }?>
                                </div>

                                <div class="pull-right">
                                    <a href="#" onClick="window.print();return false;">
                                        <i class="fa fa-print fa-lg" style="color:#532B72;"></i>
                                    </a>
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div class="hr hr-double hr-dotted hr-12"></div>
                                
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="bigger-110">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['custom_invoice_number']->value;?>
:</strong> SR<?php echo $_smarty_tpl->tpl_vars['invoice_number']->value;?>


                                            <br />

                                            <strong><?php echo $_smarty_tpl->tpl_vars['custom_custom_invoice_date']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['invoice_date']->value;?>

                                            
                                            <br />
                                            
                                            <strong><?php echo $_smarty_tpl->tpl_vars['custom_invoice_ammount']->value;?>
:</strong> <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['invoice_amount']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                            
                                            <?php if (isset($_smarty_tpl->tpl_vars['revised_numbers']->value)) {?>
                                            
                                            <br />

                                            <strong><?php echo $_smarty_tpl->tpl_vars['debit_invoice_amount']->value;?>
:</strong> <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['pexacttotaldebs']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                            
                                            <br />

                                            <font color="#532B72"><strong><?php echo $_smarty_tpl->tpl_vars['debit_revised_amount']->value;?>
:</strong> <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['revised_amount']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</font>
                                            <?php }?>

                                            <?php if (isset($_smarty_tpl->tpl_vars['vat_amount']->value)) {?>
                                            
                                            <br />

                                            <strong><?php echo $_smarty_tpl->tpl_vars['vat_amount_heading']->value;?>
:</strong> <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['vat_amount']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                            <?php }?>
                                        </p>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="text-right">
                                            <span class="label label-xlg arrowed-in-right arrowed-in label-danger" style="background-color:#532B72;">
                                                <?php echo $_smarty_tpl->tpl_vars['invoice_header']->value;?>

                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-16"></div>
                                
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h4 class="text-primary" style="color:#532B72;">
                                            <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['invoice_co_info']->value;?>

                                        </h4>
                                        
                                        <div class="hr hr-4 hr-dotted"></div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <address>
                                                    <strong><?php echo $_smarty_tpl->tpl_vars['invoice_our_company']->value;?>
</strong>
                                                    <?php echo $_smarty_tpl->tpl_vars['invoice_our_address1']->value;?>

                                                    <?php echo $_smarty_tpl->tpl_vars['invoice_our_address2']->value;?>

                                                    <?php echo $_smarty_tpl->tpl_vars['invoice_our_city']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['invoice_our_state']->value;?>
<br />
                                                    <?php echo $_smarty_tpl->tpl_vars['invoice_our_zip']->value;?>

                                                    <?php echo $_smarty_tpl->tpl_vars['invoice_our_country']->value;?>

                                                </address>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>
                                                    <strong><?php echo $_smarty_tpl->tpl_vars['invoice_aff_user']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['invoice_username']->value;?>


                                                    <br />

                                                    <strong><?php echo $_smarty_tpl->tpl_vars['invoice_aff_id']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_id']->value;?>


                                                    <br />
                                                    
                                                    <strong><?php echo $_smarty_tpl->tpl_vars['edit_personal_phone']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['invoice_phone']->value;?>

                                                </p>

                                                <div class="space-4"></div>
                                                
                                                <p>
                                                    <strong><?php echo $_smarty_tpl->tpl_vars['edit_standard_taxinfo']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['invoice_taxinfo']->value;?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <h4 class="text-primary" style="color:#532B72;">
                                            <?php echo $_smarty_tpl->tpl_vars['invoice_aff_info']->value;?>

                                        </h4>
                                        
                                        <div class="hr hr-4 hr-dotted"></div>
                                        <address>
                                            <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_payto']->value;?>

                                            <?php if (!empty($_smarty_tpl->tpl_vars['invoice_affiliate_cname']->value)) {?>
                                            <strong><?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_cname']->value;?>
</strong><br />
                                            <?php } else { ?>
                                            <strong><?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_fname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_lname']->value;?>
</strong>
                                            <?php }?>
                                            <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_address1']->value;?>

                                            <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_address2']->value;?>

                                            <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_city']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_state']->value;?>
<br />
                                            <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_zip']->value;?>

                                            <?php echo $_smarty_tpl->tpl_vars['invoice_affiliate_country']->value;?>

                                        </address>
                                    <!-- TODO: add payout details here from invoice.php, get from DB-->
                                    </div>
                                </div>

                                <?php if (isset($_smarty_tpl->tpl_vars['revised_numbers']->value)) {?>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="20%">
                                                    <?php echo $_smarty_tpl->tpl_vars['debit_date_label']->value;?>

                                                </th>
                                                
                                                <th width="60%">
                                                    <?php echo $_smarty_tpl->tpl_vars['debit_reason_label']->value;?>

                                                </th>
                                                
                                                <th width="20%" style="text-align:right;">
                                                    <?php echo $_smarty_tpl->tpl_vars['debit_amount_label']->value;?>

                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
$__section_nr_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['debit_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_0_total = $__section_nr_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_0_total != 0) {
for ($__section_nr_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_0_iteration <= $__section_nr_0_total; $__section_nr_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                            <tr>
                                                <td width="20%">
                                                    <?php echo $_smarty_tpl->tpl_vars['debit_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['debit_date_table'];?>

                                                </td>
                                                
                                                <td width="60%">
                                                    <?php echo $_smarty_tpl->tpl_vars['debit_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['debit_reason_table'];?>

                                                </td>
                                                
                                                <td width="20%" style="text-align:right;">
                                                <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['debit_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['debit_amount_table'];
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                                </td>
                                            </tr>
                                            <?php
}
}
if ($__section_nr_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_0_saved;
}
?>
                                    </table>
                                <?php }?>
                                
                            <div style="overflow-x:auto;">
                                <table class="table table-striped table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th width="25%">
                                                <?php echo $_smarty_tpl->tpl_vars['comdetails_date']->value;?>

                                            </th>
                                            
                                            <th width="45%">
                                                <?php echo $_smarty_tpl->tpl_vars['invoice_comm_type']->value;?>

                                            </th>

                                            <th width="5%">
                                                <?php echo $_smarty_tpl->tpl_vars['custom_country']->value;?>

                                            </th>
                                            
                                            <th width="25%" style="text-align:right;">
                                                <?php echo $_smarty_tpl->tpl_vars['invoice_comm_amt']->value;?>

                                            </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
$__section_nr_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_nr']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr'] : false;
$__section_nr_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['payment_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_1_total = $__section_nr_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_1_total != 0) {
for ($__section_nr_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_1_iteration <= $__section_nr_1_total; $__section_nr_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
?>
                                        <tr>
                                            <td width="25%">
                                                <?php echo $_smarty_tpl->tpl_vars['payment_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['payment_individual_date'];?>

                                            </td>
                                            
                                            <td class="type" width="45%">
                                                <?php echo $_smarty_tpl->tpl_vars['payment_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['payment_individual_type'];?>

                                            </td>

                                            <td width="5%">
                                                <?php if (isset($_smarty_tpl->tpl_vars['payment_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['geo_location'])) {?>
                                                <img border="0" src="/images/geo_flags/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['payment_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['geo_location'], 'UTF-8');?>
.png" class="geo_flag" style="padding-bottom:3px;"/> <?php echo $_smarty_tpl->tpl_vars['payment_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['geo_location'];?>

                                                <?php } else { ?>
                                                <img border="0" src="/images/geo_flags/n/a.png" class="geo_flag" style="padding-bottom:3px;"/> N/A
                                                <?php }?>
                                            </td>
                                            
                                            <td class="amount" width="25%" style="text-align:right;">
                                            <?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['payment_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['payment_individual_amount'];
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>

                                            </td>
                                        </tr>
                                        <?php
}
}
if ($__section_nr_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = $__section_nr_1_saved;
}
?>
                                </table>
                            </div>

                                <div class="row">
                                    <div class="col-lg-12 pull-right">
                                        <p class="text-right bigger-150">
                                            <strong><?php echo $_smarty_tpl->tpl_vars['custom_invoice_comm_amt_total']->value;?>
:</strong><span class="text-danger" style="color:#532B72;"> <strong><?php if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 1) {
echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}
echo $_smarty_tpl->tpl_vars['revised_amount']->value;
if ($_smarty_tpl->tpl_vars['cur_sym_location']->value == 2) {?> <?php echo $_smarty_tpl->tpl_vars['cur_sym']->value;
}?> <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</strong></span>
                                        </p>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                                
                                <hr class="separator" />
                                
                                <div class="well light text-center">
                                    <!-- TODO: fix and translate in Russian, use custom language token -->
                                    <?php echo $_smarty_tpl->tpl_vars['custom_custom_invoice_note']->value;?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
        <!-- END MAIN PAGE CONTENT -->
    </div>
</div>


<?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/lightbox/js/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/templates/source/common/bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/footable.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/jquery.slimscroll.init.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/footable.init.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
$('td.amount:contains("-")').parents('tr').css('color','#532B72');
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
