<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/single-image/class-eskilcore-single-image-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
