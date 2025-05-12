<div <?php wc_product_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-designer-image">
			<a class="qodef-e-designer-link" href="<?php echo esc_html( $link ); ?>">
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-designer-list', 'templates/post-info/image', '', $params ); ?>
			</a>
		</div>
		<div class="qodef-e-designer-content">
			<a class="qodef-e-designer-link" href="<?php echo esc_html( $link ); ?>">
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-designer-list', 'templates/post-info/title', '', $params ); ?>
			</a>
			<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-designer-list', 'templates/post-info/excerpt', '', $params ); ?>
		</div>
	</div>
</div>
