<?php if ( ! post_password_required() && class_exists( 'EskilCore_Button_Shortcode' ) ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'button_layout' => 'text-appear',
			'link'          => get_the_permalink(),
			'text'          => 'Read more',
		);

		echo EskilCore_Button_Shortcode::call_shortcode( $button_params );
		?>
	</div>
<?php } ?>
