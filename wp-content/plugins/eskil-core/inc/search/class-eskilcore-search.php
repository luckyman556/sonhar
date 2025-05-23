<?php

abstract class EskilCore_Search {
	private $search_layout;

	public function __construct() {
		add_action( 'wp', array( $this, 'set_variables' ), 11 ); //after eskil_core_search_include_layout
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
	}

	public function get_search_layout() {
		return $this->search_layout;
	}

	public function set_search_layout( $search_layout ) {
		$this->search_layout = $search_layout;
	}

	function set_variables() {
		$this->set_search_layout( EskilCore_Headers::get_instance()->get_header_object()->get_search_layout() );
	}

	function add_body_classes( $classes ) {
		$classes[] = 'qodef-search--' . $this->get_search_layout();

		return $classes;
	}
}
