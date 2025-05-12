<?php

include_once ESKIL_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/helper.php';
include_once ESKIL_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/class-eskilcore-portfolio-list-shortcode.php';

foreach ( glob( ESKIL_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
