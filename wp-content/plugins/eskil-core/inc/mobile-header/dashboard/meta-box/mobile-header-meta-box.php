<?php

if ( ! function_exists( 'eskil_core_add_page_mobile_header_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_page_mobile_header_meta_box( $page ) {

		if ( $page ) {
			$mobile_header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-mobile-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Mobile Header Settings', 'eskil-core' ),
					'description' => esc_html__( 'Mobile header layout settings', 'eskil-core' ),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_mobile_header_layout',
					'title'       => esc_html__( 'Mobile Header Layout', 'eskil-core' ),
					'description' => esc_html__( 'Choose a mobile header layout to set for your website', 'eskil-core' ),
					'args'        => array( 'images' => true ),
					'options'     => eskil_core_header_radio_to_select_options( apply_filters( 'eskil_core_filter_mobile_header_layout_option', array() ) ),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_mobile_header_in_grid',
					'title'         => esc_html__( 'Content in Grid', 'eskil-core' ),
					'description'   => esc_html__( 'Set content to be in grid', 'eskil-core' ),
					'default_value' => '',
					'options'       => eskil_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_mobile_header_border_color',
					'title'       => esc_html__( 'Header Border Color', 'eskil-core' ),
					'description' => esc_html__( 'Enter header border color', 'eskil-core' ),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_header_border_width',
					'title'       => esc_html__( 'Header Border Width', 'eskil-core' ),
					'description' => esc_html__( 'Enter header border width size', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'eskil-core' ),
					),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_mobile_header_border_style',
					'title'       => esc_html__( 'Header Border Style', 'eskil-core' ),
					'description' => esc_html__( 'Choose header border style', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_mobile_header_skin',
					'title'       => esc_html__( 'Mobile Header Skin', 'eskil-core' ),
					'description' => esc_html__( 'Choose a predefined header style for mobile header elements', 'eskil-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'eskil-core' ),
						'light' => esc_html__( 'Light', 'eskil-core' ),
						'dark'  => esc_html__( 'Dark', 'eskil-core' ),
					),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_page_mobile_header_meta_map', $mobile_header_tab );
		}
	}

	add_action( 'eskil_core_action_after_general_meta_box_map', 'eskil_core_add_page_mobile_header_meta_box' );
}

if ( ! function_exists( 'eskil_core_add_general_mobile_header_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function eskil_core_add_general_mobile_header_meta_box_callback( $callbacks ) {
		$callbacks['mobile-header'] = 'eskil_core_add_page_mobile_header_meta_box';

		return $callbacks;
	}

	add_filter( 'eskil_core_filter_general_meta_box_callbacks', 'eskil_core_add_general_mobile_header_meta_box_callback' );
}
