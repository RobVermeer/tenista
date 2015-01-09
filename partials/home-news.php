<?php
$news = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'meta_query' => array(
		array(
			'key' => 'featured',
			'value' => array(1),
			'compare' => 'NOT EXISTS'
		)
	)
));
?>
<aside class="col-xs-12 col-sm-4 sidebar">
	<h3><?php _e('Nieuws', 'rm'); ?></h3>
	<?php if( $news->have_posts() ) while( $news->have_posts() ) : $news->the_post(); ?>
		<div class="news-item">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<?php if( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-wide'); ?></a>
			<?php endif; ?>
			<?php the_content(); ?>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
</aside>