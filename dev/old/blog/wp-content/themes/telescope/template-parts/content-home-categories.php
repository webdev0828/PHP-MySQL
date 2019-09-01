<?php
/**
 * The template used for displaying featured categories on the Front Page.
 *
 * @package Telescope
 */
?>

<?php

	$current_page = get_the_ID();
	
	$x = 0;
	$max = 3;
	
	while ($x < $max) { 
		$x++;

		$array_categories[$x]['id'] = get_theme_mod( 'telescope_featured_category_' . $x, 0 );
		$array_categories[$x]['num'] = get_theme_mod( 'telescope_featured_category_num_' . $x, 5 );

	}
	
	foreach ( $array_categories as $array_category ) {
	
		if ( $array_category['id'] == 0 ) {
			continue;
		}
		
		$custom_loop = new WP_Query( array(
			'post_type'      => 'post',
			'posts_per_page' => absint($array_category['num']),
			'order'          => 'DESC',
			'orderby'        => 'date',
			'cat' 		 	 => absint($array_category['id'])
		) );
	
		?>

		<?php if ( $custom_loop->have_posts() ) : $i = 0; $m = 0; ?>
		
			<div class="widget clearfix">
			
				<div class="ilovewp-featured-category">
				
					<p class="widget-title"><a href="<?php echo esc_url( get_category_link($array_category['id']) ); ?>" title="<?php echo esc_attr(get_cat_name($array_category['id'])); ?>"><?php echo get_cat_name($array_category['id']); ?></a></p>
					
					<ul class="ilovewp-posts">
					
						<?php while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); $i++; 

						$current_post = get_the_ID();
						
						if ($current_page === $current_post && is_single()) {
							$classes = array('ilovewp-post','ilovewp-post-simple', 'current-post','clearfix');
						} else {
							$classes = array('ilovewp-post','ilovewp-post-simple', 'clearfix');
						}
						?>

						<li <?php post_class($classes); ?>>
						
							<article id="post-<?php the_ID(); ?>">

								<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-cover">
									<div class="post-cover-wrapper">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('telescope-small-thumbnail'); ?></a>
									</div><!-- .post-cover-wrapper -->
								</div><!-- .post-cover -->
								<?php endif; ?>
								<div class="post-preview">
									<?php the_title( sprintf( '<h2 class="title-post"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
									<?php if ( 1 == get_theme_mod( 'telescope_front_featured_categories_date', 0 ) ) { ?>
									<p class="post-meta">
										<span class="posted-on"><span class="genericon genericon-time" aria-hidden="true"></span> <time class="entry-date published" datetime="<?php the_date('c'); ?>"><?php the_date(); ?></time></span>
									</p><!-- .post-meta -->
									<?php } ?>
								</div><!-- .post-preview -->
						
							</article><!-- #post-<?php the_ID(); ?> -->
						
						</li><!-- .ilovewp-post .ilovewp-post-archive -->

						<?php endwhile; ?>
					
					</ul><!-- .ilovewp-posts -->
						
				</div><!-- .ilovewp-featured-category .featured-category-layout-1 -->
			
			</div><!-- .widget -->
		
			<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
		
			 <?php if ( current_user_can( 'publish_posts' ) && is_customize_preview() ) : ?>
		
			<div class="widget clearfix">
			
				<p class="widget-title"><?php _e('Featured Category Not Configured Yet','telescope'); ?></p>
				
			</div><!-- .widget -->
		
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php

	} // end foreach