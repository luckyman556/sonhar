<?php

include_once ESKIL_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/class-eskilcore-testimonials-list-shortcode.php';

foreach ( glob( ESKIL_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
