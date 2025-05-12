<?php

if ( ! function_exists( 'eskil_core_filter_portfolio_list_info_on_hover_fade_in' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_filter_portfolio_list_info_on_hover_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_list_info_on_hover_animation_options', 'eskil_core_filter_portfolio_list_info_on_hover_fade_in' );
}
