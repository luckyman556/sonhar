<?php

if ( ! function_exists( 'eskil_core_add_button_variation_outlined' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_button_variation_outlined( $variations ) {
		$variations['outlined'] = esc_html__( 'Outlined', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_button_layouts', 'eskil_core_add_button_variation_outlined' );
}

if ( ! function_exists( 'eskil_core_add_button_variation_outlined_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 * @param string $default_layout
	 *
	 * @return array
	 */
	function eskil_core_add_button_variation_outlined_options( $options ) {
		$outlined_options   = array();
		$enable_icon        = array(
			'field_type' => 'select',
			'name'       => 'outlined_enable_icon',
			'title'      => esc_html__( 'Enable Icon', 'eskil-core' ),
			'options'    => eskil_core_get_select_type_options_pool( 'yes_no', false ),
			'dependency' => array(
				'show' => array(
					'button_layout' => array(
						'values'        => 'outlined',
						'default_value' => '',
					),
				),
			),
		);
		$outlined_options[] = $enable_icon;

		return array_merge( $options, $outlined_options );
	}

	add_filter( 'eskil_core_filter_button_extra_options', 'eskil_core_add_button_variation_outlined_options' );
}
