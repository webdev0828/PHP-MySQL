<?php get_header(); ?>

<div id="column" class="<?php echo esc_attr(get_theme_mod('typist_bloglayout', 'left'));?>-sidebar">
    <div id="bloglist">
    
        <h1 class="archive-title">
                            <?php
                                if ( is_day() ) :
                                    printf( __( 'Daily Archives: %s', 'typist' ), get_the_date() );
                                elseif ( is_month() ) :
                                    printf( __( 'Monthly Archives: %s', 'typist' ), get_the_date('F Y') );
                                elseif ( is_year() ) :
                                    printf( __( 'Yearly Archives: %s', 'typist' ), get_the_date('Y') );
                                else :
                                    _e( 'Archives', 'typist' );
                                endif;
                            ?>
        </h1>
    
		<?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                
                    get_template_part( 'content', get_post_format() );

                endwhile;					
                    
            the_posts_pagination( array(
                'prev_text'          => __( '&lt;&lt;', 'typist'),
                'next_text'          => __( '&gt;&gt;', 'typist'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'typist' ) . ' </span>',
            ) ); 
                       
            else :
                get_template_part( 'content', 'none' );
            endif;
        ?>
    
    </div><!--bloglist end-->

    <div id="sidewrap">
        <?php get_sidebar(); ?>
    </div>
  
</div><!-- column end -->

<?php get_footer(); ?>