<?php

class EskilCore_Centered_Header extends EskilCore_Header {
	private static $instance;

	public function __construct() {
		$this->set_layout( 'centered' );
		$this->default_header_height = 150;
		$this->set_search_layout( 'fullscreen' );

		parent::__construct();
	}

	/**
	 * @return EskilCore_Centered_Header
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
