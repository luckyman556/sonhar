<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/countdown/class-eskilcore-countdown-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
