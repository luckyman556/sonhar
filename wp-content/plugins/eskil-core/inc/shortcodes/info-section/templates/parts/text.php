<?php if ( ! empty( $info_text ) ) { ?>
	<p class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo qode_framework_wp_kses_html( 'post', $info_text ); ?></p>
<?php } ?>
