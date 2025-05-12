<div class="qodef-m-action">
	<a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="qodef-m-action-link qodef--cart">
		<span class="qodef-e-text">
			<?php esc_html_e( 'View Shopping Cart', 'eskil-core' ); ?>
		</span>
	</a>
	<a itemprop="url" href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="qodef-m-action-link qodef--checkout">
		<div class="qodef-e-icon-holder">
			<span class="qodef-e-icon"><?php eskil_core_render_svg_icon( 'button-arrow' ); ?></span>
			<span class="qodef-e-text"><?php esc_html_e( 'Go to checkout', 'eskil-core' ); ?></span>
		</div>
	</a>
</div>
