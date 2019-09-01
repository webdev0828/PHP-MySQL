<?php
function typist_widgets_init() {
	// Sidebar Widget
	// Location: the sidebar on mainpage
	register_sidebar(array(
		'name'			=> __( 'Sidebar', 'typist' ),
		'description'   => __( 'Main sidebar', 'typist' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget-side %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>',
	));
	// Footer Widget
	// Location: at the end of the frontpage
	register_sidebar(array(
		'name'			=> __( 'Footer', 'typist' ),
		'description'   => __( 'Footer sidebar', 'typist' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget-foot %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>',
	));
}	
add_action( 'widgets_init', 'typist_widgets_init' );

if ( ! isset( $content_width ) ) {
	$content_width = 580;
}

if ( ! function_exists( 'typist_scripts' ) ) :	
	function typist_scripts() {
			
		global $wp_styles;
		
		// CSS
		wp_enqueue_style( 'typist-main-css', get_stylesheet_uri() );
		
		// JavaScript
		wp_enqueue_script('typist-menu-js', get_template_directory_uri() . "/bit/menu.js", array( 'jquery' ));
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' ); }
			
		//Google fonts
		include get_template_directory() . '/bit/fonts.php';			
	}
endif;

add_action('wp_enqueue_scripts','typist_scripts'); //script enqueue ends


if ( ! function_exists( 'typist_setup' ) ) :
	function typist_setup() {
		// Translations can be filed in the /lang/ directory
		load_theme_textdomain( 'typist', get_template_directory() . '/lang/' );
		add_editor_style();	//editor styles
		add_theme_support( 'title-tag' );	
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'status',  'quote' ) ); 	//post formats support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') ); //enable html5
    	add_theme_support( 'custom-background', array('default-color' => 'fff',)); //built-in custom background
		//add image sizes
		add_image_size( 'typist-list-thumb', 70, 70, true ); //thumbs for list view
		//menus
		register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'typist' ),
		) );	//one menu below the logo
	}
endif;

add_action( 'after_setup_theme', 'typist_setup' ); //setup ends

// category id in body and post class
	function typist_category_id_class($classes, $class, $post_id ) {
		foreach((get_the_category($post_id)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
add_filter('post_class', 'typist_category_id_class', 10, 3);

// Copyright in footer
function typist_footer(){
  $typist_footer = get_theme_mod('footer_copyright');

  if(empty($typist_footer)){
    echo __( 'Built using ', 'typist' ). '<a class="footer-credits" href="'.esc_url('http://www.poisonedcoffee.com/the-typist/').'">'.__( 'The Typist Theme', 'typist').'</a>';
  } else {
    echo esc_attr( $typist_footer );
  }
}

remove_filter('template_redirect', 'redirect_canonical');

//Customizer stuff
require get_template_directory() . '/bit/customizer.php';
require get_template_directory() . '/bit/customizer-sanitize.php';
?>