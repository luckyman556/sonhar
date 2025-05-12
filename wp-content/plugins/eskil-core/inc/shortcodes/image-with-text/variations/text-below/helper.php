<?php

if ( ! function_exists( 'eskil_core_add_image_with_text_variation_text_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_image_with_text_variation_text_below( $variations ) {
		$variations['text-below'] = esc_html__( 'Text Below', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_image_with_text_layouts', 'eskil_core_add_image_with_text_variation_text_below' );
}
