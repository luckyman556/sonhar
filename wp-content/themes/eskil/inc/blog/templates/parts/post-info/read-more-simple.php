<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'custom_class'  => 'qodef-button-hidden',
			'link'          => get_the_permalink(),
			'button_layout' => 'text-appear',
			'text'          => 'Read more',
		);

		eskil_render_button_element( $button_params );
		?>
	</div>
<?php } ?>
