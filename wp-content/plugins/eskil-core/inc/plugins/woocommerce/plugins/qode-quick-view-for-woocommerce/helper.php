<?php

if ( ! function_exists( 'eskil_core_include_qode_quick_view_for_woocommerce_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function eskil_core_include_qode_quick_view_for_woocommerce_plugin_is_installed( $installed, $plugin ) {
		if ( 'qode-quick-view-for-woocommerce' === $plugin ) {
			return defined( 'QODE_QUICK_VIEW_FOR_WOOCOMMERCE_VERSION' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'eskil_core_include_qode_quick_view_for_woocommerce_plugin_is_installed', 10, 2 );
}

if ( ! function_exists( 'eskil_core_qode_quick_view_for_woocommerce_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function eskil_core_qode_quick_view_for_woocommerce_single_title() {
		echo '<h4 class="qodef-woo-product-title product_title entry-title">' . wp_kses_post( get_the_title() ) . '</h4>';
	}
}
