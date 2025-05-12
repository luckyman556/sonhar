<?php

include_once ESKIL_CORE_SHORTCODES_PATH . '/pricing-table/class-eskilcore-pricing-table-shortcode.php';

foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
