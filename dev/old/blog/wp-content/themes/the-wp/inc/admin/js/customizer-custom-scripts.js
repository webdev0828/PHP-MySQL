/**
 * Theme Customizer custom scripts
 */

(function($){
	jQuery(document).ready(function($){

	$('.preview-notice').prepend('<div style="clear:both;"></div>');
	
	//Add More Theme Options Button
	$('.preview-notice').
	prepend('<span class="ceewp-upgrade"><a target="_blank" class="button btn-upgrade" href="' + 
	ceewp.upgrade_link + '"><i class="fa fa-star"></i>' + ceewp.upgrade_text + '</a></span>');
	
	$('.preview-notice').
	prepend('<span class="ceewp-upgrade"><a target="_blank" class="button btn-upgrade" href="' +
	ceewp.upgrade_link + '"><i class="fa fa-unlock"></i>' + ceewp.advanced_text + '</a></span>');
	
	$('.preview-notice').
	prepend('<span class="ceewp-upgrade"><a target="_blank" class="button btn-upgrade" href="'
	+ ceewp.docs_link + '"><i class="fa fa-file-text-o"></i>' + ceewp.docs_text + '</a></span>');
	
	$('.preview-notice').
	prepend('<span class="ceewp-upgrade"><a target="_blank" class="button btn-upgrade" href="'
	+ ceewp.support_link + '"><i class="fa fa-life-ring"></i>' + ceewp.support_text + '</a></span>');
	
	$('.preview-notice').
	prepend('<span class="ceewp-upgrade"><a target="_blank" class="button btn-upgrade" href="'
	+ ceewp.donate_link + '"><i class="fa fa-heart"></i>' + ceewp.donate_text + '</a></span>');
	
	$('.preview-notice').
	prepend('<span class="ceewp-upgrade"><a target="_blank" class="button btn-upgrade" href="'
	+ ceewp.feedback_link + '"><i class="fa fa-envelope-o"></i>' + ceewp.feedback_text + '</a></span>');
	
	$('.preview-notice').prepend('<span class="ceewp-upgrade ceewp-howdy">' + ceewp.howdy_text + '</span>');
	
	// Style first word
	$('.ceewp-howdy').each(function() {
           var h = $(this).html();
           var index = h.indexOf(' ');
           $(this).html('<span>' + h.substring(0, index) + '</span>' + h.substring(index, h.length));
    });
	
	// External link
	$(".fa-external-link").append('<br /><span class="ceewp-external"><a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/"> <i class="fa fa-external-link"></i> Live Preview </a></span>');
	
	//
	jQuery('.preview-notice .button, .misc_links').click(function(event) {
		event.stopPropagation();
	});
	//
	});
})(jQuery);