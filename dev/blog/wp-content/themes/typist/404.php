<?php get_header(); ?>

<div id="column" class="<?php echo esc_attr(get_theme_mod('typist_postlayout', 'left'));?>-sidebar">
    <div id="bloglist">
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>            
              
                <header class="heading">
                        <h1 class="page-title"><?php _e( 'Not Found', 'typist' ); ?></h1>
                </header>
                
                <div class="postcontent">
                        <p><?php _e( 'It looks like nothing was found over here. Maybe try searching?', 'typist' ); ?></p>
                        <?php get_search_form(); ?>
                </div>
        
        </article>
    
    </div><!--bloglist end-->

    <div id="sidewrap">
        <?php get_sidebar(); ?>
    </div>

</div><!-- column end -->

<?php get_footer(); ?>