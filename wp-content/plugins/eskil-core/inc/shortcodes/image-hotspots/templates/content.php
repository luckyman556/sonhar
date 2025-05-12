<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/parts/image', '', $params ); ?>
	<div class="qodef-m-items">
		<?php
		foreach ( $items as $item ) {
			$item['this_shortcode'] = $this_shortcode;
			$item['item_classes']   = $this_shortcode->get_item_classes( $params, $item );
			$item['item_classes']  .= ' elementor-repeater-item-' . $item['_id'];
			$item['pin']            = $pin;

			eskil_core_template_part( 'shortcodes/image-hotspots', 'templates/item', '', $item );
		}
		?>
	</div>
</div>
