<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php eskil_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image', '', $params ); ?>
		<div class="qodef-e-content">
			<div class="qodef-e-text">
				<?php
				// Include post title
				eskil_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params );
				?>
			</div>
		</div>
	</div>
</article>
