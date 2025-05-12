<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner" <?php qode_framework_inline_style( $this_shortcode->get_list_item_style( $params ) ); ?>>
		<div class="qodef-e-info-left">
			<?php
			// Include post title
			eskil_core_list_sc_template_part( 'post-types/portfolio/shortcodes/portfolio-list', 'post-info/title', '', $params );

			// Include post thumbnail
			eskil_core_list_sc_template_part( 'post-types/portfolio/shortcodes/portfolio-list', 'post-info/thumbnail', '', $params );

			// Include post excerpt
			eskil_core_list_sc_template_part( 'post-types/portfolio/shortcodes/portfolio-list', 'post-info/excerpt', '', $params );

			// Include post read more
			eskil_core_list_sc_template_part( 'post-types/portfolio/shortcodes/portfolio-list', 'post-info/read-more', '', $params );
			?>
			<div class="qodef-e-info bottom">
				<?php
				// Include post category info
				eskil_core_list_sc_template_part( 'post-types/portfolio/shortcodes/portfolio-list', 'post-info/categories', '', $params );
				?>
			</div>
		</div>
		<div class="qodef-e-info-right">
			<?php eskil_core_list_sc_template_part( 'post-types/portfolio/shortcodes/portfolio-list', 'post-info/image', '', $params ); ?>
		</div>
	</div>
</article>
