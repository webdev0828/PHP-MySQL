<?php
$top_class = the_wp_widget_border_class( $border, 0, 'topborder-');
$bottom_class = the_wp_widget_border_class( $border, 1, 'bottomborder-');
?>

<div class="cta-widget-wrap
<?php if ($parallax) echo "parallax-widget"; ?> 
<?php echo sanitize_html_class( $top_class ); ?>"
style="background-color:<?php echo esc_attr($widget_bgcolor); ?>;background-image:url(<?php echo esc_url($bgimage); ?>);">
	<div class="cta-widget-box <?php echo sanitize_html_class( $bottom_class ); ?> cta-<?php echo sanitize_html_class( $image_align ); ?>">
    	<?php if ( !empty( $image ) and !empty( $url ) ) { ?>
    	<div class="cta-widget-image">
        	<a href="<?php echo esc_url( $url ); ?>">
        	<img src="<?php echo esc_url( $image ); ?>" alt="" />
            </a>
        </div>
    	<?php } elseif ( !empty( $image ) ) { ?>
    	<div class="cta-widget-image">
        	<img src="<?php echo esc_url( $image ); ?>" alt="" />
        </div>
        <?php } ?>
        
		<div class="cta-widget">
        	<?php if ( !empty( $icon ) ) { ?>
				<div class="cta-icon">
				<i style="color:<?php echo esc_attr($icon_color); ?>;" class="fa fa-5x <?php echo sanitize_html_class( $icon ); ?>"></i>
                </div>
			<?php } ?>
			<?php if ( !empty( $headline ) ) { ?>
				<h3 class="cta-headine" style="color:<?php echo esc_attr($headline_color); ?>;"><?php echo do_shortcode( $headline ); ?></h3>
			<?php } ?>
            <?php if ( !empty( $subline ) ) { ?>
				<div class="cta-subline" style="color:<?php echo esc_attr($subline_color); ?>;"><?php echo do_shortcode( $subline ); ?></div>
			<?php } ?>
			<?php if ( !empty( $description ) ) { ?>
				<div class="cta-description" style="color:<?php echo esc_attr($description_color); ?>;"><?php echo do_shortcode( wpautop( $description ) ); ?></div>
			<?php } ?>
			<?php if ( !empty( $url ) ) { ?>
				<a style=" background-color:<?php echo esc_attr($button_bgcolor); ?>;" class="cta-widget-button button button-large border-box" href="<?php echo esc_url( $url ); ?>"><?php echo $button_text; ?></a>
			<?php } ?>
		</div>
        <div class="clear"></div>
	</div>
</div>