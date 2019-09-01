<?php
/**
 * The template used for displaying featured posts on the Front Page.
 *
 * @package Telescope
 */
?>

<?php
	
	$featured_tag = get_theme_mod( 'telescope_featured_term_1', 'featured' );
	
	$custom_loop = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => absint(get_theme_mod( 'telescope_front_featured_posts_num', 5 )),
		'order'          => 'DESC',
		'orderby'        => 'date',
		'tag' 		 	 => esc_html($featured_tag)
	) );
?>

<?php if ( $custom_loop->have_posts() ) : $i = 0; $m = 0; ?>

	<div id="ilovewp-featured-posts">
	
		<ul class="ilovewp-posts slides clearfix">

			<?php while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); $i++; ?>

            <?php
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'telescope-large-thumbnail');
            $style = ' style="background-image:url(\'' . esc_attr($large_image_url[0]) . '\'); width: ' . esc_attr($large_image_url[1]) . 'px;"';
            ?>

			<li class="slide">
				<div class="image-wrapper">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('telescope-large-thumbnail'); ?></a>
				<?php if ( 1 == get_theme_mod( 'telescope_front_featured_posts_title', 1 ) ) { ?>
				<span class="image-description"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
				<?php } ?>
				</div><!-- .image-wrapper -->
			</li><!-- .slide -->

            <?php endwhile; ?>

		</ul><!-- .ilovewp-posts .slides .clearfix-->

		<?php wp_reset_postdata(); ?>

		</ul><!-- .ilovewp-posts .clearfix -->
	</div><!-- #ilovewp-featured-posts -->

<?php else : ?>

	 <?php if ( current_user_can( 'publish_posts' ) && is_customize_preview() ) : ?>

		<div id="ilovewp-featured-posts" class="ilovewp-featured-noposts">

			<div class="ilovewp-page-intro">
				<h1 class="title-page"><?php esc_html_e( 'No Featured Posts Found', 'telescope' ); ?></h1>
				<div class="taxonomy-description">

					<p><?php printf( esc_html__( 'This section will display your featured posts. Configure (or disable) it via the Customizer.', 'telescope' ) ); ?><br>
					<?php printf( wp_kses( __( 'You can mark your posts with a "Featured" tag on the Edit Post page. <a href="%1$s">Get started here</a>.', 'telescope' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php' ) ) ); ?></p>
					<p><strong><?php printf( esc_html__( 'Important: This message is NOT visible to site visitors, only to admins and editors.', 'telescope' ) ); ?></strong></p>

				</div><!-- .taxonomy-description -->
			</div><!-- .ilovewp-page-intro -->

		</div><!-- #ilovewp-featured-posts .ilovewp-featured-noposts -->

	<?php endif; ?>

<?php endif; ?>