<?php

include_once ESKIL_CORE_CPT_PATH . '/clients/shortcodes/clients-list/class-eskilcore-clients-list-shortcode.php';

foreach ( glob( ESKIL_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
