<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			eskil_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			eskil_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			eskil_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			eskil_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	}
	?>
</div>
