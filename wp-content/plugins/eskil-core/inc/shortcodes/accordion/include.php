<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/accordion/class-eskilcore-accordion-shortcode.php';
include_once ESKIL_CORE_SHORTCODES_PATH . '/accordion/class-eskilcore-accordion-child-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
