<?php
$post_id       = get_the_ID();
$is_enabled    = eskil_core_get_post_value_through_levels( 'qodef_blog_single_enable_related_posts' );
$related_posts = eskil_core_get_custom_post_type_related_posts( $post_id, eskil_core_get_blog_single_post_taxonomies( $post_id ) );

if ( 'yes' === $is_enabled && ! empty( $related_posts ) && class_exists( 'EskilCore_Blog_List_Shortcode' ) ) { ?>
	<div id="qodef-related-posts">
		<h3 class="qodef-realted-post-title"><?php esc_html_e( 'Related Posts', 'eskil-core' ); ?></h3>
		<?php
		$params = apply_filters(
			'eskil_core_filter_blog_single_related_posts_params',
			array(
				'custom_class'      => 'qodef--no-bottom-space',
				'columns'           => '3',
				'posts_per_page'    => 3,
				'additional_params' => 'id',
				'post_ids'          => $related_posts['items'],
				'title_tag'         => 'h4',
				'excerpt_length'    => '0',
			)
		);

		echo EskilCore_Blog_List_Shortcode::call_shortcode( $params );
		?>
	</div>
<?php } ?>
