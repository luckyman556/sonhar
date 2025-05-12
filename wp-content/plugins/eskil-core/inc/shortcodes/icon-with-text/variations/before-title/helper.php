<?php

if ( ! function_exists( 'eskil_core_add_icon_with_text_variation_before_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_icon_with_text_variation_before_title( $variations ) {
		$variations['before-title'] = esc_html__( 'Before Title', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_icon_with_text_layouts', 'eskil_core_add_icon_with_text_variation_before_title' );
}
