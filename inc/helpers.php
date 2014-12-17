<?php

/* Truncate string by paragraphs */
function trunc_p($phrase, $max_paragraphs) {
	$phrase_array = preg_split('/\r\n|\r|\n/', $phrase);
	$paragraphs = 0;
	$phrase = "";
	foreach($phrase_array as $phrase_paragraph) {
		if($paragraphs < $max_paragraphs)
			$phrase .= $phrase_paragraph . "\n";
		else
			break;
		$paragraphs++;
	}
	return $phrase;
}

/* Truncate string by words */
function trunc($phrase, $max_words, $after = null) {
    $phrase_array = explode(' ', $phrase);
    if(count($phrase_array) > $max_words && $max_words > 0)
        $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)) . $after;
    return $phrase;
}

/* Truncate string by chars */
function trunc_chars($phrase, $max_chars, $after = null) {
	$phrase_array = explode(' ', $phrase);
	$phrase_count = count($phrase_array);

	$words = 0;
	$chars = 0;
	$phrase = "";
	foreach($phrase_array as $phrase_word) {
		$phrase_word_chars = strlen($phrase_word);
		$chars = $chars + $phrase_word_chars + 1;

		if($chars <= $max_chars)
			$phrase .= $phrase_word . ' ';
		else
			break;
		$words++;
	}

	if(!$words)
		$phrase = substr($phrase_array[0], 0, $max_chars);

	if($phrase_count > $words)
		return trim($phrase) . $after;
	return trim($phrase);
}

function get_encode_img_file_url( $url ) {
	$file = basename($url);
	
	$url = str_replace($file, "", $url);
	
	return $url . rawurlencode($file);
}

/* Get user ID's by meta value */
function get_user_ids_by_meta_value( $key, $val ) {
	global $wpdb;
	$query = "
		SELECT user_id
		FROM $wpdb->usermeta
		WHERE (meta_key = %s AND meta_value = %s)
		GROUP BY user_id
	";
	$user_ids = $wpdb->get_col( $wpdb->prepare($query, $key, $val) );
	
	return $user_ids ? $user_ids : false;
}

/* Get post ID's by meta value */
function get_post_ids_by_meta_value( $key, $val ) {
	global $wpdb;
	$query = "
		SELECT post_id
		FROM $wpdb->postmeta
		WHERE (meta_key = %s AND meta_value = %s)
		GROUP BY post_id
	";
	$post_ids = $wpdb->get_col( $wpdb->prepare($query, $key, $val) );
	
	return $post_ids ? $post_ids : false;
}

/* Get term ID's by meta value */
function get_term_ids_by_meta_value( $key, $val ) {
	global $wpdb;
	$query = "
		SELECT taxonomy_id
		FROM $wpdb->taxonomymeta
		WHERE (meta_key = %s AND meta_value = %s)
		GROUP BY taxonomy_id
	";
	$term_ids = $wpdb->get_col( $wpdb->prepare($query, $key, $val) );
	
	return $term_ids ? $term_ids : false;
}

function get_file_icon( $file ) {
	$ext = pathinfo($file, PATHINFO_EXTENSION);
	
	switch( $ext ) {
		case 'doc':
		case 'docx':
			return 'file-text';
		case 'mov':
		case 'mpg':
		case 'mpeg':
		case 'avi':
		case 'flv':
			return 'youtube-play';
		case 'rar':
		case 'zip':
			return 'dropbox';
		default:
			return 'file';
	}
}

function file_icon( $file ) {
	echo get_file_icon($file);
}

function is_between_dates( $date, $end_date, $b, $e ) {
	if( $date >= $b && $date <= $e )
		return true;
	if( $end_date >= $b && $end_date <= $e )
		return true;
	if( $date < $b && $end_date >= $b )
		return true;

	return false;
}

function is_weekend( $date, $end_date = false ) {
	if( ! $end_date || $date == $end_date )
		return (date('N', $date) >= 5);
		
	$diff = floor(($end_date - $date) / (60*60*24));

	if( date('N', $date) >= 5 )
		return true;
	if( date('N', $end_date) >= 5 )
		return true;
	if( $diff >= 4 )
		return true;
	
	return false;
}

function is_this_weekend( $date, $end_date = false ) {
	$today = strtotime(date_i18n("d-m-Y"));
	$friday = (date('N', $today) == 5 ? $today : (date('N', $today) > 5 ? strtotime("previous Friday") : strtotime("next Friday")));
	$sunday = (date('N', $today) == 7 ? $today : strtotime("next Sunday"));
	
	if( ! $end_date || $date == $end_date ) {
		if( $date >= $friday && $date <= $sunday )
			return true;
		return false;
	}
		
	return is_between_dates($date, $end_date, $friday, $sunday);
}

function is_this_week( $date, $end_date = false ) {
	$today = strtotime(date_i18n("d-m-Y"));
	$monday = (date('N', $today) == 1 ? $today : strtotime("last Monday"));
	$sunday = (date('N', $today) == 7 ? $today : strtotime("next Sunday"));
	
	if( ! $end_date || $date == $end_date )
		return ($date <= $sunday && $date >= $monday);
	
	return is_between_dates($date, $end_date, $monday, $sunday);
}

function is_next_week( $date, $end_date = false ) {
	$date = strtotime("-1 week", $date);
	$end_date = ($end_date && $date != $end_date ? strtotime("-1 week", $end_date) : false);

	return is_this_week($date, $end_date);
}

function rm_display_name() {
	global $current_user;
	get_currentuserinfo();
	
	echo $current_user->display_name;
}

function has_children() {
	global $post;
	
	if( isset($post->post_parent) && $post->post_parent )
		return true;
	
	$children = get_pages(array('child_of' => $post->ID));
	
	if( count( $children ) != 0 )
		return true;
		
	return false;
}

function get_the_children() {
	global $post;
	
	if( ! has_children() )
		return;
		
	$page_id = (isset($post->post_parent) && $post->post_parent ? $post->post_parent : $post->ID);
	
	return get_pages(array('child_of' => $page_id));
}

?>