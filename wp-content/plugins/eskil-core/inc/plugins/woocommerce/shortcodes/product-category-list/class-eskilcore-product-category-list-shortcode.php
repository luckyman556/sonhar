<?php

if ( ! function_exists( 'eskil_core_add_product_category_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_product_category_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Product_Category_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_product_category_list_shortcode' );
}

if ( class_exists( 'EskilCore_List_Shortcode' ) ) {
	class EskilCore_Product_Category_List_Shortcode extends EskilCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_layouts( apply_filters( 'eskil_core_filter_product_category_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'eskil_core_filter_product_category_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-category-list' );
			$this->set_base( 'eskil_core_product_category_list' );
			$this->set_name( esc_html__( 'Product Category List', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of product categories', 'eskil-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior' => array( 'justified-gallery' ),
				)
			);
			$this->map_query_options(
				array(
					'exclude_option' => array( 'additional_params' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'hide_empty',
					'title'      => esc_html__( 'Hide Empty', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'no_yes', false ),
					'group'      => esc_html__( 'Query', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'additional_params',
					'title'      => esc_html__( 'Additional Params', 'eskil-core' ),
					'options'    => array(
						''     => esc_html__( 'No', 'eskil-core' ),
						'id'   => esc_html__( 'Taxonomy IDs', 'eskil-core' ),
						'slug' => esc_html__( 'Taxonomy Slugs', 'eskil-core' ),
					),
					'group'      => esc_html__( 'Query', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'taxonomy_ids',
					'title'       => esc_html__( 'Taxonomy IDs', 'eskil-core' ),
					'description' => esc_html__( 'Separate taxonomy IDs with commas', 'eskil-core' ),
					'group'       => esc_html__( 'Query', 'eskil-core' ),
					'dependency'  => array(
						'show' => array(
							'additional_params' => array(
								'values'        => 'id',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'taxonomy_slugs',
					'title'       => esc_html__( 'Taxonomy Slugs', 'eskil-core' ),
					'description' => esc_html__( 'Separate taxonomy Slugs with commas', 'eskil-core' ),
					'group'       => esc_html__( 'Query', 'eskil-core' ),
					'dependency'  => array(
						'show' => array(
							'additional_params' => array(
								'values'        => 'slug',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'skin',
					'title'      => esc_html__( 'Skin', 'eskil-core' ),
					'options'    => array(
						''      => esc_html__( 'Default', 'eskil-core' ),
						'light' => esc_html__( 'Light', 'eskil-core' ),
					),
					'group'     => esc_html__( 'Layout', 'eskil-core' ),
				)
			);
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'eskil_core_product_category_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']      = $this->get_post_type();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['taxonomy_items'] = get_terms( eskil_core_get_custom_post_type_taxonomy_query_args( $atts, array( 'taxonomy' => $this->get_post_type_taxonomy() ) ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );

			$atts['this_shortcode'] = $this;

			return eskil_core_get_template_part( 'plugins/woocommerce/shortcodes/product-category-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-category-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = isset( $atts['skin'] ) && ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
			$list_item_classes = $this->get_list_item_classes( $atts );

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

		public function get_image_dimension( $atts ) {
			$image_dimension = array();

			if ( ! empty( $atts['behavior'] ) && 'masonry' == $atts['behavior'] && ! empty( $atts['masonry_images_proportion'] ) && 'fixed' == $atts['masonry_images_proportion'] ) {
				$image_dimension = eskil_core_get_custom_image_size_meta( 'taxonomy', 'qodef_product_category_masonry_size', $atts['category_id'] );
			}

			if ( ! empty( $atts['behavior'] ) && in_array( $atts['behavior'], array( 'columns', 'slider' ), true ) ) {
				$image_dimension = array(
					'size'  => $atts['images_proportion'],
					'class' => eskil_core_get_custom_image_size_class_name( $atts['images_proportion'] )
				);
			}

			return $image_dimension;
		}
	}
}
