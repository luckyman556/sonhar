<?php

if ( ! function_exists( 'eskil_core_add_countdown_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_countdown_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_countdown_layouts', 'eskil_core_add_countdown_variation_simple' );
}
