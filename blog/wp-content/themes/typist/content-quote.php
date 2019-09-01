<?php
/**
 * The default template for displaying quotation
 * Used for both single and index/archive/search. As Quotes are small, no need to show them as excerpts in search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<div class="postcontent">
        <span class="fa fa-quote-left"></span>
        <?php the_content(__( '<div class="more">Read More &rarr;</div>', 'typist' )); ?>
        <?php the_title( '<p class="quote">&mdash;', '</a></p>' ); ?>
	</div>
                             
</article>