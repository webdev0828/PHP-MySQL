jQuery(document).ready(function($) { 
    'use strict';

    var $document = $(document);
    var $window = $(window);


    /**
    * Document ready (jQuery)
    */
    $(function () {

        /**
         * Activate superfish menu.
         */
        $('.sf-menu').superfish({
            'speed': 'fast',
            'delay' : 0,
            'animation': {
                'height': 'show'
            }
        });

    });

        /**
         * SlickNav
         */

	$('#menu-main-slick').slicknav({
		prependTo:'.navbar-header',
		label: telescopeStrings.slicknav_menu_home,
		allowParentLinks: true
	});

    $window.on('load', function() {
        /**
         * Activate main slider.
         */
        $('#ilovewp-featured-posts').sllider();

    });


    $.fn.sllider = function() {
        return this.each(function () {
            var $this = $(this);

            var flky = new Flickity('.slides', {
                autoPlay: 5000,
                cellAlign: 'center',
                contain: true,
		imagesLoaded: true,
                percentPosition: false,
                //prevNextButtons: false,
                pageDots: true,
                wrapAround: true,
                accessibility: false
            });
        });
    };

    function telescope_mobileadjust() {
        
        var windowWidth = $(window).width();

        if( typeof window.orientation === 'undefined' ) {
            $('#menu-main-menu').removeAttr('style');
         }

        if( windowWidth < 769 ) {
            $('#menu-main-menu').addClass('mobile-menu');
         }
 
    }
    
    telescope_mobileadjust();

    $(window).resize(function() {
        telescope_mobileadjust();
    });

});