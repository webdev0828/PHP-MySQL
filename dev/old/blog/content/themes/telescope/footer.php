<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Telescope
 */

?>
	<footer style="margin-top: 18rem;">
        <div class="row">
            <div class="col-full ss-copyright">
		<div class="wrapper wrapper-footer">

			<?php get_sidebar( 'footer' ); ?>
			
		<div class="col-full ss-copyright">
                <span><?php echo __('[:en]Copyright[:ru]Авторские права'); ?> <?php echo date("Y"); ?> <a href="https://sublimerevenue.com">Sublime Revenue</a> - <?php echo __('[:en]All Rights Reserved[:ru]Все права защищены'); ?></span> 
                <span> <a href="/contact" title="<?php echo __('[:en]Contact Us[:ru]Связаться с нами'); ?>"><?php echo __('[:en]Contact Us[:ru]Связаться с нами'); ?></a></span>
                <span> <a href="/privacy-policy"><?php echo __('[:en]Privacy Policy[:ru]Политика конфиденциальности'); ?></a></span>
        </div>

		</div><!-- .wrapper .wrapper-footer -->
			</div>
		</div>
        <div class="ss-go-top">
            <a class="smoothscroll" title="<?php echo __('[:en]Back To Top[:ru]Вернуться к началу'); ?>" href="#top"><?php echo __('[:en]Back To Top[:ru]Вернуться к началу'); ?></a>
        </div>
	</footer><!-- .site-footer -->

</div><!-- end #container -->

<?php wp_footer(); ?>
    <script src="https://use.fontawesome.com/fc6a809c72.js"></script>
    <script src="https://sublimerevenue.com/js/jquery-3.2.1.min.js"></script>
    <script src="https://sublimerevenue.com/js/plugins.js"></script>
    <script src="https://sublimerevenue.com/js/main.js"></script>
	<script src="/blog/wp-content/themes/telescope/js/nav.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bcd66edbfeee9b3"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be2a53a70ff5a5a3a7101d3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>