<?php
/**
 * Call To Action Widget
 */

/**
* Class The_WP_CTA_Widget
*/
class The_WP_CTA_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-cta-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Call To Action','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Display Call To Action block.', 'the-wp'),
				'class'			=> 'the-wp-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Icon', 'the-wp' ),
					'id'		=> 'icon',
					'type'		=> 'icon',
				),
				array(
					'name'		=> __( 'Select Color', 'the-wp' ),
					'id'		=> 'icon_color',
					'type'		=> 'color-picker',
				),
				array(
					'title'		=> __( 'Headline', 'the-wp' ),
					'id'		=> 'sep1',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Headline', 'the-wp' ),
					'id'		=> 'headline',
					'type'		=> 'text',
				),
				array(
					'name'		=> __( 'Text Color', 'the-wp' ),
					'id'		=> 'headline_color',
					'type'		=> 'color-picker',
				),
				array(
					'title'		=> __( 'Subline', 'the-wp' ),
					'id'		=> 'sep2',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Subline', 'the-wp' ),
					'id'		=> 'subline',
					'type'		=> 'text',
				),
				array(
					'name'		=> __( 'Text Color', 'the-wp' ),
					'id'		=> 'subline_color',
					'type'		=> 'color-picker',
				),
				array(
					'title'		=> __( 'Description', 'the-wp' ),
					'id'		=> 'sep3',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Description', 'the-wp' ),
					'id'		=> 'description',
					'type'		=> 'textarea',
				),
				array(
					'name'		=> __( 'Text Color', 'the-wp' ),
					'id'		=> 'description_color',
					'type'		=> 'color-picker',
				),
				array(
					'title'		=> __( 'Link URL', 'the-wp' ),
					'id'		=> 'sep4',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Button Text', 'the-wp' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'the-wp' ),
					'id'		=> 'button_text',
					'type'		=> 'text',
					'std'		=> __( 'Read more...', 'the-wp' ),
				),
				array(
					'name'		=> __( 'Custom Link', 'the-wp' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'the-wp' ),
					'id'		=> 'url',
					'type'		=> 'text',
					'sanitize'	=> 'url',
				),
				array(
					'name'		=> __('Background color', 'the-wp'),
					'id'		=> 'button_bgcolor',
					'type'		=> 'color-picker',
				),
				array(
					'title'		=> __( 'Image File', 'the-wp' ),
					'id'		=> 'sep5',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Select Image', 'the-wp' ),
					'id'		=> 'image',
					'type'		=> 'image',
				),
				array(
					'title'		=> __( 'Custom Background', 'the-wp' ),
					'id'		=> 'sep6',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Choose a Background Image', 'the-wp' ),
					'id'		=> 'bgimage',
					'type'		=> 'image',
				),
				array(
					'name'		=> __( "Background image with parallax scrolling", 'the-wp' ),
					'id'		=> 'parallax',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __('Background color', 'the-wp'),
					'id'		=> 'widget_bgcolor',
					'type'		=> 'color-picker',
				),
				array(
					'title'		=> __('More Actions', 'the-wp'),
					'id'		=> 'sep7',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Alignment', 'the-wp' ),
					'desc'		=> __( 'Image default align', 'the-wp' ),
					'id'		=> 'image_align',
					'type'		=> 'select',
					'std'		=> 'none',
					'options'	=> array(
						'none'	=> __( 'No alignment', 'the-wp' ),
						'align-left'	=> __( 'Align left', 'the-wp' ),
						'align-right'	=> __( 'Align right', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( 'Border', 'the-wp' ),
					'desc'		=> __( 'Top and bottom borders.', 'the-wp' ),
					'id'		=> 'border',
					'type'		=> 'select',
					'std'		=> 'none none',
					'options'	=> array(
					  'line line'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('Line','the-wp'), __('Bottom','the-wp'), __('Line','the-wp') ),
					  'line shadow'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('Line','the-wp'), __('Bottom','the-wp'), __('DoubleLine','the-wp') ),
					  'line none'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('Line','the-wp'), __('Bottom','the-wp'), __('None','the-wp') ),
					  'shadow line'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('DoubleLine','the-wp'), __('Bottom','the-wp'), __('Line','the-wp') ),
					  'shadow shadow'=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('DoubleLine','the-wp'), __('Bottom','the-wp'), __('DoubleLine','the-wp') ),
					  'shadow none'=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('DoubleLine','the-wp'), __('Bottom','the-wp'), __('None','the-wp') ),
					  'none line'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('None','the-wp'), __('Bottom','the-wp'), __('Line','the-wp') ),
					  'none shadow'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('None','the-wp'), __('Bottom','the-wp'), __('DoubleLine','the-wp') ),
					  'none none'	=> sprintf( "%1s : %2s | %3s : %4s", __('Top','the-wp'), __('None','the-wp'), __('Bottom','the-wp'), __('None','the-wp') ),
					),
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( the_wp_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_cta_widget_register(){
	register_widget('The_WP_CTA_Widget');
}
add_action('widgets_init', 'the_wp_cta_widget_register');