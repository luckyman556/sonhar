<?php

if ( ! function_exists( 'eskil_core_nav_menu_meta_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_nav_menu_meta_options( $page ) {

		if ( $page ) {

			$section = $page->add_section_element(
				array(
					'name'  => 'qodef_nav_menu_section',
					'title' => esc_html__( 'Main Menu', 'eskil-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_dropdown_top_position',
					'title'       => esc_html__( 'Dropdown Position', 'eskil-core' ),
					'description' => esc_html__( 'Enter value in percentage of entire header height', 'eskil-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_wide_dropdown_full_width',
					'title'         => esc_html__( 'Wide Dropdown Full Width', 'eskil-core' ),
					'default_value' => 'yes',
				)
			);

			$section_dropdown_content = $section->add_section_element(
				array(
					'name'       => 'qodef_wide_dropdown_content_section',
					'title'      => esc_html__( 'Wide Dropdown Full Width', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_wide_dropdown_full_width' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$row_dropdown_content = $section_dropdown_content->add_row_element(
				array(
					'name'       => 'qodef_wide_dropdown_content_row',
					'title'      => '',
					'dependency' => array(
						'show' => array(
							'qodef_wide_dropdown_full_width' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$row_dropdown_content->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_wide_dropdown_content_grid',
					'title'         => esc_html__( 'Wide Dropdown Content In Grid', 'eskil-core' ),
					'default_value' => 'no',
					'args'          => array(
						'col_width' => 4,
					),
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_page_header_meta_map', 'eskil_core_nav_menu_meta_options' );
}
