<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package The WP Theme

 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function the_wp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'the_wp_jetpack_setup' );


function the_wp_custom_tiled_gallery_width() {
	if ( get_theme_mod( 'layout_size', 1200 ) != 1200 ) {
		$layout_size = get_theme_mod( 'layout_size' );
		$content_width = ( 67 / 100 ) * $layout_size; // 67 : Width of primary area
		return $content_width;
	} else {
		return 500;
	}	
}
add_filter( 'tiled_gallery_content_width', 'the_wp_custom_tiled_gallery_width' );
