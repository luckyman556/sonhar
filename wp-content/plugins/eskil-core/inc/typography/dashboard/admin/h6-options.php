<?php

if ( ! function_exists( 'eskil_core_add_h6_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_h6_typography_options( $page ) {

		if ( $page ) {
			$h6_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-h6',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'H6 Typography', 'eskil-core' ),
					'description' => esc_html__( 'Set values for Heading 6 HTML element', 'eskil-core' ),
				)
			);

			$h6_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_h6_typography_section',
					'title' => esc_html__( 'General Typography', 'eskil-core' ),
				)
			);

			$h6_typography_row = $h6_typography_section->add_row_element(
				array(
					'name' => 'qodef_h6_typography_row',
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h6_color',
					'title'      => esc_html__( 'Color', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_h6_font_family',
					'title'      => esc_html__( 'Font Family', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_font_weight',
					'title'      => esc_html__( 'Font Weight', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_text_transform',
					'title'      => esc_html__( 'Text Transform', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_font_style',
					'title'      => esc_html__( 'Font Style', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_text_decoration',
					'title'      => esc_html__( 'Text Decoration', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h6_link_hover_color',
					'title'      => esc_html__( 'Link Hover Color', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h6_link_hover_text_decoration',
					'title'      => esc_html__( 'Link Hover Text Decoration', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'text_decoration' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_margin_top',
					'title'      => esc_html__( 'Margin Top', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h6_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'eskil-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			/* 1366 styles */
			$h6_1366_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1366_typography_h6',
					'title' => esc_html__( 'Responsive 1366 Typography', 'eskil-core' ),
				)
			);

			$responsive_1366_typography_h6_row = $h6_1366_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1366_h6_typography_row',
				)
			);

			$responsive_1366_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1366_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1366_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1366_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1366_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1366_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1024 styles */
			$h6_1024_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_h6',
					'title' => esc_html__( 'Responsive 1024 Typography', 'eskil-core' ),
				)
			);

			$responsive_1024_typography_h6_row = $h6_1024_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1024_h6_typography_row',
				)
			);

			$responsive_1024_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 768 styles */
			$h6_768_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_768_typography_h6',
					'title' => esc_html__( 'Responsive 768 Typography', 'eskil-core' ),
				)
			);

			$responsive_768_typography_h6_row = $h6_768_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_768_h6_typography_row',
				)
			);

			$responsive_768_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_768_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_768_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_768_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_768_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_768_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 680 styles */
			$h6_680_typography_section = $h6_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_h6',
					'title' => esc_html__( 'Responsive 680 Typography', 'eskil-core' ),
				)
			);

			$responsive_680_typography_h6_row = $h6_680_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_680_h6_typography_row',
				)
			);

			$responsive_680_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_h6_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h6_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'eskil-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_typography_options_map', 'eskil_core_add_h6_typography_options' );
}
