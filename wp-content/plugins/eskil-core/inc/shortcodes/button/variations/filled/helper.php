<?php

if ( ! function_exists( 'eskil_core_add_button_variation_filled' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_button_variation_filled( $variations ) {
		$variations['filled'] = esc_html__( 'Filled', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_button_layouts', 'eskil_core_add_button_variation_filled' );
}
