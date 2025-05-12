<?php

class EskilCore_Icon_With_Text_Shortcode_Elementor extends EskilCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'eskil_core_icon_with_text' );

		parent::__construct( $data, $args );
	}
}

eskil_core_register_new_elementor_widget( new EskilCore_Icon_With_Text_Shortcode_Elementor() );
