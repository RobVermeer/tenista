<?php
$blog_id = get_option('page_for_posts');
$news = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => 4,
	'meta_query' => array(
		array(
			'key' => 'featured',
			'value' => 1,
			'compare' => 'NOT EXISTS'
		)
	)
));
?>
<aside class="col-xs-12 col-sm-4 sidebar">
	<h3><a href="<?php echo get_permalink($blog_id); ?>"><?php _e('Nieuws', 'rm'); ?></a></h3>
	<?php if( $news->have_posts() ) while( $news->have_posts() ) : $news->the_post(); ?>
		<?php $url = (get_post_meta(get_the_ID(), 'url', true) ? get_post_meta(get_the_ID(), 'url', true) : get_permalink()); ?>
		<div class="news-item">
			<h4><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h4>
			<?php if( has_post_thumbnail() ) : ?>
				<a href="<?php echo $url; ?>"><?php the_post_thumbnail('thumbnail-wide'); ?></a>
			<?php endif; ?>
			<?php echo strip_tags(get_the_content()); ?>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
</aside>