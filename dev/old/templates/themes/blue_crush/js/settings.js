/* Modernizr 2.8.3 (Custom Build) | MIT & BSD | * Build: http://modernizr.com/download/#-shiv-teststyles */
;window.Modernizr=function(a,b,c){function u(a){i.cssText=a}function v(a,b){return u(prefixes.join(a+";")+(b||""))}function w(a,b){return typeof a===b}function x(a,b){return!!~(""+a).indexOf(b)}function y(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:w(f,"function")?f.bind(d||b):f}return!1}var d="2.8.3",e={},f=b.documentElement,g="modernizr",h=b.createElement(g),i=h.style,j,k={}.toString,l={},m={},n={},o=[],p=o.slice,q,r=function(a,c,d,e){var h,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:g+(d+1),l.appendChild(j);return h=["&#173;",'<style id="s',g,'">',a,"</style>"].join(""),l.id=g,(m?l:n).innerHTML+=h,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=f.style.overflow,f.style.overflow="hidden",f.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),f.style.overflow=k),!!i},s={}.hasOwnProperty,t;!w(s,"undefined")&&!w(s.call,"undefined")?t=function(a,b){return s.call(a,b)}:t=function(a,b){return b in a&&w(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=p.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(p.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(p.call(arguments)))};return e});for(var z in l)t(l,z)&&(q=z.toLowerCase(),e[q]=l[z](),o.push((e[q]?"":"no-")+q));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)t(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof enableClasses!="undefined"&&enableClasses&&(f.className+=" "+(b?"":"no-")+a),e[a]=b}return e},u(""),h=j=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e.testStyles=r,e}(this,this.document);

/* CSS Browser Selector v0.4.0 (Nov 02, 2010), Rafael Lima (http://rafael.adm.br), http://rafael.adm.br/css_browser_selector, License: http://creativecommons.org/licenses/by/2.5/, Contributors: http://rafael.adm.br/css_browser_selector#contributors */
function css_browser_selector(u){var ua=u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1},g='gecko',w='webkit',s='safari',o='opera',m='mobile',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3.6')?g+' ff3 ff3_6':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('blackberry')?m+' blackberry':is('android')?m+' android':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?m+' j2me':is('iphone')?m+' iphone':is('ipod')?m+' ipod':is('ipad')?m+' ipad':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win'+(is('windows nt 6.0')?' vista':''):is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);
/* Target IE 10 with JavaScript and CSS property detection. # 2013 by Tim Pietrusky # timpietrusky.com */
var ie10Styles=['msTouchAction','msWrapFlow','msWrapMargin','msWrapThrough','msOverflowStyle','msScrollChaining','msScrollLimit','msScrollLimitXMin','msScrollLimitYMin','msScrollLimitXMax','msScrollLimitYMax','msScrollRails','msScrollSnapPointsX','msScrollSnapPointsY','msScrollSnapType','msScrollSnapX','msScrollSnapY','msScrollTranslation','msFlexbox','msFlex','msFlexOrder'];var ie11Styles=['msTextCombineHorizontal'];var d=document;var b=d.body;var s=b.style;var ieVersion=null;var property;for(var i=0;i<ie10Styles.length;i++){property=ie10Styles[i];if(s[property]!=undefined){ieVersion="ie10";}}
for(var i=0;i<ie11Styles.length;i++){property=ie11Styles[i];if(s[property]!=undefined){ieVersion="ie11";}}if(ieVersion){$('html').addClass(ieVersion);}else{}if($('html').hasClass('ie10')||$('html').hasClass('ie11')){$('html').addClass('ie1011')};

//Author: Muhmmad Munir, website: FSDSolutions.com
$(document).ready(function(e){

	new WOW({
		mobile: false
	}).init();

	//MainBanner
	if($('#mainBanner.flexslider').length){
		$('#mainBanner.flexslider').flexslider({
			animation: "slide",
			animationSpeed: 1500,
			prevText: '',
			nextText: ''
		});
	}

	//Testimonial
	if($('#testimonials.flexslider').length){
		$('#testimonials.flexslider').flexslider({
			animation: "slide",
			animationSpeed: 1500,
			prevText: '',
			nextText: ''
		});
	}

	//Toggler
	$('.toggler').click(function(e){
		e.preventDefault();
		
		if($(this).attr('href')){
			var openElementHref=$(this).attr('href');
			$(openElementHref).slideToggle('fast');
		} else if($(this).attr('data-id')){
			var openElementID=$(this).attr('data-id');
			$("#"+openElementID).slideToggle('fast');
		}
	});

	//no inner banner
	if($(document).find('#content')){
		if($(document).find('#innerBanner').length < 1){
			$(document).find('#content').css('padding-top','65px');
		}
	}
    
	// Magnific Popup [Start]
    //Popup Model
    if(jQuery('.popup-modal').length > 0){
        jQuery('.popup-modal').magnificPopup({
            type: 'inline',
            preloader: false
        });
        jQuery(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            jQuery.magnificPopup.close();
        });
    };
    
	// Image Link
	if(jQuery('.popup-link').length > 0){
		jQuery('.popup-link').magnificPopup({ 
		  type: 'image'
		});
	};
	
	//iframe pop
	if(jQuery('.iframe').length > 0){
		jQuery('.iframe').magnificPopup({ 
			markup: '<div class="mfp-iframe-scaler">'+
				'<div class="mfp-close"></div>'+
				'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
			  '</div>',
			type: 'iframe'
		});
	};
	
    // Gallery
	if(jQuery('.popup-gallery').length > 0){
		jQuery('.popup-gallery').magnificPopup({
			type: 'image',
			gallery:{
				enabled:true
			}
		});
	};
    
	// Inline
	if(jQuery('.inline').length > 0){
		jQuery('.inline').magnificPopup({
		 inline: {
			  markup: '<div class="inline-popup">'+
			  '<div class="mfp-close"></div>'+
			  '<div class="mfp-content"></div>'+
			  '</div>'
			}
		});
	};
	
}); //END document.ready

$(window).load(function(e){
    
    
}); //END window.load

function jqUpdateSize(){
    //window dimensions
	var w_width = $(window).width();	
	var w_height = $(window).height();
	
	//document dimensions
	var d_width = $(document).width();	
	var d_height = $(document).height();
	
	if(w_width >= 1003){
		
	}
};
$(document).ready(jqUpdateSize);
$(window).resize(jqUpdateSize);