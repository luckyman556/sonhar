<?php

if ( ! function_exists( 'eskil_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_banner_layouts', 'eskil_core_add_banner_variation_link_overlay' );
}
