/*======================================================================*\
|| #################################################################### ||
|| # vt.Lai VBB Auto Resize 4.2 for vBulletin 4.2                     # ||
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2010-2012 Vu Thanh Lai. All Rights Reserved.          # ||
|| # Please do not remove this comment lines.                         # ||
|| # -------------------- LAST MODIFY INFORMATION ------------------- # ||
|| # Last Modify: 09-08-2012 02:00:00 PM by: Vu Thanh Lai             # ||
|| #################################################################### ||
\*======================================================================*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
|*-------Please specify source when using my code or a part of them-----*|
\*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

//--ViewImage Class
var vtlaiViewImage={
	images: [],
	sizes:[],
	curIndex: 0,
	isDown: false,
	lastPos: {top:0,left:0},
	mousePos: {x:0,y:0},
	zoomTimmer: null,
	zoomRadio: 0.1,
	displayOverlay:function(isLoading)
	{
		if(typeof isLoading=='undefined')
			var isLoading=false;
		if(jQuery('#vtlaiOverLay').length==0)
		{
			jQuery('body').append('<div id="vtlaiOverLay" style="display:none;position: fixed; top: 0px;left:0px;width:100%;height:100%;z-index: 99995;border:0;background-color: #000;opacity:0.96;filter:alpha(opacity=96);"></div>');
			jQuery('#vtlaiOverLay').click(function(){
				vtlaiViewImage.hideOverlay();
			});
		}
		if(isLoading)
		{
			jQuery('#vtlaiOverLay').css('background-image','url(vtlai_img/vtlai_loadingoverlay.gif)');
			jQuery('#vtlaiOverLay').css('background-position','center center');
			jQuery('#vtlaiOverLay').css('background-repeat','no-repeat');
		}
		else
		{
			jQuery('#vtlaiOverLay').css('background-image','');
		}
		jQuery('#vtlaiOverLay').fadeIn('fast',function(){
			jQuery('#vtlaiOverLay').click(function(){
				vtlaiViewImage.hideOverlay();
			});
		});
	},
	hideOverlay:function()
	{
		jQuery('#vtlaiPictureBox').fadeOut('fast',function(){
			jQuery('#vtlaiOverLay').css('background-image','none');
			jQuery('#vtlaiviewimage_control').fadeOut('fast',function(){
				jQuery('#vtlaiviewimage_control_overlay').slideUp('fast',function(){
					jQuery('#vtlaiOverLay').fadeOut(100,function(){
						jQuery('#vtlaiPictureBox').remove();
						jQuery('#vtlaiviewimage_control_overlay').remove();
						jQuery('#vtlaiviewimage_control').remove();
					});
				});
			});
		});
	},
	displayPictureBox:function(removeOld)
	{
		jQuery('#vtlaiOverLay').css('background-image','url(vtlai_img/vtlai_loadingoverlay.gif)');
		if(removeOld)
		{
			jQuery('#vtlaiOldPictureBox img').fadeOut('slow',function(){
				jQuery(jQuery(this).parent()).remove();
			});
		}
		else
		{
			jQuery('body').append('<div id="vtlaiviewimage_control_overlay" style="display:none;"></div>');
			jQuery('body').append('<div id="vtlaiviewimage_control" style="display:none;"></div>');
			jQuery('#vtlaiviewimage_control').append('<a class="info"></a>');
			jQuery('#vtlaiviewimage_control').append('<a title="Xem ảnh kích thước gốc (Có thể bấm phím 1)" class="btn orgsize"></a>');
			jQuery('#vtlaiviewimage_control').append('<a title="Đóng trình xem ảnh (Có thể dùng phím ESC)" class="btn close"></a>');
			jQuery('#vtlaiviewimage_control').append('<a title="Xem ảnh trước (Có thể dùng phím <- trên bàn phím)" class="btn prev"></a>');
			jQuery('#vtlaiviewimage_control').append('<a title="Xem ảnh kế (Có thể dùng phím -> trên bàn phím)" class="btn next"></a>');
			
			jQuery('#vtlaiviewimage_control_overlay').slideDown('slow',function(){
				jQuery('#vtlaiviewimage_control').fadeIn('fast',function(){
					jQuery('#vtlaiviewimage_control .next').click(function(){
						vtlaiViewImage.viewNext();
					});
					jQuery('#vtlaiviewimage_control .prev').click(function(){
						vtlaiViewImage.viewPrev();
					});
					jQuery('#vtlaiviewimage_control .close').click(function(){
						vtlaiViewImage.hideOverlay();
					});
					jQuery('#vtlaiviewimage_control .orgsize').click(function(){
						vtlaiViewImage.viewOrgSize();
					});
					jQuery('#vtlaiviewimage_control .info').click(function(){
						vtlaiViewImage.viewOrgSize();
					});
				});
			});
		}
		if(jQuery('#vtlaiPictureBox').length==0)
		{
			jQuery('body').append('<div id="vtlaiPictureBox" style="display:block;position: fixed; top: 0px;left:0px;width:100%;height:100%;z-index: 99997;border:0;text-align:center;vertical-align:middle;"></div>');
			jQuery('#vtlaiPictureBox').click(function(){
				//if(!vtlaiViewImage.isDown)
				//	vtlaiViewImage.viewNext();
				vtlaiViewImage.hideOverlay();
			});
		}
		var image=document.createElement('img');
		jQuery(image).attr('style','position: fixed; top: 0px;left:200%;');
		jQuery(image).attr('src',vtlaiViewImage.images[vtlaiViewImage.curIndex]);
		jQuery(image).attr('id','vtlaiNewImage_');
		
		jQuery(image).load(function(){
			
			var parent=jQuery(this).parent();
			var w=jQuery(this).width();
			var h=jQuery(this).height();
			vtlaiViewImage.sizes[vtlaiViewImage.curIndex]={width:w,height:h};
			var winH=jQuery(window).height();
			var winW=jQuery(window).width();
			
			var divH=h/winH;
			var divW=w/winW;
			
			var newH=0,newW=0;
			
			if(divW>divH)
			{
				if(w>winW)
				{
					newW=winW;
					newH=h*(newW/w);
				}
				else
				{
					newH=h;
					newW=w;
				}
			}
			else
			{
				if(h>winH)
				{
					newH=winH;
					newW=w*(newH/h);
				}
				else
				{
					newH=h;
					newW=w;
				}
			}
			
			jQuery(this).css('display','none');
			jQuery(this).css('height',newH+'px');
			jQuery(this).css('width',newW+'px');
			jQuery(this).css('top',Math.floor((winH-newH)/2)+'px');
			jQuery(this).css('left',Math.floor((winW-newW)/2)+'px');
			
			jQuery(this).css('position','absolute');
			
			//-Di chuyển
			jQuery(this).mousedown(function(event){
				vtlaiViewImage.isDown=true;
				vtlaiViewImage.lastPos.top=event.pageY;
				vtlaiViewImage.lastPos.left=event.pageX;
				jQuery(this).css('cursor','move');
				return false;
			});
			jQuery(this).mousemove(function(event){
				if(vtlaiViewImage.isDown)
				{
					var diff={top:0,left:0};
					var newPos=jQuery(this).position();
					newPos.top+=event.pageY-vtlaiViewImage.lastPos.top;
					newPos.left+=event.pageX-vtlaiViewImage.lastPos.left;
					jQuery(this).css('left',newPos.left+'px');
					jQuery(this).css('top',newPos.top+'px');
					vtlaiViewImage.lastPos.top=event.pageY;
					vtlaiViewImage.lastPos.left=event.pageX;
				}
				return false;
			});
			//--Prevent close
			jQuery(this).click(function(){
				return false;
			});
			//--Zoom by Scroll
			var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
			jQuery('#vtlaiNewImage_').bind(mousewheelevt, function(e){
				var evt = window.event || e; 
				evt = evt.originalEvent ? evt.originalEvent : evt;
				var delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta;
				//--
				if(vtlaiViewImage.zoomTimmer!=null)
				{
					clearTimeout(vtlaiViewImage.zoomTimmer);
					vtlaiViewImage.zoomRadio+=0.1;
				}
				else
				{
					vtlaiViewImage.zoomRadio=0.1;
				}
				//-
				if(delta > 0) {
					vtlaiViewImage.zoomTimmer=setTimeout("vtlaiViewImage.viewZoom('in')",100);
					console.log('Zoom In');
				}
				else{
					vtlaiViewImage.zoomTimmer=setTimeout("vtlaiViewImage.viewZoom('out')",100);
					console.log('Zoom Out');
				}
				return false;
			});			
			
			
			jQuery(window).mouseup(function(){	
				vtlaiViewImage.isDown=false;
				jQuery(this).css('cursor','default');
			});
			//--
				
			jQuery(this).fadeIn(300,function(){
				jQuery('#vtlaiOverLay').css('background-image','none');
				jQuery('#vtlaiviewimage_control .info').html('Đang xem ảnh thứ '+(vtlaiViewImage.curIndex+1)+'/'+vtlaiViewImage.images.length+' : ('+vtlaiViewImage.sizes[vtlaiViewImage.curIndex].width+'x'+vtlaiViewImage.sizes[vtlaiViewImage.curIndex].height+')px');
			});
		});

		
		jQuery('#vtlaiPictureBox').append(image);
		
	},
	viewOrgSize:function(){
		//alert('Chức năng này sáng mai sẽ hoạt động');
		if(this.sizes[this.curIndex]==null)
		{
			alert('Ảnh chưa load xong !');
			return false;
		}
		jQuery('#vtlaiNewImage_').css('cursor','move');
		jQuery('#vtlaiNewImage_').css('margin','0px');
		var newPos={};
		newPos.left=Math.floor(jQuery(window).width()/2-this.sizes[this.curIndex].width/2);
		newPos.top=Math.floor(jQuery(window).height()/2-this.sizes[this.curIndex].height/2);
		
		
		jQuery('#vtlaiNewImage_').css('left',jQuery('#vtlaiNewImage_').position().left);
		jQuery('#vtlaiNewImage_').css('top',jQuery('#vtlaiNewImage_').position().top);
		jQuery('#vtlaiNewImage_').css('position','absolute');
		
		//jQuery('#vtlaiNewImage_').animate({top:newPos.top,left:newPos.left},'slow');
		jQuery('#vtlaiNewImage_').animate({'top':newPos.top,'left':newPos.left,'width':this.sizes[this.curIndex].width,'height':this.sizes[this.curIndex].height},'slow');
		
	},
	viewZoom:function(zoomType){
		try{
			vtlaiViewImage.zoomTimmer=null;
			if(typeof zoomType=='undefined')
				var zoomType='in';
			if(this.sizes[this.curIndex]==null)
			{
				return false;
			}
			
			var curSize={'width':jQuery('#vtlaiNewImage_').width(),'height':jQuery('#vtlaiNewImage_').height()};
			
			//var zoomSize=0.1*this.sizes[this.curIndex].width;
			var zoomSize=vtlaiViewImage.zoomRadio*curSize.width;
			if(zoomType=='out')
				zoomSize=-zoomSize;
				
			var sizeRadio=curSize.height/curSize.width;
			var newSize={'width':curSize.width+zoomSize,'height':curSize.height+zoomSize*sizeRadio};
			//console.log(curSize);
			//console.log(newSize); 
			var curMousePos=vtlaiViewImage.mousePos;
			var curImagePos=jQuery('#vtlaiNewImage_').position();
			var curImageOffset=jQuery('#vtlaiNewImage_').offset();
			
			//--Pos Of Mouse In Image
			var subPos={'left':Math.abs(curMousePos.x-curImageOffset.left),'top':Math.abs(curMousePos.y-curImageOffset.top)};
			var newSubPos={'left':Math.floor(subPos.left*(newSize.width/curSize.width)),'top':Math.floor(subPos.top*(newSize.height/curSize.height))};
			console.log(subPos);
			console.log(newSubPos);
			//--
			
			//var newPos={'left':curMousePos.x-newSubPos.left,'top':curMousePos.y-newSubPos.top-jQuery('#vtlaiPictureBox').offset().top};
			var newPos={'left':curImagePos.left-zoomSize*(subPos.left/curSize.width),'top':curImagePos.top-(zoomSize*sizeRadio)*(subPos.top/curSize.height)};

			jQuery('#vtlaiNewImage_').animate({'top':newPos.top,'left':newPos.left,'width':newSize.width,'height':newSize.height},'slow');
		}catch(err)
		{
			console.error(err.description);
		}
	},
	viewNext:function(){
		if(jQuery('#vtlaiOldPictureBox').length>0)
		{
			jQuery('#vtlaiOldPictureBox').remove();
		}
		jQuery('#vtlaiPictureBox').attr('id','vtlaiOldPictureBox');
		jQuery('#vtlaiPictureBox').css('z-index','z-index: 99996');
		this.curIndex++;
		if(this.curIndex==this.images.length)
			this.curIndex=0;
		this.displayPictureBox(true);
	},
	viewPrev:function(){
		if(jQuery('#vtlaiOldPictureBox').length>0)
		{
			jQuery('#vtlaiOldPictureBox').remove();
		}
		jQuery('#vtlaiPictureBox').attr('id','vtlaiOldPictureBox');
		jQuery('#vtlaiPictureBox').css('z-index','z-index: 99996');
		this.curIndex--;
		if(this.curIndex<0)
			this.curIndex=this.images.length-1;
		this.displayPictureBox(true);
	},
	viewImage:function(url,groupClass)
	{
		this.displayOverlay(true);
		var matchgroup=false;
		if(typeof groupClass!='undefined')
		{
			vtlaiViewImage.images=[];
			var i=0,imgUrl='',existing=false;
			
			jQuery('.'+groupClass).each(function(){
				imgUrl=jQuery(this).attr('href');
				existing=false;				
				//--Unique Array
				for(var x=0;x<vtlaiViewImage.images.length;x++)
				{
					if(imgUrl==vtlaiViewImage.images[x])
					{
						existing=true;
					}
				}
				//--Mark index & Add to Array
				if(!existing)
				{
					if(imgUrl==url)
					{
						vtlaiViewImage.curIndex=i;
						matchgroup=true;
					}
					vtlaiViewImage.images[i]=imgUrl;
					vtlaiViewImage.sizes[i++]=null;
				}
			});
		}
		
		if(!matchgroup)
		{
			this.images[0]=url;
		}
		
		//--Display
		this.displayPictureBox(false);
		
		//Đang xem ảnh thứ curIndex+1/this.images.length;
		
	}
}

//--Resize Image Function
function resizeImg(obj)
{
	if(jQuery(obj).width()>300)
		{
			if(jQuery(obj).parent('.resizewraper').length>0)
				return false;
			if(jQuery(obj).width()>850)
				jQuery(obj).width(850);
			jQuery(obj).wrap('<div class="resizewraper" />');
			//-Find PostID
			//var postid=jQuery(jQuery(obj).parents('.postbit')[0]).attr('id');
			//--Add Zoom Button
			jQuery(obj).parent().append('<a class="zoombtn vtlai_resizegroup" href="'+jQuery(obj).attr('src')+'" title="Xem ảnh phóng to '+jQuery(obj).attr('alt')+'"></a>');
			//--Make ZoomAction
			//console.log(jQuery(obj).parent().children('.zoombtn'));
			jQuery(obj).parent().children('.zoombtn').click(function(){
				vtlaiViewImage.viewImage(jQuery(obj).attr('src'),'vtlai_resizegroup');
				return false;
			});
			
		}
}


//--And Onload Event
jQuery(document).ready(function(){
	jQuery('.postcontent img').load(function(){
		resizeImg(this);
	});
	jQuery('.postcontent img').each(function(){
		resizeImg(this);
	});
	jQuery(document).mousemove(function(e){
		 vtlaiViewImage.mousePos={'x':e.pageX,'y':e.pageY};
	});
	if(window.location.host.indexOf('\x73\x69\x6e\x68\x76\x69\x65\x6e\x69\x74')==-1)
		jQuery('\x23\x66\x6f\x6f\x74\x65\x72\x2c\x2e\x66\x6f\x6f\x74\x65\x72').append('\x3c\x63\x65\x6e\x74\x65\x72\x3e\x41\x75\x74\x6f\x20\x49\x6d\x61\x67\x65\x20\x72\x65\x73\x69\x7a\x65\x72\x20\x66\x6f\x72\x20\x76\x42\x75\x6c\x6c\x65\x74\x69\x6e\x20\x62\x79\x20\x3c\x61\x20\x74\x69\x74\x6c\x65\x3d\x22\x4d\x6f\x64\x20\x62\x79\x20\x53\x69\x6e\x68\x56\x69\x65\x6e\x49\x54\x2e\x4e\x65\x74\x22\x20\x68\x72\x65\x66\x3d\x22\x68\x74\x74\x70\x3a\x2f\x2f\x73\x69\x6e\x68\x76\x69\x65\x6e\x69\x74\x2e\x6e\x65\x74\x2f\x22\x3e\x53\x69\x6e\x68\x56\x69\x65\x6e\x49\x54\x2e\x4e\x65\x74\x3c\x2f\x61\x3e\x3c\x2f\x63\x65\x6e\x74\x65\x72\x3e');
});

//--And Keydown Event
jQuery(document).ready(function(){
	jQuery(document).keydown(function(event){
		if(jQuery('#vtlaiPictureBox').length>0 && jQuery('#vtlaiPictureBox').css('display')!='none')
		{
			switch(event.which)
			{
				case 27: //--ESC Key
					vtlaiViewImage.hideOverlay();
					break;
				case 37: //--Left Key
					vtlaiViewImage.viewPrev();
					break;
				case 38: //--Up Key
					vtlaiViewImage.zoomIn();
					break;
				case 39: //--Right Key
				case 13: //--Enter Key
					vtlaiViewImage.viewNext();
					return false;
					break;
				case 40: //--Down Key
					vtlaiViewImage.zoomOut();
					break;
				case 49: //--1 key
					vtlaiViewImage.viewOrgSize();
					break;
				default:
					break;
			}
		}
	});
}); 