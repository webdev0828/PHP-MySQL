<?php
/**
 * Hooks the Custom Internal CSS to head section
 *
 * @package The WP Theme
 */
function the_wp_custom_css() {

	$the_wp_internal_css = '';
	// primary colors
	$primary_color = esc_attr( get_theme_mod( 'primary_color', '#333333' ) );	
	if( $primary_color != '#333333' ) {
		$the_wp_internal_css .= '
		blockquote, pre {border-left:2px solid '.$primary_color.';}
		
		a:hover, a:focus, a:active,
		.entry-content a,
		.entry-title,
		.entry-title a,
		.pagination .nav-links a:hover,
		.pagination .current,
		.wp-pagenavi span.current,
		.widget-area .widget-title,
		.content-block-text p a
		{color:'.$primary_color.';}
		
		.widget-area .widget-title span {border-color:'.$primary_color.';}
		
		#controllers a:hover, #controllers a.active{
			background-color:'.$primary_color.';
			color:'.$primary_color.';
		}
		#next-slide i, #prev-slide i {
			color:'.$primary_color.';
		}
		
		.slider-title a,
		#commentform input ~ span,
		#commentform textarea ~ span,
		button,input[type="button"],input[type="reset"],input[type="submit"]
			{background-color:'.$primary_color.';}';
	}
	// Layout
	// Layout Size
	if ( get_theme_mod( 'layout' ) == 'fullsize' ):
		$the_wp_internal_css .= '.site { max-width:100%; width:100%; } #primary {margin-left:1%;} #secondary{width:28%;}';
	elseif ( get_theme_mod( 'layout_size', 1200 ) != 1200 ):
		$the_wp_internal_css .= '.site { max-width:'. esc_attr( get_theme_mod( 'layout_size' ), 1200 ) .'px; }';
	endif;
	
	// Layout Background
	if ( get_theme_mod( 'layout_color_alpha', 100 ) != 100 ) {
		$alpha = esc_attr( round ( get_theme_mod( 'layout_color_alpha', 100 ) / 100, 1) );
		$rgb = esc_attr(the_wp_hex2rgb(get_theme_mod( 'layout_color', '#fff' )));
		$the_wp_internal_css .= ".site-content { background-color: rgba($rgb,$alpha); }";
	} else {
		$the_wp_internal_css .= '.site-content { background-color:'. esc_attr( get_theme_mod( 'layout_color' ) ) .'; }';
	}
	
	// Header Image
	$header_image = get_header_image();
	if( empty($header_image) ) {
		$the_wp_internal_css .= 'header.site-header{background-image:none;}';
	} else {
		$the_wp_internal_css .= 'header.site-header{background-image:url('.esc_url($header_image).');}';
	}
	
	if ( get_theme_mod( 'header_bg_size') == 'cover' ) {
		$the_wp_internal_css .= 'header.site-header{background-size:cover;}';
	} else if ( get_theme_mod( 'header_bg_size') == 'auto' ) {
		$the_wp_internal_css .= 'header.site-header{background-size:auto;}';
	} else if ( get_theme_mod( 'header_bg_size') == 'full' ) {
		$the_wp_internal_css .= 'header.site-header{background-size:100% 100%;}';
	}
	
	if ( get_theme_mod( 'header_bg_repeat') == 'x' ) {
		$the_wp_internal_css .= 'header.site-header{background-repeat:repeat-x;}';
	} else if ( get_theme_mod( 'header_bg_repeat') == 'y' ) {
		$the_wp_internal_css .= 'header.site-header{background-repeat:repeat-y;}';
	} else if ( get_theme_mod( 'header_bg_repeat') == 'xy' ) {
		$the_wp_internal_css .= 'header.site-header{background-repeat:repeat;}';
	}
	
	$posX = get_theme_mod( 'header_bg_pos_x', 'center');
	$posY = get_theme_mod( 'header_bg_pos_y', 'top');
	
	if ( $posX != 'center' or $posY != 'top' ) {
		$the_wp_internal_css .= 'header.site-header{background-position-x:'.esc_attr($posX).' !important;}';
		$the_wp_internal_css .= 'header.site-header{background-position-y:'.esc_attr($posY).' !important;}';
		$the_wp_internal_css .= 'header.site-header{ background-attachment: inherit;}';
	}
	
	// Header BG Color
	if ( get_theme_mod( 'header_bg', false ) ) $the_wp_internal_css .= 'header.site-header{background-color:'. esc_attr( get_theme_mod( 'header_bg' ) ) .';}';
	
	// Header Size
	if ( get_theme_mod( 'header_size', false ) )
		$the_wp_internal_css .= 'header.site-header { height:'. esc_attr( get_theme_mod( 'header_size' ), 110 ) .'px; }';
	
	if ( get_theme_mod( 'header_padding_top', false ) )
		$the_wp_internal_css .= 'header .site-branding { padding:'. esc_attr( get_theme_mod( 'header_padding_top' ), 5 ) .'px 15px 5px 15px; }';
			
	// Layout Box Shadow
	if ( get_theme_mod( 'layout_shadow', 0 ) ) 
		$the_wp_internal_css .= '
		#primary.content-area {padding-left:0;}
		/*#secondary.widget-area {padding-right:0;}*/
		footer .widgets,
		#content {box-shadow: none;}';
	
	// Main Menu
	if (get_theme_mod( 'main_menu_bg_color', '#06BCF9' )
		&&
		get_theme_mod( 'main_menu_bg_color_alpha', 50 ) != 100
	) {
		$alpha = esc_attr( round ( get_theme_mod( 'main_menu_bg_color_alpha', 50 ) / 100, 1) );
		$rgb = esc_attr(the_wp_hex2rgb(get_theme_mod( 'main_menu_bg_color', '#4d4d4d' )));
		$the_wp_internal_css .= ".main-navigation { background-color: rgba($rgb,$alpha); }
		.main-navigation.hover:hover { background-color: rgba($rgb,0.8)};
		";
	} elseif ( get_theme_mod( 'main_menu_bg_color', '#06BCF9' ) ) {
		$the_wp_internal_css .= '.main-navigation {background-color:'. esc_attr( get_theme_mod( 'main_menu_bg_color' ) ) .';}';
	}
		
		
	if ( get_theme_mod( 'main_menu_bg_color_active', false ) ) 
		$the_wp_internal_css .= '.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a {background-color:'. esc_attr( get_theme_mod( 'main_menu_bg_color_active' ) ) .';}';
	if ( get_theme_mod( 'main_menu_bg_color_hover', false ) )
		$the_wp_internal_css .= '.main-navigation li a:hover {background-color:'. esc_attr( get_theme_mod( 'main_menu_bg_color_hover' ) ) .';}';
	if ( get_theme_mod( 'main_menu_bg_color_submenu', false ) ) 
		$the_wp_internal_css .= '.main-navigation ul ul a {background-color:'. esc_attr( get_theme_mod( 'main_menu_bg_color_submenu' ) ) .'!important;}';
	if ( get_theme_mod( 'main_menu_text_color', false ) ) 
		$the_wp_internal_css .= '.main-navigation li a {color:'. esc_attr( get_theme_mod( 'main_menu_text_color' ) ) .';}';
	
	if ( get_theme_mod( 'main_menu_stripe_image') != '' ) {
		$the_wp_internal_css .= '.nav-foot{background-image:url('.esc_url( get_theme_mod( 'main_menu_stripe_image' ) ).');}';
	} else {
		$the_wp_internal_css .= '.nav-foot{display:none;}';
	}
	if ( get_theme_mod( 'main_menu_item_margin', false ) ) 
		$the_wp_internal_css .= '.main-navigation li a { padding: 0 '. esc_attr( get_theme_mod( 'main_menu_item_margin' ) ) .'px !important;}';
	
	// Menu : Icons
	if ( ! get_theme_mod( 'main_menu_icons', 1 ) ) 
		$the_wp_internal_css .= 'i.menu-icon {display: none;}';
	
		
	// Site Title & Tagline Colors
	if ( get_theme_mod( 'title_color', false ) ) 
		$the_wp_internal_css .= '
			header .site-title i,
			header .site-title a {color:'. esc_attr( get_theme_mod( 'title_color' ) ) .';}';
	if ( get_header_textcolor() )
		$the_wp_internal_css .= 'header .site-description {color:#'.esc_attr(get_header_textcolor()).';}';
	
	// Colors: Header Contact Info
	if ( get_theme_mod( 'hours_color', false ) )
		$the_wp_internal_css .= '.header-description div.ch {color:'.
								esc_attr( get_theme_mod( 'hours_color' ) ) .';}';
	if ( get_theme_mod( 'address_color', false ) )
		$the_wp_internal_css .= '.header-description div.ca {color:'.
								esc_attr( get_theme_mod( 'address_color' ) ) .';}';
	if ( get_theme_mod( 'mail_color', false ) )
		$the_wp_internal_css .= '.header-description div.cm {color:'.
								esc_attr( get_theme_mod( 'mail_color' ) ) .';}';
	if ( get_theme_mod( 'phone_color', false ) )
		$the_wp_internal_css .= '.header-description div.cp {color:'.
								esc_attr( get_theme_mod( 'phone_color' ) ) .';}';
	//  Typography
	if ( get_theme_mod( 'font_size_site_title' ) )
		$the_wp_internal_css .= '.site-title { font-size:'. esc_attr( get_theme_mod( 'font_size_site_title' ) ) .'px; }';
	if ( get_theme_mod( 'font_size_tagline' ) )
		$the_wp_internal_css .= '.site-description { font-size:'. esc_attr( get_theme_mod( 'font_size_tagline' ) ) .'px; }';
	if ( get_theme_mod( 'font_size_main_menu' ) )
		$the_wp_internal_css .= '.main-navigation { font-size:'. esc_attr( get_theme_mod( 'font_size_main_menu' ) ) .'px; }';
	// Colors: Footer Contact Info
	if ( get_theme_mod( 'footer_contact_info_color', false ) )
		$the_wp_internal_css .= '
			.footer-contact-info .cp, .footer-contact-info .cm, .footer-contact-info .ca {
				color:'.esc_attr( get_theme_mod( 'footer_contact_info_color' ) ) .';
			}';
	// Colors: Footer Menu
	if ( get_theme_mod( 'footer_menu_color', false ) )
		$the_wp_internal_css .= '#footer-menu a {color:'.esc_attr( get_theme_mod( 'footer_menu_color' ) ) .';}';
	// Hide Read More
	if ( get_theme_mod( 'hide_readmore', 0 ) )
		$the_wp_internal_css .= '.post-box-more, .more-link {display:none;}';
	// 'Read More' and 'Post Navigation' buttons
	$hover_color = the_wp_adjustBrightness($primary_color, 30);
	$the_wp_internal_css .=".more-link, .site-main #nav-below a {background: $primary_color;}
							.more-link:hover, .site-main #nav-below a:hover {background-color:$hover_color;}";
	
	// Slider
	if ( get_theme_mod( 'slider_no_style' ) )
		$the_wp_internal_css .= '.slider-title a, .slider-content { background-color:transparent !important; color:#fff; }';
	// Custom CSS
		$the_wp_internal_css .= '<!-- The WP custom CSS: -->';
		$the_wp_internal_css .= esc_html(get_theme_mod( 'css'));
	
	if( !empty( $the_wp_internal_css ) ) {?><style type="text/css"><?php echo $the_wp_internal_css; ?></style><?php }
}
add_action('wp_head', 'the_wp_custom_css');
?>