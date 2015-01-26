<?php

/* Post thumbnail support */
add_theme_support('post-thumbnails');
add_image_size('thumbnail-wide', 900, 500, true);
add_image_size('thumbnail-small', 450, 350, true);

/* Content width for max width images */
//if ( ! isset( $content_width ) ) $content_width = 560;

/* Remove thumbnail dimensions for responsive images */
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
//add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

?>