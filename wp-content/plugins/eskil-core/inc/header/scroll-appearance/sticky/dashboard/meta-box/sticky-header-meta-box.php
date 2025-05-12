<?php

if ( ! function_exists( 'eskil_core_add_sticky_header_meta_options' ) ) {
	/**
	 * Function that add additional meta box options for current module
	 *
	 * @param object $section
	 * @param array $custom_sidebars
	 */
	function eskil_core_add_sticky_header_meta_options( $section, $custom_sidebars ) {

		if ( $section ) {

			$sticky_section = $section->add_section_element(
				array(
					'name'       => 'qodef_sticky_header_section',
					'dependency' => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_appearance',
					'title'       => esc_html__( 'Sticky Header Appearance', 'eskil-core' ),
					'description' => esc_html__( 'Select the appearance of sticky header when you scrolling the page', 'eskil-core' ),
					'options'     => array(
						''     => esc_html__( 'Default', 'eskil-core' ),
						'down' => esc_html__( 'Show Sticky on Scroll Down/Up', 'eskil-core' ),
						'up'   => esc_html__( 'Show Sticky on Scroll Up', 'eskil-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_skin',
					'title'       => esc_html__( 'Sticky Header Skin', 'eskil-core' ),
					'description' => esc_html__( 'Choose a predefined sticky header style for header elements', 'eskil-core' ),
					'options'     => array(
						''      => esc_html__( 'Default', 'eskil-core' ),
						'none'  => esc_html__( 'None', 'eskil-core' ),
						'light' => esc_html__( 'Light', 'eskil-core' ),
						'dark'  => esc_html__( 'Dark', 'eskil-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_scroll_amount',
					'title'       => esc_html__( 'Sticky Scroll Amount', 'eskil-core' ),
					'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'eskil-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_side_padding',
					'title'       => esc_html__( 'Sticky Header Side Padding', 'eskil-core' ),
					'description' => esc_html__( 'Enter side padding for sticky header area', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'eskil-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_sticky_header_background_color',
					'title'       => esc_html__( 'Sticky Header Background Color', 'eskil-core' ),
					'description' => esc_html__( 'Enter sticky header background color', 'eskil-core' ),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_sticky_header_border_color',
					'title'       => esc_html__( 'Sticky Header Border Color', 'eskil-core' ),
					'description' => esc_html__( 'Enter sticky header border color', 'eskil-core' ),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_border_width',
					'title'       => esc_html__( 'Sticky Header Border Width', 'eskil-core' ),
					'description' => esc_html__( 'Enter sticky header border width size', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'eskil-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_border_style',
					'title'       => esc_html__( 'Sticky Header Border Style', 'eskil-core' ),
					'description' => esc_html__( 'Choose sticky header border style', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'border_style' ),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_one',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area One', 'eskil-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area one', 'eskil-core' ),
					'options'     => $custom_sidebars,
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_two',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area Two', 'eskil-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area two', 'eskil-core' ),
					'options'     => $custom_sidebars,
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_header_scroll_appearance_meta_options_map', 'eskil_core_add_sticky_header_meta_options', 10, 2 );
}

if ( ! function_exists( 'eskil_core_add_sticky_header_logo_meta_options' ) ) {
	/**
	 * Function that add additional header logo meta box options
	 *
	 * @param object $logo_tab
	 * @param array $header_page
	 * @param array $logo_image_section
	 */
	function eskil_core_add_sticky_header_logo_meta_options( $logo_tab, $header_page, $logo_image_section ) {

		if ( $header_page ) {
			$logo_image_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_sticky',
					'title'       => esc_html__( 'Logo - Sticky', 'eskil-core' ),
					'description' => esc_html__( 'Choose sticky logo image', 'eskil-core' ),
					'multiple'    => 'no',
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_header_logo_image_section_meta_map', 'eskil_core_add_sticky_header_logo_meta_options', 10, 3 );
}

if ( ! function_exists( 'eskil_core_add_sticky_header_logo_svg_meta_options' ) ) {
	/**
	 * Function that add additional header logo options
	 *
	 * @param object $page
	 * @param array $header_tab
	 * @param array $logo_svg_path_section
	 */
	function eskil_core_add_sticky_header_logo_svg_meta_options( $page, $header_tab, $logo_svg_path_section ) {

		if ( $header_tab ) {
			$logo_svg_path_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_logo_sticky_svg_path',
					'title'       => esc_html__( 'Logo Sticky - SVG Path', 'eskil-core' ),
					'description' => esc_html__( 'Enter your logo icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'eskil-core' ),
				)
			);
		}
	}

	add_action( 'eskil_core_action_before_header_logo_svg_path_section_meta_map', 'eskil_core_add_sticky_header_logo_svg_meta_options', 10, 3 );
}
