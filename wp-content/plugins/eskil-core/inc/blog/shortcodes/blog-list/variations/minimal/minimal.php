<?php

if ( ! function_exists( 'eskil_core_add_blog_list_variation_minimal' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_blog_list_layouts', 'eskil_core_add_blog_list_variation_minimal' );
	add_filter( 'eskil_core_filter_simple_blog_list_widget_layouts', 'eskil_core_add_blog_list_variation_minimal' );
}
