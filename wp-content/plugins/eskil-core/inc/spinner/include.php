<?php

include_once ESKIL_CORE_INC_PATH . '/spinner/helper.php';
include_once ESKIL_CORE_INC_PATH . '/spinner/dashboard/admin/spinner-options.php';
include_once ESKIL_CORE_INC_PATH . '/spinner/dashboard/meta-box/spinner-meta-box.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/spinner/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
