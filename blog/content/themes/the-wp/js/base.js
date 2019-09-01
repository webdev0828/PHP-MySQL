/*
		Theme Name: The WP
		Theme URI: http://ceewp.com/our-themes/the-wp-wordpress-theme
		Author: Ben Alvele
		License: GNU General Public License v2 or later
		License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

(function($){
	jQuery(document).ready(function($){
		// Fitvids-doc-ready
		// Target your .container, .wrapper, .post, etc.
    	jQuery("#main").fitVids();
				
		// Main Menu
		$("#site-navigation > div > ul").addClass( "nav-menu" );
		$("#site-navigation > div > ul > li > a").addClass( "padding-effect rippler rippler-default" );
		
		if ( $( "#site-navigation.position-default" ).length && $( window ).width() > 799 ) {
			var headerHeight = jQuery( "#masthead" ).height() + jQuery( "#site-navigation.position-default" ).height();
			$('header.site-header').css('min-height', headerHeight);
		}
				
		// Clone main menu for Responsive menu
		$( "#site-navigation > div" ).clone().prependTo( "#responsive-menu" );
		
		// Current Item
		var current = $("#site-navigation .current-menu-item > a").text();
		if (current) $(".responsive-menu-bar span").text( current );
		
		// Responsive Menu Expand/Collapse
		$(".open-responsive-menu").click(function () {
			$content = $('#responsive-menu');
			$content.slideToggle(500, function () {
				// do
			});
		});
		
		// Fixed / Sticky Menu (Not works in responsive mode)
		if ( $( "#site-navigation.fixed" ).length && $( window ).width() > 799 ) {
			var nav = $('#site-navigation.fixed');
			var header = $('header.site-header');
			var navHomeY = nav.offset().top;
			var isFixed = false;
			var $w = $(window);
			var top = ($( "#wpadminbar" ).length ? 32 : 0);
			var navWidth = header.width();
			nav.css({width: navWidth});
			$w.scroll(function () {
				var scrollTop = $w.scrollTop();
				var shouldBeFixed = scrollTop > navHomeY;
				if (shouldBeFixed && !isFixed) {
					nav.css({
						position: 'fixed',
						top: top,
						bottom: 'auto',
						width: navWidth
					});
					
					nav.addClass( 'hover' );
					//header.css('marginTop', nav.height());
					isFixed = true;
				} else if (!shouldBeFixed && isFixed) {
					if ($('.main-navigation').hasClass('position-top')) {
						nav.css({
							position: 'relative',
							top: 'auto',
						});
						nav.addClass( 'hover' );
					} else {
						nav.css({
							position: 'absolute',
							top: 'auto',
							bottom: 0,
						});
						
						nav.removeClass( 'hover' );
					}
					header.css('marginTop', 0);
					isFixed = false;
				}
			});
		} else {
			$('#site-navigation').css({width: '100%'});
		}
		
		// Wirdget: First word in title
		$('#secondary .widget-title').each(function() {
           var h = $(this).html();
           var index = h.indexOf(' ');
		   if(index == -1) {
               index = h.length;
           }
           $(this).html('<span>' + h.substring(0, index) + '</span>' + h.substring(index, h.length));
    	});
		
		//
		if ( ! $( "#secondary" ).length ) {
			$( "#primary" ).addClass( 'no-sidebar' );
		}
		
		// Stats Widget
		$('.number').counterUp({
			delay: 10,
			time: 1000
		});
		
		// Text Rotator Widget
		$('div.rotator').each(function() {
			var animation = $(this).attr('data-animation');
			$(this).find(".rotate").textrotator({
				animation: animation, speed: 1000
			});
		});
		
		// Rippler Effect
		$(".button-item").addClass( "rippler rippler-default" );
		$("footer.entry-footer > span").addClass( "rippler rippler-bs-info" );
		$("header .entry-meta > span").addClass( "rippler rippler-bs-info" );
		
		
		
		$(".rippler").rippler({
			effectClass      :  'rippler-effect'
			,effectSize      :  0      // Default size (width & height)
			,addElement      :  'span'   // e.g. 'svg'(feature)
			,duration        :  400
		});
		
		// Parallax
		//.parallax(xPosition, speedFactor, outerHeight)
		if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
			// notice for mobile users 
        } else {
			$(".site-header").parallax("50%", 0.4);
			$(".parallax-widget").parallax("50%", 0.4);
		}
		
		// cause parallax to recalculate dimensions
		$(window).trigger('resize.px.parallax');
		
		//	Back To top					
		jQuery('#back_top').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 'normal');return false;
		});	
		jQuery(window).scroll(function(){
			if(jQuery(this).scrollTop() !== 0){jQuery('#back_top').fadeIn();}else{jQuery('#back_top').fadeOut();}
		});
		if(jQuery(window).scrollTop() !== 0){jQuery('#back_top').show();}else{jQuery('#back_top').hide();}
	});
	
/*
// end of jQuery doc-ready
*/

	// skip-link-focus-fix:
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}

// End of jquery
})(jQuery);