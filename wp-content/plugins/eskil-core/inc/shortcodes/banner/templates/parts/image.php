<div class="qodef-m-image">
	<?php echo wp_get_attachment_image( $image, 'full' ); ?>
	<?php if ( ! empty( $hover_image ) ) : ?>
		<div class="qodef-m-hover-image">
			<?php echo wp_get_attachment_image( $hover_image, 'full' ); ?>
		</div>
	<?php endif; ?>
</div>
