<?php

include("metaboxes/meta_box.php");

$info_args = array(
	array(
		'label' => __('Featured item', 'rm'),
		'id'	=> 'featured',
		'type'	=> 'checkbox'
	),
	array(
		'label' => __('Alternatieve URL', 'rm'),
		'id'	=> 'url',
		'type'	=> 'text'
	)
);
new custom_add_meta_box('extra_info', 'Extra info', $info_args, 'post');

?>