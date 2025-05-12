<a itemprop="url" class="qodef-m-opener" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="qodef-m-opener-icon"><?php eskil_core_render_svg_icon( 'cart' ); ?></span>
	<span class="qodef-m-opener-text"><?php echo esc_html__( 'Cart', 'eskil-core' ); ?></span>
	<?php if ( ! empty( WC()->cart ) ) { ?>
	<span class="qodef-m-opener-count"><?php echo wc_cart_totals_subtotal_html(); ?></span>
	<?php } ?>
</a>
