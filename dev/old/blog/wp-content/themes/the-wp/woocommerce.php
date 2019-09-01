<?php
/*
 * WooCommerce
 *
 * @package The WP Theme
 */

get_header(); ?>

	<div id="primary" class="content-area full-size">
		<main id="main" class="site-main" role="main">
			<?php woocommerce_breadcrumb(); ?>
			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
