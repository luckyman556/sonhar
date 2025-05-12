<?php

if ( ! function_exists( 'eskil_core_add_sticky_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function eskil_core_add_sticky_header_option( $options ) {
		$options['sticky'] = esc_html__( 'Sticky', 'eskil-core' );

		return $options;
	}

	add_filter( 'eskil_core_filter_header_scroll_appearance_option', 'eskil_core_add_sticky_header_option' );
}

if ( ! function_exists( 'eskil_core_sticky_header_global_js_var' ) ) {
	/**
	 * Function that extend global js variables
	 *
	 * @param array $global_variables
	 *
	 * @return array
	 */
	function eskil_core_sticky_header_global_js_var( $global_variables ) {
		$header_scroll_appearance = eskil_core_get_post_value_through_levels( 'qodef_header_scroll_appearance' );

		if ( 'sticky' === $header_scroll_appearance ) {
			$sticky_scroll_amount_meta = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_scroll_amount' );
			$sticky_scroll_amount      = '' !== $sticky_scroll_amount_meta ? intval( $sticky_scroll_amount_meta ) : 0;

			$global_variables['qodefStickyHeaderScrollAmount'] = $sticky_scroll_amount;
		}

		return $global_variables;
	}

	add_filter( 'eskil_filter_localize_main_js', 'eskil_core_sticky_header_global_js_var' );
}

if ( ! function_exists( 'eskil_core_register_sticky_header_areas' ) ) {
	/**
	 * Function that registers widget area for sticky header
	 */
	function eskil_core_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-sticky-header-widget-area-one',
				'name'          => esc_html__( 'Sticky Header - Area One', 'eskil-core' ),
				'description'   => esc_html__( 'Widgets added here will appear in sticky header widget area one', 'eskil-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
				'after_widget'  => '</div>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'qodef-sticky-header-widget-area-two',
				'name'          => esc_html__( 'Sticky Header - Area Two', 'eskil-core' ),
				'description'   => esc_html__( 'Widgets added here will appear in sticky header widget area two', 'eskil-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
				'after_widget'  => '</div>',
			)
		);
	}

	add_action( 'eskil_core_action_additional_header_widgets_area', 'eskil_core_register_sticky_header_areas' );
}

if ( ! function_exists( 'eskil_core_set_sticky_header_logo_image' ) ) {
	/**
	 * This function set header logo image for current scroll appearance type
	 *
	 * @param array $available_logo_images
	 * @param array $parameters
	 *
	 * @return array
	 */
	function eskil_core_set_sticky_header_logo_image( $available_logo_images, $parameters ) {

		if ( isset( $parameters['sticky_logo'] ) && ! empty( $parameters['sticky_logo'] ) ) {
			$available_logo_images         = array();
			$available_logo_images['main'] = 'sticky';
		}

		return $available_logo_images;
	}

	add_filter( 'eskil_core_filter_available_header_logo_images', 'eskil_core_set_sticky_header_logo_image', 10, 2 );
}

if ( ! function_exists( 'eskil_core_set_sticky_header_logo_svg_path' ) ) {
	/**
	 * This function set header logo svg path for current scroll appearance type
	 *
	 * @param string $logo_svg_path
	 * @param array $parameters
	 *
	 * @return string
	 */
	function eskil_core_set_sticky_header_logo_svg_path( $logo_svg_path, $parameters ) {
		$sticky_logo_svg_path = eskil_core_get_post_value_through_levels( 'qodef_logo_sticky_svg_path' );

		if ( ! empty( $sticky_logo_svg_path ) && isset( $parameters['sticky_logo'] ) && ! empty( $parameters['sticky_logo'] ) ) {
			$logo_svg_path = $sticky_logo_svg_path;
		}

		return $logo_svg_path;
	}

	add_filter( 'eskil_core_filter_header_logo_svg_path', 'eskil_core_set_sticky_header_logo_svg_path', 10, 2 );
}

if ( ! function_exists( 'eskil_core_set_additional_sticky_header_classes' ) ) {
	/**
	 * This function add additional sticky header area inner classes
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function eskil_core_set_additional_sticky_header_classes( $classes ) {
		$header_skin = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_skin' );
		if ( ! empty( $header_skin ) && 'none' !== $header_skin ) {
			$classes[] = 'qodef-skin--' . $header_skin;
		}

		$header_appearance = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_appearance' );
		$classes[]         = 'qodef-appearance--' . ( ! empty( $header_appearance ) ? esc_attr( $header_appearance ) : 'down' );

		return $classes;
	}

	add_filter( 'eskil_core_filter_sticky_header_class', 'eskil_core_set_additional_sticky_header_classes' );
}

if ( ! function_exists( 'eskil_core_set_sticky_header_area_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function eskil_core_set_sticky_header_area_styles( $style ) {
		$styles = array();

		$background_color = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_background_color' );

		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}

		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header-sticky', $styles );
		}

		$inner_styles = array();

		$header_type = eskil_core_get_post_value_through_levels( 'qodef_header_layout' );

		$border_color = eskil_core_get_post_value_through_levels( 'qodef_' . $header_type . '_header_border_color' );
		$border_width = eskil_core_get_post_value_through_levels( 'qodef_' . $header_type . '_header_border_width' );
		$border_style = eskil_core_get_post_value_through_levels( 'qodef_' . $header_type . '_header_border_style' );

		$sticky_border_color = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_border_color' );
		$sticky_border_width = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_border_width' );
		$sticky_border_style = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_border_style' );

		$side_padding = eskil_core_get_post_value_through_levels( 'qodef_sticky_header_side_padding' );

		if ( '' !== $side_padding ) {
			if ( qode_framework_string_ends_with_space_units( $side_padding ) ) {
				$inner_styles['padding-left']  = $side_padding;
				$inner_styles['padding-right'] = $side_padding;
			} else {
				$inner_styles['padding-left']  = intval( $side_padding ) . 'px';
				$inner_styles['padding-right'] = intval( $side_padding ) . 'px';
			}
		}

		if ( ! empty( $border_color ) ) {
			$inner_styles['border-bottom-color'] = $border_color;

			if ( empty( $border_width ) ) {
				$inner_styles['border-bottom-width'] = '1px';
			}
		}

		if ( ! empty( $border_width ) ) {
			$inner_styles['border-bottom-width'] = intval( $border_width ) . 'px';
		}

		if ( ! empty( $border_style ) ) {
			$inner_styles['border-bottom-style'] = $border_style;
		}

		if ( ! empty( $sticky_border_color ) ) {
			$inner_styles['border-bottom-color'] = $sticky_border_color;

			if ( empty( $sticky_border_width ) ) {
				$inner_styles['border-bottom-width'] = '1px';
			}
		}

		if ( ! empty( $sticky_border_width ) ) {
			$inner_styles['border-bottom-width'] = intval( $sticky_border_width ) . 'px';
		}

		if ( ! empty( $sticky_border_style ) ) {
			$inner_styles['border-bottom-style'] = $sticky_border_style;
		}

		if ( ! empty( $inner_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header-sticky .qodef-header-sticky-inner', $inner_styles );
		}

		return $style;
	}

	add_filter( 'eskil_filter_add_inline_style', 'eskil_core_set_sticky_header_area_styles' );
}
