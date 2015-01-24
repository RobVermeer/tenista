/* General functions and calls */
;(function($) {
	var $body = $('body'),
		$signup = $('.form-signup');

	$body.removeClass('no-js');
	
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 313) { 
			$('.page-nav ul').addClass('fixed'); 
		} else { 
			$('.page-nav ul').removeClass('fixed'); 
		}
	});
	
	$(".page-nav .button-wrap").click(function() {
		$(this).fadeOut(function() {	
			$(this).remove()	
		});
	});
	
	$signup.on('submit', validate_signup);
	
	function validate_signup( e ) {
		var error = false;
		
		$signup.find('.has-error').removeClass('has-error');
		
		$signup.find('.required').each(function( i, el ) {
			var $el = $(el);
			
			if( ! $el.val() ) {
				$el.parents('.form-group').addClass('has-error');
				error = true;
			}
		});
		
		$signup.find('.required-radio').each(function( i, el ) {
			var $el = $(el).find('[name]');
			
			if( ! $el.is(':checked') ) {
				$el.parents('.form-group').addClass('has-error');
				error = true;
			}
		});
		
		if( error ) {
			newAlert('.alert-area', 'danger', 'Vul alle verplichte velden in');
			e.preventDefault();
		}
	}
	
	function newAlert(area, type, message) {
		$(area).find('.alert').remove();
		$(area).append($("<div class='alert alert-" + type + "'><p> " + message + " </p></div>"));
		$(".alert").delay(3000).fadeOut("slow", function () {
			$(this).remove();
		});
	}

	
})(window.jQuery);
