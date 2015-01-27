<article class="entry col-xs-12">
	<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
	
	<?php $children = get_pages(array('child_of' => get_the_ID(), 'sort_column' => 'post_date', 'sort_order' => 'DESC')); ?>
	<?php if( $children ) : ?>
		<div class="row gallery">
			<?php foreach( $children as $child ) : ?>
				<div class="col-xs-6 col-md-4">
					<div class="gallery-item">
						<a href="<?php echo get_permalink($child->ID); ?>"><?php echo get_the_post_thumbnail($child->ID, 'thumbnail-small', array('class' => 'img-responsive')); ?></a>
						<h4><a href="<?php echo get_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></h4>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</article>
