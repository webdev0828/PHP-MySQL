<?php
/*
 * Plugin:      reCAPTCHA in WP comments form
 * Path:        /includes
 * File:        tools.php
 * Since:       0.0.9
 */
 
/*
 * Class:       griwpc_settings
 * Version:     0.0.9.0.2
 * Description: The class controls the settings of the plugin: initialization, creation, fields, etc.
 */

class griwpc_settings {

	private $options;
	private $defaults;
	private $optionsKey;
	private $msgs = array();

	private $querymodesDescription;

	public function __construct() {
		
		$this->optionsKey	= 'griwpc-params';
		$this->set_defaults();
		$this->set_options();
		add_action ( 'current_screen', array( $this, 'current_screen' ), 10, 1);
		
	}

	function  current_screen () {
		$this->msgs = griwpc_messages::get_settings_strings_array();
	}
	
	/**
	 * Plugin default options values
	 */

	// Set default options values
	public function set_defaults () {
		$this->defaults	= parse_ini_file( __GRIWPC_ABS__ . "/includes/config.ini" );
		$this->defaults['recaptcha_css'] = str_replace( '\\n', "\n", $this->defaults['recaptcha_css'] );
	}

	// Get default options values
	public function get_defaults () {
		return $this->defaults;
	}


	/**
	 *
	 * Plugin option values
	 *
	 */

	// Create a new array of options on installation
	public function create_options() {
	 	add_option ( $this->optionsKey, $this->get_defaults() );
	}

	// Get the array of options	
	public function get_options( $key = NULL ) {
		return $this->options;		
	}

	// Set the array of options	
	public function set_options( $key = NULL ) {
		$this->options = get_option ( $this->optionsKey );
	}

	public function update_options( $options = NULL ) {
		update_option ( $this->optionsKey, $options );	
	}
		
	// Register array of settings	
	public function settings_register () {
		register_setting( 'griwpc_settings', $this->optionsKey, array ( $this, 'settings_sanitize_function_callback' ) );
	}

	// Register array of settings	
	public function settings_sanitize_function_callback ( $input ) {
		
		$input = wp_parse_args( $input, $this->get_defaults() );
		
	 	if ( count ( $input ) ) {
			
			add_settings_error(
				'saving_plugin_options', 
				'settings_updated', 
				// Avoid the forced <strong></strong> tag in settings messages
				'</strong>' . $this->msgs['adminNoticeSaved'] . '<strong>', 
				'updated'
			);
		}
		
		if ( griwpc_tools::check_google_API_keys_pair( $input ) === FALSE ) {
			
			$strings	= griwpc_messages::get_screen_strings_array();
		
			add_settings_error(
				'empty_reCAPTCHA_API_Keys_pair',
				'settings_updated',
				// Avoid the forced <strong></strong> tag in settings messages
				'</strong>' . sprintf ( $this->msgs['invalidGoogleRecaptchaPair'], $strings['googleKeysPair'] ) . '<strong>',
				'error'
			);
			
		}

		return $input;
		
	}


	public function check_upgrade_settings ( $current_version, $old_version ) {

		$options = $this->options;

		// current > 0.0.8.1 
		if ( version_compare ( $current_version, '0.0.8.1', '>' ) ) {
			
			if ( ! isset ( $options['allowCreditMode'] ) ) {
				$options['allowCreditMode'] = 0;
			}
			
		}

		if ( version_compare ( $current_version, '0.0.8.2', '>' ) ) {

			if ( ! isset ( $options['recaptcha_align'] ) ) {
				$options['recaptcha_align'] = is_rtl() ? 'right' : 'left';
			}

		}
		
		$this->update_options( $options );

	}


	/*
	 *
	 * Plugin settings field functions
	 *
	 */

	// Plugin Activation Fields
	public function reCaptchaActive ( $value = NULL ) {
		echo '<legend class="howto" >' . __ ( 'reCAPTCHA', 'recaptcha-in-wp-comments-form' ) . '</legend>';
		echo '<input type="hidden" name="griwpc-params[active]" value="0"/>';
		echo '<div class="slideThree wp-ui-primary">';
			echo '<input type="checkbox" id="griwpc_params_active" name="griwpc-params[active]" value="1" ' . checked( $value, 1, FALSE ) . '/>';
			echo '<label for="griwpc_params_active" class="wp-ui-highlight" ></label>';
		echo '</div>';
	}


	// reCAPTCHA API Keys Fields
	public function siteKey ( $value = NULL ) {
		echo '<p id="menu-item-sitekey-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_site_key">'   . __ ( 'Site key', 'recaptcha-in-wp-comments-form' )   . '</label>';
		echo '<input type="text" id="griwpc_params_site_key" name="griwpc-params[site_key]" class="code menu-item-textbox" value="' . $value . '" placeholder="' . __ ( 'Paste your Site key here', 'recaptcha-in-wp-comments-form' ) . '" />';
		echo '</p>';
	}

	public function secretKey ( $value = NULL ) {
		echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_secret_key">' . __ ( 'Secret key', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input type="text" id="griwpc_params_secret_key" name="griwpc-params[secret_key]" class="code menu-item-textbox" value="' . $value . '" placeholder ="' . __ ( 'Paste your Secret key here', 'recaptcha-in-wp-comments-form' ) . '" />';
		echo '</p>';
	}


	// reCAPTCHA Customizer Fields
	public function reCaptchaTheme ( $value = NULL ) {
		echo '<p id="menu-item-recaptchatheme-wrap" class="radio-image-container wp-clearfix">';
			echo '<legend class="howto" >' . __ ( 'Theme', 'recaptcha-in-wp-comments-form' ) . '<span class="wp-ui-text-highlight actual-selection"></span></legend>';

			echo '<span class="options-switcher wp-ui-primary">';
				echo '<label for="griwpc_params_recaptcha_theme_1">';
				$check = checked( $value, 'light', FALSE );
				echo '<input data-part="recaptcha_theme" type="radio" id="griwpc_params_recaptcha_theme_1" name="griwpc-params[recaptcha_theme]" class="code menu-item-textbox radioImage" value="light" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-light.png" title="' . _x( 'Light', 'Google reCAPTCHA option name. Don\'t translate if it\'s not necessary.', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
				
				echo '<label for="griwpc_params_recaptcha_theme_2">';
				$check = checked( $value, 'dark', FALSE );
				echo '<input data-part="recaptcha_theme" type="radio" id="griwpc_params_recaptcha_theme_2" name="griwpc-params[recaptcha_theme]" class="code menu-item-textbox radioImage" value="dark" ' .  $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-dark.png" title="' . _x( 'Dark', 'Google reCAPTCHA option name. Don\'t translate if it\'s not  necessary.', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
			echo '</span>';
		
		echo '</p>';
	}

	public function reCaptchaSize ( $value = NULL ) {
		echo '<p id="menu-item-recaptchasize-wrap" class="radio-image-container wp-clearfix">';
			echo '<legend class="howto" >' . __ ( 'Size', 'recaptcha-in-wp-comments-form' ) . '<span class="wp-ui-text-highlight actual-selection"></span></legend>';
			echo '<span class="options-switcher wp-ui-primary">';
				echo '<label for="griwpc_params_recaptcha_size_1">';
				$check = checked( $value, 'normal', FALSE );
				echo '<input data-part="recaptcha_size" type="radio" id="griwpc_params_recaptcha_size_1" name="griwpc-params[recaptcha_size]" class="code menu-item-textbox radioImage" value="normal" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-normal.png" title="' . _x( 'Normal', 'Google reCAPTCHA option name. Don\'t translate if it\'s not necessary.', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
				
				echo '<label for="griwpc_params_recaptcha_size_2">';
				$check = checked( $value, 'compact', FALSE );
				echo '<input data-part="recaptcha_size" type="radio" id="griwpc_params_recaptcha_size_2" name="griwpc-params[recaptcha_size]" class="code menu-item-textbox radioImage" value="compact" ' .  $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-compact.png" title="' . _x( 'Compact', 'Google reCAPTCHA option name. Don\'t translate if it\'s not necessary.', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
			echo '</span>';
		echo '</p>';
	}

	public function reCaptchaType ( $value = NULL ) {
		echo '<p id="menu-item-recaptchatype-wrap" class=" radio-image-container wp-clearfix">';
			echo '<legend class="howto" >' . __ ( 'Type', 'recaptcha-in-wp-comments-form' ) . '<span class="wp-ui-text-highlight actual-selection"></span></legend>';
			echo '<span class="options-switcher wp-ui-primary">';
				echo '<label for="griwpc_params_recaptcha_type_1">';
				$check = checked( $value, 'image', FALSE );
				echo '<input data-part="recaptcha_type" type="radio" id="griwpc_params_recaptcha_type_1" name="griwpc-params[recaptcha_type]" class="code menu-item-textbox radioImage" value="image" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-image.png" title="' . _x( 'Image', 'Google reCAPTCHA option name. Don\'t translate if it\'s not necessary.', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
				
				echo '<label for="griwpc_params_recaptcha_type_2">';
				$check = checked( $value, 'audio', FALSE );
				echo '<input data-part="recaptcha_type" type="radio" id="griwpc_params_recaptcha_type_2" name="griwpc-params[recaptcha_type]" class="code menu-item-textbox radioImage" value="audio" ' .  $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-audio.png"  title="' . _x( 'Audio', 'Google reCAPTCHA option name. Don\'t translate if it\'s not necessary.', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
			echo '</span>';
		echo '</p>';
	}

	public function reCaptchaAlign ( $value = NULL ) {
		echo '<p id="menu-item-recaptchaalign-wrap" class=" radio-image-container wp-clearfix">';
			echo '<legend class="howto" >' . __ ( 'Align', 'recaptcha-in-wp-comments-form' ) . '<span class="wp-ui-text-highlight actual-selection"></span></legend>';
			echo '<span class="options-switcher wp-ui-primary">';
			
				echo '<label for="griwpc_params_recaptcha_align_1">';
				$check = checked( $value, 'left', FALSE );
				echo '<input data-part="recaptcha_align" type="radio" id="griwpc_params_recaptcha_align_1" name="griwpc-params[recaptcha_align]" class="code menu-item-textbox radioImage" value="left" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-left.png" title="' . _x( 'Left', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';

				echo '<label for="griwpc_params_recaptcha_align_2">';
				$check = checked( $value, 'center', FALSE );
				echo '<input data-part="recaptcha_align" type="radio" id="griwpc_params_recaptcha_align_2" name="griwpc-params[recaptcha_align]" class="code menu-item-textbox radioImage" value="center" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-center.png" title="' . _x( 'Center', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';

				echo '<label for="griwpc_params_recaptcha_align_3">';
				$check = checked( $value, 'right', FALSE );
				echo '<input data-part="recaptcha_align" type="radio" id="griwpc_params_recaptcha_align_3" name="griwpc-params[recaptcha_align]" class="code menu-item-textbox radioImage" value="right" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-switch-right.png" title="' . _x( 'Right', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';

			echo '</span>';
		echo '</p>';
	}

	public function reCaptchaLanguage ( $value = NULL ) {
		
		require_once( ABSPATH . 'wp-admin/includes/translation-install.php' );
		
		// plugin v0.0.9 
		// Change minimum WP version to 4.0.0
		$alang = wp_get_available_translations();

		//	just for developing debug 
		//  echo '<pre>';
		//  print_r ( $alang );
		//  echo '</pre>';

		$nativeExceptions = array ( 
			'am'    => 'አማርኛ',
			'pt' 	=> 'Português',
			'pt_PT' => 'Português do Portugal',
		);

		echo '<p id="menu-item-recaptcha_lang-wrap" class="wp-clearfix radio-image-container">';
		echo '<legend class="howto" for="griwpc_params_recaptcha_lang" >' . __ ( 'Language', 'recaptcha-in-wp-comments-form' ) . '<span class="wp-ui-text-highlight actual-selection"></span></legend>';
		echo '<select id="griwpc_params_recaptcha_lang" name="griwpc-params[recaptcha_lang]" value="' . $value . '" />';
		foreach ( griwpc_tools::get_languages() as $key => $v ) {
			switch ( $key ) {
				case 'es':
					$_key = 'es-ES'; break;
				case 'fr' :
					$_key = 'fr-FR'; break;
				case 'no' :
					$_key = 'nn-NO'; break;
				default :
				    $_key = $key;
			}
			$kLang = str_replace( '-', '_', $_key );

			// Local native language name is incorrect in wp language array.
			// For example, Netherlands should be 'Nederlandse' in Dutch
			if ( isset ( $nativeExceptions[ $kLang ] ) ) {
				// $stringName = '1 ' . $kLang . ' ' . $nativeExceptions[ $kLang ];
				$stringName = $nativeExceptions[ $kLang ];

			// Local native language name is CORRECT in wp language array.
			} else if ( isset ( $alang[ $kLang ] ) ) {
				// $stringName = '2 ' . $kLang . ' ' . $alang[ $kLang ]['native_name'];
				$stringName = $alang[ $kLang ]['native_name'];

			// Local native language name is not accessed in key
			} elseif ( ( $elem = griwpc_tools::search_language_by_name ( $v, $alang ) ) !== FALSE ) {
				// $stringName = '3 ' . $kLang . ' ' . $elem['native_name'];
				$stringName = $elem['native_name'];

			// other cases
			} else {
				//$stringName	= '4 ' . $kLang . ' ' . $v;
				$stringName	= $v;
			}

			$languageFont = ( ( $font = griwpc_tools::get_native_font_classname( $kLang ) ) === false ) ? '' : $font;

			echo '<option value="' . $key . '" ' . selected ( $key, $value, FALSE ) . ' data-fontname="' . $languageFont . '"' . ' data-englishname="' . $v . '"' . ' data-nativename="' . $stringName . '" >' . $stringName . '</option>';
			
		}
		echo '</select>';
		echo '<span id="language-selector-button-wrap">';
		echo '<span id="language-selector-button" class="wp-ui-highlight" >';
		echo '<img src="' . __GRIWPC_URL__ . '/images/g-select-language.png" title="' . __( 'Force the language in which reCAPTCHA field speaks', 'recaptcha-in-wp-comments-form' ) . '"/>';
		echo '</span>';
		echo '</span>';
		echo '</p>';

	}


	// AntiSpam Settings Fields
	public function reCaptchaMode ( $value = NULL ) {
		
		echo '<p id="menu-item-recaptcha_mode-wrap" class="wp-clearfix radio-image-container">';
		echo '<legend class="howto">' . __ ( 'Action:', 'recaptcha-in-wp-comments-form' ) . '<span class="wp-ui-text-highlight actual-selection"></span></legend>';
			echo '<span class="options-switcher wp-ui-primary">';
				echo '<label for="griwpc-params_recaptcha_mode_1">';
				$check = checked( $value, 'spam', FALSE );
				echo '<input data-part="recaptcha_mode" type="radio" id="griwpc-params_recaptcha_mode_1" name="griwpc-params[recaptcha_mode]" class="code menu-item-textbox radioImage" value="spam" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-spam-spam.png" title="' . __( 'Mark comment as SPAM', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
				
				echo '<label for="griwpc-params_recaptcha_mode_2">';
				$check = checked( $value, 'trash', FALSE );
				echo '<input data-part="recaptcha_mode" type="radio" id="griwpc-params_recaptcha_mode_2" name="griwpc-params[recaptcha_mode]" class="code menu-item-textbox radioImage" value="trash" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-spam-trash.png" title="' . __( 'Send comment to TRASH', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';

				echo '<label for="griwpc-params_recaptcha_mode_3">';
				$check = checked( $value, 'delete', FALSE );
				echo '<input data-part="recaptcha_mode" type="radio" id="griwpc-params_recaptcha_mode_3" name="griwpc-params[recaptcha_mode]" class="code menu-item-textbox radioImage" value="delete" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-spam-delete.png" title="' . __( 'Directly DELETE comment', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';

				echo '<label for="griwpc-params_recaptcha_mode_4">';
				$check = checked( $value, 'die', FALSE );
				echo '<input data-part="recaptcha_mode" type="radio" id="griwpc-params_recaptcha_mode_4" name="griwpc-params[recaptcha_mode]" class="code menu-item-textbox radioImage" value="die" ' . $check . '/>';
				echo '<img src="' . __GRIWPC_URL__ . '/images/g-spam-die.png" title="' . __( 'BLOCK access executing WP_DIE()', 'recaptcha-in-wp-comments-form' ) . '"' . (( $check ) ? ' class="wp-ui-highlight" ' : '' ) . '/></label>';
				
			echo '</span>';
		echo '</p>';
	}


	public function renderDefaultButton( $key = null ) {
		echo '<button tabindex=-1 class="button-restoredefaultvalue button button-field-operation" title="' . $this->msgs['defaultButtonTitleTxt'] . '"><span class="dashicons dashicons-image-rotate" data-target="' . $key . '"></span></button>';
	}

	// reCAPTCHA insertion Settings
	public function standardQueries ( $value = NULL, $data = array(), $subsectionOrder ) {
		
		$defaults = $this->get_defaults();

		// Messages for <select> -> <option> and for the headers of the different groups of fields
		$this->querymodesDescription = $this->msgs['querymodesDescription'];

		echo '<div>';
		echo '<h3>' . $subsectionOrder . ' - ' . $this->msgs['pluginSettingsSubsections'][$subsectionOrder] . '<span class="is-help-button dashicons dashicons-editor-help" data-container="div" ></span>' . '</h3>';

			echo '<div class="help-text _closed">';

				echo '<p>' . sprintf ( __( 'See <strong>Help</strong> tab or visit the <a href="%1$s" target="_blank">Author\'s plugin settings help page</a> for more information.', 'recaptcha-in-wp-comments-form' ), __GRIWPC_SITE_CONF__ ) . '</p>';

			echo '</div>';
		echo '</div>';

		echo '<p id="menu-item-recaptcha_tag-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_standardQueries">' . __ ( 'Type of Comments Form HTML structure', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<select data-defaultvalue="' . $defaults['standardQueries'] . '"  id="griwpc_params_standardQueries" name="griwpc-params[standardQueries]" value="' . $value . '" class="menu-item-textbox menu-item-select field-with-button-operation" />';
			for ( $i = 0; $i<4; $i++ )
				echo '<option value="' . $i . '" ' . selected ( $value, (string) $i, FALSE )  . ' >' . $this->querymodesDescription[$i] . '</option>';
		echo '</select>';
		$this->renderDefaultButton();
		echo '</p>';


		// Rendering the hidden real fields where we store the real values for this group of settings
		foreach ($data as $key => $value) {
			echo '<input type="hidden" id="griwpc_params_' . $key . '" name="griwpc-params[' . $key . ']" value="' . $value . '" />';
		}

		for( $i = 0; $i<4; $i++ ) {
			$func = 'standardQueryMode' . $i;
			$this->$func ( $data );
		}

	}

	public function standardQueryMode0 ( $data = array() ) {
		echo '<div id="standard-query-mode-group-0" class="standard-query-mode-group">';

			echo '<h4>' . $this->querymodesDescription[0] . '</h4>';
			echo '<p>' . __( 'When necessary, change the value of these next fields to reflex the real <strong>ID\'s</strong> attributtes found inside the theme code for both the Form and the Submit Button.', 'recaptcha-in-wp-comments-form' ) . '</p>';
			$this->formID ( $data->formID, 0 );
			$this->buttonID ( $data->buttonID, 0 );

		echo '</div>';
	}
	public function standardQueryMode1 ( $data = array() ) {
		echo '<div id="standard-query-mode-group-1" class="standard-query-mode-group">';

			echo '<h4>' . $this->querymodesDescription[1] . '</h4>';

			echo '<p>' . __( 'When necessary, change the value of these next fields to introduce the real Submit Button <strong>ID</strong> attributte or a new query string for locating the &lt;FORM&gt; tag.', 'recaptcha-in-wp-comments-form' ) . '</p>';

			echo '<h5>' . __( 'FORM', 'recaptcha-in-wp-comments-form' ) . '</h5>';
			echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
				$this->formQuery ( $data->formQuery, 1 );
				$this->formQueryElem ( $data->formQueryElem, 1 );
			echo '</p>';

			echo '<h5>' . __( 'BUTTON', 'recaptcha-in-wp-comments-form' ) . '</h5>';
			$this->buttonID ( $data->buttonID, 1 );

		echo '</div>';
	}
	public function standardQueryMode2 ( $data = array() ) {
		echo '<div id="standard-query-mode-group-2" class="standard-query-mode-group">';

			echo '<h4>' . $this->querymodesDescription[2] . '</h4>';

			echo '<p>' . __( 'When necessary, change the value of these next fields to introduce the real Form <strong>ID</strong> attributte or a new query string for locating the Submit Button.', 'recaptcha-in-wp-comments-form' ) . '</p>';

			echo '<h5>' . __( 'FORM', 'recaptcha-in-wp-comments-form' ) . '</h5>';
			$this->formID ( $data->formID, 2 );

			echo '<h5>' . __( 'BUTTON', 'recaptcha-in-wp-comments-form' ) . '</h5>';
			echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
				$this->buttonQuery ( $data->buttonQuery, 2 );
				$this->buttonQueryElem ( $data->buttonQueryElem, 2 );
			echo '</p>';

		echo '</div>';
	}
	public function standardQueryMode3 ( $data = array() ) {
		echo '<div id="standard-query-mode-group-3" class="standard-query-mode-group">';
			echo '<h4>' . $this->querymodesDescription[3] . '</h4>';

			echo '<p>' . __( 'When necessary, change the value of these next fields to introduce alternative query strings for locating both the &lt;FORM&gt; tag and the Submit Button.', 'recaptcha-in-wp-comments-form' ) . '</p>';

			echo '<h5>' . __( 'FORM', 'recaptcha-in-wp-comments-form' ) . '</h5>';
			echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
				$this->formQuery ( $data->formQuery, 1 );
				$this->formQueryElem ( $data->formQueryElem, 1 );
			echo '</p>';

			echo '<h5>' . __( 'BUTTON', 'recaptcha-in-wp-comments-form' ) . '</h5>';
			echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
				$this->buttonQuery ( $data->buttonQuery, 2 );
				$this->buttonQueryElem ( $data->buttonQueryElem, 2 );
			echo '</p>';


		echo '</div>';
	}

	public function formID ( $value = NULL, $order ) {
		$defaults = $this->get_defaults();
		echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_formID-' . $order . '">' . __( 'Comments form ID', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input data-source="griwpc_params_formID" data-defaultvalue="' . $defaults['formID'] . '" type="text" id="griwpc_params_formID-' . $order . '" class="code menu-item-textbox menu-item-input field-with-button-operation ghost-field" value="' . $value . '" />';
		$this->renderDefaultButton();
		echo '</p>';
	}
	public function formQuery ( $value = NULL, $order ) {
		$defaults = $this->get_defaults();
		echo '<label class="howto" for="griwpc_params_formQuery-' . $order . '">' . __( 'JavaScript Query String', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input data-source="griwpc_params_formQuery" data-defaultvalue="' . $defaults['formQuery'] . '" type="text" id="griwpc_params_formQuery-' . $order . '" class="code menu-item-textbox menu-item-input field-with-button-operation ghost-field" value="' . $value . '" />';
		$this->renderDefaultButton();
	}
	public function formQueryElem ( $value = NULL, $order ) {
		$defaults = $this->get_defaults();
		echo '<label class="howto" for="griwpc_params_formQueryElem-' . $order . '">' . __( 'Position in query results (0:first, 1:second...)', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input data-source="griwpc_params_formQueryElem" data-defaultvalue=' . $defaults['formQueryElem'] . ' type="number" id="griwpc_params_formQueryElem-' . $order . '" class="code menu-item-textbox menu-item-input field-with-button-operation ghost-field" value=' . $value . ' />';
		$this->renderDefaultButton();
	}

	public function buttonID ( $value = NULL, $order ) {
		$defaults = $this->get_defaults();
		echo '<p id="menu-item-secretkey-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_buttonID-' . $order . '">' . __ ( 'Submit button ID', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input data-source="griwpc_params_buttonID" data-defaultvalue="' . $defaults['buttonID'] . '" type="text" id="griwpc_params_buttonID-' . $order . '" class="code menu-item-textbox menu-item-input field-with-button-operation ghost-field" value="' . $value . '" />';
		$this->renderDefaultButton();
		echo '</p>';
	}
	public function buttonQuery ( $value = NULL, $order ) {
		$defaults = $this->get_defaults();
		echo '<label class="howto" for="griwpc_params_buttonQuery-' . $order . '">' . __( 'JavaScript Query String', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input data-source="griwpc_params_buttonQuery" data-defaultvalue="' . $defaults['buttonQuery'] . '" type="text" id="griwpc_params_buttonQuery-' . $order . '" class="code menu-item-textbox menu-item-input field-with-button-operation ghost-field" value="' . $value . '" />';
		$this->renderDefaultButton();
	}
	public function buttonQueryElem ( $value = NULL, $order ) {
		$defaults = $this->get_defaults();
		echo '<label class="howto" for="griwpc_params_buttonQueryElem-' . $order . '">' . __( 'Position in query results (0:first, 1:second...)', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<input data-source="griwpc_params_buttonQueryElem" data-defaultvalue=' . $defaults['buttonQueryElem'] . ' type="number" id="griwpc_params_buttonQueryElem-' . $order . '" class="code menu-item-textbox menu-item-input field-with-button-operation ghost-field" value=' . $value . ' />';
		$this->renderDefaultButton();
	}

	public function recaptchaTag ( $value = NULL, $subsectionOrder ) {

		$defaults = $this->get_defaults();

		echo '<div>';
			echo '<h3>' . $subsectionOrder . ' - ' . $this->msgs['pluginSettingsSubsections'][$subsectionOrder]  . '<span class="is-help-button dashicons dashicons-editor-help" data-container="div" ></span>' . '</h3>';
			echo '<div class="help-text _closed">';
				echo '<p>' . __( 'You can modify the HTML tag container for reCAPTCHA field.', 'recaptcha-in-wp-comments-form' ) . '</p>';
			echo '</div>';
		echo '</div>';

		echo '<p id="menu-item-recaptcha_tag-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_recaptcha_tag">' . __ ( 'HTML tag container for reCAPTTCHA', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<select data-defaultvalue="' . $defaults['recaptcha_tag'] . '"  id="griwpc_params_recaptcha_tag" name="griwpc-params[recaptcha_tag]" value="' . $value . '" class="code menu-item-textbox menu-item-select field-with-button-operation" />';
			echo '<option value="p" '      . selected ( $value, 'p', FALSE )    . ' >&lt;p&gt;&lt;/p&gt;</option>';
			echo '<option value="span" '   . selected ( $value, 'span', FALSE ) . ' >&lt;span&gt;&lt;/span&gt;</option>';
			echo '<option value="div" '    . selected ( $value, 'div', FALSE )  . ' >&lt;div&gt;&lt;/div&gt;</option>';
		echo '</select>';
		$this->renderDefaultButton();
		echo '</p>';
	}

	public function recaptchaCSS ( $value = NULL, $subsectionOrder ) {

		$defaults = $this->get_defaults();

		echo '<div>';
		echo '<h3>' . $subsectionOrder . ' - ' . $this->msgs['pluginSettingsSubsections'][$subsectionOrder]  . '<span class="is-help-button dashicons dashicons-editor-help" data-container="div" ></span>' . '</h3>';
			echo '<div class="help-text _closed">';
				echo '<p>' . __( 'You can modify the reCAPTCHA container style via CSS using the <code>.google-recaptcha-container</code> class.', 'recaptcha-in-wp-comments-form' ) . '</p>';
			echo '</div>';
		echo '</div>';

		echo '<p id="menu-item-recaptcha_tag-wrap" class="wp-clearfix">';
		echo '<label class="howto" for="griwpc_params_recaptcha_css">' . __ ( 'reCAPTCHA container CSS', 'recaptcha-in-wp-comments-form' ) . '</label>';
		echo '<textarea data-defaultvalue="' . $defaults['recaptcha_css'] . '" name="griwpc-params[recaptcha_css]" class="code menu-item-textbox menu-item-textarea field-with-button-operation" id="griwpc_params_recaptcha_css">' . esc_attr ( $value ) . '</textarea>';
		$this->renderDefaultButton();
		echo '</p>';
	}


	// Output screen Settings
	public function javascriptOutputMode ( $value = NULL ) {

		echo '<legend class="howto isOnlineBlock" >' .  __( 'Forced javascript output', 'recaptcha-in-wp-comments-form' ) . '</legend>';
		echo '<input type="hidden" name="griwpc-params[old_themes_compatibility]" value="0"/>';
		echo '<div class="slideThree isToRight small wp-ui-primary">';
			echo '<input type="checkbox" id="griwpc_params_old_themes_compatibility" name="griwpc-params[old_themes_compatibility]" value="1" ' . checked( $value, 1, FALSE ) . '/>';
			echo '<label for="griwpc_params_old_themes_compatibility" class="wp-ui-highlight" ></label>';
		echo '</div>';

	}

	public function allowCreditsModeCallback ( $value = NULL ) {

		echo '<legend class="howto isOnlineBlock" >' .  __( 'Credit Link', 'recaptcha-in-wp-comments-form' ) . '</legend>';
		echo '<input type="hidden" name="griwpc-params[allowCreditMode]" value="0"/>';
		echo '<div class="slideThree isToRight small wp-ui-primary">';
			echo '<input type="checkbox" id="griwpc_params_allowCreditMode" name="griwpc-params[allowCreditMode]" value="1" ' . checked( $value, 1, FALSE ) . '/>';
			echo '<label for="griwpc_params_allowCreditMode" class="wp-ui-highlight" ></label>';
		echo '</div>';

	}


}