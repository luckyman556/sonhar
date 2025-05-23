<?php

if ( ! function_exists( 'eskil_core_add_icon_with_text_variation_before_content' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_icon_with_text_variation_before_content( $variations ) {
		$variations['before-content'] = esc_html__( 'Before Content', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_icon_with_text_layouts', 'eskil_core_add_icon_with_text_variation_before_content' );
}
