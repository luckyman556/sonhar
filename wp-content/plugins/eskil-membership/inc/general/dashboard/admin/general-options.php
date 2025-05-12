<?php

if ( ! function_exists( 'eskil_membership_add_general_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_membership_add_general_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => ESKIL_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'membership',
				'icon'        => 'fa fa-envelope',
				'title'       => esc_html__( 'Membership', 'eskil-membership' ),
				'description' => esc_html__( 'Membership Settings', 'eskil-membership' ),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_membership_privacy_policy_text',
					'title'       => esc_html__( 'Privacy Policy Text', 'eskil-membership' ),
					'description' => esc_html__( 'Enter privacy policy text for registration modal form', 'eskil-membership' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_membership_privacy_policy_link',
					'title'       => esc_html__( 'Privacy Policy Link', 'eskil-membership' ),
					'description' => esc_html__( 'Choose "Privacy Policy Link" page to link from registration modal form', 'eskil-membership' ),
					'options'     => qode_framework_get_pages( true ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_membership_privacy_policy_link_text',
					'title'       => esc_html__( 'Privacy Policy Link Text', 'eskil-membership' ),
					'description' => esc_html__( 'Enter privacy policy link text for registration modal form. Default value is "privacy policy"', 'eskil-membership' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_membership_action_after_membership_options_map', $page );
		}
	}

	add_action( 'eskil_core_action_default_options_init', 'eskil_membership_add_general_options', 70 );
}
