<?php
/**
 * The sidebar containing the front page widget areas.
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Telescope
 */

if ( ! is_active_sidebar( 'sidebar-secondary' ) && 1 != get_theme_mod( 'telescope_front_featured_categories', 0 ) ) {
	return;
}
?>

<div class="ilovewp-column ilovewp-column-2">

	<div class="ilovewp-column-wrapper clearfix">

		<?php
		if ( 1 == get_theme_mod( 'telescope_front_featured_categories', 0 ) ) {
			get_template_part( 'template-parts/content', 'home-categories' );
		}
		?>

		<?php if ( is_active_sidebar( 'sidebar-secondary' ) ) : ?>

		<aside id="site-aside-secondary" role="complementary">
		
			<div class="site-aside-secondary-wrapper clearfix">
			
			<?php dynamic_sidebar( 'sidebar-secondary' ); ?>

			</div><!-- .site-aside-wrapper .clearfix -->
		
		</aside><!-- #site-aside-secondary -->

		<?php endif; ?>

	</div><!-- .ilovewp-column-wrapper -->

</div><!-- .ilovewp-column .ilovewp-column-2 -->