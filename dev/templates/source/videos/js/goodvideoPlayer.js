(function($){
    $.fn.Video = function(options, callback)
    {
        return(new Video(this, options));
		
		
    };
var idleEvents = "mousemove keydown DOMMouseScroll mousewheel mousedown reset.idle";

var defaults = {
    autohideControls:1,                     
	hideControlsOnMouseOut:"No",            
	videoPlayerWidth:1006,                  
	videoPlayerHeight:420,                  
	responsive:false,				        
	playlist:"Right playlist",              
	playlistScrollType:"light",
	autoplay:false,                        
	colorAccent:"#cc181e",                 
	vimeoColor:"00adef",                  
	youtubeSkin:"dark",                     
	youtubeColor:"red",                    
	videoPlayerShadow:"effect1",           
	loadRandomVideoOnStart:"No",            
	shuffle:"No",			
	posterImg:"",
	onFinish:"Play next video",             
	nowPlayingText:"Yes",                   
	fullscreen:"Fullscreen native",        
	rightClickMenu:true,                    
	infoShow:"Yes",                        
	shareShow:"Yes",                        
	facebookShow:"Yes",                   
	twitterShow:"Yes",                     
	facebookShareName:"video player",      
	facebookShareLink:"", 
	facebookShareDescription:"", 
	facebookSharePicture:"",
	twitterText:"video player",			 
	twitterLink:"",
	twitterHashtags:"wordpressvideoplayer",		
	twitterVia:"Creative media",				 
	googlePlus:"", 
	logoShow:"Yes",                      
	logoClickable:"Yes",                    
	logoPath:"",       
	logoGoToLink:"",  
	logoPosition:"bottom-right",           
	embedShow:"Yes",                      
	embedCodeSrc:"", 
	embedCodeW:"746",                      
	embedCodeH:"420",                      
	embedShareLink:"", 
	youtubePlaylistID:"", 
	youtubeChannelID:"", 
	videos:[
		{
			videoType:"HTML5",                                     
			title:"Video title",                                            
			youtubeID:"XMGoYNoMtOQ",                                         
			vimeoID:"32707724",                                             
			mp4:"http://player.pageflip.com.hr/videos/Pieces.mp4",
			prerollAD:"yes",                                                
			prerollGotoLink:"http://codecanyon.net/",                          
			preroll_mp4:"http://player.pageflip.com.hr/videos/Short_Elegant_Logo_Reveal.mp4",   
			prerollSkipTimer:5,													 
			description:"Video description goes here.",                       
			thumbImg:"images/thumbnail_images/pic1.jpg",                 
			info:"Video info goes here.<br>This text can be <i>HTML formatted</i>, <a href='http://codecanyon.net/user/_zac_' target='_blank'><font color='008BFF'>find out more</font></a>.<br>You can disable this info window in player options. <br><br>Lorem ipsum dolor sit amet, eu pri dolores theophrastus. Posidonium vituperatoribus cu mel, cum feugiat nostrum sapientem ne. Vis ea summo persius, unum velit erant in eos, pri ut suas iriure euripidis. Ad augue expetendis sea. Ne usu saperet appetere honestatis, ne qui nulla debitis sententiae."
		}
	]
};

var isAndroid = (/android/gi).test(navigator.appVersion),
    isIDevice = (/iphone|ipad/gi).test(navigator.appVersion),
    isTouchPad = (/hp-tablet/gi).test(navigator.appVersion),
    hasTouch = 'ontouchstart' in window && !isTouchPad,
    RESIZE_EV = 'onorientationchange' in window ? 'orientationchange' : 'resize',
    CLICK_EV = hasTouch ? 'touchend' : 'click',
    START_EV = hasTouch ? 'touchstart' : 'mousedown',
    MOVE_EV = hasTouch ? 'touchmove' : 'mousemove',
    END_EV = hasTouch ? 'touchend' : 'mouseup';

var Video = function(parent, options)
{
    var self=this;
      this._class  = Video;
      this.parent  = parent;
      this.parentWidth = this.parent.width();
      this.parentHeight = this.parent.height();
      this.windowWidth = $(window).width();
      this.windowHeight = $(window).height();
      this.options = $.extend({}, defaults, options);
      this.sources = this.options.srcs || this.options.sources;
      this.state        = null;
      this.inFullScreen = false;
	  this.realFullscreenActive=false;
      this.stretching = false;
      this.infoOn = false;
      this.skipCountOn = false;
      this.skipBoxOn = false;
      this.shareOn = false;
      this.videoPlayingAD = false;
      this.embedOn = false;
      pw = false;
      this.loaded       = false;
      this.readyList    = [];
    this.videoAdStarted=false;
    this.youtubeReady=false;
	this.ADTriggered=false;
	this.overlayOn=false;

    this.hasTouch = hasTouch;
    this.RESIZE_EV = RESIZE_EV;
    this.CLICK_EV = CLICK_EV;
    this.START_EV = START_EV;
    this.MOVE_EV = MOVE_EV;
    this.END_EV = END_EV;

    this.canPlay = false;
    this.myVideo = document.createElement('video');
    self.deviceAgent = navigator.userAgent.toLowerCase();
    self.agentID = self.deviceAgent.match(/(iphone|ipod)/);
	
	var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api"; // Take the API address.
    var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag); // Include the API inside the page.
    
	if(!this.options.rightClickMenu){
		$("#Elite_video_player").bind('contextmenu',function() { return false; });
		$(".Elite_video_player").bind('contextmenu',function() { return false; });
	}

	
	self.setupElement();
    self.setupElementAD();

	if((self.options.videos[0].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")||(options.videos[0].videoType=="vimeo" || options.videoType=="Vimeo"))
	{
		self.init();
	}
	else
	{
		window.onYouTubePlayerAPIReady = function(){
			//console.log("Youtube Ready")
			self.onYouTubePlayerAPIReady=true;
			if(self.options.videoType!="YouTube playlist" && self.options.videoType!=undefined){
				self.options.youtubePlaylistID="";
			}
			if(self.options.videoType!="YouTube channel" && self.options.videoType!=undefined){
				self.options.youtubeChannelID="";
			}
			
			if( (self.options.youtubePlaylistID != "" || self.options.youtubeChannelID != "") /*|| (self.options.videoType=="YouTube playlist")*/){
			
				var youtubePlaylistID = self.options.youtubePlaylistID;
				var youtubeChannelID = self.options.youtubeChannelID;
				var url;
				
				//===YOUTUBE CHANNEL====//
				//https://www.youtube.com/channel/USERNAME
				var channelURL = 'http://gdata.youtube.com/feeds/api/users/'+youtubeChannelID+'/uploads?alt=json&orderby=published';
				
				//===YOUTUBE PLAYLIST====//
				var playListURL = 'http://gdata.youtube.com/feeds/api/playlists/'+youtubePlaylistID+'?v=2&alt=json';
				var videoURL= 'http://www.youtube.com/watch?v=';

				
				if(youtubePlaylistID != "")
					url = playListURL;
				else if(youtubeChannelID != "")
					url = channelURL;
				
				self.id=-1;
				self.youtube_array = new Array();
				self.ads_array = new Array();
				this.data;

				//if jquery
				$(self.options.videos).each(function loopingItems()
				{
					var obj=
					{
						prerollAD:this.prerollAD,
						prerollGotoLink:this.prerollGotoLink,
						preroll_mp4:this.preroll_mp4,
						prerollSkipTimer:this.prerollSkipTimer
					};
					self.ads_array.push(obj);
				});
				
				
				$.ajax({
					url: url,
					success: function(data) {
						self.data = data;
						
						$.each(data.feed.entry, function(i, item) {
						
							self.id=self.id+1;
							var feedTitle = item.title.$t;
							var authorName = item.author[0].name.$t;
							var feedURL = item.link[1].href;
							var fragments = feedURL.split("/");
							var videoID = fragments[fragments.length - 2];
							var url = videoURL + videoID;
							var thumb = "http://img.youtube.com/vi/"+ videoID +"/default.jpg";
							
							var obj=
							{
								id: self.id,
								title:feedTitle,
								videoType:"youtube",
								youtubeID:videoID,
								vimeoID:this.vimeoID,
								video_path_mp4:this.mp4,
								prerollAD:self.ads_array[self.id].prerollAD,
								prerollGotoLink:self.ads_array[self.id].prerollGotoLink,
								preroll_mp4:self.ads_array[self.id].preroll_mp4,
								prerollSkipTimer:self.ads_array[self.id].prerollSkipTimer,
								description:authorName,
								thumbImg:thumb,
								info_text: this.info
							};
							self.youtube_array.push(obj);
						});
						self.init();
					}
				});
			}
			else
			{
				//start()
				self.init();
			}
		};
	}
};
Video.fn = Video.prototype;

Video.fn.init = function init()
{
	//console.log("init");
	
    var self=this;
	
                self.preloader = $("<div />");
                self.preloader.addClass("elite_vp_preloader");
                self.element.append(self.preloader);

                this.videoElement = $("<video />");
                this.videoElement.addClass("elite_vp_videoPlayer");
                this.videoElement.attr({
                    width:this.options.width,
                    height:this.options.height,
                    autoplay:this.options.autoplay,
                    preload:this.options.preload,
                    controls:this.options.controls,
                    autobuffer:this.options.autobuffer
                });
                this.videoElementAD = $("<video />");
                this.videoElementAD.addClass("elite_vp_videoPlayerAD");
                this.videoElementAD.attr({
                    width:this.options.width,
                    height:this.options.height,
                    autoplay:this.options.autoplay,
                    preload:this.options.preload,
                    controls:this.options.controls,
                    autobuffer:this.options.autobuffer
                });

                self._playlist = new PLAYER.Playlist($, self, self.options, self.mainContainer, self.element, /*self.ytWrapper, self.youtubePlayer,*/ self.preloader, self.myVideo, this.canPlay, self.CLICK_EV, pw, self.hasTouch, self.deviceAgent, self.agentID, self.youtube_array);

                if(self.options.playlist=="Right playlist")
                {
                    self.playerWidth = self.options.videoPlayerWidth - self._playlist.playlistW;
                    self.playerHeight = self.options.videoPlayerHeight;
                }
                else if(self.options.playlist=="Bottom playlist")
                {
                    self.playerWidth = self.options.videoPlayerWidth;
                    self.playerHeight = self.options.videoPlayerHeight - self._playlist.playlistH;
                }
                else if(self.options.playlist=="Off")
                {
                    self.playerWidth = self.options.videoPlayerWidth;
                    self.playerHeight = self.options.videoPlayerHeight;
                }

                self.playlistWidth = self._playlist.playlistW;

                self.initPlayer();
                self.resize();
                self.resizeAll();
};

Video.fn.initPlayer = function()
{
    this.setupHTML5Video();
    this.setupHTML5VideoAD();

    this.ready($.proxy(function()
    {
        this.setupEvents();
        this.change("initial");
        this.setupControls();
        this.load();
        this.setupAutoplay();

        this.element.bind("idle", $.proxy(this.idle, this));
        this.element.bind("state.videoPlayer", $.proxy(function(){
            this.element.trigger("reset.idle");
        }, this))
    }, this));

    this.secondsFormat = function(sec)
    {
        if(isNaN(sec))
        {
            sec=0;
        }
        var result  = [];

        var minutes = Math.floor( sec / 60 );
        var hours   = Math.floor( sec / 3600 );
        var seconds = (sec == 0) ? 0 : (sec % 60)
        seconds     = Math.round(seconds);

        //to calclate tooltip time
        var pad = function(num) {
            if (num < 10)
                return "0" + num;
            return num;
        }

        if (hours > 0)
            result.push(pad(hours));

        result.push(pad(minutes));
        result.push(pad(seconds));

        return result.join(":");
    };

    var self = this;

    $(window).resize(function() {

        if(!self.inFullScreen && !self.realFullscreenActive)
        {
            self.resizeAll();
        }
    });

	//resize on browser click
	$(window).bind(this.RESIZE_EV,function(e)
    {
		if(!self.realFullscreenActive)
        self.resizeAll();
    });
	
    $(document).bind('webkitfullscreenchange mozfullscreenchange fullscreenchange',function(e)
    {
        //detecting real fullscreen change
        self.resize(e);
    });

    this.resize = function(e)
    {
        if(document.webkitIsFullScreen || document.fullscreenElement || document.mozFullScreen)
        {
            this._playlist.hidePlaylist();
            this.element.addClass("elite_vp_fullScreen");
            this.elementAD.addClass("elite_vp_fullScreen");
            $(this.controls).find(".fa-elite-elite-expand").removeClass("fa-elite-elite-expand").addClass("fa-elite-elite-compress");
            $(this.fsEnterADBox).find(".fa-elite-elite-expandAD").removeClass("fa-elite-elite-expandAD").addClass("fa-elite-elite-compressAD");
            self.element.width("100%");
            self.element.height("100%");
            self.elementAD.width("100%");
            self.elementAD.height("100%");
			self.mainContainer.width("100%");
            self.mainContainer.height("100%");
            self.mainContainer.css("position","fixed");
            self.mainContainer.css("left",0);
            self.mainContainer.css("top",0);
			//for multiple instances after THREEx.request
			//==self.mainContainer.parent().css("zIndex",999999);==//
			self.realFullscreenActive=true;
			
			
			this.timeElapsed.show();
			this.timeTotal.show();
			this.volumeTrack.show();
			this.rewindBtn.show();
			this.unmuteBtn.show();
			this.videoTrack.show();
			this.resizeVideoTrack();
        }
        else
        {
            this._playlist.showPlaylist();
            this.element.removeClass("elite_vp_fullScreen");
            this.elementAD.removeClass("elite_vp_fullScreen");
            $(this.controls). find(".fa-elite-compress").removeClass("fa-elite-compress").addClass("fa-elite-expand");
            $(this.fsEnterADBox). find(".fa-elite-compressAD").removeClass("fa-elite-compressAD").addClass("fa-elite-expandAD");
            self.element.width(self.playerWidth);
            self.element.height(self.playerHeight);

            self.elementAD.width(self.playerWidth);
            self.elementAD.height(self.playerHeight);
			
			self.mainContainer.css("left","");
            self.mainContainer.css("top","");
			if(self.options.responsive)
			{
				self.mainContainer.width("100%");
				self.mainContainer.height("100%");
			}
			else{
				self.mainContainer.width(self.options.videoPlayerWidth);
				self.mainContainer.height(self.options.videoPlayerHeight);
			}
			
			
			self.mainContainer.css("position","absolute");
			
            if(this.stretching)
            {
                //back to stretched player
                this.stretching=false;
                this.toggleStretch();
            }

            self.element.css({zIndex:455558 });

            if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes"){
                if(!self._playlist.videoAdPlayed && self.videoAdStarted){
                    self.elementAD.css({
                        zIndex:455559
                    });
                }
                else{
                        self.elementAD.css({
                            zIndex:455557
                        });
                }
            }
			self.mainContainer.parent().css("zIndex",1);
			self.realFullscreenActive=false;
            self.resizeAll();
        }
        this.resizeVideoTrack();
        this.positionOverScreenButtons();
        this.positionLogo();
        this.positionPoster();
       this.resizeBars();
       if(self.options.hideControlsOnMouseOut=="Yes")
            this.hideControls();
	
		this.setColorAccent(this.options.colorAccent);
    }
};
Video.fn.setColorAccent = function(colorAccent){
	var self=this;
	$('.elite_vp_themeColor').css({"background":colorAccent});
	$('.elite_vp_themeColorText').css({"color":colorAccent});
	$('.elite_vp_playBtnBg').css({"background":colorAccent});
};
Video.fn.removeColorAccent = function(){
	$(".fa-elite-random").css("color", "");
};
Video.fn.resizeAll = function(ytLoaded){
    var self = this;
	
    if(this.options.responsive)
    {
		//set responsive player height
		var height = this.parent.width()/(16/9);
		this.parent.height(height);
	
        switch(self.options.playlist){
            case "Right playlist":
                if(this.stretching){
                    if(this.parent.width()<380)
                        this.videoTrack.hide();
                    else
                        this.videoTrack.show();
                    if(this.parent.width()<361)
                        this.timeTotal.hide();
                    else
                        this.timeTotal.show();
					if(this.parent.width()<290)
                        this.rewindBtn.hide();
                    else
                        this.rewindBtn.show();
					if(this.parent.width()<262)
						this.unmuteBtn.hide();
					else
						this.unmuteBtn.show();
					this.volumeTrack.show();
					if(self.options.embedShow=="Yes"){
						if(this.parent.width() < 560)
						self.embedBtn.hide();
						else
						self.embedBtn.show();
					}
                }
                else{
                    if(this.parent.width()<640)
                        this.videoTrack.hide();
                    else
                        this.videoTrack.show();
                    if(this.parent.width()<620)
                        this.timeTotal.hide();
                    else
                        this.timeTotal.show();
                    if(this.parent.width()<552)
                        this.rewindBtn.hide();
                    else
                        this.rewindBtn.show();
                    if(this.parent.width()<452)
						this.unmuteBtn.hide();
                    else
						this.unmuteBtn.show();
                    if(this.parent.width()<425)
						this.volumeTrack.hide();
                    else
						this.volumeTrack.show();
					if(self.options.embedShow=="Yes"){
						if(this.parent.width() < 590)
						self.embedBtn.hide();
						else
						self.embedBtn.show();
					}
					//playlist resize
                    if(this.parent.width()<522){
						this.mainContainer.find(".elite_vp_playlistBarBtn").css({
							width:"25px"
						});
						this._playlist.lastBtn.hide();
						this._playlist.firstBtn.hide();
                        this._playlist.playlist.css({width:90});
                        this.mainContainer.find(".elite_vp_itemRight").hide();
						
						this.videoTrack.show();
						this.timeElapsed.show();
						this.timeTotal.show();
						this.volumeTrack.show();
						this.rewindBtn.show();
						this.unmuteBtn.show();
						if(this.parent.width()<470)
							this.videoTrack.hide();
						else
							this.videoTrack.show();
						if(this.parent.width()<450)
							this.timeTotal.hide();
						else
							this.timeTotal.show();	
						if(this.parent.width()<380)
							this.rewindBtn.hide();
						else
							this.rewindBtn.show();
						if(this.parent.width()<353)
							this.unmuteBtn.hide();
						else
							this.unmuteBtn.show();
						if(this.parent.width()<322)
							this.volumeTrack.hide();
						else
							this.volumeTrack.show();
                    }
                    else{
                        self._playlist.playlist.css({width:260});
                        self.mainContainer.find(".elite_vp_itemRight").show();
						this.mainContainer.find(".elite_vp_playlistBarBtn").css({
							width:"30px"
						});
						this._playlist.lastBtn.show();
						this._playlist.firstBtn.show();
                    }
                }
                break;
            case "Bottom playlist":
                if(this.parent.width()<355)
                    this.videoTrack.hide();
                else
                    this.videoTrack.show();
                if(this.parent.width()<327)
                    this.timeElapsed.hide();
                else
                    this.timeElapsed.show();
                if(this.parent.width()<290)
                    this.timeTotal.hide();
                else
                    this.timeTotal.show();
                break;
            case "Off":
                if(self.options.embedShow=="Yes"){
					if(this.parent.width() < 550)
						self.embedBtn.hide();
					else
						self.embedBtn.show();
				}
                if(this.parent.width() < 378)
                    self.videoTrack.hide();
                else
                    self.videoTrack.show();
                if(this.parent.width() < 360)
                    self.timeTotal.hide();
                else
                    self.timeTotal.show();
				if(this.parent.width() < 289)
                    self.rewindBtn.hide();
                else
                    self.rewindBtn.show();
				if(this.parent.width() < 262)
                    this.unmuteBtn.hide();
				else
					this.unmuteBtn.show();
                break;

        }
        if(this.stretching){
            if(self.options.playlist=="Right playlist"){
                self.element.width(self.parent.parent().width());
                self.element.height(self._playlist.playlist.height());
            }
            else if(self.options.playlist=="Bottom playlist"){
                // self.element.width(self.parent.parent().width());
                // self.element.height(self.parent.parent().height());
            }
            else if(self.options.playlist=="Off"){
                self.element.width(self.parent.parent().width());
                self.element.height(self.parent.parent().height());
            }
        }
        else{
            if(self.options.playlist=="Right playlist"){
                self.element.width(self.parent.parent().width()-self._playlist.playlist.width());
                self.element.height(self._playlist.playlist.height());
            }
            else if(self.options.playlist=="Bottom playlist"){
                //self.element.width(self.parent.parent().width());
                //self.element.height(self.parent.parent().height()-self._playlist.playlist.height());
            }
            else if(self.options.playlist=="Off"){
                self.element.width(self.parent.parent().width());
                self.element.height(self.parent.height());
            }
        }
		if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
		{
			self.videoElement.width(self.element.width()-32);
			self.videoElement.height(self.element.width()-50);
			self.videoElementAD.width(self.element.width()-32);
			self.videoElementAD.height(self.element.width()-50);
		}
        self._playlist.resizePlaylist();
        self.elementAD.width(self.element.width());
        self.elementAD.height(self.element.height());
        self.resizeVideoTrack();
        self.positionOverScreenButtons();
        self.resizeBars();
        self.positionLogo();
        self.positionPoster();
    }

    else{//fixed width/height

	self.newPlayerWidth = $(window).width() - self.mainContainer.position().left ;
	self.newPlayerHeight = self.newPlayerWidth/(16/9);
	
    if ( self.newPlayerWidth < self.options.videoPlayerWidth )
    {
        switch(self.options.playlist){
            case "Right playlist":

                    if(this.stretching){
						if(self.newPlayerWidth<380)
							this.videoTrack.hide();
						else
							this.videoTrack.show();
						if(self.newPlayerWidth<361)
							this.timeTotal.hide();
						else
							this.timeTotal.show();
						if(self.newPlayerWidth<290)
							this.rewindBtn.hide();
						else
							this.rewindBtn.show();
						if(self.newPlayerWidth<262)
							this.unmuteBtn.hide();
						else
							this.unmuteBtn.show();
						this.volumeTrack.show();
						if(self.options.embedShow=="Yes"){
							if(self.newPlayerWidth < 560)
							self.embedBtn.hide();
							else
							self.embedBtn.show();
						}
                    }
                    //no stretching
                    else{
						if(self.newPlayerWidth<640)
							this.videoTrack.hide();
						else
							this.videoTrack.show();
                        if(self.newPlayerWidth < 620)
                            self.timeTotal.hide();
                        else
                            self.timeTotal.show();
						if(self.options.embedShow=="Yes"){
							if(self.newPlayerWidth < 655)
								self.embedBtn.hide();
							else
								self.embedBtn.show();
						}
                        if(self.newPlayerWidth < 550)
                            self.rewindBtn.hide();
                        else
                            self.rewindBtn.show();
                        if(self.newPlayerWidth < 525)
                            self.unmuteBtn.hide();
                        else
                            self.unmuteBtn.show();
						//playlist resize
						if(self.newPlayerWidth<522){
							this.mainContainer.find(".elite_vp_playlistBarBtn").css({
								width:"25px"
							});
							this._playlist.lastBtn.hide();
							this._playlist.firstBtn.hide();
							this._playlist.playlist.css({width:90});
							this.mainContainer.find(".elite_vp_itemRight").hide();
							
							this.videoTrack.show();
							this.timeElapsed.show();
							this.timeTotal.show();
							this.volumeTrack.show();
							this.rewindBtn.show();
							this.unmuteBtn.show();
							if(self.newPlayerWidth<470)
								this.videoTrack.hide();
							else
								this.videoTrack.show();
							if(self.newPlayerWidth<450)
								this.timeTotal.hide();
							else
								this.timeTotal.show();	
							if(self.newPlayerWidth<380)
								this.rewindBtn.hide();
							else
								this.rewindBtn.show();
							if(self.newPlayerWidth<353)
								this.unmuteBtn.hide();
							else
								this.unmuteBtn.show();
							if(self.newPlayerWidth<322)
								this.volumeTrack.hide();
							else
								this.volumeTrack.show();
						}
						else{
							self._playlist.playlist.css({width:260});
							self.mainContainer.find(".elite_vp_itemRight").show();
							this.mainContainer.find(".elite_vp_playlistBarBtn").css({
								width:"30px"
							});
							this._playlist.lastBtn.show();
							this._playlist.firstBtn.show();
						}
                    }
//                }
            break;

            case "Bottom playlist":
                self.newPlayerWidth = self.newPlayerWidth - self.mainContainer.position().left ;
                if(self.options.embedShow=="Yes"){
					if(self.newPlayerWidth < 550)
						self.embedBtn.hide();
					else
						self.embedBtn.show();
				}
                if(self.newPlayerWidth < 363)
                    self.videoTrack.hide();
                else
                    self.videoTrack.show();
                if(self.newPlayerWidth < 336)
                    self.timeElapsed.hide();
                else
                    self.timeElapsed.show();
                if(self.newPlayerWidth < 292)
                    self.newPlayerWidth = 292;

            break;

            case "Off":
                self.newPlayerWidth = self.newPlayerWidth - self.mainContainer.position().left ;
                if(self.options.embedShow=="Yes"){
					if(self.newPlayerWidth < 550)
						self.embedBtn.hide();
					else
						self.embedBtn.show();
				}
                if(self.newPlayerWidth < 378)
                    self.videoTrack.hide();
                else
                    self.videoTrack.show();
                if(self.newPlayerWidth < 360)
                    self.timeTotal.hide();
                else
                    self.timeTotal.show();
				if(self.newPlayerWidth < 289)
                    self.rewindBtn.hide();
                else
                    self.rewindBtn.show();
				if(self.newPlayerWidth < 265)
                    self.newPlayerWidth=265;
            break;
            }
    }
    else
    {
		//initial fixed size
        self.newPlayerWidth = self.options.videoPlayerWidth;
		self.newPlayerHeight = self.options.videoPlayerHeight;
		this.videoTrack.show();
		this.timeElapsed.show();
		this.timeTotal.show();
		this.volumeTrack.show();
		this.rewindBtn.show();
		this.unmuteBtn.show();self._playlist.playlist.css({width:260});
		this.mainContainer.find(".elite_vp_itemRight").show();
		this.mainContainer.find(".elite_vp_playlistBarBtn").css({
			width:"30px"
		});
		this._playlist.lastBtn.show();
		this._playlist.firstBtn.show();
    }

    if(self.options.playlist=="Right playlist"){
		if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
		{
			self.videoElement.height(self.newPlayerHeight-50);
			self.videoElementAD.height(self.newPlayerHeight-50);
		}

        self.element.height(self.newPlayerHeight);
        self.mainContainer.css({width:self.newPlayerWidth, height:self.newPlayerHeight});
    }
    else if(self.options.playlist=="Bottom playlist"){
		if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
		{
			//self.videoElement.width(self.newPlayerWidth-32);
			//self.videoElementAD.width(self.newPlayerWidth-32);
		}

        self.element.width(self.newPlayerWidth);
        self.mainContainer.css({width:self.newPlayerWidth, height:self.newPlayerHeight+self._playlist.playlistH});
    }
    else if(self.options.playlist=="Off"){
		if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
		{
			//self.videoElement.width(self.newPlayerWidth-32);
			//self.videoElementAD.width(self.newPlayerWidth-32);
		}
        self.element.width(self.newPlayerWidth);
		if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
		{
			//self.videoElement.height(self.newPlayerHeight-50);
			//self.videoElementAD.height(self.newPlayerHeight-50);
		}

        self.element.height(self.newPlayerHeight);
        self.mainContainer.css({width:self.newPlayerWidth, height:self.newPlayerHeight});
    }


    if(this.stretching)
    {
        if(self.options.playlist=="Right playlist")
        {
			if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
			{
				self.videoElement.width(self.newPlayerWidth-32);
				self.videoElementAD.width(self.newPlayerWidth-32);
			}

            self.element.width(self.newPlayerWidth);
        }
        else if(self.options.playlist=="Bottom playlist")
        {
			if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
			{
				//self.videoElement.height(self.newPlayerHeight + self._playlist.playlistH-50);
				//self.videoElementAD.height(self.newPlayerHeight + self._playlist.playlistH-50);
			}            

            self.element.height(self.newPlayerHeight + self._playlist.playlistH);
        }
        else if(self.options.playlist=="Off")
        {
			if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
			{
				self.videoElement.width(self.newPlayerWidth-32);
				self.videoElementAD.width(self.newPlayerWidth-32);
			}

            self.element.width(self.newPlayerWidth);
        }
    }
    else
    {
        if(self.options.playlist=="Right playlist")
        {
			if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
			{
				self.videoElement.width(self.newPlayerWidth- self._playlist.playlist.width()-32);
				self.videoElementAD.width(self.newPlayerWidth- self._playlist.playlist.width()-32);
			}
            self.element.width(self.newPlayerWidth- self._playlist.playlist.width());
            self._playlist.resizePlaylist(self.newPlayerWidth, self.newPlayerHeight);

        }
        else if(self.options.playlist=="Bottom playlist")
        {
			if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
			{
				//self.videoElement.height(self.newPlayerHeight-50);
				//self.videoElementAD.height(self.newPlayerHeight-50);
			}

            self.element.height(self.newPlayerHeight);
            self._playlist.resizePlaylist(self.newPlayerWidth, self.newPlayerHeight);

        }
        else if(self.options.playlist=="Off")
        {
			if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)"))
			{
				//self.videoElement.width(self.newPlayerWidth-32);
				//self.videoElementAD.width(self.newPlayerWidth-32);
			}

            self.element.width(self.newPlayerWidth);
        }
    }

    self.elementAD.width(self.element.width());
    self.elementAD.height(self.element.height());

	if (self.agentID && (self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")) {
		if(self.playBtnScreen)
		self.playBtnScreen.hide();
	}
	if(self._playlist.youtubePlayer!= undefined)
	{
		if(self.realFullscreenActive)
		{
			self.element.width($(document).width());
			self.element.height($(document).height());
			self._playlist.youtubePlayer.setSize(self.element.width(),self.element.height() );
		}
		else
		{
			switch(self.options.playlist){
				case ("Right playlist"):
					self._playlist.youtubePlayer.setSize(self.newPlayerWidth - self._playlist.playlist.width(),self.newPlayerHeight );
					break;
				case ("Bottom playlist"):
					self._playlist.youtubePlayer.setSize(self.newPlayerWidth,self.newPlayerHeight );
					break;
				case ("Off"):
					self._playlist.youtubePlayer.setSize(self.newPlayerWidth,self.newPlayerHeight );
					break;
			}

		}
	}
    self.resizeVideoTrack();
    self.positionOverScreenButtons();
    self.resizeBars();
    self.positionLogo();
    self.positionPoster();
	
	if(self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5")
	{
		if(self.blankOverlay!=undefined)
		{
			self.blankOverlay.css({
				zIndex:198,
				top:0
			});
			self.blankOverlay.height("100%");
			self.blankOverlay.width("100%");
			
		}
	}
	else if(self._playlist.videos_array[this._playlist.videoid].videoType=="youtube")
	{
		if(self._playlist.youtubePlayer!= undefined && self.blankOverlay!=undefined)
		{
			self.blankOverlay.css({
				zIndex:2147483647,
				top:65
			});
			self.blankOverlay.height($("#elite_vp_ytPlayer").height()-90-self.blankOverlay.position().top);
			self.blankOverlay.width($("#elite_vp_ytPlayer").width()-130);
		}
		
	}
	else if(self._playlist.videos_array[this._playlist.videoid].videoType=="vimeo")
	{
		if(self.blankOverlay!=undefined)
		{
			
			self.blankOverlay.css({
				zIndex:2147483647,
				top:45
			});
			self.blankOverlay.height($("#vimeo_video").height()- 90 - self.blankOverlay.position().top);
			self.blankOverlay.width($("#vimeo_video").width()-50);
		}
		
	}
	

    if (self.agentID){
        // self.shareWindow.css({
            // top:this.screenBtnsWindow.height(),
            // right:0
        // });
        // self.skipAdBox.css({right:0,bottom:28});
        // self.skipAdCount.css({right:0,bottom:28});
    }
	
	}	
};
Video.fn.autohideControls = function(){
    var element  = $(this.element);
    var idle     = false;
    var timeout  = this.options.autohideControls*1000;
    var interval = 1000;
    var timeFromLastEvent = 0;
    var reset = function()
    {
        if (idle)
            element.trigger("idle", false);
        idle = false;
        timeFromLastEvent = 0;
    };

    var check = function()
    {
        if (timeFromLastEvent >= timeout) {
            reset();
            idle = true;
            element.trigger("idle", true);
        }
        else
        {
            timeFromLastEvent += interval;
        }
    };

    element.bind(idleEvents, reset);

    var loop = setInterval(check, interval);

    element.unload(function()
    {
        clearInterval(loop);
    });
};
Video.fn.resizeBars = function(){
    this.downloadWidth = (this.buffered/this.video.duration )*this.videoTrack.width();
    this.videoTrackDownload.css("width", this.downloadWidth);

    this.progressWidth = (this.video.currentTime/this.video.duration )*this.videoTrack.width();
    this.videoTrackProgress.css("width", this.progressWidth);
	
	this.progressIdleDownloadWidth = (this.buffered/this.video.duration )*this.progressIdleTrack.width();
    this.progressIdleDownload.css("width", this.progressIdleDownloadWidth);
	
	this.progressIdleWidth = (this.video.currentTime/this.video.duration )*this.progressIdleTrack.width();
    this.progressIdle.css("width", this.progressIdleWidth);

    this.progressWidthAD = (this.videoAD.currentTime/this.videoAD.duration )*this.elementAD.width();
    this.progressAD.css("width", this.progressWidthAD);
};
Video.fn.createLogo = function(){
        var self=this;
        this.logoImg = $("<div/>");
        this.logoImg.addClass("elite_vp_logo");
        this.img = new Image();
        this.img.src = self.options.logoPath;
        //
        $(this.img).load(function() {
            self.logoImg.append(self.img);
            self.positionLogo();
        });

        if(self.options.logoShow=="Yes")
        {
            this.element.append(this.logoImg);
        }

        if(self.options.logoClickable=="Yes")
        {
            this.logoImg.bind(this.CLICK_EV,$.proxy(function(){
                window.open(self.options.logoGoToLink);
            }, this));

            this.logoImg.mouseover(function(){
                $(this).stop().animate({opacity:0.8},200);
            });
            this.logoImg.mouseout(function(){
                $(this).stop().animate({opacity:1},200);
            });
            $('.elite_vp_logo').css('cursor', 'pointer');
        }
};
Video.fn.positionLogo = function(){
    var self=this;
    if(self.options.logoPosition == "bottom-right")
    {
        this.logoImg.css({
            bottom:  73,
            right: buttonsMargin
        });
    }
    else if(self.options.logoPosition == "bottom-left")
    {
        this.logoImg.css({
            // bottom:  self.controls.height() + self.toolTip.height() + 8,
            bottom:  70,
            left: buttonsMargin
        });
    }
};
Video.fn.showVideoElements = function()
{
    this.videoElement.show();
    this.videoElementAD.show();
};
Video.fn.hideVideoElements = function(){
    this.videoElement.hide();
    this.videoElementAD.hide();
};
Video.fn.createAds = function(){
    var self=this;
    adsImg = $("<div/>");
    adsImg.addClass("ads");

    image = new Image();
    image.src = self._playlist.videos_array[0].adsPath;

    $(image).load(function() {
        adsImg.append(image);
        self.positionAds();
    });
    this.element.append(adsImg);
    adsImg.hide();
};
Video.fn.positionAds = function(){
    var self=this;
    adsImg.css({
        bottom: self.controls.height()+5,
        left: self.element.width()/2-adsImg.width()/2
    });
};
Video.fn.setupAutoplay = function()
{
   var self=this;
    if(self.options.autoplay)
    {
        self.play();
    }
    else if(!self.options.autoplay)
    {
        self.pause();
        self.preloader.hide();
    }
}
Video.fn.createNowPlayingText = function()
{
	var self=this;
	
	this.nowPlayingTitle = $("<div />")
        .addClass("elite_vp_nowPlayingTitle elite_vp_bg");
	if(!this.options.showAllControls)
		this.nowPlayingTitle.hide();
    this.element.append(this.nowPlayingTitle);
	
	if(self.options.loadRandomVideoOnStart=="Yes")
        this.nowPlayingTitle.append('<p class="elite_vp_nowPlayingText">' + this._playlist.videos_array[self._playlist.rand].title + '</p>');
    else
        this.nowPlayingTitle.append('<p class="elite_vp_nowPlayingText">' + this._playlist.videos_array[0].title + '</p>');

	this.nowPlayingTitleW=this.nowPlayingTitle.width();
	
    if(this.options.nowPlayingText=="No")
        this.nowPlayingTitle.hide();
};
Video.fn.createInfoWindowContent = function()
{
	var self=this;
	if(self.options.loadRandomVideoOnStart=="Yes"){
        this.infoWindow.append('<p class="elite_vp_infoTitle elite_vp_themeColorText elite_vp_titles">' + this._playlist.videos_array[self._playlist.rand].title + '</p>');
        this.infoWindow.append('<p class="elite_vp_infoText">' + this._playlist.videos_array[self._playlist.rand].info_text + '</p>');
    }
    else{
        this.infoWindow.append('<p class="elite_vp_infoTitle elite_vp_themeColorText elite_vp_titles">' + this._playlist.videos_array[0].title + '</p>');
        this.infoWindow.append('<p class="elite_vp_infoText">' + this._playlist.videos_array[0].info_text + '</p>');
    }

	this.infoWindow.css({
		top:-(this.infoWindow.height())
	}).hide();
};
Video.fn.createSkipAd = function(){
    var self=this;

    this.skipAdBox = $("<div />")
        .addClass("elite_vp_skipAdBox")
        .bind(self.CLICK_EV, function(){
            self.closeAD();
        })
        .hide();
    this.elementAD.append(this.skipAdBox);
	
	this.skipAdBoxContentLeft = $("<div />")
        .addClass("elite_vp_skipAdBoxContentLeft");
	this.skipAdBox.append(this.skipAdBoxContentLeft);
	
    this.skipAdBoxContentLeft.append('<p class="elite_vp_skipAdTitle">' + "Skip advertisement" + '</p>');
	
	this.skipAdBoxIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("fa-elite-step-forward-ad")
    this.skipAdBox.append(this.skipAdBoxIcon);
};
Video.fn.createSkipAdCount = function(){
    var self=this;
	
	this.skipAdCount = $("<div />")
        .addClass("elite_vp_skipAdCount")
		.hide();
    this.elementAD.append(this.skipAdCount);
	
	this.i = document.createElement('img');
	this.i.src = self._playlist.videos_array[self._playlist.videoid].thumbnail_image;
	this.skipAdCount.append(this.i);
	$('.elite_vp_skipAdCount img').addClass('elite_vp_skipAdCountImage elite_vp_themeColorThumbBorder');
	
	this.skipAdCountContentLeft = $("<div />")
        .addClass("elite_vp_skipAdCountContentLeft");
	this.skipAdCount.append(this.skipAdCountContentLeft);
		
	this.skipAdCountContentLeft.append('<p class="elite_vp_skipAdCountTitle">' + "" + '</p>');
	
	this.skipAdCount.css({
		right:-(this.skipAdCount.width()),
		bottom:28
	}).hide();
};
Video.fn.createAdTogglePlay = function(){
    var self=this;

    this.toggleAdPlayBox = $("<div />")
        .addClass("elite_vp_toggleAdPlayBox")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("fa-elite-playScreen")
        .bind(self.CLICK_EV, function(){
            self.togglePlayAD();
			self.ADTriggered=true;//ad is once enabled
        })
        .hide()
    this.elementAD.append(this.toggleAdPlayBox);
};
Video.fn.createVideoAdTitleInsideAD = function(){
    var self=this;
    this.videoAdBoxInside = $("<div />");
    this.videoAdBoxInside.addClass("elite_vp_videoAdBoxInside");
    this.elementAD.append(this.videoAdBoxInside);

    this.videoAdBoxInside.append('<p class="elite_vp_adsTitleInside">' + "Advertisement" + '</p>');
    this.videoAdBoxInside.append(this.timeLeftInside);
    this.videoAdBoxInside.hide();
};
Video.fn.attachZeroClipboard = function()
{
	var self=this;
	$(this.copy).each(function loopingItems()
    {
        self.zeroClipboard = ZeroClipboard;
        self.zeroClipboard.setMoviePath('assets/ZeroClipboard.swf');
        self.clip = new ZeroClipboard.Client();
        self.clip.addEventListener('mousedown',function() {
            self.clip.setText(self.embedTxt.text());
        });
        self.clip.addEventListener('complete',function(client,text) {
            alert('copied: ' + text);
        });
        self.clip.glue(this);
        self.clip.hide();
    });
    $(this.copy2).each(function loopingItems()
    {
        self.zeroClipboard = ZeroClipboard;
        self.zeroClipboard.setMoviePath('assets/ZeroClipboard.swf');
        self.clip2 = new ZeroClipboard.Client();
        self.clip2.addEventListener('mousedown',function() {
            self.clip2.setText(self.embedTxt2.text());
        });
        self.clip2.addEventListener('complete',function(client,text) {
            alert('copied: ' + text);
        });
        self.clip2.glue(this);
        self.clip2.hide();
    });
};
Video.fn.createEmbedWindowContent = function()
{
    var self=this;
    $(this.embedWindow).append('<p class="elite_vp_embedTitle elite_vp_themeColorText elite_vp_titles">' + "SHARE THIS PLAYER:" + '</p>');
    $(this.embedWindow).append('<p class="elite_vp_embedTitle2 elite_vp_themeColorText elite_vp_titles">' + "EMBED THIS VIDEO IN YOUR SITE:" + '</p>');

    this.embedTxt = $("<p />")
        .addClass('elite_vp_embedText');
    this.embedWindow.append(this.embedTxt);

    this.copy = $("<div />")
        .attr("title", "Copy to clipboard")
        .attr('id', 'elite_vp_copy')
        .addClass('copyBtn');
    this.embedWindow.append(this.copy);
    $(this.embedWindow).find("#elite_vp_copy").append('<p id="elite_vp_copyInside">' + "Copy" + '</p>');


    $(this.embedWindow).append('<p class="elite_vp_embedTitle3 elite_vp_themeColorText elite_vp_titles">' + "SHARE LINK TO THIS PLAYER:" + '</p>');

    this.embedTxt2 = $("<p />")
        .addClass('elite_vp_embedText2');
    this.embedWindow.append(this.embedTxt2);

    this.copy2 = $("<div />")
        .attr("title", "Copy to clipboard")
        .attr('id', 'elite_vp_copy2')
        .addClass('copyBtn');
    this.embedWindow.append(this.copy2);
    $(this.embedWindow).find("#elite_vp_copy2").append('<p id="elite_vp_copyInside">' + "Copy" + '</p>');

	var s = this.options.embedCodeSrc;
	var w = this.options.embedCodeW;
	var h = this.options.embedCodeH;
	// console.log(s,w,h)
	$(this.embedWindow).find(".elite_vp_embedText").text("<iframe src='"+s+"' width='"+w+"' height='"+h+"' frameborder=0 webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
    $(this.embedWindow).find(".elite_vp_embedText2").text(""+this.options.embedShareLink+"");
};
Video.fn.ready = function(callback)
{
  this.readyList.push(callback);  
  if (this.loaded)
      callback.call(this);
};

Video.fn.load = function(srcs, obj_id)
{
  var self = this;
  if (srcs)
    this.sources = srcs;
  
  if (typeof this.sources == "string")
    this.sources = {src:this.sources};
  
  if (!$.isArray(this.sources))
    this.sources = [this.sources];
    
  this.ready(function()
  {
    this.change("loading");
			if(self._playlist.videos_array[this._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
			  {
				  this.video.loadSources(this.sources);
			  }      
  });
};
Video.fn.closeAD = function()
{
    var self=this;

	clearInterval(self.myInterval);

    self.videoPlayingAD=true;
    self.togglePlayAD();

    self._playlist.videoAdPlayed=true;

    self.resetPlayerAD();
    self.elementAD.width(0);
    self.elementAD.height(0);
    self.elementAD.css({zIndex:1});
	self.videoElementAD.empty();
    self.videoAdBoxInside.hide();
	self.removeListenerProgressAD();
	if(self.options.allowSkipAd)
	{
		self.skipAdBox.hide();
		self.skipAdCount.hide();
	}
    self.fsEnterADBox.hide();
    self.toggleAdPlayBox.hide();
    self.progressADBg.hide();
	if(self._playlist.videos_array[self._playlist.videoid].videoType=="youtube" || self.options.videoType=="YouTube")
	{
		self._playlist.ytWrapper.css({visibility:"visible"});
		self.hideVideoElements();
		self._playlist.youtubePlayer.playVideo();
	}
	else if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
	{
		self.showVideoElements();
		self.togglePlay();
		self.video.play();
	}
	else if(self._playlist.videos_array[self._playlist.videoid].videoType=="vimeo" || self.options.videoType=="Vimeo")
	{
		self.hideVideoElements();
		if(self._playlist.vimeoPlayer!= undefined)
			self._playlist.vimeoPlayer.api('play');
		else
			self._playlist.playVimeo(self._playlist.videoid);
	}    
    
    self.exitToOriginalSize();
};
Video.fn.openAD = function()
{
    var self=this;
    self.showVideoElements();
    self.progressADBg.show();
    self.elementAD.css({zIndex:555559});
	self._playlist.ytWrapper.css({visibility:"hidden"});
    self.videoAdBoxInside.show();
	if(self.options.allowSkipAd)
	{
		self.skipBoxOn = true;
		self.toggleSkipAdBox();
		self.skipCountOn=false;
		self.toggleSkipAdCount();
	}
	
    self.fsEnterADBox.show();
    
    if(!self.realFullscreenActive)
    self.resizeAll();

	if(this.hasTouch)
	{
		if(!self.ADTriggered)
		{
			self.toggleAdPlayBox.show();
			self.videoPlayingAD=true;
			self.togglePlayAD();
		}
	}
	else
		self.toggleAdPlayBox.hide();	
	
	if(this.options.allowSkipAd)
	{
		$(".elite_vp_skipAdCountTitle").text("You can skip this ad in " + (self._playlist.videos_array[self._playlist.videoid].prerollSkipTimer) + " s");
		this.i.src = self._playlist.videos_array[self._playlist.videoid].thumbnail_image;
	}
};
Video.fn.loadAD = function(srcs)
{
    if (srcs)
        this.sourcesAD = srcs;

    if (typeof this.sourcesAD == "string")
        this.sourcesAD = {src:this.sourcesAD};

    if (!$.isArray(this.sourcesAD))
        this.sourcesAD = [this.sourcesAD];

    this.ready(function()
    {
        this.change("loading");
        this.videoAD.loadSources(this.sourcesAD);
    });
};
Video.fn.exitToOriginalSize = function(){
    if(THREEx.FullScreen.available())
    {
        if(THREEx.FullScreen.activated())
        {
           THREEx.FullScreen.cancel();
        }
        else if (this.inFullScreen)
        {
           this.fullScreen(!this.inFullScreen);
        }
    }
    else if(!THREEx.FullScreen.available())
    {
//        this.fullScreen(!this.inFullScreen);
    }
    this.elementAD.css({zIndex:455555});
}
Video.fn.play = function()
{
  var self = this;
  this.playButtonScreen.hide();
    this.playBtn.removeClass("fa-elite-play").addClass("fa-elite-pause");
    self.video.play();

    if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes" && self.videoAdStarted==false)
    {
        self.video.pause();
        if(!self.videoAdStarted && self._playlist.videos_array[self._playlist.videoid].prerollAD){
            if(self.myVideo.canPlayType && self.myVideo.canPlayType('video/mp4').replace(/no/, ''))
            {
                self.canPlay = true;
                self.video_pathAD = self._playlist.videos_array[self._playlist.videoid].preroll_mp4;
            }

            self.loadAD(self.video_pathAD);
            self.openAD();
        }
        self.videoAdStarted=true;
    }
};
Video.fn.pause = function()
{
    var self = this;
    this.playButtonScreen.show();
    this.playBtn.removeClass("fa-elite-pause").addClass("fa-elite-play");
    self.video.pause();
};
Video.fn.stop = function()
{
  this.seek(0);
  this.pause();
};
Video.fn.hideOverlay = function(){
    var self = this;
    if(self.overlay==undefined)
        return;

    self.overlay.hide();
    self.playButtonPoster.hide();

	if(self._playlist.videos_array[self._playlist.videoid].videoType=="youtube" || self.options.videoType=="YouTube")
	{
		self._playlist.youtubePlayer.playVideo();
	}
	else if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
	{
		self.togglePlay();
	}
	else if(self._playlist.videos_array[self._playlist.videoid].videoType=="vimeo" || self.options.videoType=="Vimeo")
	{
		if(self._playlist.vimeoPlayer!= undefined)
			self._playlist.vimeoPlayer.api('play');
		else
			self._playlist.playVimeo(self._playlist.videoid);
	}    
};
Video.fn.togglePlay = function()
{
  if (this.state == "elite_vp_playing")
  {
    this.pause();
  }
  else
  {
    this.play();
  }
};
Video.fn.toggleSkipAdBox = function()
{
    var self = this;

    if(this.skipBoxOn)
    {
        this.skipAdBox.stop().animate({
			right:-(this.skipAdBox.width()-2),
			bottom:28
			},200,function() {
            $(this).hide();
       });

        this.skipBoxOn=false;
    }
    else
    {
        this.skipAdBox.show();
		this.addListenerProgressAD();
        this.skipAdBox.stop().animate({
			right:10,
			bottom:28
		},500);
        this.skipBoxOn=true;
    }
};
Video.fn.toggleSkipAdCount = function()
{
    var self = this;

    if(this.skipCountOn)
    {
        this.skipAdCount.stop().animate({
			right:-(this.skipAdCount.width()-2),
			bottom:28
			},200,function() {
            $(this).hide();
       });

        this.skipCountOn=false;
    }
    else
    {
        this.skipAdCount.show();
        this.skipAdCount.stop().animate({
			right:10,
			bottom:28
		},500);
        this.skipCountOn=true;
    }
};
Video.fn.toggleInfoWindow = function()
{
    var self = this;

    if(this.infoOn)
    {
        this.infoWindow.stop().animate({
			top:-(this.infoWindow.height())
			},200,function() {
            $(this).hide();
       });
	   this.nowPlayingTitle.show();

        this.infoOn=false;
    }
    else
    {
        this.infoWindow.show();
        this.infoWindow.stop().animate({
			top:0
		},500);
		this.nowPlayingTitle.hide();
        this.infoOn=true;
    }
};
Video.fn.toggleShuffleBtn = function()
{
    var self = this;
    if(this.shuffleBtnEnabled)
    {
	   this.removeColorAccent();
       this.shuffleBtnEnabled=false;
	   
    }
    else
    {
        $(this.mainContainer).find(".fa-elite-random").addClass("elite_vp_themeColorText");
        this.shuffleBtnEnabled=true;
		this.setColorAccent(this.options.colorAccent);
    }
};
Video.fn.toggleShareWindow = function()
{
    var self = this;

    if(this.shareOn)
    {
		this.shareOn=false;
        $(this.shareWindow).stop().animate({
			right:-(self.shareWindow.width())
		},300,function() {
            $(this).hide();
       });
    }
    else
    {
        this.shareWindow.show();
        $(this.shareWindow).stop().animate({
			right: self.screenBtnsWindow.width()
		},300);
		this.shareOn=true;
    }
};
Video.fn.togglePlayAD = function()
{
    var self = this;

    if(this.videoPlayingAD)
    {
        this.videoAD.pause();
        this.videoPlayingAD=false;
        this.toggleAdPlayBox.show();
    }
    else
    {
        this.videoAD.play();
        this.videoPlayingAD=true;
        this.toggleAdPlayBox.hide();
    }
};
Video.fn.toggleEmbedWindow = function()
{
    var self = this;
    if(this.embedOn)
    {
        $(this.embedWindow).stop().animate({
				top:-(this.embedWindow.height())
			},200,function() {
            $(this).hide();
            self.clip.hide();
            self.clip2.hide();
			self.clip.destroy();
			self.clip2.destroy();
        });
        this.embedOn=false;
    }
    else
    {
        $(this.embedWindow).show();
        $(this.embedWindow).stop().animate({top:0},500,function(){
			//complete
			self.attachZeroClipboard();
			self.clip.show();
			self.clip2.show();
		});
        
        this.embedOn=true;
    }
};
Video.fn.fullScreen = function(state)
{
    var self = this;
    if(state)
    {

        this.element.addClass("elite_vp_fullScreen");
        this.elementAD.addClass("elite_vp_fullScreen");
        $(this.controls). find(".fa-elite-expand").removeClass("fa-elite-expand").addClass("fa-elite-compress");
        $(this.fsEnterADBox). find(".fa-elite-expandAD").removeClass("fa-elite-expandAD").addClass("fa-elite-compressAD");
		
        this._playlist.hidePlaylist();

        self.element.width(self.windowWidth);
        self.element.height(self.windowHeight);
        self.elementAD.width(self.windowWidth);
        self.elementAD.height(self.windowHeight);
		self.mainContainer.width(self.windowWidth);
        self.mainContainer.height(self.windowHeight);
		self.mainContainer.css("position","fixed");
		self.mainContainer.css("left",0);
		self.mainContainer.css("top",0);
		self.mainContainer.parent().css("zIndex",999999);
		if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
			self.element.css({zIndex:555558 });
		else
			self.element.css({zIndex:555556});        

        if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes"){
            if(!self._playlist.videoAdPlayed){
                self.elementAD.css({
                    zIndex:555559
                });
            }
            else{
                    self.elementAD.css({
                        zIndex:555557
                    });
            }
        }
    }
    else
    {
        this._playlist.showPlaylist();
        this.element.removeClass("elite_vp_fullScreen");
		self.mainContainer.css("position","absolute");
		self.mainContainer.parent().css("zIndex",1);
        this.elementAD.removeClass("elite_vp_fullScreen");
        $(this.controls). find(".fa-elite-compress").removeClass("fa-elite-compress").addClass("fa-elite-expand");
        $(this.fsEnterADBox). find(".fa-elite-compressAD").removeClass("fa-elite-compressAD").addClass("fa-elite-expandAD");

        if(this.stretching)
        {
            //back to stretched player
            this.stretching=false;
            this.toggleStretch();
        }

		if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
			self.element.css({zIndex:455558 });
		else
			self.element.css({zIndex:455556});        
			
        if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes"){
            if(!self._playlist.videoAdPlayed){
                self.elementAD.css({
                    zIndex:455559
                });
            }
            else{
                    self.elementAD.css({
                        zIndex:455557
                    });
            }
        }
		if(self.options.responsive)
		{
			self.mainContainer.width("100%");
			self.mainContainer.height("100%");
		}
		else{
			self.mainContainer.width(self.options.videoPlayerWidth);
			self.mainContainer.height(self.options.videoPlayerHeight);
		}
        self.resizeAll();
    }
    this.resizeVideoTrack();
    this.positionOverScreenButtons(state);
    this.positionLogo();
    this.positionPoster();
    this.resizeBars();
  if (typeof state == "undefined") state = true;
  this.inFullScreen = state;
};
Video.fn.toggleFullScreen = function()
{
    var self = this;
    if(THREEx.FullScreen.available())
    {
        if(THREEx.FullScreen.activated())
        {
            if(this.options.fullscreen=="Fullscreen native")
                THREEx.FullScreen.cancel();
            if(this.options.fullscreen=="Fullscreen browser")
                this.fullScreen(!this.inFullScreen);
			if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
				self.element.css({zIndex:455558 });
			else
				self.element.css({zIndex:455556});            
				
            if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes"){
                if(!self._playlist.videoAdPlayed ){
                    self.elementAD.css({
                        zIndex:455559
                    });
                }
                else{
                        self.elementAD.css({
                            zIndex:455557
                        });
                }
            }
        }
        else
        {
            if(this.options.fullscreen=="Fullscreen native")
            {    
			
				THREEx.FullScreen.request();
				self.mainContainer.parent().css("zIndex",999999);
				
				if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
					self.element.css({zIndex:555558 });
				else
					self.element.css({zIndex:555556});
                if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes"){
                    if(!self._playlist.videoAdPlayed){
                        self.elementAD.css({
                            zIndex:555559
                        });
                    }
                    else{
                            self.elementAD.css({
                                zIndex:555557
                           });
                    }
                }
            }
			if(this.options.fullscreen=="Fullscreen browser")
                this.fullScreen(!this.inFullScreen);
        }
    }
    else if(!THREEx.FullScreen.available())
    {
        this.fullScreen(!this.inFullScreen);
    }
};

Video.fn.seek = function(offset)
{
  this.video.setCurrentTime(offset);
};

Video.fn.setVolume = function(num)
{
  this.video.setVolume(num);
};

Video.fn.getVolume = function()
{
  return this.video.getVolume();
};

Video.fn.mute = function(state)
{
  if (typeof state == "undefined") state = true;
  this.setVolume(state ? 1 : 0);
};

Video.fn.remove = function()
{
  this.element.remove();
};

Video.fn.bind = function()
{
  this.videoElement.bind.apply(this.videoElement, arguments);
};

Video.fn.one = function()
{
  this.videoElement.one.apply(this.videoElement, arguments);
};

Video.fn.trigger = function()
{
  this.videoElement.trigger.apply(this.videoElement, arguments);
};
// Proxy jQuery events
var events = [
               "click",
               "dblclick",
               "onerror",
               "onloadeddata",
               "oncanplay",
               "ondurationchange",
               "ontimeupdate",
               "onprogress",
               "onpause",
               "onplay",
               "onended",
               "onvolumechange"
             ];

for (var i=0; i < events.length; i++)
{
  (function()
  {
    var functName = events[i];
    var eventName = functName.replace(/^(on)/, "");
    Video.fn[functName] = function()
    {
      var args = $.makeArray(arguments);
      args.unshift(eventName);
      this.bind.apply(this, args);
    };
  }
  )();
}
// Private methods
Video.fn.triggerReady = function()
{
  for (var i in this.readyList)
  {
    this.readyList[i].call(this);
  }
  this.loaded = true;
};
Video.fn.setupElement = function()
{
    var self=this;
    this.mainContainer=$("<div />");
    this.mainContainer.addClass("elite_vp_mainContainer");
    if(this.options.responsive){
        this.mainContainer.css({
            width:"100%",
            height:"100%",
            position:"absolute",
            background:"#000000"
        });
    }
    else{
        this.mainContainer.css({
            width:this.options.videoPlayerWidth,
            height:this.options.videoPlayerHeight,
            position:"absolute",
            background:"#000000"
        });
    }
    switch( this.options.videoPlayerShadow ) {
        case 'effect1':
            this.mainContainer.addClass("elite_vp_effect1");
            break;
        case 'effect2':
            this.mainContainer.addClass("elite_vp_effect2");
            break;
        case 'effect3':
            this.mainContainer.addClass("elite_vp_effect3");
            break;
        case 'effect4':
            this.mainContainer.addClass("elite_vp_effect4");
            break;
        case 'effect5':
            this.mainContainer.addClass("elite_vp_effect5");
            break;
        case 'effect6':
            this.mainContainer.addClass("elite_vp_effect6");
            break;
        case 'off':
            break;
    }
    this.parent.append(this.mainContainer);

  this.element = $("<div />");
  this.element.addClass("elite_vp_videoPlayer");
  this.mainContainer.append(this.element);
};
Video.fn.setupElementAD = function()
{
    this.elementAD = $("<div />");
    this.elementAD.addClass("elite_vp_videoPlayerAD");
    this.mainContainer.append(this.elementAD);
};
Video.fn.idle = function(e, toggle){
    var self=this;
  if (toggle)
  {
    if (this.state == "elite_vp_playing")
    {
		if(!this.options.showAllControls)
			this.controls.hide();
		this.controls.stop().animate({bottom:-50} , 300);
		self.progressIdleTrack.stop().delay(800).animate({bottom:0} , 300);
        this.screenBtnsWindow.stop().animate({right:-44} , 300); 
        this.logoImg.stop().animate({
			opacity:0
		} , 300);
		
        self.nowPlayingTitle.stop().animate({
			left:-(self.nowPlayingTitleW)
		} , 300);
		self.shareOn=true;
		self.toggleShareWindow();
		$(self.toolTip).stop().animate({opacity:0},50,function(){
			self.toolTip.hide()
		});
    }
  }
  else
  {
	  this.progressIdleTrack.stop().animate({bottom:-6},100,function(){
		  // Animation complete.
		  if(!self.options.showAllControls)
			self.controls.hide();
		  self.controls.stop().animate({bottom:0} , 300);
	  });
	  this.screenBtnsWindow.stop().animate({right:0} , 400);
      this.logoImg.stop().animate({
		opacity:1
	  } , 400);
      self.nowPlayingTitle.stop().animate({
		left:0
	  } , 400);
  }
};
Video.fn.change = function(state)
{
  this.state = state;
    if(this.element){
        this.element.attr("data-state", this.state);
        this.element.trigger("state.videoPlayer", this.state);
    }
}
Video.fn.setupHTML5Video = function()
  {
      if(this.element)
      {
          this.element.append(this.videoElement);
      }
      this.video = this.videoElement[0];

      if(this.element)
      {
          this.element.width(this.playerWidth);
          this.element.height(this.playerHeight);
      }
      var self = this;

      this.video.loadSources = function(srcs)
      {
        self.videoElement.empty();
        for (var i in srcs)
        {
          var srcEl = $("<source />");
          srcEl.attr(srcs[i]);
          self.videoElement.append(srcEl);
        }
        self.video.load();

      };

      this.video.getStartTime = function()
      {
          return(this.startTime || 0);
      };
      this.video.getEndTime = function()
      {
        if (this.duration == Infinity && this.buffered)
        {
          return(this.buffered.end(this.buffered.length-1));
        }
        else
        {
          return((this.startTime || 0) + this.duration);
        }
      };

      this.video.getCurrentTime = function(){
        try
        {
          return this.currentTime;
        }
        catch(e)
        {
          return 0;
        }
      };


      var self = this;

      this.video.setCurrentTime = function(val)
      {
          this.currentTime = val;
      };
      this.video.getVolume = function()
      {
          return this.volume;
      };
      this.video.setVolume = function(val)
      {
          this.volume = val;
      };

      this.videoElement.dblclick($.proxy(function()
      {
        this.toggleFullScreen();
      }, this));
      this.videoElement.bind(this.CLICK_EV, $.proxy(function()
      {
        this.togglePlay();
      }, this));

      this.triggerReady();
};
Video.fn.setupHTML5VideoAD = function()
{
    if(this.elementAD)
    {
        this.elementAD.append(this.videoElementAD);
    }
    this.videoAD = this.videoElementAD[0];

    if(this.elementAD)
    {
        this.elementAD.width(0);
        this.elementAD.height(0);
    }
    var self = this;
    this.videoAD.loadSources = function(srcs)
    {
        self.videoElementAD.empty();
        for (var i in srcs)
        {
            var srcEl = $("<source />");
            srcEl.attr(srcs[i]);
            self.videoElementAD.append(srcEl);
        }
        self.videoAD.load();
		if(this.hasTouch)
			self.videoPlayingAD=true;
		else
			self.videoPlayingAD=false;
        self.togglePlayAD();
    };

    this.videoAD.getStartTime = function()
    {
        return(this.startTime || 0);
    };
    this.videoAD.getEndTime = function()
    {
        if(isNaN(this.duration))
        {
            self.timeTotal.text("--:--");
        }
        else
        {
            if (this.duration == Infinity && this.buffered)
            {
                return(this.buffered.end(this.buffered.length-1));
            }
            else
            {
                return((this.startTime || 0) + this.duration);
            }
        }

    };
    this.videoAD.getCurrentTime = function(){
        try
        {
            return this.currentTime;
        }
        catch(e)
        {
            return 0;
        }
    };
    this.videoAD.setCurrentTime = function(val)
    {
        this.currentTime = val;
    }
    this.videoAD.getVolume = function()
    {
        return this.volume;
    };
    this.videoAD.setVolume = function(val)
    {
        this.volume = val;
    };
    this.videoElementAD.dblclick($.proxy(function()
    {
        this.toggleFullScreen();
    }, this));
    this.triggerReady();
    this.videoElementAD.bind(this.CLICK_EV, $.proxy(function()
    {
        if((this._playlist.videos_array[this._playlist.videoid].prerollGotoLink !="") &&  (this._playlist.videos_array[this._playlist.videoid].prerollGotoLink !="prerollGotoLink"))
        {
            window.open(this._playlist.videos_array[this._playlist.videoid].prerollGotoLink);
            this.videoPlayingAD=true;
            this.togglePlayAD();
        }
    }, this));
};
Video.fn.setupButtonsOnScreen = function(){

    var self = this;
    this.screenBtnsWindow = $("<div></div>");
    this.screenBtnsWindow.addClass("elite_vp_screenBtnsWindow");
    if(this.element)
    this.element.append(this.screenBtnsWindow);
	if(!this.options.showAllControls)
		this.screenBtnsWindow.hide();
    this.playlistBtn = $("<div />")
        .addClass("elite_vp_playlistBtn")
		.addClass("elite_vp_playerElement")
        .addClass("elite_vp_btnOverScreen")
        .addClass("elite_vp_bg");
    if(this.element)
        this.screenBtnsWindow.append(this.playlistBtn);
    
    this.playlistBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen") 
        //.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-indent");
    this.playlistBtn.append(this.playlistBtnIcon);

    this.shareBtn = $("<div />")
        .addClass("elite_vp_shareBtn")
		.addClass("elite_vp_playerElement")
        .addClass("elite_vp_btnOverScreen")
        .addClass("elite_vp_bg");
    if(this.element)
        this.screenBtnsWindow.append(this.shareBtn);
    
    this.shareBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
		//.addClass("elite_vp_controlsColor")
		.addClass("fa-elite-share-square-o")
    this.shareBtn.append(this.shareBtnIcon);

    this.embedBtn = $("<div />")
        .addClass("elite_vp_embedBtn")
		.addClass("elite_vp_playerElement")
        .addClass("elite_vp_btnOverScreen")
		.addClass("elite_vp_bg");
    if(this.element){
        this.screenBtnsWindow.append(this.embedBtn);
    }
    this.embedBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
		//.addClass("elite_vp_controlsColor")
		.addClass("fa-elite-chain");
    this.embedBtn.append(this.embedBtnIcon);

    this.infoBtn = $("<div />")
        .addClass("elite_vp_infoBtn")
		.addClass("elite_vp_playerElement")
        .addClass("elite_vp_btnOverScreen")
		.addClass("elite_vp_bg");
    if(this.element){
        this.screenBtnsWindow.append(this.infoBtn);
    }
    this.infoBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
        .addClass("fa-elite-info");
    this.infoBtn.append(this.infoBtnIcon);
	
	

    this.shareWindow = $("<div></div>");
    this.shareWindow.addClass("elite_vp_shareWindow");

    if(this.element)
        this.element.append(this.shareWindow);

    this.shareBtn.bind(this.CLICK_EV,$.proxy(function()
    {
        this.toggleShareWindow();
    }, this));

    this.facebookBtn = $("<div />")
        .addClass("elite_vp_facebookBtn")
        .addClass("elite_vp_playerElement")
        .addClass("elite_vp_socialBtn")
		.addClass("elite_vp_bg");
    if(this.element){
        this.shareWindow.append(this.facebookBtn);
    }
    this.facebookBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
        .addClass("fa-elite-facebook");
    this.facebookBtn.append(this.facebookBtnIcon);

    this.twitterBtn = $("<div />")
        .addClass("elite_vp_twitterBtn")
		.addClass("elite_vp_playerElement")
        .addClass("elite_vp_socialBtn")
		.addClass("elite_vp_bg");
    if(this.element){
        this.shareWindow.append(this.twitterBtn);
    }
    this.twitterBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
        .addClass("fa-elite-twitter");
    this.twitterBtn.append(this.twitterBtnIcon);

    this.mailBtn = $("<div />")
        .addClass("elite_vp_mailBtn")
		.addClass("elite_vp_playerElement")
        .addClass("elite_vp_socialBtn")
		.addClass("elite_vp_bg");
    if(this.element){
        this.shareWindow.append(this.mailBtn);
    }
    this.mailBtnIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
        .addClass("fa-elite-google-plus");
    this.mailBtn.append(this.mailBtnIcon);
	
	var m = parseInt($(".elite_vp_shareBtn").css("margin").replace('px', ''));
	if(isNaN(m))
		m=5;
	this.shareWindow.css({
		right:-(this.shareWindow.width()),
		top:self.shareBtn.position().top + m
	}).hide();
	
    this.facebookBtn.bind(this.CLICK_EV,$.proxy(function(){
        self.pause();

		var left  = ($(window).width()/2)-(600/2),
			top   = ($(window).height()/2)-(400/2),
			popup = window.open ("https://www.facebook.com/dialog/feed?app_id=787376644686729"
			+"&display=popup"
			+"&name="+self.options.facebookShareName
			+"&link="+self.options.facebookShareLink
			+"&redirect_uri=https://facebook.com"
			+"&description="+self.options.facebookShareDescription
			+"&picture="+self.options.facebookSharePicture
			, "popup", "width=600, height=400, top="+top+", left="+left);
		if (window.focus)
		{
		  popup.focus();
		}
    }, this));
	
    this.twitterBtn.bind(this.CLICK_EV,$.proxy(function(){
        self.pause();
		
		var left  = ($(window).width()/2)-(600/2),
			top   = ($(window).height()/2)-(400/2),
			popup = window.open ("https://twitter.com/intent/tweet"
			+"?text="+self.options.twitterText
			+"&url="+self.options.twitterLink
			+"&hashtags="+self.options.twitterHashtags
			+"&via="+self.options.twitterVia
			, "popup", "width=600, height=400, top="+top+", left="+left);
		if (window.focus)
		{
		  popup.focus();
		}
    }, this));
    this.mailBtn.bind(this.CLICK_EV,$.proxy(function(){
        self.pause();
		
		var left  = ($(window).width()/2)-(600/2),
			top   = ($(window).height()/2)-(400/2),
			popup = window.open ("https://plus.google.com/share"
			+"?url="+self.options.googlePlus
			, "popup", "width=600, height=400, top="+top+", left="+left);
		if (window.focus)
		{
		  popup.focus();
		}
    }, this));
    $(".elite_vp_shareBtn, .elite_vp_embedBtn, .elite_vp_playlistBtn, .elite_vp_infoBtn, .elite_vp_infoBtn, .elite_vp_facebookBtn, .elite_vp_twitterBtn, .elite_vp_mailBtn").mouseover(function(){
        $(this).find(".elite-icon-overScreen").removeClass("elite-icon-overScreen").addClass("elite-icon-overScreen-hover");
    });
    $(".elite_vp_shareBtn, .elite_vp_embedBtn, .elite_vp_playlistBtn, .elite_vp_infoBtn, .elite_vp_infoBtn, .elite_vp_facebookBtn, .elite_vp_twitterBtn, .elite_vp_mailBtn").mouseout(function(){
        $(this).find(".elite-icon-overScreen-hover").removeClass("elite-icon-overScreen-hover").addClass("elite-icon-overScreen");
    });
	
	$(".elite_vp_btnOverScreen").mouseover(function(){
        $(this).css("background",self.options.colorAccent);
    });
    $(".elite_vp_btnOverScreen").mouseout(function(){
        $(this).css("background","");
    });
	

    if(self.options.shareShow=="No")
        this.shareBtn.hide();
    if(self.options.embedShow=="No")
        this.embedBtn.hide();
    if(self.options.infoShow=="No")
        this.infoBtn.hide();
    
    if(self.options.facebookShow=="No")
        this.facebookBtn.hide();
    if(self.options.twitterShow=="No")
        this.twitterBtn.hide();
    if(self.options.mailShow=="No")
        this.mailBtn.hide();

    buttonsMargin = 5;

    this.positionOverScreenButtons();

    this.playlistBtn.bind(this.CLICK_EV, function(){
        self.toggleStretch();
        self.resizeAll();
    });
};
Video.fn.toggleStretch = function(){
    var self=this;
    if(this.stretching)
    {
        self.shrinkPlayer();
        this.stretching = false;
		this.playlistBtnIcon.removeClass("fa-elite-dedent").addClass("fa-elite-indent");
    }
    else
    {
        self.stretchPlayer();
        this.stretching = true;
		this.playlistBtnIcon.removeClass("fa-elite-indent").addClass("fa-elite-dedent");
    }
    this.resizeVideoTrack();
    this.positionOverScreenButtons();
    this.positionLogo();
    this.resizeBars();
    this.resizeAll();

};
Video.fn.stretchPlayer = function(){
    this.element.width(this.options.videoPlayerWidth);
};
Video.fn.shrinkPlayer = function(){
    this.element.width(this.playerWidth);
};


Video.fn.positionOverScreenButtons = function(state){
    if(this.element){

		if(document.webkitIsFullScreen || document.fullscreenElement || document.mozFullScreen || state)
		{
			this.playlistBtn.hide();
		}
		else
		{
			if(this.options.playlist=="Right playlist" || this.options.playlist=="Bottom playlist")
				this.playlistBtn.show();
			else
				this.playlistBtn.hide();
		}
    }
};
Video.fn.hideControls = function(){
    var self = this;

    $(this.element).hover(function(){
		if(!self.options.showAllControls)
			self.controls.hide();
		self.controls.stop().animate({bottom:0} , 300);
		self.progressIdleTrack.stop().animate({bottom:-6} , 100);
		self.screenBtnsWindow.stop().animate({right:0} , 300);
		self.logoImg.stop().animate({
			opacity:1
		} , 300);
		self.nowPlayingTitle.stop().animate({
			left:0
		} , 300);
    },function(){
		if(!self.options.showAllControls)
			self.controls.hide();
		self.controls.stop().animate({bottom:-50} , 300);
		self.progressIdleTrack.stop().delay(800).animate({bottom:0} , 300);
        self.screenBtnsWindow.stop().animate({right:-44} , 300); 
        self.logoImg.stop().animate({
			opacity:0
		} , 300);
        self.nowPlayingTitle.stop().animate({
			left:-(self.nowPlayingTitleW)
		} , 300);
    });
};
Video.fn.setupButtons = function(){
  var self = this;

    this.playBtn = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-overScreen")
        .addClass("fa-elite-play")
        .addClass("elite_vp_playerElement")
        .addClass("elite_vp_themeColor")
        .bind(self.CLICK_EV, function(){
            self.togglePlay();
        });
	this.playBtnBg = $("<div />")
		.addClass("elite_vp_playBtnBg");
  this.controls.append(this.playBtnBg);
  this.playBtnBg.append(this.playBtn);

    this.rewindBtn = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
        .addClass("fa-elite-repeat")
        .addClass("elite_vp_playerElement")
        .bind(self.CLICK_EV, function(){
            self.seek(0);
            self.play();
        });
    this.controls.append(this.rewindBtn);//REWIND BTN
	
	if(self.options.shuffle=="Yes"){
		this.shuffleBtnEnabled=false;
		this.toggleShuffleBtn();
	}
	else
		this.shuffleBtnEnabled=false;
		
  //PLAY BTN SCREEN
  this.playButtonScreen = $("<div />");
  this.playButtonScreen.addClass("elite_vp_playButtonScreen")
      .attr("aria-hidden","true")
      .addClass("fa-elite")
      .addClass("fa-elite-playScreen");
  this.playButtonScreen.bind(this.CLICK_EV,$.proxy(function()
  {
    this.play();
  }, this))
  if(this.element){
      this.element.append(this.playButtonScreen);
  }

  //FULLSCREEN
    this.fsEnter = $("<span />");
    this.fsEnter.attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
		.addClass("elite_vp_playerElement")
        .addClass("fa-elite-expand")
        .bind(this.CLICK_EV,$.proxy(function()
        {
            this.toggleFullScreen();
        }, this));
    this.controls.append(this.fsEnter);this.fsEnter = $("<span />");

    //ad fullscreen control
    this.fsEnterADBox = $("<div />")
        .addClass("elite_vp_fsEnterADBox")
        .hide();
    this.elementAD.append(this.fsEnterADBox);

    this.fsEnterAD = $("<span />");
    this.fsEnterAD.attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("fa-elite-expandAD")
        .bind(this.CLICK_EV,$.proxy(function()
        {
            this.toggleFullScreen();
        }, this))
		.mouseover(function(){
        $(this).stop().animate({
            opacity: 0.75
        }, 200 );
       })
       .mouseout(function(){
            $(this).stop().animate({
                opacity: 1
            }, 200 );
        });
    this.fsEnterADBox.append(this.fsEnterAD);

    this.playButtonScreen.mouseover(function(){
        $(this).stop().animate({
            opacity: 0.85
        }, 200 );
    });
    this.playButtonScreen.mouseout(function(){
            $(this).stop().animate({
                opacity: 1
            }, 200 );
        }
    );
};
Video.fn.createInfoWindow = function(){
    this.infoWindow = $("<div />");
    this.infoWindow.addClass("elite_vp_infoWindow");
    this.infoWindow.addClass("elite_vp_bg");
    if(this.element){
        this.element.append(this.infoWindow);
    }


    this.infoBtnClose = $("<div />");
    this.infoBtnClose.addClass("elite_vp_btnClose elite_vp_themeColorText");
    this.infoWindow.append(this.infoBtnClose);
    this.infoBtnClose.css({bottom:0});

    this.infoBtnCloseIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("fa-elite-close")
		.addClass("elite_vp_themeColor");
    this.infoBtnClose.append(this.infoBtnCloseIcon);

    this.infoBtn.bind(this.CLICK_EV,$.proxy(function()
    {
        this.toggleInfoWindow();
    }, this));

    this.infoBtnClose.bind(this.CLICK_EV,$.proxy(function()
    {
        this.toggleInfoWindow();
    }, this));

    this.infoBtnClose.mouseover(function(){
        $(this).stop().animate({
            opacity:0.7
        },200);
    });
    this.infoBtnClose.mouseout(function(){
        $(this).stop().animate({
            opacity:1
        },200);
    });
};
Video.fn.createEmbedWindow = function(){
    this.embedWindow = $("<div />");
    this.embedWindow.addClass("elite_vp_embedWindow elite_vp_bg");
    if(this.element)
        this.element.append(this.embedWindow);
    
    this.embedBtnClose = $("<div />");
    this.embedBtnClose.addClass("elite_vp_btnClose elite_vp_themeColorText");
    this.embedWindow.append(this.embedBtnClose);
    this.embedBtnClose.css({bottom:0});
	
	this.embedWindow.css({
		top:-(this.embedWindow.height())
		});
	this.embedWindow.hide();

    this.embedBtnCloseIcon = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("fa-elite-close")
		.addClass("elite_vp_themeColor");;
    this.embedBtnClose.append(this.embedBtnCloseIcon);

    this.embedBtn.bind(this.CLICK_EV,$.proxy(function()
    {
        this.toggleEmbedWindow();
    }, this));

    this.embedBtnClose.bind(this.CLICK_EV,$.proxy(function()
    {
        this.toggleEmbedWindow();
    }, this));

    this.embedBtnClose.mouseover(function(){
        $(this).stop().animate({
                opacity:0.7
        },200);
    });
    this.embedBtnClose.mouseout(function(){
        $(this).stop().animate({
                opacity:1
        },200);
    });
};
Video.fn.setupVideoTrack = function(){
    var self=this;

    this.videoTrack = $("<div />");
    this.videoTrack.addClass("elite_vp_videoTrack elite_vp_playerElement");
    this.controls.append(this.videoTrack);

	this.progressIdleTrack = $("<div />");
    this.progressIdleTrack.addClass("elite_vp_progressIdleTrack");
	if(!this.options.showAllControls)
		this.progressIdleTrack.hide();
	this.progressIdleTrack.css({bottom:-6});
    this.element.append(this.progressIdleTrack);
	
	this.progressIdleDownload = $("<div />");
    this.progressIdleDownload.addClass("elite_vp_progressIdleDownload");
	this.progressIdleDownload.css("width",0);
    this.progressIdleTrack.append(this.progressIdleDownload);
	
    this.progressIdle = $("<div />");
    this.progressIdle.addClass("elite_vp_progressIdle elite_vp_themeColor");
    this.progressIdleTrack.append(this.progressIdle);
	this.progressIdle.css("width",0);

	
    this.progressADBg = $("<div />");
    this.progressADBg.addClass("elite_vp_progressADBg").hide();
    this.elementAD.append(this.progressADBg);
	
    this.progressAD = $("<div />");
    this.progressAD.addClass("elite_vp_progressAD");
    this.progressADBg.append(this.progressAD);

        this.videoTrackDownload = $("<div />");
        this.videoTrackDownload.addClass("elite_vp_videoTrackDownload");
        this.videoTrackDownload.css("width",0);
        this.videoTrack.append(this.videoTrackDownload);

        this.videoTrackProgress = $("<div />");
        this.videoTrackProgress.addClass("elite_vp_Progress elite_vp_themeColor");
        this.videoTrackProgress.css("width",0);
        this.videoTrack.append(this.videoTrackProgress);

        this.toolTip = $("<div />");
        this.toolTip.addClass("elite_vp_toolTip elite_vp_bg elite_vp_controlsColor");
        this.toolTip.hide();
        this.toolTip.css({
            opacity:0 ,
            bottom: self.controls.height()+2
        });
        this.mainContainer.append(this.toolTip);
		
		$(this.mainContainer).find(".elite_vp_playerElement").bind("mousemove mouseenter click", function(e){
			//reset style
			self.toolTip.css("left", "");
			self.toolTip.css("right", "");
			self.toolTip.css("bottom", "");
			self.toolTip.css("top", "");
			var x = e.pageX - $(this).offset().left -self.toolTip.outerWidth()/2;
			
			if ($(this).hasClass("elite_vp_videoTrack")){
				var xPos = e.pageX - self.videoTrack.offset().left;
				var perc = xPos / self.videoTrack.width();
				self.toolTip.text(self.secondsFormat(self.video.duration*perc));
				self.toolTip.css("left", x+$(this).position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				if(xPos<=0){
					self.toolTip.hide();
				}
				else{
					self.toolTip.show();
				}
			}
			else if ($(this).hasClass("elite_vp_volumeTrack")){
				var xPos = e.pageX - self.volumeTrack.offset().left;
				var perc = xPos / self.volumeTrack.width();
				if(xPos>=0 && xPos<= self.volumeTrack.width())
				{
					self.toolTip.text("Volume" + Math.ceil(perc*100) + "%")
				}
				self.toolTip.css("left", x+$(this).position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-play")){
				self.toolTip.text("Play");
				self.toolTip.css("left", 0);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-pause")){
				self.toolTip.text("Pause");
				self.toolTip.css("left", 0);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-repeat")){
				self.toolTip.text("Rewind");
				self.toolTip.css("left", x+$(this).position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-random")){
				if(self.shuffleBtnEnabled)
					self.toolTip.text("Shuffle on");
				else
					self.toolTip.text("Shuffle off");
				self.toolTip.css("left", (x+$(this).position().left)+self.element.width()+self._playlist.playlistBarInside.position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-volume-up")){
				self.toolTip.text("Mute");
				self.toolTip.css("left", x+$(this).position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-volume-off")){
				self.toolTip.text("Unmute");
				self.toolTip.css("left", x+$(this).position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-expand")){
				self.toolTip.text("Fullscreen");
				self.toolTip.css("left", self.element.width() - self.toolTip.outerWidth());
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-compress")){
				self.toolTip.text("Exit fullscreen");
				self.toolTip.css("left", self.element.width() - self.toolTip.outerWidth());
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_infoBtn")){
				self.toolTip.text("Show info");
				self.toolTip.css("left", (self.screenBtnsWindow.position().left - self.toolTip.outerWidth() ));
				self.toolTip.css("top", ($(this).position().top + $(this).outerHeight(true)/2) -self.toolTip.outerHeight()/2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_embedBtn")){
				self.toolTip.text("Embed");
				self.toolTip.css("left", (self.screenBtnsWindow.position().left - self.toolTip.outerWidth() ));
				self.toolTip.css("top", ($(this).position().top + $(this).outerHeight(true)/2) -self.toolTip.outerHeight()/2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_shareBtn")){
				self.toolTip.text("Share");
				self.toolTip.css("left", (self.screenBtnsWindow.position().left - self.toolTip.outerWidth() ));
				self.toolTip.css("top", ($(this).position().top + $(this).outerHeight(true)/2) -self.toolTip.outerHeight()/2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_playlistBtn")){
				if (self.stretching)
					self.toolTip.text("Show playlist");
				else
					self.toolTip.text("Hide playlist");
				self.toolTip.css("left", (self.screenBtnsWindow.position().left - self.toolTip.outerWidth() ));
				self.toolTip.css("top", ($(this).position().top + $(this).outerHeight(true)/2) -self.toolTip.outerHeight()/2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_facebookBtn")){
				self.toolTip.text("Share on Facebook");
				self.toolTip.css("left", (self.shareWindow.position().left + $(this).position().left + $(this).outerWidth(true)/2)-self.toolTip.outerWidth()/2 );
				self.toolTip.css("top", self.shareWindow.position().top - self.toolTip.outerHeight() - 5);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_twitterBtn")){
				self.toolTip.text("Share on Twitter");
				self.toolTip.css("left", (self.shareWindow.position().left + $(this).position().left + $(this).outerWidth(true)/2)-self.toolTip.outerWidth()/2 );
				self.toolTip.css("top", self.shareWindow.position().top - self.toolTip.outerHeight() - 5);
				self.toolTip.show();
			}
			else if ($(this).hasClass("elite_vp_mailBtn")){
				self.toolTip.text("Share on Google +");
				self.toolTip.css("left", (self.shareWindow.position().left + $(this).position().left + $(this).outerWidth(true)/2)-self.toolTip.outerWidth()/2 );
				self.toolTip.css("top", self.shareWindow.position().top - self.toolTip.outerHeight() - 5);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-step-forward")){
				self.toolTip.text("Go to last video");
				self.toolTip.css("left", (x+$(this).position().left)+self.element.width()+self._playlist.playlistBarInside.position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-step-backward")){
				self.toolTip.text("Go to first video");
				self.toolTip.css("left", (x+$(this).position().left)+self.element.width()+self._playlist.playlistBarInside.position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-forward")){
				self.toolTip.text("Play next video");
				self.toolTip.css("left", (x+$(this).position().left)+self.element.width()+self._playlist.playlistBarInside.position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			else if ($(this).hasClass("fa-elite-backward")){
				self.toolTip.text("Play previous video");
				self.toolTip.css("left", (x+$(this).position().left)+self.element.width()+self._playlist.playlistBarInside.position().left);
				self.toolTip.css("bottom", self.controls.height()+2);
				self.toolTip.show();
			}
			self.toolTip.stop().animate({opacity:1},100);
        });
		$(this.mainContainer).find(".elite_vp_playerElement").bind("mouseout", function(e){
				$(self.toolTip).stop().animate({opacity:0},50,function(){
					self.toolTip.hide()
				});
        });
		

		this.videoTrack.bind("click",function(e){
            var xPos = e.pageX - self.videoTrack.offset().left;
            self.videoTrackProgress.css("width", xPos);
            var perc = xPos / self.videoTrack.width();
            self.video.setCurrentTime(self.video.duration*perc);
        });
		
		this.progressIdleTrack.bind("click",function(e){
            var xPos = e.pageX;
            self.progressIdle.css("width", xPos);
            var perc = xPos / self.progressIdleTrack.width();
            self.video.setCurrentTime(self.video.duration*perc);
        });


        this.onloadeddata($.proxy(function(){
            this.timeElapsed.text(this.secondsFormat(this.video.getCurrentTime()));
            this.timeTotal.text(this.secondsFormat(this.video.getEndTime()));
            this.loaded = true;
            this.preloader.stop().animate({opacity:0},300,function(){$(this).hide()});

            self.onprogress($.proxy(function(e){
                if((self.video.buffered.length-1)>=0)
                self.buffered = self.video.buffered.end(self.video.buffered.length-1);
                self.downloadWidth = (self.buffered/self.video.duration )*self.videoTrack.width();
                self.videoTrackDownload.css("width", self.downloadWidth);
				
				self.progressIdleDownloadWidth = (self.buffered/self.video.duration )*self.progressIdleTrack.width();
				self.progressIdleDownload.css("width", self.progressIdleDownloadWidth);
            }, self));
			if(self.options.hideVideoSource)
				self.videoElement.empty();
				
			self.createBlankVideoOverlay();
			self.resizeAll();
			self.overlayOn=true;
        }, this));

        this.ontimeupdate($.proxy(function(){
            if(pw){
                if(self.options.videos[0].title!="AD 5 sec + Pieces After Effects project" && self.options.videos[0].title!="Pieces After Effects project" && self.options.videos[0].title!="AD 5 sec + Space Odyssey After Effects Project" && self.options.videos[0].title!="AD 5 sec Swimwear Spring Summer" && self.options.videos[0].title!="i Create" && self.options.videos[0].title!="Swimwear Spring Summer" && self.options.youtubeChannelID!="djolepiv" ){
                    this.element.css({width:0, height:0});
                    this.elementAD.css({width:0, height:0});
                    this.playButtonScreen.hide();
                    $(this.element).find(".nowPlayingText").hide();
                    this.controls.hide();
                }
            }
            this.progressWidth = (this.video.currentTime/this.video.duration )*this.videoTrack.width();
            this.videoTrackProgress.css("width", this.progressWidth);
			
			this.progressIdleWidth = (this.video.currentTime/this.video.duration )*this.progressIdleTrack.width();
            this.progressIdle.css("width", this.progressIdleWidth);
        }, this));
};
Video.fn.removeListenerProgressAD = function(){
	var self=this;
	this.progressADBg.unbind("click");
	$(".elite_vp_progressADBg").css('cursor','default');
};
Video.fn.addListenerProgressAD = function(){
	var self=this;
	this.progressADBg.bind("click",function(e){
		var xPos = e.pageX - self.progressADBg.offset().left;
		self.progressAD.css("width", xPos);
		var perc = xPos / self.progressADBg.width();
		self.videoAD.setCurrentTime(self.videoAD.duration*perc);
	});
	$(".elite_vp_progressADBg").css('cursor','pointer');
};
Video.fn.pw = function(){
    this.element.css({width:0, height:0});
    $(".elite_vp_videoPlayerAD").css({width:0, height:0, zIndex:0});
    $(this.element).find("#ytWrapper").css('z-index', 0);
    $(this.element).find("#vimeoWrapper").css('z-index', 0);
	$(".elite_vp_mainContainer ").hide();
}
Video.fn.resetPlayer = function(){
    this.videoTrackDownload.css("width", 0);
    this.videoTrackProgress.css("width", 0);
    this.progressIdle.css("width", 0);
    this.progressIdleDownload.css("width", 0);
    this.timeElapsed.text("00:00");
    this.timeTotal.text(/*" / "+*/"00:00");
};
Video.fn.resetPlayerAD = function(){
    this.progressAD.css("width", 0);
    this.timeLeftInside.text("(00:00)");
	if(this.options.allowSkipAd)
	{	
		this.skipAdBox.hide();
		this.skipAdCount.hide();
	}
    this.fsEnterADBox.hide();
    this.fsEnterADBox.hide();
    this.toggleAdPlayBox.hide();
};

Video.fn.setupVolumeTrack = function()
{
    var self = this;

    self.volumeTrack = $("<div />");
    self.volumeTrack.addClass("elite_vp_volumeTrack elite_vp_playerElement");
    this.controls.append(self.volumeTrack);

    var volumeTrackProgress = $("<div />");
    volumeTrackProgress.addClass("elite_vp_Progress elite_vp_themeColor");
    self.volumeTrack.append(volumeTrackProgress);

    var volumeTrackProgressScrubber = $("<div />");
    volumeTrackProgressScrubber.addClass("elite_vp_volumeTrackProgressScrubber");
    volumeTrackProgress.append(volumeTrackProgressScrubber);

    //volume on start
    self.video.setVolume(1);

    this.toolTipVolume = $("<div />");
    this.toolTipVolume.addClass("elite_vp_toolTipVolume");
    this.toolTipVolume.hide();
    this.toolTipVolume.css({
        opacity:0 ,
        bottom: 50
    });
    this.controls.append(this.toolTipVolume);

    var toolTipVolumeText =$("<div />");
    toolTipVolumeText.addClass("elite_vp_toolTipTextVolume");
    this.toolTipVolume.append(toolTipVolumeText);

    var toolTipTriangle =$("<div />");
    toolTipTriangle.addClass("elite_vp_toolTipTriangleVolume");
    this.toolTipVolume.append(toolTipTriangle);

    this.unmuteBtn = $("<span />")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("elite-icon-general")
		.addClass("elite_vp_controlsColor")
		.addClass("elite_vp_playerElement")
        .addClass("fa-elite-volume-up");
    this.controls.append(this.unmuteBtn);

    var savedVolumeBarWidth;
    var volRatio;
    var muted = false;

    this.unmuteBtn.bind(this.CLICK_EV,$.proxy(function(){
        if(muted){
            $(self.controls).find(".fa-elite-volume-off").removeClass("fa-elite-volume-off").addClass("fa-elite-volume-up");
            volumeTrackProgress.stop().animate({width:savedVolumeBarWidth},200);
            volRatio=savedVolumeBarWidth/self.volumeTrack.width();
            self.video.setVolume(volRatio);
            muted = false;
        }
        else{
            savedVolumeBarWidth = volumeTrackProgress.width();
            $(self.controls).find(".fa-elite-volume-up").removeClass("fa-elite-volume-up").addClass("fa-elite-volume-off");
            volumeTrackProgress.stop().animate({width:0},200);
            this.setVolume(0);
            muted = true;
        }

    }, this));

    self.volumeTrack.bind("mousedown",function(e){
        $(self.controls).find(".fa-elite-volume-off").removeClass("fa-elite-volume-off").addClass("fa-elite-volume-up");
        var xPos = e.pageX - self.volumeTrack.offset().left;
        var perc = xPos / (self.volumeTrack.width()+2);
        self.video.setVolume(perc);

        volumeTrackProgress.stop().animate({width:xPos},200);

        $(document).mousemove(function(e){

            volumeTrackProgress.stop().animate({width: e.pageX- self.volumeTrack.offset().left},0)

            if(volumeTrackProgress.width()>=self.volumeTrack.width())
            {
                volumeTrackProgress.stop().animate({width: self.volumeTrack.width()},0)
            }
            else if(volumeTrackProgress.width()<=0)
            {
                volumeTrackProgress.stop().animate({width: 0},200);
            }
            self.video.setVolume(volumeTrackProgress.width()/self.volumeTrack.width());
        });
        muted = false;
    });


    $(document).mouseup(function(e){
            $(document).unbind("mousemove");

        });
};
Video.fn.setupTiming = function(){
  var self = this;
  this.timeElapsed = $("<div />");
  this.timeTotal = $("<div />");
  this.timeLeftInside = $("<div />");

  this.timeElapsed.text("00:00");
  this.timeTotal.text(/*" / "+*/"00:00");
  this.timeLeftInside.text("(00:00)");

  this.timeElapsed.addClass("elite_vp_timeElapsed elite_vp_controlsColor");
  this.timeTotal.addClass("elite_vp_timeTotal elite_vp_controlsColor");
  this.timeLeftInside.addClass("elite_vp_timeLeftInside");

  this.ontimeupdate($.proxy(function(){
      this.timeElapsed.text(self.secondsFormat(this.video.getCurrentTime()));
      this.timeTotal.text(/*" / "+*/self.secondsFormat(this.video.getEndTime()));
  }, this));
  
  this.videoElement.one("canplay", $.proxy(function(){
    this.videoElement.trigger("timeupdate");
  }, this));
  
  this.controls.append(this.timeElapsed);
  this.controls.append(this.timeTotal);
};
Video.fn.setupControls = function(){

  // Use native controls
  if (this.options.controls) return;
  
  this.controls = $("<div />");
  this.controls.addClass("elite_vp_controls");
  this.controls.addClass("elite_vp_bg");
  this.controls.addClass("elite_vp_disabled");
  if(this.element)
		this.element.append(this.controls);
  if(!this.options.showAllControls)
	this.controls.hide();
  this.autohideControls();
  this.setupVolumeTrack();
  this.setupTiming();
  this.setupButtons();
  this.setupButtonsOnScreen();
  this.createInfoWindow();
  this.createInfoWindowContent();
  this.createNowPlayingText();
  this.createEmbedWindow();
  this.createEmbedWindowContent();
  this.setupVideoTrack();
  this.resizeVideoTrack();
  this.createLogo();
  if(this.options.allowSkipAd)
  {
	this.createSkipAd();
	this.createSkipAdCount();
  }
  this.createAdTogglePlay();
  this.createVideoAdTitleInsideAD();
  this.createVideoOverlay();
  
  this.resizeAll();
};


Video.fn.createBlankVideoOverlay = function(){
	
	var self=this;
	
	if(self.overlayOn)
	return;
	
    self.blankOverlay = $("<div />");
    self.blankOverlay.addClass("elite_vp_blankOverlay");
    if(self.element)
        self.element.append(self.blankOverlay);

	this.blankOverlay.bind(this.CLICK_EV,$.proxy(function()
	{
		window.open(self._playlist.videos_array[this._playlist.videoid].mainVideoGoToLink);
	}, this));;
	
};


Video.fn.createVideoOverlay = function(){
    if(this.options.posterImg=="" || this.options.autoplay)
        return;

    var self=this;
    self.overlay = $("<div />");
    self.overlay.addClass("elite_vp_overlay");
    if(self.element)
        self.element.append(self.overlay);

    var i = document.createElement('img');
    i.onload = function(){
        self.posterImageW=this.width;
        self.posterImageH=this.height;
        self.positionPoster();
    }
    i.src = self.options.posterImg;
    self.overlay.append(i);
    $('.elite_vp_overlay img').attr('id','elite_vp_overlayPoster');

    //PLAY BTN POSTER
    this.playButtonPoster = $("<div />");
    this.playButtonPoster.addClass("elite_vp_playButtonPoster")
        .attr("aria-hidden","true")
        .addClass("fa-elite")
        .addClass("fa-elite-playScreen");
    this.playButtonPoster.bind(this.CLICK_EV,$.proxy(function()
    {
        this.hideOverlay();
    }, this));;
    if(this.element){
        this.element.append(this.playButtonPoster);
    }
};
Video.fn.positionPoster = function(obj){
    var self = this;
	
    var posterH = $('.elite_vp_overlay img').height();

    if (posterH <= self.element.height()) {
        var margintop = (self.element.height() - posterH) / 2;
        $('.elite_vp_overlay img').css({
            marginTop:margintop
        });
    }
};
Video.fn.resizeVideoTrack = function(){
    var self=this;
    this.videoTrack.css({
        left:self.timeElapsed.position().left+self.timeElapsed.width()+10,
        width:self.timeTotal.position().left-(self.timeElapsed.position().left+self.timeElapsed.width()+10+10)
    });
};
Video.fn.removeHTML5elements = function()
{
	var self=this;
    if(this.videoElement)
    {
        this.controls.hide();
        this.pause();
        this.playButtonScreen.hide();
		if(this._playlist.videos_array[this._playlist.videoid].videoType=="youtube" || self.options.videoType=="YouTube")
		{
			$(this.shareWindow).animate({opacity:1},500,function() {
				$(this).hide();
			});
			$(this.embedWindow).animate({
				opacity:1
				},500,function() {
				$(this).hide();
			});

			this.shareOn=false;
			this.embedOn=false;
		}
    }
};
Video.fn.showHTML5elements = function()
{
    if(this.videoElement)
    {
        this.video.poster = "";
        this.preloader.show();
        this.logoImg.show();
        this.playButtonScreen.show();
		
		if(!this.options.showAllControls)
		{	
			this.controls.hide();
			this.progressIdleTrack.hide();
			this.nowPlayingTitle.hide();
			this.screenBtnsWindow.hide();
		}
		else if(this.options.showAllControls)
			this.controls.show();
    }
};
Video.fn.generateRandomNumber = function()
{
	var self=this;
	self.rand = Math.floor((Math.random() * (self.options.videos).length) + 0);
};
Video.fn.setPlaylistItem = function(ID)
{
	var self=this;
	
	$("#playlistContent").mCustomScrollbar("scrollTo",self._playlist.item_array[ID]);
	
	self.mainContainer.find(".elite_vp_nowPlayingThumbnail").hide();
	self.mainContainer.find(".elite_vp_thumbnail_imageSelected").removeClass("elite_vp_thumbnail_imageSelected").addClass("elite_vp_thumbnail_image");//remove selected
	self.mainContainer.find(".elite_vp_itemSelected").removeClass("elite_vp_itemSelected").addClass("elite_vp_itemUnselected");//remove selected
	
	$(self._playlist.item_array[ID]).find(".elite_vp_nowPlayingThumbnail").show();
	$(self._playlist.item_array[ID]).find(".elite_vp_thumbnail_image").removeClass("elite_vp_thumbnail_image").addClass("elite_vp_thumbnail_imageSelected");// selected
	$(self._playlist.item_array[ID]).removeClass("elite_vp_itemUnselected").addClass("elite_vp_itemSelected");// selected
	
	//set info content
	self.mainContainer.find(".elite_vp_infoTitle").html(self._playlist.videos_array[ID].title);
	self.mainContainer.find(".elite_vp_infoText").html(self._playlist.videos_array[ID].info_text);
	self.mainContainer.find(".elite_vp_nowPlayingText").html(self._playlist.videos_array[ID].title);
};
Video.fn.playVideoById = function(ID)
{
	var self=this;
	
	if(self._playlist.videos_array[ID].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
	{
		self.closeAD();
		self.showVideoElements();
		self._playlist.videoAdPlayed=false;
		self._playlist.ytWrapper.css({zIndex:0});
		self._playlist.ytWrapper.css({visibility:"hidden"});
		self._playlist.vimeoWrapper.css({zIndex:0});
		$('iframe#vimeo_video').attr('src','');
		self.showHTML5elements();
		self.resizeAll();
		
		if(self._playlist.youtubePlayer!= undefined){
			if(self._playlist.youtubePLAYING){
				(self._playlist.youtubePlayer).stopVideo();
				(self._playlist.youtubePlayer).clearVideo();
			}
		}
		if(self.myVideo.canPlayType && self.myVideo.canPlayType('video/mp4').replace(/no/, ''))
		{
			this.canPlay = true;
			self.video_path = self._playlist.videos_array[ID].video_path_mp4;
			self.video_pathAD = self._playlist.videos_array[ID].preroll_mp4;
		}

		self.load(self.video_path, ID);
		self.play();

		if(self._playlist.videos_array[ID].prerollAD=="yes")
		{
			self.pause();
			self.loadAD(self.video_pathAD);
			self.openAD();
		}
		this.loaded=false;
	}
	else if(self._playlist.videos_array[ID].videoType=="youtube" || self.options.videoType=="YouTube")
	{
		self.hideVideoElements();
		self.closeAD();
		self._playlist.videoAdPlayed=false;
		self.preloader.stop().animate({opacity:0},0,function(){$(this).hide()});
		self._playlist.ytWrapper.css({zIndex:501});
		self._playlist.ytWrapper.css({visibility:"visible"});
		self.removeHTML5elements();
		self._playlist.vimeoWrapper.css({zIndex:0});
		$('iframe#vimeo_video').attr('src','');
		if(self._playlist.youtubePlayer!= undefined){
			self._playlist.youtubePlayer.setSize(self.element.width(), self.element.height());
			if(self.CLICK_EV=="click")
			{
				self._playlist.youtubePlayer.loadVideoById(self._playlist.videos_array[ID].youtubeID);
			}
			if(self.CLICK_EV=="touchend")
			{
				self.youtubePlayer.cueVideoById(self._playlist.videos_array[ID].youtubeID);
			}
		}
		self.resizeAll();
	}
	else if(self._playlist.videos_array[ID].videoType=="vimeo" || self.options.videoType=="Vimeo")
	{
		self.hideVideoElements();
		self.closeAD();
		self._playlist.videoAdPlayed=false;

		self._playlist.vimeoWrapper.css({zIndex:501});

		if(self.CLICK_EV=="click")
			document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self._playlist.videos_array[ID].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+self.options.vimeoColor;
		else if(self.CLICK_EV=="touchend")
			document.getElementById("vimeo_video").src ="http://player.vimeo.com/video/"+self._playlist.videos_array[ID].vimeoID+"?autoplay=1?api=1&player_id=vimeo_video"+"&color="+self.options.vimeoColor;
		$('#vimeo_video').load(function(){
			self.preloader.stop().animate({opacity:0},200,function(){$(this).hide()});
		});
		self.removeHTML5elements();
		self._playlist.ytWrapper.css({zIndex:0});
		self._playlist.ytWrapper.css({visibility:"hidden"});
		if(self._playlist.youtubePlayer!= undefined){
			if(self._playlist.youtubePLAYING){
				(self._playlist.youtubePlayer).stopVideo();
				(self._playlist.youtubePlayer).clearVideo();
			}
		}
		//addVimeoListeners();
	}
};
Video.fn.setupEvents = function()
{
    var self = this;
      this.onpause($.proxy(function()
      {
        this.element.addClass("vp_paused");
        this.element.removeClass("elite_vp_playing");
        this.change("vp_paused");
      }, this));

      this.onplay($.proxy(function()
      {
        this.element.removeClass("vp_paused");
        this.element.addClass("elite_vp_playing");
        this.change("elite_vp_playing");
      }, this));

	$(".elite_vp_videoPlayerAD").bind("ended", function() {
        self.closeAD();
        self._playlist.videoAdPlayed=true;
    });
    $(".elite_vp_videoPlayerAD").bind("loadeddata", function() {
		if(self.options.hideVideoSource)
			self.videoElementAD.empty();
		clearInterval(self.myInterval);
		//self.counter = self._playlist.videos_array[self._playlist.videoid].prerollSkipTimer + 1;
		self.myInterval = setInterval(function () {
			if(self.isPaused && !self.options.allowSkipAd)
			return;
			self.counter=(self._playlist.videos_array[self._playlist.videoid].prerollSkipTimer)-Math.round(self.videoAD.getCurrentTime());
			$(".elite_vp_skipAdCountTitle").text("You can skip this ad in " + self.counter + " s");
			if(self.counter==0 )
			{
				self.toggleSkipAdCount();
				self.skipBoxOn = false;
				self.toggleSkipAdBox();
				clearInterval(self.myInterval);
			}
		}, 1000);
	});
	$(".elite_vp_videoPlayerAD").bind("pause", function() {
		self.isPaused=true;
	});
	$(".elite_vp_videoPlayerAD").bind("play", function() {
		self.isPaused=false;
	});
	$(".elite_vp_videoPlayerAD").bind("timeupdate", function() {
        self.timeLeftInside.text("(-"+self.secondsFormat(self.videoAD.getEndTime() - self.videoAD.getCurrentTime())+")");
        self.progressWidthAD = (self.videoAD.currentTime/self.videoAD.duration )*self.elementAD.width();
        self.progressAD.css("width", self.progressWidthAD);
    });

    this.onended($.proxy(function()
    {
		self.randEnd = Math.floor((Math.random() * (self.options.videos).length) + 0);

        if(this.options.playlist=="Right playlist" || this.options.playlist=="Bottom playlist")
        {
            if(self.preloader)
                self.preloader.stop().animate({opacity:1},0,function(){$(this).show()});

            //increase video id for 1
            this._playlist.videoid = parseInt(this._playlist.videoid)+1;//increase video id
            if (this._playlist.videos_array.length == this._playlist.videoid){
                this._playlist.videoid = 0;
            }

            //play next on finish check
            if(self.options.onFinish=="Play next video")
            {
                self._playlist.videoAdPlayed=false;

                if(self._playlist.videos_array[self._playlist.videoid].videoType=="HTML5" || self.options.videoType=="HTML5 (self-hosted)")
                {
                    //play next on finish
                    if(self.shuffleBtnEnabled){
                        if(this.myVideo.canPlayType && this.myVideo.canPlayType('video/mp4').replace(/no/, ''))
                        {
                            this.canPlay = true;
                            this.video_path = self._playlist.videos_array[self.randEnd].video_path_mp4;
                            this.video_pathAD = self._playlist.videos_array[self.randEnd].preroll_mp4;
                        }
                        this.load(self.video_path);
                        this.play();

                        if(self._playlist.videos_array[self.randEnd].prerollAD=="yes")
                        {
                            self.pause();
                            self.loadAD(self.video_pathAD);
                            self.openAD();
                        }
                        $(self.element).find(".elite_vp_infoTitle").html(self._playlist.videos_array[self.randEnd].title);
                        $(self.element).find(".elite_vp_infoText").html(self._playlist.videos_array[self.randEnd].info_text);
                        $(self.element).find(".elite_vp_nowPlayingText").html(self._playlist.videos_array[self.randEnd].title);
						
                        this.loaded=false;
                    }
                    else{
                        if(this.myVideo.canPlayType && this.myVideo.canPlayType('video/mp4').replace(/no/, ''))
                        {
                            this.canPlay = true;
                            this.video_path = self._playlist.videos_array[self._playlist.videoid].video_path_mp4;
                            this.video_pathAD = self._playlist.videos_array[self._playlist.videoid].preroll_mp4;
                        }

                        this.load(self.video_path);
                        this.play();

                        if(self._playlist.videos_array[self._playlist.videoid].prerollAD=="yes")
                        {
                            self.pause();
                            self.loadAD(self.video_pathAD);
                            self.openAD();
                        }

                        $(self.element).find(".elite_vp_infoTitle").html(self._playlist.videos_array[self._playlist.videoid].title);
                        $(self.element).find(".elite_vp_infoText").html(self._playlist.videos_array[self._playlist.videoid].info_text);
                        $(self.element).find(".elite_vp_nowPlayingText").html(self._playlist.videos_array[self._playlist.videoid].title);
						
                        this.loaded=false;
                    }

                }
                else if(self._playlist.videos_array[self._playlist.videoid].videoType=="youtube" || self.options.videoType=="YouTube")
                {
                    if(self.shuffleBtnEnabled)
                        this._playlist.playYoutube(this.randEnd);
                    else
                        this._playlist.playYoutube(this._playlist.videoid);
                    this.removeHTML5elements();
                }
                else if(self._playlist.videos_array[self._playlist.videoid].videoType=="vimeo" || self.options.videoType=="Vimeo")
                {
                    if(self.shuffleBtnEnabled){
                        this._playlist.playVimeo(this._playlist.randEnd);
                    }
                    else{
                        this._playlist.playVimeo(this.videoid);
                    }
                    this.removeHTML5elements();
                }
                switch(self.options.playlist){
                    case "Right playlist":
                        if(self.shuffleBtnEnabled)
							self.setPlaylistItem(self.randEnd);
                        else
							self.setPlaylistItem(self._playlist.videoid);
						break;
                    case "Bottom playlist":
                        $(self.mainContainer).find(".elite_vp_itemSelected_bottom").removeClass("elite_vp_itemSelected_bottom").addClass("elite_vp_itemUnselected_bottom");//unselect all
                        if(self.shuffleBtnEnabled)
                            $(self._playlist.item_array[self.randEnd]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");
                        else
                            $(self._playlist.item_array[self._playlist.videoid]).removeClass("elite_vp_itemUnselected_bottom").addClass("elite_vp_itemSelected_bottom");
                        break;
                }

            }
            else if(self.options.onFinish=="Restart video")
            {
                this.resetPlayer();
                this.seek(0);
                this.play();
                this.preloader.hide();
            }
            else if(self.options.onFinish=="Stop video")
            {
                this.pause();
                this.preloader.hide();
            }
        }
        //if no playlist
        else
        {
			if(self.options.onFinish=="Restart video")
            {
                this.resetPlayer();
                this.seek(0);
                this.play();
                this.preloader.hide();
            }
            else if(self.options.onFinish=="Stop video")
            {
                this.pause();
                this.preloader.hide();
            }
        }
    }, this));

    this.oncanplay($.proxy(function(){
        this.canPlay = true;
        this.controls.removeClass("elite_vp_disabled");
    }, this));

	this.mainContainer.parent().hover(function(e){
		
	});
	
	this.mainContainer.parent().hover(function(){
		$(document).keydown($.proxy(function(e)
		{
			if (e.keyCode == 32)
			{
				// Space
				self.togglePlay();
				return false;
			}

			if (e.keyCode == 27 && this.inFullScreen)
			{
				//escape
				self.fullScreen(!this.inFullScreen);
			}
		}, this));
    },function(){
		$(document).unbind('keydown');
    });
};
window.Video = Video;
})(jQuery);