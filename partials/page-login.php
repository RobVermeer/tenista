<?php global $post; $id = (empty( $post->ID ) ? rand() : $post->ID); ?>
<form class="form" action="<?php echo esc_url(site_url('wp-login.php?action=postpass', 'login_post')); ?>" method="post">
	<p><?php _e('We laten je graag genieten van foto&apos;s van onze activiteiten, maar omdat sommige foto&apos;s te genant zijn voor de buitenwereld willen we eerst zeker weten dat je lid bent voordat je toegang krijgt. Log daarom in met je geheime wachtwoord.', 'rm'); ?></p>
	<div class="form-group">
		<label for="pwbox-<?php echo $id; ?>"><?php _e('Wachtwoord', 'rm'); ?></label>
		<input class="form-control" type="password" name="post_password" id="pwbox-<?php echo $id; ?>" placeholder="<?php _e('Wachtwoord', 'rm'); ?>">
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="<?php _e('Inloggen', 'rm'); ?>">
	</div>
	<?php if( wp_get_referer() == get_permalink() && isset ($_COOKIE[ 'wp-postpass_' . COOKIEHASH ]) ) : ?>
		<div class="alert alert-danger alert-dismissible fade in">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php _e('Wachtwoord incorrect', 'rm'); ?>
		</div>
	<?php endif; ?>
</form>
