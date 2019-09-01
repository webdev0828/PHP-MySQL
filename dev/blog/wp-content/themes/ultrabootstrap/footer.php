<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ultrabootstrap
 */

?>

		<!-- Tab to top scrolling -->
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner">
  			<i class="fa fa-2x fa-angle-up"></i>
    		</span>
    	</div> 
		<section class="footers">
		<div class="container footers">
        <div class="row">
            <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php dynamic_sidebar( 'footer-2' ); ?>
            <?php dynamic_sidebar( 'footer-3' ); ?>
            <?php dynamic_sidebar( 'footer-4' ); ?>
        </div>
    </div>
		</section>
		<footer>
		<div class="container">

				<?php 
                    $show_social_in_footer = get_theme_mod('socialicon_display' );
                    {?>   
			        <div class="pull-left">
				            <ul class="list-inline social">
	                            <?php 
	                            $facebook =  esc_url(get_theme_mod ('facebook_textbox', 'https://facebook.com/PhantomThemes'));
	                            $twitter = esc_url(get_theme_mod('twitter_textbox','https://twitter.com/PhantomThemes'));
	                            $googleplus = esc_url(get_theme_mod('googleplus_textbox','#'));
	                            $youtube = esc_url(get_theme_mod('youtube_textbox','#'));
	                            $linkedin = esc_url(get_theme_mod('linkedin_textbox','#'));
															$pinterest = esc_url(get_theme_mod('pinterest_textbox','#'));
															$instagram = esc_url(get_theme_mod('instagram_textbox','#'));
	                            if($facebook){?>
	                              <li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
	                            <?php }
	                            if($twitter){?>
	                              <li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
	                            <?php }
	                            if($googleplus) {?>
	                              <li><a href="<?php echo $googleplus;?>"><i class="fa fa-google-plus"></i></a></li>
	                            <?php }
	                            if($youtube){?>
	                              <li><a href="<?php echo $youtube;?>"><i class="fa fa-youtube-play"></i></a></li>
	                            <?php }
	                            if($linkedin){?>
	                              <li><a href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
	                            <?php }
	                            if($pinterest){?>
	                              <li><a href="<?php echo $pinterest;?>"><i class="fa fa-pinterest"></i></a></li>
															<?php }
														  if($instagram){?>
	                              <li><a href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a></li>
	                            <?php }?>
                        	</ul>
					</div>
				<?php }?> 
				
			    <div class="pull-right">
			        <?php echo __('Theme Ultrabootstrap by','ultrabootstrap'); ?> <a href="https://phantomthemes.com"><?php echo __('Phantom Themes','ultrabootstrap'); ?></a>
			      </div>
			    </div>

		</footer>

	
		
		<?php wp_footer(); ?>
	</body>
</html>