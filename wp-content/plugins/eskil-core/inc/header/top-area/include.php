<?php

include_once ESKIL_CORE_INC_PATH . '/header/top-area/class-eskilcore-top-area.php';
include_once ESKIL_CORE_INC_PATH . '/header/top-area/helper.php';

foreach ( glob( ESKIL_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}
