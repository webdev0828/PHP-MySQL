<?php
/**
 * Text Rotator Widget
 */

/**
* Class The_WP_Stats_Widget
*/
class The_WP_Text_Rotator_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-text-rotator-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Text Rotator','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Add a simple rotating/ticking text widgets', 'the-wp'),
				'class'			=> 'the-wp-text-rotator-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Before', 'the-wp' ),
					'id'		=> 'before',
					'type'		=> 'text',
					'sanitize'	=> 'esc_attr',
					'std'		=> 'Lorem ipsum dolor sit amet',
				),
				array(
					'name'		=> __( 'Rotating text', 'the-wp' ),
					'desc'		=> __( 'Separate terms with commas. You want to ticker, just fill in this field.', 'the-wp' ),
					'id'		=> 'rotate',
					'type'		=> 'text',
					'sanitize'	=> 'esc_attr',
					'std'		=> 'consectetur,adipiscing,interdum,vestibulum',
				),
				array(
					'name'		=> __( 'After', 'the-wp' ),
					'id'		=> 'after',
					'type'		=> 'text',
					'sanitize'	=> 'esc_attr',
					'std'		=> 'aliquam non ante.',
				),
				array(
					'name'		=> __( 'Link', 'the-wp' ),
					'id'		=> 'link',
					'type'		=> 'text',
					'sanitize'	=> 'url',
				),
				array(
					'name'		=> __( 'Animation', 'the-wp' ),
					'id'		=> 'animation',
					'type'		=> 'select',
					'std'		=> 'flip',
					'options'	=> array(
						'flip'	=> __( 'flip', 'the-wp' ),
						'flipUp'	=> __( 'flipUp', 'the-wp' ),
						'flipCube'	=> __( 'flipCube', 'the-wp' ),
						'flipCubeUp'	=> __( 'flipCubeUp', 'the-wp' ),
						'spin'	=> __( 'spin', 'the-wp' ),
					),
				),
				array(
					'title'		=> __( "Formatting", 'the-wp' ),
					'id'		=> 'formatting',
					'type'		=> 'separator',
				),
				array(
					'name'		=> __( 'Font Sizes', 'the-wp' ),
					'id'		=> 'fontsize',
					'type'		=> 'text',
					'size'		=> '5',
					'sanitize'	=> 'absint',
				),
				array(
					'name'		=> __( "Underline", 'the-wp' ),
					'id'		=> 'u',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( "Italic", 'the-wp' ),
					'id'		=> 'i',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( "Bold", 'the-wp' ),
					'id'		=> 'b',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( "Blockquote", 'the-wp' ),
					'id'		=> 'q',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( 'Text Color', 'the-wp' ),
					'id'		=> 'color',
					'type'		=> 'color-picker',
				),
				array(
					'name'		=> __( 'Background color', 'the-wp' ),
					'id'		=> 'bgcolor',
					'type'		=> 'color-picker',
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( the_wp_locate_widget( 'text-rotator' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_text_rotator_widget_register(){
	register_widget('The_WP_Text_Rotator_Widget');
}
add_action('widgets_init', 'the_wp_text_rotator_widget_register');