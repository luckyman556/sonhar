<?php
// Load title image template
eskil_core_get_page_title_image();
?>
<div class="qodef-m-content <?php echo esc_attr( eskil_core_get_page_title_content_classes() ); ?>">
	<?php
	// Load breadcrumbs template
	eskil_core_breadcrumbs();
	?>
</div>
