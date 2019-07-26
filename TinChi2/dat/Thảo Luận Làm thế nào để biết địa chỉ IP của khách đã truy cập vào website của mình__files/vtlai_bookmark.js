/*======================================================================*\
|| #################################################################### ||
|| # vt.Lai VBB Bookmark System 4.2 for vBulletin 4.2                 # ||
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2010-2012 Vu Thanh Lai. All Rights Reserved.          # ||
|| # Please do not remove this comment lines.                         # ||
|| # -------------------- LAST MODIFY INFORMATION ------------------- # ||
|| # Last Modify: 20-09-2012 19:00:00 PM by: Vũ Thanh Lai             # ||
|| # Shared location: SinhVienIT.Net								  # ||
|| #################################################################### ||
\*======================================================================*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
|*-------Please specify source when using my code or a part of them-----*|
\*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

var vtlaiResizeTimmer=null;
var vtlaiLastBookmarkTime=0;
var vtlaiLastBookmarkUserid=0;
var getFacebookLikeUrl,getCurentUrl,checkBookmarkStatus,synBookmark,bookmarkBoxRePos,vtlaiStopFbLoading;
var vtlaiIndexPage=['http://sinhvienit.net/','http://sinhvienit.net/home/','https://sinhvienit.net/home/','http://sinhvienit.net/video/','http://sinhvienit.net/forum/','https://sinhvienit.net/forum/','http://sinhvienit.net/forum/forum.php','http://sinhvienit.net/forum/index.php'];
var vtlaiFacebookPage='http://www.facebook.com/sinhvienit.fanpage';
var vtlaiIsIndexPage=false;

jQuery(document).ready(function(){
	//jQuery('#vtlai_bookmark').css('left','');
	//--Get curent URL (Remove after #)
	getCurentUrl=function()
	{
		var url,arr;
		if(window.location.href.indexOf('#')!=-1)
		{
			arr=window.location.href.split('#');
			url=arr[0];
		}
		else
		{
			url=window.location.href;
		}
		if(url.indexOf('?fb_action_ids')!=-1)
		{
			arr=url.split('?fb_action_ids');
			url=arr[0];
		}
		return url;
	}
	//--Get Local Info for Sync bookmark if HTML 5
	if(localStorage!=undefined)
	{
		if(localStorage.vtlaiLastBookmarkTime!=undefined)
		{
			vtlaiLastBookmarkTime=localStorage.vtlaiLastBookmarkTime;
		}
		if(localStorage.vtlaiLastBookmarkUserid!=undefined)
		{
			vtlaiLastBookmarkUserid=localStorage.vtlaiLastBookmarkUserid;
		}
		if(USERID==undefined || USERID==0 || USERID!=vtlaiLastBookmarkUserid)
		{
			localStorage.clear();
		}	
	}
	//--Bookmark box
	var vtlaiBookmarkBoxHtml='<div id="vtlai_bookmark" style="left:-1000px">\
	<div class="inner">\
		<div class="container">\
			<a id="vtlai_bookmark_btn" class="item bookmark" title="Click vào đây đề bookmark trang này vào tài khoản sinhvienit.net"></a>\
			<div id="vtlai_bookmark_fb" class="item loading">\
				\
			</div>\
			<div class="item last">\
				<div class="g-plusone" data-size="tall"></div>\
			</div>\
		</div>\
	</div>\
</div>';
	//--Addbox to body
	var skipDisplayBookmark=0;
	var curUrl=getCurentUrl();
	for(var i=0;i<vtlaiIndexPage.length;i++)
	{
		if(curUrl==vtlaiIndexPage[i])
			skipDisplayBookmark=1;
	}
	if(!skipDisplayBookmark)
		jQuery('body').append(vtlaiBookmarkBoxHtml);
	
	//--SynBookmark
	synBookmark=function(){
		if(!LOGGEDIN)
			return false;

		if(localStorage!=undefined && LASTBOOKMARKTIME!=undefined && !isNaN(LASTBOOKMARKTIME))
		{
			if(localStorage.vtlaiLastBookmarkTime!=undefined)
			{
				vtlaiLastBookmarkTime=localStorage.vtlaiLastBookmarkTime;
			}
			//--Nếu đã updated date thì ngừng
			if(vtlaiLastBookmarkTime==LASTBOOKMARKTIME)
				return false;
			jQuery.ajax({
				url:'ajax.php',
				data:{securitytoken:SECURITYTOKEN,'do':'vtlaibookmark',action:'syn',lasttime:vtlaiLastBookmarkTime},
				dataType: 'json',
				type: 'POST',
				success: function(data)
				{
					if(data.status==undefined)
					{
						return false;
					}
					else if(data.status)
					{
						//--Clear old data
						localStorage.clear();
						//--Update local Storage
						for(var i=0;i<data.bookmarks.length;i++)
						{
							localStorage.setItem(data.bookmarks[i].url,data.bookmarks[i].title);
						}
						//--Update last syn time
						vtlaiLastBookmarkTime=localStorage.vtlaiLastBookmarkTime=data.lasttime;
						vtlaiLastBookmarkUserid=localStorage.vtlaiLastBookmarkUserid=USERID;
						//--Update BookmarkStatus
						checkBookmarkStatus();
					}
				},
				complete:function(){
					jQuery('#vtlai_bookmark_btn').removeClass('savingbookmark');
				}
				
			});
		}
	}
	
	//--Lấy link like facebook
	getFacebookLikeUrl=function(){
		var curURL=getCurentUrl();
		if(typeof vtlaiFacebookPage=='undefined' || typeof vtlaiIndexPage=='undefined' || vtlaiFacebookPage=='' || vtlaiIndexPage.length==0)
			return curURL;
		for(var i=0;i<vtlaiIndexPage.length;i++)
		{
			if(curURL==vtlaiIndexPage[i])
			{
				vtlaiIsIndexPage=true;
				break;
			}
		}
		if(vtlaiIsIndexPage)
			return vtlaiFacebookPage;
		return curURL;
	}
	//--Kiểm tra trạng thái bookmark
	checkBookmarkStatus=function()
	{
		jQuery('#vtlai_bookmark_btn').removeClass('savingbookmark');
		if(localStorage!=undefined)
		{
			if(localStorage.getItem(getCurentUrl())!=null)
			{
				jQuery('#vtlai_bookmark_btn').removeClass('bookmark');
				jQuery('#vtlai_bookmark_btn').addClass('inbookmark');
				jQuery('#vtlai_bookmark_btn').attr('title','Bài này đang nằm trong bookmark của bạn. Click vào đây để gỡ bỏ khỏi bookmark !');
			}
			else
			{
				jQuery('#vtlai_bookmark_btn').addClass('bookmark');
				jQuery('#vtlai_bookmark_btn').removeClass('inbookmark');
				jQuery('#vtlai_bookmark_btn').attr('title','Click vào đây để bookmark trang này vào tài khoản sinhvienit.net của bạn :)');
			}
		}
	}
	//--Điều chỉnh vị trí bookmarkbox theo ngữ cảnh
	bookmarkBoxRePos=function()
	{
		clearTimeout(vtlaiResizeTimmer);
		vtlaiResizeTimmer=null;
		//if(jQuery(window).width()>=1170 && (window.location.pathname!='/forum/' && window.location.pathname!='/home/'))
		if(jQuery(window).width()>=1170)
		{
			//--Left
			if(jQuery('#vtlai_bookmark').css('display')=='none')
			{
				//jQuery('#vtlai_bookmark').css('left','auto');
				jQuery('#vtlai_bookmark').fadeIn('fast');
			}
			
			/*Bookmark bên phải*/
			//var diff=jQuery(window).width()-1006;
			////var left=Math.floor((diff/2-jQuery('#vtlai_bookmark').width())/2);
			//var left=jQuery(window).width()-Math.floor((diff/2+jQuery('#vtlai_bookmark').width())/2);
			//--Top
			//var wHeight=jQuery(window).height();
			//var top=Math.floor((jQuery(window).height()-jQuery('#vtlai_bookmark').height())/2);
			/*End Bookmark bên phải*/
			
			/*Bookmark bên trái*/
			var diff=jQuery(window).width()-1006;
			var left=Math.floor((diff/2-jQuery('#vtlai_bookmark').width())/2);
			//var left=jQuery(window).width()-Math.floor((diff/2+jQuery('#vtlai_bookmark').width())/2);
			//--Top
			var wHeight=jQuery(window).height();
			var top=Math.floor((jQuery(window).height()-jQuery('#vtlai_bookmark').height())/2);
			/*End Bookmark bên trái*/
			
			//--Move
			jQuery('#vtlai_bookmark').animate({left:left,top:top},200);
			
		}
		else
		{
			jQuery('#vtlai_bookmark').fadeOut('fast');
		}
	}
	
	
	//--Điều chỉnh vị trí khi resize
	jQuery(window).resize(function(){
		if(vtlaiResizeTimmer!=null)
		{
			clearTimeout(vtlaiResizeTimmer);
			vtlaiResizeTimmer=setTimeout('bookmarkBoxRePos()',100);
		}
		else
		{
			vtlaiResizeTimmer=setTimeout('bookmarkBoxRePos()',100);
		}
	});
	
	//--Ngừng load Fb Frame
	vtlaiStopFbLoading=function(){
		jQuery('#vtlai_bookmark_fb').removeClass('loading');
		if(vtlaiIsIndexPage)
		{
			jQuery('#vtlai_bookmark_fb iframe').animate({width:'62'},100);
		}
	}
	//--Load Facebook Frame
	jQuery('#vtlai_bookmark_fb').html('<iframe src="//www.facebook.com/plugins/like.php?href='+encodeURIComponent(getFacebookLikeUrl())+'&send=false&layout=box_count&width=62&show_faces=false&action=like&colorscheme=light&font=arial&height=61" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:52px; height:61px;" allowtransparency="true" onload="vtlaiStopFbLoading()"></iframe>');
	jQuery('#vtlai_bookmark').fadeIn('fast',function(){
		//--Syn bookmark
		synBookmark();
		//--Định vị trí hộp bookmark
		bookmarkBoxRePos();
		//--Update trạng thái bookmark link đang xem
		checkBookmarkStatus();
	});
	
	//--Nút bookmark
	jQuery('#vtlai_bookmark_btn').click(function(){
		if(!LOGGEDIN)
		{
			alert('Bạn cần đăng nhập vào diễn đàn để đánh dấu bài viết này.');
			return false;
		}
		//--Add loading
		jQuery('#vtlai_bookmark_btn').addClass('savingbookmark');
		//--Detect Action
		var action='add';
		if(jQuery('#vtlai_bookmark_btn').hasClass('inbookmark'))
			action='remove';
		//--send Bookmark
		jQuery.ajax({
			url:'ajax.php',
			data:{securitytoken:SECURITYTOKEN,'do':'vtlaibookmark',action:action,lasttime:vtlaiLastBookmarkTime,url:getCurentUrl(),title:jQuery('title').html(),description:jQuery('meta[name=description]').attr('content')},
			dataType: 'json',
			type: 'POST',
			success: function(data)
			{
				if(data.status==undefined)
				{
					alert('Lỗi: Dữ liệu máy chủ trả về bị lỗi.');
					return false;
				}
				else if(!data.status)
				{
					alert('Lỗi: '+data.detail);
					return false;
				}
				else
				{
					//--Update local Storage
					if(data.status && localStorage!=undefined)
					{
						localStorage.clear();
						for(var i=0;i<data.bookmarks.length;i++)
						{
							localStorage.setItem(data.bookmarks[i].url,data.bookmarks[i].title);
						}
						//--Update last syn time
						LASTBOOKMARKTIME=vtlaiLastBookmarkTime=localStorage.vtlaiLastBookmarkTime=data.lasttime;
						//--Update BookmarkStatus
						checkBookmarkStatus();
					}
					else if(!data.status)
					{
						alert('Lỗi: '+data.detail);
					}
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				switch(textStatus)
				{
					case 'parsererror':
						alert('Lỗi: Dữ liệu máy chủ trả về bị lỗi. Bấm F5 để tải lại trang.');
						break;
					case 'timeout':
						alert('Lỗi: Thời gian phản hồi từ máy chủ quá lâu.');
						break;
					default:
						alert('Xảy ra lỗi khi lưu bookmark. Bạn vui lòng thử lại.');
				}
			},
			complete:function(){
				jQuery('#vtlai_bookmark_btn').removeClass('savingbookmark');
			}
			
		});
	});
	//--G+ button
	window.___gcfg = {lang: 'vi'};

	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
});










//===========zAd Float ==============//
var vtlaiResizeTimmerZAd=null;
var zAdRePos=function()
{
	clearTimeout(vtlaiResizeTimmerZAd);
	vtlaiResizeTimmerZAd=null;
	if(jQuery(window).width()>=1170)
	{
		if(jQuery('#_adb_22_10002910').css('display')=='none')
		{
			jQuery('#_adb_22_10002910').fadeIn('fast');
		}
		
		var diff=jQuery(window).width()-1006;
		var left=jQuery(window).width()-Math.floor((diff/2+jQuery('#_adb_22_10002910').width())/2);
		//--Top
		var wHeight=jQuery(window).height();
		//var top=Math.floor((jQuery(window).height()-jQuery('#_adb_22_10002910').height())/2);
		var top=212;
		
		//--Move
		jQuery('#_adb_22_10002910').animate({left:left,top:top},1000);
		
	}
	else
	{
		jQuery('#_adb_22_10002910').fadeOut('fast');
	}
}

jQuery(window).load(function(){
	jQuery('#_adb_22_10002910').css('right','auto');
	jQuery('#_adb_22_10002910').css('left','5000px');
	zAdRePos();
});
jQuery(window).resize(function(){
	vtlaiResizeTimmerZAd=setTimeout('zAdRePos()',100);
});

//===========End zAd Float ==============//