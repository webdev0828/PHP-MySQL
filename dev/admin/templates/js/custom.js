/*
 * custom.js
 *
 * Place your code here that you need on all your pages.
 */
"use strict";
$(document).ready(function(){
	//===== Sidebar Search (Demo Only) =====//
	$('.sidebar-search').submit(function (e) {
		//e.preventDefault(); // Prevent form submitting (browser redirect)
		$('.sidebar-search-results').slideDown(200);
		return false;
	});
	$('.sidebar-search-results .close').click(function() {
		$('.sidebar-search-results').slideUp(200);
	});
	//===== .row .row-bg Toggler =====//
	$('.row-bg-toggle').click(function (e) {
		e.preventDefault(); // prevent redirect to #
		$('.row.row-bg').each(function () {
			$(this).slideToggle(200);
		});
	});
	//===== Sparklines =====//
	$("#sparkline-bar").sparkline('html', {
		type: 'bar',
		height: '35px',
		zeroAxis: false,
		barColor: App.getLayoutColorCode('red')
	});
	$("#sparkline-bar2").sparkline('html', {
		type: 'bar',
		height: '35px',
		zeroAxis: false,
		barColor: App.getLayoutColorCode('green')
	});
	//===== Refresh-Button on Widgets =====//
	$('.widget .toolbar .widget-refresh').click(function() {
		var el = $(this).parents('.widget');
		App.blockUI(el);
		window.setTimeout(function () {
			App.unblockUI(el);
			noty({
				text: '<strong>Widget updated.</strong>',
				type: 'success',
				timeout: 1000
			});
		}, 1000);
	});
	//===== Fade In Notification (Demo Only) =====//
	setTimeout(function() {
		$('#sidebar .notifications.demo-slide-in > li:eq(1)').slideDown(500);
	}, 3500);
	setTimeout(function() {
		$('#sidebar .notifications.demo-slide-in > li:eq(0)').slideDown(500);
	}, 7000);
	
	//===== Lightbox Implementation===========//

	$("body").on("click",".fancy-image",function (e){
		e.preventDefault();
		$.fancybox({href:$(this).attr('href')});
		return false;
		
	});

	$("body").on("click",".fancy-video",function (e){
		e.preventDefault();

		var url = $(this).attr('href');
		$.fancybox({
			href: url,
			type: 'iframe'
		}); // fancybox

		return false;
	});

	$("body").on("click",".fancy-page",function (e){
		e.preventDefault();

		var url = $(this).attr('href');

		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			success: function (data) {
				$.fancybox(data, {
					fitToView: false,
					width: 905,
					height: 505,
					autoSize: false,
					closeClick: false,
					openEffect: 'none',
					closeEffect: 'none',
					hideOnContentClick: true
				}); // fancybox
			} // success
		}); // ajax

		return false;
	});

	$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});

	
	//===== Video lightbox===================//
	$("a[rel='video']").fancybox({
		'padding'		: 0,
		'cyclic'        : true,
		'autoScale'		: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'width'			: 640,
		'height'		: 360,	
		'showNavArrows' : false,
		'titlePosition' : 'inside',
		'titleFormat'	: formatTitle
	});
	
	/* make the crumb bar fixed*/
	stickyCrumb();
	
	$("#geolocate").click(function(){
		var ip	= $("#ip2geo").val(),
			rgx = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/;
			
		if ($.trim(ip) != "" ) {
			if (rgx.test(ip) == true) {
				$.post('includes/geoip.php', {ip:ip}, function(response){
					var obj = jQuery.parseJSON(response);
					if (obj.error != "") {
						alert(obj.error);
					}else{
						$("#ipcountry").val(obj.success.country_name);
					}
				});	
			}else{
				alert('IP Address not valid.');
			}			
		}else{
			alert('Please enter IP Address.');
		}		
	});
	
	$("#EmailForm").submit(function (e){
		
		var subBtn= $(this).find('input[type="submit"]');
		if (subBtn.hasClass('ajaxEmail')) {
			e.preventDefault();
			var subText= $("input[name='subject']").val();
			var mess = $("textarea[name='message']").val();
			var choice = $("select[name='choice']").val();
			$.post('../templates/email/mail.bulk.count.php', {subject : subText, message : mess, choice : choice, emailAuth : "yes"}, function (response){
				if (response.error != "") {
					$(".page-header").after('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'+response.error+'</div>')
				}else{
					var current = 0,
						total 	= 0,
						total_emails = response.success;
					
					if (total_emails > 0 ) {
						$("#email_progress").fancybox({
							padding : 0,
							margin : 0,
							hideOnOverlayClick : false,
							showCloseButton 	:false,
							showNavArrows	: false,
							centerOnScroll : true,
							type : 'ajax',
							afterLoad : function (){
								$("#total_emails").html(total_emails);
								sendEmail(subText, mess, choice, current, total_emails, total);		
							}
						});
						$("#email_progress").trigger('click');
					}
				}
			}, 'json');
		}
	});
        
        
        
        //this is for bulk comissions_pending task
        $("#dyntable_commissions_pending_wrapper").on("click", ".ajaxComissions", function (e) {
            if ($(this).hasClass('ajaxComissions')) {
                //this is ajax request
                e.preventDefault();
                var task = $(this).attr('name');
                var decid = $('input[name="decid[]"]:checked').map(function() {return this.value;}).get();
                
                if(!$.isEmptyObject(decid)) {
                    var current = 0,
                    total = 0,
                    total_emails = decid.length;
					//console.log(total_emails);

                    $(".email_progress").fancybox({
                        padding: 0,
                        margin: 0,
                        hideOnOverlayClick: false,
                        showCloseButton: false,
                        showNavArrows: false,
                        centerOnScroll: true,
                        type: 'ajax',
                        afterLoad: function () {
                            //$("#total_emails").html(total_emails);
                            processCommission(current, total_emails, total, task, decid);
                        }
                    });
                    $(".email_progress").trigger('click');
                }
            }
            return false;
        });

        function processCommission(current, total_emails, total, task, decid) {

			$(".total_commission").html(total_emails);

            var data = {};
            if(task === "q_approve") {
                data = { decprocess:'yes', ajax_request:"yes", csrf_token: $("form#comissions_pending input[name='csrf_token']").val(), q_approve:"yes", decid:[decid[current]] };
            } else {
                data = { decprocess:'yes', ajax_request:"yes", csrf_token: $("form#comissions_pending input[name='csrf_token']").val(), q_decline:'yes', decid:[decid[current]] };
            }

            $.ajax({
                url : 'commissions_pending.php',
                type : 'POST',
                data: data,
                success: function(response) {
                    current++;
					//console.log('current');
					//console.log(current);
                    total = (current/total_emails)*100; 
                    $("#mail_sent").html(current);
                    $("#total_percent").html(Math.floor(total));
                    $("#progress_success").css("width", total + "%");
                    if (current != total_emails) {
                            processCommission(current, total_emails, total, task, decid);
                    } else{
                        if(current == total_emails){
                            $.fancybox.close();
                            $('#dyntable_commissions_pending').dataTable()._fnAjaxUpdate();
                        }
                    }
                }
            });
        }
        //end of bulk comissions_pending task
        
        
        
	// do a ajax request to check session
	// and if response is timeout then redirect user
	// to login page. 
	setInterval(function (){
		$.post("includes/validate.session.php", function (data){
			if (data == "timeout") {
				window.location.href = 'index.php?timeout=true';
			}
		});
	}, 500000);


	//admin view tier tree
	if($('#dyntable_payment_Tier').length > 0) {
		var user_account = $('#tier_select').val();
		$('#dyntable_payment_Tier').dataTable({
			"bProcessing"	: true,
			"bServerSide"	: true,
			"sAjaxSource"	: "reports/admin_tiers/core_ajax_tier.php?id=" + user_account,
			"aaSorting"     : [[ 0, "desc" ]],
			"bFilter"           : false

		});

		$('#dyntable_payment_Tier').on('click', '.load_more', function(){
			var th = $(this);
			var space = th.data('space');
			var parent = th.data('parent');
			var page_now = th.data('page_now');
            var token = th.data('token');
			//var str = 'Space: ' + space + ', Parent: ' + parent + ', Page Now: ' + page_now;
			//console.log(str);
			var data = {
				'space' : space,
				'parent' : parent,
				'page_now' : page_now,
                'csrf_token': token
			};
			th.html('Loading...');
			//call ajax
			$.ajax({
				url: "reports/admin_tiers/core_tier_getchild.php",
				data: data,
				method: "POST",
				dataType: "json"
			}).error(function (err) {
				console.log(err);

			}).done(function () {
				th.html('<strong>+</strong>');
			}).success(function (response) {

				if (response.success) {
					if ( response.output && response.output != '' ) {
						th.closest( "tr" ).after( response.output );
					}
				}

				if (response.end && response.end == 1) {
					th.hide();
				} else {

					if ( response.page_now ) {
						th.data('page_now', response.page_now);
					}

					if ( response.space ) {
						th.data('space', response.space);
					}
				}

			}, 'json');


		});

	}


        
});
$(window).resize(function (){
	stickyCrumb();
});
function sendEmail(subText, mess, choice, current, total_emails, total){
	$.ajax({
		url : '../templates/email/mail.send_bulk.php',
		type : 'POST',
		data: {subject : subText, message : mess, choice : choice, offset : current, emailAuth : "yes"},
		success: function(data) {
			current++;
			total = (current/total_emails)*100; 
			$(".mail_sent").html(current);
			$(".total_percent").html(Math.floor(total));
			$(".progress_success").css("width", total + "%");
			if (current != total_emails) {
				sendEmail(subText, mess, choice, current, total_emails, total);				
			}else{
				if(current == total_emails){
					$.fancybox.close();					
				}
			}
		}
	});
}
function formatTitle(title, currentArray, currentIndex, currentOpts) {
	return '<div class="videoNav clearfix"><a href="javascript:;" onclick="$.fancybox.next();" class="prev">prev</a> <span class="title">' + title + '</span> <a href="javascript:;" onclick="$.fancybox.prev();" class="next">next</a></div>';
}
function stickyCrumb()
{
	var windowWidth = $(window).width();
	var sidebarWidth= $("#sidebar").outerWidth(true);
	$(".container.crumbFix > .crumbs").width(windowWidth-sidebarWidth);
}

if (typeof flowplayer !== 'undefined' && flowplayer.support.firstframe) {
flowplayer(function (api, root) {
    // show poster when video ends
    api.bind("resume finish", function (e) {
      root.toggleClass("is-poster", /finish/.test(e.type));
    });
});
}

function limitText(field, counter, limit, pad) {
	if ((field.value.match(/_afflink_/g) || []).length >= 1) {
		var length = pad * (field.value.match(/_afflink_/g) || []).length + (field.value.length - 9 * (field.value.match(/_afflink_/g) || []).length);
	}
	else {
		var length = field.value.length;
	}
	
	if (length > 140) {
		counter.style.color = '#CC0000';
	}
	else {
		counter.style.color = 'inherit';
	}
	
	counter.innerHTML = limit - length;
}

