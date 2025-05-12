<?php

if ( ! function_exists( 'eskil_core_dependency_for_mobile_menu_typography_options' ) ) {
	/**
	 * Function that set dependency values for module global options
	 *
	 * @return array
	 */
	function eskil_core_dependency_for_mobile_menu_typography_options() {
		return apply_filters( 'eskil_core_filter_mobile_menu_typography_hide_option', array() );
	}
}

if ( ! function_exists( 'eskil_core_set_mobile_header_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function eskil_core_set_mobile_header_styles( $style ) {
		$styles = array();

		$border_color = eskil_core_get_post_value_through_levels( 'qodef_mobile_header_border_color' );
		$border_width = eskil_core_get_post_value_through_levels( 'qodef_mobile_header_border_width' );
		$border_style = eskil_core_get_post_value_through_levels( 'qodef_mobile_header_border_style' );

		if ( ! empty( $border_color ) ) {
			$styles['border-bottom-color'] = $border_color;

			if ( empty( $border_width ) ) {
				$styles['border-bottom-width'] = '1px';
			}
		}

		if ( ! empty( $border_width ) || '0' === $border_width ) {
			$styles['border-bottom-width'] = intval( $border_width ) . 'px';
		}

		if ( ! empty( $border_style ) ) {
			$styles['border-bottom-style'] = $border_style;
		}

		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-mobile-header-inner', $styles );
		}

		$opener_styles    = array();
		$opener_color     = eskil_core_get_post_value_through_levels( 'qodef_mobile_header_opener_color' );
		$opener_icon_size = eskil_core_get_post_value_through_levels( 'qodef_mobile_header_opener_size' );

		if ( ! empty( $opener_color ) ) {
			$opener_styles['color'] = $opener_color;
		}

		if ( ! empty( $opener_icon_size ) ) {
			if ( qode_framework_string_ends_with_typography_units( $opener_icon_size ) ) {
				$opener_styles['font-size'] = $opener_icon_size;
			} else {
				$opener_styles['font-size'] = intval( $opener_icon_size ) . 'px';
			}
		}

		if ( ! empty( $opener_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-mobile-header .qodef-mobile-header-opener', $opener_styles );
		}

		$opener_svg_styles = array();

		if ( ! empty( $opener_icon_size ) ) {
			$opener_svg_styles['width'] = intval( $opener_icon_size ) . 'px';
		}

		if ( ! empty( $opener_svg_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-mobile-header .qodef-mobile-header-opener svg', $opener_svg_styles );
		}

		$opener_hover_styles = array();
		$opener_hover_color  = eskil_core_get_post_value_through_levels( 'qodef_mobile_header_opener_hover_color' );

		if ( ! empty( $opener_hover_color ) ) {
			$opener_hover_styles['color'] = $opener_hover_color;
		}

		if ( ! empty( $opener_hover_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-page-mobile-header .qodef-mobile-header-opener:hover',
					'#qodef-page-mobile-header .qodef-mobile-header-opener.qodef--opened',
				),
				$opener_hover_styles
			);
		}

		return $style;
	}

	add_filter( 'eskil_filter_add_inline_style', 'eskil_core_set_mobile_header_styles' );
}
