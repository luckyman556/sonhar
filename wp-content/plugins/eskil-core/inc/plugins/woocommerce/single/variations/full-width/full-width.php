<?php

if ( ! function_exists( 'eskil_core_add_woo_product_single_variation_full_width' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_woo_product_single_variation_full_width( $variations ) {
		$variations['full-width'] = esc_html__( 'Full Width', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_woo_single_product_layouts', 'eskil_core_add_woo_product_single_variation_full_width' );
}


if ( ! function_exists( 'eskil_core_load_single_woo_templates_full_width' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @return array
	 */
	function eskil_core_load_single_woo_templates_full_width() {

		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		add_filter( 'eskil_filter_page_inner_classes', 'eskil_core_woo_single_product_full_width_class' );
		remove_action( 'woocommerce_before_single_product_summary', 'eskil_add_product_single_content_holder', 2 );
		add_action( 'woocommerce_before_single_product_summary', 'eskil_core_add_product_single_full_width_content_holder', 2 );
	}

	add_action( 'eskil_core_action_load_template_hooks_full_width', 'eskil_core_load_single_woo_templates_full_width' );
}

if ( ! function_exists( 'eskil_core_woo_single_product_full_width_class' ) ) {

	function eskil_core_woo_single_product_full_width_class( $classes ) {

		$classes = 'qodef-content-full-width';

		return $classes;
	}
}

if ( ! function_exists( 'eskil_core_add_product_single_full_width_content_holder' ) ) {

	function eskil_core_add_product_single_full_width_content_holder() {
		$color = get_post_meta( get_the_ID(), 'qodef_product_bg_color', true );
		$style = '';

		if ( ! empty( $color ) ) {
			$style = 'style=background-color:' . esc_attr( $color );
		}

		echo '<div class="qodef-woo-single-inner"' . esc_html( $style ) . '>';
	}
}


