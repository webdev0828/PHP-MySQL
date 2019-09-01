<?php
/**
 * AzonBooster hooks
 *
 * @package AzonBooster
 */

/**
 * General
 *
 * @see  azonbooster_get_sidebar()
 */
add_action( 'azonbooster_sidebar',        'azonbooster_get_sidebar',          10 );

/**
 * Header
 *
 * @see  azonbooster_skip_links()
 * @see  azonbooster_handburger_btn()
 * @see  azonbooster_site_branding()
 * @see  azonbooster_primary_navigation()
 */
add_action( 'azonbooster_header', 'azonbooster_skip_links', 0 );
add_action( 'azonbooster_header', 'azonbooster_header_menu', 1 );
add_action( 'azonbooster_header', 'azonbooster_header_wrapper', 5 );
add_action( 'azonbooster_header', 'azonbooster_handburger_btn', 10 );
add_action( 'azonbooster_header', 'azonbooster_site_branding', 20 );
add_action( 'azonbooster_header', 'azonbooster_header_wrapper_close', 25 );
add_action( 'azonbooster_header', 'azonbooster_header_search', 30 );
add_action( 'azonbooster_before_header', 'azonbooster_header_search_form', 10 );


/**
 * Footer
 *
 * @see  azonbooster_footer_widgets()
 * @see  azonbooster_credit()
 */
add_action( 'azonbooster_footer', 'azonbooster_footer_widgets', 10 );
add_action( 'azonbooster_footer', 'azonbooster_site_info_wrapper', 15 );
add_action( 'azonbooster_footer', 'azonbooster_credit', 20 );
add_action( 'azonbooster_footer', 'azonbooster_footer_menu', 30 );
add_action( 'azonbooster_footer', 'azonbooster_site_info_wrapper_close', 35 );

/**
 * Posts
 *
 * @see  azonbooster_post_header()
 * @see  azonbooster_post_content()
 * @see  azonbooster_paging_nav()
 * @see  azonbooster_related_posts()
 * @see  azonbooster_post_nav()
 * @see  azonbooster_display_comments()
 * @see  azonbooster_post_thumbnail()
 * @see  azonbooster_post_meta()
 * 
 */
add_action( 'azonbooster_loop_post', 'azonbooster_post_header', 10 );
add_action( 'azonbooster_loop_post', 'azonbooster_post_content', 20 );


add_action( 'azonbooster_loop_after', 'azonbooster_paging_nav', 10 );

add_action( 'azonbooster_single_post', 'azonbooster_post_header', 10 );
add_action( 'azonbooster_single_post', 'azonbooster_post_content', 20 );


add_action( 'azonbooster_single_post_bottom', 'azonbooster_related_posts', 5 );
add_action( 'azonbooster_single_post_bottom', 'azonbooster_post_nav', 10 );
add_action( 'azonbooster_single_post_bottom', 'azonbooster_display_comments', 20 );

add_action( 'azonbooster_before_title', 'azonbooster_post_thumbnail', 10);
add_action( 'azonbooster_post_meta', 'azonbooster_post_meta', 10 );

/**
 * Pages
 * 
 * @see  azonbooster_page_header()
 * @see  azonbooster_page_content()
 * @see  azonbooster_display_comments()
 */
add_action( 'azonbooster_page',       'azonbooster_page_header',          10 );
add_action( 'azonbooster_page',       'azonbooster_page_content',         20 );
add_action( 'azonbooster_page_after', 'azonbooster_display_comments', 10);

/**
 * Homepage Hook
 *
 * @see azonbooster_homepage_content()
 */
add_action( 'azonbooster_homepage', 'azonbooster_homepage_content', 10 );