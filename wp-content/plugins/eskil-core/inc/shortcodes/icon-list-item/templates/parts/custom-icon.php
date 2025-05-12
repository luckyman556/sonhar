<?php
if ( 'custom-icon' === $icon_type && ( ! empty( $custom_icon ) || ! empty( $svg_code ) ) ) {
	if ( empty( $svg_code ) ) :
		echo wp_get_attachment_image( $custom_icon, 'full' );
	else :
		echo qode_framework_wp_kses_html( 'html', $svg_code );
	endif;
}
