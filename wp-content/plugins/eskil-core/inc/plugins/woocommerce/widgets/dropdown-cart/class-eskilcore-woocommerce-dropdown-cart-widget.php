<?php

if ( ! function_exists( 'eskil_core_add_woo_dropdown_cart_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_core_add_woo_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'EskilCore_WooCommerce_DropDown_Cart_Widget';

		return $widgets;
	}

	add_filter( 'eskil_core_filter_register_widgets', 'eskil_core_add_woo_dropdown_cart_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilCore_WooCommerce_DropDown_Cart_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'eskil_core_woo_dropdown_cart' );
			$this->set_name( esc_html__( 'Eskil WooCommerce DropDown Cart', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'eskil-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'widget_padding',
					'title'       => esc_html__( 'Widget Padding', 'eskil-core' ),
					'description' => esc_html__( 'Insert padding in format: top right bottom left', 'eskil-core' ),
				)
			);
		}

		public function load_assets() {
			wp_enqueue_style( 'perfect-scrollbar', ESKIL_CORE_URL_PATH . 'assets/plugins/perfect-scrollbar/perfect-scrollbar.css', array() );
			wp_enqueue_script( 'perfect-scrollbar', ESKIL_CORE_URL_PATH . 'assets/plugins/perfect-scrollbar/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
		}

		public function widget( $args, $instance ) {
			// Prevent widgets from loading on WooCommerce cart page.
			if ( qode_framework_is_installed( 'theme' ) && eskil_is_woo_page( 'cart' ) ) {
				return;
			}

			parent::widget( $args, $instance );
		}

		public function render( $atts ) {
			$styles = array();

			if ( ! empty( $atts['widget_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['widget_padding'];
			}
			?>
			<div class="qodef-widget-dropdown-cart-outer" <?php qode_framework_inline_style( $styles ); ?>>
				<div class="qodef-widget-dropdown-cart-inner">
					<?php eskil_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/opener' ); ?>
					<?php eskil_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'eskil_core_woo_dropdown_cart_add_to_cart_fragment' ) ) {
	/**
	 * Function that return|update new cart content for products which are added into the cart
	 *
	 * @param array $fragments
	 *
	 * @return array
	 */
	function eskil_core_woo_dropdown_cart_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="qodef-widget-dropdown-cart-inner">
			<?php eskil_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/opener' ); ?>
			<?php eskil_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
		</div>
		<?php
		$fragments['.qodef-widget-dropdown-cart-inner'] = ob_get_clean();

		return $fragments;
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'eskil_core_woo_dropdown_cart_add_to_cart_fragment' );
}
