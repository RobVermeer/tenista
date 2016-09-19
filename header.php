<!doctype html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class("no-js"); ?>>
	<?php do_action('after_body'); ?>
	
	<div class="fixed-bg"></div>
	<div class="container">
		<div class="page-border-top"></div>
		<div class="miniman">
			<img src="<?php bloginfo('template_url'); ?>/img/miniman.png" />
		</div>
		<?php get_template_part('partials/header', 'nav'); ?>
