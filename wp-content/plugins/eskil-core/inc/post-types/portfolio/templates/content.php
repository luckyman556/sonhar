<?php
// Hook to include additional content before page content holder
do_action( 'eskil_core_action_before_portfolio_content_holder' );
?>
<main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( eskil_core_get_grid_gutter_classes() ); ?>" role="main">
	<div class="qodef-grid-inner clear">
		<?php
		// Include portfolio template
		$template_slug = isset( $template_slug ) ? $template_slug : '';
		eskil_core_template_part( 'post-types/portfolio', 'templates/portfolio', $template_slug );

		// Include page content sidebar
		eskil_core_theme_template_part( 'sidebar', 'templates/sidebar' );
		?>
	</div>
</main>
<?php
// Hook to include additional content after main page content holder
do_action( 'eskil_core_action_after_portfolio_content_holder' );
?>
