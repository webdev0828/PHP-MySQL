<?php
/**
 * All Purpose Theme Customizer
 *
 * @package All Purpose
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function best_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	

/***********************************************************************************
 * Sanitize Functions
***********************************************************************************/
					
		function best_wp_sanitize_checkbox( $input ) {
			if ( $input ) {
				return 1;
			}
			return 0;
		}
/***********************************************************************************/
		
		function best_wp_sanitize_social( $input ) {
			$valid = array(
				'' => esc_attr__( ' ', 'best-wp' ),
				'_self' => esc_attr__( '_self', 'best-wp' ),
				'_blank' => esc_attr__( '_blank', 'best-wp' ),
			);

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
/********************************************
* Breadcrumb
*********************************************/ 
		
		$wp_customize->add_section( 'best_wp_premium_hide_section' , array(
			'title'       => __( 'Breadcrumb', 'best-wp' ),
			'priority'		=> 70,
		) );
				
		$wp_customize->add_setting( 'best_wp_home_activate_breadcrumb', array (
			'sanitize_callback'	=> 'best_wp_sanitize_checkbox',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_home_activate_breadcrumb', array(
			'label'    => __( 'Activate Breadcrumb', 'best-wp' ),
			'section'  => 'best_wp_premium_hide_section',
			'settings' => 'best_wp_home_activate_breadcrumb',
			'type'     =>  'checkbox',
		) ) );		

/***********************************************************************************
 * Contacts
***********************************************************************************/
 
		$wp_customize->add_section( 'best_wp_contacts_header' , array(
			'title'       => __( 'Header Contacts', 'best-wp' ),
			'priority'   => 65,
		) );
		
		$wp_customize->add_setting( 'best_wp_contacts_header_phone', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_contacts_header_phone', array(
			'label'    => __( 'Phone Number', 'best-wp' ),
		'description' => __('  Add content and activate the phone.', 'best-wp'),        
			
			'section'  => 'best_wp_contacts_header',
			'settings' => 'best_wp_contacts_header_phone',
			'type'     =>  'text'		
		) ) );

		
		$wp_customize->add_setting( 'best_wp_contacts_header_address', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_contacts_header_address', array(
			'label'    => __( 'Address', 'best-wp' ),
		'description' => __(' Add content and activate the address.', 'best-wp'),        
			
			'section'  => 'best_wp_contacts_header',
			'settings' => 'best_wp_contacts_header_address',
			'type'     =>  'text'		
		) ) );
		
/***********************************************************************************
 * Social media option
***********************************************************************************/
 
		$wp_customize->add_section( 'best_wp_social_section' , array(
			'title'       => __( 'Social Media', 'best-wp' ),
			'description' => __( 'Social media buttons', 'best-wp' ),
			'priority'   => 64,
		) );
		
		$wp_customize->add_setting( 'social_media_activate_header', array (
			'sanitize_callback' => 'best_wp_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_media_activate_header', array(
			'label'    => __( 'Activate Social Icons in Header:', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'social_media_activate_header',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'social_media_activate', array (
			'sanitize_callback' => 'best_wp_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_media_activate', array(
			'label'    => __( 'Activate Social Icons in Footer:', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'social_media_activate',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'best_wp_social_link_type', array (
			'sanitize_callback' => 'best_wp_sanitize_social',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_social_link_type', array(
			'label'    => __( 'Link Type', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'best_wp_social_link_type',
			'type'     =>  'select',
            'choices'  => array(
				'' => esc_attr__( ' ', 'best-wp' ),
				'_self' => esc_attr__( '_self', 'best-wp' ),
				'_blank' => esc_attr__( '_blank', 'best-wp' ),
            ),			
		) ) );
		
		$wp_customize->add_setting( 'social_media_color', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
				
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_color', array(
			'label'    => __( 'Social Icons Color:', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'social_media_color',
		) ) );
				
		$wp_customize->add_setting( 'social_media_hover_color', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
				
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_hover_color', array(
			'label'    => __( 'Social Hover Icons Color:', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'social_media_hover_color',
		) ) );
		
		$wp_customize->add_setting( 'best_wp_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_facebook', array(
			'label'    => __( 'Enter Facebook url', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'best_wp_facebook',
		) ) );
	
		$wp_customize->add_setting( 'best_wp_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_twitter', array(
			'label'    => __( 'Enter Twitter url', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'best_wp_twitter',
		) ) );

		$wp_customize->add_setting( 'best_wp_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'best_wp_google', array(
			'label'    => __( 'Enter Google+ url', 'best-wp' ),
			'section'  => 'best_wp_social_section',
			'settings' => 'best_wp_google',
		) ) );
			
		
/********************************************
* Footer Options
*********************************************/ 

		$wp_customize->add_section( 'footer_options' , array(
			'title'       => __( 'Footer Copyright', 'best-wp' ),
			'priority'		=> 70,
		) );
				
/******************************************** Footer Deactivat *********************************************/ 

		$wp_customize->add_setting( 'best_wp_premium_copyright1', array(
			'default'			=> '',
			'sanitize_callback' => 'wp_kses'
		));
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize, 'best_wp_premium_copyright1', array(
					'label'		=> __( 'Custom Copyright Text', 'best-wp' ),
					'section'	=> 'footer_options',
					'settings'	=> 'best_wp_premium_copyright1',
					'type'		=> 'textarea'
				)
			)
		);			
}
add_action( 'customize_register', 'best_wp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function best_wp_customize_preview_js() {
	wp_enqueue_script( 'best_wp_customizer', get_template_directory_uri() . '/framework/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'best_wp_customize_preview_js' );


		function best_wp_customize_all_css() {
    ?>
		<style type="text/css">
			<?php if ( (!is_front_page() or !is_home()) and get_theme_mod('custom_header_position') == "home") { ?> .site-header { display: none;} <?php } ?> 
			<?php if ( get_theme_mod('custom_header_position') == "deactivate") { ?> .site-header { display: none;} <?php } ?> 
			<?php if(get_theme_mod('best_wp_aside_background_color')) { ?>#content aside h2 {background:<?php echo esc_attr (get_theme_mod('best_wp_aside_background_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('best_wp_aside_background_color1')) { ?>#content aside ul, #content .widget {background:<?php echo esc_attr (get_theme_mod('best_wp_aside_background_color1')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('best_wp_aside_title_color')) { ?>#content aside h2 {color:<?php echo esc_attr (get_theme_mod('best_wp_aside_title_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('best_wp_aside_link_color')) { ?>#content aside a {color:<?php echo esc_attr (get_theme_mod('best_wp_aside_link_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('best_wp_aside_link_hover_color')) { ?>#content aside a:hover {color:<?php echo esc_attr (get_theme_mod('best_wp_aside_link_hover_color')); ?>;} <?php } ?> 
			
			<?php if(get_theme_mod('social_media_color')) { ?> .social .fa-icons i {color:<?php echo esc_attr (get_theme_mod('social_media_color')); ?> !important;} <?php } ?> 
			<?php if(get_theme_mod('social_media_hover_color')) { ?> .social .fa-icons i:hover {color:<?php echo esc_attr (get_theme_mod('social_media_hover_color')); ?> !important;} <?php } ?>

			<?php if(get_theme_mod('best_wp_titles_setting_1')) { ?> .single-title, .sr-no-sidebar .entry-title, .full-p .entry-title { display: none !important;} <?php } ?>

		</style>
		
    <?php	
}
		add_action('wp_head', 'best_wp_customize_all_css');
		
/**************************************
Sidebar Options
**************************************/


	function best_wp_sidebar_width () {
		if(get_theme_mod('best_wp_sidebar_width')) {
	
	$best_wp_content_width = 96;
	$best_wp_sidebar_width = esc_attr(get_theme_mod('best_wp_sidebar_width'));
	$best_wp_sidebar_sum = $best_wp_content_width - $best_wp_sidebar_width;

	?>
		<style>
			#content aside {width: <?php echo esc_attr(get_theme_mod('best_wp_sidebar_width')); ?>% !important;}
			#content main {width: <?php echo esc_attr($best_wp_sidebar_sum); ?>%  !important;}
		</style>
		
	<?php }
}
	add_action('wp_head','best_wp_sidebar_width');
	

	
/*********************************************************************************************************
* Sidebar Position
**********************************************************************************************************/

	function best_wp_sidebar(){
	$option_sidebar = get_theme_mod( 'best_wp_sidebar_position');		
	if($option_sidebar == '2') { 
			wp_enqueue_style( 'best-wp-seos-right-sidebar', get_template_directory_uri() . '/css/right-sidebar.css');
		}

	$option_sidebar = get_theme_mod( 'best_wp_sidebar_position');			
		if($option_sidebar == '3') { 
			wp_enqueue_style( 'best-wp-seos-no-sidebar', get_template_directory_uri() . '/css/no-sidebar.css');
		}
	}
	add_action( 'wp_enqueue_scripts', 'best_wp_sidebar' );
	
		
		
