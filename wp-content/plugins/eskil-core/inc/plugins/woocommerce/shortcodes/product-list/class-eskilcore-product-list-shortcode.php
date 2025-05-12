<?php

if ( ! function_exists( 'eskil_core_add_product_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_product_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Product_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_product_list_shortcode' );
}

if ( class_exists( 'EskilCore_List_Shortcode' ) ) {
	class EskilCore_Product_List_Shortcode extends EskilCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_post_type_additional_taxonomies( array( 'product_tag', 'product_type' ) );
			$this->set_layouts( apply_filters( 'eskil_core_filter_product_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'eskil_core_filter_product_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-list' );
			$this->set_base( 'eskil_core_product_list' );
			$this->set_name( esc_html__( 'Product List', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of products', 'eskil-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);
			$this->map_list_options();
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'product_list_enable_filter_order_by',
					'title'      => esc_html__( 'Enable Order By Filter', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'group'      => esc_html__( 'Additional', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'product_list_enable_filter_category',
					'title'      => esc_html__( 'Enable Category Filter', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'group'      => esc_html__( 'Additional', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'filter_tax__in',
					'title'       => esc_html__( 'Filter Taxonomy Slugs', 'eskil-core' ),
					'description' => esc_html__( 'Separate filter taxonomy slugs with commas', 'eskil-core' ),
					'group'       => esc_html__( 'Additional', 'eskil-core' ),
					'dependency'  => array(
						'show' => array(
							'product_list_enable_filter_category' => array(
								'values'        => 'yes',
							),
						),
					),
				)
			);
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'product_list_enable_border',
					'title'       => esc_html__( 'Enable Border', 'eskil-core' ),
					'description' => esc_html__( 'Adds a border to the Masonry items', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'group'       => esc_html__( 'Layout', 'eskil-core' ),
					'default'     => 'no',
					'dependency' => array(
						'show' => array(
							'behavior' => array(
								'values'  => 'masonry',
								'default' => 'columns',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'product_list_enable_masonry_padding',
					'title'       => esc_html__( 'Enable Masonry Padding', 'eskil-core' ),
					'description' => esc_html__( 'Enables extra padding around Masonry Item content', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'group'       => esc_html__( 'Layout', 'eskil-core' ),
					'default'     => 'no',
					'dependency' => array(
						'show' => array(
							'behavior' => array(
								'values'  => 'masonry',
								'default' => 'columns',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'product_list_masonry_mobile_height',
					'title'       => esc_html__( 'Masonry Mobile Height', 'eskil-core' ),
					'description' => esc_html__( 'Set a fixed Item height in px for mobile screens (480px width and under)', 'eskil-core' ),
					'group'       => esc_html__( 'Layout', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'behavior' => array(
								'values'  => 'masonry',
								'default' => 'columns',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'product_list_item_bottom_margin',
					'title'       => esc_html__( 'Item Bottom Margin', 'eskil-core' ),
					'description' => esc_html__( 'Set a custom item bottom margin in px (will override default values)', 'eskil-core' ),
					'group'       => esc_html__( 'Layout', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'product_list_hide_buttons',
					'title'       => esc_html__( 'Hide Inner Buttons', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'group'       => esc_html__( 'Layout', 'eskil-core' ),
					'default'     => 'no',
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'select',
					'name'        => 'product_list_enable_hover_background_color',
					'title'       => esc_html__( 'Enable Hover Background Color', 'eskil-core' ),
					'options'     => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'group'       => esc_html__( 'Style', 'eskil-core' ),
					'default'     => 'no',
				)
			);
			$this->map_additional_options( array( 'exclude_filter' => true ) );
			$this->map_extra_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'eskil_core_product_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_filter_taxonomy( $atts );

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			$atts['product_prices'] = eskil_core_get_filtered_price();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['query_result']   = new \WP_Query( eskil_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['data_attr']      = eskil_core_get_pagination_data( ESKIL_CORE_REL_PATH, 'plugins/woocommerce/shortcodes', 'product-list', 'product', $atts );

			$atts['this_shortcode'] = $this;

			return eskil_core_get_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/content', $atts['behavior'], $atts );
		}

		public function get_additional_query_args( $atts ) {
			$args = parent::get_additional_query_args( $atts );

			if ( ! empty( $atts['filterby'] ) ) {
				switch ( $atts['filterby'] ) {
					case 'on_sale':
						$sale_products         = wc_get_product_ids_on_sale();
						$args['no_found_rows'] = 1;
						$args['post__in']      = array_merge( array( 0 ), $sale_products );

						if ( ! empty( $atts['additional_params'] ) && 'id' === $atts['additional_params'] && ! empty( $atts['post_ids'] ) ) {
							$post_ids          = array_map( 'intval', explode( ',', $atts['post_ids'] ) );
							$new_sale_products = array();

							foreach ( $post_ids as $post_id ) {
								if ( in_array( $post_id, $sale_products, true ) ) {
									$new_sale_products[] = $post_id;
								}
							}

							if ( ! empty( $new_sale_products ) ) {
								$args['post__in'] = $new_sale_products;
							}
						}

						break;
					case 'featured':
						$featured_tax_query   = WC()->query->get_tax_query();
						$featured_tax_query[] = array(
							'taxonomy'         => 'product_visibility',
							'terms'            => 'featured',
							'field'            => 'name',
							'operator'         => 'IN',
							'include_children' => false,
						);

						if ( isset( $args['tax_query'] ) && ! empty( $args['tax_query'] ) ) {
							$args['tax_query'] = array_merge( $args['tax_query'], $featured_tax_query );
						} else {
							$args['tax_query'] = $featured_tax_query;
						}

						break;
					case 'top_rated':
						$args['meta_key'] = '_wc_average_rating';
						$args['order']    = 'DESC';
						$args['orderby']  = 'meta_value_num';
						break;
					case 'best_selling':
						$args['meta_key'] = 'total_sales';
						$args['order']    = 'DESC';
						$args['orderby']  = 'meta_value_num';
						break;
				}
			}

			return $args;
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['product_list_enable_hover_background_color'] ) ? 'qodef-items--hover-bg' : '';

			if ( isset( $atts['product_list_hide_buttons'] ) && 'yes' === $atts['product_list_hide_buttons'] ) {
				$holder_classes[] = 'qodef-inner-buttons--hidden';
			}

			if ( isset( $atts['product_list_enable_border'] ) && 'yes' === $atts['product_list_enable_border'] ) {
				$holder_classes[] = 'qodef-masonry-border';
			}

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
			$list_item_classes = $this->get_list_item_classes( $atts );

			if ( isset( $atts['product_list_enable_masonry_padding'] ) && 'yes' === $atts['product_list_enable_masonry_padding'] ) {
				$list_item_classes[] = 'qodef-masonry-extra-padding';
			}

			if ( ! empty( $atts['product_list_masonry_mobile_height'] ) ) {
				$list_item_classes[] = 'qodef-masonry-mobile-height--' . intval( $atts['product_list_masonry_mobile_height'] );
			}

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}

		public function get_item_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['product_list_item_bottom_margin'] ) ) {
				$styles[] = 'margin-bottom: ' . $atts['product_list_item_bottom_margin'] . 'px !important';
			}

			return $styles;
		}
	}
}
