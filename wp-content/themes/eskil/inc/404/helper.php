<?php

if ( ! function_exists( 'eskil_set_404_page_inner_classes' ) ) {
	/**
	 * Function that return classes for the page inner div from header.php
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function eskil_set_404_page_inner_classes( $classes ) {

		if ( is_404() ) {
			$classes = 'qodef-content-full-width';
		}

		return $classes;
	}

	add_filter( 'eskil_filter_page_inner_classes', 'eskil_set_404_page_inner_classes' );
}

if ( ! function_exists( 'eskil_get_404_page_parameters' ) ) {
	/**
	 * Function that set 404 page area content parameters
	 */
	function eskil_get_404_page_parameters() {

		$params = array(
			'image'       => '',
			'title'       => esc_html__( 'Error Page', 'eskil' ),
			'text'        => esc_html__( 'The page you are looking for doesn\'t exist. It may have been moved or removed altogether. Please try searching for some other page, or return to the website\'s homepage to find what you\'re looking for.', 'eskil' ),
			'button_text' => esc_html__( 'Back to homepage', 'eskil' ),
		);

		return apply_filters( 'eskil_filter_404_page_template_params', $params );
	}
}
