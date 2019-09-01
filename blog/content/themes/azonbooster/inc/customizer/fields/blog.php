<?php
/**
 * Blog Fields
 *
 * @since 1.0.0
 * @return array
 */
add_filter( 'azonbooster_customize_fields', 'azonbooster_blog_fields', 10);

function azonbooster_blog_fields( $fields ) {

	$custom_fields = array(
			
			array(
				'settings'          => 'blog_layout',
				'label'             => __('Blog Layout', 'azonbooster'),
				'section'           => 'azonbooster_blog_layout_section',
				'type'              => 'radio-image',
				'default'           => 'right',
				'priority'          => 1,
				'choices'     => array(
					'none'   => get_template_directory_uri() . '/assets/img/category-no-sidebar.svg',
					'left' => get_template_directory_uri() . '/assets/img/category-left-sidebar.svg',
					'right'  => get_template_directory_uri() . '/assets/img/category-right-sidebar.svg',
				),
				
			),
			array(
				'settings'          => 'blog_layout_thumbnail_pos',
				'label'             => __('Thumbnail Position', 'azonbooster'),
				'section'           => 'azonbooster_blog_layout_section',
				'type'              => 'radio-buttonset',
				'default'           => 'left',
				'priority'          => 2,
				'choices'     => array(
					'left'				=> __('Left', 'azonbooster'),
					'top'				=> __('Top', 'azonbooster'),
					'right'				=> __('Right', 'azonbooster')
				),
				
			),

			// azonbooster_blog_post_section
			array(
				'settings'          => 'blog_post_show_excerpt',
				'label'             => __('Show Excerpt', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 3,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_post_excerpt_length',
				'label'             => __('Excerpt Length', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'slider',
				'default'           => 20,
				'priority'          => 4,
				'choices'     => array(
					'min'  => '10',
					'max'  => '80',
					'step' => '1',
				),
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => true,
					)
				)
				
			),

			array(
				'settings'          => 'blog_post_show_excerpt_more',
				'label'             => __('Excerpt More String', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'text',
				'default'           => '[...]',
				'priority'          => 5,
				
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => true,
					)
				)
				
			),

			

			array(
				'settings'          => 'blog_post_show_readmore',
				'label'             => __('Show Read More', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 8,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),

				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => 'on',
					)
				)
				
				
			),

			array(
				'settings'          => 'blog_post_show_readmore_label',
				'label'             => __('Read More Label', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'text',
				'default'           => __('View Detail', 'azonbooster'),
				'priority'          => 9,
				
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_readmore',
						'operator' => '==',
						'value'    => 'on',
					)
				)
				
			),


			array(
				'settings'          => 'blog_post_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 10,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			// Post meta data

			array(
				'settings'          => 'blog_posts_metadata',
				'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __('Shop/Hide Post Meta Data', 'azonbooster') ),
				'description'		=> __( 'Check them to show post meta data.', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'multicheck',
				'default'           => array('date', 'category', 'tag', 'author'),
				'priority'          => 11,
				'choices'     		=> array(
					'date'					=> esc_attr__( 'Date', 'azonbooster' ),
					'category'				=> esc_attr__( 'Category', 'azonbooster' ),
					'tag'					=> esc_attr__( 'Tag', 'azonbooster' ),
					'author'				=> esc_attr__( 'Author', 'azonbooster' ),
					'comment'				=> esc_attr__( 'Comment', 'azonbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_posts_modified_date',
				'label'             => __('Show Modified Date', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 'off',
				'priority'          => 12,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			array(
				'type'     => 'text',
				'settings' => 'blog_posts_date_prefix',
				'label'    => __( 'Date Prefix', 'azonbooster' ),
				'section'  => 'azonbooster_blog_post_section',
				'description'  => esc_attr__( 'Prefix before date archive. It will show for all archive and single post.', 'azonbooster' ),
				'priority' => 13,
			),

			
			/**
			 * azonbooster_blog_single_post_section
			 */
			// Post thumbnail
			array(
				'settings'          => 'blog_single_post_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'azonbooster'),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 1,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),
			// Post navigation
			array(
				'settings'          => 'blog_single_post_show_nav',
				'label'             => __('Show Post Navigation', 'azonbooster'),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 2,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			// Post meta data

			array(
				'settings'          => 'blog_single_post_metadata',
				'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __('Shop/Hide Post Meta Data', 'azonbooster') ),
				'description'		=> __( 'Check them to show post meta data.', 'azonbooster'),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'multicheck',
				'default'           => array('date', 'category', 'tag', 'author'),
				'priority'          => 3,
				'choices'     		=> array(
					'date'					=> esc_attr__( 'Date', 'azonbooster' ),
					'category'				=> esc_attr__( 'Category', 'azonbooster' ),
					'tag'					=> esc_attr__( 'Tag', 'azonbooster' ),
					'author'				=> esc_attr__( 'Author', 'azonbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_single_post_modified_date',
				'label'             => __('Show Modified Date', 'azonbooster'),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 'off',
				'priority'          => 4,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_single_post_related_posts',
				'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __( 'Related Posts', 'azonbooster' ) ),
				'description'		=> __( 'Switch On/Off to show and hide this section.', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 'on',
				'priority'          => 5,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				)
			),

			array(
				'settings'          => 'blog_single_post_related_posts_title',
				'label'             => '',
				'description'		=> __( 'Section Title', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'text',
				'default'           => __('See More Related', 'azonbooster'),
				'priority'          => 5,
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					)
				),
				
			),

			array(
				'settings'          => 'blog_single_post_related_posts_by',
				'label'             => '',
				'description'		=> __( 'Related By', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'select',
				'default'           => 'cat',
				'priority'          => 6,
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					)
				),
				'choices'     		=> array(
					'cat'			=> esc_attr__( 'Categories', 'azonbooster' ),
					'tag'			=> esc_attr__( 'Tags', 'azonbooster' ),
					'author'		=> esc_attr__( 'Autor', 'azonbooster' ),
					'rand'			=> esc_attr__( 'Random', 'azonbooster' ),
					
				),
				
			),
			array(
				'settings'          => 'blog_single_post_related_posts_orderby',
				'label'             => '',
				'description'		=> __( 'Order By', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'select',
				'default'           => 'date',
				'priority'          => 6,
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					)
				),
				'choices'     		=> array(
					'none'			=> esc_attr__( 'None order', 'azonbooster' ),
					'ID'			=> esc_attr__( 'ID', 'azonbooster' ),
					'author'		=> esc_attr__( 'Autor', 'azonbooster' ),
					'title'			=> esc_attr__( 'Title', 'azonbooster' ),
					'name'			=> esc_attr__( 'Name', 'azonbooster' ),
					'date'			=> esc_attr__( 'Date', 'azonbooster' ),
					'modified'		=> esc_attr__( 'Modified', 'azonbooster' ),
					'parent'		=> esc_attr__( 'Parent', 'azonbooster' ),
					'rand'			=> esc_attr__( 'Random', 'azonbooster' ),
					'comment_count'	=> esc_attr__( 'Comment Count', 'azonbooster')
					
				),
				
			),
			array(
				'settings'          => 'blog_single_post_related_posts_order',
				'label'             => '',
				'description'		=> __( 'Order', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'select',
				'default'           => 'DESC',
				'priority'          => 6,
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					)
				),
				'choices'     		=> array(
					'ASC'			=> esc_attr__( 'Ascending', 'azonbooster' ),
					'DESC'			=> esc_attr__( 'Descending', 'azonbooster' )
					
				),
				
			),

			array(
				'settings'          => 'blog_single_post_related_posts_style',
				'label'             => '',
				'description'		=> __( 'Display style', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'radio-buttonset',
				'default'           => 'grid',
				'priority'          => 6,
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					)
				),
				'choices'     		=> array(
					'grid'				=> esc_attr__( 'Grid', 'azonbooster' ),
					'list'				=> esc_attr__( 'List', 'azonbooster' ),
					
				),
				
			),

			array(
				'settings'          => 'blog_single_post_related_posts_num',
				'label'             => '',
				'description'		=> __( 'Posts per Page', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'number',
				'default'           => 8,
				'priority'          => 8,
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					),

				)
				
			),
			array(
				'settings'          => 'blog_single_post_related_posts_num_cols',
				'label'             => '',
				'description'		=> __( 'Number of Columns', 'azonbooster' ),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'select',
				'default'           => 4,
				'priority'          => 7,
				'choices'     => array(
					'1'				=> 1,
					'2'				=> 2,
					'3'				=> 3,
					'4'				=> 4,
					'6'				=> 6
				),
				'active_callback' => array(
					array(
						'setting'  => 'blog_single_post_related_posts_style',
						'operator' => '==',
						'value'    => 'grid',
					),
					array(
						'setting'  => 'blog_single_post_related_posts',
						'operator' => '==',
						'value'    => true,
					)
				)
				
			),

			// azonbooster_blog_footer_widget_section
			array(
				'settings'          => 'blog_footer_widget_cols',
				'label'             => __('Footer Widget Columns', 'azonbooster'),
				'section'           => 'azonbooster_blog_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '4',
				'priority'          => 10,
				'choices'     => array(
					'0'				=> __('0', 'azonbooster'),
					'1'				=> __('1', 'azonbooster'),
					'2'				=> __('2', 'azonbooster'),
					'3'				=> __('3', 'azonbooster'),
					'4'				=> __('4', 'azonbooster')
				),
				
			),
			array(
				'settings'          => 'blog_footer_widget_rows',
				'label'             => __('Footer Widget Rows', 'azonbooster'),
				'section'           => 'azonbooster_blog_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '2',
				'priority'          => 11,
				'choices'     => array(
					'1'				=> __('1', 'azonbooster'),
					'2'				=> __('2', 'azonbooster'),
					'3'				=> __('3', 'azonbooster'),
					'4'				=> __('4', 'azonbooster')
				),
				
			),
	);

	return wp_parse_args( $custom_fields, $fields );
}

add_filter( 'azonbooster_customize_fields', 'azonbooster_homepage_fields', 10);

/**
 * Homepage Fileds
 *
 * @since 1.2.0
 * @param  array $fields
 * @return array
 */
function azonbooster_homepage_fields( $fields ) {

	$custom_fields = array(

		array(
				'settings'          => 'homepage_show_page_content_setting',
				'label'             => __('Show Page Content', 'azonbooster'),
				'section'           => 'azonbooster_homepage_general_section',
				'type'              => 'switch',
				'description'		=> __( 'Switch ON/OFF to show default page content on homepage.', 'azonbooster' ),
				'default'           => '1',
				'priority'          => 5,
				'choices'     => array(
					'on'				=> esc_attr__('ON', 'azonbooster'),
					'off'				=> esc_attr__('OFF', 'azonbooster'),
				),
				
			),
			/**
			 * Featured Posts
			 */
			array(
				'settings'          => 'homepage_featured_posts_cat_setting',
				'label'             => __('Featured Posts', 'azonbooster'),
				'section'           => 'azonbooster_homepage_featured_posts_section',
				'type'              => 'select',
				'description'		=> __( 'Choose category to show it\'s post. Keep [All categories] to show from all categoies.', 'azonbooster' ),
				'priority'          => 10,
				'choices'		=> azonbooster_category_list()
				
			),
			array(
				'type'			=> 'number',
				'settings'     => 'homepage_featured_posts_num_setting',
				'default'		=> 5,
				'priority'    => 20,
				'label'			=> esc_attr__( 'Number of Posts', 'azonbooster' ),
				'section'     => 'azonbooster_homepage_featured_posts_section',
			),
			array(
				'type'			=> 'checkbox',
				'settings'     => 'homepage_fp_ignore_sticky_posts_setting',
				'default'		=> true,
				'priority'    => 30,
				'label'			=> esc_attr__( 'Ignore Sticky Posts', 'azonbooster' ),
				'section'     => 'azonbooster_homepage_featured_posts_section',
			),
			array(
				'settings'          => 'homepage_featured_posts_order_setting',
				'label'             => __('Order', 'azonbooster'),
				'section'           => 'azonbooster_homepage_featured_posts_section',
				'type'              => 'select',
				'priority'          => 40,
				'choices'		=> array('DESC' => __('Descending', 'azonbooster'), 'ASC' => __( 'Ascending', 'azonbooster' ) )
				
			),
			array(
				'settings'          => 'homepage_featured_posts_orderby_setting',
				'label'             => __('Order By', 'azonbooster'),
				'section'           => 'azonbooster_homepage_featured_posts_section',
				'type'              => 'select',
				'priority'          => 40,
				'default'			=> 'date',
				'choices'			=> array(

							'none' 		=> __('No order', 'azonbooster'),
							'ID'		=> __('ID', 'azonbooster'),
							'author'		=> __('Author', 'azonbooster'),
							'date'		=> __('Date', 'azonbooster'),
							'modified'		=> __('Modified', 'azonbooster'),
							'parent'		=> __('Parent', 'azonbooster'),
							'rand'		=> __('Random', 'azonbooster'),
							'comment_count'		=> __('Comment Count', 'azonbooster'),
					)
				
			),

		/**
		 * Custom Content
		 */
		array(
			'type'			=> 'select',
			'settings'     => 'homepage_content_col_setting',
			'default'		=> 2,
			'priority'    => 5,
			'label'			=> esc_attr__( 'Number of Columns', 'azonbooster' ),
			'choices'		=> array( 1 => 1, 2 => 2, 3 => 3, 4 => 4),
			'section'     => 'azonbooster_homepage_content_section',
			),
		array(
			'type'        => 'repeater',
			'label'       => esc_attr__( 'Homepage Content', 'azonbooster' ),
			'section'     => 'azonbooster_homepage_content_section',
			'priority'    => 10,
			'row_label' => array(
				'type'  => 'field',
				'value' => esc_attr__('Custom Content', 'azonbooster' ),
				'field' => 'cat',
			),
			'button_label' => esc_attr__('Add New', 'azonbooster' ),
			'settings'     => 'homepage_content_setting',
			'fields' => azonbooster_homepage_content_fields()
		)
	);

	return wp_parse_args( $custom_fields, $fields );
}

function azonbooster_homepage_content_fields() {

	return array(
			'cat' 	=> array(
					'type'        	=> 'select',
					'label'       	=> esc_attr__( 'Category', 'azonbooster' ),
					'description' 	=> esc_attr__( 'Choose any category', 'azonbooster' ),
					'choices'		=> azonbooster_category_list()
			),
			'cat_img' => array(
					'type'        => 'image',
					'label'       => esc_attr__( 'Image Category', 'azonbooster' ),
					'description' => esc_attr__( 'Category Image Thumbnail', 'azonbooster' ),
					'default'     => '',
			),
			'post_per_page'	=> array(
				'type'			=> 'number',
				'label'			=> esc_attr__( 'Number of Posts', 'azonbooster' ),
				'default'		=> 5
			),
			'render_style'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Render Style', 'azonbooster' ),
				'default'		=> 'grid',
				'choices'		=> array( 'list' => esc_attr__( 'List', 'azonbooster' ), 'grid' => esc_attr__( 'Grid', 'azonbooster' ))
			),
			'num_cols'	=> array(
				'type'			=> 'select',
				'description'	=> esc_attr__( 'Choose column for Grid style.', 'azonbooster' ),
				'default'		=> 'col-2',
				'label'			=> esc_attr__( 'Number of Columns', 'azonbooster' ),
				'choices'		=> array( 'col-1' => 1, 'col-2' => 2, 'col-3' => 3, 'col-4' => 4)
			),
			'image_section' => array(
				'type'			=> 'custom',
				'label'			=> '<h2>' . esc_attr__( 'Post Thumbnail', 'azonbooster') . '</h2>',
			),
			'image_show' => array(
				'type'			=> 'checkbox',
				'label'			=> esc_attr__( 'Show Thumbnail', 'azonbooster' ),
				'default'		=> true
			),
			'image_alignment'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Image Alignment', 'azonbooster' ),
				'default'		=> 'center',
				'choices'		=> array(
						'left'		=> esc_attr__('Left', 'azonbooster'),
						'center'	=> esc_attr__('Center', 'azonbooster'),
						'right'		=> esc_attr__('Right', 'azonbooster'),
				)
			),
			'image_pos'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Image Postion', 'azonbooster' ),
				'default'		=> 'after_title',
				'choices'		=> array(
						'befor_title'		=> esc_attr__('Before Title', 'azonbooster'),
						'after_title'	=> esc_attr__('After Title', 'azonbooster'),

				)
			),
			'post_content_section' => array(
				'type'			=> 'custom',
				'label'			=> '<h2>' . esc_attr__( 'Post Content', 'azonbooster') . '</h2>',
			),
			'post_content_type'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Content Type', 'azonbooster' ),
				'default'		=> 'excerpt',
				'priority'		=> 20,
				'choices'		=> array(
						'excerpt'		=> esc_attr__('Excerpt', 'azonbooster'),
						'none'		=> esc_attr__('None', 'azonbooster'),
				)
			),
			'post_excerpt_length'	=> array(
				'type'			=> 'number',
				'priority'		=> 2,
				'label'			=> esc_attr__( 'Excerpt Length (words)', 'azonbooster' ),
				'default'		=> 30
			),
			'post_content_title_el'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Title Element', 'azonbooster' ),
				'default'		=> 'h2',
				'choices'		=> array(
						'p'		=> 'p',
						'span'	=> 'span',
						'h1'	=> 'h1',
						'h2'	=> 'h2',
						'h3'	=> 'h3',
						'h4'	=> 'h4',
						'h5'	=> 'h5',
				)
			),
		);
}