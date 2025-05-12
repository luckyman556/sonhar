<?php

if ( ! function_exists( 'eskil_membership_include_reset_password_navigation_template' ) ) {
	/**
	 * Loads modal template
	 */
	function eskil_membership_include_reset_password_navigation_template() {
		$params = array(
			'item_class' => 'qodef--reset-password',
			'item_label' => esc_attr__( 'Reset Password', 'eskil-membership' ),
			'item_link'  => '#qodef-membership-reset-password-modal-part',
		);

		eskil_membership_template_part( 'login-modal', 'templates/parts/navigation-item', '', $params );
	}

	add_action( 'eskil_membership_action_login_modal_navigation_item', 'eskil_membership_include_reset_password_navigation_template', 20 );
}

if ( ! function_exists( 'eskil_membership_include_reset_password_template' ) ) {
	/**
	 * Loads modal template
	 */
	function eskil_membership_include_reset_password_template() {
		eskil_membership_template_part( 'login-modal/reset-password', 'templates/reset-password-form' );
	}

	add_action( 'eskil_membership_action_login_modal_content', 'eskil_membership_include_reset_password_template', 20 );
}

if ( ! function_exists( 'eskil_membership_init_rest_api_reset_password' ) ) {
	/**
	 * Main login modal function that is triggered through reset password modal ajax
	 */
	function eskil_membership_init_rest_api_reset_password( $options ) {

		if ( ! empty( $options ) ) {
			$credentials               = array();
			$credentials['user_login'] = $options['user_login'];

			if ( empty( $credentials['user_login'] ) || ( ! email_exists( $credentials['user_login'] ) && ! username_exists( $credentials['user_login'] ) ) ) {
				qode_framework_get_ajax_status( 'error', esc_html__( 'Please provide a valid user.', 'eskil-membership' ) );
			}

			$_POST['user_login'] = $credentials['user_login'];

			if ( ! function_exists( 'retrieve_password' ) ) {
				ob_start();
				include_once( ABSPATH . 'wp-login.php' );
				ob_clean();
			}

			$result = retrieve_password();

			if ( true === $result ) {
				$redirect_uri = eskil_membership_get_membership_redirect_url( isset( $options['redirect'] ) ? $options['redirect'] : '' );

				qode_framework_get_ajax_status( 'success', esc_html__( 'You have successfully reset a password, please check your email.', 'eskil-membership' ), null, $redirect_uri );
			} else {
				qode_framework_get_ajax_status( 'error', esc_html__( 'Please provide a valid user.', 'eskil-membership' ) );
			}
		} else {
			qode_framework_get_ajax_status( 'error', esc_html__( 'Options are invalid.', 'eskil-membership' ) );
		}
	}
}
