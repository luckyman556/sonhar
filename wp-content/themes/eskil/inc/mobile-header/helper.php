<?php

if ( ! function_exists( 'eskil_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function eskil_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'eskil_filter_mobile_header_template', eskil_get_template_part( 'mobile-header', 'templates/mobile-header' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	add_action( 'eskil_action_page_header_template', 'eskil_load_page_mobile_header' );
}

if ( ! function_exists( 'eskil_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function eskil_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'eskil_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'eskil' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'eskil_action_after_include_modules', 'eskil_register_mobile_navigation_menus' );
}
