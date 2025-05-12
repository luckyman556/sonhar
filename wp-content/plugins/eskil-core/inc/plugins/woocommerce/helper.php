<?php

if ( ! function_exists( 'eskil_core_register_product_for_meta_options' ) ) {
	/**
	 * Function that register product post type for meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function eskil_core_register_product_for_meta_options( $post_types ) {
		$post_types[] = 'product';

		return $post_types;
	}

	add_filter( 'qode_framework_filter_meta_box_save', 'eskil_core_register_product_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'eskil_core_register_product_for_meta_options' );
}

if ( ! function_exists( 'eskil_core_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function eskil_core_woo_get_global_product() {
		global $product;

		return $product;
	}
}

if ( ! function_exists( 'eskil_core_woo_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int    $position
	 * @param string $map
	 *
	 * @return int
	 */
	function eskil_core_woo_set_admin_options_map_position( $position, $map ) {

		if ( 'woocommerce' === $map ) {
			$position = 70;
		}

		return $position;
	}

	add_filter( 'eskil_core_filter_admin_options_map_position', 'eskil_core_woo_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'eskil_core_include_woocommerce_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function eskil_core_include_woocommerce_shortcodes() {
		foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}

	add_action( 'qode_framework_action_before_shortcodes_register', 'eskil_core_include_woocommerce_shortcodes' );
}

if ( ! function_exists( 'eskil_core_woo_product_get_rating_html' ) ) {
	/**
	 * Function that return ratings templates
	 *
	 * @param string $html - contains html content
	 * @param float  $rating
	 * @param int    $count - total number of ratings
	 *
	 * @return string
	 */
	function eskil_core_woo_product_get_rating_html( $html, $rating, $count ) {
		return qode_framework_is_installed( 'theme' ) ? eskil_woo_product_get_rating_html( $html, $rating, $count ) : '';
	}
}

if ( ! function_exists( 'eskil_core_woo_get_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param string $before
	 * @param string $after
	 *
	 * @return string
	 */
	function eskil_core_woo_get_product_categories( $before = '', $after = '' ) {
		return qode_framework_is_installed( 'theme' ) ? eskil_woo_get_product_categories( $before, $after ) : '';
	}
}

if ( ! function_exists( 'eskil_core_set_product_styles' ) ) {
	/**
	 * Function that generates module inline styles
	 *
	 * @param string $style
	 *
	 * @return string
	 */
	function eskil_core_set_product_styles( $style ) {
		$price_styles        = eskil_core_get_typography_styles( 'qodef_product_price' );
		$price_single_styles = eskil_core_get_typography_styles( 'qodef_product_single_price' );

		if ( ! empty( $price_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page .price',
					'.qodef-woo-shortcode .price',
				),
				$price_styles
			);
		}

		if ( ! empty( $price_single_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .entry-summary .price',
				),
				$price_single_styles
			);
		}

		$price_discount_styles        = array();
		$price_discount_color         = eskil_core_get_option_value( 'admin', 'qodef_product_price_discount_color' );
		$price_single_discount_styles = array();
		$price_single_discount_color  = eskil_core_get_option_value( 'admin', 'qodef_product_single_price_discount_color' );

		if ( ! empty( $price_discount_color ) ) {
			$price_discount_styles['color'] = $price_discount_color;
		}

		if ( ! empty( $price_single_discount_color ) ) {
			$price_single_discount_styles['color'] = $price_single_discount_color;
		}

		if ( ! empty( $price_discount_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page .price del',
					'.qodef-woo-shortcode .price del',
				),
				$price_discount_styles
			);
		}

		if ( ! empty( $price_single_discount_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .entry-summary .price del',
				),
				$price_single_discount_styles
			);
		}

		$label_styles      = eskil_core_get_typography_styles( 'qodef_product_label' );
		$info_styles       = eskil_core_get_typography_styles( 'qodef_product_info' );
		$info_hover_styles = eskil_core_get_typography_hover_styles( 'qodef_product_info' );

		if ( ! empty( $label_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .product_meta .qodef-woo-meta-label',
					'#qodef-woo-page.qodef--single .entry-summary .qodef-custom-label',
				),
				$label_styles
			);
		}

		if ( ! empty( $info_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .product_meta .qodef-woo-meta-value',
					'#qodef-woo-page.qodef--single .shop_attributes th',
					'#qodef-woo-page.qodef--single .woocommerce-Reviews .woocommerce-review__author',
				),
				$info_styles
			);
		}

		if ( ! empty( $info_hover_styles ) ) {
			$style .= qode_framework_dynamic_style(
				array(
					'#qodef-woo-page.qodef--single .product_meta .qodef-woo-meta-value a:hover',
				),
				$info_hover_styles
			);
		}

		return $style;
	}

	add_filter( 'eskil_filter_add_inline_style', 'eskil_core_set_product_styles' );
}

if ( ! function_exists( 'eskil_core_add_bottom_info_section' ) ) {
	function eskil_core_add_bottom_info_section( $html ) {
		$svg         = get_post_meta( get_the_ID(), 'qodef_bottom_section_icon', true );
		$text_top    = get_post_meta( get_the_ID(), 'qodef_bottom_section_text_top', true );
		$text_bottom = get_post_meta( get_the_ID(), 'qodef_bottom_section_text_bottom', true );

		if ( ! empty( $text_top ) && ! empty( $text_bottom ) ) {
			$html_open  = '<div class="qodef-product-info-bottom"><div class="qodef-pib-left-holder"><span class="qodef-pib-icon">';
			$html_svg   = $svg;
			$html       = '</span></div><div class="qodef-pib-right-holder"><span class="qodef-pib-text-top">' . $text_top . '</span>';
			$html      .= '<span class="qodef-pib-text-bottom">' . $text_bottom . '</span></div>';
			$html_close = '</div >';

			echo qode_framework_wp_kses_html( 'content', $html_open );
			echo qode_framework_wp_kses_html( 'svg', $html_svg );
			echo qode_framework_wp_kses_html( 'content', $html );
			echo qode_framework_wp_kses_html( 'content', $html_close );
		}
	}

	add_action( 'woocommerce_share', 'eskil_core_add_bottom_info_section', 12 );
}

if ( ! function_exists( 'eskil_core_woo_output_product_data_tabs_accordion' ) ) {
	/**
	 * Output the product accordion tabs.
	 */
	function eskil_core_woo_output_product_data_tabs_accordion() {
		eskil_core_template_part( 'plugins/woocommerce/single', 'templates/accordion-tabs', '', '' );
	}
}

if ( ! function_exists( 'eskil_core_add_additional_woocommerce_scripts' ) ) {
	/**
	 * Function that add additional scripts for Woocommerce
	 */
	function eskil_core_add_additional_woocommerce_scripts() {

		if ( qode_framework_is_installed( 'woocommerce' ) && is_singular( 'product' ) ) {
			wp_enqueue_script( 'jquery-ui-accordion' );
		}
	}

	add_action( 'eskil_core_action_before_main_js', 'eskil_core_add_additional_woocommerce_scripts' );
}

//function that returns all Elementor saved templates
if ( ! function_exists( 'eskil_core_return_elementor_templates' ) ) {

	function eskil_core_return_elementor_templates() {
		return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
	}
}

//function that adds Template Elementor Control
if ( ! function_exists( 'eirwen_generate_elementor_designer_templates_control' ) ) {

	function eskil_core_generate_elementor_designer_templates_control( $object, $control_name = 'template_id' ) {
		$templates = eskil_core_return_elementor_templates();

		if ( ! empty( $templates ) ) {
			$options = array(
				'0' => '— ' . esc_html__( 'Select', 'eskil-core' ) . ' —',
			);

			$types = array();

			foreach ( $templates as $template ) {
				$options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
				$types[ $template['template_id'] ]   = $template['type'];
			}

			return array(
				'field_type'    => 'select',
				'name'          => 'designer_section',
				'title'         => esc_html__( 'Choose Designer Template', 'eskil-core' ),
				'options'       => $options,
				'default_value' => '0',
			);
		}
	}
}

if ( ! function_exists( 'eskil_core_new_product_tabs' ) ) {
	function eskil_core_new_product_tabs( $tabs ) {
		$design_content   = get_post_meta( get_the_ID(), 'designer_section', true );

		if ( ! empty( $design_content ) ) {
			$tabs['design'] = array(
				'title'    => __( 'Designer', 'eskil-core' ),
				'priority' => 25,
				'callback' => 'eskil_core_designer_tab_content',
			);
		}

		return $tabs;
	}

	//add new tabs
	add_filter( 'woocommerce_product_tabs', 'eskil_core_new_product_tabs' );
}

function eskil_core_designer_tab_content() {
	$content_id  = get_post_meta( get_the_ID(), 'designer_section', true );
	$tab_content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $content_id );

	echo do_shortcode( $tab_content );
}

if ( ! function_exists( 'eskil_core_generate_woo_product_single_layout' ) ) {
	/**
	 * Function that return default layout for custom post type single page
	 *
	 * @return string
	 */
	function eskil_core_generate_woo_product_single_layout() {

		$single_template = eskil_get_post_value_through_levels( 'qodef_woo_single_layout', get_the_ID() );
		$single_template = ! empty( $single_template ) ? $single_template : '';

		return $single_template;
	}
}

if ( ! function_exists( 'eskil_core_load_single_woo_template_hooks' ) ) {
	/**
	 * Function that add hook depend of item layout
	 *
	 */
	function eskil_core_load_single_woo_template_hooks() {

		if ( is_singular( 'product' ) ) {
			$item_layout = eskil_core_generate_woo_product_single_layout();

			$item_layout = str_replace( '-', '_', $item_layout );

			do_action( 'eskil_core_action_load_template_hooks_' . $item_layout );
		}
	}

	add_action( 'wp', 'eskil_core_load_single_woo_template_hooks' );
}

if ( ! function_exists( 'eskil_core_set_woo_product_body_classes' ) ) {

	function eskil_core_set_woo_product_body_classes( $classes ) {
		if ( is_singular( 'product' ) ) {
			$item_layout = eskil_core_generate_woo_product_single_layout();

			if ( ! empty( $item_layout ) ) {
				$classes[] = ' qodef-product-layout--' . $item_layout;
			}
		}

		return $classes;
	}

	add_filter( 'body_class', 'eskil_core_set_woo_product_body_classes' );
}

if ( ! function_exists( 'eskil_core_register_designer_woocommerce_taxonomy' ) ) {
	/**
	 * Function for registering Designer texonomy for WooCommerce Product
	 */
	function eskil_core_register_designer_woocommerce_taxonomy() {

		register_taxonomy(
			'product_designer',
			apply_filters( 'woocommerce_taxonomy_objects_product_designer', array( 'product' ) ),
			apply_filters(
				'woocommerce_taxonomy_args_product_designer',
				array(
					'hierarchical'          => true,
					'update_count_callback' => '_wc_term_recount',
					'label'                 => __( 'Designer', 'eskil-core' ),
					'labels'                => array(
						'name'              => __( 'Designer', 'eskil-core' ),
						'singular_name'     => __( 'Designer', 'eskil-core' ),
						'menu_name'         => _x( 'Product Designers', 'Admin menu name', 'eskil-core' ),
						'search_items'      => __( 'Search Designers', 'eskil-core' ),
						'all_items'         => __( 'All Designers', 'eskil-core' ),
						'parent_item'       => __( 'Parent Designer', 'eskil-core' ),
						'parent_item_colon' => __( 'Parent Designer:', 'eskil-core' ),
						'edit_item'         => __( 'Edit Designer', 'eskil-core' ),
						'update_item'       => __( 'Update Designer', 'eskil-core' ),
						'add_new_item'      => __( 'Add new Designer', 'eskil-core' ),
						'new_item_name'     => __( 'New Designer name', 'eskil-core' ),
						'not_found'         => __( 'No Designers found', 'eskil-core' ),
					),
					'show_in_rest'          => true,
					'show_ui'               => true,
					'query_var'             => true,
					'capabilities'          => array(
						'manage_terms' => 'manage_product_terms',
						'edit_terms'   => 'edit_product_terms',
						'delete_terms' => 'delete_product_terms',
						'assign_terms' => 'assign_product_terms',
					),
					'rewrite'               => array(
						'slug'         => 'product-designer',
						'with_front'   => false,
						'hierarchical' => true,
					),
				)
			)
		);
	}

	add_action( 'init', 'eskil_core_register_designer_woocommerce_taxonomy' );
}
