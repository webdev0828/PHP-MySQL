<?php
/* Smarty version 3.1.30, created on 2019-04-09 10:31:20
  from "/var/www/sublimerevenue.com/dev/old/templates/themes/SublimeRevenue/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cac7478221133_17985728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef1ffe3c57d8ef1062dbdd82069359939b48e02f' => 
    array (
      0 => '/var/www/sublimerevenue.com/dev/old/templates/themes/SublimeRevenue/header.tpl',
      1 => 1553073773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac7478221133_17985728 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!doctype html>
<html<?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?> dir="rtl"<?php }?> lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['affiliate_username']->value;?>
 #<?php echo $_smarty_tpl->tpl_vars['affiliate_id']->value;?>
</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/dots.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
    <?php if ($_smarty_tpl->tpl_vars['language_direction']->value == '1') {?>
        <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/style-rtl.css">
    <?php } else { ?>
        <link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/style.css?=v<?php ob_start();
echo time();
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['affiliateUsername']->value)) {?>
        <?php echo '<script'; ?>
 src="/js/modernizr.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/common/js/buttons.colVis.min.js"><?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/datatables/tabletools/TableTools.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/datatables/colvis/ColVis.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/datatables/DT_bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/plugins/uniform/jquery.uniform.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>
    <?php }?>

    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/raphael-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/templates/source/common/morris_charts/js/morris.js"><?php echo '</script'; ?>
>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"><?php echo '</script'; ?>
>
    <style>
        .select2-container--open .select2-dropdown--below{
            background-color: black;
        }
        .select2-search__field{
            color: black;
        }
        .select2-container--default .select2-selection--single{
            background-color: #121212;
            color: #fff;
            border-color: rgba(255, 255, 255, 0.1);
            padding: 0.3rem 1.2rem;
            border-radius: 4px;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            height: 34px;
        }
        select[style*="display: none"] + .select2 { display: none; }
    </style>
    
    <!-- Language variables for Datatables (Start) -->
    <?php echo '<script'; ?>
 type="text/javascript">
        var affid = "<?php echo $_smarty_tpl->tpl_vars['affiliate_id']->value;?>
";
        var langDataTable = {};
        langDataTable["sEmptyTable"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sEmptyTable'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sInfo"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sInfo'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sInfoEmpty"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sInfoEmpty'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sInfoFiltered"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sInfoFiltered'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sLengthMenu"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sLengthMenu'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sLoadingRecords"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sLoadingRecords'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sProcessing"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sProcessing'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sSearch"] = "";
        langDataTable["sZeroRecords"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sZeroRecords'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sFirst"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sFirst'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sLast"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sLast'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sNext"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sNext'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sPrevious"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sPrevious'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sSortAscending"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sSortAscending'], ENT_QUOTES, 'UTF-8', true);?>
";
        langDataTable["sSortDescending"] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_data_table']->value['sSortDescending'], ENT_QUOTES, 'UTF-8', true);?>
";
    <?php echo '</script'; ?>
>
    
    <!-- Language variables for Datatables (End) -->

    <?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/common/js/dynamic_tables.js"><?php echo '</script'; ?>
>

    <!-- jsTree -->
    <?php if (isset($_smarty_tpl->tpl_vars['internal_page']->value) && $_smarty_tpl->tpl_vars['internal_page']->value == 2) {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="/templates/source/common/jstree/jstree.min.js"><?php echo '</script'; ?>
>
    <?php }?>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/css/intlTelInput.css">
    
		
	<!-- Date Range Picker -->
    <link rel="stylesheet" type="text/css" media="all" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/daterangepicker.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#532B72">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#532B72">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#532B72">
</head>

<body style="background:<?php echo $_smarty_tpl->tpl_vars['background_color']->value;?>
;" id="bsoverride">
<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-jump">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="col-md-4 col-lg-2 clearfix nopad">
    <div class="logo-area" style="background-color: <?php echo $_smarty_tpl->tpl_vars['cp_main_menu_color']->value;?>
;" align="center">
        <a href="/"><img src="/images/logo_big.svg" alt="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['header_title']->value;?>
"/></a>
            <?php if ($_smarty_tpl->tpl_vars['internal_page']->value) {?>
            <span class="bar" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </span>
            <?php }?>
    </div>
</div>

<div class="clearfix"></div>
<?php }
}
