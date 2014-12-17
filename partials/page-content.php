<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
	<article class="entry col-xs-12 <?php echo (has_children() ? 'col-sm-9' : ''); ?>">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</article>
<?php endwhile; ?>
