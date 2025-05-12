<?php

class EskilCore_Product_Designer_List_Shortcode_Elementor extends EskilCore_Elementor_Widget_Base {

	public function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'eskil_core_product_designer_list' );

		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	eskil_core_register_new_elementor_widget( new EskilCore_Product_Designer_List_Shortcode_Elementor() );
}
