<?php

if ( ! function_exists( 'eskil_core_add_simple_links_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_simple_links_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_simple_links_layouts', 'eskil_core_add_simple_links_variation_default' );
}
