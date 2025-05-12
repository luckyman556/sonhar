<?php

if ( ! function_exists( 'eskil_core_add_yith_color_and_label_variations_plugin_button_icon' ) ) {
	/**
	 * Function that add additional class name into global class list for body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function eskil_core_add_yith_color_and_label_variations_plugin_button_icon( $classes ) {

		$option = eskil_core_get_post_value_through_levels( 'qodef_enable_woo_yith_color_and_label_variations_predefined_style' );

		if ( 'yes' === $option ) {
			$classes[] = 'qodef-yith-wccl--predefined';
		}

		return $classes;
	}

	add_filter( 'body_class', 'eskil_core_add_yith_color_and_label_variations_plugin_button_icon' );
}
