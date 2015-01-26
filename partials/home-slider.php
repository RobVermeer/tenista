<?php
$featured = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => -1,
	'post__not_in' => get_option('sticky_posts'),
	'meta_query' => array(
		array(
			'key' => 'featured',
			'value' => array(1)
		)
	)
));
?>
<?php if( $featured->have_posts() ) : ?>
<div id="featured-carousel" class="carousel slide" data-ride="carousel">
	<?php if( $featured->found_posts > 1 ) : ?>
		<ol class="carousel-indicators">
			<?php for( $i = 0; $i < $featured->found_posts; $i++ ) : ?>
				<li data-target="#featured-carousel" data-slide-to="<?php echo $i; ?>" <?php if( $i == 0 ) : ?>class="active"<?php endif; ?>></li>
			<?php endfor; ?>
		</ol>
	<?php endif; ?>

	<div class="carousel-inner" role="listbox">
		<?php $i = 0; while( $featured->have_posts() ) : $featured->the_post(); $i++; ?>
			<?php $url = (get_post_meta(get_the_ID(), 'url', true) ? get_post_meta(get_the_ID(), 'url', true) : get_permalink()); ?>
			<div class="item <?php if( $i == 1 ) : ?>active<?php endif; ?>">
				<a href="<?php echo $url; ?>"><?php the_post_thumbnail('thumbnail-wide'); ?></a>
				<div class="carousel-caption">
					<h3><?php the_title(); ?></h3>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>

	<?php if( $featured->found_posts > 1 ) : ?>
		<a class="left carousel-control" href="#featured-carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#featured-carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	<?php endif; ?>
</div>
<?php endif; ?>