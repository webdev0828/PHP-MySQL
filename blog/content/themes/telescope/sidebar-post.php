<?php
/**
 * The sidebar containing the front page widget areas.
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Telescope
 */

?>

<div class="ilovewp-column ilovewp-column-2">

	<div class="ilovewp-column-wrapper clearfix">

		<div class="widget widget-post-meta">
			<p class="widget-title"><?php echo __('[:en]Details[:ru]Подробности'); ?></p>
			<p class="post-meta"><?php echo __('[:en]Posted by[:ru]Сообщение от'); ?> <?php echo esc_url( the_author_posts_link() ); ?>
			<?php echo __('[:en]in category[:ru]в рубрики'); ?> <span class="post-meta-category"><?php the_category(' '); ?>.</span><br>
			<span class="posted-on"><span class="genericon genericon-time"></span> <time class="entry-date published" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></span></p>
	
			<?php
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'telescope' ) );
			if ( $tags_list ) {
				printf( '<p class="tags-links"><span class="genericon genericon-tag"></span>' . esc_html__( '%1$s', 'telescope' ) . '</p>', $tags_list ); // WPCS: XSS OK.
			}
			?>
		
		</div><!-- .widget .widget-post-meta -->
		
		<?php
		if ( 1 == get_theme_mod( 'telescope_front_featured_categories', 0 ) ) {
			get_template_part( 'template-parts/content', 'home-categories' );
		}
		?>

		<?php if ( is_active_sidebar( 'sidebar-secondary' ) ) : ?>

		<aside id="site-aside-secondary" role="complementary">
		
			<div class="site-aside-secondary-wrapper clearfix">
			
			<?php dynamic_sidebar( 'sidebar-secondary' ); ?>

			</div><!-- .site-aside-wrapper .clearfix -->
		
		</aside><!-- #site-aside-secondary -->

		<?php endif; ?>

	</div><!-- .ilovewp-column-wrapper -->

</div><!-- .ilovewp-column .ilovewp-column-2 -->