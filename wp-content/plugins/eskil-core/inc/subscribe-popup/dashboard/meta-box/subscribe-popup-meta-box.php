<?php

if ( ! function_exists( 'eskil_core_add_subscribe_popup_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_subscribe_popup_meta_box( $general_tab ) {

		if ( $general_tab ) {
			$general_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_subscribe_popup',
					'title'         => esc_html__( 'Enable Subscribe Popup', 'eskil-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable subscribe popup', 'eskil-core' ),
					'default_value' => 'no',
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_general_page_meta_box_map', 'eskil_core_add_subscribe_popup_meta_box', 9 );
}
