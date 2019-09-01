/*
 * Plugin:      reCAPTCHA in WP comments form
 * Path:        /js
 * File:        compatibility.js
 * Since:       0.0.8
 */

/* 
 * Module:      forced javascript reCATPCHA captcha output
 * Version:     0.0.9.0.2
 * Description: This module forces a javascript reCAPCTCHA output in case of the theme doesn't use comment_form() function
 */
(function(c){ 
	q = parseInt(c.standardQueries);
	var x=((q==0)||(q==2))?document.getElementById(c.formID):document.querySelectorAll(c.formQuery)[c.formQueryElem], 
	    a=((q==0)||(q==1))?GriwpcTools.GetElementById(x, c.buttonID).parentNode: x.querySelectorAll(c.buttonQuery)[c.buttonQueryElem].parentNode, 
	    o=document.createElement(c.recaptcha_tag), 
	    s='<span id="griwpc-widget-id" class="g-recaptcha" data-forced="1" ></span>', 
	    p=a.previousElementSibling;
	o.innerHTML=s;
	o.id="griwpc-container-id";
	o.className='google-recaptcha-container recaptcha-align-' + c.recaptcha_align;
	try { x.insertBefore(o,a); }
	catch (error) { p.parentNode.insertBefore(o,p.nextSibling); }
})(griwpco);