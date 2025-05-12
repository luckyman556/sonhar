<?php

if ( ! function_exists( 'eskil_core_add_product_single_product_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_product_single_product_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product' ),
				'type'  => 'meta',
				'slug'  => 'product-single',
				'title' => esc_html__( 'Product Single', 'eskil-core' ),
			)
		);

		if ( $page ) {

			$single_layouts = apply_filters(
				'eskil_core_filter_woo_single_product_layouts',
				array(
					''         => esc_html__( 'Default', 'eskil-core' ),
					'standard' => esc_html__( 'Standard', 'eskil-core' ),
				)
			);

			if ( count( $single_layouts ) > 1 ) {
				$page->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_woo_single_layout',
						'title'       => esc_html__( 'Product layout', 'eskil-core' ),
						'description' => esc_html__( 'Choose a default layout for single product page', 'eskil-core' ),
						'options'     => $single_layouts,
					)
				);
			}

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_product_images_gallery',
					'title'       => esc_html__( 'Upload Gallery Images', 'eskil-core' ),
					'description' => esc_html__( 'Gallery used for this layout', 'eskil-core' ),
					'multiple'    => 'yes',
					'dependency'  => array(
						'show' => array(
							'qodef_woo_single_layout' => array(
								'values'        => 'slider',
								'default_value' => 'default',
							),
						),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_product_bg_color',
					'title'      => esc_html__( 'Background Color', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_woo_single_layout' => array(
								'values'        => array( 'slider', 'full-width' ),
								'default_value' => '',
							),
						),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_single_thumb_images_position',
					'title'         => esc_html__( 'Set Thumbnail Images Position', 'eskil-core' ),
					'description'   => esc_html__( 'Choose position of the thumbnail images on single product page relative to featured image', 'eskil-core' ),
					'options'       => array(
						''      => esc_html__( 'Default', 'eskil-core' ),
						'below' => esc_html__( 'Below', 'eskil-core' ),
						'left'  => esc_html__( 'Left', 'eskil-core' ),
					),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'qodef_woo_single_layout' => array(
								'values'        => array( '', 'standard' ),
								'default_value' => '',
							),
						),
					),
				)
			);

			if ( qode_framework_is_installed( 'elementor' ) && qode_framework_is_installed( 'theme' ) ) {
				$elementor_sections = eskil_core_generate_elementor_designer_templates_control( $page );

				if ( ! empty( $elementor_sections ) ) {
					$page->add_field_element( $elementor_sections );
				}
			}

			$section = $page->add_section_element(
				array(
					'name'  => 'qodef_product_bottom_section',
					'title' => esc_html__( 'Bottom Info', 'eskil-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_bottom_section_icon',
					'title'      => esc_html__( 'SVG Icon', 'eskil-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_section_text_top',
					'title'      => esc_html__( 'Text Top', 'eskil-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_bottom_section_text_bottom',
					'title'      => esc_html__( 'Text Bottom', 'eskil-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_product_single_meta_box_map', $page );
		}
	}

	add_action( 'eskil_core_action_default_meta_boxes_init', 'eskil_core_add_product_single_product_meta_box' );
}
