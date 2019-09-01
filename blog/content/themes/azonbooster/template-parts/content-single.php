<?php
/**
 * Template used to display post content on single post.
 *
 * @package azonbooster
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'azonbooster_single_post_top' );

	/**
	 * Functions hooked into azonbooster_single_post add_action
	 *
	 * @hooked azonbooster_post_header          - 10
	 * @hooked azonbooster_post_content         - 20
	 * @hooked azonbooster_init_structured_data - 30
	 */
	do_action( 'azonbooster_single_post' );

	/**
	 * Functions hooked in to azonbooster_single_post_bottom action
	 *
	 * @hooked azonbooster_post_nav         - 10
	 * @hooked azonbooster_display_comments - 20
	 */
	do_action( 'azonbooster_single_post_bottom' );
	?>

</div><!-- #post-## -->