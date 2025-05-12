<?php if ( ! empty( $item_link ) && class_exists( 'EskilCore_Button_Shortcode' ) ) : ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'button_layout' => 'filled',
			'link'          => $item_link,
			'text'          => esc_html__( 'View more', 'eskil-core' ),
		);

		echo EskilCore_Button_Shortcode::call_shortcode( $button_params );
		?>
	</div>
<?php endif; ?>
