<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		eskil_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info">
					<?php
					// Include post date info
					eskil_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );

					if ( 'yes' === $qodef_blog_enable_author ) {
						// Include post author info
						eskil_core_theme_template_part( 'blog', 'templates/parts/post-info/author' );
					}

					if ( 'yes' === $qodef_blog_enable_category ) {
						// Include post category info
						eskil_core_theme_template_part( 'blog', 'templates/parts/post-info/categories' );
					}
					?>
				</div>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				eskil_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params );

				// Include post excerpt
				eskil_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/excerpt', '', $params );

				// Hook to include additional content after blog single content
				do_action( 'eskil_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<div class="qodef-e-left">
					<?php
					if ( 'yes' === $qodef_blog_enable_simple_button ) {
						// Include post read more simple
						eskil_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more', 'simple' );
					} else {
						// Include post read more
						eskil_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
					}
					?>
				</div>
				<?php if ( 'yes' === $enable_tags ) { ?>
				<div class="qodef-e-right">
					<?php
					// Include post read more
					eskil_core_theme_template_part( 'blog', 'templates/parts/post-info/tags' );
					?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</article>
