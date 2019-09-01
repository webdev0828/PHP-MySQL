(function($) {

	var azonbooster = {

		initAll: function() {

			this.navigation();
			this.navSearch();
		},
		navigation: function() {

			// Apply top position for nav first
			var mhHeigh = $('#masthead').innerHeight();
			$('#site-navigation').css('top', mhHeigh + 'px' );

			$('.menu-toggle').on('click touch', function() {

				var hasActive = $(this).hasClass('active');

				if ( !hasActive ) {

					$('body').addClass('nav-open');
					$(this).addClass('active');
					
				} else {

					$('body').removeClass('nav-open');
					$(this).removeClass('active');
				}

			});

			// Close menu
			$('.menu-close-btn i').on('click touch', function() {
				$('body').removeClass('nav-open');
				$('.menu-toggle').removeClass('active');
			});
		},

		navSearch: function() {

			$('.search-toggle').on('click', function(e) {
				e.preventDefault();

				$(this).addClass('active');
				$('body').addClass('search-open');
				$(this).hide();
			});

			$('.search-toggle-close').on('click', function(e) {
				e.preventDefault();
				$(this).removeClass('active');
				$('body').removeClass('search-open');
				$('.search-toggle').show('slow');
			});
		}
	};

	$(document).ready(function() {
		azonbooster.initAll();
	});

})(jQuery);