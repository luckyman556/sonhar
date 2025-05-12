<?php

if ( ! function_exists( 'eskil_core_include_portfolio_single_related_posts_template' ) ) {
	/**
	 * Function which includes additional module on single portfolio page
	 */
	function eskil_core_include_portfolio_single_related_posts_template() {
		eskil_core_template_part( 'post-types/portfolio', 'templates/single/related-posts/templates/related-posts' );
	}

	add_action( 'eskil_core_action_after_portfolio_single_item', 'eskil_core_include_portfolio_single_related_posts_template', 20 ); // permission 20 is set to define template position
}
