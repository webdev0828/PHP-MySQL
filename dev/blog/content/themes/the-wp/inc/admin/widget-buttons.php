<?php
/**
 * Buttons Widget
 */

/**
* Class The_WP_Buttons_Widget
*/
class The_WP_Buttons_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-buttons-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Buttons','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Display colored call to action buttons with icons', 'the-wp'),
				'class'			=> 'the-wp-button-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Title', 'the-wp' ),
					'id'		=> 'title',
					'type'		=> 'text',
				),
				array(
					'name'		=> __( 'Description', 'the-wp' ),
					'id'		=> 'description',
					'type'		=> 'textarea',
				),
				array(
					'name'		=> __( 'Size', 'the-wp' ),
					'id'		=> 'size',
					'type'		=> 'select',
					'std'		=> '2x',
					'options'	=> array(
						'1'		=> __( 'Small', 'the-wp' ),
						'2'		=> __( 'Medium', 'the-wp' ),
						'3'		=> __( 'Large', 'the-wp' ),
						'4'		=> __( 'Huge', 'the-wp' ),
					),
				),
				array(
					'title'		=> __( 'Custom Background', 'the-wp' ),
					'id'		=> 'sep6',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Choose a Background Image', 'the-wp' ),
					'id'		=> 'image',
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
					'name'		=> __( 'Buttons', 'the-wp' ),
					'id'		=> 'buttons',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Button', 'the-wp' ),
					),
					'fields'	=> array(
									  array(
										  'name'	=> __( 'Text Color', 'the-wp' ),
										  'id'		=> 'color',
										  'type'	=> 'color-picker',
									  ),
									  array(
										  'name'	=> __( 'Background Color', 'the-wp' ),
										  'id'		=> 'bgcolor',
										  'type'	=> 'color-picker',
									  ),
									  array(
										  'name'	=> __( 'Text', 'the-wp' ),
										  'id'		=> 'text',
										  'type'	=> 'text',
										  'sanitize'=> 'esc_attr',
									  ),
									  array(
										  'name'	=> __( 'Custom Link', 'the-wp' ),
										  'id'		=> 'link',
										  'type'	=> 'text',
										  'default' => 'http://',
										  'sanitize' => 'url',
									  ),
									  array(
										  'name'	=> '',
										  'id'		=> 'icon',
										  'type'	=> 'icon',
									  ),
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
		include( the_wp_locate_widget( 'buttons' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_button_widget_register(){
	register_widget('The_WP_Buttons_Widget');
}
add_action('widgets_init', 'the_wp_button_widget_register');