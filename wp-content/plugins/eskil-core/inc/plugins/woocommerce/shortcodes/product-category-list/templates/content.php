<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-grid-inner clear">
		<?php
		// Include global masonry template from theme
		eskil_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// Include items
		eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-category-list', 'templates/loop', '', $params );
		?>
	</div>
</div>
