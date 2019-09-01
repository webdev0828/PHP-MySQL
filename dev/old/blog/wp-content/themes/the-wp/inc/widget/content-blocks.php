<?php
// Return if no boxes to show
if ( empty( $boxes ) || !is_array( $boxes ) )
	return;

// Get border classes
$top_class = the_wp_widget_border_class( $border, 0, 'topborder-');
$bottom_class = the_wp_widget_border_class( $border, 1, 'bottomborder-');

// Get total columns and set column counter
$columns = ( intval( $columns ) >= 1 && intval( $columns ) <= 5 ) ? intval( $columns ) : 3;
$column = 1;

// Get an array of page ids for custom WP Query
$page_ids = array();
foreach ( $boxes as $key => $box ) {
	$box['page'] = ( isset( $box['page'] ) ) ? intval( $box['page'] ) : '';
	if ( !empty( $box['page'] ) )
		$page_ids[] = $box['page'];
}

// Style-3 exceptions: doesnt work great with icons of 'None' style. So revert to Style-2 for this scenario.
	//if ( $icon_style == 'none' && $style == 'style3' ) $style = 'style2';
// Style-3 exceptions: doesnt work great with images. So revert to Style-2 for this scenario.
	//if ( $image && $style == 'style3' ) $style = 'style2';

// Create a custom WP Query
$content_blocks_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $page_ids, 'posts_per_page' => -1 ) );
//
if ( !empty( $bgimage ) ) $bgimage = sprintf('background-image:url(%s)', esc_url($bgimage));
?>

<div class="content-blocks-widget-wrap <?php if ($parallax) echo "parallax-widget"; ?> <?php echo sanitize_html_class( $top_class ); ?>"
style="background-color:<?php echo esc_attr($widget_bgcolor); ?>;<?php echo $bgimage;?>">
	<?php 
	// Title & Description
	if ( esc_attr($title) != "" or esc_attr($desc) != ""  ):
	?>
    <div class="content-blocks-header">
   	  <div class="title"><?php echo esc_attr ($title);?></div>
      <div class="description"><span class="widget-hr"></span><?php echo esc_attr ($desc);?></div>
    </div>
    <?php endif; ?>
	<div class="content-blocks-widget-box <?php echo sanitize_html_class( $bottom_class ); ?>">
	  <div class="content-blocks-widget <?php echo sanitize_html_class( 'content-blocks-widget-' . $style ); ?>">
      		<?php $flexbox = true;?>
			<?php foreach ( $boxes as $key => $box ) : ?>
            <?php if ( $flexbox ) {
				echo '<div class="flexbox">';
				$flexbox = false;
			}
			// Box BG Color
			$bgcolorCSS = '';
			$bgcolor = !empty($box['bgcolor']) ? $box['bgcolor'] : '';
			if ( !empty($box['bgcolor']) ) {
				$bgcolor = sanitize_hex_color($box['bgcolor']);
				// Style 1-4
				if ( $style == 1 || $style == 4 ) {
					$bgcolorCSS = sprintf("background-color:%1s;", $bgcolor);
				// Style 2-3
				} else {
					$bgcolor_lighter = the_wp_adjustBrightness($bgcolor, 50);
					$bgcolorCSS = sprintf("background: %1s linear-gradient(%2s, %3s) repeat scroll 0 0;", $bgcolor, $bgcolor, $bgcolor_lighter);
					$bgcolorCSS.= sprintf("border: 1px solid %1s;", $bgcolor_lighter);
				}
			}
			// Icon Color
			$icolorCSS = '';
			$icolor = !empty($box['icon_color']) ? $box['icon_color'] : '';
			if ( !empty($box['icon_color']) ) {
				$icolorCSS = sprintf("border-color:%1s;", $icolor);
				$icolorCSS.= sprintf("color:%1s;", $icolor);
			}
			// Title Color
			$title_colorCSS = '';
			$titlecolor = !empty($box['title_color']) ? $box['title_color'] : '';
			if ( !empty($box['title_color']) ) {
				$title_colorCSS = sprintf("color:%1s;", $titlecolor);
			}
			// Title Color
			$text_colorCSS = '';
			$textcolor = !empty($box['text_color']) ? $box['text_color'] : '';
			if ( !empty($box['text_color']) ) {
				$text_colorCSS = sprintf("color:%1s;", $textcolor);
			}
			?>
				<div style=" <?php echo $bgcolorCSS;?>"
                class="content-block-column <?php echo 'column-1-' . $columns; ?> <?php echo sanitize_html_class( 'content-block-' . $style ); ?>">

					<?php $box['page'] = ( isset( $box['page'] ) ) ? intval( $box['page'] ) : ''; ?>
					<?php if ( !empty( $box['page'] ) ) :

						global $post;
						$has_image = $has_icon = false;

						foreach( $content_blocks_query->posts as $post ) :
							if ( intval( $box['page'] ) == $post->ID ) :

								setup_postdata( $post );
								if ( $image && has_post_thumbnail() )
									$has_image = true;
								
								if ( !$image && !empty( $box['icon'] ) )
									$has_icon = true;
									
								if ( $image && !empty( $box['icon'] ) )
									$has_icon = true;
									
								// Link
								$linktag = '';
								$linktagend = '';
								if ( !empty($box['linktext']) && !empty($box['url']) ) {
									$linktag = '<a style="' . $title_colorCSS . '" href="' . esc_url( $box['url'] ) . ' ">';
									$linktagend = '</a>';
								} else if ( !empty( $excerpt ) and !empty( $box['url'] ) ) {
									$linktag = ( !empty( $box['url'] ) ) ? '<a style="' . $title_colorCSS . '" href="' . esc_url( $box['url'] ) . ' ">' : '';
									$linktagend = ( !empty( $box['url'] ) ) ? '</a>' : '';
								} else if ( !empty($box['url']) ) {
									$linktag = '<a style="' . $title_colorCSS . '" href="' . esc_url( $box['url'] ) . ' ">';
									$linktagend = '</a>';
								} else {
									$linktag = '<a style="' . $title_colorCSS . '" href="' . get_permalink() . '">';
									$linktagend = '</a>';
								} ?>

								<?php
								$block_class = ( !$has_image && !$has_icon ) ? 'no-highlight' : ( ( $style == 'style2' ) ? 'highlight-typo' : '' );
								$block_class = ( $style == 'style3' ) ? 'highlight-typo' : $block_class; ?>
								<div class="content-block <?php echo $block_class; ?>">

									<?php
									if ( $has_image ) : ?>
										<div class="content-block-visual content-block-image <?php //echo 'icon-style-'.esc_attr($icon_style);?>">
											<?php
											echo $linktag;
												if ( $style == 'style4' ) {
													switch ( $columns ) {
														case 1:
															$image_col_width = 2;
															$thumb_size = array(600,400);
															break;
														case 2:
															$image_col_width = 4;
															$thumb_size = array(300,200);
															break;
														default:
															$image_col_width = 5;
															$thumb_size = array(300,200);
															break;
													}
												} else {
													$image_col_width = $columns;
												}												
												//the_wp_post_thumbnail( 'content-block-img', 'column-1-' . $image_col_width );
												$custom_clas = 'image-'.'column-1-' . $image_col_width;
												the_post_thumbnail( array(128,128), array( 'class' => "content-block-img $custom_clas" ) );
											echo $linktagend;
											?>
										</div><?php

									elseif ( $has_icon ):
										$contrast_class = ( 'none' == $icon_style ) ? '' : ' contrast-typo ';
										$contrast_class = ( 'style3' == $style ) ? ' enforce-typo ' : $contrast_class; ?>
										<div style=" <?php echo $icolorCSS;?>"
                                        class="content-block-visual content-block-icon <?php echo 'icon-style-' . esc_attr( $icon_style ); echo $contrast_class; ?>">
											<?php echo $linktag; ?>
												<i class="fa <?php echo sanitize_html_class( $box['icon'] ); ?>" style=" <?php echo $icolorCSS;?>"></i>
											<?php echo $linktagend; ?>
										</div><?php
									endif; ?>

									<div class="content-block-content<?php
										if ( $has_image ) echo ' content-block-content-hasimage';
										elseif ( $has_icon ) echo ' content-block-content-hasicon';
										else echo ' no-visual';
										?>">
										<h4><?php 
											echo $linktag;
												if ( !empty($box['title']) ) {
													echo $box['title'];
												} else {
													the_title();
												}
											echo $linktagend;
										?></h4>
										<div class="content-block-text" style=" <?php echo $text_colorCSS;?>"><?php
											if ( !empty( $box['text'] ) ) {
												echo $box['text'];
												if ( $linktag && !empty( $box['linktext'] ) )
													echo '
													<div class="clearfix"></div>
													<div class="readmore">' . $linktag . $box['linktext'] . $linktagend . '</div>';
											} else if ( empty( $excerpt ) ) {
												the_content();
												if ( $linktag && !empty( $box['linktext'] ) )
													echo '
													<div class="clearfix"></div>
													<div class="readmore">' . $linktag . $box['linktext'] . $linktagend . '</div>';
											} else {
												the_excerpt();
												if ( $linktag && !empty( $box['link'] ) )
													echo '
													<div class="clearfix"></div>
													<div class="readmore">' . $linktag . $box['linktext'] . $linktagend . '</div>';
											}
										?></div>
									</div>

								</div><?php

							break;
							endif;
						endforeach;

						wp_reset_postdata(); ?>

					<?php endif; ?>

				</div>
				<?php
                $column++;
				if ( $column > $columns ) {
					$column = 1;
					echo '
					<div class="clearfix"></div>
					</div> <!-- .flexbox -->';
					$flexbox = true;
				}
				
				?>
			<?php endforeach; ?>
			<div class="clearfix"></div>
		</div>
        <div class="clear"></div>
	</div>
</div>