<?php
/**
 * The default template for displaying status update. It is the same as quotation type but without icon and author
 * Used for both single and index/archive/search. As Statuses are small, no need to show them as excerpts in search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="postcontent">
		<?php the_content(__( '<div class="more">Read More &rarr;</div>', 'typist' )); ?>
	</div>      
                     
</article>