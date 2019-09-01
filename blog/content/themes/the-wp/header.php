<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package The WP Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'the-wp' ); ?></a>

<?php the_wp_header_menu ( 'top', 'fullsize');?>
<?php the_wp_header_menu ( 'top', 'hybrid');?>

<?php if ( get_theme_mod('layout', 'hybrid') == 'fixed' ):?><div id="page" class="hfeed site"><?php endif; ?>

	<?php the_wp_header_menu ( 'top', 'fixed' );?>
    
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
        <?php
        if ( get_theme_mod('logo' , CEEWP_THEMEURI . '/images/the-wp-example-logo.png') ) {
        ?>
            <div class="header-logo-image">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <img src="<?php echo esc_url( get_theme_mod('logo' , CEEWP_THEMEURI . '/images/logo.png') ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            </div><!-- #header-logo-image -->
        <?php
		// Has the text been hidden?
		} elseif ( get_header_textcolor() == 'blank' ) {
			echo '<!-- UnChecked: Display Site Title and Tagline -->';
        } else {
        ?>
        	<div class="header-text">
            	<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php if ( get_theme_mod('header_icon', 'fa-wordpress') ) echo '<i class="fa '  .esc_attr(get_theme_mod('header_icon' , 'fa-wordpress')) . '"></i>';?>
					<?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            	<span class="site-description"><?php bloginfo('description'); ?></span>
        	</div>

        <?php
        }
        ?>
            <div class="header-search">
            	<?php
                the_wp_header_widget();
				if ( get_theme_mod('show_search' , 1) ) get_search_form();
				?>
            	<div class="header-description">
                	<?php
					if( get_theme_mod( 'address_header', 1 ) ) the_wp_contact_info();
					if( get_theme_mod( 'social_header', 1 ) ) the_wp_social_links ();
					?>
                </div>
            </div>    
            <div class="clear"></div>
		</div><!-- .site-branding -->
    <?php the_wp_header_menu ( 'default' );?>
	</header><!-- #masthead -->

    <!-- Responsive Menu -->
    <?php if( get_theme_mod( 'main_menu_active', 1 ) ):?>
    <div class="responsive-menu-bar open-responsive-menu"><i class="fa fa-bars"></i> <span><?php echo __('Menu', 'the-wp');?></span></div>
    <div id="responsive-menu">
        <div class="menu-close-bar open-responsive-menu"><i class="fa fa-times"></i> <?php echo __('Close', 'the-wp');?></div>
    </div>
	<div class="clear"></div>
    <?php endif;?>
    <div class="nav-foot"></div>
<?php
if( get_theme_mod( 'enable_slider', 1 ) && is_front_page() && $paged <= 1 && ! is_404() ) {
	if ( is_front_page() ) {
?>
		<div class="site-slider"><div class="inner">
<?php
		the_wp_slider();
?>
		<div class="clear"></div></div></div>
<?php
	}
}
?>
<?php if ( get_theme_mod('layout' , 'hybrid') == 'hybrid' ):?><div id="page" class="hfeed site"><?php endif; ?>
<div id="content" class="site-content">