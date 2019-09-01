
/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
//////////////
/*
---------- HEADER --------
*/
wp.customize( 'header_icon', function( value ) {
	value.bind( function( to ) {
		console.log(to);
		$(".site-title > i").removeAttr('class');
		$(".site-title > i").addClass( "fa " + to );
	});
});
wp.customize( 'header_size', function( value ) {
	value.bind( function( to ) {
		if ( to != '0' ) {
			$( 'header.site-header' ).css( {
					'clip': 'auto',
					'height': to,
				} );
		}
	});
});
wp.customize( 'address', function( value ) {
	value.bind( function( to ) {
		$( '.ca' ).text( to );
	});
});
wp.customize( 'address_color', function( value ) {
	value.bind( function( to ) {
		$('.header-description div.ca').css('color', to ? to : '' );
	});
});
wp.customize( 'phone', function( value ) {
	value.bind( function( to ) {
		$( '.cp' ).text( to );
	});
});
wp.customize( 'phone_color', function( value ) {
	value.bind( function( to ) {
		$('.header-description div.cp').css('color', to ? to : '' );
	});
});
wp.customize( 'mail', function( value ) {
	value.bind( function( to ) {
		$( '.cm' ).text( to );
	});
});
wp.customize( 'mail_color', function( value ) {
	value.bind( function( to ) {
		$('.header-description div.cm').css('color', to ? to : '' );
	});
});
wp.customize( 'hours', function( value ) {
	value.bind( function( to ) {
		$( '.ch' ).text( to );
	});
});
wp.customize( 'hours_color', function( value ) {
	value.bind( function( to ) {
		$('.header-description div.ch').css('color', to ? to : '' );
	});
});
/*
---------- LAYOUT --------
*/
wp.customize( 'layout_size', function( value ) {
	value.bind( function( to ) {
			$( '.site' ).css( {
					'max-width': to + 'px',
				} );
	});
});

/*
---------- TYPO --------
*/
wp.customize( 'font_size_site_title', function( value ) {
	value.bind( function( to ) {
			$( '.site-title' ).css( {'font-size': to + 'px'} );
	});
});
wp.customize( 'font_size_tagline', function( value ) {
	value.bind( function( to ) {
			$( '.site-description' ).css( {'font-size': to + 'px'} );
	});
});
wp.customize( 'font_size_main_menu', function( value ) {
	value.bind( function( to ) {
			$( '.main-navigation' ).css( {'font-size': to + 'px'} );
	});
});
//////////////
} )( jQuery );
