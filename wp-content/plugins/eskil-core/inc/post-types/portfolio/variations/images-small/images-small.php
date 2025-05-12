<?php

if ( ! function_exists( 'eskil_core_add_portfolio_single_variation_images_small' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_single_variation_images_small( $variations ) {
		$variations['images-small'] = esc_html__( 'Images - Small', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_single_layout_options', 'eskil_core_add_portfolio_single_variation_images_small' );
}
