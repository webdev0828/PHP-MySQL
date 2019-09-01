<?php 


class AzonBooster_Customizer {

	/**
	 * Theme Slug (Text Domain)
	 * 
	 * @var string
	 */
	protected $them_slug;

	public function __construct() {

		$this->them_slug = AzonBooster::get_theme_slug();

		$this->config_id = $this->them_slug . '_basic_opts';

		// Include Kirki Helper Class
		$this->includes();

		// Add Field
		add_action( 'init', array( $this, 'init_kirki' ) );
		add_action('customize_controls_print_scripts', array( $this, 'scripts') );
	}

	protected function includes() {
		require_once get_template_directory() . '/inc/helpers/include-kirki.php';
		require_once get_template_directory() . '/inc/helpers/class-azonbooster-kirki.php';
		require_once get_template_directory() . '/inc/customizer/fields/blog.php';
	}

	public function init_kirki() {

		AzonBooster_Kirki::add_config( $this->config_id, array(
			'capability'    => 'edit_theme_options',
			'option_type'   => 'option',
			'option_name'	=> $this->config_id . '_name'
		) );


		AzonBooster_Kirki::add_panel( 'azonbooster_blog_panel' , array(
		    'priority'    => 100,
		    'title'       => __( 'Blog', 'azonbooster' ),
		    'description' => __( 'The basic theme options for free version.', 'azonbooster' ),
		) );

		AzonBooster_Kirki::add_panel( 'azonbooster_home_panel' , array(
		    'priority'    => 101,
		    'title'       => __( 'AzonBooster Homepage', 'azonbooster' ),
		    'description' => __( 'Homepage control panel.', 'azonbooster' ),
		) );

		// Add customize sections and fields
		$this->add_sections_fields();
	}

	private function add_sections_fields() {

		$sections = apply_filters ('azonbooster_customize_sections', $this->default_sections() );

		$fields = apply_filters ('azonbooster_customize_fields', array() );

		// Generate sections
		foreach( $sections as $key => $section ) {

			AzonBooster_Kirki::add_section( $key, $section);

		}

		// Generate fields
		foreach ( $fields as $field) {

			AzonBooster_Kirki::add_field( $this->config_id, $field );
		}

	}

	protected function default_sections() {

		return array(
			'azonbooster_blog_layout_section' => array(
			    'title'          => __( 'Blog Layout', 'azonbooster' ),
			    'panel'          => 'azonbooster_blog_panel',
			    'priority'       => 10,
			),
			'azonbooster_blog_post_section' => array(
			    'title'          => __( 'Blog Posts', 'azonbooster' ),
			    'panel'          => 'azonbooster_blog_panel',
			    'priority'       => 20,
			),
			'azonbooster_blog_single_post_section' => array(
			    'title'          => __( 'Single Post', 'azonbooster' ),
			    'panel'          => 'azonbooster_blog_panel',
			    'priority'       => 30,
			),
			'azonbooster_blog_footer_widget_section' => array(
			    'title'          => __( 'Footer Widgets', 'azonbooster' ),
			    'panel'          => 'azonbooster_blog_panel',
			    'priority'       => 40,
			),
			'azonbooster_homepage_general_section' => array (

				'title'          => __( 'General', 'azonbooster' ),
			    'panel'          => 'azonbooster_home_panel',
			    'priority'       => 10,
			),
			'azonbooster_homepage_featured_posts_section' => array (

				'title'          => __( 'Featured Posts', 'azonbooster' ),
			    'panel'          => 'azonbooster_home_panel',
			    'priority'       => 20,
			),
			'azonbooster_homepage_content_section' => array (

				'title'          => __( 'Custom Content', 'azonbooster' ),
			    'panel'          => 'azonbooster_home_panel',
			    'priority'       => 30,
			)
		);
	}

	public function scripts() {
		
		global $azonbooster_version;

		/**
		* Styles
		 */
		wp_enqueue_style( 'azonbooster-customizer-style', get_template_directory_uri() . '/assets/sass/admin/customizer/customizer.css', '', $azonbooster_version );
	}

	/*
	protected function default_fields() {

		return array(

				array(
					'settings' => 'my_setting',
					'label'    => __( 'My custom control', 'translation_domain' ),
					'section'  => 'section_1',
					'type'     => 'text',
					'priority' => 10,
					'default'  => 'some-default-value',
				),

				array(
					'type'        => 'code',
					'settings'    => 'code_demo',
					'label'       => __( 'Code Control', 'my_textdomain' ),
					'section'     => 'section_2',
					'default'     => 'body { background: #fff; }',
					'priority'    => 10,
					'choices'     => array(
						'language' => 'css',
						'theme'    => 'monokai',
						'height'   => 250,
					)
			)
		);
	}
	*/
}

return new AzonBooster_Customizer();