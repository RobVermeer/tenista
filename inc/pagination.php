<?php

function get_pagination() {
	global $wp_query; 
	return array(
		'base' => str_replace( '99999', '%#%', esc_url( get_pagenum_link( '99999' ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_text' => __('Vorige pagina', "rm"),
		'next_text' => __('Volgende pagina', "rm")
	);
}

?>