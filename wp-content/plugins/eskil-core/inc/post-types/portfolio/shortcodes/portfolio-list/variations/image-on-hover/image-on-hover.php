<?php

if ( ! function_exists( 'eskil_core_add_portfolio_list_variation_image_on_hover' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_list_variation_image_on_hover( $variations ) {
		$variations['image-on-hover'] = esc_html__( 'Image On Hover', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_portfolio_list_layouts', 'eskil_core_add_portfolio_list_variation_image_on_hover' );
}

if ( ! function_exists( 'eskil_core_add_portfolio_list_options_image_on_hover' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function eskil_core_add_portfolio_list_options_image_on_hover( $options ) {
		$image_on_hover_options   = array();
		$hover_color_option       = array(
			'field_type' => 'color',
			'name'       => 'image_on_hover_hover_color',
			'title'      => esc_html__( 'Hover Color', 'eskil-core' ),
			'dependency' => array(
				'show' => array(
					'layout' => array(
						'values'        => 'image-on-hover',
						'default_value' => '',
					),
				),
			),
			'group'      => esc_html__( 'Layout', 'eskil-core' ),
		);
		$image_on_hover_options[] = $hover_color_option;

		return array_merge( $options, $image_on_hover_options );
	}

	add_filter( 'eskil_core_filter_portfolio_list_extra_options', 'eskil_core_add_portfolio_list_options_image_on_hover' );
}
