/*******************
VARIABLES
*******************/
var animatedContainer
var carImage;
var closeButton;
var animationTime = 5;	// in seconds
var endingAnimationTime = 2; // in seconds
var endingAnimationRate = 80; // adjust this rate to make animation smoothly
var animationTimer;
var animatedBackgroundTimer;
var endingAnimationTimer;
var isAndroid = navigator.userAgent.match(/android|silk/i) != null;
var isiOS = navigator.userAgent.match(/ipod|iphone|ipad/i) != null;

var panel_BannerName = "panelBanner";
var panel_MinName = "panelMin";
var panel_PreName = "panelPre";
var panel_ExpandName = "panelExpand";

/*******************
INITIALIZATION
*******************/
function checkIfEBInitialized(event)
{
	if(!EB.isInitialized())
	{
		EB.addEventListener(EBG.EventName.EB_INITIALIZED, initializeCreative);
	}
	else
	{
		initializeCreative();
	}
}

function initializeCreative()
{
	
}

/*******************
EVENT HANDLERS
*******************/
function handleClickthroughButtonClick()
{
	EB.clickthrough();
}

/*******************
BANNER FUNCTIONS
*******************/

function callConversion() 
{ 
	parent.postMessage("trackingClickserving", "*");
	var newIframe = document.createElement('iframe');
	newIframe.width = 0; 
	newIframe.height = 0;
	newIframe.scrolling = 'no';		
	newIframe.setAttribute('frameborder','0'); 
	newIframe.setAttribute('vspace','0'); 
	newIframe.setAttribute('hspace','0'); 
	newIframe.setAttribute('marginheight','0'); 
	newIframe.setAttribute('marginwidth','0'); 
	newIframe.setAttribute('allowfullscreen','true'); 		
	newIframe.setAttribute('mozallowfullscreen','true'); 
	newIframe.setAttribute('webkitallowfullscreen','true'); 
	newIframe.setAttribute('allowtransparency','true'); 
	
	newIframe.src = 'javascript:"<!DOCTYPE html><html><body style=\'background:transparent; overflow:hidden\'></body></html>"'; 
	document.body.appendChild(newIframe);

	var script = '<scr'+'ipt type="text/javascript" src="//media.adnetwork.vn/js/retargeting.js"></scr'+'ipt><scr'+'ipt type="text/javascript">try{AbdTracking.Retargeting({"id":1447055941});}catch(e){}</scr'+'ipt><noscript><img src="//retg.adnetwork.vn/247/retargeting/id_1447055941/ " width="1" height="1" border="0" alt=""/></noscript>';
				
	var myContent = '<!DOCTYPE html>'
		+ '<html><head><title>Ambient Production</title></head>'
		+ '<body style=\'background:transparent; overflow:hidden;\'>'+script+'</body></html>';

	newIframe.contentWindow.document.open('text/html', 'replace');
	newIframe.contentWindow.document.write(myContent);
	newIframe.contentWindow.document.close();
	console.log("callConversion + trackingClickserving");
};
function trackingAbdClickHTML5()
{
	try
	{
		//callConversion();
		parent.postMessage("trackingAbdClick3rd_IFRAME", "*");
		
		handleClickthroughButtonClick();	
		log("click");
	}
	catch(e){log('banner_trackingAbdClickHTML5---'+ e.message);}
}
function trackingAbdInteraction(name, target)
{
	try
	{
		parent.postMessage({func_type:'trackingAbdInteraction_html5', param1:name,param2:target},"*");
	}
	catch(e){log('banner_trackingAbdInteraction('+ name + ',' + target +')---'+e.message);}
}
function trackingAbdVideoMetrics(duration, value)
{
	try
	{
		parent.postMessage({func_type:'trackingAbdVideoMetrics_html5', param1:duration,param2:value},"*");	
	}
	catch(e){log('banner_trackingAbdVideoMetrics('+ duration + ',' + value +')---'+e.message);}
}
function closePre()
{
	try
	{
		trackingAbdInteraction("Close_Pre", "0");
		expandPanel(panel_BannerName);
		hidePanel(panel_PreName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function closeExpand()
{
	try
	{
		trackingAbdInteraction("Close_Expand", "0");
		expandPanel(panel_BannerName);
		hidePanel(panel_ExpandName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function expand_Expand()
{
	try
	{
		trackingAbdInteraction("Expand_Expand", "0");
		expandPanel(panel_ExpandName);
		hidePanel(panel_BannerName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function expand_Pre()
{
	try
	{
		trackingAbdInteraction("Expand_Pre", "0");
		expandPanel(panel_PreName);
		hidePanel(panel_BannerName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function closeBanner()
{
	try
	{
		trackingAbdInteraction("Close_Banner", "0");
		hidePanel(panel_BannerName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function clickMin()
{
	try
	{
		trackingAbdInteraction("Min", "0");
		expandPanel(panel_MinName);
		hidePanel(panel_BannerName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function clickMax()
{
	try
	{
		trackingAbdInteraction("Max", "0");
		expandPanel(panel_BannerName);
		hidePanel(panel_MinName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function closeMin()
{
	try
	{
		trackingAbdInteraction("Close_Min", "0");
		hidePanel(panel_MinName);
	}
	catch(e){log('minAbdPopupAd'+ e.message);}	
}
function log(str)
{
	console.log("-------AMB-LOG-----:::"+ str +":::")
}

/*******************
UTILITIES
*******************/
function expandPanel(name)
{
	EB.expand({panelName: name});	
	log("expandPanel: "+name);
}

function hidePanel(name)
{
	EB.collapse({panelName: name});	
	log("hidePanel: "+name);
}


function getWindowDimension()
{
	if(document.body && document.body.offsetWidth)
	{
		winWidth = document.body.offsetWidth;
		winHeight = document.body.offsetHeight;
	}
	if(document.compatMode=="CSS1Compat" && document.documentElement && document.documentElement.offsetWidth)
	{
		winWidth = document.documentElement.offsetWidth;
		winHeight = document.documentElement.offsetHeight;
	}
	if(window.innerWidth && window.innerHeight)
	{
		winWidth = window.innerWidth;
		winHeight = window.innerHeight;
	}
	return {width: winWidth, height: winHeight};
}

function getStyle(obj, styleName)
{
	try
	{
		if (typeof document.defaultView !== "undefined" && typeof document.defaultView.getComputedStyle !== "undefined")
		{
			return document.defaultView.getComputedStyle(obj, "")[styleName];
		}
		else if (typeof obj.currentStyle !== "undefined")
		{
			return obj.currentStyle[styleName];
		}
		else
		{
			return obj.style[styleName];
		}
		return null;
	}
	catch (error)
	{
		return null;
	}
}

document.addEventListener("DOMContentLoaded", checkIfEBInitialized, false);