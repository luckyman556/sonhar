<?php

if ( ! function_exists( 'eskil_core_add_video_button_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_video_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Video_Button_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_video_button_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Video_Button_Shortcode extends EskilCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/video-button' );
			$this->set_base( 'eskil_core_video_button' );
			$this->set_name( esc_html__( 'Video Button', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds video button element', 'eskil-core' ) );
			$this->set_scripts(
				array(
					'jquery-magnific-popup' => array(
						'registered' => true,
					),
				)
			);
			$this->set_necessary_styles(
				array(
					'magnific-popup' => array(
						'registered' => true,
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'video_link',
					'title'      => esc_html__( 'Video Link', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'  => 'image',
					'name'        => 'video_image',
					'title'       => esc_html__( 'Image', 'eskil-core' ),
					'description' => esc_html__( 'Select image from media library', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'play_button_color',
					'title'      => esc_html__( 'Play Button Color', 'eskil-core' ),
					'group'      => esc_html__( 'Style', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'play_button_size',
					'title'      => esc_html__( 'Play Button Size (px)', 'eskil-core' ),
					'group'      => esc_html__( 'Style', 'eskil-core' ),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'eskil_core_video_button', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			wp_enqueue_style( 'magnific-popup' );
			wp_enqueue_script( 'jquery-magnific-popup' );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']     = $this->get_holder_classes( $atts );
			$atts['play_button_styles'] = $this->get_play_button_styles( $atts );

			return eskil_core_get_template_part( 'shortcodes/video-button', 'templates/video-button', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-video-button';
			$holder_classes[] = ! empty( $atts['video_image'] ) ? 'qodef--has-img' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_play_button_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['play_button_color'] ) ) {
				$styles[] = 'color: ' . $atts['play_button_color'];
			}

			if ( ! empty( $atts['play_button_size'] ) ) {
				if ( qode_framework_string_ends_with_typography_units( $atts['play_button_size'] ) ) {
					$styles[] = 'font-size: ' . $atts['play_button_size'];
				} else {
					$styles[] = 'font-size: ' . intval( $atts['play_button_size'] ) . 'px';
				}
			}

			return implode( ';', $styles );
		}
	}
}
