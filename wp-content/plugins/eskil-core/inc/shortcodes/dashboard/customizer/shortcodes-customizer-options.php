<?php

if ( ! function_exists( 'eskil_core_add_shortcodes_customizer_options' ) ) {
	/**
	 * Function that add customizer options for this module
	 */
	function eskil_core_add_shortcodes_customizer_options( $page ) {

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'  => 'section',
					'name'        => 'eskil_core_performance_shortcodes_section',
					'title'       => esc_html__( 'Shortcodes', 'eskil-core' ),
					'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionality which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'eskil-core' ),
				)
			);

			foreach ( glob( ESKIL_CORE_SHORTCODES_PATH . '/*', GLOB_ONLYDIR ) as $shortcode ) {
				$shortcode_name = basename( $shortcode );

				if ( 'dashboard' !== $shortcode_name ) {
					$shortcode_label = ucwords( str_replace( '-', ' ', $shortcode_name ) );
					$shortcode_name  = str_replace( '-', '_', $shortcode_name );

					$page->add_field_element(
						array(
							'field_type'        => 'setting',
							'option_type'       => 'option',
							'name'              => "eskil_core_performance_shortcode_{$shortcode_name}",
							'default_value'     => false,
							'sanitize_callback' => 'sanitize_checkbox',
						)
					);

					$page->add_field_element(
						array(
							'field_type'  => 'control',
							'option_type' => 'checkbox',
							'section'     => 'eskil_core_performance_shortcodes_section',
							'settings'    => "eskil_core_performance_shortcode_{$shortcode_name}",
							'name'        => "eskil_core_performance_shortcode_{$shortcode_name}_control",
							'title'       => $shortcode_label,
						)
					);
				}
			}

			// Hook to include additional options after module options
			do_action( 'eskil_core_action_after_shortcodes_customizer_options', $page );
		}
	}

	add_action( 'eskil_core_action_performance_customizer_options', 'eskil_core_add_shortcodes_customizer_options' );
}
