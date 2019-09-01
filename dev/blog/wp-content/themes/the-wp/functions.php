<?php
/**
 * The WP functions and definitions
 *
 * @package The WP Theme
 */


/* Sets the path to the parent theme directory. */
define( 'CEEWP_THEMEDIR', get_template_directory() );

/* Sets the path to the parent theme directory URI. */
define( 'CEEWP_THEMEURI', get_template_directory_uri() );
		
			
if ( ! function_exists( 'the_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_wp_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 670; /* pixels */
		if ( get_theme_mod( 'layout_size', 1200 ) != 1200 ) {
			$layout_size = get_theme_mod( 'layout_size' );
			$content_width = ( 67 / 100 ) * $layout_size; // 67 : Width of primary area
		}
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Wp, use a find and replace
	 * to change 'the-wp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'the-wp', CEEWP_THEMEDIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu' => __( 'Primary Menu', 'the-wp' ),
		'footer-menu' => __( 'Footer Menu', 'the-wp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the_wp_custom_background_args', array(
		'default-image' => CEEWP_THEMEURI.'/images/bg.jpg',
		'default-repeat' => 'repeat'
	) ) );
	
	$headerH = get_theme_mod( 'header_size', 110 );
	$headerW = get_theme_mod( 'layout_size', 1200 );
	add_theme_support( 'custom-header', apply_filters( 'the_wp_custom_header_args', array(
	    'default-image'			=> '%s/images/headers/default.jpg',
		'width'					=> $headerW,
		'height'				=> $headerH,
		'default-text-color'	=> '#FFF',
		'random-default'		=> true,
		/*'flex-height'            => true,*/
	) ) );
	
	register_default_headers( array(
	'default' => array(
		'url'           => '%s/images/headers/default.jpg',
		'thumbnail_url' => '%s/images/headers/default-thumbnail.jpg',
	),
	'beautiful' => array(
		'url'           => '%s/images/headers/beautiful.jpg',
		'thumbnail_url' => '%s/images/headers/beautiful-thumbnail.jpg',
	),
	'lake-mcdonald' => array(
		'url'           => '%s/images/headers/lake-mcdonald.jpg',
		'thumbnail_url' => '%s/images/headers/lake-mcdonald-thumbnail.jpg',
	),
	'mountain' => array(
		'url'           => '%s/images/headers/mountain.jpg',
		'thumbnail_url' => '%s/images/headers/mountain-thumbnail.jpg',
	),
	'railroad' => array(
		'url'           => '%s/images/headers/railroad.jpg',
		'thumbnail_url' => '%s/images/headers/railroad-thumbnail.jpg',
	),
	'seascapes' => array(
		'url'           => '%s/images/headers/seascapes.jpg',
		'thumbnail_url' => '%s/images/headers/seascapes-thumbnail.jpg',
	),
	'sunrise' => array(
		'url'           => '%s/images/headers/sunrise.jpg',
		'thumbnail_url' => '%s/images/headers/sunrise-thumbnail.jpg',
	)	,
	'water-motion' => array(
		'url'           => '%s/images/headers/water-motion.jpg',
		'thumbnail_url' => '%s/images/headers/water-motion-thumbnail.jpg',
	)
	) );


	add_theme_support( 'post-thumbnails' );
	
	//add_editor_style();
	
	// WooCommerce Support Declaration
	add_theme_support( 'woocommerce' );
}
endif; // the_wp_setup	
add_action( 'after_setup_theme', 'the_wp_setup', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function the_wp_widgets_init() {
	// header
	register_sidebar( array(
		'name'          => __( 'Header', 'the-wp' ),
		'id'            => 'header',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="header-widget-title">',
		'after_title'   => '</div>',
	) );
	// Sidebars
	register_sidebar( array(
		'name'          => sprintf( "%1s &rarr; %2s" , __( 'Sidebar', 'the-wp' ), __( 'Right', 'the-wp' ) ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s &rarr; %2s" , __( 'Sidebar', 'the-wp' ), __( 'Left', 'the-wp' ) ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	// Home Page
	register_sidebar( array(
		'name'          => __( 'Front page', 'the-wp' ),
		'id'            => 'front-page',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	// Footer
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 1, __( 'Full Size', 'the-wp' ) ),
		'id'            => 'footer-full',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 1, __( 'Left', 'the-wp' ) ),
		'id'            => 'footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 2, __( 'Center', 'the-wp' ) ),
		'id'            => 'footer-center',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 3, __( 'Right', 'the-wp' ) ),
		'id'            => 'footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	
}
add_action( 'widgets_init', 'the_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the_wp_scripts() {
	wp_enqueue_style( 'the-wp-theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome',CEEWP_THEMEURI.'/font-awesome/css/font-awesome.min.css',array() );
	//wp_enqueue_style( 'the-wp-theme-google-fonts','//fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,700i&subset=latin-ext',array() );
	wp_enqueue_style( 'the-wp-theme-google-fonts','//fonts.googleapis.com/css?family=Roboto&subset=latin-ext',array() );
	wp_enqueue_style( 'the-wp-rippler-css',CEEWP_THEMEURI.'/css/rippler.min.css',array() );
	
	/**
	 * Register JQuery and another js files
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'the-wp-theme-waypoint', CEEWP_THEMEURI . '/js/waypoints.js', array(), '2.0.3', true );
	wp_enqueue_script( 'the-wp-theme-counter-up', CEEWP_THEMEURI . '/js/jquery.counterup.min.js', array(), '1.0', true );
	wp_enqueue_script( 'the-wp-theme-fitvids', CEEWP_THEMEURI . '/js/jquery.fitvids.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'the-wp-rippler', CEEWP_THEMEURI . '/js/jquery.rippler.min.js', array('jquery'), '0.1.1', true );
	wp_enqueue_script( 'the-wp-parallax', CEEWP_THEMEURI . '/js/jquery.parallax.min.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'the-wp-simple-text-rotator', CEEWP_THEMEURI . '/js/jquery.simple-text-rotator.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'the-wp-theme-base-js',CEEWP_THEMEURI.'/js/base.js',array('jquery'),'', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery-cycle', CEEWP_THEMEURI . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	/**
	 * Enqueue Slider setup js file.
	 */	
	if( get_theme_mod( 'enable_slider', 1 ) ) {
		if ( is_home() || is_front_page() ) {
			wp_enqueue_script( 'the-wp-slider', CEEWP_THEMEURI . '/js/slider-setting.js', array( 'jquery-cycle' ), false, true );

		}
	}
	
	/**
    * Browser specific queuing i.e
    */
	$the_wp_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(preg_match('/(?i)msie [1-8]/',$the_wp_user_agent)) {
		wp_enqueue_script( 'html5shiv', CEEWP_THEMEURI . '/js/html5shiv.min.js', true );
	}
}
add_action( 'wp_enqueue_scripts', 'the_wp_scripts' );

/**
 * Custom CSS
 */
require CEEWP_THEMEDIR . '/inc/custom-css.php';

/**
 * Custom template tags for this theme.
 */
require CEEWP_THEMEDIR . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require CEEWP_THEMEDIR . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require CEEWP_THEMEDIR . '/inc/jetpack.php';

/**
 * Load Slider
 */
require_once( CEEWP_THEMEDIR . '/inc/slider-functions.php' );

/**
 * Load Theme Options Panel
 */
if (is_admin()) load_theme_textdomain( 'the-wp', CEEWP_THEMEDIR . '/languages' );
require CEEWP_THEMEDIR . '/inc/options-config.php';
require CEEWP_THEMEDIR . '/inc/admin/class-customizer-api-wrapper.php';

global $options;
$obj = new TheWP_Customizer_API_Wrapper( $options );

require CEEWP_THEMEDIR . '/inc/customizer.php'; // Customizer additions.

/**
 * Load other stuff 
 */
			
			
			/* Include Helper functions */
			require_once( CEEWP_THEMEDIR . '/inc/admin/helpers.php' );

			/* Load Widgets */
			$the_wp = wp_get_theme();
			define( 'CEEWP_THEMEVER', esc_attr( $the_wp->get( 'Version' ) ) );
			
			require_once( CEEWP_THEMEDIR . '/inc/widgets.php' );
?>