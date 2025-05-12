<?php

if ( ! function_exists( 'eskil_core_add_product_designers_options' ) ) {
	/**
	 * Function that add global taxonomy options for current module
	 */
	function eskil_core_add_product_designers_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product_designer' ),
				'type'  => 'taxonomy',
				'slug'  => 'product_designer',
			)
		);

		$page->add_field_element(
			array(
				'field_type' => 'textarea',
				'name'       => 'qodef_product_designer_tagline',
				'title'      => esc_html__( 'Tagline', 'eskil-core' ),
			)
		);

		$page->add_field_element(
			array(
				'field_type' => 'textarea',
				'name'       => 'qodef_product_designer_excerpt',
				'title'      => esc_html__( 'Excerpt', 'eskil-core' ),
			)
		);

		$page->add_field_element(
			array(
				'field_type' => 'image',
				'name'       => 'qodef_product_designer_image',
				'title'      => esc_html__( 'Designer Image', 'eskil-core' ),
			)
		);

		$page->add_field_element(
			array(
				'field_type' => 'image',
				'name'       => 'qodef_product_designer_list_image',
				'title'      => esc_html__( 'Designer List Image', 'eskil-core' ),
			)
		);
	}

	add_action( 'eskil_core_action_register_cpt_tax_fields', 'eskil_core_add_product_designers_options' );
}
