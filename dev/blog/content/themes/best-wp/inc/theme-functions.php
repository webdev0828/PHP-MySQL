<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Functions and definitions
 */
/*******************************
Basic
********************************/

if ( ! function_exists( 'best_wp_setup' ) ) :

function best_wp_setup() {

	load_theme_textdomain( 'best-wp', BEST_WP_THEME . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );

	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	register_nav_menu('primary', esc_html__( 'Primary', 'best-wp' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'best_wp_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'best_wp_setup' );

/*******************************
$content_width
********************************/

function best_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_wp_content_width', 840 );
}
add_action( 'after_setup_theme', 'best_wp_content_width', 0 );


/*******************************
* Register widget area.
********************************/


	function best_wp_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'best-wp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'best-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	
}
add_action( 'widgets_init', 'best_wp_widgets_init' );
	
/*******************************
* Enqueue scripts and styles.
********************************/
 
function best_wp_scripts() {
		wp_enqueue_style( 'dashicons' ); 
		wp_enqueue_style( 'best-wp-style', get_stylesheet_uri());
		wp_enqueue_style( 'animate', BEST_WP_THEME_URI . '/framework/css/animate.css');
		wp_enqueue_style( 'animate-image', BEST_WP_THEME_URI . '/css/style.css');
		wp_enqueue_style( 'font-awesome', BEST_WP_THEME_URI . '/css/font-awesome.css', array(), '4.7.0'  );
		wp_enqueue_style( 'genericons', BEST_WP_THEME_URI . '/framework/genericons/genericons.css', array(), '3.4.1' );	
		wp_enqueue_style( 'best-wp-woocommerce', BEST_WP_THEME_URI . '/inc/woocommerce/woo-css.css' );
		wp_enqueue_style( 'best-wp-font', '//fonts.googleapis.com/css?family=Coda+Caption:800' );

		wp_enqueue_script( 'best-wp-navigation', BEST_WP_THEME_URI . '/framework/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'best-wp-skip-link-focus-fix', BEST_WP_THEME_URI . '/framework/js/skip-link-focus-fix.js', array(), '20130115', true );

		if ( is_singular() && wp_attachment_is_image() ) {
			wp_enqueue_script( 'best-wp-keyboard-image-navigation', BEST_WP_THEME_URI . '/framework/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
		}
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
}

add_action( 'wp_enqueue_scripts', 'best_wp_scripts' );


function best_wp_admin_scripts() {
	
		wp_enqueue_style( 'best-wp-seos-admin', BEST_WP_THEME_URI . '/inc/css/admin.css');
}		
add_action( 'admin_enqueue_scripts', 'best_wp_admin_scripts' );


/*******************************
* Includes.
*******************************/

	require BEST_WP_THEME . '/inc/template-tags.php';
	require BEST_WP_THEME . '/inc/extras.php';
	require BEST_WP_THEME . '/inc/customizer.php';
	require BEST_WP_THEME . '/inc/jetpack.php';
	require BEST_WP_THEME . '/inc/custom-header.php';
	require BEST_WP_THEME . '/inc/woocommerce/woo-functions.php';
	require BEST_WP_THEME . '/inc/social.php';
	require BEST_WP_THEME . '/inc/pro/pro.php';

/*********************************************************************************************************
* Excerpt Read More
**********************************************************************************************************/

function best_wp_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'best-wp' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'best_wp_excerpt_more' );

		
/* ----------------------------------------------------------------------
Hide the Sidebar
---------------------------------------------------------------------- */

	function best_wp_active_sidebar () { 
	if ( ! is_active_sidebar('sidebar-1') ) { ?>
		<style> #content main{float: none; width: 100%; padding: 0;}</style>
	<?php }
	}
	
	add_action('wp_head','best_wp_active_sidebar');