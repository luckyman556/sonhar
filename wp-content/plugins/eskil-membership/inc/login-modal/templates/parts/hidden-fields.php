<?php
$response_type = isset( $response_type ) && ! empty( $response_type ) ? $response_type : 'login';
?>
	<input type="hidden" class="qodef-m-request-type" name="request_type" value="<?php echo esc_attr( $response_type ); ?>"/>
	<input type="hidden" class="qodef-m-redirect" name="redirect" value="<?php echo esc_url( eskil_membership_get_membership_redirect_url() ); ?>"/>
<?php wp_nonce_field( 'eskil-membership-ajax-' . esc_attr( $response_type ) . '-nonce', 'eskil-membership-ajax-' . esc_attr( $response_type ) . '-nonce' ); ?>
