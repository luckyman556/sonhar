<?php

if ( ! function_exists( 'eskil_core_add_button_variation_textual' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_button_variation_textual( $variations ) {
		$variations['textual'] = esc_html__( 'Textual', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_button_layouts', 'eskil_core_add_button_variation_textual' );
}
