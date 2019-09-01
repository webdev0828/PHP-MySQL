<?php
// Return if no icons to show
if ( empty( $buttons ) || !is_array( $buttons ) )
	return;
?>

<?php
if ( !empty( $image ) ) $image = sprintf('background-image:url(%s)', esc_url($image));
?>
<div style="background-color:<?php echo esc_attr($widget_bgcolor); ?>; <?php echo $image;?>"
class="buttons-widget <?php if ($parallax) echo "parallax-widget"; ?> <?php echo 'size-' . esc_attr( $size ); ?>">
	<?php if ( !empty( $title ) && !empty( $description ) ) :?>
    	<div class="title"><?php echo esc_attr( $title ); ?></div>
    	<div class="description"><span class="widget-hr"></span><?php echo esc_attr( $description ); ?></div>
    <?php endif;?>

<div class="buttons-widget-container"><?php
	foreach( $buttons as $key => $button ) :
		$css = '';
		if ( !empty( $button['link'] ) && !empty( $button['text'] ) ) :
			if ( !empty( $button['color'] ) ) 		$css .= sprintf( "color:%1s;", esc_attr( $button['color'] ) );
			if ( !empty( $button['bgcolor'] ) ) {
				$css .= sprintf( "background-color:%1s;", esc_attr( $button['bgcolor'] ) );
				// Generate lighther box shadow color
				if ( $size < 3 ) $css .= sprintf( "box-shadow: inset 0 1px 0 %1s;", the_wp_adjustBrightness( esc_attr($button['bgcolor']), 60) );
				else $css .= sprintf( "box-shadow: inset 0 2px 0 %1s;", the_wp_adjustBrightness( esc_attr($button['bgcolor']), 60) );
			}
			
			
			
			
			?>
            <a class="button-item" href="<?php echo esc_url($button['link']);?>" style=" <?php echo $css;?>">
            	<?php if ( !empty( $button['icon'] ) ): ?>
            		<i class="fa <?php echo sanitize_html_class($button['icon']);?>"></i>
                <?php endif;?>
                <?php echo esc_attr($button['text']);?>
            </a>
			<?php
		endif;
	endforeach; ?>
</div>
<div class="clear"></div>
</div>