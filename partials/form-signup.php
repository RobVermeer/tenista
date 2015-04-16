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
				<td>€170</td>
			</tr>
			<tr>
				<td>Vanaf april:</td>
				<td>€135</td>
			</tr>
		</thead>
	</table>
	<p>De contributie maak je over naar:<br><strong>NL80 INGB 0005 4483 31 t.a.v. SVU Tenista<br>O.v.v. naam en contributie</strong></p>
	<p>Voor vragen kan je mailen naar <a href="mailto:info@tenista.nl">info@tenista.nl</a>.</p>
</div>
<div class="col-xs-12 col-sm-9 col-sm-pull-3 entry">
	<form class="form-horizontal form-signup" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 control-label" for="geslacht">Geslacht</label>
			<div class="col-sm-9 required-radio">
				<label class="radio-inline">
					<input id="geslacht" name="geslacht" type="radio" value="Man">Man
				</label>
				<label class="radio-inline">
					<input id="geslacht" name="geslacht" type="radio" value="Vrouw">Vrouw
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="voornaam">Voornaam</label>
			<div class="col-sm-9">
				<input id="voornaam" class="form-control required" type="text" name="voornaam" placeholder="Voornaam">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="achternaam">Achternaam</label>
			<div class="col-sm-9">
				<input id="achternaam" class="form-control required" type="text" name="achternaam" placeholder="Achternaam">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="geboortedatum">Geboortedatum</label>
			<div class="col-sm-9">
				<input id="geboortedatum" class="form-control required" type="date" name="geboortedatum" placeholder="Geboortedatum">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="adres">Adres</label>
			<div class="col-sm-9">
				<input id="adres" class="form-control required" type="text" name="adres" placeholder="Adres">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="telefoon">Telefoonnummer</label>
			<div class="col-sm-9">
				<input id="telefoon" class="form-control required" type="number" name="telefoon" placeholder="Telefoonnummer">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="postcode">Postcode en plaats</label>
			<div class="col-sm-9">
				<input id="postcode" class="form-control required" type="text" name="postcode" placeholder="Postcode en plaats">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="email">Email</label>
			<div class="col-sm-9">
				<input id="email" class="form-control required" type="email" name="email" placeholder="Email">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="student">Student</label>
			<div class="col-sm-9 required-radio">
				<label class="radio-inline">
					<input id="student-ja" name="student" type="radio" value="Ja">Ja
				</label>
				<label class="radio-inline">
					<input id="student-nee" name="student" type="radio" value="Nee">Nee
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="universiteit">Universiteit</label>
			<div class="col-sm-9">
				<input id="universiteit" class="form-control" name="universiteit" type="text" placeholder="Universiteit">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="studie">Studie Werk</label>
			<div class="col-sm-9">
				<input id="studie" class="form-control" type="text"  name="studie"placeholder="Studie Werk">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="commissie">Interesse in een commissie?</label>
			<div class="col-sm-9">
				<select id="commissie" class="form-control" name="commissie">
					<option>Dit is slechts een peiling, je zit nergens aan vast</option>
					<option value="Evenementen commissie">Evenementen commissie</option>
					<option value="Pinkstertoernooi commissie">Pinkstertoernooi commissie</option>
					<option value="Weekendjeweg commissie">Weekendjeweg commissie</option>
					<option value="Amsterdams Studenten TennisToernooi commissie">Amsterdams Studenten TennisToernooi commissie</option>
					<option value="Media commissie">Media commissie</option>
					<option value="Nee bedankt, geen interesse">Nee bedankt, geen interesse</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="knltb">KNLTB nummer (indien al eerder KNLTB-lid)</label>
			<div class="col-sm-9">
				<input id="knltb" class="form-control" type="number" name="knltb" placeholder="KNLTB nummer">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="single">Speelsterkte (voor beginners 9)</label>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-xs-4">
						<input type="number" id="single" class="form-control" name="single" placeholder="Enkel">
					</div>
					<div class="col-xs-4">
						<input type="number" id="dubbel" class="form-control" name="dubbel" placeholder="Dubbel">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label" for="foto">Recente foto</label>
			<div class="col-sm-9">
				<input id="foto" type="file" name="foto">
				<p class="help-block">Indien je nog geen KNLTB-lid bent of een verouderde foto bij de KNLTB bekend is, dient een foto ingeleverd te worden!</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-sm-offset-3">
				<input type="text" name="website" id="website" class="hide">
				<input type="hidden" name="action" value="form_signup">
				<button class="btn btn-primary" type="submit">Verzenden</button>
				<button class="btn btn-secondary" type="reset">Reset</button>
			</div>
		</div>
	</form>
	<div class="alert-area"></div>
</div>
