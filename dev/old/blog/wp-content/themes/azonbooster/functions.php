<?php
/**
 * AzonBooster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AzonBooster
 */

/**
 * Assign the azonbooster version to a var
 */
$azonbooster_theme              = wp_get_theme( 'azonbooster' );
$azonbooster_version = $azonbooster_theme->get('Version');
$azonbooster_slug = $azonbooster_theme->get('azonbooster');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$azonbooster = (object) array(
	'version' => $azonbooster_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-azonbooster.php',
	'customizer' => require 'inc/customizer/class-azonbooster-customizer.php',
);
require 'inc/class-tgm-plugin-activation.php';
require 'inc/azonbooster-functions.php';
require 'inc/azonbooster-template-hooks.php';
require 'inc/azonbooster-template-functions.php';
require 'inc/customizer/class-azb-customizer-output.php';
require 'inc/customizer/class-azb-homepage-ouput.php';

require 'inc/helpers/class-related-posts.php';