// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
jQuery(function () {
    jQuery('#myTab a:last').tab('show')
})




		
		
		
		$('.affiliate-tons > .container > div.tons-right:odd').addClass('box-left');
		$('.affiliate-tons > .container > div.tons-right:eq(0)').css("margin-top",0);
		
		/*$('.affiliate-tons > .container').each(function()
		{
		   //alert($(this).children('tbody').children(':odd').length)
		   $('.affiliate-tons > .containerdiv.tons-right').children(':even').addClass('box-left');
		});*/
});

$(window).load(function() {
//////////////////////////////////////////////////////
	// PROJECT LISTING
	//////////////////////////////////////////////////////
	// external js: isotope.pkgd.js

		
		function getHashFilter() {
		  // get filter=filterName
		  var matches = location.hash.match( /filter=([^&]+)/i );
		  var hashFilter = matches && matches[1];
		  return hashFilter && decodeURIComponent( hashFilter );
		}
		
		$( function() {
		
		  var $grid = $('#project_listing1');
		
		  // bind filter button click
		  var $filterButtonGroup = $('.filter-button-group');
		  $filterButtonGroup.on( 'click', 'button', function() {
			var filterAttr = $( this ).attr('data-filter');
			// set filter in hash
			location.hash = 'filter=' + encodeURIComponent( filterAttr );
		  });
		
		  var isIsotopeInit = false;
		
		  function onHashchange() {
			var hashFilter = getHashFilter();
			if ( !hashFilter && isIsotopeInit ) {
			  return;
			}
			isIsotopeInit = true;
			// filter isotope
			$grid.isotope({
			  /*itemSelector: '.item',
			  layoutMode: 'fitRows',*/
			  filter:  hashFilter,
			  itemSelector: '.item',
			  percentPosition: true
			});
			// set selected class on button
			if ( hashFilter ) {
			  $filterButtonGroup.find('.is-checked').removeClass('is-checked');
			  $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
			}
		  }
		
		  $(window).on( 'hashchange', onHashchange );
		
		  // trigger event handler to init Isotope
		  onHashchange();
		
		});
});

//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	
	
//#############################################################################################################################################
// Part 1: Custom functions START
//#############################################################################################################################################

//////////////////////////////////////////////////////
// scroll to top function
//////////////////////////////////////////////////////
$(document).ready(function(e) {
function scroll_top() {
	if($('.scroll_top').length) {
		if ($(this).scrollTop() > 600) {
			$('.scroll_top').fadeIn();
		} else {
			$('.scroll_top').fadeOut();
		}
	}
}
// scroll to top function END


//#############################################################################################################################################
// Part 2: Document Ready START
//#############################################################################################################################################




	//////////////////////////////////////////////////////
	// equalwidth
	//////////////////////////////////////////////////////
	//equalwidth();


	//////////////////////////////////////////////////////
	// scroll to top
	//////////////////////////////////////////////////////
	scroll_top();
	if($('.scroll_top').length) {
		//Click event to scroll to top
		$('.scroll_top').click(function(){
			$('html, body').animate({scrollTop : 0},600);
			return false;
		});
	}
	//////////////////////////////////////////////////////
	// scroll to top
	//////////////////////////////////////////////////////
	scroll_top();


});

//$('#sliderTabs > li > a').click( function() {
//	$('#sliderTabs > li').addClass('activeSlide');
//    $('#sliderTabs > li.activeSlide').removeClass('activeSlide');
//    $(this).parent().addClass('activeSlide');
//} );


var $flexslider = $('.flexslider');
$flexslider.flexslider({
  animation: "fade",
  manualControls: ".flex-control-nav li",
  useCSS: false /* Chrome fix*/
});