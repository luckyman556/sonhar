<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-m-info-top">
		<?php eskil_core_template_part( 'shortcodes/custom-info-section', 'templates/parts/tagline', '', $params ); ?>
		<?php eskil_core_template_part( 'shortcodes/custom-info-section', 'templates/parts/title', '', $params ); ?>
	</div>
	<div class="qodef-m-info-bottom">
		<?php eskil_core_template_part( 'shortcodes/custom-info-section', 'templates/parts/info-bottom', '', $params ); ?>
	</div>
</div>
