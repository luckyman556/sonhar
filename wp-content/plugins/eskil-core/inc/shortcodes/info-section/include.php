<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/info-section/class-eskilcore-info-section-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/info-section/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
