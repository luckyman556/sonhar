<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/text-marquee/class-eskilcore-text-marquee-shortcode.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/shortcodes/text-marquee/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
