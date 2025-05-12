<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Eskil_Welcome_Page' ) ) {
	/**
	 * Welcome page theme class
	 */
	class Eskil_Welcome_Page {
		private static $instance;

		/**
		 * @return Eskil_Welcome_Page
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		private function __construct() {
			// theme activation hook
			add_action( 'after_switch_theme', array( $this, 'init_activation_hook' ) );

			// welcome page redirect on theme activation
			add_action( 'admin_init', array( $this, 'welcome_page_redirect' ) );

			// add welcome page into theme options
			add_action( 'admin_menu', array( $this, 'create_welcome_page' ), 12 );

			// enqueue theme welcome page scripts
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		}

		/**
		 * Init hooks on theme activation
		 */
		function init_activation_hook() {
			if ( ! is_network_admin() ) {
				set_transient( '_eskil_welcome_page_redirect', 1, 30 );
			}
		}

		/**
		 * Redirect to welcome page on theme activation
		 */
		function welcome_page_redirect() {
			// if no activation redirect, bail
			if ( ! get_transient( '_eskil_welcome_page_redirect' ) ) {
				return;
			}

			// delete the redirect transient
			delete_transient( '_eskil_welcome_page_redirect' );

			// if activating from network, or bulk, bail
			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				return;
			}

			// redirect to welcome page
			wp_safe_redirect( add_query_arg( array( 'page' => 'eskil_welcome_page' ), esc_url( admin_url( 'themes.php' ) ) ) );
			exit;
		}

		/**
		 * Add welcome page
		 */
		function create_welcome_page() {
			add_theme_page(
				esc_html__( 'About', 'eskil' ),
				esc_html__( 'About', 'eskil' ),
				current_user_can( 'edit_theme_options' ),
				'eskil_welcome_page',
				array( $this, 'welcome_page_content' )
			);

			remove_submenu_page( 'themes.php', 'eskil_welcome_page' );
		}

		/**
		 * Render welcome page content
		 */
		function welcome_page_content() {
			$params = array();

			$theme                       = wp_get_theme();
			$params['theme']             = $theme;
			$params['theme_name']        = esc_html( $theme->get( 'Name' ) );
			$params['theme_description'] = esc_html( $theme->get( 'Description' ) );
			$params['theme_version']     = $theme->get( 'Version' );
			$params['theme_screenshot']  = file_exists( ESKIL_ROOT_DIR . '/screenshot.png' ) ? ESKIL_ROOT . '/screenshot.png' : ESKIL_ROOT . '/screenshot.jpg';

			eskil_template_part( 'welcome', 'templates/welcome', '', $params );
		}

		/**
		 * Enqueue welcome page scripts
		 *
		 * @param string $hook
		 */
		function enqueue_styles( $hook ) {

			if ( 'appearance_page_eskil_welcome_page' === $hook ) {
				wp_enqueue_style( 'eskil-welcome-page-style', ESKIL_INC_ROOT . '/welcome/assets/admin/css/welcome.min.css' );
			}
		}
	}

	Eskil_Welcome_Page::get_instance();
}
