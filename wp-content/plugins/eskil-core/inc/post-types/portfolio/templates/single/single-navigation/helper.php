<?php

if ( ! function_exists( 'eskil_core_include_portfolio_single_post_navigation_template' ) ) {
	/**
	 * Function which includes additional module on single portfolio page
	 */
	function eskil_core_include_portfolio_single_post_navigation_template() {
		eskil_core_template_part( 'post-types/portfolio', 'templates/single/single-navigation/templates/single-navigation' );
	}

	add_action( 'eskil_core_action_after_portfolio_single_item', 'eskil_core_include_portfolio_single_post_navigation_template' );
}
