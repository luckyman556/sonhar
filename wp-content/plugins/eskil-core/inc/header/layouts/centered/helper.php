<?php

if ( ! function_exists( 'eskil_core_add_centered_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function eskil_core_add_centered_header_global_option( $header_layout_options ) {
		$header_layout_options['centered'] = array(
			'image' => ESKIL_CORE_HEADER_LAYOUTS_URL_PATH . '/centered/assets/img/centered-header.png',
			'label' => esc_html__( 'Centered', 'eskil-core' ),
		);

		return $header_layout_options;
	}

	add_filter( 'eskil_core_filter_header_layout_option', 'eskil_core_add_centered_header_global_option' );
}

if ( ! function_exists( 'eskil_core_register_centered_header_layout' ) ) {
	/**
	 * Function which add header layout into global list
	 *
	 * @param array $header_layouts
	 *
	 * @return array
	 */
	function eskil_core_register_centered_header_layout( $header_layouts ) {
		$header_layouts['centered'] = 'EskilCore_Centered_Header';

		return $header_layouts;
	}

	add_filter( 'eskil_core_filter_register_header_layouts', 'eskil_core_register_centered_header_layout' );
}


if ( ! function_exists( 'eskil_core_set_inline_centered_header_layout_styles' ) ) {
	/**
	 * Function which adds inline styles for centered header layout
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function eskil_core_set_inline_centered_header_layout_styles( $style ) {
		$inner_styles = array();

		$border_top_color = eskil_core_get_post_value_through_levels( 'qodef_centered_header_border_top_color' );
		$border_top_width = eskil_core_get_post_value_through_levels( 'qodef_centered_header_border_top_width' );
		$border_top_style = eskil_core_get_post_value_through_levels( 'qodef_centered_header_border_top_style' );

		if ( ! empty( $border_top_color ) ) {
			$inner_styles['border-top-color'] = $border_top_color;

			if ( empty( $border_top_width ) ) {
				$inner_styles['border-top-width'] = '1px';
			}
		}

		if ( ! empty( $border_top_width ) ) {
			$inner_styles['border-top-width'] = intval( $border_top_width ) . 'px';
		}

		if ( ! empty( $border_top_style ) ) {
			$inner_styles['border-top-style'] = $border_top_style;
		}

		if ( ! empty( $inner_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header--centered #qodef-page-header-inner .qodef-centered-header-wrapper', $inner_styles );
		}

		return $style;
	}

	add_filter( 'eskil_filter_add_inline_style', 'eskil_core_set_inline_centered_header_layout_styles' );
}
