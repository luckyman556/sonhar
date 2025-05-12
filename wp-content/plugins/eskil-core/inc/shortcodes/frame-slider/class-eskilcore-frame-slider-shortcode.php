<?php

if ( ! function_exists( 'eskil_core_add_frame_slider_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_frame_slider_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Frame_Slider_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_frame_slider_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Frame_Slider_Shortcode extends EskilCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'eskil_core_filter_frame_slider_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'eskil_core_filter_frame_slider_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/frame-slider' );
			$this->set_base( 'eskil_core_frame_slider' );
			$this->set_name( esc_html__( 'Frame Slider', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds frame slider element', 'eskil-core' ) );
			$this->set_scripts(
				array(
					'swiper'                 => array(
						'registered' => true,
					),
					'eskil-main-js' => array(
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
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Child elements', 'eskil-core' ),
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'item_link',
							'title'         => esc_html__( 'Link', 'eskil-core' ),
							'default_value' => '',
						),
						array(
							'field_type' => 'image',
							'name'       => 'item_image',
							'title'      => esc_html__( 'Image', 'eskil-core' ),
						),
					),
				)
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['this_shortcode'] = $this;

			return eskil_core_get_template_part( 'shortcodes/frame-slider', 'templates/frame-slider', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-frame-slider';

			return implode( ' ', $holder_classes );
		}
	}
}
