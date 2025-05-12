<?php

if ( ! function_exists( 'eskil_core_add_page_side_area_mobile_header_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_page_side_area_mobile_header_meta_box( $page ) {

		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_side_area_mobile_header_section',
				'title'      => esc_html__( 'Side Area Mobile Header', 'eskil-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_mobile_header_layout' => array(
							'values'        => 'side-area',
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_side_area_mobile_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter header background color', 'eskil-core' ),
			)
		);
	}

	add_action( 'eskil_core_action_after_page_mobile_header_meta_map', 'eskil_core_add_page_side_area_mobile_header_meta_box' );
}

