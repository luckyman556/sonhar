<?php

include_once ESKIL_CORE_INC_PATH . '/blog/shortcodes/blog-list/class-eskilcore-blog-list-shortcode.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/blog/shortcodes/blog-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
