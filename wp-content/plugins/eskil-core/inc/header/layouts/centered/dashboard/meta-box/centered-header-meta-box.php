<?php

if ( ! function_exists( 'eskil_core_add_centered_header_meta' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function eskil_core_add_centered_header_meta( $page ) {

		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_centered_header_section',
				'title'      => esc_html__( 'Centered Header', 'eskil-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => 'centered',
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_centered_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'eskil-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'eskil-core' ),
				'default_value' => 'no',
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_centered_header_height',
				'title'       => esc_html__( 'Header Height', 'eskil-core' ),
				'description' => esc_html__( 'Enter header height', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_centered_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header background color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_centered_header_border_color',
				'title'       => esc_html__( 'Header Border Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header border color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_centered_header_border_width',
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
				'name'        => 'qodef_centered_header_border_style',
				'title'       => esc_html__( 'Header Border Style', 'eskil-core' ),
				'description' => esc_html__( 'Choose header border style', 'eskil-core' ),
				'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_centered_header_border_top_color',
				'title'       => esc_html__( 'Header Border Top Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header border top color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_centered_header_border_top_width',
				'title'       => esc_html__( 'Header Border Top Width', 'eskil-core' ),
				'description' => esc_html__( 'Enter header border top width size', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_centered_header_border_top_style',
				'title'       => esc_html__( 'Header Border Top Style', 'eskil-core' ),
				'description' => esc_html__( 'Choose header border top style', 'eskil-core' ),
				'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
			)
		);
	}

	add_action( 'eskil_core_action_after_page_header_meta_map', 'eskil_core_add_centered_header_meta' );
}
