<?php
/* Smarty version 3.1.30, created on 2019-03-15 13:17:54
  from "/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c8b89e2d4bbf9_77829161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42616d7e281b646b5e6a37905b289c821c461938' => 
    array (
      0 => '/var/www/sublimerevenue.com/templates/themes/SublimeRevenue/footer.tpl',
      1 => 1551791681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8b89e2d4bbf9_77829161 (Smarty_Internal_Template $_smarty_tpl) {
?>



<div class="footer" style="background-color: <?php echo $_smarty_tpl->tpl_vars['header_background']->value;?>
; bottom: 0;">
<div class="addthis_relatedposts_inline"></div>
    <div class="copyrite">
<div class="addthis_inline_follow_toolbox" style="margin: auto;width: 184px;"></div>
        <?php echo $_smarty_tpl->tpl_vars['footer_copyright']->value;?>
 <?php echo date("Y");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
"><strong><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</strong></a> - <?php echo $_smarty_tpl->tpl_vars['footer_rights']->value;?>

        <?php if (isset($_smarty_tpl->tpl_vars['contact_link']->value)) {?>  |  <a href="javascript:void(Tawk_API.toggle())" title="<?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['header_emailLink']->value;?>
</a><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['privacy_policy_public']->value)) {?>  |  <a href="/privacy-policy"><?php echo $_smarty_tpl->tpl_vars['custom_privacy_policy']->value;?>
</a><?php }?>
    </div>
</div>

<!-- Start Google Analytics -->
<?php echo $_smarty_tpl->tpl_vars['ga_footer']->value;?>

<!-- End Google Analytics -->


    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/js/utils.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.4/js/intlTelInput.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $("input[name='phone']").intlTelInput();

        $("form").submit(function (e) {
            var phone = $("input[name='phone']").intlTelInput("getNumber");
            $("input[name='phone']").val(phone);
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
> $(document).ready(function () {
            $('nav ul li').click(function () {

                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    return;
                }

                $('nav ul li').removeClass('active');
                $(this).addClass('active');
            });
            var textvd = $('.page-header.title h1').text();
            var textvds = $('.page-heading-sec h1').text();

            $('.subtitle_bd').append(textvd);
            $('.subtitle_bd').append(textvds);
            $('.submenu li a.active').parent().parent().parent().addClass('active');
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
> /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
        $(document).ready(function () {
            $(window).resize(function () {
                if ($(window).width() > '1200') {
                    $('#mySidenav').css('width', '16.66666667%');
                }
                if ($(window).width() < '1185') {
                    $('#mySidenav').css('width', '0');
                }
            });
        });
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
            document.getElementById("main").style.marginLeft = "100%";
        }
        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    <?php echo '</script'; ?>
>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>

<link rel="stylesheet" href="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/_css/select-options.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/templates/themes/<?php echo $_smarty_tpl->tpl_vars['active_theme']->value;?>
/js/select-options.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bcd66edbfeee9b3"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/plugins.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/main.js"><?php echo '</script'; ?>
>
<!--Start of Tawk.to Script-->
<?php echo '<script'; ?>
 type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be2a53a70ff5a5a3a7101d3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
<?php echo '</script'; ?>
>
<!--End of Tawk.to Script-->
</body>
</html>
<?php }
}
