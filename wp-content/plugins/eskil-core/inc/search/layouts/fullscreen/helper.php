<?php

if ( ! function_exists( 'eskil_core_register_fullscreen_search_layout' ) ) {
	/**
	 * Function that add variation layout into global list
	 *
	 * @param array $search_layouts
	 *
	 * @return array
	 */
	function eskil_core_register_fullscreen_search_layout( $search_layouts ) {
		$search_layouts['fullscreen'] = 'EskilCore_Fullscreen_Search';

		return $search_layouts;
	}

	add_filter( 'eskil_core_filter_register_search_layouts', 'eskil_core_register_fullscreen_search_layout' );
}
