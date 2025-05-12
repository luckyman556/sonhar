<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/simple-links/class-eskilcore-simple-links-shortcode.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/shortcodes/simple-links/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
