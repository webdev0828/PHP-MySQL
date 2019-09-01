<?php
// Return if no icons to show
if ( empty( $icons ) || !is_array( $icons ) )
	return;
?>

<?php
if ( !empty( $image ) ) $image = sprintf('background-image:url(%s)', esc_url($image));
?>
<div style="background-color:<?php echo esc_attr($widget_bgcolor); ?>; <?php echo $image;?>"
class="stats-widget <?php if ($parallax) echo "parallax-widget"; ?> <?php echo 'stats-' . esc_attr( $size ); ?>">
	<?php if ( !empty( $title ) && !empty( $description ) ) :?>
    	<div class="title"><?php echo esc_attr( $title ); ?></div>
    	<div class="description"><span class="widget-hr"></span><?php echo esc_attr( $description ); ?></div>
    <?php endif;?>

<div class="stats-widget-container"><?php
	foreach( $icons as $key => $icon ) :
		if ( !empty( $icon['number'] ) && !empty( $icon['icon'] ) ) :
			$color = '';
			if ( !empty( $icon['color'] ) ) $color = 'color:' . esc_attr( $icon['color'] );
			?>
        	<div class="stat-item">
        	<i style=" <?php echo $color;?> " class="fa fa-<?php echo esc_attr( $size ); ?> <?php echo sanitize_html_class( $icon['icon'] ); ?>"></i>
            <div class="number"><?php echo esc_attr( $icon['number'] ); ?></div>
            <div class="milestone"><?php echo esc_attr( $icon['description'] ); ?></div>
			</div>
			<?php
		endif;
	endforeach; ?>
</div>
<div class="clear"></div>
</div>