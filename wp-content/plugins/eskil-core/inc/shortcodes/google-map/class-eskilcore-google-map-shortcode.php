<?php

if ( ! function_exists( 'eskil_core_add_google_map_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_google_map_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Google_Map_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_google_map_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Google_Map_Shortcode extends EskilCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/google-map' );
			$this->set_base( 'eskil_core_google_map' );
			$this->set_name( esc_html__( 'Google Map', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays google map with provided parameters', 'eskil-core' ) );
			$this->set_scripts(
				array(
					'google-map-api'           => array(
						'registered' => true,
					),
					'eskil-core-google-map' => array(
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
					'name'       => 'address1',
					'title'      => esc_html__( 'Address 1', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'address2',
					'title'      => esc_html__( 'Address 2', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'address3',
					'title'      => esc_html__( 'Address 3', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'address4',
					'title'      => esc_html__( 'Address 4', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'pin',
					'title'      => esc_html__( 'Pin Icon', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'map_height',
					'title'         => esc_html__( 'Map Height (px)', 'eskil-core' ),
					'default_value' => '300',
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'eskil_core_google_map', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function load_assets() {
			wp_enqueue_script( 'google-map-api' );
			wp_enqueue_script( 'eskil-core-google-map' );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$rand_number            = rand( 0, 1000 );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['rand_number']    = $rand_number;
			$atts['holder_id']      = 'qodef-map-id--' . $rand_number;
			$atts['map_data']       = $this->get_map_data( $atts );

			return eskil_core_get_template_part( 'shortcodes/google-map', 'templates/google-map', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-google-map';

			return implode( ' ', $holder_classes );
		}

		private function get_map_data( $atts ) {
			$map_data = array();

			$addresses_array = array();
			if ( '' !== $atts['address1'] ) {
				array_push( $addresses_array, esc_attr( $atts['address1'] ) );
			}
			if ( '' !== $atts['address2'] ) {
				array_push( $addresses_array, esc_attr( $atts['address2'] ) );
			}
			if ( '' !== $atts['address3'] ) {
				array_push( $addresses_array, esc_attr( $atts['address3'] ) );
			}
			if ( '' !== $atts['address4'] ) {
				array_push( $addresses_array, esc_attr( $atts['address4'] ) );
			}

			if ( '' !== $atts['pin'] && is_array( wp_get_attachment_image_src( $atts['pin'] ) ) ) {
				$map_pin = wp_get_attachment_image_src( $atts['pin'], 'full', true );
				$map_pin = $map_pin[0];
			} else {
				$map_pin = ESKIL_CORE_INC_URL_PATH . '/maps/assets/img/pin.png';
			}

			$map_data[] = "data-addresses='[\"" . implode( '","', $addresses_array ) . "\"]'";
			$map_data[] = 'data-pin=' . $map_pin;
			$map_data[] = 'data-unique-id=' . $atts['rand_number'];
			$map_data[] = 'data-height=' . $atts['map_height'];

			return implode( ' ', $map_data );
		}
	}
}
