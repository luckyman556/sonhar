<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/tabs/class-eskilcore-tab-shortcode.php';
include_once ESKIL_CORE_SHORTCODES_PATH . '/tabs/class-eskilcore-tab-child-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
