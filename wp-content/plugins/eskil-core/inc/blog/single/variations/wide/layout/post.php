<article <?php post_class( 'qodef-blog-item qodef-e qodef-blog-item--wide' ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info">
					<?php
					// Include post date info
					eskil_template_part( 'blog', 'templates/parts/post-info/date' );

					// Include post author info
					eskil_template_part( 'blog', 'templates/parts/post-info/author' );

					// Include post category info
					eskil_template_part( 'blog', 'templates/parts/post-info/categories' );

					// Include post comments info
					eskil_template_part( 'blog', 'templates/parts/post-info/comments' );
					?>
				</div>
				<div class="qodef-e-title">
					<?php
					// Include post title
					eskil_template_part( 'blog', 'templates/parts/post-info/title' );
					?>
				</div>
			</div>
			<?php
			// Include post media
			eskil_template_part( 'blog', 'templates/parts/post-info/media' );
			?>
			<div class="qodef-e-text">
				<?php
				// Include post content
				the_content();

				// Hook to include additional content after blog single content
				do_action( 'eskil_core_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-bottom-holder">
				<div class="qodef-e-left qodef-e-info">
					<?php
					// Include post category info
					eskil_template_part( 'blog', 'templates/parts/post-info/tags' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>
