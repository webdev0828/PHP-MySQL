<?php
/**
 * The default template for displaying image post type
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : ?>
		<div class="postcontent summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		<div class="postcontent">
			<?php the_content(__( '<div class="more">Read More &rarr;</div>', 'typist' )); ?>
		</div>
	<?php endif; ?>
                                
</article>