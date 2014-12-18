<?php

/* Register sidebars */
function rm_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'news',
			'name' => __('Nieuws', 'rm'),
			'description' => __('Sidebar voor nieuws', 'rm'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		)
	);
}
add_action('widgets_init', 'rm_register_sidebars');

?>