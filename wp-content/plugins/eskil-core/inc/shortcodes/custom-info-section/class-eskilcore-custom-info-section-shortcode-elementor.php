<?php

class EskilCore_Custom_Info_Section_Shortcode_Elementor extends EskilCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'eskil_core_custom_info_section' );

		parent::__construct( $data, $args );
	}
}

eskil_core_register_new_elementor_widget( new EskilCore_Custom_Info_Section_Shortcode_Elementor() );
