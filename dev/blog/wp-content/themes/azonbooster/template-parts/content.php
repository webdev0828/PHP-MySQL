<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AzonBooster
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		
		do_action( 'azonbooster_loop_post' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->