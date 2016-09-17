<div class="col-xs-12">
	<?php if( isset($_GET['msg']) && $_GET['msg'] == 'pending' ) : ?>
		<div class="alert alert-info" role="alert"><strong>Bedankt!</strong> Je kunt je bod bevestigen via de zojuist verzonden e-mail! (Controleer eventueel ook je spambox)</div>
	<?php elseif( isset($_GET['msg']) && $_GET['msg'] == 'success' ) : ?>
		<div class="alert alert-success" role="alert"><strong>Bedankt!</strong> Je bod staat genoteerd!</div>
	<?php endif; ?>
	<form class="form-horizontal form-auction" method="post">
		<div class="form-group">
			<div class="col-xs-12 col-sm-5 col-md-4">
				<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Naam">
			</div>
			<div class="col-xs-12 col-sm-5 col-md-4">
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail adres">
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 col-sm-5 col-md-4">
				<select class="form-control" name="baan" id="baan">
					<option value="1">Baan 1</option>
					<option value="2">Baan 2</option>
					<option value="3">Baan 3</option>
					<option value="4">Baan 4</option>
				</select>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-4">
				<?php for( $i=1; $i<=4; $i++ ) : ?>
					<?php $options = get_bid_options($i); ?>
					<select class="form-control bod-select <?php echo ($i > 1 ? 'hide' : ''); ?>" name="bod-<?php echo $i; ?>" id="bod-<?php echo $i; ?>">
						<?php foreach( $options as $option ) : ?>
							<option value="<?php echo $option; ?>"><?php echo $option; ?> euro</option>
						<?php endforeach; ?>
					</select>
				<?php endfor; ?>
			</div>
			<div class="col-xs-12 col-sm-2 col-md-4">
				<input type="hidden" name="action" value="add_bid">
				<input type="hidden" name="post_id" value="<?php the_ID(); ?>">
				<button class="btn btn-primary">Doe bod!</button>
			</div>
		</div>
		<?php if( isset($_GET['msg']) && $_GET['msg'] == 'error' ) : ?>
			<div class="alert alert-danger" role="alert"><strong>Er ging iets fout</strong> Vul het formulier helemaal in.</div>
		<?php endif; ?>
	</form>
</div>