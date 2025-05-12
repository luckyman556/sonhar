<?php

foreach ( glob( ESKIL_MEMBERSHIP_INC_PATH . '/general/dashboard/admin/*.php' ) as $module ) {
	include_once $module;
}

require_once ESKIL_MEMBERSHIP_INC_PATH . '/general/class-eskilmembership-page-templates.php';
include_once ESKIL_MEMBERSHIP_INC_PATH . '/general/helper.php';
