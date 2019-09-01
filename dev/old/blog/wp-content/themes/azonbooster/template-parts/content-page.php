<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AzonBooster
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to azonbooster_page add_action
	 *
	 * @hooked azonbooster_page_header          - 10
	 * @hooked azonbooster_page_content         - 20
	 * @hooked azonbooster_init_structured_data - 30
	 */
	do_action( 'azonbooster_page' );
	
	?>

</article><!-- #post-<?php the_ID(); ?> -->
