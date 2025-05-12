<?php if ( isset( $media ) && ! empty( $media ) ) {
	$images = explode( ',', $media );

	foreach ( $images as $image ) {
		$params          = array();
		$params['media'] = $image;
		eskil_core_template_part( 'post-types/portfolio', 'templates/parts/media/media', 'image', $params );
	}
}
