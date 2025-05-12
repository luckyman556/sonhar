<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
    <?php eskil_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/static-title', '', $params ); ?>
	<div class="qodef-grid-inner clear">
		<?php
		// Include global masonry template from theme
		eskil_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );

		// Include items
		eskil_core_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/loop', '', $params );
		?>
	</div>
</div>
