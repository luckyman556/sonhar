<?php

include_once ESKIL_CORE_INC_PATH . '/search/class-eskilcore-search.php';
include_once ESKIL_CORE_INC_PATH . '/search/helper.php';
include_once ESKIL_CORE_INC_PATH . '/search/dashboard/admin/search-options.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
