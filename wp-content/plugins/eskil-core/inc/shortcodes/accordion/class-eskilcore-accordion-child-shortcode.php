<?php

if ( ! function_exists( 'eskil_core_add_accordion_child_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function eskil_core_add_accordion_child_shortcode( $shortcodes ) {
		$shortcodes[] = 'EskilCore_Accordion_Child_Shortcode';

		return $shortcodes;
	}

	add_filter( 'eskil_core_filter_register_shortcodes', 'eskil_core_add_accordion_child_shortcode' );
}

if ( class_exists( 'EskilCore_Shortcode' ) ) {
	class EskilCore_Accordion_Child_Shortcode extends EskilCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( ESKIL_CORE_SHORTCODES_URL_PATH . '/accordion' );
			$this->set_base( 'eskil_core_accordion_child' );
			$this->set_name( esc_html__( 'Accordion Child', 'eskil-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds accordion child to accordion holder', 'eskil-core' ) );
			$this->set_is_child_shortcode( true );
			$this->set_parent_elements(
				array(
					'eskil_core_accordion',
				)
			);
			$this->set_is_parent_shortcode( true );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title',
					'title'      => esc_html__( 'Title', 'eskil-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'eskil-core' ),
					'options'       => eskil_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h3',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'text',
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'eskil-core' ),
					'default_value' => '',
					'visibility'    => array( 'map_for_page_builder' => false ),
				)
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts            = $this->get_atts();
			$atts['content'] = $content;

			return eskil_core_get_template_part( 'shortcodes/accordion', 'variations/' . $atts['layout'] . '/templates/child', '', $atts );
		}
	}
}
