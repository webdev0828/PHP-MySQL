<?php
/*
The template for displaying Comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comment-area">   

	<?php comment_form(); ?>
    
    <?php if ( have_comments() ) : ?>
            <p class="big comments-title">
                <?php
                    printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'typist' ),
                        number_format_i18n( get_comments_number() ), get_the_title() );
                ?>
            </p>
            
    <div id="comments">
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate ?>
                <div class="navigation">
                    <div class="nav-previous"><?php previous_comments_link( __( '&lt; Older Comments', 'typist' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &gt;', 'typist' ) ); ?></div>
                </div><!-- .navigation -->
    <?php endif; // check for comment navigation ?>
    
    
            <ol class="commentlist">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ul',
                        'short_ping'  => true,
                        'avatar_size' => 50,
                    ) );
                ?>
            </ol><!-- .comment-list -->
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate ?>
                <div class="navigation">
                    <div class="nav-previous"><?php previous_comments_link( __( '&lt; Older Comments', 'typist' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &gt;', 'typist' ) ); ?></div>
                </div><!-- .navigation -->
    <?php endif; // check for comment navigation ?>
    
    </div><!-- .comments -->
    <?php endif; // have_comments() ?>
    
        <?php
            // If comments are closed and there are comments
            if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'typist' ); ?></p>
        <?php endif; ?>
    
</div><!-- .comments-area -->