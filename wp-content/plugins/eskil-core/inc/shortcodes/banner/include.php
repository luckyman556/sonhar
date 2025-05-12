<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/banner/class-eskilcore-banner-shortcode.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
