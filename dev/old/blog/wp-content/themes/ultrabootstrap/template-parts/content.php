<?php
/**
 * Template part for displaying posts.
 *
 * @package ultrabootstrap
 */

?>

<div class="col-lg-4 col-md-6 eq-blocks">
    <div class="post-block">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('portfolio-thumb'); ?></a>
        <?php elseif(get_theme_mod('default_thumbnail') != '') : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo esc_attr( get_theme_mod('default_thumbnail')); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/no-blog-thumbnail.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
        <?php endif; ?>  
    <div class="summary">
        <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
    
        <?php the_excerpt('ultrabootstrap_excerpt_length');?>
        
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="" class="readmore">Read More </a>

    </div>
</div>
</div>



