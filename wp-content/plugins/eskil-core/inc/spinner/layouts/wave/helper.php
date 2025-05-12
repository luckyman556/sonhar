<?php

if ( ! function_exists( 'eskil_core_add_wave_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts - module layouts
	 *
	 * @return array
	 */
	function eskil_core_add_wave_spinner_layout_option( $layouts ) {
		$layouts['wave'] = esc_html__( 'Wave', 'eskil-core' );

		return $layouts;
	}

	add_filter( 'eskil_core_filter_page_spinner_layout_options', 'eskil_core_add_wave_spinner_layout_option' );
}
