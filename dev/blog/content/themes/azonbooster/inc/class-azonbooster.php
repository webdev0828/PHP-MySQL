<?php
/**
 * AzonBooster Class
 *
 * @author   AzonBooster
 * @since    1.0.0
 * @package  AzonBooster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AzonBooster' ) ) :

	/**
	 * The main AzonBooster class
	 */
	class AzonBooster {

		private static $structured_data;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ));

			add_action( 'after_setup_theme',       array( $this, 'setup' ) );
			add_action( 'widgets_init',            array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts',      array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts',         array( $this, 'child_scripts' ), 30 );
			add_filter( 'body_class',                 array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args',          array( $this, 'page_menu_args' ) );

			add_filter( 'navigation_markup_template', array( $this, 'navigation_markup_template' ) );
			add_action( 'enqueue_embed_scripts',      array( $this, 'print_embed_styles' ) );
			add_action( 'wp_footer',                  array( $this, 'get_structured_data' ) );

			add_filter( 'get_the_archive_title', array( $this, 'the_archive_title' ) );
		}

		public static function get_theme_slug() {

			global $azonbooster_slug;

			return $azonbooster_slug;

		}

		public function setup() {

			// Loads wp-content/languages/themes/azonbooster-it_IT.mo.
			load_theme_textdomain( 'azonbooster', trailingslashit( WP_LANG_DIR ) . 'themes/' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'azonbooster', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/azonbooster/languages/it_IT.mo.
			load_theme_textdomain( 'azonbooster', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Set Post Thumbnail
			 */
			$this->set_custom_thumbnail();

			/**
			 * Enable support for site logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 60,
				'flex-width'  => true,
				'flex-height' => true,
			) );

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus( array(
				'primary'   => __( 'Primary Menu', 'azonbooster' ),
				'secondary' => __( 'Top Menu', 'azonbooster' ),
				'footer'  => __( 'Footer Menu', 'azonbooster' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			) );

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support( 'site-logo', array( 'size' => 'full' ) );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );


		}

		public function widgets_init() {

			$sidebar_args['sidebar'] = array(
				'name'          => __( 'Sidebar', 'azonbooster' ),
				'id'            => 'sidebar-1',
				'description'   => ''
			);

			$sidebar_args['header'] = array(
				'name'        => __( 'Below Header', 'azonbooster' ),
				'id'          => 'header-1',
				'description' => __( 'Widgets added to this region will appear beneath the header and above the main content.', 'azonbooster' ),
			);

			$rows    = intval( apply_filters( 'azonbooster_footer_widget_rows', 2 ) );
			$regions = intval( apply_filters( 'azonbooster_footer_widget_columns', 4 ) );

			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 == $rows ) {
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'azonbooster' ), $region );
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'azonbooster' ), $region );
					} else {
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'azonbooster' ), $row, $region );
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'azonbooster' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'azonbooster_header_widget_tags'
				 * 'azonbooster_sidebar_widget_tags'
				 *
				 * 'azonbooster_footer_1_widget_tags'
				 * 'azonbooster_footer_2_widget_tags'
				 * 'azonbooster_footer_3_widget_tags'
				 * 'azonbooster_footer_4_widget_tags'
				 */
				$filter_hook = sprintf( 'azonbooster_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}

		}

		public function scripts() {

			global $azonbooster_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'azonbooster-style', get_template_directory_uri() . '/style.css', '', $azonbooster_version );

			wp_enqueue_style( 'azonbooster-icons', get_template_directory_uri() . '/assets/sass/base/icons.css', '', $azonbooster_version );

			/**
			 * Fonts
			 */
			$google_fonts = apply_filters( 'azonbooster_google_font_families', array(
				'pt-serif' => 'PT+Serif:400,400i,700,700i',
			) );

			$query_args = array(
				'family' => implode( '|', $google_fonts ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

			wp_enqueue_style( 'azonbooster-fonts', $fonts_url, array(), null );

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'azonbooster-script', get_template_directory_uri() . '/assets/js/script.min.js', array( 'jquery' ), '20120206', true );
			wp_enqueue_script( 'azonbooster-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20130115', true );

			/**
			 * Scripts
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}


		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.0.0
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				wp_enqueue_style( 'azonbooster-child-style', get_stylesheet_uri(), '' );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			

			/**
			 * What is this?!
			 * Take the blue pill, close this file and forget you saw the following code.
			 * Or take the red pill, filter azonbooster_make_me_cute and see how deep the rabbit hole goes...
			 */
			$cute = apply_filters( 'azonbooster_make_me_cute', false );

			if ( true === $cute ) {
				$classes[] = 'azonbooster-cute';
			}

			// If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'azonbooster-full-width-content';
			}

			// Add class when using homepage template + featured image
			if ( is_page_template( 'template-homepage.php' ) && has_post_thumbnail() ) {
				$classes[] = 'has-post-thumbnail';
			}

			return $classes;
		}

		/**
		 * Custom navigation markup template hooked into `navigation_markup_template` filter hook.
		 */
		public function navigation_markup_template() {
			$template  = '<nav id="post-navigation" class="navigation %1$s" role="navigation" aria-label="' . esc_html__( 'Post Navigation', 'azonbooster' ) . '">';
			$template .= '<span class="screen-reader-text">%2$s</span>';
			$template .= '<div class="nav-links">%3$s</div>';
			$template .= '</nav>';

			return apply_filters( 'azonbooster_navigation_markup_template', $template );
		}

		/**
		 * Add styles for embeds
		 */
		public function print_embed_styles() {
			wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,700,900' );
			$accent_color     = get_theme_mod( 'azonbooster_accent_color' );
			$background_color = azonbooster_get_content_background_color();
			?>
			<style type="text/css">
				.wp-embed {
					padding: 2.618em !important;
					border: 0 !important;
					border-radius: 3px !important;
					font-family: "Source Sans Pro", "Open Sans", sans-serif !important;
					-webkit-font-smoothing: antialiased;
					background-color: <?php echo esc_html( azonbooster_adjust_color_brightness( $background_color, -7 ) ); ?> !important;
				}

				.wp-embed .wp-embed-featured-image {
					margin-bottom: 2.618em;
				}

				.wp-embed .wp-embed-featured-image img,
				.wp-embed .wp-embed-featured-image.square {
					min-width: 100%;
					margin-bottom: .618em;
				}

				a.wc-embed-button {
					padding: .857em 1.387em !important;
					font-weight: 600;
					background-color: <?php echo esc_attr( $accent_color ); ?>;
					color: #fff !important;
					border: 0 !important;
					line-height: 1;
					border-radius: 0 !important;
					box-shadow:
						inset 0 -1px 0 rgba(#000,.3);
				}

				a.wc-embed-button + a.wc-embed-button {
					background-color: #60646c;
				}
			</style>
			<?php
		}

		/**
		 * Sets `self::structured_data`.
		 *
		 * @param array $json
		 */
		public static function set_structured_data( $json ) {
			if ( ! is_array( $json ) ) {
				return;
			}

			self::$structured_data[] = $json;
		}

		/**
		 * Outputs structured data.
		 *
		 * Hooked into `wp_footer` action hook.
		 */
		public function get_structured_data() {
			if ( ! self::$structured_data ) {
				return;
			}

			$structured_data['@context'] = 'http://schema.org/';

			if ( count( self::$structured_data ) > 1 ) {
				$structured_data['@graph'] = self::$structured_data;
			} else {
				$structured_data = $structured_data + self::$structured_data[0];
			}

			echo '<script type="application/ld+json">' . wp_json_encode( $this->sanitize_structured_data( $structured_data ) ) . '</script>';
		}

		/**
		 * Sanitizes structured data.
		 *
		 * @param  array $data
		 * @return array
		 */
		public function sanitize_structured_data( $data ) {
			$sanitized = array();

			foreach ( $data as $key => $value ) {
				if ( is_array( $value ) ) {
					$sanitized_value = $this->sanitize_structured_data( $value );
				} else {
					$sanitized_value = sanitize_text_field( $value );
				}

				$sanitized[ sanitize_text_field( $key ) ] = $sanitized_value;
			}

			return $sanitized;
		}

		public function set_custom_thumbnail() {

			//add_image_size( 'azonbooster-magazine-small', 366, 226, true );
			//add_image_size( 'azonbooster-magazine-medium', 360, 508, true );
			add_image_size( 'azonbooster-post-feature-large', 694, 390, true);

		}

		public function the_archive_title() {
			if ( is_category() ) {
				/* translators: Category archive title. 1: Category name */
				$title = single_cat_title( '', false );
			} elseif ( is_tag() ) {
				/* translators: Tag archive title. 1: Tag name */
				$title = single_tag_title( '', false );
			} elseif ( is_author() ) {
				/* translators: Author archive title. 1: Author name */
				$title ='<span class="vcard">' . get_the_author() . '</span>';
			} elseif ( is_year() ) {
				/* translators: Yearly archive title. 1: Year */
				$title = get_the_date( _x( 'Y', 'yearly archives date format', 'azonbooster' ) );

			} elseif ( is_month() ) {
				/* translators: Monthly archive title. 1: Month name and year */
				$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'azonbooster' ) );
			} elseif ( is_day() ) {
				/* translators: Daily archive title. 1: Date */
				$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'azonbooster' ) );

			} elseif ( is_tax( 'post_format' ) ) {
				if ( is_tax( 'post_format', 'post-format-aside' ) ) {
					$title = _x( 'Asides', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
					$title = _x( 'Galleries', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
					$title = _x( 'Images', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
					$title = _x( 'Videos', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
					$title = _x( 'Quotes', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
					$title = _x( 'Links', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
					$title = _x( 'Statuses', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
					$title = _x( 'Audio', 'post format archive title', 'azonbooster' );
				} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
					$title = _x( 'Chats', 'post format archive title', 'azonbooster' );
				}
			} elseif ( is_post_type_archive() ) {
				/* translators: Post type archive title. 1: Post type name */
				$title =  post_type_archive_title( '', false );
			} elseif ( is_tax() ) {
				$tax = get_taxonomy( get_queried_object()->taxonomy );
				/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
				$title = sprintf( __( '%1$s: %2$s', 'azonbooster' ), $tax->labels->singular_name, single_term_title( '', false ) );
			} else {

				$title = '';
			}

			return $title;
		}

		public function register_required_plugins() {

			$plugins =  array(
				array(
					'name'      => 'Kirki',
					'slug'      => 'kirki',
					'required'  => false,
				),

			);
			$config = array(
				'id'           => 'azonbooster',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.
				
			);
			// require plugins 
			tgmpa( $plugins, $config );

		}

	}

endif;

return new AzonBooster();