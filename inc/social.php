<?php

function add_twitter_js() {
	?>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<?php
}
add_action('wp_footer', 'add_twitter_js');

function add_facebook_js() {
	?>
	<div id="fb-root"></div>
	<script>
	window.fbAsyncInit = function() {
		FB.Event.subscribe("xfbml.render", function(response) {
			$(".social-share").addClass("loaded");
		});
	};
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=406084982824322&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<?php
}
add_action('wp_footer', 'add_facebook_js');

?>