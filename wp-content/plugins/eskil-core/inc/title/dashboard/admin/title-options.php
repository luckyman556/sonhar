<?php

if ( ! function_exists( 'eskil_core_add_page_title_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_page_title_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ESKIL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'title',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Title', 'eskil-core' ),
				'description' => esc_html__( 'Global Title Options', 'eskil-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_title',
					'title'         => esc_html__( 'Enable Page Title', 'eskil-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page title', 'eskil-core' ),
					'default_value' => 'yes',
				)
			);

			$page_title_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_title_section',
					'title'      => esc_html__( 'Title Area', 'eskil-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_title' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_title_layout',
					'title'         => esc_html__( 'Title Layout', 'eskil-core' ),
					'description'   => esc_html__( 'Choose a title layout', 'eskil-core' ),
					'options'       => apply_filters( 'eskil_core_filter_title_layout_options', array() ),
					'default_value' => 'standard',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_page_title_area_in_grid',
					'title'         => esc_html__( 'Page Title In Grid', 'eskil-core' ),
					'description'   => esc_html__( 'Enabling this option will set page title area to be in grid', 'eskil-core' ),
					'default_value' => 'yes',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height',
					'title'       => esc_html__( 'Height', 'eskil-core' ),
					'description' => esc_html__( 'Enter title height', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'eskil-core' ),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height_on_smaller_screens',
					'title'       => esc_html__( 'Height on Smaller Screens', 'eskil-core' ),
					'description' => esc_html__( 'Enter title height to be displayed on smaller screens with active mobile header', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'eskil-core' ),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_title_background_color',
					'title'       => esc_html__( 'Background Color', 'eskil-core' ),
					'description' => esc_html__( 'Enter page title area background color', 'eskil-core' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_title_background_image',
					'title'       => esc_html__( 'Background Image', 'eskil-core' ),
					'description' => esc_html__( 'Enter page title area background image', 'eskil-core' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_page_title_background_image_behavior',
					'title'      => esc_html__( 'Background Image Behavior', 'eskil-core' ),
					'options'    => array(
						''           => esc_html__( 'Default', 'eskil-core' ),
						'responsive' => esc_html__( 'Set Responsive Image', 'eskil-core' ),
						'parallax'   => esc_html__( 'Set Parallax Image', 'eskil-core' ),
					),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_color',
					'title'      => esc_html__( 'Title Color', 'eskil-core' ),
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_tag',
					'title'         => esc_html__( 'Title Tag', 'eskil-core' ),
					'description'   => esc_html__( 'Enabling this option will set title tag', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h1',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_text_alignment',
					'title'         => esc_html__( 'Text Alignment', 'eskil-core' ),
					'options'       => array(
						'left'   => esc_html__( 'Left', 'eskil-core' ),
						'center' => esc_html__( 'Center', 'eskil-core' ),
						'right'  => esc_html__( 'Right', 'eskil-core' ),
					),
					'default_value' => 'left',
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_vertical_text_alignment',
					'title'         => esc_html__( 'Vertical Text Alignment', 'eskil-core' ),
					'options'       => array(
						'header-bottom' => esc_html__( 'From Bottom of Header', 'eskil-core' ),
						'window-top'    => esc_html__( 'From Window Top', 'eskil-core' ),
					),
					'default_value' => 'header-bottom',
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_page_title_options_map', $page_title_section );
		}
	}

	add_action( 'eskil_core_action_default_options_init', 'eskil_core_add_page_title_options', eskil_core_get_admin_options_map_position( 'title' ) );
}
