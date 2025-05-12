<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'EskilCore_WooCommerce_Qode_Wishlist_For_WooCommerce' ) ) {
	class EskilCore_WooCommerce_Qode_Wishlist_For_WooCommerce {
		private static $instance;

		public function __construct() {

			// Init, permission 20 is set in order to be after the plugin initialization.
			add_action( 'plugins_loaded', array( $this, 'init' ), 20 );
		}

		/**
		 * @return EskilCore_WooCommerce_Qode_Wishlist_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {

			if ( qode_framework_is_installed( 'qode-wishlist-for-woocommerce' ) ) {

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_behavior_default_value', array( $this, 'set_default_add_to_wishlist_behavior' ) );

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_loop_type_default_value', array( $this, 'set_default_add_to_wishlist_type' ) );

				add_filter( 'qode_wishlist_for_woocommerce_filter_svg_icon', array( $this, 'set_add_to_wishlist_heart_icon' ), 10, 3 );

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_button_loop_position', array( $this, 'set_add_to_wishlist_button_loop_position' ), 10, 3 );

				add_filter( 'qode_wishlist_for_woocommerce_filter_show_table_title_default_value', array( $this, 'disable_wishlist_page_title' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_enable_share_default_value', array( $this, 'disable_wishlist_page_social_share' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_available_table_items_default_values', array( $this, 'set_available_table_items_default_values' ) );

				add_filter( 'qode_wishlist_for_woocommerce_filter_add_to_wishlist_wrapper_classes', array( $this, 'set_add_to_wishlist_theme_class' ) );
				add_filter( 'qode_wishlist_for_woocommerce_filter_wishlist_table_holder_classes', array( $this, 'set_add_to_wishlist_theme_class' ) );
			}
		}

		public function set_default_add_to_wishlist_behavior() {
			return 'view';
		}

		public function set_default_add_to_wishlist_type() {
			return 'icon-with-text';
		}

		public function set_add_to_wishlist_heart_icon( $icon_html, $name, $class_name ) {

			if ( 'heart-o' === $name ) {
				$icon_html = '<svg ' . esc_attr( $class_name ) . ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>';
			} elseif ( 'heart' === $name ) {
				$icon_html = '<svg ' . esc_attr( $class_name ) . ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>';
			}

			return $icon_html;
		}

		public function set_add_to_wishlist_button_loop_position( $button_position_map, $button_position, $is_block_template ) {

			if ( 'after-add-to-cart' === $button_position && ! $is_block_template ) {
				$button_position_map[ $button_position ] = array(
					'hook' => array( 'eskil_action_product_list_item_additional_image_content_first', 'eskil_core_action_product_list_item_additional_image_content_first' ),
				);
			}

			return $button_position_map;
		}

		public function disable_wishlist_page_title() {
			return 'no';
		}

		public function disable_wishlist_page_social_share() {
			return 'no';
		}

		public function set_available_table_items_default_values( $values ) {

			if ( ! empty( $values ) && in_array( 'category', $values, true ) ) {
				unset( $values[ array_search( 'category', $values, true ) ] );
			}

			return $values;
		}

		public function set_add_to_wishlist_theme_class( $classes ) {
			$classes[] = 'qodef-eskil-theme';

			return $classes;
		}
	}

	EskilCore_WooCommerce_Qode_Wishlist_For_WooCommerce::get_instance();
}
