<?php
$pattern = '%1s <span class="rotate">%2s</span> %3s';
if ($u) $pattern = "<u>$pattern</u>";
if ($i) $pattern = "<i>$pattern</i>";
if ($b) $pattern = "<strong>$pattern</strong>";
if ($q) $pattern = "<blockquote>$pattern</blockquote>";

if ( !empty($link)) $pattern = sprintf('<a href="%1s">%2s</a>',esc_url($link),$pattern);

$data = "flip";
if (!empty($data)) $data = 'data-animation="' . esc_attr($animation) . '"';
?>
<div class="widget-text-rotator" style="background-color:<?php echo esc_attr($bgcolor);?>; color:<?php echo esc_attr($color);?>;">
	<div class="rotator" <?php echo $data;?> style="font-size:<?php echo esc_attr($fontsize);?>px;">
    	<?php echo sprintf($pattern, esc_attr( $before ), esc_attr( $rotate ), esc_attr( $after ) ); ?>
    </div>
    <div class="clear"></div>
</div>