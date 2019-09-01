$(function(){	
	// Scroll Function for Sidebar
	function setHeight() {
		windowHeight = $(window).height();
			if ($(window).width() < 991){
				$('.sidebar-collapse').css('max-height', windowHeight - 110);
			}else{
				if($(".navbar-side").hasClass("fixed")){
					$('.sidebar-collapse').css('max-height', windowHeight);
				}else{
					$('.sidebar-collapse').css('max-height', 5000);
				}
			}
	};
	setHeight(); 
	$(window).resize(function(){
		setHeight();
	});
	
	/*
	if($('.sidebar-collapse').length > 0){		
		$('.sidebar-collapse').slimScroll({
			height: '100%',
			width: '100%',
			size: '1px'
		});
	}*/
});

$(window).load(function(){
	//Fixed header Gap
	if($('.navbar-top.fixed').length > 0){
		var header_H = $('.navbar-top.fixed').css('height');
		$('#main-container').attr('style', 'margin-top:'+ header_H).find('#page-wrapper').attr('style', 'margin-top:'+ 15+'px');
		console.log( header_H  /*+ ', ' + $('#main-container').attr('style','margin-top')*/ );
	}
});