<?php

if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();

		// Hook to include additional content before post item
		do_action( 'eskil_core_action_before_portfolio_item' );

		$item_layout = apply_filters( 'eskil_core_filter_portfolio_single_layout', '' );

		// Include post item
		eskil_core_template_part( 'post-types/portfolio', 'variations/' . $item_layout . '/layout/' . $item_layout );

		// Hook to include additional content after post item
		do_action( 'eskil_core_action_after_portfolio_item' );

	endwhile; // End of the loop.
} else {
	// Include global posts not found
	eskil_core_theme_template_part( 'content', 'templates/parts/posts-not-found' );
}

wp_reset_postdata();
