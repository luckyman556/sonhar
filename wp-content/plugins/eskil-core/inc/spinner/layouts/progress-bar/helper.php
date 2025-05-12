<?php

if ( ! function_exists( 'eskil_core_add_progress_bar_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts - module layouts
	 *
	 * @return array
	 */
	function eskil_core_add_progress_bar_spinner_layout_option( $layouts ) {
		$layouts['progress-bar'] = esc_html__( 'Progress Bar', 'eskil-core' );

		return $layouts;
	}

	add_filter( 'eskil_core_filter_page_spinner_layout_options', 'eskil_core_add_progress_bar_spinner_layout_option' );
}

if ( ! function_exists( 'eskil_core_add_progress_bar_spinner_layout_classes' ) ) {
	/**
	 * Function that return classes for page spinner area
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function eskil_core_add_progress_bar_spinner_layout_classes( $classes ) {
		$type = eskil_core_get_post_value_through_levels( 'qodef_page_spinner_type' );

		if ( 'progress-bar' === $type ) {
			$classes[] = 'qodef--custom-spinner';
		}

		return $classes;
	}

	add_filter( 'eskil_core_filter_page_spinner_classes', 'eskil_core_add_progress_bar_spinner_layout_classes' );
}
