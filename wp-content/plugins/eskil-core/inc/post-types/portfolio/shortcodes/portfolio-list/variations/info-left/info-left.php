<?php

if ( ! function_exists( 'eskil_core_add_portfolio_list_variation_info_left' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_list_variation_info_left( $variations ) {
		$variations['info-left'] = esc_html__( 'Info Left', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_list_layouts', 'eskil_core_add_portfolio_list_variation_info_left' );
}
