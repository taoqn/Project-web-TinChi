/*======================================================================*\
|| #################################################################### ||
|| # vt.Lai Quick Report Broken Link 1.0                              # ||
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2010-2012 Vu Thanh Lai. All Rights Reserved.          # ||
|| # Please do not remove this comment lines.                         # ||
|| # -------------------- LAST MODIFY INFOMATION -------------------- # ||
|| # Last Modify: 09-07-2012 02:00:00 PM by: Vu Thanh Lai             # ||
|| #################################################################### ||
\*======================================================================*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
|*-------Please specify source when using my code or a part of them-----*|
\*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

var reportPostId=0,displayUpdateLinkBox,displayReportLinkBox,hideReportLinkBox,fixReportLinkBox,moveReportLinkBox,linkBoxTimmer,validReportInfo,isReportComplete=false,skipThisLink;
var reDirPrefix='http://sinhvienit.net/@forum/url/?';
jQuery(document).ready(function(){

	displayReportLinkBox=function(postId)
	{
		var resetTitle=false;
		var resetContent='';
		var linkList=[];
		if(1 || reportPostId!=postId)
		{
			resetTitle=true;
			var i=0
			var regUrl=/(http|https|ftp|mms)\:\/\//;
			var regSkipUrl=/\.(png|jpg|jpeg|bmp|gif)$/i;
			//var regDomainUrl=/\/\/(hotfile.com|www.hotfile.com|www.mediafire.com|mediafire.com|megaupload.com|www.megaupload.com|4share.vn|fshare.vn|share.vnn.vn|www.4share.vn|www.fshare.vn|www.share.vnn.vn|www.ziddu.com|ziddu.com|upfile.vn|shareflare.com|letitbit.net|www.letitbit.net)\//i;
			jQuery('#post_message_'+postId+' .postcontent a').each(function(){
				var xLink=jQuery(this).attr('href');
				if(typeof xLink!='undefined' && xLink!='')
				{
					if(reDirPrefix!='' && xLink.indexOf(reDirPrefix)!=-1)
					{
						xLink=xLink.replace(reDirPrefix,'');
						xLink=unescape(xLink);
					}
					if(regUrl.test(xLink) && !regSkipUrl.test(xLink))
						linkList[i++]=xLink; 
				}
			});
			resetContent=linkList.join('\r\n');
		}
		
		if(jQuery('#vtlaiReportLinkBox').length==0)
		{
			if(jQuery('#brokenlink_'+postId).length==0)
			{
				jQuery('body').append('<div id="vtlaiReportLinkBox"><h4>Báo link hỏng<a class="close" title="Đóng cửa sổ báo link hỏng">X</a></h4><div id="reportContentBox">\
				<form method="POST" class="reportLinkForm" id="reportLinkForm">\
					<label for="reportTitle">Lý do thông báo:\
						<select name="reportReason" id="reportReason">\
							<option value="Link hỏng, không tải được">Link hỏng, không tải được</option>\
							<option value="Link khó tải">Link khó tải</option>\
							<option value="Link đòi mật khẩu">Link đòi mật khẩu</option>\
							<option value="">Lý do khác (Ghi rõ bên dưới)</option>\
						</select>\
					</label>\
					<label id="moreReason" for="reportReasonMore" style="display:none">Ghi rõ lý do thông báo:\
						<input type="text" id="reportReasonMore" name="reportReasonMore"/>\
					</label>\
					<label id="lblFullName" for="reportFullName">Tên của bạn:\
						<input type="text" id="reportFullName" name="reportFullName"/>\
					</label>\
					<label id="lblEmail" for="reportEmail" title="Chúng tôi sẽ gửi thông báo đến email này sau khi link tải được Fix">Email của bạn:\
						<input type="text" id="reportEmail" name="reportEmail"/>\
					</label>\
					<label for="reportContent" title="Hãy xóa những link không die trong ô, chỉ để lại các link die">Những link hỏng trong bài viết và nội dung muốn gửi đến BQT:\
						<textarea id="reportContent" name="reportContent"></textarea>\
					</label>\
					<input type="hidden" name="do" value="sendReport"/>\
					<input type="hidden" id="securitytoken" name="securitytoken" value="'+SECURITYTOKEN+'"/>\
					<input type="hidden" id="reportPostId" name="postid" value=""/>\
					<input type="submit" id="reportLinkSubmit" class="submit" value="Gửi thông báo"/>\
				</form>\
				</div></div>');
				
				//--Change Reason
				jQuery('#vtlaiReportLinkBox #reportReason').change(function(){
					if(jQuery(this).val()=='')
					{
						jQuery('#moreReason').slideDown('fast',function(){
							fixReportLinkBox();
						});
					}
					else
					{
						jQuery('#moreReason').slideUp('fast',function(){
							fixReportLinkBox();
						});
					}
				});
			}
			else
			{
				jQuery('body').append('<div id="vtlaiReportLinkBox"><h4>Đăng ký nhận thông báo khi link được Fix<a class="close" title="Đóng cửa sổ đăng ký nhận thông tin link">X</a></h4><div id="reportContentBox">\
				<div class="info">Bài viết này đã có người thông báo link hỏng và đang chờ được upload lại link mới. Nếu bạn muốn nhận được thông báo khi link được fix xong, hãy điền thông tin vào bên dưới và bấm "Gửi yêu cầu theo dõi".</div>\
				<form method="POST" class="reportLinkForm" id="reportLinkForm">\
					<label id="lblFullName" for="reportFullName">Tên của bạn:\
						<input type="text" id="reportFullName" name="reportFullName"/>\
					</label>\
					<label id="lblEmail" for="reportEmail" title="Chúng tôi sẽ gửi thông báo đến email này sau khi link tải được Fix">Email của bạn:\
						<input type="text" id="reportEmail" name="reportEmail"/>\
					</label>\
					<input type="hidden" name="do" value="subscribeReport"/>\
					<input type="hidden" id="securitytoken" name="securitytoken" value="'+SECURITYTOKEN+'"/>\
					<input type="hidden" id="reportPostId" name="postid" value=""/>\
					<input type="hidden" id="reportLinkId" name="reportlinkid" value=""/>\
					<input type="submit" id="reportLinkSubmit" class="submit" value="Gửi yêu cầu theo dõi"/>\
				</form>\
				</div></div>');
			}
			//--Add default value
			jQuery('#reportFullName').val(reportLinkUserinfo.fullname);
			jQuery('#reportEmail').val(reportLinkUserinfo.email);
			//--Close button
			jQuery('#vtlaiReportLinkBox .close').click(function(){
				hideReportLinkBox();
			});
			//--Submit Form
			jQuery('#reportLinkForm').submit(function(){
				if(!validReportInfo())
					return false;
				jQuery('#securitytoken').val(SECURITYTOKEN);
				jQuery('#reportPostId').val(reportPostId);
				jQuery('#reportLinkId').val(jQuery('#brokenlink_'+reportPostId).val());
				var queryString=jQuery('#reportLinkForm').serialize();
				var contentHeightBefore=jQuery('#reportContentBox').height();
				var boxHeightBefore=jQuery('#vtlaiReportLinkBox').height();
				
				jQuery('#vtlaiReportLinkBox input,#vtlaiReportLinkBox select,#vtlaiReportLinkBox textarea').attr('disabled',true);
				jQuery('#reportLinkSubmit').attr('disabled',true);
				jQuery('#reportLinkSubmit').addClass('loading');
				jQuery('#reportLinkSubmit').val('Đang gửi thông báo...');
				jQuery.ajax({
					'url': 'vtlai_report_broken_link.php',
					'type': 'POST',
					'dataType': 'JSON',
					'data': queryString
				}).done(function(data){
					console.log(data);
					if(data.ok)
					{
						isReportComplete=true;
						var message='<center>Cám ơn bạn đã thông báo, chúng tôi sẽ gửi email thông báo cho bạn khi link được fix.</center>';
						if(typeof data.message!='undefined')
							message='<center>'+data.message+'</center>';
						jQuery('#reportContentBox').html(message);
						var diffContentHeight=contentHeightBefore-jQuery('#reportContentBox').height();
						var newHeight=boxHeightBefore-diffContentHeight+20;
						var newTop=Math.floor((jQuery(window).height()-40-newHeight)/2)+40;
						jQuery('#vtlaiReportLinkBox').animate({'height':newHeight,'top':newTop,'width':700,'left':-350},500);
						jQuery('#reportlink_btn_'+reportPostId).parent().fadeOut('fast',function(){
							jQuery(this).remove();
						});
						if(jQuery('#brokenlink_'+reportPostId).length==0)
						{
							var reportid=0;
							if(typeof data.reportid!='undefined')
								reportid=data.reportid;
							jQuery('body').append('<input style="display:none" id="brokenlink_'+reportPostId+'" value="'+reportid+'"/>');
						}
					}
					else if(typeof data.errors!='undefined')
					{
						alert('Lỗi: \n- '+data.errors.join('\n- '));
					}
					else
					{
						alert('Dữ liệu máy chủ trả về bị lỗi. Vui lòng thử lại.');
						console.log(data);
					}
				}).fail(function(jqXHR, textStatus, errorThrown){
					console.log(jqXHR);
					switch(textStatus)
					{
						case 'timeout':
							alert('Không nhận được trả lời từ máy chủ. Vui lòng thử lại.');
							break;
						case 'parsererror':
							var alertx=0;
							try{
								var dataXML=jQuery.parseXML(jqXHR.responseText);
								alert('Lỗi: \n'+dataXML.getElementsByTagName('error')[0].childNodes[0].nodeValue);
								alertx=1;
							}
							catch(err){}
							
							if(!alertx)
							{
								alert('Dữ liệu máy chủ trả về bị lỗi. Vui lòng thử lại.');
							}
							break;
						case 'error':
							alert('Lỗi máy chủ: '+errorThrown+'. Vui lòng thử lại.');
							break;
						default:
							alert('Xảy ra lỗi, vui lòng thử lại.');
					}
				}).always(function(){
					jQuery('#vtlaiReportLinkBox input,#vtlaiReportLinkBox select,#vtlaiReportLinkBox textarea').attr('disabled',false);
					jQuery('#reportLinkSubmit').removeClass('loading');
					jQuery('#reportLinkSubmit').val('Gửi thông báo');
				});
				return false;
			});
		}
		
		//--Reset title if report other postId
		if(resetTitle)
		{
			jQuery('#reportTitle').val('');
		}
		//--Reset content
		if(resetContent!='')
		{
			jQuery('#reportContent').val(resetContent);
		}
		//--Change reportPostId
		reportPostId=postId;
		//--Fix Box Location
		//fixReportLinkBox(false);
		jQuery('#vtlaiReportLinkBox').fadeIn('fast',function(){
			fixReportLinkBox();
		});
	}

	hideReportLinkBox=function()
	{
		if(jQuery('#vtlaiReportLinkBox').length>0)
		{
			jQuery('#vtlaiReportLinkBox').fadeOut('fast',function(){
				if(isReportComplete==true)
				{
					isReportComplete=false;
					reportPostId=0;
					//jQuery(this).remove();
				}
				jQuery(this).remove();
				if(jQuery('#vtlaiReportBoxOverlay').length>0)
				{
					jQuery('#vtlaiReportBoxOverlay').fadeOut('fast');
				}
			});
		}
	}
	
	moveReportLinkBox=function(top,go)
	{
		if(typeof go!='undefined')
		{
			jQuery('#vtlaiReportLinkBox').animate({'top':top},500);
		}
		else
		{
			clearTimeout(linkBoxTimmer);
			linkBoxTimmer=setTimeout('moveReportLinkBox('+top+',1)',200);
		}
	}
	
	fixReportLinkBox=function(animate)
	{
		if(jQuery('#vtlaiReportLinkBox').length>0 && jQuery('#vtlaiReportLinkBox').css('display')!='none')
		{
			var topMargin=40;
			var wHeight=jQuery(window).height();
			var wWidth=jQuery(window).width();
			var boxHeight=jQuery('#vtlaiReportLinkBox').height();
			jQuery('#vtlaiReportLinkBox').css('margin-top','0');
			if(typeof animate=='undefined' || animate==true)
				moveReportLinkBox(Math.floor((wHeight-topMargin-boxHeight)/2+topMargin));
				//jQuery('#vtlaiReportLinkBox').animate({'top':Math.floor((wHeight-40-boxHeight)/2+40)},500);
			else
				jQuery('#vtlaiReportLinkBox').css('top',Math.floor((wHeight-topMargin-boxHeight)/2+topMargin)+'px');
		}
	}
	validReportInfo=function(){
		if(jQuery('#reportReason').length>0 && jQuery.trim(jQuery('#reportReason').val())=='' && jQuery.trim(jQuery('#reportReasonMore').val())=='')
		{
			alert('Bạn chưa nhập lý do báo lỗi');
			jQuery('#reportReasonMore').focus();
			return false;
		}
		if(jQuery.trim(jQuery('#reportFullName').val())=='')
		{
			alert('Bạn chưa nhập tên đầy đủ của bạn');
			jQuery('#reportFullName').focus();
			return false;
		}
		if(jQuery.trim(jQuery('#reportEmail').val())=='')
		{
			alert('Bạn chưa nhập email của bạn, chúng tôi sẽ gửi thông báo sau khi link được fix');
			jQuery('#reportEmail').focus();
			return false;
		}
		var emailReg=/^[a-z0-9.!\#$%&\'*+-\/=?^_`{|}~]+@([0-9.]+|([^\s\'"<>@,;]+\.+[a-z]{2,6}))$/i
		if(!emailReg.test(jQuery.trim(jQuery('#reportEmail').val())))
		{
			alert('Email không hợp lệ, chúng tôi sẽ gửi thông báo sau khi link được fix');
			jQuery('#reportEmail').focus();
			return false;
		}
		if(jQuery('#reportContent').length>0 && jQuery.trim(jQuery('#reportContent').val())=='')
		{
			alert('Không có link nào trong nội dung thông báo. Vui lòng nhập danh sách các link bạn không tải được vào ô "Những link hỏng trong bài viết".');
			jQuery('#reportContent').focus();
			return false;
		}
		return true;
	}
	jQuery(window).resize(function(){
		fixReportLinkBox();
	});
	//--Add Report button to postbit
	var skipLinks=[
		'http://sinhvienit.net/@forum/',
		'http://sinhvienit.net/home/'
	];
	var internalLinks=[
		'http://sinhvienit.net/@forum/attachment'
	];
	skipThisLink=function(link)
	{
		for(var i=0;i<internalLinks.length;i++)
		{
			if(link.indexOf(internalLinks[i])!=-1)
				return false;
		}
		for(var i=0;i<skipLinks.length;i++)
		{
			if(link.indexOf(skipLinks[i])!=-1)
				return true;
		}
		return false;
	}
	jQuery('.postcontent.restore').each(function(){
		if(jQuery(this).find('a').length>0)
		{
			jQuery(this).css('position','relative');
			var parent=jQuery(this).parents('div[id^=post_message_]')[0];
			if(typeof parent!='undefined' && parent!=null)
			{
				var id=jQuery(parent).attr('id');
				if(typeof id!='undefined' && id!=null && id!='')
				{
					id=id.replace('post_message_','');
					jQuery(this).append('<div id="reportlink_control_'+id+'" class="reportlink_control"><a id="reportlink_btn_'+id+'" class="reportlink_btn" title="Báo link hỏng">Báo link hỏng</a></div>');
					jQuery('#reportlink_btn_'+id).click(function(){
						displayReportLinkBox(id);
					});
					//--Scroll
					jQuery(window).scroll(function(){
						var postOffset=jQuery('#post_'+id).offset();
						var postHeight=jQuery('#post_'+id).height();
						/* var controlOffset=jQuery('#reportlink_control_'+id).offset(); */
						var controlRight=Math.floor((jQuery(window).width()-jQuery('.bodywrapper').width())/2)+17;
						if(postOffset.top!=null)
						{
							var scrollTop=jQuery(document).scrollTop();
							if(scrollTop+40>=postOffset.top && (scrollTop<=postOffset.top+postHeight-78-45) && jQuery('#reportlink_control_'+id).css('display')=='none')
							{
								jQuery('#reportlink_control_'+id).fadeIn('fast',function(){
									jQuery(this).animate({'right':controlRight},500);
								});
							}
							else if((scrollTop+40<postOffset.top || (scrollTop>postOffset.top+postHeight-78-45)) && jQuery('#reportlink_control_'+id).css('display')!='none')
							{
								jQuery('#reportlink_control_'+id).fadeOut('fast');
								
							}
							/* if(scrollTop+40>=postOffset.top && (scrollTop<=postOffset.top+postHeight-78) && jQuery('#reportlink_control_'+id).css('position')!='fixed')
							{
								jQuery('#reportlink_control_'+id).css('position','fixed');
								jQuery('#reportlink_control_'+id).css('top','45px');
								jQuery('#reportlink_control_'+id).css('left',Math.floor(controlOffset.left)+'px');
								jQuery('#reportlink_control_'+id).css('right','auto');
								
							}
							else if((scrollTop>postOffset.top+postHeight-78) && jQuery('#reportlink_control_'+id).css('position')=='fixed')
							{
								
								jQuery('#reportlink_control_'+id).css('position','absolute');
								jQuery('#reportlink_control_'+id).css('top','5px');
								jQuery('#reportlink_control_'+id).css('left','auto');
								jQuery('#reportlink_control_'+id).css('right','5px');
								jQuery('#reportlink_control_'+id).css('display','inline-block');
								
							}
							else if(scrollTop+40<postOffset.top && jQuery('#reportlink_control_'+id).css('position')=='fixed')
							{
								jQuery('#reportlink_control_'+id).css('position','absolute');
								jQuery('#reportlink_control_'+id).css('top','5px');
								jQuery('#reportlink_control_'+id).css('left','auto');
								jQuery('#reportlink_control_'+id).css('right','5px');
							} */
						}
						
					});
				}
			}
		}
	});
	
	//--Update Function
	displayUpdateLinkBox=function(postId)
	{
		var reportId=jQuery('#brokenlink_'+postId).val();
		if(typeof reportId=='undefined')
		{
			alert('Không tìm thấy reportId');
			return false;
		}
		jQuery('#reportlink_control_'+reportPostId).remove();
		jQuery('#reportlink_control_'+postId).fadeOut('fast',function(){
			jQuery('body').append('<div id="vtlaiReportBoxOverlay"></div>');
			jQuery('body').append('<div id="vtlaiReportLinkBox"><h4>Gửi Email thông báo link đã Fix<a class="close" title="Đóng cửa sổ">X</a></h4><div id="reportContentBox">\
			<center><img border="0" src="images/misc/progress.gif" align="absmiddle" /> Đang tải dữ liệu....</center>\
			</div></div>');
			//--Close button
			jQuery('#vtlaiReportLinkBox .close,#vtlaiReportBoxOverlay').click(function(){
				hideReportLinkBox();
			});
			jQuery('#vtlaiReportBoxOverlay').fadeIn('fast',function(){
				jQuery('#vtlaiReportLinkBox').fadeIn('fast',function(){
					fixReportLinkBox();
					jQuery.ajax({
						'url': 'vtlai_report_broken_link.php',
						'type': 'POST',
						'dataType': 'JSON',
						'data': {'do':'sendFixedEmail','securitytoken':SECURITYTOKEN,'reportid':reportId}
					}).done(function(data){
						if(data.ok)
						{
							var message='<center>Đã cập nhật trạng thái.</center>';
							if(typeof data.message!='undefined')
								message='<center>'+data.message+'</center>';
							jQuery('#reportContentBox').html(message);
							if(jQuery('#brokenlink_'+reportPostId).length>0)
							{
								jQuery('#brokenlink_'+reportPostId).remove();
							}
						}
						else if(typeof data.errors!='undefined')
						{
							alert('Lỗi: \n- '+data.errors.join('\n- '));
						}
						else
						{
							alert('Dữ liệu máy chủ trả về bị lỗi. Vui lòng thử lại.');
							console.log(data);
						}
					}).fail(function(jqXHR, textStatus, errorThrown){
						console.log(jqXHR);
						switch(textStatus)
						{
							case 'timeout':
								alert('Không nhận được trả lời từ máy chủ. Vui lòng thử lại.');
								break;
							case 'parsererror':
								var alertx=0;
								try{
									var dataXML=jQuery.parseXML(jqXHR.responseText);
									alert('Lỗi: \n'+dataXML.getElementsByTagName('error')[0].childNodes[0].nodeValue);
									alertx=1;
								}
								catch(err){}
								
								if(!alertx)
								{
									alert('Dữ liệu máy chủ trả về bị lỗi. Vui lòng thử lại.');
								}
								break;
							case 'error':
								alert('Lỗi máy chủ: '+errorThrown+'. Vui lòng thử lại.');
								break;
							default:
								alert('Xảy ra lỗi, vui lòng thử lại.');
						}
					}).always(function(){
						
					});
				});
			});
		});
		
	}
	//--Add Updatelink button
	if((typeof reportLinkPermission.canUpdateStatus !='undefined') && reportLinkPermission.canUpdateStatus)
	{
		jQuery('*[id^=brokenlink_]').each(function(){
			var postId=jQuery(this).attr('id').replace('brokenlink_','');
			jQuery('#reportlink_control_'+postId).append('<a id="updatelink_btn_'+postId+'" class="updatelink_btn" title="Nếu link đã được fix, click vào đây để cập nhật và thông báo cho thành viên">Link đã được fix</a>');
			jQuery('#updatelink_btn_'+postId).click(function(){
				if(confirm('Bạn có chắc chắn bài viết này đã được Fix link không ?'))
				{
					displayUpdateLinkBox(postId);
				}
				return false;
			});
		});
	}
});