<?php 


class AzonBooster_Customizer_Output {

	public function __construct() {

		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_filter( 'post_class', array( $this, 'thumbnail_position' ) );

		add_filter( 'azonbooster_show_excerpt', array( $this, 'show_excerpt' ) );
		add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length'), 999 );
		add_filter( 'excerpt_more', array( $this, 'custom_excerpt_more' ) );

		add_filter( 'azonbooster_show_post_thumbnail', array( $this, 'show_post_thumbnail' ));
		add_filter( 'azonbooster_show_post_thumbnail', array( $this, 'show_single_post_thumbnail' ), 999);
		add_filter( 'post_class', array( $this, 'hide_post_thumbnail' ) );
		add_filter( 'azonbooster_show_post_nav', array( $this, 'show_post_nav'));

		add_filter( 'azonbooster_show_readmore', array( $this, 'show_readmore' ) );
		add_filter( 'azonbooster_readmore_link_label', array( $this, 'change_readmore_label' ) );

		// Footer Widget
		add_filter( 'azonbooster_footer_widget_columns', array( $this, 'footer_widget_columns' ) );
		add_filter( 'azonbooster_footer_widget_rows', array( $this, 'footer_widget_rows' ) );

		// Post meta data
		add_filter( 'azonbooster_enable_post_metadata', array( $this, 'single_post_meta_data' ) );

		add_filter( 'azonbooster_enable_modified', array( $this, 'enable_modified_date' ) );


		// Date prefix
		add_filter( 'azonbooster_prefix_post_metadata', array( $this, 'date_prefix' ) );

		
	}

	/**
	 * Hooked to filter post metat data
	 *
	 * @since 1.2.0
	 * @param  array $metadata
	 * @return array
	 */
	public function single_post_meta_data( $metadata ) {

		if ( is_single() ) {

			$metadata = azonbooster_get_option( 'blog_single_post_metadata', array() );

		} elseif ( is_archive() || is_home() ) {

			$metadata = azonbooster_get_option( 'blog_posts_metadata', array() );
		}

		return $metadata;
	}

	/**
	 * Enable modified date?
	 *
	 * @since 1.2.0
	 * @return boolean
	 */
	public function enable_modified_date() {
		if ( is_single() ) {

			return azonbooster_get_option( 'blog_single_post_modified_date', false );

		} elseif ( is_archive() || is_home() ) {

			return azonbooster_get_option( 'blog_posts_modified_date', false );

		}
	}

	/**
	 * Hooked to filter date archive prefix
	 *
	 * @since 1.2.0
	 * @return [type] [description]
	 */
	public function date_prefix( $archive_prefix ) {

		$date_prefix = azonbooster_get_option( 'blog_posts_date_prefix', '');

		if ( $date_prefix != '' ) {
			$archive_prefix['date'] = $archive_prefix['modified'] = $date_prefix;
		}

		return $archive_prefix;
	}

	public function body_classes( $classes ) {

		$sidebar = azonbooster_get_option('blog_layout', 'right') . '-sidebar';

		$classes[] = $sidebar;

		if ( $sidebar === 'none-sidebar' ) {

			remove_action( 'azonbooster_sidebar',        'azonbooster_get_sidebar',          10 );

		} 

		return $classes;
	}

	public function thumbnail_position( $classes ) {

		if ( is_archive() || is_home() ) {

			$classes[] = 'thumbnail-on-' . azonbooster_get_option('blog_layout_thumbnail_pos', 'left');

		}

		return $classes;
	}

	public function custom_excerpt_length( $length ) {

		if ( is_admin() ) {
			return $length;
		}

		return azonbooster_get_option('blog_post_excerpt_length', 20);

	}

	public function show_excerpt( $show ) {

		$enable = azonbooster_get_option('blog_post_show_excerpt', 'on');

		if ( $enable == 'on' ) {
			return true;
		}

		return false;
		
	}

	public function custom_excerpt_more( $more  ) {

		if ( is_admin() ) {
			return $more;
		}

		return azonbooster_get_option('blog_post_show_excerpt_more', '[...]');
	}

	public function show_readmore( $show ) {

		return azonbooster_get_option( 'blog_post_show_readmore', true);
	}

	public function change_readmore_label() {

		return azonbooster_get_option( 'blog_post_show_readmore_label', __('Read More...', 'azonbooster') );
	}

	public function show_post_thumbnail( $show ) {

		return azonbooster_get_option('blog_post_show_thumbnail', true);

	}

	public function show_post_nav( $show ) {

		return azonbooster_get_option('blog_single_post_show_nav', true);
	}

	public function show_single_post_thumbnail( $show ) {

		if ( is_single() )

			return azonbooster_get_option('blog_single_post_show_thumbnail', false);

		return $show;

	}

	public function hide_post_thumbnail( $classes ) {

		if ( ! $this->show_post_thumbnail( true ) ){

			$classes[] = "disable-thumbnail";
		}

		

		return $classes;
	}

	public function footer_widget_columns( $col ) {

		return azonbooster_get_option('blog_footer_widget_cols', 4);

	}

	public function footer_widget_rows( $row ) {

		return azonbooster_get_option('blog_footer_widget_rows', 2);

	}

}

new AzonBooster_Customizer_Output();