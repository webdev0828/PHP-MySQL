<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ultrabootstrap
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

<header>	
<section class="logo-menu">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only"><?php _e('Toggle navigation' , 'ultrabootstrap' ); ?></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				      	</button>
				      	<div class="logo-tag">
				      		
				      			<?php if ( has_custom_logo()): the_custom_logo(); else: ?>
				      			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title" ><?php echo bloginfo( 'name' ); ?></h1>
				      			<h2 class="site-description" ><?php bloginfo('description'); ?></h2><?php endif; ?></a>                     
      						
      					</div>
				    </div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php if (get_theme_mod('header_search_setting', 1)) : ?>

							<form  class="navbar-form navbar-right" role="search">
								<ul class="nav pull-right">
									<div class="main-search">
										<button class="btn btn-search" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
										<i class="fa fa-search"></i>
										</button>
										<div class="search-box collapse" id="collapseExample">
												<div class="well search-well">
												<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
													<input type="text" class="form-control" placeholder="<?php echo __('Search a Keyword','ultrabootstrap');?>" value="<?php echo get_search_query(); ?>" name="s">
												</form>
												</div>
										</div>
									</div>
								</ul>
							</form>

						<?php endif; ?>  							
						<?php
				            wp_nav_menu( array(
				                'menu'              => 'primary',
				                'theme_location'    => 'primary',
				                'depth'             => 8,
				                'container'         => 'div',
				                'menu_class'        => 'nav navbar-nav navbar-right',
				                'fallback_cb'       => 'ultrabootsrap_wp_bootstrap_navwalker::fallback',
				                'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
				            );
				        ?>
				    </div> <!-- /.end of collaspe navbar-collaspe -->
	</div> <!-- /.end of container -->
	</nav>
</section> <!-- /.end of section -->
</header>