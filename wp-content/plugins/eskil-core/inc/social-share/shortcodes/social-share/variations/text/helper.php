<?php

if ( ! function_exists( 'eskil_core_add_social_share_variation_text' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_social_share_variation_text( $variations ) {
		$variations['text'] = esc_html__( 'Text', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_social_share_layouts', 'eskil_core_add_social_share_variation_text' );
}
