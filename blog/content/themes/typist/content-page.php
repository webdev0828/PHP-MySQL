<?php
/**
 * The default template for displaying content
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
    <header class="heading">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>
    
	<?php if ( is_search() ) : ?>
        <div class="postcontent summary">
            <?php the_excerpt(); ?>
        </div>
	<?php else : ?>
        <div class="postcontent">
            <?php the_content(__( '<div class="more">Read More &rarr;</div>', 'typist' )); ?>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'typist' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>           
        </div>
	<?php endif; ?>
    
	<?php if(! get_theme_mod('typist_show_meta_pages') == 1): /*the general meta switch*/
					get_template_part( 'bit/postline-meta');
	endif; ?>
                                   
</article>