<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
	<div class="qodef-m-inner">
		<?php eskil_core_template_part( 'shortcodes/pricing-table', 'templates/parts/title', '', $params ); ?>
		<?php eskil_core_template_part( 'shortcodes/pricing-table', 'templates/parts/price', '', $params ); ?>
		<?php eskil_core_template_part( 'shortcodes/pricing-table', 'templates/parts/content', '', $params ); ?>
		<?php eskil_core_template_part( 'shortcodes/pricing-table', 'templates/parts/button', '', $params ); ?>
	</div>
</div>
