<div class="col-xs-12 col-sm-8">
	<?php get_template_part('partials/home', 'slider'); ?>
	
	<article class="entry">
		<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</article>
</div>