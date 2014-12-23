/* General functions and calls */
;(function($) {
	var $body = $('body');

	$body.removeClass('no-js');
	
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 313) { 
			$('.page-nav').addClass('fixed'); 
		} else { 
			$('.page-nav').removeClass('fixed'); 
		}
	});
	
})(window.jQuery);
