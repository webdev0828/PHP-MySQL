<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *
 * @package ultrabootstrap
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ultrabootstrap_header_style()
 * @uses ultrabootstrap_admin_header_style()
 * @uses ultrabootstrap_admin_header_image()
 */
function ultrabootstrap_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ultrabootstrap_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'ultrabootstrap_header_style',
		'admin-head-callback'    => 'ultrabootstrap_admin_header_style',
		'admin-preview-callback' => 'ultrabootstrap_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'ultrabootstrap_custom_header_setup' );

if ( ! function_exists( 'ultrabootstrap_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see ultrabootstrap_custom_header_setup().
 */
function ultrabootstrap_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	* If no custom options for text are set, let's bail.
	* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	*/
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title,
		header .logo-tag h2,
		.navbar-default .navbar-nav > li > a,
		.dropdown-menu > li > a {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // ultrabootstrap_header_style

if ( ! function_exists( 'ultrabootstrap_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see ultrabootstrap_custom_header_setup().
 */
function ultrabootstrap_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // ultrabootstrap_admin_header_style

if ( ! function_exists( 'ultrabootstrap_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see ultrabootstrap_custom_header_setup().
 */
function ultrabootstrap_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // ultrabootstrap_admin_header_image
