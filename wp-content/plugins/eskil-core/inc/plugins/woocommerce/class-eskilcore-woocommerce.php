<?php

if ( ! class_exists( 'EskilCore_WooCommerce' ) ) {
	class EskilCore_WooCommerce {
		private static $instance;

		public function __construct() {

			if ( qode_framework_is_installed( 'woocommerce' ) ) {
				// Include files
				$this->include_files();
			}
		}

		/**
		 * @return EskilCore_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function include_files() {

			// Include helper functions
			include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/helper.php';

			// Include options
			include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/dashboard/admin/woocommerce-options.php';
			include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/dashboard/admin/woocommerce-info-options.php';

			// Include meta boxes
			include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/dashboard/meta-box/product-meta-box.php';
			include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/dashboard/meta-box/product-single-meta-box.php';

			// Include single variations
			foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/single/variations/*/include.php' ) as $variation ) {
				include_once $variation;
			}

			// Include shortcodes
			add_action( 'qode_framework_action_before_shortcodes_register', array( $this, 'include_shortcodes' ) );

			// Include widgets
			add_action( 'qode_framework_action_before_widgets_register', array( $this, 'include_widgets' ) );

			// Include plugin addons
			foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/plugins/*/include.php' ) as $plugin ) {
				include_once $plugin;
			}

			// Set product list layout
			add_action( 'qode_framework_action_after_options_init_' . ESKIL_CORE_OPTIONS_NAME, array( $this, 'set_product_list_layout' ) );
		}

		function include_shortcodes() {
			foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/*/include.php' ) as $shortcode ) {
				include_once $shortcode;
			}
		}

		function include_widgets() {
			foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/widgets/*/include.php' ) as $widget ) {
				include_once $widget;
			}
		}

		function set_product_list_layout() {
			/**
			 * Shop page templates hooks
			 */
			$list_item_layouts = apply_filters( 'eskil_core_filter_product_list_layouts', array() );
			$options_map       = eskil_core_get_variations_options_map( $list_item_layouts );

			if ( $options_map['visibility'] ) {
				$options_map['default_value'] = eskil_core_get_option_value( 'admin', 'qodef_product_list_item_layout', $options_map['default_value'] );
			}

			// This conditional can't be inside constructor because Elementor doesn't recognize it
			if ( qode_framework_is_installed( 'theme' ) ) {
				do_action( 'eskil_core_action_shop_list_item_layout_' . $options_map['default_value'] );
			}
		}
	}

	EskilCore_WooCommerce::get_instance();
}
