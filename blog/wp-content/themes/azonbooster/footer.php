<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AzonBooster
 */

?>
	</div> <!-- .col-full -->
	</div><!-- #content -->
	
	<?php do_action( 'azonbooster_before_footer' ); ?>

	<footer id="colophon" class="site-footer">

		<div class="col-full">
			
			<?php
			/**
			 * Functions hooked in to azonbooster_footer action
			 *
			 * @hooked azonbooster_footer_widgets - 10
			 * @hooked azonbooster_credit         - 20
			 */
			do_action( 'azonbooster_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'azonbooster_after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
