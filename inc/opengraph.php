<?php

function add_opengraph_tags() {
	global $post;
	
	$seo_title = (is_singular() ? get_post_meta(get_the_ID(), 'seo_title', true) : false);
	$seo_description = (is_singular() ? get_post_meta(get_the_ID(), 'seo_description', true) : false);
	
	$title = (is_singular() && ! is_home() && ! is_front_page() ? get_the_title() : get_bloginfo('name'));
	$description = (is_singular() && ! is_home() && ! is_front_page() ? trunc_chars(strip_tags(preg_replace('/\s+/', ' ', preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $post->post_content))), 200, '...') : get_bloginfo('description'));

	$title = ($seo_title ? $seo_title : $title);
	$description = ($seo_description ? $seo_description : $description);

	$img = (is_singular() && ! is_home() && ! is_front_page() ? wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID() ), 'medium') : get_bloginfo('template_url') . '/img/og-image.png');
	$img = (is_singular() && ! is_home() && ! is_front_page() ? ($img && isset($img[0]) ? $img[0] : get_bloginfo('template_url') . '/img/og-image.png') : $img);
	?>
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:image" content="<?php echo $img; ?>" />
	<meta property="og:type" content="<?php echo (is_singular() && ! is_home() && ! is_front_page() ? "article" : "website"); ?>" />
	<meta property="og:url" content="<?php echo (is_singular() && ! is_home() && ! is_front_page() ? get_permalink() : get_bloginfo('url')); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo("name"); ?>" />
	<?php
}
add_action("wp_head", "add_opengraph_tags");

?>