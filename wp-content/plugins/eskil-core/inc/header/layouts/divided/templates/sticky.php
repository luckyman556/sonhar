<div class="qodef-header-sticky <?php echo implode( ' ', apply_filters( 'eskil_core_filter_sticky_header_class', array() ) ); ?>">
	<div class="qodef-header-sticky-inner">
		<div class="qodef-divided-header-left-wrapper">
			<?php
			// Include widget area two
			eskil_core_get_header_widget_area( 'two', 'sticky-header-widget-area', 'sticky' );

			// Include divided left navigation
			eskil_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' );
			?>
		</div>
		<?php
		// Include logo
		eskil_core_get_header_logo_image( array( 'sticky_logo' => true ) );
		?>
		<div class="qodef-divided-header-right-wrapper">
			<?php
			// Include divided right navigation
			eskil_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );

			// Include widget area one
			eskil_core_get_header_widget_area( 'one', 'sticky-header-widget-area', 'sticky' );
			?>
		</div>
		<?php do_action( 'eskil_core_action_after_sticky_header' ); ?>
	</div>
</div>
