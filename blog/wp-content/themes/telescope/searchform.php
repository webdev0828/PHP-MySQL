<?php
/**
 * default search form
 */
?>
			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label>
					<span class="screen-reader-text"><?php echo __('[:en]Search for[:ru]Ищи'); ?></span>
					<div class="input-group input-group-bgc">
					<input type="search" class="search-field" placeholder="<?php echo __('[:en]Search...[:ru]Поиск...'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s"><i class="fa fa-search fa-fw" aria-hidden="true"></i>
					</div>
				</label>
				<input type="submit" class="btn btn--primary btn--large" value="<?php echo __('[:en]Search[:ru]Поиск'); ?>">
			</form>