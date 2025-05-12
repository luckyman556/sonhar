<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'Qode_Quick_View_For_WooCommerce_Rest_API' ) ) {
	/**
	 * Rest API class with configuration
	 */
	class Qode_Quick_View_For_WooCommerce_Rest_API {
		private static $instance;
		private $namespace;

		public function __construct() {
			// Init variables.
			$this->set_namespace( 'qode-quick-view-for-woocommerce/v1' );

			// Localize plugin's main js script with rest variable.
			add_filter( 'qode_quick_view_for_woocommerce_filter_localize_main_plugin_script', array( $this, 'localize_script' ) );

			// Function that register Rest API routes.
			add_action( 'rest_api_init', array( $this, 'register_rest_api_route' ) );
		}

		/**
		 * Instance of module class
		 *
		 * @return Qode_Quick_View_For_WooCommerce_Rest_API
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function get_namespace() {
			return $this->namespace;
		}

		public function set_namespace( $namespace_param ) {
			$this->namespace = $namespace_param;
		}

		public function localize_script( $global_param ) {
			$global_param['restUrl']   = esc_url_raw( rest_url() );
			$global_param['restNonce'] = wp_create_nonce( 'wp_rest' );

			return apply_filters( 'qode_quick_view_for_woocommerce_filter_rest_api_global_variables', $global_param, $this->get_namespace() );
		}

		public function register_rest_api_route() {
			$routes = apply_filters( 'qode_quick_view_for_woocommerce_filter_rest_api_routes', array() );

			if ( ! empty( $routes ) ) {
				foreach ( $routes as $route ) {
					$permission_callback = isset( $route['permission_callback'] ) && ! empty( $route['permission_callback'] ) ? $route['permission_callback'] : '__return_true';

					register_rest_route(
						$this->get_namespace(),
						esc_attr( $route['route'] ),
						array(
							'methods'             => $route['methods'],
							'callback'            => $route['callback'],
							'permission_callback' => $permission_callback,
							'args'                => $route['args'],
						)
					);
				}
			}
		}
	}

	Qode_Quick_View_For_WooCommerce_Rest_API::get_instance();
}
