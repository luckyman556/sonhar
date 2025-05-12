<?php

if ( ! function_exists( 'eskil_core_add_standard_header_meta' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function eskil_core_add_standard_header_meta( $page ) {
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_header_section',
				'title'      => esc_html__( 'Standard Header', 'eskil-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => array( '', 'standard' ),
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'eskil-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'eskil-core' ),
				'default_value' => '',
				'options'       => eskil_core_get_select_type_options_pool( 'no_yes' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_height',
				'title'       => esc_html__( 'Header Height', 'eskil-core' ),
				'description' => esc_html__( 'Enter header height', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'eskil-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_side_margin',
				'title'       => esc_html__( 'Header Side Margin', 'eskil-core' ),
				'description' => esc_html__( 'Enter side margin for header area', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header background color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_border_color',
				'title'       => esc_html__( 'Header Border Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header border color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_border_width',
				'title'       => esc_html__( 'Header Border Width', 'eskil-core' ),
				'description' => esc_html__( 'Enter header border width size', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_border_style',
				'title'       => esc_html__( 'Header Border Style', 'eskil-core' ),
				'description' => esc_html__( 'Choose header border style', 'eskil-core' ),
				'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_menu_position',
				'title'         => esc_html__( 'Menu position', 'eskil-core' ),
				'default_value' => '',
				'options'       => array(
					''       => esc_html__( 'Default', 'eskil-core' ),
					'left'   => esc_html__( 'Left', 'eskil-core' ),
					'center' => esc_html__( 'Center', 'eskil-core' ),
					'right'  => esc_html__( 'Right', 'eskil-core' ),
				),
			)
		);
	}

	add_action( 'eskil_core_action_after_page_header_meta_map', 'eskil_core_add_standard_header_meta' );
}
