<?php if( has_children() ) : ?>
	<nav class="col-xs-12 col-sm-3 page-nav">
		<div class="button-wrap" data-toggle="collapse" data-target=".page-nav-item">
			<button class="navbar-toggle collapsed btn btn-default visible-xs" type="button">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<?php $children = get_the_children(); ?>
		<ul>
			<?php foreach( $children as $child ) : ?>
				<li class="page-nav-item" <?php echo (get_the_ID() == $child->ID ? 'class="current-item"' : ''); ?>><a href="<?php echo get_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>
<?php endif; ?>