<?php

function send_signup_mail() {
	if( isset($_POST['action']) && $_POST['action'] == 'form_signup' ) {
		$to = get_bloginfo('admin_email');
		$subject = __('[Tenista] Nieuwe inschrijving', 'rm');
		$headers = null;
		$attachments = null;
		
		$message  = sprintf(__('<h3>Nieuwe inschrijving van %s</h3>', 'rm'), $_POST['voornaam']);
		$message .= sprintf(__('Naam: %s %s<br>', 'rm'), $_POST['voornaam'], $_POST['achternaam']);
		$message .= sprintf(__('Geslacht: %s<br>', 'rm'), $_POST['geslacht']);
		$message .= sprintf(__('Geboortedatum: %s<br>', 'rm'), $_POST['geboortedatum']);
		$message .= sprintf(__('Adres: %s<br>', 'rm'), $_POST['adres']);
		$message .= sprintf(__('Telefoon: %s<br>', 'rm'), $_POST['telefoon']);
		$message .= sprintf(__('Postcode en plaats: %s<br>', 'rm'), $_POST['postcode']);
		$message .= sprintf(__('Email: %s<br>', 'rm'), $_POST['email']);
		$message .= sprintf(__('Student: %s<br>', 'rm'), $_POST['student']);
		$message .= sprintf(__('Universiteit: %s<br>', 'rm'), $_POST['universiteit']);
		$message .= sprintf(__('Studie/werk: %s<br>', 'rm'), $_POST['studie']);
		$message .= sprintf(__('Commissie: %s<br>', 'rm'), $_POST['commissie']);
		$message .= sprintf(__('Knltb: %s<br>', 'rm'), $_POST['knltb']);
		$message .= sprintf(__('Speelsterkte: single %s dubbel %s<br>', 'rm'), $_POST['single'], $_POST['dubbel']);
		
		if( isset($_FILES) && $_FILES )
			$attachments = $_FILES['foto']['tmp_name'];
		
		add_filter('wp_mail_content_type', 'set_content_type');
		wp_mail($to, $subject, $message, $headers, $attachments);
		wp_redirect(get_bloginfo('url') . '/inschrijven/bedankt/');
		exit;
	}
}
add_action('init', 'send_signup_mail');

function set_content_type( $content_type ){
	return 'text/html';
}

?>