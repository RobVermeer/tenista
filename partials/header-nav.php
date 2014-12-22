<header class="row header">
	<div class="col-xs-12 header-img">
		<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/header.png"></a>
		<div class="cta">
			<a href="#" class="btn btn-default"><?php _e('Word nu lid!', 'rm'); ?></a>
			<nav>
				<?php _e('Amsterdam', 'rm'); ?> | <a href="mailto:info@tenista.nl"><?php _e('info@tenista.nl', 'rm'); ?></a>
			</nav>
		</div>
	</div>
	<nav class="col-xs-12">
		<?php wp_nav_menu(array('theme_location' => 'header', 'menu_id' => '', 'container' => '', 'container_class' => '', 'fallback_cb' => '', 'depth' => 1)); ?>
	</nav>
</header>