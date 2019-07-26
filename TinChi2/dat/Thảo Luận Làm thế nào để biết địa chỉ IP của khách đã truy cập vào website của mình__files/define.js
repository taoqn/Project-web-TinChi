if(typeof uniAd=="undefined")
{
	var uniAd={};
}
//--isDebug
uniAd.isDebug=function(){
	return window.location.href.indexOf('#uniAd.debug')!=-1;
}
uniAd.debugLog=function(message)
{
	if(uniAd.isDebug())
		console.log(message);
}
uniAd.debugWarn=function(message)
{
	if(uniAd.isDebug())
		console.warn(message);
}
uniAd.writtenIframes=[];
uniAd.iframeNoAdCallback=function(data_ifid){
	console.log("uniAd: data-ifid="+data_ifid+" không có quảng cáo");
}
uniAd.writeIframe=function(iframeObj,bodyCode,headCode,callbackName){
	if(typeof iframeObj!="object")
		return false;
	if(typeof bodyCode!="string")
		return false;
	if(jQuery(iframeObj).length<=0)
		return false;
	if(typeof headCode!="string")
		var headCode="";
	if(typeof callbackName!="string")
		var callbackName="uniAd.iframeNoAdCallback";
	var _iframeId="uniad-iframe-"+Math.ceil(Math.random()*10000);
	var _headCode='<script type="text/javascript">\
	<!--\n\
	var flagLoaded=false;\
	function loadComplete(byTimer){\
		if(flagLoaded)\
			return false;\
		if(typeof byTimer!="undefined" && byTimer)\
			console.log("loadComplete is starting by byTimer...!");\
		else\
			console.log("loadComplete is starting...!");\
		setTimeout(function(){\
			try{\
				var pjQuery=window.parent.jQuery;\
				var bodyHeight=document.body.offsetHeight;\
				if(bodyHeight>=50){\
					pjQuery("iframe[data-ifid='+_iframeId+']").slideDown("fast");\
					pjQuery("iframe[data-ifid='+_iframeId+']").attr("data-ad","true");\
					console.log("Ad on iframe '+_iframeId+' has been display!");\
				}\
				else\
				{\
					pjQuery("iframe[data-ifid='+_iframeId+']").attr("data-ad","false");\
					try{window.parent.'+callbackName+'("'+_iframeId+'");}catch(err){console.error("Error on No Ad callback: "+err.message);}\
					console.log("No Ad to display on iframe '+_iframeId+'; height="+bodyHeight);\
				}\
			}catch(err){\
				console.error("Error on load complete '+_iframeId+' : "+err.message)\
			}\
			flagLoaded=true;\
		},300);\
	}\
	setTimeout("loadComplete(1)",5000);\
	window.addEventListener("load", function load(event){\
		loadComplete()\
	},false);\
	\n-->\
	</script>';
	var ifrm=jQuery(iframeObj)[0];
	jQuery(ifrm).attr('data-ifid',_iframeId);
	
	//jQuery(ifrm).css('display','none');
	ifrm=(ifrm.contentWindow)?ifrm.contentWindow:(ifrm.contentDocument.document)?ifrm.contentDocument.document:ifrm.contentDocument;
	ifrm.document.open();
	ifrm.document.write('<!DOCTYPE html><html><head>'+_headCode+headCode+'</head><body onload="loadComplete();" style="margin:0;padding:0;overflow:hidden;">');
	ifrm.document.write(bodyCode);
	ifrm.document.write('</body></html>');
	ifrm.document.close();
	uniAd.writtenIframes.push({'ifid':_iframeId,'headCode':headCode,'bodyCode':bodyCode});
}
//--Impression Tracking
uniAd.impression={
	'storage':[],
	'delayUrls':[],
	'getTrueId':function(zoneId){
		if(typeof zoneId!="number" && typeof zoneId!="string")
			return 0;
		zoneId=parseInt(zoneId);
		if(isNaN(zoneId))
			return 0;
		return zoneId;
	},
	'push':function(zoneId,zoneType,url){
		var zoneId=uniAd.impression.getTrueId(zoneId);
		if(!zoneId)
			return false;
		uniAd.impression.storage.push({'zoneId':zoneId,'zoneType':zoneType,'url':url});
		return true;
	},
	'getUrlZoneId':function(zoneId,del){
		var zoneId=uniAd.impression.getTrueId(zoneId);
		if(!zoneId)
			return false;
		for(var i=0;i<uniAd.impression.storage.length;i++)
		{
			if(uniAd.impression.storage[i].zoneId==zoneId)
			{
				var url=uniAd.impression.storage[i].url;
				if(typeof del!="undefined" && del)
					uniAd.impression.storage[i].url='';
				return url;
			}
		}
		return '';
	},
	'getUrlZoneType':function(zoneType,del){
		for(var i=0;i<uniAd.impression.storage.length;i++)
		{
			if(uniAd.impression.storage[i].zoneType==zoneType)
			{
				var url=uniAd.impression.storage[i].url;
				if(typeof del!="undefined" && del)
					uniAd.impression.storage[i].url='';
				return url;
			}
		}
		return '';
	},
	'track':function(zoneId){
		var zoneId=uniAd.impression.getTrueId(zoneId);
		if(!zoneId)
			return false;
		var url=uniAd.impression.getUrlZoneId(zoneId,false);
		if(url=='')
			return false;
		jQuery("body").append('<img src="'+url+'" class="uniad-impression" style="width:0;height:0;visibility: hidden;position:absolute;top:-500px;left:-500px;" />');
		uniAd.debugLog("uniAd: impression Tracking By ZoneId => zoneId="+zoneId+", url="+url);
		return true;
	},
	'trackByType':function(zoneType){
		if(typeof zoneType!="string")
			return false;
		var url=uniAd.impression.getUrlZoneType(zoneType,false);
		if(url=='')
			return false;
		jQuery("body").append('<img src="'+url+'" class="uniad-impression" style="width:0;height:0;visibility: hidden;position:absolute;top:-500px;left:-500px;" />');
		uniAd.debugLog("uniAd: impression Tracking By ZoneType => zoneType="+zoneType+", url="+url);
		return true;
	},
	'delayTrack':function(zoneId){
		var zoneId=uniAd.impression.getTrueId(zoneId);
		if(!zoneId)
		{
			uniAd.debugWarn("uniAd-delayTrack: Đã hủy vì zoneId không hợp lệ zoneId=>");
			uniAd.debugWarn(zoneId);
			return false;
		}
		var url=uniAd.impression.getUrlZoneId(zoneId,true);
		if(url=='')
		{
			uniAd.debugWarn("uniAd-delayTrack: Đã hủy vì không lấy đc TrackingUrl,zoneId="+zoneId);
			return false;
		}
		uniAd.impression.delayUrls.push(url);
		uniAd.debugLog("uniAd: impression delay Tracking By ZoneId => ZoneId="+zoneId+", url="+url);
		return true;
	},
	'sendDelayTrack':function(){
		for(var i=0;i<uniAd.impression.delayUrls.length;i++)
		{
			var delayImpSrc=uniAd.impression.delayUrls[i];
			jQuery("body").append('<img src="'+delayImpSrc+'" class="uniad-impression" style="width:0;height:0;visibility: hidden;position:absolute;top:-500px;left:-500px;" />');
			uniAd.debugLog("uniAd: impression delayTrack Sent => "+delayImpSrc);
		}
	}
};
//--Get ZoneType
uniAd.getZoneType=function(zoneId)
{
	if(typeof zoneId!='number' && typeof zoneId!='string')
	{
		uniAd.debugWarn("uniAd-getZoneType: ZoneId không hợp lệ=>");
		uniAd.debugWarn(zoneId);
		return '';
	}
	if(typeof uniAd.bodyCodes['zone'+zoneId]=="object")
	{
		return uniAd.bodyCodes['zone'+zoneId].zoneType;
	}
	return '';
}
//--Display AdZone
uniAd.displayZone=function(zoneId)
{
	try{
		
		if(typeof zoneId!='number')
			return false;
		
		/*
		
		//--Kiểm tra phim có cảnh nóng không
		var tags=['cảnh+nóng','tình+dục','cô+giáo+thảo'];
		var currentUrl=decodeURIComponent(window.location.href);
		
		for(var i=0;i<tags.length;i++)
		{
			if(currentUrl.indexOf(tags[i])!=-1)
			{
				console.warn(zoneId+': Phim có cảnh nóng từ Url!');
				return false;
			}
			if(jQuery('ul.tag-list').find('a[href="tags/'+tags[i]+'/"]').length>0)
			{
				console.warn(zoneId+': Phim có cảnh nóng từ Tag!');
				return false;
			}
		}
		
		*/
		
		if(typeof uniAd.bodyCodes['zone'+zoneId]=="object")
		{
			var htmlCode=uniAd.bodyCodes['zone'+zoneId].code;
			var userAgent=window.navigator.userAgent.toLowerCase();
			var zoneType=uniAd.getZoneType(zoneId);
			
			if(userAgent.indexOf('smarttv')!=-1 || userAgent.indexOf('smart-tv')!=-1)
			{
				uniAd.debugWarn("uniAd: Quảng cáo không hiện vì phát hiện SmartTV");
				return false;
			}
			if(typeof device!="undefined" && (device.mobile() || device.tablet()) && htmlCode.indexOf('mobile')==-1)
			{
				uniAd.debugWarn("uniAd: Quảng cáo không hiện vì phát hiện mobile hoặc tablet");
				return false;
			}
			else if(typeof device!="undefined" && !device.mobile() && !device.tablet() && zoneType.indexOf('mobile')!=-1)
			{
				uniAd.debugWarn("uniAd: Quảng cáo không hiện vì phát hiện code quảng cáo mobile chạy trên PC");
				return false;
			}
			

			if(zoneType=="preload" && typeof UNIAD_DISABLE_PRELOAD!="undefined" && UNIAD_DISABLE_PRELOAD)
			{
				uniAd.debugWarn("uniAd: Vị trí preload bị vô hiệu hóa do cờ hiệu UNIAD_DISABLE_PRELOAD");
				return false
			}
			
			if((zoneType=="floatleft" || zoneType=="floatright") && typeof UNIAD_DISABLE_FLOATING!="undefined" && UNIAD_DISABLE_FLOATING)
			{
				uniAd.debugWarn("uniAd: Vị trí "+zoneType+" bị vô hiệu hóa do cờ hiệu UNIAD_DISABLE_FLOATING");
				return false
			}
			
			if(zoneType=="floatleft" && typeof UNIAD_DISABLE_FLOATLEFT!="undefined" && UNIAD_DISABLE_FLOATLEFT)
			{
				uniAd.debugWarn("uniAd: Vị trí floatleft bị vô hiệu hóa do cờ hiệu UNIAD_DISABLE_FLOATING");
				return false
			}
			
			if(zoneType=="floatright" && typeof UNIAD_DISABLE_FLOATRIGHT!="undefined" && UNIAD_DISABLE_FLOATRIGHT)
			{
				uniAd.debugWarn("uniAd: Vị trí floatright bị vô hiệu hóa do cờ hiệu UNIAD_DISABLE_FLOATRIGHT");
				return false
			}
			
			if(zoneType=="balloon" && typeof UNIAD_DISABLE_BALLOON!="undefined" && UNIAD_DISABLE_BALLOON)
			{
				uniAd.debugWarn("uniAd: Vị trí balloon bị vô hiệu hóa do cờ hiệu UNIAD_DISABLE_BALLOON");
				return false
			}
			
			document.write(htmlCode);
			
			if(zoneType!="preload" && zoneType!="preplay")
			{
				uniAd.impression.delayTrack(zoneId);
				uniAd.debugLog("uniAd: Đã delayTrack zoneId: "+zoneId);
			}
			else
			{
				uniAd.debugWarn("uniAd: Không delayTrack zoneId: "+zoneId);
			}
			uniAd.debugLog("uniAd: Đã hiển thị zoneId: "+zoneId);
			uniAd.debugLog(uniAd.bodyCodes['zone'+zoneId]);
		}
		else
		{
			uniAd.debugWarn("Không tìm thấy code của zone: "+zoneId);
		}
	}catch(err){
		console.error(err.message);
		console.log("==>" + err.stack);
	}
}

var UNIAD_DISABLE_PREROLL		=0;
var UNIAD_PREROLL_NOSKIP		=0;
var UNIAD_BALLOON_NOAUTOREMOVE	=0;
var UNIAD_DISABLE_PRELOAD		=0;
var UNIAD_DISABLE_FLOATING		=0;
var UNIAD_DISABLE_FLOATLEFT		=0;
var UNIAD_DISABLE_FLOATRIGHT	=0;
var UNIAD_DISABLE_BALLOON		=0;

jQuery(document).ready(function(){
	//--For float banner
	var floatBannerTimmer=null;
	var contentWidth=(uniAd.website.contentWidth>0)?uniAd.website.contentWidth:1004;
	var topMargin=(uniAd.website.topMargin>0)?uniAd.website.topMargin:0;
	var topFixedMargin=(uniAd.website.topFixedMargin>0)?uniAd.website.topFixedMargin:0;
	var floatLeftSelector='.uniad-zonetype-floatleft';
	var floatRightSelector='.uniad-zonetype-floatright';
	var floatSelector=floatLeftSelector+','+floatRightSelector;
	var floatLeftWidth=jQuery(floatLeftSelector).outerWidth();
	var floatRightWidth=jQuery(floatRightSelector).outerWidth();
	var minWindowWidth=contentWidth;
	var floatLeftWidth=120;
	if(typeof floatLeftWidth=="number")
		minWindowWidth+=floatLeftWidth*2;
	else if(typeof floatRightWidth=="number")
		minWindowWidth+=floatRightWidth*2;
		
	//--End float banner var
	
	
	//--Float banner
	uniAd.floatbanner={};
	uniAd.floatbanner.getPosition=function(){
		var winWidth=jQuery(window).width();
		if(winWidth<minWindowWidth)
			return false;
		var diff=(winWidth-contentWidth)/2;
		var leftPosX=diff-floatLeftWidth;
		return {'leftBanner':{'left':leftPosX},'rightBanner':{'right':leftPosX}};
	}
	
	uniAd.floatbanner.scrollHandle=function()
	{
		var scrollTop=jQuery(document).scrollTop();
		var curPos=jQuery(floatSelector).css('position');
		if(scrollTop>topMargin-topFixedMargin)
		{
			if(curPos!='fixed')
			{
				jQuery(floatSelector).css({'position':'fixed','top':topFixedMargin+'px'})
			}
		}
		else
		{
			if(curPos!='absolute')
			{
				jQuery(floatSelector).css({'position':'absolute','top':topMargin+'px'})
			}
		}
		var position=uniAd.floatbanner.getPosition();
		if(!position)
			return false;
		jQuery(floatLeftSelector).animate({'left':position.leftBanner.left});
		jQuery(floatRightSelector).animate({'right':position.rightBanner.right});
	}
	
	jQuery(window).scroll(function(){
		uniAd.floatbanner.scrollHandle();
	});
	uniAd.floatbanner.scrollHandle();
	
	
	uniAd.floatbanner.resizeHandle=function()
	{
		if(jQuery(window).width()<minWindowWidth)
		{
			jQuery(floatSelector).fadeOut('fast');
		}
		else
		{
			uniAd.floatbanner.scrollHandle();
			jQuery(floatSelector).fadeIn('fast');
		}
	}
	
	
	jQuery(window).resize(function(){
		clearTimeout(floatBannerTimmer);
		floatBannerTimmer=null;
		setTimeout("uniAd.floatbanner.resizeHandle()",100);
	});
	uniAd.floatbanner.resizeHandle();
	
	uniAd.preloadBannerHandle=function()
	{
		if(jQuery('.uniad-zonetype-preload').length>0)
		{
			if(document.cookie.indexOf('uniad_preload')!=-1)
			{
				jQuery('.uniad-zonetype-preload').remove();
				return false;
			}
			if(jQuery('.uniad-zonetype-preload').attr('data-skipsyscode')=='1')
			{
				return false;
			}
			//--Nếu size màn hình nhỏ
			if(typeof window.screen.width=='number' && window.screen.width<1280)
			{
				return false;
			}
			//--Nếu là smartphone có thể xoay
			if(typeof window.orientation != 'undefined')
			{
				return false;
			}
			jQuery('.uniad-zonetype-preload').wrap('<div class="uniad-zonetype-preload-container"/>');
			jQuery('.uniad-zonetype-preload').append('<a class="close" href="javascript:void(0);">Đóng</a>');
			jQuery('.uniad-zonetype-preload > .close').click(function(){
				
				jQuery('.uniad-zonetype-preload-container').fadeOut('fast',function(){
					document.cookie="uniad_preload=1; path=/";
					jQuery(this).remove();
				});
				jQuery('.uniad-zonetype-preload-overlay').fadeOut('fast',function(){
					jQuery(this).remove();
				});
			});

			jQuery('.uniad-zonetype-preload').css('display','block');
			//--Định vị trí
			var boxWidth=jQuery('.uniad-zonetype-preload-container').outerWidth();
			var boxHeight=jQuery('.uniad-zonetype-preload-container').outerHeight();
			var winHeight=jQuery(window).height();
			var marginLeft=Math.ceil(boxWidth/2);
			jQuery('.uniad-zonetype-preload-container').css({'left':'50%','top':((winHeight-boxHeight)/2)+'px','margin-left':'-'+marginLeft+'px'});
			jQuery('body').append('<div class="uniad-zonetype-preload-overlay"/>');;
			jQuery('.uniad-zonetype-preload-container').fadeIn('fast');
			//--Track Impression
			uniAd.impression.trackByType('preload');
		}
	}
	uniAd.preloadBannerHandle();
	
	/*--Balloon banner--*/
	uniAd.balloonBannerHandle=function()
	{
		if(jQuery('.uniad-zonetype-balloon').length==0)
			return false;
		if(jQuery('#uniad-balloon-wrapper').length!=0)
		{
			jQuery('#uniad-balloon-close').click(function(){
				jQuery('#uniad-balloon-wrapper').animate({'bottom':'-1000px'},function(){
					jQuery(this).remove();
				});
				/* jQuery('#uniad-balloon-wrapper').fadeOut('fast',function(){
					jQuery(this).remove();
				}); */
			});
		}
		else
		{
			console.error('Không tìm thấy: #uniad-balloon-wrapper');
		}
	}
	uniAd.balloonBannerHandle();
	
	
	//--Preplayer banner
	var prePlayerSelector='.uniad-zonetype-preplay';
	var playerSelector='.uniad-player';
	uniAd.prePlayer={};
	if(jQuery(prePlayerSelector).length>0)
	{
		if(jQuery(playerSelector).length==0)
		{
			console.error('Không xác định được player: '+playerSelector);
		}
		else
		{
			//--Đóng khung quảng cáo prePlayer
			uniAd.prePlayer.close=function(){
				jQuery('#uniad-preplayer-wrapper').fadeOut('fast',function(){
					jQuery(this).remove();
				});
			}
			//--Tự động đóng khung quảng cáo
			uniAd.prePlayer.autoClose=function(second){
				if(typeof second=='undefined')
				{
					uniAd.prePlayer.close();
					return true;
				}
				var leftTime=parseInt(second)-1;
				if(leftTime<=0)
				{
					uniAd.prePlayer.close();
					return true;
				}
				jQuery('#uniad-preplayer-countdown').html(leftTime);
				setTimeout("uniAd.prePlayer.autoClose("+leftTime+")",1000);
			}
			//--Hiển thị quảng cáo
			var prePlayerHtml='<div id="uniad-preplayer-wrapper">\
					<div class="uniad-preplayer-header">\
						<span id="uniad-preplayer-countdown" class="countdown"></span>\
						Player đang được tải lên....\
						<a id="uniad-preplayer-close" class="close" rel="nofollow" onclick="uniAd.prePlayer.close();return false;">Bỏ qua</a>\
					</div>\
					<div id="uniad-preplayer-content">\
						\
					</div>\
				</div>';
			jQuery(playerSelector).css('position','relative');
			jQuery(playerSelector).prepend(prePlayerHtml);
			var prePlayerAdObject=jQuery(prePlayerSelector)[0];
			jQuery(prePlayerAdObject).prependTo('#uniad-preplayer-content');
			jQuery(prePlayerSelector).css('display','block');
			uniAd.prePlayer.autoClose(15);
			//--Track Impression
			uniAd.impression.trackByType('preplay');
			
		}
	}
	
	//--Preroll banner
	uniAd.preroll=function(playerSelector,vastTag,originalPlayer,skipDelay){
		this._vastTags=[];
		if(typeof playerSelector=="string")
			this.playerSelector=playerSelector;
		else
			this.playerSelector="";
			
		this._vastIndex=0;
		
		if(typeof originalPlayer=="object" && originalPlayer!=null)
			this.originalPlayer=originalPlayer;
		else
			this.originalPlayer=null;
			
		if(typeof UNIAD_PREROLL_NOSKIP!="undefined" && UNIAD_PREROLL_NOSKIP)
			this.skipDelay=-1;
		else if(typeof skipDelay=="number" && skipDelay>=-1)
			this.skipDelay=skipDelay;
		else
			this.skipDelay=0;
		this.volume=100;
		
		window.showPrerollAds=function()
		{
			jQuery('#uniad-preroll-container').css({'width':'100%','height':'100%'});
			jQuery('#uniad-preroll-loading').css('display','none');
			jQuery('.uniad-preroll-loading').css('display','none');
			//jQuery('#uniad-preroll-skip').css('display','block');
			window.prerollObject.originalState="";
			if(window.prerollObject.originalPlayer!=null)
			{
				try{
					var curState=window.prerollObject.originalPlayer.getState();
					if(curState=="PLAYING" || curState=="BUFFERING")
					{
						window.prerollObject.originalState="PLAYING";
						window.prerollObject.originalPlayer.pause(true);
					}
				}catch(err){}
			}
			/*
			if(window.prerollObject.skipDelay!=-1)
				window.prerollObject.countDown();
			*/
			//--GA Tracking
			try{
				if(typeof _gaq=="object" && typeof _gaq.push=="function" && typeof uniAd.usingVast=="string" && uniAd.usingVast!="")
				{
					var domainReg=/\/\/([^\/]+)\//i;
					var execResult=domainReg.exec(uniAd.usingVast);
					
					if(typeof execResult=="object" && execResult!=null && execResult.length==2)
					{
						var trackingLabel=execResult[1];
						var trackingAction='Play Ad';
						var trackingCategory='vast Ad (Flash)';
						 
						_gaq.push(function() {
							var pageTracker = _gat._getTrackerByName(); // Gets the default tracker.
							//var accountId = pageTracker._getAccount();
							pageTracker._trackEvent(trackingCategory,trackingAction,trackingLabel);
							console.log('Flash Preroll: '+trackingCategory+' Play Ad Tracking => '+trackingLabel);
						});
					}
				}
			}catch(err){}
			
			//--Track Impression
			uniAd.impression.trackByType('preplay');
			
			uniAd.debugLog('uniAd-preroll: Đã hiện quảng cáo preroll');
		}
		
		window.hidePrerollAds=function(remove)
		{
			jQuery('#uniad-preroll-loading').css('display','none');
			if(typeof remove!="undefined" || remove || (typeof window.canHidePreroll=="undefined" || !window.canHidePreroll))
			{
				window.prerollObject.destroy();
				uniAd.debugLog('uniAd-preroll: Đã hủy preroll');
				return true;
			}
			jQuery('#uniad-preroll-container').css({'width':'0','height':'0'});
			jQuery('#uniad-preroll-loading').css('display','none');
			jQuery('#uniad-preroll-skip').css('display','none');
			//window.prerollObject.prerollPlayer.setMute(true);
			window.prerollObject.prerollPlayer.setVolume(0.1);
			window.prerollObject.complete();
			if(window.prerollObject.originalState=="PLAYING")
			{
				window.prerollObject.originalPlayer.play(true);
			}
			window.prerollTimer=setTimeout("hidePrerollAds(true)",14000);
			uniAd.debugLog('uniAd-preroll: Đã ẩn preroll');
			return true;
		}
		
		window.onTrackingEvent=function(event) {
			if(event != null){
				if(event.eventType=="start")
					window.canHidePreroll=1;
				if(event.eventType=="start" && (typeof window.prerollObject.startCalled=="undefined" || !window.prerollObject.startCalled))
				{
					showPrerollAds();
					window.prerollObject.startCalled=true;
					
				}
				else if(event.eventType=="complete")
				{
					uniAd.debugLog('uniAd: Preroll play xong !');
					if(window.prerollObject.skipDelay!=-1)
					{
						setTimeout(function(){
							window.prerollObject.destroy();
						},500);
						
					}
				}
		   }
		}
		
		window.onClickTrackingEvent=function(event) {
			console.log('preroll Click');
			/*
			if(event != null) {
				if(window.prerollObject.skipDelay!=-1)
					hidePrerollAds();
			}
			*/
		}
		
		this.buildOptions=function(){
			var vastTag=this.getVastTag();
			if(!vastTag)
			{
				uniAd.debugLog('uniAd Preroll: No vasttag found!');
				return false;
			}
			this.playerOptions={
				'flashplayer': 'http://www.phimmoi.net/player/v1.2/player.swf',
				'width': '100%',
				'height': '100%',
				'allowfullscreen':'true',
				'allowscriptaccess':'always',
				'wmode':'opaque',
				'controlbar':{
					'position': "bottom"
				},
				'dock':'true',
				'dock.position':'left',
				'mute':'false',
				'stretching':'exactfit',
				'autostart': 'true',
				'plugins': {
					'http://www.phimmoi.net/player/v1.2/plugins/ova-jw.swf':{
						"canFireEventAPICalls": true,
						"ads": {
							/*"skipAd": {
								"enabled": "true",
								"html": "<p>Bỏ qua</p>",
								"region": {
										"id": "my-new-skip-ad-button",
										"verticalAlign": 3,
										"horizontalAlign": 3,
										"backgroundColor": "#FF3300",
										"opacity": 0.7,
										"borderRadius": 3,
										"padding": "5 10 5 10",
										"width": 75,
										"height": 30
								}
							},	*/							
							"companions": {
								"regions": [
								{
									"id": "companion",
									"width": 80,
									"height": 300
								}
							  ]
							},
							"schedule": [
								{
									"position": "pre-roll",
									"tag": vastTag
								}
							]
						  },
						  "debug": {
							"levels": 0
							//"levels": "fatal, config, vast_template, http_calls"
						  }
					}
							
				},
				'file':'http://www.phimmoi.net/resource/video/blank.mp4',
				//'logo.file':'logo.png',
				'logo.hide':'false',
				'logo.position':'top-right',
				'logo.link':'http://www.phimmoi.net/',
				'abouttext':'PhimMoi.Net Preroll Ads 1.0',
				'aboutlink':'javascript:alert("Liên hệ quảng cáo trên phimmoi.net: sales@uniad.vn")',
				'skin':'http://www.phimmoi.net/player/v1.2/skins/lightrv5/lightrv5.xml'
			};
			return true;
		}
		 
		this.setVastTag=function(vastTagUrl){
			this.addVastTag(vastTagUrl);
		}
		this.addVastTag=function(vastTagUrl){
			if(typeof vastTagUrl=="string" && vastTagUrl!="")
			{
				this._vastTags.push(vastTagUrl);
				uniAd.debugLog('uniAd Preroll: vastTag added => '+vastTagUrl);
			}
		}
		
		this.addVastTag(vastTag);
		
		this.getVastTag=function(){
			if(this._vastTags.length>this._vastIndex)
			{
				var vastUrl=this._vastTags[this._vastIndex++];
				uniAd.usingVast=vastUrl;
				console.log('uniAd Preroll: using vast => '+vastUrl);
				return vastUrl;
			}
			if(this._vastIndex==0)
				console.error('uniAd Preroll: Không có VastTag để sử dụng');
			return false;
		}
		this.haveNextVast=function(){
			return this._vastTags.length>this._vastIndex;
		}
		this.setPlayer=function(playerObj)
		{
			if(typeof playerObj=="object" && playerObj!=null)
				this.originalPlayer=playerObj;
		}
		this.setCountDown=function(sec){
			if(typeof sec=="number" && sec>=0)
				this.skipDelay=sec;
		}
		this.setDelay=function(sec){
			this.setCountDown(sec);
		}
		this.countDown=function()
		{
			if(this.skipDelay==0)
			{
				this.countDownComplete();
				return false;
			}
			if(typeof this._countDown=="undefined" || this._countDown==this.skipDelay)
			{
				this._countDown=this.skipDelay;
				jQuery('#uniad-preroll-skip').css('display','none');
				jQuery('#uniad-preroll-countdown').css('display','block');
			}
			if(this._countDown==0)
			{
				this.countDownComplete();
				return false;
			}
			jQuery("#uniad-preroll-countdown").html(this._countDown);
			this._countDown--;
			setTimeout("window.prerollObject.countDown()",800);
		}
		this.countDownComplete=function()
		{
			jQuery('#uniad-preroll-countdown').css('display','none');
			jQuery('#uniad-preroll-skip').css('display','block');
		} 
		this.setup=function(noRestart){
			if(typeof UNIAD_DISABLE_PREROLL!="undefined" && UNIAD_DISABLE_PREROLL)
			{
				uniAd.debugWarn('uniAd: Flash Preroll bị disable bởi UNIAD_DISABLE_PREROLL');
				return false;
			}
			if(this.playerSelector=="")
			{
				console.error('Không xác định được selector của player');
				return false;
			}
			
			if(jQuery(this.playerSelector).length==0)
				return false;
			if(typeof noRestart=="undefined" || !noRestart)
				this.restart();
			else
			{
				if(typeof window.prerollTimer!="undefined")
				{
					clearTimeout(window.prerollTimer);
					jQuery('#uniad-preroll-skip').css('display','none');
				}
			}
			this._oldCssPos=jQuery(this.playerSelector).css('position');
			jQuery(this.playerSelector).css({'position': 'relative'});
			if(jQuery('#uniad-preroll-container').length==0)
				jQuery(this.playerSelector).append('<div id="uniad-preroll-container"><div id="uniad-preroll-player"></div></div><div class="uniad-preroll-dark" class="uniad-preroll-loading" id="uniad-preroll-loading">Đang tải quảng cáo ...</div><button id="uniad-preroll-skip" title="Bỏ qua quảng cáo" class="uniad-preroll-dark" style="display:none;">Bỏ qua quảng cáo ►</button><div id="uniad-preroll-countdown" style="display:none;"></div>');
			
			var ok=this.buildOptions();
			if(!ok)
				return false;
			this.prerollPlayer=jwplayer("uniad-preroll-player").setup(this.playerOptions);
			this.prerollPlayer.onPlay(function(event){
				try{
					uniAd.debugLog("uniAd-Preroll: onPlay");
					if(typeof event!="undefined")
						console.log(event);
					
					var currentItem=this.getPlaylistItem(0);
					if(typeof currentItem!="undefined")
						console.log(currentItem);
					
					if(typeof currentItem.ovaAd=="undefined" || currentItem.ovaAd==false) 
					{
						//--Retry
						try{
							if((typeof window.prerollObject.startCalled=="undefined" || !window.prerollObject.startCalled) && window.prerollObject.haveNextVast())
							{
								window.prerollObject.setup(true);
								console.log("uniAd-Preroll: Retry.....");
								return false;
							}
							else
							{
								console.log("uniAd-Preroll: No Retry. Stop here!");
								console.log(window.prerollObject);
							}
						}
						catch(err)
						{
							console.error('uniAd Preroll: Err on retry'+err.message);
						}
						
						if(window.prerollObject.skipDelay!=-1)
							hidePrerollAds();
						else
						{
							window.prerollObject.destroy();
							window.prerollObject.originalPlayer.play(true);
						}
						
					}
					else if(typeof currentItem.ovaAd!="undefined" && currentItem.ovaAd) 
					{
						
						try{
							console.log('Ova play media không phải main video');
							if(
								(typeof window.prerollObject.startCalled=="undefined" || !window.prerollObject.startCalled) && 
								(typeof currentItem.duration=="number" && currentItem.duration.toFixed(1).toString()=="2.6") &&
								(typeof currentItem.file=="string" && currentItem.file=="http://lp.longtailvideo.com/5/ova/blank.mp4") &&
								(typeof currentItem.ovaInteractive!="undefined" && currentItem.ovaInteractive)
							)
							{
								setTimeout(function(){
									showPrerollAds();
									if(window.prerollObject.skipDelay!=-1)
										window.prerollObject.countDown();
								},2000);
								console.warn('showPrerollAds sau 2s nữa');
							}
							else
							{
								setTimeout(function(){
									showPrerollAds();
									if(window.prerollObject.skipDelay!=-1)
										window.prerollObject.countDown();
								},1000);
								console.warn('showPrerollAds sau 1s nữa');
								if(typeof currentItem.duration=="number" && currentItem.duration>5)
								{
									window.canHidePreroll=true;
								}
							}
						}
						catch(err){}
					}

					
					
					this.setVolume(window.prerollObject.volume);
				}catch(err){
					uniAd.debugLog("uniAd-Preroll: onPlay Error !");
					uniAd.debugLog(err.message);
					uniAd.debugLog(err.stack);
				}
			});
			window.prerollObject=this;
			jQuery('#uniad-preroll-skip').click(function(){
				window.hidePrerollAds();
			});
			//--GA Tracking for Request Ad
			try{
				if(typeof _gaq=="object" && typeof _gaq.push=="function" && typeof uniAd.usingVast=="string" && uniAd.usingVast!="")
				{
					var domainReg=/\/\/([^\/]+)\//i;
					var execResult=domainReg.exec(uniAd.usingVast);
					
					if(typeof execResult=="object" && execResult!=null && execResult.length==2)
					{
						var trackingLabel=execResult[1];
						var trackingAction='Request Ad';
						var trackingCategory='vast Ad (Flash)';
						
						_gaq.push(function() {
							var pageTracker = _gat._getTrackerByName(); // Gets the default tracker.
							//var accountId = pageTracker._getAccount();
							pageTracker._trackEvent(trackingCategory,trackingAction,trackingLabel);
							console.log('Flash Preroll: '+trackingCategory+' Request Ad Tracking => '+trackingLabel);
						});
					}
				}
			}catch(err){}
		}
		
		this.setVolume=function(percent){
			try{
				if(typeof percent!="number" || percent<0 || percent>100)
				{
					uniAd.debugLog("uniAdPreroll: setVolume=>percent phải là số từ 0->100");
					return false;
				}
				this.volume=percent;
				this.prerollPlayer.setVolume(percent);
			}catch(err){
				uniAd.debugLog(err.message);
				uniAd.debugLog(err.stack);
			}
		}
		
		this.reset=function(){
			this.startCalled=false;
			this._countDown=this.skipDelay;
			this._oldCssPos='';
			this._completed=false;
			this._vastIndex=0;
		}
		
		this.destroy=function(){
			try{
				window.prerollObject.prerollPlayer.pause(true);
				window.prerollObject.prerollPlayer.setVolume(100);
			}catch(err){
				uniAd.debugLog('uniAd-Preroll: destroy=>reset Volume Error !');
				uniAd.debugLog(err.message);
				uniAd.debugLog(err.stack);
			}
			jQuery('#uniad-preroll-container').remove();
			jQuery('#uniad-preroll-loading').remove();
			jQuery('#uniad-preroll-skip').remove();
			jQuery('#uniad-preroll-countdown').remove();
			clearTimeout(window.prerollTimer);
			this.complete();
			this.reset();
			uniAd.debugLog('Đã hủy preroll');
		}
		this.restart=function(){
			if(jQuery('#uniad-preroll-container').length>0)
			{
				this.destroy();
				uniAd.debugLog("uniAd: Preroll Restarted !");
			}
		}
		this.complete=function(){
			if(typeof this._completed!="undefined" && this._completed)
				return false;
			
			jQuery(this.playerSelector).css({'position': this._oldCssPos});
			if(typeof window.onUniAdPrerollComplete=="function")
				window.onUniAdPrerollComplete();
			this._completed=true;
		}
	}
});

//--Send Delay Track Impression
jQuery(document).ready(function(){
	uniAd.impression.sendDelayTrack();
});

//--Reject Ad
var _rejectAds=['Ambient_LienheQuangCao'];
var _0x661a=["\x77\x72\x69\x74\x65\x4F\x76\x65\x72\x72\x69\x64\x65\x64","\x6F\x72\x67\x57\x72\x69\x74\x65","\x77\x72\x69\x74\x65","\x61\x62\x64\x5F\x73\x6B\x69\x70","\x69\x6E\x64\x65\x78\x4F\x66","\x76\x61\x72\x20\x61\x62\x64\x5F\x73\x6B\x69\x70\x3D\x30\x3B","\x72\x65\x70\x6C\x61\x63\x65","\x6F\x62\x6A\x65\x63\x74","\x75\x6E\x69\x41\x64\x3A\x20\x52\x65\x6A\x65\x63\x74\x20\x41\x64\x73\x20\x61\x72\x72\x61\x79\x20\x6E\x6F\x74\x20\x66\x6F\x75\x6E\x64\x20\x21","\x77\x61\x72\x6E","\x6C\x65\x6E\x67\x74\x68","\x75\x6E\x64\x65\x66\x69\x6E\x65\x64","\x72\x65\x6A\x65\x63\x74\x65\x64","\x70\x75\x73\x68","\x75\x6E\x69\x41\x64\x3A\x20\x57\x72\x69\x74\x69\x6E\x67\x20\x53\x74\x72\x69\x6E\x67\x20\x52\x65\x6A\x65\x63\x74\x65\x64\x20\x21","\x75\x6E\x69\x41\x64\x3A\x20\x4F\x76\x65\x72\x72\x69\x64\x65\x20\x77\x72\x69\x74\x65\x20\x66\x75\x6E\x63\x74\x69\x6F\x6E\x20\x65\x72\x72\x6F\x72\x20\x21","\x65\x72\x72\x6F\x72"];var _0xe696=[_0x661a[0],_0x661a[1],_0x661a[2],_0x661a[3],_0x661a[4],_0x661a[5],_0x661a[6],_0x661a[7],_0x661a[8],_0x661a[9],_0x661a[10],_0x661a[11],_0x661a[12],_0x661a[13],_0x661a[14],_0x661a[15],_0x661a[16]];var _0x9483=[_0xe696[0],_0xe696[1],_0xe696[2],_0xe696[3],_0xe696[4],_0xe696[5],_0xe696[6],_0xe696[7],_0xe696[8],_0xe696[9],_0xe696[10],_0xe696[11],_0xe696[12],_0xe696[13],_0xe696[14],_0xe696[15],_0xe696[16]];try{document[_0x9483[0]]=1;document[_0x9483[1]]=document[_0x9483[2]];document[_0x9483[2]]=function (_0xb528x3){try{if(_0xb528x3[_0x9483[4]](_0x9483[3])!=-1){_0xb528x3[_0x9483[6]](/var abd_skip=[0-9]+;/i,_0x9483[5]);} ;} catch(err){} ;if( typeof _rejectAds!=_0x9483[7]){console[_0x9483[9]](_0x9483[8]);document[_0x9483[1]](_0xb528x3);} else {var _0xb528x4=0;for(var _0xb528x5=0;_0xb528x5<_rejectAds[_0x9483[10]];_0xb528x5++){if(_0xb528x3[_0x9483[4]](_rejectAds[_0xb528x5])!=-1){_0xb528x4=1;break ;} ;} ;if(!_0xb528x4){document[_0x9483[1]](_0xb528x3);} else {if( typeof uniAd!=_0x9483[11]){if( typeof uniAd[_0x9483[12]]==_0x9483[11]){uniAd[_0x9483[12]]=[];} ;uniAd[_0x9483[12]][_0x9483[13]](_0xb528x3);} ;console[_0x9483[9]](_0x9483[14]);} ;} ;} ;} catch(err){console[_0x9483[16]](_0x9483[15]);} ;

//--Change Skip
var _0x9a86=["\x6F\x72\x67\x57\x72\x69\x74\x65\x31","\x77\x72\x69\x74\x65","\x61\x62\x64\x5F\x73\x6B\x69\x70","\x69\x6E\x64\x65\x78\x4F\x66","\x65\x78\x65\x63","\x76\x61\x72\x20\x61\x62\x64\x5F\x73\x6B\x69\x70\x3D\x30\x3B","\x72\x65\x70\x6C\x61\x63\x65"];document[_0x9a86[0]]=document[_0x9a86[1]];document[_0x9a86[1]]=function (_0x1044x1){if(_0x1044x1[_0x9a86[3]](_0x9a86[2])!=-1){var _0x1044x2=/var\s+(abd_skip)\s*=\s*([0-9]+)\s*;/i;var _0x1044x3=_0x1044x2[_0x9a86[4]](_0x1044x1);if(_0x1044x3){_0x1044x1=_0x1044x1[_0x9a86[6]](_0x1044x2,_0x9a86[5]);} ;} ;document[_0x9a86[0]](_0x1044x1);} ;

//--Remove balloon
var removeBalloon=null;
var balloonSelector='*[id^=AbdPopup],#AbdOverlay,#AbdPopupAd,#divPopupAd,#eyeDiv';//#uniad-balloon-wrapper,
jQuery(document).ready(function(){
	removeBalloon=function(){
		jQuery(balloonSelector).fadeOut('fast',function(){
			if(jQuery(this).attr('id')!='divPopupAd')
				jQuery(this).remove();
			
			if(jQuery(this).attr('id')=='AbdPopupAd' && jQuery('#eyeDiv').length>0)
			{
				jQuery('#eyeDiv').fadeOut('fast',function(){
					jQuery(this).remove();
				});
			}
			
			if(jQuery(this).attr('id')!='divPopupAd')
				jQuery(this).remove();
			console.log('Balloon removed !');
		});
	}
	
	if(typeof UNIAD_BALLOON_NOAUTOREMOVE=="undefined" || !UNIAD_BALLOON_NOAUTOREMOVE)
	{
		setTimeout(removeBalloon,120000);
		jQuery('#AbdOverlay').mousedown(function(e){
			removeBalloon();
		});
	}
});

//--remove Float
var removeFloating=null;
jQuery(document).ready(function(){
	removeFloating=function(){
		var selector='.uniad-zonetype-floatright,.uniad-zonetype-floatleft';
		jQuery(selector).fadeOut('fast',function(){
			jQuery(this).remove();
			console.log('Floating removed !');
		});
	}
	setTimeout(removeFloating,60000);
});

//--Only visible on play
//-- CSS
var _0xcac2=["\x3C\x73\x74\x79\x6C\x65\x20\x74\x79\x70\x65\x3D\x22\x74\x65\x78\x74\x2F\x63\x73\x73\x22\x3E\x0D\x3C\x21\x2D\x2D\x0D\x23\x64\x69\x76\x53\x74\x61\x72\x2C\x23\x64\x69\x76\x4F\x76\x65\x72\x6C\x61\x79\x7B\x76\x69\x73\x69\x62\x69\x6C\x69\x74\x79\x3A\x68\x69\x64\x64\x65\x6E\x3B\x7D\x0D\x23\x64\x69\x76\x53\x74\x61\x72\x7B\x62\x6F\x78\x2D\x73\x69\x7A\x69\x6E\x67\x3A\x20\x63\x6F\x6E\x74\x65\x6E\x74\x2D\x62\x6F\x78\x3B\x7D\x0D\x2D\x2D\x3E\x0D\x3C\x2F\x73\x74\x79\x6C\x65\x3E","\x77\x72\x69\x74\x65"];document[_0xcac2[1]](_0xcac2[0]);
//-- JS
var _0x591e=["\x6C\x6F\x61\x64","\x3C\x73\x74\x79\x6C\x65\x20\x74\x79\x70\x65\x3D\x22\x74\x65\x78\x74\x2F\x63\x73\x73\x22\x3E\x0D\x09\x3C\x21\x2D\x2D\x0D\x09\x23\x64\x69\x76\x53\x74\x61\x72\x2C\x23\x64\x69\x76\x4F\x76\x65\x72\x6C\x61\x79\x7B\x76\x69\x73\x69\x62\x69\x6C\x69\x74\x79\x3A\x68\x69\x64\x64\x65\x6E\x3B\x7D\x0D\x09\x23\x64\x69\x76\x53\x74\x61\x72\x7B\x62\x6F\x78\x2D\x73\x69\x7A\x69\x6E\x67\x3A\x20\x63\x6F\x6E\x74\x65\x6E\x74\x2D\x62\x6F\x78\x3B\x7D\x0D\x09\x2D\x2D\x3E\x0D\x09\x3C\x2F\x73\x74\x79\x6C\x65\x3E","\x61\x70\x70\x65\x6E\x64","\x68\x65\x61\x64","\x72\x65\x61\x64\x79","\x23\x30\x33\x31\x31\x31\x34\x3A\x20\x50\x61\x67\x65\x20\x4C\x6F\x61\x64\x65\x64\x20\x62\x75\x74\x20\x4E\x6F\x74\x20\x66\x6F\x75\x6E\x64\x20\x21","\x6C\x6F\x67","\x6C\x65\x6E\x67\x74\x68","\x23\x64\x69\x76\x53\x74\x61\x72\x2C\x23\x64\x69\x76\x4F\x76\x65\x72\x6C\x61\x79","\x76\x69\x64\x65\x6F\x23\x76\x69\x64\x74\x61\x67\x5F\x68\x74\x6D\x6C\x35\x5F\x61\x70\x69","\x23\x30\x33\x31\x31\x31\x34\x3A\x20\x56\x69\x64\x65\x6F\x20\x66\x6F\x75\x6E\x64\x2E","\x6F\x6E\x70\x6C\x61\x79\x69\x6E\x67\x31","\x6F\x6E\x70\x6C\x61\x79\x69\x6E\x67","\x61\x62\x53\x68\x6F\x77\x41\x64\x28\x29","\x66\x75\x6E\x63\x74\x69\x6F\x6E","\x23\x30\x33\x31\x31\x31\x34\x3A\x20\x4E\x6F\x74\x20\x66\x6F\x75\x6E\x64\x20\x76\x69\x64\x65\x6F\x20\x21","\x61\x62\x44\x65\x74\x65\x63\x74\x28\x29","\x64\x69\x73\x70\x6C\x61\x79","\x63\x73\x73","\x23\x64\x69\x76\x53\x74\x61\x72","\x6E\x6F\x6E\x65","\x76\x69\x73\x69\x62\x6C\x65","\x73\x6C\x6F\x77","\x66\x61\x64\x65\x49\x6E","\x23\x30\x33\x31\x31\x31\x34\x3A\x20\x53\x68\x6F\x77\x20\x41\x64\x20\x21"];var abPrerollDetected=0;var abPageLoaded=0;var abShowAdCalled=0;jQuery(window)[_0x591e[0]](function (){abPageLoaded=1;} );jQuery(document)[_0x591e[4]](function (){jQuery(_0x591e[3])[_0x591e[2]](_0x591e[1]);} );function abDetect(){if(abPageLoaded){console[_0x591e[6]](_0x591e[5]);return false;} ;if(jQuery(_0x591e[8])[_0x591e[7]]>0){if(jQuery(_0x591e[9])[_0x591e[7]]>0){var _0x8657x5=jQuery(_0x591e[9])[0];console[_0x591e[6]](_0x591e[10]);_0x8657x5[_0x591e[11]]=_0x8657x5[_0x591e[12]];_0x8657x5[_0x591e[12]]=function (){setTimeout(_0x591e[13],1000);if( typeof _0x8657x5[_0x591e[11]]==_0x591e[14]){this[_0x591e[11]]();} ;} ;return true;} else {console[_0x591e[6]](_0x591e[15]);return false;} ;} else {setTimeout(_0x591e[16],100);} ;} ;function abShowAd(){if(abShowAdCalled){return false;} ;var _0x8657x7=jQuery(_0x591e[19])[_0x591e[18]](_0x591e[17]);if(_0x8657x7!=_0x591e[20]){jQuery(_0x591e[8])[_0x591e[18]]({"\x64\x69\x73\x70\x6C\x61\x79":_0x591e[20],"\x76\x69\x73\x69\x62\x69\x6C\x69\x74\x79":_0x591e[21]});jQuery(_0x591e[8])[_0x591e[23]](_0x591e[22]);} ;abShowAdCalled=1;console[_0x591e[6]](_0x591e[24]);} ;abDetect();