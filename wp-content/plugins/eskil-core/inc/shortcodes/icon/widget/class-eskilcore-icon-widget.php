<?php

if ( ! function_exists( 'eskil_core_add_icon_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function eskil_core_add_icon_widget( $widgets ) {
		$widgets[] = 'EskilCore_Icon_Widget';

		return $widgets;
	}

	add_filter( 'eskil_core_filter_register_widgets', 'eskil_core_add_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class EskilCore_Icon_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'eskil_core_icon',
				)
			);

			if ( $widget_mapped ) {
				$this->set_base( 'eskil_core_icon' );
				$this->set_name( esc_html__( 'Eskil Icon', 'eskil-core' ) );
				$this->set_description( esc_html__( 'Add a icon element into widget areas', 'eskil-core' ) );
			}
		}

		public function render( $atts ) {
			echo EskilCore_Icon_Shortcode::call_shortcode( $atts ); // XSS OK
		}
	}
}
