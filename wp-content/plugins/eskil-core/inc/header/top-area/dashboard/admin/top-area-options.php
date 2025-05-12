<?php

if ( ! function_exists( 'eskil_core_add_top_area_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function eskil_core_add_top_area_options( $page, $general_header_tab ) {

		$top_area_section = $general_header_tab->add_section_element(
			array(
				'name'        => 'qodef_top_area_section',
				'title'       => esc_html__( 'Top Area', 'eskil-core' ),
				'description' => esc_html__( 'Options related to top area', 'eskil-core' ),
				'dependency'  => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => eskil_core_dependency_for_top_area_options(),
							'default_value' => apply_filters( 'eskil_core_filter_header_layout_default_option_value', '' ),
						),
					),
				),
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'default_value' => 'no',
				'name'          => 'qodef_top_area_header',
				'title'         => esc_html__( 'Top Area', 'eskil-core' ),
				'description'   => esc_html__( 'Enable top area', 'eskil-core' ),
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'eskil-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'eskil-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'eskil-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'eskil-core' ),
				'default_value' => 'no',
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'eskil-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'eskil-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'eskil-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'eskil-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_margin',
				'title'      => esc_html__( 'Top Area Side Margin', 'eskil-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'eskil-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_set_top_area_header_content_alignment',
				'title'       => esc_html__( 'Content Alignment', 'eskil-core' ),
				'description' => esc_html__( 'Set widgets content alignment inside top header area', 'eskil-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'eskil-core' ),
					'center' => esc_html__( 'Center', 'eskil-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'eskil-core' ),
				'description' => esc_html__( 'Choose top area background color', 'eskil-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_border_color',
				'title'       => esc_html__( 'Top Area Border Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter top area border color', 'eskil-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_border_width',
				'title'       => esc_html__( 'Top Area Border Width', 'eskil-core' ),
				'description' => esc_html__( 'Enter top area border width size', 'eskil-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'eskil-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header_border_style',
				'title'       => esc_html__( 'Top Area Border Style', 'eskil-core' ),
				'description' => esc_html__( 'Choose top area border style', 'eskil-core' ),
				'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
			)
		);
	}

	add_action( 'eskil_core_action_after_header_options_map', 'eskil_core_add_top_area_options', 20, 2 );
}
