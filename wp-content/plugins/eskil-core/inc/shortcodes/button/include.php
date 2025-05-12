<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/button/class-eskilcore-button-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
