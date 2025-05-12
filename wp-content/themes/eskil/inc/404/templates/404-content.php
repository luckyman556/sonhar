<div id="qodef-404-page">
	<?php if ( ! empty( $image ) ) { ?>
		<div class="qodef-404-image">
			<?php echo wp_get_attachment_image( $image, 'full' ); ?>
		</div>
	<?php } ?>
	<h1 class="qodef-404-title"><?php echo esc_html( $title ); ?></h1>

	<p class="qodef-404-text"><?php echo esc_html( $text ); ?></p>

	<div class="qodef-404-button">
		<?php
		$button_params = array(
			'button_layout'        => 'outlined',
			'outlined_enable_icon' => 'yes',
			'link'                 => esc_url( home_url( '/' ) ),
			'text'                 => esc_html( $button_text ),
		);

		eskil_render_button_element( $button_params );
		?>
	</div>
</div>
