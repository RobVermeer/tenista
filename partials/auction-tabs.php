<?php
$court1 = new WP_Query(array(
	'post_type' => 'auction',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key' => 'court',
			'value' => array(1),
			'compare' => 'IN',
		)
	),
	'order' => 'ASC'
));
$court2 = new WP_Query(array(
	'post_type' => 'auction',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key' => 'court',
			'value' => array(2),
			'compare' => 'IN',
		)
	),
	'order' => 'ASC'
));
$court3 = new WP_Query(array(
	'post_type' => 'auction',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key' => 'court',
			'value' => array(3),
			'compare' => 'IN',
		)
	),
	'order' => 'ASC'
));
$court4 = new WP_Query(array(
	'post_type' => 'auction',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key' => 'court',
			'value' => array(4),
			'compare' => 'IN',
		)
	),
	'order' => 'ASC'
));

$set = array(0, 0, 0, 0);
?>
<div class="col-xs-12">
	<div class="tabs-auction">
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#overzicht" data-toggle="tab">Overzicht</a></li>
			<li><a href="#baan-1" data-toggle="tab">Baan 1</a></li>
			<li><a href="#baan-2" data-toggle="tab">Baan 2</a></li>
			<li><a href="#baan-3" data-toggle="tab">Baan 3</a></li>
			<li><a href="#baan-4" data-toggle="tab">Baan 4</a></li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="overzicht">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<table class="table table-hover">
							<tr>
								<th>Baan</th>
								<th>Naam</th>
								<th>Huidige bod</th>
							</tr>
							<tr>
								<td>1</td>
								<?php if( $court1->have_posts() ) : ?>
									<?php $bod = get_post_meta($court1->posts[(count($court1->posts) - 1)]->ID, 'bod', true); ?>
									<?php $set[0] = $bod; ?>
									<td><?php echo get_post_meta($court1->posts[(count($court1->posts) - 1)]->ID, 'name', true); ?></td>
									<td><?php echo $bod; ?> euro</td>
								<?php else : ?>
									<td>Nog geen biedingen</td>
									<td></td>
								<?php endif; ?>
							</tr>
							<tr>
								<td>2</td>
								<?php if( $court2->have_posts() ) : ?>
									<?php $bod = get_post_meta($court2->posts[(count($court2->posts) - 1)]->ID, 'bod', true); ?>
									<?php $set[1] = $bod; ?>
									<td><?php echo get_post_meta($court2->posts[(count($court2->posts) - 1)]->ID, 'name', true); ?></td>
									<td><?php echo $bod; ?> euro</td>
								<?php else : ?>
									<td>Nog geen biedingen</td>
									<td></td>
								<?php endif; ?>
							</tr>
							<tr>
								<td>3</td>
								<?php if( $court3->have_posts() ) : ?>
									<?php $bod = get_post_meta($court3->posts[(count($court3->posts) - 1)]->ID, 'bod', true); ?>
									<?php $set[2] = $bod; ?>
									<td><?php echo get_post_meta($court3->posts[(count($court3->posts) - 1)]->ID, 'name', true); ?></td>
									<td><?php echo $bod; ?> euro</td>
								<?php else : ?>
									<td>Nog geen biedingen</td>
									<td></td>
								<?php endif; ?>
							</tr>
							<tr>
								<td>4</td>
								<?php if( $court4->have_posts() ) : ?>
									<?php $bod = get_post_meta($court4->posts[(count($court4->posts) - 1)]->ID, 'bod', true); ?>
									<?php $set[3] = $bod; ?>
									<td><?php echo get_post_meta($court4->posts[(count($court4->posts) - 1)]->ID, 'name', true); ?></td>
									<td><?php echo $bod; ?> euro</td>
								<?php else : ?>
									<td>Nog geen biedingen</td>
									<td></td>
								<?php endif; ?>
							</tr>
						</table>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="chart-container">
							<canvas class="chart" data-type="bar" data-labels='["Baan 1", "Baan 2", "Baan 3", "Baan 4"]' data-set="[<?php echo implode(',', $set); ?>]" width="400" height="400"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="baan-1">
				<?php if( $court1->have_posts() ) : ?>
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<table class="table table-hover">
								<tr>
									<th>Naam</th>
									<th>Bod</th>
								</tr>
								<?php $data = array(); while( $court1->have_posts() ) : $court1->the_post(); ?>
									<?php $bod = get_post_meta(get_the_ID(), 'bod', true); ?>
									<?php $data[] = $bod; ?>
									<tr>
										<td><?php echo get_post_meta(get_the_ID(), 'name', true); ?></td>
										<td><?php echo $bod; ?> euro</td>
									</tr>
								<?php endwhile; ?>
							</table>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="chart-container">
								<canvas class="chart" data-type="line" data-labels="[<?php echo implode(',', range(0, count($data))); ?>]" data-set="[0,<?php echo implode(',', $data); ?>]" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="alert alert-info" role="alert"><strong>Nog geen biedingen</strong> Jij kan de eerste zijn!</div>
				<?php endif; ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="baan-2">
				<?php if( $court2->have_posts() ) : ?>
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<table class="table table-hover">
								<tr>
									<th>Naam</th>
									<th>Bod</th>
								</tr>
								<?php $data = array(); while( $court2->have_posts() ) : $court2->the_post(); ?>
									<?php $bod = get_post_meta(get_the_ID(), 'bod', true); ?>
									<?php $data[] = $bod; ?>
									<tr>
										<td><?php echo get_post_meta(get_the_ID(), 'name', true); ?></td>
										<td><?php echo $bod; ?> euro</td>
									</tr>
								<?php endwhile; ?>
							</table>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="chart-container">
								<canvas class="chart" data-type="line" data-labels="[<?php echo implode(',', range(0, count($data))); ?>]" data-set="[0,<?php echo implode(',', $data); ?>]" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="alert alert-info" role="alert"><strong>Nog geen biedingen</strong> Jij kan de eerste zijn!</div>
				<?php endif; ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="baan-3">
				<?php if( $court3->have_posts() ) : ?>
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<table class="table table-hover">
								<tr>
									<th>Naam</th>
									<th>Bod</th>
								</tr>
								<?php $data = array(); while( $court3->have_posts() ) : $court3->the_post(); ?>
									<?php $bod = get_post_meta(get_the_ID(), 'bod', true); ?>
									<?php $data[] = $bod; ?>
									<tr>
										<td><?php echo get_post_meta(get_the_ID(), 'name', true); ?></td>
										<td><?php echo $bod; ?> euro</td>
									</tr>
								<?php endwhile; ?>
							</table>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="chart-container">
								<canvas class="chart" data-type="line" data-labels="[<?php echo implode(',', range(0, count($data))); ?>]" data-set="[0,<?php echo implode(',', $data); ?>]" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="alert alert-info" role="alert"><strong>Nog geen biedingen</strong> Jij kan de eerste zijn!</div>
				<?php endif; ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="baan-4">
				<?php if( $court4->have_posts() ) : ?>
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<table class="table table-hover">
								<tr>
									<th>Naam</th>
									<th>Bod</th>
								</tr>
								<?php $data = array(); while( $court4->have_posts() ) : $court4->the_post(); ?>
									<?php $bod = get_post_meta(get_the_ID(), 'bod', true); ?>
									<?php $data[] = $bod; ?>
									<tr>
										<td><?php echo get_post_meta(get_the_ID(), 'name', true); ?></td>
										<td><?php echo $bod; ?> euro</td>
									</tr>
								<?php endwhile; ?>
							</table>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="chart-container">
								<canvas class="chart" data-type="line" data-labels="[<?php echo implode(',', range(0, count($data))); ?>]" data-set="[0,<?php echo implode(',', $data); ?>]" width="400" height="400"></canvas>
							</div>
						</div>
					</div>
				<?php else : ?>
					<div class="alert alert-info" role="alert"><strong>Nog geen biedingen</strong> Jij kan de eerste zijn!</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>