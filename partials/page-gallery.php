<article class="entry col-xs-12 <?php echo (has_children() ? 'col-sm-9' : ''); ?>">
	<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
	
	<?php if( ! post_password_required() ) : ?>
		<?php $images = get_posts(array('post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => get_the_ID())); ?>
		<?php if( $images ) : ?>
			<div class="row gallery">
				<?php foreach( $images as $img ) : ?>
					<?php $thumbnail = wp_get_attachment_image_src($img->ID, 'thumbnail-wide'); ?>
					<?php $full = wp_get_attachment_image_src($img->ID, 'full'); ?>
					<div class="col-xs-6 col-md-4">
						<a href="<?php echo $full[0]; ?>" rel="gallery" title="<?php echo $img->post_title; ?>"><img src="<?php echo $thumbnail[0]; ?>" class="img-responsive"></a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</article>
