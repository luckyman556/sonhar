<?php

include_once ESKIL_CORE_INC_PATH . '/social-share/shortcodes/social-share/class-eskilcore-social-share-shortcode.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
