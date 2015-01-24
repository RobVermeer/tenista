<?php
/* Add SEO meta boxes to all post-types */
function rm_seo_meta_box_add() {
	add_meta_box( 'seo-meta-box', 'SEO fields', 'rm_seo_meta_box_cb', 'post', 'normal', 'high' );
	add_meta_box( 'seo-meta-box', 'SEO fields', 'rm_seo_meta_box_cb', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'rm_seo_meta_box_add' );

/* Function that adds a custom write panel to the back-end */
function rm_seo_meta_box_cb( $post ) {
	$values = get_post_custom( $post->ID );
	$seo_title = isset( $values['seo_title'] ) ? esc_attr( $values['seo_title'][0] ) : '';
	$seo_description = isset( $values['seo_description'] ) ? esc_attr( $values['seo_description'][0] ) : '';
	$seo_keywords = isset( $values['seo_keywords'] ) ? esc_attr( $values['seo_keywords'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<table id="seo-list-table" class="widefat">
		<thead>
			<tr>
				<th class="left">Field</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody id="seo-the-list" class="list:meta">
			<tr>
				<td class="left">
					<label for="seo_title">SEO title</label><br>
					<p class="description">Replaces the title</p>
				</td>
				<td>
					<input style="width:95%; padding: 10px;" type="text" name="seo_title" id="seo_title" value="<?php echo $seo_title; ?>" />
				</td>
			</tr>
			<tr class="alternate">
				<td class="left">
					<label for="seo_description">SEO description</label><br>
					<p class="description">Between 150 and 250 characters</p>
				</td>
				<td>
					<textarea style="width:95%;" name="seo_description" id="seo_description"><?php echo $seo_description; ?></textarea>
				</td>
			</tr>
			<tr>
				<td style="width: 300px;" class="left">
					<label for="seo_keywords">SEO keywords</label><br>
					<p class="description">Example: "Keyword1, Keyword2, Keyword3"</p>
				</td>
				<td>
					<input style="width:95%; padding: 10px;" type="text" name="seo_keywords" id="seo_keywords" value="<?php echo $seo_keywords; ?>" />
				</td>
			</tr>
		</tbody>
	</table>
	<?php	
}

/* Function that saves the custom fields */
function rm_seo_meta_box_save( $post_id ) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	if ( 'page' == $_POST['post_type'] && ! current_user_can( 'edit_page', $post_id ) ) return;
	if ( 'page' != $_POST['post_type'] && ! current_user_can( 'edit_post', $post_id ) ) return;

	if( isset( $_POST['seo_title'] ) )
		update_post_meta( $post_id, 'seo_title', esc_attr( $_POST['seo_title'] ) );

	if( isset( $_POST['seo_description'] ) )
		update_post_meta( $post_id, 'seo_description', esc_attr( $_POST['seo_description'] ) );

	if( isset( $_POST['seo_keywords'] ) )
		update_post_meta( $post_id, 'seo_keywords', esc_attr( $_POST['seo_keywords'] ) );
}
add_action( 'save_post', 'rm_seo_meta_box_save' );

function rm_seo_title() {
	global $post;
	$post_custom_fields = (isset($post->ID) ? get_post_custom($post->ID) : '');

	if( is_singular() && isset($post->ID) ) {
		$seo_title = (isset($post_custom_fields['seo_title'][0]) ? $post_custom_fields['seo_title'][0] : false);
		$title = ($seo_title ? $seo_title : wp_title('&raquo;', false, 'right') . get_bloginfo('name'));
		$seo_description = (isset($post_custom_fields['seo_description'][0]) ? $post_custom_fields['seo_description'][0] : false);
		$description = ($seo_description ? $seo_description : trim(trunc(strip_tags(preg_replace('/\s+/', ' ', preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $post->post_content))), 25, '...')));
		$seo_keywords = (isset($post_custom_fields['seo_keywords'][0]) ? $post_custom_fields['seo_keywords'][0] : false);
		$keywords = ($seo_keywords ? $seo_keywords : wp_title(',', false, 'right') . get_bloginfo('name'));
	}
	
	$title = (isset($title) && $title ? $title : wp_title('//', false, 'right') . get_bloginfo('name'));
	$description = (isset($description) && $description ? $description : get_bloginfo('description'));
	$keywords = (isset($keywords) && $keywords ? $keywords : wp_title(',', false, 'right') . get_bloginfo('name'));
	
	echo '
	<title>' . $title . '</title>
	<meta name="description" content="' . $description . '">
	<meta name="keywords" content="' . $keywords . '">
	';
}
add_action('wp_head', 'rm_seo_title', 1);

?>
