
function trackingAbdInteraction_html5(name, target){
	try{
		var abdFn = "trackingAbdInteraction"+ abd_banner_id;
		window[abdFn](name,target);
	}catch(e){log('media_'+abdFn+'('+ name + ',' + target +'):::'+e.message);}
		
}
function trackingAbdVideoMetrics_html5(duration,value){
	try{
		var abdFn = "trackingAbdVideoMetrics"+ abd_banner_id;
		window[abdFn](duration,value);
	}catch(e){log('media_'+abdFn+'('+ duration + ',' + value +'):::'+e.message);}
	
}
function trackingClickserving()
{
	try{
		var abdFn = "trackingAbdClick"+ abd_banner_id;
		window[abdFn]();	
		log('media_'+abdFn+':::');
	}catch(e){log('media_'+abdFn+':::'+ e.message);}
}

function trackingAbdClick3rd_IFRAME()
{
	try{
		var abdFn = "trackingAbdClick3rd"+ abd_banner_id;
		window[abdFn]();	
	}catch(e){log('media_'+abdFn+':::'+ e.message);}
}

function log(str)
{
	console.log("-------AMB-LOG-----:::"+ str +":::")
}

onload();

function onload() {
	 var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
	 var eventer = window[eventMethod];
	 var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
	 
	 // Listen to message from child window
	 eventer(messageEvent,function(e) {
	   var key = e.message ? "message" : "data";
	   var data = e[key];
	    if (data=="trackingAbdClickHTML5_IFRAME") trackingAbdClickHTML5_IFRAME();
		if (data=="trackingClickserving") trackingClickserving();
	    if (data.func_type=="trackingAbdVideoMetrics_html5") {trackingAbdVideoMetrics_html5(data.param1,data.param2);};
		if (data.func_type=="trackingAbdInteraction_html5") {trackingAbdInteraction_html5(data.param1,data.param2);};
	   if (data=="trackingAbdClick3rd_IFRAME") trackingAbdClick3rd_IFRAME();
	 },false);
	// ShowBanner_html5(0);
}
