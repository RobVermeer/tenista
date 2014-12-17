<?php

/* NO admin bar */
show_admin_bar( false );
add_filter('show_admin_bar', '__return_false');  

/* Add RSS links to <head> section */
add_theme_support( 'automatic-feed-links' );

/* Clean up the <head> */
function removeHeadLinks() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'index_rel_link' );
}
add_action('init', 'removeHeadLinks');

/* Remove head styles */
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'my_remove_recent_comments_style');

?>