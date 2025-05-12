<?php

if ( ! function_exists( 'eskil_core_add_custom_info_section_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_custom_info_section_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Custom_Info_Section_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_custom_info_section_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Custom_Info_Section_Shortcode extends EskilCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'eskil_core_filter_custom_info_section_layouts', array() ) );

			$options_map   = eskil_core_get_variations_options_map( $this->get_layouts() );
			$default_value = $options_map['default_value'];

			$this->set_extra_options( apply_filters( 'eskil_core_filter_custom_info_section_extra_options', array(), $default_value ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/custom-info-section' );
			$this->set_base( 'eskil_core_custom_info_section' );
			$this->set_name( esc_html__( 'Custom Info Section', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds custom info section element', 'eskil-core' ) );
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
					'visibility'    => array(
						'map_for_page_builder' => $options_map['visibility'],
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'content_background_color',
					'title'      => esc_html__( 'Background Color', 'eskil-core' ),
					'group'      => esc_html__( 'General Style', 'eskil-core' ),
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
					'default_value' => 'h4',
					'group'         => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'text',
					'name'        => 'line_break_positions',
					'title'       => esc_html__( 'Positions of Line Break', 'eskil-core' ),
					'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'eskil-core' ),
					'group'       => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'disable_title_break_words',
					'title'         => esc_html__( 'Disable Title Line Break', 'eskil-core' ),
					'description'   => esc_html__( 'Enabling this option will disable title line breaks for screen size 1024 and lower', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
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
					'field_type' => 'select',
					'name'       => 'title_text_transform',
					'title'      => esc_html__( 'Title Text Transform', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'text_transform' ),
					'group'      => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'tagline',
					'title'      => esc_html__( 'Tagline', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'tagline_color',
					'title'      => esc_html__( 'Tagline Color', 'eskil-core' ),
					'group'      => esc_html__( 'Tagline Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'full_height',
					'title'      => esc_html__( 'Full Height', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'yes_no', false ),
				)
			);
			if ( qode_framework_is_installed( 'elementor' ) ) {
				$elementor_sections = eskil_core_generate_elementor_templates_control( $this );

				if ( ! empty( $elementor_sections ) ) {
					$this->set_option( $elementor_sections );
				}
			}
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['title']          = $this->get_modified_title( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['tagline_styles'] = $this->get_tagline_styles( $atts );
			if ( ! empty( $atts['predefined_section'] ) ) {
				$atts['info_bottom'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $atts['predefined_section'] );
			}

			$atts = apply_filters( 'eskil_core_filter_custom_info_section_variation_atts', $atts );

			return eskil_core_get_template_part( 'shortcodes/custom-info-section', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-custom-info-section';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['disable_title_break_words'] ? 'qodef-title-break--disabled' : '';
			$holder_classes[] = 'yes' === $atts['full_height'] ? 'qodef-full-height' : '';
			$holder_classes   = apply_filters( 'eskil_core_filter_custom_info_section_variation_classes', $holder_classes, $atts );

			return implode( ' ', $holder_classes );
		}

		private function get_tagline_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['tagline_color'] ) ) {
				$styles[] = 'color: ' . $atts['tagline_color'];
			}

			return $styles;
		}

		private function get_modified_title( $atts ) {
			$title = $atts['title'];

			if ( ! empty( $title ) ) {
				$split_title          = explode( ' ', $title );
				$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );

				if ( ! empty( $atts['line_break_positions'] ) ) {
					foreach ( $line_break_positions as $position ) {
						$position = intval( $position );
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . '<br />';
						}
					}
				}

				$title = implode( ' ', $split_title );
			}

			return $title;
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['content_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['content_background_color'];
			}

			return $styles;
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			if ( ! empty( $atts['title_text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['title_text_transform'];
			}

			return $styles;
		}
	}
}
