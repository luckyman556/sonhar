<?php

if ( ! function_exists( 'eskil_core_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_general_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_main_color',
					'title'       => esc_html__( 'Main Color', 'eskil-core' ),
					'description' => esc_html__( 'Choose the most dominant theme color', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_background_color',
					'title'       => esc_html__( 'Page Background Color', 'eskil-core' ),
					'description' => esc_html__( 'Set background color', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_background_image',
					'title'       => esc_html__( 'Page Background Image', 'eskil-core' ),
					'description' => esc_html__( 'Set background image', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_background_repeat',
					'title'       => esc_html__( 'Page Background Image Repeat', 'eskil-core' ),
					'description' => esc_html__( 'Set background image repeat', 'eskil-core' ),
					'options'     => array(
						''          => esc_html__( 'Default', 'eskil-core' ),
						'no-repeat' => esc_html__( 'No Repeat', 'eskil-core' ),
						'repeat'    => esc_html__( 'Repeat', 'eskil-core' ),
						'repeat-x'  => esc_html__( 'Repeat-x', 'eskil-core' ),
						'repeat-y'  => esc_html__( 'Repeat-y', 'eskil-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_background_size',
					'title'       => esc_html__( 'Page Background Image Size', 'eskil-core' ),
					'description' => esc_html__( 'Set background image size', 'eskil-core' ),
					'options'     => array(
						''        => esc_html__( 'Default', 'eskil-core' ),
						'contain' => esc_html__( 'Contain', 'eskil-core' ),
						'cover'   => esc_html__( 'Cover', 'eskil-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_background_attachment',
					'title'       => esc_html__( 'Page Background Image Attachment', 'eskil-core' ),
					'description' => esc_html__( 'Set background image attachment', 'eskil-core' ),
					'options'     => array(
						''       => esc_html__( 'Default', 'eskil-core' ),
						'fixed'  => esc_html__( 'Fixed', 'eskil-core' ),
						'scroll' => esc_html__( 'Scroll', 'eskil-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding',
					'title'       => esc_html__( 'Page Content Padding', 'eskil-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_content_padding_mobile',
					'title'       => esc_html__( 'Page Content Padding Mobile', 'eskil-core' ),
					'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_boxed',
					'title'         => esc_html__( 'Boxed Layout', 'eskil-core' ),
					'description'   => esc_html__( 'Set boxed layout', 'eskil-core' ),
					'default_value' => 'no',
				)
			);

			$boxed_section = $page->add_section_element(
				array(
					'name'       => 'qodef_boxed_section',
					'title'      => esc_html__( 'Boxed Layout Section', 'eskil-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_boxed' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$boxed_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_boxed_background_color',
					'title'       => esc_html__( 'Boxed Background Color', 'eskil-core' ),
					'description' => esc_html__( 'Set boxed background color', 'eskil-core' ),
				)
			);

			$boxed_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_boxed_background_pattern',
					'title'       => esc_html__( 'Boxed Background Pattern', 'eskil-core' ),
					'description' => esc_html__( 'Set boxed background pattern', 'eskil-core' ),
				)
			);

			$boxed_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_boxed_background_pattern_behavior',
					'title'       => esc_html__( 'Boxed Background Pattern Behavior', 'eskil-core' ),
					'description' => esc_html__( 'Set boxed background pattern behavior', 'eskil-core' ),
					'options'     => array(
						'fixed'  => esc_html__( 'Fixed', 'eskil-core' ),
						'scroll' => esc_html__( 'Scroll', 'eskil-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_passepartout',
					'title'         => esc_html__( 'Passepartout', 'eskil-core' ),
					'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'eskil-core' ),
					'default_value' => 'no',
				)
			);

			$passepartout_section = $page->add_section_element(
				array(
					'name'       => 'qodef_passepartout_section',
					'title'      => esc_html__( 'Passepartout Section', 'eskil-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_passepartout' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_passepartout_color',
					'title'       => esc_html__( 'Passepartout Color', 'eskil-core' ),
					'description' => esc_html__( 'Choose background color for passepartout', 'eskil-core' ),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_passepartout_image',
					'title'       => esc_html__( 'Passepartout Background Image', 'eskil-core' ),
					'description' => esc_html__( 'Set background image for passepartout', 'eskil-core' ),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_passepartout_size',
					'title'       => esc_html__( 'Passepartout Size', 'eskil-core' ),
					'description' => esc_html__( 'Enter size amount for passepartout', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'eskil-core' ),
					),
				)
			);

			$passepartout_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_passepartout_size_responsive',
					'title'       => esc_html__( 'Passepartout Responsive Size', 'eskil-core' ),
					'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'eskil-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'eskil-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_content_width',
					'title'         => esc_html__( 'Initial Width of Content', 'eskil-core' ),
					'description'   => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'content_width', false ),
					'default_value' => '1300',
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_general_options_map', $page );

			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_custom_js',
					'title'       => esc_html__( 'Custom JS', 'eskil-core' ),
					'description' => esc_html__( 'Enter your custom JavaScript here', 'eskil-core' ),
				)
			);
		}
	}

	add_action( 'eskil_core_action_default_options_init', 'eskil_core_add_general_options', eskil_core_get_admin_options_map_position( 'general' ) );
}
