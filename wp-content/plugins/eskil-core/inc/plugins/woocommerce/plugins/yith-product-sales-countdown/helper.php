<?php

if ( ! function_exists( 'eskil_core_include_yith_countdown_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function eskil_core_include_yith_countdown_plugin_is_installed( $installed, $plugin ) {
		if ( 'yith-countdown' === $plugin ) {
			return defined( 'YWPC_INIT' );
		}

		return $installed;
	}

	add_filter( 'qode_framework_filter_is_plugin_installed', 'eskil_core_include_yith_countdown_plugin_is_installed', 10, 2 );
}

if ( ! function_exists( 'eskil_core_woo_add_dependency_script' ) ) {
	/**
	 * Function that adds dependency
	 */
	function eskil_core_woo_add_dependency_script( $dep_array ) {
		if ( qode_framework_is_installed( 'yith-countdown' ) ) {
			$dep_array[] = 'ywpc-footer';
		}

		return $dep_array;
	}

	add_filter( 'eskil_core_filter_script_dependencies', 'eskil_core_woo_add_dependency_script' );
}
