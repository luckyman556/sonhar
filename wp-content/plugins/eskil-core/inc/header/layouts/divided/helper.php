<?php
if ( ! function_exists( 'eskil_core_add_divided_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */

	function eskil_core_add_divided_header_global_option( $header_layout_options ) {
		$header_layout_options['divided'] = array(
			'image' => ESKIL_CORE_HEADER_LAYOUTS_URL_PATH . '/divided/assets/img/divided-header.png',
			'label' => esc_html__( 'Divided', 'eskil-core' ),
		);

		return $header_layout_options;
	}

	add_filter( 'eskil_core_filter_header_layout_option', 'eskil_core_add_divided_header_global_option' );
}


if ( ! function_exists( 'eskil_core_register_divided_header_layout' ) ) {
	/**
	 * Function which add header layout into global list
	 *
	 * @param array $header_layouts
	 *
	 * @return array
	 */
	function eskil_core_register_divided_header_layout( $header_layouts ) {
		$header_layout = array(
			'divided' => 'EskilCore_Divided_Header',
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'eskil_core_filter_register_header_layouts', 'eskil_core_register_divided_header_layout' );
}

if ( ! function_exists( 'eskil_core_register_divided_menu' ) ) {
	/**
	 * Function which add additional main menu navigation into global list
	 *
	 * @param array $menus
	 *
	 * @return array
	 */
	function eskil_core_register_divided_menu( $menus ) {
		$menus['divided-menu-left-navigation']  = esc_html__( 'Divided Left Navigation', 'eskil-core' );
		$menus['divided-menu-right-navigation'] = esc_html__( 'Divided Right Navigation', 'eskil-core' );

		return $menus;
	}

	add_filter( 'eskil_filter_register_navigation_menus', 'eskil_core_register_divided_menu' );
}
