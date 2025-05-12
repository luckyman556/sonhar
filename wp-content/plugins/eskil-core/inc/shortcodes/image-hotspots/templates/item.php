<div <?php qode_framework_class_attribute( $item_classes ); ?> <?php qode_framework_inline_style( $this_shortcode->get_item_styles( $params ) ); ?>>
	<?php
	eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/parts/pin', '', $params );
	?>
	<div class="qodef-m-info">
		<div class="qodef-m-into-top">
			<?php eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/parts/item-image', '', $params ); ?>
			<?php eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/parts/title', '', $params ); ?>
			<?php eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/parts/price', '', $params ); ?>
		</div>
		<?php eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/parts/read-more', '', $params ); ?>
	</div>
</div>

