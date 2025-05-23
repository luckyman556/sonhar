<?php

if ( ! function_exists( 'eskil_core_add_portfolio_archive_list_options' ) ) {
	/**
	 * Function that add list options for portfolio archive module
	 */
	function eskil_core_add_portfolio_archive_list_options( $tab ) {
		$list_item_layouts = apply_filters( 'eskil_core_filter_portfolio_list_layouts', array() );
		$options_map       = eskil_core_get_variations_options_map( $list_item_layouts );

		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_item_layout',
					'title'         => esc_html__( 'Item Layout', 'eskil-core' ),
					'description'   => esc_html__( 'Choose layout for list item on archive lists', 'eskil-core' ),
					'options'       => $list_item_layouts,
					'default_value' => $options_map['default_value'],
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_behavior',
					'title'       => esc_html__( 'List Appearance', 'eskil-core' ),
					'description' => esc_html__( 'Choose an appearance style for archive lists', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'list_behavior' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_masonry_images_proportion',
					'title'       => esc_html__( 'Masonry Image Proportions', 'eskil-core' ),
					'description' => esc_html__( 'Choose image proportions for archive lists', 'eskil-core' ),
					'options'     => array(
						''      => esc_html__( 'Original', 'eskil-core' ),
						'fixed' => esc_html__( 'Fixed', 'eskil-core' ),
					),
					'dependency'  => array(
						'show' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'masonry',
								'default_value' => 'columns',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_columns',
					'title'       => esc_html__( 'Number of Columns', 'eskil-core' ),
					'description' => esc_html__( 'Choose number of columns for archive lists', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'columns_number' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_space',
					'title'       => esc_html__( 'Space Between Items', 'eskil-core' ),
					'description' => esc_html__( 'Choose space between items for archive lists', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_columns_responsive',
					'title'       => esc_html__( 'Columns Responsive', 'eskil-core' ),
					'description' => esc_html__( 'Choose whether you wish to use predefined column number responsive settings, or to set column numbers for each responsive stage individually', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'columns_responsive' ),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_columns_1440',
					'title'         => esc_html__( 'Number of Columns 1367px - 1440px', 'eskil-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 1367 and 1440 px for archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_columns_1366',
					'title'         => esc_html__( 'Number of Columns 1025px - 1366px', 'eskil-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 1025 and 1366 px for archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_columns_1024',
					'title'         => esc_html__( 'Number of Columns 769px - 1024px', 'eskil-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 769 and 1024 px for archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_columns_768',
					'title'         => esc_html__( 'Number of Columns 681px - 768px', 'eskil-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 681 and 768 px for archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_columns_680',
					'title'         => esc_html__( 'Number of Columns 481px - 680px', 'eskil-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 481 and 680 px for archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_columns_480',
					'title'         => esc_html__( 'Number of Columns 0 - 480px', 'eskil-core' ),
					'description'   => esc_html__( 'Choose number of columns for screens between 0 and 480 px for archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_columns_responsive' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_slider_loop',
					'title'       => esc_html__( 'Enable Slider Loop', 'eskil-core' ),
					'description' => esc_html__( 'Enable loop for slider display of archive lists', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'  => array(
						'show' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_slider_autoplay',
					'title'       => esc_html__( 'Enable Slider Autoplay', 'eskil-core' ),
					'description' => esc_html__( 'Enable autoplay for slider display of archive lists', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'  => array(
						'show' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_archive_slider_speed',
					'title'       => esc_html__( 'Slider Speed', 'eskil-core' ),
					'description' => esc_html__( 'Enter slider speed for slider display of archive lists', 'eskil-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_slider_navigation',
					'title'         => esc_html__( 'Enable Slider Navigation', 'eskil-core' ),
					'description'   => esc_html__( 'Enable navigation for slider display of archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_slider_pagination',
					'title'         => esc_html__( 'Enable Slider Pagination', 'eskil-core' ),
					'description'   => esc_html__( 'Enable pagination for slider display of archive lists', 'eskil-core' ),
					'default_value' => '3',
					'options'       => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'dependency'    => array(
						'show' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);

			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_pagination_type',
					'title'       => esc_html__( 'Pagination', 'eskil-core' ),
					'description' => esc_html__( 'Choose pagination type for archive lists', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'pagination_type' ),
					'dependency'  => array(
						'hide' => array(
							'qodef_portfolio_archive_behavior' => array(
								'values'        => 'slider',
								'default_value' => '',
							),
						),
					),
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_portfolio_options_archive', 'eskil_core_add_portfolio_archive_list_options' );
}
