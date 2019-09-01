function mymenu() {
	"use strict";

	//////////////////////////////////////////////////////
	// NAVIGATION PAGES DROP DOWN SCRIPT
	//////////////////////////////////////////////////////
	var myTarget = $(".main_menu_cont > ul > li");
	var childname = '.sub-menu';

	myTarget.each(function() {

			if ( $(this).children(childname).length > 0 ) {
				if($(this).children("i.showSMenu").length < 1) {
					$(this).append('<i class="showSMenu"></i>');
				}
			}
    });

	$(".main_menu_cont > ul > li > i.showSMenu").click(function(e){
		e.preventDefault();
		$(this).prev("ul").stop().slideToggle(200);
		//$(this).prev("ul").toggleClass("show-sub-menu");
	});


}


//submenu adjustments
function submenu_adjustments() {
		"use strict";

		var somevar = $(window).width();

		if (somevar > 980) {

				console.log("submenu_adjustments CALL");

				$(".main_menu_cont > ul > li").mouseenter(function() {
					console.log("submenu_adjustments HOVER");

					var childname = '.sub-menu';

					if ( $(this).children(childname).length > 0 ) {
						var submenu = $(this).children(childname);
						var window_width = parseInt($(window).innerWidth());
						var submenu_width = parseInt(submenu.width());
						var submenu_offset_left = parseInt(submenu.offset().left);
						var submenu_adjust = window_width - submenu_width - submenu_offset_left;

						console.log("window_width: " + window_width);
						console.log("submenu_width: " + submenu_width);
						console.log("submenu_offset_left: " + submenu_offset_left);
						console.log("submenu_adjust: " + submenu_adjust);

						if (submenu_adjust < 0) {
							submenu.css("left", submenu_adjust-30 + "px");
							submenu.addClass("no-arrow");
							console.log("submenu_adjustments LEFT");
						}
					}
					else {
						$(this).children(childname).removeClass("no-arrow");
					}
				});
		}
}




$(window).resize(function() {
	"use strict";

	var somevar = $(window).width();

	if (somevar >= 980) {
		//$(".show-sub-menu").removeClass("show-sub-menu");
		$(".main_menu_cont > ul ul").removeAttr("style");
	}


	submenu_adjustments();
});



$(document).ready(function() {
	"use strict";

	mymenu();

	submenu_adjustments();





	//////////////////////////////////////////////////////
	// MOBILE MENU SCRIPT
	//////////////////////////////////////////////////////
	$('.mbmenu').click(function() {
        $(this).next('div').children('ul').slideToggle(400);
		e.preventDefault();
    });


});