<?php
/**
 * Vertical Space Widget
 */

/**
* Class The_WP_Stats_Widget
*/
class The_WP_Space_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-space-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Space','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Add blank spaces with custom height between widgets', 'the-wp'),
				'class'			=> 'the-wp-space-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Height', 'the-wp' ),
					'id'		=> 'height',
					'type'		=> 'text',
					'size'		=> '5',
					'sanitize'	=> 'absint',
				),
				array(
					'name'		=> __( 'Description', 'the-wp' ),
					'id'		=> 'description',
					'type'		=> 'textarea',
				),
				array(
					'name'		=> __( 'Background color', 'the-wp' ),
					'id'		=> 'bg_color',
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
		include( the_wp_locate_widget( 'space' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_space_widget_register(){
	register_widget('The_WP_Space_Widget');
}
add_action('widgets_init', 'the_wp_space_widget_register');