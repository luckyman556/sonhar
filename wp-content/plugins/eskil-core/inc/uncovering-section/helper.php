<?php

if ( ! function_exists( 'eskil_core_uncovering_section_add_body_classes' ) ) {
	function eskil_core_uncovering_section_add_body_classes( $classes ) {
		$uncovering_section = eskil_core_get_post_value_through_levels( 'qodef_uncovering_section' );

		if ( 'yes' === $uncovering_section ) {
			$classes[] = 'qodef-uncovering-section';
		}

		return $classes;
	}

	add_filter( 'body_class', 'eskil_core_uncovering_section_add_body_classes' );
}
