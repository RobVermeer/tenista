/* General functions and calls */
;(function($) {
	var $body = $('body');

	$body.removeClass('no-js');
	
	var viewportWidth = $(window).width();
	
	if (viewportWidth > 992) {
		$body.append(" <div class='fixed-bg'><img src='http://tenista.robvermeer.nl/wp-content/themes/tenista/img/IMG_2223.JPG' /></div> ");
		
		$(window).scroll(function(){ 
			if ($(this).scrollTop() > 313) { 
				$('.page-nav ul').addClass('fixed'); 
			} else { 
				$('.page-nav ul').removeClass('fixed'); 
			}
		});
	}
	
})(window.jQuery);
