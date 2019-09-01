<?php
/**
 * Custom functions that act independently of the theme templates
 */
function best_wp_body_classes( $ap_classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$ap_classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$ap_classes[] = 'hfeed';
	}

	return $ap_classes;
}
add_filter( 'body_class', 'best_wp_body_classes' );
