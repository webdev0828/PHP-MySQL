<?php
/**
 * Social Icons Widget
 */

/**
* Class The_WP_Stats_Widget
*/
class The_WP_Stats_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-stats-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Stats','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Display stat numbers with icons', 'the-wp'),
				'class'			=> 'the-wp-stats-widget', // CSS class applied to frontend widget container via 'before_widget' arg
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
					'name'		=> __( 'Icon Size', 'the-wp' ),
					'id'		=> 'size',
					'type'		=> 'select',
					'std'		=> 'medium',
					'options'	=> array(
						'2x'		=> __( 'Small', 'the-wp' ),
						'3x'		=> __( 'Medium', 'the-wp' ),
						'4x'		=> __( 'Large', 'the-wp' ),
						'5x'		=> __( 'Huge', 'the-wp' ),
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
					'title'		=> __( 'Stats', 'the-wp' ),
					'id'		=> 'sep7',
					'type'		=> 'separator',
				),
				array(
					'name'		=> '',
					'id'		=> 'icons',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Stat', 'the-wp' ),
					),
					'fields'	=> array(
									  array(
										  'name'	=> '',
										  'id'		=> 'icon',
										  'type'	=> 'icon',
									  ),
									  array(
										  'name'	=>  '',
										  'id'		=> 'color',
										  'type'	=> 'color-picker',
									  ),
									  array(
										  'name'	=> __( 'Number', 'the-wp' ),
										  'id'		=> 'number',
										  'type'	=> 'text',
										  'size'	=> '10',
										  'sanitize'=> 'absint',
									  ),
									  array(
										  'name'	=> __( 'Description', 'the-wp' ),
										  'id'		=> 'description',
										  'type'	=> 'textarea',
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
		include( the_wp_locate_widget( 'stats' ) ); // Loads the widget/social-icons or template-parts/widget-social-icons.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_stats_widget_register(){
	register_widget('The_WP_Stats_Widget');
}
add_action('widgets_init', 'the_wp_stats_widget_register');