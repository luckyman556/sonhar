<?php

if ( ! function_exists( 'eskil_core_add_portfolio_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_portfolio_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'  => array( 'portfolio-item' ),
				'type'   => 'meta',
				'slug'   => 'portfolio-item',
				'title'  => esc_html__( 'Portfolio Settings', 'eskil-core' ),
				'layout' => 'tabbed',
			)
		);

		if ( $page ) {

			$general_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-general',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'General Settings', 'eskil-core' ),
					'description' => esc_html__( 'General portfolio settings', 'eskil-core' ),
				)
			);

			$general_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_single_layout',
					'title'       => esc_html__( 'Single Layout', 'eskil-core' ),
					'description' => esc_html__( 'Choose default layout for portfolio single', 'eskil-core' ),
					'options'     => apply_filters( 'eskil_core_filter_portfolio_single_layout_options', array( '' => esc_html__( 'Default', 'eskil-core' ) ) ),
				)
			);

			$section_columns = $general_tab->add_section_element(
				array(
					'name'       => 'qodef_portfolio_columns_section',
					'dependency' => array(
						'show' => array(
							'qodef_portfolio_single_layout' => array(
								'values'        => array(
									'masonry-big',
									'masonry-small',
									'gallery-big',
									'gallery-small',
								),
								'default_value' => '',
							),
						),
					),
				)
			);

			$section_columns->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_columns_number',
					'title'      => esc_html__( 'Number of Columns', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'columns_number' ),
				)
			);

			$section_columns->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_space_between_items',
					'title'      => esc_html__( 'Space Between Items', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$section_media = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_portfolio_media_section',
					'title'       => esc_html__( 'Media Settings', 'eskil-core' ),
					'description' => esc_html__( 'Media that will be displayed on portfolio page', 'eskil-core' ),
				)
			);

			$media_repeater = $section_media->add_repeater_element(
				array(
					'name'        => 'qodef_portfolio_media',
					'title'       => esc_html__( 'Media Items', 'eskil-core' ),
					'description' => esc_html__( 'Enter media items for this portfolio', 'eskil-core' ),
					'button_text' => esc_html__( 'Add Media', 'eskil-core' ),
				)
			);

			$media_repeater->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_media_type',
					'title'         => esc_html__( 'Media Item Type', 'eskil-core' ),
					'options'       => array(
						'gallery' => esc_html__( 'Gallery', 'eskil-core' ),
						'image'   => esc_html__( 'Image', 'eskil-core' ),
						'video'   => esc_html__( 'Video', 'eskil-core' ),
						'audio'   => esc_html__( 'Audio', 'eskil-core' ),
					),
					'default_value' => 'gallery',
				)
			);

			$media_repeater->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_portfolio_gallery',
					'title'      => esc_html__( 'Upload Portfolio Images', 'eskil-core' ),
					'multiple'   => 'yes',
					'dependency' => array(
						'show' => array(
							'qodef_portfolio_media_type' => array(
								'values'        => 'gallery',
								'default_value' => 'gallery',
							),
						),
					),
				)
			);

			$media_repeater->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_portfolio_image',
					'title'      => esc_html__( 'Upload Portfolio Image', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_portfolio_media_type' => array(
								'values'        => 'image',
								'default_value' => 'gallery',
							),
						),
					),
				)
			);

			$media_repeater->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_video',
					'title'       => esc_html__( 'Video URL', 'eskil-core' ),
					'description' => esc_html__( 'Enter your video URL', 'eskil-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_portfolio_media_type' => array(
								'values'        => 'video',
								'default_value' => 'gallery',
							),
						),
					),
				)
			);

			$media_repeater->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_audio',
					'title'       => esc_html__( 'Audio URL', 'eskil-core' ),
					'description' => esc_html__( 'Enter your audio URL', 'eskil-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_portfolio_media_type' => array(
								'values'        => 'audio',
								'default_value' => 'gallery',
							),
						),
					),
				)
			);

			$section_info = $general_tab->add_section_element(
				array(
					'name'        => 'qodef_portfolio_info_section',
					'title'       => esc_html__( 'Info Settings', 'eskil-core' ),
					'description' => esc_html__( 'Info that will be displayed on portfolio page', 'eskil-core' ),
				)
			);

			$info_items_repeater = $section_info->add_repeater_element(
				array(
					'name'        => 'qodef_portfolio_info_items',
					'title'       => esc_html__( 'Info Items', 'eskil-core' ),
					'description' => esc_html__( 'Enter additional info for portoflio item', 'eskil-core' ),
					'button_text' => esc_html__( 'Add Item', 'eskil-core' ),
				)
			);

			$info_items_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_info_item_label',
					'title'      => esc_html__( 'Item Label', 'eskil-core' ),
				)
			);

			$info_items_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_info_item_value',
					'title'      => esc_html__( 'Item Text', 'eskil-core' ),
				)
			);

			$info_items_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_info_item_link',
					'title'      => esc_html__( 'Item Link', 'eskil-core' ),
				)
			);

			$info_items_repeater->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_info_item_target',
					'title'      => esc_html__( 'Item Target', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'link_target' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_portfolio_meta_box_map', $page, $general_tab );
		}
	}

	add_action( 'eskil_core_action_default_meta_boxes_init', 'eskil_core_add_portfolio_single_meta_box' );
}

if ( ! function_exists( 'eskil_core_include_general_meta_boxes_for_portfolio_single' ) ) {
	/**
	 * Function that add general meta box options for this module
	 */
	function eskil_core_include_general_meta_boxes_for_portfolio_single() {
		$callbacks = eskil_core_general_meta_box_callbacks();

		if ( ! empty( $callbacks ) ) {
			foreach ( $callbacks as $module => $callback ) {

				if ( 'page-sidebar' !== $module ) {
					add_action( 'eskil_core_action_after_portfolio_meta_box_map', $callback );
				}
			}
		}
	}

	add_action( 'eskil_core_action_default_meta_boxes_init', 'eskil_core_include_general_meta_boxes_for_portfolio_single', 8 ); // Permission 8 is set in order to load it before default meta box function
}
