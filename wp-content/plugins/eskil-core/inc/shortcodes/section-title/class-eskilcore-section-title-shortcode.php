<?php

if ( ! function_exists( 'eskil_core_add_section_title_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_section_title_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Section_Title_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_section_title_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Section_Title_Shortcode extends EskilCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/section-title' );
			$this->set_base( 'eskil_core_section_title' );
			$this->set_name( esc_html__( 'Section Title', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds section title element', 'eskil-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
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
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h2',
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
					'title'      => esc_html__( 'Margin Top', 'eskil-core' ),
					'group'      => esc_html__( 'Title Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'tagline',
					'title'         => esc_html__( 'Tagline', 'eskil-core' ),
					'default_value' => esc_html__( 'Tagline Text', 'eskil-core' ),
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
					'field_type' => 'text',
					'name'       => 'tagline_margin_bottom',
					'title'      => esc_html__( 'Tagline Margin Bottom', 'eskil-core' ),
					'group'      => esc_html__( 'Tagline Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link',
					'title'      => esc_html__( 'Title Custom Link', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'target',
					'title'         => esc_html__( 'Custom Link Target', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
					'dependency'    => array(
						'show' => array(
							'image_action' => array(
								'values'        => 'custom-link',
								'default_value' => '',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'textarea',
					'name'          => 'text',
					'title'         => esc_html__( 'Text', 'eskil-core' ),
					'default_value' => esc_html__( 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'eskil-core' ),
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
					'name'       => 'text_font_size',
					'title'      => esc_html__( 'Text Font Size', 'eskil-core' ),
					'group'      => esc_html__( 'Text Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_letter_spacing',
					'title'      => esc_html__( 'Text Letter Spacing', 'eskil-core' ),
					'group'      => esc_html__( 'Text Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_lh',
					'title'      => esc_html__( 'Text Line Height', 'eskil-core' ),
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
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'content_alignment',
					'title'      => esc_html__( 'Content Alignment', 'eskil-core' ),
					'options'    => array(
						''       => esc_html__( 'Default', 'eskil-core' ),
						'left'   => esc_html__( 'Left', 'eskil-core' ),
						'center' => esc_html__( 'Center', 'eskil-core' ),
						'right'  => esc_html__( 'Right', 'eskil-core' ),
					),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['title']          = $this->get_modified_title( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['tagline_styles'] = $this->get_tagline_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );

			return eskil_core_get_template_part( 'shortcodes/section-title', 'templates/section-title', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-section-title';
			$holder_classes[] = ! empty( $atts['content_alignment'] ) ? 'qodef-alignment--' . $atts['content_alignment'] : 'qodef-alignment--left';
			$holder_classes[] = 'yes' === $atts['disable_title_break_words'] ? 'qodef-title-break--disabled' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_modified_title( $atts ) {
			$title = $atts['title'];

			if ( ! empty( $title ) && ! empty( $atts['line_break_positions'] ) ) {
				$split_title          = explode( ' ', $title );
				$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );

				foreach ( $line_break_positions as $position ) {
					$position = intval( $position );
					if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
						$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . '<br />';
					}
				}

				$title = implode( ' ', $split_title );
			}

			return $title;
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			if ( '' !== $atts['title_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}

			return $styles;
		}

		private function get_tagline_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['tagline_color'] ) ) {
				$styles[] = 'color: ' . $atts['tagline_color'];
			}

			if ( '' !== $atts['tagline_margin_bottom'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['tagline_margin_bottom'] ) ) {
					$styles[] = 'margin-bottom: ' . $atts['tagline_margin_bottom'];
				} else {
					$styles[] = 'margin-bottom: ' . intval( $atts['tagline_margin_bottom'] ) . 'px';
				}
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

			if ( '' !== $atts['text_font_size'] ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['text_font_size'] ) ) {
					$styles[] = 'font-size: ' . $atts['text_font_size'];
				} else {
					$styles[] = 'font-size: ' . intval( $atts['text_font_size'] ) . 'px';
				}
			}

			if ( '' !== $atts['text_letter_spacing'] ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['text_letter_spacing'] ) ) {
					$styles[] = 'letter-spacing: ' . $atts['text_letter_spacing'];
				} else {
					$styles[] = 'letter-spacing: ' . intval( $atts['text_letter_spacing'] ) . 'px';
				}
			}

			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}

			if ( ! empty( $atts['text_lh'] ) ) {
				$styles[] = 'line-height: ' . $atts['text_lh'];
			}

			return $styles;
		}
	}
}
