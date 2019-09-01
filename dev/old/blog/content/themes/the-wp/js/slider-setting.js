/**
 * Slider Setting
 * 
 * Contains all the slider settings for the featured post/page slider.
 */
 
jQuery(window).load(function() {
	// Slider Full Size
	var cycleHeight = 'auto';
	if ( jQuery( ".fullsize-enabled" ).length && jQuery( window ).width() > 799 ) {
		var headerSize = jQuery( "#masthead" ).height();
		var cycleHeight = jQuery( window ).height() - headerSize;
	}
	
	//
	jQuery('.slider-cycle').cycle({
		fx:            		'fade',
		next:				'#next-slide',
		prev:				'#prev-slide',
		pager:  			'#controllers',
		activePagerClass: 	'active',
		timeout:       		3000,
		speed:         		1000,
		pause:         		1,
		pauseOnPagerHover: 	1,
		width: 				'100%',
		height:				cycleHeight,
		containerResize: 	0,
		fit:           		1,
		after: 				function ()	{
										jQuery(this).parent().css("height", jQuery(this).height());
									},
	   cleartypeNoBg: 		true
	
	});
	
	//
	if ( jQuery( ".fullsize-enabled" ).length && jQuery( window ).width() > 799 ) {
		jQuery( ".slider-cycle .slider-image-wrap img" ).each(function() {
			jQuery( this ).addClass( "transparent" );
			jQuery( this ).parent().parent().parent().css('background-image', 'url(' + jQuery( this ).attr( "src" ) + ')').addClass( "fit" );
		});
		
		jQuery(".slider-wrap section").parallax("50%", 0.3);
	}

});