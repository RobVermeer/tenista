<footer class="row footer">
	<div class="col-xs-12">
		<div class="inner">
			<div class="row">
				<nav class="col-xs-12 col-sm-8 logos">
					<a href="http://www.sportcentrum.vu.nl/"><img src="<?php bloginfo('template_url'); ?>/img/vu.png" alt="<?php _e('Sportcentrum VU', 'rm'); ?>"></a>
					<a href="http://www.studentensportamsterdam.nl/"><img src="<?php bloginfo('template_url'); ?>/img/ssa.png" alt="<?php _e('Studentensport Amsterdam', 'rm'); ?>"></a>
				</nav>
				<div class="col-xs-12 col-sm-4 info">
					<span>&copy; <?php bloginfo('name'); ?> <?php echo date_i18n('Y', current_time('timestamp')); ?></span><br>
					<?php _e('Studententennis<br>Amsterdam<br>', 'rm'); ?>
					<a href="mailto:info@tenista.nl"><?php _e('info@tenista.nl', 'rm'); ?></a>
				</div>
			</div>
		</div>
	</div>
</footer>