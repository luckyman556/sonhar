<?php

if ( ! function_exists( 'eskil_core_add_instagram_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_instagram_list_shortcode( $shortcodes ) {
		if ( qode_framework_is_installed( 'instagram' ) ) {
			$shortcodes[] = 'EskilCore_Instagram_List_Shortcode';
		}

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_instagram_list_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Instagram_List_Shortcode extends EskilCore_Shortcode {
		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_PLUGINS_URL_PATH . '/instagram/shortcodes/instagram-list' );
			$this->set_base( 'eskil_core_instagram_list' );
			$this->set_name( esc_html__( 'Instagram List', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays instagram list', 'eskil-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);

			if ( ! class_exists( 'SB_Instagram_Feed_Pro' ) ) {
				$this->set_option(
					array(
						'field_type'    => 'select',
						'name'          => 'behavior',
						'title'         => esc_html__( 'List Appearance', 'eskil-core' ),
						'options'       => eskil_core_get_select_type_options_pool( 'list_behavior', false, array( 'masonry', 'justified-gallery' ) ),
						'default_value' => 'columns',
					)
				);
			}

			$this->set_option(
				array(
					'field_type'  => 'textarea',
					'name'        => 'instagram_shortcode',
					'title'       => esc_html__( 'Instagram Shortcode', 'eskil-core' ),
					'description' => esc_html__( 'Enter instagram shortcode like "[instagram-feed feed=1]"', 'eskil-core' ),
				)
			);
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'eskil_core_instagram_list', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['behavior']       = isset( $atts['behavior'] ) ? $atts['behavior'] : '';
			$atts['holder_classes'] = $this->get_holder_classes( $atts );

			return eskil_core_get_template_part( 'plugins/instagram/shortcodes/instagram-list', 'templates/instagram-list', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-instagram-list';
			$holder_classes[] = ( 'columns' === $atts['behavior'] ) ? 'qodef-instagram-' . $atts['behavior'] : '';
			$holder_classes[] = ( 'slider' === $atts['behavior'] ) ? 'qodef-instagram-' . $atts['behavior'] . ' qodef-swiper-container' : '';

			wp_dequeue_style( 'sbi_styles' );

			$holder_classes = array_merge( $holder_classes );

			return implode( ' ', $holder_classes );
		}
	}
}
