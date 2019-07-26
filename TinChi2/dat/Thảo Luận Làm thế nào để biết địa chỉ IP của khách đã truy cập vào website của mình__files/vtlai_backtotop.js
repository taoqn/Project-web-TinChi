jQuery(document).ready(function(){
	jQuery('.backtotop').click(function(){
				jQuery('body,html').animate({
					scrollTop: 0
				}, 500);
				return false;
	});
});