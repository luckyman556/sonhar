<?php

if ( ! function_exists( 'eskil_core_include_qode_variation_swatches_for_woocommerce_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function eskil_core_include_qode_variation_swatches_for_woocommerce_plugin_is_installed( $installed, $plugin ) {
		if ( 'qode-variation-swatches-for-woocommerce' === $plugin ) {
			return defined( 'QODE_VARIATION_SWATCHES_FOR_WOOCOMMERCE_VERSION' );
		}

		if ( 'qode-variation-swatches-for-woocommerce-premium' === $plugin ) {
			return defined( 'QODE_VARIATION_SWATCHES_FOR_WOOCOMMERCE_PREMIUM_VERSION' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'eskil_core_include_qode_variation_swatches_for_woocommerce_plugin_is_installed', 10, 2 );
}
