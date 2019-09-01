<?php
/**
 * Telescope Theme Customizer.
 *
 * @package Telescope
 */

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Telescope 1.0
 *
 * @see telescope_header_style()
 */
function telescope_custom_header_and_background() {
	$color_scheme             = telescope_get_color_scheme();
	$default_background_color = sanitize_hex_color_no_hash( $color_scheme[0], '#' );
	$default_text_color       = sanitize_hex_color_no_hash( $color_scheme[4], '#' );

	/**
	 * Filter the arguments used when adding 'custom-background' support in Telescope.
	 *
	 * @since Telescope 1.0
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'telescope_custom_background_args', array(
		'default-color' => $default_background_color,
	) ) );

}
add_action( 'after_setup_theme', 'telescope_custom_header_and_background' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function telescope_customize_register( $wp_customize ) {

	$color_scheme = telescope_get_color_scheme();
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'color_scheme', array(
			'default'           => 'default',
			'sanitize_callback' => 'telescope_sanitize_color_scheme',
		) );
	
		$wp_customize->add_control( 'color_scheme', array(
			'label'    => __( 'Base Color Scheme', 'telescope' ),
			'section'  => 'colors',
			'type'     => 'select',
			'choices'  => telescope_get_color_scheme_choices(),
			'priority' => 1,
		) );
	
		// Add page background color setting and control.
		$wp_customize->add_setting( 'page_background_color', array(
			'default'           => $color_scheme[1],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_background_color', array(
			'label'       => __( 'Page Background Color', 'telescope' ),
			'section'     => 'colors',
		) ) );

		$wp_customize->add_setting( 'header_background_color', array(
			'default'           => $color_scheme[2],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
			'label'       => __( 'Header Background Color', 'telescope' ),
			'section'     => 'colors',
		) ) );

		$wp_customize->add_setting( 'footer_background_color', array(
			'default'           => $color_scheme[7],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
			'label'       => __( 'Footer Background Color', 'telescope' ),
			'section'     => 'colors',
		) ) );
	
		// Remove the core header textcolor control, as it shares the main text color.
		$wp_customize->remove_control( 'header_textcolor' );
	
		// Add link color setting and control.
		$wp_customize->add_setting( 'link_color', array(
			'default'           => $color_scheme[3],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label'       => __( 'Link Color', 'telescope' ),
			'section'     => 'colors',
		) ) );

		// Add link color setting and control.
		$wp_customize->add_setting( 'link_color_hover', array(
			'default'           => $color_scheme[4],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_hover', array(
			'label'       => __( 'Link Color :hover', 'telescope' ),
			'section'     => 'colors',
		) ) );
	
		// Add main text color setting and control.
		$wp_customize->add_setting( 'main_text_color', array(
			'default'           => $color_scheme[5],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_text_color', array(
			'label'       => __( 'Main Text Color', 'telescope' ),
			'section'     => 'colors',
		) ) );
	
		// Add secondary text color setting and control.
		$wp_customize->add_setting( 'secondary_text_color', array(
			'default'           => $color_scheme[6],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_text_color', array(
			'label'       => __( 'Secondary Text Color', 'telescope' ),
			'section'     => 'colors',
		) ) );

		$wp_customize->add_setting( 'main_menu_background_color', array(
			'default'           => $color_scheme[8],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_menu_background_color', array(
			'label'       => __( 'Main Menu Background Color', 'telescope' ),
			'section'     => 'colors',
		) ) );

		$wp_customize->add_setting( 'highlight_background_color', array(
			'default'           => $color_scheme[9],
			'sanitize_callback' => 'sanitize_hex_color',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'highlight_background_color', array(
			'label'       => __( 'Highlight Background Color', 'telescope' ),
			'section'     => 'colors',
		) ) );

	$wp_customize->add_panel( 'telescope_panel', array(
		'priority'       => 130,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'telescope' ),
		'description'    => esc_html__( 'Telescope Theme Options', 'telescope' ),
	) );

	$wp_customize->add_section( 'telescope_header_options', array(
		'title'		  => esc_html__( 'Header', 'telescope' ),
		'panel'		  => 'telescope_panel',
	) );

		// Featured Categories checkbox
		$wp_customize->add_setting( 'telescope_header_display_tagline', array(
			'default'           => 1,
			'sanitize_callback' => 'telescope_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'telescope_header_display_tagline', array(
			'label'             => esc_html__( 'Display site title and tagline in the header.', 'telescope' ),
			'section'           => 'telescope_header_options',
			'type'              => 'checkbox',
		) );

	$wp_customize->add_section( 'telescope_front_page', array(
		'title'		  => esc_html__( 'Front Page', 'telescope' ),
		'panel'		  => 'telescope_panel',
	) );

		// Featured Posts checkbox
		$wp_customize->add_setting( 'telescope_front_featured_posts', array(
			'default'           => 1,
			'sanitize_callback' => 'telescope_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'telescope_front_featured_posts', array(
			'label'             => esc_html__( 'Show Featured Posts Section on the Front Page', 'telescope' ),
			'section'           => 'telescope_front_page',
			'type'              => 'checkbox',
		) );

		$wp_customize->add_setting( 'telescope_front_featured_posts_num', array(
			'default'           => 3,
			'sanitize_callback' => 'telescope_sanitize_widget_num'
		) );

		$wp_customize->add_control( 'telescope_front_featured_posts_num', array(
		'label'       => esc_html__( 'Featured Posts Amount', 'telescope' ),
		'section'     => 'telescope_front_page',
		'type'        => 'select',
		'description' => esc_html( 'Set the amount of posts to be displayed.', 'telescope' ),
		'choices'     => array(
			'1' => esc_html__( '1', 'telescope' ),
			'2' => esc_html__( '2', 'telescope' ),
			'3' => esc_html__( '3', 'telescope' ),
			'4' => esc_html__( '4', 'telescope' ),
			'5' => esc_html__( '5', 'telescope' ),
			'6' => esc_html__( '6', 'telescope' ),
			'7' => esc_html__( '7', 'telescope' ),
			'8' => esc_html__( '8', 'telescope' ),
			'9' => esc_html__( '9', 'telescope' ),
			'10' => esc_html__( '10', 'telescope' ),
		),
		) );

		$wp_customize->add_setting( 'telescope_front_featured_posts_title', array(
			'default'           => 0,
			'sanitize_callback' => 'telescope_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'telescope_front_featured_posts_title', array(
			'label'             => esc_html__( 'Show the post titles for the Featured Posts', 'telescope' ),
			'section'           => 'telescope_front_page',
			'type'              => 'checkbox',
		) );

		$wp_customize->add_setting( 'telescope_featured_term_1', array(
			'default'           => 'featured',
			'sanitize_callback' => 'telescope_sanitize_terms',
		) );

		$wp_customize->add_control( 'telescope_featured_term_1', array(
			'label'             => esc_html__( 'Front Page: Featured Tag', 'telescope' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Post Tags</a>.', 'telescope' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=post_tag' ) ) ),
			'section'           => 'telescope_front_page',
			'type'              => 'select',
			'choices' 			=> telescope_get_terms(),
		) );

		// Featured Categories checkbox
		$wp_customize->add_setting( 'telescope_front_featured_categories', array(
			'default'           => 0,
			'sanitize_callback' => 'telescope_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'telescope_front_featured_categories', array(
			'label'             => esc_html__( 'Show Featured Categories Section on the Front Page', 'telescope' ),
			'section'           => 'telescope_front_page',
			'type'              => 'checkbox',
		) );

		// Featured Categories checkbox
		$wp_customize->add_setting( 'telescope_archives_featured_categories', array(
			'default'           => 0,
			'sanitize_callback' => 'telescope_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'telescope_archives_featured_categories', array(
			'label'             => esc_html__( 'Show Featured Categories Section on Archive pages (category, tax, date, search)', 'telescope' ),
			'section'           => 'telescope_front_page',
			'type'              => 'checkbox',
		) );

		// Featured Categories checkbox
		$wp_customize->add_setting( 'telescope_post_featured_categories', array(
			'default'           => 0,
			'sanitize_callback' => 'telescope_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'telescope_post_featured_categories', array(
			'label'             => esc_html__( 'Show Featured Categories Section on Post pages', 'telescope' ),
			'section'           => 'telescope_front_page',
			'type'              => 'checkbox',
		) );
		
		// Featured Categories
		$wp_customize->add_setting( 'telescope_featured_category_1', array(
			'default'           => 'none',
			'sanitize_callback' => 'telescope_sanitize_categories',
		) );

		$wp_customize->add_control( 'telescope_featured_category_1', array(
			'label'             => esc_html__( 'Front Page: Featured Category #1', 'telescope' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Categories</a>.', 'telescope' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=category' ) ) ),
			'section'           => 'telescope_front_page',
			'type'              => 'select',
			'choices' 			=> telescope_get_categories(),
		) );

		$wp_customize->add_setting( 'telescope_featured_category_num_1', array(
			'default'           => 3,
			'sanitize_callback' => 'telescope_sanitize_widget_num'
		) );

		$wp_customize->add_control( 'telescope_featured_category_num_1', array(
		'label'       => esc_html__( 'Featured Category #1: Posts Number', 'telescope' ),
		'section'     => 'telescope_front_page',
		'type'        => 'select',
		'description' => esc_html( 'Set the amount of posts from this category to be displayed.', 'telescope' ),
		'choices'     => array(
			'1' => esc_html__( '1', 'telescope' ),
			'2' => esc_html__( '2', 'telescope' ),
			'3' => esc_html__( '3', 'telescope' ),
			'4' => esc_html__( '4', 'telescope' ),
			'5' => esc_html__( '5', 'telescope' ),
			'6' => esc_html__( '6', 'telescope' ),
			'7' => esc_html__( '7', 'telescope' ),
			'8' => esc_html__( '8', 'telescope' ),
			'9' => esc_html__( '9', 'telescope' ),
			'10' => esc_html__( '10', 'telescope' ),
		),
		) );

		$wp_customize->add_setting( 'telescope_featured_category_2', array(
			'default'           => 'none',
			'sanitize_callback' => 'telescope_sanitize_categories',
		) );

		$wp_customize->add_control( 'telescope_featured_category_2', array(
			'label'             => esc_html__( 'Front Page: Featured Category #2', 'telescope' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Categories</a>.', 'telescope' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=category' ) ) ),
			'section'           => 'telescope_front_page',
			'type'              => 'select',
			'choices' 			=> telescope_get_categories(),
		) );

		$wp_customize->add_setting( 'telescope_featured_category_num_2', array(
			'default'           => 3,
			'sanitize_callback' => 'telescope_sanitize_widget_num'
		) );

		$wp_customize->add_control( 'telescope_featured_category_num_2', array(
		'label'       => esc_html__( 'Featured Category #2: Posts Number', 'telescope' ),
		'section'     => 'telescope_front_page',
		'type'        => 'select',
		'description' => esc_html( 'Set the amount of posts from this category to be displayed.', 'telescope' ),
		'choices'     => array(
			'1' => esc_html__( '1', 'telescope' ),
			'2' => esc_html__( '2', 'telescope' ),
			'3' => esc_html__( '3', 'telescope' ),
			'4' => esc_html__( '4', 'telescope' ),
			'5' => esc_html__( '5', 'telescope' ),
			'6' => esc_html__( '6', 'telescope' ),
			'7' => esc_html__( '7', 'telescope' ),
			'8' => esc_html__( '8', 'telescope' ),
			'9' => esc_html__( '9', 'telescope' ),
			'10' => esc_html__( '10', 'telescope' ),
		),
		) );

		$wp_customize->add_setting( 'telescope_featured_category_3', array(
			'default'           => 'none',
			'sanitize_callback' => 'telescope_sanitize_categories',
		) );

		$wp_customize->add_control( 'telescope_featured_category_3', array(
			'label'             => esc_html__( 'Front Page: Featured Category #3', 'telescope' ),
			'description'		=> sprintf( wp_kses( __( 'This list is populated with <a href="%1$s">Categories</a>.', 'telescope' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit-tags.php?taxonomy=category' ) ) ),
			'section'           => 'telescope_front_page',
			'type'              => 'select',
			'choices' 			=> telescope_get_categories(),
		) );

		$wp_customize->add_setting( 'telescope_featured_category_num_3', array(
			'default'           => 3,
			'sanitize_callback' => 'telescope_sanitize_widget_num'
		) );

		$wp_customize->add_control( 'telescope_featured_category_num_3', array(
		'label'       => esc_html__( 'Featured Category #3: Posts Number', 'telescope' ),
		'section'     => 'telescope_front_page',
		'type'        => 'select',
		'description' => esc_html( 'Set the amount of posts from this category to be displayed.', 'telescope' ),
		'choices'     => array(
			'1' => esc_html__( '1', 'telescope' ),
			'2' => esc_html__( '2', 'telescope' ),
			'3' => esc_html__( '3', 'telescope' ),
			'4' => esc_html__( '4', 'telescope' ),
			'5' => esc_html__( '5', 'telescope' ),
			'6' => esc_html__( '6', 'telescope' ),
			'7' => esc_html__( '7', 'telescope' ),
			'8' => esc_html__( '8', 'telescope' ),
			'9' => esc_html__( '9', 'telescope' ),
			'10' => esc_html__( '10', 'telescope' ),
		),
		) );

	return $wp_customize;

}
add_action( 'customize_register', 'telescope_customize_register' );


if ( ! function_exists( 'telescope_get_terms' ) ) :
/**
 * Return an array of tag names and slugs
 *
 * @since 1.0.0.
 *
 * @return array                The list of terms.
 */
function telescope_get_terms() {

	$choices = array( 0 );

	// Default
	$choices = array( 'none' => esc_html__( 'None', 'telescope' ) );

	// Post Tags
	$type_terms = get_terms( 'post_tag' );
	if ( ! empty( $type_terms ) ) {
		$type_slugs = wp_list_pluck( $type_terms, 'slug' );
		$type_names = wp_list_pluck( $type_terms, 'name' );
		$type_list = array_combine( $type_slugs, $type_names );
		$choices = $choices + $type_list;
	}

	return apply_filters( 'telescope_get_terms', $choices );
}
endif;

if ( ! function_exists( 'telescope_sanitize_terms' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @since 1.0.0.
 *
 * @param  mixed    $value      The value to sanitize.
 * @return mixed                The sanitized value.
 */
function telescope_sanitize_terms( $value ) {

	$choices = telescope_get_terms();
	$valid	 = array_keys( $choices );

	if ( ! in_array( $value, $valid ) ) {
		$value = 'none';
	}

	return $value;
}
endif;

if ( ! function_exists( 'telescope_get_categories' ) ) :
/**
 * Return an array of tag names and slugs
 *
 * @since 1.0.0.
 *
 * @return array                The list of terms.
 */
function telescope_get_categories() {

	$choices = array( 0 );

	// Default
	$choices = array( 'none' => esc_html__( 'None', 'telescope' ) );

	// Categories
	$type_terms = get_terms( 'category' );
	if ( ! empty( $type_terms ) ) {

		$type_names = wp_list_pluck( $type_terms, 'name', 'term_id' );
		$choices = $choices + $type_names;

	}

	return apply_filters( 'telescope_get_categories', $choices );
}
endif;

if ( ! function_exists( 'telescope_sanitize_categories' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @since 1.0.0.
 *
 * @param  mixed    $value      The value to sanitize.
 * @return mixed                The sanitized value.
 */
function telescope_sanitize_categories( $value ) {

	$choices = telescope_get_categories();
	$valid	 = array_keys( $choices );

	if ( ! in_array( $value, $valid ) ) {
		$value = 'none';
	}

	return $value;
}
endif;

if ( ! function_exists( 'telescope_sanitize_checkbox' ) ) :
/**
 * Sanitize the checkbox.
 *
 * @param  mixed 	$input.
 * @return boolean	(true|false).
 */
function telescope_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}
endif;

if ( ! function_exists( 'telescope_sanitize_widget_num' ) ) :
/**
 * Sanitize the Featured Category posts number.
 *
 * @param  boolean	$input.
 * @return boolean	(true|false).
 */
function telescope_sanitize_widget_num( $input ) {
	$choices = array( '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' );

	if ( ! in_array( $input, $choices ) ) {
		$input = '3';
	}

	return $input;
}
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function telescope_customize_preview_js() {
	wp_enqueue_script( 'telescope_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160513', true );
}
add_action( 'customize_preview_init', 'telescope_customize_preview_js' );

/**
 * Registers color schemes for Telescope.
 *
 * Can be filtered with {@see 'telescope_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Page Background Color.
 * 3. Link Color.
 * 4. Main Text Color.
 * 5. Secondary Text Color.
 *
 * @since Telescope 1.0
 *
 * @return array An associative array of color scheme options.
 */
function telescope_get_color_schemes() {
	/**
	 * Filter the color schemes registered for use with Telescope.
	 *
	 * The default schemes include 'default', 'dark', 'gray', 'red', and 'yellow'.
	 *
	 * @since Telescope 1.0
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	 
	return apply_filters( 'telescope_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'telescope' ),
			'colors' => array(
				'#efefef', // [0] background color 
				'#ffffff', // [1] content container background color
				'#ffffff', // [2] header background color 
				'#006dc9', // [3] link color
				'#bb1628', // [4] link :hover color
				'#393939', // [5] main text color
				'#888888', // [6] secondary text color
				'#1a1a1a', // [7] footer background color
				'#bb1628', // [8] main menu background color
				'#006dc9', // [9] highlight background color
			),
		),
	) );
}

if ( ! function_exists( 'telescope_get_color_scheme' ) ) :
/**
 * Retrieves the current Telescope color scheme.
 *
 * Create your own telescope_get_color_scheme() function to override in a child theme.
 *
 * @since Telescope 1.0
 *
 * @return array An associative array of either the current or default color scheme HEX values.
 */
function telescope_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       = telescope_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // telescope_get_color_scheme

if ( ! function_exists( 'telescope_get_color_scheme_choices' ) ) :
/**
 * Retrieves an array of color scheme choices registered for Telescope.
 *
 * Create your own telescope_get_color_scheme_choices() function to override
 * in a child theme.
 *
 * @since Telescope 1.0
 *
 * @return array Array of color schemes.
 */
function telescope_get_color_scheme_choices() {
	$color_schemes                = telescope_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // telescope_get_color_scheme_choices


if ( ! function_exists( 'telescope_sanitize_color_scheme' ) ) :
/**
 * Handles sanitization for Telescope color schemes.
 *
 * Create your own telescope_sanitize_color_scheme() function to override
 * in a child theme.
 *
 * @since Telescope 1.0
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function telescope_sanitize_color_scheme( $value ) {
	$color_schemes = telescope_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		return 'default';
	}

	return $value;
}
endif; // telescope_sanitize_color_scheme

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = telescope_get_color_scheme();

	// If we get this far, we have a custom color scheme.
	$colors = array(
		'background_color'        		 => $color_scheme[0],
		'page_background_color'  		 => $color_scheme[1],
		'header_background_color' 		 => $color_scheme[2],
		'link_color'             		 => $color_scheme[3],
		'link_color_hover'        		 => $color_scheme[4],
		'main_text_color'         		 => $color_scheme[5],
		'secondary_text_color'    		 => $color_scheme[6],
		'footer_background_color' 		 => $color_scheme[7],
		'main_menu_background_color' 	 => $color_scheme[8],
		'highlight_background_color' 	 => $color_scheme[9],

	);

	$color_scheme_css = telescope_get_color_scheme_css( $colors );

	wp_add_inline_style( 'telescope-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'telescope_color_scheme_css' );

/**
 * Returns CSS for the color schemes.
 *
 * @since Telescope 1.0
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function telescope_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'background_color'        		=> '',
		'page_background_color'   		=> '',
		'header_background_color' 		=> '',
		'link_color'              		=> '',
		'link_color_hover'        		=> '',
		'main_text_color'         		=> '',
		'secondary_text_color'    		=> '',
		'footer_background_color' 		=> '',
		'main_menu_background_color' 	=> '',
		'highlight_background_color' 	=> '',
	) );

	return <<<CSS
	/* Color Scheme */

	/* Background Color */
	body {
		background-color: {$colors['background_color']};
	}

	/* Page Background Color */
	.site-content-wrapper {
		background-color: {$colors['page_background_color']};
	}

	/* Header Background Color */
	.site-header {
		background-color: {$colors['header_background_color']};
	}

	/* Footer Background Color */
	.site-footer {
		background-color: {$colors['footer_background_color']};
	}

	/* Link Color */
	a {
		color: {$colors['link_color']};
	}

	/* Link:hover Color */
	a:hover,
	a:focus {
		color: {$colors['link_color_hover']};
	}

	/* Main Text Color */
	body {
		color: {$colors['main_text_color']};
	}

	/* Secondary Text Color */

	.post-meta,
	.ilovewp-post .post-meta {
		color: {$colors['secondary_text_color']};
	}

	/* Menu Background Color */
	#menu-main {
		background-color: {$colors['menu_main_background_color']};
	}

	/* Highlight Background Color */
	.infinite-scroll #infinite-handle span {
		background-color: {$colors['highlight_background_color']};
	}

CSS;
}


/**
 * Enqueues front-end CSS for the page background color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_page_background_color_css() {
	$color_scheme          = telescope_get_color_scheme();
	$default_color         = $color_scheme[1];
	$page_background_color = esc_attr( get_theme_mod( 'page_background_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $page_background_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Page Background Color */
		.site-content-wrapper {
			background-color: %1$s;
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $page_background_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_page_background_color_css', 11 );

/**
 * Enqueues front-end CSS for the header background color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_header_background_color_css() {
	$color_scheme          = telescope_get_color_scheme();
	$default_color         = $color_scheme[1];
	$header_background_color = esc_attr( get_theme_mod( 'header_background_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $header_background_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Header Background Color */
		.site-header {
			background-color: %1$s;
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $header_background_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_header_background_color_css', 11 );

/**
 * Enqueues front-end CSS for the footer background color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_footer_background_color_css() {
	$color_scheme          = telescope_get_color_scheme();
	$default_color         = $color_scheme[1];
	$footer_background_color = esc_attr( get_theme_mod( 'footer_background_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $footer_background_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Footer Background Color */
		.site-footer {
			background-color: %1$s;
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $footer_background_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_footer_background_color_css', 11 );

/**
 * Enqueues front-end CSS for the Main Menu background color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_main_menu_background_color_css() {
	$color_scheme          = telescope_get_color_scheme();
	$default_color         = $color_scheme[8];
	$menu_background_color = esc_attr( get_theme_mod( 'main_menu_background_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $menu_background_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Main Menu Background Color */
		#menu-main {
			background-color: %1$s;
		}

		.site-header .wrapper-header a:hover,
		.site-header .wrapper-header a:focus,
		.site-footer a:hover,
		.site-footer a:focus {
			color: %1$s;
		}

	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $menu_background_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_main_menu_background_color_css', 11 );

/**
 * Enqueues front-end CSS for the Highlights background color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_highlight_background_color_css() {
	$color_scheme          = telescope_get_color_scheme();
	$default_color         = $color_scheme[9];
	$highlight_background_color = esc_attr( get_theme_mod( 'highlight_background_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $highlight_background_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Highlight Background Color */
		.infinite-scroll #infinite-handle span {
			background-color: %1$s;
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $highlight_background_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_highlight_background_color_css', 11 );

/**
 * Enqueues front-end CSS for the link color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_link_color_css() {
	$color_scheme    = telescope_get_color_scheme();
	$default_color   = $color_scheme[2];
	$link_color = esc_attr( get_theme_mod( 'link_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $link_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Link Color */
		a {
			color: %1$s;
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $link_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_link_color_css', 11 );

/**
 * Enqueues front-end CSS for the link :hover color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_link_color_hover_css() {
	$color_scheme    = telescope_get_color_scheme();
	$default_color   = $color_scheme[3];
	$link_color = esc_attr( get_theme_mod( 'link_color_hover', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $link_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Link:hover Color */
		a:hover,
		a:focus,
		h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
		h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus {
			color: %1$s;
		}

		.ilovewp-featured-category .ilovewp-post-simple .title-post:hover:after {
			background-color: %1$s;
		}

	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $link_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_link_color_hover_css', 11 );

/**
 * Enqueues front-end CSS for the main text color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_main_text_color_css() {
	$color_scheme    = telescope_get_color_scheme();
	$default_color   = $color_scheme[4];
	$main_text_color = esc_attr( get_theme_mod( 'main_text_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $main_text_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Main Text Color */
		body {
			color: %1$s
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $main_text_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_main_text_color_css', 11 );

/**
 * Enqueues front-end CSS for the secondary text color.
 *
 * @since Telescope 1.0
 *
 * @see wp_add_inline_style()
 */
function telescope_secondary_text_color_css() {
	$color_scheme    = telescope_get_color_scheme();
	$default_color   = $color_scheme[4];
	$secondary_text_color = esc_attr( get_theme_mod( 'secondary_text_color', $default_color ) );

	// Don't do anything if the current color is the default.
	if ( $secondary_text_color === $default_color ) {
		return;
	}

	$css = '
		/* Custom Secondary Text Color */

		body:not(.search-results) .entry-summary {
			color: %1$s;
		}

		.post-meta,
		.ilovewp-post .post-meta {
			color: %1$s;
		}
	';

	wp_add_inline_style( 'telescope-style', sprintf( $css, $secondary_text_color ) );
}
add_action( 'wp_enqueue_scripts', 'telescope_secondary_text_color_css', 11 );