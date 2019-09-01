<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Telescope
 */

get_header(); ?>

	<div id="site-main">

		<div class="wrapper wrapper-main clearfix">
		
			<?php while ( have_posts() ) : the_post(); ?>

			<main id="site-content" class="site-main" role="main">
			
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="thumbnail-post-intro">
					<div align="center">
					<?php the_post_thumbnail('telescope-large-thumbnail'); ?>
					</div>
				</div><!-- .thumbnail-post-intro -->
				<?php endif; ?>

				<div class="site-content-wrapper clearfix">

					<header class="ilovewp-page-intro">
						<h1 class="title-page"><?php the_title(); ?></h1>
					</header><!-- .ilovewp-page-intro -->

						<div class="addthis_inline_share_toolbox"></div><br />
					
					<div class="ilovewp-columns ilovewp-columns-singular ilovewp-columns-<?php if ( 1 == get_theme_mod( 'telescope_front_featured_categories', 0 ) ) { echo '2'; } else { echo '1'; } ?> clearfix">
					
						<div class="ilovewp-column ilovewp-column-1">
					
							<div class="ilovewp-column-wrapper clearfix">

								<?php get_template_part( 'template-parts/content', 'single' ); ?>

<nav class="navigation post-navigation" role="navigation">
<div class="nav-links">
<?php $max_length = 5; // set max character length here

$next = get_next_post()->ID;
$prev = get_previous_post()->ID;

if( $prev ) {
    $title = get_the_title( $prev );
    $link = get_the_permalink( $prev );
    $post_name = mb_strlen( $title ) > $max_length ? mb_substr( $title, 0, $max_length ) . '...' : $title;
    ?>
<div class="nav-previous" data-title="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width: 45%;">
	<a href="<?php echo $link; ?>" rel="prev" title="<?php echo $title; ?>">
		<span class="nav-link-label">
			<span class="genericon genericon-previous" aria-hidden="true">
			</span>
		</span><?php echo $post_name; ?>
	</a>
</div>
    <?php
}
if( $next ) {
    $title = get_the_title( $next );
    $link = get_the_permalink( $next );
    $post_name = mb_strlen( $title ) > $max_length ? mb_substr( $title, 0, $max_length ) . '...' : $title;
    ?>
<div class="nav-next" data-title="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width: 45%;">
	<a href="<?php echo $link; ?>" rel="next" title="<?php echo $title; ?>"><?php echo $post_name; ?>
		<span class="nav-link-label">
			<span class="genericon genericon-next" aria-hidden="true">
			</span>
		</span>
	</a>
</div>
    <?php
} ?>
</div>
</nav>
								
								<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>

							</div><!-- .ilovewp-column-wrapper -->
						
						</div><!-- .ilovewp-column .ilovewp-column-1 -->
							
						<?php get_sidebar('post'); ?>
						
					</div><!-- .ilovewp-columns .ilovewp-columns-2 -->
					
				</div><!-- .site-content-wrapper .clearfix -->
				
			</main><!-- #site-content -->
			
			<?php endwhile; // End of the loop. ?>

			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>