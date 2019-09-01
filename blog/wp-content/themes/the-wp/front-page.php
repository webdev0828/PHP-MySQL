<?php
/**
 * @package The WP Theme
 */
 
get_header();

	/****** homepage widgets (after slider)  ********/
	if( $paged <= 1 ) get_template_part('index', 'homepage-widgets') ;
	
	/****** For a Front page displays  ********/
	if ( get_theme_mod( 'frontpage_posts', 1 ) ) {
		if (  get_option( 'show_on_front' ) == "posts" ) {
			get_template_part('index', 'homepage') ;
		} elseif ( get_option( 'show_on_front' ) == "page" ) {
			get_template_part('index');
		}
	}
		
get_footer();

?>