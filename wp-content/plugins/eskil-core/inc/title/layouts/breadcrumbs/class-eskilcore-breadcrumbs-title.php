<?php

class EskilCore_Breadcrumbs_Title extends EskilCore_Title {
	private static $instance;

	public function __construct() {
		$this->slug = 'breadcrumbs';
	}

	/**
	 * @return EskilCore_Breadcrumbs_Title
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
