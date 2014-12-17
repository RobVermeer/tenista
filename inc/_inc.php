<?php

define('RM_INC_PATH', plugin_dir_path(__FILE__));

/* Priority HIGH */
include(RM_INC_PATH . "helpers.php");

/* Priority Medium */
include(RM_INC_PATH . "googleanalytics.php");
include(RM_INC_PATH . "opengraph.php");
include(RM_INC_PATH . "seo.php");

/* Priority low */
include(RM_INC_PATH . "wp-cleanup.php");
include(RM_INC_PATH . "images.php");
include(RM_INC_PATH . "menus.php");
//include(RM_INC_PATH . "scripts.php");
//include(RM_INC_PATH . "styles.php");
//include(RM_INC_PATH . "ajax.php");
//include(RM_INC_PATH . "pagination.php");
//include(RM_INC_PATH . "shortcodes.php");
//include(RM_INC_PATH . "social.php");

/* Admin area */
if( is_admin() ) {
	//include(RM_INC_PATH . "metaboxes.php");
}


/* Run one time */
$ver = get_option("rm_version", 1);
$cur = 1;
if( $ver < $cur ) {
	//if( $ver < 2 )
	//	include("upgrade/xxx.php");
	
	update_option("rm_version", $cur);
}

?>