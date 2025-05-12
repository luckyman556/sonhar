<?php

if ( ! function_exists( 'eskil_core_add_woo_product_single_variation_gallery' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_woo_product_single_variation_gallery( $variations ) {
		$variations['gallery'] = esc_html__( 'Gallery', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_woo_single_product_layouts', 'eskil_core_add_woo_product_single_variation_gallery' );
}

if ( ! function_exists( 'eskil_core_load_single_woo_templates_gallery' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @return array
	 */
	function eskil_core_load_single_woo_templates_gallery() {

		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
		add_action( 'woocommerce_before_single_product_summary', 'eskil_core_woo_single_product_gallery_add_images', 20 );
		add_action( 'eskil_core_action_woo_single_product_gallery_images', 'woocommerce_show_product_thumbnails' );
		add_filter( 'woocommerce_gallery_image_size', 'eskil_core_woo_single_product_gallery_thumb_size' );
		add_filter( 'eskil_filter_page_inner_classes', 'eskil_core_woo_single_product_gallery_full_width_set_full_width_class' );
	}

	add_action( 'eskil_core_action_load_template_hooks_gallery', 'eskil_core_load_single_woo_templates_gallery' );
}

if ( ! function_exists( 'eskil_core_woo_single_product_gallery_add_images' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @return $html
	 */
	function eskil_core_woo_single_product_gallery_add_images() {

		$atts = array(
			'columns' => 2,
		);

		eskil_core_template_part( 'plugins/woocommerce/single', 'templates/images-holder', '', $atts );

	}
}

if ( ! function_exists( 'eskil_core_woo_single_product_gallery_full_width_set_full_width_class' ) ) {

	function eskil_core_woo_single_product_gallery_full_width_set_full_width_class( $classes ) {

		$classes = 'qodef-content-full-width';

		return $classes;
	}
}

if ( ! function_exists( 'eskil_core_woo_single_product_gallery_thumb_size' ) ) {

	function eskil_core_woo_single_product_gallery_thumb_size( $thumb_size ) {

		$thumb_size = 'full';

		return $thumb_size;
	}
}

if ( ! function_exists( 'eskil_core_woo_single_product_gallery_get_variation_gallery' ) ) {
	function eskil_core_woo_single_product_gallery_get_variation_gallery( $html, $product, $variation_id ) {

		if ( ! empty( $variation_id ) ) {
			$product_id = wp_get_post_parent_id( $variation_id );
		} else {
			$product_id = $product->get_id();
		}

		$single_layout = eskil_get_post_value_through_levels( 'qodef_woo_single_layout', $product_id );

		if ( 'gallery' === $single_layout ) {
			$html = '';

			$html .= '<div class="woocommerce-product-gallery qodef-grid qodef-layout--columns qodef-gutter--normal qodef-col-num--2">';
			$html .= '<div class="qodef-grid-inner clear">';

			if ( ! empty( $variation_id ) ) {
				$variation         = new WC_Product_Variation( $variation_id );
				$variation_gallery = qode_variation_swatches_for_woocommerce_premium_get_variation_gallery( $variation );

				foreach ( $variation_gallery as $image_id ) {
					add_filter( 'woocommerce_gallery_image_size', 'eskil_core_woo_single_product_gallery_thumb_size' );
					$html .= wc_get_gallery_image_html( $image_id );
				}
			} else {
				ob_start();
				add_filter( 'woocommerce_gallery_image_size', 'eskil_core_woo_single_product_gallery_thumb_size' );
				woocommerce_show_product_thumbnails();
				$html .= ob_get_clean();
			}

			$html .= '</div>';
			$html .= '</div>';
		}

		return $html;
	}

	add_filter( 'qode_variation_swatches_for_woocommerce_premium_filter_variation_gallery_html', 'eskil_core_woo_single_product_gallery_get_variation_gallery', 10, 3 );
}
