<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( ! class_exists( 'EskilCore_WooCommerce_Qode_Variation_Swatches_For_WooCommerce' ) ) {
	class EskilCore_WooCommerce_Qode_Variation_Swatches_For_WooCommerce {
		private static $instance;

		public function __construct() {
			// Init
			add_action( 'after_setup_theme', array( $this, 'init' ) );

			add_action( 'plugins_loaded', array( $this, 'set_default_option_values' ), 20 );
		}

		/**
		 * @return EskilCore_WooCommerce_Qode_Variation_Swatches_For_WooCommerce
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function init() {

			if ( ! is_admin() && function_exists( 'qode_variation_swatches_for_woocommerce_premium_init_frontend_module' ) ) {
				// Unset default templates modules
				$this->unset_templates_modules();

				// Add new WooCommerce templates
				$this->add_templates();
			}
		}

		public function set_default_option_values() {
			add_filter( 'qode_variation_swatches_for_woocommerce_filter_color_layout_default_value', array( $this, 'set_default_color_layout' ) );
			add_filter( 'qode_variation_swatches_for_woocommerce_filter_image_layout_default_value', array( $this, 'set_default_image_layout' ) );
			add_filter( 'qode_variation_swatches_for_woocommerce_filter_selected_value_name_default_option_value', array( $this, 'disable_selected_value_name' ) );
		}

		function unset_templates_modules() {
			// remove Variations on shop page
			remove_action( 'init', array( Qode_Variation_Swatches_for_WooCommerce_Premium_Frontend_Module::get_instance(), 'set_variation_form_position' ), 20 );
		}

		function add_templates() {
			// add Qode Variations Swatches to content
			add_action( 'eskil_action_product_list_item_additional_content', array( Qode_Variation_Swatches_for_WooCommerce_Premium_Frontend_Module::get_instance(), 'add_variations_form' ), 1 );
			add_action( 'eskil_core_action_product_list_item_additional_content', array( Qode_Variation_Swatches_for_WooCommerce_Premium_Frontend_Module::get_instance(), 'add_variations_form' ), 1 );
		}

		public function set_default_color_layout() {
			return 'layout-2';
		}

		public function set_default_image_layout() {
			return 'layout-3';
		}

		public function disable_selected_value_name() {
			return 'no';
		}
	}

	EskilCore_WooCommerce_Qode_Variation_Swatches_For_WooCommerce::get_instance();
}
