<?php

if ( ! function_exists( 'eskil_core_get_portfolio_list_item_url' ) ) {
	/**
	 * Function that return portfolio item link config
	 *
	 * @param int $page_id
	 *
	 * @return array
	 */
	function eskil_core_get_portfolio_list_item_url( $page_id ) {
		$external_link        = get_post_meta( $page_id, 'qodef_portfolio_single_external_link', true );
		$external_link_target = get_post_meta( $page_id, 'qodef_portfolio_single_external_link_target', true );
		$link                 = ! empty( $external_link ) ? $external_link : get_the_permalink();
		$link_target          = ! empty( $external_link_target ) ? $external_link_target : '_self';

		return array(
			'link'   => $link,
			'target' => $link_target,
		);
	}
}
