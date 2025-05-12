<?php

if ( ! function_exists( 'eskil_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_banner_layouts', 'eskil_core_add_banner_variation_link_button' );
}
