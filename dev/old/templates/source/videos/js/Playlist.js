var PLAYER = PLAYER || {};
PLAYER.Playlist = function ($, video, options, mainContainer,element,/*ytWrapper,youtubePlayer,*/ preloader, myVideo, canPlay, click_ev, pw, hasTouch, deviceAgent, agentID, youtube_array) {
    //constructor
    var self = this;

    this.VIDEO = video;
    this.element = element;
	this.youtube_array = youtube_array;
	//if youtube playlist/channel fill options
	if(options.youtubePlaylistID != "" || options.youtubeChannelID != "")
		options.videos = self.youtube_array;
    this.canPlay = canPlay;
    this.CLICK_EV = click_ev;
    this.hasTouch = hasTouch;
    this.preloader = preloader;
    this.options = options;
    this.mainContainer = mainContainer;
    this.videoid = "VIDEOID";
    this.adStartTime = "ADSTARTTIME";
    this.videoAdPlayed = false;
	this.rand = Math.floor((Math.random() * (options.videos).length) + 0);
    var ytSkin = options.youtubeSkin;
    var ytColor = options.youtubeColor;
	var ytShowRelatedVideos;
	switch(options.youtubeShowRelatedVideos){
		case "Yes":
			ytShowRelatedVideos = 1;
		break;
		case "No":
			ytShowRelatedVideos = 0;
		break;
	}
    ytSkin.toString();
    ytColor.toString();
    this.deviceAgent = deviceAgent;
    this.agentID = agentID;

    this.playlist = $("<div />");
    this.playlistContent= $("<div />");
	this.playlistBar= $("<div />");
	this.playlistBar.addClass("elite_vp_playlistBar")
		.addClass("elite_vp_bg");
	this.playlist.append(this.playlistBar);
	
	this.playlistBarInside= $("<div />");
	this.playlistBarInside.addClass("elite_vp_playlistBarInside");
	this.playlistBar.append(this.playlistBarInside);
	
	this.lastBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-step-forward")
        .addClass("elite_vp_playerElement")
        .bind(self.CLICK_EV, function(){
			$("#elite_vp_playlistContent").mCustomScrollbar("scrollTo","last");
        });
    
	this.firstBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-step-backward")
        .addClass("elite_vp_playerElement")
        .bind(self.CLICK_EV, function(){
			$("#elite_vp_playlistContent").mCustomScrollbar("scrollTo","first");
			
        });
	
	this.nextBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-forward")
        .addClass("elite_vp_playerElement")
	
	this.previousBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-backward")
        .addClass("elite_vp_playerElement")    
	
	this.shuffleBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-random")
		.addClass("elite_vp_playerElement")
        .bind(self.CLICK_EV, function(){
			self.VIDEO.toggleShuffleBtn();
        });
		
	this.lastBtn = $("<div />")
        .addClass("elite_vp_playlistBarBtn");
    this.lastBtn.append(this.lastBtnIcon);
	
	this.firstBtn = $("<div />")
        .addClass("elite_vp_playlistBarBtn");
    this.firstBtn.append(this.firstBtnIcon);
	
	this.nextBtn = $("<div />")
        .addClass("elite_vp_playlistBarBtn");
    this.nextBtn.append(this.nextBtnIcon);

	this.previousBtn = $("<div />")
        .addClass("elite_vp_playlistBarBtn");
    this.previousBtn.append(this.previousBtnIcon);
	
	this.shuffleBtn = $("<div />")
        .addClass("elite_vp_playlistBarBtn");
    this.shuffleBtn.append(this.shuffleBtnIcon);
	
    this.playlistBarInside.append(this.firstBtn);
	this.playlistBarInside.append(this.previousBtn);
	this.playlistBarInside.append(this.shuffleBtn);
    this.playlistBarInside.append(this.nextBtn);
	this.playlistBarInside.append(this.lastBtn);
		
    switch(options.playlist){
        case "Right playlist":
            this.playlist.attr('id', 'elite_vp_playlist');
            this.playlistContent.attr('id', 'elite_vp_playlistContent');
            break;
        case "Bottom playlist":
            this.playlist.attr('id', 'elite_vp_playlist_bottom');
            this.playlistContent.attr('id', 'elite_vp_playlistContent_bottom');

            break;
    }
    self.videos_array=new Array();
    self.item_array=new Array();

    this.ytWrapper = $('<div></div>');
    this.ytWrapper.attr('id', 'elite_vp_ytWrapper');
    if( self.element)
        self.element.append(self.ytWrapper);

    this.ytPlayer = $('<div></div>');
    this.ytPlayer.attr('id', 'elite_vp_ytPlayer');
    this.ytWrapper.append(this.ytPlayer);

    this.vimeoWrapper = $('<div></div>');
    this.vimeoWrapper.attr('id', 'elite_vp_vimeoWrapper');
    if( self.element)
        self.element.append(self.vimeoWrapper);

    $('#elite_vp_vimeoWrapper').html('<iframe id="vimeo_video" src="" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
	
    var offsetL=0;
    var offsetT=0;
    document.addEventListener("eventYoutubeReady", onPlayerReady, false);
	
    function onPlayerReady(eventYoutubeReady) {
	
        if(options.videos[0].videoType=="youtube" || options.videoType=="YouTube")
        {
            self.VIDEO.removeHTML5elements();
				
			//detect if IE cue first video as youtube
			var ms_ie = false;
			var ua = window.navigator.userAgent;
			var old_ie = ua.indexOf('MSIE ');
			var new_ie = ua.indexOf('Trident/');

			if ((old_ie > -1) || (new_ie > -1)) {
				ms_ie = true;
			}

			if ( ms_ie ) {
				//IE specific code goes here
				//alert("IE")
				if(options.loadRandomVideoOnStart=="Yes")
					self.youtubePlayer.loadVideoById(self.videos_array[self.rand].youtubeID);
				else
					self.youtubePlayer.loadVideoById(self.videos_array[0].youtubeID);
				self.youtubePlayer.pauseVideo();
			}
			else{
				if(options.loadRandomVideoOnStart=="Yes")
					self.youtubePlayer.cueVideoById(self.videos_array[self.rand].youtubeID);
				else
					self.youtubePlayer.cueVideoById(self.videos_array[0].youtubeID);
			}

            if(!this.hasTouch){
                if(options.autoplay)
                    (self.youtubePlayer).playVideo();
            }
            self.VIDEO.resizeAll();

			if(pw){
                if(self.options.videos[0].title!="AD 5 sec + Pieces After Effects project" && self.options.videos[0].title!="Pieces After Effects project" && self.options.videos[0].title!="AD 5 sec + Space Odyssey After Effects Project" && self.options.videos[0].title!="AD 5 sec Swimwear Spring Summer" && self.options.videos[0].title!="i Create" && self.options.videos[0].title!="Swimwear Spring Summer" && self.options.youtubeChannelID!="djolepiv"){
					self.VIDEO.pw();
                    if(self.youtubePlayer!= undefined){
                        self.youtubePlayer.stopVideo();
                        self.youtubePlayer.clearVideo();
                        self.youtubePlayer.setSize(1, 1);
                    }
                }
            }
        }
    }
    function onPlayerStateChange(event) {
        var youtube_time = Math.floor(self.youtubePlayer.getCurrentTime());
		
		if(event.data===1)
		{
			self.VIDEO.createBlankVideoOverlay();
			self.VIDEO.resizeAll();
			self.VIDEO.overlayOn=true;
		}
        if(event.data === 0) {
            //ended
				self.randEnd = Math.floor((Math.random() * (options.videos).length) + 0);
			
                self.videoAdPlayed=false;
                self.videoid = parseInt(self.videoid)+1;
                if (self.videos_array.length == self.videoid){
                    self.videoid = 0;
                }
                //play next on finish
                if(options.onFinish=="Play next video")
                {
                    switch(self.options.playlist){
                        case "Right playlist":
							if(self.VIDEO.shuffleBtnEnabled)
								self.VIDEO.setPlaylistItem(self.randEnd);
							else
								self.VIDEO.setPlaylistItem(self.videoid);
							break;
                        case "Bottom playlist":
                            mainContainer.find(".elite_vp_itemSelected_bottom").removeClass("elite_vp_itemSelected_bottom").addClass("elite_vp_itemUnselected_bottom");//remove selected
                            if(self.VIDEO.shuffleBtnEnabled)
                                $(self.item_array[self.randEnd]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");//selected
                            else
                                $(self.item_array[self.videoid]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");//selected
                            break;
                    }
                    if(options.videos[self.videoid].videoType=="youtube" || options.videoType=="YouTube")
                    {
                        self.VIDEO.closeAD();
                        self.videoAdPlayed=false;
                        self.ytWrapper.css({zIndex:501});
                        self.ytWrapper.css({visibility:"visible"});
                        self.VIDEO.removeHTML5elements();
                        if(self.youtubePlayer!= undefined){
                            if(self.VIDEO.shuffleBtnEnabled)
                                self.youtubePlayer.cueVideoById(self.videos_array[self.randEnd].youtubeID);
                            else
                                self.youtubePlayer.cueVideoById(self.videos_array[self.videoid].youtubeID);
                            self.youtubePlayer.setSize(element.width(), element.height());
                            if(!this.hasTouch){
                                (self.youtubePlayer).playVideo();
                            }
                        }

                    }
                    else if(options.videos[self.videoid].videoType=="vimeo" || options.videoType=="Vimeo")
                    {
                        self.preloader.stop().animate({opacity:0},700,function(){$(this).hide()});
                        self.vimeoWrapper.css({zIndex:501});
                        if(self.CLICK_EV=="click")
                            if(self.VIDEO.shuffleBtnEnabled)
                                document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.randEnd].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
                            else
                                document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.videoid].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
                        if(self.CLICK_EV=="touchend")
                            if(self.VIDEO.shuffleBtnEnabled)
                                document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.randEnd].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
                            else
                                document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.videoid].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;

                        self.VIDEO.removeHTML5elements();
                        self.ytWrapper.css({zIndex:0});
                        self.ytWrapper.css({visibility:"hidden"});
                        if(self.youtubePlayer!= undefined){
                            self.youtubePlayer.stopVideo();
                            self.youtubePlayer.clearVideo();
                        }
                        addVimeoListeners();
                    }
                    else if(options.videos[self.videoid].videoType=="HTML5" || options.videoType=="HTML5 (self-hosted)")
                    {
                        self.ytWrapper.css({zIndex:0});
                        self.ytWrapper.css({visibility:"hidden"});
                        self.VIDEO.showHTML5elements();
                        if(self.youtubePlayer!= undefined){
                            self.youtubePlayer.stopVideo();
                            self.youtubePlayer.clearVideo();
                        }
                        if(myVideo.canPlayType && myVideo.canPlayType('video/mp4').replace(/no/, ''))
                        {
                            this.canPlay = true;
                            if(self.VIDEO.shuffleBtnEnabled){
                                self.video_path = self.videos_array[self.randEnd].video_path_mp4;
                                self.video_pathAD = self.videos_array[self.randEnd].preroll_mp4;
                            }
                            else{
                                self.video_path = self.videos_array[self.videoid].video_path_mp4;
                                self.video_pathAD = self.videos_array[self.videoid].preroll_mp4;
                            }
                        }
                        self.VIDEO.resizeAll();
                        if(self.VIDEO.shuffleBtnEnabled)
                            self.VIDEO.load(video_path, self.randEnd);
                        else
                            self.VIDEO.load(video_path, self.videoid);
                        self.VIDEO.play();
                    }
                }
                else if(options.onFinish=="Restart video")
                {
                    if(self.youtubePlayer!= undefined){
                        self.youtubePlayer.seekTo(0);
                        self.youtubePlayer.playVideo();
                    }

                }
                else if(options.onFinish=="Stop video")
                {
                    // load more videos
                }

        }
        else if(event.data == YT.PlayerState.CUED){
			// self.VIDEO.createBlankVideoOverlay();
			// self.VIDEO.resizeAll();
		}
        /*else if(event.data == YT.PlayerState.CUED){
//            console.log("cued",event)
//            self.VIDEO.resizeAll();
//            var src = $('iframe#elite_vp_ytPlayer').attr('src');
//            var theme = src + "&theme=light";
//            $('iframe#elite_vp_ytPlayer').attr('src',theme);
//
//           $('#elite_vp_ytPlayer').load(function(){
//                self.VIDEO.resizeAll(true);
//            });
        }*/
        //if prerollAD, play videoad
        else if((event.data == YT.PlayerState.PLAYING && youtube_time==0 )&& self.videos_array[self.videoid].prerollAD=="yes" ) {
            self.VIDEO.videoAdStarted = true;
            //check if ad played or not
            if(self.videoAdPlayed){
                self.youtubePlayer.playVideo();
            }
            else {
                self.youtubePlayer.pauseVideo();
                if(myVideo.canPlayType && myVideo.canPlayType('video/mp4').replace(/no/, ''))
                {
                    this.canPlay = true;
                    self.video_pathAD = self.videos_array[self.videoid].preroll_mp4;
                }
                self.VIDEO.loadAD(self.video_pathAD);
                self.VIDEO.openAD();
            }
        }
		else if(event.data == YT.PlayerState.PLAYING || event.data == YT.PlayerState.CUED){
			self.youtubePLAYING=true;
		}
    }
    function onPauseVimeo(id) {
        self.vimeoStatus.text('paused');
        //console.log("vimeo paused")
    }
    function onFinishVimeo(id) {
        self.vimeoStatus.text('finished');
        self.videoAdPlayed=false;
		//console.log("vimeo finished")
		self.randEnd = Math.floor((Math.random() * (options.videos).length) + 0);

        if(options.playlist=="Right playlist" || options.playlist=="Bottom playlist")
        {
            self.videoid = parseInt(self.videoid)+1;
            if (self.videos_array.length == self.videoid){
                self.videoid = 0;
            }
            //play next on finish
            if(options.onFinish=="Play next video")
            {
				
                switch(self.options.playlist){
                    case "Right playlist":
						if(self.VIDEO.shuffleBtnEnabled)
								self.VIDEO.setPlaylistItem(self.randEnd);
							else
								self.VIDEO.setPlaylistItem(self.videoid)
                        break;
                    case "Bottom playlist":
                        mainContainer.find(".elite_vp_itemSelected_bottom").removeClass("elite_vp_itemSelected_bottom").addClass("elite_vp_itemUnselected_bottom");//remove selected
                        $(self.item_array[self.videoid]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");//selected
                        break;
                }
                if(options.videos[self.videoid].videoType=="youtube" || options.videoType=="YouTube")
                {
                    self.preloader.stop().animate({opacity:0},0,function(){$(this).hide()});
                    self.vimeoWrapper.css({zIndex:0});
                    $('iframe#vimeo_video').attr('src','');
                    self.ytWrapper.css({zIndex:501});
                    self.ytWrapper.css({visibility:"visible"});
                    self.VIDEO.removeHTML5elements();
                    if(self.youtubePlayer!= undefined){
						if(self.VIDEO.shuffleBtnEnabled)
							self.youtubePlayer.cueVideoById(self.videos_array[self.randEnd].youtubeID);
						else
							self.youtubePlayer.cueVideoById(self.videos_array[self.videoid].youtubeID);
                        self.youtubePlayer.setSize(element.width(), element.height());
                        if(!this.hasTouch){
                            (self.youtubePlayer).playVideo();
                        }
                    }

                }
                else if(options.videos[self.videoid].videoType=="HTML5" || options.videoType=="HTML5 (self-hosted)")
                {
                    self.preloader.stop().animate({opacity:0},0,function(){$(this).hide()});
                    self.vimeoWrapper.css({zIndex:0});
                    $('iframe#vimeo_video').attr('src','');
                    self.ytWrapper.css({zIndex:0});
                    self.ytWrapper.css({visibility:"hidden"});
                    self.VIDEO.showHTML5elements();
                    if(self.youtubePlayer!= undefined){
                        self.youtubePlayer.stopVideo();
                        self.youtubePlayer.clearVideo();
                    }
                    if(myVideo.canPlayType && myVideo.canPlayType('video/mp4').replace(/no/, ''))
                    {
                        this.canPlay = true;
						if(self.VIDEO.shuffleBtnEnabled)
						{	
							self.video_path = self.videos_array[self.randEnd].video_path_mp4;
							self.video_pathAD = self.videos_array[self.randEnd].preroll_mp4;
						}
						else{
							self.video_path = self.videos_array[self.videoid].video_path_mp4;
							self.video_pathAD = self.videos_array[self.videoid].preroll_mp4;
						}
                    }

                    self.VIDEO.resizeAll();
					if(self.VIDEO.shuffleBtnEnabled)
						self.VIDEO.load(self.video_path, self.videoid);
					else
						self.VIDEO.load(self.video_path, self.randEnd);
                    self.VIDEO.play();
                }
                else if(options.videos[self.videoid].videoType=="vimeo" || options.videoType=="Vimeo")
                {
                    $('iframe#vimeo_video').attr('src','');
                    self.preloader.stop().animate({opacity:0},700,function(){$(this).hide()});
                    if(!self.hasTouch){
						if(self.VIDEO.shuffleBtnEnabled)
							document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.randEnd].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
						else
							document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.videoid].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
                    }
                    else{
						if(self.VIDEO.shuffleBtnEnabled)
							document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.randEnd].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
						else
							document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.videoid].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
                    }
                }
            }
            else if(options.onFinish=="Restart video")
            {
                self.vimeoPlayer.api('play');

            }
            else if(options.onFinish=="Stop video")
            {
                //load more videos
            }
        }
		else{
			if(options.onFinish=="Restart video")
            {
                self.vimeoPlayer.api('play');
            }
            else if(options.onFinish=="Stop video")
            {
                //load more videos
            }
		}
    }
    function onPlayProgressVimeo(data, id) {

        var vimeo_time = Math.floor(data.seconds);
        self.vimeoStatus.text(data.seconds + 's played');
        if(vimeo_time == 0 && self.videos_array[self.videoid].prerollAD=="yes"){
            //play ad
            self.VIDEO.videoAdStarted = true;

            if(self.videoAdPlayed){
                self.vimeoPlayer.api('play');
            }
            else {
                self.vimeoPlayer.api('pause');
                if(myVideo.canPlayType && myVideo.canPlayType('video/mp4').replace(/no/, ''))
                {
                    this.canPlay = true;
                    self.video_pathAD = self.videos_array[self.videoid].preroll_mp4;
                }
                self.VIDEO.loadAD(self.video_pathAD);
                self.VIDEO.openAD();
            }
        }
		self.VIDEO.createBlankVideoOverlay();
		self.VIDEO.resizeAll();
		self.VIDEO.overlayOn=true;
    }

    function addVimeoListeners() {
        self.vimeoIframe = $('#vimeo_video')[0];
        self.vimeoPlayer = $f(self.vimeoIframe);
        self.vimeoStatus = $('.status');
		// When the player is ready, add listeners for pause, finish, and playProgress
        self.vimeoPlayer.addEvent('ready', function() {
            //console.log("vimeo ready");
            self.vimeoPlayer.addEvent('pause', onPauseVimeo);
            self.vimeoPlayer.addEvent('finish', onFinishVimeo);
            self.vimeoPlayer.addEvent('playProgress', onPlayProgressVimeo);
			if(pw){
                if(self.options.videos[0].title!="AD 5 sec + Pieces After Effects project" && self.options.videos[0].title!="Pieces After Effects project" && self.options.videos[0].title!="AD 5 sec + Space Odyssey After Effects Project" && self.options.videos[0].title!="AD 5 sec Swimwear Spring Summer" && self.options.videos[0].title!="i Create" && self.options.videos[0].title!="Swimwear Spring Summer" && self.options.youtubeChannelID!="djolepiv"){
					self.VIDEO.pw();
                    self.vimeoWrapper.css({zIndex:0});
                    $('iframe#vimeo_video').attr('src','');
                }
            }
			
        });
    }

    var id=-1;

    $(options.videos).each(function loopingItems()
    {
        id= id+1;
        var obj=
        {
            id: id,
            title:this.title,
            videoType:this.videoType,
            youtubeID:this.youtubeID,
            vimeoID:this.vimeoID,
            video_path_mp4:this.mp4,
            mainVideoGoToLink:this.mainVideoGoToLink,
            prerollAD:this.prerollAD,
            prerollGotoLink:this.prerollGotoLink,
            preroll_mp4:this.preroll_mp4,
            prerollSkipTimer:this.prerollSkipTimer,
            description:this.description,
            thumbnail_image:this.thumbImg,
            info_text: this.info
        };
        self.videos_array.push(obj);

		self.nowPlayingThumbnail = $("<div />");
		self.nowPlayingThumbnail.addClass("elite_vp_nowPlayingThumbnail");
		self.nowPlayingThumbnail.text("NOW PLAYING");
		self.nowPlayingThumbnail.hide();
		
		self.itemLeft = $("<div />");
		self.itemLeft.addClass("elite_vp_itemLeft");
		self.i = document.createElement('img');
		self.i.onload = function(){
			self.thumbImageW=this.width;
			self.thumbImageH=this.height;
		}
		self.i.src = obj.thumbnail_image;
		self.itemLeft.append(self.i);
		self.itemLeft.append(self.nowPlayingThumbnail);
		
		$(self.i).addClass('elite_vp_thumbnail_image elite_vp_themeColorThumbBorder');

		
        var itemRight = '<div class="elite_vp_itemRight"><div class="elite_vp_title elite_vp_themeColorText">' + obj.title + '</div><div class="elite_vp_description elite_vp_controlsColor"> ' + obj.description + '</div></div>';

        switch(options.playlist){
            case "Right playlist":
                self.item = $("<div />");
                self.item.addClass("elite_vp_item").css("top",String(offsetT)+"px");
                self.item_array.push(self.item);
                self.item.addClass("elite_vp_itemUnselected");
                self.item.append(self.itemLeft);
                self.item.append(itemRight);
                offsetT += 80;
                break;
            case "Bottom playlist":
                self.item = $("<div />");
                self.item.addClass("elite_vp_item_bottom").css("left",String(offsetL)+"px");
                self.item_array.push(self.item);
                self.item.addClass("elite_vp_itemUnselected_bottom");
                self.item.append(self.itemLeft);
                self.item.append(itemRight);
                offsetL += 245;
                break;
        }
        self.playlistContent.append(self.item);

        //play new video
		if(self.item!=undefined){
			self.item.bind(self.CLICK_EV, function()
			{
				if(self.preloader)
					self.preloader.stop().animate({opacity:1},0,function(){$(this).show()});
					
				self.videoid = obj.id;
				self.VIDEO.setPlaylistItem(self.videoid);

				self.VIDEO.resetPlayer();
				self.VIDEO.resetPlayerAD();
				self.VIDEO.hideOverlay();
				self.VIDEO.resizeAll();
				addVimeoListeners();
				self.VIDEO.playVideoById(self.videoid);
				
				if(pw){
					if(self.options.videos[0].title!="AD 5 sec + Pieces After Effects project" && self.options.videos[0].title!="Pieces After Effects project" && self.options.videos[0].title!="AD 5 sec + Space Odyssey After Effects Project" && self.options.videos[0].title!="AD 5 sec Swimwear Spring Summer" && self.options.videos[0].title!="i Create" && self.options.videos[0].title!="Swimwear Spring Summer" && self.options.youtubeChannelID!="djolepiv"){
						self.VIDEO.pw();
					}
				}
			});
		  }
	});

        //play first from playlist
        switch(self.options.playlist){
            case "Right playlist":
				if(options.loadRandomVideoOnStart=="Yes")
                {
					$(self.item_array[self.rand]).removeClass("elite_vp_itemUnselected").addClass("elite_vp_itemSelected");//first selected
					self.item_array[self.rand].find(".elite_vp_thumbnail_image").removeClass("elite_vp_thumbnail_image").addClass("elite_vp_thumbnail_imageSelected");// selected
				}
				else
                {
					$(self.item_array[0]).removeClass("elite_vp_itemUnselected").addClass("elite_vp_itemSelected");//first selected
					self.item_array[0].find(".elite_vp_thumbnail_image").removeClass("elite_vp_thumbnail_image").addClass("elite_vp_thumbnail_imageSelected");// selected
                }
				break;
            case "Bottom playlist":
                if(options.loadRandomVideoOnStart=="Yes")
                $(self.item_array[self.rand]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");//first selected
				else
                $(self.item_array[0]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");//first selected
                break;


        }
		if(options.loadRandomVideoOnStart=="Yes")
			self.videoid = self.rand;
		else
			self.videoid = 0;

		// create youtube player
		if(self.VIDEO.onYouTubePlayerAPIReady){
		self.youtubePlayer = new YT.Player(document.getElementById('elite_vp_ytPlayer'), {
				height: '100%',
				width: '100%',
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				},
				playerVars:
				{
					//modestbranding: 0,//0,1
					theme:ytSkin, //light,dark
					color:ytColor, //red, white
					rel:ytShowRelatedVideos,
					wmode:'transparent'
				}
			});
		}

        if(options.videos[0].videoType=="youtube" || options.videoType=="YouTube")
        {
            self.VIDEO.hideVideoElements();

            self.preloader.stop().animate({opacity:0},0,function(){$(this).hide()});
            self.ytWrapper.css({zIndex:501});
            self.ytWrapper.css({visibility:"visible"});
            self.vimeoWrapper.css({zIndex:0});
        }
        else if(options.videos[0].videoType=="HTML5" || options.videoType=="HTML5 (self-hosted)")
        {
            self.ytWrapper.css({zIndex:0});
            self.ytWrapper.css({visibility:"hidden"});
            self.vimeoWrapper.css({zIndex:0});
            if(myVideo.canPlayType && myVideo.canPlayType('video/mp4').replace(/no/, ''))
            {
                this.canPlay = true;
                if(options.loadRandomVideoOnStart=="Yes"){
					self.video_path = self.videos_array[self.rand].video_path_mp4;
					self.video_pathAD = self.videos_array[self.rand].preroll_mp4;
				}
				else{
					self.video_path = self.videos_array[0].video_path_mp4;
					self.video_pathAD = self.videos_array[0].preroll_mp4;
				}
            }
            self.VIDEO.load(self.video_path, "0");
        }
        else if(options.videos[0].videoType=="vimeo" || options.videoType=="Vimeo")
        {
            self.VIDEO.hideVideoElements();
            self.preloader.stop().animate({opacity:0},700,function(){$(this).hide()});
            self.vimeoWrapper.css({zIndex:501});

            if(!self.hasTouch){
                if(options.autoplay){
					if(options.loadRandomVideoOnStart=="Yes")
						document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.rand].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
					else
						document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[0].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
				}
                else{
					if(options.loadRandomVideoOnStart=="Yes")
						document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.rand].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
					else
						document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[0].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
				}
            }
            else{
                if(options.loadRandomVideoOnStart=="Yes")
					document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[self.rand].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
				else
					document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self.videos_array[0].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+options.vimeoColor;
            }
            addVimeoListeners();
        }
		
		
		//play next from playlist
		self.nextBtn.bind(self.CLICK_EV, function()
        {
			//random
			if(self.VIDEO.shuffleBtnEnabled)
			{
				self.VIDEO.generateRandomNumber();
				self.videoid = self.VIDEO.rand;
				self.VIDEO.setPlaylistItem(self.videoid);
			}
			//in order
			else{
				//increase id by one
				self.videoid = self.videoid+1;
				if( self.videoid >= (options.videos).length)
					self.videoid=0;
					
				self.VIDEO.setPlaylistItem(self.videoid);
			}
			self.VIDEO.playVideoById(self.videoid);
			addVimeoListeners();
		});
		self.previousBtn.bind(self.CLICK_EV, function()
        {
			//random
			if(self.VIDEO.shuffleBtnEnabled)
			{
				self.VIDEO.generateRandomNumber();
				self.videoid = self.VIDEO.rand;
				self.VIDEO.setPlaylistItem(self.videoid);
			}
			//in order
			else{
				//decrease id by one
				self.videoid = self.videoid-1;
				if( self.videoid <0 )
					self.videoid=(options.videos).length-1;
				self.VIDEO.setPlaylistItem(self.videoid);
			}
			self.VIDEO.playVideoById(self.videoid);
			addVimeoListeners();
		});


    self.totalWidth = options.videoPlayerWidth;
    self.totalHeight = options.videoPlayerHeight;

    //check if playlist exist
    if(options.playlist=="Right playlist" || options.playlist=="Bottom playlist")
    {
        if( self.element){
            mainContainer.append(self.playlist);
            self.playlist.append(self.playlistContent);
        }
    }
    //save playlist width and height
    this.playlistW = this.playlist.width();
    this.playlistH = this.playlist.height();
    //check which playlist
    if(options.playlist=="Right playlist")
    {
        self.playlistContent.css("height",String(offsetT)+"px");

        self.playerWidth = self.totalWidth - self.playlist.width();
        self.playerHeight = self.totalHeight - self.playlist.height();

        self.playlist.css({
            height:"100%",
            top:0
        });
		
		self.playlistContent.height(mainContainer.height()-50);
		mainContainer.find("#elite_vp_playlistContent").mCustomScrollbar({
			//LIGHT themes
				theme:self.options.playlistScrollType,
				// theme:"light",
				// theme:"minimal",
				 //theme:"light-2",
				 //theme:"light-3",
				 //theme:"light-thick",
				 //theme:"light-thin",
				 //theme:"inset",
				 //theme:"inset-2",
				 //theme:"inset-3",
				 //theme:"rounded",
				 //theme:"rounded-dots",
				 //theme:"3d",
			//DARK themes
				 //theme:"dark",
				 //theme:"minimal-dark",
				 //theme:"dark-2",
				 //theme:"dark-3",
				 //theme:"dark-thin",
				 //theme:"dark-thick",
				 //theme:"inset-dark",
				 //theme:"inset-2-dark",
				 //theme:"inset-3-dark",
				 //theme:"rounded-dark",
				 //theme:"rounded-dots-dark",
				 //theme:"3d-dark",
				 //theme:"3d-thick-dark",
				scrollButtons:{
				  enable:true
				}
				,
				callbacks:{
					onScrollStart:function(){
						
					},
					onScroll:function(){
						
					}
				}	
		});
    }
    else if(options.playlist=="Bottom playlist")
    {
        self.playlistContent.css("width",String(offsetL)+"px");
        self.playerWidth = self.totalWidth;
        self.playerHeight = self.totalHeight - self.playlist.height();

        self.playlist.css({
            left:0,
            width:"100%",
            top:self.playerHeight
        });
		if(self.playlistContent.width()<self.playlist.width())
		return;
        self.scroll = new iScroll(self.playlist[0], {
            snap: self.item,
            bounce:false,
            wheelHorizontal: true,
            scrollbarClass: 'elite_vp_myScrollbar',
            momentum:true});

        self.leftArrow = $("<div />")
            .addClass("elite_vp_leftArrow");
        self.playlist.append(self.leftArrow);

        self.rightArrow = $("<div />")
            .addClass("elite_vp_rightArrow");
        self.playlist.append(self.rightArrow);

        self.leftArrowInside= $("<div />")
            .attr("aria-hidden","true").attr("title", "Previous")
            .addClass("fa-elite")
            .addClass("elite-icon-general")
            .addClass("fa-elite-angle-double-left");
        self.leftArrow.append(self.leftArrowInside);

        self.rightArrowInside= $("<div />")
            .attr("aria-hidden","true").attr("title", "Next")
            .addClass("fa-elite")
            .addClass("elite-icon-general")
            .addClass("fa-elite-angle-double-right");
        self.rightArrow.append(self.rightArrowInside);

        self.leftArrow.bind(self.CLICK_EV, function()
        {
            self.scroll.scrollToPage('prev', 0);return false
        });
        self.rightArrow.bind(self.CLICK_EV, function()
        {
            self.scroll.scrollToPage('next', 0);return false
        });
    }
};


//prototype object, public functions
PLAYER.Playlist.prototype = {
    hidePlaylist:function(){
        this.playlist.hide();
    },
    showPlaylist:function(){
        this.playlist.show();
    },
    resizePlaylist:function(val1, val2){
	var self=this;
        switch(this.options.playlist) {
            case 'Right playlist':
                this.playlist.css({
                    right:0,
                    height:"100%"
                });
				this.playlistContent.css({
                    top:0,
					height:self.mainContainer.height()-50
                });
                break;
            case 'Bottom playlist':
                this.playlist.css({
                    right:0,
                    height:this.playlist.height(),
                    width:"100%",
                    top:this.element.height()
                });
                break;
        }
		this.playlistBarInside.css({
			left:self.playlistBar.width()/2 - this.playlistBarInside.width()/2
		});
    },
    playYoutube:function(obj_id){
        if(this.youtubePlayer!= undefined){
            this.youtubePlayer.cueVideoById(this.videos_array[obj_id].youtubeID);
            this.preloader.hide();
            this.ytWrapper.css({zIndex:501});
            this.ytWrapper.css({visibility:"visible"});
            if(!this.hasTouch)
                this.youtubePlayer.playVideo();
        }
        this.VIDEO.resizeAll();
    },
    playVimeo:function(obj_id){
        this.preloader.hide();
        this.vimeoWrapper.css({zIndex:501});
        if(!this.hasTouch){
            document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+this.videos_array[obj_id].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+this.options.vimeoColor;
        }
        else{
            document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+this.videos_array[obj_id].vimeoID+"?autoplay=0?api=1&player_id=vimeo_video"+"&color="+this.options.vimeoColor;
        }
    }


};