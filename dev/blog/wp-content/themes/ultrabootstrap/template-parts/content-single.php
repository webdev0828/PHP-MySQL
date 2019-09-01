<?php
/**
 * Template part for displaying single posts.
 *
 * @package ultrabootstrap
 */

?>

<div class="page-title">
  <h1><?php the_title(); ?></h1>
</div>

<div class="single-post">
  <div class="info">
    <ul class="list-inline">
    <?php $archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day   = get_the_time('d'); ?>
      <li><i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
      <li><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date('d M Y');?></a></li>
      <li><i class="fa fa-comments-o"></i> &nbsp; <?php comments_popup_link('zero comment','one comment', '% comments');?></li>
    </ul>
  </div>

  <div class="post-content">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('full'); ?>
      <?php endif; ?> 
    
    <article class="spacer">
      <?php the_content();?>

      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ultrabootstrap' ),
          'after'  => '</div>',
        ) );
      ?>     
    </article>

    <div class="post-info"><?php the_category();?><?php the_tags();?></div>

    </div>
  </div>