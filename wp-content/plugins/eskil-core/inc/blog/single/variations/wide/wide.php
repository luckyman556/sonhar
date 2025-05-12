<?php

if ( ! function_exists( 'eskil_core_add_blog_single_variation_wide' ) ) {
	function eskil_core_add_blog_single_variation_wide( $variations ) {
		$variations['wide'] = esc_html__( 'Wide Post', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_blog_single_layout_options', 'eskil_core_add_blog_single_variation_wide' );
}

//if ( ! function_exists( 'eskil_core_blog_single_wide_template' ) ) {
//	/**
//	 * Function that load media part template
//	 *
//	 */
//	function eskil_core_blog_single_wide_template() {
//		$params   = array();
//		$template = eskil_core_get_post_value_through_levels( 'qodef_blog_single_post_template' );
//
//		if ( is_singular( 'post' ) && 'wide' === $template ) {
//			eskil_core_template_part( 'blog', 'single/variations/wide/layout/post', '', $params );
//		}
//	}
//
//	add_action( 'eskil_action_before_page_inner', 'eskil_core_blog_single_wide_template' );
//}
