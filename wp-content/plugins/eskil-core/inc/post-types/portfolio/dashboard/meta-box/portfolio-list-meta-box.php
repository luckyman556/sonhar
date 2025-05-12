<?php

if ( ! function_exists( 'eskil_core_add_portfolio_item_list_meta_boxes' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_portfolio_item_list_meta_boxes( $page ) {

		if ( $page ) {

			$list_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-list',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'List Settings', 'eskil-core' ),
					'description' => esc_html__( 'Portfolio list settings', 'eskil-core' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_portfolio_list_image',
					'title'       => esc_html__( 'Portfolio List Image', 'eskil-core' ),
					'description' => esc_html__( 'Upload image to be displayed on portfolio list instead of featured image', 'eskil-core' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_masonry_image_dimension_portfolio_item',
					'title'       => esc_html__( 'Image Dimension', 'eskil-core' ),
					'description' => esc_html__( 'Choose an image layout for "masonry behavior" portfolio list. If you are using fixed image proportions on the list, choose an option other than default', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'masonry_image_dimension' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_portfolio_list_thumbnail',
					'title'       => esc_html__( 'Portfolio List Thumbnail', 'eskil-core' ),
					'description' => esc_html__( 'Upload image to be displayed as thumbnail on portfolio list info left layout', 'eskil-core' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_item_padding',
					'title'       => esc_html__( 'Portfolio Item Custom Padding', 'eskil-core' ),
					'description' => esc_html__( 'Choose item padding when it appears in portfolio list (ex. 5% 5% 5% 5%)', 'eskil-core' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_portfolio_single_external_link',
					'title'       => esc_html__( 'Portfolio External Link', 'eskil-core' ),
					'description' => esc_html__( 'Enter URL to link from Portfolio List element', 'eskil-core' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_portfolio_single_external_link_target',
					'title'      => esc_html__( 'Portfolio External Link Target', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'link_target' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_portfolio_list_meta_box_map', $list_tab );
		}
	}

	add_action( 'eskil_core_action_after_portfolio_meta_box_map', 'eskil_core_add_portfolio_item_list_meta_boxes' );
}
