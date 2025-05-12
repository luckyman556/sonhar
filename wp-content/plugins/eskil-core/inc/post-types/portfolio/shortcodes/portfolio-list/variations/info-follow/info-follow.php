<?php

if ( ! function_exists( 'eskil_core_add_portfolio_list_variation_info_follow' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_list_variation_info_follow( $variations ) {
		$variations['info-follow'] = esc_html__( 'Info Follow', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_list_layouts', 'eskil_core_add_portfolio_list_variation_info_follow' );
}
