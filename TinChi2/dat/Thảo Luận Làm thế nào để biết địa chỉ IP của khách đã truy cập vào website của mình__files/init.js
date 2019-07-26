if (document.getElementById('AbdPopupAd'))
{ document.getElementById('AbdPopupAd').style.overflow = "inherit";
setTimeout(function(){document.getElementById('AbdPopupAd').style.position = "inherit";},100)}

function trackingAbdInteraction_html5(name,target){
	try{
		parent.postMessage({func_type:'trackingAbdInteraction_html5', param1:name,param2:target},"*");
	}
	catch(e){log('iframe_trackingAbdInteraction('+ name + ',' + target +')---'+e.message);}
	
}

function trackingAbdVideoMetrics_html5(duration,value){
	try{
		parent.postMessage({func_type:'trackingAbdVideoMetrics_html5', param1:duration,param2:value},"*");
	}
	catch(e){log('iframe_trackingAbdVideoMetrics('+ duration + ',' + value +')---'+e.message);}
	
}
function trackingClickserving()
{
	try{
		parent.postMessage("trackingClickserving", "*");
		
	}
	catch(e){log('iframe_trackingAbdClick3rd_IFRAME---'+ e.message);}
}
function trackingAbdClick3rd_IFRAME()
{
	try{
		parent.postMessage("trackingAbdClick3rd_IFRAME", "*");
	}
	catch(e){log('iframe_trackingAbdClick3rd_IFRAME---'+ e.message);}
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
		if (data=="trackingAbdClick3rd_IFRAME") trackingAbdClick3rd_IFRAME();
		if (data.func_type=="trackingAbdVideoMetrics_html5") {trackingAbdVideoMetrics_html5(data.param1,data.param2);};
		if (data.func_type=="trackingAbdInteraction_html5") {trackingAbdInteraction_html5(data.param1,data.param2);};	    
	 },false);
	// ShowBanner_html5(0);
}
