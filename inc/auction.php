<?php

if( function_exists('acf_add_options_sub_page') ) {
	acf_add_options_sub_page(array(
		'title' => 'Notifications',
		'parent' => 'edit.php?post_type=auction'
	));
}

function send_notification( $option, $vars, $recipients = false ) {
	$html = "#title#\n\n#content#";
	
	$subject = get_field($option . '_subject', 'option');
	$title = get_field($option . '_title', 'option');
	$content = get_field($option . '_body', 'option');
	$recipients = ($recipients ? $recipients : get_field($option . '_recipients', 'option'));
	
	foreach( $vars as $key => $val ) {
		$subject = str_replace('[' . $key . ']', $val, $subject);
		$title = str_replace('[' . $key . ']', $val, $title);
		$content = str_replace('[' . $key . ']', $val, $content);
	}
	
	$msg = str_replace("#title#", $title, $html);
	$msg = str_replace("#content#", $content, $msg);
	
	$attachment['plain'] = $title . "\r\n" . $content;
	
	$send = wp_mail($recipients, $subject, $msg);
	
	return $send;
}

function get_bid_options( $court ) {
	$last_posts = get_posts(array(
		'post_type' => 'auction',
		'posts_per_page' => 1,
		'meta_query' => array(
			array(
				'key' => 'court',
				'value' => array($court),
				'compare' => 'IN',
			)
		),
		'order' => 'DESC'
	));

	if( $last_posts )
		foreach( $last_posts as $last_post )
			$b = get_post_meta($last_post->ID, 'bod', true);
	else
		$b = 5;

	return range(($b + 5), ($b + 25), 5);
}

function get_last_bid( $court, $post_id ) {
	$last_posts = get_posts(array(
		'post_type' => 'auction',
		'posts_per_page' => 1,
		'meta_query' => array(
			array(
				'key' => 'court',
				'value' => array($court),
				'compare' => 'IN',
			)
		),
		'post__not_in' => array(
			$post_id
		),
		'order' => 'DESC'
	));

	if( $last_posts )
		foreach( $last_posts as $last_post )
			return get_post_meta($last_post->ID, 'email', true);

	return false;
}

function add_new_bid() {
	if( isset($_POST['action']) && $_POST['action'] == 'add_bid' ) {
		$id = intval($_POST['post_id']);
		$name = (isset($_POST['fullname']) ? wp_kses($_POST['fullname'], array()) : false);
		$email = (isset($_POST['email']) ? $_POST['email'] : false);
		$court = intval($_POST['baan']);
		$bid = intval($_POST['bod-' . $court]);
		$options = get_bid_options($court);

		if( $name && is_email($email) && $court && in_array($bid, $options) ) {
			$post_id = wp_insert_post(array(
				'post_title' => 'Bod van ' . $name . ' op baan ' . $court,
				'post_type' => 'auction',
				'post_status' => 'draft'
			));

			$hash = md5(strtotime('now'));

			add_post_meta($post_id, 'name', $name);
			add_post_meta($post_id, 'email', $email);
			add_post_meta($post_id, 'court', $court);
			add_post_meta($post_id, 'bod', $bid);
			add_post_meta($post_id, 'hash', $hash);
			add_post_meta($post_id, 'page_id', $id);

			send_notification('new_bid_admin', array(
				'name' => $name,
				'bod' => $bid,
				'baan' => $court,
				'email' => $email
			));

			send_notification('confirm_bid', array(
				'name' => $name,
				'baan' => $court,
				'bod' => $bid,
				'url' => get_permalink($id) . '?confirm=' . $hash
			), $email);

			wp_redirect(get_permalink($id) . '?msg=pending');
			exit;
		} else {
			wp_redirect(get_permalink($id) . '?msg=error');
			exit;
		}
	}
}
add_action('init', 'add_new_bid');

function confirm_new_bid() {
	if( isset($_GET['confirm']) && $_GET['confirm'] ) {
		$hash = $_GET['confirm'];

		$post_ids = get_post_ids_by_meta_value('hash', $hash);

		if( isset($post_ids) && $post_ids ) {
			$post_id = $post_ids[0];

			$post_id = wp_update_post(array(
				'ID' => $post_id,
				'post_status' => 'publish'
			));

			delete_post_meta($post_id, 'hash');

			$name = get_post_meta($post_id, 'name', true);
			$court = get_post_meta($post_id, 'court', true);
			$bod = get_post_meta($post_id, 'bod', true);
			$last_bid = get_last_bid($court, $post_id);
			if( $last_bid ) {
				send_notification('new_over_bid', array(
					'name' => $name,
					'baan' => $court,
					'bod' => $bod
				), $last_bid);
			}

			$id = get_post_meta($post_id, 'page_id', true);
			wp_redirect(get_permalink($id) . '?msg=success');
			exit;
		}
	}
}
add_action('init', 'confirm_new_bid');

function add_auction_post_type() {
	$args = array(
		'public' => true,
		'label'  => 'Biedingen'
	);
	register_post_type('auction', $args);
}
add_action('init', 'add_auction_post_type');

?>