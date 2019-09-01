<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Telescope
 */
// TODO: connect to sublime_db and check whether session is valid to fix menu links for dashboard/login/signup
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

        <link rel="stylesheet" href="/css/base.css">
        <link rel="stylesheet" href="/css/vendor.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/checkboxes.css">
        <script src="/js/modernizr.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123261208-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123261208-2');
</script>
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#532B72">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#532B72">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#532B72">
</head>

<body <?php body_class(); ?>>

<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-jump">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div class="home-content" id="top" style="display:block;" align="center">
        <div class="row home-content__main">
            <a href="/"><img src="/images/logo_big.svg" alt="Sublime Revenue - Up To 80% Commission Per Action Network"></a> 
        </div>
</div>
    <div class="corner-ribbon top-left sticky purple shadow">closed beta</div>
<div id="container">

	<a class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e( 'Skip to content', 'telescope' ); ?></a>
	<header class="s-header" role="banner">
		<div class="wrapper wrapper-header clearfix">

			<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<nav id="menu-header-secondary" role="navigation" aria-label="Secondary Navigation">
				<?php
				wp_nav_menu( array(
					'container' => '', 
					'container_class' => '', 
					'menu_class' => '', 
					'menu_id' => 'menu-main-secondary', 
					'sort_column' => 'menu_order', 
					'theme_location' => 'secondary', 
					'link_after' => '', 
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
				?>
			</nav><!-- #menu-header-secondary -->
			<?php endif; ?>
			
		</div><!-- .wrapper .wrapper-header -->
		
        <?php if ( has_nav_menu( 'primary' ) ) { ?>
        <div class="navbar-header">

			<?php wp_nav_menu( array(
				'container_id'   => 'menu-main-slick',
				'menu_id' => 'menu-slide-in',
				'sort_column' => 'menu_order', 
				'theme_location' => 'primary'
			) ); 
			?>

        </div><!-- .navbar-header -->
        <?php } ?>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="menu-main" role="navigation" aria-label="Main Navigation">
			<div class="wrapper wrapper-header-menu clearfix">
				<?php
				wp_nav_menu( array(
					'container' => '', 
					'container_class' => '', 
					'menu_class' => 'nav navbar-nav dropdown sf-menu', 
					'menu_id' => 'menu-main-menu', 
					'sort_column' => 'menu_order', 
					'theme_location' => 'primary', 
					'link_after' => '', 
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
				?>
			</div><!-- .wrapper .wrapper-header-menu .clearfix -->
		</nav><!-- #menu-main -->
		<?php endif; ?>

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="<?php echo __('[:en]Close[:ru]Закрыть'); ?>"><span><?php echo __('[:en]Close[:ru]Закрыть'); ?></span></a>

            <h3><?php echo __('[:en]NAVIGATE TO[:ru]ПЕРЕЙТИ'); ?></h3>

            <div class="header-nav__content">

<?php echo qtranxf_generateLanguageSelectCode(‘both’); ?>

                <ul class="header-nav__list">
                    <li><a href="/#home" title="<?php echo __('[:en]Home[:ru]Главная страница'); ?>"><i class="fa fa-home fa-fw"></i> <?php echo __('[:en]Home[:ru]Главная страница'); ?></a></li>
                    <li><a href="/blog" title="<?php echo __('[:en]Blog[:ru]Блог'); ?>"><i class="fa fa-newspaper fa-fw"></i> <?php echo __('[:en]Blog[:ru]Блог'); ?></a></li>
                    <li><a href="/blog/category/affiliate-marketing" title="<?php echo __('[:en]Affiliate Marketing[:ru]Партнерский маркетинг'); ?>"><i class="fa fa-handshake fa-fw"></i> <?php echo __('[:en]Affiliate Marketing[:ru]Партнерский маркетинг'); ?></a></li>
                    <li><a href="/blog/category/events" title="<?php echo __('[:en]Events[:ru]События'); ?>"><i class="fa fa-calendar-alt fa-fw"></i> <?php echo __('[:en]Events[:ru]События'); ?></a></li>
                    <li><a href="/blog/category/news" title="<?php echo __('[:en]News[:ru]Новости'); ?>"><i class="fa fa-file-alt fa-fw"></i> <?php echo __('[:en]News[:ru]Новости'); ?></a></li>
                    <li><a href="/blog/category/offers-promotions" title="<?php echo __('[:en]Offers & Promotions[:ru]Предложения и акции'); ?>"><i class="fa fa-star fa-fw"></i> <?php echo __('[:en]Offers & Promotions[:ru]Предложения и акции'); ?></a></li>
                    <li><a href="/blog/category/online-advertising" title="<?php echo __('[:en]Online Advertising[:ru]Он-лайн реклама'); ?>"><i class="fa fa-arrows-alt fa-fw"></i> <?php echo __('[:en]Online Advertising[:ru]Он-лайн реклама'); ?></a></li>
                    <li><a href="/blog/category/seo" title="<?php echo __('[:en]SEO[:ru]Поисковая оптимизация'); ?>"><i class="fa fa-search fa-fw"></i> <?php echo __('[:en]SEO[:ru]Поисковая оптимизация'); ?></a></li>
                    <li><a href="/blog/category/social-media" title="<?php echo __('[:en]Social Media[:ru]Социальные медиа'); ?>"><i class="fa fa-share-square fa-fw"></i> <?php echo __('[:en]Social Media[:ru]Социальные медиа'); ?></a></li>
                    <li><a href="/blog/category/webmaster-guides" title="<?php echo __('[:en]Webmaster Guides[:ru]Руководства для веб-мастеров'); ?>"><i class="fa fa-book fa-fw"></i> <?php echo __('[:en]Webmaster Guides[:ru]Руководства для веб-мастеров'); ?></a></li>

                    <li><a href="/signup" title="<?php echo __('[:en]Signup Now[:ru]Регистрация'); ?>" style="color:#532B72;"><i
                                    class="fa fa-user-plus fa-fw" style="text-shadow: none !important;"></i> <?php echo __('[:en]Signup Now[:ru]Регистрация'); ?></a></li>
                    <li><a href="/faq" title="<?php echo __('[:en]FAQ[:ru]Часто задаваемые вопросы'); ?>"><i class="fa fa-question-circle fa-fw"></i> <?php echo __('[:en]FAQ[:ru]Часто задаваемые вопросы'); ?>
                        </a></li>
                    <li><a href="javascript:void(Tawk_API.toggle())" title="<?php echo __('[:en]Contact Us[:ru]Связаться с нами'); ?>"><i
                                    class="fa fa-envelope fa-fw"></i> <?php echo __('[:en]Contact Us[:ru]Связаться с нами'); ?></a></li>
                </ul>

<div class="addthis_inline_follow_toolbox addthisfloats"></div>

            </div> <!-- end header-nav__content -->

        </nav> <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-icon"></span>
        </a>

	</header><!-- .site-header -->
