<?php

if ( ! function_exists( 'eskil_core_add_simple_links_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_simple_links_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Simple_Links_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_simple_links_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Simple_Links_Shortcode extends EskilCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'eskil_core_filter_simple_links_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'eskil_core_filter_simple_links_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/simple-links' );
			$this->set_base( 'eskil_core_simple_links' );
			$this->set_name( esc_html__( 'Simple Links', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds Simple Links element', 'eskil-core' ) );
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
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'link_icon',
					'title'      => esc_html__( 'Enable Icon', 'eskil-core' ),
					'options'    => eskil_core_get_select_type_options_pool( 'no_yes', false ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Child elements', 'eskil-core' ),
					'items'      => array(
						array(
							'field_type' => 'text',
							'name'       => 'item_text',
							'title'      => esc_html__( 'Text', 'eskil-core' ),
						),
						array(
							'field_type'    => 'text',
							'name'          => 'item_link',
							'title'         => esc_html__( 'Link', 'eskil-core' ),
							'default_value' => '',
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

			return eskil_core_get_template_part( 'shortcodes/simple-links', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-simple-links';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['link_icon'] ? 'qodef-icon-enabled' : '';

			return implode( ' ', $holder_classes );
		}
	}
}
