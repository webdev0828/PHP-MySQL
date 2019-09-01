<?php
/*
 * Plugin:reCAPTCHA in WP comments form
 * Path:/includes
 * File:tools.php
 * Since: 0.0.4
 */
 
/*
 * Class: griwpc_tools
 * Version: 9.1.0
 * Description: This class contains the support functions of the plugin. 
 *				The list of languages is not translated because the official Google translations page for reCAPTCHA has not been translated.
 *This class also contains the basic rutines for plugin installation and updating
 */

class griwpc_tools extends griwpc_interface {

	/**
	 *
	 * Cheching for a non empty Google Keys Pair
	 *
	 * 		The Minimum and basic requirement for a valid google keys pair is 'non empty' both of keys 
	 *
	 */
	static function check_google_API_keys_pair ( $options ) {

// 		v0.0.9.0.1 
//		Change one step/line functions for two steps funtions for incompatible function call trim() with old PHP versions (v < 5.4.0)
		$a = $b = FALSE;
		if ( isset ( $options['site_key'] ) ) {
			$p = trim ( $options['site_key'] );
			$a = ! empty ( $p );
		}
		if ( isset ( $options['secret_key'] ) ) {
			$p = trim ( $options['secret_key'] );
			$b = ! empty ( $p );
		}
		return (boolean) ( $a && $b );

	}


	/**
	 *
	 * Get locale translation for each reCAPTCHA language option module
	 *
	 *		Searching languages inside WP language array by name
	 *
	 */
	static function search_language_by_name ( $needle, $languages ) {
		foreach ( $languages as $key => $value ) {
			if ( $value['english_name'] == $needle ) 
				return $value;
		}
		return FALSE;
	}


	/**
	 *
	 *	Check Languages codes exceptions
	 *
	 * 		For example, for Portuguese there are three variants: pt, pt-PT, pt-BR. In English there are two variants, etc.
	 *		For the rest of languages, we use just the two first letters in lowercase.
	 *
	 */
	static function adapt_language_code ( $code ) {
		
		$code = str_replace ( '_', '-', $code );
		$parts = explode ( '-', $code );
		
		if ( isset ( $parts[1] ) ) {
			
			$parts[1] = strtoupper( $parts[1] );
			
/*			if ( ( $parts[0] == 'es' ) && ( $parts[1] == '419' ) )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'en' ) && ( $parts[1] == 'GB') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'de' ) && ( $parts[1] == 'AT') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'de' ) && ( $parts[1] == 'CH') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'fr' ) && ( $parts[1] == 'CA') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'pt' ) && ( $parts[1] == 'BR') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'pt' ) && ( $parts[1] == 'PT') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'zh' ) && ( $parts[1] == 'HK') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'zh' ) && ( $parts[1] == 'CN') )
				$parts[0] = $parts[0] . '-' . $parts[1];
			if ( ( $parts[0] == 'zh' ) && ( $parts[1] == 'TW') )
*/			
			$parts[0] = $parts[0] . '-' . $parts[1];
				
		}
		
		$code = $parts[0];			
		
		return $code;
		
	}


	// Create the language selector options list
	static function get_languages() {
		return 
			array (
				// First option is the default Google reCAPTCHA widget language mode: user's browser autodetect
				-1 => __( "Detect user's browser language", 'recaptcha-in-wp-comments-form' ),
				
				// Second option forces Google reCAPTCHA widget to use the site language via WP function get_locale()
				-2 => __( 'Use always site language', 'recaptcha-in-wp-comments-form' ),
				
				// Next array elements are the Google reCAPTCHA available languages codes, 
				// https://developers.google.com/recaptcha/docs/language

				// These language names are not translateble strings to always also keep the English language name
				// so that the plugin will automatically give the translated names for all languages found through 
				// the WP wp_get_available_translations() function
				'ar' => 'Arabic',
				'af' => 'Afrikaans',
				'am' => 'Amharic',
				'hy' => 'Armenian',
				'az' => 'Azerbaijani',
				'eu' => 'Basque',
				'bn' => 'Bengali',
				'bg' => 'Bulgarian',
				'ca' => 'Catalan',
				'zh-HK' => 'Chinese (Hong Kong)',
				'zh-CN' => 'Chinese (Simplified)',
				'zh-TW' => 'Chinese (Traditional)',
				'hr' => 'Croatian',
				'cs' => 'Czech',
				'da' => 'Danish',
				'nl' => 'Dutch',
				'en-GB' => 'English (UK)',
				'en' => 'English (US)',
				'et' => 'Estonian',
				'fil' => 'Filipino',
				'fi' => 'Finnish',
				'fr' => 'French',
				'fr-CA' => 'French (Canadian)',
				'gl' => 'Galician',
				
				'ka' => 'Georgian',
				'de' => 'German',
				'de-AT' => 'German (Austria)',
				'de-CH' => 'German (Switzerland)',
				'el' => 'Greek',
				'gu' => 'Gujarati',
				'iw' => 'Hebrew',
				'hi' => 'Hindi',
				'hu' => 'Hungarian',
				'is' => 'Icelandic',
				'id' => 'Indonesian',
				'it' => 'Italian',
				'ja' => 'Japanese',
				'kn' => 'Kannada',
				'ko' => 'Korean',
				'lo' => 'Laothian',
				'lv' => 'Latvian',
				'lt' => 'Lithuanian',
				'ms' => 'Malay',
				'ml' => 'Malayalam',
				'mr' => 'Marathi',
				'mn' => 'Mongolian',
				'no' => 'Norwegian',
				'fa' => 'Persian',
				
				'pl' => 'Polish',
				'pt' => 'Portuguese',
				'pt-BR' => 'Portuguese (Brazil)',
				'pt-PT' => 'Portuguese (Portugal)',
				'ro' => 'Romanian',
				'ru' => 'Russian',
				'sr' => 'Serbian',
				'si' => 'Sinhalese',
				'sk' => 'Slovak',
				'sl' => 'Slovenian',
				'es' => 'Spanish',
				'es-419' => 'Spanish (Latin America)',
				'sw' => 'Swahili',
				'sv' => 'Swedish',
				'ta' => 'Tamil',
				'te' => 'Telugu',
				'th' => 'Thai',
				'tr' => 'Turkish',
				'uk' => 'Ukrainian',
				'ur' => 'Urdu',
				'vi' => 'Vietnamese',
				'zu' => 'Zulu',
				
			);
			
	}

	static function get_native_font_classname( $code ) {

		$fonts = array (
			'am' => 'amharic',
		);

		if ( isset ( $fonts[ $code ] ) )
			return ( $fonts[ $code ] );

		$result = false;

	}


	/* 
	 * Detect language module
	 */
	
	#########################################################
	# Copyright © 2008 Darrin Yeager#
	# https://www.dyeager.org/#
	# Licensed under BSD license. #
	# https://www.dyeager.org/downloads/license-bsd.txt #
	#########################################################

	static function getDefaultLanguage() {
		if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
			return griwpc_tools::parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
		else
			return griwpc_tools::parseDefaultLanguage(NULL);
	}
	
	static function parseDefaultLanguage($http_accept, $deflang = "en") {
		if(isset($http_accept) && strlen($http_accept) > 1){
			# Split possible languages into array
			$x = explode(",",$http_accept);
			foreach ($x as $val) {
				#check for q-value and create associative array. No q-value means 1 by rule
				if(preg_match("/(.*);q=([0-1]{0,1}.\d{0,4})/i",$val,$matches))
					$lang[$matches[1]] = (float)$matches[2];
				else
					$lang[$val] = 1.0;
			}
			
			#return default language (highest q-value)
			$qval = 0.0;
			foreach ($lang as $key => $value) {
				if ($value > $qval) {
					$qval = (float)$value;
					$deflang = $key;
				}
			}
		}
		return strtolower($deflang);
	}


	/**********************************************************************************************************************
	 *
	 * Activation and update plugin modules 
	 *
	 */
	 
	// Only show link on activation
	static function on_activation() {
		add_option ('cool-griwpc', 'installed' );
	}

	
	// To create the activation message
	public function on_activation_msg () {

		$a = get_option ('cool-griwpc');
		$common_line = '<p>' . sprintf ( 
					_x( '%1$s <a href="%2$s">%3$s</a>.', '1: Go to settings page message, 2: Settings page WP admin URL, 3: Menu name of the plugin', 'recaptcha-in-wp-comments-form' ),
					_x( 'To modify the plugin settings, go to Settings >', 'Go to settings page message, do not remove the \'>\'', 'recaptcha-in-wp-comments-form' ),
					admin_url( 'options-general.php?page=google_recaptcha_in_wp_comments_settings'),
					__GRIWPC_SHORT__
			) . '</p>';

		if ( $a ) {
		
			// First installation
			delete_option ('cool-griwpc');
			add_option ('cool-griwpc-ver', __GRIWPC_VER__ );
			
			if ( ! $this->settingsClass->get_options() ) 
				$this->settingsClass->create_options();

			echo '<div class="notice notice-success">';
			echo '<p>' . sprintf (
				_x( '<strong>%1$s</strong> version <strong>%2$s</strong> was succesfully activated.', '1: plugin name, 2: version number', 'recaptcha-in-wp-comments-form' ),
				__GRIWPC__,
				__GRIWPC_VER__
			) . '</p>';
			echo $common_line;
			echo '</div>';


		} else {
			
			// Updating
			$a = get_option ('cool-griwpc-ver');
			if ( ( $a == '' ) || version_compare ( __GRIWPC_VER__, $a, '>' ) ) {

				update_option ('cool-griwpc-ver', __GRIWPC_VER__ );

				echo '<div class="notice notice-success is-dismissible">';
				echo '<p>' . sprintf ( 
					_x( '<strong>%1$s</strong> was succesfully updated to the version <strong>%2$s</strong>.', '1: plugin name, 2: plugin version', 'recaptcha-in-wp-comments-form' ),
					__GRIWPC__,
					__GRIWPC_VER__
				) . '</p>';
				echo $common_line;
				echo '</div>';
				
				// Call update settings module in case of...
				$this->settingsClass->check_upgrade_settings ( __GRIWPC_VER__, $a );
				
			}
		
		}
		
	}


	static function echo_php_logo () {

		return '<svg height="383.5975" id="svg3430" version="1.1" viewBox="0 0 711.20123 383.5975" width="711.20123" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"><metadata id="metadata3436"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/><dc:title>Official PHP Logo</dc:title><dc:creator><cc:Agent><dc:title>Colin Viebrock</dc:title></cc:Agent></dc:creator><dc:description/><dc:contributor><cc:Agent><dc:title/></cc:Agent></dc:contributor><cc:license rdf:resource="http://creativecommons.org/licenses/by-sa/3.0/"/><dc:rights><cc:Agent><dc:title>Copyright Colin Viebrock 1997 - All rights reserved.</dc:title></cc:Agent></dc:rights><dc:date>1997</dc:date></cc:Work><cc:License rdf:about="http://creativecommons.org/licenses/by-sa/3.0/"><cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"/><cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"/><cc:requires rdf:resource="http://creativecommons.org/ns#Notice"/><cc:requires rdf:resource="http://creativecommons.org/ns#Attribution"/><cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"/><cc:requires rdf:resource="http://creativecommons.org/ns#ShareAlike"/></cc:License></rdf:RDF></metadata><defs id="defs3434"><clipPath clipPathUnits="userSpaceOnUse" id="clipPath3444"><path d="M 11.52,162 C 11.52,81.677 135.307,16.561 288,16.561 l 0,0 c 152.693,0 276.481,65.116 276.481,145.439 l 0,0 c 0,80.322 -123.788,145.439 -276.481,145.439 l 0,0 C 135.307,307.439 11.52,242.322 11.52,162" id="path3446"/></clipPath><radialGradient cx="0" cy="0" fx="0" fy="0" gradientTransform="matrix(363.05789,0,0,-363.05789,177.52002,256.30713)" gradientUnits="userSpaceOnUse" id="radialGradient3452" r="1" spreadMethod="pad"><stop id="stop3454" offset="0" style="stop-opacity:1;stop-color:#aeb2d5"/><stop id="stop3456" offset="0.3" style="stop-opacity:1;stop-color:#aeb2d5"/><stop id="stop3458" offset="0.75" style="stop-opacity:1;stop-color:#484c89"/><stop id="stop3460" offset="1" style="stop-opacity:1;stop-color:#484c89"/></radialGradient><clipPath clipPathUnits="userSpaceOnUse" id="clipPath3468"><path d="M 0,324 576,324 576,0 0,0 0,324 Z" id="path3470"/></clipPath><clipPath clipPathUnits="userSpaceOnUse" id="clipPath3480"><path d="M 0,324 576,324 576,0 0,0 0,324 Z" id="path3482"/></clipPath></defs><g id="g3438" transform="matrix(1.25,0,0,-1.25,-4.4,394.29875)"><g id="g3440"><g clip-path="url(#clipPath3444)" id="g3442"><g id="g3448"><g id="g3450"><path d="M 11.52,162 C 11.52,81.677 135.307,16.561 288,16.561 l 0,0 c 152.693,0 276.481,65.116 276.481,145.439 l 0,0 c 0,80.322 -123.788,145.439 -276.481,145.439 l 0,0 C 135.307,307.439 11.52,242.322 11.52,162" id="path3462" style="fill:url(#radialGradient3452);stroke:none"/></g></g></g></g><g id="g3464"><g clip-path="url(#clipPath3468)" id="g3466"><g id="g3472" transform="translate(288,27.3594)"><path d="M 0,0 C 146.729,0 265.68,60.281 265.68,134.641 265.68,209 146.729,269.282 0,269.282 -146.729,269.282 -265.68,209 -265.68,134.641 -265.68,60.281 -146.729,0 0,0" id="path3474" style="fill:#777bb3;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g></g></g><g id="g3476"><g clip-path="url(#clipPath3480)" id="g3478"><g id="g3484" transform="translate(161.7344,145.3066)"><path d="m 0,0 c 12.065,0 21.072,2.225 26.771,6.611 5.638,4.341 9.532,11.862 11.573,22.353 1.903,9.806 1.178,16.653 -2.154,20.348 C 32.783,53.086 25.417,55 14.297,55 L -4.984,55 -15.673,0 0,0 Z m -63.063,-67.75 c -0.895,0 -1.745,0.4 -2.314,1.092 -0.57,0.691 -0.801,1.601 -0.63,2.48 L -37.679,81.573 C -37.405,82.982 -36.17,84 -34.734,84 L 26.32,84 C 45.508,84 59.79,78.79 68.767,68.513 77.792,58.182 80.579,43.741 77.05,25.592 75.614,18.198 73.144,11.331 69.709,5.183 66.27,-0.972 61.725,-6.667 56.198,-11.747 49.582,-17.939 42.094,-22.429 33.962,-25.071 25.959,-27.678 15.681,-29 3.414,-29 l -24.722,0 -7.06,-36.322 c -0.274,-1.41 -1.508,-2.428 -2.944,-2.428 l -31.751,0 z" id="path3486" style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g><g id="g3488" transform="translate(159.2236,197.3071)"><path d="m 0,0 16.808,0 c 13.421,0 18.083,-2.945 19.667,-4.7 2.628,-2.914 3.124,-9.058 1.435,-17.767 C 36.012,-32.217 32.494,-39.13 27.452,-43.012 22.29,-46.986 13.898,-49 2.511,-49 L -9.523,-49 0,0 Z m 28.831,35 -61.055,0 c -2.872,0 -5.341,-2.036 -5.889,-4.855 l -28.328,-145.751 c -0.342,-1.759 0.12,-3.578 1.259,-4.961 1.14,-1.383 2.838,-2.183 4.63,-2.183 l 31.75,0 c 2.873,0 5.342,2.036 5.89,4.855 l 6.588,33.895 22.249,0 c 12.582,0 23.174,1.372 31.479,4.077 8.541,2.775 16.399,7.48 23.354,13.984 5.752,5.292 10.49,11.232 14.08,17.657 3.591,6.427 6.171,13.594 7.668,21.302 3.715,19.104 0.697,34.402 -8.969,45.466 C 63.965,29.444 48.923,35 28.831,35 m -45.633,-90 19.313,0 c 12.801,0 22.336,2.411 28.601,7.234 6.266,4.824 10.492,12.875 12.688,24.157 2.101,10.832 1.144,18.476 -2.871,22.929 C 36.909,3.773 28.87,6 16.808,6 L -4.946,6 -16.802,-55 M 28.831,29 C 47.198,29 60.597,24.18 69.019,14.539 77.44,4.898 79.976,-8.559 76.616,-25.836 75.233,-32.953 72.894,-39.46 69.601,-45.355 66.304,-51.254 61.999,-56.648 56.679,-61.539 50.339,-67.472 43.296,-71.7 35.546,-74.218 27.796,-76.743 17.925,-78 5.925,-78 l -27.196,0 -7.531,-38.75 -31.75,0 28.328,145.75 61.055,0" id="path3490" style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g><g id="g3492" transform="translate(311.583,116.3066)"><path d="m 0,0 c -0.896,0 -1.745,0.4 -2.314,1.092 -0.571,0.691 -0.802,1.6 -0.631,2.48 L 9.586,68.061 C 10.778,74.194 10.484,78.596 8.759,80.456 7.703,81.593 4.531,83.5 -4.848,83.5 L -27.55,83.5 -43.305,2.428 C -43.579,1.018 -44.814,0 -46.25,0 l -31.5,0 c -0.896,0 -1.745,0.4 -2.315,1.092 -0.57,0.691 -0.801,1.601 -0.63,2.48 l 28.328,145.751 c 0.274,1.409 1.509,2.427 2.945,2.427 l 31.5,0 c 0.896,0 1.745,-0.4 2.315,-1.091 0.57,-0.692 0.801,-1.601 0.63,-2.481 L -21.813,113 2.609,113 c 18.605,0 31.221,-3.28 38.569,-10.028 7.49,-6.884 9.827,-17.891 6.947,-32.719 L 34.945,2.428 C 34.671,1.018 33.437,0 32,0 L 0,0 Z" id="path3494" style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g><g id="g3496" transform="translate(293.6611,271.0571)"><path d="m 0,0 -31.5,0 c -2.873,0 -5.342,-2.036 -5.89,-4.855 l -28.328,-145.751 c -0.342,-1.759 0.12,-3.578 1.26,-4.961 1.14,-1.383 2.838,-2.183 4.63,-2.183 l 31.5,0 c 2.872,0 5.342,2.036 5.89,4.855 l 15.283,78.645 20.229,0 c 9.363,0 11.328,-2 11.407,-2.086 0.568,-0.611 1.315,-3.441 0.082,-9.781 l -12.531,-64.489 c -0.342,-1.759 0.12,-3.578 1.26,-4.961 1.14,-1.383 2.838,-2.183 4.63,-2.183 l 32,0 c 2.872,0 5.342,2.036 5.89,4.855 l 13.179,67.825 c 3.093,15.921 0.447,27.864 -7.861,35.5 -7.928,7.281 -21.208,10.82 -40.599,10.82 l -20.784,0 6.143,31.605 C 6.231,-5.386 5.77,-3.566 4.63,-2.184 3.49,-0.801 1.792,0 0,0 m 0,-6 -7.531,-38.75 28.062,0 c 17.657,0 29.836,-3.082 36.539,-9.238 6.703,-6.16 8.711,-16.141 6.032,-29.938 l -13.18,-67.824 -32,0 12.531,64.488 c 1.426,7.336 0.902,12.34 -1.574,15.008 -2.477,2.668 -7.746,4.004 -15.805,4.004 l -25.176,0 -16.226,-83.5 -31.5,0 L -31.5,-6 0,-6" id="path3498" style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g><g id="g3500" transform="translate(409.5498,145.3066)"><path d="m 0,0 c 12.065,0 21.072,2.225 26.771,6.611 5.638,4.34 9.532,11.861 11.574,22.353 1.903,9.806 1.178,16.653 -2.155,20.348 C 32.783,53.086 25.417,55 14.297,55 L -4.984,55 -15.673,0 0,0 Z m -63.062,-67.75 c -0.895,0 -1.745,0.4 -2.314,1.092 -0.57,0.691 -0.802,1.601 -0.631,2.48 L -37.679,81.573 C -37.404,82.982 -36.17,84 -34.733,84 L 26.32,84 C 45.509,84 59.79,78.79 68.768,68.513 77.793,58.183 80.579,43.742 77.051,25.592 75.613,18.198 73.144,11.331 69.709,5.183 66.27,-0.972 61.725,-6.667 56.198,-11.747 49.582,-17.939 42.094,-22.429 33.962,-25.071 25.959,-27.678 15.681,-29 3.414,-29 l -24.723,0 -7.057,-36.322 c -0.275,-1.41 -1.509,-2.428 -2.946,-2.428 l -31.75,0 z" id="path3502" style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g><g id="g3504" transform="translate(407.0391,197.3071)"><path d="M 0,0 16.808,0 C 30.229,0 34.891,-2.945 36.475,-4.7 39.104,-7.614 39.6,-13.758 37.91,-22.466 36.012,-32.217 32.493,-39.13 27.452,-43.012 22.29,-46.986 13.898,-49 2.511,-49 L -9.522,-49 0,0 Z m 28.831,35 -61.054,0 c -2.872,0 -5.341,-2.036 -5.889,-4.855 L -66.44,-115.606 c -0.342,-1.759 0.12,-3.578 1.259,-4.961 1.14,-1.383 2.838,-2.183 4.63,-2.183 l 31.75,0 c 2.872,0 5.342,2.036 5.89,4.855 l 6.587,33.895 22.249,0 c 12.582,0 23.174,1.372 31.479,4.077 8.541,2.775 16.401,7.481 23.356,13.986 5.752,5.291 10.488,11.23 14.078,17.655 3.591,6.427 6.171,13.594 7.668,21.302 3.715,19.105 0.697,34.403 -8.969,45.467 C 63.965,29.444 48.924,35 28.831,35 m -45.632,-90 19.312,0 c 12.801,0 22.336,2.411 28.601,7.234 6.267,4.824 10.492,12.875 12.688,24.157 2.102,10.832 1.145,18.476 -2.871,22.929 C 36.909,3.773 28.87,6 16.808,6 L -4.946,6 -16.801,-55 M 28.831,29 C 47.198,29 60.597,24.18 69.019,14.539 77.441,4.898 79.976,-8.559 76.616,-25.836 75.233,-32.953 72.894,-39.46 69.601,-45.355 66.304,-51.254 61.999,-56.648 56.679,-61.539 50.339,-67.472 43.296,-71.7 35.546,-74.218 27.796,-76.743 17.925,-78 5.925,-78 l -27.196,0 -7.53,-38.75 -31.75,0 28.328,145.75 61.054,0" id="path3506" style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"/></g></g></g></g></svg>';
	}
	
}
