<?php

if ( ! function_exists( 'eskil_core_add_blog_list_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_blog_list_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_blog_list_layouts', 'eskil_core_add_blog_list_variation_standard' );
}

if ( ! function_exists( 'eskil_core_set_blog_list_variation_standard_as_default_layout' ) ) {
	/**
	 * Function that set variation default layout value for this module
	 *
	 * @param string $default_value
	 * @param string $shortcode_base
	 *
	 * @return string
	 */
	function eskil_core_set_blog_list_variation_standard_as_default_layout( $default_value, $shortcode_base ) {

		if ( 'eskil_core_blog_list' === $shortcode_base ) {
			$default_value = 'standard';
		}

		return $default_value;
	}

	add_filter( 'eskil_core_filter_map_layout_options_default_value', 'eskil_core_set_blog_list_variation_standard_as_default_layout', 10, 2 );
}

if ( ! function_exists( 'eskil_core_load_blog_list_variation_standard_assets' ) ) {
	/**
	 * Function that return is global blog asses allowed for variation layout
	 *
	 * @param bool $is_enabled
	 * @param array $params
	 *
	 * @return bool
	 */
	function eskil_core_load_blog_list_variation_standard_assets( $is_enabled, $params ) {

		if ( 'standard' === $params['layout'] ) {
			$is_enabled = true;
		}

		return $is_enabled;
	}

	add_filter( 'eskil_core_filter_load_blog_list_assets', 'eskil_core_load_blog_list_variation_standard_assets', 10, 2 );
}

if ( ! function_exists( 'eskil_core_register_blog_list_standard_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function eskil_core_register_blog_list_standard_scripts( $scripts ) {

		$scripts['wp-mediaelement']    = array(
			'registered' => true,
		);
		$scripts['mediaelement-vimeo'] = array(
			'registered' => true,
		);

		return $scripts;
	}

	add_filter( 'eskil_core_filter_blog_list_register_scripts', 'eskil_core_register_blog_list_standard_scripts' );
}

if ( ! function_exists( 'eskil_core_register_blog_list_standard_styles' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $styles
	 *
	 * @return array
	 */
	function eskil_core_register_blog_list_standard_styles( $styles ) {

		$styles['wp-mediaelement'] = array(
			'registered' => true,
		);

		return $styles;
	}

	add_filter( 'eskil_core_filter_blog_list_register_styles', 'eskil_core_register_blog_list_standard_styles' );
}
