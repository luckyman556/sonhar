<?php

if ( ! function_exists( 'eskil_core_add_clients_list_variation_image_only' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_clients_list_variation_image_only( $variations ) {
		$variations['image-only'] = esc_html__( 'Image Only', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_clients_list_layouts', 'eskil_core_add_clients_list_variation_image_only' );
}
