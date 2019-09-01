<?php
/**
 * This template shows meta information.
 * Used on content, content-video and content-page pages.
 */
?>
<footer class="postline">
<span class="s_date"><span class="fa fa-calendar-o"></span><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_time('d-m-Y'); ?></a></span>
<span class="s_auth"><span class="fa fa-user"></span><?php the_author_posts_link(); ?></span>
<?php if ( !is_page() ) : ?><span class="s_category"><span class="fa fa-folder-open-o"></span><?php the_category(', '); ?></span><br/>
<?php endif; ?>
<span class="s_tags"><?php the_tags('<span class="fa fa-tags"></span><span class="tag-links">',', ','</span><br/>'); ?></span>
<span class="s_comm"><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
<span class="fa fa-comment"></span><span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'typist' ), __( '1 Comment', 'typist' ), __( '% Comments', 'typist' ) ); ?></span></span>
<?php endif; edit_post_link( __( 'Edit', 'typist' ), '<span class="s_edit"><span class="fa fa-edit"></span><span class="edit-link">', '</span></span>' ); ?>
</footer>  