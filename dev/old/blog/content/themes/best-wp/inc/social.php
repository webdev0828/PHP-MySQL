<?php if( ! defined( 'ABSPATH' ) ) exit;

	function best_wp_social_section () { ?>
		
			<div <?php if(get_theme_mod( 'social_media_activate' )){ ?> style="float: none;"<?php } ?> class="fa-icons">
			
				<?php if (get_theme_mod( 'best_wp_facebook' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'best_wp_social_link_type' )) == "_blank"){echo esc_attr(get_theme_mod( 'best_wp_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'best_wp_facebook' )); ?>"><i class="fa fa-facebook-f"></i></a>
				<?php endif; ?>
							
				<?php if (get_theme_mod( 'best_wp_twitter' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'best_wp_social_link_type' ))){echo esc_attr(get_theme_mod( 'best_wp_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'best_wp_twitter' )) ?>"><i class="fa fa-twitter"></i></a>
				<?php endif; ?>
											
				<?php if (get_theme_mod( 'best_wp_google' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'best_wp_social_link_type' ))){echo esc_attr(get_theme_mod( 'best_wp_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'best_wp_google' )); ?>"><i class="fa fa-google-plus"></i></a>
				<?php endif; ?>
				
			</div>
		
<?php }  ?>