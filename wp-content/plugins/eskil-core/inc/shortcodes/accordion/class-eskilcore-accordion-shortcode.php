<?php

if ( ! function_exists( 'eskil_core_add_accordion_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_accordion_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Accordion_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_accordion_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Accordion_Shortcode extends EskilCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'eskil_core_filter_accordion_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/accordion' );
			$this->set_base( 'eskil_core_accordion' );
			$this->set_name( esc_html__( 'Accordion', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds accordion holder', 'eskil-core' ) );
			$this->set_is_parent_shortcode( true );
			$this->set_child_elements(
				array(
					'eskil_core_accordion_child',
				)
			);

			$this->set_scripts(
				array(
					'jquery-ui-accordion' => array(
						'registered' => true,
					),
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
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'behavior',
					'title'         => esc_html__( 'Behavior', 'eskil-core' ),
					'options'       => array(
						'accordion' => esc_html__( 'Accordion', 'eskil-core' ),
						'toggle'    => esc_html__( 'Toggle', 'eskil-core' ),
					),
					'default_value' => 'accordion',
				)
			);
		}

		public static function call_shortcode( $params ) {
			$content = null;

			if ( isset( $params['accordion_titles'] ) && ! empty( $params['accordion_titles'] ) && isset( $params['accordion_contents'] ) && ! empty( $params['accordion_contents'] ) ) {
				$title_tag = isset( $params['accordion_title_tag'] ) && ! empty( $params['accordion_title_tag'] ) ? esc_attr( $params['accordion_title_tag'] ) : '';

				foreach ( $params['accordion_titles'] as $index => $title ) {
					$content .= '[eskil_core_accordion_child title_tag="' . esc_attr( $title_tag ) . '" title="' . esc_attr( $title ) . '"]' . $params['accordion_contents'][ $index ] . '[/eskil_core_accordion_child]';
				}
			}

			$html = qode_framework_call_shortcode( 'eskil_core_accordion', $params, $content );

			return $html;
		}

		public function load_assets() {
			wp_enqueue_script( 'jquery-ui-accordion' );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts                   = $this->get_atts();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );

			$atts['content'] = preg_replace( '/\[eskil_core_accordion_child/i', '[eskil_core_accordion_child layout="' . $atts['layout'] . '"', $content );

			return eskil_core_get_template_part( 'shortcodes/accordion', 'variations/' . $atts['layout'] . '/templates/holder', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-accordion';
			$holder_classes[] = 'clear';
			$holder_classes[] = ! empty( $atts['behavior'] ) ? 'qodef-behavior--' . $atts['behavior'] : '';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';

			return implode( ' ', $holder_classes );
		}
	}
}
