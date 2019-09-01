<?php
// Return if no height
if ( empty( $height ) )
	return;
?>


<div style="background-color:<?php echo esc_attr($bg_color);?>; height:<?php echo esc_attr($height);?>px;" class="space-widget">
	<?php if ( ! empty( $description ) ) :?>
    	<div class="description"><?php echo do_shortcode( wpautop( $description ) ); ?></div>
    <?php endif;?>
<div class="clear"></div>
</div>