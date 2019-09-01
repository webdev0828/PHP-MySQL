<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package The WP Theme

 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="clear"></div>
<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'the-wp' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'the-wp' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( '<i class="fa fa-arrow-left"></i> ' . __( 'Older Comments', 'the-wp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'the-wp' ) . ' <i class="fa fa-arrow-right">'); ?></i></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'callback'      => 'the_wp_comment',
					'avatar_size' => 32,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'the-wp' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( '<i class="fa fa-arrow-left"></i> ' . __( 'Older Comments', 'the-wp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'the-wp' ) . ' <i class="fa fa-arrow-right">'); ?></i></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><i class="fa fa-exclamation-circle"></i> <?php _e( 'Comments are closed.', 'the-wp' ); ?></p>
	<?php endif; ?>

</div><!-- #comments -->

<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
	'author' => '<div class="input-container">
	<input id="author" type="text" aria-required="true" tabindex="1" size="22" value="'.esc_attr($commenter['comment_author']).'" name="author" '.$aria_req.' autocomplete="off" />
	<label for="author"><i class="fa fa-user-o"></i> '.__('Name','the-wp').' '.($req?'*':'').'</label>
	<span></span>
	</div>',
	
	'email' => '<div class="input-container">
	<input id="email" type="text" aria-required="true" tabindex="2" size="22" value="'.esc_attr($commenter['comment_author_email']).'" name="email" '.$aria_req.' autocomplete="off" />
	<label for="email"><i class="fa fa-envelope-o"></i> '.__('Email','the-wp').' '.($req?'*':'').'</label>
	<span></span>
	</div>',
	
	'url' => '<div class="input-container">
	<input id="url" type="text" aria-required="true" tabindex="3" size="22" value="'.esc_url($commenter['comment_author_url']).'" name="url" autocomplete="off" />
	<label for="url"><i class="fa fa-link"></i> '.__('Website','the-wp').'</label>
	<span></span>
	</div>'
);
$comments_args = array(
	'comment_notes_before' => '<!-- Comment Guidelines -->',
	// change the title of send button
	'label_submit' => __( 'Post Comment','the-wp' ),
    'fields' =>  $fields,
	'comment_field'        => '<div class="input-container-comment"><textarea placeholder="'.__('Comment','the-wp').'" id="comment" tabindex="4" rows="5" cols="58" name="comment" autocomplete="off" /></textarea>
	<span></span>
	</div>',
	'cancel_reply_link'    => '<i class="fa fa-close"></i> '.__( 'Cancel reply','the-wp' ),
);
comment_form($comments_args);
?>