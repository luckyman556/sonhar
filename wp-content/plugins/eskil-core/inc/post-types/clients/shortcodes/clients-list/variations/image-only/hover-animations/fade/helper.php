<?php

if ( ! function_exists( 'eskil_core_filter_clients_list_image_only_fade' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_filter_clients_list_image_only_fade( $variations ) {
		$variations['fade'] = esc_html__( 'Fade', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_clients_list_image_only_animation_options', 'eskil_core_filter_clients_list_image_only_fade' );
}
