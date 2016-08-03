<div class="col-xs-12">
	<?php if( have_posts() ) while( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<div class="col-xs-12 col-sm-3 col-sm-push-9 entry">
	<p>Het lidmaatschap duurt van september tot september en de contributie bedraagt:</p>
	<table class="table">
		<thead>
			<tr>
				<td style="width: 400px;">Gehele jaar:</td>
				<td>€150</td>
			</tr>
			<tr>
				<td>Vanaf april:</td>
				<td>€135</td>
			</tr>
		</thead>
	</table>
	<p>Voor vragen kan je mailen naar <a href="mailto:info@tenista.nl">info@tenista.nl</a>.</p>
</div>
<div class="col-xs-12 col-sm-9 col-sm-pull-3 entry">
	<form class="form-horizontal form-signup" method="post">
		<div class="form-group">
			<label class="col-sm-3 control-label" for="naam">Naam</label>
			<div class="col-sm-9">
				<input id="voornaam" class="form-control required" type="text" name="naam" placeholder="Naam">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="email">Email</label>
			<div class="col-sm-9">
				<input id="email" class="form-control required" type="email" name="email" placeholder="Email">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-sm-offset-3">
				<input type="text" name="website" id="website" class="hide">
				<input type="hidden" name="action" value="form_signup_compact">
				<button class="btn btn-primary" type="submit">Verzenden</button>
			</div>
		</div>
	</form>
	<div class="alert-area"></div>
</div>
