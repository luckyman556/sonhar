<?php

if ( ! function_exists( 'eskil_core_add_woo_product_single_variation_slider' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_woo_product_single_variation_slider( $variations ) {
		$variations['slider'] = esc_html__( 'Slider', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_woo_single_product_layouts', 'eskil_core_add_woo_product_single_variation_slider' );
}

if ( ! function_exists( 'eskil_core_load_single_woo_templates_slider' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @return array
	 */
	function eskil_core_load_single_woo_templates_slider() {

		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
		add_action( 'woocommerce_before_single_product_summary', 'eskil_core_woo_get_product_render_slider_gallery_layout', 20 );
		add_filter( 'eskil_filter_page_inner_classes', 'eskil_core_woo_single_product_slider_set_full_width_class' );

		// replaced default image gallery with slider
		remove_action( 'woocommerce_before_single_product_summary', 'eskil_add_product_single_content_holder', 2 );

		// additional wrappers
		add_action( 'woocommerce_single_product_summary', 'eskil_core_add_product_single_content_left_wrapper', 4 );
		add_action( 'woocommerce_single_product_summary', 'eskil_core_add_product_single_content_close_div', 10 );
		add_action( 'woocommerce_single_product_summary', 'eskil_core_add_product_single_content_center_wrapper', 11 );
		add_action( 'woocommerce_single_product_summary', 'eskil_core_add_product_single_content_close_div', 35 );
		add_action( 'woocommerce_single_product_summary', 'eskil_core_add_product_single_content_right_wrapper', 36 );
		add_action( 'woocommerce_single_product_summary', 'eskil_core_add_product_single_content_close_div', 60 );

		// remove description field
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	}

	add_action( 'eskil_core_action_load_template_hooks_slider', 'eskil_core_load_single_woo_templates_slider' );
}

if ( ! function_exists( 'eskil_core_woo_get_product_render_slider_gallery_layout' ) ) {
	function eskil_core_woo_get_product_render_slider_gallery_layout() {

		$product_gallery = get_post_meta( get_the_ID(), 'qodef_product_images_gallery', true );
		$product_gallery = explode( ',', $product_gallery );
		$data_options    = '{"slidesPerView":"2","loop":true,"autoplay":true,"centeredSlides":true,"spaceBetween":30}';

		$color = get_post_meta( get_the_ID(), 'qodef_product_bg_color', true );
		$style = '';

		if ( ! empty( $color ) ) {
			$style = 'style=background-color:' . esc_attr( $color );
		}

		$html  = '<div class="qodef-woo-single-inner" ' . esc_html( $style ) . '>';
		$html .= '<div class="qodef-grid qodef-layout--columns qodef-gutter--no qodef-col-num--2 qodef-responsive--predefined qodef-swiper-container" data-options=\'' . esc_html( $data_options ) . '\' >';
		$html .= '<div class="qodef-grid-inner clear swiper-wrapper">';

		foreach ( $product_gallery as $image ) {
			$html .= '<div class="qodef-product-gallery-image qodef-grid-item swiper-slide">';
			$html .= wp_get_attachment_image( $image, 'full' );
			$html .= '</div>';
		}

		$html .= '</div>';

		echo wp_kses_post( $html );
	}
}

if ( ! function_exists( 'eskil_core_woo_single_product_slider_set_full_width_class' ) ) {

	function eskil_core_woo_single_product_slider_set_full_width_class( $classes ) {

		$classes = 'qodef-content-full-width';

		return $classes;
	}
}

if ( ! function_exists( 'eskil_core_add_product_single_content_left_wrapper' ) ) {

	function eskil_core_add_product_single_content_left_wrapper() {
		echo '<div class="qodef-woo-single-left-wrapper">';
	}
}

if ( ! function_exists( 'eskil_core_add_product_single_content_center_wrapper' ) ) {

	function eskil_core_add_product_single_content_center_wrapper() {
		echo '<div class="qodef-woo-single-center-wrapper">';
	}
}

if ( ! function_exists( 'eskil_core_add_product_single_content_right_wrapper' ) ) {

	function eskil_core_add_product_single_content_right_wrapper() {
		echo '<div class="qodef-woo-single-right-wrapper">';
	}
}

if ( ! function_exists( 'eskil_core_add_product_single_content_close_div' ) ) {

	function eskil_core_add_product_single_content_close_div() {
		echo '</div>';
	}
}
