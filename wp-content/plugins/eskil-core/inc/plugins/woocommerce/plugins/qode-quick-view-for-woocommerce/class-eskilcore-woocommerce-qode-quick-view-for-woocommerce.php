<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'EskilCore_WooCommerce_Qode_QuickView_For_WooCommerce' ) ) {
	class EskilCore_WooCommerce_Qode_QuickView_For_WooCommerce {
		private static $instance;

		public function __construct() {
			add_action( 'init', array( $this, 'init' ), 21 );
		}

		/**
		 * @return EskilCore_WooCommerce_Qode_QuickView_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {
			if ( qode_framework_is_installed( 'qode-quick-view-for-woocommerce' ) ) {
				
				add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_meta_enabled', '__return_false', 30 );

				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_holder_classes', array( $this, 'set_quick_view_button_classes' ), 10 );
				
				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_icon', array( $this, 'set_quick_view_button_icon' ), 10 );

				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_close_icon', array( $this, 'set_quick_view_button_close_icon' ) );

				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_loop_position', array( $this, 'set_quick_view_button_loop_position' ), 10 );

				add_filter( 'qode_quick_view_for_woocommerce_filter_quick_view_button_wrapper_classes', array( $this, 'set_quick_view_button_theme_class' ) );
				
				add_filter( 'qode_quick_view_for_woocommerce_filter_set_quick_view_classes', array( $this, 'set_quick_view_popup_theme_class' ) );

				// Override default templates
				$this->override_templates();
			}
		}

		public function set_quick_view_button_loop_position( $button_position_map ) {
			$button_position_map['after-add-to-cart'] = array(
				'hook' => array( 'eskil_action_product_list_item_additional_image_content_second', 'eskil_core_action_product_list_item_additional_image_content_second' ),
			);

			return $button_position_map;
		}

		public function set_quick_view_button_classes( $classes ) {
			if ( ( $key = array_search( 'button', $classes ) ) !== false ) {
				unset( $classes[ $key ] );
			}

			return $classes;
		}

		public function override_templates() {
			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_title_enabled', '__return_false' );
			add_action( 'qode_quick_view_for_woocommerce_action_product_summary', 'eskil_core_qode_quick_view_for_woocommerce_single_title', 5 );

			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_rating_enabled', '__return_false' );
			add_action( 'qode_quick_view_for_woocommerce_action_product_summary', 'woocommerce_template_single_rating', 10 );

			add_filter( 'qode_quick_view_for_woocommerce_filter_is_product_price_enabled', '__return_false' );
			add_action( 'qode_quick_view_for_woocommerce_action_product_summary', 'woocommerce_template_single_price', 15 );
		}

		public function set_quick_view_button_icon( $icon_html ) {
			$icon_html = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.01 8.75"><path d="M8.75,4.38a1.75,1.75,0,0,1-3.5,0A.44.44,0,0,1,5.69,4a.41.41,0,0,1,.43.4v0A.87.87,0,0,0,7,5.25H7a.85.85,0,0,0,.87-.82v0a.85.85,0,0,0-.82-.87H7a.44.44,0,0,1,0-.88A1.75,1.75,0,0,1,8.75,4.38Zm5.18.24A8.53,8.53,0,0,1,7,8.75,8.56,8.56,0,0,1,.07,4.62a.46.46,0,0,1,0-.48A8.55,8.55,0,0,1,7,0a8.54,8.54,0,0,1,6.93,4.14A.42.42,0,0,1,13.93,4.62Zm-3.86-.24A3.06,3.06,0,0,0,7,1.32H7A3.06,3.06,0,0,0,3.94,4.38h0A3.07,3.07,0,0,0,7,7.45H7a3.06,3.06,0,0,0,3.07-3.07ZM4.34,7.28a3.95,3.95,0,0,1,0-5.8A8.75,8.75,0,0,0,1,4.38,8.58,8.58,0,0,0,4.34,7.28ZM13,4.38a8.71,8.71,0,0,0-3.38-2.9,3.93,3.93,0,0,1,0,5.8A8.54,8.54,0,0,0,13,4.38Z" transform="translate(0 0)"/></svg>';

			return $icon_html;
		}

		public function set_quick_view_button_close_icon() {
			$icon_html = '<svg xmlns="http://www.w3.org/2000/svg" width="12.64" height="12.64" viewBox="0 0 12.64 12.64"><g transform="translate(-378.258 -290.311) rotate(-45)"><line y1="16.375" transform="translate(62.188 473.5)" fill="none" stroke="#000" stroke-width="1.5"/><line x2="16.375" transform="translate(54 481.688)" fill="none" stroke="#000" stroke-width="1.5"/></g></svg>';

			return $icon_html;
		}

		public function set_quick_view_button_theme_class( $classes ) {
			$classes[] = 'qodef-eskil-theme';

			return $classes;
		}

		public function set_quick_view_popup_theme_class( $classes ) {
			$classes[] = 'qodef-eskil-theme';

			return $classes;
		}
	}
}

if ( ! function_exists( 'eskil_core_init_quick_view_module' ) ) {
	/**
	 * Init main quick view module instance.
	 */
	function eskil_core_init_quick_view_module() {
		EskilCore_WooCommerce_Qode_QuickView_For_WooCommerce::get_instance();
	}

	add_action( 'init', 'eskil_core_init_quick_view_module', 15 );
}
