<?php
//  Typography
$elements = array(
			'site_title'		=>		array( 'label' => __("Site Title", 'the-wp'), 'default' => 42 ),
			'tagline'			=>		array( 'label' => __("Tagline", 'the-wp'), 'default' => 14 ),
			'main_menu'			=>		array( 'label' => __("Main menu", 'the-wp'), 'default' => 14 ),
			);
$the_wp_typography_array = array();		
foreach ( $elements as $id => $val ) {
	$the_wp_typography_array ["sep_typo_$id"] = array(
								'label' => $val['label'],
                                'type' => 'sep-title',
                            );
	$the_wp_typography_array ["font_size_$id"] = array(
							'label' => __('Font Size', 'the-wp'),
							'type' => 'number',
							'default' => $val['default'],
							'sanitize_callback' => 'absint',
						);
}

// Slider Array
$the_wp_slider_array = array(
                            'enable_slider' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable this section', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'slider_quantity' => array(
                                'type' => 'disabled-select',
                                'label' => __('Quantity', 'the-wp'),
                                'default' => 4,
								'choices' => the_wp_qty_array(),
                                'sanitize_callback' => 'absint',
                            ),
							
							// Navigation
							'sep_navigationt' => array(
								'label' => __("Navigation", 'the-wp'),
                                'type' => 'sep-title',
                            ),
							'slider_controllers' => array(
                                'type' => 'checkbox',
                                'label' => __('Controllers', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'slider_arrows' => array(
                                'type' => 'checkbox',
                                'label' => __('Arrows', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							// Alignment
							'sep_slider_layout' => array(
								'label' => __("Layout", 'the-wp'),
                                'type' => 'sep-title',
                            ),

							// Layout
							'slider_layout' => array(
                                'type' => 'select',
                                'label' => __('Layout', 'the-wp'),
                                'default' => "fullscreen",
								'choices' => array(
												'default' => __('Default', 'the-wp'),
												'widescreen' => __('Widescreen', 'the-wp'),
												'fullscreen' => __('Fullscreen', 'the-wp'),
												),
                                'sanitize_callback' => 'esc_attr',
                            ),
							// Stle
							'sep_slider_style' => array(
								'label' => __("Style", 'the-wp'),
                                'type' => 'sep-title',
                            ),
                            'slider_no_style' => array(
                                'type' => 'checkbox',
                                'label' => __('Clear formatting', 'the-wp'),
                                'default' => 0,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							);
for ($i=1;$i<=4;$i++) {
	$the_wp_slider_item = array();
	$the_wp_slider_item = array(							
							'sep'.$i => array(
								'label' => __("Slider", 'the-wp') . "#$i",
                                'type' => 'sep-title',
                            ),
							'slider_image'.$i => array(
								'default' => CEEWP_THEMEURI . "/images/slider/slider$i.jpg",
                                'type' => 'image',
                                'label' => sprintf( "%1s (%2s %3s)", __('Image', 'the-wp'), __('Suggested image dimensions:', 'the-wp'), '1280 x 500' ),
                                'sanitize_callback' => 'esc_url_raw',
                            ),
                            'slider_title'.$i => array(
                                'type' => 'text',
                                'label' => __('Title', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
								'default' => __('Just write.', 'the-wp'),
                            ),
							'slider_desc'.$i => array(
                                'type' => 'textarea',
                                'label' => __('Description', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
								'default' => 'Morbi tempus porta nunc pharetra quisque ligula imperdiet posuere vitae felis proin sagittis leo ac tellus blandit sollicitudin quisque vitae placerat.',
                            ),
							'slider_alignment'.$i => array(
                                'type' => 'disabled-select',
                                'label' => __('Alignment', 'the-wp'),
                                'default' => 1,
								'choices' => array(
												'1' => __('Align center', 'the-wp'),
												'2' => __('Align left', 'the-wp'),
												'3' => __('Align right', 'the-wp'),
												),
                                'sanitize_callback' => 'absint',
                            ),
							'slider_link'.$i => array(
                                'type' => 'text',
                                'label' => __('Link', 'the-wp'),
                                'sanitize_callback' => 'esc_url',
                            ),
							'slider_button'.$i => array(
                                'type' => 'text',
                                'label' => __('Button', 'the-wp'),
								'default' => __('Read more...', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
                            ),
							'slider_button_color'.$i => array(
								'default' => "",
                                'type' => 'color',
                                'label' => __('Button Color', 'the-wp'),
                                'sanitize_callback' => 'sanitize_hex_color',
                            )
							
						);
	$the_wp_slider_array = array_merge($the_wp_slider_array, $the_wp_slider_item);
}


// Social Media Section Array
$the_wp_social_array = array(
							'sep_social'.$i => array(
								'label' => __("Show", 'the-wp'),
                                'type' => 'sep-title',
                            ),
                            'social_header' => array(
                                'type' => 'checkbox',
                                'label' => __('Top', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
                            'social_footer' => array(
                                'type' => 'checkbox',
                                'label' => __('Bottom', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'social_quantity' => array(
                                'type' => 'disabled-select',
                                'label' => __('Number of links to show:', 'the-wp'),
                                'default' => 4,
								'choices' => the_wp_qty_array(),
                                'sanitize_callback' => 'absint',
                            ));
// FA Icons to choices array
$fa_choices = array();
foreach ( the_wp_fa_array () as $fa ) {
	$fa_choices = array_merge($fa_choices, array( "fa-$fa" => "$fa" ) );
}
$fa_choices_with_none = array_merge( array( 0 => __("None", 'the-wp')), $fa_choices );

//
for ( $i=1; $i<=4; $i++ ) {
	$the_wp_social_item = array();
	$the_wp_social_item = array(							
							'sep_services'.$i => array(
								'label' => sprintf("%s #$i",__("Icon", 'the-wp')),
                                'type' => 'sep-title',
                            ),
							'enable_social'.$i => array(
                                'type' => 'checkbox',
                                'label' => __('Activate', 'the-wp'),
                                'default' => 0,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
                            'social_title'.$i => array(
								'default' => "Lorem ipsum",
                                'type' => 'text',
                                'label' => __('Title', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
                            ),
							'social_link'.$i => array(
								'default' => esc_url( home_url( '/' ) ),
                                'type' => 'text',
                                'label' => __('Web Address', 'the-wp'),
                                'sanitize_callback' => 'esc_url',
                            ),
							'social_target'.$i => array(
                                'type' => 'checkbox',
                                'label' => __('Open link in a new window/tab', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'social_icon'.$i => array(
								'default' => "fa-facebook",
                                'type' => 'select',
                                'label' => __("Icon", 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
								'choices' => $fa_choices
                            ),
							'social_icon_size'.$i => array(
                            	'type' => 'select',
                            	'label' => __('Size', 'the-wp'),
                            	'choices' => array(
									'1' => __('1x', 'the-wp'),
									'2' => __('2x', 'the-wp'),
									'3' => __('3x', 'the-wp'),
									'4' => __('4x', 'the-wp'),
									'5' => __('5x', 'the-wp'),
                            	),
                            	'default' => 1,
                            
                        	),
							'social_color'.$i => array(
								'default' => "#06F",
                                'type' => 'color',
                                'label' => __('Color', 'the-wp'),
                                'sanitize_callback' => 'sanitize_hex_color',
                            )
							);
	$the_wp_social_array = array_merge($the_wp_social_array, $the_wp_social_item);
}

// options array
$options = array(
	'capability' => 10,
	'type' => 'theme_mod',
	'panels' => array(
		'the-wp' => array(
			'priority'       => 9,
			'title'          => __('The WP Options', 'the-wp'),
			'description'    => '',
			'sections' => array(
				'header' => array(
					'title' => __('Header', 'the-wp'),
					'fields' => array(
						'logo' => array(
							'default' => CEEWP_THEMEURI . '/images/logo.png',
							'type' => 'image',
							'label' => sprintf( "%1s (%2s %3s)", __('Logo', 'the-wp'), __('Suggested image dimensions:', 'the-wp'), '300 x 100' ),
							'sanitize_callback' => 'esc_url_raw',
						),
						'header_icon' => array(
								'default' => "fa-wordpress",
                                'type' => 'select',
                                'label' => sprintf( "%1s (%2s)", __('Icon', 'the-wp'), __('Remove Image', 'the-wp') ),
                                'sanitize_callback' => 'esc_attr',
								'choices' => $fa_choices_with_none
                        ),
						'sep_header_bgimage' => array(
							'label' => __("Background Image", 'the-wp'),
							'type' => 'sep-title',
						),
						'header_bg_size' => array(
							'type' => 'select',
							'label' => __('Background Size', 'the-wp'),
							'choices' => array(
												'contain' => __('Contain', 'the-wp'),
												'cover' => __('Cover', 'the-wp'),
												'full' => __('100% x 100%', 'the-wp'),
												'auto' => __('Auto', 'the-wp')
							),
							'default' => 'contain',
						),
						'header_bg_repeat' => array(
							'type' => 'select',
							'label' => __('Background Repeat', 'the-wp'),
							'choices' => array(
												'y' => __('Tile Vertically', 'the-wp'),
												'x' => __('Tile Horizontally', 'the-wp'),
												'xy' => __('Tile', 'the-wp'),
												'no' => __('No Repeat', 'the-wp')
							),
							'default' => 'no',
						),
						'header_bg_pos_x' => array(
							'type' => 'select',
							'label' => sprintf( "%1s &rarr; %2s", __('Background Position', 'the-wp'), __('X', 'the-wp') ),
							'choices' => array(
												//'top' => __('Top', 'the-wp'),
												//'bottom' => __('Bottom', 'the-wp'),
												'center' => __('Center', 'the-wp'),
												'left' => __('Left', 'the-wp'),
												'right' => __('Right', 'the-wp')
							),
							'default' => 'center',
						),
						'header_bg_pos_y' => array(
							'type' => 'select',
							'label' => sprintf( "%1s &rarr; %2s", __('Background Position', 'the-wp'), __('Y', 'the-wp') ),
							'choices' => array(
												'top' => __('Top', 'the-wp'),
												'bottom' => __('Bottom', 'the-wp'),
												'center' => __('Center', 'the-wp'),
												//'left' => __('Left', 'the-wp'),
												//'right' => __('Right', 'the-wp')
							),
							'default' => 'top',
						),
						'header_bg' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Header', 'the-wp'), __('Background Color', 'the-wp') ),
							'default' => '',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'sep_header_layout' => array(
							'label' => __("Layout", 'the-wp'),
							'type' => 'sep-title',
						),
						'header_size' => array(
							'label' => sprintf( "%1s &rarr; %2s - %3s", __('Header', 'the-wp'), __('Height', 'the-wp'), sprintf( __('Default: %s', 'the-wp'), 0) ),
							'type' => 'number',
							'default' => 0,
							'sanitize_callback' => 'absint',
						),
						'header_padding_top' => array(
							'label' => sprintf( "%1s (%3s)",__('Vertical space', 'the-wp'), sprintf( __('Default: %s', 'the-wp'), 0) ),
							'type' => 'number',
							'default' => 5,
							'sanitize_callback' => 'absint',
						),
						'sep_contact_info' => array(
							'label' => __("Contact Info", 'the-wp'),
							'type' => 'sep-title',
						),
						'address_header' => array(
                                'type' => 'checkbox',
                                'label' => __('Top', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
						'address_footer' => array(
							'type' => 'checkbox',
							'label' => __('Bottom', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'address' => array(
							'type' => 'text',
							'label' => __('Address', 'the-wp'),
							'default' => '77 Massachusetts Ave, Cambridge, MA, USA',
							'sanitize_callback' => 'esc_attr',
						),
						'address_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Address', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'address_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Address', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						),
						'mail' => array(
							'type' => 'text',
							'label' => __('Email', 'the-wp'),
							'default' => 'info@example.com',
							'sanitize_callback' => 'esc_attr',
						),
						'mail_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Email', 'the-wp'), __('Color', 'the-wp') ),
							'label' => __('Color', 'the-wp'),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'mail_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Email', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						),
						'phone' => array(
							'type' => 'text',
							'label' => __('Phone', 'the-wp'),
							'default' => '+1 617-253-1000',
							'sanitize_callback' => 'esc_attr',
						),
						'phone_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Phone', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'phone_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Phone', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						),
						'hours' => array(
							'type' => 'text',
							'label' => __('Hours', 'the-wp'),
							'default' => sprintf( "%1s - %2s: 9:00 - 18:30", __('Monday', 'the-wp'), __('Friday', 'the-wp') ),
							'sanitize_callback' => 'esc_attr',
						),
						'hours_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Hours', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'hours_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Hours', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						)				
						
					),
				),
				'layout' => array(
					'title' => __('Layout', 'the-wp'),
					'fields' => array(
						'layout' => array(
							'label' => __('Layout', 'the-wp'),
							'type' => 'radio',
							'default' => 'hybrid',
							'choices'  => array(
											'fixed'			=> __('Fixed Layout', 'the-wp'),
											'hybrid'		=>  sprintf( "%1s &amp; %2s(%3s)", __('Fixed Layout', 'the-wp'), __('Full Size', 'the-wp'), __('Header', 'the-wp') ),
											'fullsize'		=> __('Full Size', 'the-wp'),
										),
							'sanitize_callback' => 'esc_attr',
						),
						'layout_size' => array(
							'label' => sprintf( "%1s (%2s) (%3s)", __('Site Size', 'the-wp'), __('Fixed Layout', 'the-wp'), sprintf( __('Default: %s', 'the-wp'), 1200) ),
							'type' => 'number',
							'default' => 1200,
							'sanitize_callback' => 'absint',
						),
						'layout_shadow' => array(
							'label' => __("Disable layout drop-shadow", 'the-wp'),
							'type' => 'checkbox',
							'default' => 0,
							'sanitize_callback' => 'the_wp_boolean',
						),
					),
				),
				'typography' => array(
					'title' => __('Typography', 'the-wp'),
					'fields' => $the_wp_typography_array,
				),
				'colors' => array(
					'title' => __('Colors', 'the-wp'),
					'fields' => array(
						'primary_color' => array(
							'type' => 'color',
							'label' => __('Primary Color', 'the-wp'),
							'default' => '#333333',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'title_color' => array(
							'type' => 'color',
							'label' => __('Site Title', 'the-wp'),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'color_scheme' => array(
							'type' => 'disabled-select',
							'label' => __('Base Color Scheme', 'the-wp'),
							'choices' => array(
												'1' => __('Default', 'the-wp'),
												'2' => __('Light', 'the-wp'),
												'3' => __('Blue', 'the-wp'),
												'4' => __('Coffee', 'the-wp'),
												'5' => __('Ectoplasm', 'the-wp'),
												'6' => __('Midnight', 'the-wp'),
												'7' => __('Ocean', 'the-wp'),
												'8' => __('Sunrise', 'the-wp'),
							),
							'default' => 1,
						),
						'sep_layout_color' => array(
							'label' => __("Layout", 'the-wp'),
							'type' => 'sep-title',
						),
						'layout_color' => array(
							'type' => 'color',
							'label' => __('Background color', 'the-wp'),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'layout_color_alpha' => array(
							'type' => 'range',
							'label' => __('Opacity', 'the-wp'),
							'default' => '100',
							'input_attrs' => array(
												'min' => 0,
												'max' => 100,
												'step' => 5,
											  ),
							'sanitize_callback' => 'absint',
						),
						
						
					),
				),
				'general' => array(
					'title' => __('General', 'the-wp'),
					'fields' => array(
						'sep_frontpage' => array(
							'label' => __("Front page displays", 'the-wp'),
							'type' => 'sep-title',
						),
						'frontpage_posts' => array(
							'type' => 'checkbox',
							'label' => __('Your latest posts', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'sep_excerpt' => array(
							'label' => __("Excerpt", 'the-wp'),
							'type' => 'sep-title',
						),
						'excerpt_size' => array(
							'label' => sprintf( "%1s (%2s)", __('Excerpt', 'the-wp'), __('Size', 'the-wp') ),
							'type' => 'number',
							'default' => 55,
							'sanitize_callback' => 'absint',
						),
						'excerpt_more' => array(
							'type' => 'text',
							'label' => __('After excerpt', 'the-wp'),
							'default' => ' [&hellip;]',
							'sanitize_callback' => 'esc_attr',
						),
						'text_readmore' => array(
							'type' => 'text',
							'label' => __('Read more...', 'the-wp'),
							'default' => __('Read more...', 'the-wp'),
							'sanitize_callback' => 'esc_attr',
						),
						'hide_readmore' => array(
							'label' => __('Hide read more', 'the-wp'),
							'type' => 'checkbox',
							'default' => 0,
							'sanitize_callback' => 'the_wp_boolean',
						),
					),
				),
				'main_menu' => array(
					'title' => __('Main menu', 'the-wp'),
					'fields' => array(
						'main_menu_active' => array(
							'type' => 'checkbox',
							'label' => __('Activate', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'main_menu_sticky' => array(
							'type' => 'checkbox',
							'label' => __('Sticky', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'main_menu_icons' => array(
							'type' => 'checkbox',
							'label' => __('Menu icons', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'main_menu_position' => array(
							'type' => 'select',
							'label' => __('Position', 'the-wp'),
							'choices' => array(
												'default' => __('Default', 'the-wp'),
												'top' => __('Top', 'the-wp'),
							),
							'default' => 'default',
						),
						'main_menu_item_margin' => array(
							'label' => sprintf( "%1s (%2s) - %3s", __('Cell padding', 'the-wp'), __('items', 'the-wp'), sprintf( __('Default: %s', 'the-wp'), 0) ),
							'type' => 'number',
							'default' => 0,
							'sanitize_callback' => 'absint',
						),
						'main_menu_bg_color' => array(
							'type' => 'color',
							'label' => __('Background color', 'the-wp'),
							'default' => '#4d4d4d',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'main_menu_bg_color_alpha' => array(
							'type' => 'range',
							'label' => __('Opacity', 'the-wp'),
							'default' => '50',
							'input_attrs' => array(
												'min' => 0,
												'max' => 100,
												'step' => 5,
											  ),
							'sanitize_callback' => 'absint',
						),
						'main_menu_bg_color_hover' => array(
							'type' => 'color',
							'label' => sprintf( "%1s (%2s)", __('Background color', 'the-wp'), __('when you mouse over it', 'the-wp') ),
							'default' => '#06BCF9',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'main_menu_bg_color_active' => array(
							'type' => 'color',
							'label' => sprintf( "%1s (%2s)", __('Background color', 'the-wp'), __('Current Page', 'the-wp') ),
							'default' => '#09F',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'main_menu_bg_color_submenu' => array(
							'type' => 'color',
							'label' => sprintf( "%1s (%2s)", __('Background color', 'the-wp'), __('Submenu', 'the-wp') ),
							'default' => '#4d4d4d',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'main_menu_text_color' => array(
							'type' => 'color',
							'label' => __('Text color', 'the-wp'),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'main_menu_stripe_image' => array(
							'default' => CEEWP_THEMEURI . "/images/bar.png",
                            'type' => 'image',
                            'label' => sprintf( "%1s (%2s %3s)", __('Striped background image', 'the-wp'), __('Suggested image dimensions:', 'the-wp'), '~ x 10' ),
                            'sanitize_callback' => 'esc_url_raw',
                        ),
					),
				),
				'slider' => array(
					'title' => __('Slider', 'the-wp'),
					'fields' => $the_wp_slider_array,
				),
				'social' => array(
					'title' => __('Social', 'the-wp') . ' &amp; ' . __('Links', 'the-wp'),
					'fields' => $the_wp_social_array,
				),
				'display_settings' => array(
					'title' => __('Display Settings', 'the-wp'),
					'fields' => array(
						'show_postdate' => array(
							'type' => 'checkbox',
							'label' => __('Display post date?', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_author' => array(
							'type' => 'checkbox',
							'label' => __('Display item author if available?', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_thumb' => array(
							'type' => 'checkbox',
							'label' => __('Post Thumbnail', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_image_header' => array(
							'type' => 'checkbox',
							'label' => __('Featured Image Header', 'the-wp'),
							'default' => 0,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_tags' => array(
							'type' => 'checkbox',
							'label' => sprintf( "%1s &rarr; %2s", __('Post', 'the-wp'), __('Tags', 'the-wp') ),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_cats' => array(
							'type' => 'checkbox',
							'label' => sprintf( "%1s &rarr; %2s", __('Post', 'the-wp'), __('Categories', 'the-wp') ),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_post_nav' => array(
							'type' => 'checkbox',
							'label' => __('Post navigation', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_search' => array(
							'type' => 'checkbox',
							'label' => __('A search form for your site.', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
					),
				),
				'footer' => array(
					'title' => __('Footer', 'the-wp'),
					'fields' => array(
						'footer_page' => array(
							'type' => 'select',
							'label' => __('Put this page in site footer', 'the-wp'),
							'default' => 0,
							'choices' => the_wp_pages(),
							'sanitize_callback' => 'absint',
                        ),
						'footer_contact_info_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Contact Info', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '#444545',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'footer_menu_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Footer Menu', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'footerlogo' => array(
							'type' => 'image',
							'label' => sprintf( "%1s &rarr; %2s (%3s %4s)", __('Footer', 'the-wp'), __('Logo', 'the-wp'), __('Suggested image dimensions:', 'the-wp'), '100 x 30' ),
							'default' => '',
							'sanitize_callback' => 'esc_url_raw',
						),
						'footerlogo_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s &rarr; %3s", __('Footer', 'the-wp'), __('Logo', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => '',
							'sanitize_callback' => 'esc_url',
						),
						'copyright' => array(
							'type' => 'textarea',
							'label' => sprintf( "%1s &rarr; %2s", __('Footer', 'the-wp'), __('Copyright text', 'the-wp') ),
							'default' => '',
							'sanitize_callback' => 'esc_attr',
						),
					),
				), // end of footerr
				'advanced' => array(
					'title' => __('Advanced Options', 'the-wp'),
					'fields' => array(
						'css' => array(
							'type' => 'textarea',
							'label' => __('Additional CSS', 'the-wp'),
							'default' => '',
							'sanitize_callback' => 'esc_html',
						),
						'reset' => array(
							'type' => 'checkbox',
							'label' => __('Reset all theme settings to default.', 'the-wp'),
							'default' => 0,
							'sanitize_callback' => 'the_wp_reset_all_settings',
						),
					),
				),// end end advanced
				'more' => array(
					'title' => __('More Actions', 'the-wp'),
					'fields' => array(
						'widgets_cart' => array(
							'type' => 'info',
							'label' => '',
							'sanitize_callback' => 'esc_attr',
							'choices' => array('class' => 'the-wp-widgets-cart',),
						),
					),
				),// end of more
			)
		),
	)
);							
/**
 * Reset all settings to default
 * @param  $input entered value
 * @return sanitized output
 *
 */
function the_wp_reset_all_settings( $input ) {
	if ( $input == 1 ) {
		//Remove all set values
		remove_theme_mods();
		return new WP_Error( 'warning', __('Refresh the page to view full effects.', 'the-wp') );
    } else {
        return 1;
    }
}

//
function the_wp_boolean($value) {
    if(is_bool($value)) {
        return $value;
    } else {
        return false;
    }
}

//
function the_wp_breadcrumb_char_choices($value='') {
    $choices = array('1','2','3');

    if( in_array($value, $choices)) {
        return $value;
    } else {
        return '1';
    }
}

//
function the_wp_fa_array () {
// FA Array
$fa_array = array("adjust", "adn", "align-center", "align-justify", "align-left", "align-right", "ambulance", "anchor", "android", "angellist", "angle-double-down", "angle-double-left", "angle-double-right", "angle-double-up", "angle-down", "angle-left", "angle-right", "angle-up", "apple", "archive", "area-chart", "arrow-circle-down", "arrow-circle-left", "arrow-circle-o-down", "arrow-circle-o-left", "arrow-circle-o-right", "arrow-circle-o-up", "arrow-circle-right", "arrow-circle-up", "arrow-down", "arrow-left", "arrow-right", "arrow-up", "arrows", "arrows-alt", "arrows-h", "arrows-v", "asterisk", "at", "automobile", "backward", "ban", "bank", "bar-chart", "bar-chart-o", "barcode", "bars", "bed", "beer", "behance", "behance-square", "bell", "bell-o", "bell-slash", "bell-slash-o", "bicycle", "binoculars", "birthday-cake", "bitbucket", "bitbucket-square", "bitcoin", "bold", "bolt", "bomb", "book", "bookmark", "bookmark-o", "briefcase", "btc", "bug", "building", "building-o", "bullhorn", "bullseye", "bus", "buysellads", "cab", "calculator", "calendar", "calendar-o", "camera", "camera-retro", "car", "caret-down", "caret-left", "caret-right", "caret-square-o-down", "caret-square-o-left", "caret-square-o-right", "caret-square-o-up", "caret-up", "cart-arrow-down", "cart-plus", "cc", "cc-amex", "cc-discover", "cc-mastercard", "cc-paypal", "cc-stripe", "cc-visa", "certificate", "chain", "chain-broken", "check", "check-circle", "check-circle-o", "check-square", "check-square-o", "chevron-circle-down", "chevron-circle-left", "chevron-circle-right", "chevron-circle-up", "chevron-down", "chevron-left", "chevron-right", "chevron-up", "child", "circle", "circle-o", "circle-o-notch", "circle-thin", "clipboard", "clock-o", "close", "cloud", "cloud-download", "cloud-upload", "cny", "code", "code-fork", "codepen", "coffee", "cog", "cogs", "columns", "comment", "comment-o", "comments", "comments-o", "compass", "compress", "connectdevelop", "copy", "copyright", "credit-card", "crop", "crosshairs", "css3", "cube", "cubes", "cut", "cutlery", "dashboard", "dashcube", "database", "dedent", "delicious", "desktop", "deviantart", "diamond", "digg", "dollar", "dot-circle-o", "download", "dribbble", "dropbox", "drupal", "edit", "eject", "ellipsis-h", "ellipsis-v", "empire", "envelope", "envelope-o", "envelope-square", "eraser", "eur", "euro", "exchange", "exclamation", "exclamation-circle", "exclamation-triangle", "expand", "external-link", "external-link-square", "eye", "eye-slash", "eyedropper", "facebook", "facebook-f", "facebook-official", "facebook-square", "fast-backward", "fast-forward", "fax", "female", "fighter-jet", "file", "file-archive-o", "file-audio-o", "file-code-o", "file-excel-o", "file-image-o", "file-movie-o", "file-o", "file-pdf-o", "file-photo-o", "file-picture-o", "file-powerpoint-o", "file-sound-o", "file-text", "file-text-o", "file-video-o", "file-word-o", "file-zip-o", "files-o", "film", "filter", "fire", "fire-extinguisher", "flag", "flag-checkered", "flag-o", "flash", "flask", "flickr", "floppy-o", "folder", "folder-o", "folder-open", "folder-open-o", "font", "forumbee", "forward", "foursquare", "frown-o", "futbol-o", "gamepad", "gavel", "gbp", "ge", "gear", "gears", "genderless", "gift", "git", "git-square", "github", "github-alt", "github-square", "gittip", "glass", "globe", "google", "google-plus", "google-plus-square", "google-wallet", "graduation-cap", "gratipay", "group", "h-square", "hacker-news", "hand-o-down", "hand-o-left", "hand-o-right", "hand-o-up", "hdd-o", "header", "headphones", "heart", "heart-o", "heartbeat", "history", "home", "hospital-o", "hotel", "html5", "ils", "image", "inbox", "indent", "info", "info-circle", "inr", "instagram", "institution", "ioxhost", "italic", "joomla", "jpy", "jsfiddle", "key", "keyboard-o", "krw", "language", "laptop", "lastfm", "lastfm-square", "leaf", "leanpub", "legal", "lemon-o", "level-down", "level-up", "life-bouy", "life-buoy", "life-ring", "life-saver", "lightbulb-o", "line-chart", "link", "linkedin", "linkedin-square", "linux", "list", "list-alt", "list-ol", "list-ul", "location-arrow", "lock", "long-arrow-down", "long-arrow-left", "long-arrow-right", "long-arrow-up", "magic", "magnet", "mail-forward", "mail-reply", "mail-reply-all", "male", "map-marker", "mars", "mars-double", "mars-stroke", "mars-stroke-h", "mars-stroke-v", "maxcdn", "meanpath", "medium", "medkit", "meh-o", "mercury", "microphone", "microphone-slash", "minus", "minus-circle", "minus-square", "minus-square-o", "mobile", "mobile-phone", "money", "moon-o", "mortar-board", "motorcycle", "music", "navicon", "neuter", "newspaper-o", "openid", "outdent", "pagelines", "paint-brush", "paper-plane", "paper-plane-o", "paperclip", "paragraph", "paste", "pause", "paw", "paypal", "pencil", "pencil-square", "pencil-square-o", "phone", "phone-square", "photo", "picture-o", "pie-chart", "pied-piper", "pied-piper-alt", "pinterest", "pinterest-p", "pinterest-square", "plane", "play", "play-circle", "play-circle-o", "plug", "plus", "plus-circle", "plus-square", "plus-square-o", "power-off", "print", "puzzle-piece", "qq", "qrcode", "question", "question-circle", "quote-left", "quote-right", "ra", "random", "rebel", "recycle", "reddit", "reddit-square", "refresh", "remove", "renren", "reorder", "repeat", "reply", "reply-all", "retweet", "rmb", "road", "rocket", "rotate-left", "rotate-right", "rouble", "rss", "rss-square", "rub", "ruble", "rupee", "save", "scissors", "search", "search-minus", "search-plus", "sellsy", "send", "send-o", "server", "share", "share-alt", "share-alt-square", "share-square", "share-square-o", "shekel", "sheqel", "shield", "ship", "shirtsinbulk", "shopping-cart", "sign-in", "sign-out", "signal", "simplybuilt", "sitemap", "skyatlas", "skype", "slack", "sliders", "slideshare", "smile-o", "soccer-ball-o", "sort", "sort-alpha-asc", "sort-alpha-desc", "sort-amount-asc", "sort-amount-desc", "sort-asc", "sort-desc", "sort-down", "sort-numeric-asc", "sort-numeric-desc", "sort-up", "soundcloud", "space-shuttle", "spinner", "spoon", "spotify", "square", "square-o", "stack-exchange", "stack-overflow", "star", "star-half", "star-half-empty", "star-half-full", "star-half-o", "star-o", "steam", "steam-square", "step-backward", "step-forward", "stethoscope", "stop", "street-view", "strikethrough", "stumbleupon", "stumbleupon-circle", "subscript", "subway", "suitcase", "sun-o", "superscript", "support", "table", "tablet", "tachometer", "tag", "tags", "tasks", "taxi", "tencent-weibo", "terminal", "text-height", "text-width", "th", "th-large", "th-list", "thumb-tack", "thumbs-down", "thumbs-o-down", "thumbs-o-up", "thumbs-up", "ticket", "times", "times-circle", "times-circle-o", "tint", "toggle-down", "toggle-left", "toggle-off", "toggle-on", "toggle-right", "toggle-up", "train", "transgender", "transgender-alt", "trash", "trash-o", "tree", "trello", "trophy", "truck", "try", "tty", "tumblr", "tumblr-square", "turkish-lira", "twitch", "twitter", "twitter-square", "umbrella", "underline", "undo", "university", "unlink", "unlock", "unlock-alt", "unsorted", "upload", "usd", "user", "user-md", "user-plus", "user-secret", "user-times", "users", "venus", "venus-double", "venus-mars", "viacoin", "video-camera", "vimeo-square", "vine", "vk", "volume-down", "volume-off", "volume-up", "warning", "wechat", "weibo", "weixin", "whatsapp", "wheelchair", "wifi", "windows", "won", "wordpress", "wrench", "xing", "xing-square", "yahoo", "yelp", "yen", "youtube", "youtube-play", "youtube-square");
return $fa_array;
}

// the_wp_qty to array
function the_wp_qty_array() {
	// Disabled-numbers Array
    return array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30',  );
}

// Pages id's list arry for Dropdown control
function the_wp_pages () {
	$page_list = array( 0 => '' );
	$pages = get_pages();
		foreach ( $pages as $page )
			$page_list [$page->ID] = $page->post_title;
	return $page_list;
}

?>