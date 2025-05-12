<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-read-more">
		<?php
		if ( eskil_post_has_read_more() ) {
			$button_params = array(
				'link'          => get_permalink() . '#more-' . get_the_ID(),
				'button_layout' => 'text-appear',
				'text'          => esc_html__( 'Read More', 'eskil' ),
			);
		} else {
			$button_params = array(
				'link'                 => get_the_permalink(),
				'button_layout'        => 'text-appear',
				'outlined_enable_icon' => 'yes',
				'text'                 => esc_html__( 'Read More', 'eskil' ),
			);
		}

		eskil_render_button_element( $button_params );
		?>
	</div>
<?php } ?>
