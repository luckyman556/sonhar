<div <?php wc_product_class( $item_classes ); ?> <?php qode_framework_inline_style( $this_shortcode->get_item_styles( $params ) ); ?>>
	<div class="qodef-e-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-woo-product-image">
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/mark' ); ?>
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
				<div class="qodef-woo-product-image-inner">
					<?php
					// Hook to include additional content inside product list item image
					do_action( 'eskil_core_action_product_list_item_additional_image_content_first' );
					?>
					<div class="qodef-quick-view-holder">
						<?php
						// Hook to include additional content inside product list item image
						do_action( 'eskil_core_action_product_list_item_additional_image_content_second' );
						?>
					</div>
				</div>
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
			</div>
		<?php } ?>
		<div class="qodef-woo-product-content">
			<div class="qodef-woo-product-info">
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params ); ?>
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
			</div>
			<div class="qodef-woo-add-to-cart">
				<?php eskil_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
			</div>
			<?php
			// Hook to include additional content inside product list item content
			do_action( 'eskil_core_action_product_list_item_additional_content' );
			?>
		</div>
	</div>
</div>
