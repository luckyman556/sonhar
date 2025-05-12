<?php if ( is_object( WC()->cart ) ) { ?>
	<div class="qodef-widget-side-area-cart-content">
		<h3 class="qodef-e-title"><?php echo esc_html__( 'Shopping Cart', 'eskil-core' ); ?></h3>
		<?php
		// Hook to include additional content before cart items
		do_action( 'eskil_core_action_woocommerce_before_side_area_cart_content' );

		if ( ! WC()->cart->is_empty() ) {
			eskil_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/loop' );

			eskil_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/order-details' );

			eskil_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/button' );
		} else {
			// Include posts not found
			eskil_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/posts-not-found' );

			// Include shop button
			eskil_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/shop-button' );
		}

		eskil_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/close' );
		?>
	</div>
<?php } ?>
