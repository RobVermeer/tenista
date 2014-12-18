<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
	<article class="entry col-xs-12 col-sm-9">
		<h1><?php the_title(); ?></h1>
		<h6><?php _e('Gepost op', 'rm'); ?> <?php the_time('j M Y'); ?> <?php _e('om', 'rm'); ?> <?php the_time('H:i'); ?> <?php _e('door', 'rm'); ?> <?php the_author(); ?></h6>
		<?php the_content(); ?>
	</article>
<?php endwhile; ?>
