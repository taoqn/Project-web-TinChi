//--Code by: Vũ Thanh Lai - SinhVienIT.Net
jQuery(document).ready(function(){
	jQuery('.signature font').each(function(){
	var fsize=parseInt(jQuery(this).attr('size'));
	if(fsize>2)
		jQuery(this).attr('size','2');
	});
	jQuery(this).css('opacity','.5');
});
