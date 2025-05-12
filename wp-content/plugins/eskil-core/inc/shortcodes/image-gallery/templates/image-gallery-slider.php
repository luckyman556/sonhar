<div <?php qode_framework_class_attribute( $wrapper_classes ); ?>>
	<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
		<div class="swiper-wrapper">
			<?php
			// Include items
			if ( ! empty( $images ) ) {
				foreach ( $images as $image ) {
					eskil_core_template_part( 'shortcodes/image-gallery', 'templates/parts/image', '', array_merge( $params, $image ) );
				}
			}
			?>
		</div>
		<?php eskil_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
	</div>
	<?php eskil_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
</div>
