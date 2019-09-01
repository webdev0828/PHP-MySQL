<?php
/*
 * Plugin:      reCAPTCHA in WP comments form
 * Path:        /includes
 * File:        backend-interface.php
 * Since:       0.0.2
 */
 
/*
 * Class:       griwpc_standard_backend_interface
 * Version:     9.1.0
 * Description: This class creates the settings page and the fields for configuration. When plugin has not the Google reCAPTCHA API Keys pair, 
 *				this class doesn't works because the plugin switches to installation wizard.
 *
 * Primitive:	griwpc_backend_interface
 */

// Back-End Interface Class 
class griwpc_standard_backend_interface extends griwpc_backend_interface {
	
	public function creating_admin_interface ( $screen ) {
		
		if ( $screen->base != 'settings_page_google_recaptcha_in_wp_comments_settings' ) 
			return;
		parent::creating_admin_interface ( $screen );
		
		// Loading scripts and styles
		add_action ( "load-$screen->base",	array ( $this, 'create_reCAPTCHA' ), 10, 0 );
		
	}

	public function create_reCAPTCHA () {
		
		$this->reCAPTCHA = new griwpc_recaptcha ( $this->version, $this->settingsClass );
		
	}
	
	// Creating Help text for plugin settings page
	public function screen_help() {

		// Sidebar for help pages
		griwpc_messages::sidebar_help();
		
		// 'About' Tab
		griwpc_messages::tab_about( $this->options, NULL );
		
		// 'Change API Key pair' Tab
		griwpc_messages::tab_changing_API_Keys ( $this->options, NULL );

		// 'reCAPTCHA Customizer' Tab
		griwpc_messages::tab_reCAPTCHA_customizer( $this->options, NULL );

		// 'Plugin Settings' Tab
		griwpc_messages::tab_plugin_settings( $this->options, NULL );
		
		// 'Security' Tab
		griwpc_messages::tab_security( $this->options, NULL );
		
		// 'Accesibility' Tab
		griwpc_messages::tab_accessibility( $this->options, NULL );
		
		// 'I don't see recaPTCHA' Tab
		griwpc_messages::tab_idontseerecaptacha ( $this->options, NULL );
		
	}


	// Adding metaboxes to the accordion sections
	public function adding_metaboxes ( ) {
		
		$screen = get_current_screen();

		add_meta_box ( 'recaptcha_activation', $this->sections['activation'], array( $this, 'recaptcha_activation_function_callback' ), $screen, 'side', 'default' );
		add_meta_box ( 'recaptcha_keys', $this->sections['apiKeys'], array( $this, 'recaptcha_keys_function_callback' ), $screen, 'side', 'default' );
		add_meta_box ( 'recaptcha_settings', $this->sections['recaptchaSettings'], array( $this, 'recaptcha_settings_function_callback' ), $screen, 'side', 'default' );
		add_meta_box ( 'antispam_settings', $this->sections['antispamSettings'], array( $this, 'antispam_settings_function_callback' ), $screen, 'side', 'default' );
		add_meta_box ( 'plugin_settings', $this->sections['pluginSettings'],	array( $this, 'plugin_settings_function_callback' ), $screen, 'side', 'default' );
		add_meta_box ( 'output_settings', $this->sections['outputModeSettings'], array( $this, 'output_settings_function_callback' ), $screen, 'side', 'default' );
	
	}


	// Actions for enqueueing Scripts and Styles
	public function enqueue_admin_scripts_and_styles () {

		add_action ( 'admin_enqueue_scripts', array ( $this, 'register_scripts' ), 20, 0 );
		add_action ( 'admin_enqueue_scripts', array ( $this, 'register_styles'  ), 20, 0 );
		
	}

	// Loading Back-End Scripts and Styles
	public function register_scripts () {

		// Plugin Back-End script
		wp_register_script ( 'griwpc-admin', __GRIWPC_URL__ . 'js/backend-interface.js', array ( 'griwpc-base', 'common', 'jquery-ui-selectmenu', 'post' ), $this->version, TRUE  );

		$translation_array = array (

			'statusActive'      => $this->strings['isON'],
			'statusInactive'    => $this->strings['isOFF'],

			'negotiating'		=> __( 'Connecting with Google reCAPTCHA server...', 'recaptcha-in-wp-comments-form' ),
			'connected' 		=> __( 'Connected', 'recaptcha-in-wp-comments-form' ),
			'disconnected' 		=> __( 'Disconnected', 'recaptcha-in-wp-comments-form' ),
			'invalidPair'   	=> __( 'Error. Your reCAPTCHA API Key pair is not valid.', 'recaptcha-in-wp-comments-form' ),

		);
		wp_localize_script ( 'griwpc-admin', 'griwpbi', $translation_array );
		wp_enqueue_script ( 'griwpc-admin' );

	}


	// Loading Back-End Scripts and Styles
	public function register_styles () {

		wp_register_style (
			'recaptcha-google-fonts', 
			'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900&amp;subset=latin%2Clatin-ext',
			array (),
			$this->version,
			'screen'
		);
		wp_register_style (
			'jquery-ui-style',
			__GRIWPC_URL__ . 'css/jquery-ui.min.css',
			array ( 'wp-admin', 'recaptcha-google-fonts' ),
			'1.12.0',
			'all'
		);
		wp_register_style (
			'griwpc-admin',
			__GRIWPC_URL__ . 'css/backend-interface.css',
			array ( 'jquery-ui-style' ),
			$this->version,
			'all'
		);
		wp_enqueue_style  ( 'griwpc-admin' );
		
		$len = max( strlen ( $this->strings['isOFF']) , strlen ( $this->strings['isON']) );
		$plus = 0;
		if ( $len > 3 ) {
			$plus = ( ( 14 * ( $len - 3 )) + 10 );
		}

		$outCSS = '.slideThree:after { content: "' . $this->strings['isOFF'] . '"; }' . '.slideThree:before { content: "' . $this->strings['isON'] . '"; }';
		if ( $plus > 0 )
			$outCSS .= '.slideThree { width: ' . ( 80 + $plus ) . 'px; }' . 
					   '.slideThree label {	width: ' . ( 34 + ( $plus / 2 )  ) . 'px; }' .
					   '.slideThree input[type=checkbox]:checked + label { left: ' . ( 43 + ($plus/2) ) . 'px; }';

			$outCSS .= '.slideThree.small { width: ' . ( 56 + $plus ) . 'px; }' . 
					   '.slideThree.small label {	width: ' . ( 25 + ( $plus / 2 )  ) . 'px; }' .
					   '.slideThree.small input[type=checkbox]:checked + label { left: ' . ( 28 + ($plus/2) ) . 'px; }';

		wp_add_inline_style ( 'griwpc-admin', $outCSS );
		
	}

	/*
	 *
	 * Screen construction callback functions
	 *
	 */
	 
	// Global callback function. 
	// It creates the three areas of the screen
	public function settings_page_function_callback () {

		$user_ID = wp_get_current_user()->ID;

		echo '<div class="wrap">';
		echo '<h2 class="recaptcha-plugin-title" >' . __GRIWPC__ . '</h2>';
			
			echo '<div id="nav-menus-frame" class="wp-clearfix">';
			
				echo '<div id="menu-settings-column" class="metabox-holder">';

					// Area 1: Plugin status Icons
					echo '<div class="manage-menus manage-menus-status">';
						$this->recaptcha_status();
					echo '</div>';

					echo '<div class="clear"></div>';

					// Area 2: Plugin Interface
					echo '<form id="griwpc-form" class="griwpc-form" action="options.php" method="POST" >';
					
						echo '<input type="hidden" id="user-id" name="user_ID" value="' . (int) $user_ID .'" />';
						
						wp_nonce_field( 'meta-box-order',	'meta-box-order-nonce', false );
						wp_nonce_field( 'closedpostboxes',	'closedpostboxesnonce', false );
					
						do_accordion_sections( get_current_screen(), 'side', $this->options );
						$this->saving_settings_function_callback();
						
					echo '</form>';
				echo '</div>';
				
				echo '<div id="menu-management-liquid">';

					// Area 3: Plugin messages
					echo '<div class="manage-menus manage-menus-messages">';

						echo '<p>' . sprintf( __( 'For further information see the <strong>Help</strong> tab of this screen, or visit the <a href="%1$s" target="_blank" >Author\'s plugin page</a> or the <a href="%2$s" target="_blank" >Google reCAPTCHA</a> website.', 'recaptcha-in-wp-comments-form' ), __GRIWPC_SITE__,__GRIWPC_RECAPTCHA_SITE__ ) . '</p>';

						echo '<p>' . sprintf( __( 'If you like this plugin, please, consider activate the small <strong>credit link</strong> of the plugin in the accordion section <strong>%1$s</strong> and I would be grateful if you rate the plugin in <a href="%2$s" target="_blank" >Wordpress plugin page</a>.', 'recaptcha-in-wp-comments-form' ), $this->sections['outputModeSettings'], __GRIWPC_WP_SITE__ ) . '</p>';

					echo '</div>';

					echo '<div class="clear"></div>';

					// Area 4: Form sample
					echo '<div id="menu-management">';
						$this->construct_form_example();
					echo '</div>';
				echo '</div>';
			
			echo '</div>';

		echo '</div>';

	}



	// Area 1: Plugin status
	public function recaptcha_status() {

		echo '<span id="plugin-status-icon" class="status-dashicons dashicons dashicons-admin-plugins is-unknown" data-title="' . __( 'Plugin Status', 'recaptcha-in-wp-comments-form' ) . '"></span>';
		echo '<span id="recaptcha-status-icon" class="status-dashicons dashicons is-unknown" data-title="' . __( 'reCAPTCHA Operation', 'recaptcha-in-wp-comments-form' ) . '"></span>';

		echo '<span id="recaptcha-settings-icon" class="status-dashicons dashicons dashicons-admin-generic" data-title="' . __( 'reCAPTCHA Settings', 'recaptcha-in-wp-comments-form' ) . '" ></span>';
		
		echo '<span id="recaptcha-mode-icon" class="status-dashicons dashicons" data-title="' . __( 'Antispam Action', 'recaptcha-in-wp-comments-form' ) . '" ><img/></span>';

		echo '<span id="credits-status-icon" class="status-dashicons dashicons dashicons-smiley is-unknown" data-title="' . __( 'Plugin Credits', 'recaptcha-in-wp-comments-form' ) . '"></span>';		

		echo '<span id="plugin-version" class="status-dashicons dashicons dashicons-admin-tools" data-title="' . __( 'Plugin version', 'recaptcha-in-wp-comments-form' ) . '" data-value="' . $this->version . '" ></span>';

		echo '<span id="php-version" class="status-dashicons dashicons" data-title="' . __( 'PHP version', 'recaptcha-in-wp-comments-form' ) . '" data-value="' . phpversion() . '" >' . griwpc_tools::echo_php_logo() . '</span>';

	}



	// Area 2.1 is created via metaboxes, see Metaboxes callback functions for accordion sections below



	// Area 2.2: Example form sample
	public function construct_form_example() {

		$valueSite   = ( ( isset ( $this->options['site_key'] )   && ( $this->options['site_key']   != '' )) ? $this->options['site_key']   : FALSE );
		$valueSecret = ( ( isset ( $this->options['secret_key'] ) && ( $this->options['secret_key'] != '' )) ? $this->options['secret_key'] : FALSE );
		$htmlTag     = ( ( isset ( $this->options['recaptcha_tag'] ) && ( $this->options['recaptcha_tag'] != '' )) ? $this->options['recaptcha_tag'] : 'p' );
		$c 			 = ( isset ( $this->options['active'] ) && ! empty ( $this->options['active'] ) );

		echo '<div class="menu-edit ">';
			echo '<div id="nav-menu-header">';
				echo '<h3>' . __( 'Comments form sample', 'recaptcha-in-wp-comments-form' ) . '<span class="is-help-button dashicons dashicons-editor-help" data-container="div" ></span></h3>';

				echo '<div class="help-text _closed" ><p>' . __( 'This is just a sample form not a real wp comments form. It\'s just for checking the connection with reCAPTCHA service and for helping the user with the Google reCAPTCHA plugin options (shape, color, position, etc. ) therefore, if you need a complete and real operation test, please, logout as WP Administrator, go to any real single post and check how the reCAPTCHA plugin appears and works.', 'recaptcha-in-wp-comments-form' ) . '</p></div>';

			echo '</div>';

			echo '<div id="post-body">';
			
				echo '<div id="post-body-content" class="wp-clearfix">';
					echo '<div id="commentformdiv" class="comment-form-example">';
						echo '<h2 id="reply-title" class="comment-reply-title">' . __( 'Leave a Reply', 'recaptcha-in-wp-comments-form' ) . '</h2>';
						
						echo '<form id="commentform" class="comment-form">';
						
							echo '<p class="comment-notes">';
							echo '<span id="email-notes">' . __( 'Your email address will not be published.', 'recaptcha-in-wp-comments-form' ) . '</span>';
							echo sprintf( ' ' . __('Required fields are marked %s', 'recaptcha-in-wp-comments-form' ), '<span class="required">*</span>');
							echo '</p>';
							echo '<p><label for="comment">' . _x( 'Comment', 'noun', 'recaptcha-in-wp-comments-form' ) . '</label> <textarea id="comment" class="field-example" rows="5" readonly>' . __( 'This is a comment text sample with one paragraph.', 'recaptcha-in-wp-comments-form' ) . '</textarea></p>';
							echo '<p><label for="author">'  . __( 'Name', 'recaptcha-in-wp-comments-form' ) . ' <span class="required">*</span>' . '</label> <input id="author" type="text" class="field-example" readonly value="' . __( 'John Doe Doe', 'recaptcha-in-wp-comments-form' ) . '"/></p>';
							echo '<p><label for="email">'   . __( 'Email', 'recaptcha-in-wp-comments-form' ) . ' <span class="required">*</span>' . '</label> <input id="email" type="email" class="field-example" readonly value="' . __( 'address@example.com', 'recaptcha-in-wp-comments-form' ) . '"></p>';
							echo '<p><label for="url">'     . __( 'Website', 'recaptcha-in-wp-comments-form' ) . '</label> <input id="url" type="url" class="field-example" readonly value="' . __( 'http://example.com', 'recaptcha-in-wp-comments-form' ) . '"></p>';
							
							echo '<p id="form-plugin-inactive-msg" class="warning" >' . sprintf( __( 'Plugin Inactive. You have to activate the plugin in <strong>%s</strong> accordion section.', 'recaptcha-in-wp-comments-form' ), $this->sections['activation'] ) . '</p>';

							if ( $this->options['old_themes_compatibility'] != 1 )
								echo $this->reCAPTCHA->render_HTML ( $htmlTag, $this->options );
						
							echo '<p><input id="submit" class="submit button button-secondary" value="' . __( 'Post Comment', 'recaptcha-in-wp-comments-form' ) . '"></p>';
						
						echo '</form>';
						
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';

	}


	// Area 2.1: Accordion Sections
	/*
	 *
	 * Metaboxes callback functions for accordion sections
	 *
	 */

	public function recaptcha_activation_function_callback ( $options ) {
		
		$active = (boolean) isset ( $options['active'] ) ? $options['active'] : $this->defaults['active'];
		$this->settingsClass->reCaptchaActive( $active );

	}

	public function recaptcha_keys_function_callback ( $options ) {

		echo '<p>Paste the <span class="warning">Google reCAPTCHA API Keys pair</span> values here</p>';

		$vSite	 = isset ( $options['site_key'] )	? $options['site_key']   : NULL;
		$vSecret = isset ( $options['secret_key'] ) ? $options['secret_key'] : NULL;

		$this->settingsClass->siteKey( $vSite );
		$this->settingsClass->secretKey( $vSecret );

	}
	
	public function recaptcha_settings_function_callback ( $options ) {

		$valueTheme = isset ( $options['recaptcha_theme'] )	? $options['recaptcha_theme']	: $this->defaults['recaptcha_theme'];
		$valueSize	= isset ( $options['recaptcha_size'] )	? $options['recaptcha_size']	: $this->defaults['recaptcha_size'];
		$valueType	= isset ( $options['recaptcha_type'] )	? $options['recaptcha_type']	: $this->defaults['recaptcha_type'];
		$valueAlign	= isset ( $options['recaptcha_align'] )	? $options['recaptcha_align']	: $this->defaults['recaptcha_align'];
		$language	= isset ( $options['recaptcha_lang'] )	? $options['recaptcha_lang']	: $this->defaults['recaptcha_lang'];

		$this->settingsClass->reCaptchaTheme( $valueTheme );
		$this->settingsClass->reCaptchaSize( $valueSize );
		$this->settingsClass->reCaptchaType( $valueType );
		$this->settingsClass->reCaptchaAlign( $valueAlign );
		$this->settingsClass->reCaptchaLanguage( $language );

	}
	
	public function antispam_settings_function_callback ( $options ) {
		
		$mode		= isset ( $options['recaptcha_mode'] )	? $options['recaptcha_mode']	: $this->defaults[ 'recaptcha_mode' ];

		echo '<p>' . __( 'When the plugin detects an unauthorized comment or a security breach, which action do you want to do?', 'recaptcha-in-wp-comments-form' ) . '</p>';
		$this->settingsClass->reCaptchaMode( $mode );
//		echo '<hr style="margin:2rem 0rem 1.5rem 0rem;" />';

	}
	
	public function plugin_settings_function_callback ( $options ) {

		$formID			= isset ( $options['formID'] )			? $options['formID']			: $this->defaults[ 'formID' ];
		$formQuery		= isset ( $options['formQuery'] )		? $options['formQuery']			: $this->defaults[ 'formQuery' ];
		$formQueryElem	= isset ( $options['formQueryElem'] )	? $options['formQueryElem']		: $this->defaults[ 'formQueryElem' ];

		$buttonID			= isset ( $options['buttonID'] )		? $options['buttonID']			: $this->defaults[ 'buttonID' ];
		$buttonQuery		= isset ( $options['buttonQuery'] )		? $options['buttonQuery']		: $this->defaults[ 'buttonQuery' ];
		$buttonQueryElem	= isset ( $options['buttonQueryElem'] )	? $options['buttonQueryElem']	: $this->defaults[ 'buttonQueryElem' ];

		$tag		= isset ( $options['recaptcha_tag'] )	? $options['recaptcha_tag']		: $this->defaults[ 'recaptcha_tag' ];
		$css		= isset ( $options['recaptcha_css'] )	? $options['recaptcha_css']		: $this->defaults[ 'recaptcha_css' ];

		$standardQueries = isset ( $options['standardQueries'] ) ? $options['standardQueries'] : $this->defaults[ 'standardQueries' ];

		echo '<div>';
		echo '<p>' . sprintf( _x( 'About %1$s button in all fields of this section', '1: restore defaults icon', 'recaptcha-in-wp-comments-form' ), '<span class="dashicons dashicons-image-rotate dashicons-in-text" title="Restore default values"></span>' ) . '<span class="is-help-button dashicons dashicons-editor-help" data-container="div" ></span>' . '</p>';
		
		echo '<div class="help-text _closed" >';
			echo '<p>' . __( 'Press these buttons for <strong>restoring separately</strong> each one of the <strong>original plugin default values</strong>.', 'recaptcha-in-wp-comments-form' )  . '</p>';
			echo '<p>' . __( 'So that, if you have deleted (or forgot) accidentally any of these next values, you\'ve changed your WP theme and the reCAPTCHA field doesn\'t appear, you are testing a new configuration or whatever... Don\'t worry, just relax you and press these buttons each time you need it.', 'recaptcha-in-wp-comments-form' )  . '</p>';
		echo '</div>';
		echo '</div>';

		echo '<hr style="margin:2rem 0rem 1.5rem 0rem;" />';

		$data = (object) array ( 
			'formID' 			=> $formID, 
			'formQuery' 		=> $formQuery,
			'formQueryElem' 	=> $formQueryElem,
			'buttonID' 			=> $buttonID, 
			'buttonQuery' 		=> $buttonQuery,
			'buttonQueryElem'	=> $buttonQueryElem,
		);

		$this->settingsClass->standardQueries ( $standardQueries, $data, 1 );
		$this->settingsClass->recaptchaTag( $tag, 2 );
		$this->settingsClass->recaptchaCSS( $css, 3 );

	}
	
	public function output_settings_function_callback ( $options ) {

		$oldThemeMode = isset ( $options['old_themes_compatibility'] )	? $options['old_themes_compatibility']	: -1;
		$allowCreditMode = isset ( $options['allowCreditMode'] ) ? $options['allowCreditMode']	: $this->defaults[ 'allowCreditMode' ];
		
		echo '<p>' . __( 'If your theme doesn\'t use the WP function <code>comment_form()</code> but it makes a direct PHP output of the form code, you should activate the <strong>Javascript Output Mode</strong> to see the reCAPTCHA field.', 'recaptcha-in-wp-comments-form' ) . '</p>';
		$this->settingsClass->javascriptOutputMode( $oldThemeMode );
		
		echo '<hr style="margin:2rem 0rem 1.5rem 0rem;" />';

		echo '<p>' . __( 'Do you like this plugin? Please, allow you a little credits output.', 'recaptcha-in-wp-comments-form' ) . '</p>';
		$this->settingsClass->allowCreditsModeCallback( $allowCreditMode );


	}
	

	// It works as a callback function but it's not a call back function for any accordion section.
	// A jQuery function puts this pseudo-section code at the end of accordion sections list for showing just the save button
	public function saving_settings_function_callback () {
		
		echo '<div id="form-actions-section" class="control-section accordion-section form-actions-section">';
			echo '<div class="accordion-section-content ">';
				echo '<div class="inside">';

					settings_fields( 'griwpc_settings' );
					echo '<div class="major-publishing-actions wp-clearfix">';
						echo'<div class="publishing-action">';
							submit_button();
						echo '</div><!-- END .publishing-action -->';
					echo '</div><!-- END .major-publishing-actions -->';

				echo '</div><!-- .inside -->';
			echo '</div><!-- .accordion-section-content -->';
		echo '</div>';

	}
	

}
