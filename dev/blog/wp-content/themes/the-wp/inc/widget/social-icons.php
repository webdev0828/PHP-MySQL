<?php
// Return if no icons to show
if ( empty( $icons ) || !is_array( $icons ) )
	return;
?>

<div class="social-icons-widget <?php echo 'social-icons-' . esc_attr( $size ); ?>" style="background-color:<?php echo esc_attr($bgcolor);?>;">
	<div class="description"><span><span><?php if ( !empty( $description ) ) echo esc_attr( $description );?></span></span></div>
	<?php
	foreach( $icons as $key => $icon ) :
		if ( !empty( $icon['url'] ) && !empty( $icon['icon'] ) ) :
			?><a class="social-icons-icon <?php echo sanitize_html_class( $icon['icon'] ) . '-block'; ?>" href="<?php echo esc_url( $icon['url'] ); ?>" target="_blank">
				<i class="fa <?php echo sanitize_html_class( $icon['icon'] ); ?>"></i>
			</a><?php
		endif;
	endforeach; ?>
    <div class="clear"></div>
</div>