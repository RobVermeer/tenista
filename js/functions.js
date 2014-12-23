/* General functions and calls */
;(function($) {
	var $body = $('body');

	$body.removeClass('no-js');
	
	var viewportWidth = $(window).width();
	
	if (viewportWidth > 992) {
		$(window).scroll(function(){ 
			if ($(this).scrollTop() > 313) { 
				$('.page-nav ul').addClass('fixed'); 
			} else { 
				$('.page-nav ul').removeClass('fixed'); 
			}
		});
	}
	
})(window.jQuery);
