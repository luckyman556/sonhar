<?php

if ( ! function_exists( 'eskil_core_add_page_spinner_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_page_spinner_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_spinner',
					'title'         => esc_html__( 'Enable Page Spinner', 'eskil-core' ),
					'description'   => esc_html__( 'Enable Page Spinner Effect', 'eskil-core' ),
					'default_value' => 'no',
				)
			);

			$spinner_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_spinner_section',
					'title'      => esc_html__( 'Page Spinner Section', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_spinner' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_spinner_type',
					'title'         => esc_html__( 'Select Page Spinner Type', 'eskil-core' ),
					'description'   => esc_html__( 'Choose a page spinner animation style', 'eskil-core' ),
					'options'       => apply_filters( 'eskil_core_filter_page_spinner_layout_options', array() ),
					'default_value' => apply_filters( 'eskil_core_filter_page_spinner_default_layout_option', '' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_spinner_gallery',
					'title'       => esc_html__( 'Upload Spinner Images', 'eskil-core' ),
					'description' => esc_html__( 'Choose exactly 36 images', 'eskil-core' ),
					'multiple'    => 'yes',
					'dependency'  => array(
						'show' => array(
							'qodef_page_spinner_type' => array(
								'values'        => 'eskil',
								'default_value' => '',
							),
						),
					),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_background_color',
					'title'       => esc_html__( 'Spinner Background Color', 'eskil-core' ),
					'description' => esc_html__( 'Choose the spinner background color', 'eskil-core' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_color',
					'title'       => esc_html__( 'Spinner Color', 'eskil-core' ),
					'description' => esc_html__( 'Choose the spinner color', 'eskil-core' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_page_spinner_text',
					'title'         => esc_html__( 'Spinner Text', 'eskil-core' ),
					'description'   => esc_html__( 'Enter the spinner text', 'eskil-core' ),
					'default_value' => 'eskil',
					'dependency'    => array(
						'show' => array(
							'qodef_page_spinner_type' => array(
								'values'        => 'textual',
								'default_value' => ''
							)
						)
					)
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_page_spinner_fade_out_animation',
					'title'         => esc_html__( 'Enable Fade Out Animation', 'eskil-core' ),
					'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'eskil-core' ),
					'default_value' => 'no',
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_general_options_map', 'eskil_core_add_page_spinner_options' );
}
