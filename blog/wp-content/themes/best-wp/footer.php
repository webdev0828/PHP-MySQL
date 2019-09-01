<?php
/**
 * The template for displaying the footer
 */

?>

	</div><!-- #content -->
	
		<?php if (esc_attr(get_theme_mod( 'social_media_activate' )) ) { ?>
		<div style="float: none; text-align: center;  display: inline-table;" class="social">
				<div  style="float: none;" class="fa-icons">
					<?php echo best_wp_social_section (); ?>
				</div>
		</div>
		
	<?php } ?>
	
	<footer role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	
		<div id="colophon"  class="site-info">
		<?php if (esc_textarea(get_theme_mod('best_wp_premium_copyright1'))) : echo esc_textarea(get_theme_mod('best_wp_premium_copyright1')); else : ?>
			<p>
					<?php esc_html_e('All rights reserved', 'best-wp'); ?>  &copy; <?php bloginfo('name'); ?>
								
					<a title="Seos Themes" href="<?php echo esc_url('https://seosthemes.com/', 'best-wp'); ?>" target="_blank"><?php esc_html_e('Theme by Seos Themes', 'best-wp'); ?></a>
			</p>
		<?php endif; ?>		
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	<a id="totop" href="#"><div><?php esc_html_e('To Top', 'best-wp'); ?></div></a>	
</div><!-- #page -->


	
<?php wp_footer(); ?>

</body>
</html>
