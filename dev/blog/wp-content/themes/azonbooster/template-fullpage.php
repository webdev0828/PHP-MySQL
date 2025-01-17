<?php
/**
 * The template for displaying page content without sidebar.
 *
 * Template name: Full Page ( Without Sidebar )
 *
 * @package AzonBooster
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				do_action( 'azonbooster_page_before' );

				get_template_part( 'template-parts/content', 'page' );
				
				/**
				 * Functions hooked in to azonbooster_page_after action
				 *
				 * @hooked azonbooster_display_comments - 10
				 */
				do_action( 'azonbooster_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
