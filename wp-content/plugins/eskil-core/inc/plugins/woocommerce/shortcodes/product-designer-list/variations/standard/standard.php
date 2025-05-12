<?php

if ( ! function_exists( 'eskil_core_add_product_designer_list_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_product_designer_list_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_product_designer_list_layouts', 'eskil_core_add_product_designer_list_variation_standard' );
}
