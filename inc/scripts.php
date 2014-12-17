<?php

/* Register all scripts */
function register_scripts() {
	$deps = array();

	/* No l10n.js */
	wp_deregister_script( 'l10n' );
	
	/* No default jQuery */
	wp_deregister_script('jquery');
	
	/* jQuery via Google CDN */
	wp_enqueue_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null, true);
	$deps[] = 'jquery';

	/* Add Bootstrap javascript */
	$url = get_bloginfo('stylesheet_directory') . '/js/bootstrap.min.js';
	$file = get_template_directory() . '/js/bootstrap.min.js';
	wp_enqueue_script('bootstrap-js', $url, $deps, filemtime($file), true);
	$deps[] = 'bootstrap-js';

	/* Add functions javascript */
	$deps = array('jquery');
	$url = get_bloginfo('stylesheet_directory') . '/js/functions.js';
	$file = get_template_directory() . '/js/functions.js';
	wp_enqueue_script('functions-js', $url, $deps, filemtime($file), true);
}
add_action('wp_enqueue_scripts', 'register_scripts');

?>