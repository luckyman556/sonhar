<?php
if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

class Qode_Quick_View_For_WooCommerce_Framework_Page_Admin extends Qode_Quick_View_For_WooCommerce_Framework_Page {

	public function add_tab_element( $params ) {
		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type']  = 'admin';
			$params['scope'] = $this->get_scope();
			$field           = new Qode_Quick_View_For_WooCommerce_Framework_Tab_Admin( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_section_element( $params ) {

		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type']  = 'admin';
			$params['scope'] = $this->get_scope();
			$field           = new Qode_Quick_View_For_WooCommerce_Framework_Section_Admin( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_row_element( $params ) {

		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type']  = 'admin';
			$params['scope'] = $this->get_scope();
			$field           = new Qode_Quick_View_For_WooCommerce_Framework_Row_Admin( $params );
			$this->add_child( $field );

			return $field;
		}

		return false;
	}

	public function add_repeater_element( $params ) {
		$params['type']          = 'admin';
		$params['default_value'] = isset( $params['default_value'] ) ? $params['default_value'] : '';
		$params['scope']         = $this->get_scope();
		$admin_option            = qode_quick_view_for_woocommerce_framework_get_framework_root()->get_admin_option( $this->get_scope() );
		$admin_option->set_option( $params['name'], $params['default_value'], 'repeater' );

		return parent::add_repeater_element( $params );
	}

	public function add_field_element( $params ) {
		$params['type']          = 'admin';
		$params['default_value'] = isset( $params['default_value'] ) ? $params['default_value'] : '';
		$params['scope']         = $this->get_scope();
		$admin_option            = qode_quick_view_for_woocommerce_framework_get_framework_root()->get_admin_option( $this->get_scope() );
		$admin_option->set_option( $params['name'], $params['default_value'], $params['field_type'] );
		parent::add_field_element( $params );
	}
}
