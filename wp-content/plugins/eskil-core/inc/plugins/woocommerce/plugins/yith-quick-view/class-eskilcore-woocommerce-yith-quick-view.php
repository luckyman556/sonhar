<?php

if ( ! class_exists( 'EskilCore_WooCommerce_YITH_Quick_View' ) ) {
	class EskilCore_WooCommerce_YITH_Quick_View {
		private static $instance;

		public function __construct() {

			if ( qode_framework_is_installed( 'yith-quick-view' ) ) {
				// Init
				add_action( 'init', array( $this, 'init' ), 15 );
			}
		}

		/**
		 * @return EskilCore_WooCommerce_YITH_Quick_View
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function init() {

			// Unset default templates modules
			$this->unset_templates_modules();

			// Add new WooCommerce templates
			$this->add_templates();

			// Change default templates position
			$this->change_templates_position();

			// Override default templates
			$this->override_templates();
		}

		function unset_templates_modules() {

			// Remove Quick View button element on shop pages
			remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );

			// Remove Quick View button element on wishlist page
			remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'add_quick_view_button_wishlist' ), 15 );

			// Remove meta fields for products
			remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );
		}

		function add_templates() {

			// Add additional tags around product image and content
			add_action( 'yith_wcqv_product_image', 'eskil_add_product_single_content_holder', 2 ); // permission 2 is set because woocommerce_show_product_sale_flash hook is added on 10
			add_action( 'yith_wcqv_product_image', 'eskil_add_product_single_content_holder_end', 25 ); // permission 32 is set because woocommerce_show_product_images hook is added on 20

			// Add additional tags around product list item image
			add_action( 'yith_wcqv_product_image', 'eskil_add_product_single_image_holder', 5 ); // permission 5 is set because woocommerce_show_product_sale_flash hook is added on 10
			add_action( 'yith_wcqv_product_summary', 'eskil_add_product_single_image_holder_end', 42 ); // permission 42 is set because woocommerce_show_product_images hook is added on 30

			if ( eskil_core_include_yith_wishlist_plugin_is_installed( true, 'yith-wishlist' ) ) {
				// add wishlist button to quick view modal
				add_action( 'yith_wcqv_product_summary', 'eskil_core_get_yith_wishlist_shortcode', 35 ); // permission 35 is set because woocommerce_template_single_meta hook is added on 30
			}
		}

		function change_templates_position() {

			// Add button element for shop pages
			add_action( 'eskil_action_product_list_item_additional_image_content_second', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ) );
			add_action( 'eskil_core_action_product_list_item_additional_image_content_second', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ) );
		}

		function override_templates() {

			// Override product title
			remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 ); // permission 5 is default
			add_action( 'yith_wcqv_product_summary', 'eskil_core_yith_quick_view_single_title', 5 );
		}
	}

	EskilCore_WooCommerce_YITH_Quick_View::get_instance();
}
