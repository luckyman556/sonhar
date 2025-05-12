<?php

class EskilCore_Text_Marquee_Shortcode_Elementor extends EskilCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'eskil_core_text_marquee' );

		parent::__construct( $data, $args );
	}
}

eskil_core_register_new_elementor_widget( new EskilCore_Text_Marquee_Shortcode_Elementor() );
