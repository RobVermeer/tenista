<?php if( has_children() ) : ?>
	<nav class="col-xs-12 col-sm-3 page-nav">
		<button class="navbar-toggle collapsed btn btn-default visible-xs" type="button" data-toggle="collapse" data-target=".page-nav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php $children = get_the_children(); ?>
		<ul>
			<?php foreach( $children as $child ) : ?>
				<li <?php echo (get_the_ID() == $child->ID ? 'class="current-item"' : ''); ?>><a href="<?php echo get_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</nav>
<?php endif; ?>