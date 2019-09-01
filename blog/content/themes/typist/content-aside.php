<?php
/**
 * The default template for displaying content
 * Used for both single and index/archive/search. As Asides are meant to be small, no need to show them as excerpts in search.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
	<div class="postcontent">
		<?php the_content(__( '<div class="more">Read More &rarr;</div>', 'typist' )); ?>
	</div>
                              
</article>