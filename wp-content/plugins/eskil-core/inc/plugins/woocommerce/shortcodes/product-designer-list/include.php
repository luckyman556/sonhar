<?php

include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-designer-list/class-eskilcore-product-designer-list-shortcode.php';
include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-designer-list/designer-custom-fields.php';

foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-designer-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
