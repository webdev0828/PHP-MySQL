<?php
/**
 * ultrabootstrap Theme Customizer
 *
 * @package ultrabootstrap
 */

function ultrabootstrap_customizer_register( $wp_customize ) 
    {
      // Do stuff with $wp_customize, the WP_Customize_Manager object.

      /**
       * Add postMessage support for site title and description for the Theme Customizer.
       *
       * @param WP_Customize_Manager $wp_customize Theme Customizer object.
       */

      $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
      $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
      if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
          'selector'        => '.site-title',
          'render_callback' => 'ultrabootstrap_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
          'selector'        => '.site-description',
          'render_callback' => 'ultrabootstrap_customize_partial_blogdescription',
        ) );
      }

      $wp_customize->add_panel( 'theme_option', array(
        'priority' => 200,
        'title' => __( 'Ultrabootstrap Options', 'ultrabootstrap' ),
        'description' => __( 'ultrabootstrap Options', 'ultrabootstrap' ),
      ));
      

      /**********************************************/
      /************* MAIN SLIDER SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('main_slider_category',array(
        'priority' => 50,
        'title' => __('Slider Categories','ultrabootstrap'),
        'description' => __('Select the Slide Category for Homepage.','ultrabootstrap'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting('slider_category_display',array(
        'sanitize_callback' => 'ultrabootstrap_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new ultrabootstrap_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display',array(
        'label' => __('Choose category','ultrabootstrap'),
        'section' => 'main_slider_category',
        'settings' => 'slider_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

       // no of posts to show on slider
    $wp_customize->add_setting( 'slider_no_of_posts', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
    'default'           => '3'
    ) );

    $wp_customize->add_control( 'slider_no_of_posts', array(
    'settings' => 'slider_no_of_posts',
    'label'                 =>  __( 'No Of Posts To Show On Slider', 'ultrabootstrap' ),
    'section'               => 'main_slider_category',
      
    'type'                  => 'select',
    'choices'               => array(
         '1' => __( '1', 'ultrabootstrap' ),
         '2' => __( '2 ', 'ultrabootstrap' ),
         '3' => __( '3', 'ultrabootstrap' ),
         '4' => __( '4', 'ultrabootstrap' ),
         '5' => __( '5', 'ultrabootstrap' ),
         '6' => __( '6', 'ultrabootstrap' ),
         '7' => __( '7', 'ultrabootstrap' ),
         '8' => __( '8', 'ultrabootstrap' ),
         '9' => __( '9', 'ultrabootstrap' )
                        ),
    'priority'              => '220'
    ) );



      /**********************************************/
      /*************** WELCOME SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('welcome_text',array(
        'priority' => 60,
        'title' => __('Welcome Section','ultrabootstrap'),
        'description' => __('Write Some Words for Welcome Section in Homepage','ultrabootstrap'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'welcome_textbox1',
          array(
            'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => 'WELCOME TO THE BOOTSTRAP THEME',
          )
      );

      $wp_customize->add_control(
        'welcome_textbox1',
          array(
          'label' => __('Welcome Heading','ultrabootstrap'),
          'section' => 'welcome_text',
          'settings' => 'welcome_textbox1',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'welcome_textbox2',
          array(
            'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => 'FREE RESPONSIVE, MULTIPURPOSE BUSINESS AND CORPORATE THEME PERFECT FOR ANY ONE',
          )
      );

      $wp_customize->add_control(
        'welcome_textbox2',
          array(
          'label' => __('Welcome Second Heading','ultrabootstrap'),
          'section' => 'welcome_text',
          'settings' => 'welcome_textbox2',
          'type' => 'text',
         )
      );


      $wp_customize->add_setting( 
        'textarea_setting' ,
          array(
            'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 
        )); 
   
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'textarea_setting', array( 
        'label' => __( 'Welcome Text Content', 'ultrabootstrap' ),
        'section' => 'welcome_text',
        'settings' => 'textarea_setting', 
        'type'     => 'textarea', 
        )));    


      $wp_customize->add_section('content' , array(
        'title' => __('Content','ultrabootstrap'),
      ));


      $wp_customize->add_setting(
        'welcome_button',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'welcome_button',
         array(
          'label' => __('Welcome Button Link','ultrabootstrap'),
          'section' => 'welcome_text',
          'settings' => 'welcome_button',
          'type' => 'text',
         )
      );      


      /**********************************************/
      /*************** FEATURES SECTION ****************/
      /**********************************************/

      $wp_customize->add_section('features_category',array(
        'priority' => 70,
        'title' => __('Features Categories','ultrabootstrap'),
        'description' => __('Select the Category for Features Section in Homepage','ultrabootstrap'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'features_title',
          array(
          'sanitize_callback' => 'ultrabootstrap_sanitize_text',
          'default' => '',
          
          )
       );
      $wp_customize->add_control(
        'features_title',
          array(
          'label' => __('Title','ultrabootstrap'),
          'section' => 'features_category',
          'settings' => 'features_title',
           'type' => 'text',
         )
      );

      $wp_customize->add_setting('features_display',array(
        'sanitize_callback' => 'ultrabootstrap_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new ultrabootstrap_Customize_Dropdown_Taxonomies_Control($wp_customize,'features_display',array(
        'label' => __('Choose category','ultrabootstrap'),
        'section' => 'features_category',
        'settings' => 'features_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));
      // no of posts to show on Featured
    $wp_customize->add_setting( 'featured_no_of_posts', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
    'default'           => '4'
    ) );

    $wp_customize->add_control( 'featured_no_of_posts', array(
    'settings' => 'featured_no_of_posts',
    'label'                 =>  __( 'No Of Posts To Show On Feature', 'ultrabootstrap' ),
    'section'               => 'features_category',
      
    'type'                  => 'select',
    'choices'               => array(
         '4' => __( '4', 'ultrabootstrap' ),
         '8' => __( '8 ', 'ultrabootstrap' ),
         '12' => __( '12', 'ultrabootstrap' )
                        ),
    'priority'              => '220'
    ) );

        
    /**********************************************/
    /*************** Default Post THumbnail ***************/
    /**********************************************/

    $wp_customize->add_section('default_thumbnail_section', array(
        'priority' => 75,
        "title" => 'Default Post Thumbnail',
        "description" => __('Set default post thumbnail', 'ultrabootstrap'),
        'panel' => 'theme_option'
    ));
    $wp_customize->add_setting('default_thumbnail', array(
        'default' => '',
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'default_thumbnail', array(
    'label' => __('Default Post Thumbnail', 'ultrabootstrap'),
    'section' => 'default_thumbnail_section',
    'settings' => 'default_thumbnail',
    ))
    );

    /**********************************************/
    /*************** Header Search ***************/
    /**********************************************/

    $wp_customize->add_section('header_search_section', array(
      'priority' => 40,
      "title" => 'Header Search',
      "description" => __('Enable / Disable Search in Top Navigation', 'ultrabootstrap'),
      'panel' => 'theme_option'
    ));
    $wp_customize->add_setting('header_search_setting', array(
      'default' => 1,
      'type' => 'theme_mod',
      'transport' => 'refresh',
      'sanitize_callback' => 'ultrabootstrap_sanitize_checkbox',
      'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control('header_search_control', array(
      'label' => __('Show the Header Search?', 'ultrabootstrap'),
      'section' => 'header_search_section',
      'settings' => 'header_search_setting',
      'description' => __( 'Toggle showing the header search input.', 'ultrabootstrap' ),
      'type' => 'checkbox'
    ));


      /**********************************************/
      /*************** SOCIAL SECTION ***************/
      /**********************************************/

       $wp_customize->add_section(
        'social_section',
          array(
            'priority' => 80,
            'title' => __('Social Info','ultrabootstrap'),
            'description' => 'Customize your Social Info',
            'panel' => 'theme_option'
        )
      );


      /**********************************************/
      /********** SOCIAL ICON LINKS SECTION ***********/
      /**********************************************/

      $wp_customize->add_setting(
        'facebook_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
          )
      );

      $wp_customize->add_control(
        'facebook_textbox',
          array(
            'label' => __('Facebook','ultrabootstrap'),
            'section' => 'social_section',
            'settings' => 'facebook_textbox',
            'type' => 'text',
            'default' =>'#'
          )
      );

      $wp_customize->add_setting(
        'twitter_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
          )
      );

      $wp_customize->add_control(
        'twitter_textbox',
         array(
          'label' => __('Twitter','ultrabootstrap'),
          'section' => 'social_section',
          'settings' => 'twitter_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'googleplus_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
            'default' => '#',
          )
      );

      $wp_customize->add_control(
        'googleplus_textbox',
          array(
          'label' => __('Googleplus','ultrabootstrap'),
          'section' => 'social_section',
          'settings' => 'googleplus_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'linkedin_textbox',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '',
          )
      );

      $wp_customize->add_control(
        'linkedin_textbox',
         array(
          'label' => __('Linkedin','ultrabootstrap'),
          'section' => 'social_section',
          'settings' => 'linkedin_textbox',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'pinterest_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
          'default' => '#',
          )
      );
      
      $wp_customize->add_control(
        'pinterest_textbox',
          array(
            'label' => __('Pinterest','ultrabootstrap'),
            'section' => 'social_section',
            'settings' => 'pinterest_textbox',
            'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'instagram_textbox',
          array(
            'sanitize_callback' => 'esc_url_raw',
          'default' => '#',
          )
      );
      
      $wp_customize->add_control(
        'instagram_textbox',
          array(
            'label' => __('Instagram','ultrabootstrap'),
            'section' => 'social_section',
            'settings' => 'instagram_textbox',
            'type' => 'text',
         )
      );
     
    }

add_action( 'customize_register', 'ultrabootstrap_customizer_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ultrabootstrap_customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ultrabootstrap_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _s_customize_preview_js() {
	wp_enqueue_script( '_s-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '_s_customize_preview_js' );

function ultrabootstrap_customizer_js() {
    wp_enqueue_script('ultra-customizer-js', get_template_directory_uri() . '/js/ultra-customizer.js', array('jquery'), '1.3.0', true);

    wp_localize_script( 'ultra-customizer-js', 'ultrabootstrap_customizer_js_obj', array(
        'pro' => __('Upgrade To Ultrabootstrap Pro','ultrabootstrap')
    ) );
    wp_enqueue_style( 'ultra-customizer-css', get_template_directory_uri() . '/css/ultra-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'ultrabootstrap_customizer_js' );

function ultrabootstrap_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function ultrabootstrap_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function ultrabootstrap_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function ultrabootstrap_sanitize_category($input){
  $output=intval($input);
  return $output;

}