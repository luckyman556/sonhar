<?php

include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/media-custom-fields.php';
include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/class-eskilcore-product-category-list-shortcode.php';

foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-category-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
