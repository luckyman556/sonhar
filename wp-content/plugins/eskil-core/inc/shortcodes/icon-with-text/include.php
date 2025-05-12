<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/icon-with-text/class-eskilcore-icon-with-text-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/icon-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
