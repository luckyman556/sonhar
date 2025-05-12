<?php

if ( ! function_exists( 'eskil_core_add_portfolio_single_variation_custom' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_single_variation_custom( $variations ) {
		$variations['custom'] = esc_html__( 'Custom', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_single_layout_options', 'eskil_core_add_portfolio_single_variation_custom' );
}
