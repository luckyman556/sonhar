<?php

if ( ! function_exists( 'eskil_core_add_yith_color_and_label_variations_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function eskil_core_add_yith_color_and_label_variations_options( $page ) {

		if ( $page ) {

			$yith_color_and_label_variations_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-yith-color-and-label-variations',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'YITH Color and Label Variations', 'eskil-core' ),
					'description' => esc_html__( 'Settings related to YITH Color and Label Variations', 'eskil-core' ),
				)
			);

			$yith_color_and_label_variations_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_woo_yith_color_and_label_variations_predefined_style',
					'title'         => esc_html__( 'Enable Predefined Style', 'eskil-core' ),
					'description'   => esc_html__( 'Enabling this option will set predefined style for YITH Color and Label Variations plugin', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'yes',
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_woo_options_map', 'eskil_core_add_yith_color_and_label_variations_options' );
}
