<?php

// Hook to include additional content before 404 page content
do_action( 'eskil_action_before_404_page_content' );

// Include module content template
echo apply_filters( 'eskil_filter_404_page_content_template', eskil_get_template_part( '404', 'templates/404-content', '', eskil_get_404_page_parameters() ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

// Hook to include additional content after 404 page content
do_action( 'eskil_action_after_404_page_content' );
