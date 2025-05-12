<?php

if ( ! function_exists( 'eskil_core_add_content_bottom_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_content_bottom_meta_box( $page ) {

		if ( $page ) {

			$content_bottom_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-content-bottom',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Content Bottom Settings', 'eskil-core' ),
					'description' => esc_html__( 'Content bottom layout settings', 'eskil-core' ),
				)
			);

			$content_bottom_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_content_bottom',
					'title'       => esc_html__( 'Enable Content Bottom', 'eskil-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page content bottom', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$content_bottom_section = $content_bottom_tab->add_section_element(
				array(
					'name'       => 'qodef_content_bottom_section',
					'title'      => esc_html__( 'Content Bottom Area', 'eskil-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_content_bottom' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);
		}

		$custom_sidebars = eskil_core_get_custom_sidebars();

		if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
			$content_bottom_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_content_bottom_custom_sidebar',
					'title'       => esc_html__( 'Custom Widget Area', 'eskil-core' ),
					'description' => esc_html__( 'Choose a custom widget area to display in content bottom area', 'eskil-core' ),
					'options'     => $custom_sidebars,
				)
			);
		}

		$content_bottom_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_bottom_in_grid',
				'title'       => esc_html__( 'Content Bottom In Grid', 'eskil-core' ),
				'description' => esc_html__( 'Enabling this option will set content bottom area to be in grid', 'eskil-core' ),
				'options'     => eskil_core_get_select_type_options_pool( 'no_yes' ),
			)
		);

		$content_bottom_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_content_bottom_background_color',
				'title'       => esc_html__( 'Background Color', 'eskil-core' ),
				'description' => esc_html__( 'Enter content bottom background color', 'eskil-core' ),
			)
		);

		$content_bottom_section->add_field_element(
			array(
				'field_type' => 'select',
				'name'       => 'qodef_content_bottom_border',
				'title'      => esc_html__( 'Disable Content Bottom Top Border', 'eskil-core' ),
				'options'    => eskil_core_get_select_type_options_pool( 'no_yes' ),
			)
		);
	}

	add_action( 'eskil_core_action_after_general_meta_box_map', 'eskil_core_add_content_bottom_meta_box' );
}

if ( ! function_exists( 'eskil_core_add_general_page_content_bottom_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function eskil_core_add_general_page_content_bottom_meta_box_callback( $callbacks ) {
		$callbacks['page-content-bottom'] = 'eskil_core_add_content_bottom_meta_box';

		return $callbacks;
	}

	add_filter( 'eskil_core_filter_general_meta_box_callbacks', 'eskil_core_add_general_page_content_bottom_meta_box_callback' );
}
