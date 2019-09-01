<?php
/**
 * WP Theme Theme Customizer
 * @package The WP Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Header
	$wp_customize->get_setting( 'header_icon' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_size' )->transport = 'postMessage';
	$wp_customize->get_setting( 'phone' )->transport = 'postMessage';
	$wp_customize->get_setting( 'phone_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'mail' )->transport = 'postMessage';
	$wp_customize->get_setting( 'mail_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'address' )->transport = 'postMessage';
	$wp_customize->get_setting( 'address_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'hours' )->transport = 'postMessage';
	$wp_customize->get_setting( 'hours_color' )->transport = 'postMessage';
	
	// Layout
	$wp_customize->get_setting( 'layout_size' )->transport = 'postMessage';
	
	//  Typography
	$wp_customize->get_setting( 'font_size_site_title' )->transport = 'postMessage';
	$wp_customize->get_setting( 'font_size_tagline' )->transport = 'postMessage';
	$wp_customize->get_setting( 'font_size_main_menu' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'the_wp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_wp_customize_preview_js() {
	wp_enqueue_script( 'the-wp-customize', CEEWP_THEMEURI . '/inc/admin/js/customize.js', array( 'jquery', 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'the_wp_customize_preview_js' );


/**
 * Enqueue script for custom customize control.
 */
function the_wp_customize_enqueue() {
	wp_enqueue_script( 'the-wp-customizer', CEEWP_THEMEURI . '/inc/admin/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'the_wp_customize_enqueue' );