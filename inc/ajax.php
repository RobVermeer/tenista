<?php

function rm_ajaxurl() {
	?><script type="text/javascript"> var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>'; </script><?php
}
add_action('wp_head', 'rm_ajaxurl');

function rm_is_ajax() {
	if( isset($_GET['t']) && $_GET['t'] == 'a' )
		return true;
		
	return false;
}

?>