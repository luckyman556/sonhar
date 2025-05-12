<?php if ( ! empty( $title ) ) : ?>
	<?php echo '<' . esc_attr( $title_tag ); ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
		<span class="qodef-e-icon"><?php eskil_core_render_svg_icon( 'button-arrow' ); ?></span>
		<?php echo esc_html( $title ); ?>
	<?php echo '</' . esc_attr( $title_tag ); ?>>
<?php endif; ?>
