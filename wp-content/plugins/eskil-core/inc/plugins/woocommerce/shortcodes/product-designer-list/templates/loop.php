<?php
if ( ! empty( $taxonomy_items ) ) {
	$params['item_classes'] = $this_shortcode->get_item_classes( $params );

	foreach ( $taxonomy_items as $taxonomy_item ) {
		$params['id']      = $taxonomy_item->term_id;
		$params['title']   = $taxonomy_item->name;
		$params['excerpt'] = get_term_meta( $taxonomy_item->term_id, 'qodef_product_designer_excerpt', true );
		$params['link']    = get_term_link( $taxonomy_item );

		eskil_core_list_sc_template_part( 'plugins/woocommerce/shortcodes/product-designer-list', 'layouts/' . $layout, '', $params );
	}
} else {
	// Include global posts not found
	eskil_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}
