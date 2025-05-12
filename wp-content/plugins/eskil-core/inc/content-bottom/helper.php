<?php

if ( ! function_exists( 'eskil_core_is_content_bottom_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 *
	 * @return bool
	 */
	function eskil_core_is_content_bottom_enabled() {
		$is_enabled = false;
		$option     = 'no' !== eskil_core_get_post_value_through_levels( 'qodef_enable_content_bottom' );

		if ( $option ) {
			$is_enabled = true;
		}

		if ( ! $option ) {
			$is_enabled = false;
		}

		return apply_filters( 'eskil_core_filter_enable_content_bottom', $is_enabled );
	}
}

if ( ! function_exists( 'eskil_core_load_content_bottom' ) ) {
	/**
	 * Loads content bottom HTML
	 */
	function eskil_core_load_content_bottom() {
		if ( eskil_core_is_content_bottom_enabled() && ! is_404() ) {
			$params         = array();
			$custom_sidebar = eskil_core_get_post_value_through_levels( 'qodef_content_bottom_custom_sidebar' );

			$params['sidebar'] = ! empty( $custom_sidebar ) ? $custom_sidebar : 'qodef-content-bottom';

			eskil_core_template_part( 'content-bottom', 'templates/content-bottom', '', $params );
		}
	}

	add_action( 'eskil_action_page_footer_template', 'eskil_core_load_content_bottom', 9 );
}

if ( ! function_exists( 'eskil_core_get_content_bottom_config' ) ) {
	/**
	 * Function that return config variables for side area
	 *
	 * @return array
	 */
	function eskil_core_get_content_bottom_config() {
		// Config variables
		$config = apply_filters(
			'eskil_core_filter_content_bottom_config',
			array(
				'title_tag'   => 'h5',
				'title_class' => 'qodef-widget-title',
			)
		);

		return $config;
	}
}

if ( ! function_exists( 'eskil_core_register_content_bottom_sidebar' ) ) {
	/**
	 * Register content bottom sidebar
	 */
	function eskil_core_register_content_bottom_sidebar() {
		// Sidebar config variables
		$config = eskil_core_get_content_bottom_config();

		register_sidebar(
			array(
				'id'            => 'qodef-content-bottom',
				'name'          => esc_html__( 'Content Bottom', 'eskil-core' ),
				'description'   => esc_html__( 'Widgets added here will appear in content bottom', 'eskil-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s" data-area="side-area">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . esc_attr( $config['title_tag'] ) . ' class="' . esc_attr( $config['title_class'] ) . '">',
				'after_title'   => '</' . esc_attr( $config['title_tag'] ) . '>',
			)
		);
	}

	add_action( 'widgets_init', 'eskil_core_register_content_bottom_sidebar' );
}

if ( ! function_exists( 'eskil_core_set_content_bottom_classes' ) ) {
	/**
	 * Function that return classes for content bottom area
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function eskil_core_set_content_bottom_classes( $classes ) {
		$is_grid_enabled = 'no' !== eskil_core_get_post_value_through_levels( 'qodef_content_bottom_in_grid' );

		if ( ! $is_grid_enabled ) {
			$classes = 'qodef-content-full-width';
		}

		return $classes;
	}

	add_filter( 'eskil_core_filter_content_bottom_classes', 'eskil_core_set_content_bottom_classes' );
}

if ( ! function_exists( 'eskil_core_get_content_bottom_classes' ) ) {
	/**
	 * Function that return classes for page footer top area
	 *
	 * @return string
	 */
	function eskil_core_get_content_bottom_classes() {
		return apply_filters( 'eskil_core_filter_content_bottom_classes', 'qodef-content-grid' );
	}
}

if ( ! function_exists( 'eskil_core_set_content_bottom_border_classes' ) ) {
	/**
	 * Function that return classes for content bottom area
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function eskil_core_set_content_bottom_border_classes( $classes ) {
		$border_enabled = 'no' !== eskil_core_get_post_value_through_levels( 'qodef_content_bottom_border' );

		if ( ! $border_enabled ) {
			$classes[] = 'qodef-content-bordered';
		}

		return $classes;
	}

	add_filter( 'eskil_core_filter_content_bottom_border_classes', 'eskil_core_set_content_bottom_border_classes' );
}

