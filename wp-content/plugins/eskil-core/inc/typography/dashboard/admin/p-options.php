<?php

if ( ! function_exists( 'eskil_core_add_p_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_p_typography_options( $page ) {

		if ( $page ) {
			$paragraph_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-paragraph',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Paragraph Typography', 'eskil-core' ),
					'description' => esc_html__( 'Set values for paragraph', 'eskil-core' ),
				)
			);

			$p_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_general_typography_p',
					'title' => esc_html__( 'General Typography', 'eskil-core' ),
				)
			);

			$p_typography_row = $p_typography_section->add_row_element(
				array(
					'name' => 'qodef_p_typography_row',
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_p_color',
					'title'      => esc_html__( 'Color', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_p_font_family',
					'title'      => esc_html__( 'Font Family', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_p_font_weight',
					'title'      => esc_html__( 'Font Weight', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_p_text_transform',
					'title'      => esc_html__( 'Text Transform', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_p_font_style',
					'title'      => esc_html__( 'Font Style', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_margin_top',
					'title'      => esc_html__( 'Margin Top', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$p_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			/* 1366 styles */
			$p_1366_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1366_typography_p',
					'title' => esc_html__( 'Responsive 1366 Typography', 'eskil-core' ),
				)
			);

			$responsive_1366_typography_p_row = $p_1366_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1366_p_typography_row'
				)
			);

			$responsive_1366_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1366_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1366_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1366_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1366_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1366_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1024 styles */
			$p_1024_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_p',
					'title' => esc_html__( 'Responsive 1024 Typography', 'eskil-core' ),
				)
			);

			$responsive_1024_typography_p_row = $p_1024_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1024_p_typography_row',
				)
			);

			$responsive_1024_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 768 styles */
			$p_768_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_768_typography_p',
					'title' => esc_html__( 'Responsive 768 Typography', 'eskil-core' ),
				)
			);

			$responsive_768_typography_p_row = $p_768_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_768_p_typography_row',
				)
			);

			$responsive_768_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_768_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_768_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_768_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_768_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_768_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 680 styles */
			$p_680_typography_section = $paragraph_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_p',
					'title' => esc_html__( 'Responsive 680 Typography', 'eskil-core' ),
				)
			);

			$responsive_680_typography_p_row = $p_680_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_680_p_typography_row',
				)
			);

			$responsive_680_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_p_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_p_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_typography_options_map', 'eskil_core_add_p_typography_options' );
}
