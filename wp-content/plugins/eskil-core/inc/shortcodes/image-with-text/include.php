<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/image-with-text/class-eskilcore-image-with-text-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
