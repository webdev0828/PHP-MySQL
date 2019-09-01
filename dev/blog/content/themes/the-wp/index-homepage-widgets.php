<?php
/**
 * The sidebar containing the home page widget area.
 *
 * @package The WP Theme

 */

if ( ! is_active_sidebar( 'front-page' ) ) {
	return;
}
?>

<div class="homepage-widget-area" role="complementary">
	<?php dynamic_sidebar( 'front-page' ); ?>
</div>