<?php

if ( ! function_exists( 'eskil_core_add_blog_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function eskil_core_add_blog_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'post' ),
				'type'  => 'meta',
				'slug'  => 'blog-single',
				'title' => esc_html__( 'Blog Single', 'eskil-core' ),
			)
		);

		if ( $page ) {
			$layout_options = apply_filters( 'eskil_core_filter_blog_single_layout_options', array( '' => esc_html__( 'Default', 'eskil-core' ) ) );

			if ( count( $layout_options ) > 1 ) {
				$page->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_blog_single_post_template',
						'title'         => esc_html__( 'Post Template', 'eskil-core' ),
						'description'   => esc_html__( 'Choose post template', 'eskil-core' ),
						'default_value' => '',
						'options'       => $layout_options,
					)
				);
			}

			$page->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_blog_list_image',
					'title'       => esc_html__( 'Blog List Image', 'eskil-core' ),
					'description' => esc_html__( 'Upload image to be displayed on blog list instead of featured image', 'eskil-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_masonry_image_dimension_post',
					'title'       => esc_html__( 'Image Dimension', 'eskil-core' ),
					'description' => esc_html__( 'Choose an image layout for blog list. If you are using fixed image proportions on the list, choose an option other than default', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'masonry_image_dimension' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_blog_single_meta_box_map', $page );
		}
	}

	add_action( 'eskil_core_action_default_meta_boxes_init', 'eskil_core_add_blog_single_meta_box', 1 ); // Permission 1 is set in order to this module be at the first place
}
