<?php

function change_password_form() {
	remove_filter('the_content', 'wpautop');
	ob_start();
	get_template_part('partials/page', 'login');
 	$out = ob_get_contents();
	ob_end_clean();
	
	return $out;
}
add_filter('the_password_form', 'change_password_form');

function change_password_title($title) {
	return '%s';
}
add_filter('protected_title_format', 'change_password_title');

?>