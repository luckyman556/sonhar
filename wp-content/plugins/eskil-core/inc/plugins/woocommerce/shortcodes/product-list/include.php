<?php

include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/class-eskilcore-product-list-shortcode.php';
include_once ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/helper.php';

foreach ( glob( ESKIL_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
