<?php

if ( ! function_exists( 'eskil_core_add_404_page_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_404_page_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ESKIL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => '404',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( '404', 'eskil-core' ),
				'description' => esc_html__( 'Global 404 Page Options', 'eskil-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_404_page_title',
					'title'         => esc_html__( 'Enable Page Title', 'eskil-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page title on 404 page', 'eskil-core' ),
					'default_value' => 'no',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_404_page_footer',
					'title'         => esc_html__( 'Enable Page Footer', 'eskil-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page footer on 404 page', 'eskil-core' ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_404_page_background_color',
					'title'       => esc_html__( 'Background Color', 'eskil-core' ),
					'description' => esc_html__( 'Enter 404 page area background color', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_404_page_background_image',
					'title'       => esc_html__( 'Background Image', 'eskil-core' ),
					'description' => esc_html__( 'Enter 404 page area background image', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_404_page_title',
					'title'      => esc_html__( 'Title Label', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_404_page_title_color',
					'title'      => esc_html__( 'Title Color', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_404_page_text',
					'title'      => esc_html__( 'Text Label', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_404_page_text_color',
					'title'      => esc_html__( 'Text Color', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_404_page_button_text',
					'title'      => esc_html__( 'Button Text', 'eskil-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_404_page_options_map', $page );
		}
	}

	add_action( 'eskil_core_action_default_options_init', 'eskil_core_add_404_page_options', eskil_core_get_admin_options_map_position( '404' ) );
}
