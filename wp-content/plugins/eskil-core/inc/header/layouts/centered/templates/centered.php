<?php
// Include logo
eskil_core_get_header_logo_image();
?>
<div class="qodef-centered-header-wrapper">
	<?php
	// Include widget area two
	eskil_core_get_header_widget_area( 'two' );

	// Include main navigation
	eskil_core_template_part( 'header', 'templates/parts/navigation' );

	// Include widget area one
	eskil_core_get_header_widget_area();
	?>
</div>
