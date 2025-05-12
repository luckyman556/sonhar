<?php

if ( ! function_exists( 'eskil_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function eskil_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ESKIL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'eskil-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'eskil-core' ),
				'icon'        => 'fa fa-cog',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'eskil-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts',
					),
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'eskil-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'eskil-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'eskil-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type'  => 'googlefont',
					'name'        => 'qodef_choose_google_font',
					'title'       => esc_html__( 'Google Font', 'eskil-core' ),
					'description' => esc_html__( 'Choose Google Font', 'eskil-core' ),
					'args'        => array(
						'include' => 'google-fonts',
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'eskil-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'eskil-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'eskil-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'eskil-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'eskil-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'eskil-core' ),
						'300'  => esc_html__( '300 Light', 'eskil-core' ),
						'300i' => esc_html__( '300 Light Italic', 'eskil-core' ),
						'400'  => esc_html__( '400 Regular', 'eskil-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'eskil-core' ),
						'500'  => esc_html__( '500 Medium', 'eskil-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'eskil-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'eskil-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'eskil-core' ),
						'700'  => esc_html__( '700 Bold', 'eskil-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'eskil-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'eskil-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'eskil-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'eskil-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'eskil-core' ),
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'eskil-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'eskil-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'eskil-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'eskil-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'eskil-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'eskil-core' ),
						'greek'        => esc_html__( 'Greek', 'eskil-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'eskil-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'eskil-core' ),
					),
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'eskil-core' ),
					'description' => esc_html__( 'Add custom fonts', 'eskil-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'eskil-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_ttf',
					'title'      => esc_html__( 'Custom Font TTF', 'eskil-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_otf',
					'title'      => esc_html__( 'Custom Font OTF', 'eskil-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff',
					'title'      => esc_html__( 'Custom Font WOFF', 'eskil-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff2',
					'title'      => esc_html__( 'Custom Font WOFF2', 'eskil-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_custom_font_name',
					'title'      => esc_html__( 'Custom Font Name', 'eskil-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'eskil_core_action_default_options_init', 'eskil_core_add_fonts_options', eskil_core_get_admin_options_map_position( 'fonts' ) );
}
