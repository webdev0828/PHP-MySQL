<?php
/**
 * Content Blocks Widget
 */

/**
* Class The_WP_Content_Blocks_Widget
*/
class The_WP_Content_Blocks_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-content-blocks-widget',

			//name
			sprintf( "&bull; %1s &rarr; %2s", __('The WP','the-wp'), __('Content Blocks','the-wp') ),

			//widget_options
			array(
				'description'	=> __('Display Styled Content Blocks.', 'the-wp'),
				'class'			=> 'the-wp-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Style', 'the-wp' ),
					'id'		=> 'style',
					'type'		=> 'images',
					'std'		=> 'style1',
					'options'	=> array(
						'style1'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-1.png',
						'style2'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-2.png',
						'style3'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-3.png',
						'style4'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-4.png',
					),
				),
				array(
					'name'		=> __( "Title", 'the-wp' ),
					'id'		=> 'title',
					'type'		=> 'text',
					'std'		=> __('Just write.', 'the-wp'),
				),
				array(
					'name'		=> __( "Description", 'the-wp' ),
					'id'		=> 'desc',
					'type'		=> 'text',
					'std'		=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet interdum vestibulum, aliquam non ante.',
				),
				array(
					'name'		=> __( 'Number of Columns', 'the-wp' ),
					'id'		=> 'columns',
					'type'		=> 'select',
					'std'		=> '3',
					'options'	=> array(
						'1'	=> __( 'One Column', 'the-wp' ),
						'2'	=> __( 'Two Columns', 'the-wp' ),
						'3'	=> __( 'Three Columns', 'the-wp' ),
						'4'	=> __( 'Four Columns', 'the-wp' ),
						'5'	=> __( 'Five Columns', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( 'Icon Style', 'the-wp' ),
					'desc'		=> __( "Not applicable if Featured Image is seected below.", 'the-wp' ),
					'id'		=> 'icon_style',
					'type'		=> 'select',
					'std'		=> 'circle',
					'options'	=> array(
						'none'		=> __( 'None', 'the-wp' ),
						'circle'	=> __( 'Circle', 'the-wp' ),
						'square'	=> __( 'Square', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( 'Border', 'the-wp' ),
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
				array(
					'name'		=> __( "Use Featured Image of page instead of icons.", 'the-wp' ),
					'id'		=> 'image',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( "Display excerpt instead of full content (Read More link will be automatically used instead of Custom URLs below)", 'the-wp' ),
					'id'		=> 'excerpt',
					'type'		=> 'checkbox',
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
					'title'		=> __( 'Content Boxes', 'the-wp' ),
					'id'		=> 'sep7',
					'type'		=> 'separator',
				),
				array(
					'name'		=> '',
					'id'		=> 'boxes',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Content Box', 'the-wp' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __('Icon', 'the-wp'),
							'desc'		=> __( "Not applicable if Featured Image is selected above.", 'the-wp' ),
							'id'		=> 'icon',
							'type'		=> 'icon'),
						array(
							'name'		=> sprintf( "%1s (%2s)", __('Color','the-wp'), __('Icon','the-wp') ),
							'id'		=> 'icon_color',
							'std'		=> '',
							'type'		=> 'color-picker',
						),
						array(
							'name'		=> sprintf( "%1s (%2s)", __('Color','the-wp'), __('Title','the-wp') ),
							'id'		=> 'title_color',
							'std'		=> '',
							'type'		=> 'color-picker',
						),
						array(
							'name'		=> __('Text color', 'the-wp'),
							'id'		=> 'text_color',
							'std'		=> '',
							'type'		=> 'color-picker',
						),
						array(
							'name'		=> __( 'Page', 'the-wp' ),
							'id'		=> 'page',
							'type'		=> 'select',
							'options'	=> The_WP_WP_Widget::get_wp_list('page'),
						),
						array(
							'name'		=> sprintf( "%1s (%2s)", __('Title','the-wp'), __('Optional','the-wp') ),
							'id'		=> 'title',
							'type'		=> 'text'),
						array(
							'name'		=> sprintf( "%1s (%2s)", __('Alternative Text','the-wp'), __('Optional','the-wp') ),
							'id'		=> 'text',
							'type'		=> 'text'),
						array(
							'name'		=> sprintf( "%1s (%2s)", __('Link Text','the-wp'), __('Optional','the-wp') ),
							'id'		=> 'linktext',
							'type'		=> 'text'),
						array(
							'name'		=> sprintf( "%1s (%2s)", __('Custom Link','the-wp'), __('Optional','the-wp') ),
							'id'		=> 'url',
							'type'		=> 'text',
							'sanitize'	=> 'url'),
						array(
							'name'		=> __('Background color', 'the-wp'),
							'id'		=> 'bgcolor',
							'std'		=> '',
							'type'		=> 'color-picker',
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
		include( the_wp_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_content_blocks_widget_register(){
	register_widget('The_WP_Content_Blocks_Widget');
}
add_action('widgets_init', 'the_wp_content_blocks_widget_register');