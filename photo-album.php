<?php /* Template name: Foto album */ ?>
<?php get_header(); ?>

	<section class="row content">
		<div class="col-xs-12">
			<div class="content-album">
			<div class="row">
				<?php get_template_part('partials/page', 'nav'); ?>
				
				<?php get_template_part('partials/page', 'gallery'); ?>
			</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>