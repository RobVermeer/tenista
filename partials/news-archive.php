<div class="col-xs-12 col-sm-9 news-archive">
	<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
		<article class="news-item">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_content(__('Lees meer', 'rm')); ?>
		</article>
	<?php endwhile; ?>
</div>