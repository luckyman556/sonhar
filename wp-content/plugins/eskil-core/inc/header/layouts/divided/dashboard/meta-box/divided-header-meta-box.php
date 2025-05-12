<?php

if ( ! function_exists( 'eskil_core_add_divided_header_meta' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function eskil_core_add_divided_header_meta( $page ) {

		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_divided_header_section',
				'title'      => esc_html__( 'Divided Header', 'eskil-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => 'divided',
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_height',
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
				'name'        => 'qodef_divided_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'eskil-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'eskil-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_divided_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header background color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_divided_header_border_color',
				'title'       => esc_html__( 'Header Border Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header border color', 'eskil-core' ),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_border_width',
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
				'name'        => 'qodef_divided_header_border_style',
				'title'       => esc_html__( 'Header Border Style', 'eskil-core' ),
				'description' => esc_html__( 'Choose header border style', 'eskil-core' ),
				'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
			)
		);
	}

	add_action( 'eskil_core_action_after_page_header_meta_map', 'eskil_core_add_divided_header_meta' );
}
