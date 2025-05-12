<?php

if ( ! function_exists( 'eskil_core_filter_clients_list_image_only_fade_in' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_filter_clients_list_image_only_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_clients_list_image_only_animation_options', 'eskil_core_filter_clients_list_image_only_fade_in' );
}
