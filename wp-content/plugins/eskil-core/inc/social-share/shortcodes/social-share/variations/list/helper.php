<?php

if ( ! function_exists( 'eskil_core_add_social_share_variation_list' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_social_share_variation_list( $variations ) {
		$variations['list'] = esc_html__( 'List', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_social_share_layouts', 'eskil_core_add_social_share_variation_list' );
}
