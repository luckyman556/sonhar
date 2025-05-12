<?php

if ( ! function_exists( 'eskil_membership_dashboard_edit_profile_fields' ) ) {
	/**
	 * Function that display edit profile page form
	 *
	 * @param array $params
	 */
	function eskil_membership_dashboard_edit_profile_fields( $params ) {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'type'         => 'front-end',
				'slug'         => 'edit-profile-page',
				'title'        => esc_html__( 'Edit Profile', 'eskil-membership' ),
				'form_id'      => 'qodef-membership-edit-profile',
				'name'         => 'edit_profile_form',
				'method'       => 'POST',
				'button_label' => esc_html__( 'Update Profile', 'eskil-membership' ),
				'button_args'  => array(
					'data-updating-text' => esc_html__( 'Updating Profile', 'eskil-membership' ),
					'data-updated-text'  => esc_html__( 'Profile Updated', 'eskil-membership' ),
					'data-rest-route'    => 'updateUserRestRoute',
					'data-rest-nonce'    => 'restNonce',
				),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'first_name',
					'title'      => esc_html__( 'First Name', 'eskil-membership' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'last_name',
					'title'      => esc_html__( 'Last Name', 'eskil-membership' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'user_email',
					'title'         => esc_html__( 'Email', 'eskil-membership' ),
					'default_value' => $params['email'],
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'user_url',
					'title'         => esc_html__( 'Website', 'eskil-membership' ),
					'default_value' => $params['website'],
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'description',
					'title'      => esc_html__( 'Description', 'eskil-membership' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'password',
					'name'       => 'user_password',
					'title'      => esc_html__( 'Password', 'eskil-membership' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'user_confirm_password',
					'title'      => esc_html__( 'Repeat Password', 'eskil-membership' ),
				)
			);

			do_action( 'eskil_membership_action_after_dashboard_edit_profile_fields', $page, $params );

			$page->render();
		}
	}
}
?>
<div class="qodef-m-content-inner qodef--<?php echo esc_attr( isset( $action ) && ! empty( $action ) ? $action : 'dashboard' ); ?>">
	<div id="qodef-page" class="qodef-options-front-end">
		<?php eskil_membership_dashboard_edit_profile_fields( $params ); ?>
	</div>
</div>
