<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/counter/class-eskilcore-counter-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
