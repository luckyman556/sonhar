<?php

include_once ESKIL_CORE_CPT_PATH . '/clients/helper.php';

foreach ( glob( ESKIL_CORE_CPT_PATH . '/clients/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}
