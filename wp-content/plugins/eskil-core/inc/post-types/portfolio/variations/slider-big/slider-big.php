<?php

if ( ! function_exists( 'eskil_core_add_portfolio_single_variation_slider_big' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_single_variation_slider_big( $variations ) {
		$variations['slider-big'] = esc_html__( 'Slider - Big', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_single_layout_options', 'eskil_core_add_portfolio_single_variation_slider_big' );
}
