<?php

function register_styles() {
	$deps = array();
	
	/* Add bootstrap stylesheet *
	$url = get_bloginfo('stylesheet_directory') . '/css/bootstrap.min.css';
	$file = get_template_directory() . '/css/bootstrap.min.css';
	wp_enqueue_style('bootstrap', $url, $deps, filemtime($file));
	
	/* Add theme stylesheet */
	$url = get_bloginfo('stylesheet_directory') . '/css/style.css';
	$file = get_template_directory() . '/css/style.css';
	wp_enqueue_style('style', $url, $deps, filemtime($file));
}
add_action('wp_enqueue_scripts', 'register_styles');

?>