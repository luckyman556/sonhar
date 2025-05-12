<?php if ( ! empty( $item_title ) ) : ?>
	<?php echo '<' . esc_attr( $title_tag ); ?> class="qodef-e-title">
	<?php echo esc_html( $item_title ); ?>
	<?php echo '</' . esc_attr( $title_tag ); ?>>
<?php endif; ?>
