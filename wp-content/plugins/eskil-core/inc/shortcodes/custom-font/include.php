<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/custom-font/class-eskilcore-custom-font-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
