<form id="qodef-membership-register-modal-part" class="qodef-m" method="POST">
	<div class="qodef-m-fields">
		<input type="text" class="qodef-m-user-name" name="user_name" placeholder="<?php esc_attr_e( 'User Name *', 'eskil-membership' ); ?>" value="" required pattern=".{3,}" autocomplete="username"/>
		<input type="email" class="qodef-m-user-email" name="user_email" placeholder="<?php esc_attr_e( 'Email *', 'eskil-membership' ); ?>" value="" required autocomplete="email"/>
		<input type="password" class="qodef-m-user-password" name="user_password" placeholder="<?php esc_attr_e( 'Password *', 'eskil-membership' ); ?>" required pattern=".{5,}" autocomplete="new-password"/>
		<input type="password" class="qodef-m-user-confirm-password" name="user_confirm_password" placeholder="<?php esc_attr_e( 'Repeat Password *', 'eskil-membership' ); ?>" required pattern=".{5,}" autocomplete="new-password"/>
		<label class="qodef-m-privacy-policy">
			<?php
			$privacy_policy_text      = eskil_core_get_option_value( 'admin', 'qodef_membership_privacy_policy_text' );
			$privacy_policy_link      = eskil_core_get_option_value( 'admin', 'qodef_membership_privacy_policy_link' );
			$privacy_policy_link_text = eskil_core_get_option_value( 'admin', 'qodef_membership_privacy_policy_link_text' );

			$privacy_policy_text      = ! empty( $privacy_policy_text ) ? ( esc_html( $privacy_policy_text ) . ' %s.' ) : esc_html__( 'Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our %s.', 'eskil-membership' );
			$privacy_policy_link      = ! empty( $privacy_policy_link ) ? esc_url( get_permalink( $privacy_policy_link ) ) : esc_url( home_url( '/?page_id=3' ) ); // page id 3 is default terms and condition WordPage page
			$privacy_policy_link_text = ! empty( $privacy_policy_link_text ) ? esc_html( $privacy_policy_link_text ) : esc_html__( 'privacy policy', 'eskil-membership' );

			echo sprintf(
				$privacy_policy_text,
				'<a itemprop="url" class="qodef-m-privacy-policy-link" href="' . $privacy_policy_link . '" target="_blank">' . $privacy_policy_link_text . '</a>'
			);
			?>
		</label>
	</div>

	<div class="qodef-m-action">
		<?php
		$register_button_params = array(
			'custom_class' => 'qodef-m-action-button',
			'html_type'    => 'submit',
			'text'         => esc_html__( 'Register', 'eskil-membership' ),
		);

		echo EskilCore_Button_Shortcode::call_shortcode( $register_button_params );

		eskil_membership_template_part( 'login-modal', 'templates/parts/spinner' );
		?>
	</div>
	<?php eskil_membership_template_part( 'login-modal', 'templates/parts/response' ); ?>
	<?php eskil_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'register' ) ); ?>
</form>
