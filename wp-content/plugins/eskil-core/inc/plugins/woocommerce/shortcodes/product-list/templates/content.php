<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $data_attr, 'data-options' ); ?>>
	<div class="qodef-filter-holder">
		<?php
		// Get filter by category part
		eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter/category-filter', '', $params );

		// Get filter by order by part
		eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/filter/order-price-filter', '', $params );
		?>
	</div>
	<div class="qodef-grid-inner clear">
		<?php
		// Include global masonry template from theme
		eskil_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// Include items
		eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/loop', '', $params );
		?>
	</div>
	<?php
	// Include global pagination from theme
	eskil_core_theme_template_part( 'pagination', 'templates/pagination', $params['pagination_type'], $params );

	// Include loading spinner
	eskil_core_render_svg_icon( 'spinner', 'qodef-m-pagination-spinner' );
	?>
</div>
