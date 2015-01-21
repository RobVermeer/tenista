<header class="row header">
	<div class="col-xs-12 header-img">
		<img class="visible-xs headermobile" src="<?php bloginfo('template_url'); ?>/img/headermobile.png" />
		<a class="visible-xs mobile-hp-link" href="<?php bloginfo('url'); ?>"></a>
		<div class="hidden-xs desktop-header"><a href="<?php bloginfo('url'); ?>"></a></div>
		<div class="cta hidden-xs">
			<a href="/inschrijven" class="btn btn-default"><?php _e('Word nu lid!', 'rm'); ?></a>
			<nav>
				<a href="/contact"><?php _e('Amsterdam', 'rm'); ?></a> | <a href="mailto:info@tenista.nl"><?php _e('info@tenista.nl', 'rm'); ?></a>
			</nav>
		</div>
		<button class="navbar-toggle collapsed btn btn-default" type="button" data-toggle="collapse" data-target=".header-menu">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<nav class="col-xs-12 header-menu collapse">
		<?php wp_nav_menu(array('theme_location' => 'header', 'menu_id' => '', 'container' => '', 'container_class' => 'clearfix', 'fallback_cb' => '', 'depth' => 1)); ?>
	</nav>
</header>