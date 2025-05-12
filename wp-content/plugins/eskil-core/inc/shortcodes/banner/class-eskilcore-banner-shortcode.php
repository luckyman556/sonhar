<?php

if ( ! function_exists( 'eskil_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Banner_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_banner_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Banner_Shortcode extends EskilCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'eskil_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'eskil_core_filter_banner_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'eskil_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'eskil-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);

			$options_map = eskil_core_get_variations_options_map( $this->get_layouts() );

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'eskil-core' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'hover_type',
					'title'      => esc_html__( 'Hover Type', 'eskil-core' ),
					'options'    => array(
						'none'         => esc_html__( 'None', 'eskil-core' ),
						'move-right'   => esc_html__( 'Move Right', 'eskil-core' ),
						'move-top'     => esc_html__( 'Move Top', 'eskil-core' ),
						'switch-image' => esc_html__( 'Switch Image', 'eskil-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'image',
					'title'      => esc_html__( 'Image', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'hover_image',
					'title'      => esc_html__( 'Hover Image', 'eskil-core' ),
					'dependency' => array(
						'show' => array(
							'hover_type' => array(
								'values'        => 'switch-image',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link_url',
					'title'      => esc_html__( 'Link', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'title',
					'title'         => esc_html__( 'Title', 'eskil-core' ),
					'default_value' => esc_html__( 'Title Text', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h3',
					'group'         => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'eskil-core' ),
					'group'      => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_top',
					'title'      => esc_html__( 'Title Margin Top', 'eskil-core' ),
					'group'      => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle',
					'title'      => esc_html__( 'Subtitle', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'subtitle_tag',
					'title'         => esc_html__( 'Subtitle Tag', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Subtitle Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'eskil-core' ),
					'group'      => esc_html__( 'Subtitle Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle_margin_top',
					'title'      => esc_html__( 'Subtitle Margin Top', 'eskil-core' ),
					'group'      => esc_html__( 'Subtitle Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'textarea',
					'name'       => 'text_field',
					'title'      => esc_html__( 'Text', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'text_tag',
					'title'         => esc_html__( 'Text Tag', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'p',
					'group'         => esc_html__( 'Text Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'eskil-core' ),
					'group'      => esc_html__( 'Text Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'eskil-core' ),
					'group'      => esc_html__( 'Text Style', 'eskil-core' ),
				)
			);
			$this->import_shortcode_options(
				array(
					'shortcode_base'    => 'eskil_core_button',
					'exclude'           => array( 'custom_class', 'link', 'target' ),
					'additional_params' => array(
						'nested_group' => esc_html__( 'Button', 'eskil-core' ),
						'dependency'   => array(
							'show' => array(
								'layout' => array(
									'values'        => 'link-button',
									'default_value' => '',
								),
							),
						),
					),
				)
			);

			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['subtitle_styles'] = $this->get_subtitle_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['button_params']   = $this->generate_button_params( $atts );

			return eskil_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['hover_type'] ) ? 'qodef-hover--' . $atts['hover_type'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['title_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			return $styles;
		}

		private function get_subtitle_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['subtitle_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['subtitle_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['subtitle_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['subtitle_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
			}

			return $styles;
		}

		private function get_text_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['text_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}

			return $styles;
		}

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				array(
					'shortcode_base' => 'eskil_core_button',
					'exclude'        => array( 'custom_class', 'link', 'target' ),
					'atts'           => $atts,
				)
			);

			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';

			return $params;
		}
	}
}
