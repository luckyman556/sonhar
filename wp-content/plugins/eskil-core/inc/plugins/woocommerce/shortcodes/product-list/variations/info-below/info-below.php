<?php

if ( ! function_exists( 'eskil_core_add_product_list_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function eskil_core_add_product_list_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'eskil-core' );

		return $variations;
	}

	add_filter( 'eskil_core_filter_product_list_layouts', 'eskil_core_add_product_list_variation_info_below' );
}

if ( ! function_exists( 'eskil_core_register_shop_list_info_below_actions' ) ) {
	/**
	 * Function that override product item layout for current variation type
	 */
	function eskil_core_register_shop_list_info_below_actions() {

		// IMPORTANT - THIS CODE NEED TO COPY/PASTE ALSO INTO THEME FOLDER MAIN WOOCOMMERCE FILE - set_default_layout method

		// Add additional tags around product list item
		add_action( 'woocommerce_before_shop_loop_item', 'eskil_add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'eskil_add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'eskil_add_product_list_item_image_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'eskil_add_product_list_item_image_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10

		// Add additional tags around content inside product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'eskil_add_product_list_item_additional_image_holder', 15 ); // permission 15 is set because woocommerce_template_loop_product_thumbnail hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'eskil_add_product_list_item_additional_image_holder_end', 25 ); // permission 25 is set because eskil_add_product_list_item_image_holder_end hook is added on 30

		// Add additional tags around product list item content
		add_action( 'woocommerce_shop_loop_item_title', 'eskil_add_product_list_item_content_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_title hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'eskil_add_product_list_item_content_holder_end', 20 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10

		// Add info wrapper in product list item content area
		add_action( 'eskil_action_product_list_item_additional_content', 'eskil_add_product_list_item_content_info_holder', 5 );
		add_action( 'eskil_action_product_list_item_additional_content', 'eskil_add_product_list_item_content_info_holder_end', 10 );

		// Change title position on product list
		remove_action( 'woocommerce_shop_loop_item_title', 'eskil_woo_shop_loop_item_title', 10 ); // permission 10 is default
		add_action( 'eskil_action_product_list_item_info_additional_content', 'eskil_woo_shop_loop_item_title', 5 );

		// Change rating position on product list
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); // permission 5 is default
		add_action( 'eskil_action_product_list_item_info_additional_content', 'woocommerce_template_loop_rating', 10 );

		// Change price position on product list
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); // permission 10 is default
		add_action( 'eskil_action_product_list_item_info_additional_content', 'woocommerce_template_loop_price', 20 );

		// Add product categories on list
		add_action( 'eskil_action_product_list_item_info_additional_content', 'eskil_add_product_list_item_categories', 8 );

		// Change add to cart position on product list
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // permission 10 is default
		add_action( 'eskil_action_product_list_item_additional_content', 'woocommerce_template_loop_add_to_cart', 10 );
	}

	add_action( 'eskil_core_action_shop_list_item_layout_info-below', 'eskil_core_register_shop_list_info_below_actions' );
}
