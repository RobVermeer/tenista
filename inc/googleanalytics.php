<?php

function googleanalytics_code() {
	if( defined('GA_CODE') && GA_CODE ) : ?>
<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga');  ga('create', '<?php echo GA_CODE; ?>', '<?php echo preg_replace('/^www\./', '', $_SERVER['SERVER_NAME']); ?>'); ga('send', 'pageview');  </script>
	<?php endif;
}
add_action('wp_head', 'googleanalytics_code');

?>