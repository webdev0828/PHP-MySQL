<?php
/**
 * The default template for displaying content
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
    <header class="heading">
		<?php
            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
        ?>
    </header>
        
	<?php if ( is_search() ) : ?>
        <div class="postcontent summary">
            <?php the_excerpt(); ?>
        </div>
	<?php else : ?>
        <div class="postcontent">
                <?php the_content(__( '<div class="more">Read More &rarr;</div>', 'typist' )); ?>
        </div>
	<?php endif; ?>
             
	<?php if(! get_theme_mod('typist_show_meta') == 1): /*the general meta switch*/
					get_template_part( 'bit/postline-meta');
	endif; ?>                 

</article>