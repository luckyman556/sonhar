<?php

if ( ! function_exists( 'eskil_core_filter_portfolio_list_info_follow' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_filter_portfolio_list_info_follow( $variations ) {
		$variations['follow'] = esc_html__( 'Follow', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_list_info_follow_animation_options', 'eskil_core_filter_portfolio_list_info_follow' );
}
