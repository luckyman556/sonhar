<?php do_action( 'eskil_action_before_page_header' ); ?>

<header id="qodef-page-header" role="banner">
	<div id="qodef-page-header-inner" class="<?php echo implode( ' ', apply_filters( 'eskil_filter_header_inner_class', array(), 'default' ) ); ?>">
		<?php
		// Include logo
		eskil_core_get_header_logo_image();

		// Include divided left navigation
		eskil_core_template_part( 'header', 'layouts/vertical/templates/navigation' );

		// Include widget area one
		eskil_core_get_header_widget_area();
		?>
	</div>
</header>
