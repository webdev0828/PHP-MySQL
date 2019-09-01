<?php
/**
 * Contains methods for customizing the theme customization screen.
 * @link https://codex.wordpress.org/Theme_Customization_API
 */
 
class typist_Customize {
   /**
    * This hooks into 'customize_register' and allows
    * you to add new sections and controls to the Theme Customize screen.
    */
   public static function typist_register ( $wp_customize ) {

        // Container Width
        $wp_customize->add_section( 'typist_container_width' , array(
        'title'      => __( 'Width', 'typist' ),
        'priority'   => 30,
        ));

        // Social Accounts
        $wp_customize->add_section( 'typist_social_section' , array(
        'title'      => __( 'Social Accounts', 'typist' ),
        'description' => __( '<strong>Enter full URL with http://</strong><br/> Leave empty to disable.', 'typist' ),
        'priority'   => 35,
        ));
		
        // Layout
        $wp_customize->add_section( 'typist_layout', array(
        'title'      => __('Layout', 'typist'),
        'priority'   => 40,
        ));
		
        // Font Options
        $wp_customize->add_section( 'typist_fonts' , array(
        'title'      => __( 'Fonts', 'typist' ),
        'priority'   => 50,
        ));
		
        // Meta Options
        $wp_customize->add_section( 'typist_meta' , array(
        'title'      => __( 'Meta Information', 'typist' ),
        'priority'   => 60,
        ));
		
        // -----------------------------------------------------------------------------

        /**
        * Show/Hide meta for posts
        */
        $wp_customize->add_setting( 'typist_show_meta', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_show_meta',
          array(
            'description' => __( 'Both single and blog views', 'typist' ),
            'type' => 'checkbox',
            'label' => __( 'HIDE ALL meta info for posts', 'typist' ),
            'section' => 'typist_meta',
            'std' => '0',
        ));
        // -----------------------------------------------------------------------------

        /**
        * Show/Hide meta for pages
        */
        $wp_customize->add_setting( 'typist_show_meta_pages', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_show_meta_pages',
          array(
            'type' => 'checkbox',
            'label' => __( 'HIDE ALL meta info for pages', 'typist' ),
            'section' => 'typist_meta',
            'std' => '0',
        ));
        // -----------------------------------------------------------------------------
		
        /**
        * Show/Hide categories on posts
        */
        $wp_customize->add_setting( 'typist_show_cat', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_show_cat',
          array(
            'type' => 'checkbox',
            'label' => __( 'Hide categories in meta info', 'typist' ),
            'section' => 'typist_meta',
            'std' => '1',
        ));
        // -----------------------------------------------------------------------------

        /**
        * Show/Hide date on posts
        */
        $wp_customize->add_setting( 'typist_show_date', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_show_date',
          array(
            'type' => 'checkbox',
            'label' => __( 'Hide date in meta info', 'typist' ),
            'section' => 'typist_meta',
        ));
        // -----------------------------------------------------------------------------
       
	    /**
        * Show/Hide tags on posts
        */
        $wp_customize->add_setting( 'typist_show_tags', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_show_tags',
          array(
            'type' => 'checkbox',
            'label' => __( 'Hide tags in meta info', 'typist' ),
            'section' => 'typist_meta',
        ));
        // -----------------------------------------------------------------------------
	    
		/**
        * Show/Hide comment count on posts
        */
        $wp_customize->add_setting( 'typist_show_comm', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_show_comm',
          array(
            'type' => 'checkbox',
            'label' => __( 'Hide comment link in meta info', 'typist' ),
            'section' => 'typist_meta',
        ));
        // -----------------------------------------------------------------------------
		
		/**
        * Show/Hide author on posts
        */
        $wp_customize->add_setting( 'typist_autho', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control(
          'typist_autho',
          array(
            'type' => 'checkbox',
            'label' => __( 'Hide author in meta info', 'typist' ),
            'section' => 'typist_meta',
        ));
        // -----------------------------------------------------------------------------

		/*
        * Color scheme
        */
        $wp_customize->add_setting('typist_blogscheme', array(
            'default'        => 'cherry',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_scheme'
        ));

        $wp_customize->add_control('typist_blogscheme', array(
            'label'      => __('Choose color scheme', 'typist'),
            'section'    => 'colors',
            'settings'   => 'typist_blogscheme',
            'description' => '',
            'type'       => 'radio',
            'choices'    => array(
                'cherry'	=>	__('Cherry', 'typist'),
                'greyscale'	=>	__('Greyscale', 'typist'),
                'mono'	=>		__('Monochrome', 'typist'),
                'dark'   =>	__('Dark', 'typist'),
                'terminal'   =>	__('Terminal', 'typist'),
                'beige'   =>	__('Beige', 'typist'),
                'gum'   =>	__('Bubblegum', 'typist')
                ),
        ));
        // -----------------------------------------------------------------------------
  
		/*
        * Blog Layout
        */
        $wp_customize->add_setting('typist_bloglayout', array(
            'default'        => 'left',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_layout',
        ));

        $wp_customize->add_control('typist_option_bloglayout', array(
            'label'      => __('Blog layout', 'typist'),
            'section'    => 'typist_layout',
            'settings'   => 'typist_bloglayout',
            'description' => '',
            'type'       => 'radio',
            'choices'    => array(
                'left' => __('Left Sidebar', 'typist'),
                'full_width' => __('Full Width / No sidebar', 'typist'),
                'right'   => __('Right Sidebar', 'typist')
                ),
        ));
        // -----------------------------------------------------------------------------
        
		/*
        * Post Layout
        */
        $wp_customize->add_setting('typist_postlayout', array(
            'default'        => 'left',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_layout',
        ));

        $wp_customize->add_control('typist_option_postlayout', array(
            'label'      => __('Single post layout', 'typist'),
            'section'    => 'typist_layout',
            'settings'   => 'typist_postlayout',
            'description' => '',
            'type'       => 'radio',
            'choices'    => array(
                'left' => __('Left Sidebar', 'typist'),
                'full_width' => __('Full Width / No sidebar', 'typist'),
                'right'   => __('Right Sidebar', 'typist')
                ),
        ));
        // -----------------------------------------------------------------------------
       
	    /*
        * Page Layout
        */
        $wp_customize->add_setting('typist_pagelayout', array(
            'default'        => 'left',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_layout',
        ));

        $wp_customize->add_control('typist_option_pagelayout', array(
            'label'      => __('Single page layout', 'typist'),
            'section'    => 'typist_layout',
            'settings'   => 'typist_pagelayout',
            'description' => '',
            'type'       => 'radio',
            'choices'    => array(
                'left' => __('Left Sidebar', 'typist'),
                'full_width' => __('Full Width / No sidebar', 'typist'),
                'right'   => __('Right Sidebar', 'typist')
                ),
        ));
        // -----------------------------------------------------------------------------
        
		/**
        * Site width
        */
        $wp_customize->add_setting('container_width', array(
            'default'        => '980px',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_width',
            ));

        $wp_customize->add_control('typist_option_container_width', array(
            'label'      => __('Width', 'typist'),
            'section'    => 'typist_container_width',
            'settings'   => 'container_width',
            'description' => __('Choose max site width (in pixels).', 'typist'),
            'type'       => 'radio',
            'choices'    => array(
			    '980px' => __('980', 'typist'),
                '1280px' => __('1280', 'typist'),
                '1400px' => __('1400', 'typist'),
                '1600px' => __('1600', 'typist'),
                '1920px' => __('1920', 'typist')
                ),
        ));
        // -----------------------------------------------------------------------------
 
	    /**
        Facebook
        */
        $wp_customize->add_setting('typist_social_facebook', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'transport' => 'postMessage', 
            'sanitize_callback' => 'sanitize_text_field',
            ));

        $wp_customize->add_control('typist_social_facebook', array(
            'label'      => __('Facebook', 'typist'),
            'section'    => 'typist_social_section',
            'settings'   => 'typist_social_facebook'
        ));
        // ----------------------------------------------------------------------------- 	

	    /**
        Instagram
        */
        $wp_customize->add_setting('typist_social_instagram', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
            ));

        $wp_customize->add_control('typist_social_instagram', array(
            'label'      => __('Instagram', 'typist'),
            'section'    => 'typist_social_section',
            'settings'   => 'typist_social_instagram'
        ));
        // -----------------------------------------------------------------------------  

	    /**
        Twitter
        */
        $wp_customize->add_setting('typist_social_twitter', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
            ));

        $wp_customize->add_control('typist_social_twitter', array(
            'label'      => __('Twitter', 'typist'),
            'section'    => 'typist_social_section',
            'settings'   => 'typist_social_twitter'
        ));
        // -----------------------------------------------------------------------------		
      
	    /**
        * Headings
        */
        $wp_customize->add_setting('typist_headings_font', array(
            'default'        => 'Fjalla One',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_fontfamily',
            ));

        $wp_customize->add_control('typist_headings_font', array(
            'label'      => __('Headings Font', 'typist'),
            'section'    => 'typist_fonts',
            'settings'   => 'typist_headings_font',
            'type'       => 'select',
            'choices'    => array(
				'Fjalla One' => 'Fjalla One', 
                'Oswald' => 'Oswald',
                'Francois One' => 'Francois One',
				'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
                'Roboto Slab' => 'Roboto Slab',		
                'BenchNine' => 'BenchNine',
                'Passion One' => 'Passion One',		
                'Open Sans' => 'Open Sans',
                'Noto Serif' => 'Noto Serif',
                'Noto Sans' => 'Noto Sans',
				'PT Sans' => 'PT Sans',
				'Fira Sans' => 'Fira Sans',	
                'Arial' => 'Arial',
                'Verdana' => 'Verdana',
                'Times New Roman' => 'Times New Roman',
                'Monospace' => 'Monospace',
                'Impact' => 'Impact'
				),
        ));
        // -----------------------------------------------------------------------------	
      
	    /**
        * Body Font
        */
        $wp_customize->add_setting('typist_body_font', array(
            'default'        => 'Noto Sans',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_fontfamily',
            ));

        $wp_customize->add_control('typist_body_font', array(
            'label'      => __('Body Font', 'typist'),
            'section'    => 'typist_fonts',
            'settings'   => 'typist_body_font',
            'type'       => 'select',
            'choices'    => array(
                'Noto Sans' => 'Noto Sans',
                'Noto Serif' => 'Noto Serif',
                'Open Sans' => 'Open Sans',
				'PT Sans' => 'PT Sans',
                'Roboto Slab' => 'Roboto Slab',	
				'Fira Sans' => 'Fira Sans',	
                'Arial' => 'Arial',
                'Verdana' => 'Verdana',
                'Times New Roman' => 'Times New Roman',
                'Monospace' => 'Monospace',
			    'Impact' => 'Impact'
				),
        ));	
        // -----------------------------------------------------------------------------	
       
	    /**
        * Headings
        */
        $wp_customize->add_setting('typist_headings_weight', array(
            'default'        => '400',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'transport' => 'postMessage', 
            'sanitize_callback' => 'typist_sanitize_weight',
            ));

        $wp_customize->add_control('typist_headings_weight', array(
            'label'      => __('Headings weight', 'typist'),
            'section'    => 'typist_fonts',
            'settings'   => 'typist_headings_weight',
            'description' => __('Bold or normal headings?', 'typist'),
            'type'       => 'select',
            'choices'    => array(
                '400' => __('Normal', 'typist'),
                '800' => __('Bold', 'typist'),
                ),
            ));	
        // -----------------------------------------------------------------------------

	    /**
        * Headings
        */
        $wp_customize->add_setting( 'typist_upper', array(
            'sanitize_callback' => 'typist_sanitize_checkbox',
        ));

        $wp_customize->add_control('typist_upper', array(
            'type' => 'checkbox',
            'label' => __( 'Transform all headings to UPPERCASE', 'typist' ),
            'section' => 'typist_fonts',
            'std' => '0',
        ));
        // -----------------------------------------------------------------------------		 
		    
	    /**
        logo (or title) alignment
        */
        $wp_customize->add_setting('logo_alignment', array(
            'default'        => 'left',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'sanitize_callback' => 'typist_sanitize_align',
            ));

        $wp_customize->add_control('typist_logo_alignment', array(
            'label'      => __('Logo/Title alignment', 'typist'),
            'section'    => 'title_tagline', 
            'settings'   => 'logo_alignment',
            'description' => __( 'Where will the logo be?', 'typist' ),
            'type'       => 'radio',
            'choices'    => array(
                'left' => __( 'Left', 'typist' ),
                'center' => __( 'Center', 'typist' ),
                'right' => __( 'Right', 'typist' ),
                ),
            ));	
        // -----------------------------------------------------------------------------
       
	    /**
        footer copyright text
        */
        $wp_customize->add_setting('footer_copyright', array(
            'default'        => '',
            'capability'     => 'edit_theme_options',
            'type'           => 'theme_mod',
            'transport'      => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            ));

        $wp_customize->add_control('typist_footer_copyright', array(
            'label'      => __('Footer Copyright', 'typist'),
            'section'    => 'title_tagline',
            'settings'   => 'footer_copyright'
        ));
        // -----------------------------------------------------------------------------           

		//Upgrade to PRO Section
		$wp_customize->add_section( 'typist_pro_add', array(
			  'priority'       => 1001,
			  'title'          => __('Upgrade to Typist Pro', 'typist'),
			  'description'    => __('<p>
			  Do you like The Typist theme? Get Typist Pro to support the developer and get even more exciting features:</p>
				<ul style="font-weight:bold;padding-left:10px;">
				<li>Premium widget pack. Pixel perfect and designed to look great with your theme.</li>
				<li>Ability to fully customise all the colors</li>
				<li>Breadcrumbs navigation support</li>
				<li>More social icons! All the major social networks are supported</li>
				<li>Featured image support for posts and pages</li>
				<li>Lifetime updates for Typist Pro theme</li>
				<li>Premium support for 1 year!</li>			
				</ul>		  
			  <h2 style="padding-left:10px;">
			  <a href="http://www.poisonedcoffee.com/typistpro/">Read More</a>
			  </h2>
			  <h2 style="padding-left:10px;"><a href="http://www.poisonedcoffee.com/forums/">Support forums</a>
			  </h2>
			  ', 'typist'),
			));
		// -----------------------------------------------------------------------------
		$wp_customize->add_setting('typist_pro_info', array(
          'sanitize_callback' => 'sanitize_text_field',
		  'type' => 'info_control',
		  'capability' => 'edit_theme_options',
		  )
		);
		$wp_customize->add_control( 'typist_pro_info_control', array(
			'section' => 'typist_pro_add',
			'settings' => 'typist_pro_info',
			'priority' => 10,
            'type'       => 'radio',
			'style' => 'display: none;',
			)
		);
		// ----------------------------------------------------------------------------- 

		// Stuff that uses live preview JS
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
        $wp_customize->get_setting( 'typist_headings_weight' )->transport = 'postMessage';
   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * Used by hook: 'wp_head'
    */
   public static function typist_header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
 
		  <?php 			
		  if (get_theme_mod('typist_show_date') == '1'){ ?>
			  .s_date {display: none;} <?php }		
		  if (get_theme_mod('typist_show_tags') == '1'){ ?>
			  .s_tags {display: none;} <?php }			
		  if (get_theme_mod('typist_show_cat') == '1'){ ?>
			  .s_category {display: none;} <?php }		
		  if (get_theme_mod('typist_show_comm') == '1'){ ?>
			  .s_comm {display: none;} <?php }		
		  if (get_theme_mod('typist_autho') == '1'){ ?>
			  .s_auth {display: none;} <?php } 	
		  if (get_theme_mod('typist_upper') == '1'){ ?>
			  h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1, h2, h3, h4, h5, h6, .site-description, .comment-author .fn {text-transform:uppercase;}<?php }
self::typist_generate_css('#logo', 'text-align', 'logo_alignment');  
self::typist_generate_css('.tlo', 'max-width', 'container_width');
self::typist_generate_css('body, input, select, textarea, .site-description', 'font-family', 'typist_body_font');
self::typist_generate_css('h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1, h2, h3, h4, h5, h6, .comments-title, .nav-links, .page-links', 'font-family', 'typist_headings_font');
self::typist_generate_css('h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1, h2, h3, h4, h5, h6, .site-description', 'font-weight', 'typist_headings_weight');
?>
 	
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
   
   /**
   Outputs the javascript needed to automate the live settings preview.
    */
   public static function typist_live_preview() {
      wp_enqueue_script( 'theme-customizer', get_template_directory_uri() . '/bit/theme-customizer.js', array(  'jquery', 'customize-preview' ), '', true);
   }

    /**
	Generate a line of CSS for use in header output. If the setting ($mod_name) has no defined value, the CSS will not be output.
     */
   public static function typist_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
	$return = '';
	$mod = esc_attr( get_theme_mod($mod_name) );
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'typist_Customize' , 'typist_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'typist_Customize' , 'typist_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'typist_Customize' , 'typist_live_preview' ) );
?>