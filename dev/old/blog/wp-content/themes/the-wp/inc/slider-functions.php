<?php
if ( ! function_exists( 'the_wp_slider' ) ) :
/**
 * display featured post slider
 */

function the_wp_slider() { ?>
	<div class="slider-wrap <?php
    	if ( get_theme_mod( 'slider_layout' , "fullscreen" ) == "fullscreen" ) echo "fullsize-enabled";
		else if ( get_theme_mod( 'slider_layout' , "widescreen" ) == "widescreen" ) echo "widescreen-enabled";?>">
		<div class="slider-cycle">
			<?php
			for( $i = 1; $i <= 4; $i++ ) {
				$the_wp_slider_title = get_theme_mod( 'slider_title'.$i , __('Just write.', 'the-wp') );
				$the_wp_slider_text = get_theme_mod( 'slider_desc'.$i , 'Morbi tempus porta nunc pharetra quisque ligula imperdiet posuere vitae felis proin sagittis leo ac tellus blandit sollicitudin quisque vitae placerat.' );
				$the_wp_slider_image = get_theme_mod( 'slider_image'.$i , CEEWP_THEMEURI . "/images/slider/slider$i.jpg" );
				$the_wp_slider_link = get_theme_mod( 'slider_link'.$i , '#' );
				$the_wp_slider_button = get_theme_mod( 'slider_button'.$i , __('Read more...', 'the-wp') );
				$the_wp_slider_button_color = get_theme_mod( 'slider_button_color'.$i , 0 );
				
				if( !empty( $the_wp_slider_image ) ) {
					if ( $i == 1 ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
					?>
					<section id="featured-slider" class="<?php echo $classes; ?>">
						<figure class="slider-image-wrap">
                        	<a title="<?php echo esc_attr( $the_wp_slider_title ); ?>" href="<?php echo esc_url( $the_wp_slider_link ); ?>">
							<img alt="<?php echo esc_attr( $the_wp_slider_title ); ?>" src="<?php echo esc_url( $the_wp_slider_image ); ?>">
                            </a>
					    </figure>
					    <?php if( !empty( $the_wp_slider_title ) || !empty( $the_wp_slider_text ) ) { ?>
						    <article id="slider-text-box">
					    		<div class="inner-wrap">
						    		<div class="slider-text-wrap">
						    			<?php if( !empty( $the_wp_slider_title )  ) { ?>
							     			<span class="slider-title clearfix"><a class="rippler rippler-inverse" title="<?php echo esc_attr( $the_wp_slider_title ); ?>" href="<?php echo esc_url( $the_wp_slider_link ); ?>"><?php echo esc_html( $the_wp_slider_title ); ?></a></span>
							     		<?php } ?>
							     		<?php if( !empty( $the_wp_slider_text )  ) { ?>
							     			<span class="slider-content"><?php echo esc_html( $the_wp_slider_text );?></span>
							     		<?php } ?>
                                        <?php if( !empty( $the_wp_slider_button )  ) { ?>
							     			<a class="slider-button"
                                            style="background:<?php echo esc_attr( $the_wp_slider_button_color );?>;"
                                            href="<?php echo esc_url( $the_wp_slider_link ); ?>">
												<?php echo esc_html( $the_wp_slider_button ); ?>
                                            </a>
							     		<?php } ?>
							     	</div>
							    </div>
							</article>
						<?php } ?>
					</section><!-- .featured-slider -->
				<?php
				}
			}
			?>
		</div>
        
        <!-- controllers -->
        <?php if (get_theme_mod( 'slider_controllers' , 1 )): ?>
			<nav id="controllers" class="clearfix"></nav>
		<?php endif; ?>
        
        <!-- prev, next -->
        <?php if (get_theme_mod( 'slider_arrows' , 1 )): ?>
        	<div id="prev-slide"><i class="fa fa-chevron-left"></i></div>
        	<div id="next-slide"><i class="fa fa-chevron-right"></i></div>
        <?php endif; ?>
	</div><!-- .slider-cycle -->
<?php
}
endif;

?>