<?php /* Template name: Auction */ ?>
<?php get_header(); ?>

	<section class="row content">
		<?php get_template_part('partials/page', 'nav'); ?>
		
		<?php get_template_part('partials/page', 'content'); ?>

		<?php get_template_part('partials/auction', 'form'); ?>

		<?php get_template_part('partials/auction', 'tabs'); ?>
	</section>

<?php get_footer(); ?>