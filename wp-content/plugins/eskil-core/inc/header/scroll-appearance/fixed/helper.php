<?php

if ( ! function_exists( 'eskil_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function eskil_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'eskil-core' );

		return $options;
	}

	add_filter( 'eskil_core_filter_header_scroll_appearance_option', 'eskil_core_add_fixed_header_option' );
}
