<?php

if ( ! function_exists( 'eskil_core_add_text_marquee_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_text_marquee_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_text_marquee_layouts', 'eskil_core_add_text_marquee_variation_default' );
}
