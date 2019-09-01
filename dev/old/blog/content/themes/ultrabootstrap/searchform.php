<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package ultrabootstrap
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
		<input class="field form-control" id="s" name="s" style="margin-bottom:5px;" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'ultrabootstrap' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<input class="submit btn btn-danger" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Search', 'ultrabootstrap' ); ?>">
	</span>
	</div>
</form>
