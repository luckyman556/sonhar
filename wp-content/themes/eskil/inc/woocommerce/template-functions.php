<?php

/**
 * Global templates hooks
 */

if ( ! function_exists( 'eskil_add_main_woo_page_template_holder' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function eskil_add_main_woo_page_template_holder() {
		echo '<main id="qodef-page-content" class="qodef-grid qodef-layout--template qodef--no-bottom-space ' . esc_attr( eskil_get_grid_gutter_classes() ) . '" role="main"><div class="qodef-grid-inner clear">';
	}
}

if ( ! function_exists( 'eskil_add_main_woo_page_template_holder_end' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function eskil_add_main_woo_page_template_holder_end() {
		echo '</div></main>';
	}
}

if ( ! function_exists( 'eskil_add_main_woo_page_holder' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function eskil_add_main_woo_page_holder() {
		$classes = array();

		// add class to pages with sidebar and on single page
		if ( eskil_is_woo_page( 'archive' ) || eskil_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef-grid-item';
		}

		// add class to pages with sidebar
		if ( eskil_is_woo_page( 'archive' ) ) {
			$classes[] = eskil_get_page_content_sidebar_classes();
		}

		$classes[] = eskil_get_woo_main_page_classes();

		echo '<div id="qodef-woo-page" class="' . esc_attr( implode( ' ', $classes ) ) . '">';
	}
}

if ( ! function_exists( 'eskil_add_main_woo_page_holder_end' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function eskil_add_main_woo_page_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_main_woo_page_sidebar_holder' ) ) {
	/**
	 * Function that render sidebar layout for main shop page
	 */
	function eskil_add_main_woo_page_sidebar_holder() {

		if ( ! eskil_is_woo_page( 'single' ) ) {
			// Include page content sidebar
			eskil_template_part( 'sidebar', 'templates/sidebar' );
		}
	}
}

if ( ! function_exists( 'eskil_woo_render_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 */
	function eskil_woo_render_product_categories( $before = '', $after = '' ) {
		echo eskil_woo_get_product_categories( $before, $after ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'eskil_woo_get_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 *
	 * @return string
	 */
	function eskil_woo_get_product_categories( $before = '', $after = '' ) {
		$product = eskil_woo_get_global_product();

		return ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), '<span class="qodef-info-separator-single"></span>', $before, $after ) : '';
	}
}

/**
 * Shop page templates hooks
 */

if ( ! function_exists( 'eskil_add_shop_page_title' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function eskil_add_shop_page_title() {
		echo '<h1 class="qodef-woo-shop-title">' . esc_html__( 'All products', 'eskil' ) . '</h1>';
	}
}

if ( ! function_exists( 'eskil_add_results_and_ordering_holder' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function eskil_add_results_and_ordering_holder() {
		echo '<div class="qodef-woo-results">';
	}
}

if ( ! function_exists( 'eskil_add_results_and_ordering_holder_end' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function eskil_add_results_and_ordering_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_holder' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function eskil_add_product_list_item_holder() {
		echo '<div class="qodef-e-inner">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_holder_end' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function eskil_add_product_list_item_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_image_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function eskil_add_product_list_item_image_holder() {
		echo '<div class="qodef-woo-product-image">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function eskil_add_product_list_item_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_additional_image_holder' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function eskil_add_product_list_item_additional_image_holder() {
		echo '<div class="qodef-woo-product-image-inner">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_additional_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function eskil_add_product_list_item_additional_image_holder_end() {
		// Hook to include additional content inside product list item image
		do_action( 'eskil_action_product_list_item_additional_image_content_first' );

		echo '<div class="qodef-quick-view-holder">';
		// Hook to include additional content inside product list item image
		do_action( 'eskil_action_product_list_item_additional_image_content_second' );
		echo '</div>';

		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_content_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_content_holder() {
		echo '<div class="qodef-woo-product-content">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_content_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_content_holder_end() {
		// Hook to include additional content inside product list item content
		do_action( 'eskil_action_product_list_item_additional_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_content_info_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_content_info_holder() {
		echo '<div class="qodef-woo-product-info">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_content_info_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_content_info_holder_end() {
		// Hook to include additional content inside product list item content
		do_action( 'eskil_action_product_list_item_info_additional_content' );

		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_price_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_price_holder() {
		echo '<div class="qodef-woo-price">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_price_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_price_holder_end() {

		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_price_cart_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_price_cart_holder() {
		echo '<div class="qodef-add-to-cart-holder">';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_price_cart_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function eskil_add_product_list_item_price_cart_holder_end() {

		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_list_item_categories' ) ) {
	/**
	 * Function that render product categories
	 */
	function eskil_add_product_list_item_categories() {
		eskil_woo_render_product_categories( '<div class="qodef-woo-product-categories qodef-e-info">', '<div class="qodef-info-separator-end"></div></div>' );
	}
}

/**
 * Product single page templates hooks
 */

if ( ! function_exists( 'eskil_add_product_single_content_holder' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function eskil_add_product_single_content_holder() {
		echo '<div class="qodef-woo-single-inner">';
	}
}

if ( ! function_exists( 'eskil_add_product_single_content_holder_end' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function eskil_add_product_single_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_add_product_single_image_holder' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function eskil_add_product_single_image_holder() {
		global $product;
		$id = $product->get_id();

		$product_thumbnail_position = eskil_is_installed( 'core' ) ? eskil_get_post_value_through_levels( 'qodef_woo_single_thumb_images_position' ) : 'below';
		$product_thumb_position     = get_post_meta( $id, 'qodef_single_thumb_images_position', true );

		if ( ! empty( $product_thumb_position ) ) {
			$classes = 'qodef-thumb--' . $product_thumb_position;
		} elseif ( ! empty( $product_thumbnail_position ) ) {
			$classes = 'qodef-thumb--' . $product_thumbnail_position;
		}

		echo '<div class="qodef-woo-single-image ' . esc_html( $classes ) . '">';
	}
}

if ( ! function_exists( 'eskil_add_product_single_image_holder_end' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function eskil_add_product_single_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_woo_product_render_social_share_html' ) ) {
	/**
	 * Function that render social share html
	 */
	function eskil_woo_product_render_social_share_html() {

		if ( class_exists( 'EskilCore_Social_Share_Shortcode' ) ) {
			$params           = array();
			$params['layout'] = 'list';
			$params['title']  = esc_html__( 'Share it', 'eskil' );

			echo EskilCore_Social_Share_Shortcode::call_shortcode( $params ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Override default WooCommerce templates
 */

if ( ! function_exists( 'eskil_woo_disable_page_heading' ) ) {
	/**
	 * Function that disable heading template on main shop page
	 *
	 * @return bool
	 */
	function eskil_woo_disable_page_heading() {
		return false;
	}
}

if ( ! function_exists( 'eskil_add_product_list_holder' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function eskil_add_product_list_holder( $html ) {
		$classes = array();
		$layout  = eskil_get_post_value_through_levels( 'qodef_product_list_item_layout' );
		$option  = eskil_get_post_value_through_levels( 'qodef_woo_product_list_columns_space' );

		if ( ! empty( $layout ) ) {
			$classes[] = 'qodef-item-layout--' . $layout;
		}

		if ( ! empty( $option ) ) {
			$classes[] = 'qodef-gutter--' . $option;
		}

		return '<div class="qodef-woo-product-list ' . esc_attr( implode( ' ', $classes ) ) . '">' . $html;
	}
}

if ( ! function_exists( 'eskil_add_product_list_holder_end' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param string $html
	 *
	 * @return string which contains html content
	 */
	function eskil_add_product_list_holder_end( $html ) {
		return $html . '</div>';
	}
}

if ( ! function_exists( 'eskil_woo_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for main shop page
	 *
	 * @return int
	 */
	function eskil_woo_product_list_columns() {
		$option = eskil_get_post_value_through_levels( 'qodef_woo_product_list_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 3;
		}

		return $columns;
	}
}

if ( ! function_exists( 'eskil_woo_products_per_page' ) ) {
	/**
	 * Function that set number of items for main shop page
	 *
	 * @param int $products_per_page
	 *
	 * @return int
	 */
	function eskil_woo_products_per_page( $products_per_page ) {
		$option = eskil_get_post_value_through_levels( 'qodef_woo_product_list_products_per_page' );

		if ( ! empty( $option ) ) {
			$products_per_page = intval( $option );
		}

		return $products_per_page;
	}
}

if ( ! function_exists( 'eskil_woo_pagination_args' ) ) {
	/**
	 * Function that override pagination args on main shop page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function eskil_woo_pagination_args( $args ) {
		$args['prev_text']          = eskil_get_svg_icon( 'pagination-arrow-left' ) . '<span class="qodef-m-pagination-label">' . esc_html__( 'Prev', 'eskil' ) . '</span>';
		$args['next_text']          = '<span class="qodef-m-pagination-label">' . esc_html__( 'Next', 'eskil' ) . '</span>' . eskil_get_svg_icon( 'pagination-arrow-right' );
		$args['type']               = 'plain';
		$args['before_page_number'] = '';
		$args['after_page_number']  = '.';

		return $args;
	}
}

if ( ! function_exists( 'eskil_add_single_product_classes' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 *
	 * @param array $classes Default argument array
	 * @param string $class
	 * @param int $post_id
	 *
	 * @return array
	 */
	function eskil_add_single_product_classes( $classes, $class = '', $post_id = 0 ) {
		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}

		$product = wc_get_product( $post_id );

		if ( $product ) {
			$new = get_post_meta( $post_id, 'qodef_show_new_sign', true );

			if ( 'yes' === $new ) {
				$classes[] = 'new';
			}
		}

		return $classes;
	}
}

if ( ! function_exists( 'eskil_add_sale_flash_on_product' ) ) {
	/**
	 * Function for adding on sale template for product
	 */
	function eskil_add_sale_flash_on_product() {
		echo eskil_woo_set_sale_flash(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'eskil_woo_set_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function eskil_woo_set_sale_flash() {
		$product = eskil_woo_get_global_product();

		if ( ! empty( $product ) && $product->is_on_sale() && $product->is_in_stock() ) {
			return eskil_woo_get_woocommerce_sale( $product );
		}

		return '';
	}
}

if ( ! function_exists( 'eskil_woo_get_woocommerce_sale' ) ) {
	/**
	 * Function that return sale mark label
	 *
	 * @param object $product
	 *
	 * @return string
	 */
	function eskil_woo_get_woocommerce_sale( $product ) {
		$enable_percent_mark = eskil_get_post_value_through_levels( 'qodef_woo_enable_percent_sign_value' );
		$price               = floatval( $product->get_regular_price() );
		$sale_price          = floatval( $product->get_sale_price() );

		if ( $price > 0 && 'yes' === $enable_percent_mark ) {
			$sale_label = '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			$sale_label = esc_html__( 'Sale', 'eskil' );
		}

		return '<span class="qodef-woo-product-mark qodef-woo-onsale">' . $sale_label . '</span>';
	}
}

if ( ! function_exists( 'eskil_add_out_of_stock_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function eskil_add_out_of_stock_mark_on_product() {
		$product = eskil_woo_get_global_product();

		if ( ! empty( $product ) && ! $product->is_in_stock() ) {
			echo eskil_get_out_of_stock_mark(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'eskil_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string
	 */
	function eskil_get_out_of_stock_mark() {
		return '<span class="qodef-woo-product-mark qodef-out-of-stock">' . esc_html__( 'Sold', 'eskil' ) . '</span>';
	}
}

if ( ! function_exists( 'eskil_add_new_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function eskil_add_new_mark_on_product() {
		$product = eskil_woo_get_global_product();

		if ( ! empty( $product ) && $product->get_id() !== '' ) {
			echo eskil_get_new_mark( $product->get_id() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

if ( ! function_exists( 'eskil_get_new_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @param int $product_id
	 *
	 * @return string
	 */
	function eskil_get_new_mark( $product_id ) {
		$option = get_post_meta( $product_id, 'qodef_show_new_sign', true );

		if ( 'yes' === $option ) {
			return '<span class="qodef-woo-product-mark qodef-new">' . esc_html__( 'New', 'eskil' ) . '</span>';
		}

		return false;
	}
}

if ( ! function_exists( 'eskil_woo_shop_loop_item_title' ) ) {
	/**
	 * Function that override product list item title template
	 */
	function eskil_woo_shop_loop_item_title() {
		$option    = eskil_get_post_value_through_levels( 'qodef_woo_product_list_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h4';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title woocommerce-loop-product__title">';
		do_action( 'qodef_woo_product_list_title_tag_link_open' );
		echo wp_kses_post( get_the_title() );
		do_action( 'qodef_woo_product_list_title_tag_link_close' );
		echo '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'eskil_woo_template_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function eskil_woo_template_single_title() {
		$option    = eskil_get_post_value_through_levels( 'qodef_woo_single_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h1';

		echo '<' . esc_attr( $title_tag ) . ' class="qodef-woo-product-title product_title entry-title">' . wp_kses_post( get_the_title() ) . '</' . esc_attr( $title_tag ) . '>';
	}
}

if ( ! function_exists( 'eskil_woo_single_thumbnail_images_columns' ) ) {
	/**
	 * Function that set number of columns for thumbnail images on single product page
	 *
	 * @param int $columns
	 *
	 * @return int
	 */
	function eskil_woo_single_thumbnail_images_columns( $columns ) {
		$option = eskil_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );

		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		}

		return $columns;
	}
}

if ( ! function_exists( 'eskil_woo_single_thumbnail_images_size' ) ) {
	/**
	 * Function that set thumbnail images size on single product page
	 *
	 * @return string
	 */
	function eskil_woo_single_thumbnail_images_size() {
		return apply_filters( 'eskil_filter_woo_single_thumbnail_size', 'woocommerce_thumbnail' );
	}
}

if ( ! function_exists( 'eskil_woo_single_thumbnail_images_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function eskil_woo_single_thumbnail_images_wrapper() {
		echo '<div class="qodef-woo-thumbnails-wrapper">';
	}
}

if ( ! function_exists( 'eskil_woo_single_thumbnail_images_wrapper_end' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function eskil_woo_single_thumbnail_images_wrapper_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'eskil_woo_single_related_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for related product list on single product page
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	function eskil_woo_single_related_product_list_columns( $args ) {
		$option = eskil_get_post_value_through_levels( 'qodef_woo_single_related_product_list_columns' );

		if ( ! empty( $option ) ) {
			$args['posts_per_page'] = intval( $option );
			$args['columns']        = intval( $option );
		}

		return $args;
	}
}

if ( ! function_exists( 'eskil_woo_product_get_rating_html' ) ) {
	/**
	 * Function that override ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float $rating
	 *
	 * @return string
	 */
	function eskil_woo_product_get_rating_html( $html, $rating ) {
		if ( ! empty( $rating ) ) {
			$html = '<div class="qodef-woo-ratings qodef-m"><div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= eskil_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= eskil_get_svg_icon( 'star', 'qodef-m-star-item' );
			}
			$html .= '</div>';
			$html .= '</div></div>';
		}

		return $html;
	}
}

if ( ! function_exists( 'eskil_woo_get_product_search_form' ) ) {
	/**
	 * Function that override product search widget form
	 *
	 * @return string which contains html content
	 */
	function eskil_woo_get_product_search_form() {
		return eskil_get_template_part( 'woocommerce', 'templates/product-searchform' );
	}
}

if ( ! function_exists( 'eskil_woo_get_content_widget_product' ) ) {
	/**
	 * Function that override product content widget
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function eskil_woo_get_content_widget_product( $located, $template_name ) {

		if ( 'content-widget-product.php' === $template_name && file_exists( ESKIL_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php' ) ) {
			$located = ESKIL_INC_ROOT_DIR . '/woocommerce/templates/content-widget-product.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'eskil_woo_get_quantity_input' ) ) {
	/**
	 * Function that override quantity input
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function eskil_woo_get_quantity_input( $located, $template_name ) {

		if ( 'global/quantity-input.php' === $template_name && file_exists( ESKIL_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php' ) ) {
			$located = ESKIL_INC_ROOT_DIR . '/woocommerce/templates/global/quantity-input.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'eskil_woo_get_single_product_meta' ) ) {
	/**
	 * Function that override single product meta
	 *
	 * @param string $located
	 * @param string $template_name
	 *
	 * @return string which contains html content
	 */
	function eskil_woo_get_single_product_meta( $located, $template_name ) {

		if ( 'single-product/meta.php' === $template_name && file_exists( ESKIL_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php' ) ) {
			$located = ESKIL_INC_ROOT_DIR . '/woocommerce/templates/single-product/meta.php';
		}

		return $located;
	}
}

if ( ! function_exists( 'eskil_woocommerce_grouped_product_thumbnail' ) ) {
	function eskil_woocommerce_grouped_product_thumbnail( $product ) {
		if (wp_get_attachment_image_src( $product->get_image_id() )) {
			$attachment_url = wp_get_attachment_image_src( $product->get_image_id() )[0];
			$attachment_alt = get_post_meta( $product->get_image_id(), '_wp_attachment_image_alt', true );
			?>
			<td class="woocommerce-grouped-product-list-item__image">
				<img src="<?php echo esc_url( $attachment_url ); ?>" alt="<?php echo esc_attr( $attachment_alt ); ?>"/>
			</td>
			<?php
		}

	}
}

if ( ! function_exists( 'eskil_woo_single_add_default_tabs' ) ) {
	/**
	 * Function that returns default woocommerce tabs
	 *
	 * @return mixed
	 */
	function eskil_woo_single_add_default_tabs() {
		$single_product_layout = eskil_get_post_value_through_levels( 'qodef_woo_single_layout', get_the_id() );

		if ( 'slider' === $single_product_layout || 'full-width' === $single_product_layout ) {
			return woocommerce_output_product_data_tabs();
		} elseif ( eskil_is_installed( 'core' ) && '' === $single_product_layout || 'standard' === $single_product_layout || 'big_images' === $single_product_layout || 'gallery' === $single_product_layout ) {
			return eskil_core_woo_output_product_data_tabs_accordion();
		} else {
			return woocommerce_output_product_data_tabs();
		}
	}
}
