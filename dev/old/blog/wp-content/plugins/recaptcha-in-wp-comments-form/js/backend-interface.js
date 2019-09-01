/*
 * Plugin:      reCAPTCHA in WP comments form
 * Path:        /js
 * File:        backend-interface.js
 * Since:       0.0.4
 * Version:     9.1.0
 */

class griwpc_backend_interface {

	constructor( data, msgs, jquery ) {

//		console.log ( [ 'A', 'Aa', 'B', 'D', 'H', 'M', 'U', 'Y', 'da', 'l', 'o', 'oa', 'w' ].indexOf( 'D' ) );
		this.testerParams = [ 'A', 'Aa', 'B', 'D', 'H', 'M', 'U', 'Y', 'da', 'l', 'o', 'oa', 'w' ];
		this.testerNums   = 10;

		this.settings = data;
		this.messages = msgs;
		this.$        = jquery;

		//Ghost Fields
		this.ghostFields				= document.getElementsByClassName ( 'ghost-field' );

		//toggle help
		this.sampleFormHelpButtons      = document.getElementsByClassName ( 'is-help-button' );


		// Section WP CheckBoxes
		this.sectionCheckBoxes          = document.querySelectorAll ( '.hide-postbox-tog' );
		this.subsectionsTogglers        = document.querySelectorAll ( '.subsection-toggler' );

		// Activation Switcher
		this.pluginActivationSwitcher	= document.getElementById ( 'griwpc_params_active' );
		this.pluginActivationIcon		= document.getElementById ( 'plugin-status-icon' );

		// reCaptcha Status
		this.recaptchaActivationIcon  	= document.getElementById ( 'recaptcha-status-icon' );

		// reCaptcha Settings
		this.recaptchaSettingsIcon  	= document.getElementById ( 'recaptcha-settings-icon' );
		

		// recaptcha-mode-icon
		this.recaptchaModeIcon  		= document.getElementById ( 'recaptcha-mode-icon' );


		// reCaptcha Config Radios
		this.recaptchaParams 			= document.querySelectorAll ( '.radioImage' );


		// Button Defaults
		this.defaultButtons 			= document.querySelectorAll ( '.button-restoredefaultvalue' );

		// Plugin Configuration
		this.standardQueriesModeSelect  = document.getElementById ( 'griwpc_params_standardQueries' );

		// Plugin Credits
		this.creditsActivationSwitcher  = document.getElementById ( 'griwpc_params_allowCreditMode' );
		this.creditsActivationIcon		= document.getElementById ( 'credits-status-icon' );
		this.creditsActivationOutput 	= undefined;


		this._keys  = [];
		this._check = [];

		this.__init();

	}
	__init() {
		this.changePluginStatus();
		this.changeCreditsStatus();
		this.changeStandardQueriesModeSelect( {target: this.standardQueriesModeSelect} );

		for ( let [i, elem] of GriwpcTools.iteratingOver( this.recaptchaParams ) ) {
			if ( elem.checked !== true ) continue;
			this.put_options_tag ( elem );
		}		

		for ( let [i, elem] of GriwpcTools.iteratingOver( document.getElementById ( 'menu-item-recaptcha_mode-wrap' ).getElementsByTagName ( 'input' ) ) ) {
			if ( elem.checked !== true ) continue;
			this.put_recaptcha_mode_icon ( elem );
		}

		this.startEvents();

		// this.put_recaptcha_settings_icon();  <<<< put it as the last line of this.legacy()

	}

	startEvents() {

		this.pluginActivationSwitcher.addEventListener ( 'change', this.changePluginStatus.bind( this ), false );
		this.creditsActivationSwitcher.addEventListener ( 'change', this.changeCreditsStatus.bind( this ), false );
		this.standardQueriesModeSelect.addEventListener ( 'change', this.changeStandardQueriesModeSelect.bind( this), false );

		for ( let [i, elem] of GriwpcTools.iteratingOver( this.sectionCheckBoxes ) ) {
			elem.addEventListener( 'click', this.sendHiddenAccordionSectionsList.bind( this ), true );
		}

		for ( let [i, elem] of GriwpcTools.iteratingOver( this.recaptchaParams ) ) {
			elem.addEventListener( 'change', this.changeRecaptchaParam.bind( this ), true );
		}

		for ( let [i, elem] of GriwpcTools.iteratingOver( this.subsectionsTogglers ) ) {
			elem.addEventListener( 'click', this.subsectionToggling.bind( this ), true );
		}

		for ( let [i, elem] of GriwpcTools.iteratingOver ( this.defaultButtons ) ) {
			elem.addEventListener( 'click', this.assignDefaultValues.bind( this ), true );
		}

		for ( let [i, elem] of GriwpcTools.iteratingOver ( this.sampleFormHelpButtons ) ) {
			elem.addEventListener ( 'click', this.sampleFormHelpButtonToggle.bind( this ), false );
		}

		for ( let [i, elem] of GriwpcTools.iteratingOver ( this.ghostFields ) ) {
			elem.addEventListener ( 'input', this.sincronizeGhostField.bind( this ), false );
			elem.addEventListener ( 'change', this.sincronizeGhostField.bind( this ), false );
		}

		document.addEventListener("DOMContentLoaded", this.legacy.bind(this), false );

	}

	sampleFormHelpButtonToggle ( e ) {
		let target 		= e.target,
			container  	= target.dataset.container || 'p',
			_class      = target.dataset.class || 'help-text',
			place 		= e.target.closest( container ).getElementsByClassName ( _class )[0],
		 	replacer	= ( place.className.indexOf ( '_open') > -1 ) ? '_closed' : '_open';

		this.$( place ).slideToggle( 300, () => {	place.className = place.className.replace( /\b_[\S]*\b/, replacer ) } );

	}

	assignDefaultValues ( e ) {

		e.preventDefault();

		var place = e.target.previousSibling,
		    value = place.dataset.defaultvalue;

		place.value = value;
		place.dispatchEvent( new Event('change') );
		place.focus();

		return false;
	}


	sincronizeGhostField( e ) {
		let place 	= document.getElementById ( e.target.dataset.source );
		place.value = e.target.value;
	}

	changeStandardQueriesModeSelect ( e = null ) {

		for ( let [i, elem] of GriwpcTools.iteratingOver ( document.querySelectorAll ( '.standard-query-mode-group' ) ) ) {
			elem.className = elem.className.replace ( ' is-active', '' );
			if ( elem.id  == 'standard-query-mode-group-' + e.target.value ) {
				elem.className += ' is-active';
				for ( let [ii, vv] of GriwpcTools.iteratingOver ( elem.getElementsByClassName ( 'ghost-field' ) ) )
					vv.value = document.getElementById ( vv.dataset.source ).value;
			}
		}

	}

	legacy () {

		// trasladed as in jQuery module because of jquery-UI-selectmenu
		// to do a pure javascript version
		let $ 	 = this.$;
			self = this;

		function put_language_tag ( item ) {
			var num   = parseInt ( item.attr ( 'value' ) ),
			 	oName = item.data('englishname'),
			 	eName = item.data('nativename'),
				_html = '<span class="' + item.data( 'fontname' )  + '"><span id="current-language-local-name">' + ( ( ( num == -1 ) || (num == -2 ) ) ? eName + '</span>' : eName + '</span> - <small>' + oName + '</small>' ) + '</span>';

			$('#menu-item-recaptcha_lang-wrap' ). find ('.actual-selection').html ( _html );

		}

	    $.widget( "custom.langselectmenu", $.ui.selectmenu, {
			_renderItem: function( ul, item ) {
				var _isCurrent = item.element.attr( "selected" );
				var li = $( "<li>", { class: ( _isCurrent ) ? 'wp-ui-highlight is-current-language' : '' } );
				var wrapper = $( "<div>", { class: 'lang-item' } );
				var fontName = ( item.element.data( "fontname" ) !== undefined ) ? ' '  + item.element.data( "fontname" ) : '';
				var _eName  = $( "<span>", { text: item.element.data( "englishname" ), class: 'eName' } );
				var _oName  = $( "<span>", { text: item.element.data( "nativename" ) , class: 'oName' + fontName } );

				wrapper.append ( _eName );
				wrapper.append ( _oName );
				if ( item.disabled ) {
				  li.addClass( "ui-state-disabled" );
				}
				return li.append( wrapper ).appendTo( ul );
			}
	    });

		$("#griwpc_params_recaptcha_lang")
		.langselectmenu({
			width: 314,
			position: { of: '#language-selector-button', my: 'center center', at: "center center" },
			select: function( event, ui ) { 
				$( event.currentTarget ).parent().find ('li').removeClass( 'wp-ui-highlight');
				$( event.currentTarget ).parent().find ('li').removeClass( 'is-current-language');
				$( event.currentTarget ).addClass( 'wp-ui-highlight is-current-language' );

				if ( ui.item.value == -1 ) {
					self.settings.recaptcha_lang = ' ';
				} else if ( ui.item.value == -2 ) {
					self.settings.recaptcha_lang = $( 'html' ).attr( 'lang' );
				} else {
					self.settings.recaptcha_lang = ui.item.value;
				}

				put_language_tag ( ui.item.element );
				self.changeRecaptcha ();

			}
		});

		// Visual button trigger hidden select language jQueryUI field
		$( '#language-selector-button').on ( 'click', function () { $("#griwpc_params_recaptcha_lang-button").trigger( 'click' ) } );
		put_language_tag ( $( '#griwpc_params_recaptcha_lang').find ('option:selected') );
		$("#griwpc_params_recaptcha_lang-button").addClass( "ui-button wp-ui-highlight" );
		$("#griwpc_params_recaptcha_lang-button .ui-icon").addClass( "ui-selectmenu-icon" );
		let cssHightLight = '.ui-button, .ui-button.ui-state-focus { background-color:'+ $("#griwpc_params_recaptcha_lang-button").css ( 'background-color' ) + '; color:'+ $("#griwpc_params_recaptcha_lang-button").css ( 'color' ) + ';} .slideThree label:hover, .ui-button:hover { background-color: #d5d5d5 !important; } .slideThree label:active, .ui-button:active { background-color: #C4C4C4 !important; }';
		$('head').append( '<style>' + cssHightLight + '</style>' );
		this.put_recaptcha_settings_icon()

	}

	subsectionToggling ( e ) {
		if ( e.target.className.indexOf ( '_open' ) > -1 )
			e.target.className = e.target.className.replace( /\b_[\S]*\b/, '_closed' );
		else
			e.target.className = e.target.className.replace( /\b_[\S]*\b/, '_open' );

		this.$( e.target.nextSibling ).toggle( 300 );
	}

	put_recaptcha_settings_icon () {

		let values = [];

		for ( let [i, elem] of GriwpcTools.iteratingOver ( this.recaptchaParams ) ) {
			if ( ( elem.checked != true ) || ( elem.getAttribute( 'data-part' ) == 'recaptcha_mode' ) ) continue;
			values.push ( elem.nextSibling.getAttribute ( 'title') );
		}
		this.recaptchaSettingsIcon.setAttribute ( 'data-value', values.join ( ', ' ) + ', ' + document.getElementById ( 'current-language-local-name' ).textContent );


	}

	put_options_tag ( item ) {
		for ( let [i, elem] of GriwpcTools.iteratingOver ( item.closest( 'span' ).getElementsByTagName ( 'img' ) ) ) 
			elem.className = elem.className.replace ( /[\s]?\bwp\-ui\-highlight\b/, '' );
		item.nextSibling.className +=  ' wp-ui-highlight';
		item.closest( 'p' ).getElementsByClassName( 'actual-selection' )[0].innerHTML = item.closest ( 'label' ).getElementsByTagName ( 'img' )[0].getAttribute ('title');
	}
	put_recaptcha_mode_icon ( item ) {
		this.recaptchaModeIcon.childNodes[0].setAttribute ( 'src', item.nextSibling.getAttribute ( 'src' ).replace( /\.png/, '.svg' ) );
		this.recaptchaModeIcon.setAttribute ( 'data-value', item.nextSibling.getAttribute ( 'title' ) );
	}
	put_align_classes ( item ) {

		let elem = document.getElementById ( 'griwpc-container-id' );
		elem.className = elem.className.replace( /\brecaptcha\-\align\-[\S]*\b/, 'recaptcha-align-' + item.value );

	}

	changeRecaptchaParam ( e ) {

		this.put_options_tag ( e.target );

		let part = e.target.dataset.part;

		if ( part == 'recaptcha_align' ) {
			this.put_align_classes ( e.target );
		} else if ( part == 'recaptcha_mode' ) {
			this.put_recaptcha_mode_icon ( e.target );
		} else {
			if ( part !== undefined ) {
				this.settings[ part ] = e.target.value;
				this.changeRecaptcha();
			}
		}

	}

	insertingScripts() {
		this.settings.reCAPTCHAloaded = true;

		let script1 = document.createElement ( 'script' );
		script1.setAttribute ( 'type', 'text/javascript' );
		script1.setAttribute ( 'src', this.settings.pluginURL + 'js/recaptcha.js?ver=' + this.settings.pluginVersion );

		let script2 = document.createElement ( 'script' );
		script2.setAttribute ( 'type', 'text/javascript' );
		script2.setAttribute ( 'src', 'https://www.google.com/recaptcha/api.js?onload=griwpcOnloadCallback&render=explicit&ver=2' );

		document.body.appendChild ( script1 );
		document.body.appendChild ( script2 );

	}

	get_gr_elem ( element, level ) {
		
		var out = false, state = 0;
		
		if  ( level < 5 ) {
			for ( let [i, v] of GriwpcTools.iteratingOver ( element ) ) {
				if ( v != null ) {
					if ( Object.keys(v).length ) {
						if ( v.localName != 'iframe' ) {
							if ( ( v instanceof Object ) && ( i.length < 3 ) ) {
								this.get_gr_elem ( v, level+1 );
								if ( this._keys.length != 0 ) {
									this._keys[ level ] = i;
									return false;
								}
							} else {
								
								if ( ( i == 'theme' ) || ( i == 'size' ) || ( i == 'type' ) || ( i == 'sitekey' ) ) {
									state++;
								}
								
								if ( state == 4 ) {
									this._keys[ level ] = i;
									return false;
								}
								
							}
						}
					}
				}
			};
		}
		return false;
	}

	check_correct_state ( element, level ) {
		
		var out = false, 
			state = 0, 
			m;
		
		if  ( level < 5 ) {
			for ( let [i, v] of GriwpcTools.iteratingOver ( element ) ) {

				if ( i.length < 3 ) {

				if ( this.testerParams.indexOf( i ) > -1 ) {
//				if ( ( i === 'A' ) || ( i === 'Aa' ) || ( i === 'B' ) || ( i === 'D' ) || ( i === 'H' ) || ( i === 'M' ) || ( i === 'U' ) || ( i === 'Y' ) || ( i === 'da' ) || ( i === 'l' ) || ( i === 'o' ) || ( i === 'oa' ) || ( i === 'w' ) ) {
					state++;
				}
				if ( v instanceof Object ) {
					if ( Object.keys(v).length && ( i.length < 3 ) ) {
						if ( v.localName != 'iframe' ) {
							this.check_correct_state ( v, level+1 );
							if ( this._check.length != 0) {
								this._check[ level ] = i;
								return false;
							}
						}
					}
				} else {
					if ( state > this.testerNums ) {
						this._check[ level ] = i;
						return false;
					}
				}

				}

			};

		}
		return false;
	}


	// Initialize Google reCaptcha connector
	iniRECAPTCHA() {

		let unknownNumberPartsKey;

		this.recaptchaActivationIcon.className += ' dashicons-admin-network';
		this.recaptchaActivationIcon.innerHTML = '';

		if ( ( window.___grecaptcha_cfg === undefined ) || ( this.settings.active === false ) ) {

			this.recaptchaActivationIcon.setAttribute ( 'data-value', this.messages.disconnected );
			this.recaptchaActivationIcon.className = this.recaptchaActivationIcon.className.replace( /is\-[\S]*/, 'is-warning' );

		} else {

			this._check = [];
			this._keys  = [];

			if ( window.___grecaptcha_cfg.clients[0] === undefined ) {

				this.recaptchaActivationIcon.setAttribute ( 'data-value', this.messages.disconnected );
				this.recaptchaActivationIcon.className = this.recaptchaActivationIcon.className.replace( /is\-[\S]*/, 'is-warning' );

			} else {

				// Getting the _keys
				this.get_gr_elem( window.___grecaptcha_cfg.clients[0], 0 );
				this._keys.splice( ( this._keys.length - 1 ), 1 );

				// Getting the _check
				this.check_correct_state( window.___grecaptcha_cfg.clients[0], 0 );
				this._check.splice( ( this._check.length - 1 ), 1 );

				unknownNumberPartsKey = ( ( this._check.length === 0 ) ? '' : '.' + this._check.join ( '.' ) ).replace ( /\.([\d]{1,})/g, "[$1]" );

				let checkResult = eval( "window.___grecaptcha_cfg.clients[0]" + unknownNumberPartsKey + "['l'];" );

				if ( checkResult === null ) {
					this.recaptchaActivationIcon.setAttribute ( 'data-value', this.messages.invalidPair );
					this.recaptchaActivationIcon.className = this.recaptchaActivationIcon.className.replace( /is\-[\S]*/, 'is-error' );

				} else {
					this.recaptchaActivationIcon.className = this.recaptchaActivationIcon.className.replace( /is\-[\S]*/, 'is-ok' );
					this.recaptchaActivationIcon.setAttribute ( 'data-value', this.messages.connected );
				}


			}

		}

	}

	// Change recaptcha parameters
	changeRecaptcha ( ) {

		var unknownNumberPartsKey = ( ( this._keys.length === 0 ) ? '' : '.' + this._keys.join ( '.' ) );

		unknownNumberPartsKey = unknownNumberPartsKey.replace ( /\.([\d]{1,})/g, "[$1]" );

		eval( "window.___grecaptcha_cfg.clients[0]" + unknownNumberPartsKey + "['size']  = this.settings.recaptcha_size;" );
		eval( "window.___grecaptcha_cfg.clients[0]" + unknownNumberPartsKey + "['theme'] = this.settings.recaptcha_theme;" );
		eval( "window.___grecaptcha_cfg.clients[0]" + unknownNumberPartsKey + "['type']  = this.settings.recaptcha_type;" );
		eval( "window.___grecaptcha_cfg.clients[0]" + unknownNumberPartsKey + "['hl']    = this.settings.recaptcha_lang;" );
		grecaptcha.reset( this.settings.recaptcha_elem );

		this.put_recaptcha_settings_icon();

	}


	// Plugin Activation Switch
	changePluginStatus( e = null ) {
		
		let self = this;

		this.recaptchaActivationIcon.innerHTML = '<span class="spinner is-active"></span>';
		this.recaptchaActivationIcon.setAttribute ( 'data-value', this.messages.negotiating );
		this.recaptchaActivationIcon.className = this.recaptchaActivationIcon.className.replace ( ' dashicons-admin-network', '' );

		if ( this.pluginActivationSwitcher.checked === true ) {

			if ( this.settings.reCAPTCHAloaded != true ) 
				this.insertingScripts();

			this.pluginActivationIcon.className = this.pluginActivationIcon.className.replace( /is\-[\S]*/, 'is-ok' );
			this.pluginActivationIcon.setAttribute ( 'data-value', this.messages.statusActive );
			this.settings.active = true;
			document.getElementById ( 'griwpc-container-id' ).style.display = 'block';
			document.getElementById ( 'form-plugin-inactive-msg' ).style.display = 'none';
			window.setTimeout ( self.iniRECAPTCHA.bind( this ), 2500 );

		} else {

			this.pluginActivationIcon.className = this.pluginActivationIcon.className.replace( /is\-[\S]*/, 'is-warning' );
			this.pluginActivationIcon.setAttribute ( 'data-value', this.messages.statusInactive );
			this.settings.active = false;
			document.getElementById ( 'griwpc-container-id' ).style.display = 'none';
			document.getElementById ( 'form-plugin-inactive-msg' ).style.display = 'block';
			this.iniRECAPTCHA();

		}


	}


	// Plugin Activation Switch
	changeCreditsStatus( e = null ) {
		this.creditsActivationOutput = document.documentElement.getElementsByClassName ( 'plugin-credits' );
		if ( this.creditsActivationSwitcher.checked === true ) {
			this.creditsActivationIcon.className = this.creditsActivationIcon.className.replace( /is\-[\S]*/, 'is-ok' );
			this.creditsActivationIcon.setAttribute ( 'data-value', this.messages.statusActive );
			if ( this.creditsActivationOutput.length )
				this.creditsActivationOutput[0].style.display = 'inherit';
		} else {
			this.creditsActivationIcon.className = this.creditsActivationIcon.className.replace( /is\-[\S]*/, 'is-warning' );
			this.creditsActivationIcon.setAttribute ( 'data-value', this.messages.statusInactive );
			if ( this.creditsActivationOutput.length )
				this.creditsActivationOutput[0].style.display = 'none';
		}

	}

	sendHiddenAccordionSectionsList() {
		let accordions 	= document.querySelectorAll( '.accordion-container li.accordion-section' ), 
			hiddens 	= [],
			data        = {
				action: 'closed-postboxes',
				closedpostboxesnonce: document.getElementById( 'closedpostboxesnonce').value, 
				hidden: '',
				page: pagenow	
			},
			self = this;

		window.setTimeout ( () => {
			for ( let [i, elem] of GriwpcTools.iteratingOver ( accordions ) ) {
				if ( elem.offsetWidth > 0 && elem.offsetHeight > 0 ) continue;
				hiddens.push ( elem.id );
			}
			data.hidden = hiddens.join( ',' );

			GriwpcAjax.post ( ajaxurl, data, null, true );

		}, 1 );
	}

}
new griwpc_backend_interface( griwpco, griwpbi, jQuery );


/* 
 * Module:      Minor Back-End interface functions
 * Version:     9.1.0
 * Description: Minor HTML modifications for adding Save button to accordion section and rutine for saving hidden accordion sections
 */
jQuery ( document ).ready (function($) { 

	var id_alternate = griwpco.recaptcha_id, language, gr_elem = null;
	var _keys = [], _check = [];

	/**
	 * Restore default value buttons
	 */

/*

	$('.button-restoredefaultvalue').on ( 'click', function (event) {
		event.preventDefault();															 
		var target	= $(event.target).closest('p').find('input, textarea, select');
		target.val( target.data( 'defaultvalue' ) );
		target.trigger( 'change' );
		return false;
	});
*/

	/**
	 * Language Selector
	 */

/*
	function put_language_tag ( item ) {
		var num   = parseInt ( item.attr ( 'value' ) ),
		 	oName = item.data('englishname'),
		 	eName = item.data('nativename'),
			_html = '<span class="' + item.data('fontname')  + '">' + ( ( ( num == -1 ) || (num == -2 ) ) ? eName : eName + ' - <small>' + oName + '</small>' ) + '</span>';

		$('#menu-item-recaptcha_lang-wrap' ). find ('.actual-selection').html ( _html );

	}

    $.widget( "custom.langselectmenu", $.ui.selectmenu, {
		_renderItem: function( ul, item ) {
			var _isCurrent = item.element.attr( "selected" );
			var li = $( "<li>", { class: ( _isCurrent ) ? 'wp-ui-highlight is-current-language' : '' } );
			var wrapper = $( "<div>", { class: 'lang-item' } );
			var fontName = ( item.element.data( "fontname" ) !== undefined ) ? ' '  + item.element.data( "fontname" ) : '';
			var _eName  = $( "<span>", { text: item.element.data( "englishname" ), class: 'eName' } );
			var _oName  = $( "<span>", { text: item.element.data( "nativename" ) , class: 'oName' + fontName } );

			wrapper.append ( _eName );
			wrapper.append ( _oName );
			if ( item.disabled ) {
			  li.addClass( "ui-state-disabled" );
			}
			return li.append( wrapper ).appendTo( ul );
		}
    });


	$("#griwpc_params_recaptcha_lang")
	.langselectmenu({
		width: 314,
		position: { of: '#language-selector-button', my: 'center center', at: "center center" },
		select: function( event, ui ) { 
			$( event.currentTarget ).parent().find ('li').removeClass( 'wp-ui-highlight');
			$( event.currentTarget ).parent().find ('li').removeClass( 'is-current-language');
			$( event.currentTarget ).addClass( 'wp-ui-highlight is-current-language' );
			if ( ui.item.value == -1 ) {
				language = '';
			} else if ( ui.item.value == -2 ) {
				language = $('html').attr('lang');
			} else {
				language  = ui.item.value;
			}
			put_new_recaptcha ();
			put_language_tag ( ui.item.element );
		}
	});
	// Visual button trigger hidden select language jQueryUI field
	$( '#language-selector-button').on ( 'click', function () { $("#griwpc_params_recaptcha_lang-button").trigger('click') } );
*/

	
});
