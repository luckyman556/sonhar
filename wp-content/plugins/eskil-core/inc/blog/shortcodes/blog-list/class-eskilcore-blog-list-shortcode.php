<?php

if ( ! function_exists( 'eskil_core_add_blog_list_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_blog_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Blog_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_blog_list_shortcode' );
}

if ( class_exists( 'EskilCore_List_Shortcode' ) ) {
	class EskilCore_Blog_List_Shortcode extends EskilCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'post' );
			$this->set_post_type_taxonomy( 'category' );
			$this->set_post_type_additional_taxonomies( array( 'post_tag' ) );
			$this->set_layouts( apply_filters( 'eskil_core_filter_blog_list_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_INC_URL_PATH . '/blog/shortcodes/blog-list' );
			$this->set_base( 'eskil_core_blog_list' );
			$this->set_name( esc_html__( 'Blog List', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of blog posts', 'eskil-core' ) );
			$this->set_scripts(
				apply_filters( 'eskil_core_filter_blog_list_register_scripts', array() )
			);
			$this->set_necessary_styles(
				apply_filters( 'eskil_core_filter_blog_list_register_styles', array() )
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);
			$this->map_list_options();
			$this->map_query_options();
			$this->map_layout_options(
				array(
					'layouts' => $this->get_layouts(),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'excerpt_length',
					'title'      => esc_html__( 'Excerpt Length', 'eskil-core' ),
					'group'      => esc_html__( 'Layout', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'excerpt_margin',
					'title'      => esc_html__( 'Excerpt Top Margin', 'eskil-core' ),
					'group'      => esc_html__( 'Layout', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_blog_enable_author',
					'title'      => esc_html__( 'Enable Author', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'yes_no', false ),
					'group'      => esc_html__( 'Layout', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        => 'standard',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_blog_enable_category',
					'title'      => esc_html__( 'Enable Category', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'yes_no', false ),
					'group'      => esc_html__( 'Layout', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        => 'standard',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_tags',
					'title'         => esc_html__( 'Enable Tags', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'yes_no' ),
					'description'   => esc_html__( 'Select whether or not to display Blog Tags in the Blog List.', 'eskil-core' ),
					'default_value' => 'no',
					'group'         => esc_html__( 'Layout', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_blog_enable_simple_button',
					'title'      => esc_html__( 'Enable Simple Button', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'no_yes', false ),
					'group'      => esc_html__( 'Layout', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        => 'standard',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_blog_enable_borders',
					'title'      => esc_html__( 'Enable Borders', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'no_yes', false ),
					'group'      => esc_html__( 'Layout', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        => 'standard',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'hidden',
					'name'       => 'is_widget_element',
					'title'      => esc_html__( 'Is Shortcode Widget', 'eskil-core' ),
				)
			);
			$this->map_additional_options();
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'eskil_core_blog_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			parent::load_assets();

			$is_allowed = apply_filters( 'eskil_core_filter_load_blog_list_assets', false, $this->get_atts() );

			if ( $is_allowed ) {
				wp_enqueue_style( 'wp-mediaelement' );
				wp_enqueue_script( 'wp-mediaelement' );
				wp_enqueue_script( 'mediaelement-vimeo' );
			}
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_filter_taxonomy( $atts );

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['query_result']   = new \WP_Query( eskil_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts );
			$atts['excerpt_style']  = $this->get_excerpt_styles( $atts );
			$atts['data_attr']      = eskil_core_get_pagination_data( ESKIL_CORE_REL_PATH, 'blog/shortcodes', 'blog-list', 'post', $atts );

			$atts['this_shortcode'] = $this;

			return eskil_core_get_template_part( 'blog/shortcodes/blog-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-blog';
			if ( ! empty( $atts['layout'] ) && 'standard' === $atts['layout'] ) {
				$holder_classes[] = 'qodef--list';
			}
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['qodef_blog_enable_borders'] ? 'qodef-item-borders' : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$item_classes[] = 'qodef-blog-item';

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

		public function get_excerpt_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['excerpt_margin'] ) ) {
				if ( qode_framework_string_ends_with_space_units( $atts['excerpt_margin'] ) ) {
					$styles[] = 'margin-top: ' . $atts['excerpt_margin'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['excerpt_margin'] ) . 'px';
				}
			}

			return $styles;
		}
	}
}
