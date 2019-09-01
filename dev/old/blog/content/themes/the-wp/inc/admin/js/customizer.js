jQuery(function($){
	jQuery(function($){
		// Layout
		var layout = wp.customize('layout').get();
		if ( layout == 'fullsize' ) $('#customize-control-layout_size' ).hide();
		wp.customize( 'layout', function( value ) {
			value.bind( function( to ) {
				if ( to == 'fullsize' )
					$( '#customize-control-layout_size' ).hide();
				else
					$( '#customize-control-layout_size' ).show();
			} );
		} );
		// Logo Icon (sitetitle)
		var logo = wp.customize('logo').get();
		if ( logo ) $('#customize-control-header_icon' ).hide();
		wp.customize( 'logo', function( value ) {
			value.bind( function( to ) {
				if ( to )
					$('#customize-control-header_icon' ).hide();
				else
					$('#customize-control-header_icon' ).show();
			} );
		} );
		//
	});
});