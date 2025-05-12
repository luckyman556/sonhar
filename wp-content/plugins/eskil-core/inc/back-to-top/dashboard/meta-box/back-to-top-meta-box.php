<?php

if ( ! function_exists( 'eskil_core_add_back_to_top_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_back_to_top_meta_box( $general_tab ) {

		if ( $general_tab ) {
			$general_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_back_to_top',
					'title'       => esc_html__( 'Enable Back to Top', 'eskil-core' ),
					'description' => esc_html__( 'Enable Back to Top element', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
				)
			);

			$general_tab->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_back_to_top_skin',
					'title'      => esc_html__( 'Back to Top Skin', 'eskil-core' ),
					'options'    => array(
						''      => esc_html__( 'Default', 'eskil-core' ),
						'light' => esc_html__( 'Light', 'eskil-core' ),
					),
					'dependency' => array(
						'hide' => array(
							'qodef_back_to_top' => array(
								'values'        => 'no',
								'default_value' => '',
							),
						),
					),
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_general_page_meta_box_map', 'eskil_core_add_back_to_top_meta_box' );
}
