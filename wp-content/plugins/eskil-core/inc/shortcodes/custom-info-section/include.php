<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/custom-info-section/class-eskilcore-custom-info-section-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/custom-info-section/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
