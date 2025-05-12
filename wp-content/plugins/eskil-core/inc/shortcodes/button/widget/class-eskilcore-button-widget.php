<?php

if ( ! function_exists( 'eskil_core_add_button_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_core_add_button_widget( $widgets ) {
		$widgets[] = 'EskilCore_Button_Widget';

		return $widgets;
	}

	add_filter( 'eskil_core_filter_register_widgets', 'eskil_core_add_button_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilCore_Button_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'eskil_core_button',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'eskil_core_button' );
				$this->set_name( esc_html__( 'Eskil Button', 'eskil-core' ) );
				$this->set_description( esc_html__( 'Add a button element into widget areas', 'eskil-core' ) );
			}
		}

		public function render( $atts ) {
			echo EskilCore_Button_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
