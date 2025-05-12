<?php

if ( ! function_exists( 'eskil_core_add_uncovering_section_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_uncovering_section_meta_box( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_uncovering_section',
					'title'         => esc_html__( 'Uncovering Last Section', 'eskil-core' ),
					'description'   => esc_html__( 'Works only with Elementor on pages with disabled footer', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
				)
			);
		}
	}

	add_action( 'eskil_core_action_after_general_page_meta_box_map', 'eskil_core_add_uncovering_section_meta_box', 9 );
}
