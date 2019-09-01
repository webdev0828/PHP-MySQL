<?php
/**
 * The template for displaying search forms
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete='off'>
	<input type="text" class="search-field" placeholder="<?php echo _e( 'Search &hellip;', 'the-wp' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php _e( 'Search', 'the-wp' ); ?>" title="<?php _e( 'Search', 'the-wp' ); ?>" />
</form>
<div class="clear"></div>