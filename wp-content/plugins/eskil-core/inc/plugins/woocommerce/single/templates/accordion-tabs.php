<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="qodef-woo-accordion-tabs wc-tab qodef-accordion clear qodef-behavior--accordion qodef-layout--simple accordion">
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
		<h3 class="qodef-accordion-title">
		<span class="qodef-tab-title">
			<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
		</span>
		<span class="qodef-accordion-mark"></span>
		</h3>
		<div class="qodef-accordion-content woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
		<div class="qodef-accordion-content-inner">
			<?php
			if ( isset( $product_tab['callback'] ) ) {
				call_user_func( $product_tab['callback'], $key, $product_tab );
			}
			?>
		</div>
		</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
<?php endif; ?>
