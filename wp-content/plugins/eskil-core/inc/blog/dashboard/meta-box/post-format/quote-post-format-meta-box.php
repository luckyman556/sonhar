<?php

if ( ! function_exists( 'eskil_core_add_quote_post_format_meta_box' ) ) {
	/**
	 * Function that add options for post format
	 *
	 * @param mixed $page - general post format meta box section
	 */
	function eskil_core_add_quote_post_format_meta_box( $page ) {

		if ( $page ) {
			$post_format_section = $page->add_section_element(
				array(
					'name'  => 'qodef_post_format_quote_section',
					'title' => esc_html__( 'Post Format Quote', 'eskil-core' ),
				)
			);

			$post_format_section->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_post_format_quote_text',
					'title'      => esc_html__( 'Quote Text', 'eskil-core' ),
				)
			);

			$post_format_section->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_post_format_quote_author',
					'title'      => esc_html__( 'Quote Author', 'eskil-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_quote_post_format_meta_box', $page );
		}
	}

	add_action( 'eskil_core_action_after_blog_single_meta_box_map', 'eskil_core_add_quote_post_format_meta_box', 5 );
}
