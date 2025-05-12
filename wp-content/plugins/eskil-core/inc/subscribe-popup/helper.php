<?php

if ( ! function_exists( 'eskil_core_get_subscribe_popup' ) ) {
	/**
	 * Loads subscribe popup HTML
	 */
	function eskil_core_get_subscribe_popup() {
		if ( 'yes' === eskil_core_get_post_value_through_levels( 'qodef_enable_subscribe_popup' ) && ! empty( eskil_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' ) ) ) {
			eskil_core_load_subscribe_popup_template();
		}
	}

	// Get subscribe popup HTML
	add_action( 'eskil_action_before_wrapper_close_tag', 'eskil_core_get_subscribe_popup' );
}

if ( ! function_exists( 'eskil_core_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function eskil_core_load_subscribe_popup_template() {
		$params                     = array();
		$params['title']            = eskil_core_get_option_value( 'admin', 'qodef_subscribe_popup_title' );
		$params['subtitle']         = eskil_core_get_option_value( 'admin', 'qodef_subscribe_popup_subtitle' );
		$background_image           = eskil_core_get_option_value( 'admin', 'qodef_subscribe_popup_background_image' );
		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['contact_form']     = eskil_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' );
		$params['enable_prevent']   = eskil_core_get_option_value( 'admin', 'qodef_enable_subscribe_popup_prevent' );
		$params['prevent_behavior'] = eskil_core_get_option_value( 'admin', 'qodef_subscribe_popup_prevent_behavior' );

		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-sp-prevent-' . $params['prevent_behavior'] : 'qodef-sp-prevent-session';
		$params['holder_classes'] = implode( ' ', $holder_classes );

		echo eskil_core_get_template_part( 'subscribe-popup', 'templates/subscribe-popup', '', $params );
	}
}
