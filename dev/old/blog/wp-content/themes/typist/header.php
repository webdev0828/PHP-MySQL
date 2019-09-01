<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>	
	<?php wp_head(); ?>
        <link rel="stylesheet" href="https://sublimerevenue.com/css/vendor.css">
        <link rel="stylesheet" href="https://sublimerevenue.com/css/main.css">
        <link rel="stylesheet" href="https://sublimerevenue.com/css/style.css">
        <script src="https://sublimerevenue.com/js/modernizr.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123261208-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123261208-2');
</script>
</head>

<body id="<?php echo esc_attr(get_theme_mod('typist_blogscheme', 'cherry')); ?>" <?php body_class(); ?> style="font-size:1rem;" >

<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-jump">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

    <div class="hide">
        <p><a href="#content"><?php _e( 'Skip to content', 'typist' ); ?></a></p>
    </div>
    
    <div class="tlo">
    
        <div id="headline">
			<?php if ( has_nav_menu( 'primary' ) ) { ?>         
                <nav id="menuline" class="main-navigation menubox" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav>       
            <?php }; ?> 
                   
            <div class="toggles">   

			<?php if ( has_nav_menu( 'primary' ) ) { ?>                           
                <div class="menu-toggle">
                    <a href="javascript:toggleByClass('menubox');"><span class="fa icons fa-bars"></span></a>
                </div> 
            <?php }; ?> 
                
                <div class="socialbox">  
                
				<?php
                /*Social icons*/
                
                if (get_theme_mod('typist_social_facebook')!='') {
                echo '<a href="'.esc_url(get_theme_mod('typist_social_facebook')).'"><span class="fa icons fa-facebook-official"></span></a>';};
                
                if (get_theme_mod('typist_social_instagram')!='') {
                echo '<a href="'.esc_url(get_theme_mod('typist_social_instagram')).'"><span class="fa icons fa-instagram"></span></a>';};
                
                if (get_theme_mod('typist_social_twitter')!='') {
                echo '<a href="'.esc_url(get_theme_mod('typist_social_twitter')).'"><span class="fa icons fa-twitter"></span></a>';}
                
                ?>
            
                </div>          
            </div>             

        </div><!--headline-->
         
        <div id="logo"> 

            <a href="/"><img src="/blog/wp-content/uploads/2018/10/logo_big.png" alt="Sublime Revenue - Up To 80% Revenue Share Network"></a>

        </div>

<header class="s-header">

    <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

        <h3>Navigate to</h3>

        <div class="header-nav__content">

<?php echo qtranxf_generateLanguageSelectCode(‘both’); ?>
<!--
Or use the _REQUEST URL + /en or /ru qtranxs-lang-switch-wrap class

                            <ul class="header-nav__social">
                                    <li>
                        <a href="#" onclick="document.getElementById('idev_language').value = 'english'; document.getElementById('language_form').submit(); return false;"><img src="/images/lang_flags/English.png" alt="English" class="lang_flag">
                            <span>English</span></a>
                    </li>
                                    <li>
                        <a href="#" onclick="document.getElementById('idev_language').value = 'russian'; document.getElementById('language_form').submit(); return false;"><img src="/images/lang_flags/Russian.png" alt="Russian" class="lang_flag">
                            <span>Русский</span></a>
                    </li>
                            </ul>  
-->

            <ul class="header-nav__list">
                <li><a class="smoothscroll" href="#home" title="{$header_indexLink}"><i
                                class="fa fa-home fa-fw"></i> Home</a></li>
                <li><a class="smoothscroll" href="#about" title="{$custom_publishers}"><i
                                class="fa fa-user-circle fa-fw"></i> Publishers</a></li>
                <li><a class="smoothscroll" href="#services" title="{$custom_advertisers}"><i
                                class="fa fa-user-circle-o fa-fw"></i> Advertisers</a></li>
                <li><a class="smoothscroll" href="#works" title="{$custom_statistics}"><i
                                class="fa fa-bar-chart fa-fw"></i> Statistics</a></li>
                <li><a href="/blog" title="{$custom_blog}"><i
                                class="fa fa-newspaper fa-fw"></i> Blog</a></li>

                    <li><a href="/login" title="{$custom_login}"><i class="fa fa-sign-in fa-fw"></i> Login
                        </a></li>

                    <li><a href="/dashboard" title="{$custom_dashboard}"><i
                                    class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>

                    <li><a href="/signup" title="{$header_signupLink}" style="color:#532B72;"><i
                                    class="fa fa-user-plus fa-fw"></i> Sign Up</a></li>

                    <li><a href="/faq" title="{$menu_faq}"><i class="fa fa-question-circle fa-fw"></i> FAQ
                        </a></li>

                    <li><a href="/contact" title="{$header_emailLink}"><i
                                    class="fa fa-envelope fa-fw"></i> Contact</a></li>

                    <li>
                        <a href="/logout" title="{$menu_logout}"><i
                                    class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>

            </ul>

            <ul class="header-nav__social">
                <li>
                    <a target="_blank" href="https://www.facebook.com/sublimerevenue"><i
                                class="fab fa-facebook"></i></a>
                </li>
                <li>
                    <a target="_blank" href="https://vk.com/sublimerevenue"><i class="fab fa-vk"></i></a>
                </li>
                <li>
                    <a target="_blank" href="https://twitter.com/SublimeRevenue"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/sublime_revenue/"><i
                                class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="skype:live:svet0slav?chat"><i class="fab fa-skype"></i></a>
                </li>
                <li>
                    <a href="contact.php"><i class="fa fa-envelope"></i></a>
                </li>
            </ul>

        </div> <!-- end header-nav__content -->

    </nav> <!-- end header-nav -->

    <a class="header-menu-toggle" href="#0">
        <span class="header-menu-icon"></span>
    </a>

</header> <!-- end s-header -->
