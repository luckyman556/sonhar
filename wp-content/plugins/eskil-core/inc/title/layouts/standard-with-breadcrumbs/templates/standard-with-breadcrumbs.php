<?php
// Load title image template
eskil_core_get_page_title_image();
?>
<div class="qodef-m-content <?php echo esc_attr( eskil_core_get_page_title_content_classes() ); ?>">
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title entry-title">
		<?php
		if ( qode_framework_is_installed( 'theme' ) ) {
			echo esc_html( eskil_get_page_title_text() );
		} else {
			echo get_option( 'blogname' );
		}
		?>
	</<?php echo esc_attr( $title_tag ); ?>>
	<?php
	// Load breadcrumbs template
	eskil_core_breadcrumbs();
	?>
</div>
